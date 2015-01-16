/**
 * Created by marvin on 13/01/15.
 */

function verifphoto2()
{
    if(document.getElementById('p1').value == '')
    {
        alert('Uploadez d\'abord la photo 1');
        return false;
    }
    else
    {

        return true;
    }
}
function verifphoto3()
{
    if(document.getElementById('p2').value == '')
    {
        alert('Uploadez d\'abord la photo 2');
        return false;
    }
    else
    {
        return true;
    }
}
function verifphoto4()
{
    if(document.getElementById('p3').value == '')
    {
        alert('Uploadez d\'abord la photo 3');
        return false;
    }
    else
    {

        return true;
    }
}