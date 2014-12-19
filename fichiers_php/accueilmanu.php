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
						Trouvez un logement qui vous correspond
					</p>
				</div>
				<div class="schema1">

                    <div class="wrapper" >

                        <?php
                        $req = $bdd -> prepare("SELECT lien_photo FROM photo ORDER BY id_logement DESC LIMIT 8");
                        $req -> execute();
                        ?>

                        <div class="carrousel">
                            <?php for($i=1;$i<9;$i++) {
                                $img_link=$req -> fetch();
                                ?>
                                <div class="plan p<?php echo $i ?>"><img src="<?php echo $img_link[0] ?>" class="w<?php echo $i ?>"></div>
                                <?php
                            }?>
                        </div>

                    </div>
				</div>

                <div class="h2_p2">
                    <p>
                        Nouvelles technologies pour vous !
                    </p>
                </div>

                <div class="schema2">
                    <img src="../images_diverses/htmlcssjs_logo.png" class="html5_logo">
                </div>
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