
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
      if ($_POST['type1']=='off' && $_POST['type2']=='off' && $_POST['type3']=='off' && $_POST['type4']=='off' && $_POST['type5']=='off' && $_POST['type6']=='off' && $_POST['type7']=='off')
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
          if ($_POST['lieu1']=='off' && $_POST['lieu2']=='off' && $_POST['lieu3']=='off' && $_POST['lieu4']=='off')
          {
          echo "Vous n'avez pas sélectionné de type de logement en particulier.";
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

	  <p/>
	  
	  <p>
	<a href="recherche_avancée.php">Cliquer ici</a> pour effectuer une autre recherche.
	  </p>
    </body>
</html>
