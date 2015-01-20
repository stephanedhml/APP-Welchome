<?php
include("config.php");
?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../style.css" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
		<title>créer profil</title>
	</head>
	
	<body>
		<div class="header">
			<?php
				include("menu2.php");
				include("modelecreerprofil.php");
			?>
		</div>
		<?php
			//Vérification du bon envoi du formulaire
			if(isset($_POST['lastname'], $_POST['firstname'], $_POST['genre'], $_POST['tel']))
			{
				if(strlen($_POST['tel'])>=10)
				{
					$reqprofil =add_user_datasprofil();
					if($bdd->lastInsertId())
					{
						$form=false;
						echo ' <div>'.profilcreertrue.'</div>';
					}
					else
					{
						$form=true;
						$message= errorcreateprofile;
					}
				}
				else
				{
					$form=true;
					$message=telverif; 
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
			
?>
			
			<div class="content">
				<form action="creerprofil.php" method="post">
					<div class="signup_form">
						<br/><label for="lastname"><?php echo lastname; ?> :</label><br/><input type="text" name="lastname" /><br />
						<br/><label for="firstname"><?php echo firstname; ?> :</label><br/><input type="text" name="firstname" /><br />
						<br/><label for="genre"><?php echo genre; ?> :</label><br/><span>M</span><input type="radio" name="genre" /><span>F</span><input type="radio" name="genre" /><br />
						<br/><label for="tel">Tel :</label><br/><input type="tel" name="tel"/><br/>
						<br/><input type="submit" value="Envoyer" id="btn_envoyer" />
					</div>
				</form>
			</div>
		<?php
			}
		?>
		<?php
			include("footer.php");
        ?>
</body>		
</html>