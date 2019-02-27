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
          <h2>Mes informations personelles</h2><br><br>
          <p>
            E-mail : Steve230@orange.fr<br><br>
            Souhaitez vous recevoir des notifications <br> 
            concernant les pétitions que vous avez signés ?<br>
            <label for="oui">Oui</label> 
            <input type="checkbox" id="oui" name="subscribe" value="Oui">
            <label for="non">Non</label>
            <input type="checkbox" id="non" name="subscribe" value="Non">
          </p>
          <form action="MonCompte.php">
            <input type="submit" class="btn btn-success" value="Ok" />
          </form>
    		</article>
    		<article class="col-md-2"></article>
    	</div>
    </div>
  </body>
</html>