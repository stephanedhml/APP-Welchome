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

            if (isset($_POST["message"]))
            {
                $message = $_POST["message"];
                $userid = $_SESSION["userid"];


            $req = $bdd -> prepare('INSERT INTO echange(id_demandeur, id_proprietaire, id_logement, date_update, user1) VALUES(:demandeur, :proprietaire, :logement, :date_update,:user1_want)');
            $req -> execute(array(
                "demandeur" => $_GET['demandeur'],
                "proprietaire" => $_GET['proprietaire'],
                "logement" => $_GET['id_logement'],
                "date_update" => date("Y-m-d H:i:s"),
                "user1_want" => 1,
            ));

            $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre_message,message,echange) VALUES(:destinataire,:expediteur,:dates,:titre, :message, :echange)");
            $res -> execute(array(
                "destinataire" => $_GET['proprietaire'],
                "expediteur" => $_SESSION["userid"],
                "dates" => $date = date("Y-m-d H:i:s"),
                "titre" => "Proposition d'échange",
                "message" => $message,
                "echange" => 1,
            ));

                if($derid = $bdd -> lastInsertId())
                {
                    $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_messages=?");
                    $nv -> execute(array($derid));
                    ?>
                    <div class="no_msg"><h7>Votre demande a bien été transmise !</h7><br/><br/>
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

            <?php
                $demandeur = $_GET["demandeur"];
                $proprietaire = $_GET["proprietaire"];
                $logement = $_GET["id_logement"];
            ?>

            <div class="cadre_msg"
            <div class="contentg">
                <div class="msg_form">
                    <form action="echg_msg.php?demandeur=<?php echo $demandeur;?>&proprietaire=<?php echo $proprietaire; ?>&id_logement=<?php echo $logement ;?>" method="post" xmlns="http://www.w3.org/1999/html">
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