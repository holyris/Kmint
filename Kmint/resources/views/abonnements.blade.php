@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\Controller;?>

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">Mes abonnements</div>

                <p id="paragraphe">
                  Bienvenue dans la section Abonnement. Ici vous pouvez sélectionner les
                  catégories de pétition auxquelles vous souhaitez vous abonner. <br>
                  Seules les pétitions des catégories auxquelles vous êtes abonné s'afficheront sur votre page d'accueil. <br>
                <br>
                </p>
                
             @if ($data != NULL)

            <form id="uploadForm" action="{{action('Controller@updateAbonnements')}}" enctype="multipart/form-requestedData" >
                              
                <div class="row">
                <div class="col-sm-6">
                  <div>
                    <div class="card-body">
                      <input type="checkbox" id="sports" name="subscribe[]" value="sports" 
                      @if ($data->sports == 1) {{ 'checked' }} @endif >
                      <label for="sports">Sport</label><br><br>
                      <input type="checkbox" id="politique" name="subscribe[]" value="politique"
                      @if ($data->politique == 1) {{ 'checked' }} @endif >
                      <label for="politique">Politique</label><br><br>
                      <input type="checkbox" id="nature" name="subscribe[]" value="nature"
                      @if ($data->nature == 1) {{ 'checked' }} @endif >
                      <label for="nature">Nature</label><br><br>
                      <input type="checkbox" id="sante" name="subscribe[]" value="sante"
                      @if ($data->sante == 1) {{ 'checked' }} @endif >
                      <label for="sante">Santé</label><br><br>
                      <input type="checkbox" id="social" name="subscribe[]" value="social"
                      @if ($data->social == 1) {{ 'checked' }} @endif >
                      <label for="social">Social</label><br><br>
                      <input type="checkbox" id="justice" name="subscribe[]" value="justice"
                      @if ($data->justice == 1) {{ 'checked' }} @endif >
                      <label for="justice">Justice</label><br><br>
                    </div>
                  </div>
                </div>
                  <div class="col-sm-6">
                    <div>
                    <div class="card-body">
                      <input type="checkbox" id="droits_homme" name="subscribe[]" value="droits_homme"
                      @if ($data->droits_homme == 1) {{ 'checked' }} @endif >
                      <label for="droits_homme">Droits de l'Homme</label><br><br>
                      <input type="checkbox" id="espace_euro" name="subscribe[]" value="espace_euro"
                      @if ($data->espace_euro == 1) {{ 'checked' }} @endif >
                      <label for="espace_eurp">Espace euro</label><br><br>
                      <input type="checkbox" id="enfants" name="subscribe[]" value="enfants"
                      @if ($data->enfants == 1) {{ 'checked' }} @endif >
                      <label for="enfants">Enfants</label><br><br>
                      <input type="checkbox" id="arts" name="subscribe[]" value="arts"
                      @if ($data->arts == 1) {{ 'checked' }} @endif >
                      <label for="arts">Arts</label><br><br>
                      <input type="checkbox" id="medias" name="subscribe[]" value="medias"
                      @if ($data->medias == 1) {{ 'checked' }} @endif >
                      <label for="medias">Médias</label><br><br>
                      <input type="checkbox" id="animaux" name="subscribe[]" value="animaux"
                      @if ($data->animaux == 1) {{ 'checked' }} @endif >
                      <label for="animaux">Animaux</label><br><br>
                      <input type="checkbox" id="autres" name="subscribe[]" value="autres"
                      @if ($data->autres == 1) {{ 'checked' }} @endif >
                      <label for="autres">Autres</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" id="confirmer" name="button" class="btn btn-success">Confirmer</button>
            @endif
                
            <a href="{{action('Controller@createAbonnements')}}">
              <button name="button" id="abonnement" name="button" class="btn btn-primary">Activer la fonction Abonnement</button>
            </a>

              </div>
            </form>
          
            <a href="{{action('Controller@deleteAbonnements')}}" id="desabonnement">
              <button name="button" id="desabonnement" class="btn btn-danger">Désactiver la fonction Abonnement</button>
            </a>
  
            </div>         
        </div>
    </div>
</div>
<script>
window.onload = function changement(){

  @if ($data != NULL)
    document.getElementById('uploadForm').style.display='block';
    document.getElementById('paragraphe').style.display='none';
    document.getElementById('desabonnement').style.display='block';
    document.getElementById('abonnement').style.display='none';

    
  @elseif ($data == NULL)
    
    document.getElementById('paragraphe').style.display='block';
    document.getElementById('desabonnement').style.display='none';
    document.getElementById('abonnement').style.display='block';
  @endif
}
</script>
@endsection
