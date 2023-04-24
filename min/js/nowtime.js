//[ 追記 ]
//phpのdate関数に変更したため不必要。
function set2fig(num) {
    // 桁数が1桁だったら先頭に0を加えて2桁に調整する
    var ret;
    if( num < 10 ) { ret = "0" + num; }
    else { ret = num; }
    return ret;
 }
 function showClock2() {
    var nowTime = new Date();
    var nowHour = set2fig( nowTime.getHours() );
    var nowMin  = set2fig( nowTime.getMinutes() );
    var nowSec  = set2fig( nowTime.getSeconds() );
    var msg = "現在時刻は、" + nowHour + ":" + nowMin + ":" + nowSec + " です。";
    document.getElementById("RealtimeClockArea2").innerHTML = msg;
 }
 setInterval('showClock2()',1000);
 
//以下のサイトを参考にさせていただきました。
//https://www.nishishi.com/javascript-tips/realtime-clock-setinterval.html