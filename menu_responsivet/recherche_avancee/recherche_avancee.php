<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta charset="utf-8" />    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <title>Recherche avancée</title>		
         </head>
    <body>
	<form method="post" action="cible_recherche.php">
<pre>       
	   Quel type de logement souhaitez-vous ?<br/>
<select name="type_logement">
    <option value="choix1">Studio</option>
    <option value="choix2">Appartement</option>
    <option value="choix3">Maison</option>
    <option value="choix4">Pavillon</option>
    <option value="choix5">Bungalow/Gîte</option>
    <option value="choix6">Bateau/Péniche</option>
    <option value="choix7">Camping car</option>

</select><br/>

          Veuillez entrez les dates qui vous conviennent:
          de<input type="date" name="d1" value="JJ/MM/AAAA"> à<input type="date" name="d2" value="JJ/MM/AAAA">

Sélectionnez le nombre de personnes qui vous accompagneront<br/>
<select name="nombre">
    <option value="choix1">1</option>
    <option value="choix2">2</option>
    <option value="choix3">3</option>
    <option value="choix4">4</option>
    <option value="choix4">5</option>
    <option value="choix4">6</option>
    <option value="choix4">7 ou plus</option>
</select><br/>

Entrer la surface minimale du logement que vous souhaitez.
<input type="number" name="surface_min" value="Surface minimale">
    
Avez-vous des préférences parmi les propositions suivantes ?
<input type="checkbox" name="lieu1" id="case" /> <label for="case">Banlieue</label><br/>
<input type="checkbox" name="lieu2" id="case" /> <label for="case">Campagne</label><br/>
<input type="checkbox" name="lieu3" id="case" /> <label for="case">Montagne</label><br/>
<input type="checkbox" name="lieu4" id="case" /> <label for="case">Ville</label><br/>


	   
Cochez les attributs qui vous intéressent parmi les suivants<br/>
<input type="checkbox" name="case1" id="case" /> <label for="case">Animaux acceptés</label><br/>
<input type="checkbox" name="case2" id="case" /> <label for="case">Climatisation</label><br/>
<input type="checkbox" name="case3" id="case" /> <label for="case">Chauffage</label><br/>
<input type="checkbox" name="case4" id="case" /> <label for="case">Machine à laver</label><br/>
<input type="checkbox" name="case5" id="case" /> <label for="case">Sèche linge</label><br/>
<input type="checkbox" name="case6" id="case" /> <label for="case">Cheminée</label><br/>
<input type="checkbox" name="case7" id="case" /> <label for="case">Télévision</label><br/>
<input type="checkbox" name="case8" id="case" /> <label for="case">Parking</label><br/>
<input type="checkbox" name="case9" id="case" /> <label for="case">Piscine</label><br/>
<input type="checkbox" name="case10" id="case" /> <label for="case">Jardin</label><br/>
<input type="checkbox" name="case11" id="case" /> <label for="case">Balcon</label><br/>
<input type="checkbox" name="case12" id="case" /> <label for="case">Internet sans fil</label><br/>
	 
		   
		   Avez-vous quelque chose a ajouter ?<br/>
		   <textarea name="message" rows="8" cols="45">
          Ton message ici.
           </textarea>
		   	       <input type="submit" value="Valider" /><br/>
</pre>			   
</form>
    </body>
</html>
