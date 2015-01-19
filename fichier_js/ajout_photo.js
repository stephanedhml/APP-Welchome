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
function veriphoto2()
{
    if(document.getElementById('p11').value == '')
    {
        alert('Uploadez d\'abord la photo 1');
        return false;
    }
    else
    {
        document.getElementById('ph11').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';
        return true;
    }
}
function veriphoto3()
{
    if(document.getElementById('p12').value == '')
    {
        alert('Uploadez d\'abord la photo 2');
        return false;
    }
    else
    {
        document.getElementById('ph12').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';
        return true;
    }
}
function veriphoto4()
{
    if(document.getElementById('p13').value == '')
    {
        alert('Uploadez d\'abord la photo 3');
        return false;
    }
    else
    {
        document.getElementById('ph13').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';
        return true;
    }
}function photo4()
{
    if(document.getElementById('p14').value == '')
    {
        alert('Uploadez d\'abord la photo 4');
        return false;
    }
    else
    {
        document.getElementById('ph14').innerHTML = ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';
        return true;
    }
}