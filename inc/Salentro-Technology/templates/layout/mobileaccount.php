<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<style>
ul.form li .tip {  border:0px;}

.CapBody { padding: 5px;  margin-bottom:15px; }
ul.form textarea { width:375px;}
ul.form label { display: block; float: left; text-align: left; padding: 0 10px 0 0; width: 375px; font-weight: bold;  margin: 5px 0 0 0; font-size:110%; color:#333333; }

</style>

<img src="/mobileheader.png" width="375">
<a name="#top"></a>
<div class="TopAccount"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>
<p><?=$PageDesc ?></p>














<? if(isset($show_page) && ( $show_page=="edit" ||  $show_page=="design" ||  $show_page=="video"  ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">

<? } ?>






<? if(isset($show_page) && $show_page=="home"){ 


	 /**
	 * Page: Account Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>




	<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;font-weight:bold;"> 
	</div>
	<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:0px;">
		
	
	
	<style>
	.s1 { background: url(images/DEFAULT/_icons/new/acc/acc_1.jpg) no-repeat; background-position: 0% 50%}
	.s2 { background: url(images/DEFAULT/_icons/new/acc/acc_2.jpg) no-repeat; background-position: 0% 50%}
	.s3 { background: url(images/DEFAULT/_icons/new/acc/acc_3.jpg) no-repeat; background-position: 0% 50%}
	.s4 { background: url(images/DEFAULT/_icons/new/acc/acc_4.jpg) no-repeat; background-position: 0% 50%}
	.s5 { background: url(images/DEFAULT/_icons/new/acc/acc_5.jpg) no-repeat; background-position: 0% 50%}
	.s6 { background: url(images/DEFAULT/_icons/new/acc/acc_6.jpg) no-repeat; background-position: 0% 50%}
	.s7 { background: url(images/DEFAULT/_icons/new/acc/acc_7.jpg) no-repeat; background-position: 0% 50%}
	.s8 { background: url(images/DEFAULT/_icons/new/acc/acc_8.jpg) no-repeat; background-position: 0% 50%}
	.s9 { background: url(images/DEFAULT/_icons/new/acc/acc_9.jpg) no-repeat; background-position: 0% 50%}
	.s10 { background: url(images/DEFAULT/_icons/new/acc/acc_10.jpg) no-repeat; background-position: 0% 50%}
	.s11 { background: url(images/DEFAULT/_icons/new/acc/acc_12.jpg) no-repeat; background-position: 0% 50%}
	</style>
	
	<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>
	
	
	<br><br>
	</div>
	<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>
	
	
	<div class="ClearAll"></div>







<? }elseif(isset($show_page) && $show_page=="edit"){ 

	 /**
	 * Page: Account Edit Profile Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>




	 
	<form method="post" action="<?=DB_DOMAIN ?>mobile.php"  name="MemberSearch" id="MemberSearch">
	<input name="do" type="hidden" value="edit" class='hidden'>
	<input name="do_page" type="hidden" value="mobileaccount" class="hidden">
	<input name="sub" type="hidden" value="edit" class="hidden">
	<? if(isset($_SESSION['site_moderator_edit']) && $_SESSION['site_moderator_edit'] =="yes" && isset($_GET['id']) && is_numeric($_GET['id']) ){ ?>	
	<input name="eid" type="hidden" value="<?=$_GET['id'] ?>" class="hidden">	
	<? }else{ ?>
	<input name="eid" type="hidden" value="<?=$_SESSION['uid'] ?>" class="hidden">	
	<? } ?>
	<input type="hidden" value="1" name="StopConfigStrip"/>
	<script src="<?=DB_DOMAIN ?>inc/js/_extras/_date.js"></script>
	<ul class="form"> 
		<?=$profile_details ?>
	</ul>
	
	</form>
	





<? }elseif($show_page=="design" && D_DESIGNER =="1"){ 

	 /**
	 * Page: Account Profile Designer
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<form method="post" action="<?=DB_DOMAIN ?>mobile.php"  enctype="multipart/form-data" name="cssform">
<input name="do" type="hidden" value="design" class='hidden'>
<input name="do_page" type="hidden" value="mobileaccount" class="hidden">
<input name="sub" type="hidden" value="design" class="hidden">


<iframe id="PreviewFrame" src="<?=DB_DOMAIN ?>mobile.php?dll=profile&pId=<?=$_SESSION['uid'] ?>" frameborder="0" style="width:650px; height:500px; border:3px dashed #cccccc; margin-top:10px;"></iframe>


<table width="650"><tr valign="top"><td width="312">
 

<ul class="form" id="form1" style="display:visible"> 

	<div class="menu_box_title1" onClick="toggleLayer('bb1');" style="cursor:pointer;"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span> 
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['LANG_ACCOUNT']['5'] ?></div>
	
	<div class="CapBody" style="display:none" id="bb1">

<li><label><?=$GLOBALS['LANG_ACCOUNT']['9'] ?>: </label><select onChange="UpdateFrame('font1', this.value); return false;" class="input" name="f2" style="width:220px; font-size:14px; height:25px;"><option value="Andale Mono" <? if($myTheme['font2'] =="no-repeat"){ print "selected"; } ?>>Andale Mono</option><option value="Helvetica Neue" <? if($myTheme['font2'] =="Helvetica Neue"){ print "selected"; } ?>>Helvetica Neue</option><option value="Arial Black" <? if($myTheme['font2'] =="Arial Black"){ print "selected"; } ?>>Arial Black</option><option value="Comic Sans MS" <? if($myTheme['font2'] =="omic Sans MS"){ print "selected"; } ?>>Comic Sans MS</option><option value="Courier New" <? if($myTheme['font2'] =="Courier New"){ print "selected"; } ?>>Courier New</option><option value="Futura" <? if($myTheme['font2'] =="Futura"){ print "selected"; } ?>>Futura</option><option value="Georgia" <? if($myTheme['font2'] =="Georgia"){ print "selected"; } ?>>Georgia</option><option value="Gill Sans" <? if($myTheme['font2'] =="Gill Sans"){ print "selected"; } ?>>Gill Sans</option><option value="Impact" <? if($myTheme['font2'] =="Impact"){ print "selected"; } ?>>Impact</option><option value="Lucida Grande" <? if($myTheme['font2'] =="Lucida Grande"){ print "selected"; } ?>>Lucida Grande</option><option value="Times New Roman" <? if($myTheme['font2'] =="Times New Roman"){ print "selected"; } ?>>Times New Roman</option><option value="Trebuchet MS" <? if($myTheme['font2'] =="Trebuchet MS"){ print "selected"; } ?>>Trebuchet MS</option><option value="Verdana" <? if($myTheme['font2'] =="Verdana"){ print "selected"; } ?>>Verdana</option></select></li>

			<li><label><?=$GLOBALS['LANG_ACCOUNT']['10'] ?>: </label><select class="input" name="f1" style="width:220px; font-size:14px; height:25px;"><option value="Andale Mono" <? if($myTheme['font1'] =="no-repeat"){ print "selected"; } ?>>Andale Mono</option><option value="Helvetica Neue" <? if($myTheme['font1'] =="Helvetica Neue"){ print "selected"; } ?>>Helvetica Neue</option><option value="Arial Black" <? if($myTheme['font1'] =="Arial Black"){ print "selected"; } ?>>Arial Black</option><option value="Comic Sans MS" <? if($myTheme['font1'] =="omic Sans MS"){ print "selected"; } ?>>Comic Sans MS</option><option value="Courier New" <? if($myTheme['font1'] =="Courier New"){ print "selected"; } ?>>Courier New</option><option value="Futura" <? if($myTheme['font1'] =="Futura"){ print "selected"; } ?>>Futura</option><option value="Georgia" <? if($myTheme['font1'] =="Georgia"){ print "selected"; } ?>>Georgia</option><option value="Gill Sans" <? if($myTheme['font1'] =="Gill Sans"){ print "selected"; } ?>>Gill Sans</option><option value="Impact" <? if($myTheme['font1'] =="Impact"){ print "selected"; } ?>>Impact</option><option value="Lucida Grande" <? if($myTheme['font1'] =="Lucida Grande"){ print "selected"; } ?>>Lucida Grande</option><option value="Times New Roman" <? if($myTheme['font1'] =="Times New Roman"){ print "selected"; } ?>>Times New Roman</option><option value="Trebuchet MS" <? if($myTheme['font1'] =="Trebuchet MS"){ print "selected"; } ?>>Trebuchet MS</option><option value="Verdana" <? if($myTheme['font1'] =="Verdana"){ print "selected"; } ?>>Verdana</option></select></li>
	<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>		
	</div>

</ul>	



<ul class="form" id="form2" style="display:visible"> 

	<div class="menu_box_title1" onClick="toggleLayer('bb2');" style="cursor:pointer;"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span> 
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['LANG_ACCOUNT']['6'] ?>
	</div>
	<div class="CapBody" style="display:none" id="bb2">

	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('b1')"><label>&nbsp;&nbsp;&nbsp;<?=$GLOBALS['LANG_ACCOUNT']['11'] ?>: </label><input name="b1" id="b1" type="text" value="<?=$myTheme['background'] ?>" maxlength="10" style="background-color:<?=$myTheme['background'] ?>; width:210px; font-size:14px; height:25px;background-image:none;" class="input"></li>

 	[ <a href="javascript:void(0);" onClick="toggleLayer('myBodyBG');"><?=$GLOBALS['LANG_ACCOUNT']['12'] ?></a> ] 
	
	<span id="myBodyBG" style="display:none">

	<p style="background:#DCFADD; border:3px dashed #999999; padding:10px; color:#666666;">

		 <label><?=$GLOBALS['LANG_ACCOUNT']['13'] ?>: </label><input name="b2" type="file" style="width:50px;">  

		<? $cT = $myTheme['background_image_display']; ?>
		<label><?=$GLOBALS['LANG_ACCOUNT']['14'] ?>: </label> <select name="b3" style="width:200px; font-size:14px; height:25px;"><option value="no-repeat" <? if($cT =="no-repeat"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['23'] ?></option><option value="repeat" <? if($cT =="repeat"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['24'] ?></option><option value="repeat-y"<? if($cT =="repeat-y"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['25'] ?></option> <option value="repeat-x" <? if($cT =="repeat-x"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['26'] ?></option></select>
		<? if(isset($myTheme['background_image']) && $myTheme['background_image'] !=""){ ?>
			<img src="<?=WEB_PATH_FILES.$myTheme['background_image'] ?>" width="50" height="50" onclick="NewpopUpWin('<?=WEB_PATH_FILES.$myTheme['background_image'] ?>','500','500')">
			<br><br><input name="bremove" type="checkbox" value="1"> <?=$GLOBALS['LANG_ACCOUNT']['15'] ?>
		<? } ?>
	</p>

	</span>
	<hr>
	
	
	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('i2')"><label>&nbsp;&nbsp;&nbsp;<?=$GLOBALS['LANG_ACCOUNT']['16'] ?>: </label><input name="i2" id="i2" type="text" value="<?=$myTheme['inner_background'] ?>" maxlength="10" style="background-color:<?=$myTheme['inner_background'] ?>; width:210px; font-size:14px; height:25px; background-image:none;" class="input"> </li>
	

<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>
	</div>

</ul>


<ul class="form" id="form3" style="display:visible">

	<div class="menu_box_title1" onClick="toggleLayer('bb3');" style="cursor:pointer;"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['LANG_ACCOUNT']['7'] ?></div> 
	<div class="CapBody" style="display:none" id="bb3">

	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('h1')">
	  <label>&nbsp;&nbsp;&nbsp;<?=$GLOBALS['LANG_ACCOUNT']['17'] ?>:</label>
	  <input name="h1" id="h1" type="text" value="<?=$myTheme['header_background'] ?>" maxlength="10" style="background-color:<?=$myTheme['header_background'] ?>; width:210px; font-size:14px; height:25px;background-image:none;" class="input"></li>
	<hr>
<div class="ClearAll"></div>
	[ <a href="javascript:void(0);" onClick="toggleLayer('myHeadBG');"><?=$GLOBALS['LANG_ACCOUNT']['12'] ?></a> ]

	<span id="myHeadBG" style="display:none">

		<p style="background:#DCFADD; border:3px dashed #999999; padding:10px; color:#666666;">
			<label><?=$GLOBALS['LANG_ACCOUNT']['13'] ?>: </label><input name="h2" type="file"  style="width:50px;"> 
			<? $cT = $myTheme['header_image_display']; ?>
			<label><?=$GLOBALS['LANG_ACCOUNT']['14'] ?>: </label> <select name="h3" class="input" style="width:200px; font-size:14px; height:25px;" ><option value="no-repeat" <? if($cT =="no-repeat"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['23'] ?></option><option value="repeat" <? if($cT =="repeat"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['24'] ?></option><option value="repeat-y"<? if($cT =="repeat-y"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['25'] ?></option> <option value="repeat-x" <? if($cT =="repeat-x"){ print "selected"; } ?>><?=$GLOBALS['LANG_ACCOUNT']['26'] ?></option></select>
		
			<? if(isset($myTheme['header_image']) && $myTheme['header_image'] !=""){ ?>
			<img src="<?=WEB_PATH_FILES.$myTheme['header_image'] ?>" width="50" height="50" onclick="NewpopUpWin('<?=WEB_PATH_FILES.$myTheme['header_image'] ?>','500','500')">
			<br><br> <input name="hremove" type="checkbox" value="1" class="input" > <?=$GLOBALS['LANG_ACCOUNT']['15'] ?>
			<? } ?>
		</p>

	</span>
	<hr>

	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('h0')"><label>&nbsp;&nbsp;&nbsp;<?=$GLOBALS['LANG_ACCOUNT']['18'] ?>: </label><input name="h0" id="h0" type="text" class="input" value="<?=$myTheme['header_text'] ?>" maxlength="10" style="background-color:<?=$myTheme['header_text'] ?>; width:210px; font-size:14px; height:25px;background-image:none;"></li><hr>
<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>
	</div>

</ul>	


<ul class="form" id="form4" style="display:visible">

	<div class="menu_box_title1" onClick="toggleLayer('bb4');" style="cursor:pointer;"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['LANG_ACCOUNT']['8'] ?> </div> 
	<div class="CapBody" style="display:none" id="bb4">

	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('t1')">
	  <label><?=$GLOBALS['LANG_ACCOUNT']['19'] ?>: </label>
	  <input name="t1" id="t1" type="text" value="<?=$myTheme['color_text'] ?>" maxlength="10" style="background-color:<?=$myTheme['color_text'] ?>; width:210px; font-size:14px; height:25px;background-image:none;" class="input"></li><hr>
	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('t2')">
	  <label><?=$GLOBALS['LANG_ACCOUNT']['20'] ?>: </label>
	  <input name="t2" id="t2" type="text" value="<?=$myTheme['color_link'] ?>" maxlength="10" style="background-color:<?=$myTheme['color_link'] ?>; width:210px; font-size:14px; height:25px;background-image:none;" class="input"></li><hr>
	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('s1')">
	  <label><?=$GLOBALS['LANG_ACCOUNT']['21'] ?>: </label>
	  <input name="s1" type="text" id="s1" value="<?=$myTheme['subheader_title'] ?>" maxlength="10" style="background-color:<?=$myTheme['subheader_title'] ?>; width:210px; font-size:14px; height:25px;background-image:none;" class="input"></li><hr>
	<li style="border:2px dashed #999999 cursor:pointer; padding:5px; color:#333333;" onclick="getColor('s2')"><label><?=$GLOBALS['LANG_ACCOUNT']['22'] ?>: </label>
	  <input name="s2" type="text" id="s2" value="<?=$myTheme['subheader_background'] ?>" maxlength="10" style="background-color:<?=$myTheme['subheader_background'] ?>; width:210px; font-size:14px; height:25px;background-image:none;" class="input"></li><hr>
	<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>	

	</div>

</ul>
 

</td> <td width="375">
<div style="border:1px dashed #999999; padding:10px; background:#eeeeee; margin-top:10px; line-height:30px;"><?=$GLOBALS['LANG_ACCOUNT']['29'] ?></div>


</td></tr></table>



</form>
<hr>
<form method="post" action="<?=DB_DOMAIN ?>mobile.php">
<input name="do" type="hidden" value="design" class='hidden'>
<input name="do_page" type="hidden" value="mobileaccount" class="hidden">
<input name="sub" type="hidden" value="design" class="hidden">
<input name="reset" type="hidden" value="1" class="hidden">
<input value="Reset Styles" type="submit" class="MainBtn">
</form>
	


   	<div id="plugin" onmousedown="HSVslide('drag','plugin',event)" style="TOP: 58px; Z-INDEX: 20;">
	<div id="plugCUR"></div><div id="plugHEX" onmousedown="stop=0; setTimeout('stop=1',100);">FFFFFF</div>
	<div id="plugCLOSE" onClick="getColor('s2');">X</div><br>
	<div id="SV" onmousedown="HSVslide('SVslide','plugin',event)" title="Saturation + Value">
	 <div id="SVslide" style="TOP: -4px; LEFT: -4px;"><br /></div>
	</div>
	<form id="H" onmousedown="HSVslide('Hslide','plugin',event)" title="Hue">
	 <div id="Hslide" style="TOP: -7px; LEFT: -8px;"><br /></div>
	 <div id="Hmodel"></div>
	</form>
   </div>
  	<input type="text" value="ColourPickIder" id="ColourPickIder" style="display:none;">
	<script type="text/javascript">
	loadSV();
	HSVupdate({H:0, S:0, V:20});
	//$S('plugin').left=($('s2').offsetLeft+35)+'px';
	//$S('plugin').top=($('s2').offsetTop+35)+'px';		 
	$S('plugin').display='none';
	
	</script>






<? }elseif($show_page=="comments" && D_COMMENTS =="1"){ 


	 /**
	 * Page: Account Comments Page
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */
 

?>



	<span id="response_eMeetingCommentsDelete" class="responce_alert"></span>
	
	<div class="menu_box_title1"><span><img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span>
	<?=$GLOBALS['_LANG']['_comments'] ?></div>
	<div class="menu_box_body1">
	<div id="DisplayList">
	  <ul>
		<li> <strong style="text-transform:uppercase"> <?=$GLOBALS['LANG_COMMON'][8] ?> </strong> 
				
				<!-- DISPLAY PAGE NUMBERS -->
				<span>
				<? if(($show_page_current) > 1){ ?>
				<a href="<?=DB_DOMAIN ?>mobile.php?dll=account&sub=comments&sta=<?=$show_page_prev?><?=$show_page_rows?>&cpage=<?=$show_page_current-1; ?>"><</a>
				<? } ?>  
				<?=str_replace("%1",$show_page_current,str_replace("%2",$show_page_num_of,$GLOBALS['LANG_COMMON'][0])) ?>
				<? if($show_page_current < $show_page_num_of){ ?>
				<a href="<?=DB_DOMAIN ?>mobile.php?dll=account&sub=comments&sta=<?=$show_page_next?><?=$show_page_rows?>&cpage=<?=$show_page_current+1; ?>">></a>
				<? } ?>
				</span> 
				<!-- END PAGE NUMBERS -->			
		  <div class="ClearAll"></div>
		</li>
	
		<li class="middle">
		  <ul>	 
			<? $i=1; foreach($comments_array as $comment){ ?>			
<span class="<?php if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? }  ?>" style="width:670px;">
			<li id="comment_<?=$comment['id'] ?>" <? if($comment['approved']=="no"){ ?> style="background:#FAE3EA" <? } ?>> 			
			  <!-- Message Buttons -->
				<strong>			

				<? if($comment['approved']=="no" || $comment['approved']==""){ ?>
					<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/approve.gif" align="absmiddle"><a href="#" onclick="ApproveCommentsPost('<?=$comment['page'] ?>','<?=$comment['id'] ?>','<?=$comment['subpage'] ?>'); return false;"><?=$GLOBALS['_LANG']['_approve'] ?></a><br>
				<? } ?>
					<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/10/manage.gif" align="absmiddle"><a href="<?=$comment['link'] ?>"><?=$GLOBALS['_LANG']['_view'] ?></a><br>
					<img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/delete.gif" align="absmiddle"><a href="#" onclick="Effect.Fade('comment_<?=$comment['id'] ?>'); eMeetingCommentsDelete('<?=$comment['page'] ?>','<?=$comment['id'] ?>','<?=$comment['subpage'] ?>'); return false;"><?=$GLOBALS['_LANG']['_delete'] ?> </a>
				</strong>
							
			  <!-- Message Text -->
				<span> 
				  <a href="<?=DB_DOMAIN ?>mobile.php?dll=profile&pId=<?=$comment['fromid'] ?>"><img src="<?=$comment['image'] ?>" class="thumb-mail"></a> <?=$comment['comments'] ?><br><br>
				  <?=$GLOBALS['_LANG']['_username'] ?> <a href="<?=$comment['user_link'] ?>"><?=$comment['username'] ?></a> <?=$GLOBALS['_LANG']['_date'] ?>: <?=$comment['date'] ?> @ <?=$comment['time'] ?>		  
			  </span>
			</li>		
</span>
			<? $i++; } ?>		
			<? if(empty($comments_array)){ ?>		
			<li class="nomail"> <?=$GLOBALS['LANG_ACCOUNT']['27'] ?></li>		
			<? } ?>		
		  </ul>
		</li>
 
		<li style="margin-top:30px;"> 
			<strong class="smalltext"> 
				<?=$GLOBALS['_LANG']['_sort'] ?>: 
					<a href="#" onclick="UpdateCommentsOrder('comments.date'); return false;"><?=$GLOBALS['_LANG']['_date'] ?></a> 
					<a href="#" onclick="UpdateCommentsOrder('comments.from_uid'); return false;"><?=$GLOBALS['_LANG']['_username'] ?></a> 
					<a href="#" onclick="UpdateCommentsOrder('comments.approved'); return false;"><?=$GLOBALS['_LANG']['_approved'] ?></a> 				
			</strong> 
			
			<span>
				<form method="post" action="<?=DB_DOMAIN ?>mobile.php">
				<input name="do_page" type="hidden" value="mobileaccount" class="hidden">
				<input type="hidden" name="ChangeOrderTotal" value="maildate" id="ChangeOrderTotal" class="hidden">
				<input name="sub" type="hidden" value="comments" class="hidden">
				<input name="type" type="hidden" value="<?=strip_tags($type) ?>" class="hidden">
				<select name="sto" onchange="this.form.submit();" class="input">
						<option value="10"><?=str_replace("%s","10",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="20"><?=str_replace("%s","20",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="30"><?=str_replace("%s","30",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="40"><?=str_replace("%s","40",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="50"><?=str_replace("%s","50",$GLOBALS['_LANG']['_sort6']) ?></option>
	
				</select>
				</form>		
			</span> 
			<div class="ClearAll"></div>
		</li>	
	  </ul>
	</div>
	</div>
	<form method="post" action="<?=DB_DOMAIN ?>mobile.php" name="UpdateComments" id="UpdateComments">
	<input type="hidden" id="ChangeOrder" name="ChangeOrder" value="date" class="hidden">
	<input type="hidden" id="sub" name="sub" value="comments" class="hidden">
	<input name="type" type="hidden" value="<?=strip_tags($type) ?>" class="hidden">
	<input name="do_page" type="hidden" value="mobileaccount" class="hidden">
	</form>










<? }elseif($show_page=="video"){ 

	 /**
	 * Page: Video Message
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


	<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/_flash.js"></script>
	<script type='text/javascript' src='<?=DB_DOMAIN ?>inc/js/swfobject.js'></script>
		
	<? if($GLOBALS['MyProfile']['video_duration'] >0){ ?>
	<p><?=$GLOBALS['_LANG_ERROR']['_videoIntro'] ?></p>
	<? } ?>
	<table width="650"  border="0">
	  <tr><td width="390" style="overflow:hidden;">	
	
	<div id="show1" style="width:390px; height:297;overflow:hidden; display:visible;">
		
	   <SCRIPT language="JavaScript">
			displayeMeeting("<?=DB_DOMAIN ?>inc/exe/flash/video_recorder.swf?&uid=<?=$_SESSION['uid'] ?>&userid=77","380","297",{wmode:"transparent", menu:"false",bgcolor:"#FFFFFF",version:"6,0,47,0",align:"middle"});
		</SCRIPT>
	   
	</div>
	
	<div id="show2" style="display:none">
	

	
	<p align="center"><a href="#" onclick="toggleLayer('show1'); toggleLayer('show2'); return false;">[ <?=$GLOBALS['LANG_GLO_OPTIONS'][43] ?> ]</a></p>
	
	</div>
	
	</td><td width="250" align="center" valign="top" bgcolor="#eeeeee" style="border:1px dashed #999999; padding:10px;">

	<? if($GLOBALS['MyProfile']['video_duration'] == 0){ ?>
	<p><?=$GLOBALS['_LANG_ERROR']['_videoIntro'] ?></p>
	<? }else{ ?>
	  <div id='preview'></div>
	  <script type='text/javascript'>
	  var s1 = new SWFObject('<?=DB_DOMAIN ?>inc/exe/flash/video_player_rtmp.swf','ply','230','180','9','#ffffff');
	  s1.addParam('allowfullscreen','true');
	  s1.addParam('allowscriptaccess','always');
	  s1.addParam('wmode','opaque');
	  s1.addParam('flashvars','file=eMeetingVideo_<?=$_SESSION['uid'] ?>.flv&streamer=<?=FLASH_DOMAIN?>&controlbar=none');
	  s1.write('preview');
	</script>
	<? } ?>

</td></tr></table>

<? if($GLOBALS['MyProfile']['video_duration'] > 0){ ?>
<div id="VideoDelete"></div>
<div style="border:1px dashed #999999; padding:10px; background:#eeeeee; margin-top:10px;"> <a href="#" onClick="DeleteGreetings(); Effect.Fade('show1'); return false;" style="text-decoration:none; font-weight:bold;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_no.png" align="absmiddle"><?=$GLOBALS['LANG_ACCOUNT']['28'] ?></a> </div>
<? } ?>

<? } ?>						