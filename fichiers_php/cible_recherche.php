<?php
// on se connecte à MySQL.
include('config.php');
include('modeles.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style.css" />
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>

        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <title>Résultat de la recherche avancée</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        
    </head>
    <body>
     <p>

         Vous voulez un logement à <?php echo $_POST['ville'] ?>
     </p>
	  
	  <p>
      <?php
      if ($_POST['type1'] !=='on' && $_POST['type2']!=='on' && $_POST['type3']!=='on' && $_POST['type4']!=='on' && $_POST['type5']!=='on' && $_POST['type6']!=='on' && $_POST['type7']!=='on')
      {
          echo "Vous n'avez pas sélectionné de type de logement en particulier.";
      }
      else
      {
       echo   "Vous êtes interessé par:</br> " ;
      if ($_POST['type1'] == 'on') {
          echo "-un studio</br> ";
      }
	  if ($_POST['type2'] == 'on') {
          echo "-un appartement</br> ";
      }
	  if ($_POST['type3'] == 'on') {
          echo "-une maison</br> ";
      }
	  if ($_POST['type4'] == 'on') {
          echo "-un pavillon</br> ";
      }
	   if ($_POST['type5'] == 'on') {
           echo "-un bungalow ou un gîte</br> ";
       }
	   if ($_POST['type6'] == 'on') {
           echo "-un bateau ou une péniche</br> ";
       }
	   if ($_POST['type7'] == 'on') {
           echo "-un camping car</br> ";
       }

	  }
	  ?>
	
	  <p>
	    La période qui vous convient est la suivante:
	    Du <?php echo $_POST['d1']?> au <?php echo $_POST['d2']?>
	  </p>
	  
	  <p>
	    Vous souhaitez une capacité d'accueil de <?php
	    if ($_POST['nombre']==1)
	  {echo "1 personne";}
	  if ($_POST['nombre']>1)
	  {echo $_POST['nombre']. " personnes";}

	  ?>
	  </p>
	  
	  <p>
          <?php if (isset($_POST['surface_min']))
          {
	    echo "Vous souhaitez une surface minimale de ". $_POST['surface_min']. "m²";
          }
          ?>
	  </p>
	  
	  <p>
        <?php
          if ($_POST['lieu1']!=='on' && $_POST['lieu2']!=='on' && $_POST['lieu3']!=='on' && $_POST['lieu4']!=='on')
          {
          echo "Vous n'avez pas sélectionné d'endroit particulier.";
          }
        else
        {
            echo "Vous voudriez voir les logements qui se situent:</br>" ;
	    if ($_POST['lieu1'] == 'on') {
            echo "-en banlieue</br> ";
        }
	   if ($_POST['lieu2'] == 'on') {
           echo "-à la campagne</br> ";
       }
	   if ($_POST['lieu3'] == 'on') {
           echo "-à la montagne</br> ";
       }
	   if ($_POST['lieu4'] == 'on') {
           echo "-en ville</br> ";
       }
        }
	   ?>
	  </p>
	  
	  <p>Vous avez sélectionné les attributs suivants:<br/> <?php
       if ($_POST['case1']=='on')
	   {echo "-Animaux acceptés<br/>";}
	   if ($_POST['case2']=='on')
	   {echo "-Climatisation</br>";}
	   if ($_POST['case3']=='on')
	   {echo "-Chauffage</br>";}
	   if ($_POST['case4']=='on')
	   {echo "-Machine à laver</br>";}
	   if ($_POST['case5']=='on')
	   {echo "-Sèche linge</br>";}
	   if ($_POST['case6']=='on')
	   {echo "-Cheminée</br>";}
	   if ($_POST['case7']=='on')
	   {echo "-Télévision</br>";}
	   if ($_POST['case8']=='on')
	   {echo "-Parking</br>";}
	   if ($_POST['case9']=='on')
	   {echo "-Piscine</br>";}
	   if ($_POST['case10']=='on')
	   {echo "-Jardin</br>";}
	   if ($_POST['case11']=='on')
	   {echo "-Balcon</br>";}
	   if ($_POST['case12']=='on')
	   {echo "-Internet</br>";}
	    
	  ?> </p>
	  <p>
          <?php
          // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.

          // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
          $nbresult =resultats_requete_avancée();

          // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
          $nb_resultats = $nbresult->rowCount();

          if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
          {
          // maintenant, on va afficher les résultats
          ?>
          <img src="../images_diverses/search_result.png" alt="img" class="search_result">
     <p class="search_result_txt">
         Nous avons trouvé
         <?php echo $nb_resultats;
         // on vérifie le nombre de résultats pour orthographier correctement.
         if($nb_resultats > 1) { echo ' résultats'; } else { echo ' résultat'; }
         ?>
         dans notre base de données. Voici les logements que nous avons trouvées:<br/><br/>

     </p>



     <?php
     // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction :
     while($donnees = $nbresult->fetch())

     {
         ?>
         <div class="cadre">
             <div class="left">
                 <?php echo '<img width="125px" height="125px" align="left" src="'.$donnees ['Liendelaphoto'].'" class="photo">' ?>
             </div>

             <div class="right">
                                    <span>
                                    <a href="fonction.php?id=<?php echo $donnees['id']; ?>" id="<?php echo $donnees['id']; ?>" >
                                        <?php echo '<p>' .''.$donnees['Localisation']. ' </br>' . $donnees['Nombre de voyageurs']. ' voyageurs </br>' . $donnees['Type de logement'] . " </br>  ". $donnees['Description'] . '</p>'; ?> </a><br/>
                                    </span>
             </div>



         </div><br/>
     <?php
     } // fin du while

     ?>		 <br/><br/>
     <a href="recherche_avancee.php" class="nlle_r">Faire une nouvelle recherche avancée</a></p>
     <?php
     }
     // Afficher l'éventuelle erreur :
     else
     { //HTML
         ?>
         <h3>Pas de résultats</h3>
         <p>Nous n'avons trouvé aucun résultat pour votre requête "<?php echo $_POST['requete']; ?>". <a href="accueilmanu.php">Réessayez</a> avec autre chose.</p>
     <?php
     }
     $nbresult->closeCursor(); // on ferme mysql


         ?>

	  <p/>
	  
	  <p>
	<a href="recherche_avancée.php">Cliquer ici</a> pour effectuer une autre recherche.
	  </p>
    </body>
</html>
