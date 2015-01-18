<!--Différences d'affichage du menu en fonction de l'état connecté ou non-->
<script type="text/javascript" src="../fichier_js/connexion.js"></script>
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
    if ($new!=0) {echo '<li><a  href="message.php"  class="btn_MESSAGES_NEW cl">Messages <div class="numberfont">'.$new.'</div></a></li>';} else {echo '<li><a href="message.php"  class="btn_MESSAGES cl">Messages</a></li>';}
}
	//Si lutilisateur est connecté, on lui donne un lien pour modifier ses informations, pour voir ses messages et un pour se deconnecter
	if(isset($_SESSION['username']))
	{
        $req = $bdd -> prepare("SELECT id_logement FROM logement WHERE id_users=:id_user ORDER BY id_logement DESC");
        $req -> execute(array(
            'id_user' => $_SESSION['userid'],
        ));
        $id_log = $req -> fetch();
?>
        <li><a class="cl" style="width: 100px;" href="edit_profile.php?id_user=<?php echo $_SESSION['userid']?>" class="btn_PROFIL">Compte</a></li>
        <?php echo check_new_msg() ?>
		<li><a class="cl" href="connexion.php"  onclick="return deconnect()"><?php echo disconnect ?></a></li>
<?php
	}
	else
	{
	//Sinon, on lui donne un lien pour sinscrire et un autre pour se connecter
?>
        <li><a href="FAQ.php" class="btn_FAQ cl"><?php echo faq;?></a></li>
        <li><a  href="sign_up.php" class="cl" ><?php echo register; ?></a></li>
	<li><a href="connexion.php" class="btn_SECONNECTER cl"><?php echo connect;?></a></li>
<?php
	}
?>