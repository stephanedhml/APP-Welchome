<?php
<!--Module d'inscription -->

<?php
	include("config.php");
    include("modeles.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../style.css" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
		<title>Inscription</title>
	</head>

	<body class="wood">
		<div class="header">
            <?php include("menus.php"); ?>
		</div>
        <div class="superglobal">
        <div class="global">
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
                                $req->execute(array(
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
                                        </br><a href="connexion.php">Se connecter</a></div>
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
<div class="cadreinscrpt">
    <div class="contentg">
        <div class="signup_form1">

        </div>
        <!-- </div>
        <div class="contentd1">

        </div>
        <div class="contentd2">
            <div class="signup_form2">

            </div>

        </div> -->
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>

