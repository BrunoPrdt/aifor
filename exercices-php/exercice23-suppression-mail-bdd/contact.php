<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
	<title>Thibault Vinchent Resume</title>
	<link rel="stylesheet" href="style/cv-responsive.css">
	<script type="text/javascript">
	function validationFormulaire() {
	    var x = document.forms["formContact"]["messageContact"].value;
	    if (x == null || x == "") {
	        alert("Vous avez oublié d'insérer un message");
	        return false;
	    }
	}
	</script>
</head>
<body>
	<h1>Formulaire de contact</h1>

	<?php
	if (isset($_POST['envoie'])) {
		if (!isset($_POST['messageContact']) || $_POST['messageContact']=='') {
			echo('Vous avez oublié d\'ins&eacute;rer un message<br>');
		}
		else{
			// assignation de la varaiable mail si aucune adresse mail renseignée
			if (!isset($_POST['email']) || $_POST['email']=='') {
				$_POST['email']='';
			}
			elseif(isset($_POST['autorisation'])){
				$adresseMail = $_POST['email'];
				$db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci', 'carp310M');
				$result = $db->prepare('INSERT INTO tvinchentMail (mail) VALUES(:adresseMail)');
				$result->execute(array('adresseMail' => $adresseMail));
					// $nom_du_serveur ="exmachinefmci.mysql.db";
					// $nom_de_la_base ="exmachinefmci";
					// $nom_utilisateur ="exmachinefmci";
					// $passe ="carp310M";
		 
					// //Connexion à la base
					// mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
					// mysql_select_db("$nom_de_la_base") OR die( "ERREUR de connexion : " . mysql_error () );
		 
					// //insérer les données
					// $sql = mysql_query("INSERT INTO `tvinchentMail` (
					// `votremail`
					// )
					// VALUES (
					// '$adresseMail', 
					// '$objet', 
					// '$message'
					// );
		 
					// ");
		 
					// //Si il y a une erreur
					// if (!$sql)
					// {
					// //	die ( 'Erreur de requête : ' . mysql_error() );
					// }
					// //Si tout va bien
					// else
					// {
					// //	echo 'et enregistré dans la base de donnée.';
					// }
					// //Déconnexion
					// mysql_close();
			
					// }; 
			}

			$message = 'Vous avez recu un message via votre site internet, le voici:<br>'.$_POST['messageContact'];

			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$headers .= 'From: '.$_POST['email']."\r\n".'Reply-To: '.$_POST['email']."\r\n".'X-Mailer: PHP/' . phpversion();
			
			mail('tvinchent@gmail.com', 'Formulaire de contact Exmachina', $message, $headers);

			// confirmation
			echo('Votre message a &eacute;t&eacute; envoy&eacute;<br>');
		}
	}
	?>

	<form name="formContact" onsubmit="return validationFormulaire()" enctype="application/x-www-form-urlencoded" method="post" action="#">
		Nom:<br>
		<input type="text"><br>
		Adresse mail:<br>
		<input type="email" name="email"><br>
		T&eacute;l&eacute;phone:<br>
		<input type="tel"><br>
		Message:<br>
		<textarea id="form-textarea" name="messageContact"></textarea><br>
		<input type="checkbox" name="autorisation"> Je vous autorise &agrave; conserver ces coordonn&eacute;es<br>
		<input type="submit" name="envoie" value="Envoyer">
	</form>

</body>
</html>