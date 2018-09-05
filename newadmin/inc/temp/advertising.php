<?php if(!isset($_REQUEST['p']) || $_REQUEST['p']==""){ ?>

<div id="TableViewer"></div>

 
 

<?php }elseif($_REQUEST['p'] =="addbanner"){ ?>

<form method="post" action="advertising.php" name="form1" enctype="multipart/form-data">
<input type="hidden" value="addbanner" name="do" class="hidden">
<input type="hidden" value="StopConfigStrip" class="hidden">
<?php if(isset($_REQUEST['id2'])){ ?><input type="hidden" name="type" value="affiliate" class="hidden"><input type="hidden" name="eaid" value="<?=$_REQUEST['id2'] ?>" class="hidden"><?php $data = BannerAffItems($_REQUEST['id2']); } ?>
<?php if(isset($_REQUEST['id'])){ ?><input type="hidden" name="eid" value="<?=$_REQUEST['id'] ?>" class="hidden"><?php $data = BannerItems($_REQUEST['id']); } ?>
		
        <br>
 


<ul class="form"><div class="box_body">
	
	<?php if(!isset($_REQUEST['id2'])){ ?>
	<li><label><?=$admin_advertising[5] ?></label><select class="input" name="type" onchange="javascript:idShowHide(this.value); return false;"><option value="website"><?=$admin_advertising[6] ?></option><option value="affiliate"><?=$admin_advertising[7] ?></option></select></li>
	<?php } ?>


	<li><label><?=$admin_advertising[8] ?>:</label> <input class="input" name="name" type="text" value="<?=$data['bName'] ?>" size="40" maxlength="255"><div class="tip">Enter a memoriable name for your new banner advert.</div></li>
	

</div></ul> 

<ul class="form"><div class="box_body">


	<span id="UpBanner" style="display:none;">
		<li><label><?=$admin_advertising[9] ?>:</label><input class="input" type="file" name="uploadFile"> </li> 
		<div style="padding:5px; background:#eeeeee; border:1px solid #cccccc;"> <img src="inc/images/icons/flag_green.png" align="absmiddle"> <a href="#" onclick="idShowHide('UpBanner');idShowHide('UpCode')"><?=$admin_advertising[10] ?></a></div><br>
	</span>
	
	<span id="UpCode" style="display:visible;">
		<li><label><?=$admin_advertising[11] ?>:</label><textarea class="input" name="code" cols="25" rows="3" id="code" style="height:200px; width:550px;"><?=eMeetingOutput($data['code'],true) ?></textarea><div class="tip">Paste your HTML banner code into the box or select the upload button to upload a banner from your computer</div></li>
		<div style="padding:5px; background:#eeeeee; border:1px solid #cccccc;"> <img src="inc/images/icons/flag_green.png" align="absmiddle"> <a href="#" onclick="idShowHide('UpBanner');idShowHide('UpCode')"><?=$admin_advertising[12] ?></a></div><br>
	</span>            
	
	<li><label><?=$admin_advertising[13] ?>:</label><input class="input" name="link" type="text" value="<?=$data['urllocation'] ?>" size="40" maxlength="255"><div class="tip"><?=$admin_advertising[23] ?></div></li>


	<?php if(!isset($_REQUEST['id2'])){ ?>


</div> </ul> <ul class="form"><div class="box_body">


	<li><label>Position:</label>
	<select name="bannerpos" class="input">
	<option value="top" <?php if(isset($data['position'])){ if($data['position'] =="top"){print "selected";} } ?>>Top</option>
	<option value="middle" <?php if(isset($data['position'])){ if($data['position'] =="middle"){print "selected";} } ?>>Middle</option>
	<option value="left" <?php if(isset($data['position'])){ if($data['position'] =="left"){print "selected";} } ?>>Left</option>
	<option value="bottom" <?php if(isset($data['position'])){ if($data['position'] =="bottom"){print "selected";} } ?>>Bottom</option>
	</select>
	</li>


	<div id="affiliate" style="display:visible">
	<li><label><?=$admin_advertising[14] ?>:</label>
	<select name="showto" class="input"><option value="0" <?php if($data['clicks'] ==0){ print "selected"; } ?>><?=$admin_advertising[15] ?></option><option value="1" <?php if($data['clicks'] ==1){ print "selected"; } ?>><?=$admin_advertising[16] ?></option>
	<?
	$result = $DB->Query("SELECT fvid, fvCaption, fvOrder, lang FROM field_list_value WHERE fvFid =28 ORDER BY fvOrder ASC");
	while( $list = $DB->NextRow($result) ){	?><option value="<?=$list['fvid'] ?>"  <?php if($data['clicks'] ==$list['fvid']){ print "selected"; } ?>><?=$list['fvCaption']?> Only</option><?php } ?></select>
	</li>
	<li><label><?=$admin_advertising[17] ?> </label><select class="input" name="page"><option value="all"><?=$admin_search_val[12] ?></option><option value="index.php">Index / Home Page</option><? $mypage=$data['page']; ?><?=DisplayBannerPages($mypage)?></select></li>
	<li><label><?=$admin_advertising[18] ?>:</label> <input class="input" type="checkbox" name="active" value="1" <?php if($data['active'] =="yes"){print "checked"; } ?>></li>

	
	<?php } ?>
	    
</div>
<li><input value="<?=$admin_button_val[8] ?>" type="submit" class="MainBtn"></li> 
</ul>

 
</form>


<?php }elseif($_REQUEST['p'] == "preview"){ ?>

<div id="header-text">
	<h1><?=$admin_advertising[24] ?></h1>
</div>

<center>
<?php $data = BannerItems($_REQUEST['id']); print eMeetingOutput($data['code'],true); ?>
</center>

<?php } ?>