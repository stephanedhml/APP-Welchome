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
    <title>Accueil</title>
</head>

<body>




    <?php
            
            
    global $bdd;
    $annonce = htmlspecialchars($_GET['id_users'] );
    $results =$bdd->query("SELECT * FROM users WHERE id=$annonce");
    $donnees = $results->fetch()
    



    ?>

    
    <?php
            
            $annonce1 = htmlspecialchars($_GET['id'] );
            
            $results =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE id=$annonce1 ORDER BY id DESC");

            $donnees1 = $results->fetch()



    ?>


<header>
    <?php include("menus.php"); ?>
</header>

<body class="body_profil">
    <div id="bloc_page_profil">
    <div id="Salutations">
         <?php echo '<img   src="'.$donnees ['avatar'].'"  class="profil">'  ?>
       
        <div id="article1">
            <h1 id="Bonjour"> <?php echo $donnees['username'] ;?>  </h1> 
            
        </div>
    </div>
   

    <article id="bloc_commentaires">
        <div id="bloc2">
                    
                     <aside id="Description3">

                    <div class="couverture">
                            <?php echo '<img  style="width:700px; height: 300px;" src="'.$donnees1 ['Liendelaphoto'].'" class="photo">' ?>
                    </div>

                      </aside>

                    <aside id="Description3">

                       <p id="Titre2"> Descriptif </p> <br></br>
                    

                    <?php echo $donnees['Description'] ;?>            
                
                    
                        
                    </aside>

                    <br></br>

                    <aside id="Description3">

                       <p id="Titre2"> Préférences d'échange </p> <br></br>
                    

                    <?php echo $donnees['Preference_echange'] ;?>            
                
                    
                        
                    </aside>
                    
                    <br></br>

                    <aside id="Description3">

                       <p id="Titre2"> Logement </p> <br></br>


                    


                        <div class="cadre">
                                <div class="left">
                            <?php echo '<img width="300px" height="200px" align="left" src="'.$donnees1 ['Liendelaphoto'].'" class="photo">' ?>
                                </div>

                                <div class="right">
                                    <span>
                                    <a href="annonce.php?id=<?php echo $donnees1['id']; ?>&amp;id_users=<?php echo $annonce ?>" >
                    <?php echo '<p>' .''.$donnees1['Localisation']. ' </br>' . $donnees1['Nombre de voyageurs']. ' voyageurs </br>' . $donnees1['Type de logement'] . '</p>'; ?> </a><br/>
                                    </span>
                                </div>



                        </div><br/>          
                
                    
                        
                    </aside>

                

                </div>
        <br></br><br></br><br></br> Commentaires

        <br></br><br></br> 0 commentaire<br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br><br></br>
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
