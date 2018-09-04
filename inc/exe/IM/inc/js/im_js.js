window.resizeTo(250,500);
function NoResize(){ window.resizeTo(250,500);}

// JavaScript Document
function doSound(playSound){

	var flashvars = {};
	flashvars.sndfilename = playSound;
	var params = {};
	params.play = "true";
	params.loop = "false";
	params.menu = "false";
	params.scale = "noscale";
	params.wmode = "transparent";
	var attributes = {};
	attributes.align = "top";
	swfobject.embedSWF("playSnd.swf", "playSndDiv", "100%", "100%", "9.0.0", "expressInstall.swf", flashvars, params, attributes);

}