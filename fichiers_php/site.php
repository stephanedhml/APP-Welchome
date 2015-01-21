<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();

$ret = $bdd -> prepare("SELECT * FROM forum_forum WHERE id_cat=?");
$ret -> execute(array($_GET["id_cat"]));
$name_cat = $ret -> fetch();

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

        <?php
        if (isset($_SESSION['userid'])) {
          echo ' <div class="forum_title"><h7> <a "site.php?id_cat='.$name_cat[0].'">'.$name_cat[1].'</a></h7></div>';
        }
        
        ?>
        <?php
        if(isset($_SESSION['userid'])){

            echo '
            <div class="forum_top">
                <div class="arborescence">
                    <a href="forum.php">Forum</a> -> <a href="site.php?id_cat='.$name_cat[0].'">'.$name_cat[1].'</a>
                </div>
                <div class="forum_top_r_button">
                    <a href="new_topic.php?id_cat='. $_GET['id_cat'] .'" id="btn_new_topic">Nouveau Sujet</a>
                </div>
            </div>
            ';
        }
        else {echo '    <div class="forum_title"><h7> <a "site.php?id_cat='.$name_cat[0].'">'.$name_cat[1].'</a></h7></div>
                        <div class="forum_top">
                            <div class="arborescence">
                                 <a href="forum.php">Forum</a> -> <a href="site.php?id_cat='.$name_cat[0].'">'.$name_cat[1].'</a>
                            </div>
                            <div class="forum_top_r_button">
                                 <a href="sign_up.php" id="btn_new_topic">Inscrivez vous pour lancer un sujet !</a>
                            </div>
                        </div>
                    ';}
        ?>

        <table class="tableau_site">
            <tr>
                <th><?php echo sujet; ?></th>
                <th style="width: 50px;"><?php echo nbreponse; ?></th>
                <th style="width: 50px;"><?php echo nbvu; ?></th>
                <th style="width: 150px;"><?php echo lastmessage; ?></th>
                <?php if (isset($_SESSION["userid"])) {if($user[8]==1) {?> <th style="width: 50px;">Administration</th> <?php } }?>
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
                        <td><a href="topic.php?id_topic=<?php echo $topic[0]; ?>&id_cat=<?php echo $_GET['id_cat']; ?>"><?php echo $topic[3];?></a></td>
                        <td><?php echo $topic[5];?></td>
                        <td><?php echo $topic[6];?></td>
                        <td><?php echo $lastf[1];?></td>
                        <?php if (isset($_SESSION["userid"])) { if($user[8]==1) {?> <td><a href='admin.php?del_topic=1&id_topic=<?php echo $topic[0]; ?>&id_cat=<?php echo $_GET['id_cat']; ?>'><img src='https://cdn3.iconfinder.com/data/icons/lynx/22x22/actions/dialog-close.png'></a></td> <?php } } ?>
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