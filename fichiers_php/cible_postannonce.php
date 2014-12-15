<?php
include("config.php");
include("modeles.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--<link rel="stylesheet" href="style.css" />-->
        <title>Welc'Home</title>
    </head>

<p>Bonjour !</p>

<p>Votre logement se situe à <?php echo $_POST['localisation']; ?>. </p>

<p>Votre <?php echo $_POST['logement']; ?> est disponible du <?php echo $_POST['date_arrivée']; ?> au <?php echo $_POST['date_départ']; ?>.</p>

<p>Il pourra accueillir jusqu'à <?php echo $_POST['nb_personne']; ?>
 <?php if ($_POST["nb_personne"]>1)
{echo "personnes";}
else {echo "personne";}
?>
 et la superficie totale de votre bien est de <?php echo $_POST['surface']; ?> m2. </p>

<p>Votre bien se situe <?php echo $_POST['lieu']; ?> .</p>

<p>Il possède <?php echo $_POST['nb_chambres']; ?> chambres et <?php echo $_POST['nb_salle_bain']; ?> salle(s) de bain .</p>

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

<?php
$req = $bdd->prepare("INSERT INTO logement(Localisation,Nom_maison,Nombre_voyageurs,Type_logement,Nb_chambres,Nb_salles_bain,Description) VALUES(:localisation, :nom_maison, :nb_personne, :logement, :nb_chambres, :nb_salle_bain, :description");
                                $req->execute(array
(
    'localisation' => $_POST['localisation'],
    'nom_maison' => $_POST['nom_maison'],
    'nb_personne' => $_POST['nb_personne'],
    'logement' => $_POST['logement'],
    'nb_chambres' => $_POST['nb_chambres'],
    'nb_salle_bain' => $_POST['nb_salle_bain'],
    'description' => $_POST['description'],
));
?>
