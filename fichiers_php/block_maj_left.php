<script type="text/javascript" src="../fichier_js/ajout_photo.js"></script>
<div class="bloc_edit_left">
    <span id="ph11"></span>
    <label for="avatar"><?php echo photo1; ?> *</label><br/>
    <p>700x300 : <a href="http://www.fotor.com/fr/" target="_blank">Fotor.com</a></p>
    <div class="bouto" >
        <input type="button" class="but" value="Parcourir" >
        <input type="file" class="fote" name="maj_main_img_logement" id="p11" ><br />
    </div>
    <span id="ph12"></span>
    <label for="avatar"><?php echo photo2; ?></label><br/>
    <div class="bouto" onclick="return veriphoto2()">
        <input type="button" value="Parcourir" class="but" onclick="return veriphoto2()">
        <input type="file" class="fote" name="maj_2_img_logement" id="p12"  ><br />
    </div>

    <span id="ph13"></span>
    <label for="avatar"><?php echo photo3; ?></label><br/>
    <div class="bouto"  onclick="return veriphoto3()" >
        <input type="button" class="but"  value="Parcourir" onclick="return veriphoto3()" >
        <input class="fote" type="file" name="maj_3_img_logement" id="p13" ><br />
    </div>
    <span id="ph14"></span>
    <label for="avatar"><?php echo photo4; ?></label><br/>
    <div class="bouto" onclick="return veriphoto4()" >
        <input type="button" class="but" value="Parcourir" onclick="return veriphoto4()" onblur="photo4()" >
        <input class="fote" type="file" name="maj_4_img_logement" id="p14"  ><br />
    </div>
    <label for="localisation"><?php echo localisation; ?></label><br/>
    <input type="text" name="localisation"/><br/>
    <label for="description_logement"><?php echo descriptionlogement; ?></label><br/>
    <textarea type="text" name="description_logement" style="height: 200px; width: 300px"/></textarea><br/>
    <label for="type_logement">Type de logement</label><br/>
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
    <label for="nombre_chambres">Nombre de chambres</label><br/>
    <input type="number" name="nombre_chambres"/><br/>
    <label for="nb_salles_bains">Nombre de salles de bain</label><br/>
    <input type="number" name="nb_salles_bains"/><br/>
    <label for="superficie"><?php echo superficie; ?></label><br/>
    <input type="number" name="superficie"/><br/>

</div>