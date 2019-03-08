@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes abonnements</div>
                <p>
                  Bienvenue dans la section abonnement. Ici vous pouvez sélectionner les
                  catégories de pétition auxquelles vous souhaitez vous abonner. Cela sous entend que 
                  vous ne verrez plus que ces catégories sur votre page d'accueil. <br>
                  Pour se faire il vous suffit de cocher les catégories que vous souhaitez 
                  et cliquer sur le bouton "Abonnement".<br>
                  Vous avez la possibilité de vous désabonnez de toutes les catégories en un clique
                  grâce au bouton "Désabonnement".<br>
                </p>
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
            </div>
            <a href="/confirmAbo">
                <button type="submit" name="button" class="btn btn-primary">Abonnement</button>
            </a>
            <a href="/confirmDesabo">
                <button type="submit" name="button" class="btn btn-danger">Désabonnement</button>
            </a>
        </div>
    </div>
</div>
@endsection