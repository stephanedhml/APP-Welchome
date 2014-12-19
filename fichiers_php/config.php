<!-- Module de connexion à la base de donnée avec vérification d'erreur -->

<?php
try
	{

		$bdd = new PDO ('mysql:host=localhost;dbname=Welchome', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


		$bdd = new PDO ('mysql:host=localhost;dbname=Welchome', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


	}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>

