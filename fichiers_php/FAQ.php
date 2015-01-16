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
        <div class="forum_title"><h7>AIDE EN LIGNE</h7></div>
<div class="Tableau_rangee1">
<div class="FAQ_tableau">

<div class="contenu_article">
    <img src="http://ttvpsy.psychologies.com/0/8/6/3680.jpg" class="loupe"><strong class="Titre_article">Nouveau membre Welchome</strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Il est très facile de vous présenter et décrire votre maison à la communauté Welchome. Plus vous mettrez de photos en ligne, plus vous susciterez de confiance et d'intérêt. Des photos de bonne qualité valorisent votre offre.</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Pour commencer</p></a>
        <a class="button-read-less button-read" href="#read">Réduire</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Choisissez parmi nos nombreuses offres, sauvegardez celles qui vous plaisent et  contacter les membres auteurs de ces offres grâce notre système de messagerie. Soyez proactif et répondez rapidement à tous les messages que vous recevrez.</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Envoyez beaucoup de propositions</a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Faites connaissance avec votre/vos partenaire(s) par courriel et par téléphone, mettez-vous d'accord sur les dates, réglez tous les détails.</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Concluer un échange</a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
</div></div>
    </div>
    </div>

    <div class="FAQ_tableau2">
<div class="contenu_article">
<img src="http://icake.fr/wp-content/uploads/2012/05/famille-ordi3.jpg" class="loupe"><strong class="Titre_article">Messagerie</strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Utilisez notre système de messagerie pour contacter les autres membres. Les messages que vous envoyez ou recevez sur le site sont conservés dans votre messagerie interne personnelle, tout comme les réponses que vous envoyez. Dès que vous échangez des messages avec une personne, elle rentre dans votre liste d'amis.</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment contacter d'autres membres?</p></a>
         <a class="button-read-less button-read" href="#read">Réduire</a>

    </div>

</div>
 



<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorsqu'un logement vous intéresse, appuyer sur "proposer un échange". Le propritaire sera ainsi notifier de votre demande et vous rentrerez un ainsi en contact avec lui.</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment proposer un échange?</a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
    </div>
</div></div>
    </div>

    </div>
    <div class="Tableau_rangee2"><div class="FAQ_tableau3">
        <div class="contenu_article">
<img src="http://cdn.pratique.fr/sites/default/files/articles/franchise-profil.jpg" class="loupe"><strong class="Titre_article">Profil & Vérifications</strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Votre profil vous permet de vous présenter, vous et votre famille, sur le site Trocmaison.com . Vous pouvez partager des informations sur vos centres d'intérêt, votre âge, votre profession, et le type d'échange dont vous rêvez. Votre profil, associé à la page de présentation de votre offre, est un élément essentiel pour conclure un échange. Plus vous donnez d'informations sur votre profil, plus il vous sera facile de trouver le partenaire idéal pour échanger. </p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Mettre à jour son profil?</p></a>
         <a class="button-read-less button-read" href="#read">Réduire</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Pour remplir son profil, ajouter ou modifier un logement, accédez à votre page profil via la barre menu et appuyer sur éditer votre profil dans la colonne à propos.</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment changer son profil, ajouter ou modifier un logement?</a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
</div>
 


    </div> </div>
    </div>

    <div class="FAQ_tableau4">
<img src="http://blog.r-no.fr/wp-content/uploads/2013/02/clavier-encre-electronique-1.jpg" class="loupe"><strong class="Titre_article">Recherche</strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Pour faire une recherche simple, rentrez une localisation ou le nom d'un logement dans la barre de recheche sur la page d'accueil.</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Recherche simple</p></a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Pour rechercher un logement avec plus de précision, appuyer ou survoler le bouton recherche avancé.</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Recherche précise</a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
</div>
 


</div>
    </div></div>

     <div class="Tableau_rangee3"><div class="FAQ_tableau3">
<img src="http://img.phonandroid.com/2015/01/proteger-securiser-mots-passe-dashlane.jpg" class="loupe"><strong class="Titre_article">Compte & Mot de passe</strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Comment échanger sa maison</p></a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">L'échange est-il sur?</a>
        <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
</div>
 

<div class="toggle">
        <div class="more" style="display:none">
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment marche les assurances?</a>
         <a class="button-read-less button-read" href="#read">Réduire</a>
    </div>
</div>
    </div>
    </div>

    <div class="FAQ_tableau4">
<img src="http://imworld.aufeminin.com/story/20131203/femme-ordinateur-137550_w1000.jpg" class="loupe"><strong class="Titre_article">Commentaires sur un échange</strong>
<div class="contenu_article2">
<div class="toggle">

    <div class="more" style="display:none">

        <p>Les commentaires sont importants. Ils aident à renforcer la confiance et la sécurité au sein de la communauté, permettent le partage d'informations et encouragent de futures opportunités d'échange. Les commentaires sont l'occasion pour vous de bâtir votre réputation. C'est pourquoi, après chaque échange, sollicitez vos partenaires pour qu'ils écrivent un commentaire pour vous. Evidemment, le meilleur moyen de demander un commentaire est d'être le premier à en écrire un.</p>
    </div>
    
    <div class="less">
    	<a class="button-read-more button-read" href="#read"><p>Ecrire un commentaire après l'échange</p></a>
        <a class="button-read-less button-read" href="#read">Réduire</a>

    </div>

</div>
 

<div class="toggle">
    <div class="more" style="display:none">
        <p>Allez sur la page profil ou logement de la personne et donner votre avis sur l'expérience que vous avez vécu.</p>
    </div>
    
    <div class="less">
        <a class="button-read-more button-read" href="#read">Comment écrire un commentaire?</a>
        <a class="button-read-less button-read" href="#read">Réduire</a>
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