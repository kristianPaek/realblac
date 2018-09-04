<?php
/**
 * api: eMeeting Dating Software
 * title: AddThis
 * description: This plugin includes AddThis buttons to the footer section of your website (buttons for Facebook, Twitter, Pinterest)
 * type: functions
 * category: Social Plugins
 * author: eMeeting LLC
 * url: http://www.addthis.com/
 * license: eMeeting 9.0
 * config:
 * provides: AddThis
 * hooks: sidebar
 * version: 9.0
 * sort: 10
 * updated: August 28th 2012
 * 
 * This plugin allows you to add the AddThis buttons to your website quickly
 * and easily from within the plugins section of the dating software admin area.
 */
 
function AddThis_plugin() {

   global $AddThis;

   return '<br><center><table><tr><td><!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-503cd26b2996b85d"></script>
<!-- AddThis Button END --></td></tr></table></center><br>';
	
}

$PLUGINS_FOOTER .= AddThis_plugin();
	

?>