@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes abonnements</div>

                <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Pétitions</h5>
                      <input type="checkbox" id="choix1" name="subscribe" value="choix">
                      <label for="choix1">Sport</label><br><br>
                      <input type="checkbox" id="choix2" name="subscribe" value="choix">
                      <label for="choix2">Politique</label><br><br>
                      <input type="checkbox" id="choix3" name="subscribe" value="choix">
                      <label for="choix3">Environnement</label><br><br>
                      <input type="checkbox" id="choix4" name="subscribe" value="choix">
                      <label for="choix4">Santé</label><br><br>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Levée de fonds</h5>
                      <input type="checkbox" id="choix5" name="subscribe" value="choix">
                      <label for="choix5">Aide aux familles</label><br><br>
                      <input type="checkbox" id="choix6" name="subscribe" value="choix">
                      <label for="choix6">Education</label><br><br>
                      <input type="checkbox" id="choix7" name="subscribe" value="choix">
                      <label for="choix7">Environnement</label><br><br>
                      <input type="checkbox" id="choix8" name="subscribe" value="choix">
                      <label for="choix8">Santé</label><br><br>
                      <input type="checkbox" id="choix9" name="subscribe" value="choix">
                      <label for="choix9">Animaux</label><br><br>
                      <input type="checkbox" id="choix10" name="subscribe" value="choix">
                      <label for="choix10">Evenement</label><br><br>
                      <input type="checkbox" id="choix11" name="subscribe" value="choix">
                      <label for="choix11">Sports</label><br><br>
                    </div>
                  </div>
                </div>
              </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection