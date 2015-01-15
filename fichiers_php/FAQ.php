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
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
</head>



<body>


<script>

jQuery(document).ready(function() {
    $(".more").hide();
    jQuery('.button-read-more').click(function () {
        $(this).closest('.less').addClass('active');
        $(this).closest(".less").prev().stop(true).slideDown("1000");
    });
    jQuery('.button-read-less').click(function () {
        $(this).closest('.less').removeClass('active');
        $(this).closest(".less").prev().stop(true).slideUp("1000");
    });
});
 </script>



<header>
    <?php include("menus.php"); ?>
</header>

<div class="superglobal">
    <div class="global">
        <div class="forum_title"><h7>Aide en ligne</h7></div>
<div class="Tableau_rangee1">
<div class="FAQ_tableau">
<img src="https://cdn4.iconfinder.com/data/icons/flatron-set-2/512/loupe-512.png" class="loupe"><strong class="Titre_article">Nouveau membre Welchome</strong>
<div class="contenu_article">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
        <a class="button-read-less button-read" href="#read">Replier</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
    </div>
    </div>

    <div class="FAQ_tableau2">
<img src="https://cdn4.iconfinder.com/data/icons/flatron-set-2/512/loupe-512.png" class="loupe"><strong class="Titre_article">Messagerie</strong>
<div class="contenu_article">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
        <a class="button-read-less button-read" href="#read">Replier</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
    </div>
</div>
    </div>

    </div>
    <div class="Tableau_rangee2"><div class="FAQ_tableau3">
<img src="https://cdn4.iconfinder.com/data/icons/flatron-set-2/512/loupe-512.png" class="loupe"><strong class="Titre_article">Profil & Vérifications</strong>
<div class="contenu_article">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
        <a class="button-read-less button-read" href="#read">Replier</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
    </div>
    </div>

    <div class="FAQ_tableau4">
<img src="https://cdn4.iconfinder.com/data/icons/flatron-set-2/512/loupe-512.png" class="loupe"><strong class="Titre_article">Recherches</strong>
<div class="contenu_article">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
        <a class="button-read-less button-read" href="#read">Replier</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
    </div>
</div>
    </div></div>

     <div class="Tableau_rangee2"><div class="FAQ_tableau3">
<img src="https://cdn4.iconfinder.com/data/icons/flatron-set-2/512/loupe-512.png" class="loupe"><strong class="Titre_article">Compte & Mot de passe</strong>
<div class="contenu_article">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
        <a class="button-read-less button-read" href="#read">Replier</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
    </div>
    </div>

    <div class="FAQ_tableau4">
<img src="https://cdn4.iconfinder.com/data/icons/flatron-set-2/512/loupe-512.png" class="loupe"><strong class="Titre_article">Commentaires sur un échange</strong>
<div class="contenu_article">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
        <a class="button-read-less button-read" href="#read">Replier</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
        <a class="button-read-less button-read" href="#read">Replier</a>
    </div>
    </div>
</div>
    </div></div>




</div>
</div>
<?php
include("footer2.php");
?>

</body>