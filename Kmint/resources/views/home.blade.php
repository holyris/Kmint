@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    
                    <form id="uploadForm" method="POST"
                              enctype="multipart/form-requestedData">
                            {{ csrf_field() }}


                    <div class="form-group{{ $errors->has('requestedData') ? ' has-error' : '' }} formField">
                    <label for="comment">Recherche</label>
                    <textarea class="form-control" rows="1" name="requestedData" maxlength="750" required
                                                              autofocus></textarea>

                                                    @if ($errors->has('requestedData'))
                                                        <span class="help-block">
                                        <strong>{{ $errors->first('requestedData') }}</strong>
                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" name="button" class="btn btn-primary">Send!</button>
                                                </div>

                    </form>

                    @guest
                    @if (Route::has('register'))
                        <div class="card-header">Feed (Unconnected)</div>
                    @endif
                    @else
                        <div class="card-header">Feed (Connected)</div>
                    @endguest

                    <div class="infinite-scroll">
                        <div class="card-body">
                        @foreach($data as $row)
                        <div id="petition">
                            <tr>
                                <td>Titre : {{ $row->titre }}</td><br>
                                <td>Description : {{ $row->description }}</td><br>
                                <td>Lien : {{ $row->lien }}</td><br>
                                <td>Image : {{ $row->image }}</td><br>
                                <td>Auteur : {{ $row->auteur }}</td><br>
                                <td>Signature : {{ $row->signature }}</td><br>
                                <td>Catégorie : {{ $row->categorie }}</td><br>
                                <td>Site d'origine : {{ $row->site }}</td><br>
                                <td>Date : {{ $row->date }}</td><br>
                            </tr><br><br>
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