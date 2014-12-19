<?php
require("config.php");
function add_user_datasprofil()
{
global $bdd;
	$reqprofil = $bdd->prepare("INSERT INTO users(nom_user,prenom_user,genre,tel) VALUES(:lastname, :firstname, :genre, :tel'");
    $reqprofil->execute(array
    (
        'lastname' => $_POST["lastname"],
        'firstname' => $_POST["firstname"],
        'genre' => $_POST["genre"],
        'tel' => $_POST["tel"],
    ));
    return $reqprofil;
}

?>