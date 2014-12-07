<!-- Module de connexion à la base de donnée avec vérification d'erreur -->

<?php
try
	{
		$bdd = new PDO ('mysql:host=localhost;dbname=Welchome', 'root', 'toor'); //, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>

