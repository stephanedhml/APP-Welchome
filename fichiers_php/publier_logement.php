<?php

	include("config.php");
    include("modeles.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Postez votre annonce</title>
</head>

<body class="wood">
<div class="header">
    <?php include("menus.php"); ?>
</div>
<div class="superglobal">
    <div class="global">
        <?php
        //Vérification du bon envoi du formulaire
        if(isset($_POST['nom_maison'], $_POST['localisation'], $_POST['logement'], $_POST['nb_personne'], $_POST['surface'], $_POST['nb_chambres'], $_POST['nb_salle_bain'], $_POST['lieu'], $_POST['description']))
        {


            try
            {
                //On insère les données saisies par l'utilisateur dans la BDD
                $req = $bdd->prepare("INSERT INTO logement(localisation,type_endroit,nom_maison,nombre_voyageurs,type_logement,nb_chambres,nb_salles_bains,superficie,description_logement)
VALUES(:localisation, :lieu, :nom_maison, :nb_personne, :logement, :nb_chambres, :nb_salle_bain,:surface, :description)");
                $req->execute(array
                (
                    'localisation' => $_POST['localisation'],
                    'lieu' => $_POST['lieu'],
                    'nom_maison' => $_POST['nom_maison'],
                    'nb_personne' => $_POST['nb_personne'],
                    'logement' => $_POST['logement'],
                    'nb_chambres' => $_POST['nb_chambres'],
                    'nb_salle_bain' => $_POST['nb_salle_bain'],
                    'surface' => $_POST['surface'],
                    'description' => $_POST['description'],
                ));
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }

            //On enregistre les infos dans la base de donnée
            if($bdd->lastInsertId())
            {
                //Si ça a fonctionné, on affiche pas le formulaire
                $form=false;
                ?>
                <div class='message'>Votre annonce a bien été publiée
                    </br><a href="accueilmanu.php">Retourner à l'accueil</a></div>
            <?php
            }
            else
            {
                //Sinon, il y a une erreur
                $form=true;
                $message = "Une erreur est survenue lors de la publication.";
            }


        }
        else
        {
            //Le formulaire n'a pas été bien envoyé
            $form=true;
        }
        if($form)
        {
        if(isset($message))
        {
            echo '<div class="message">'.$message.'</div>';
        }
        // On affiche le formulaire
        ?>
        <div class="cadreinscrpt">
            <div class="contentg">
                <div class="signup_form1">

                    <form method="post" action=publier_logement.php>

                        <!-- Nom logement  -->
                        <p>
                            Nom de votre logement.<br/>
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
                                <option value="banlieu"> En banlieue</option>
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
                </div>
                <!-- </div>
                <div class="contentd1">

                </div>
                <div class="contentd2">
                    <div class="signup_form2">

                    </div>

                </div> -->
                <?php
                }
                ?>
            </div>
        </div>
</body>
</html>

