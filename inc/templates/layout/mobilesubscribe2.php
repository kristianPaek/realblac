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
<BR />
<?=$GLOBALS['LANG_ORDER']['15'] ?>: <?=$GLOBALS['MyProfile']['name'] ?></h3> 

</div><p><?=$PageDesc ?></p>

<? if(isset($SubscribeOnly)){ ?>
<p style="color:red;">Thank you for joining our website, please select your desired membership package below, you must upgrade your membership to continue.</p>
<? } ?>
 

 




<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;font-weight:bold;"> <h3 style="padding:0px; margin:0px;">
	

	<? if($_SESSION['packageid'] != 3 && $GLOBALS['MyProfile']['expire'] !=""){ 
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
window.open('', windowname, 'height=650,width=500,scrollbars=yes');
myform.target=windowname;
return true;
}
<!--  onSubmit="popupform(this, 'join')" -->
</script>



	
	
	<form name="upgradeAccount" method="post" action="<?=DB_DOMAIN ?>inc/payment/upgrade_process.php">
	<input type="hidden" name="newpackageid" id="newpackageid" value="1">
	<div style="width:270px; margin-left:0px; margin-top:1px; float:left;">
	
		
		<!-- DISPLAY UPGRADE PACKAGES -->
		<? foreach($show_packages as $package){ ?>
		<div class="package_box">
			<span class="check"><input name="PackageUpID" id="PackageID" type="radio" value="<?=$package['id'] ?>" ></span> 
			<span class="checkinfo2">
				<div class="package_name"> <?=$package['name'] ?></div>
				<p style="font-size:12px;">
				<? if($package['icon'] =="SMS"){  ?>
				<?=$package['credits'] ?> <?=$GLOBALS['LANG_ORDER']['20'] ?> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   <?=$package['price'] ?> <?=$package['currency']; ?>
				<? }else{ ?>
				<?=$package['time_period'] ?>-<?=$package['time_type'] ?> <?=$package['name'] ?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				   <?=$package['price'] ?> <?=$package ['currency'] ?> /  <?=$package['time_period'] ?> <?=$package['time_type'] ?>
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

<div style="margin-left:15px;">
<p> <a href="<?=DB_DOMAIN ?>mobile.php?dll=mobilesubscribe&sub=matrix"><?=$LANG_UPGRADE_MENU['matrix'] ?></a></p>
</div>


	<? if(D_FREE=="no"){ ?>
	<!-- ******************* PAYMENT INFORMATION AND METHODS ************************* -->
	<div style="border-top:1px dotted #999; margin-bottom:15px;"></div>

	
	
	<div style="text-align:center;">
	
	<!-- DISPLAY UPGRADE PACKAGES -->		
		<div>
			<ul>	
			<li>
			<label><?=$GLOBALS['LANG_ORDER']['a13'] ?> </label>
				<select name="payid">
				<? foreach($show_payment_types as $merchant){ ?>
					<option value="<?=$merchant['id'] ?>"><?=$merchant['name'] ?></option>
				<? } ?>
				</select> 
			</li>
			<li><input type='submit' value="<?=$GLOBALS['LANG_ORDER']['a14'] ?>" class="MainBtn" style="font-size:20px; margin-top:20px;"></li>
			</ul>
	
		</div>
		<!-- END DISPLAY -->
		
		<div class="ClearAll"></div>
		
		
	</div>
	 
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


<br><br>
</div>
<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>


<div class="ClearAll"></div>
