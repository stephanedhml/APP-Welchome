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
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
        <title>Maison Provence</title>
    </head>
    
    <body>
    
    <?php
            
            $annonce = htmlspecialchars($_GET['id_logement'] );
            $recherche_id =$bdd->query("SELECT * FROM logement NATURAL JOIN photo WHERE id_logement=$annonce ");

            $donnees = $recherche_id->fetch()



    ?>

    <?php
            
            
    
    $annonce1 = htmlspecialchars($_GET['id_users'] );
    $results =$bdd->query("SELECT * FROM users  WHERE id_users=$annonce1");
    $donnees1 = $results->fetch()
    



    ?>

   


    <header>
        <?php include("menus.php"); ?>
    </header>
    <div class="superglobal">
        <div class="global">
        <div id="bloc_page">
            <section id="bloc0">
                <div id="bloc1">
                    
                    <div class="Titre">

                    <h7 id="Titre1"><?php echo $donnees['nom_maison'] ;?>  </h7> <br></br>

                    <h9 class="Localisation">  <?php echo $donnees['localisation'] ;?>  </h9> <br></br>
                    

                    <li class="membres"> Type de logement: <?php echo $donnees['type_logement'] ;?>
                    </li>
                    
                    <li class="membres">  <?php echo $donnees['nombre_voyageurs']  ;?> voyageurs
                    </li>

                    <li class="membres"> <?php echo $donnees['nb_chambres'] ;?> Chambres
                    </li>

                    <li class="membres">  <?php echo $donnees['nb_salles_bains'] ;?> salles de bains
                    </li>

                    </div>

                    <div id="banniere_image">
                        <?php echo '<img  align="left" src="'.$donnees ['lien_photo'].'" class="Photo">' ?>
                           
                            <div id="banniere_description">
                                
                                
                            </div>
                    </div>
                    
                    <aside id="dscription1">

                         

                        
                        
                    </aside>
                </div>

                <div id="bloc2">
                    
                    <aside id="Description">
                    <?php echo $donnees['description_logement'];?>
                
                    
                        
                    </aside>
                    
                

                </div>

                <article class= "commentaire">
                    Equipements <br> </br>
                    <li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Lave vaiselle </li><br></br>
                    <li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">Internet Wifi </li><br></br>
                    <li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">Piscine </li><br></br>
                    <li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">Terrasse </li><br></br>
                    <li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">Parking </li><br></br>
                    <li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png">Cheminée </li><br></br>

                </article>

                

                 <section class="bouton1">

                     
                    <?php echo '<img   src="'.$donnees1 ['avatar'].'"  class="Norma">'  ?> <br></br>
                    <h7 class="Norma1"> <?php echo $donnees1['username'];?>  </h7> <br> </br>
                    <h7 class="Norma2"> Membre depuis 2014 </h7> <br> </br>

                <button type="button" onclick="self.location.href='profil.php?id_logement=<?php echo $donnees['id_logement']; ?>&amp;id_users=<?php echo $donnees['id_users']; ?>'" class="bouton">
                  Consulter profil
                </button>
                <button type="button" class="bouton">
                    <a href="echg_msg.php?demandeur=<?php echo $_SESSION["userid"];?>&proprietaire=<?php echo $donnees1["id_users"]; ?>&id_logement=<?php echo $donnees["id_logement"] ;?>">Proposer un échange</a>
                </button>
                </section>

                <div>

                    <p style="padding-top=20px; font-family:century; ">Commentaires: </p><br></br>
                    <p style= "font-family:century; font-style: oblique;">0 commentaire</p>


                </div>  

                

                <div>
                <!--<h1 id="disponibilités">Disponibilités: </h1> <iframe name="InlineFrame1" id="InlineFrame1" style="width:690px;height:235px;" src="http://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=0&an=0&langue=fr&texte_color=B9CBDD&week_color=DAE9F8&week_end_color=C7DAED&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe> -->
            </div>
            </section>
        </div>
        </div>
    <?php
    include("footer2.php");
    ?>
    </div>
    </body>
</html>