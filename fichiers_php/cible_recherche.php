<?php
// on se connecte à MySQL.
include('config.php');
include('modeles.php');
?>
<?php session_start(); ?>

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../fichiers_css/moteur_de_recherche.css" />

    <?php include("../menu_responsive/javascript/menu_responsive.js");
    ?>
    <title>Recherhe</title>
</head>

<body>
<div class="header">
    <?php include("menu2.php"); ?>
</div>
<div class="superglobal">
    <div class="global">
        <div class="recherche">


            <?php
            // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.


            // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
            $nbresult =resultats_requete_avancee();

            // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
            $nb_resultats = $nbresult->rowCount();

            if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
            {
                // maintenant, on va afficher les résultats
                ?>
                <img src="../images_diverses/search_result.png" class="search_result">
                <p class="search_result_txt">
                   <?php echo noustrouver; ?>
                    <?php echo $nb_resultats;
                    // on vérifie le nombre de résultats pour orthographier correctement.
                    if($nb_resultats > 1) { echo ' résultats'; } else { echo ' résultat'; }
                    ?>
                    <?php echo nblogementtrouve; ?><br/><br/>

                </p>



                <?php
                // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction :
                while($donnees = $nbresult->fetch())
                {
                    $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                    $pic -> execute(array($donnees['id_logement']));
                    $url_pic = $pic -> fetch();
                    ?>
                    <div class="cadre">
                        <div class="left">
                            <?php echo '<img width="125px" height="125px" align="left" src="'.$url_pic['lien_photo'].'" class="photo">' ?>
                        </div>

                        <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $donnees['id_logement']; ?> &id_users=<?php echo $donnees['id_users']; ?>" >
                                        <?php echo '<p>' .''.$donnees['localisation']. ' </br>' . $donnees['nombre_voyageurs']. ' voyageurs </br>' . $donnees['type_logement'] . " </br>  ". $donnees['description_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                        </div>



                    </div><br/>
                <?php
                } // fin du while

                ?>		 <br/>
                <a href="recherche_avancee.php" class="nlle_r"><?php echo nouvellerecherche; ?></a></p>
            <?php
            }
            // Afficher l'éventuelle erreur :
            else
            { //HTML
                ?>
                <h3><?php echo noresult; ?></h3>
                <p><?php echo noresultbis; ?><a href="recherche_avancee.php"><?php echo retry; ?></a><?php echo autrechose; ?></p>
            <?php
            }
            $nbresult->closeCursor(); // on ferme mysql

            ?>

            </p>
        </div>
    </div>
    <?php
    include("footer2.php");
    ?>
</div>
</body>

