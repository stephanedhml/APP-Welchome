<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style.css" />
    <script type="text/javascript" src="../carrousel/jquery.js"></script>
    <script type="text/javascript" src="../carrousel/carrousel.js"></script>
    <?php session_start(); ?>
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Accueil</title>
</head>

<body>

<header>
    <?php include("menus.php"); ?>
</header>

<body>
    <div id="Salutations">
        <img id="Norma.jpg" src="Norma.jpg" alt="Norma.jpg"/>
        <div id="article1">
            <h1 id="Bonjour"> Bonjour, je m'appelle Sylvie !</h1>
            <p id="Paris"> <strong>Paris</strong>, Hauts-de-Seine, France</p>
            <p id="Presentation"> Professeur de lettres, fan de littérature et de théâtre,<br>j'aime rencontrer de nouvelles personnes !<br>N'hésitez pas à me contacter !</p>
        </div>
    </div>
    <article id="bloc_commentaires">
        <h1 id="commentaires">Commentaires:</h1>
        <div id="divcom1">
            <img id="Taylor.jpg" src="Taylor.jpg" alt="Taylor.jpg"/>
            <p id="com1">My friends and I really enjoyed our stay at this place. It has a great location. Everything is within a mile. The place was bigger than I expected and everything you need in the kitchen is there.</p>
        </div>
        <hr id="barre1"/>
        <div id="divcom2">
            <img id="Carolin.jpg" src="Carolin.jpg" alt="Carolin.jpg"/>
            <p id="com2">Very good stay at Norma's. Very well kept and everything as advertised. Great location.</p>
        </div>
        <hr id="barre2"/>
        <div id="divcom3">
            <img id="Henry.jpg" src="Henry.jpg" alt="Henry.jpg"/>
            <p id="com3">The studio was as expected, no surprises. Norma was available for our queries when we needed her. Clean, pretty basic but very close to the beach. Fair value for money</p>
        </div>
    </article>
    <aside id="bloc_identité">
        <h1 id="Identification">Identification</h1>
        <div id="article2">
            <p>Femme</p>
            <p>sylvie.martin@gmail.com</p>
            <p>06 65 64 14 86</p>
        </div>
        <div id="bloc 1">
            <h1 id="apropos">A propos de Sylvie</h1>
            <div id="article3">
                <h2 id="profession">Profession:</h2>
                <p id="travail"> Professeur de lettres en université</p>
                <p><a href=""></a></p>
                <h2 id="langues">Langues:</h2>
                <p id="languages"> Français, anglais, espagnol</p>
            </div>
        </div>
    </aside>

    </div>
</body>