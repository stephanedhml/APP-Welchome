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
        document.getElementById('namehome').innerHTML = ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';
        return false;
    }

    else {
        rouge(champ, false);
        document.getElementById('namehome').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';

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
    document.getElementById('namehome').innerHTML =  '  Soyez inspiré';
    return true;
}

function ville()
{
    document.getElementById('lieu').innerHTML =  '  La ville de préférence';
    return true;
}

function verifusername(champ)
{
    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('user').innerHTML =  ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';
        return false;
    }
    else
    {
        rouge(champ,false);
        document.getElementById('user').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';

        return true;
    }
}
function veriflieu(champ)
{
    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('lieu').innerHTML =  ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';
        return false;
    }
    else
    {
        rouge(champ,false);
        document.getElementById('lieu').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';

        return true;
    }
}


function verifpassword(champ)
{

    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('psd').innerHTML =  ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';

        return false;
    }
    else if(champ.value.length < 6 && champ.value.length > 0)
    {
        rouge(champ,true);
        document.getElementById('psd').innerHTML =  ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';
        return false;
    }
    else
    {

        rouge(champ,false);
        document.getElementById('psd').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';

        return true;
    }
}

    function verifemail(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if (!regex.test(champ.value)) {
            rouge(champ, true);
            document.getElementById('mail').innerHTML =  ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';
            return false;
        }
        else {
            rouge(champ, false);
            document.getElementById('mail').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';

            return true;
        }
    }
function exi()
{
        document.getElementById('uuu').focus();
}

    function verifegalite(c)
    {
    var psswd = document.getElementById('paw').value ;
    var psswd2 = c.value ;

    if(psswd != psswd2 || psswd == '' )
    {
        rouge(c, true);
        document.getElementById('psd2').innerHTML =  ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png">';
        return false;
    }

    else
    {

        rouge(c, false);
        document.getElementById('psd2').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';


        return true;
    }
}
function check(){
    if(document.getElementById('cond').checked == true)
    {
       return true;
    }
    else{
        alert('Vous devez lire et accepter les conditions générales d’utilisation de Welchome.');
        return false;
    }
}

function verifinscription(champ)
{
    var passwdOk=verifpassword(champ.password);
    var usernameOk=verifusername(champ.username);
    var checkOk=check();
    var nameOk=verifnom(champ.nom_maison);
    var passwd2Ok=verifegalite(champ.passverif);
    var emailOk=verifemail(champ.email);
    var lieuOk=veriflieu(champ.localisation);
    if (passwdOk && usernameOk && passwd2Ok && emailOk && nameOk && lieuOk && checkOk)
    {
        return true;
    }

    else
    {

        return false;
    }


}
