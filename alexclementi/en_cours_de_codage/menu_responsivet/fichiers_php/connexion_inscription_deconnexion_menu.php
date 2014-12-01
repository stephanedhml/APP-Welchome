<!--Différences d'affichage du menu en fonction de l'état connecté ou non-->

<?php
	include('config.php');
	//Si lutilisateur est connecté, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
	if(isset($_SESSION['username']))
	{
?>
		<li><a href="#">Notifications</a></li>
		<li><a href="connexion.php">Se déconnecter</a></li>
<?php
	}
	else
	{
	//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
?>
	<li><a href="sign_up.php">Inscription</a></li>
	<li><a href="connexion.php">Se connecter</a></li>
<?php
	}
?>