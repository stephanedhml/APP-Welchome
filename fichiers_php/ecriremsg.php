<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="stylesheet" href="../style.css" />
    </head>
<body>

        <header>
            <?php include("menus.php"); ?>
        </header>
    <div class="superglobal">
        <div class="global">

            <div id="bloc_page_msg">
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
            <div>Votre message a bien &#233;t&#233; envoy&#233; !</div>
            <a href="accueilmanu.php">Retourner à l'accueil</a>
            <?php
        }
        else
        {
            ?>
            <div>Il y a eu un problème lors de l'envoi de votre message, veuillez r&#233;essayer.</div> <br/>
            <a href="accueilmanu.php">Retourner à l'accueil</a>
            <?php
        }

    }

    $req = $bdd -> prepare("SELECT username FROM users");
    $req -> execute(array());
    $nb = $req -> rowCount();

    ?>

    <form action="ecriremsg.php" method="post" xmlns="http://www.w3.org/1999/html">
        <select name="destinataire">
            <?php
            for ($i=0 ; $i < $nb ; $i++) {
                $username = $req -> fetch();
                ?>
                <option value='<?php echo $username[0] ?>' ><?php echo $username[0]?></option>
                <?php
            }
            ?>
        </select> <br />
        <label for="titre">Titre du message</label>
        <input type="text" name="titre"> <br/>
        <label for="message">Message</label>
        <input type="text" name="message">
        <input type="submit" value="Envoyer">
    </form>
                </div>
            </div>
        </div>
</body>
</html>