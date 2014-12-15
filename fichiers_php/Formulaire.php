<?php include "modeles.php";
include "config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        <title>Publication d'annonce</title>
    </head>

<body>

<form method="post" action=cible_postannonce.php>

<!-- Nom logement  -->
<p>
Nom de votre logement.<br />
    <input type="text" name="nom_maison">
</p>
<!-- Localisation logement  -->
<p>
    Où se situe votre logement ?<br />
    <input type="text" name="localisation" placeholder="Ex: Paris" />
</p>

<!-- premier formulaire menu déroulant type de logement  -->
<p>
    Quel type de logement proposez vous ?<br /> <select name="logement"></label>
    <option value="Studio"> Studio</option>
    <option value="Appartement"> Appartement</option>
    <option value="Maison"> Maison</option>
    <option value="Pavillon"> Pavillon</option>
    <option value="Bungalow/gite"> Bungalow/gite</option>
    <option value="Bateau/péniche"> Bateau/péniche</option>
    <option value="Camping car"> Camping car</option>
</select>
</p>
 
<!-- deuxième formulaire disponibilité du logement -->

<p>
    Disponibilité de votre logement<br /> 
    du <input type="text" name="date_arrivée" placeholder="JJ/MM/AAAA" size="12" /> au <input type="text" name="date_départ" placeholder="JJ/MM/AAAA" size="12" />
   
</p>

<!-- Menu déroulant capacité du logement-->

<p>
    Selectionnez la capacité du logement<br /> <select name="nb_personne"></label>
                                                <option value="1"> 1 personne</option>
                                                <option value="2"> 2 personnes</option>
                                                <option value="3"> 3 personnes</option>
                                                <option value="4"> 4 personnes</option>
                                                <option value="5"> 5 personnes</option>
                                                <option value="6"> 6 personnes</option>
                                                <option value="7"> 7 personnes</option>
</select>
</p>

<!-- Menu surface du logement-->

<p>
    <label>Entrez la surface de votre logement (en m2)<br /> <input type="text" name="surface" placeholder="Ex: 32" size="12"/>
   
</p>
<p>
    Combien de chambres possède votre logement ?<br />
<input type="number" name="nb_chambres" min="0"/>
</p>

<p>
    Combien de salles de bain possède votre logement ?<br />
    <input type="number" name="nb_salle_bain" min="0" />
</p>

<!-- Menu localisation du logement-->
<p>
Où se situe votre logement ?<br /><select name="lieu"></label>
                                                <option value="banlieue"> En banlieue</option>
                                                <option value="campagne"> À la campagne</option>
                                                <option value="montagne"> À la montagne</option>
                                                <option value="ville"> En ville</option>
                                                
</select>
</p>


<!-- Menu attributs -->

<p>
Quels attributs sont présents dans votre logement ?<br />
                                    <input type="checkbox" name="case1" id="case" /></label> <label for="case">Animaux acceptés</label><br />
                                    <input type="checkbox" name="case2" id="case" /> <label for="case">Climatisation</label><br />
                                    <input type="checkbox" name="case3" id="case" /> <label for="case">Chauffage</label><br />
                                    <input type="checkbox" name="case4" id="case" /> <label for="case">Machine à laver</label><br />
                                    <input type="checkbox" name="case5" id="case" /> <label for="case">Sèche ligne</label><br />
                                    <input type="checkbox" name="case6" id="case" /> <label for="case">Cheminée</label><br />
                                    <input type="checkbox" name="case7" id="case" /> <label for="case">Télévision</label><br />
                                    <input type="checkbox" name="case8" id="case" /> <label for="case">Parking</label><br />
                                    <input type="checkbox" name="case9" id="case" /> <label for="case">Piscine</label><br />
                                    <input type="checkbox" name="case10" id="case" /> <label for="case">Jardin</label><br />
                                    <input type="checkbox" name="case11" id="case" /> <label for="case">Balcon</label><br />
                                    <input type="checkbox" name="case12" id="case" /> <label for="case">Internet sans fil</label><br />
</p>

<!-- Description logmement -->
<p>
Ajoutez une description de votre logement<br>
<input type="text" name="description" />
</p>

<p>
<input type="submit" value="Envoyer" />
</p>

</form>



</body>