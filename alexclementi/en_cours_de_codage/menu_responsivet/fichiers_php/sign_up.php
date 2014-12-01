<!--Module d'inscription -->

<?php
	include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../style.css" />
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
		<title>Inscription</title>
	</head>
	
	<body>
		<div class="header">
            <?php include("menus.php"); ?>
		</div>
		
		<?php
			//Vérification du bon envoi du formulaire
			if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['avatar']) and $_POST['username']!='')
			{
				//On vérifie que les deux mots de passe coïncident
				if($_POST['password']==$_POST['passverif'])
				{
					//On vérifie si le mdp contient bien 6 caract. mini
					if(strlen($_POST['password'])>=6)
					{
						//On vérifie si l'email est valide
						if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
						{
							// Hachage du mot de passe
							$pass_hache = sha1($_POST["password"]);
				
							//On vérifie si le pseudo n'existe pas déjà
							$req = $bdd->prepare('SELECT id FROM users WHERE username=?');
							$req->execute(array($_POST['username']));
							$res = $req->fetch();
									
							if(!$res)
							{
								//On insère les données saisies par l'utilisateur dans la BDD
								$req = $bdd->prepare('INSERT INTO users(username,password,email,avatar) VALUES(:username, :password, :email, :avatar)');
								$req->execute(array
								(
								'username' => $_POST["username"],
								'password' => $pass_hache,
								'email' => $_POST["email"],
								'avatar' => $_POST["avatar"],
								));
											
								//On enregistre les infos dans la base de donnée
								if($bdd->lastInsertId())
								{
									//Si ça a fonctionné, on affiche pas le formulaire
									$form=false;
		?>
									<div class='message'>Vous avez bien été inscrit. Vous pouvez désormais vous connecter !
									</br><a href="connexion.php">Se connecter</a>
									</div>
		<?php
								}
								else
								{
									//Sinon, il y a une erreur
									$form=true;
									$message = "Une erreur est survenue lors de l'inscription.";
								}
							}
							else
							{
								//Si il existe déjà, on en informe l'utilisateur
								$form=true;
								$message="Désolé, ce pseudo est déjà pris !";
							}
						}
						else
						{
							//L'email n'est pas valide, message d'erreur
							$form=true;
							$message="L'email rentrée n'est pas valide.";
						}
					}
					else
					{
						//Le mdp ne fait pas 6 caractères
						$form=true;
						$message="Désolé, votre mot de passe doit faire au moins 6 caractères.";
					}
				}
				else
				{
					//Les mdp ne coïncident pas
					$form=true;
					$message="Les mots de passe rentrés ne sont pas identiques.";
				}
			}
			else
			{
				//Le formulaire n'a pas été bien envoyé
				$form=true;
			}
			
			
			
		if($form)
		{
			if(isset($message))
			{
				echo '<div class="message">'.$message.'</div>';
			}
			// On affiche le formulaire
		?>
			<div class="content">
				<form action="sign_up.php" method="post">
					<div class="signup_form">
						<label for="username">Nom d'utilisateur</label><br/><input type="text" name="username" value="<?php if(isset($_POST["username"])){echo htmlentities($_POST["username"], ENT_QUOTES,"UTF-8");} ?>" /></br>
						<br/><label for="password">Mot de passe<span class="small"> (6 caractères minimum)</span></label><br/><input type="password" name="password" /><br />
						<br/><label for="passverif">Mot de passe<span class="small"> (vérification)</span></label><br/><input type="password" name="passverif" /><br />
						<br/><label for="email">Email</label><br/><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
						<br/><label for="avatar">Image perso<span class="small"> (facultatif)</span></label><br/><input type="text" name="avatar" value="<?php if(isset($_POST['avatar'])){echo htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
						<br/><input type="submit" value="Envoyer" id="btn_envoyer" />
					</div>
				</form>
			</div>
		<?php
		}
		?>
	</body>
</html>
			
			