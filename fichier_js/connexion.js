/**
 * Created by marvin on 06/01/15.
 */



function rouge(champ,erreur)
{

        if(erreur)
        {
        champ.style.border = "1px solid #f00",
        champ.style.backgroundColor = "#fba";
        }
        else
        {
        champ.style.border = "",
        champ.style.backgroundColor = "";
        }
}
/*
function verif_pseudo(champ) {
    if (document.getElementById('username').value != "") {
        rouge(champ, true);
        document.getElementById('erreur').innerHTML = 'Pas bien ce que tu as mis dans ce champs';
        return false;
    }
    else if (champ.value.length > 25) {
        rouge(true);
        document.getElementById('erreur').innerHTML = 'Pas bien ce que tu as mis dans ce champs';
        return false;
    }
    else {
        rouge(champ, false);
        return true;
    }
}
*/
function tchekusername()
{
    if(document.getElementById('usernom').value == "")
    {

rouge(document.getElementById('usernom'),true);


        document.getElementById('user').innerHTML =  'Entrez votre username';

        return false;
    }
    else
    {
        rouge(document.getElementById('usernom'),false);

        return true;
    }
}
function tchekpassword()
{

    if(document.getElementById('passwd').value == "")
    {

        rouge(document.getElementById('passwd'),true);

        document.getElementById('mdp').innerHTML =  'Entrez votre mot de passe';

        return false;
    }
    else if(document.getElementById('passwd').value.length < 6 && document.getElementById('passwd').value.length > 0)
    {

        rouge(document.getElementById('passwd'),true);

        document.getElementById('mdp').innerHTML =  'Le mot de passe comporte au moins 6 caractères.';

        return false;
    }
    else
    {

        rouge(document.getElementById('passwd'),false);

        return true;
    }
}

function verifconnexion()
{
    var passwdOk=tchekpassword();
    var usernameOk=tchekusername();

    if (passwdOk && usernameOk)
    {
    return true;
    }
    else
    {
    return false;
    }

}




