@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes informations</div>

                <div class="card-body">
                    
                  Email : {{ Auth::user()->email }}<br>
                  Date de création du compte : {{ Auth::user()->created_at }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection