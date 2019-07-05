<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    <script type="text/javascript">
        // function validationFormulaire() {
        //     let x = document.forms["monForm"]["message"].value;
        //     if (x == null || x == '') {
        //         alert("Veuillez saisir le champ message svp");
        //         return false;
        //      }
        //  }
    </script>
    <style>
    </style>
</head>

<body>
    <?php
        
        if (isset($_POST["valider"])) {// là on s'assure que la fonction ne s'exécute que si validation du form
               
            $nom = htmlspecialchars($_POST['nom']);
            if(isset($_POST["prenom"])) {
                $prenom = htmlspecialchars($_POST["prenom"]);
                echo "bonjour monsieur " . $nom . "&nbsp" . $prenom . "<br/>";
            }
            else {
                $prenom = NULL;
            }

            if(!isset($_POST["message"]) || ($_POST["message"] == "")) {//si la donnée n'existe pas
                echo "Vous avez oublié d'insérer un message <br/>";
            }
            else {
                $message = htmlspecialchars($_POST["message"]);
            }
            if(!isset($_POST["mail"]) || ($_POST["mail"] == "")) {//si la donnée n'existe pas
                // echo "Vous avez oublié d'insérer votre mail <br/>";
                $_POST["mail"] = '';
            }
            elseif (isset($_POST['autorisation'])) { 
                $adresseMail = htmlspecialchars($_POST["mail"]);
                $db = new PDO('mysql:host=exmachinefmci.mysql.db;dbname=exmachinefmci;charset=utf8', 'exmachinefmci',
                 'carp310M');
                 $result = $db->prepare('INSERT INTO bpredotMail (mail) VALUES (:adresseMail)');
                 $result->execute(array('adresseMail' => $adresseMail));
                //$nom_du_serveur = "exmachinefmci.mysql.db";
                //nom_de_la_base = "exmachinefmci";
                //$nom_utilisateur = "exmachinefmci";
                //$passe = "carp310M";


                $message_mail = "Vous avez reçu un message via votre site internet, de la part 
                de : " .htmlspecialchars($_POST["mail"]) . ' le voici : ' .htmlspecialchars($_POST["message"]);
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $headers .= 'From: ' .htmlspecialchars($_POST["mail"])."\r\n".'Reply-To: '
                .htmlspecialchars($_POST["mail"])."\r\n".'X-Mailer: PHP/' . phpversion();
                
                mail("bruno.predot@gmail.com", "Formulaire de contact CV", $message_mail);
                echo "Votre mail a bien été envoyé !";
            }
         
        }
    ?>
   <fieldset>
   <legend>Contact</legend>
   <p>Afin de nous joindre, merci de remplir les informations suivantes :</p>
    <form action="contact.php" method="post" name="monForm" onsubmit="return validationFormulaire()">
        <p>
            <label for="nom">Nom*</label><br/>
            <input type="text" name="nom"  id="nom" required placeholder="écrire ici" autofocus>
        </p>
        <p>
            <label for="prenom">Prénom*</label><br/>
            <input type="text" name="prenom"  id="prenom" required placeholder="écrire ici">
        </p>
        <p>
            <label for="mail">Mail*</label><br/>
            <input type="email" name="mail"  id="mail" placeholder="mail uniquement">
        </p>
        <p>
            <label for="tel">Téléphone</label><br/>
            <input type="tel" name="tel" id="tel" placeholder="10 chiffres max" maxlength="10">
        </p>
        <p>
            <label for="message">Votre message*</label><br/>
            <textarea cols=40 rows=5 name="message"  id="text" placeholder="écrire ici, 400 caractères max." maxlength="400"></textarea>
        </p>
        <p>
            <label for="donnees">Conserver les données</label>
            <input type="checkbox" name="autorisation" id="donnees">
        </p>
        <p>* = champ obligatoire</p>
        
        <p>
            <input type="reset"> <input type="submit" name="valider" value="valider">
        </p>

    </form>
    </fieldset>
    <p>
        <a href="index.html" title="vers l'index">vers index</a>
    </p>
</body></html>
