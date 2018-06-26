function startTime() {
    var dag = new Date();
    var uur = dag.getHours();
    var minuten = dag.getMinutes();
    var seconden = dag.getSeconds();
    minuten = checkTime(minuten);
    seconden = checkTime(seconden);
    document.getElementById('tijd').innerHTML = uur + ":" + minuten + ":" + seconden;
    var tijd = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // 0 voor cijfers lager dan 10
    return i;
}