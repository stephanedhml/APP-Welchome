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
        <?php
        if(isset($_SESSION['userid'])){

            echo ' <a href="new_topic.php?id_topic='. $_GET['id_cat'] .'" id="btn_new_topic">Nouveau Sujet</a> ';
        }
        else {echo '<a href="sign_up.php" id="btn_connexion">Inscrivez vous pour lancer un sujet !</a>'; }
        ?>
        <table class="tableau_site">
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

            $ret = $bdd -> prepare("SELECT last_message FROM forum_forum WHERE id_cat=?");
            $ret -> execute(array($_GET['id_cat']));

            if ($nb == 0) {echo "";}
            else {
                for ($i=0;$i<$nb;$i++) {
                    $topic = $req -> fetch();
                    $last = $ret -> fetch();

                    $last2 = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $last2 -> execute(array($last[0]));
                    $lastf = $last2 -> fetch();


                    ?>
                    <tr>
                        <td><a href="topic.php?id_topic=<?php echo $topic[0]; ?>"><?php echo $topic[3];?></a></td>
                        <td><?php echo $topic[5];?></td>
                        <td><?php echo $topic[6];?></td>
                        <td><?php echo $lastf[1];?></td>
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