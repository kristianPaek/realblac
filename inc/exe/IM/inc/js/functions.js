// Constants for XmlHttp status

function AjaxRequest()
{
	this.mRequest = this.getHttpRequest();
	this.mHandlers = new Array();

	// Need to assign 'this' to a variable so we can put it into the anonymous function
	
	var self = this;
	
	this.mRequest.onreadystatechange = function()
	{
		if(	self.mHandlers[ self.mRequest.readyState ] != undefined )
		{
			for( i = 0 ; i < self.mHandlers[ self.mRequest.readyState ].length ; i++ )
			{
				self.mHandlers[ self.mRequest.readyState ][ i ]( self );				
			}
		}
	}
}

AjaxRequest.prototype.addEventListener = function( pEventType, pFunction )
{
	if(	this.mHandlers[ pEventType ] == undefined )
	{
		this.mHandlers[ pEventType ] = new Array();
	}
	
	this.mHandlers[ pEventType ].push( pFunction );
}

AjaxRequest.prototype.getHttpRequest = function()
{
	// List of Microsoft XMLHTTP versions - newest first

	var MSXML_XMLHTTP_PROGIDS = new Array
	(
		'MSXML2.XMLHTTP.5.0',
		'MSXML2.XMLHTTP.4.0',
		'MSXML2.XMLHTTP.3.0',
		'MSXML2.XMLHTTP',
		'Microsoft.XMLHTTP'
	);

	// Do we support the request natively (eg, Mozilla, Opera, Safari, Konqueror)

	if( window.XMLHttpRequest != null )
	{
		return new XMLHttpRequest();
	}
	else
	{
		// Look for a supported IE version

		for( i = 0 ; MSXML_XMLHTTP_PROGIDS.length > i ; i++ )
		{
			try
			{
				return new ActiveXObject( MSXML_XMLHTTP_PROGIDS[ i ] );
			}
			catch( e )
			{
			}
		}
	}
	
	return( null );
}
////////////////////////////////////
//// WRITTEN BY MARK FAIL /////////
///////////////////////////////////
function ReloadGallery( fileName, div )
{
	var Ajax = new AjaxRequest();

	if( Ajax.mRequest )
	{				
		Ajax.mFileName 	= fileName;		
		var obj = document.getElementById(div);				

		Ajax.mRequest.open( "GET", fileName);
		Ajax.mRequest.onreadystatechange = function() {
			if(Ajax.mRequest.readyState == 4 && Ajax.mRequest.status == 200){
				obj.innerHTML = Ajax.mRequest.responseText;
			}
		}		
	}
	Ajax.mRequest.send( null );
}
function updateStats(){
 document.getElementById("content").innerHTML = "<div style='height: 180px'> <img src='../../images/DEFAULT/load_red.gif' width='16' height='16'></div>";
 setTimeout ('ReloadGallery("tmp_display.php","content")', 1000);
 //setTimeout ('ReloadGallery("tmp_form.php","foot")', 1000);
}
function say(theform){
	updateStats();	
	theform.submit();
	document.getElementById( 'msgbox' ).value = "";
}
function reloadme(){
	ReloadGallery("tmp_display.php","content");
	setTimeout("long_delay()",5000);
}
function delay_reload(){
    var timer=setTimeout("reloadme()",5000);
}
function long_delay(){
	setTimeout("delay_reload()",5000);
}