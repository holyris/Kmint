<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kmint</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css"> 
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
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
	    		</article>
	    		<article class="col-md-8" id="connect">
	    			<p>
            Entrez votre e-mail pour recevoir un nouveau lien<br> 
            vous permettant de créer un nouveau mot de passe.
            </p>
            <label for="login">E-mail : </label>
            <input type="mail" id="login" name="login" placeholder="Steve230@orange.fr"><br><br>
            <form action="Connexion.php">
              <input type="submit" class="btn btn-success" value="Réinitialiser le mot de passe" />
            </form>
            <a id="actuel" href="Connexion.php">Retour à la page de connexion</a>
	    		</article>
	    		<article class="col-md-2">
	    		</article>
	    	</div>
    	</div>
    </div>
  </body>
</html>