<?php
/**
 * api: eMeeting Dating Software
 * title: ShareThis
 * description: This plugin includes ShareThis buttons to the footer section of your website (buttons for Facebook, Twitter, LinkedIn, Google Plus)
 * type: functions
 * category: Social Plugins
 * author: eMeeting LLC
 * url: http://www.sharethis.com/
 * license: eMeeting 9.0
 * config:
 * provides: ShareThis
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: August 28th 2012
 * 
 * This plugin allows you to add google analytics code to your website quickly
 * and easily from within the plugins section of the dating software admin area.
 */
 
function ShareThis_plugin() {

   global $ShareThis;

   return "<br><center><span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_googleplus_large' displayText='Google +'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_email_large' displayText='Email'></span>
<span class='st_sharethis_large' displayText='ShareThis'></span></center><br>";
	
}

$HEADER_META_BASE .= '<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-d10210d9-8fe5-74e3-a256-be0ee7faa99b"}); </script>';

$PLUGINS_FOOTER .= ShareThis_plugin();
	

?>