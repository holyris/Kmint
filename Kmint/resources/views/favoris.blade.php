@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes favoris</div>

                <div class="card-body">
                
                @if(!isset($data))
                  Vos pétitions favorites seront affichées ici
                @endif
                  <div class="card">
                    <div class="infinite-scroll">
                        <div class="card-body">
                        @foreach($data as $row)
                        <div id="petition">
                            <tr>                               
                                
                                @if ($row->site == 'mesopinions')
                                    <a class="titre_petition" href="https://www.mesopinions.com{{ $row->lien }}" target="_blank">{{ $row->titre }}</a>
                                @elseif ($row->site == 'petitions24')
                                    <a class="titre_petition" href="https://www.petitions24.net{{ $row->lien }}" target="_blank">{{ $row->titre }}</a>
                                @endif
                                <br> 
                                
                                @if ($row->site == 'mesopinions')
                                    <a  href="https://www.mesopinions.com{{ $row->lien }}" target="_blank">
                                        <img src="https://www.mesopinions.com/public/img/{{ $row->image }}" class="img_petition" alt="{{ $row->titre }}">
                                    </a>
                                @elseif ($row->site == 'petitions24')
                                    <a href="https://www.petitions24.net{{ $row->lien }}" target="_blank">
                                        <img src="{{ $row->image }}" class="img_petition" alt="{{ $row->titre }}">
                                    </a>
                                @endif

                                {{ $row->description }}<br>
                                
                                @if ($row->auteur != NULL)
                                    <td>Auteur : {{ $row->auteur }}</td><br>
                                @endif
                                <td>Signature : {{ $row->signature }}</td><br>


                                @if ($row->site == 'mesopinions')
                                    <a href="https://www.mesopinions.com{{ $row->lien }}" target="_blank">
                                        <button type="submit" name="button" class="btn btn-success">Signer</button>
                                    </a>
                                @elseif ($row->site == 'petitions24')
                                    <a href="https://www.petitions24.net{{ $row->lien }}" target="_blank">
                                        <button type="submit" name="button" class="btn btn-success">Signer</button>
                                    </a>
                                @endif 

                            </tr><br><br><br>
                        </div>    
                        @endforeach

                    </div>
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
@endsection