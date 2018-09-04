<?php
/**
 * api: eMeeting Dating Software
 * title: Facebook Like
 * description: This plugin adds a Facebook like button to the footer section of your website 
 * type: functions
 * category: Social Plugins
 * author: eMeeting LLC
 * url: http://www.facebook.com/
 * license: eMeeting 9.0
 * config:
 * provides: Facebook-Like
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: August 28th 2012
 * 
 * This plugin allows you to add a Facebook like button to your website quickly
 * and easily from within the plugins section of the dating software admin area.
 */
 
function FBLike_plugin() {

   global $AddThis;

   return '<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
<br><center><div id="fb-root"></div>
<div class="fb-like" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div></center><br>';
	
}

$PLUGINS_FOOTER .= FBLike_plugin();
	

?>