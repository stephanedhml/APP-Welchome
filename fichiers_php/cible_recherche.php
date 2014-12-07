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
	  Vous voulez comme type de logement <?php
      if ($_POST['choix1']==on)
	  {echo "un studio";}
	  if ($_POST['choix2']==on)
	  {echo "un appartement";}
	  if ($_POST['choix3']==on)
	  {echo "une maison";}
	  if ($_POST['choix4']==on)
	  {echo "un pavillon";}
	   if ($_POST['choix5']==on)
	  {echo "un bungalow ou un gîte";}
	   if ($_POST['choix6']==on)
	  {echo "un bateau ou une péniche";}
	   if ($_POST['choix7']==on)
	  {echo "un camping car";}
	  
	  ?>
	
	  <p>
	    La période qui vous convient est la suivante:
	    Du <?php echo $_POST['d1']?> au <?php echo $_POST['d2']?>
	  </p>
	  
	  <p>
	    Il y aura <?php
	    if ($_POST[nombre]=='nb1')
	  {echo "1 personne";}
	  if ($_POST[nombre]=='nb2')
	  {echo "2 personnes";}
	  if ($_POST[nombre]=='nb3')
	  {echo "3 personnes";}
	  if ($_POST[nombre]=='nb4')
	  {echo "4 personnes";}
	  if ($_POST[nombre]=='nb5')
	  {echo "5 personnes";}
	  if ($_POST[nombre]=='nb6')
	  {echo "6 personnes";}
	  if ($_POST[nombre]=='nb7')
	  {echo "7 personnes ou plus";}
	  ?> avec vous.
	  </p>
	  
	  <p>
	    Vous souhaitez une surface minimale de <?php echo $_POST['surface_min']?> m².
	  </p>
	  
	  <p>
	    Vous préférez être <?php
	    if ($_POST['lieu1']=='on')
	   {echo " en banlieue";}
	   if ($_POST['lieu2']=='on')
	   {echo " à la campagne";}
	   if ($_POST['lieu3']=='on')
	   {echo " à la montagne";}
	   if ($_POST['lieu4']=='on')
	   {echo " en ville";}
	   ?>.
	  </p>
	  
	  <p>Vous avez sélectionné les attributs suivants: <?php 
       if ($_POST['case1']=='on')
	   {echo "Animaux acceptés";}
	   if ($_POST['case2']=='on')
	   {echo "Climatisation";}
	   if ($_POST['case3']=='on')
	   {echo " Chauffage";}
	   if ($_POST['case4']=='on')
	   {echo " Machine à laver";}
	   if ($_POST['case5']=='on')
	   {echo "Sèche linge";}
	   if ($_POST['case6']=='on')
	   {echo "Cheminée";}
	   if ($_POST['case7']=='on')
	   {echo "Télévision";}
	   if ($_POST['case8']=='on')
	   {echo "Parking";}
	   if ($_POST['case9']=='on')
	   {echo "Piscine";}
	   if ($_POST['case10']=='on')
	   {echo "Jardin";}
	   if ($_POST['case11']=='on')
	   {echo "Balcon";}
	   if ($_POST['case12']=='on')
	   {echo "Internet sans fil";}
	    
	  ?> </p>
	  <p>

	  <p/>
	  
	  <p>
	<a href="recherche_avancée.php">Cliquer ici</a> pour effectuer une autre recherche.
	  </p>
    </body>
</html>
