<!--Différences d'affichage du menu en fonction de l'état connecté ou non-->
<link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
<link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
<?php
	include('config.php');
	//Si lutilisateur est connecté, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
	if(isset($_SESSION['username']))
	{
?>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="#">Notifications</a></li>
		<li><a href="connexion.php">Se déconnecter</a></li>
<?php
	}
	else
	{
	//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
?>
        <li><a href="#" class="btn_FAQ">FAQ</a></li>
        <li><a href="sign_up.php">Inscription</a></li>
	<li><a href="connexion.php" class="btn_SECONNECTER">Se connecter</a></li>
<?php
	}
?>