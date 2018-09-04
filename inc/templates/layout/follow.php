<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );
if(D_FOLLOW !=1){ die( 'Restricted access' ); }

$Counter1 = GetFriendCounter(8);
$Counter2 = GetFriendCounter(8,$_SESSION['uid']);
?>

<div class="TopGallery" style="margin:0px;"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div>
<span>Followers</span></div><br>
<p>You are following <?=$Counter1 ?> members and have <?=$Counter2 ?> members following you!</p>
 




<? if(isset($data['follow_friends']) && $data['allow_approve'] =="yes"){ ?>


	<div id="OldMatch">
	<ul class="form">
	<div class="CapBody" style="padding-top:10px;padding-bottom:5px;"> 
	<form method="post" action="index.php" onsubmit="eMeetingComments(eMeetingCommentsForm.comments.value, 'follow','2','2','<?=str_replace("&x=48&y=48","",str_replace(DB_DOMAIN."inc/tb.php?src=","",$GLOBALS['MyProfile']['image'])) ?>','500','overview','0','0','Please complete all the fields'); return false;" target="_MakeComments" name="eMeetingCommentsForm">
			<!--<input name="id1" type="hidden" value="2" class="hidden">
			<input name="id2" type="hidden" value="2" class="hidden">
			<input name="id3" type="hidden" value="0" class="hidden">
			<input name="id4" type="hidden" value="0" class="hidden">-->
			 <li><label>Enter Message; </label><br><br><input type="text" name="comments" id="ThisComment" style="width:570px;height:30px;" class="input" value=" "></li><br>  
			 <li><input type="submit" value="Add Message" class="MainBtn"></li>
	
	</form>
	</div>
	</ul>
	</div>
	<div id="eMeetingCommentsBox"  style="display:visible;"></div>
	
	<span id="response_eMeetingComments" class="response_alert"></span>
	
<? } ?>


<div style="padding:10px; background:#cccccc; color:white;border-bottom:1px solid #eeeeee;"> <img src="images/DEFAULT/_acc/add.png" align="absmiddle"> <a href="javascript:void(0);" onClick="toggleLayer('n2'); return false;">My Follow Settings</a> </div>


<div id="n2" style="display:<? if(!isset($data['follow_friends']) || $data['allow_approve'] =="no"){ ?>visible;<? }else{ ?>none;<? } ?>">

	<form method="POST" action="index.php">               
	<input name="do" type="hidden" value="update" class="hidden">           
	<input name="do_page" type="hidden" value="follow" class="hidden">
	<input type="hidden" name="follow_friends" value="no">

	<div id="OldMatch">
	<ul class="form">
	<div class="CapBody"> 
	
					<li style="background:#eeeeee;">	
							<label style="width:400px;">Enable Follow Feature</label> 
							<select name="follow_approve" class="input" style="margin-left:50px;">
							<option value="yes" <? if(isset($data['allow_approve']) && $data['allow_approve'] =="yes"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>
							<option value="no" <? if(isset($data['allow_approve']) && $data['allow_approve'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
							</select>						 
					</li>	
					<!--<li>	
							<label style="width:400px;">Only fiends can follow me</label> 
							<select name="follow_friends" class="input" style="margin-left:50px;">
							<option value="yes" <? if(isset($data['follow_friends']) && $data['follow_friends'] =="yes"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>
							<option value="no" <? if(isset($data['follow_friends']) && $data['follow_friends'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
							</select>						 
					</li>	-->
					<li>	
							<label style="width:400px;">Automatically add friends as followers</label> 
							<select name="follow_auto" class="input" style="margin-left:50px;">
							<option value="yes" <? if(isset($data['follow_autoadd']) && $data['follow_autoadd'] =="yes"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>
							<option value="no" <? if(isset($data['follow_autoadd']) && $data['follow_autoadd'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
							</select>						 
					</li>	
					
					<li>	
							<label style="width:400px;">Display Updates on my profile</label> 
							<select name="follow_display" class="input" style="margin-left:50px;">
							<option value="yes" <? if(isset($data['follow_display']) && $data['follow_display'] =="yes"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>
							<option value="no" <? if(isset($data['follow_display']) && $data['follow_display'] =="no"){ print "selected"; } ?>><?=$GLOBALS['_LANG']['_no'] ?></option>
							</select>						 
					</li>	
		 
					<li><input type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn"></li>
	</div>

	<hr>
	<li>You have <?=$Counter1 ?> followers. <a href="<?=DB_DOMAIN ?>index.php?dll=search&friendid=2&friend_type=8">View All My Follow</a></li>
	</ul>
	</div>
	  
	</form>

	 

</div>

<? if(isset($data['follow_friends']) && $data['allow_approve'] =="yes"){ ?>

<div style="padding:10px; background:#cccccc; color:white;"> <img src="images/DEFAULT/_acc/add.png" align="absmiddle"> <a href="javascript:void(0);" onClick="toggleLayer('n3'); return false;">Recent Network Updates</a> </div>

<div id="n3" style="display:none;">
<div style="height:400px; overflow:auto;">
<div style="margin-left:15px;">

		<? 
		/*
			PARAMERTS: 
			1: width of display box
			2: page
			3: sub page
			4: user created id
			5: item id
			6: extra id 1
			7: extra id 2
		*/
		displayCommentsBox("510", "follow", "overview", $_SESSION['uid'], $_SESSION['uid'],0,0,false,true,50) ?>
</div>
</div>
</div>

<? } ?>
