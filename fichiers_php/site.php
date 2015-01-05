<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
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

        <table class="tableau_forum_accueil">
            <tr>
                <th>Sujets</th>
                <th>Nb réponses</th>
                <th>Nb vus</th>
                <th>Dernier message</th>
            </tr>
            <?php
            $req = $bdd -> prepare("SELECT * FROM forum_topic WHERE id_cat=?");
            $req -> execute(array($_GET['id_cat']));
            $nb = $req -> rowCount();

            if ($nb == 0) {echo "Il n'y a aucun sujet dans cette catégorie du forum";}
            else {
                for ($i=0;$i<$nb;$i++) {
                    $topic = $req -> fetch();
                    ?>
                    <tr>
                        <td><a href="topic.php?id_topic=<?php echo $topic[0]; ?>"><?php echo $topic[3];?></a></td>
                        <td><?php echo $topic[5];?></td>
                        <td><?php echo $topic[6];?></td>
                        <td><?php echo ""; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>
        <?php
        if(isset($_SESSION['userid'])){

           echo ' <a href="new_topic.php?id_topic='. $_GET['id_cat'] .'" id="btn_connexion">Nouveau Sujet</a> ';
        }
        else {echo '<a href="sign_up.php" id="btn_connexion">Inscrivez vous pour lancer un sujet !</a>'; }
        ?>

    </div>
</div>
</body>
</html>