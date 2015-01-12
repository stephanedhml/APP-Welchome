<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <script type="text/javascript" src="../carrousel/jquery.js"></script>
    <script type="text/javascript" src="../carrousel/carrousel.js"></script>
    <?php session_start();
    include("config.php");
     ?>

    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Profil</title>
</head>

<body>




    <?php


    global $bdd;
    $annonce = htmlspecialchars($_GET['id_users'] );
    $results =$bdd->query("SELECT * FROM users WHERE id_users=$annonce");
    $donnees = $results->fetch()




    ?>


    <?php

            $annonce1 = htmlspecialchars($_GET['id_logement'] );

            $results =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE id_logement=$annonce1 ORDER BY id_logement DESC");

            $donnees1 = $results->fetch()



    ?>

<html>
<header>
    <?php include("menus.php"); ?>
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
                    <h1 id="Identification"> A Propos</h1>
                    <article id="a_propos">
                        <?php if($_GET["id_users"]==$_SESSION["userid"]) { ?><a href="edit_profile.php">Editer votre profil</a> <?php } ?>
                        <p><?php if ($donnees['sexe']!=NULL) {echo $donnees['sexe'] ;}?></p>
                        <p>E-mail: <?php if ($donnees['email']!=NULL) { echo $donnees['email'] ;} else {echo "Non renseigné";}?></p>
                        <p>Tel: <?php if ($donnees['tel']!=NULL) { echo $donnees['tel'] ;} else {echo "Non renseigné";}?></p>
                        <p>Situation: <?php if ($donnees['situation']!=NULL) { echo $donnees['situation'] ;} else {echo "Non renseigné";}?></p>
                        <p> Profession: <?php if ($donnees['profession']!=NULL) { echo $donnees['profession'] ;} else {echo "Non renseigné";}?> </p>
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

                       <p id="Titre2"> Descriptif </p> <br></br>
                    

                    <?php echo $donnees['description'] ;?>
                
                    
                        
                    </div>

                    <br></br>

                    <div id="Description3">

                       <p id="Titre2"> Préférences d'échange </p> <br></br>

                    <?php echo $donnees['preference_echange'] ;?>

                    </div>
                    
                    <br></br>

                    <div id="Description3">

                       <p id="Titre2"> Logements </p> <br></br>
                        <?php
                        $rez = $bdd->prepare("SELECT * FROM logement NATURAL JOIN Photo WHERE id_users=? ORDER BY id_logement DESC");
                        $rez -> execute(array($_GET['id_users']));
                        $nb_house = $rez -> rowCount();

                        for ($i=0;$i<$nb_house;$i++) {
                        $house = $rez->fetch();
                        ?>
                        <div class="cadre">
                                <div class="left">
                                    <?php echo '<img width="300px" height="200px" align="left" src="'.$house ['lien_photo'].'" class="photo">' ?>
                                </div>

                                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house['id_logement']; ?>&amp;id_users=<?php echo $annonce ?>" >
                                    <?php echo '<p>' .''.$house['localisation']. ' </br>' . $house['nombre_voyageurs']. ' voyageurs </br>' . $house['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
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