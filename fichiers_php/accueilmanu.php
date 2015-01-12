<?php session_start(); ?>

<!--Page d'accueil Welchome-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
		<link rel="stylesheet" href="../style.css" />
		<script type="text/javascript" src="../carrousel/jquery.js"></script>
		<script type="text/javascript" src="../carrousel/carrousel.js"></script>
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
		<link rel="stylesheet" href="../carrousel_annonce/derniereannonce.css" />
<script type="text/javascript" src="../carrousel/carrousel1.js"></script>
<script type="text/javascript" src="../carrousel/carrousel2.js"></script>
<script type="text/javascript" src="../carrousel/carrousel3.js"></script>
		<title>Accueil</title>
	</head>
	
	<body>
	
		<header>
			<?php include("menus.php"); ?>
		</header>
        <div class="superglobal">
        <div class="global">
		
		<div id="bloc_page">
		
			<?php include("carrousel.php"); ?>
			
			<div id="partie2">
				<div class="h2_p2">
					<p>
						<?php echo intro; ?>
					</p>
				</div>
				<div class="schema1">

                    <div class="wrapper" >

                        <?php
                        $req = $bdd -> prepare("SELECT lien_photo FROM photo ORDER BY id_logement DESC LIMIT 8");
                        $req -> execute();
                        $res = $bdd -> prepare("SELECT id_logement FROM photo ORDER BY id_logement DESC LIMIT 8");
                        $res -> execute();
                        ?>

                        <div class="carrousel">
                            <?php for($i=1;$i<9;$i++) {
                                $img_link=$req -> fetch();
                                $id_logement=$res->fetch();
                                $ret = $bdd -> query("SELECT id_users FROM logement WHERE id_logement=$id_logement[0]");
                                $id_users=$ret->fetch();
                                ?>
                                <div class="plan p<?php echo $i ?>"><a href="annonce.php?id_logement=<?php echo $id_logement[0] ?>&id_users=<?php echo $id_users[0] ?>"><img src="<?php echo $img_link[0] ?>" class="w<?php echo $i ?>"></a></div>
                                <?php
                            }?>
                        </div>

                    </div>
				</div>

                <div class="h2_p2">
                    <p>
                        Les dernières annonces
                    </p>
                </div>

                 <div class="schema3">
                   <div class="h3">
                    <p>
                        Comment fonctionne Welchome.com
                    </p>
                   
                    <li class="add">
                    <span>
                        <img src="http://www.blog-deco-maison.com/wp-content/uploads/2011/03/cluny-house-maison-reve-singapour-exterieur-petit1.jpg" alt="Ajouter une offre" style="border-radius: 150px;">
                    </span>
                    <h3>Ajouter une offre</h3>
                </li>

                <li class="add">
                    <span>
                        <img src="http://media.meltycampus.fr/article-2219607-square_300/torrentz-ouvert-fermeture-femme-ordinateur.jpg" alt="Ajouter une offre" style="border-radius: 150px;">
                    </span>
                    <h3>Envoyer/recevoir des propositions</h3>
                </li>

                <li class="add">
                    <span>
                        <img src="http://www.in-leadership.fr/wp-content/uploads/2013/10/poignee-de-mains-300.jpg" alt="Ajouter une offre" style="border-radius: 150px;">
                    </span>
                    <h3>Echanger</h3>
                </li>


                </div>
                </div>

                <div class="schema4">
                    <div >
                    <p class="h3">
                        POINTS FORTS
                    </p>
                </div>

                

                <div class="schema5">
                   <img src="../images_diverses/htmlcssjs_logo.png" class="html5_logo">

            </div>
			

				<?php //include '../carrousel_annonce/derniereannonce.php' ?>
            </div>
                <?php
                include("footer.php");
                ?>
			</div>
		</div>
	</body>
</html>