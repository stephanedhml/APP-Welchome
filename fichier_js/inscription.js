/**
 * Created by marvin on 07/01/15.
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

function verifnom() {
    if (document.getElementById('home').value == "")
    {
        rouge(document.getElementById('home'), true);
        document.getElementById('nom').innerHTML = 'Ce champ n\'est pas remplit';
        return false;
    }

    else {
        rouge(document.getElementById('home'), false);
        return true;
    }
}
function verifusername()
{
    if(document.getElementById('username').value == "")
    {

        rouge(document.getElementById('username'),true);

        document.getElementById('user').innerHTML =  'Ce champ n\'est pas remplit';
        return false;
    }
    else
    {
        rouge(document.getElementById('username'),false);
        return true;
    }
}
function veriflieu()
{
    if(document.getElementById('land').value == "")
    {

        rouge(document.getElementById('land'),true);

        document.getElementById('lieu').innerHTML =  'Ce champ n\'est pas remplit';
        return false;
    }
    else
    {
        rouge(document.getElementById('land'),false);
        return true;
    }
}

function affichage(id,message)
{
    document.getElementById(id).innerHTML =  message;
    return true;
}

function verifpassword()
{

    if(document.getElementById('password').value == "")
    {

        rouge(document.getElementById('password'),true);

        document.getElementById('psd').innerHTML =  'Entrez votre mot de passe';
        return false;
    }
    else if(document.getElementById('password').value.length < 6 && document.getElementById('password').value.length > 0)
    {
        rouge(document.getElementById('password'),true);
        document.getElementById('psd').innerHTML =  'Le mot de passe comporte au moins 6 caractères.';
        return false;
    }
    else
    {

        rouge(document.getElementById('password'),false);

        return true;
    }
}

    function verifemail(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if (!regex.test(champ.value)) {
            rouge(champ, true);
            document.getElementById('mail').innerHTML =  'Cette email n\'est pas valide';
            return false;
        }
        else {
            rouge(champ, false);
            return true;
        }
    }

    function verifegalite(champ)
    {
    var psswd = document.getElementById('password') ;
    var psswd2 = document.getElementById('password2') ;

    if(psswd!=psswd2)
    {
        rouge(champ, true);
        document.getElementById('psd2').innerHTML =  'Les mots de passe ne correspondent pas';
        return false;
    }
    else
    {
        rouge(champ, false);
        return true;
    }
}


function verifinscription()
{
    var passwdOk=verifpassword();
    var usernameOk=verifusername();
    var nameOk=verifnom(document.getElementById('home'));
    var passwd2Ok=verifegalite();
    var emailOk=verifemail(document.getElementById('email'));
    var lieuOk=veriflieu();
    if (passwdOk && usernameOk && passwd2Ok && emailOk && nameOk && lieuOk)
    {
        return true;
    }

    else
    {

        return false;
    }


}




