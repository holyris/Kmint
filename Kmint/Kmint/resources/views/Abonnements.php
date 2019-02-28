<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kmint</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css"> 
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
    <!-- JS -->
    <script src="bootstrap/js/"></script>
  </head>
  <header>
  	<div class="container-fluid">
  		<div class="container">
  			<div class="row">
  			<article class="col-md-4"></article>
  			<article class="col-md-4">
  				<h2>Kmint</h2>
  			</article>
  			<article class="col-md-4">
          <form action="MonCompte.php">
  				  <input type="submit" class="btn btn-primary" id="seConnecter" value="Mon compte" />
          </form>
          <a href="index.php" id="deco">Exit</a>
  			</article>
  			</div>
  		</div>
  	</div>
  </header><br>
  <body>
    <div class="container-fluid">
    	<div class="container">
    		<div class="row">
	    	<article class="col-md-2">
	    		<a href="MonCompte.php">Retour à mon compte</a>
    		</article>
    		<article class="col-md-8">
          <h2>Mes abonnements</h2><br><br>
          <div id="petition">
            <h2>Pétitions</h2><br>
            <input type="checkbox" id="choix1" name="subscribe" value="choix">
            <label for="choix1">Sport</label><br><br>
            <input type="checkbox" id="choix2" name="subscribe" value="choix">
            <label for="choix2">Politique</label><br><br>
            <input type="checkbox" id="choix3" name="subscribe" value="choix">
            <label for="choix3">Environnement</label><br><br>
            <input type="checkbox" id="choix4" name="subscribe" value="choix">
            <label for="choix4">Santé</label><br><br>
          </div>
          <div id="leveefond">
            <h2>Levée de fonds</h2><br>
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
    		</article>
    		<article class="col-md-2"></article>
    	</div>
    </div>
  </body>
</html>