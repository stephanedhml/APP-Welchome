<!--Module d'inscription -->
<!-- A Ajouter : obliger l'utilisateur à remplir tous les champs (sauf certains) sans quoi le formulaire n'est pas valide -->
<?php
	include("config.php");
    include("modeles.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="../fichier_js/inscription.js"></script>
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
            if(isset($_POST['username'],$_POST['nom_maison'], $_POST['localisation'], $_POST['type_logement'], $_POST['password'], $_POST['passverif'], $_POST['email']) and $_POST['username']!='')
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
                            $req = $bdd->prepare('SELECT id_users FROM users WHERE username=?');
                            $req->execute(array($_POST['username']));
                            $res = $req->fetch();
                            if(!$res)
                            {
                                //On insère les données saisies par l'utilisateur dans la BDD
                                $req = $bdd->prepare('INSERT INTO users(username,password,email) VALUES(:username, :password, :email)');
                                $req->execute(array(
                                    'username' => $_POST["username"],
                                    'password' => $pass_hache,
                                    'email' => $_POST["email"],
                                ));
                                $new_id = $bdd->lastInsertId();

                                //On importe la photo de profil envoyée par l'utilisateur sur le serveur
                                $up_avatar_folder = "../photos_utilisateurs/{$new_id}.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !
                                if($_FILES['up_avatar']['error'] > 0 ) {echo "Une erreur est survenue lors de l'envoi de la photo";} else {
                                    $resultat = move_uploaded_file($_FILES['up_avatar']['tmp_name'],$up_avatar_folder);
                                }
                                //On ajoute la photo de profil dans la BDD
                                $res = $bdd -> query("UPDATE users SET avatar= '../photos_utilisateurs/{$new_id}.jpg' WHERE id_users=$new_id"); //A CORRIGER -> le fichier s'appelle id_logement.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 logement et plusieurs extensions possibles !

                                //On enregistre le logement dans la base de donnée
                                $ret = $bdd->prepare("INSERT INTO logement(localisation,type_logement,nom_maison,id_users) VALUES(:localisation, :type_logement, :nom_maison, :id_users)");
                                $ret->execute(array
                                (
                                    'localisation' => $_POST['localisation'],
                                    'nom_maison' => $_POST['nom_maison'],
                                    'type_logement' => $_POST['type_logement'],
                                    'id_users' => $new_id,
                                ));
                                $new_logement = $bdd -> lastInsertId();
                                //Importer la photo du logement sur le serveur
                                if($_FILES['upload_photo']['error'] > 0 ) {echo "Une erreur est survenue lors de l'envoi de la photo";} else {
                                    $up_folder = "../photos_logement/{$new_logement}.jpg";
                                    $resultat = move_uploaded_file($_FILES['upload_photo']['tmp_name'],$up_folder);
                                }
                                //Ajouter la photo du logement importée dans la BDD
                                $res = $bdd -> prepare("INSERT INTO photo(id_logement,lien_photo) VALUES(:id_logement, :lien_photo)");
                                $res -> execute(array(
                                    'id_logement' => $new_logement,
                                    'lien_photo' => $up_folder,
                                ));
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
                <div class="signup_form1">
                <form action="sign_up.php" method="post" enctype="multipart/form-data" onsubmit="return verifinscription()">
                    <div class="content_gauche">
                    <label for="username">Nom d'utilisateur</label><br/><input type="text" name="username" id="username" value="<?php if(isset($_POST["username"])){echo htmlentities($_POST["username"], ENT_QUOTES,"UTF-8");} ?>" onblur="return verifusername()" /><span id="user"></span></br>
                    <br/><label for="password">Mot de passe<span class="small"> (6 caractères minimum)</span></label><br/><input id="password" type="password" name="password" onblur="return verifpassword()"/><span id="psd"></span><br />
                    <br/><label for="passverif">Mot de passe<span class="small"> (vérification)</span></label><br/><input type="password" name="passverif" onblur="return verifegalite(this)"/><span id="psd2"></span><br />
                    <br/><label for="email">Email</label><br/><input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" onblur="return verifemail(this)"/><span id="mail"></span><br />
                    <br/><label for="avatar">Image perso</label><br/><input type="file" name="up_avatar" id="up_avatar"><br />
                    </div>
                    <div class="contentd1">
                        <div class="top_form_inscription_right"><label for="nom_maison">Nom de votre logement</label></div><input type="text" id="home" name="nom_maison" onblur="return verifnom()"><span id="nom"></span><br/><br/>
                        <label for="location_logement">Où se situe votre logement ?</label><br /><input type="text" name="localisation" id="land" placeholder="Ex: Paris" onblur="return veriflieu()"/><span id="lieu"></span><br /><br/>
                        <label for="type_logement">Quel type de logement proposez vous ?</label><br />
                        <select name="type_logement" id="choix">
                                <option value="Studio"> Studio</option>
                                <option value="Appartement"> Appartement</option>
                                <option value="Maison"> Maison</option>
                                <option value="Pavillon"> Pavillon</option>
                                <option value="Bungalow/gite"> Bungalow/gite</option>
                                <option value="Bateau/péniche"> Bateau/péniche</option>
                                <option value="Camping car"> Camping car</option>
                        </select><span id="type"></span><br />
                        <label for="lien_photo">Photos</label><br /><input type="file" name="upload_photo" id="upload_photo"><br/><br/> <!-- Il faut ajouter la possibilité d'up plusieurs photos pour un même logement ! -->
                        <!-- <label for="dispo_logement">Disponibilité de votre logement</label><br /> du <input type="text" name="date_arrivée" placeholder="JJ/MM/AAAA" size="12" /> au <input type="text" name="date_départ" placeholder="JJ/MM/AAAA" size="12" /> -->
                        <input type="submit" value="Envoyer" id="btn_envoyer" />
                    </div>
                </form>
                </div>
            <!-- <div class="contentd2">
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
			
			