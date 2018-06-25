function tijdKlik(nr)
{
    var tijdData = document.getElementById('tijdData');
    var tijdvar1 = document.getElementById('tijd1');
    var tijdvar2 = document.getElementById('tijd2');
    var tijdvar3 = document.getElementById('tijd3');
    var tijdvar4 = document.getElementById('tijd4');
    var tijdvar5 = document.getElementById('tijd5');
    var tijdvar6 = document.getElementById('tijd6');
    var tijdvar7 = document.getElementById('tijd7');
    var tijdvar8 = document.getElementById('tijd8');

    if (nr === 1) {
        tijdData.textContent = tijdvar1.textContent;
    }

    if (nr === 2) {
        tijdData.textContent = tijdvar2.textContent;
    }

    if (nr === 3) {
        tijdData.textContent = tijdvar3.textContent;
    }

    if (nr === 4) {
        tijdData.textContent = tijdvar4.textContent;
    }

    if (nr === 5) {
        tijdData.textContent = tijdvar5.textContent;
    }

    if (nr === 6) {
        tijdData.textContent = tijdvar6.textContent;
    }

    if (nr === 7) {
        tijdData.textContent = tijdvar7.textContent;
    }

    if (nr === 8) {
        tijdData.textContent = tijdvar8.textContent;
    }
}