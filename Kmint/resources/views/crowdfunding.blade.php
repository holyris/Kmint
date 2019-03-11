@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="tab">
            <a href="/">
                <button class="tablinks">Pétition</button>
            </a>
            <a href="/crowdfunding">
                <button id="actuel" class="tablinks">Crowdfunding</button>
            </a>
            <form id="uploadForm" method="POST"
                            enctype="multipart/form-requestedData">
                        {{ csrf_field() }}


                
                <label id="txt" for="comment">Recherche : </label>
                <input type="search" class="form-control" name="requestedData" id="research" placeholder="Rechercher..." maxlength="750" required/>

                @if ($errors->has('requestedData'))
                        <span class="help-block">
                    <strong>{{ $errors->first('requestedData') }}</strong>
                    </span>
                @endif
                    

                    
                    <button type="submit" name="button" class="btn btn-primary">Rechercher</button>
                    

                </form>
        </div>
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
                                
                                <a class="titre_petition" href="{{ $row->lien }}" target="_blank">{{ $row->titre }}</a>
                                <br> 
                                
                                <a  href="{{ $row->lien }}" target="_blank">
                                    <img src="{{ $row->image }}" class="img_petition" alt="{{ $row->titre }}">
                                </a>

                                {{ $row->description }}<br>

                                <td>Auteur : {{ $row->auteur }}</td>
                                <td>Deadline : {{ $row->deadline }} jours</td><br>
                                <td>Engagement : {{ $row->engagement }}%</td><br>
                                <td>Etat : {{ $row->etat }}</td><br>

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
            loadingHtml: '<img class="center-block" src="/images/ajax-loader.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });


//  Fonction qui ajoute un favori
function addFavoris(elem){
    $.ajax({
        type: 'GET',
        url: '/ajouterFavoris',
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
        url: '/supprFavoris',
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