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
		//Menu
		define('accueil','Accueil');
		define('rechercheavancee','Recherche avancée');
		define('lastannonce','Les dernières annonces');
		define('howwelchomework','Comment fonctionne Welchome.com');
		define('addoffer','Ajouter une offre');
		define('sendproposition','Envoyer/recevoir des propositions');
		define('trade','Echanger');
		define('strenght','POINTS FORTS');
		define('unlimitedexchange','Echanges illimités');
		define('assistmember','Bénéficiez de notre Assistance Membres 7j/7 ');
		define('freedevice','Un service complètement gratuit');
		define('hugenetwork','Un large réseau de logements');
		//connexion inscription deconnexion
		define('profil','Profil');
		define('disconnect','Se déconnecter');
		define('faq','FAQ');
		define('register','Inscription');
		//Accueil
		define ('intro','Trouvez un logement qui vous correspond');
		define('carrouseltxt','Vos vacances à portée de mains gratuitement');
		define('choixdestination','Saisir une destination');
				define('accueiltxt','Welchome est un site internet qui vous permet d’échanger votre maison ou votre appartement pour les vacances.
                            Il est simple d\'utilisation gratuit et fiable.
                            Welchome rassemble un large réseau de personnes de confiance dans toute la France.
                            N\'hésitez plus, utlilisez Welchome.');
		define('echangeillimite','Echanges illimités');
		//Recherche avancée
		define('choixville','Lieu souhaité');
		define('choixlogement','Type(s) de logement');
		define('appartement','un appartement');
		define('studio','un studio');
		define('maison','une maison');
		define('pavillon','un pavillon');
		define('bungalow','un gîte');
		define('campingcar','un camping car');
		define('bateau','un bateau');
		define('choixdates','Veuillez entrez les dates qui vous conviennent :');
		define('de','de');
		define('à','à');
		define('capacitéaccueil','Capacité d\'accueil :');
		define('nbchambres','Nombre de chambres :');
		define('nbsallesbain','Nombre de salles de bain :');
		define('surfacemin','Surface minimale :');
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
		define('sechelinge','sèche linge');
		define('cheminee','Cheminée');
		define('tele','Télévision');
		define('parking','Parking');
		define('piscine','Piscine');
		define('jardin','Jardin');
		define('balcon','Balcon');
		define('internet','internet en wifi');
		define('valider','Valider');
		//inscription
		define('bieninscrit','Vous avez bien été inscrit. Vous pouvez désormais vous connecter !');
		define('connect','Se connecter');
		define('conf',"J’ai lu et j’accepte les conditions générales d’utilisation de ce site");
		define('noconf',"Vous n'avez pas accepté les conditions générales d’utilisation de ce site");
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
		define('logementname','Titre de l\'annonce');
		define('wherelogement','Où se situe votre logement ?');
		define('typelogement','Quel type de logement proposez vous ?');
		define('photo','Photos');
		define('envoyer','Envoyer');
		//connexion
		define('deconnexionsuccess','Vous avez bien été déconnecté !');
		define('retouraccueil','Retour à l\'accueil');
		define('connexionsuccess','Vous avez bien été connecté !');
		define('wrongpassword','Le nom d\'utilisateur ou le mot de passe saisi est incorrect. Veuillez réessayer !');
		//forum accueil
		define('forum','Forum');
		define('forum1','FORUM');
		define('categorie','Catégorie');
		define('description','Description');
		define('nbmessages','Nb Messages');
		define('lastmessage','Dernier message');
		//profil
		define('apropos','A Propos');
		define('editprofile','Editer votre profil');
		define('descriptif ','Descriptif');
		define('preferedtrade','Préférences d\'échange');
		define('logements','Logements');
		//annonce
		define('voyageur','Voyageurs');
		define('chambre','Chambres');
		define('sallebain','salles de bains');
		define('equipement','Equipements : ');
		define('membersince','Membre depuis 2014');
		define('consultprofil','Consulter profil');
		define('proposeechange','Proposer un échange');
		//ciblerecherche
		define('noustrouver','Nous avons trouvé');
		define('nblogementtrouve','dans notre base de données. Voici les logements que nous avons trouvées:');
		define('nouvellerecherche','Faire une nouvelle recherche avec critère');
		define('noresult','Pas de résultats');
		define('noresultbis','Nous n\'avons trouvé aucun résultat pour votre requête .');
		define('retry','Réessayez');
		define('autrechose',' avec autre chose.');		
		define('research','Recherche');
		//edit-profil
		define('modifytenement','Modifier un logement');
		define('addtenement','Ajouter un logement');
		define('genre','Sexe');
		define('homme','Homme');
		define('femme','Femme');
		define('autre','Autre');
		define('numtel','Numéro de Téléphone');
		define('celibataire','Célibataire');
		define('couple','Couple');
		define('married','Marié');
		define('photo1','Photo principale du logement ');
		define('photo2','Seconde photo');
		define('photo3','Troisième photo');
		define('photo4','Quatrième photo');
		define('descriptionlogement','Description du logement');
		define('titreannonce','Titre de l\'annonce');
		define('nbvoyageursauthorized','Nombre de voyageurs permis');
		define('superficie','Superficie (en m2)');
		define('nbvoyageurs','Nombre voyageurs');
		define('television','Télévision');
		define('yes','Oui');
		define('no','Non');
		define('localisation','Localisation');
		define('consultprofile','Consulter votre profil');
		define('friends','Amis');
		//admin
		define('editerunprofil','Editer profil utilisateur');
		//creer profil
		define('profilcreertrue','Votre profil a bien été créé. Félicitations!');
		define('errorcreateprofile','Une erreur est survenue lors de l\'élaboration du profil');
		define('telverif','Le numéro de téléphone doit comporter 10 chiffres ou 14 avec l\'id du pays');
		define('lastname','Nom');
		define('firstname','Prénom');
		//echange message
		define('demandetransmise','Votre demande a bien été transmise !');
		define('receiver','Destinataire');
		//discussion
		define('errorsendmessage','Il y a eu un problème lors de l\'envoi de votre message, veuillez réessayer.');
		define('nameexpediteur','Nom expéditeur');
		//ecriremsg
		define('messagesent','Votre message a bien été envoyé !');
		define('messagename','Titre du message');
		//liremsg
		define('nomessage','Aucun message');
		define('sendmessage','Envoyer un message');
		define('poster','Poster');
		//message
		define('dialogueaccept','Vous avez accepté le dialogue pour l\'échange.');
		define('statut','Statut');
		define('propositionaccept','Accepter la proposition');
		//new topic
		define('publier','Publier');
		//site
		define('sujet','Sujets');
		define('nbreponse','Nb réponses');
		define('nbvu','Nb vus');
		//topic
		define('newsubject','Nouveau Sujet');
		define('member','Membre');
		define('registeranswer','Inscrivez vous pour répondre !');
				//FAQ
		define('aide','AIDE EN LIGNE');
		define('Nouveau membre Welchome');
		define('newmeber','pourcommencertxt','Il est très facile de vous présenter et décrire votre maison à la communauté Welchome. Plus vous mettrez de photos en ligne, plus vous susciterez de confiance et d\'intérêt. Des photos de bonne qualité valorisent votre offre.');
		define('pourcommencer','Pour commencer');
		define('reduire','Réduire');
		define('envoyerbcptxt','Choisissez parmi nos nombreuses offres, sauvegardez celles qui vous plaisent et  contacter les membres auteurs de ces offres grâce notre système de messagerie. Soyez proactif et répondez rapidement à tous les messages que vous recevrez.');
		define('envoyerbcp','Envoyez beaucoup de propositions');
		define('conclureechangetxt','Faites connaissance avec votre/vos partenaire(s) par courriel et par téléphone, mettez-vous d\'accord sur les dates, réglez tous les détails.');
		define('conclureechange','Conclure un échange');
		define('message','Messagerie');
		define('commentcontactertxt','Utilisez notre système de messagerie pour contacter les autres membres. Les messages que vous envoyez ou recevez sur le site sont conservés dans votre messagerie interne personnelle, tout comme les réponses que vous envoyez. Dès que vous échangez des messages avec une personne, elle rentre dans votre liste d\'amis.');
		define('commentcontacter','Comment contacter d\'autres membres?');
		define('commentproposertxt','Lorsqu\'un logement vous intéresse, appuyer sur "proposer un échange". Le propriétaire sera ainsi notifié de votre demande et vous rentrerez ainsi en contact avec lui.');
		define('commentproposer','Comment proposer un échange?');
		define('profilverif','Profil & Vérifications');
		define('mettreajourprofiltxt','Votre profil vous permet de vous présenter, vous et votre famille. Vous pouvez partager des informations sur vos centres d\'intérêt, votre âge, votre profession, et le type d\'échange dont vous rêvez. Votre profil, associé à la page de présentation de votre offre, est un élément essentiel pour conclure un échange. Plus vous donnez d\'informations sur votre profil, plus il vous sera facile de trouver le partenaire idéal pour échanger.');
		define('mettreajourprofil','Mettre à jour son profil?');
		define('changerprofiltxt','Pour remplir son profil, ajouter ou modifier un logement, accédez à votre page profil via la barre menu et appuyer sur éditer votre profil dans la colonne à propos.');
		define('changerprofil','Comment changer son profil, ajouter ou modifier un logement?');
		define('recherche','Recherche');
		define('recherchesimpletxt','Pour faire une recherche simple, rentrez une localisation ou le nom d\'un logement dans la barre de recherche sur la page d\'accueil.');
		define('recherchesimple','Recherche simple');
		define('rechercheprecisetxt','Pour rechercher un logement avec plus de précision, appuyer ou survoler le bouton recherche avancé.');
		define('rechercheprecise','Recherche précise');
		define('conclureechange1','Conclure votre premier échange');
		define('trouverlogementtxt','Utilisez les outils à votre disposition - profils, vérifications, commentaire sur les échanges passés. Discuter avec le locataire via la plateforme de messages du site. Une conversation sur Skype est une solution idéale pour communiquer avec votre partenaire d\'échange. Vous pouvez même utiliser Skype pour faire une vidéo de présentation de votre maison en direct.'); 
		define('trouverlogement','Trouver le logement ideal');
		define('contratdechangetxt','Certaines personnes sont très détendues vis à vis de leurs accords d\'échange alors que d\'autres préfèrent définir de façon formelle tous les détails de l\'accord. Chacune de ces attitudes est parfaitement légitime. Vous devez savoir laquelle vous convient le mieux et correspond à vos besoins et vos attentes. Cependant, le fondement de tout accord doit être la confiance mutuelle, l\'engagement et le respect. Nous encourageons tous nos membres à utiliser des contrats d\'échange. L\'expérience montre leur utilité pour clarifier la communication et éviter les malentendus.');
		define('contratdechange','Contrat d\'échange');
		define('commentairesechange','Commentaires sur un échange');
		define('fairecommentairetxt','Les commentaires sont importants. Ils aident à renforcer la confiance et la sécurité au sein de la communauté, permettent le partage d\'informations et encouragent de futures opportunités d\'échange. Les commentaires sont l\'occasion pour vous de bâtir votre réputation. C\'est pourquoi, après chaque échange, sollicitez vos partenaires pour qu\'ils écrivent un commentaire pour vous. Evidemment, le meilleur moyen de demander un commentaire est d\'être le premier à en écrire un.');
		define('fairecommentaire','Ecrire un commentaire après l\'échange');
		define('commentecriretxt','Allez sur la page profil ou logement de la personne et donner votre avis sur l\'expérience que vous avez vécu.'); 
		define('commentecrire','Comment écrire un commentaire?');
		}
		else if ($lang=='en') 
		{
		//Menu
		define('accueil','Homepage');
		define('rechercheavancee','Advanced Research');
		define('lastannonce','Last announcement');
		define('howwelchomework','How works Welchome.com');
		define('addoffer','Add an offer');
		define('sendproposition','Send/receive propositions');
		define('trade','Trade');
		define('strenght','STRENGHTS');
		define('unlimitedexchange','unlimited trades');
		define('assistmember','Contact our member\'s assistance 7 days a week');
		define('freedevice','A completely free device');
		define('hugenetwork','A huge tenement\'s network');
		//connexion inscription deconnexion
		define('profil','Profile');
		define('disconnect','Disconnect');
		define('faq','FAQ');
		define('register','Register');		
		//Accueil
		define ('intro','Find a tenement that fits you');
		define('carrouseltxt','Your free holidays next to you');
		define('choixdestination','Choose your destination');
		define('accueiltxt','Welchome is a website which gives you the opportunity to trade your house or your tenement for the holydays.
                            It is easy to use, free and reliable.
                            Welchome gather a huge network of reliable people in France.
                            Don\'t hesitate anymore, use Welchome.');
		define('echangeillimite','Unlimited trade');
		//Recherche avancee
		define('choixville','Which city do you wish to go?');
		define('choixlogement','Which type of accomodation are you interested in?');
		define('appartement','an appartment');
		define('studio','a studio flat');
		define('maison','a house');
		define('pavillon','a detached house');
		define('bungalow','a holiday cottage');
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
		define('valider','Enter');
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
		define('conf','I have read and accept the general terms and conditions of this website');
		define('noconf','You did not accept the general terms and conditions of this website');
		define('imageperso','Personal picture');
		define('logementname','Tenement\'s nickname');
		define('wherelogement','Where is your tenement ?');
		define('typelogement','Which type of tenement do you offer?');
		define('photo','Pictures');
		define('envoyer','Send');
		//connexion
		define('deconnexionsuccess','You successfully disconnect!');
		define('retouraccueil','Back to homepage');
		define('connexionsuccess','You success to connect !');
		define('wrongpassword','Password or username incorrect, please try again');
		//forum accueil
		define('forum','FORUM');
		define('forum1','FORUM');
		define('categorie','Category');
		define('description','Description');
		define('nbmessages','Nb of messages');
		define('lastmessage','Last message');
		//Profil
		define('apropos','About us');
		define('editprofile','Edit your profile');
		define('descriptif ','Description');
		define('preferedtrade','Trade preferences');
		define('logements','Tenements');
		//annonce
		define('voyageur','Travellers');
		define('chambre','Bedrooms');
		define('sallebain','Bathrooms');
		define('equipement','Equipments: ');
		define('membersince','Member since 2014');
		define('consultprofil','View profile');
		define('proposeechange','Offer a trade');
		//ciblerecherche
		define('noustrouver','We found');
		define('nblogementtrouve','in our database. Here is the tenements we found:');
		define('nouvellerecherche','Do a new research with criteria');
		define('noresult','No result');
		define('noresultbis','We found no result for your request.');
		define('retry','Retry');
		define('autrechose',' with something else.');	
		define('research','Research');		
		//edit-profil
		define('modifytenement','Modify a tenement');
		define('addtenement','Add a tenement');
		define('genre','Gender');
		define('homme','Man');
		define('femme','Woman');
		define('autre','Other');
		define('numtel','Telephone number');
		define('celibataire','Single');
		define('couple','Couple');
		define('married','Married');
		define('photo1','Most important picture of the tenement');
		define('photo2','Second picture');
		define('photo3','Third photo');
		define('photo4','Fourth photo');
		define('descriptionlogement','tenement\'s description');
		define('titreannonce','Title of the announcement');
		define('nbvoyageursauthorized','Number of traveller authorized');
		define('superficie','Surface(in m2)');
		define('nbvoyageurs','Number of traveller');
		define('television','Television');
		define('yes','Yes');
		define('no','No');
		define('localisation','Localization');
		define('consultprofile','Watch your profile');
		define('confirmval','Confirm checking');
		define('friends','Friends');
		//admin
		define('editerunprofil','Editer user profile');
		//creer profil
		define('profilcreertrue','Your profile has been sucessfully created. Congratulation!');
		define('errorcreateprofile','An error has occurred during the profile creation');
		define('telverif','Phone number must be 10  or 14 numbers with the country ID');
		define('lastname','Lastname');
		define('firstname','Firstname');
		//echange message
		define('demandetransmise','Your request has been successfully passed on!');
		define('receiver','Receiver');
		//discussion
		define('errorsendmessage','An error has occurred during the message sending. Please try again.');
		define('nameexpediteur','Sender name');
		//ecriremsg
		define('messagesent','Your message has been sent !');
		define('messagename','message title');
		//liremsg
		define('nomessage','No message');
		define('sendmessage','Send a message');
		define('poster','Post');
		//message
		define('dialogueaccept','The dialogue for the trade has been accepted.');
		define('statut','Status');
		define('propositionaccept','Accept the proposition');
		//new topic
		define('publier','Post');
		//site
		define('sujet','Subjects');
		define('nbreponse','Nb responses');
		define('nbvu','Nb vus');
		//topic
		define('newsubject','New subject');
		define('member','Member');
		define('registeranswer','Register in order to answer !');
						//FAQ
		define('aide','Help online');
		define('newmember','New Welchome member');
		define('pourcommencertxt','It\'s easy to introduce and describe your tenement to the Welchome community. The most you put pictures online, the most you will be reliable and your tenement attractive. Good pictures significate good announcement.');
		define('pourcommencer','To begin');
		define('reduire','Reduce');
		define('envoyerbcptxt','Choose among the offers, saved them and and contact the announcer thanks to our message system. Be proactive and answer fastly at your propositions of tenements.');
		define('envoyerbcp','Send a lot of propositions');
		define('conclureechangetxt','Meet your partner by e-mail or phone, choose your dates and set all the details.');
		define('conclureechange','Conclude a trade');
		define('message','Bulletin board');
		define('commentcontactertxt','Use our bulletin board to contact the other members. The message received and sent are stocked in your own personal bulletin board'); 
		define('commentcontacter','How can I contact other members?');
		define('commentproposertxt','When a tenement fits you, click on "offer a trade". The tenement\'s owner will be notified of your proposition and so, you will be in contact with him.');
		define('commentproposer','How can I offer a trade?');
		define('profilverif','Profile & Checks');
		define('mettreajourprofiltxt','Your profile allows you to introduce yourself and your family . You can share informations about your job, entertainments, and the type of tenement of your dream. Your profile with the presentation page of your offer is an essentiel element of the trade. Vous pouvez partager des informations sur vos centres d\'intérêt, votre âge, votre profession, et le type d\'échange dont vous rêvez.  Votre profil, associé à la page de présentation de votre offre, est un élément essentiel pour conclure un échange. The more you give information the easiest it will be to find the ideal trade partner.');
		define('mettreajourprofil','How do I get my profile up to date?');
		define('changerprofiltxt','To fill in your profile, add or modify a tenement, and access to your profile page thanks to the menu, then click on edit your profile in the "about " column.');
		define('changerprofil','How do I modify my profile, or add an modify a tenement?');
		define('recherche','Search');
		define('recherchesimpletxt','To do a simple research, enter a localisation or a tenement name, in the research bar on the homepage.');
		define('recherchesimple','Simple search');
		define('rechercheprecisetxt','To use advanced research, click on or hover the advanced research button.');
		define('rechercheprecise','Advanced Research');
		define('conclureechange1','Conclude your first trade');
		define('trouverlogementtxt','Use the tools at your disposal - profiles, checks, comments. Discuss with the tenement owner thanks to the bulletin board.'); 
		define('trouverlogement','Find the ideal tenement');
		define('contratdechangetxt','Some people are relaxed whereas some prefer to define strictly all the details of the trade. Each of this attitude are legitimate. You need to know which one will suit you the best. However, all is about mutual confidence, contract and respect. We encourage all our member to use tenemnent\'s contract. The experience show us their utility to clarify the communication and avoid the misunderstandings.');
		define('contratdechange1','Trade contract');
		define('commentairesechange','Trade comment');
		define('fairecommentairetxt','Comments are important. they help to reinforce the community confident and security, allow the share of informations and encourage futur trades. Comments make your reputation. That\'s why,after each trade, ask your partner to let you a comment. Obviously, The best way to have a comment is to write one.');
		define('fairecommentaire','Write a comment after the trade');
		define('commentecriretxt','Go to the profile or tenement page and show your appreciation');
		define('commentecrire','How do I write a comment?');
		}
	}
	else if (isset($_COOKIE['lang']))
	{
		if ($lang=='fr') 
		{  
		//Menu
		define('accueil','Accueil');
		define('rechercheavancee','Recherche avancée');
		define('lastannonce','Les dernières annonces');
		define('howwelchomework','Comment fonctionne Welchome.com');
		define('addoffer','Ajouter une offre');
		define('sendproposition','Envoyer/recevoir des propositions');
		define('trade','Echanger');
		define('strenght','POINTS FORTS');
		define('illimitateexchange','Echanges illimités');
		define('assistmember','Bénéficiez de notre Assistance Membres 7j/7 ');
		define('freedevice','Un service complètement gratuit');
		define('hugenetwork','Un large réseau de logements');
		//connexion inscription deconnexion
		define('profil','Profil');
		define('disconnect','Se déconnecter');
		define('faq','FAQ');
		define('register','Inscription');
		//Accueil
		define ('intro','Trouvez un logement qui vous correspond');
		define('carrouseltxt','Vos vacances à portée de mains gratuitement');
		define('choixdestination','Saisir une destination');
		define('accueiltxt','Welchome est un site internet qui vous permet d’échanger votre maison ou votre appartement pour les vacances.
                            Il est simple d\'utilisation gratuit et fiable.
                            Welchome rassemble un large réseau de personnes de confiance dans toute la France.
                            N\'hésitez plus, utlilisez Welchome.');
		define('echangeillimite','Echanges illimités');
		//Recherche avancée
		define('choixville','Dans quelle ville souhaitez-vous aller ?');
		define('choixlogement','Par quel(s) type(s) de logement êtes vous interessé ?');
		define('appartement','un appartement');
		define('studio','un studio');
		define('maison','une maison');
		define('pavillon','un pavillon');
		define('bungalow','un gîte');
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
		define('sechelinge','sèche linge');
		define('cheminee','Cheminée');
		define('tele','Télévision');
		define('parking','Parking');
		define('piscine','Piscine');
		define('jardin','Jardin');
		define('balcon','Balcon');
		define('internet','internet en wifi');
		define('valider','Valider');
		//inscription
		define('bieninscrit','Vous avez bien été inscrit. Vous pouvez désormais vous connecter !');
		define('connect','Se connecter');
		define('conf',"J’ai lu et j’accepte les conditions générales d’utilisation de ce site");
		define('noconf',"Vous n'avez pas accepté les conditions générales d’utilisation de ce site");
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
		//forum accueil
		define('forum','Forum');
		define('forum1','FORUM');
		define('categorie','Catégorie');
		define('description','Description');
		define('nbmessages','Nb Messages');
		define('lastmessage','Dernier message');
		//profil
		define('apropos','A Propos');
		define('editprofile','Editer votre profil');
		define('descriptif ','Descriptif');
		define('preferedtrade','Préférences d\'échange');
		define('logements','Logements');		
		//annonce
		define('voyageur','Voyageurs');
		define('chambre','Chambres');
		define('sallebain','Bathrooms');
		define('equipement','Equipements: ');
		define('membersince','Membre depuis 2014');
		define('consultprofil','Consulter profil');
		define('proposeechange','Proposer un echange');
		//cible recherche
		define('noustrouver','Nous avons trouvé');
		define('nblogementtrouve','dans notre base de données. Voici les logements que nous avons trouvées:');
		define('nouvellerecherche','Faire une nouvelle recherche avec critère');
		define('noresult','Pas de résultats');
		define('noresultbis','Nous n\'avons trouvé aucun résultat pour votre requête .');
		define('retry','Réessayez');
		define('autrechose',' avec autre chose.');
		define('research','Recherche');	
		//edit-profil
		define('modifytenement','Modifier un logement');
		define('addtenement','Ajouter un logement');
		define('genre','Sexe');
		define('homme','Homme');
		define('femme','Femme');
		define('autre','Autre');
		define('numtel','Numéro de Téléphone');
		define('celibataire','Célibataire');
		define('couple','Couple');
		define('married','Marié');
		define('photo1','Photo principale du logement ');
		define('photo2','Seconde photo');
		define('photo3','Troisième photo');
		define('photo4','Quatrième photo');
		define('descriptionlogement','Description du logement');
		define('titreannonce','Titre de l\'annonce');
		define('nbvoyageursauthorized','Nombre de voyageurs permis');
		define('superficie','Superficie (en m2)');
		define('nbvoyageurs','Nombre voyageurs');
		define('television','Télévision');
		define('yes','Oui');
		define('no','Non');
		define('localisation','Localisation');
		define('consultprofile','Consulter votre profil');
		define('confirmval','Confirmation Validation');
		define('friends','Amis');
		//admin
		define('editerunprofil','Editer profil utilisateur');
		//creer profil
		define('profilcreertrue','Votre profil a bien été créé. Félicitations!');
		define('errorcreateprofile','Une erreur est survenue lors de l\'élaboration du profil');
		define('telverif','Le numéro de téléphone doit comporter 10 chiffres ou 14 avec l\'id du pays');
		define('lastname','Nom');
		define('firstname','Prénom');
		//echange message
		define('demandetransmise','Votre demande a bien été transmise !');
		define('receiver','Destinataire');
		//discussion
		define('errorsendmessage','Il y a eu un problème lors de l\'envoi de votre message, veuillez réessayer.');
		define('nameexpediteur','Nom expéditeur');
		//ecriremsg
		define('messagesent','Votre message a bien été envoyé !');
		define('messagename','Titre du message');
		//liremsg
		define('nomessage','Aucun message');
		define('sendmessage','Envoyer un message');
		define('poster','Poster');
		//message
		define('dialogueaccept','Vous avez accepté le dialogue pour l\'échange.');
		define('statut','Statut');
		define('propositionaccept','Accepter la proposition');
		//new topic
		define('publier','Publier');
		//site
		define('sujet','Sujets');
		define('nbreponse','Nb réponses');
		define('nbvu','Nb vus');
		//topic
		define('newsubject','Nouveau Sujet');
		define('member','Membre');
		define('registeranswer','Inscrivez vous pour répondre !');
				//FAQ
		define('aide','AIDE EN LIGNE');
		define('newmember','Nouveau membre Welchome');
		define('pourcommencertxt','Il est très facile de vous présenter et décrire votre maison à la communauté Welchome. Plus vous mettrez de photos en ligne, plus vous susciterez de confiance et d\'intérêt. Des photos de bonne qualité valorisent votre offre.');
		define('pourcommencer','Pour commencer');
		define('reduire','Réduire');
		define('envoyerbcptxt','Choisissez parmi nos nombreuses offres, sauvegardez celles qui vous plaisent et  contacter les membres auteurs de ces offres grâce notre système de messagerie. Soyez proactif et répondez rapidement à tous les messages que vous recevrez.');
		define('envoyerbcp','Envoyez beaucoup de propositions');
		define('conclureechangetxt','Faites connaissance avec votre/vos partenaire(s) par courriel et par téléphone, mettez-vous d\'accord sur les dates, réglez tous les détails.');
		define('conclureechange','Conclure un échange');
		define('message','Messagerie');
		define('commentcontactertxt','Utilisez notre système de messagerie pour contacter les autres membres. Les messages que vous envoyez ou recevez sur le site sont conservés dans votre messagerie interne personnelle, tout comme les réponses que vous envoyez. Dès que vous échangez des messages avec une personne, elle rentre dans votre liste d\'amis.');
		define('commentcontacter','Comment contacter d\'autres membres?');
		define('commentproposertxt','Lorsqu\'un logement vous intéresse, appuyer sur "proposer un échange". Le propriétaire sera ainsi notifié de votre demande et vous rentrerez ainsi en contact avec lui.');
		define('commentproposer','Comment proposer un échange?');
		define('profilverif','Profil & Vérifications');
		define('mettreajourprofiltxt','Votre profil vous permet de vous présenter, vous et votre famille. Vous pouvez partager des informations sur vos centres d\'intérêt, votre âge, votre profession, et le type d\'échange dont vous rêvez. Votre profil, associé à la page de présentation de votre offre, est un élément essentiel pour conclure un échange. Plus vous donnez d\'informations sur votre profil, plus il vous sera facile de trouver le partenaire idéal pour échanger.');
		define('mettreajourprofil','Mettre à jour son profil?');
		define('changerprofiltxt','Pour remplir son profil, ajouter ou modifier un logement, accédez à votre page profil via la barre menu et appuyer sur éditer votre profil dans la colonne à propos.');
		define('changerprofil','Comment changer son profil, ajouter ou modifier un logement?');
		define('recherche','Recherche');
		define('recherchesimpletxt','Pour faire une recherche simple, rentrez une localisation ou le nom d\'un logement dans la barre de recherche sur la page d\'accueil.');
		define('recherchesimple','Recherche simple');
		define('rechercheprecisetxt','Pour rechercher un logement avec plus de précision, appuyer ou survoler le bouton recherche avancé.');
		define('rechercheprecise','Recherche précise');
		define('conclureechange1','Conclure votre premier échange');
		define('trouverlogementtxt','Utilisez les outils à votre disposition - profils, vérifications, commentaire sur les échanges passés. Discuter avec le locataire via la plateforme de messages du site. Une conversation sur Skype est une solution idéale pour communiquer avec votre partenaire d\'échange. Vous pouvez même utiliser Skype pour faire une vidéo de présentation de votre maison en direct.'); 
		define('trouverlogement','Trouver le logement ideal');
		define('contratdechangetxt','Certaines personnes sont très détendues vis à vis de leurs accords d\'échange alors que d\'autres préfèrent définir de façon formelle tous les détails de l\'accord. Chacune de ces attitudes est parfaitement légitime. Vous devez savoir laquelle vous convient le mieux et correspond à vos besoins et vos attentes. Cependant, le fondement de tout accord doit être la confiance mutuelle, l\'engagement et le respect. Nous encourageons tous nos membres à utiliser des contrats d\'échange. L\'expérience montre leur utilité pour clarifier la communication et éviter les malentendus.');
		define('contratdechange','Contrat d\'échange');
		define('commentairesechange','Commentaires sur un échange');
		define('fairecommentairetxt','Les commentaires sont importants. Ils aident à renforcer la confiance et la sécurité au sein de la communauté, permettent le partage d\'informations et encouragent de futures opportunités d\'échange. Les commentaires sont l\'occasion pour vous de bâtir votre réputation. C\'est pourquoi, après chaque échange, sollicitez vos partenaires pour qu\'ils écrivent un commentaire pour vous. Evidemment, le meilleur moyen de demander un commentaire est d\'être le premier à en écrire un.');
		define('fairecommentaire','Ecrire un commentaire après l\'échange');
		define('commentecriretxt','Allez sur la page profil ou logement de la personne et donner votre avis sur l\'expérience que vous avez vécu.'); 
		define('commentecrire','Comment écrire un commentaire?');
		}
		else if ($lang=='en') 
		{  
		//Menu
		define('accueil','Homepage');
		define('rechercheavancee','Advanced Research');
		define('lastannonce','Last announcement');
		define('howwelchomework','How works Welchome.com');
		define('addoffer','Add an offer');
		define('sendproposition','Send/receive propositions');
		define('trade','Trade');
		define('strenght','STRENGHTS');
		define('unlimitedexchange','unlimited trades');
		define('assistmember','Contact our member\'s assistance 7 days a week');
		define('freedevice','A completely free device');
		define('hugenetwork','A huge tenement\'s network');
		//connexion inscription deconnexion
		define('profil','Profile');
		define('disconnect','Disconnect');
		define('faq','FAQ');
		define('register','Register');
		//Accueil
		define ('intro','Find a tenement that fits you');
		define('carrouseltxt','Your free holidays next to you');
		define('choixdestination','Choose your destination');
		define('accueiltxt','Welchome is a website which gives you the opportunity to trade your house or your tenement for the holydays.
                            It is easy to use, free and reliable.
                            Welchome gather a huge network of reliable people in France.
                            Don\'t hesitate anymore, use Welchome.');
		define('echangeillimite','Unlimited trade');
		//Recherche avancee
		define('choixville','Which city do you wish to go?');
		define('choixlogement','Which type of accomodation are you interested in?');
		define('appartement','an appartment');
		define('studio','a studio flat');
		define('maison','a house');
		define('pavillon','a detached house');
		define('bungalow',' a holiday cottage');
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
		define('valider','Enter');
		//inscription
		define('bieninscrit','You are successfully registered. You can connect now!');
		define('connect','Connect');
		define('conf','I have read and accept the general terms and conditions of this website');
		define('noconf','You did not accept the general terms and conditions of this website');
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
		//connexion
		define('deconnexionsuccess','You successfully disconnect!');
		define('retouraccueil','Back to homepage');
		define('connexionsuccess','You success to connect !');
		define('wrongpassword','Password or username incorrect, please try again');
		//forum accueil
		define('forum','Forum');
		define('forum1','FORUM');
		define('categorie','Category');
		define('description','Description');
		define('nbmessages','Nb of messages');
		define('lastmessage','Last message');
		//profil
		define('apropos','About us');
		define('editprofile','Edit your profile');
		define('descriptif ','Description');
		define('preferedtrade','Trade preferences');
		define('logements','Tenements');
		//annonce
		define('voyageur','Travellers');
		define('chambre','Bedrooms');
		define('sallebain','Bathrooms');
		define('equipement','Equipments: ');
		define('membersince','Member since 2014');
		define('consultprofil','View profile');
		define('proposeechange','Offer a trade');	
		//ciblerecherche
		define('noustrouver','We found');
		define('nblogementtrouve','in our database. Here is the tenements we found:');
		define('nouvellerecherche','Do a new research with criteria');
		define('noresult','No result');
		define('noresultbis','We found no result for your request.');
		define('retry','Retry');
		define('autrechose',' with something else.');	
		define('research','Research');
		//edit-profil
		define('modifytenement','Modify a tenement');
		define('addtenement','Add a tenement');
		define('genre','Gender');
		define('homme','Man');
		define('femme','Woman');
		define('autre','Other');
		define('numtel','Telephone number');
		define('celibataire','Single');
		define('couple','Couple');
		define('married','Married');
		define('photo1','Most important picture of the tenement');
		define('photo2','Second picture');
		define('photo3','Third photo');
		define('photo4','Fourth photo');
		define('descriptionlogement','tenement\'s description');
		define('titreannonce','Title of the announcement');
		define('nbvoyageursauthorized','Number of traveller authorized');
		define('superficie','Surface(in m2)');
		define('nbvoyageurs','Number of traveller');
		define('television','Television');
		define('yes','Yes');
		define('no','No');
		define('localisation','Localization');
		define('consultprofile','Watch your profile');
		define('confirmval','Confirm checking');
		define('friends','Friends');
		//admin
		define('editerunprofil','Editer user profile');
		//creer profil
		define('profilcreertrue','Your profile has been sucessfully created. Congratulation!');
		define('errorcreateprofile','An error has occurred during the profile creation');
		define('telverif','Phone number must be 10  or 14 numbers with the country ID');
		define('lastname','Lastname');
		define('firstname','Firstname');
		//echange message
		define('demandetransmise','Your request has been successfully passed on!');
		define('receiver','Receiver');
		//discussion
		define('errorsendmessage','An error has occurred during the message sending. Please try again.');
		define('nameexpediteur','Sender name');
		//ecriremsg
		define('messagesent','Your message has been sent !');
		define('messagename','message title');
		//liremsg
		define('nomessage','No message');
		define('sendmessage','Send a message');
		define('poster','Post');
		//message
		define('dialogueaccept','The dialogue for the trade has been accepted.');
		define('statut','Status');
		define('propositionaccept','Accept the proposition');
		//new topic
		define('publier','Post');
		//site
		define('sujet','Subjects');
		define('nbreponse','Nb responses');
		define('nbvu','Nb vus');
		//topic
		define('newsubject','New subject');
		define('member','Member');
		define('registeranswer','Register in order to answer !');
				//FAQ
		define('aide','Help online');
		define('newmember','New Welchome member');
		define('pourcommencertxt','It\'s easy to introduce and describe your tenement to the Welchome community. The most you put pictures online, the most you will be reliable and your tenement attractive. Good pictures significate good announcement.');
		define('pourcommencer','To begin');
		define('reduire','Reduce');
		define('envoyerbcptxt','Choose among the offers, saved them and and contact the announcer thanks to our message system. Be proactive and answer fastly at your propositions of tenements.');
		define('envoyerbcp','Send a lot of propositions');
		define('conclureechangetxt','Meet your partner by e-mail or phone, choose your dates and set all the details.');
		define('conclureechange','Conclude a trade');
		define('message','Bulletin board');
		define('commentcontactertxt','Use our bulletin board to contact the other members. The message received and sent are stocked in your own personal bulletin board'); 
		define('commentcontacter','How can I contact other members?');
		define('commentproposertxt','When a tenement fits you, click on "offer a trade". The tenement\'s owner will be notified of your proposition and so, you will be in contact with him.');
		define('commentproposer','How can I offer a trade?');
		define('profilverif','Profile & Checks');
		define('mettreajourprofiltxt','Your profile allows you to introduce yourself and your family . You can share informations about your job, entertainments, and the type of tenement of your dream. Your profile with the presentation page of your offer is an essentiel element of the trade. Vous pouvez partager des informations sur vos centres d\'intérêt, votre âge, votre profession, et le type d\'échange dont vous rêvez.  Votre profil, associé à la page de présentation de votre offre, est un élément essentiel pour conclure un échange. The more you give information the easiest it will be to find the ideal trade partner.');
		define('mettreajourprofil','How do I get my profile up to date?');
		define('changerprofiltxt','To fill in your profile, add or modify a tenement, and access to your profile page thanks to the menu, then click on edit your profile in the "about " column.');
		define('changerprofil','How do I modify my profile, or add an modify a tenement?');
		define('recherche','Search');
		define('recherchesimpletxt','To do a simple research, enter a localisation or a tenement name, in the research bar on the homepage.');
		define('recherchesimple','Simple search');
		define('rechercheprecisetxt','To use advanced research, click on or hover the advanced research button.');
		define('rechercheprecise','Advanced Research');
		define('conclureechange1','Conclude your first trade');
		define('trouverlogementtxt','Use the tools at your disposal - profiles, checks, comments. Discuss with the tenement owner thanks to the bulletin board.'); 
		define('trouverlogement','Find the ideal tenement');
		define('contratdechangetxt','Some people are relaxed whereas some prefer to define strictly all the details of the trade. Each of this attitude are legitimate. You need to know which one will suit you the best. However, all is about mutual confidence, contract and respect. We encourage all our member to use tenemnent\'s contract. The experience show us their utility to clarify the communication and avoid the misunderstandings.');
		define('contratdechange','Trade contract');
		define('commentairesechange','Trade comment');
		define('fairecommentairetxt','Comments are important. they help to reinforce the community confident and security, allow the share of informations and encourage futur trades. Comments make your reputation. That\'s why,after each trade, ask your partner to let you a comment. Obviously, The best way to have a comment is to write one.');
		define('fairecommentaire','Write a comment after the trade');
		define('commentecriretxt','Go to the profile or tenement page and show your appreciation');
		define('commentecrire','How do I write a comment?');
		}
	}
	else
	{
		//Menu
		define('accueil','Accueil');
		define('rechercheavancee','Recherche avancée');
		define('lastannonce','Les dernières annonces');
		define('howwelchomework','Comment fonctionne Welchome.com');
		define('addoffer','Ajouter une offre');
		define('sendproposition','Envoyer/recevoir des propositions');
		define('trade','Echanger');
		define('strenght','POINTS FORTS');
		define('unlimitedexchange','Echanges illimités');
		define('assistmember','Bénéficiez de notre Assistance Membres 7j/7 ');
		define('freedevice','Un service complètement gratuit');
		define('hugenetwork','Un large réseau de logements');
		//connexion inscription deconnexion
		define('profil','Profil');
		define('conf',"J’ai lu et j’accepte les conditions générales d’utilisation de ce site");
		define('noconf',"Vous n'avez pas accepté les conditions générales d’utilisation de ce site");

		define('disconnect','Se déconnecter');
		define('faq','FAQ');
		define('register','Inscription');
		//Accueil
		define ('intro','Trouvez un logement qui vous correspond');
		define('carrouseltxt','Vos vacances à portée de mains gratuitement');
		define('choixdestination','Saisir une destination');
		define('accueiltxt','Welchome est un site internet qui vous permet d’échanger votre maison ou votre appartement pour les vacances.
                            Il est simple d\'utilisation gratuit et fiable.
                            Welchome rassemble un large réseau de personnes de confiance dans toute la France.
                            N\'hésitez plus, utlilisez Welchome.');
		define('echangeillimite','Echanges illimités');
		//Recherche avancée
		define('choixville','Lieu souhaité');
		define('choixlogement','Type(s) de logement');
		define('appartement','un appartement');
		define('studio','un studio');
		define('maison','une maison');
		define('pavillon','un pavillon');
		define('bungalow','un gîte');
		define('campingcar','un camping car');
		define('bateau','un bateau');
		define('choixdates','Veuillez entrez les dates qui vous conviennent :');
		define('de','de');
		define('à','à');
		define('capacitéaccueil','Capacité d\'accueil :');
		define('nbchambres','Nombre de chambres :');
		define('nbsallesbain','Nombre de salles de bain :');
		define('surfacemin','Surface minimale :');
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
		define('sechelinge','Sèche linge');
		define('cheminee','Cheminée');
		define('tele','Télévision');
		define('parking','Parking');
		define('piscine','Piscine');
		define('jardin','Jardin');
		define('balcon','Balcon');
		define('internet','internet en wifi');
		define('valider','Valider');
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
		define('logementname','Titre de l\'annonce');
		define('wherelogement','Où se situe votre logement ?');
		define('typelogement','Quel type de logement proposez vous ?');
		define('photo','Photos');
		define('envoyer','Envoyer');
		//connexion
		define('deconnexionsuccess','Vous avez bien été déconnecté !');
		define('retouraccueil','Retour à l\'accueil');
		define('connexionsuccess','Vous avez bien été connecté !');
		define('wrongpassword','Le nom d\'utilisateur ou le mot de passe saisi est incorrect. Veuillez réessayer !');
		//forum accueil
		define('forum','Forum');
		define('forum1','FORUM');
		define('categorie','Catégorie');
		define('description','Description');
		define('nbmessages','Nb Messages');
		define('lastmessage','Dernier message');
		//profil
		define('apropos','A Propos');
		define('editprofile','Editer votre profil');
		define('descriptif ','Descriptif');
		define('preferedtrade','Préférences d\'échange');
		define('logements','Logements');
		//annonce
		define('voyageur','Voyageurs');
		define('chambre','Chambres');
		define('sallebain','salles de bains');
		define('equipement','Equipements: ');
		define('membersince','Membre depuis 2014');
		define('consultprofil','Consulter profil');
		define('proposeechange','Proposer un échange');
		//ciblerecherche
		define('noustrouver','Nous avons trouvé');
		define('nblogementtrouve','dans notre base de données. Voici les logements que nous avons trouvées:');
		define('nouvellerecherche','Faire une nouvelle recherche avec critère');
		define('noresult','Pas de résultats');
		define('noresultbis','Nous n\'avons trouvé aucun résultat pour votre requête .');
		define('retry','Réessayez');
		define('autrechose',' avec autre chose.');
		define('research','Recherche');
		//edit-profil
		define('modifytenement','Modifier un logement');
		define('addtenement','Ajouter un logement');
		define('genre','Sexe');
		define('homme','Homme');
		define('femme','Femme');
		define('autre','Autre');
		define('numtel','Numéro de Téléphone');
		define('celibataire','Célibataire');
		define('couple','Couple');
		define('married','Marié');
		define('photo1','Photo principale du logement ');
		define('photo2','Seconde photo');
		define('photo3','Troisième photo');
		define('photo4','Quatrième photo');
		define('descriptionlogement','Description du logement');
		define('titreannonce','Titre de l\'annonce');
		define('nbvoyageursauthorized','Nombre de voyageurs permis');
		define('superficie','Superficie (en m2)');
		define('nbvoyageurs','Nombre voyageurs');
		define('television','Télévision');
		define('yes','Oui');
		define('no','Non');
		define('localisation','Localisation');
		define('consultprofile','Consulter votre profil');
		define('confirmval','Confirmation Validation');
		define('friends','Amis');
		//admin
		define('editerunprofil','Editer profil utilisateur');
		//creer profil
		define('profilcreertrue','Votre profil a bien été créé. Félicitations!');
		define('errorcreateprofile','Une erreur est survenue lors de l\'élaboration du profil');
		define('telverif','Le numéro de téléphone doit comporter 10 chiffres ou 14 avec l\'id du pays');
		define('lastname','Nom');
		define('firstname','Prénom');
		//echange message
		define('demandetransmise','Votre demande a bien été transmise !');
		define('receiver','Destinataire');
		//discussion
		define('errorsendmessage','Il y a eu un problème lors de l\'envoi de votre message, veuillez réessayer.');
		define('nameexpediteur','Nom expéditeur');
		//ecriremsg
		define('messagesent','Votre message a bien été envoyé !');
		define('messagename','Titre du message');
		//liremsg
		define('nomessage','Aucun message');
		define('sendmessage','Envoyer un message');
		define('poster','Poster');
		//message
		define('dialogueaccept','Vous avez accepté le dialogue pour l\'échange.');
		define('statut','Statut');
		define('propositionaccept','Accepter la proposition');
		//new topic
		define('publier','Publier');
		//site
		define('sujet','Sujets');
		define('nbreponse','Nb réponses');
		define('nbvu','Nb vus');
		//topic
		define('newsubject','Nouveau Sujet');
		define('member','Membre');
		define('registeranswer','Inscrivez vous pour répondre !');
		//FAQ
		define('aide','AIDE EN LIGNE');
		define('newmember','Nouveau membre Welchome');
		define('pourcommencertxt','Il est très facile de vous présenter et décrire votre maison à la communauté Welchome. Plus vous mettrez de photos en ligne, plus vous susciterez de confiance et d\'intérêt. Des photos de bonne qualité valorisent votre offre.');
		define('pourcommencer','Pour commencer');
		define('reduire','Réduire');
		define('envoyerbcptxt','Choisissez parmi nos nombreuses offres, sauvegardez celles qui vous plaisent et  contacter les membres auteurs de ces offres grâce notre système de messagerie. Soyez proactif et répondez rapidement à tous les messages que vous recevrez.');
		define('envoyerbcp','Envoyez beaucoup de propositions');
		define('conclureechangetxt','Faites connaissance avec votre/vos partenaire(s) par courriel et par téléphone, mettez-vous d\'accord sur les dates, réglez tous les détails.');
		define('conclureechange','Conclure un échange');
		define('message','Messagerie');
		define('commentcontactertxt','Utilisez notre système de messagerie pour contacter les autres membres. Les messages que vous envoyez ou recevez sur le site sont conservés dans votre messagerie interne personnelle, tout comme les réponses que vous envoyez. Dès que vous échangez des messages avec une personne, elle rentre dans votre liste d\'amis.');
		define('commentcontacter','Comment contacter d\'autres membres?');
		define('commentproposertxt','Lorsqu\'un logement vous intéresse, appuyer sur "proposer un échange". Le propriétaire sera ainsi notifié de votre demande et vous rentrerez ainsi en contact avec lui.');
		define('commentproposer','Comment proposer un échange?');
		define('profilverif','Profil & Vérifications');
		define('mettreajourprofiltxt','Votre profil vous permet de vous présenter, vous et votre famille. Vous pouvez partager des informations sur vos centres d\'intérêt, votre âge, votre profession, et le type d\'échange dont vous rêvez. Votre profil, associé à la page de présentation de votre offre, est un élément essentiel pour conclure un échange. Plus vous donnez d\'informations sur votre profil, plus il vous sera facile de trouver le partenaire idéal pour échanger.');
		define('mettreajourprofil','Mettre à jour son profil?');
		define('changerprofiltxt','Pour remplir son profil, ajouter ou modifier un logement, accédez à votre page profil via la barre menu et appuyer sur éditer votre profil dans la colonne à propos.');
		define('changerprofil','Comment changer son profil, ajouter ou modifier un logement?');
		define('recherche','Recherche');
		define('recherchesimpletxt','Pour faire une recherche simple, rentrez une localisation ou le nom d\'un logement dans la barre de recherche sur la page d\'accueil.');
		define('recherchesimple','Recherche simple');
		define('rechercheprecisetxt','Pour rechercher un logement avec plus de précision, appuyer ou survoler le bouton recherche avancé.');
		define('rechercheprecise','Recherche précise');
		define('conclureechange','Conclure votre premier échange');
		define('trouverlogementtxt','Utilisez les outils à votre disposition - profils, vérifications, commentaire sur les échanges passés. Discuter avec le locataire via la plateforme de messages du site. Une conversation sur Skype est une solution idéale pour communiquer avec votre partenaire d\'échange. Vous pouvez même utiliser Skype pour faire une vidéo de présentation de votre maison en direct.'); 
		define('trouverlogement','Trouver le logement ideal');
		define('contratdechangetxt','Certaines personnes sont très détendues vis à vis de leurs accords d\'échange alors que d\'autres préfèrent définir de façon formelle tous les détails de l\'accord. Chacune de ces attitudes est parfaitement légitime. Vous devez savoir laquelle vous convient le mieux et correspond à vos besoins et vos attentes. Cependant, le fondement de tout accord doit être la confiance mutuelle, l\'engagement et le respect. Nous encourageons tous nos membres à utiliser des contrats d\'échange. L\'expérience montre leur utilité pour clarifier la communication et éviter les malentendus.');
		define('contratdechange1','Contrat d\'échange');
		define('commentairesechange','Commentaires sur un échange');
		define('fairecommentairetxt','Les commentaires sont importants. Ils aident à renforcer la confiance et la sécurité au sein de la communauté, permettent le partage d\'informations et encouragent de futures opportunités d\'échange. Les commentaires sont l\'occasion pour vous de bâtir votre réputation. C\'est pourquoi, après chaque échange, sollicitez vos partenaires pour qu\'ils écrivent un commentaire pour vous. Evidemment, le meilleur moyen de demander un commentaire est d\'être le premier à en écrire un.');
		define('fairecommentaire','Ecrire un commentaire après l\'échange');
		define('commentecriretxt','Allez sur la page profil ou logement de la personne et donner votre avis sur l\'expérience que vous avez vécu.'); 
		define('commentecrire','Comment écrire un commentaire?');
		
	}                                                                                                                                                                                           
	
}                                                                                                                                                                                                                                                    
choixlangue();
?>
	