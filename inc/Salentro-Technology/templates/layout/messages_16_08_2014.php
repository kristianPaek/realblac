<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
?>

<script>
jQuery( document ).ready( function() {
		
				jQuery('#formMessage').val("\n \n \n"+jQuery('#formMessage').val() + "\n");
		});


</script>



<? if(isset($show_page) && ( $show_page !="home"  ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">
<div id="eMeeting" class="user">
</div>
<br>
<? } ?>


<img src="/header4.jpg">
<? if($show_page=="home"){ 


	 /**
	 * Page: Messages Overview
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>


<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"> <div style="padding:10px;font-weight:bold;"><h3 style="padding:0px; margin:0px;">
</div>
	
<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:00px;">




<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>



<br><br>
</div>
<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>


<div class="ClearAll"></div>






<? }elseif($show_page=="create"){

	 /**
	 * Page: Create Message
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>


<script src="<?=DB_DOMAIN ?>inc/js/lay/controls.js" type="text/javascript"></script>



	<!-- ****************** UPLOAD WAITING / LOADING SCREEN ************** -->
	<div id="UploadWait"> 
	<ul class="form"> 
	<div class="CapBody">	
		<p><strong><?=$GLOBALS['LANG_MESSAGES']['a3'] ?></strong></p>
		<p><?=$GLOBALS['LANG_MESSAGES']['a4'] ?></p>
		<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_gal/loading.gif"></p>
	</div>
	</ul>
	</div>
	<!-- **************************************************************** --> 

<div id="SendMsgBoxDiv" style="display:visible;">


 
<div class="CapBody" style="padding:0px; margin-top:20px;">
<!-- END BOX -->
<form method="post" action="<?=DB_DOMAIN ?>index.php?dll=messages&sub=inbox"  onSubmit="return CheckNullsMessages();" enctype="multipart/form-data">

		<div id="Display_Message">
			
			
			<input name="do" type="hidden" value="add" class="hidden">
			<input name="do_page" type="hidden" value="messages" class="hidden">
			<input name="sub" type="hidden" value="create" class="hidden">
			<input name="addCardID" id="addCardID" type="hidden" value="0" class="hidden">
			<input type="hidden" value="1" name="StopConfigStrip"/>

<? if (D_FRIENDS == 1) { ?>
			<!-- DISPLAY FRIENDS FOR QUICK ADD -->
			
			<!-- END QUICK ADD -->

<? } ?>
		
			<!-- DISPLAY MESSAGE BOX -->
			<div style="width:350px;overflow:hidden; margin-left:30px;">
			<ul class="form"> 
				<li><label><?=$GLOBALS['_LANG']['_username'] ?>: </label><input name="to" id="SendTo" size="35" style="width:325px" type="text" class="input" autocomplete="off" value="<? if (isset($msg_to)) { print eMeetingOutput($msg_to); } ?>">
				<div class="tip"><?=$GLOBALS['LANG_MESSAGES']['a6'] ?></div><div id="update" style="display: none; position:relative;"></div>
				</li>

				<li><label><?=$GLOBALS['_LANG']['_subject'] ?>: </label><input name="subject" id="SentSubject" type="text" size="35" class="input" style="width:325px" value="<? if (isset($msg_subject)) { print $msg_subject; }  if (isset($_GET['msg_subject'])) { print eMeetingInput($_GET['msg_subject']); } if (isset($_POST['msg_subject'])) { print eMeetingInput($_POST['msg_subject']); } ?>"></li>
				<li><label><?=$GLOBALS['_LANG']['_message'] ?></label><textarea name='message' id="formMessage" rows=20 class="input" style="width:325px !important;"><? if (isset($msg_content)) { echo  eMeetingInput($msg_content); } if(isset($_GET['msgid'])) {  echo GetMsgChainData($_GET['msgid']); }  ?></textarea>
				<? if(D_MESSAGE_CARDS ==1){ ?>				
				<div>
									<li><input value="<?=$GLOBALS['LANG_COMMON'][9] ?>" type="submit" class="MainBtn"></li>
<br />

					<input type="image" src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/ecard.gif" onclick="toggleLayer('eCard'); return false;"><br /><br />
					<input type="image" src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/ephoto.gif" onclick="toggleLayer('eFiles'); return false;">
				</div>
				<? } ?>
				</li>
				<li style="display:none" id="eFiles"><label>Attach Private Photos</label>
				<input name="uploadFile00" type="file" id="uploadFile00" class="input"><br>
				<input name="uploadFile01" type="file" id="uploadFile01" class="input"><br>
				<input name="uploadFile02" type="file" id="uploadFile02" class="input">
				<input name="uploadFile03" type="file" id="uploadFile03" class="input">
				</li>		
					
			</ul>
			<!-- attached ecard alert -->
			<div id="response_ecard" class="response_alert"></div>
			<!-- end alert -->
			</div>
			
			
	</div>
	</div>		<!-- END MESSAGE BOX -->
		
		<!-- DISPLAY MESSAGE ECARD OPTIONS -->
		<div class="msgOptions" style="display:none" id="eCard">
		  <table width="500" border="0" cellpadding="5" cellspacing="5">
			  <tr> 
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/1.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/2.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/3.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/4.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
			  </tr>
			  <tr align="center"> 
				<td height="25"> <input name="addCard" type="radio" value="1" onclick="AttCard(1); toggleLayer('eCard'); return false;"></td>
				<td> <input type="radio" name="addCard" value="2"  onclick="AttCard(2); toggleLayer('eCard'); return false;"></td>
				<td> <input type="radio" name="addCard" value="3"  onclick="AttCard(3); toggleLayer('eCard'); return false;"></td>
				<td> <input type="radio" name="addCard" value="4"  onclick="AttCard(4); toggleLayer('eCard'); return false;"></td>
			  </tr>
			  <tr> 
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/5.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/6.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/7.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/8.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
			  </tr>
			  <tr align="center"> 
				<td height="25"> <input type="radio" name="addCard" value="5"  onclick="AttCard(5); toggleLayer('eCard'); return false;"></td>
				<td> <input type="radio" name="addCard" value="6"  onclick="AttCard(6); toggleLayer('eCard'); return false;"></td>
				<td> <input type="radio" name="addCard" value="7"  onclick="AttCard(7); toggleLayer('eCard'); return false;"></td>
				<td> <input type="radio" name="addCard" value="8"  onclick="AttCard(8); toggleLayer('eCard'); return false;"></td>
			  </tr>
			  <tr align="center"> 
				<td height="25"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/9.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/10.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/11.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
				<td><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/cards/12.jpg" width="120" height="163" style="border: 1px solid #333333"></td>
			  </tr>
			  <tr align="center">
				<td height="25"><input type="radio" name="addCard" value="9"  onclick="AttCard(9); toggleLayer('eCard'); return false;"></td>
				<td><input type="radio" name="addCard" value="10"  onclick="AttCard(10); toggleLayer('eCard'); return false;"></td>
				<td><input type="radio" name="addCard" value="11"  onclick="AttCard(11); toggleLayer('eCard'); return false;"></td>
				<td><input type="radio" name="addCard" value="12"  onclick="AttCard(12); toggleLayer('eCard'); return false;"></td>
			  </tr>
		  </table>
		</div>

</form>
</div>

<script type="text/javascript">
new Ajax.Autocompleter('SendTo','update','<?=DB_DOMAIN ?>inc/exe/Responce/response.php', { tokens: ','} );
</script>












<? }elseif($show_page=="inbox"){ 


	 /**
	 * Page: Message Inbox
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */
 
?>






	<div id="eMeetingContentBox">

	<div id="Title">

		<span class="a1"><?=$PageTitle ?></span>
		<span class="a2"><?=$PageDesc ?></span>
	</div>
	<div id="Search">
		<span class="a1">
			<form method="post" action="<?=DB_DOMAIN ?>index.php" id="MessageDisplayTotal">
			<input name="do_page" type="hidden" value="messages" class="hidden">
			<input type="hidden" name="ChangeOrderTotal" value="maildate" id="ChangeOrderTotal" class="hidden">
			<input name="sub" type="hidden" value="<?=$selected_page ?>" id="sub" class="hidden">
			<select name="sto" onchange="location.href='index.php?dll=messages&sub='+this.value;" style="width:150px;font-size:12px;">
					<option value="inbox" <? if(isset($sub_page) && $sub_page=="index"){ print "selected"; } ?>><?=$LANG_MESSAGES_MENU['inbox'] ?> (<?=$MailCount[1]['total'] ?>)</option>

<? if(D_WINK ==1){ ?>

					<option value="wink" <? if(isset($sub_page) && $sub_page=="wink"){ print "selected"; } ?>><?=$LANG_MESSAGES_MENU['wink'] ?> (<?=$MailCount[2]['total'] ?>)</option>

<? } ?>

					<option value="sent" <? if(isset($sub_page) && $sub_page=="sent"){ print "selected"; } ?>><?=$LANG_MESSAGES_MENU['sent'] ?> (<?=$MailCount[3]['total'] ?>)</option>
					<option value="trash" <? if(isset($sub_page) && $sub_page=="trash"){ print "selected"; } ?>><?=$LANG_MESSAGES_MENU['trash'] ?> (<?=$MailCount[4]['total'] ?>)</option>
			
			</select> - 
			<select name="sto" onchange="this.form.submit();" style="width:150px;font-size:12px;">
					<option value="10"><?=str_replace("%s","10",$GLOBALS['_LANG']['_sort6']) ?></option>
					<option value="20"><?=str_replace("%s","20",$GLOBALS['_LANG']['_sort6']) ?></option>
					<option value="30"><?=str_replace("%s","30",$GLOBALS['_LANG']['_sort6']) ?></option>
					<option value="40"><?=str_replace("%s","40",$GLOBALS['_LANG']['_sort6']) ?></option>
					<option value="50"><?=str_replace("%s","50",$GLOBALS['_LANG']['_sort6']) ?></option>
			</select>


			</form>		
 	</span>
	<span class="a2"><?=$Search_Page_Numbers ?></span>
	</div>
	<div id="Results"> 
		<span class="a1"> 	
			<? if(($show_page_current) > 1){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=<?=$selected_page ?>&sta=<?=$show_page_prev?><?=$show_page_rows?>&cpage=<?=$show_page_current-1; ?>"><</a>
			<? } ?>  
			 <?=$GLOBALS['_LANG']['_page'] ?> <?=$show_page_current ?> <?=$GLOBALS['_LANG']['_of'] ?> <?=$show_page_num_of ?>		
			<? if($show_page_current < $show_page_num_of){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=<?=$selected_page ?>&sta=<?=$show_page_next?><?=$show_page_rows?>&cpage=<?=$show_page_current+1; ?>">></a>
			<? } ?> 
		</span>
		<span class="a2"><font color="#802A2A"> Sort by: </font><a href="#" onclick="UpdateMailOrder('<?=$selected_page ?>','maildate'); return false;"><font color="#802A2A">Date</font></a> | <a href="#" onclick="UpdateMailOrder('<?=$selected_page ?>','mailnum'); return false;"><font color="#802A2A">Username</font></a> | <a href="#" onclick="UpdateMailOrder('<?=$selected_page ?>','mail_subject'); return false;"><font color="#802A2A">Subject</font></a> </span>
	</div>


	
	<form method="post" action="<?=DB_DOMAIN ?>index.php" name="MessagesBox" id="MessagesBox">
	<input name="do" type="hidden" value="delete" class="hidden">
	<input name="do_page" type="hidden" value="messages" class="hidden">
	<input name="sub" type="hidden" value="<?=$selected_page ?>" class="hidden">
	  
	<table width="100%"  border="0" style="background:#eeeeee;font-size:11px;">
	  <tr>
		<td width="4%"></td>
		<td width="14%" align="center"><?=$GLOBALS['_LANG']['_username'] ?></td>
		<td width="57%"><?=$GLOBALS['_LANG']['_subject'] ?></td>
		<td width="13%"></td>
		<td width="12%"></td></tr>
	</table>

	<? $i=1; foreach($message_array as $value){ ?>
	
	<table width="100%"  border="0" id="msg<?=$value['id'] ?>" style="height:65px;" <?php if($i % 2){ ?>class="search_display_off"<? }else{ ?>class="search_display_on"<? } ?>>
	  <tr>
		<td width="4%" align="center"><input name="d<?=$i ?>" type="checkbox" value="on"><input type="hidden" name="di<?=$i ?>" value="<?=$value['id'] ?>"></td>
		<td width="14%" align="center"><a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$value['senderid'] ?>"><img src="<?=$value['image']; ?>" width="48" height="48"></a></td><td width="57%">
	
		<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=read&msgid=<?=$value['id'] ?>" class="msgTitle"><?=$value['subject'] ?>

<? if($value['attachment'] =="yes"){ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/photo.png" align="absmiddle"> <? }  ?>
</a><br>
		
		<a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$value['senderid'] ?>" class="msgSub" style="text-decoration:none; font-size:11px;"> <? if(isset($_REQUEST['sub']) && $_REQUEST['sub'] !="sent"){ ?><?=$GLOBALS['_LANG']['_username'] ?>:<? }else{ ?><?=$GLOBALS['LANG_MESSAGES']['a21'] ?>: <? } ?> <?=$value['from'] ?> </a> -
		<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=read&msgid=<?=$value['id'] ?>" class="msgSub"  style="text-decoration:none; font-size:11px;"><?=$GLOBALS['_LANG']['_date'] ?>: <?=$value['date'] ?> @ <?=$value['time'] ?> </a> 
 
		
	
	</td><td width="13%">
<?=$value['status'] ?>
</td><td width="12%" style="line-height:30px;">
	
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/read.gif" align="absmiddle"><a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=read&msgid=<?=$value['id'] ?>"><?=$GLOBALS['_LANG']['_read'] ?></a><br>
	
	<? if(isset($_REQUEST['sub']) && $_REQUEST['sub'] != "sent"){ ?>
	<img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/reply.gif" align="absmiddle"><a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=create&n=<?=$value['from'] ?>&msgid=<?=$value['id'] ?>&msg_subject=RE:<?=str_replace("'", "",$value['subject']); ?>"><?=$GLOBALS['_LANG']['_reply'] ?></a><br>
	<? } ?>	

	</td></tr></table>

	<? $i++; } ?>	

	<? if(empty($message_array)){ ?><div align="center" style="height:100px; line-height:100px;"><h1><?=$lang_messages_page['a36'] ?> </h1></div><? } ?>	

	<input type="hidden" name="totalMail" value="<?=$i ?>">			
	</form>

	<div id="Bottom" style="background:#eeeeee;">

	<? if(!empty($message_array)){ ?>

		<div style="float:left; font-size:12px; padding:8px;">
		
					<a href="javascript:void(0)" onClick="da(<?=$i ?>);return false;" class="NormBtn"><?=$GLOBALS['_LANG']['_selectAll'] ?></a> <a href="javascript:void(0)" onClick="du(<?=$i ?>);return false;" class="NormBtn"><?=$GLOBALS['_LANG']['_deselectAll'] ?></a> <a href="javascript:void(0)" onClick="javascript:document.MessagesBox.submit(); return false;" class="MainBtn"><?=$GLOBALS['_LANG']['_delete'] ?></a>
		
		</div>

		<div style="float:right; padding:10px; font-size:12px; font-weight:bold;">
		
					<? if(($show_page_current) > 1){ ?>
					<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=<?=$selected_page ?>&sta=<?=$show_page_prev?><?=$show_page_rows?>&cpage=<?=$show_page_current-1; ?>"><</a>
					<? } ?>  
					 <?=$GLOBALS['_LANG']['_page'] ?> <?=$show_page_current ?> <?=$GLOBALS['_LANG']['_of'] ?> <?=$show_page_num_of ?>		
					<? if($show_page_current < $show_page_num_of){ ?>
					<a href="<?=DB_DOMAIN ?>index.php?dll=messages&sub=<?=$selected_page ?>&sta=<?=$show_page_next?><?=$show_page_rows?>&cpage=<?=$show_page_current+1; ?>">></a>
					<? } ?> 
		</div>

	<? } ?>

	</div>

	</div> <!-- end main box -->




<form method="post" action="<?=DB_DOMAIN ?>index.php" name="UpdateMail">
<input type="hidden" id="ChangeOrder" name="ChangeOrder" value="maildate" class="hidden">
<input type="hidden" id="sub" name="sub" value="<?=$selected_page ?>" class="hidden">
<input name="do_page" type="hidden" value="messages" class="hidden">
</form>








<? }elseif($show_page=="read"){ 

	 /**
	 * Page: Messages Read
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>



<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;font-weight:bold;"> <h3 style="padding:0px; margin:0px;">
<?=$msgdata[1]['subject'] ?> </div>
<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:0px;">


<!-- DISPLAY MESSAGE -->
<div id="Display_Message">
	<div id="messages_read" class="small">
		<a href="<?=DB_DOMAIN ?>index.php?dll=profile&pId=<?=$msgdata[1]['senderid']; ?>"><img src="<?=$msgdata[1]['image']; ?>&x=150&y=150" height="150" width="150" class="preview"></a>
		<span>
			
			<p style="line-height:20px;word-wrap:break-word;"><?=$msgdata[1]['message']; ?></p> <i>This message was sent on <?=$GLOBALS['_LANG']['_date'] ?> <?=$msgdata[1]['date']; ?></i></p>	
						
		</span>
		<div class="ClearAll"></div>
	</div>
</div>

<!-- DISPLAY EXTRA IMAGES -->
<div style="margin-left:25px;">
<? $i=1; if(is_array($msgdata[1]['image_array'])){ foreach($msgdata[1]['image_array'] as $img){ ?>
<? if($i ==5){ ?><div class="galleryviewright"> <? }else{ ?> <div class="galleryviewleft"><? } ?>	
<div id="gallery_search"><a href="#" onclick="popUpWin('<?=WEB_PATH_IMAGE.$img['name'] ?>'); return false;"><img src="<?=WEB_PATH_IMAGE_THUMBS.$img['name'] ?>" class="thumb"></a></div>
</div>
<? $i++; if($i==5){$i=1;}  }} ?>
</div>
<div class="ClearAll"></div>
<!-- END EXTRA IMAGES -->
<div >
		
		<span style="float:right">  </span>
		<span style="float:right">
		<input value="<?=$GLOBALS['LANG_BODY'][_reply] ?>" class="MainBtn" type="button" onclick="javascript:location.href='index.php?dll=messages&sub=create&n=<?=$msgdata[1]['username']; ?>&msgid=<?=$msgdata[1]['id']; ?>&msg_subject=RE:<?=str_replace("'", "",$msgdata[1]['subject']); ?>'">
  </span>
		 <div class="ClearAll"></div>
</div>
<!-- END DISPLAY -->

<br><br>
</div>
<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>


<div class="ClearAll"></div>
<? } ?>