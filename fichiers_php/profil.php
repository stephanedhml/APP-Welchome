<?php
session_start();
include("config.php");

if (isset($_GET['supp_log'])) {
    $del = $bdd -> prepare("DELETE FROM logement WHERE id_logement=?");
    $del -> execute(array($_GET['supp_log']));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <script type="text/javascript" src="../carrousel/jquery.js"></script>
    <script type="text/javascript" src="../carrousel/carrousel.js"></script>
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Profil</title>
</head>

<body>




    <?php


    global $bdd;
    $annonce = htmlspecialchars($_GET['id_users'] );
    $rey =$bdd->prepare("SELECT * FROM users WHERE id_users=?");
    $rey -> execute(array($_GET['id_users']));
    $donnees = $rey->fetch();
    if (isset($_SESSION['userid'])) {
        $rel = $bdd->prepare("SELECT * FROM users WHERE id_users=?");
        $rel->execute(array($_SESSION['userid']));
        $utilisateur = $rel->fetch();
    }


    ?>


    <?php

            $annonce1 = htmlspecialchars($_GET['id_logement'] );


            $results = $bdd-> prepare("SELECT * FROM logement NATURAL JOIN photo WHERE id_logement=? ORDER BY id_logement DESC");
            $results -> execute(array($annonce1));

            $donnees1 = $results->fetch();



    ?>

<html>
<header>
    <?php include("menu2.php"); ?>
</header>
<div class="superglobal">
    <div class="global">
<body class="body_profil">
    <div id="bloc_page_profil">
        <div class="bloc_profil_gauche">
            <div id="Salutations">
                 <?php echo '<img   src="'.$donnees ['avatar'].'"  class="profil">'  ?>

                <div id="article1">
                    <h1 id="Bonjour"> <?php echo $donnees['username'] ;?>  </h1>

                </div>
            </div>
            <div id="bloc_identité">

                <div id="article2">
                    <h1 id="Identification"><?php echo apropos; ?></h1>
                    <article id="a_propos">
                        <?php if(isset($_SESSION["userid"]) AND strcasecmp($donnees[1],$utilisateur[1]) == 0) { ?><a href="edit_profile.php?id_user=<?php echo $_SESSION['userid'] ?>"><?php echo editprofile; ?></a> <?php } ?>
                        <p><?php if ($donnees['sexe']!=NULL) {echo $donnees['sexe'] ;}?></p>
                        <p>E-mail: <?php if ($donnees['email']!=NULL) { echo $donnees['email'] ;} else {echo "Non renseigné";}?></p>
                        <p>Tel: <?php if ($donnees['tel']!=NULL) { echo $donnees['tel'] ;} else {echo "Non renseigné";}?></p>
                        <p>Situation: <?php if ($donnees['situation']!=NULL) { echo $donnees['situation'] ;} else {echo "Non renseigné";}?></p>
                        <p>Profession: <?php if ($donnees['profession']!=NULL) { echo $donnees['profession'] ;} else {echo "Non renseigné";}?> </p>
                    </article>

                </div>
            </div>
        </div>
   

    <article id="bloc_commentaires">
        <div id="bloc2">
                    
                     <div id="Description3">

                    <div class="couverture">
                            <?php echo '<img  style="width:700px; height: 300px;" src="'.$donnees1 ['lien_photo'].'" class="photo">' ?>
                    </div>

                      </div>

                    <div id="Description3">

                       <p id="Titre2"><!-- <?php echo descriptif; ?> -->Descriptif</p> <br></br>
                    

                    <?php echo $donnees['description'] ;?>
                
                    
                        
                    </div>

                    <br></br>

                    <div id="Description3">

                       <p id="Titre2"><?php echo preferedtrade; ?></p> <br></br>

                    <?php echo $donnees['preference_echange'] ;?>

                    </div>
                    
                    <br></br>

                    <div id="Description3">

                       <p id="Titre2"> <?php echo logements; ?></p> <br></br>
                        <?php
                        $rez = $bdd->prepare("SELECT * FROM logement WHERE id_users=? ORDER BY id_logement DESC");
                        $rez -> execute(array($_GET['id_users']));
                        $nb_house = $rez -> rowCount();

                        for ($i=0;$i<$nb_house;$i++) {
                        $house = $rez->fetch();
                        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                        $pic -> execute(array($house[0]));
                        $url_pic = $pic -> fetch();

                        $rei = $bdd -> prepare("SELECT * FROM echange WHERE id_logement=:id_1 OR id_logement_asked=:id_2 AND en_cours=1");
                        $rei -> execute(array(
                            'id_1' => $house[0],
                            'id_2' => $house[0],
                            ));
                        $during = $rei -> fetch();
                        ?>
                        <div class="cadre">
                                <div class="left">
                                    <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic['lien_photo'].'" class="photo">' ?>
                                </div>

                                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house['id_logement']; ?>&amp;id_users=<?php echo $annonce ?>" >
                                    <?php echo '<p>' .''.$house['localisation']. ' </br>' . $house['nombre_voyageurs']. ' voyageurs </br>' . $house['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                                    <?php if(isset($_SESSION["userid"]) AND strcasecmp($donnees[1],$utilisateur[1]) == 0 AND $during[0]==NULL) {
                                        ?>
                                    <div class="end2"><a href="profil.php?supp_log=<?php echo $house[0]; ?>&id_logement=<?php echo $house[0]; ?>&id_users=<?php echo $_SESSION['userid']; ?>">Supprimer</a></div>
                                    <?php } ?>
                                </div>
                        </div><br/>
                        <?php } ?>
                    </div>
                </div>
    </article>
    </div>

    </div>
    </div>
    <?php
    include("footer2.php");
    ?>
</body>
</html>