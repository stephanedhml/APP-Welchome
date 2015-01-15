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
                header ("Location: index.php");
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
                "logement" => $_GET['logement'],
                "date_update" => date("Y-m-d H:i:s"),
                "user1_want" => 1,
            ));

            $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre_message,message,echange,choix) VALUES(:destinataire,:expediteur,:dates,:titre, :message, :echange, :choix)");
            $res -> execute(array(
                "destinataire" => $_GET['proprietaire'],
                "expediteur" => $_SESSION["userid"],
                "dates" => $date = date("Y-m-d H:i:s"),
                "titre" => "Proposition d'échange",
                "message" => $message,
                "echange" => 1,
                "choix" => 1,
            ));

                if($derid = $bdd -> lastInsertId())
                {
                    $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                    $nv -> execute(array($derid));
                    ?>
                    <div class="no_msg"><h7><?php echo demandetransmise; ?></h7><br/><br/>
                        <a href="index.php"><?php echo retouraccueil; ?></a></div>
                <?php
                }
                else
                {
                    ?>
                    <div><!-- pas traduit pour le moment -->Il y a eu un problème lors de l'envoi de votre message, veuillez r&#233;essayer.</div> <br/>
                    <a href="index.php"><?php echo retouraccueil; ?></a>
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
                $logement = $_GET["logement"];
            ?>

            <div class="cadre_msg">
            <div class="contentg">
                <div class="answer1">
                    <form action="echg_msg.php?demandeur=<?php echo $demandeur;?>&proprietaire=<?php echo $proprietaire; ?>&logement=<?php echo $logement ;?>" method="post" xmlns="http://www.w3.org/1999/html">
                        <label for="message" >Message</label ><br /></br >
                        <textarea type = "text" name = "message" class="post_message" ></textarea ><br /><br />
                        <input type = "submit" value = "Envoyer" id = "btn_connexion" /><br /><br />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>