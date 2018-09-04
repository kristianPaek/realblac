// JavaScript Document

var xmlHttp;

function GetXmlHttpObject()
{
	var xmlHttp=null;
	try {	 xmlHttp=new XMLHttpRequest();	 }

	catch (e) {

	 try  {	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");	  }
	 catch (e)  {	  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");	  }
 }
	return xmlHttp;
}

function showUserList()
{ 

	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null){
		 alert ("Browser does not support HTTP Request. Please Update your browser.");
		 return;
	 }

	// get the list of users
	var url="inc/imList.php";
	//url=url+"?sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

}

function stateChanged() 
{ 

 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 

 document.getElementById("IMLIST").innerHTML=xmlHttp.responseText;
//alert(document.getElementById('IMLIST').innerHTML.indexOf("npm__3a65x__x806g"));

 if (document.getElementById('IMLIST').innerHTML.indexOf("npm__3a65x__x806g")!=-1)
 {

 	 window.frames["pm"].location.href='inc/imRequest.php';

 } 

 setTimeout('showUserList();',10000); // refresh rate

 } 

}


function privChat(URL) {
	day = new Date();
	id = day.getTime();
	eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=650,height=530,left=212,top=134');");
}