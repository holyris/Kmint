<!-- Scraper php pour le site mesopinions.com -->

<?php
header('Content-type: text/html; charset=utf-8');

//  Chez alexandre, a mettre en commentaire
$servername = "164.132.195.3";
$username = "thebault";
$password = "thebault";
$dbname = "kmint";

//  Pour le serveur, a mettre en commentaire
// $servername = "localhost";
// $username = "kmint";
// $password = "kmint123";
// $dbname = "kmint";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}


//  Modification du jeu de résultats en utf8 
if (!mysqli_set_charset($conn, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($conn));
    exit();
}

/* 
*   $i : numero de page
*/
for($i = 1; $i < 30 ; $i++){
    //  page où l'on scrap les données
    $codesource = file_get_contents("https://www.mesopinions.com/petition/page".$i);

    //  scraping titre
    preg_match_all("#<a class=\".+\" href=\".+\" title=\"(.+)\">#", $codesource, $tab_title[$i], PREG_SET_ORDER);

    //  scraping description
    preg_match_all("#<p>(.+)</p>#", $codesource, $tab_description[$i], PREG_SET_ORDER);

    //  scraping lien
    preg_match_all("#<a class=\".+\" href=\"(.+)\" title=\".+\">#", $codesource, $tab_link[$i], PREG_SET_ORDER);

    //  scraping lien image
    preg_match_all("#<img src=\"/public/img/((category|petition)/.*)\" alt=.+ #", $codesource, $tab_img[$i], PREG_SET_ORDER);

    //  scraping auteur
    preg_match_all("#<span>Auteur : (.+)</span>#", $codesource, $tab_author[$i], PREG_SET_ORDER);

    // scraping nombre signature
    preg_match_all("#<b>(.+) </b>#", $codesource, $tab_signature[$i], PREG_SET_ORDER);
    
    //  scraping categorie
    preg_match_all("#<a class=\".+\" href=\"/petition/(.+)/.+/.+\" title=\".+\">#", $codesource, $tab_categorie[$i], PREG_SET_ORDER);

    // $m permet d'eviter les deux premieres données dans $tab_description
    // car dans le code html certaines division se confondent
    $m = 3;

    /*
    *   $j : numéro de la petition sur la page
    */
    for($j = 0; $j < 12; $j++){
        $title = $tab_title[$i][$j][1];
        $description = html_entity_decode($tab_description[$i][$m][1]); //enleve les entités chelou de l'html        
        $link = $tab_link[$i][$j][1];
        $img = $tab_img[$i][$j][1];
        $author = $tab_author[$i][$j][1];
        $signature = $tab_signature[$i][$j][1];
        $categorie = $tab_categorie[$i][$j][1];
        $site = "mesopinions";
        if ($stmt = mysqli_prepare($conn, "INSERT INTO petition VALUES(?,?,?,?,?,?,?,?, CURRENT_TIMESTAMP)")) {

            mysqli_stmt_bind_param($stmt, "ssssssss", $title, $description, $link, $img, $author, $signature, $categorie, $site);
            mysqli_stmt_execute($stmt);            
            mysqli_stmt_close($stmt);
        }

        $m++;        
    }    
    
}

mysqli_close($conn);
?>