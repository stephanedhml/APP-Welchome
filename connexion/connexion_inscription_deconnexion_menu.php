<?php
include('config.php');
//Si lutilisateur est connecté, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
if(isset($_SESSION['username']))
{
?>
<a href="connexion.php">Se déconnecter</a>
<?php
}
else
{
//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
?>
<a href="sign_up.php">Inscription</a>
<a href="connexion.php">Se connecter</a>
<?php
}
?>