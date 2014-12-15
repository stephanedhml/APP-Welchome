<?php
include("config.php");
include("modeles.php");

session_start();
?>

<?php
if (!isset($_SESSION["userid"]))
{
    header ("Location: accueilmanu.php");
    exit();
}

if (isset($_POST["destinataire"],$_POST["titre"], $_POST["message"]))
{
    $titre = $_POST["titre"];
    $message = $_POST["message"];
    $userid = $_SESSION["userid"];
    //On fait correspondre le pseudo du destinataire avec son id
    $destinataire = $_POST["destinataire"];
    $req = $bdd -> prepare("SELECT id FROM users WHERE username = ? ");
    $req -> execute(array($destinataire));
    $dn = $req -> fetch();

    $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,titre,message) VALUES(:destinataire,:expediteur,:titre, :message)");
    $res -> execute(array(
        "destinataire" => $dn[0],
        "expediteur" => $userid,
        "titre" => $titre,
        "message" => $message,
    ));

    if($bdd -> lastInsertId())
    {
        ?>
        <div>Votre message a bien été envoyé !</div>
        <?php
    }
    else
    {
        ?>
        <div>Il y a eu un problème lors de l'envoi de votre message, veuillez réessayer.</div>
        <?php
    }

}
?>

<form action="ecriremsg.php" method="post" xmlns="http://www.w3.org/1999/html">
    <select name="destinataire">
        <option value="Yoko">Yoko</option>
        <option value="Manu">Manu</option>
    </select> <br />
    <label for="titre">Titre du message</label>
    <input type="text" name="titre"> <br/>
    <label for="message">Message</label>
    <input type="text" name="message">
    <input type="submit" value="Envoyer">
</form>