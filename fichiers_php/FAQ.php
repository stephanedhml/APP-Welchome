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

<div class="superglobal2">
    <div class="global">
        <div class="forum_title"><h7><?php echo aide; ?></h7></div>
<div class="Tableau_rangee1">
<div class="FAQ_tableau">

<div class="contenu_article">
    <img src="http://ttvpsy.psychologies.com/0/8/6/3680.jpg" class="loupe"><strong class="Titre_article"><?php echo newmember; ?></strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p><?php echo pourcommencertxt; ?></p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p><?php echo pourcommencer; ?></p></a>
        <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p><?php echo envoyerbcptxt; ?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo envoyerbcp;?></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p><?php echo conclureechangetxt;?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo conclureechange;?></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>
</div></div>
    </div>
    </div>

    <div class="FAQ_tableau2">
<div class="contenu_article">
<img src="http://icake.fr/wp-content/uploads/2012/05/famille-ordi3.jpg" class="loupe"><strong class="Titre_article"><?php echo message; ?></strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p><?php echo commentcontactertxt;?></p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p><?php echo commentcontacter;?></p></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>

    </div>

</div>
 



<div class="toggle">
        <div class="more" style="display:none">
        <p><?php echo commentproposertxt; ?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo commentproposer; ?></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>
    </div>
</div></div>
    </div>

    </div>
    <div class="Tableau_rangee2"><div class="FAQ_tableau3">
        <div class="contenu_article">
<img src="http://cdn.pratique.fr/sites/default/files/articles/franchise-profil.jpg" class="loupe"><strong class="Titre_article"><?php echo profilverif; ?></strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p><?php echo mettreajourprofiltxt; ?></p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p><?php echo mettreajourprofil; ?></p></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p><?php echo changerprofiltxt; ?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo changerprofil; ?></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>
</div>
 


    </div> </div>
    </div>

    <div class="FAQ_tableau4">
<img src="http://blog.r-no.fr/wp-content/uploads/2013/02/clavier-encre-electronique-1.jpg" class="loupe"><strong class="Titre_article"><?php echo recherche;?></strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p><?php echo recherchesimpletxt; ?></p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p><?php echo recherchesimple; ?></p></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p><?php echo rechercheprecisetxt; ?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo rechercheprecise; ?></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>
</div>
 


</div>
    </div></div>

     <div class="Tableau_rangee3"><div class="FAQ_tableau3">
<img src="http://www.elomag.com/wp-content/uploads/2011/01/poignee-de-main.jpg" class="loupe"><strong class="Titre_article"><?php echo conclureechange1; ?></strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p><?php echo trouverlogementtxt; ?></p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p><?php echo trouverlogement; ?></p></a>
         <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p><?php echo contratdechangetxt; ?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo contratdechange; ?></a>
        <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
    </div>
</div>
 


    </div>
    </div>

    <div class="FAQ_tableau4">
<img src="http://imworld.aufeminin.com/story/20131203/femme-ordinateur-137550_w1000.jpg" class="loupe"><strong class="Titre_article"><?php echo commentairesechange; ?></strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p><?php echo fairecommentairetxt; ?></p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p><?php echo fairecommentaire; ?></p></a>
        <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p><?php echo commentecriretxt; ?></p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read"><?php echo commentecrire; ?></a>
        <a class="button-read-less button-read" href="#read"><?php echo reduire; ?></a>
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