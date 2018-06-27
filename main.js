function showfloor(nr)
{   
    //variabelen
    var floor1p = document.getElementById('floor1p');
    var floor2p = document.getElementById('floor2p');
    var floor3p = document.getElementById('floor3p');

    var floor1 = document.getElementById('floor1');
    var floor2 = document.getElementById('floor2');
    var floor3 = document.getElementById('floor3');

    var onefloorone = document.getElementById('onefloorone');
    var twofloorone = document.getElementById('twofloorone');
    var twofloortwo = document.getElementById('twofloortwo');
    var threefloorone = document.getElementById('threefloorone');
    var threefloortwo = document.getElementById('threefloortwo');
    var threefloorthree = document.getElementById('threefloorthree');

    //als de verdieping 1 is:
    if(nr === 1)
    {   
        //laat etage 1 zien
        floor1p.style.display = 'initial';
        floor2p.style.display = 'none';
        floor3p.style.display = 'none';

        //verander kleuren
        floor1.style.backgroundColor = 'grey';
        floor2.style.backgroundColor = 'white';
        floor3.style.backgroundColor = 'white';

        onefloorone.style.backgroundColor = 'yellow';
        twofloorone.style.backgroundColor = 'white';
        twofloortwo.style.backgroundColor = 'white';
        threefloorone.style.backgroundColor = 'white';
        threefloortwo.style.backgroundColor = 'white';
        threefloorthree.style.backgroundColor = 'white';
    }

    //als de verdieping 2 is:
    if(nr === 2)
    {   
        //laat etage 2 zien
        floor1p.style.display = 'none';
        floor2p.style.display = 'initial';
        floor3p.style.display = 'none';

        //verander kleuren
        floor1.style.backgroundColor = 'white';
        floor2.style.backgroundColor = 'grey';
        floor3.style.backgroundColor = 'white';

        onefloorone.style.backgroundColor = 'white';
        twofloorone.style.backgroundColor = 'yellow';
        twofloortwo.style.backgroundColor = 'yellow';
        threefloorone.style.backgroundColor = 'white';
        threefloortwo.style.backgroundColor = 'white';
        threefloorthree.style.backgroundColor = 'white';
    }

    //als de verdieping 3 is:
    if(nr === 3)
    {   
        //laat etage 3 zien
        floor1p.style.display = 'none';
        floor2p.style.display = 'none';
        floor3p.style.display = 'initial';


        //verander kleuren
        floor1.style.backgroundColor = 'white';
        floor2.style.backgroundColor = 'white';
        floor3.style.backgroundColor = 'grey';

        onefloorone.style.backgroundColor = 'white';
        twofloorone.style.backgroundColor = 'white';
        twofloortwo.style.backgroundColor = 'white';
        threefloorone.style.backgroundColor = 'yellow';
        threefloortwo.style.backgroundColor = 'yellow';
        threefloorthree.style.backgroundColor = 'yellow';
    }
}

var request = new XMLHttpRequest();

function showtimezajax(){

    //variabelen
    var datebox = document.getElementById("datum");
    var datetext = datebox.value;
    var datedate = datetext.split("-");
    if(datedate[0].length === 4 && datedate[1].length === 2 && datedate[2].length === 2)
    {
        var namebox = document.getElementById("roomname");
        var nametext = namebox.textContent;

        var timebuttons = document.getElementById("timebuttons");
        timebuttons.style.display = 'initial';

        var time1 = document.getElementById('time1');
        var time2 = document.getElementById('time2');
        var time3 = document.getElementById('time3');
        var time4 = document.getElementById('time4');
        var time5 = document.getElementById('time5');
        var time6 = document.getElementById('time6');
        var time7 = document.getElementById('time7');
        var time8 = document.getElementById('time8');
        
        request.onreadystatechange = handleTimezAjax;

        request.open('GET', 'gettimes.php?date='+datetext+'&room='+nametext, true);
        request.send();
    }
}

function handleTimezAjax()
{
    if(request.readyState === XMLHttpRequest.DONE)
    {
        if(request.status === 200)
        {
                var result = request.responseText;
                var resultarray = result.split(",");
                resultarray.forEach(function(element) 
                {   
                    
                    //als element "tijd" is, verander de achtergrondkleur 
                    if(element == "9:00-10:00")
                    {
                        time1.style.backgroundColor = 'red';
                    }
                    if(element == "10:00-11:00")
                    {
                        time2.style.backgroundColor = 'red';
                    }
                    if(element == "11:00-12:00")
                    {
                        time3.style.backgroundColor = 'red';
                    }
                    if(element == "12:00-13:00")
                    {
                        time4.style.backgroundColor = 'red';
                    }
                    if(element == "13:00-14:00")
                    {
                        time5.style.backgroundColor = 'red';
                    }
                    if(element == "14:00-15:00")
                    {
                        time6.style.backgroundColor = 'red';
                    }
                    if(element == "15:00-16:00")
                    {
                        time7.style.backgroundColor = 'red';
                    }
                    if(element == "16:00-17:00")
                    {
                        time8.style.backgroundColor = 'red';
                    }
                });

        }
        else{}       
    }
    else{}
}

function reserveajax(package)
{
    request.onreadystatechange = handleReserveAjax;

    request.open('GET', 'reserveer.php'+package, true);
    request.send(); 
}

function handleReserveAjax()
{
    if(request.readyState === XMLHttpRequest.DONE)
    {
        if(request.status === 200)
        {
            var failpasstextbox = document.getElementById("failpasstext");
            if(request.responseText != "nope")
            {
                failpasstextbox.textContent = "Succesvol gereserveerd!";              
            }
            else
            {
                failpasstextbox.textContent = "Niet succesvol gereserveerd!"; 
            }
            openPopup();
        }
        else{}       
    }
    else{}
}

function roomajax(room)
{
    var detailstab = document.getElementById('details');
    detailstab.style.visibility = 'visible';
    request.onreadystatechange = handleRoomAjax;

    request.open('GET', 'getroom.php?roomname='+room, true);
    request.send();
}

function handleRoomAjax()
{
    if(request.readyState === XMLHttpRequest.DONE)
    {
        if(request.status === 200)
        {   
            //variabelen
            var result = request.responseText;
            var resultarray = result.split(",");
            var resultname = document.getElementById("roomname");
            var resultstoel = document.getElementById("stoelData");
            var resulttafel = document.getElementById("tafelData");
            var resultstop = document.getElementById("stopData");
            var resultbeam = document.getElementById("beamData");

            //verander de textcontent
            resultname.textContent = resultarray[0];
            resultstoel.textContent = resultarray[1];
            resulttafel.textContent = resultarray[2];
            resultstop.textContent = resultarray[3];
            resultbeam.textContent = resultarray[4];
        }
        else{}       
    }
    else{}
}

function timeonclick(time){
    //variabelen
    var time1 = document.getElementById('time1');
    var time2 = document.getElementById('time2');
    var time3 = document.getElementById('time3');
    var time4 = document.getElementById('time4');
    var time5 = document.getElementById('time5');
    var time6 = document.getElementById('time6');
    var time7 = document.getElementById('time7');
    var time8 = document.getElementById('time8');

    if(time1.style.backgroundColor === 'yellow'){
        time1.style.backgroundColor = 'white';
    }

    if(time2.style.backgroundColor == 'yellow'){
        time2.style.backgroundColor = 'white';
    }
    
    if(time3.style.backgroundColor == 'yellow'){
        time3.style.backgroundColor = 'white';
    }

    if(time4.style.backgroundColor == 'yellow'){
        time4.style.backgroundColor = 'white';
    }

    if(time5.style.backgroundColor == 'yellow'){
        time5.style.backgroundColor = 'white';
    }

    if(time6.style.backgroundColor == 'yellow'){
        time6.style.backgroundColor = 'white';
    }

    if(time7.style.backgroundColor == 'yellow'){
        time7.style.backgroundColor = 'white';
    }

    if(time8.style.backgroundColor == 'yellow'){
        time8.style.backgroundColor = 'white';
    }

    if(time == 1 && time1.style.backgroundColor != 'red'){
        time1.style.backgroundColor = 'yellow';
    }

    if(time == 2 && time2.style.backgroundColor != 'red'){
        time2.style.backgroundColor = 'yellow';
    }

    if(time == 3 && time3.style.backgroundColor != 'red'){
        time3.style.backgroundColor = 'yellow';
    }

    if(time == 4 && time4.style.backgroundColor != 'red'){
        time4.style.backgroundColor = 'yellow';
    }

    if(time == 5 && time5.style.backgroundColor != 'red'){
        time5.style.backgroundColor = 'yellow';
    }

    if(time == 6 && time6.style.backgroundColor != 'red'){
        time6.style.backgroundColor = 'yellow';
    }

    if(time == 7 && time7.style.backgroundColor != 'red'){
        time7.style.backgroundColor = 'yellow';
    }

    if(time == 8 && time8.style.backgroundColor != 'red'){
        time8.style.backgroundColor = 'yellow';
    }
}

function loggingout(iets)
{
    request.onreadystatechange = handlelogoutajax;

    request.open('GET', 'logout.php?id='+iets, true);
    request.send();
}

function handlelogoutajax()
{
    if(request.readyState === XMLHttpRequest.DONE)
    {
        if(request.status === 200)
        {   
            window.location.href = 'login.html';
        }
    }
}

function reserve()
{
    var data = sendres();
    reserveajax(data);
}

function sendres()
{
    //variabelen
    var user = document.getElementById("usernameText");
    var usertext = user.textContent;
    var datebox = document.getElementById("datum");
    var datetext = datebox.value;
    
    var time;
    var time1 = document.getElementById('time1');
    var time2 = document.getElementById('time2');
    var time3 = document.getElementById('time3');
    var time4 = document.getElementById('time4');
    var time5 = document.getElementById('time5');
    var time6 = document.getElementById('time6');
    var time7 = document.getElementById('time7');
    var time8 = document.getElementById('time8');
    
    //verander kleur als er op geklikt is
    if(time1.style.backgroundColor == "yellow"){
        time = "9:00-10:00"
    }
    else if(time2.style.backgroundColor == "yellow"){
        time = "10:00-11:00"
    }
    else if(time3.style.backgroundColor == "yellow"){
        time = "11:00-12:00"
    }
    else if(time4.style.backgroundColor == "yellow"){
        time = "12:00-13:00"
    }
    else if(time5.style.backgroundColor == "yellow"){
        time = "13:00-14:00"
    }
    else if(time6.style.backgroundColor == "yellow"){
        time = "14:00-15:00"
    }
    else if(time7.style.backgroundColor == "yellow"){
        time = "15:00-16:00"
    }
    else if(time8.style.backgroundColor == "yellow"){
        time = "16:00-17:00"
    }

    var namebox = document.getElementById("roomname");
    var nametext = namebox.textContent;
    var package = "?room="+nametext+"&datum="+datetext+"&gebruiker="+usertext+"&tijd="+time;
    return package;
}