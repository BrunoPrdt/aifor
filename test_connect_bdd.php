<?php
require_once("connect_mysql.php");

//SELECT * FROM films WHERE Titre= "Camping 1";

$reponse = $base->query("SELECT * FROM films WHERE Titre= 'Camping 1'");
echo "Nombre de films : " . $reponse->rowCount() . "<br/>";//va compter de nombre de ligne affectées par le dernier appel de la fonction

while ($film = $reponse->fetch()) {//fetch va aller chercher un par un nos données et les mettre dans $films
    echo "Titre : " . $film["Titre"] . "<br/>";
    echo "Auteur : " . $film["Auteur"] . "<br/>";
    echo "Année : " . $film["Annee"] . "<br/>";
}
$reponse->closeCursor();//ferme le curseur permettent à la requête d'être de nouveau exécutée.

?>