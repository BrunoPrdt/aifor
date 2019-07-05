<!-- Méthode en $_GET -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Suppression du mail</h1>

<?php

if($_GET['email']){
    $adresseMail = htmlspecialchars($_GET['email']);
    //$db = new PDO('mysql:host=localhost;dbname=cv;charset=utf8', 'root', 'root');
    $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');

    $selectall = $db->query('SELECT * FROM bpredotMail WHERE mail="'.$adresseMail.'"');
    $result = $selectall->fetch();
    $counttable = (count($result));

    if($counttable >= 1){
        $delete = $db->prepare('DELETE FROM bpredotMail WHERE mail="'.$adresseMail.'"');
        $delete->execute();
    }	

    // confirmation de suppresion
    echo('Votre &ecirc;tes bien desabonn&eacute; de notre liste de diffusion');
}
?>
        
</body>
</html>