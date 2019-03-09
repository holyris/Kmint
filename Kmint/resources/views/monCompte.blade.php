@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mon compte</div>

                <div class="card-body">
                    
                  <a href="/informationsPerso">Mes informations personnelles</a><br>
                  <a href="/favoris">Mes favoris</a><br> 
                  <a href="/abonnements">Mes abonnements</a><br>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection