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
<body class="forum_messagerie">

<header>
    <?php include("menus.php"); ?>
</header>
<div class="superglobal">
    <div class="global">
        <div class="forum_title"><h7><?php echo forum ?></h7></div>
        <table class="tableau_forum_accueil0">
            <tr>
                <th><?php echo categorie; ?></th>
                <th><?php echo description; ?></th>
                <th style="width: 50px;"><?php echo nbmessages; ?></th>
                <th><?php echo lastmessage; ?></th>
            </tr>
            <?php
            $req = $bdd -> query("SELECT * FROM forum_forum");
            $nb = $req -> rowCount();

            if ($nb == 0) {echo "PROBLEME" ;}
            else {
                for ($i=0 ; $i < $nb ; $i++) {
                    $cat = $req -> fetch();

                    $last = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $last -> execute(array($cat[4]));
                    $lastf = $last -> fetch();

                    ?>
                    <tr>
                        <td><a href="site.php?id_cat=<?php echo $cat[0]?>"><?php echo $cat[1];?></a></td>
                        <td><?php echo $cat[2];?></td>
                        <td><?php echo $cat[3];?></td>
                        <td><?php echo ''.$lastf[1].'';?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
<?php
include("footer2.php");
?>
</body>
</html>
<!-- Ajouter table : categorie, topic, liste sujets, messages ?, -->