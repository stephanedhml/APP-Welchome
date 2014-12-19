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
        $req = $bdd -> prepare("SELECT id_users FROM users WHERE username = ? ");
        $req -> execute(array($destinataire));
        $dn = $req -> fetch();

        $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre_message,message) VALUES(:destinataire,:expediteur,:dates,:titre, :message)");
        $res -> execute(array(
            "destinataire" => $dn[0],
            "expediteur" => $userid,
            "dates" => $date = date("Y-m-d H:i:s"),
            "titre" => $titre,
            "message" => $message,
        ));


        if($derid = $bdd -> lastInsertId())
        {
            $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_messages=?");
            $nv -> execute(array($derid));
            ?>
            <div class="no_msg"><h7>Votre message a bien &#233;t&#233; envoy&#233; !</h7><br/><br/>
            <a href="accueilmanu.php">Retourner à l'accueil</a></div>
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
<div class="cadre_msg"
<div class="contentg">
<div class="msg_form">
    <form action="ecriremsg.php" method="post" xmlns="http://www.w3.org/1999/html">
        <label for="destinataire">Destinataire</label><br/>
        <select name="destinataire">
            <?php
            for ($i=0 ; $i < $nb ; $i++) {
                $username = $req -> fetch();
                ?>
                <option value='<?php echo $username[0] ?>' ><?php echo $username[0]?></option>
                <?php
            }
            ?>
        </select> <br /> <br />
        <label for="titre">Titre du message</label>
        <input type="text" name="titre"> <br/>
        <label for="message">Message</label>
        <input type="text" name="message"> <br /><br />
        <input type="submit" value="Envoyer">
    </form>
</div>
</div>
</div>
                </div>
            </div>
        </div>
</body>
</html>