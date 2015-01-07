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
           <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="js/owlcarroussel/owl.carousel.css" rel="stylesheet">    
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
        <title>Annonce</title>
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

                    <h9 class="Localisation">  <img src="location2.png" width="0.7%"> <?php echo $donnees['localisation'] ;?>  </h9> <br></br>
                    

                    <li class="membres">  &#8962;  <?php echo $donnees['type_logement'] ;?>
                    </li>
                    
                    <li class="membres"> <img src="user3.png" width="1%"> <?php echo $donnees['nombre_voyageurs']  ;?> voyageurs
                    </li>

                    <li class="membres"> <?php echo $donnees['nb_chambres'] ;?> Chambres
                    </li>

                    <li class="membres">  <img src="small32-2.png" width="0.6%"> <?php echo $donnees['nb_salles_bains'] ;?> salles de bains
                    </li>

                    <li class="membres"> <img src="big36.png" width="1%"> <?php echo $donnees['superficie'] ;?> m²
                    </li>

                    </div>

                    <div id="banniere_image">
                        <?php echo '<img  align="left" src="'.$donnees ['lien_photo'].'" class="Photo">' ?>
                           
                            <div id="banniere_description">
                                
                                
                            </div>
                    </div>
                    
                    <aside id="description1">

                         

                        
                        
                    </aside>
                </div>

                <div id="bloc2">
                    
                    <aside id="Description">
                    <?php echo $donnees['description_logement'];?>           
                
                    
                        
                    </aside>
                    
                

                </div>

                <div id="bloc3">




     <div class="carousel">
         
        <div class="item">

          <img src= "http://www.construction-contemporaine.com/wp-content/uploads/2011/01/maison-architecte-cubique-blanche.jpg" width="100%">

        </div>
        <div class="item">

          <img src= "http://media-cdn.tripadvisor.com/media/photo-s/01/99/43/8f/maison-marianel.jpg" width="100%">

        </div>

        <div class="item">

          <img src= "http://www.construction-contemporaine.com/wp-content/uploads/2011/01/maison-architecte-cubique-blanche.jpg" width="100%">

        </div>
        <div class="item">

          <img src= "http://media-cdn.tripadvisor.com/media/photo-s/01/99/43/8f/maison-marianel.jpg" width="100%">

        </div>
        <div class="item">

          <img src= "http://www.construction-contemporaine.com/wp-content/uploads/2011/01/maison-architecte-cubique-blanche.jpg" width="100%">

        </div>
        <div class="item">

          <img src= "http://media-cdn.tripadvisor.com/media/photo-s/01/99/43/8f/maison-marianel.jpg" width="100%">

        </div>
        <div class="item">

          <img src= "http://www.construction-contemporaine.com/wp-content/uploads/2011/01/maison-architecte-cubique-blanche.jpg" width="100%">

        </div>
        <div class="item">

          <img src= "http://media-cdn.tripadvisor.com/media/photo-s/01/99/43/8f/maison-marianel.jpg" width="100%">

        </div>


         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script src="js/owlcarroussel/owl.carousel.min.js"></script>
     <script src="js/app.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>



                </div>
            </div>
            


               <?php

                $annonce = htmlspecialchars($_GET['id_logement'] );
                $req1 = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=? ");
                $req1 -> execute(array($annonce));
                

                ?>


                <article class= "commentaire">
                    Equipements: <br> </br>

                    <?php

                $donnees3 = $req1 -> fetch();
                

                if ($donnees3['television'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Television </li><br></br>';
                }
                

                  ?>

                  

                  <?php

                if ($donnees3['machine_a_laver'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Machine a laver </li><br></br>';
                }
                
                  ?>

                   <?php

                if ($donnees3['parking'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Parking </li><br></br>';
                }
                
                  ?>

                   <?php

                if ($donnees3['climatisation'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Climatisation </li><br></br>';
                }
                
                  ?>

                   <?php

                if ($donnees3['piscine'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Piscine </li><br></br>';
                }
                
                  ?>

                   <?php

                if ($donnees3['jardin'] == 1) {
                    echo '<li class="equipement"> <img class= "ok" src="http://upload.wikimedia.org/wikipedia/commons/6/62/Symbol_OK.png"> Jardin </li><br></br>';
                }
                
                  ?>


                    


                </article>

                

                 <section class="bouton1">

                     
                    <?php echo '<img   src="'.$donnees1 ['avatar'].'"  class="Norma">'  ?> <br></br>
                    <h7 class="Norma1"> <?php echo $donnees1['username'];?>  </h7> <br> </br>
                    <h7 class="Norma2"> Membre depuis 2014 </h7> <br> </br>

                <button type="button" onclick="self.location.href='profil.php?id_logement=<?php echo $donnees['id_logement']; ?>&amp;id_users=<?php echo $donnees['id_users']; ?>'" class="bouton">
                  Consulter profil
                </button>
                     <?php if(isset($_SESSION['userid'])) { ?>
                         <button type="button" class="bouton"
                                 onclick="window.location='echg_msg.php?demandeur=<?php echo $_SESSION["userid"]; ?>&proprietaire=<?php echo $donnees1["id_users"]; ?>&logement=<?php echo $donnees["id_logement"]; ?>'">
                             Proposer un échange
                         </button>
                     <?php
                     }
                     else { ?>
                         <button type="button" class="bouton"
                                 onclick="window.location='sign_up.php'">
                             Proposer un échange
                         </button>
                     <?php } ?>
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