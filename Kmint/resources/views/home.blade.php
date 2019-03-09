@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\Controller;?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tab">
                <a href="/">
                    <button id="actuel" class="tablinks">Pétition</button>
                </a>
                <a href="/crowdfunding">
                    <button class="tablinks">Crowdfunding</button>
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
                                
                                <td>Auteur : {{ $row->auteur }}</td><br>
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