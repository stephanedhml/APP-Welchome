<?php
require("config.php");

//Fonction de annonce.php

function recherche_annonce()
{
    global $bdd;
    $annonce = htmlspecialchars($_GET['id'] );
    $recherche_id =$bdd->query("SELECT * FROM logement NATURAL JOIN photo WHERE id_logement=$annonce ");
    $donnees = $recherche_id->fetch();
    return $donnees;
}

//Fonction de connexion.php

function recuperer_psswd_user()
{
    global $bdd;

    $req = $bdd->prepare("SELECT password, id_users FROM users WHERE username = ?");
    $req->execute(array($_POST['username']));
    $dn = $req->fetch();
    return $dn;
}



//Fonction de moteur_de_recherche.php

function resultats_requete_simple($requete)
{
    global $bdd;
    $results =$bdd->query("SELECT * FROM logement WHERE localisation LIKE '%$requete%' OR logement.type_logement LIKE '%$requete%' ORDER BY id_logement DESC");
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

    if (isset($_POST['ville']) and $_POST['ville']!='')
    {
        $lieu = htmlspecialchars($_POST['ville']);
    }
    else{$lieu = "";}

    if (isset($_POST['capacite']) and $_POST['capacite']!='')
    {
        $capacite = htmlspecialchars($_POST['capacite']);
        $message1 = "AND nombre_voyageurs >= $capacite";
    }
    else
    {
        $message1="";
    }
    if (isset($_POST['type1']) and $_POST['type1']!='' and (!isset($_POST['capacite']) or $_POST['capacite']=''))
    {
        $type1 = htmlspecialchars($_POST['type1']);
        $message2 = " AND type_logement LIKE '%$type1%'";
    }
    else if(isset($_POST['capacite']) and $_POST['capacite']!='')
    {
        $type1 = htmlspecialchars($_POST['type1']);
        $message2="OR type_logement LIKE '%$type1%'";
    }
    else
    {
        $message2="";
    }
    if (isset($_POST['type2']) and $_POST['type2']!=''  and (!isset($_POST['type1']) or $_POST['type1']=''))
    {
        $type2 = htmlspecialchars($_POST['type2']);
        $message3 =  " AND type_logement LIKE '%$type2%'";
    }
    else if(isset($_POST['type1']) and $_POST['type1']!='')
    {
        $type2 = htmlspecialchars($_POST['type2']);
        $message3="OR type_logement LIKE '%$type2%'";
    }
    else
    {
        $message3="";
    }
    if (isset($_POST['type3']) AND $_POST['type3']!='' AND (!isset($_POST['type2']) or $_POST['type2']=''))
    {
        $type3 = htmlspecialchars($_POST['type3']);
        $message4 =  " AND type_logement LIKE '%$type3%'";
    }
    else if(isset($_POST['type2']) and $_POST['type2']!='')
    {
        $type3 = htmlspecialchars($_POST['type3']);
        $message4="OR type_logement LIKE '%$type3%'";
    }
    else
    {
        $message4="";
    }
    if (isset($_POST['type4']) and $_POST['type4']!='' and (!isset($_POST['type3']) or $_POST['type3']=''))
    {
        $type4 = htmlspecialchars($_POST['type4']);
        $message5 =  " AND type_logement LIKE '%$type4%'";
    }
    else if(isset($_POST['type3']) and $_POST['type3']!='')
    {
        $type4 = htmlspecialchars($_POST['type4']);
        $message5="OR type_logement LIKE '%$type4%'";
    }
    else
    {
        $message5="";
    }
    if (isset($_POST['type5']) and $_POST['type5']!='' and (!isset($_POST['type4']) or $_POST['type4']=''))
    {
        $type5 = htmlspecialchars($_POST['type5']);
        $message6 =  " AND type_logement LIKE '%$type5%'";
    }
    else if(isset($_POST['type4']) and $_POST['type4']!='')
    {
        $type5 = htmlspecialchars($_POST['type5']);
        $message6="OR type_logement LIKE '%$type5%'";
    }
    else
    {
        $message6="";
    }
    if (isset($_POST['type6']) and $_POST['type6']!='' and (!isset($_POST['type5']) or $_POST['type5']=''))
    {
        $type6 = htmlspecialchars($_POST['type6']);
        $message7 =  " AND type_logement LIKE '%$type6%'";
    }
    else if(isset($_POST['type5']) and $_POST['type5']!='')
    {
        $type6 = htmlspecialchars($_POST['type6']);
        $message7="OR type_logement LIKE '%$type6%'";
    }
    else
    {
        $message7="";
    }
    if (isset($_POST['type7']) and $_POST['type7']!='' and (!isset($_POST['type6']) or $_POST['type6']=''))
    {
        $type7 = htmlspecialchars($_POST['type7']);
        $message8 =  " AND type_logement LIKE '%$type7%'";
    }
    else if(isset($_POST['type6']) and $_POST['type6']!='')
    {
        $type7 = htmlspecialchars($_POST['type7']);
        $message8="OR type_logement LIKE '%$type7%'";
    }
    else
    {
        $message8="";
    }
    if (isset($_POST['surface_min']) and $_POST['surface_min']!='')
    {
        $surface_min = htmlspecialchars($_POST['surface_min']);
        $message9 =  "AND superficie >= $surface_min";
    }
    else
    {
        $message9="";
    }
    if (isset($_POST['nb_room']) and $_POST['nb_room']!='')
    {
        $chambres = htmlspecialchars($_POST['nb_room']);
        $message10 = "AND nb_chambres >= $chambres";
    }
    else
    {
        $message10="";
    }
    if (isset($_POST['nb_bathroom']) and $_POST['nb_bathroom']!='')
    {
        $bathroom = htmlspecialchars($_POST['nb_bathroom']);
        $message11 = "AND nb_salles_bains >= $bathroom";
    }
    else
    {
        $message11="";
    }
    if (isset($_POST['lieu1']) and $_POST['lieu1']!='')
    {
        $lieu1 = htmlspecialchars($_POST['lieu1']);
        $message12 = " AND type_endroit LIKE '%$lieu1%'";
    }
    else
    {
        $message12="";
    }
    if (isset($_POST['lieu2']) and $_POST['lieu2']!='')
    {
        $lieu2 = htmlspecialchars($_POST['lieu2']);
        $message13 = " AND type_endroit LIKE '%$lieu2%'";
    }
    else
    {
        $message13="";
    }
    if (isset($_POST['lieu3']) and $_POST['lieu3']!='')
    {
        $lieu3 = htmlspecialchars($_POST['lieu3']);
        $message14 = " AND type_endroit LIKE '%$lieu3%'";
    }
    else
    {
        $message14="";
    }

    if (isset($_POST['lieu4']) and $_POST['lieu4']!='')
    {
        $lieu4 = htmlspecialchars($_POST['lieu4']);
        $message15 =" AND type_endroit LIKE '%$lieu4%'";
    }
    else
    {
        $message15="";
    }
    if (isset($_POST["television"])) {
        if ($_POST["television"]=='Oui') {$tele =" AND television LIKE 1";} else {$tele ="";};
    }

    if (isset($_POST["machine_a_laver"])) {
        if ($_POST["machine_a_laver"]=='Oui') {$malav =" AND machine_a_laver LIKE 1";} else {$malav ="";}
    }

    if (isset($_POST["parking"])) {
        if ($_POST["parking"]=='Oui') {$parking =" AND parking LIKE 1";} else {$parking ="";}
    }

    if (isset($_POST["climatisation"])) {
        if ($_POST["climatisation"]=='Oui') {$clim =" AND climatisation LIKE 1";} else {$clim ="";}
    }

    if (isset($_POST["piscine"])) {
        if ($_POST["piscine"]=='Oui') {$piscine =" AND piscine LIKE 1";} else {$piscine ="";}
    }

    if (isset($_POST["jardin"])) {
        if ($_POST["jardin"]=='Oui') {$jardin =" AND jardin LIKE 1";} else {$jardin ="";}
    }



    $results =$bdd->query("SELECT * FROM logement WHERE
 localisation LIKE '%$lieu%'
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
  $tele
  $malav
  $parking
  $clim
  $piscine
  $jardin

    ORDER BY id_logement DESC");

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

function ajout_favoris($demandeur, $proprietaire, $logement)
{
    global $bdd;
    $res = $bdd -> prepare("SELECT user1, user2 FROM echange WHERE id_proprietaire=?");
    $res -> execute(array($proprietaire));
    $res -> fetch();

    if ($user1=1 AND $user2=1) {
        $req = $bdd -> prepare("INSERT INTO favoris(id_user,id_ami, friend,id_logement) VALUES(:username, :friend_username, :ami, :id_logement)");
        $req -> execute(array(
            'username' => $proprietaire,
            'friend_username' => $demandeur,
            'ami' => 1,
            'id_logement' => $logement,
        ));
        $req = $bdd -> prepare("INSERT INTO favoris(id_user,id_ami, friend, id_logement) VALUES(:username, :friend_username, :ami, :id_logement)");
        $req -> execute(array(
            'username' => $demandeur,
            'friend_username' => $proprietaire,
            'ami' => 1,
            'id_logement' => $logement,
        ));
    }
}
