<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div class="TopLinks"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>

<p><?=$PageDesc ?></p>




<iframe src="https://www.facebook.com/plugins/registration.php?
client_id=<?=FACEBOOK_APP_ID ?>&amp;
redirect_uri=<?=DB_DOMAIN ?>mobile.php&amp;
fields=[
{'name':'name'},
{'name':'first_name'},
{'name':'last_name'},
{'name':'email'},
{'name':'location'},
{'name':'gender'},
{'name':'birthday'},
{'name':'username',%20%20%20%20%20%20'description':'Username',%20%20%20%20%20%20%20%20%20%20%20%20%20'type':'text'},
]" style="border: none" allowtransparency="true" frameborder="no" height="680" scrolling="auto" width="100%"></iframe>

 