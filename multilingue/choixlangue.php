<?php
	function choixlangue()
{
    if (isset($_GET['lang']))
    {
        $lang = $_GET['lang'];
    }
    else
    {
        if (isset($_COOKIE['lang']))
        {
            $lang = $_COOKIE['lang'];
        }
        else
        {
            // si aucune langue n'est déclarée on tente de reconnaitre la langue par défaut du navigateur
            $lang = 'fr';
        }
    }
 
 
    if (($lang === 'fr') OR ($lang === 'en'))
    {          
 
        //enregistrement du cookie au nom de lang
        setcookie("lang", $lang, time() + 365 * 24 * 3600);
        //echo 'Cookie : '.$_COOKIE['lang'];      
    }
	if (isset($_GET['lang']))
	{
		if ($lang=='fr') 
		{  
		//Accueil
		define ('intro','Trouvez un logement qui vous correspond');
		define('carrouseltxt','Vos vacances à portée de mains gratuitement');
		define('choixdestination','Saisir une destination');
		//Recherche avancée
		define('choixville','Dans quelle ville souhaitez-vous aller ?');
		define('choixlogement','Par quel(s) type(s) de logement êtes vous interessé ?');
		define('appartement','un appartement');
		define('studio','un studio');
		define('maison','une maison');
		define('pavillon','un pavillon');
		define('bungalow','un bungalow ou un gîte');
		define('campingcar','un camping car');
		define('bateau','un bateau');
		define('choixdates','Veuillez entrez les dates qui vous conviennent :');
		define('de','de');
		define('à','à');
		define('capacitéaccueil','Entrez la capacité d\'accueil qui vous intéresse :');
		define('nbchambres','Combien de chambres voulez-vous?');
		define('nbsallesbain','Combien de salles de bain voulez-vous ?');
		define('surfacemin','Entrer la surface minimale du logement que vous souhaitez :');
		define('choixpreferences','Avez-vous des préférences parmi les propositions suivantes ?');
		define('banlieue','Banlieue');
		define('campagne','Campagne');
		define('montagne','Montagne');
		define('ville','Ville');
		define('choixattribut','Cochez les attributs qui vous intéressent');
		define('animaux','Animaux acceptés');
		define('climatisation','Climatisation');
		define('chauffage','Chauffage');
		define('machinelaver','Machine à laver');
		define('sechelinge','sechelinge');
		define('cheminee','Cheminée');
		define('tele','Télévision');
		define('parking','Parking');
		define('piscine','Piscine');
		define('jardin','Jardin');
		define('balcon','Balcon');
		define('internet','internet en wifi');
		//inscription
		define('bieninscrit','Vous avez bien été inscrit. Vous pouvez désormais vous connecter !');
		define('connect','Se connecter');
		define('erreurinscription','Une erreur est survenue lors de l\'inscription.');
		define('pseudopris','Désolé, ce pseudo est déjà pris !');
		define('wrongmail','L\'email rentrée n\'est pas valide.');
		define('password6','Désolé, votre mot de passe doit faire au moins 6 caractères.');
		define('passwordnotequal','Les mots de passe rentrés ne sont pas identiques.');
		define('username','Nom d\'utilisateur');
		define('password','Mot de passe');
		define('verification','(vérification)');
		define('email','Email');
		define('imageperso','Image perso');
		define('logementname','Nom de votre logement');
		define('wherelogement','Où se situe votre logement ?');
		define('typelogement','Quel type de logement proposez vous ?');
		define('photo','Photos');
		define('envoyer','Envoyer');
			//connexion
		define('deconnexionsuccess','Vous avez bien été déconnecté !');
		define('retouraccueil','Retour à l\'accueil');
		define('connexionsuccess','Vous avez bien été connecté !');
		define('wrongpassword','Le nom d\'utilisateur ou le mot de passe saisi est incorrect. Veuillez réessayer !');
		}
		else if ($lang=='en') 
		{  
				//Accueil
		define ('intro','Find a tenement that fits you');
		define('carrouseltxt','Your free holidays next to you');
		define('choixdestination','Choose your destination');
			//Recherche avancee
		define('choixville','Which city do you wish to go?');
		define('choixlogement','Which type of accomodation are you interested in?');
		define('appartement','an appartment');
		define('studio','a studio flat');
		define('maison','a house');
		define('pavillon','a detached house');
		define('bungalow','a bungalow or a holiday cottage');
		define('campingcar','a camping car');
		define('bateau','a boat');
		define('choixdates','Enter the dates which suit you');
		define('de','From');
		define('à','to');
		define('capacitéaccueil','Enter the accommodation capacity you want');
		define('nbchambres','How many bedrooms do you want?');
		define('nbsallesbain','How many bathrooms do you want?');
		define('surfacemin','Enter the minimum surface area you would like to have :');
		define('choixpreferences','Do you have some preferences among the following propositions?');
		define('banlieue','Suburb');
		define('campagne','Countryside');
		define('montagne','Mountain');
		define('ville','City');
		define('choixattribut','Mark the attributes you want :');
		define('animaux','animals authorized');
		define('climatisation','Climatisation');
		define('chauffage','Heating');
		define('machinelaver','Washing machine');
		define('sechelinge','Tumble-dryer');
		define('cheminee','fireplace');
		define('tele','Television');
		define('parking','Parking');
		define('piscine','Swimming pool');
		define('jardin','Garden');
		define('balcon','Balcony');
		define('internet','Wifi');
			//inscription
		define('bieninscrit','You are successfully registered. You can connect now!');
		define('connect','Connect');
		define('erreurinscription','An error has happenned during the register.');
		define('pseudopris','I\'m afraid, this username is already taken !');
		define('wrongmail','Wrong email.');
		define('password6','I\'m afraid, Your password need to be at least 6 characters long.');
		define('passwordnotequal','The passwords typed are not similar.');
		define('username','Username');
		define('password','Password');
		define('verification','(Check)');
		define('email','Email');
		define('imageperso','Personal picture');
		define('logementname','Tenement\'s nickname');
		define('wherelogement','Where is your tenement ?');
		define('typelogement','Which type of tenement do you offer?');
		define('photo','Pictures');
		define('envoyer','Send');
		}
	}
	else if (isset($_COOKIE['lang']))
	{
		if ($lang=='fr') 
		{  
				//Accueil
		define ('intro','Trouvez un logement qui vous correspond');
		define('carrouseltxt','Vos vacances à portée de mains gratuitement');
		define('choixdestination','Saisir une destination');
		//Recherche avancée
		define('choixville','Dans quelle ville souhaitez-vous aller ?');
		define('choixlogement','Par quel(s) type(s) de logement êtes vous interessé ?');
		define('appartement','un appartement');
		define('studio','un studio');
		define('maison','une maison');
		define('pavillon','un pavillon');
		define('bungalow','un bungalow ou un gîte');
		define('campingcar','un camping car');
		define('bateau','un bateau');
		define('choixdates','Veuillez entrez les dates qui vous conviennent :');
		define('de','de');
		define('à','à');
		define('capacitéaccueil','Entrez la capacité d\'accueil qui vous intéresse :');
		define('nbchambres','Combien de chambres voulez-vous?');
		define('nbsallesbain','Combien de salles de bain voulez-vous ?');
		define('surfacemin','Entrer la surface minimale du logement que vous souhaitez :');
		define('choixpreferences','Avez-vous des préférences parmi les propositions suivantes ?');
		define('banlieue','Banlieue');
		define('campagne','Campagne');
		define('montagne','Montagne');
		define('ville','Ville');
		define('choixattribut','Cochez les attributs qui vous intéressent');
		define('animaux','Animaux acceptés');
		define('climatisation','Climatisation');
		define('chauffage','Chauffage');
		define('machinelaver','Machine à laver');
		define('sechelinge','sechelinge');
		define('cheminee','Cheminée');
		define('tele','Télévision');
		define('parking','Parking');
		define('piscine','Piscine');
		define('jardin','Jardin');
		define('balcon','Balcon');
		define('internet','internet en wifi');
		//inscription
		define('bieninscrit','Vous avez bien été inscrit. Vous pouvez désormais vous connecter !');
		define('connect','Se connecter');
		define('erreurinscription','Une erreur est survenue lors de l\'inscription.');
		define('pseudopris','Désolé, ce pseudo est déjà pris !');
		define('wrongmail','L\'email rentrée n\'est pas valide.');
		define('password6','Désolé, votre mot de passe doit faire au moins 6 caractères.');
		define('passwordnotequal','Les mots de passe rentrés ne sont pas identiques.');
		define('username','Nom d\'utilisateur');
		define('password','Mot de passe');
		define('verification','(vérification)');
		define('email','Email');
		define('imageperso','Image perso');
		define('logementname','Nom de votre logement');
		define('wherelogement','Où se situe votre logement ?');
		define('typelogement','Quel type de logement proposez vous ?');
		define('photo','Photos');
		define('envoyer','Envoyer');
		//connexion
		define('deconnexionsuccess','Vous avez bien été déconnecté !');
		define('retouraccueil','Retour à l\'accueil');
		define('connexionsuccess','Vous avez bien été connecté !');
		define('wrongpassword','Le nom d\'utilisateur ou le mot de passe saisi est incorrect. Veuillez réessayer !');
		}
		else if ($lang=='en') 
		{  
			//Accueil
		define ('intro','Find a tenement that fits you');
		define('carrouseltxt','Your free holidays next to you');
		define('choixdestination','Choose your destination');
			//Recherche avancee
		define('choixville','Which city do you wish to go?');
		define('choixlogement','Which type of accomodation are you interested in?');
		define('appartement','an appartment');
		define('studio','a studio flat');
		define('maison','a house');
		define('pavillon','a detached house');
		define('bungalow','a bungalow or a holiday cottage');
		define('campingcar','a camping car');
		define('bateau','a boat');
		define('choixdates','Enter the dates which suit you');
		define('de','From');
		define('à','to');
		define('capacitéaccueil','Enter the accommodation capacity you want');
		define('nbchambres','How many bedrooms do you want?');
		define('nbsallesbain','How many bathrooms do you want?');
		define('surfacemin','Enter the minimum surface area you would like to have :');
		define('choixpreferences','Do you have some preferences among the following propositions?');
		define('banlieue','Suburb');
		define('campagne','Countryside');
		define('montagne','Mountain');
		define('ville','City');
		define('choixattribut','Mark the attributes you want :');
		define('animaux','animals authorized');
		define('climatisation','Climatisation');
		define('chauffage','Heating');
		define('machinelaver','Washing machine');
		define('sechelinge','Tumble-dryer');
		define('cheminee','fireplace');
		define('tele','Television');
		define('parking','Parking');
		define('piscine','Swimming pool');
		define('jardin','Garden');
		define('balcon','Balcony');
		define('internet','Wifi');
			//inscription
		define('bieninscrit','You are successfully registered. You can connect now!');
		define('connect','Connect');
		define('erreurinscription','An error has happenned during the register.');
		define('pseudopris','I\'m afraid, this username is already taken !');
		define('wrongmail','Wrong email.');
		define('password6','I\'m afraid, Your password need to be at least 6 characters long.');
		define('passwordnotequal','The passwords typed are not similar.');
		define('username','Username');
		define('password','Password');
		define('verification','(Check)');
		define('email','Email');
		define('imageperso','Personal picture');
		define('logementname','Tenement\'s nickname');
		define('wherelogement','Where is your tenement ?');
		define('typelogement','Which type of tenement do you offer?');
		define('photo','Pictures');
		define('envoyer','Send');
		}
	}
	else
	{  
		//Accueil
		define ('intro','Trouvez un logement qui vous correspond');
		define('carrouseltxt','Vos vacances à portée de mains gratuitement');
		define('choixdestination','Saisir une destination');
		//Recherche avancée
		define('choixville','Dans quelle ville souhaitez-vous aller ?');
		define('choixlogement','Par quel(s) type(s) de logement êtes vous interessé ?');
		define('appartement','un appartement');
		define('studio','un studio');
		define('maison','une maison');
		define('pavillon','un pavillon');
		define('bungalow','un bungalow ou un gîte');
		define('campingcar','un camping car');
		define('bateau','un bateau');
		define('choixdates','Veuillez entrez les dates qui vous conviennent :');
		define('de','de');
		define('à','à');
		define('capacitéaccueil','Entrez la capacité d\'accueil qui vous intéresse :');
		define('nbchambres','Combien de chambres voulez-vous?');
		define('nbsallesbain','Combien de salles de bain voulez-vous ?');
		define('surfacemin','Entrer la surface minimale du logement que vous souhaitez :');
		define('choixpreferences','Avez-vous des préférences parmi les propositions suivantes ?');
		define('banlieue','Banlieue');
		define('campagne','Campagne');
		define('montagne','Montagne');
		define('ville','Ville');
		define('choixattribut','Cochez les attributs qui vous intéressent');
		define('animaux','Animaux acceptés');
		define('climatisation','Climatisation');
		define('chauffage','Chauffage');
		define('machinelaver','Machine à laver');
		define('sechelinge','sechelinge');
		define('cheminee','Cheminée');
		define('tele','Télévision');
		define('parking','Parking');
		define('piscine','Piscine');
		define('jardin','Jardin');
		define('balcon','Balcon');
		define('internet','internet en wifi');
		//inscription
		define('bieninscrit','Vous avez bien été inscrit. Vous pouvez désormais vous connecter !');
		define('connect','Se connecter');
		define('erreurinscription','Une erreur est survenue lors de l\'inscription.');
		define('pseudopris','Désolé, ce pseudo est déjà pris !');
		define('wrongmail','L\'email rentrée n\'est pas valide.');
		define('password6','Désolé, votre mot de passe doit faire au moins 6 caractères.');
		define('passwordnotequal','Les mots de passe rentrés ne sont pas identiques.');
		define('username','Nom d\'utilisateur');
		define('password','Mot de passe');
		define('verification','(vérification)');
		define('email','Email');
		define('imageperso','Image perso');
		define('logementname','Nom de votre logement');
		define('wherelogement','Où se situe votre logement ?');
		define('typelogement','Quel type de logement proposez vous ?');
		define('photo','Photos');
		define('envoyer','Envoyer');
			//connexion
		define('deconnexionsuccess','Vous avez bien été déconnecté !');
		define('retouraccueil','Retour à l\'accueil');
		define('connexionsuccess','Vous avez bien été connecté !');
		define('wrongpassword','Le nom d\'utilisateur ou le mot de passe saisi est incorrect. Veuillez réessayer !');
	}
	
}choixlangue();
?>
	