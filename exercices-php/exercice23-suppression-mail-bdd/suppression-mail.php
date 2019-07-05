<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
	<title>Thibault Vinchent Resume</title>
	<link rel="stylesheet" href="style/cv-responsive.css">
</head>
<body>
	<h1>Suppression du mail</h1>

	<?php
	
	if($_GET['email']){
		$adresseMail = $_GET['email'];
		//$db = new PDO('mysql:host=localhost;dbname=cv;charset=utf8', 'root', 'root');
		$db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');

		$selectall = $db->query('SELECT * FROM tvinchentMail WHERE mail="'.$adresseMail.'"');
        $result = $selectall->fetch();
        $counttable = (count($result));

        if($counttable >= 1){
            $delete = $db->prepare('DELETE FROM tvinchentMail WHERE mail="'.$adresseMail.'"');
            $delete->execute();
        }	

		// confirmation de suppresion
		echo('Votre &ecirc;tes bien desabonn&eacute; de notre liste de diffusion');
}
	?>

</body>
</html>