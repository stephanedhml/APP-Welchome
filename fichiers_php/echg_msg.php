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
    <?php include("menu2.php"); ?>
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
            elseif (isset($_GET["demandeur"],$_GET["proprietaire"])) {
            $demandeur = $_GET["demandeur"];
            $proprietaire = $_GET["proprietaire"];

            //Affiche les logements pour que l'utilisateur puisse choisir celui qu'il veut échanger

            $ret = $bdd -> prepare("SELECT * FROM logement WHERE id_users=? ORDER BY id_logement DESC");
            $ret -> execute(array($_SESSION["userid"]));
            $nmber = $ret -> rowCount();

            if (isset($_GET['logement'])) {} else {
                    ?>
                    <div class="forum_title"><h7>Choisissez le logement que vous souhaitez échanger</h7></div>
                    <div class="container_liste_logements"> <?php
                    for ($i=0 ; $i < $nmber ; $i++) {
                        $house = $ret -> fetch();

                        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                        $pic -> execute(array($house[0]));
                        $url_pic = $pic -> fetch();

                        ?>
                        <div class="cadre_logement">
                            <div class="left_cadre_logement">
                                <?php echo '<img src="'.$url_pic['lien_photo'].'" class="photo">' ?>
                            </div>

                            <div class="right_cadre_logement">
                                    <span>
                                    <a href="echg_msg.php?id_logement_asked=<?php echo $_GET['id_logement_asked']; ?>&demandeur=<?php echo $demandeur; ?>&proprietaire=<?php echo $proprietaire ?>&logement=<?php echo $house[0]; ?>"><?php echo $house["nom_maison"] ; ?></a>
                                    <a href="echg_msg.php?id_logement_asked=<?php echo $_GET['id_logement_asked']; ?>&demandeur=<?php echo $demandeur; ?>&proprietaire=<?php echo $proprietaire ?>&logement=<?php echo $house[0]; ?>">
                                        <?php echo '<p>' .''.$house['localisation']. ' </br>' . $house['nombre_voyageurs']. ' voyageurs </br>' . $house['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                            </div>
                        </div><br/></div>

                    <?php } }

            if (isset($_POST["message"]))
            {
                //On vérifie si l'utilisateur a déjà échangé cette maison avec cet utilisateur, si c'est le cas alors on supprime l'info "a déjà échangé telle maison avec tel utilisateur"
                $rer = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=:id_demandeur AND id_logement_asked=:id_logement_asked");
                $rer -> execute(array(
                    'id_demandeur' => $_SESSION['userid'],
                    'id_logement_asked' => $_GET['id_logement_asked'],
                ));
                $already = $rer -> fetch();

                if (isset($already['end_ech']) AND $already['end_ech']==1) {
                    $del = $bdd -> prepare("DELETE FROM echange WHERE id_echange=?");
                    $del -> execute(array($already['id_echange']));
                }

                //On traite le formulaire
                $message = $_POST["message"];
                $userid = $_SESSION["userid"];


            $req = $bdd -> prepare('INSERT INTO echange(id_demandeur, id_proprietaire, id_logement, date_update, user1,id_logement_asked) VALUES(:demandeur, :proprietaire, :logement, :date_update,:user1_want,:id_logement_asked)');
            $req -> execute(array(
                "demandeur" => $_GET['demandeur'],
                "proprietaire" => $_GET['proprietaire'],
                "logement" => $_GET['logement'],
                "date_update" => date("Y-m-d H:i:s"),
                "user1_want" => 1,
                "id_logement_asked" => $_GET['id_logement_asked'],
            ));

            $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre_message,message,echange,choix,id_logement_proposed) VALUES(:destinataire,:expediteur,:dates,:titre, :message, :echange, :choix,:logement_propose)");
            $res -> execute(array(
                "destinataire" => $_GET['proprietaire'],
                "expediteur" => $_SESSION["userid"],
                "dates" => $date = date("Y-m-d H:i:s"),
                "titre" => "Proposition d'échange",
                "message" => $message,
                "echange" => 1,
                "choix" => 1,
                "logement_propose" => $_GET["logement"],
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


            if (isset($_GET["logement"])) { $logement = $_GET["logement"];
            ?>

            <div class="cadre_msg">
            <div class="contentg">
                <div class="answer1">
                    <form action="echg_msg.php?id_logement_asked=<?php echo $_GET['id_logement_asked']; ?>&demandeur=<?php echo $demandeur;?>&proprietaire=<?php echo $proprietaire; ?>&logement=<?php echo $logement ;?>" method="post" xmlns="http://www.w3.org/1999/html">
                        <label for="message" >Message</label ><br /></br >
                        <textarea type = "text" name = "message" class="post_message" ></textarea ><br /><br />
                        <input type = "submit" value = "Envoyer" id = "btn_connexion" /><br /><br />
                    </form>
                </div>
            </div>
        </div>
            <?php } }?>
    </div>
</div>
</div>
</body>
</html>