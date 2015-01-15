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

    //On ajoute le message de l'utilisateur correspondant à l'annonce dans la BDD

    if (isset($_POST['message'])) {
        $up = $bdd -> prepare("INSERT INTO messages(id_expediteur,date_update,message,id_logement) VALUES(:expediteur,:dates, :message, :id_logement)");
        $up -> execute(array(
            'expediteur' => $_SESSION['userid'],
            'dates' => $date = date("Y-m-d H:i:s"),
            'message' => $_POST['message'],
            'id_logement' => $_GET['id_logement'],
        ));
    }
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
                    <li class="membres"> <img src="user3.png" width="1%"> <?php echo $donnees['nombre_voyageurs']  ;?><?php echo voyageur; ?></li>
                    <li class="membres"> <?php echo $donnees['nb_chambres'] ;?><?php echo chambre; ?></li>
                    <li class="membres">  <img src="small32-2.png" width="0.6%"> <?php echo $donnees['nb_salles_bains'] ;?></li>
                    <li class="membres"> <img src="big36.png" width="1%"> <?php echo $donnees['superficie'] ;?> m²</li>

                    </div>

                    <div id="banniere_image">
                        <?php echo '<img  align="left" src="'.$donnees ['lien_photo'].'" class="Photo">' ?>
                        <div id="banniere_description">

                        </div>
                    </div>
                </div>

                <div id="bloc2">
                    <p class="annonce_txt"><?php echo $donnees['description_logement'];?></p>
                </div>

                <div id="bloc3">

                <?php

                $annonce = htmlspecialchars($_GET['id_logement'] );
                $req1 = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=? ");
                $req1 -> execute(array($annonce));
                $donnees3 = $req1 -> fetch();
                
                ?>
                <div class= "equipements">
                    <p class="title_annonce"><?php echo equipement; ?></p></br></br>
                    <p>
                <?php
                /* Boucle permettant d'obtenir la liste des critères automatiquement : avantage = permettra d'augmenter la liste si ajout d'un crtière dans BackOf / inconvenient : les noms qui s'affichent sont ceux de la BDD donc moches
                 for ($i=15;$i<21;$i++) {
                    $colonne = $req1 -> getColumnMeta($i);
                    if ($donnees3[$colonne["name"]] == 1) {
                        echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">'.$colonne["name"].'</li><br></br>';
                    }
                 } */
                if ($donnees3['television'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> '.tele.' </li><br></br>';
                }

                if ($donnees3['machine_a_laver'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> '.machinelaver.' </li><br></br>';
                }

                if ($donnees3['parking'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">'.parking.' </li><br></br>';
                }

                if ($donnees3['climatisation'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> '.climatisation.' </li><br></br>';
                }

                if ($donnees3['piscine'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> '.piscine.' </li><br></br>';
                }

                if ($donnees3['jardin'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> '.jardin.' </li><br></br>';
                }

                  ?>
                    </p>
                </div>

                <div class="owner">

                    <p class="Norma2">Propriétaire</p>
                    <?php echo '<img   src="'.$donnees1 ['avatar'].'"  class="Norma">'  ?>
                    <p class="Norma1"> <?php echo $donnees1['username'];?></p>


                    <?php
                    if(isset($_SESSION['userid']))
                    {
					//On vérifie que les deux utilisateurs ne sont pas déjà en cours de négociation
						$ret = $bdd -> prepare("SELECT friend FROM favoris WHERE id_user=:utilisateur AND id_ami=:proprietaire AND id_logement=:id_logement");
						$ret -> execute(array(
							'utilisateur' => $_SESSION['userid'],
							'proprietaire' => $_GET['id_users'],
							'id_logement' => $_GET['id_logement'],
						));
						$friend = $ret -> fetch();

						$rez = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=:demandeur AND id_logement=:id_logement");
						$rez -> execute(array(
						   'demandeur' => $_SESSION['userid'],
							'id_logement' => $_GET['id_logement'],
						));
						$stalk = $rez -> fetch();
					}
                    ?>
                <button type="button" onclick="self.location.href='profil.php?id_logement=<?php echo $donnees['id_logement']; ?>&amp;id_users=<?php echo $donnees['id_users']; ?>'" class="bouton"><?php echo consultprofil; ?></button>
                     <?php if(isset($_SESSION['userid']) AND $friend[0]==1) {
                     }
                     elseif (isset($_SESSION['userid']) AND $stalk[0]!=NULL) {
                     }
                     elseif (isset($_SESSION['userid']) AND strcasecmp($_SESSION['userid'],$_GET['id_users']) == 0) {
                     }
                     elseif (isset($_SESSION['userid'])) {?>
                         <button type="button" class="bouton" onclick="window.location='echg_msg.php?demandeur=<?php echo $_SESSION["userid"]; ?>&proprietaire=<?php echo $donnees1["id_users"]; ?>'"><?php echo proposeechange; ?></button>
                     <?php
                     }
                     else { ?> <button type="button" class="bouton" onclick="window.location='sign_up.php'"><?php echo proposeechange; ?></button><?php } ?>


                </div>
                </div>
                <div id="bloc4">
                    <?php

                    $rez = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
                    $rez -> execute(array($_GET["id_logement"]));
                    $numero_new_logement = $rez -> fetch();

                    $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                    $pic -> execute(array($_GET["id_logement"]));
                    $nb_pic = $pic -> rowCount();

                    $req = $bdd -> prepare("SELECT * FROM messages WHERE id_logement=? ORDER BY id_message DESC");
                    $req -> execute(array($_GET['id_logement']));
                    $nb_house_com = $req -> rowCount();

                    $nb_coms = $nb_house_com - $nb_pic;


                    for($i=0;$i<$nb_pic;$i++) {

                    $com = $req -> fetch();
                    $quser = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $quser -> execute(array($com['id_expediteur']));

                    $url_pic = $pic -> fetch();
                    $un = $quser -> fetch();
                    ?>
                    <div class= "logement_pics">
                        <img src="<?php echo $url_pic['lien_photo'] ?>">
                    </div>
                    <div class="description_pic">
                        <img src='<?php echo $un["avatar"];?>' class='img_member'><br/>
                        <a class="Norma1" href='profil.php?id_logement=2&amp;id_users=<?php echo $un[0]; ?>'><?php echo $un['username']; ?></a>
                        <blockquote><p style="margin-left: 30px;"><?php echo $com['message'] ?></p></blockquote>
                    </div>
                    <?php } ?>
                </div>
                <?php
                for ($i=0;$i<$nb_coms;$i++) {
                $com = $req -> fetch();
                $quser = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                $quser -> execute(array($com['id_expediteur']));
                $un = $quser -> fetch();
                ?>
                <table class="tableau_com_annonce">
                    <tr>
                        <td class="column_msg_1">
                            <img src='<?php echo $un["avatar"];?>' class='img_member'><br/>
                            <p><a href='profil.php?id_logement=2&amp;id_users=<?php echo $un[0]; ?>'><?php echo $un[1]; ?></a></p>
                        </td>
                        <td class="column_msg_3"><blockquote><p style="margin-left: 40px; width: 800px;"><?php echo $com['message']; ?></p></blockquote></td>
                    </tr>
                </table>

                <?php } ?>
                <?php
                if  (isset($_SESSION['userid']) AND $friend[0]==1) {
                ?>
                <div class="cadre_answer_post_annonce" >
                    <div class="answer1" >
                        <form action = "annonce.php?id_logement=<?php echo $_GET['id_logement'] ?>&id_users=<?php echo $_GET['id_users'] ?>" method = "post" >
                            <label for="message" >Message</label ><br /></br >
                            <textarea type = "text" name = "message" class="post_message" ></textarea ><br /><br />
                            <input type = "submit" value = "Poster" id = "btn_connexion" /><br /><br />
                        </form >
                    </div >
                </div>
                <?php } ?>
        </div>
        </div>
    </div>
    <?php
    include("footer2.php");
    ?>
    </body>
</html>