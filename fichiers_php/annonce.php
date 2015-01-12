<?php
    include("config.php");
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="stylesheet" href="../fichiers_css/annonce.css"/>
     <link href="js/owlcarroussel/owl.carousel.css" rel="stylesheet">
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
        <title>Annonce</title>
    </head>
    
    <body>
    
    <?php
            
    $annonce = htmlspecialchars($_GET['id_logement'] );
    $recherche_id =$bdd->query("SELECT * FROM logement NATURAL JOIN photo WHERE id_logement=$annonce ");
    $donnees = $recherche_id->fetch();

    $annonce1 = htmlspecialchars($_GET['id_users'] );
    $results =$bdd->query("SELECT * FROM users  WHERE id_users=$annonce1");
    $donnees1 = $results->fetch();

    ?>

    <header>
        <?php include("menus.php"); ?>
    </header>
    <div class="superglobal">
        <div class="global">
        <div id="bloc_page">
                <div id="bloc1">
                    
                    <div class="Titre">

                    <h7 id="Titre1"><?php echo $donnees['nom_maison'] ;?>  </h7> <br></br>

                    <h9 class="Localisation">  <img src="location2.png" width="0.7%"> <?php echo $donnees['localisation'] ;?>  </h9> <br></br>
                    <li class="membres">  &#8962;  <?php echo $donnees['type_logement'] ;?></li>
                    <li class="membres"> <img src="user3.png" width="1%"> <?php echo $donnees['nombre_voyageurs']  ;?> voyageurs</li>
                    <li class="membres"> <?php echo $donnees['nb_chambres'] ;?> Chambres</li>
                    <li class="membres">  <img src="small32-2.png" width="0.6%"> <?php echo $donnees['nb_salles_bains'] ;?> salles de bains</li>
                    <li class="membres"> <img src="big36.png" width="1%"> <?php echo $donnees['superficie'] ;?> m²</li>

                    </div>

                    <div id="banniere_image">
                        <?php echo '<img  align="left" src="'.$donnees ['lien_photo'].'" class="Photo">' ?>
                        <div id="banniere_description">

                        </div>
                    </div>
                </div>

                <div id="bloc2">
                    <?php echo $donnees['description_logement'];?>
                </div>

                <div id="bloc3">

                <?php

                $annonce = htmlspecialchars($_GET['id_logement'] );
                $req1 = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=? ");
                $req1 -> execute(array($annonce));
                $donnees3 = $req1 -> fetch();
                
                ?>
                <div class= "equipements">
                    Equipements: </br></br>

                <?php
                /* Boucle permettant d'obtenir la liste des critères automatiquement : avantage = permettra d'augmenter la liste si ajout d'un crtière dans BackOf / inconvenient : les noms qui s'affichent sont ceux de la BDD donc moches
                 for ($i=15;$i<21;$i++) {
                    $colonne = $req1 -> getColumnMeta($i);
                    if ($donnees3[$colonne["name"]] == 1) {
                        echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">'.$colonne["name"].'</li><br></br>';
                    }
                 } */
                if ($donnees3['television'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Télévision </li><br></br>';
                }

                if ($donnees3['machine_a_laver'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Machine a laver </li><br></br>';
                }

                if ($donnees3['parking'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Parking </li><br></br>';
                }

                if ($donnees3['climatisation'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Climatisation </li><br></br>';
                }

                if ($donnees3['piscine'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Piscine </li><br></br>';
                }

                if ($donnees3['jardin'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Jardin </li><br></br>';
                }

                  ?>
                </div>

                <div class="owner">

                    <?php echo '<img   src="'.$donnees1 ['avatar'].'"  class="Norma">'  ?> <br></br>
                    <h7 class="Norma1"> <?php echo $donnees1['username'];?>  </h7> <br> </br>
                    <h7 class="Norma2"> Membre depuis 2014 </h7> <br> </br>

                <button type="button" onclick="self.location.href='profil.php?id_logement=<?php echo $donnees['id_logement']; ?>&amp;id_users=<?php echo $donnees['id_users']; ?>'" class="bouton">Consulter profil</button>
                     <?php if(isset($_SESSION['userid'])) { ?>
                         <button type="button" class="bouton" onclick="window.location='echg_msg.php?demandeur=<?php echo $_SESSION["userid"]; ?>&proprietaire=<?php echo $donnees1["id_users"]; ?>&logement=<?php echo $donnees["id_logement"]; ?>'">Proposer un échange</button>
                     <?php
                     }
                     else { ?> <button type="button" class="bouton" onclick="window.location='sign_up.php'">Proposer un échange</button><?php } ?>


                </div>
                </div>
                <div id="bloc4">

                </div>
        </div>
        </div>
    </div>
    <?php
    include("footer2.php");
    ?>
    </body>
</html>