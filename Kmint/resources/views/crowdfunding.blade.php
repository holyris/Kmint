@extends('layouts.app')

@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=1.7.1"></script><!-- jQuery --><script type="text/javascript" src="CHEMIN_VERS/scrollToTop/scrollToTop.js"></script><!-- The plugin file -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="tab">
            <a href="/">
                <button class="tablinks">Pétition</button>
            </a>
            <a href="#">
                <button id="actuel" class="tablinks">Crowdfunding</button>
            </a>
            <form id="uploadFormm" action="{{action('Controller@getParticularCF')}}"
                                  enctype="multipart/form-requestedData">
                                {{ csrf_field() }}

                <input type="search" class="form-control" name="requestedData" id="research" placeholder="Rechercher..." required/>

                @if ($errors->has('requestedData'))
                        <span class="help-block">
                    <strong>{{ $errors->first('requestedData') }}</strong>
                    </span>
                @endif
                    

                <a href="{{action('Controller@getParticularCF')}}">
                   <button type="submit" name="button" class="btn btn-primary">Rechercher</button>
                </a>
            </form>
        </div>
        <a id="haut" class="anchorLink">
            <img src="{{ asset('img/icone_fleche.png')}}" alt="fleche">
        </a>
            <div class="card">

                    <div class="infinite-scroll">
                        <div class="card-body">
                        <!-- Dans le cas ou la recherche n'a rien trouvé -->
                        @if(count($data) == 0)
                            {{ $msg }}
                        @endif
                        @foreach($data as $row)
                        <div id="petition">
                            <tr>                               
                                <div id="titre">
                                <a class="titre_petition" href="{{ $row->lien }}" target="_blank">{{ $row->titre }}</a>
                                </div>
                                <a  href="{{ $row->lien }}" target="_blank">
                                    <img src="{{ $row->image }}" class="img_petition" alt="{{ $row->titre }}">
                                </a>
                                <div id="descr"> 
                                {{ $row->description }}<br>
                                </div>
                                <div id="info">
                                <td>Auteur : {{ $row->auteur }}</td><br>
                                <td>Fin dans {{ $row->deadline }} jours</td><br>
                                <div id="signa">
                                <td>Engagement : {{ $row->engagement }}%</td><br>
                                </div>
                                </div>

                                <a href="{{ $row->lien }}" target="_blank">
                                    <button type="submit" name="button" class="btn btn-success">Participer</button>
                                </a>
                                
                                <!--    regarde si la petition est bien dans les favoris de l'utilisateur si ce dernier est connecté-->
                                {{ $favoris_exist = false}}

                                @if (\Auth::check())                           
                                
                                    @foreach($favoris as $fav)
                                        @if($row->lien == $fav->lien)
                                            <?php $favoris_exist = true ?>
                                        @endif
                                    @endforeach

                                    <button type="button" name="favori"  id="favori" value="{{ $row->lien }}"
                                    @if ($favoris_exist==false)
                                    onclick="addFavoris(this)" class="btn btn-success"
                                    > Ajouter aux favoris
                                    @else
                                    onclick="supprFavoris(this)" class="btn btn-second"
                                    > Enlever des favoris
                                    @endif
                                    
                                    </button>

                                @endif

                                
                            </tr><br><br><br>
                        </div>    
                        @endforeach
                        {!! $data->links() !!}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<script>
    
$('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src={{ asset('img/ajax-loader.gif')}} alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });


$(document).ready(function() {
    function scroll_to_top(div) {
        $(div).click(function() {
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
        $(window).scroll(function(){
            if($(window).scrollTop()<500){
                $(div).fadeOut();
            } else{
                $(div).fadeIn();
            }
        });
    }
    scroll_to_top("#haut");
});


//  Fonction qui ajoute un favori
function addFavoris(elem){
    $.ajax({
        type: 'GET',
        url: '/favoris/ajouterFavoris',
        data: "lien="+elem.value,
        success : function() {
            
        },
        error : function(resultat, statut, erreur){
            console.log("ça marche pas");
        }
    });
    elem.setAttribute("onclick", "supprFavoris(this)");
    elem.setAttribute("class", "btn btn-second");
    elem.innerText="Enlever des favoris";
    console.log("add");


}

//  Fonction qui supprime un favori
function supprFavoris(elem){
    $.ajax({
        type: 'GET',
        url: '/favoris/supprFavoris',
        data: "lien="+elem.value,
        success : function() {
            
        },
        error : function(resultat, statut, erreur){
            console.log("ça marche pas");
        }
    });

    elem.setAttribute("onclick", "addFavoris(this)");
    elem.setAttribute("class", "btn btn-success");

    elem.innerText="Ajouter aux favoris";
    console.log("suppr");
    
}

</script>

@endsection