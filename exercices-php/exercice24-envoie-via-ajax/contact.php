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
			if(isset($_POST['autorisation']){
				$nom_du_serveur ="exmachinefmci.mysql.db";
				$nom_de_la_base ="exmachinefmci";
				$nom_utilisateur ="exmachinefmci";
				$passe ="carp310M";
	 
				//Connexion à la base
				mysql_connect("$nom_du_serveur","$nom_utilisateur","$passe");
				mysql_select_db("$nom_de_la_base") OR die( "ERREUR de connexion : " . mysql_error () );
	 
				//insérer les données
				$sql = mysql_query("INSERT INTO `tvinchentMail` (
				`mail`
				)
				VALUES (
				".$adresseMail."
				);
	 
				");
			}

		$message = 'Vous avez recu un message via votre site internet, le voici:<br>'.$_POST['messageContact'];

		// changer le header du message permettra de pouvoir specifier un expediteur mais vous tomberez dans les spams sur la plupart des plateformes de mail
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: '.$_POST['email']."\r\n".'Reply-To: '.$_POST['email']."\r\n".'X-Mailer: PHP/'.phpversion();
		date_default_timezone_set("Europe/Paris");

		mail('tvinchent@gmail.com', 'Formulaire de contact Exmachina', $message, $headers);

		// confirmation
		echo('Votre message a &eacute;t&eacute; envoy&eacute;<br>');
		}
	}
	?>