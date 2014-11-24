<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 20/11/2014
 * Time: 14:53
 */

}
else
{
    //L'utilisateur n'est pas connecté, on vérifie que le formulaire de connexion a bien été envoyé
    if (isset($_POST["username"], $_POST["password"])) {
        //Le formulaire est envoyé : il faut associer à des variables les champs rentrés par l'utilisateur
        $username = $_POST["username"];
        $password = $_POST["password"];

        //On récupère le mot de passe de l'utilisateur
        $req = $bdd->prepare('SELECT password, id FROM users WHERE username = ?');
        $req->execute(array($_POST['username']));
        $dn = $req->fetch();

        //Puisque le mdp de la BDD est haché, on hache le mdp fourni par l'utilisateur
        $pass_hache = sha1($password);

        //On le compare à celui qu'il a rentré et on vérifie si le membre existe
        if ($dn["password"] == $pass_hache) {
            //Mot de passe correct : on affiche pas le formulaire
            $form = false;
            //On enregistre son pseudo dans la session username et son identifiant dans la session userid
            $_SESSION["username"] = $username;
            $_SESSION["userid"] = $dn["id"];