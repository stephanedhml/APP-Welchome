/**
 * Created by marvin on 07/01/15.
 */
function surligne(champ, erreur)
{
    if(erreur)
        champ.style.backgroundColor = "#fba";
    else
        champ.style.backgroundColor = "";
}
function verifPseudo(champ)
{
    if(champ.value.length < 2 || champ.value.length > 25)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}function verifPassword(champ)
{
    if(champ.value.length < 6)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}
function verifForm(f)
{
    var pseudoOk = verifPseudo(f.username);
    var passwordOk = verifPassword(f.password);
    var a;

    if(pseudoOk && passwordOk)
    {
        a = true;
    }

    else
    {
        alert("Veuillez remplir correctement tous les champs");
        a= false;
    }
    return a;
}