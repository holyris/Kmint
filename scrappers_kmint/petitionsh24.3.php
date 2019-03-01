<!-- Scraper php pour le site petitionsh24.net -->

<?php
header('Content-type: text/html; charset=utf-8');

//  Chez alexandre, a mettre en commentaire
// $servername = "164.132.195.3";
// $username = "thebault";
// $password = "thebault";
// $dbname = "kmint";

//  Pour le serveur, a mettre en commentaire
$servername = "localhost";
$username = "kmint";
$password = "kmint123";
$dbname = "kmint";

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
for($i = 1; $i < 3 ; $i++){
    //  page où l'on scrap les données
    $codesource = file_get_contents("https://www.petitions24.net/browse.php?page=".$i."&order_by=petition_created&sort_order=desc");

    //  scraping titre
    preg_match_all("#<span class=.+>(.+)</span>#", $codesource, $tab_title[$i], PREG_SET_ORDER);
    
    //  scraping description
    preg_match_all("#<div class=.+>(.+)</div>#", $codesource, $tab_description[$i], PREG_SET_ORDER);

    //  scraping lien
    preg_match_all("#<a title=.+ class=.+ data-petition_id=.+ href=\"(.+)\"> <span class=.+>.+</span></a>#", $codesource, $tab_link[$i], PREG_SET_ORDER);

    // scraping auteur
    // for($j = 0; $j < 50 ; $j++){

    //     $codesource2 = file_get_contents("https://www.petitions24.net".$tab_link[$i][$j][1]);
    //     preg_match_all("#<p style=.+><b>(.+)</b>#", $codesource2, $tab_author[$i], PREG_SET_ORDER);
    // }
    
    // scraping nombre signature
    preg_match_all("#<td colspan=.+ style=.+>(.+)</td>#", $codesource, $tab_signature[$i], PREG_SET_ORDER);
    
  

    /*
    *   $j : numéro de la petition sur la page
    */
    for($j = 0; $j < 10; $j++){
        $title = html_entity_decode($tab_title[$i][$j][1]);        
        $description = html_entity_decode($tab_description[$i][$j+1][1]); //enleve les characteres chelou de l'html        
        $link = $tab_link[$i][$j][1];
        $img = "https://trybun.org.pl/wp-content/uploads/2017/08/petycje.online.jpg";  //les petitions n'ont pas d'images donc on remplace par le logo du site
        $signature = $tab_signature[$i][$j][1];
        $site = "petitions24";
        $null = NULL;        
        if ($stmt = mysqli_prepare($conn, "INSERT INTO petition VALUES(?,?,?,?,?,?,?,?, CURRENT_TIMESTAMP)")) {

            mysqli_stmt_bind_param($stmt, "ssssssss", $title, $description, $link, $img, $null, $signature, $null,$site);
            mysqli_stmt_execute($stmt);            
            mysqli_stmt_close($stmt);
        } else {
            printf("erreur d'insert \n");
        }
    }    
    
}




mysqli_close($conn);
?>