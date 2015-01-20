
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
        document.getElementById('mdp').innerHTML =  '';

        return true;
    }
}
function tchekusername(champ)
{
    if(champ.value == "")
    {

        rouge(champ,true);


        document.getElementById('user').innerHTML =  '';

        return false;
    }
    else
    {
        rouge(champ,false);
        document.getElementById('user').innerHTML =  '';

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

function notifyMe()
{
    // Voyons si le navigateur supporte les notifications
    if (!('Notification' in window)) {
        alert("Ce navigateur ne supporte pas les notifications desktop");
    }

    // Voyons si l'utilisateur est OK pour recevoir des notifications
    else if (Notification.permission === 'granted') {
        // Si c'est ok, créons une notification
        var notification = new Notification('Vous êtes bien connecté.');
    }

    // Sinon, nous avons besoin de la permission de l'utilisateur
    // Note : Chrome n'implémente pas la propriété statique permission
    // Donc, nous devons vérifier s'il n'y a pas 'denied' à la place de 'default'
    else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {

            // Quelque soit la réponse de l'utilisateur, nous nous assurons de stocker cette information
            if(!('permission' in Notification)) {
                Notification.permission = permission;
            }

            // Si l'utilisateur est OK, on crée une notification
            if (permission === 'granted') {
                var notification = new Notification('Vous êtes bien connecté');
            }
        });
    }

    // Comme ça, si l'utlisateur a refusé toute notification, et que vous respectez ce choix,
    // il n'y a pas besoin de l'ennuyer à nouveau.
}

function deconnect()
{
   if(confirm('Êtes vous certain de vouloir vous déconnecter ?'))
   {
       return true;
   }
    else
   {
       return false;
   }
}


