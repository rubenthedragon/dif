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

    time1.style.backgroundColor = 'white';
    time1.onclick = "timeonclick(1)";
    time2.style.backgroundColor = 'white';
    time2.onclick = "timeonclick(2)";
    time3.style.backgroundColor = 'white';
    time3.onclick = "timeonclick(3)";
    time4.style.backgroundColor = 'white';
    time4.onclick = "timeonclick(4)";
    time5.style.backgroundColor = 'white';
    time5.onclick = "timeonclick(5)";
    time6.style.backgroundColor = 'white';
    time6.onclick = "timeonclick(6)";
    time7.style.backgroundColor = 'white';
    time7.onclick = "timeonclick(7)";
    time8.style.backgroundColor = 'white';
    time8.onclick = "timeonclick(8)";
    
    request.onreadystatechange = handleTimezAjax;

    request.open('GET', 'gettimes.php?date='+datetext+'&room='+nametext, true);
    request.send();
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
                        time1.onclick = "";
                    }
                    if(element == "10:00-11:00")
                    {
                        time2.style.backgroundColor = 'red';
                        time2.onclick = "";
                    }
                    if(element == "11:00-12:00")
                    {
                        time3.style.backgroundColor = 'red';
                        time3.onclick = "";
                    }
                    if(element == "12:00-13:00")
                    {
                        time4.style.backgroundColor = 'red';
                        time4.onclick = "";
                    }
                    if(element == "13:00-14:00")
                    {
                        time5.style.backgroundColor = 'red';
                        time5.onclick = "";
                    }
                    if(element == "14:00-15:00")
                    {
                        time6.style.backgroundColor = 'red';
                        time6.onclick = "";
                    }
                    if(element == "15:00-16:00")
                    {
                        time7.style.backgroundColor = 'red';
                        time7.onclick = "";
                    }
                    if(element == "16:00-17:00")
                    {
                        time8.style.backgroundColor = 'red';
                        time8.onclick = "";
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
            console.log(request);
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

    //als time 1 is verander achtergrond kleur
    if(time === 1){
        time1.style.backgroundColor = 'yellow';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'white';
    }

    //als time 2 is verander achtergrond kleur
    if(time === 2){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'yellow';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'white';
    }

    //als time 3 is verander achtergrond kleur
    if(time === 3){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'yellow';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'white';
    }

    //als time 4 is verander achtergrond kleur
    if(time === 4){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'yellow';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'white';
    }

    //als time 5 is verander achtergrond kleur
    if(time === 5){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'yellow';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'white';
    }

    //als time 6 is verander achtergrond kleur
    if(time === 6){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'yellow';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'white';
    }

    //als time 7 is verander achtergrond kleur
    if(time === 7){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'yellow';
        time8.style.backgroundColor = 'white';
    }

    //als time 8 is verander achtergrond kleur
    if(time === 8){
        time1.style.backgroundColor = 'white';
        time2.style.backgroundColor = 'white';
        time3.style.backgroundColor = 'white';
        time4.style.backgroundColor = 'white';
        time5.style.backgroundColor = 'white';
        time6.style.backgroundColor = 'white';
        time7.style.backgroundColor = 'white';
        time8.style.backgroundColor = 'yellow';
    }
}