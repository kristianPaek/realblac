
<?php if(!isset($_REQUEST['p']) || $_REQUEST['p']==""){ ?>


	<br class="clear">
	<div class="bar_save">
	<input type="button" value="Add New Field" class="MainBtn" onClick="javascript:location.href='?p=addfields'"/>
	<input type="button" value="Add Group" class="MainBtn" onClick="javascript:location.href='?p=addgroups'"/>
	<input type="button" value="<?=$admin_management[1] ?>" class="MainBtn" onClick="javascript:location.href='?p=fieldgroups'"/>
	<br class="clear">
	</div>
	<br class="clear">
	
	<form action="management.php" method="post" name="profile" onSubmit="return CheckMemberForm();">
	<input name="do" type="hidden" value="none" id="do" class="hidden">
	
	<ul class="form"><div class="box_body"><?php $tRows =DisplayFieldGroups(); ?></div></ul>
	
	<br class="clear">
	<div id="options" style="display:none;">
	
		<div class="bar_save">
		<input type="button" value="<?=$admin_button_val[1] ?>" class="NormBtn" onClick="ca(<?=$tRows ?>)"/>
		<input type="button" value="<?=$admin_button_val[2] ?>" class="NormBtn"  onClick="ua(<?=$tRows ?>)"/> - 
		<input type="button" value="<?=$admin_button_val[5] ?>" class="MainBtn"  onclick="ChangeOption('fielddelete');"/> 
		</div>

		 
	
	</div>
	</form>





<?php }elseif($_REQUEST['p']=="groups"){ ?>


	<div id="AddGroup" style="display:<?php if(isset($_REQUEST['id'])){ ?>visible; <?php }else{ ?>none; <?php } ?>">
	<form action="management.php" method="post" enctype="multipart/form-data">
	<input name="p" type="hidden" value="groups" class="hidden">
	<?php if(isset($_REQUEST['id'])){ $data = Getcatd($_REQUEST['id']); ?> <input type="hidden" name="editid" value="<?=$_REQUEST['id'] ?>" class="hidden">    <?php } ?>
	<input type="hidden" name="do" value="groupaddcat" class="hidden">
	<input type="hidden" name="lang" value="english" class="hidden">

	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[2] ?>: </label>
	<div class="tip">This is the name of the group, such as 'Food and Drink', or 'Bars and Resturants'.</div>
	<input name="title" type="text" class="input" value="<?php if(isset($data)){ print $data['name']; } ?>" size="40">		
	</li>

	
	<li><label>Upload Group Icon:</label>
	<div class="tip">This is an image to display next to the group name on your website.</div>
	<input name="LogoUpload" type="file" class="input"></li>
	
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	<?php if(isset($data) && $data['photo'] !=""){ ?>
	<li><label>Current Icon</label></li>
	<img src="../uploads/files/<?=$data['photo'] ?>">
	<?php } ?>
	</div></ul>
	</form>
	</div>


	<div class="bar_save">
	<input type="button" value="Add New Group" class="MainBtn" onClick="javascript:idShowHide('AddGroup');"/>
	<br class="clear">
	</div>
 

	<div id="TableViewer"></div>
	
 
 

<?php }elseif($_REQUEST['p']=="articlecats"){ ?>





	<div id="AddDiv" style="display:<?php if(isset($_REQUEST['id'])){ ?>visible; <?php }else{ ?>none; <?php } ?>">
	<form method="post" action="management.php" name="form1">
	<input name="p" type="hidden" value="articlecats" class="hidden">
	
	<?php if(isset($_REQUEST['id'])){ ?>
	<input name="editid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
	<?php } ?>
	<input name="do" type="hidden" value="catadd" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[8] ?>: </label>
	<div class="tip">Enter a name for your new article category such as 'Latest News'.</div>
	<input type="text" class="input" name="name" value="<?php if(isset($_REQUEST['id'])){ print $_REQUEST['name']; } ?>" size="45">
		
	</li>
	<?php if(isset($_REQUEST['id'])){ ?><li><label><?=$admin_management[9] ?>: </label>
	<div class="tip">Update this value if the total number of articles counter is incorrect.</div>
	<input type="text" class="input" name="count" value="<?php print $_REQUEST['c']; ?>">
	</li><?php } ?>
	
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>

	<div class="bar_save">
	<input type="button" value="Add New Category" class="MainBtn" onClick="javascript:idShowHide('AddDiv');"/>
	<br class="clear">
	</div>



	<div id="TableViewer"></div>
 






<?php }elseif($_REQUEST['p']=="articleadd"){ ?>





<form method="post" action="management.php" name="form1">
<input name="do" type="hidden" value="articleadd" class="hidden">
<input name="p" type="hidden" value="articles" class="hidden">
<input type="hidden" value="1" name="StopConfigStrip">
<?php if(isset($_REQUEST['id'])){ $e= GetArticleData($_REQUEST['id']); ?>
<input name="editid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
<input name="views" type="hidden" value="<?=$e['views'] ?>" class="hidden">
<?php } ?>
<ul class="form"><div class="box_body">					

        <li><label><?=$admin_management[11] ?>: </label>
		<div class="tip">Select which category to save this article to.</div>
		<select name="catid" class="input"><?=DisplayArtCats($e['cat_id']) ?></select></li>       
		</div></ul><ul class="form"><div class="box_body">	
        <li><label>Title: </label> <input name="title" type="text" class="input" value="<?=$e['title'] ?>" style="width:470px;">
		<div class="tip">Create a title for your article</div></li>
		<li><label><?=$admin_management[13] ?>: </label><textarea class="input" name="short" style="width:470px; height:60px;"><?=$e['short'] ?></textarea></li>
		</div></ul><ul class="form"><div class="box_body">	
		<li><label><?=$admin_mainten_extra[1] ?>: </label> 
		<div class="tip"><?=$admin_mainten_extra[2] ?></div>
		<input name="link" type="text" class="input" value="<?=$e['link'] ?>" style="width:470px;"></li>
		<li><?php print displayTextArea($e['content']); ?></li>	
		<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>        
</div></ul>
</form>




<?php }elseif($_REQUEST['p']=="articlerss"){ ?>


	<form method="post" action="management.php" name="form1">
	<input name="do" type="hidden" value="articlerss" class="hidden">
	<input name="p" type="hidden" value="articles" class="hidden">
	<ul class="form"><div class="box_body">	
			<li><label><?=$admin_management[11] ?>: </label><select name="catid"><?=DisplayArtCats() ?></select></li>       
			<li><label>RSS <?=$admin_mainten_extra[1] ?>: </label> <input name="rss" type="text" class="input" style="width:470px;"></li>
			<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>        
	</div>
	</ul>
	</form>  



<?php }elseif($_REQUEST['p']=="articles"){ ?>



	<div class="bar_save">
	<input type="button" value="<?=$admin_management[14] ?>" class="NormBtn" onClick="javascript:location.href='?p=articleadd'"/>
	<input type="button" value="Import RSS Newsfeed Data" class="NormBtn" onClick="javascript:location.href='?p=articlerss'"/>
	<input type="button" value="<?=$admin_management[15] ?>" class="NormBtn" onClick="javascript:location.href='?p=articlecats'"/>
	<br class="clear">
	
	</div>

	<div id="TableViewer"></div>

 
<?php }elseif($_REQUEST['p']=="fieldlist" && isset($_REQUEST['list']) && $_REQUEST['list']=="1"){ ?>
<script>

function ShowTranslation(name){
	if(name !="english.php"){
		idShowHide('TT');
	}
}
</script>

<p id='TopCommentsBox'> <img src='inc/images/icons/help.png' align='absmiddle' /> 

Listed below are all the items for the list box. You can create new items, delete existing ones and reorder them to suit your needs.</p>


	<div id="AddListItem" style="display:none;">
	<form method="post" action="management.php" name="form1">
	<input name="editid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
	<input name="do" type="hidden" value="fieldaddlist" class="hidden">
	<input type="hidden" name="order" value="0">	

	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[8] ?>: </label>
	<div class="tip">Enter a caption for your listbox field, if you would like to add multiple captions in one go, simply seperate each caption with a comma. For example, caption 1, caption 2, etc </div>
	<textarea cols="" rows="" class="input" name="caption" style="width:300px; height:150px;"></textarea>
	</li> 
	
	<?php if(isset($_GET['linkID']) && is_numeric($_GET['linkID']) ){ ?>
	<input type="hidden" name="LASTLINKEDID" value="<?=$_GET['linkID'] ?>">	
	<li><label>Linked With:</label>
	<div class="tip">If you wish to translate a field, simply select the language from the listbox above.</div>
	<select name="linked_id"><?=LinkFieldList($_GET['linkID']) ?></select>	
	</li>
	<?php } ?>

	<li><label><?=$admin_management[18] ?>:</label>
	<div class="tip">If you wish to translate a field, simply select the language from the listbox above.</div>
	<select name="lang" onChange="ShowTranslation(this.value);"><?=FieldLangs() ?></select>	
	</li>
	<li><span id="TT" style="display:none;">
	<label>Transaltion for caption:</label>
	<div class="tip">Now select which field this new caption is a translation for.</div>
	<select name="capEdit"><option value="0">---------------------</option><?=FieldCapp($_REQUEST['id']) ?></select>	
	</span></li>
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>


	<div class="bar_save">
	<input type="button" value="Add New Item" class="MainBtn" onClick="javascript:idShowHide('AddListItem');"/>
	<br class="clear">
	</div>
	
	<br class="clear">
	<div id="header-text">
		<h1><?=$admin_management[19] ?></h1>
	</div>
	

	<div id="TableViewer"></div>
 

<?php }elseif($_REQUEST['p']=="addfields"){



 ?>
 



	<form method="post" name="form1" action="management.php">
	<input name="do" type="hidden" value="fieldadd" class="hidden">
	<input name="f4" type="hidden" value="2" class="hidden">
	<input name="f1" type="hidden" value="" class="hidden">

	<? if(isset($_GET['id'])){ 
	$data = $DB->Row("SELECT * FROM field WHERE fid='".$_GET['id']."' LIMIT 1");
	?>
	<input name="editid" type="hidden" value="<?=$_GET['id'] ?>" class="hidden">
	<? } 
	if(!isset($data['groupid'])){ $data['groupid']=0; }
	?>
			

	<? if(!isset($_GET['id'])){ ?>
	<ul class="form"><div class="box_body"> 
		<li><label><?=$admin_management[21] ?></label>
	<div class="tip">This is a name for your field. For example. 'Gender' or 'Height'. Its recommended to keep this field short as you can add more information to the description later.</div>
	<input name="f2" type="text" class="input" size="40">
	</li></div></ul>
	<? } ?>

	<ul class="form"><div class="box_body"> 
	
	<li><label><?=$admin_management[22] ?></label>
	<div class="tip">Field type allows you to select what type of field will be created. Each field has different display options.</div>
				  <select name="f3"  class="input" onChange="ShowLinked(this.value);">
					<option value="1" <? if(isset($data) && $data['fType'] =="1"){ print "selected";} ?>>- <?=$admin_management[23] ?></option>
					<option value="2" <? if(isset($data) && $data['fType'] =="2"){ print "selected";} ?>>- <?=$admin_management[24] ?></option>
					<option value="3" <? if(isset($data) && $data['fType'] =="3"){ print "selected";} ?>>- <?=$admin_management[25] ?></option>
					<option value="4" <? if(isset($data) && $data['fType'] =="4"){ print "selected";} ?>>- <?=$admin_management[26] ?></option>
					<option value="5" <? if(isset($data) && $data['fType'] =="5"){ print "selected";} ?>>- <?=$admin_management[27] ?></option>
					<!--<option value="6">- Input Field </option>-->
					<option value="7" <? if(isset($data) && $data['fType'] =="7"){ print "selected";} ?>>- Birthday (Age) Field </option>
					<!--<option value="8">- Date Field</option> -->
					 

				  </select>
	</li>
	<? if(!isset($_GET['id'])){ ?>
	</div></ul><ul class="form"><div class="box_body"> 
	<li><label><?=$admin_management[18] ?>: </label>
	<div class="tip">Select the base language for this field. You can create captions in different languages later.</div>
	<select class="input" name="lang"><?=FieldLangs() ?></select></li>
	<? } ?>
	</div></ul><ul class="form"><div class="box_body"> 
	<li><label><?=$admin_management[28] ?></label>
	<div class="tip">Select which group headline to save this field under.</div>
	<select class="input" name="groupid"><option value="0"><?=$admin_management[30] ?></option><?= DisplayGroups($data['groupid']) ?></select></li>
	<!--<li><label><?=$admin_management[29] ?> </label><input name="req" type="checkbox" value="1" class="radio"></li> -->
	<li><input type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>"></li>
	</div></ul>
	</form>
	








  
<?php }elseif($_REQUEST['p'] =="addgroups"){  ?>


 
	<form method="post" action="management.php" name="form1">
	<?php if(isset($_REQUEST['e'])){ $group = GetGroup($_REQUEST['e']); ?><input type='hidden' class='hidden' name='eid' value='<?=$_REQUEST['e'] ?>'><?php } ?>
	<input name="do" type="hidden" value="fieldaddgroup" class="hidden">
	<input type="hidden" name="p" value="fieldgroups" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[2] ?>: </label>
	<div class="tip">This is the title of your group, such as "About Me" or "My Hobbies".</div>
	<input type="text" class="input" name="caption" value="<?php if(isset($group)){ print $group['caption']; } ?>"size="40"></li>
	
	</div></ul><ul class="form"><div class="box_body">
	<li><label><?=$admin_management[32] ?>:</label>
	<div class="tip">The display options allow you to choose which members can view the fields you add to this group. This allows you to personalise your field groups. 
	For example you can create a field group for females only and add fields directly related to females such as bra size and fav. makup brand.</div>
	
	
				  <select name="private" class="input">
					<option value="0" <?php if(isset($group)){ if($group['private']=="0"){print "selected"; } } ?>><?=$admin_management[34] ?></option>
					<option value="1" <?php if(isset($group)){ if($group['private']=="1"){print "selected"; } } ?>><?=$admin_management[35] ?></option>
					<option value="2" <?php if(isset($group)){ if($group['private']=="2"){print "selected"; } } ?>><?=$admin_management[36] ?></option>
					<?
				$result = $DB->Query("SELECT fvid, fvCaption, fvOrder, lang FROM field_list_value WHERE fvFid =28 ORDER BY fvOrder ASC");
				while( $list = $DB->NextRow($result) )
				{
				?>
						<?php if(isset($group) && $group['private']==$list['fvid']){ ?>
						<option value="<?=$list['fvid'] ?>" selected><?=$list['fvCaption']?> <?=$admin_management[37] ?></option>
						<?php }else{ ?>
						<option value="<?=$list['fvid'] ?>"><?=$list['fvCaption']?> <?=$admin_management[37] ?></option>
						<?php } ?>
						
					<?php } ?>
				
	</select></li>
	<li><input  type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>"></li>
	</div></ul>
	</form>



<?php }elseif($_REQUEST['p'] =="fieldgroups"){  ?>



	<br class="clear"><div class="bar_save">
	<input type="button" value="Add New Field" class="MainBtn" onClick="javascript:location.href='?p=addfields'"/>
	<input type="button" value="Add Group" class="MainBtn" onClick="javascript:location.href='?p=addgroups'"/>
	<br class="clear"></div><br class="clear">
	
	
	<div id="TableViewer"></div> 


<?php }elseif($_REQUEST['p'] =="fieldeditmove"){ ?>

<p id='TopCommentsBox'> <img src='inc/images/icons/help.png' align='absmiddle' /> 

Often you may decide that a field belongs within a different group. Select the new group below and your field will be moved to this group.</p>


      <form method="post" action="management.php" name="form1">
        <input name="cid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
        <input name="do" type="hidden" value="fieldchangecaption" class="hidden">
		<ul class="form"><div class="box_body">		
         <li><label><?=$admin_management[48] ?>:</label>
		 <div class="tip">Select the new group you would like to move this field too.</div>
	     <select name="groupid"><?= DisplayGroups($_GET['G1']) ?></select>


		<li><label>Share field with this group:</label>
		 <div class="tip">You can select upto 3 groups to share the same field</div>
	     <select name="groupid1"><?= DisplayGroups($_GET['G2']) ?></select>

		<li><label>Share field with this group:</label>
		 <div class="tip">You can select upto 3 groups to share the same field</div>
	     <select name="groupid2"><?= DisplayGroups($_GET['G3']) ?></select>

		</li><li><input type="submit" name="Submit3" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li></div></ul>
		</form>


<?php }elseif($_REQUEST['p'] =="fieldedit"){ ?>

<p id='TopCommentsBox'> <img src='inc/images/icons/help.png' align='absmiddle' /> 

A display caption is a short description of the content you would like members to enter into the field. For example a caption such as "My Height" would prompt the member to select their height from the list box.</p>




	<div id="AddCaptionHide" style="display:none;">
	<form method="post" action="management.php" name="form1">
	<input name="cid" type="hidden" value="<?= $_REQUEST['id'] ?>" class="hidden">
	<input name="do" type="hidden" value="fieldaddcaption" class="hidden">
	<input name="match" type="hidden" value="yes" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[41] ?>:  </label><input name="caption" type="text" class="input"size="40"></li>
	<li><label><?=$admin_management[42] ?>:  </label><textarea class="input" name="description" style="height:60px;"></textarea></li>
	<!--<li><label><?=$admin_management[43] ?>:  </label><select name="match"><option value="yes"><?=$admin_management[44] ?></option><option value="no" selected><?=$admin_management[45] ?></option></select> <div class="tip"><?=$admin_management[46] ?></div></li> -->
	
	<li><label><?=$admin_management[18] ?>:</label><select name="lang"><?=FieldLangs() ?></select></li>
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>

	<br class="clear">
	<div class="bar_save">
	<input type="button" value="Add New Caption" class="MainBtn"  onclick="javascript:idShowHide('AddCaptionHide');"/>
	</div>

<br class="clear">
<div id="header-text">
	<h1><?=$admin_management[47] ?></h1>
</div>


<div id="TableViewer"></div>
 
			

<?php }elseif($_REQUEST['p']=="cal"){ ?>

 
	


	<div class="bar_save">
	<input type="button" value="Manage Event Types" class="MainBtn" onClick="javascript:location.href='?p=caladdtype'"/>
	<?php if(EVENTFUL_USERNAME !="" && EVENTFUL_PASSWORD !=""){ ?><input type="button" value="Import Event" class="MainBtn" onClick="javascript:location.href='?p=importcal'"/><?php } ?>

	</div> 

	<div id="TableViewer"></div>



  
 
<?php }elseif($_REQUEST['p']=="caladd"){ ?>



	<form method="post" name="MemberSearch" action="management.php" enctype="multipart/form-data"> 
	<?php if(isset($_REQUEST['eid'])){ ?>
	<input name="do" type="hidden" value="editcal" class="hidden">
	<input name="eid" type="hidden" value="<?=$_REQUEST['eid'] ?>" class="hidden"><?php $data = EditThis($_REQUEST['eid']);  ?><?php }else{ ?><input name="do" type="hidden" value="addcal" class="hidden"><?php } ?>          
	<input name="p" type="hidden" value="cal" class="hidden">
	<script type="text/javascript" src="<?=subd ?>inc/js/_country.js"></script>
	<script src="<?=subd ?>inc/js/_calendar.js"></script>

	<div id="OldMatch">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[49] ?></label>
	<div class="tip">Enter the ID of the user who created this event. Leave blank or add 0 to create an admin entry.</div>
	<input type="text" class="input" name="mem_uid" size="40" maxlength="255" value="<?php if(isset($data)){ print $data['uid']; } ?>"></li>

</div></ul><ul class="form"><div class="box_body">


<li><label><?=$admin_management[52] ?></label>
<div class="tip">Select the category that this event will be placed under.</div>
<select class="input" name="category"><?=DisplayCalCatsID($data['type_1']) ?></select></li>

</div></ul><ul class="form"><div class="box_body">

<li><label>Event Photo Icon</label>
<div class="tip">Select a new icon to replace the existing one.</div>
<input name="LogoUpload" type="file" class="input">
<?php if(isset($data) && $data['photo'] !=""){ ?>
<li><label>Current Icon</label></li>
<img src="../uploads/files/<?=str_replace("&t=f","",$data['photo']) ?>">
<li><input name="removeicon" type="checkbox" value="1"> Remove Photo</li>
<?php }else{ ?> 
There is no existing icon.
<?php } ?>
</li>

</div></ul><ul class="form"><div class="box_body">


	<li><label><?=$admin_management[50] ?></label><input type="text" class="input" name="name" size="60" maxlength="255" value="<?php if(isset($data)){ print $data['shortevent']; } ?>"></li>
	<li><label><?=$admin_management[51] ?></label><textarea class="input" name="comment" style="height:150px; width:480px"><?php if(isset($data)){ print $data['longevent']; } ?></textarea></li>
	<li><label><?=$admin_management[55] ?> (24:00)</label><input name="time" type="text" class="input" id="time" maxlength="10" value="<?php if(isset($data)){ print $data['eventtime']; } ?>">
    <div class="tip"><?=$admin_management[56] ?></div></li>
		      <li>
                <label><?=$admin_management[57] ?></label>
                 <?=$admin_management[58] ?>: 
				 <?php 
				 if(isset($data)){
					 $ee = explode("-",$data['eventdate']);
					 $data['month'] = $ee[1];
					 $data['day'] = $ee[2];
					 $data['yes'] = $ee[0];
				 }
				  ?>
                <select name="month">
                  <option value=1 <?php if(isset($data)){ if($data['month']=="1"){ print"selected";} } ?>>Jan
                  <option value=2 <?php if(isset($data)){ if($data['month']=="2"){ print"selected";} } ?>>Feb
                  <option value=3 <?php if(isset($data)){ if($data['month']=="3"){ print"selected";} } ?>>Mar
                  <option value=4 <?php if(isset($data)){ if($data['month']=="4"){ print"selected";} } ?>>Apr
                  <option value=5 <?php if(isset($data)){ if($data['month']=="5"){ print"selected";} } ?>>May
                  <option value=6 <?php if(isset($data)){ if($data['month']=="6"){ print"selected";} } ?>>Jun
                  <option value=7 <?php if(isset($data)){ if($data['month']=="7"){ print"selected";} } ?>>Jul
                  <option value=8 <?php if(isset($data)){ if($data['month']=="8"){ print"selected";} } ?>>Aug
                  <option value=9 <?php if(isset($data)){ if($data['month']=="9"){ print"selected";} } ?>>Sep
                  <option value=10 <?php if(isset($data)){ if($data['month']=="10"){ print"selected";} } ?>>Oct
                  <option value=11 <?php if(isset($data)){ if($data['month']=="11"){ print"selected";} } ?>>Nov
                  <option value=12 <?php if(isset($data)){ if($data['month']=="12"){ print"selected";} } ?>>Dec
                </select>
                &nbsp;<?=$admin_management[59] ?>: 
                <select name="day">
                  <option value="01" <?php if(isset($data)){ if($data['day']=="01"){ print"selected";} } ?>>01</option>
                  <option value="02" <?php if(isset($data)){ if($data['day']=="02"){ print"selected";} } ?>>02</option>
                  <option value="03" <?php if(isset($data)){ if($data['day']=="03"){ print"selected";} } ?>>03</option>
                  <option value="04" <?php if(isset($data)){ if($data['day']=="04"){ print"selected";} } ?>>04</option>
                  <option value="05" <?php if(isset($data)){ if($data['day']=="05"){ print"selected";} } ?>>05</option>
                  <option value="06" <?php if(isset($data)){ if($data['day']=="06"){ print"selected";} } ?>>06</option>
                  <option value="07" <?php if(isset($data)){ if($data['day']=="07"){ print"selected";} } ?>>07</option>
                  <option value="08" <?php if(isset($data)){ if($data['day']=="08"){ print"selected";} } ?>>08</option>
                  <option value="09" <?php if(isset($data)){ if($data['day']=="09"){ print"selected";} } ?>>09</option>
                  <option value="10" <?php if(isset($data)){ if($data['day']=="10"){ print"selected";} } ?>>10</option>
                  <option value="11" <?php if(isset($data)){ if($data['day']=="11"){ print"selected";} } ?>>11</option>
                  <option value="12" <?php if(isset($data)){ if($data['day']=="12"){ print"selected";} } ?>>12</option>
                  <option value="13" <?php if(isset($data)){ if($data['day']=="13"){ print"selected";} } ?>>13</option>
                  <option value="14" <?php if(isset($data)){ if($data['day']=="14"){ print"selected";} } ?>>14</option>
                  <option value="15" <?php if(isset($data)){ if($data['day']=="15"){ print"selected";} } ?>>15</option>
                  <option value="16" <?php if(isset($data)){ if($data['day']=="16"){ print"selected";} } ?>>16</option>
                  <option value="17" <?php if(isset($data)){ if($data['day']=="17"){ print"selected";} } ?>>17</option>
                  <option value="18" <?php if(isset($data)){ if($data['day']=="18"){ print"selected";} } ?>>18</option>
                  <option value="19" <?php if(isset($data)){ if($data['day']=="19"){ print"selected";} } ?>>19</option>
                  <option value="20" <?php if(isset($data)){ if($data['day']=="20"){ print"selected";} } ?>>20</option>
                  <option value="21" <?php if(isset($data)){ if($data['day']=="21"){ print"selected";} } ?>>21</option>
                  <option value="22" <?php if(isset($data)){ if($data['day']=="22"){ print"selected";} } ?>>22</option>
                  <option value="23" <?php if(isset($data)){ if($data['day']=="23"){ print"selected";} } ?>>23</option>
                  <option value="24" <?php if(isset($data)){ if($data['day']=="24"){ print"selected";} } ?>>24</option>
                  <option value="25" <?php if(isset($data)){ if($data['day']=="25"){ print"selected";} } ?>>25</option>
                  <option value="26" <?php if(isset($data)){ if($data['day']=="26"){ print"selected";} } ?>>26</option>
                  <option value="27" <?php if(isset($data)){ if($data['day']=="27"){ print"selected";} } ?>>27</option>
                  <option value="28" <?php if(isset($data)){ if($data['day']=="28"){ print"selected";} } ?>>28</option>
                  <option value="29" <?php if(isset($data)){ if($data['day']=="29"){ print"selected";} } ?>>29</option>
                  <option value="30" <?php if(isset($data)){ if($data['day']=="30"){ print"selected";} } ?>>30</option>
                  <option value="31" <?php if(isset($data)){ if($data['day']=="31"){ print"selected";} } ?>>31</option>
                </select>
                &nbsp;<?=$admin_management[60] ?>: 
                <select name="year">
                  <option value=2000 <?php if(isset($data)){ if($data['yes']=="2000"){ print"selected";} } ?>>2000
                  <option value=2001 <?php if(isset($data)){ if($data['yes']=="2001"){ print"selected";} } ?>>2001
                  <option value=2002 <?php if(isset($data)){ if($data['yes']=="2002"){ print"selected";} } ?>>2002
                  <option value=2003 <?php if(isset($data)){ if($data['yes']=="2003"){ print"selected";} } ?>>2003
                  <option value=2004 <?php if(isset($data)){ if($data['yes']=="2004"){ print"selected";} } ?>>2004
                  <option value=2005 <?php if(isset($data)){ if($data['yes']=="2005"){ print"selected";} } ?>>2005
                  <option value=2006 <?php if(isset($data)){ if($data['yes']=="2006"){ print"selected";} } ?>>2006
                  <option value=2007 <?php if(isset($data)){ if($data['yes']=="2007"){ print"selected";} } ?>>2007
                  <option value=2008 <?php if(isset($data)){ if($data['yes']=="2008"){ print"selected";} } ?>>2008
                  <option value=2009 <?php if(isset($data)){ if($data['yes']=="2009"){ print"selected";} } ?>>2009
                  <option value=2010 <?php if(isset($data)){ if($data['yes']=="2010"){ print"selected";} } ?>>2010
                  <option value=2011 <?php if(isset($data)){ if($data['yes']=="2011"){ print"selected";} } ?>>2011
                  <option value=2012 <?php if(isset($data)){ if($data['yes']=="2012"){ print"selected";} } ?>>2012
                  <option value=2013 <?php if(isset($data)){ if($data['yes']=="2013"){ print"selected";} } ?>>2013
                  <option value=2014 <?php if(isset($data)){ if($data['yes']=="2014"){ print"selected";} } ?>>2014
                  <option value=2015 <?php if(isset($data)){ if($data['yes']=="2015"){ print"selected";} } ?>>2015
                  <option value=2016 <?php if(isset($data)){ if($data['yes']=="2016"){ print"selected";} } ?>>2016
                  <option value=2017 <?php if(isset($data)){ if($data['yes']=="20017"){ print"selected";} } ?>>2017
                  <option value=2018>2018
                  <option value=2019>2019
                  <option value=2020>2020
                  <option value=2021>2021
                  <option value=2022>2022
                  <option value=2023>2023
                  <option value=2024>2024
                  <option value=2025>2025
                  <option value=2026>2026
                  <option value=2027>2027
                  <option value=2028>2028
                  <option value=2029>2029
                  <option value=2030>2030
                  <option value=2031>2031
                  <option value=2032>2032
                  <option value=2033>2033
                  <option value=2034>2034
                  <option value=2035>2035
                  <option value=2036>2036
                </select>

		</li>

		
		<li><label><?=$admin_management[61] ?></label><?php print '<SELECT name="country" class="input" style="width:200px; " onchange="statedropdown(MemberSearch)" id=country>';  if(isset($data)){ print DisplayCountries(MakeCountry($data['country'])); }else{ print DisplayCountries(); } ?></li>
		<li><label><?=$admin_management[62] ?></label><input type="text" name="state" value="<?=$data['province'] ?>" class="input"></li>
		<li><label><?=$admin_management[63] ?></label><input name="street" type="text" class="input" id="street" size="40" maxlength="255" value="<?php if(isset($data)){ print $data['street']; } ?>">        </li>
		<li><label><?=$admin_management[64] ?></label><input name="town" type="text" class="input" id="town" size="40" maxlength="255" value="<?php if(isset($data)){ print $data['city']; } ?>">        </li>
		<li><label><?=$admin_management[65] ?></label><input name="phone" type="text" class="input" id="phone" size="40" maxlength="255" value="<?php if(isset($data)){ print $data['phone']; } ?>">        </li>
		<li><label><?=$admin_management[66] ?></label><input name="email" type="text" class="input" id="email" size="40" maxlength="255" value="<?php if(isset($data)){ print $data['email']; } ?>">        </li>
		<li><label><?=$admin_management[67] ?></label><input name="website" type="text" class="input" id="website" size="40" maxlength="255" value="<?php if(isset($data)){ print $data['website']; } ?>">        </li>		
		<li><label><?=$admin_management[68] ?> </label><?=$admin_management[69] ?> <input name="vis" type="radio" value="all" <?php if(isset($data)){ if($data['vis']=="all"){ print"checked";} }else{ print "checked"; } ?>> <?=$admin_management[70] ?> <input name="vis" type="radio" value="friends" <?php if(isset($data)){ if($data['vis']=="friends"){ print"checked";} } ?>></li>
		
		<li><input  type="submit" value="<?=$admin_button_val[8] ?>" Class="MainBtn"></li>
	</div>
	</ul>
</div>	
</form>


<?php }elseif($_REQUEST['p']=="poll"){ ?>


<div id="TableViewer"></div>



<?php }elseif($_REQUEST['p']=="pollresults"){ ?>			
			

<ul class="form"><div class="box_body">
<?=pollResults($_REQUEST['id'] )?>
</div></ul>
<?php }elseif($_REQUEST['p']=="polladd"){ ?>			
			

	<form method="POST" action="management.php" name="form1">
        <input name="do" type="hidden" value="polladd" class="hidden">
		<input name="p" type="hidden" value="poll" class="hidden">
		<input type='hidden' class='hidden' value='10' name='total'>		
		<ul class="form"><div class="box_body">
		
		<?php if(isset($_REQUEST['id'])){ $data = GetPollData($_REQUEST['id']); ?>
		<input type='hidden' class='hidden' value='<?=$_REQUEST['id'] ?>' name='eid'>		
		<li><label><?=$admin_management[73] ?>:  </label> <input name="pollname" type="text" class="input" value="<?=$data[1]['title'] ?>" size="40" maxlength="255"></li> 
			<?php $cc=1; foreach($data as $poll){ ?>      
			<li><label><?=$admin_management[74] ?> <?=$cc ?>:</label> <input name="q<?=$cc ?>" type="text" class="input" size=60 maxlength=255 value="<?=$poll['caption'] ?>"></li>	
			<?php $cc++;}  ?>	
		<?php }else{  ?>		

	
		<li><label><?=$admin_management[73] ?>:  </label>
<div class="tip">Enter a short but catchy question for your new poll.</div>
 <input name="pollname" type="text" class="input" size="40" maxlength="255"></li>


 </div></ul>  <ul class="form"><div class="box_body">		
    
        <li><label><?=$admin_management[74] ?> 1:</label> <input name="q1" type="text" class="input" size=60 maxlength=255></li>
		<li><label><?=$admin_management[74] ?> 2:</label> <input name="q2" type="text" class="input" size=60 maxlength=255></li>
		<li><label><?=$admin_management[74] ?> 3:</label> <input name="q3" type="text" class="input" size=60 maxlength=255></li>
		<li><label><?=$admin_management[74] ?> 4:</label> <input name="q4" type="text" class="input" size=60 maxlength=255></li>
		<li><label><?=$admin_management[74] ?> 5:</label> <input name="q5" type="text" class="input" size=60 maxlength=255></li>
		<li><label><?=$admin_management[74] ?> 6:</label> <input name="q6" type="text" class="input" size=60 maxlength=255></li>		
		<?php } ?>
        <li><label><?=$admin_management[75] ?>:</label> <input name="active" type="checkbox" value="on"></li>
        
		<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
		
		</div></ul>
      </form>


<?php }elseif($_REQUEST['p']=="forumchange"){ ?>	

<div id="Loading_wait" style="display:none;">
<p></p>
<p style="font-size:15px;"><center>Loading Please Wait</center></p>
<p><center><img src="inc/images/loading.gif"></center></p>
</div>
<div id="do_load" style="display:visible">
<form action="management.php" method="post" name="form1" onSubmit="idShowHide('Loading_wait');idShowHide('do_load');">
<input name="p" type="hidden" value="forum" class="hidden">
<input name="do" type="hidden" value="changeforum" class="hidden">
<ul class="form"><div class="box_body">
<div id="type" style="display:visible;">
<li><label><?=$admin_mainten_extra[10] ?>: </label>
<select name="type" onchange="javascript:idShowHide(this.value);idShowHide('type'); return false;">
	<option value="0" selected>--------------</option>
	<option value="default"><?=$admin_mainten_extra[11] ?></option>
	<option value="phpbb">PHPBB3 (version 3 or above)</option>
	<option value="vbull">Vbulletin (version 3.6.2 or above)</option>
</select></li>
</div>
<div id="phpbb" style="display:none;">
	<li><label>PHPBB Install URL</label><input tabindex='1' size='40' type='text' name='pbpbb_url' value='<?=FORUM_PHPBB_LINK ?>'></li>
	<li><label>PHPBB Directory Path</label><input tabindex='2' size='40' type='text' name='phpbb_path' value='<?=FORUM_PHPBB_ROOTPATH ?>'></li>
	<li><label>PHPBB Database Name</label><input tabindex='3' size='40' type='text' name='phpbb_database' value='<?=FORUM_PHPBB_DATABASE ?>'></li>
</div>
<div id="vbull" style="display:none;">
	<li><label>VB Install URL</label><input tabindex='1' size='40' type='text' name='vb_url' value='<?=FORUM_VB_LINK ?>'></li>
	<li><label>VB Directory Path</label><input tabindex='2' size='40' type='text' name='vb_path' value='<?=FORUM_VB_ROOTPATH ?>'></li>
	<li><label>VB Database Name</label><input tabindex='3' size='40' type='text' name='vb_database' value='<?=FORUM_VB_DATABASE ?>'></li>
</div>
<div id="default" style="display:none;">
<li>You have selected to use the default software forum.</li>
</div>
<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
</div></ul> 
</form>
</div>

<?php }elseif($_REQUEST['p']=="forum"){ ?>			
			


<div class="bar_save">
<?php if(FORUM_DEFAULT_ENABLED =="yes"){ ?>
<input type="button" value="<?=$admin_management[76] ?>" class="NormBtn" onClick="javascript:location.href='?p=forumadd'"/>
<?php } ?>
<input type="button" value="<?=$admin_mainten_extra[9] ?>" class="NormBtn" onClick="javascript:location.href='?p=forumchange'"/>
<input type="button" value="<?=$admin_management[77] ?>" class="NormBtn" onClick="javascript:location.href='?p=forumpost'"/>
 

</div>


<div id="TableViewer"></div>

 

<?php }elseif($_REQUEST['p']=="forumadd"){ ?>


<form method="post" action="management.php" name="form1" enctype="multipart/form-data">
<input name="p" type="hidden" value="forum" class="hidden">
<?php if(isset($_REQUEST['id'])){ $data = GetForum($_REQUEST['id']); ?>
<input name="do" type="hidden" value="forumedit" class="hidden">
<input name="fid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
<?php }else{ ?><input name="do" type="hidden" value="forumadd" class="hidden"><?php } ?>
<ul class="form"><div class="box_body">
<li><label><?=$admin_management[79] ?>: </label><input name="f1" type="text" class="input" value="<?php if(!empty($data)){ print $data['forum_name']; } ?>" size="40" maxlength="255"></li>
<li><label><?=$admin_management[80] ?>:</label><textarea class="input" style="width:99%; height:100px;" name="f2"><?php if(!empty($data)){ print $data['forum_desc']; } ?></textarea></li>   
<li><label>Upload Forum Icon:</label><input name="LogoUpload" type="file" class="input"></li>

<?php if(isset($data) && $data['icon'] !=""){ ?>
<li><label>Current Icon</label></li>
<img src="../uploads/files/<?=$data['icon'] ?>">
<?php } ?>     
<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>  
</div></ul>
</form>




<?php }elseif($_REQUEST['p']=="editpost"){ $data = GetForumData($_REQUEST['pid']); ?>

<form method="post" action="management.php" name="form1">
        <input name="do" type="hidden" value="editpost" class="hidden">
		<input type="hidden" name="p" value="forumpost" class=hidden>
        <input name="post_id" type="hidden" value="<?=$data['post_id'] ?>" class="hidden">
        <fieldset>
        <label>Forum Description: </label><br>
        <textarea class="input" name="text" cols="43" rows="15" wrap="VIRTUAL" style="width:500px; height:300px;"><?=$data['post_text'] ?></textarea>
        
        <br><br>
         
        <input name="Input" type="submit" value="Update Post" class="MainBtn">
        </fieldset>
      </form>

<?php }elseif($_REQUEST['p']=="forumpost"){ ?>


	<div id="TableViewer"></div>


<?php }elseif($_REQUEST['p']=="chatrooms"){ ?>

  
	<div id="AddDiv" style="display:<?php if(isset($_REQUEST['eid'])){ ?>visible; <?php }else{ ?>none; <?php } ?>"> 
	<form action="management.php" method="post">
	<?php if(isset($_REQUEST['eid'])){ $data = Getcrn($_REQUEST['eid']); ?>
	<input type="hidden" name="editid" value="<?=$_REQUEST['eid'] ?>" class="hidden">
	<?php } ?><input type="hidden" name="do" value="chatadd" class="hidden">
	<input type="hidden" name="p" value="chatrooms" class=hidden>
	<ul class="form"><div class="box_body">
	
	<li><label><?=$admin_management[86] ?>: </label><input name="r1" type="text" class="input" value="<?php if(isset($data)){ print $data['room_name']; } ?>"></li>
	<li><label><?=$admin_management[88] ?>:</label><input name="r3" type="text" class="input" value="<?php if(isset($data)){ print $data['room_pass']; } ?>"></li>
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>

	<div class="bar_save">
	<input type="button" value="Add New Room" class="MainBtn" onClick="javascript:idShowHide('AddDiv');"/>
	<br class="clear">
	</div>


	<div id="TableViewer"></div>

 

 

<?php }elseif($_REQUEST['p']=="faq"){ ?>


<br class="clear">
<div class="bar_save">
<input type="button" value="<?=$admin_management[89] ?>" class="NormBtn" onClick="javascript:location.href='?p=faqadd'"/>
<br class="clear">
</div>


<div id="TableViewer"></div>

 

<?php }elseif($_REQUEST['p'] == "faqadd"){ ?>

<form method="post" action="management.php" name="form1">
<input type="hidden" name="p" value="faq" class=hidden>
<?php if(isset($_REQUEST['eid'])){ $data = GetFile($_REQUEST['eid']); ?>
<input type="hidden" name="do" value="faqedit" class=hidden>
<input type="hidden" name="eid" value="<?=$_REQUEST['eid']?>" class=hidden>
<?php }else{ ?><input type="hidden" name="do" value="faqadd" class=hidden><?php } ?>
<ul class="form"><div class="box_body">         
<li><label><?=$admin_management[79] ?>:</label><input type="text" class="input" name="n1" size="40" value="<?php if(isset($data['subject'])) { print $data['subject']; } ?>"></li>
<li><?php if(isset($data['content'])){ $data = $data['content']; }else{ $data =""; } print displayTextArea($data); ?></li>
<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
</div></ul>
</form>


<?php }elseif($_REQUEST['p'] == "words"){ ?>



	<div id="AddDiv" style="display:<?php if(isset($_REQUEST['eid'])){ ?>visible; <?php }else{ ?>none; <?php } ?>"> 
	<form action="management.php" name="form1" method="post">
	<input type="hidden" name="do" value="wordadd" class="hidden">	
	<input type="hidden" name="p" value="words" class=hidden>
	<input type="hidden" name="page" value="words" class=hidden>
	<ul class="form"><div class="box_body">   	
	<li><label><?=$admin_management[92] ?>: </label><input type="text" class="input" name="word"></li>            
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>

	<div class="bar_save">
	<input type="button" value="Add Word or Phrase" class="MainBtn" onClick="javascript:idShowHide('AddDiv');"/>
	<br class="clear">
	</div>
 

	<div id="TableViewer"></div>

 
 



<?php }elseif($_REQUEST['p'] == "class"){ ?>


	<div class="bar_save">
	
	<input type="button" value="Manage Categories" class="NormBtn" onClick="javascript:location.href='?p=addclasscat'"/>
 
	
	<br class="clear">
	
	</div>
	
	<div id="TableViewer"></div>

 


<?php }elseif($_REQUEST['p'] == "addclass"){ ?>


	<div class="bar_save">
	
	<input type="button" value="Manage Categories" class="NormBtn" onClick="javascript:location.href='?p=addclasscat'"/>
	<input type="button" value="Create Advert" class="NormBtn" onClick="javascript:location.href='?p=addclass'"/>
	
	<br class="clear">
	
	</div>
	
	
	<form method="post" action="management.php" name="form1" enctype="multipart/form-data" >
	<input type="hidden" name="p" value="class" class=hidden>
	<input name="page" type="hidden" value="class" class="hidden">
	<input name="do" type="hidden" value="addclass" class="hidden">  
	<?php if(isset($_GET['id'])){ $data = EditThisClass($_GET['id']);  ?>
	<input type="hidden" name="eid" value="<?=$_GET['id']?>" class=hidden>
	<?php } ?>
	 <br class="clear">
	
	<ul class="form"><div class="box_body">
	<li><label>Advert Category</label><select name="ad_catid" class="input" onChange="eMeetingAdminClassCats(this.value, 'subcats',0); return false;"><?php if(!isset($data)){ $data['cat_name']=""; } print GetClassCats($data['cat_name']); ?></select></li>
	<li><label>Sub Category</label><div id="subcats"><select name="sub_catid" class="input"><option value="0">----------</option></select></div></li>
	
	</div></ul><ul class="form"><div class="box_body">
	<li><label>Headline</label><input name="ad_title" type="text" class="input" size="40" value="<?php if(!isset($data)){ $data['title']=""; } print $data['title']; ?>"></li>
	<li><label>Sub Line</label><input name="ad_subtitle" type="text" class="input" size="40" value="<?php if(!isset($data)){ $data['sub_title']=""; } print $data['sub_title']; ?>">
	</li>
	<?php if(!isset($data)){ $data['content']=""; } print displayTextArea($data['comments']); ?>
	<br>
 	<li><input type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>"> </li>
	<?php if(!isset($data)){ $data['pic1']=""; }else{ print "<li><span><img src='".WEB_PATH_IMAGE.$data['pic1']."'></span></li>"; } ?>
	</div></ul>
	</form>

<script type="text/javascript">
 eMeetingAdminClassCats(<?=$data['cat_id'] ?>, 'subcats',<?=$data['pic5'] ?>);
</script>



<?php }elseif($_REQUEST['p'] == "addclasscat"){ ?>

	<div id="AddDiv" style="display:<?php if(isset($_REQUEST['id'])){ ?>visible; <?php }else{ ?>none; <?php } ?>">
	<form method="post" action="management.php" name="form1"  enctype="multipart/form-data">
	<input name="p" type="hidden" value="addclasscat" class="hidden">
	
	<?php if(isset($_REQUEST['id'])){ $data = EditThisClassCat($_REQUEST['id']); ?>
	<input name="editid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
	<?php } ?>
	<input name="do" type="hidden" value="classcatadd" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[8] ?>: </label><input type="text" class="input" name="name" value="<?php if(isset($_REQUEST['id'])){ print $data['name']; } ?>"></li>
	<li><label>Upload Icon:</label><input name="LogoUpload" type="file" class="input"></li>
	<?php if(isset($data) && $data['icon'] !=""){ ?>
	<li><label>Current Icon</label></li>
	<img src="../uploads/files/<?=$data['icon'] ?>">
	<li><label>Remove Icon</label><input name="removeicon" type="checkbox" value="1"></li>
	<?php } ?> 
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>

	<div id="AddDiv1" style="display:none;">
	<form method="post" action="management.php" name="form1"  enctype="multipart/form-data">
	<input name="p" type="hidden" value="addclasscat" class="hidden">
	<input name="do" type="hidden" value="classcatadd" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[8] ?>: </label><textarea class="input" name="name" style="height:70px;"><?php if(isset($_REQUEST['id'])){ print $_REQUEST['name']; } ?></textarea>
	<div class="tip">To add more than one category at a time simply seperate each item with a comma. (,).</div>
	</li>
	<?php if(isset($_REQUEST['id'])){ ?><li><label><?=$admin_management[9] ?>: </label><input type="text" class="input" name="count" value="<?php print $_REQUEST['c']; ?>"></li><?php } ?>

	<li><label>Main Category:</label><select name="subcat" class="input"><?=GetClassCats($data['subId']) ?></select></li>

	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>

	<div class="bar_save">
	<input type="button" value="Add Main Category" class="MainBtn" onClick="javascript:idShowHide('AddDiv');"/>
<input type="button" value="Add Sub Category" class="MainBtn" onClick="javascript:idShowHide('AddDiv1');"/>
	<br class="clear">
	</div><br class="clear">


	<div id="TableViewer"></div>

 



<?php }elseif($_REQUEST['p'] == "caladdtype"){ ?>


	<div id="AddDiv" style="display:<?php if(isset($_REQUEST['id'])){ ?>visible; <?php }else{ ?>none; <?php } ?>;">
	<form method="post" action="management.php" name="form1"  enctype="multipart/form-data">
	<input name="p" type="hidden" value="caladdtype" class="hidden">
	
	<?php if(isset($_REQUEST['id'])){ ?>
	<input name="editid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
	<?php } ?>
	<input name="do" type="hidden" value="calcatadd" class="hidden">
	<ul class="form"><div class="box_body">
	<li><label><?=$admin_management[8] ?>: </label><input type="text" class="input" name="name" value="<?php if(isset($_REQUEST['id'])){ print $_REQUEST['name']; } ?>"></li>
	<?php if(isset($_REQUEST['id'])){ ?><li><label><?=$admin_management[9] ?>: </label><input type="text" class="input" name="count" value="<?php print $_REQUEST['c']; ?>"></li><?php } ?>
	
	<li><label>Upload Icon:</label><input name="LogoUpload" type="file" class="input"></li>
	
	<?php if(isset($_REQUEST['id'])){ ?>
	<li><label>Remove Icon</label><input name="removeicon" type="checkbox" value="1"></li>
	<?php } ?>
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	</form>
	</div>


	<div class="bar_save">
	<input type="button" value="Add New Item" class="MainBtn" onClick="javascript:idShowHide('AddDiv');"/>
	<br class="clear">
	</div>


	<div id="TableViewer"></div>
 



<?php }elseif($_REQUEST['p']=="importcal"){ ?>



	<form method="post" action="management.php" name="SearchForm" onSubmit="GetEventfulSearch(SearchForm.keyword.value); return false;">
	<input name="do" type="hidden" value="calrsssearch" class="hidden">
	<input name="p" type="hidden" value="importsea" class="hidden">
	<ul class="form"><div class="box_body">	
		
	<div style="float:right;">
	<div class="eventful-badge eventful-large">
	  <img src="http://api.eventful.com/images/powered/eventful_139x44.gif"
		alt="Local Events, Concerts, Tickets">
	  <p><a href="http://eventful.com/">Events</a> by Eventful</p>
	</div>
	</div>

	<li><label>Search Term: </label>
	<div class="tip">Search for new events to add to your website by entering a keyword below.</div>
	<input name="keyword" type="text" class="input" style="width:270px;"></li
	></li> 
	<li><input type="submit" value="Search" class="MainBtn"></li>
	
	</div></ul>
	</form>
	<div id="EventfulSearchData"></div>



	<div style="display:none;">
	<form method="post" action="management.php" name="form1">
	<input name="do" type="hidden" value="calrss" class="hidden">
	<input name="p" type="hidden" value="importcal" class="hidden">
	<ul class="form"><div class="box_body">					
	
	<li><label><?=$admin_management[11] ?>: </label><select name="catid"><?=DisplayCalCatsID() ?></select></li>       
	<li><label>RSS <?=$admin_mainten_extra[1] ?>: </label> <input name="rss" type="text" class="input" style="width:470px;"></li>
	<li><label><?=$admin_management[13] ?>: </label><textarea class="input" name="short" style="width:470px; height:60px;">[title]</textarea></li>
	<li><label><?=$admin_management[14] ?>: </label><textarea class="input" name="description" style="width:470px; height:60px;">[description]</textarea></li>
	<li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	</div></ul>
	<ul class="form"><div class="box_body">		
	<li>
	<li><label>Store Feed</label>
	<div class="tip">This will save the feed and allow you to check for updates to ensure you have all the latest feeds on your website.</div>
	<input name="calfeed" type="checkbox" value="1">
	</li>
	<li><label>Name: </label>
	<div class="tip">Enter a quick name to help you remember this feed.</div>
	<input name="feedname" type="text" class="input" style="width:470px;">
	</li> 
	
	
		   
	</div></ul>
	<div style="padding:15px;background:#eee;">
	Replace the text in the textarea for any of the following values;
	
		[url] => http://eventful.com/ <br>
		[title] => International IC <br>
		[description] => It is the annual must-attend event inthe electronics industry.<br>
		[start_time] => 2008-11-12 00:00:00<br>
		[stop_time] => 2008-11-13 00:00:00<br>
		[venue_name] => Convention and Exhibition Center <br>
		[address] => 3rd Fuhura Road <br>
		[city] => Shenzhen <br>
		[region] => Guangdong <br>
		[postal_code] => 518048 <br>
		[country] => China <br>
		[free] =>  <br>
		[price] =>  <br>
	</div>
	</form>
	</div>




<?php }elseif($_REQUEST['p']=="gamesinstall"){ ?>

 
	<form method="post" name="profile" onSubmit="return CheckMemberForm();">
	<input name="do" type="hidden" value="none" id="do" class="hidden">
	<input name="p" type="hidden" value="gamesinstall" class="hidden">
	<table class="widefat">
		 <thead>
		  <tr> 
			 <th></th>
			 <th>Icon</th>
			  <th>File Name</th>
			</tr>
		   </thead>
		  <tbody>
			 <?php $tRows= GetGamesInstall() ?>
		 </tbody>
	</table>
	<br class="clear">
	<input type="hidden" name="totalrows" value="<?=$tRows ?>" class="hidden">
	<div class="bar_save">
	<input type="button" value="<?=$admin_button_val[1] ?>" class="MainBtn" onClick="ca(<?=$tRows ?>)"/>
	<input type="button" value="<?=$admin_button_val[2] ?>" class="MainBtn"  onClick="ua(<?=$tRows ?>)"/> - 
	<input type="button" value="Install" class="GreenMainBtn"  onclick="ChangeOption('installgame');"/>
	
	<br class="clear">
	</div>
	</form>

<?php }elseif($_REQUEST['p']=="games"){ ?>


  
	<div class="bar_save">
	<input type="button" value="Install Games" class="NormBtn" onClick="javascript:location.href='?p=gamesinstall'"/>
	<br class="clear">
	
	</div>

	<div id="TableViewer"></div>

 

<?php } ?>