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
	    			<h2>Connexion</h2><br>
            <label for="login">E-mail : </label>
            <input type="mail" id="login" name="login" placeholder="Steve230@orange.fr"><br><br>

            <label for="password">Mot de passe : </label>
            <input type="password" id="password" name="password"><br>
            <a href="MdpOublie.php">Mot de passe oublié ?</a>
            <form action="Connected.php">
              <input type="submit" class="btn btn-success" value="Connexion" />
            </form>
            <p>Vous n'avez pas de compte ?<a href="Inscription.php">Inscription</a></p>
	    		</article>
	    		<article class="col-md-2">
	    		</article>
	    	</div>
    	</div>
    </div>
  </body>
</html>