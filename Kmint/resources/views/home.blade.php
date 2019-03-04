@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    @guest
                    @if (Route::has('register'))
                        <div class="card-header">Feed (Unconnected)</div>
                    @endif
                    @else
                        <div class="card-header">Feed (Connected)</div>
                    @endguest

                    <div class="card-body">
                    @foreach($data as $row)
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
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
