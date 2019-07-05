<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script type="text/javascript">
        // function validationFormulaire(){
        //     var x = document.forms["monForm"]["message"].value;
        //     if (x == null || x == ""){
        //         alert ("Vous avez oublié d'insérer un message");
        //         return false;
        //     }
        // }
    
    
    </script>
</head>

<body>

<a href="index.php">Retour</a><br><br>

<?php




if (isset($_POST['envoi'])) {
    if (!isset($_POST["message"]) || $_POST["message"]=="") {
        echo ("Vous n'avez pas entré de message.<br><br>");
    }
    else {
        if (!isset($_POST['email']) || $_POST['email'] =='') {
            $_POST['email'] = '';
        }
        elseif (isset($_POST['autorisation'])) {
            $adresseMail = $_POST['email'];
            $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci',
            'carp310M');
            $result = $db->prepare('INSERT INTO clevasseurMail (email) VALUES (:adresseMail)');
            $result->execute(array('adresseMail' => $adresseMail));
        }
        
        $message='Vous avez reçu un message via votre site internet, le voici : <br>' . $_POST["message"];

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type : text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From : '.$_POST['email'] ."\r\n". 'Reply-To: '. $_POST['email']."\r\n".'X-Mailer: PHP/'.phpversion();

        mail ('levasseur.clementine@gmail.com', 'Formulaire de contact Exmachina', $message, $headers);

        echo("Votre mail a bien été envoyé .<br><br>");
    }
}



?>

    

    <fieldset>
        <legend>CONTACT</legend>


        <form method= "post" name="monForm" onsubmit="return validationFormulaire()">
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" autofocus required><br><br>

            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" id="prenom"><br><br>

            <label for="telephone">Téléphone</label><br>
            <input type="tel" name="telephone" id="telephone"><br><br>

            <label for="email">E-mail</label><br>
            <input type=email name="email" id="email"><br><br>

            <label for="message">Votre message</label><br>
            <textarea cols="20" rows="5" name="message" id="message" placeholder="Tapez votre message ici."></textarea><br><br>

            <p>Autorisez-vous la conservation de vos données ?</p>
            <label for="autorisation">oui</label>
            <input type="checkbox" name="autorisation">


            <input type="submit" name="envoi" value="Envoyer le message"><br><br>


        </form>
    </fieldset>



</body>

</html>