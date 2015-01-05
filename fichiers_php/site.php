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
            $req = $bdd -> query("SELECT * FROM forum_topic WHERE id_cat=2");
            $nb = $req -> rowCount();

            if ($nb == 0) {echo "Il n'y a aucun sujet dans cette catégorie du forum";}
            else {
                for ($i=0;$i<$nb;$i++) {
                    $topic = $req -> fetch();
                    ?>
                    <tr>
                        <td><?php echo $topic[2];?></td>
                        <td><?php echo $topic[3];?></td>
                        <td><?php echo $topic[4];?></td>
                        <td><?php echo ""; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>

        </table>

    </div>
</div>
</body>
</html>