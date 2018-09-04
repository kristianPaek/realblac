// JavaScript Document
var countDownInterval=30;
//configure width of displayed text, in px (applicable only in NS4)
var c_reloadwidth=200

var countDownTime=countDownInterval+1;
function countDown(){
countDownTime--;
if (countDownTime <=0){
countDownTime=countDownInterval;
clearTimeout(counter)
window.location.reload()
return
}
if (document.all) //if IE 4+
document.all.countDownText.innerText = countDownTime+" ";
else if (document.getElementById) //else if NS6+
document.getElementById("countDownText").innerHTML=countDownTime+" "
else if (document.layers){ //CHANGE TEXT BELOW TO YOUR OWN
document.c_reload.document.c_reload2.document.write('Updating <b id="countDownText">'+countDownTime+' </b>')
document.c_reload.document.c_reload2.document.close()
}
counter=setTimeout("countDown()", 1000);
}

function startit(){
if (document.all||document.getElementById) //CHANGE TEXT BELOW TO YOUR OWN
document.write('Updating <b id="countDownText">'+countDownTime+' </b>');
countDown();
}

if (document.all||document.getElementById)
startit()
else
window.onload=startit