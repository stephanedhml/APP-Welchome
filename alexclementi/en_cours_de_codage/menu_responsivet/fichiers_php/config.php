<!-- Module de connexion à la base de donnée avec vérification d'erreur -->

<?php
try
	{
<<<<<<< Updated upstream
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
=======
<<<<<<< Updated upstream
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', 'toor', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
=======
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
>>>>>>> Stashed changes
>>>>>>> Stashed changes
	}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>
