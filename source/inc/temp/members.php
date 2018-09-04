

<?php if( ( !isset($_REQUEST['p']) || $_REQUEST['p']=="" ) ||  $_REQUEST['p'] == "banned" || $_REQUEST['p'] == "files"){ ?>
 
 
<div id="TableViewer"></div>
 

<?php  }elseif($_REQUEST['p'] == "affiliate" || $_REQUEST['p'] == "affban"){ ?>



<div class="bar_save">
<input type="button" value="<?=$admin_members[10] ?>" class="NormBtn" onClick="javascript:location.href='?p=addaff'"/>
<input type="button" value="<?=$admin_members[12] ?>" class="NormBtn" onClick="javascript:location.href='?p=affsettings'"/>
<br class="clear">
</div>

<div id="TableViewer"></div>
 

 

<?php }elseif($_REQUEST['p'] == "edit"){ ?>

<?

if(isset($_GET['updated'])){ 

print '<div id="messages">
		<div class="message-good" id="main-message-good">
			  <a class="dismiss-message" href="#" onclick="Effect.Fade(\'main-message-good\', { duration : 0.5 });; return false;"></a>
			Updated Successfully!
	</div></div>';
}
 
?>

<style>
.boxx1 { border:1px solid #cccccc; padding:8px; font-weight:bold; margin-bottom:15px; background:white;}
</style>

<form method="post" action="members.php" name="MemberSearch" id="MemberSearch">
<input name="uid" type="hidden" value="<?=$_REQUEST['id'] ?>" class="hidden">
<input name="do" type="hidden" value="edit" class="hidden">
<input type="hidden" name="hightlight" value="off">
<?php $tM = GetEditDetails($_GET['id']); ?>

<div id="Div3" style="display:none;">
 
	<ul class="form"><div class="box_body">					
	<li><label><?=$admin_members_extra[8] ?>: </label>
	<select name="acc_status" class="input">
	<option value="active" <?php if($tM['active'] =="active"){ print "selected"; } ?>>Active</option>
	<option value="suspended" <?php if($tM['active'] =="suspended"){ print "selected"; } ?>>Suspended</option>
	<option value="unapproved" <?php if($tM['active'] =="unapproved"){ print "selected"; } ?>>Unapproved</option>
	<option value="cancel" <?php if($tM['active'] =="cancel"){ print "selected"; } ?>>Cancel Account</option>
	</select>
	</li>
	<li><input name="Input" type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
	</div></ul>

</div>

<div class="boxx1"><a href="javascript:void(0);" onClick="idShowHide('Div3'); return false;"><img src="inc/images/icons/resultset_next.png" align="absmiddle"> <b> Change Active Status </b> </a> </div>


<div class="boxx1"><a href="javascript:void(0);" onClick="idShowHide('Div4'); return false;"><img src="inc/images/icons/resultset_next.png" align="absmiddle"> <b> Change Membership Package </b> </a> </div>

<div id="Div4" style="display:none;"> 
 
	<ul class="form"><div class="box_body">		
	<li><label style="width:200px;"><?=$admin_members_extra[3] ?>:</label><select name="pid" onChange="ShowUp();" style="width:200px;" class="input"><?=DisplayPackage($tM['packageid']) ?></select><li>   
	<input name="upgradeEmail" id="upgradeEmail" type="checkbox" value="1" class="radio" disabled><?=$admin_members_extra[4] ?> <br>
	<input name="upgradeBill" id="upgradeBill" type="checkbox" value="1" class="radio" disabled><?=$admin_members_extra[5] ?>                
	<li><input name="Input" type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
	</div></ul>

</div>

<div class="boxx1"><a href="javascript:void(0);" onClick="idShowHide('Div1'); return false;"><img src="inc/images/icons/resultset_next.png" align="absmiddle"> <b> Change Member's Username </b> </a> </div>

<div id="Div1" style="display:none;">

	<ul class="form"><div class="box_body">
	<li><label style="width:200px;"><?=$admin_table_val[1] ?>: </label>
	<div class="tip">It's not recommend to change a members username unless you must. The members username is also the same name the member will use to login and share their profile link with friends and family.</div>
	<input type="text" class="input" name="uname" size="40" value="<?=$tM['username'] ?>"></li>
	<li><input name="Input" type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
	</div></ul>

</div>

<div class="boxx1"><a href="javascript:void(0);" onClick="idShowHide('Div2'); return false;"><img src="inc/images/icons/resultset_next.png" align="absmiddle"> <b> Change Password & Email </b> </a> </div>

<div id="Div2" style="display:none;">

	<ul class="form"><div class="box_body">
	<li><label style="width:200px;"><?=$admin_login[8] ?>: </label><input name="upass" type="text" class="input" value="encrypted password" size="40" id="epassword" disabled><div class="tip"> <img src="inc/images/icons/help.png" align="absmiddle"> The software uses Md5 encryption on all member passwords to protect their privacy. You cannot read the password however you can change it.<br>
	<input name="epass" type="checkbox" value="1" onChange="ShowPass();" class="radio"> <b><?=$admin_members_extra[9] ?></b></div></li>
		<li><input name="Input" type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
	</div></ul><ul class="form"><div class="box_body">
	<li><label style="width:200px;"><?=$admin_login[3] ?>:</label><input name="uemail" type="text" class="input" value="<?=$tM['email'] ?>"size="40" style="height:30px;"></li>
	<li><input name="Input" type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
	</div></ul>

</div>


<div class="boxx1"><a href="javascript:void(0);" onClick="idShowHide('Div6'); return false;"><img src="inc/images/icons/resultset_next.png" align="absmiddle"> <b> Edit Profile </b> </a> </div>

<div id="Div6" style="display:none;"> 

 
	<script type="text/javascript" src="<?=subd ?>inc/js/_extras/_date.js"></script>
		

	<?=EditMember($_GET['id']) ?>
 
 
<input name="Input" type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn">
</form>
	  
 
<?php  }elseif($_REQUEST['p'] == "addaff"){ ?>


<form method="post" action="members.php">
<input name="p" type="hidden" value="affiliate" class="hidden">
<input name="do" type="hidden" value="addaff">
<?php if(isset($_REQUEST['id'])){ ?>
<?php $adata = GetAffiliateData($_REQUEST['id']); ?>
<input name="eid" type="hidden" value="<?=$_REQUEST['id']?>">
<?php } ?>
<ul class="form"><div class="box_body">					
<li><label><?=$admin_members['a5'] ?></label>
<div class="tip">This is the username used to login to the affiliate account.</div>
<input name="j1" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['username']; } ?>"></li>
<li><label><?=$admin_members['a6'] ?></label>
<div class="tip">This is the password used to login to the affiliate account.</div>
<input name="j2" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['password']; } ?>"></li>

</div></ul><ul class="form"><div class="box_body">	
<li><label><?=$admin_members['a7'] ?></label><input name="j3" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['firstname']; } ?>"></li>
<li><label><?=$admin_members['a8'] ?></label><input name="j4" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['lastname']; } ?>"></li>
<li><label><?=$admin_members['a9'] ?></label><input name="j5" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['businessname']; } ?>"></li>
<li><label><?=$admin_members['a10'] ?></label><input name="j6" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['address']; } ?>"></li>
<li><label><?=$admin_members['a11'] ?></label><input name="j7" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['street']; } ?>"></li>
<li><label><?=$admin_members['a12'] ?></label><input name="j8" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['town_city']; } ?>"></li>
<li><label><?=$admin_members['a13'] ?></label><input name="j9" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['state_county']; } ?>"></li>
<li><label><?=$admin_members['a14'] ?></label><input name="j10" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['zip_post']; } ?>"></li>
<li><label><?=$admin_members['a15'] ?></label><select name="j11" size="1" class="input"><?=DisplayCountries($adata['country']) ?></select></li>
<li><label><?=$admin_members['a16'] ?></label><input name="j12" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['telephone']; } ?>"></li>
<li><label><?=$admin_members['a17'] ?></label><input name="j13" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['fax']; } ?>"></li>
<li><label><?=$admin_members['a18'] ?></label><input name="j14" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['email']; } ?>"></li>
<li><label><?=$admin_members['a19'] ?></label><input name="j16" type="text" class="input" value="<?php if(isset($adata)){ print $adata['website']; }else{ ?>http://<?php } ?>" size="28"></li>
<li><label><?=$admin_members['a20'] ?></label><input name="j15" type="text" class="input" size="28" value="<?php if(isset($adata)){ print $adata['payment_to']; } ?>"></li>
<li><input type="submit" name="Submit2" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
</div></ul>
</form>
	



<?php  }elseif($_REQUEST['p'] == "affcom"){ ?>

<form method="post" action="members.php">
<input name="p" type="hidden" value="affcom" class="hidden">
<input name="do" type="hidden" value="com">
        <table class="widefat">
          <tr>
            <td width="137"><strong><?=$admin_table_val[15] ?></strong></td>
            <td width="155" align="right">
				<input name="commission" type="text" class="input" maxlength="3" value="<?=GetPages('commission') ?>">
            </td>
            <td width="22">%</td>
          </tr>
        </table>
        <br>    
<input type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn">
</form>

<?php  }elseif($_REQUEST['p'] == "affsettings"){ ?>




<form method="post" action="members.php">
<input name="do" type="hidden" value="editaffiliatepage">
<input name="p" type="hidden" value="affsettings">
<ul class="form"><div class="box_body">
<li><label><?=$admin_members_extra[12] ?></label><textarea class="input" name="p1" cols="1" rows="10" id="p1" style="width:99%;height:300px; font-size:11px;"><?=GetPages('home');?></textarea></li>
<li><label><?=$admin_members_extra[13] ?></label><textarea class="input" name="p2" rows="10" id="p2" style="width:99%;height:300px; font-size:11px;"><?=GetPages('code');?></textarea></li>
<li><label><?=$admin_members_extra[14] ?></label><textarea class="input" name="p3" rows="10" id="p3" style="width:99%;height:300px; font-size:11px;"><?=GetPages('payment');?></textarea></li>
<li><label><?=$admin_members_extra[15] ?></label><textarea class="input" name="p4" rows="10" id="textarea" style="width:99%;height:300px; font-size:11px;"><?=GetPages('summary');?></textarea></li>
<li><label><?=$admin_members_extra[162] ?></label><textarea class="input" name="p5" rows="10" style="width:99%;height:300px; font-size:11px;"><?=GetPages('edit');?></textarea></li>
<li><input type="submit" value="<?=$admin_button_val['8'] ?>"class="MainBtn"></li>
</div></ul>              
</form>
	  		  
<?php  }elseif($_REQUEST['p'] == "import"){ ?>

<?php if(isset($ComText)){ ?>

	<h2><?=$admin_pop_import[1] ?></h2>
	<h3><?=$ComText ?> <?=$admin_pop_import[2] ?></h3>
	<p><b>Hi <?=$_SESSION['admin_name'] ?></b> , <?=$ComText ?> <?=$admin_pop_import[3] ?> <?=$_POST['software'] ?> <?=$admin_pop_import[4] ?></p>
	<p></p>
	<?php if($_GET['software'] =="abledating"){ ?>
	<p>Abledating member photos are stored:   "/photos/" directory on your hosting account.</p>
	<?php }elseif($_GET['software'] =="aedating"){ ?>
	<p>AE Dating member photos are stored: "id_img" directory on your software install. </p>
	<?php }elseif($_GET['software'] =="webscribble"){ ?>
	<p>Webscribble member photos are stored: "/photos/" directory on your hosting account.</p>
	<?php } ?>
	<p class="highlight"><?=$admin_pop_import[5] ?><br>
	<br>
	<b>Upload Photo Thumbnails:</b> /uploads/thumbs/<br> 
	<b>Upload Photo Images: </b>/uploads/images/</p>

 
<?php }else{ ?>		

<div id="Loading_wait" style="display:none;">
<p></p>
<p style="font-size:15px;"><center>Loading Please Wait</center></p>
<p><center><img src="inc/images/loading.gif"></center></p>
</div>
<div id="do_load" style="display:visible">



<form action="members.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="idShowHide('Loading_wait');idShowHide('do_load');">
<input name="p" type="hidden" value="import" class="hidden">
<input name="do" type="hidden" value="import" class="hidden">

<div id="type" style="display:visible;">
	<ul class="form"><div class="box_body">	
	<li><label><?=$admin_members_extra[17] ?>: </label>
	<div class="tip">Please select the import method, are you transfering your members from another database or from a CSV File.</div>
	<select name="type" class="input" onchange="javascript:idShowHide(this.value);idShowHide('type'); return false;"><option value="0" selected>--------------</option><option value="cvs">CVS File</option><option value="database">Database</option></select></li>
	</div></ul>
</div>
<div id="cvs" style="display:none;">

	<ul class="form"><div class="box_body"> 
	<li><label>Select CVS File</label><input type="file" name="import" class="input"></li>
	<li><label>Column Selimiter</label><input name="del" type="text" class="input" value="," size="5"></li>
	<li><label>Enclosure</label><input name="enc" type="text" class="input" value="/" size="5"></li>
	<li><label>Column Headings</label><select  class="input" name="heading"><option value="Yes"><?=$admin_selection[1] ?></option><option value="No" selected><?=$admin_selection[2] ?></option></select></li>
	<li><label>Default Member Password</label><input name="dpass" type="text" class="input" value="password"></li>
	<li><input type="submit" value="<?=$admin_layout_nav['2e'] ?>"class="MainBtn"></li>
	</div></ul>

</div>

<div id="database" style="display:none;">

	<ul class="form"><div class="box_body">
	<li><label>Import Members From</label>
<div class="tip">Select the software provider you would like to transfer members from. Please check to ensure that the software version you are running is listed below.</div>
		<select name="software" style="width:300px;" class="input">
		<option value="emeeting6" selected>eMeeting Dating Software Version 6.0</option>
			<option value="boonex5">Boonex Dolphin 6.x (old builds / upgrades)</option>		
			<option value="boonex">Boonex Dolphin 6.1</option>
			<option value="webscribble">Webscribble</option>
			<option value="abledating24">AbleDating 2.4</option>
			<option value="abledating">AbleDating (earlier versions)</option>
			<option value="joomla">Joomla</option>
			<option value="vld">Vld Personals</option>
			<option value="wordpress">Wordpress (members and articles)</option>
			<option value="osdate">OSdate</option>
			<option value="aedating">AE Dating 4.1</option>
			<option value="ska">SKA Date</option>
 			<option value="bestdatingscript">Best Dating Script</option>

		</select>
	</li>
	<li><label>MySQL DB Host</label><input class="input" tabindex='1' size='40' maxlength='255'  type='text' name='emeeting_dbhost' value='localhost'></li>
	<li><label>MySQL DB Name</label><input class="input" tabindex='2' size='40' maxlength='255'  type='text' name='emeeting_db' value='<?php  if(isset($_POST['emeeting_db'])){ print $_POST['emeeting_db']; }  ?>'></li>
	<li><label>MySQL DB User</label><input class="input" tabindex='3' size='40' maxlength='255'  type='text' name='emeeting_dbuser' value='<?php if(isset($_POST['emeeting_db'])){  echo $_POST['emeeting_dbuser'];}  ?>'></li>
	<li><label>MySQL DB Pass</label><input class="input" tabindex='4' size='40' maxlength='255'  type='text' name='emeeting_dbpass' value='<?php if(isset($_POST['emeeting_dbpass'])){ echo $_POST['emeeting_dbpass'];} ?>'></li>
	<li><label>Table Prefix</label><input class="input" tabindex='4' size='40' maxlength='255'  type='text' name='emeeting_prefix' value='<?php if(isset($_POST['emeeting_prefix'])){ echo $_POST['emeeting_prefix'];} ?>'><div class="tip"><img src="inc/images/icons/help.png" align="absmiddle"> Leave this blank if you dont have one or are unable what this is.</div></li>
	<li><input type="submit" value="<?=$admin_layout_nav['2e'] ?>"class="MainBtn"></li>
	</div></ul>

</div>



</form>
</div>
<?php } ?>





 
<?php }elseif($_REQUEST['p'] == "addfile"){ ?>

<form name="form1" enctype="multipart/form-data" method="post" action="members.php">
<input type="hidden" name='do' value="upload" class="hidden">
<input type="hidden" name='uploadNeed0' value="0" class="hidden">
<input type="hidden" name='p' value="addfile" class="hidden">
<input name="type" type="hidden" value="photo">

<ul class="form"><div class="box_body"> 
                       
<li><label><?=$admin_members[25] ?>:</label> <input name="uname" type="text" class="input" id="uname" style="font-size:12px; width:180px;">
</li>    

</div></ul>
	
	
 <ul class="form"><div class="box_body"> 

		<li><label><?=$admin_members[23] ?>:  </label>  <input name="uploadFile0" type="file" class="input" id="uploadFile0"></li>        
        <li><label><?=$admin_members[26] ?>:</label><input name="title" type="text" class="input" size="44" maxlength="255">        
        <li><label><?=$admin_members[27] ?>:</label> <textarea class="input" name="comment" cols="45" rows="5" style="height:60px;"></textarea>        
		<li><label><?=$admin_members[28] ?>:</label><input type="checkbox" name='default' value="1">		
        <li><input name="submit" type="submit"class="MainBtn" value="<?=$admin_button_val['8'] ?>">        
		</div></ul>
</form>
 

 


<?php  }elseif($_REQUEST['p'] == "monitor"){ ?>

<form action="members.php" method="get">
<input name="p" type="hidden" value="monitor" class="hidden">
<ul class="form"><div class="box_body">
<li><label><?=$lang_members_nn[1] ?> </label> <div class="tip">Enter a username in the space below and the system will detect all messages sent to and from this user allowing you to check for abuse or spam.</div><input name="user" type="text" class="input" value="" size="40"></li>
<li><input type="submit" value="<?=$admin_button_val[0] ?>"class="MainBtn"></li>
</div></ul>
</form>

<?php if(isset($_GET['user'])){ ?>
<br>
<form method="post" action="members.php" name="profile">
<input name="p" type="hidden" value="monitor" class="hidden">
<input type="hidden" name="do" value="none" id="do" class="hidden">
<table class="widefat">
<thead>
<tr>
	<th></th>
	<th>Username</th>
	<th>Chatting With </th>
	<th>Date / Time </th>
	<th>Status </th>
	
	<th></th>
</tr>
</thead>
<tbody>
 <?php $totalnum = DisplayMonitor($_GET['user']); ?>
 <?php if($totalnum ==1){ print $lang_members_nn[2]; } ?>
 </tbody>
</table> <?php if($totalnum > 1){ ?>
<input type="hidden" name="totalrows" value="<?=$totalnum ?>" class="hidden">
<br class="clear">
<div class="bar_save">
<input type="button" value="<?=$admin_button_val[1] ?>" class="NormBtn" onClick="ca(<?=$totalnum ?>)"/>
<input type="button" value="<?=$admin_button_val[2] ?>" class="NormBtn"  onClick="ua(<?=$totalnum ?>)"/> -
<input type="button" value="<?=$admin_button_val[5] ?>" class="NormBtn"  onclick="ChangeOption('delmonitor');"/>
</div> <?php } ?>
</form>
<?php } ?>


<?php  }elseif($_REQUEST['p'] == "fake"){ ?>

<script type="text/javascript" src="<?=subd ?>inc/js/_country.js"></script>
<form action="members.php" method="post">
<input name="p" type="hidden" value="fake" class="hidden">
<input type="hidden" name="do" value="fakemembers" class="hidden">

<ul class="form"><div class="box_body">
<li><label>Amount </label>
<div class="tip">Enter the amount in a numeric format (1 - 1000) for how many members you would like to generate.</div>
<input name="total" type="text" class="input" value=""></li>


</div></ul><ul class="form"><div class="box_body">

<li><label>Male or Female Names</label>
<div class="tip">Select the gender of the name types, male or female names.</div> 
  <select name="names" class="input">
    <option value="1">Male</option>
    <option value="2">Female</option>
  </select>
</li>

<li><label><?=$admin_members['a15'] ?></label>
<div class="tip">Select the country where the members will be generated from.</div>
<select name="country" size="1" class="input"><?=DisplayCountries() ?></select></li>
<li><label>Gender </label> 
<div class="tip">Select the members actual gender type..</div>
<select name="genderid" class="input"><?php foreach($_SESSION['g_array'] as $item){ ?><option value="<?=$item['id'] ?>"><?=$item['caption'] ?></option> <?php } ?></select>

</li>
<li><label style="width:200px;"><?=$admin_members_extra[3] ?>:</label>
<div class="tip">Select the membership level for the new members.</div>
<select name="pid" style="width:200px;" class="input"><?=DisplayPackage() ?></select></li> 

</div></ul><ul class="form"><div class="box_body">

<li><label>Email </label>
<div class="tip">Enter the email address for the new members.</div>
<input name="email" type="text" class="input" value=""></li>

<li><label>Password </label>
<div class="tip">Create a login password for the new members.</div>
<input name="password" type="text" class="input" value=""></li>
<li><input type="submit" value="<?=$admin_button_val[8] ?>"class="MainBtn"></li>
</div></ul>
</form>
<?php } ?>