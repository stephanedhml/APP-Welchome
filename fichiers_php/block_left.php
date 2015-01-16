<link rel="stylesheet" href="../style.css"/>
<div class="container_edit_profil">
    <script type="text/javascript" src="../fichier_js/ajout_photo.js"></script>
    <form action="edit_profile.php?choix_logement=<?php echo $_GET["choix_logement"]; ?>&choix&update<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>" method="post" enctype="multipart/form-data">
        <div class="bloc_search_left">
            <label for="avatar"><?php echo photo1; ?> *</label><br/>
            <p>700x300 : <a href="http://www.fotor.com/fr/" target="_blank">Fotor.com</a></p>
            <div class="bouto" >
                <input type="button" class="but" value="Parcourir" >
                <input type="file" class="fote" name="maj_main_img_logement" id="p1" ><br />
            </div>

            <label for="avatar"><?php echo photo2; ?></label><br/>
            <div class="bouto" onclick="return verifphoto2()">
                <input type="button" value="Parcourir" class="but" onclick="return verifphoto2()">
                <input type="file" class="fote" name="maj_2_img_logement" id="p2"  ><br />
            </div>

            <label for="avatar"><?php echo photo3; ?></label><br/>
            <div class="bouto"  onclick="return verifphoto3()" >
                <input type="button" class="but"  value="Parcourir" onclick="return verifphoto3()" >
                <input class="fote" type="file" name="maj_3_img_logement" id="p3" ><br />
            </div>

            <label for="avatar"><?php echo photo4; ?></label><br/>
            <div class="bouto" onclick="return verifphoto4()" >
                <input type="button" class="but" value="Parcourir" onclick="return verifphoto4()" >
                <input class="fote" type="file" name="maj_4_img_logement" id="p4"  ><br />
            </div>
            <label for="localisation"><?php echo localisation; ?></label><br/>
            <input type="text" name="localisation"/><br/>
            <label for="description_logement"><?php echo descriptionlogement; ?></label><br/>
            <input type="text" name="description_logement"/><br/>
            <label for="type_logement"><?php echo choixlogement; ?></label><br/>
            <select name="type_logement" id="choix">
                <OPTION></OPTION>
                <option value="Studio"><?php echo studio; ?></option>
                <option value="Appartement"><?php echo appartement; ?></option>
                <option value="Maison"><?php echo maison; ?></option>
                <option value="Pavillon"><?php echo pavillon; ?></option>
                <option value="Bungalow/gite"><?php echo bungalow; ?></option>
                <option value="Bateau/péniche"><?php echo bateau; ?></option>
                <option value="Camping car"><?php echo campingcar; ?></option>
            </select><br/>
            <label for="nom_maison"><?php echo titreannonce; ?></label><br/>
            <input type="text" name="nom_maison"/><br/>
            <label for="nombre_voyageurs"><?php echo nbvoyageursauthorized; ?></label><br/>
            <input type="number" name="nombre_voyageurs"/><br/>
            <label for="nombre_chambres"><?php echo nbchambres; ?></label><br/>
            <input type="number" name="nombre_chambres"/><br/>
            <label for="nb_salles_bains"><?php echo nbsallesbain; ?></label><br/>
            <input type="number" name="nb_salles_bains"/><br/>
            <label for="superficie"><?php echo superficie; ?></label><br/>
            <input type="number" name="superficie"/><br/>

        </div>