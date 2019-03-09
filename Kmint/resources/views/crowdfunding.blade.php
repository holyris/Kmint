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
                <textarea class="form-control" rows="1" id="research" name="requestedData" maxlength="750" required></textarea>

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
                                <a action=<?php $fav; ?>>
                                    <button type="submit" name="button" class="btn btn-primary">Favoris</button>
                                </a>

                                
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

</script>

@endsection