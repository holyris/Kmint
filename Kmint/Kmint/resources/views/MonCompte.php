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
	    		<a href="Connected.php">Retour à mon flux</a>
    		</article>
    		<article class="col-md-8">
	            <h2>Mon compte</h2><br><br>
	            <a href="InformationsPerso.php">Mes informations personelles</a><br>
	            <a href="Favoris.php">Mes favoris</a><br>	
	            <a href="Abonnements.php">Mes abonnements</a><br>
    		</article>
    		<article class="col-md-2">
	    	</article>
    	</div>
    </div>
  </body>
</html>