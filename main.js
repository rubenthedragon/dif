function showfloor(nr)
{
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

    if(nr === 1)
    {
        floor1p.style.display = 'initial';
        floor2p.style.display = 'none';
        floor3p.style.display = 'none';

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

    if(nr === 2)
    {
        floor1p.style.display = 'none';
        floor2p.style.display = 'initial';
        floor3p.style.display = 'none';

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

    if(nr === 3)
    {
        floor1p.style.display = 'none';
        floor2p.style.display = 'none';
        floor3p.style.display = 'initial';

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
    var datebox = document.getElementById("datum");
    var datetext = datebox.value;
    var namebox = document.getElementById("roomname");
    var nametext = namebox.textContent;

    var timebuttons = document.getElementById("timebuttons");
    timebuttons.style.display = 'initial';

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

            var result = request.responseText;
            var resultarray = result.split(",");
            resultarray.forEach(function(element) 
            {
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
            var result = request.responseText;
            var resultarray = result.split(",");
            var resultname = document.getElementById("roomname");
            var resultstoel = document.getElementById("stoelData");
            var resulttafel = document.getElementById("tafelData");
            var resultstop = document.getElementById("stopData");
            var resultbeam = document.getElementById("beamData");

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
    var time1 = document.getElementById('time1');
    var time2 = document.getElementById('time2');
    var time3 = document.getElementById('time3');
    var time4 = document.getElementById('time4');
    var time5 = document.getElementById('time5');
    var time6 = document.getElementById('time6');
    var time7 = document.getElementById('time7');
    var time8 = document.getElementById('time8');

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