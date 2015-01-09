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


<header>
    <?php include("menus.php"); ?>
</header>

<body class="body_profil">
    <div id="bloc_page_profil">
        <div class="bloc_profil_gauche">
            <div id="Salutations">
                 <?php echo '<img   src="'.$donnees ['avatar'].'"  class="profil">'  ?>

                <div id="article1">
                    <h1 id="Bonjour"> <?php echo $donnees['username'] ;?>  </h1>

                </div>
            </div>
        </div>
   

    <article id="bloc_commentaires">
        <div id="bloc2">
                    
                     <aside id="Description3">

                    <div class="couverture">
                            <?php echo '<img  style="width:700px; height: 300px;" src="'.$donnees1 ['lien_photo'].'" class="photo">' ?>
                    </div>

                      </aside>

                    <aside id="Description3">

                       <p id="Titre2"> Descriptif </p> <br></br>
                    

                    <?php echo $donnees['description_users'] ;?>
                
                    
                        
                    </aside>

                    <br></br>

                    <aside id="Description3">

                       <p id="Titre2"> Préférences d'échange </p> <br></br>

                    <?php echo $donnees['preference_echange'] ;?>

                    </aside>
                    
                    <br></br>

                    <aside id="Description3">

                       <p id="Titre2"> Logement </p> <br></br>
                        <div class="cadre">
                                <div class="left">
                            <?php echo '<img width="300px" height="200px" align="left" src="'.$donnees1 ['lien_photo'].'" class="photo">' ?>
                                </div>

                                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $donnees1['id_logement']; ?>&amp;id_users=<?php echo $annonce ?>" >
                    <?php echo '<p>' .''.$donnees1['localisation']. ' </br>' . $donnees1['nombre_voyageurs']. ' voyageurs </br>' . $donnees1['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                                </div>
                        </div>
                    </aside>
                </div>
    </article>
    <aside id="bloc_identité">
        
        <div id="article2">
            <h1 id="Identification"> A Propos</h1>
            <article id="a_propos">
            <p>Homme</p>
            <p>Habite à Paris</p>
            <p>E-mail: <?php echo $donnees['email'] ;?></p>
            <p>Tel: 06 65 64 14 86</p>
            <p>Situation: Marié, 3 enfant</p>

        
            
               
            <p> Profession: Architecte </p>
              </article>
                
            </div>
        </div>
    </aside>

    </div>
    </div>

</body>
