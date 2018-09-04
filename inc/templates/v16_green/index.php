<?  $fdata = DisplayFeaturedMembers(12,4); $wdata = DisplayFeaturedMembers(20);		?>
<style>
#splitpage #main_content_wrapper { background: #ffffff; border:0px;}
#splitpage #main_wrapper_bottom {	background: #ffffff;}
.Home_ImageBar { background: url('inc/templates/<?=D_TEMP ?>/images/index_imagebox.jpg'); border-bottom:2px solid #929091; height:180px; }
#style4 ul li { color:white; }
#style4 .previous_button {  background: url(inc/templates/<?=D_TEMP ?>/images/ho2.jpg) no-repeat; width:38px; height:137px;  }
#style4 .previous_button_over {  background: url(inc/templates/<?=D_TEMP ?>/images/ho2.jpg) no-repeat; width:38px; height:137px; }
#style4 .previous_button_disabled {  background: url(inc/templates/<?=D_TEMP ?>/images/ho2.jpg) no-repeat; width:38px; height:137px; }
#style4 .next_button {   background: url(inc/templates/<?=D_TEMP ?>/images/ho2b.jpg) no-repeat; width:38px; height:137px; }
#style4 .next_button_over {  background: url(inc/templates/<?=D_TEMP ?>/images/ho2b.jpg) no-repeat; width:38px; height:137px; }
#style4 .next_button_disabled {  background: url(inc/templates/<?=D_TEMP ?>/images/ho2b.jpg) no-repeat; width:38px; height:137px; }
.steps { font-size:16px; color:#DA0303;}
</style>

<style>
.pImage { float:left; width:100px; height:150px; margin-right:32px;}
.pImageBorder { border:3px solid #eee;}
.pImageUsername { font-size:11px; font-weight:bold; text-align:center}
</style>
  

 
<table width="940"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="551" rowspan="2" valign="top"><div class="inner_nav_body" style="margin-top:25px; height:555px; border:0px;">

<h1 style="font-size:37px;font-weight:normal;"><?=TMP_TXT_1 ?></h1><p><?=TMP_TXT_2 ?></p> 

<div style="margin-left:10px; margin-top:20px;">
 
	<? foreach( $fdata as $value){ ?>
	<div class="pImage"><a href="<?=$value['link']; ?>"><img src="<?=$value['image']; ?>" border="0" width="96" height="96" class="pImageBorder"></a><div class="pImageUsername"><?=$value['username']; ?></div></div>
	<? } ?>

</div>

<div class="clear"></div>
<h2 style="margin-left:30px;"><?=$GLOBALS['_LANG']['_featured']." ".$GLOBALS['_LANG']['_members'] ?></h2><br>

</div></td>
    <td width="300" class="inner_nav_body" style="border:0px;height:320px; background: url('inc/templates/<?=D_TEMP ?>/images/index_backdrop.jpg') bottom no-repeat;"> <form method="post" name="MemberSearch" action="index.php?dll=search&view_page=1" style="padding:20px; ">               
<br><input name="do" type="hidden" value="add" class="hidden">            
<input name="do_page" type="hidden" value="search" class="hidden">
<input type="hidden" name="page" value="1" class="hidden">
<input type="hidden" name="Extra[zero]" value="1" class="hidden">
<input name='TotalNumberOfRows' type='hidden' value='3' class='hidden'>               
<input type='hidden' name='SeN[1]' value='country' class='hidden'>
<input type='hidden' name='SeT[1]' value='3' class='hidden'>
<input type='hidden' name='SeN[2]' value='gender' class='hidden'>
<input type='hidden' name='SeT[2]' value='3' class='hidden'>
<input type='hidden' name='SeN[3]' value='em_85820081128' class='hidden'>
<input type='hidden' name='SeT[3]' value='3' class='hidden'>
<table width="300"  border="0" cellpadding="0" cellspacing="0" style="color:white;margin-left:20px;">
<tr valign="top"><td height="24" colspan="3" style="font-size:24px;color:#ffffff"><?=$LANG_BODY['_member']. " ".$LANG_BODY['_search'] ?></td>
</tr><tr> <td width="122" height="30"><?=$LANG_BODY['_home1'] ?> </td><td colspan="2">
<select name="select"><?=displayGenders() ?></select>
</td></tr><tr><td height="30"><?=$LANG_BODY['_home2'] ?> </td><td colspan="2">
<select name="SeV[2]"><?=displayGenders(1) ?></select>
</td></tr>

<tr>
<td  width="30"><?=$LANG_BODY['_age'] ?></font></td>
<td  colspan="2"><? print DoAge(1); ?></td>
</tr>


<tr>
  <td height="30"><?=$LANG_BODY['_country'] ?></td><td colspan="2">
<? print '<SELECT name="SeV[1]"  style="width:180px" id=country onchange="eMeetingLinkedField(this.value, 54,100003);" >';print DisplayCountries("",true); ?>
</td></tr>

<?
$result2 = $DB->Row("SELECT fvCaption FROM field_list_value WHERE fvid = '". $data['state'] ."' AND lang='".D_LANG."' Order by fvOrder");
if(!isset($result2)){ 
	$mystate ="none"; 
}else {
	$mystate = $result2['fvCaption'];
}
$mystate ="State/Province"; 
$data['state']="Region"; 
?>


<tr>
  <td height="30"><?=$LANG_BODY['_province'] ?></td><td colspan="2">
<? print '<div id="Link54" valign="top"><SELECT name="SeV[3]"  style="width:130px" id=country>'; ?>
</td></tr>



<tr>
  <td height="30"><?=$LANG_BODY['_withPics'] ?></td><td width="140"><input type="checkbox" name="Extra[pics]" value="1"> &nbsp;&nbsp;&nbsp;&nbsp; <?=$lang_global_options['13'] ?> </td>
  <td width="65"><input type="checkbox" name="Extra[online]" value="1"></td>
</tr>
<tr>
  <td height="30">&nbsp;</td>
  <td height="30" colspan="2" valign="bottom">
<input type="submit" name="submit" value="&nbsp;&nbsp;<?=$LANG_BODY['_search'] ?>&nbsp;&nbsp;" class="NormBtn"  style="font-size:16px;">
</td>
</tr>
</table>
</form></td>
  </tr>
  <tr>
    <td class="inner_nav_body" style="border:0px;padding:20px;">


<span style="font-size:21px;color:#666666; height:45px; margin-top:25px;"><?=$LANG_WELCOME['3'] ?></span>

<ul style="line-height:30px;margin-top:20px;color:#CF0079;">
<a href="index.php?dll=register"><img src="inc/templates/<?=D_TEMP ?>/images/home_join.png" border="0" style="float:right;"></a>
<li class="steps"><?=$LANG_WELCOME['4'] ?></li>
<li class="steps"><?=$LANG_WELCOME['5'] ?></li>
<li class="steps"><?=$LANG_WELCOME['6'] ?></li>
</ul><br>
<p><?=$LANG_WELCOME['7'] ?></p>

</td>
  </tr>
</table>
<table width="940" border="0" class="Home_ImageBar"><tr valign="top"><td width="546">


<div id="style4" style="margin-left:30px;margin-top:20px;">
<div class="previous_button"></div><div class="container">
<ul> 
<?  foreach( $wdata as $value){ ?>
<li><a href="<?=$value['link'] ?>"><img src="<?=$value['image'] ?>" width="96" height="96" border="0" style="cursor:pointer;"></a><br>
<strong><?=$value['username'] ?></strong></li><? } ?>
<?  foreach( $fdata as $value){ ?>
<li><a href="<?=$value['link'] ?>"><img src="<?=$value['image'] ?>" width="96" height="96" border="0" style="cursor:pointer;"></a><br>
<strong><?=$value['username'] ?></strong></a></li><? } ?>

</ul>

</div>
<div class="next_button"></div></div><script>function runTest() {  hCarousel = new UI.Carousel("style4");     }  Event.observe(window, "load", runTest); </script>

</td><td width="384" style="padding:15px;">

<span style="font-size:21px;color:#ffffff; height:45px; margin-top:25px;"><?=TMP_TXT_3 ?></span>
<p style="color:white;"><?=TMP_TXT_4 ?></p>
<p><a href="index.php?dll=register" style="color:white;"><?=$LANG_WELCOME['_join2'] ?></a></p>

</td></tr></table>


 