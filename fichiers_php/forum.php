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
                <th>Catégorie</th>
                <th>Description</th>
                <th>Messages</th>
                <th>Dernier message</th>
            </tr>
            <tr>
                <td>Site</td>
                <td>Toutes les news concernant le site (améliorations, propositions etc)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Boîte à idées</td>
                <td>Propositions des utilisateurs pour améliorer le service proposé par l'équipe Welchome</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Problèmes</td>
                <td>Vous avez un problème ? On peut vous aider ! Venez exposer votre situation sur le forum !</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Blabla Corner</td>
                <td>Discussions en tous genres</td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
<!-- Ajouter table : categorie, topic, liste sujets, messages ?, -->