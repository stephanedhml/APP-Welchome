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

function verifnom(champ) {
    if (champ.value == "")
    {
        rouge(champ, true);
        document.getElementById('namehome').innerHTML = 'Ce champ n\'est pas remplit';
        return false;
    }

    else {
        rouge(champ, false);
        return true;
    }
}

function mdp()
{
    document.getElementById('psd').innerHTML =  '6 caractères minimum';
    return true;
}
function nom()
{
    document.getElementById('namehome').innerHTML =  'Soyez inspiré';
    return true;
}

function ville()
{
    document.getElementById('lieu').innerHTML =  'La ville de préférence';
    return true;
}

function verifusername(champ)
{
    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('user').innerHTML =  'Ce champ n\'est pas remplit';
        return false;
    }
    else
    {
        rouge(champ,false);
        document.getElementById('user').innerHTML =  '';
        return true;
    }
}
function veriflieu(champ)
{
    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('lieu').innerHTML =  'Ce champ n\'est pas remplit';
        return false;
    }
    else
    {
        rouge(champ,false);
        document.getElementById('lieu').innerHTML =  '';
        return true;
    }
}


function verifpassword(champ)
{

    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('psd').innerHTML =  'Entrez votre mot de passe';
        return false;
    }
    else if(champ.value.length < 6 && champ.value.length > 0)
    {
        rouge(champ,true);
        document.getElementById('psd').innerHTML =  'Le mot de passe comporte au moins 6 caractères.';
        return false;
    }
    else
    {

        rouge(champ,false);

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
    var psswd = document.getElementsByName('password') ;
    var psswd2 = champ ;

    if(psswd !=psswd2)
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


function verifinscription(champ)
{
    var passwdOk=verifpassword(champ.password);
    var usernameOk=verifusername(champ.username);
    var nameOk=verifnom(champ.nom_maison);
    var passwd2Ok=verifegalite(champ.passverif);
    var emailOk=verifemail(champ.email);
    var lieuOk=veriflieu(champ.localisation);
    if (passwdOk && usernameOk && passwd2Ok && emailOk && nameOk && lieuOk)
    {
        return true;
    }

    else
    {

        return false;
    }


}
