<!--Différences d'affichage du menu en fonction de l'état connecté ou non-->
<link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
<link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
<?php
	include('config.php');
function check_new_msg()
{
    global $bdd;
    $req = $bdd -> prepare("SELECT lu_nonlu FROM messages WHERE id_destinataire=? AND lu_nonlu=1");
    $req -> execute(array($_SESSION['userid']));
    $new = $req -> rowCount();
    if ($new!=0) {echo '<li><a href="message.php" class="btn_MESSAGES_NEW">Messages <div class="numberfont">'.$new.'</div></a></li>';} else {echo '<li><a href="message.php" class="btn_MESSAGES">Messages</a></li>';}
}
	//Si lutilisateur est connecté, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
	if(isset($_SESSION['username']))
	{
        $req = $bdd -> prepare("SELECT id_logement FROM logement WHERE id_users=?");
        $req -> execute(array($_SESSION['userid']));
        $id_log = $req -> fetch();
?>
        <li><a href="profil.php?id_logement=<?php echo $id_log[0]; ?>&id_users=<?php echo $_SESSION['userid']; ?>" class="btn_PROFIL">Profil</a></li>
        <?php echo check_new_msg() ?>
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