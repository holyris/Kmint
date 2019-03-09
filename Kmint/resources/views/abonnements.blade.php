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
                
    
        
            <form id="uploadForm" action="{{action('Controller@updateAbonnements')}}" enctype="multipart/form-requestedData" style='display : block;'>
                              
                <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <input type="checkbox" id="sports" name="subscribe[]" value="sports">
                      <label for="sports">Sport</label><br><br>
                      <input type="checkbox" id="politique" name="subscribe[]" value="politique">
                      <label for="politique">Politique</label><br><br>
                      <input type="checkbox" id="nature" name="subscribe[]" value="nature">
                      <label for="nature">Nature</label><br><br>
                      <input type="checkbox" id="sante" name="subscribe[]" value="sante">
                      <label for="sante">Santé</label><br><br>
                      <input type="checkbox" id="social" name="subscribe[]" value="social">
                      <label for="social">Social</label><br><br>
                      <input type="checkbox" id="justice" name="subscribe[]" value="justice">
                      <label for="justice">Justice</label><br><br>
                    </div>
                  </div>
                </div>
                  <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                      <input type="checkbox" id="droits_homme" name="subscribe[]" value="droits_homme">
                      <label for="droits_homme">Droits de l'Homme</label><br><br>
                      <input type="checkbox" id="espace_euro" name="subscribe[]" value="espace_euro">
                      <label for="espace_eurp">Espace euro</label><br><br>
                      <input type="checkbox" id="enfants" name="subscribe[]" value="enfants">
                      <label for="enfants">Enfants</label><br><br>
                      <input type="checkbox" id="arts" name="subscribe[]" value="arts">
                      <label for="arts">Arts</label><br><br>
                      <input type="checkbox" id="medias" name="subscribe[]" value="medias">
                      <label for="medias">Médias</label><br><br>
                      <input type="checkbox" id="animaux" name="subscribe[]" value="animaux">
                      <label for="animaux">Animaux</label><br><br>
                      <input type="checkbox" id="autres" name="subscribe[]" value="autres">
                      <label for="autres">Autres</label><br><br>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" id="confirmer" name="button" class="btn btn-primary">Confirmer</button>

                

              </div>
          </form>

            <a href="{{action('Controller@createAbonnements')}}">
              <button name="button" id="abonnement" name="button" class="btn btn-primary">Activer la fonction Abonnement</button>
            </a>
            <a href="{{action('Controller@deleteAbonnements')}}">
              <button name="button" id="desabonnement" class="btn btn-danger" style="display : block;">Désactiver la fonction Abonnement</button>
            </a>
            </div>
                
                
        </div>
    </div>
</div>
<!-- <script>
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
</script> -->
@endsection
