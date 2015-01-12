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
                        $res = $bdd -> prepare("SELECT id_logement FROM logement ORDER BY id_logement DESC LIMIT 8");
                        $res -> execute();
                        ?>

                        <div class="carrousel">
                            <?php for($i=1;$i<9;$i++) {
                                $id_logement=$res->fetch();

                                $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                                $pic -> execute(array($id_logement[0]));
                                $url_pic = $pic -> fetch();

                                $ret = $bdd -> query("SELECT id_users FROM logement WHERE id_logement=$id_logement[0]");
                                $id_users=$ret->fetch();
                                ?>
                                <div class="plan p<?php echo $i ?>"><a href="annonce.php?id_logement=<?php echo $id_logement[0] ?>&id_users=<?php echo $id_users[0] ?>"><img src="<?php echo $url_pic['lien_photo'] ?>" class="w<?php echo $i ?>"></a></div>
                                <?php
                            }?>
                        </div>

                    </div>
                    <div class="h2_p4"><p> <?php echo lastannonce; ?></p></div>
				</div>

               

                 <div class="schema3">
                   <div class="h3">
                    <h3 class="h7">
                    <h3>
                        <?php echo howwelchomework; ?>
                    </h3>
                   <div class="add3">
                    <li class="add">
                    <span>
                        <img src="http://www.blog-deco-maison.com/wp-content/uploads/2011/03/cluny-house-maison-reve-singapour-exterieur-petit1.jpg" alt="Ajouter une offre" style="border-radius: 150px;width: 270px;">
                    </span>
                    <h3 style="font-size: 22px;"><?php echo addoffer; ?></h3>
                </li>

                <li class="add">
                    <span>
                        <img src="http://media.meltycampus.fr/article-2219607-square_300/torrentz-ouvert-fermeture-femme-ordinateur.jpg" alt="Ajouter une offre" style="border-radius: 150px;width: 270px;">
                    </span>
                    <h3 style="font-size: 22px;"><?php echo sendproposition; ?></h3>
                </li>

                <li class="add">
                    <span>
                        <img src="http://www.in-leadership.fr/wp-content/uploads/2013/10/poignee-de-mains-300.jpg" alt="Ajouter une offre" style="border-radius: 150px;width: 270px;">
                    </span>
                    <h3 style="font-size: 22px;"><?php echo trade; ?></h3>
                </li>
                </div>


                </div>
                </div>

                <div class="schema4">
                    <div class="h3" >
                    <p class="h7"> 
                        <?php echo strenght; ?>
                    </p>
                    <div class="h6">
                    <div class="h4">
                    <li style="width:350px;"> <img src="http://www.xn--icne-wqa.com/images/icones/1/4/view-refresh-4.png" style="width:40px; margin-right:20px;">Echanges illimités</li>
                    <li class="add1"><img src="http://www.clipartbest.com/cliparts/dTr/a5E/dTra5Ejjc.png" style="width:40px; margin-right:20px;"><?php echo assistmember; ?> </li> 
                   </div>
                   <div class="h5">
                    <li><img src="http://sbxblog.wpengine.netdna-cdn.com/wp-content/uploads/2012/11/no_cash_clipart.png" style="width:40px; margin-right:20px;"><?php echo freedevice; ?></li>
                    <li class="add2"><img src=" http://www.meilleur-immobilier-neuf.fr/images/maison.png" style="width:40px; margin-right:20px;"><?php echo hugenetwork; ?></li>
                    </div>  

                </div></div>


              

                <div class="schema5">
                    <div class="h3" >
                        <p class="h7"> 
                        <?php echo apropos; ?>
                    </p>
                    <div class="h8"> Welchome est un site internet qui vous permet d’échanger votre maison ou votre appartement pour les vacances. 
               Il est simple d'utilisation gratuit et fiable.
              Welchome rassemble un large réseau de personnes de confiance dans toute la France.
              N'hésitez plus, utlilisez Welchome.

			</div></div></div>
			

				<?php //include '../carrousel_annonce/derniereannonce.php' ?>
            </div>
                <?php
                include("footer2.php");
                ?>
			</div>
		</div>
	</body>
</html>