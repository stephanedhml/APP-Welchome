<!-- Module de connexion à la base de donnée avec vérification d'erreur -->

<?php
try
	{

<<<<<<< HEAD
<<<<<<< HEAD
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
=======
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
>>>>>>> FETCH_HEAD
=======
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
>>>>>>> FETCH_HEAD
}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>

