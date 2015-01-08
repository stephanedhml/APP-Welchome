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

        <table class="tableau_forum_accueil0">
            <tr>
                <th>Catégorie</th>
                <th>Description</th>
                <th>Nb Messages</th>
                <th>Dernier message</th>
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
</body>
</html>
<!-- Ajouter table : categorie, topic, liste sujets, messages ?, -->