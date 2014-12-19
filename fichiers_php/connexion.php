<!--Module de connexion d'un utilisateur -->

<?php
	include("config.php");
    include("modeles.php");

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="stylesheet" href="../style.css" />
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
        <title>Connexion</title>
    </head>

	<body class="wood">
		<div class="header">
            <?php include("menus.php"); ?>
		</div>
        <div class="superglobal">
        <div class="global">

		<?php
			//Si l'utilisateur est connecté, on le déconnecte
			if(isset($_SESSION["username"]))
			{
				//On unset les variables username et userid pour déconnecter l'utilisateur de sa session
				unset($_POST["username"],$_POST["userid"]);
		?>

				<div class="message">Vous avez bien été déconnecté !</br>
					<a href="accueilmanu.php" class="btn_rtr_accueil">Retour à l'accueil</a>
				</div>

				<?php
					session_destroy();
				?>
				
				<?php
			}
			else
			{
				//L'utilisateur n'est pas connecté, on vérifie que le formulaire de connexion a bien été envoyé
				if(isset($_POST["username"], $_POST["password"]))
				{
					//Le formulaire est envoyé : il faut associer à des variables les champs rentrés par l'utilisateur
					$username = $_POST["username"];
					$password = $_POST["password"];
					
					//On récupère le mot de passe de l'utilisateur
                    $dn=recuperer_psswd_user();



					//Puisque le mdp de la BDD est haché, on hache le mdp fourni par l'utilisateur
					$pass_hache=sha1($password);
					
					//On le compare à celui qu'il a rentré et on vérifie si le membre existe
					if($dn["password"]==$pass_hache)
					{
						//Mot de passe correct : on affiche pas le formulaire
						$form=false;
						//On enregistre son pseudo et son identifiant dans la session
						$_SESSION["username"]=$username;
						$_SESSION["userid"]=$dn["id_users"];
				?>

						<div class="message">Vous avez bien été connecté !</br>
							<a href="accueilmanu.php" class="btn_rtr_accueil">Retour à l'accueil</a>
						</div>

		<?php
					}
					else
					{
						$form=true;
						$message = 'Le nom d\'utilisateur ou le mot de passe saisi est incorrect. Veuillez réessayer !';
					}
				}
				else
				{
					$form = true;
				}
				
				
				if($form)
				{
						//On affiche un message
					if(isset($message))
					{
						echo '<div class="message">' .$message. '</div>';
					}
					//On affiche le formulaire
		?>

					<div class="cadrec">
                    <div class="contentgc">
						<div class="connex1">
						<form action="connexion.php" method="post">
								<label for="username" id="username_form"> Nom d'utilisateur </label><br/>
								<input type="text" name="username" id="username" /><br /><br/>
								<label for="password">Mot de passe </label><br/>
								<input type="password" name="password" id="password" /><br /><br/>
								<input type="submit" value="Connexion" id="btn_connexion" /><br/><br/>

						</form>
                        </div>
                    </div>
                    </div>
					<?php
				}
			}
					?>
            </div>
        <?php
        include("footer.php");
        ?>
        </div>
    </body>
</html>
