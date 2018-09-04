// GLOBAL



function showMenu(){
	statusMenu = document.getElementById('hiddenStatusMenu');
	if(statusMenu.value==0){
		statusMenu.value=1;
		Effect.toggle('searchmenu','appear'); return false;
	}
}
function hideMenu(){
	statusMenu = document.getElementById('hiddenStatusMenu');
	if(statusMenu.value==1){
		statusMenu.value=0;
		Effect.toggle('searchmenu','appear'); return false;
	}
}
function idShowHide(obj) {
     var el = document.getElementById(obj);
     if ( el.style.display != "none" ) {
     el.style.display = 'none';
     } else {
     el.style.display = 'block';
     }
}
function clearKey(){
alert("asd");
document.getElementById('SearchKey').value='';
}
function ChangeDiv1(){
d = document.getElementById('contentwrapper');
// set the width
d.style.width="1070px";
}
function ChangeDiv2(){
d = document.getElementById('contentwrapper');
// set the width
d.style.width="850px";
}
// MEMBERS PAGE
function ChangeOption(Page) {
		document.getElementById('do').value=''+Page+'';
		document.profile.submit();
}
function ChangeOption2(Page) {
		document.getElementById('do2').value=''+Page+'';
		document.profile2.submit();
}
function ChangePage(Page) {
		document.getElementById('page').value=''+Page+'';
}
function ChangeSearchByASC(Page) {
	
	document.getElementById('orderBy').value=''+Page+'';
	if(document.getElementById('orderWay').value =="ASC"){
		document.getElementById('orderWay').value='DESC';
	}else {		
		document.getElementById('orderWay').value='ASC';
	}	
	document.profile.submit();
}

function ca(x){for(var j=1;j<=x;j++){box=eval("document.profile.d"+j);box.checked=true;}}
function ua(x){for(var j=1;j<=x;j++){box=eval("document.profile.d"+j);box.checked=false;}}
function ca2(x){for(var j=1;j<=x;j++){box=eval("document.profile2.d"+j);box.checked=true;}}
function ua2(x){for(var j=1;j<=x;j++){box=eval("document.profile2.d"+j);box.checked=false;}}

function CheckMemberForm(){
	if(document.getElementById( 'do' ).value != "none"){
		return true;
	}else{
		return false;
	}
}
function CheckMemberForm2(){
	if(document.getElementById( 'do2' ).value != "none"){
		return true;
	}else{
		return false;
	}
}
function ShowPass(){
	document.getElementById( 'epassword' ).disabled = false;
	document.getElementById( 'epassword' ).value = "";
	document.getElementById( 'epassword' ).style.backgroundColor = "red";
}
function ShowUp(){
	document.getElementById( 'upgradeEmail' ).disabled = false;
	document.getElementById( 'upgradeBill' ).disabled = false;
}
function ChangeNewsletter(nid) {
	document.getElementById('newsid').value=''+nid+'';
	document.news.submit();
}
function MakeAdult(Page) {
	document.getElementById('makeadult').value=''+Page+'';	
}
function NewpopUpWin(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open('inc/crop/crop.php?f='+URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 490,top = 200');");
}
function PreviewWin(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=500,left = 490,top = 200');");
}
function PreviewProfile(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=700,left = 490,top = 200');");
}
function SendEmails() {
	var V1 = document.getElementById( 'newid' ).value;
	var V2 = document.getElementById( 'status' ).value;
	var V3 = document.getElementById( 'option' ).value;
	var V4 = document.getElementById( 'packid' ).value;
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open('inc/pops/pop_email.php?newid='+V1+'&status='+V2+'&option='+V3+'&packid='+V4, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300,left = 490,top = 200');");
return false;
}
function SendSMS() {

	var V1 = document.getElementById( 'smsMessage' ).value;
	var V2 = document.getElementById( 'status' ).value;
	var V3 = document.getElementById( 'option' ).value;
	var V4 = document.getElementById( 'packid' ).value;
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open('inc/pops/pop_sms.php?newid='+V1+'&status='+V2+'&option='+V3+'&packid='+V4, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=300,left = 490,top = 200');");
return false;
}

// LIMIT FIELD 
var ns6=document.getElementById&&!document.all

function restrictinput(maxlength,e,placeholder){
if (window.event&&event.srcElement.value.length>=maxlength)
return false
else if (e.target&&e.target==eval(placeholder)&&e.target.value.length>=maxlength){
var pressedkey=/[a-zA-Z0-9\.\,\/]/ //detect alphanumeric keys
if (pressedkey.test(String.fromCharCode(e.which)))
e.stopPropagation()
}
}

function countlimit(maxlength,e,placeholder){
var theform=eval(placeholder)
var lengthleft=maxlength-theform.value.length
var placeholderobj=document.all? document.all[placeholder] : document.getElementById(placeholder)
if (window.event||e.target&&e.target==eval(placeholder)){
if (lengthleft<0)
theform.value=theform.value.substring(0,maxlength)
placeholderobj.innerHTML=lengthleft
}
}


function displaylimit(thename, theid, thelimit){
var theform=theid!=""? document.getElementById(theid) : thename
var limit_text='<b><span id="'+theform.toString()+'">'+thelimit+'</span></b> characters remaining on your input limit'
if (document.all||ns6)
document.write(limit_text)
if (document.all){
eval(theform).onkeypress=function(){ return restrictinput(thelimit,event,theform)}
eval(theform).onkeyup=function(){ countlimit(thelimit,event,theform)}
}
else if (ns6){
document.body.addEventListener('keypress', function(event) { restrictinput(thelimit,event,theform) }, true); 
document.body.addEventListener('keyup', function(event) { countlimit(thelimit,event,theform) }, true); 
}
}
