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
