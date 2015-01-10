
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
 function tchekpassword(champ)
{

    if(champ.value == "")
    {

        rouge(champ,true);

        document.getElementById('mdp').innerHTML =  'Entrez votre mot de passe';

        return false;
    }
    else if(champ.value.length < 6 && champ.value.length > 0)
    {

        rouge(champ,true);

        document.getElementById('mdp').innerHTML =  'Le mot de passe comporte au moins 6 caractères.';

        return false;
    }
    else
    {

        rouge(champ,false);
        document.getElementById('mdp').innerHTML =  'C\'est bon.';

        return true;
    }
}
function tchekusername(champ)
{
    if(champ.value == "")
    {

        rouge(champ,true);


        document.getElementById('user').innerHTML =  'Entrez votre username';

        return false;
    }
    else
    {
        rouge(champ,false);

        return true;
    }
}
function mdp()
{
    document.getElementById('mdp').innerHTML =  '6 caractères minimum';
    return true;
}


function verifconnexion(f)
{
    var passwdOk=tchekpassword(f.password);
    var usernameOk=tchekusername(f.username);

    if (passwdOk && usernameOk)
    {
        return true;
    }
    else
    {
        return false;
    }

}





