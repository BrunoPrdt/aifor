<?php
//! connect_mysql.php ou config.inc.php pour nommer ce fichier php par convention pour servir de require

//on va créer les variables correspondant à notre connection phpmyadmin:
$host = "https://phpmyadmin.ovh.net/index.php?pma_username=exmachinefmci&pma_servername=exmachinefmci.mysql.db";
//je cible la bdd distante
$bd = "bpredotMail";// le nom de notre base de données à cibler
$user = "exmachinefmci";// nom d'utilisateur
$password = "carp310M";// le mdp

//voici la ligne de connexion à la base de donnée :
try {//commande qui va d'abbord tester le code !
    $base = new PDO("mysql:host=$host;dbname=$bd" ,$user ,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}//si il y a une erreur dans le bloc try, la commande catch va capturer l'erreur
catch (Exception $e) {//le $e va récupérer le msg d'erreur du code précédent
    die("Erreur : " . $e->getMessage());//die va arrêter le code
}

?>