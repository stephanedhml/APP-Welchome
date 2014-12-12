<!-- Module de connexion à la base de donnée avec vérification d'erreur -->

<?php
try
	{
<<<<<<< HEAD

		
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

=======
		$bdd = new PDO ('mysql:host=localhost;dbname=welchome', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
>>>>>>> FETCH_HEAD
	}
catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
?>

