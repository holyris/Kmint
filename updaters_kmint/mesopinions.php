
<?php
header('Content-type: text/html; charset=utf-8');

$servername = "164.132.195.3";
$username = "thebault";
$password = "thebault";
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

$sql = "select lien from petition";
$liens = $conn->query($sql);  //prend tous les liens existants dans la bd et le met dans $liens

if (mysqli_num_rows($liens) > 0) {
    // donne les donnees de chaque ligne
    while($row = mysqli_fetch_assoc($liens)) {

        //  met les donnees de la page dans $codesource
        $codesource = file_get_contents("https://www.mesopinions.com".$row["lien"]);

        //  prend les signatures sur la page
        preg_match_all("#<b class=\"colr\">(.+)</b>#", $codesource, $tab_signature, PREG_SET_ORDER);
        
        $signature = $tab_signature[0][1];
        echo "</pre>";
        print_r($signature);
        echo "</pre>";
        if ($stmt = mysqli_prepare($conn, "UPDATE petition SET signature = ?")) {

            mysqli_stmt_bind_param($stmt, 's', $signature);
            mysqli_stmt_execute($stmt);            
            mysqli_stmt_close($stmt);
        } else {
            print_r("ya une erreur je crois");
        }


    }
}







mysqli_close($conn);


?>
