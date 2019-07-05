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
			echo('Vous avez oublié d\'insérer un message<br>');
		}
	}
	?>

	<form name="formContact" onsubmit="return validationFormulaire()" enctype="application/x-www-form-urlencoded" method="post" action="#">
		Nom:<br>
		<input type="text"><br>
		Adresse mail:<br>
		<input type="email"><br>
		T&eacute;l&eacute;phone:<br>
		<input type="tel"><br>
		Message:<br>
		<textarea id="form-textarea" name="messageContact"></textarea><br>
		<input type="checkbox"> Je vous autorise &agrave; conserver ces coordonn&eacute;es<br>
		<input type="submit" name="envoie" value="Envoyer">
	</form>

</body>
</html>