// JavaScript Document

function openQuickAdmin() {
	new Lightbox.base('QuickBox3');
}
function openQuickChat(id,name,photo) {

	document.getElementById('MsgIDStore').value=id;
	document.getElementById('MsgNameHere').innerHTML =name;
	document.getElementById('MsgImPhoto').innerHTML ="<img src='"+photo+"' width='48' height='48' align='absmiddle'>";		
	new Lightbox.base('QuickBox1');

}


function openQuickWink(id,name,photo) {
 
	document.getElementById('SendWinkStore').value=id;
	document.getElementById('SendWinkStoreUsername').value=name;
	document.getElementById('WinkNameHere').innerHTML =name;
	document.getElementById('WinkImPhoto').innerHTML ="<img src='"+photo+"' width='48' height='48' align='absmiddle'>";
	document.getElementById('WinkIDError').innerHTML=" ";  
	
	new Lightbox.base('QuickBox2');
}


function checkWink(error){

	if(document.getElementById('SendWinkStore').value != 0){

		document.getElementById('WinkIDError').innerHTML='Sending Wink..'; 
		SearchSendWink(document.getElementById('SendWinkStore').value, document.getElementById('SendWinkStoreUsername').value,document.getElementById('winkmsg').value);
		document.getElementById('WinkIDError').innerHTML=error;  
		//new Lightbox.base('QuickBox2', { externalControl : 'cancel_link' }); 
		return false;
		

	}
}


function checkContact(error){
 
	if(document.getElementById('ImSendMessage').value ==""){

			document.getElementById('MsgIDError').innerHTML='Please Enter a message'; 			
			 new Effect.Shake('contact-form');
			 return false;
		} 

		if(document.getElementById('MsgIDStore').value != 0){
			Acc_SendMessage(document.getElementById('MsgIDStore').value, document.getElementById('ImSendMessage').value);			
			document.getElementById('MsgIDError').innerHTML=error;   	
			document.getElementById('ImSendMessage').value ="";	
			return false;
		}
}