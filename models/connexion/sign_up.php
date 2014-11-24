<?php
function userRegister()
{
//On vérifie si le pseudo n'existe pas déjà
    $req = $bdd->prepare('SELECT id FROM users WHERE username=?');
    $req->execute(array($_POST['username']));
    $res = $req->fetch();
    if (!$res) {
//On insère les données saisies par l'utilisateur dans la BDD
        $req = $bdd->prepare('INSERT INTO users(username,password,email,avatar) VALUES(:username, :password, :email, :avatar)');
        $req->execute(array(
            'username' => $_POST["username"],
            'password' => $pass_hache,
            'email' => $_POST["email"],
            'avatar' => $_POST["avatar"],
        ));
//On enregistre les infos dans la base de donnée
        if ($bdd->lastInsertId()) {
//Si ça a fonctionné, on affiche pas le formulaire
            $form = false;
            ?>
            <div class='message'>Vous avez bien été inscrit. Vous pouvez désormais vous connecter !
                </br><a href="connexion.php">Se connecter</a></div>
        <?php
        } else {
            //Sinon, il y a une erreur
            $form = true;
            $message = "Une erreur est survenue lors de l'inscription.";
        }
    } else {
        //Si il existe déjà, on en informe l'utilisateur
        $form = true;
        $message = "Désolé, ce pseudo est déjà pris !";
    }
}