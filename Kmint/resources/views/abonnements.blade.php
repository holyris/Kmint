@extends('layouts.app')

@section('content')
<?php use \App\Http\Controllers\Controller;?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes abonnements</div>
                <p id="paragraphe" style="display : block;">
                  Bienvenue dans la section Abonnement. Ici vous pouvez sélectionner les
                  catégories de pétition auxquelles vous souhaitez vous abonner. <br>
                  Seules les pétitions des catégories auxquelles vous êtes abonné s'afficheront sur votre page d'accueil. <br>
                <br>
                </p>
                
    
        
        <form id="uploadForm" method="POST"
                              enctype="multipart/form-requestedData"
                              style='display : none;'>
                <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <input type="checkbox" id="sports" name="subscribe" value="choix">
                      <label for="sports">Sport</label><br><br>
                      <input type="checkbox" id="politique" name="subscribe" value="choix">
                      <label for="politique">Politique</label><br><br>
                      <input type="checkbox" id="nature" name="subscribe" value="choix">
                      <label for="nature">Nature</label><br><br>
                      <input type="checkbox" id="sante" name="subscribe" value="choix">
                      <label for="sante">Santé</label><br><br>
                      <input type="checkbox" id="social" name="subscribe" value="choix">
                      <label for="social">Social</label><br><br>
                      <input type="checkbox" id="justice" name="subscribe" value="choix">
                      <label for="justice">Justice</label><br><br>
                    </div>
                  </div>
                </div>
                  <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                      <input type="checkbox" id="droits_homme" name="subscribe" value="choix">
                      <label for="droits_homme">Droits de l'Homme</label><br><br>
                      <input type="checkbox" id="espace_eurp" name="subscribe" value="choix">
                      <label for="espace_eurp">Espace euro</label><br><br>
                      <input type="checkbox" id="enfants" name="subscribe" value="choix">
                      <label for="enfants">Enfants</label><br><br>
                      <input type="checkbox" id="choix10" name="subscribe" value="choix">
                      <label for="choix10">Arts</label><br><br>
                      <input type="checkbox" id="choix11" name="subscribe" value="choix">
                      <label for="choix11">Médias</label><br><br>
                      <input type="checkbox" id="choix12" name="subscribe" value="choix">
                      <label for="choix12">Animaux</label><br><br>
                      <input type="checkbox" id="choix13" name="subscribe" value="choix">
                      <label for="choix13">Autres</label><br><br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" onclick="changement()" id="confirmer" name="button" class="btn btn-primary">Confirmer</button>

                

              </div>
            </form>
            <a href="{{action('Controller@createAbonnements')}}">
              <button name="button" id="abonnement" name="button" class="btn btn-primary">Activer la fonction Abonnement</button>
            </a>
            <a href="{{action('Controller@deleteAbonnements')}}">
              <button name="button" id="desabonnement" class="btn btn-danger" style="display : none;">Désactiver la fonction Abonnement</button>
            </a>
            </div>
                
                
        </div>
    </div>
</div>
<script>
function changement(elem){
  if(document.getElementById('paragraphe').style.display == 'block'){
    if(confirm("Activer l'abonnement ?")){
      document.getElementById('uploadForm').style.display='block';
      document.getElementById('paragraphe').style.display='none';
      document.getElementById('desabonnement').style.display='block';
      document.getElementById('abonnement').style.display='none';

    }

  } else if(document.getElementById('paragraphe').style.display == 'none'){
    if(confirm("Désactiver l'abonnement ?")){
      document.getElementById('uploadForm').style.display='none';
      document.getElementById('paragraphe').style.display='block';
      document.getElementById('desabonnement').style.display='none';
      document.getElementById('abonnement').style.display='block';

      
    }
    
  }
}
</script>
@endsection
