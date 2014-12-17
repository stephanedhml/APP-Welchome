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
    $results =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE Localisation LIKE '%$requete%' OR logement.Type_logement LIKE '%$requete%' ORDER BY id DESC");
    return $results;
}

//Fonction de publication_annonce
function inserer_annonce()
{
    global $bdd;
    $localisation = $_POST['localisation'];
    $lieu = $_POST['lieu'];
    $surface = $_POST['surface'];
        $nom_maison = $_POST['nom_maison'];
        $nb_personne = $_POST['nb_personne'];
        $logement = $_POST['logement'];
        $nb_chambres = $_POST['nb_chambres'];
        $nb_salle_bain = $_POST['nb_salle_bain'];
        $description = $_POST['description'];
    $req = $bdd->prepare("INSERT INTO logement(Localisation,Type_endroit,Nom_maison,Nombre_voyageurs,Type_logement,Nb_chambres,Nb_salles_bain,superficie,Description)
VALUES($localisation,$lieu $nom_maison, $nb_personne, $logement, $nb_chambres, $nb_salle_bain,$surface, $description)");

    return $req;
}



function publier_annonce()
{
    global $bdd;

    $req = $bdd->prepare("INSERT INTO logement(Localisation,Type_endroit,Nom_maison,Nombre_voyageurs,Type_logement,Nb_chambres,Nb_salles_bain,superficie,Description)
VALUES(:localisation,:lieu, :nom_maison, :nb_personne, :logement, :nb_chambres, :nb_salle_bain,:surface, :description)");
    $req->execute(array
    (
        'localisation' => $_POST['localisation'],
        'lieu' => $_POST['lieu'],
        'nom_maison' => $_POST['nom_maison'],
        'nb_personne' => $_POST['nb_personne'],
        'logement' => $_POST['logement'],
        'nb_chambres' => $_POST['nb_chambres'],
        'nb_salle_bain' => $_POST['nb_salle_bain'],
        '' => $_POST['nb_salle_bain'],
        'description' => $_POST['description'],
    ));
    return $req;
}
// Fonction de recherche_avancée.php

function resultats_requete_avancee()
{
    global $bdd;
    if (isset($_POST['ville'])) {
        $lieu = htmlspecialchars($_POST['ville']);
    }
    if (isset($_POST['capacite'])) {
        $capacite = htmlspecialchars($_POST['capacite']);
    }
    if (isset($_POST['type1'])) {
        $type1 = htmlspecialchars($_POST['type1']);
    }
    if (isset($_POST['type2'])) {
        $type2 = htmlspecialchars($_POST['type2']);
    }
    if (isset($_POST['type3'])) {
        $type3 = htmlspecialchars($_POST['type3']);
    }
    if (isset($_POST['type4'])) {
        $type4 = htmlspecialchars($_POST['type4']);
    }
    if (isset($_POST['type5'])) {
        $type5 = htmlspecialchars($_POST['type5']);
    }
    if (isset($_POST['type6'])) {
        $type6 = htmlspecialchars($_POST['type6']);
    }
    if (isset($_POST['type7'])) {
        $type7 = htmlspecialchars($_POST['type7']);
    }
    if (isset($_POST['surface_min'])) {
        $surface_min = htmlspecialchars($_POST['surface_min']);
    }
    if (isset($_POST['nb_room'])) {
        $chambres = htmlspecialchars($_POST['nb_room']);
    }
    if (isset($_POST['nb_bathroom'])) {
        $bathroom = htmlspecialchars($_POST['nb_bathroom']);
    }
    if (isset($_POST['lieu1'])) {
        $lieu1 = htmlspecialchars($_POST['lieu1']);
    }
    if (isset($_POST['lieu2'])) {
        $lieu2 = htmlspecialchars($_POST['lieu2']);
    }
    if (isset($_POST['lieu3'])) {
        $lieu3 = htmlspecialchars($_POST['lieu3']);
    }
    if (isset($_POST['lieu4'])) {
        $lieu4 = htmlspecialchars($_POST['lieu4']);
    }



    if (isset($capacite)) {
        $message1 = "AND Nombre_voyageurs >= $capacite";
    }
    if (isset($type1)) {
        $message2 = " AND Type_logement LIKE '%$type1%'";
    }
    if (isset($type2)) {
        $message3 =  " AND Type_logement LIKE '%$type2%'";
    }
    if (isset($type3)) {
        $message4 =  " AND Type_logement LIKE '%$type3%'";
    }
    if (isset($type4)) {
        $message5 =  " AND Type_logement LIKE '%$type4%'";
    }
    if (isset($type5)) {
        $message6 =  " AND Type_logement LIKE '%$type5%'";
    }
    if (isset($type6)) {
        $message7 =  " AND Type_logement LIKE '%$type6%'";
    }
    if (isset($type7)) {
        $message8 =  " AND Type_logement LIKE '%$type7%'";
    }
    if (isset($surface_min)) {
        $message9 =  "AND superficie >= $surface_min";
    }
    if (isset($chambres)) {
        $message10 = "AND Nb_chambres >= $chambres";
    }
    if (isset($bathroom)) {
        $message11 = "AND Nb_salles_bain >= $bathroom";
    }
    if (isset($lieu1)) {
        $message12 = " AND Type_endroit LIKE '%$lieu1%'";
    }
    if (isset($lieu2)) {
        $message13 = " AND Type_endroit LIKE '%$lieu2%'";
    }
    if (isset($lieu3)) {
        $message14 = " AND Type_endroit LIKE '%$lieu3%'";
    }
    if (isset($lieu4)) {
        $message15 =" AND Type_endroit LIKE '%$lieu4%'";
    }

    $results =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE
 Localisation LIKE '%$lieu%'
  $message1
  $message2
  $message3
  $message4
  $message5
  $message6
  $message7
  $message8
  $message9
  $message10
  $message11
  $message12
  $message13
  $message14
  $message15
  ORDER BY id DESC");

    return $results;
}


 /*AND Nombre_voyageurs >= $capacite
 AND Type_logement LIKE '%$type1%'
 AND Type_logement LIKE '%$type2%'
 AND Type_logement LIKE '%$type3%'
 AND Type_logement LIKE '%$type4%'
 AND Type_logement LIKE '%$type5%'
 AND Type_logement LIKE '%$type6%'
 AND Type_logement LIKE '%$type7%'
 AND superficie >= $surface_min
 AND Nb_chambres >= $chambres
 AND Nb_salles_bain >= $bathroom
 AND Type_endroit LIKE '%$lieu1%'
 AND Type_endroit LIKE '%$lieu2%'
 AND Type_endroit LIKE '%$lieu3%'
 AND Type_endroit LIKE '%$lieu4%'
   ; */



//Fonctions de sign_up.php

function add_user_datas()
{
global $bdd;
    // Hachage du mot de passe
	$pass_hache = sha1($_POST["password"]);
    $req = $bdd->prepare("INSERT INTO users(username,password,email,avatar,lastname,firstname,genre,tel) VALUES(:username, :password, :email, :avatar, :lastname, :firstname, :genre, :tel)");
    $req->execute(array
    (
        'username' => $_POST["username"],
        'password' => $pass_hache,
        'email' => $_POST["email"],
        'avatar' => $_POST["avatar"],
		'lastname' => $_POST["lastname"],
        'firstname' => $_POST["firstname"],
        'genre' => $_POST["genre"],
        'tel' => $_POST["tel"],
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

function ajout_favoris($demandeur, $proprietaire)
{
    global $bdd;
    $res = $bdd -> prepare("SELECT user1, user2 FROM echange WHERE id_proprietaire=?");
    $res -> execute(array($proprietaire));
    $res -> fetch();

    if ($user1=1 AND $user2=1) {
        $req = $bdd -> prepare("INSERT INTO favoris(id_user,id_ami, friend) VALUES(:username, :friend_username, :ami)");
        $req -> execute(array(
            'username' => $proprietaire,
            'friend_username' => $demandeur,
            'ami' => 1,
        ));
    }
}
?>
