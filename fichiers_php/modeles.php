<?php
require("config.php");

//Fonction de annonce.php

function recherche_annonce()
{
    global $bdd;
    $annonce = htmlspecialchars($_GET['id'] );
    $recherche_id =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE id=$annonce ");
    $donnees = $recherche_id->fetch();
    return $donnees;
}

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

function resultats_requete_simple($requete)
{
    global $bdd;
    $results =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE Localisation LIKE '%$requete%' ORDER BY id DESC");
    return $results;
}

//Fonction de publication_annonce.php

function inserer_logement()
{
    global $bdd;
    $req = $bdd->prepare("INSERT INTO `welchome`.`logement` (`id`, `Localisation`, `Nombre de voyageurs`, `Type de logement`, `Description`) VALUES (NULL, :localisation, :nb_personne, :logement, :description)");

    $req->execute(array(

        'localisation' => $_POST['localisation']
        'nb_personne' => $_POST['nb_personne']
        'logement' => $_POST['logement']
        'description' => $_POST['description']

        ));
    return $req;
}
// Fonction de recherche_avancée.php

function test_destruction($a)
{
    if($a!=='on')
    {
        unset($a);
    }
}

function resultats_requete_avancée()
{
    global $bdd;
    $lieu=htmlspecialchars($_POST['ville']);
    $capacité=htmlspecialchars($_POST['nombre']);




    $results =$bdd->query("SELECT * FROM logement WHERE Localisation LIKE '%$lieu%'
                                                  
ORDER BY id DESC");
    //cherche comment afficher le contenu des cases cocher dans la requete
    
    return $results;
}
//On détruit les variables associéés aux cases non coché
/*test_destruction($_POST["type1"]);
test_destruction($_POST["type2"]);
test_destruction($_POST["type3"]);
test_destruction($_POST["type4"]);
test_destruction($_POST["type5"]);
test_destruction($_POST["type6"]);
test_destruction($_POST["type7"]);
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
test_destruction($_POST["case12"]);*/


//Fonctions de sign_up.php

function add_user_datas()
{
global $bdd;
    // Hachage du mot de passe
	$pass_hache = sha1($_POST["password"]);
    $req = $bdd->prepare("INSERT INTO users(username,password,email,avatar) VALUES(:username, :password, :email, :avatar'");
    $req->execute(array
    (
        'username' => $_POST["username"],
        'password' => $pass_hache,
        'email' => $_POST["email"],
        'avatar' => $_POST["avatar"]
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
