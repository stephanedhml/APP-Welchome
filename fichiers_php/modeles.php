<?php
require("config.php");

//Fonction de connexion.php

function recuperer_psswd_user()
{
    global $bdd;

    $req = $bdd->prepare("SELECT password, id FROM users WHERE username = ?");
    $req->execute(array($_POST['username']));
    $dn = $req->fetch();
    return $dn;
}



//Fonction de moteur_de_recherche.php

function resultats_requete_simple()
{
    global $bdd;
    $requete = htmlspecialchars($_POST['requete']);
    $results =$bdd->query("SELECT * FROM logement WHERE Localisation LIKE '%$requete%' ORDER BY id DESC");
    return $results;
}

//Fonctions de sign_up.php

function add_user_datas()
{
global $bdd;
    // Hachage du mot de passe
    $pass_hache = sha1($_POST["password"]);
    $req = $bdd->prepare("INSERT INTO users(username,password,email,avatar) VALUES(:username, :pass_hache, :email, :avatar'");
    $req->execute(array
    (
        'username' => $_POST["username"],
        'password' => $pass_hache,
        'email' => $_POST["email"],
        'avatar' => $_POST["avatar"],
    ));
    return $req;
}
function recuperer_username()
{
    global $bdd;
    $req = $bdd->prepare('SELECT id FROM users WHERE username=?');
    $req->execute(array($_POST['username']));
    $res = $req->fetch();

    return $res;
}
?>
