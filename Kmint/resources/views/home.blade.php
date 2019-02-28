@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @guest
                    @if (Route::has('register'))
                        <p>Feed par défaut</p>
                    @endif
                    @else
                        <p>
                            Vous êtes connecté.e<br>
                            Feed perso ici
                        </p>
                    @endguest
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
