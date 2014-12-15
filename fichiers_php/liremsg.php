<?php
include("config.php");
include("modeles.php");

session_start();
?>

<?php
if (!isset($_SESSION["userid"]))
{
    header ("Location: accueilmanu.php");
    exit();
}

$req = $bdd -> prepare("SELECT id_expediteur, titre, message FROM messages WHERE id_destinataire=?");
$req -> execute(array($_SESSION["userid"]));
$nb = $req -> rowCount();


if ($nb == 0) {
    echo 'Aucun message';
}
else {
    for ($i=0 ; $i < $nb ; $i++) {
        $msg_recu = $req -> fetch();
        $quser = $bdd -> prepare("SELECT username FROM users WHERE id=?");
        $quser -> execute(array($msg_recu[0]));
        $un = $quser -> fetch();
        ?>
        <table border="1" width="400" style="text-align: center;">
            <tr>
                <td>Nom exp&#233;diteur</td>
                <td>Objet</td>
                <td>Message</td>

            </tr>
            <tr>
                <td><?php echo $un[0]; ?></td>
                <td><?php echo $msg_recu[1]; ?></td>
                <td><?php echo $msg_recu[2]; ?></td><br/>
            </tr>
        </table>

    <?php
    }
}
?>
<br/>
<a href="ecriremsg.php">Envoyer un message</a>