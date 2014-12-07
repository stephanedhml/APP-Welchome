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

// Fonction de recherche_avancée.php

function test_destruction($a)
{
    if($a==off)
    {
        unset($a);
    }
}

function resultats_requete_avancée()
{
    global $bdd;
    $lieu=$_POST['ville'];
    $nb_pers=$_POST['nombre'];

    //On détruit les variables associéés aux cases non coché
    test_destruction($_POST["choix1"]);
    test_destruction($_POST["choix2"]);
    test_destruction($_POST["choix3"]);
    test_destruction($_POST["choix4"]);
    test_destruction($_POST["choix5"]);
    test_destruction($_POST["choix6"]);
    test_destruction($_POST["choix7"]);
    test_destruction($_POST["lieu1"]);
    test_destruction($_POST["lieu2"]);
    test_destruction($_POST["lieu3"]);
    test_destruction($_POST["lieu4"]);
    test_destruction($_POST["case1"]);
    test_destruction($_POST["case2"]);
    test_destruction($_POST["case3"]);
    test_destruction($_POST["case4"]);
    test_destruction($_POST["case5"]);
    test_destruction($_POST["case6"]);
    test_destruction($_POST["case7"]);
    test_destruction($_POST["case8"]);
    test_destruction($_POST["case9"]);
    test_destruction($_POST["case10"]);
    test_destruction($_POST["case11"]);
    test_destruction($_POST["case12"]);
    test_destruction($_POST["case13"]);


    $results =$bdd->query("SELECT * FROM logement WHERE Localisation LIKE '%$lieu%'
                                                  AND Nombre de voyageurs>=$nb_pers
                                                  AND Type de logement


ORDER BY id DESC");
    //cherche comment afficher le contenu des cases cocher dans la requete
    
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
