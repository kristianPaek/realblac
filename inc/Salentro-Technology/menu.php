<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

if(!isset($HEADER_SINGLE_COLUMN)){ ?></div><div class="clear"></div> <? }else{ print "</div>"; }?>
</div><div id="main_wrapper_bottom"></div></div>
<div id="side" style="float:right">
<div id="side_box">
<?php e_sidebar() ?>

<? if($_SESSION['auth'] =="yes" && isset($SaveSearchData[1]) && is_array($SaveSearchData) ){ ?>
<div class="menu_box_title">
<span><a onclick="new Effect.toggle('s1','blind', {queue: 'end'}); "> <img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_expand"></a></span>
		<?=$LANG_ERROR['_t13'] ?>
</div>		
<div class="menu_box_body" id="s14">
<table width="100%"  border="0">  <?=MakeSavedSearched($SaveSearchData) ?> </table>
</div>
<? } ?>
<? if($_SESSION['auth'] =="no" && $page !="login" && !isset($GLOBALS['MENU_AFFILIATE'])){ 

/**
* Info: Show the login box 
* 		
* @version  9.0
* @created  Fri Sep 25 10:48:31 EEST 2008
* @updated  Fri Sep 25 10:48:31 EEST 2008
*/

?>
<div class="menu_box_title"><span><a onclick="new Effect.toggle('s1','blind', {queue: 'end'}); "><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_expand"></a></span><?=$GLOBALS['_LANG']['_login'] ?></div>
<div class="menu_box_body" id="s1">
<form method="post" action="<?=DB_DOMAIN ?>index.php" name="MenuLoginForm">
<input name="do" type="hidden" value="login" class="hidden" />
<input name="visible" value="0" type="hidden" />
<input name="do_page" type="hidden" value="login" class="hidden" />
<table width="100%"  border="0" class="menu_side"><tr>
<td width="29%"><?=$GLOBALS['_LANG']['_username'] ?></td>
</tr><tr>
<td><input name="username" id="username" type="text" size="22" <? if(isset($_COOKIE['emeeting']['username'])){ print "value='".$_COOKIE['emeeting']['username']."'"; } ?> class="input" style="width:150px;" /></td></tr>
<tr><td><?=$GLOBALS['_LANG']['_password'] ?></td></tr>
<tr><td><input name="password" id="password" type="password" size="22" class="input" style="width:150px;" /></td></tr>
<tr><td style="font-size:11px;"><input name="submit" type="submit" class="MainBtn"  value="<?=$GLOBALS['_LANG']['_login'] ?>"> <input type="checkbox" name="remember" value="1" style="margin-right:15px;" checked='checked'><?=$GLOBALS['_LANG']['_rememberMe']  ?></td></tr>
<tr><td><span style="margin:0px;font-size:11px;"> <a href="<?=DB_DOMAIN ?>index.php?dll=register"><?=$GLOBALS['LANG_WELCOME']['_join2'] ?></a></span>
<? if (defined('FACEBOOK_APP_ID')  && FACEBOOK_APP_ID !="") { ?>
<br><br>
<a href="<?=DB_DOMAIN ?>index.php?dll=fblogin"><img src="<?=DB_DOMAIN ?>images/facebook-login.jpg" width="185" height="20"></a>
<br><br>
<a href="<?=DB_DOMAIN ?>index.php?dll=fbregister"><img src="<?=DB_DOMAIN ?>images/facebook-register.jpg" ></a><br><br>
<? } ?>
</td></tr></table></form></div>
<? } ?>
<? if($page !="register" && $_SESSION['auth'] =="no" && $page !="articles" && (!isset($GLOBALS['MENU_AFFILIATE']))){ ?><table width="100%"  border="0" class="menu_side"><tr><td><a href="<?=DB_DOMAIN ?>index.php?dll=register"><img src="<?=DB_DOMAIN ?>inc/templates/<?=D_TEMP ?>/images/side.jpg" style="margin-bottom:20px;"></a></td></tr></table> <? } ?>
<? if(isset($GLOBALS['MENU_ARTICLES'])){ 


	/**
	* Info: Show the articles box
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/
?>
<div class="menu_box_title">
<span><a onclick="new Effect.toggle('s2','blind', {queue: 'end'}); "> <img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_expand"></a></span>
<?=$GLOBALS['_LANG']['_articles'] ?> <?=$GLOBALS['_LANG']['_category'] ?></div>
<div class="menu_box_body" id="s2">
<ul class="menu_side">
<? foreach($article_cats as $cat){ ?>
<li class="article"><span><a href="<?=$cat['link'] ?>" style="font-size:80%;"><?=$cat['name'] ?> (<?=$cat['count'] ?>) </a></span></li>
<? } ?>
</ul>
</div>




<? }elseif(isset($GLOBALS['MENU_AFFILIATE'])){ 

	/**
	* Info: Show the affiliate box
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

?>
<div class="menu_box_title">
<span><a onclick="new Effect.toggle('s3','blind', {queue: 'end'}); "> <img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_expand"></a></span>
<?=$GLOBALS['_LANG']['_affiliate'] ?> <?=$GLOBALS['_LANG']['_options'] ?>
</div>
<div class="menu_box_body" id="s3">
<ul class="menu_side"><? if($affiliate_login){ ?><li class="search"><a href="<?=DB_DOMAIN ?>index.php?dll=affiliate&sub=summary"><?=$GLOBALS['_LANG']['_accountOverview'] ?></a></li><li class="search"><a href="<?=DB_DOMAIN ?>index.php?dll=affiliate&sub=banners"><?=$GLOBALS['_LANG']['_banners'] ?></a></li><li class="search"><a href="<?=DB_DOMAIN ?>index.php?dll=affiliate&sub=payment"><?=$GLOBALS['_LANG']['_payments'] ?></a></li><li class="search"><a href="<?=DB_DOMAIN ?>index.php?dll=affiliate&sub=edit"><?=$GLOBALS['_LANG']['_edit'] ?></a></li><li class="search"><a href="<?=DB_DOMAIN ?>index.php?dll=logout"><?=$GLOBALS['_LANG']['_logout'] ?></a></li>
<? }else{ ?>
<li class="search"><a href="<?=DB_DOMAIN ?>index.php?dll=affiliate&sub=login"><?=$GLOBALS['_LANG']['_login'] ?></a></li>
<? } ?>
</ul></div>
<? }elseif(my_logged_in){ 


	/**
	* Info: main menu bars
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

?>
<center>NAVIGATION</CENTER><br/ ><font size="4">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a><br />
<a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">My Membership</A><BR />
<A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search Members</a><br />
<A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">My Inbox</a><BR /> 
<a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">My Winks</a><br />
<A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a><br /> 
<A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> <br />
<A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a><br />
<A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> <br />
<a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=password">Change Password</a><br />
<a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Email Settings</a><br />
<a href="http://www.realblacklove.com/blog">Dating Blog</a><br />
<a href="http://realblacklove.com/joseph-dixon/">Date Coaching</a><br />
<a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><BR /><BR />

<? if($page !="search" && $page !="overview" && $page !="profile" && $page !="chatroom" && $page !="subscribe") { ?>
<!-- control body -->
</div>
</div>
<!-- control body -->
</div>
<? } ?>
<? if(D_IM ==1 & @!in_array("chatroom-im",$PACKAGEACCESS[$_SESSION['packageid']]) && $page !="search" && $page !="profile" && $page !="chatroom" && $page !="overview"  && $page !="subscribe"){ ?>
<? if($page !="overview" && $page !="search" && $page !="profile"  && $page !="subscribe"){ ?>
<? } ?>
<? } ?>
<? } ?>
<? if(!empty($MenuBoxData)){ 

	/**
	* Info: Main Dynamic Menu Box
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/

?>
<center><div>
<? 
if($page =="overview" || $page =="search"){  print $LANG_ERROR['_t10'];
}elseif($page=="profile"  && D_PROFILERATING ==1 && $show_page=="overview" ){ print $LANG_ERROR['_t11'];
}else{ print $GLOBALS['LANG_GLO_OPTIONS']['17']; } ?></div>
<div>
<? foreach($MenuBoxData as $value){  ?>
<table width="0%"  border="0" align="center" style="border-bottom:0px dashed #666666;  font-size:0px;"><tr valign="top"><td height="0"></td></tr></table> 
<? } ?></div><? } ?>
<?	if($page =="overview" && isset($show_poll) && !empty($show_poll)){	?>
<!--  WEBSITE POLL -->
<form method="post" action="<?=DB_DOMAIN ?>index.php">
<input name="do_page" type="hidden" value="overview" class="hidden">
<input name="do" type="hidden" value="poll" class="hidden">
<div class="menu_box_title" style="height:48px;"><?=$show_poll[1]['title'] ?></div>
<div class="menu_box_body"><div id="VoteComplete">
<? if(isset($show_poll[1]['votes'])){foreach($show_poll as $polld){
				 

		print '<dl>
			<dt>'.$polld['caption'].' ('.$polld['votes_percent'].'%)</dt>
			<dd style="margin-top:10px;">
				<span><em style="left:'.($polld['votes_percent']*2).'px">'.$polld['votes_percent'].'%</em></span>
			</dd>				
		</dl>';
				
			}
		}else{	
			foreach($show_poll as $polld){
				print "<input type=\"radio\"  name=\"voteid\" value=\"".$polld['voteid']."\" $ex/>".$polld['caption']."<br>";
				print "<input type=\"hidden\" name=\"pollid\" id=\"pollid\" value=\"".$polld['id']."\" class='hidden' style='display: none;' />";
			}
		}
	?>
	<? if(!isset($show_poll[1]['votes'])){ ?><input  type="submit" value="<?=$GLOBALS['_LANG']['_submit'] ?>" class="button"><? } ?>
	</div></div>
	
	</form><div class="ClearAll"></div>	
	<? } ?>




<?=$MyModeratorBar ?>

<?=$PLUGINS_MENU_BAR ?>
</div>

<!-- SIDE MENU ADVERTISING SLOT -->
<div class="menu_advertisement">
<? foreach($BANNER_ARRAY as $banner){

	/**
	* Info: BANNER DISPLAY
	* 		
	* @version  9.0
	* @created  Fri Sep 25 10:48:31 EEST 2008
	* @updated  Fri Sep 25 10:48:31 EEST 2008
	*/


 if($banner['position'] =="left"){ print $banner['display'];}} ?>


</div>
