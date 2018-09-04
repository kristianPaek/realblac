<?
/**
* Page: MEMBER UPGRADE PAGE
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  inc/func/func_subscribe.php & inc/payment/*
*/
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<? if(isset($SubscribeOnly)){ ?>
<p style="color:red;">Thank you for joining our website, please select your desired membership package below, you must upgrade your membership to continue.</p>
<? } ?>
 <center><font size="2">
<A HREF="http://www.realblacklove.com/meet/index.php?dll=overview">Overview</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=messages&sub=inbox">Inbox</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=search&sub=advanced">Search</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=search&view_page=1">Online Now</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=overview&sub=viewed">Viewed Me</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=winkmessages&sub=inbox">Winked Me</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=favorites">My Favorites</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=gallery&sub=albums">My Photos</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=&dll=account&sub=view">My Profile</a> | <A HREF="http://www.realblacklove.com/meet/index.php?dll=account&sub=edit">Edit Profile</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=subscribe">Subscription</A> | <a href="http://www.realblacklove.com/meet/index.php?dll=settings&sub=alerts">Settings</a> | <a href="http://www.realblacklove.com/blog">Dating Blog</a> | <a href="http://www.realblacklove.com/meet/index.php?dll=logout">Logout</A></font><br /><br /><br /></center>
<img src="/header.jpg">

<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li><a href="<?=DB_DOMAIN ?>index.php?dll=overview"><span><?=$GLOBALS['_LANG']['_accountOverview'] ?></span></a></li>
		<li <? if($page=="subscribe"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=subscribe"><span><?=$GLOBALS['LANG_OVERVIEW']['51'] ?></span></a></li>
		

    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>


<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;"> <h3 style="padding:0px; margin:0px;">
	<?=$GLOBALS['LANG_ORDER']['15'] ?>: <?=$GLOBALS['MyProfile']['name'] ?>
	<br /><br />
	<? if($_SESSION['packageid'] != 3 && $GLOBALS['MyProfile']['expire'] !=""){ 
		 /**
		 * Page: Displays when their membership expires
		 *
		 * @version  9.0
		 */
	?>
	<?=$GLOBALS['_LANG']['_membership'] ?> <?=$GLOBALS['_LANG']['_expires'] ?> <?=$GLOBALS['MyProfile']['expire'] ?> 
	<? } ?>
</div>
<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:0px;">
	
</h3> 


<? if($show_page=="home"){ 

	 /**
	 * Page: Displays the membership packages
	 *
	 * @version  9.0
	 */

?>
<script>

function popupform(myform, windowname)
{
if (! window.focus)return true;
window.open('', windowname, 'height=650,width=800,scrollbars=yes');
myform.target=windowname;
return true;
}
<!--  onSubmit="popupform(this, 'join')" -->
</script>



	<!-- DISPLAY TOP BOX -->
	
	
	<form name="upgradeAccount" method="post" action="<?=DB_DOMAIN ?>inc/payment/upgrade_process.php">
	<input type="hidden" name="newpackageid" id="newpackageid" value="1">
	<div style="width:500px; margin-left:1px; margin-top:1px; float:left;">

<p><?=$PageDesc ?></p>
<br>
	
		<!-- DISPLAY UPGRADE PACKAGES -->
		<? foreach($show_packages as $package){ ?>
		<div class="package_box">
			<span class="check"><input name="PackageUpID" id="PackageID" type="radio" value="<?=$package['id'] ?>" onclick="DisplayPackFeatures(<?=$package['id']?>);"></span> 
			<span class="checkinfo">
				<a href="#" onclick="DisplayPackFeatures(<?=$package['id']?>); return false;"><div class="package_name"> <?=$package['name'] ?></div></a>
				<p style="font-size:18px;">
				<? if($package['icon'] =="SMS"){  ?>
				<?=$package['credits'] ?> <?=$GLOBALS['LANG_ORDER']['20'] ?> <br> <?=$package['price'] ?> <?=$package['currency']; ?>
				<? }else{ ?>
				<?=$package['time_period'] ?>-<?=$package['time_type'] ?> for  $<?=$package['price'] ?> 
				<? } ?>
				</p>
			</span>
			<div class="ClearAll"></div>
		</div>
			<br>
		<? } ?>
		<!-- END DISPLAY -->
		
		<div class="ClearAll"></div>
		
		
	</div>
	
	<div class="ClearAll"></div>
	<? if(D_FREE=="no"){ ?>
	<!-- ******************* PAYMENT INFORMATION AND METHODS ************************* -->
<div style="WIDTH:300PX; border-top:1px dotted #999; margin-bottom:15px;"></div>	


	
	
	<div style="text-align:LEFT;">
	
	<!-- DISPLAY UPGRADE PACKAGES -->		
		<div><ul><li><label><?=$GLOBALS['LANG_ORDER']['a13'] ?> </label>
				<select name="payid">
				<? foreach($show_payment_types as $merchant){ ?>
					<option value="<?=$merchant['id'] ?>"><?=$merchant['name'] ?></option>
				<? } ?>
				</select> 
			</li>
            <li><label>If you have a coupon code please enter it below and click the Apply Coupon button</label></li>
            <li>
                <input name="b1" id="b1" type="text" size="40" maxlength="100" style="float: left">
                <input  type='submit' value="<?=$GLOBALS['LANG_ORDER']['21'] ?>" class="MainBtn" onclick="GetCouponByCode();return false;">
                <br class="clear">
            </li>
                <li><div id="couponMsg"></div></li>
			<li><input type='submit' value="<?=$GLOBALS['LANG_ORDER']['a14'] ?>" class="MainBtn" style="font-size:20px; margin-top:20px;"></li>
			</ul>
	
		</div>
		<!-- END DISPLAY -->
		
		<div class="ClearAll"></div></div>
	 
	</form>
	<!-- END BOX -->
	<? } ?>
	
	
<? }elseif($show_page=="matrix"){ 

	 /**
	 * Page: Displays the bank details when members wish to pay via bank transfer
	 *
	 * @version  9.0
	 */

?>

<table width="620"  border="0" style="border:0px;">


<thead>
	<tr bgcolor="#999999">
		<th bgcolor="#FFFFFF">&nbsp;</th>  
		<?	foreach($PACKARRAY as $pValue){	  ?>
			<th bgcolor="#999999" style="color:white;"><?=$pValue['name'] ?></th>
		<? } ?>                  
	</tr>
</thead> 
<?


 $i=1;
 foreach($PAGE_ARRAY as  $PAGENAME => $TOP_MENU){
	
if($PAGENAME =="7"){ $PAGENAME="classads"; }
if($PAGENAME =="8"){ $PAGENAME="blog"; }
 
if($PAGENAME =="10"){ $PAGENAME="chatroom"; }
 
//print $PAGENAME." -->".$TOP_MENU."<br>";

if(!is_numeric($PAGENAME)){
	
 	$inner=1;
	foreach( $TOP_MENU as $key => $value){ 
 
		if(substr($key,-1,1) !="?" && substr($key,1,3) !="dll" && ( $key !="view" && $key !="" && $key !="inbox" && $key !="sent" && $key !="trash" && $key !="manage"  && $key !="albums" && $key !="password" && $key !="cancel"  && $key !="taken" && $key !="test") && $value !=""){ ## hide value if its a help value 

		if($inner==1){ $InnerSymbol=''; }else{ $InnerSymbol="&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/DEFAULT/_icons/16/bullet_go.png' align='absmiddle'>"; }
 
?>
  <tr>
    <td width="130"> <?=$InnerSymbol." ".$TOP_MENU[$key] ?> </td>

		<?	foreach($PACKARRAY as $pValue){	 




		$PackageString = "";
	 	$PackageString = $PAGENAME."-".$key; 

		if(is_array($PACKAGEACCESS[$pValue['id']]) && in_array($PackageString,$PACKAGEACCESS[$pValue['id']])){ 
		$CheckME='<img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_no.png">'; 
		}else{$CheckME='<img src="'.DB_DOMAIN.'images/DEFAULT/_icons/new/chk_yes.png">'; }
 ?>

			<td width="25" bgcolor="#eeeeee" align="center"><?=$CheckME ?></td>

		<? } ?>

  </tr>

<?
		$i++; 
		$inner++;
		} 

	} }

}
?>

	<tr>
		<th bgcolor="#FFFFFF">&nbsp;</th>  
		<?	foreach($PACKARRAY as $pValue){	  ?>
			<th><?=$pValue['currency_code'].$pValue['price'] ?></th>
		<? } ?>                  
	</tr>
</table>


<? }elseif($show_page=="bank"){ 

	 /**
	 * Page: Displays the bank details when members wish to pay via bank transfer
	 *
	 * @version  9.0
	 */

?>
 
		<div style="margin-left:10px; margin-top:5px;">
		
			<strong><?=$GLOBALS['LANG_ORDER']['17'] ?></strong><br><br>
			
			<p><?=$GLOBALS['LANG_ORDER']['18'] ?> <?=$bank_price['currency_code'] ?><?=$bank_price['price'] ?> <?=$GLOBALS['LANG_ORDER']['19'] ?></p>
		
			<!-- DISPLAY UPGRADE PACKAGES -->
			<div class="box_title" style="width:610px;"><?=$GLOBALS['LANG_ORDER']['16'] ?></div>
			<div class="box_body">
				<ul class="form">	
				<? foreach($bank_data as $bb){ ?>
				<li>
				<label><?=$bb['name'] ?>: </label><?=$bb['value'] ?>
				</li>
				<? } ?>
				</ul>
		
			</div>
			<!-- END DISPLAY -->
			
			<div class="ClearAll"></div>
			
			
		</div>
	
<? } ?>

</div>
<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>


<div class="ClearAll"></div>