<!DOCTYPE html>
<html lang="en">
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
    $adresseMail = $_GET['email'];
    $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');

    $selectall = $db->query('SELECT * FROM clevasseurMail WHERE email="'.$adresseMail.'"');
    $result = $selectall->fetch();
    $counttable = (count($result));

    if($counttable >= 1){
        $delete = $db->prepare('DELETE FROM clevasseurMail WHERE email="'.$adresseMail.'"');
        $delete->execute();
    }	

    // confirmation de suppression
    echo('Vous &ecirc;tes bien desabonn&eacute;s de notre liste de diffusion');
}


?>

</body>
</html>