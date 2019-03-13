@extends('layouts.app')

@section('content')
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=1.7.1"></script><!-- jQuery --><script type="text/javascript" src="CHEMIN_VERS/scrollToTop/scrollToTop.js"></script><!-- The plugin file -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a id="haut" class="anchorLink">
                <img src="{{ asset('img/icone_fleche.png')}}" alt="fleche">
            </a>
            <div class="card">
            <div class="tab">
                <a href="/favoris/petition">
                    <button class="tablinks">Pétition</button>
                </a>
                <a href="#">
                    <button id="actuel" class="tablinks">Crowdfunding</button>
                </a>
                <h5 class="titre_tab">Favoris</h5>

                                            
            </div>


                <div class="card-body">
                
                @if(count($data) == 0)
                  Vos crowdfundings favoris seront affichés ici.
                @endif
                <div class="card">
                <div class="infinite-scroll">
                        <div class="card-body">
                        @foreach($data as $row)
                        <div id="{{ $row->lien }}">
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

                                
                                @foreach($favoris as $fav)
                                    @if($row->lien == $fav->lien)
                                        <?php $favoris_exist = true ?>
                                    @endif
                                @endforeach

                                <button type="button" name="favori"  id="favori" value="{{ $row->lien }}" onclick="supprFavoris(this)" class="btn btn-second">            
                                    Enlever des favoris                                    
                                </button>

                                
                            </tr><br><br><br>
                        </div>    
                        @endforeach
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

//  Fonction qui supprime un favori dans la bd et qui supprime l'affichage de le petition;
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
    var id = elem.value;
    document.getElementById(id).style.display = "none";
    
}

</script>
@endsection