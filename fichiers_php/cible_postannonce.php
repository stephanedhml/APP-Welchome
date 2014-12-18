<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Welc'Home</title>
    </head>

<p>Bonjour !</p>

<p>Votre logement se situe à <?php echo $_POST['localisation']; ?> </p>

<p>Votre <?php echo $_POST['logement']; ?> est disponible du <?php echo $_POST['date_arrivée']; ?> au <?php echo $_POST['date_départ']; ?>.

Il pourra accueillir jusqu'à <?php echo $_POST['nb_personne']; ?> et la superficie totale de votre bien est de <?php echo $_POST['surface']; ?> m2. </p>

<p>Votre bien se situe <?php echo $_POST['lieu']; ?> </p>

<p>Vous avez sélectionné :<br/> <?php
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

<p>Si certaines de ces informations sont fausses, merci de les modifier <a href="formulaire.php">en revenant au formulaire</a> </p>