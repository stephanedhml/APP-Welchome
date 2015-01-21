<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();

if (isset($_SESSION["userid"])) {

    $rel = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
    $rel -> execute(array($_SESSION['userid']));
    $user = $rel -> fetch();

}
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
    <?php include("menu2.php"); ?>
</header>
<div class="superglobal">
    <div class="global">
        <div class="forum_title"><h7><?php echo forum1 ?></h7></div>
        <?php
        if(isset($_SESSION['userid'])){ if ($user[8]==1) {

        echo '
        <div class="forum_top">
            <div class="forum_top_r_button">
                <a href="new_topic.php?new_cat" id="btn_new_topic">Nouveau Sujet</a>
            </div>
        </div>
        ';
        } }
        ?>
        <div class="forum_tableau"><table class="tableau_forum_accueil0">
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
                        <td><a href="site.php?id_cat=<?php echo $cat[0]?>"><?php echo $cat[2];?></a></td>
                        <td><?php echo $cat[3];?></td>
                        <td style="padding: 8px; width: 120px;">
                            <img src="<?php echo $lastf['avatar']?>" class="img_member"><br>
                            <?php echo $lastf[1]?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table></div>
    </div>
</div>
<?php
include("footer2.php");
?>
</body>
</html>
<!-- Ajouter table : categorie, topic, liste sujets, messages ?, -->