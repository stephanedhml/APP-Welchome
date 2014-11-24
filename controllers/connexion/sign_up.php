<?php
function signUpController()
{

//Vérification du bon envoi du formulaire
    if (isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['avatar']) and $_POST['username'] != '') {
        //On vérifie que les deux mots de passe coïncident
        if ($_POST['password'] == $_POST['passverif']) {
            //On vérifie si le mdp contient bien 6 caract. mini
            if (strlen($_POST['password']) >= 6) {
                //On vérifie si l'email est valide
                if (preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i', $_POST['email'])) {
                    // Hachage du mot de passe
                    $pass_hache = sha1($_POST["password"]);


                }
            } else {
                //L'email n'est pas valide, message d'erreur
                $form = true;
                $message = "L'email rentrée n'est pas valide.";
            }
        } else {
            //Le mdp ne fait pas 6 caractères
            $form = true;
            $message = "Désolé, votre mot de passe doit faire au moins 6 caractères.";
        }
    } else {
        //Les mdp ne coïncident pas
        $form = true;
        $message = "Les mots de passe rentrés ne sont pas identiques.";
    }
}

else {
    //Le formulaire n'a pas été bien envoyé
    $form = true;
}
}