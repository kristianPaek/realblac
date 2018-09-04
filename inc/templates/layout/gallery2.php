<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<img src="/header.jpg">

<? if(isset($show_page) && ( $show_page=="albums" ||  $show_page=="display" || $show_page=="create" ||  $show_page=="upload" ||  $show_page=="manage" ||  $show_page=="edit" ) ){  ?>


<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>
	 	<li <? if($show_page=="albums" ||  $show_page=="manage" ||  $show_page=="edit" ){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=albums"><span><font color="#693333">View My Photos</font></span></a></li>
				<li <? if($show_page=="upload"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=upload"><span><font color="#693333">Add Photos</font></span></a></li>
		<li <? if($show_page=="display"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=display"><span><font color="#693333">Change Main Photo</font></span></a></li>

    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>
<? } ?>


<? if($show_page=="home"){ 


	 /**
	 * Page: Gallery Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>







	<style>
	.s1 { background: url(images/DEFAULT/_icons/new/acc/gal_1.jpg) no-repeat; background-position: 0% 50%}
	.s2 { background: url(images/DEFAULT/_icons/new/acc/gal_2.jpg) no-repeat; background-position: 0% 50%}
	.s3 { background: url(images/DEFAULT/_icons/new/acc/gal_3.jpg) no-repeat; background-position: 0% 50%}
	</style>
	<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>






<? }elseif($show_page=="display"){ 

	 /**
	 * Page: Display Photo
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>



<? if(!empty($my_image_array)){ ?>
		<!-- START DISPLAY IMAGE -->
	<div class="menu_box_title1">
	<span><a onclick="Effect.toggle('su','blind', {queue: 'end'}); return false;"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'su'); return false;" class="menu_expand"></a></span>
	<?=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?>
	</div>
	<div class="menu_box_body1" >	
<table width="440"  border="0">
  <tr><td width="91">

<div id="ShowDefaultPhoto1"><img src="<?=$GLOBALS['MyProfile']['image'] ?>&x=58&y=58" width="48" height="48"></div>

</td> <td width="549">


		<div id="form_car2">
		  <div class="previous_button"></div>  
		  <div class="container">
			<ul>
		   <?  foreach( $my_image_array as $value){ ?> <li><img src="<?=$value['image'] ?>" id="<?=$value['filename'] ?>" onClick="Over_ChangeDefaultPhoto('<?=$value['filename'] ?>','<?=$_SESSION['uid'] ?>');" style="cursor:pointer;" width="48" height="48"></li><? } ?>
			</ul>
		  </div>
		  <div class="next_button"></div>
	</div>
	
	<script>function runTest() {        hCarousel = new UI.Carousel("form_car2");     }Event.observe(window, "load", runTest); </script>
	<!-- END DISPLAY IMAGE -->
</td> </tr></table>
<div class="ClearAll"></div>
	</div>

<? }else{ ?>
<h2>No Uploaded Photos. </h2>
<? } ?>

<? }elseif($show_page=="upload"){ 

	 /**
	 * Page: Gallery Upload
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>

 
	<? if(UP_PHOTO !=0 || UP_VIDEO !=0 || UP_MUSIC != 0 || UP_YOUTUBE != 0){ ?>
	<span id="response_upload" class="responce_alert"></span>
	<form name="FileUpload" enctype="multipart/form-data" method="post" action="<?=DB_DOMAIN ?>index.php" <? if(!isset($_REQUEST['eid'])){ ?> onSubmit="return CheckUploadNulls();" <? } ?>>
	<? if(isset($_GET['eid'])){ ?>
	<input type="hidden" name='eid' value="<?=$_REQUEST['eid'] ?>" class="hidden">
	<input type="hidden" name='do' value="edit" class="hidden">
	<input name="sub" type="hidden" value="albums" class="hidden">
	<? }else{ ?>
	<input type="hidden" name='do' value="upload" class="hidden">
	<input name="sub" type="hidden" value="upload" class="hidden">
	<? } ?>
	<input type="hidden" name="default" value="0" class="hidden">
	<input type="hidden" name="type" value="photo" id="UploadType" class="hidden">
	<input type="hidden" name='uploadNeed' value=1 class="hidden">	
	<input name="do_page" type="hidden" value="gallery" class="hidden">
	<input name="javascriptType" type="hidden" value="photo" class="hidden" id="javascriptType">
	<input name="javascriptError" type="hidden" value="<?=$GLOBALS['_LANG_ERROR']['_notaccepted'] ?>" class="hidden" id="javascriptError">


	<ul class="form"><div class="CapBody">        
	
		<!-- ****************** UPLOAD WAITING / LOADING SCREEN ************** -->
		<div id="UploadWait">
			<p><strong><?=$GLOBALS['LANG_GALLERY']['a4'] ?></strong></p>
			<p><?=$GLOBALS['LANG_GALLERY']['a5'] ?></p>
			<p><img src="<?=DB_DOMAIN ?>images/DEFAULT/_gal/loading.gif"></p>
		</div>
		<!-- **************************************************************** -->   
		
		<div id="UploadBox">
					  
		<li><label><font color="#693333">Your Album</font> </label><select name="aid">  <?=$gallery_display_showalbums ?> </select></li>
		<? if(!isset($_REQUEST['eid'])){ ?>
		
		<!-- DISPLAY UPLOAD OPTIONS -->
		<li id="FileType"><label><font color="#693333">Choose type</font></label>
			<select class="input" name="type" onchange="javascript:ChangeUploadType(this.value); return false;">
			<option value="photo">--- CHOOSE A FILE --- </option>
			 <? if(UP_PHOTO ==1){ ?> <option value="photo"><?=$GLOBALS['_LANG']['_photo'] ?></option> <? } ?>
			 <? if(UP_VIDEO ==1){ ?> <option value="video"><?=$GLOBALS['_LANG']['_video'] ?></option> <? } ?>
			 <? if(UP_MUSIC ==1){ ?> <option value="music"><?=$GLOBALS['_LANG']['_music'] ?></option> <? } ?>
			 <? if(UP_YOUTUBE ==1){ ?> <option value="youtube">YouTube</option><? } ?>
			</select>

		</li>
		
	
		<li id="TypePhoto"><label><?=$GLOBALS['_LANG']['_file'] ?>: </label>
<br /><br />
		<span id="upMe1" style="display:visible; margin-left:110px;"> 1. <input name="uploadFile00" type="file" id="uploadFile00"></span>
<br /><br />
		<span id="upMe2" style="display:visible; margin-left:110px;"> 2. <input name="uploadFile01" type="file" id="uploadFile01" onChange="toggleLayer('upMe3');"></span>
		<span id="upMe3" style="display:none;margin-left:110px;">3. <input name="uploadFile02" type="file" id="uploadFile02" onChange="toggleLayer('upMe4');"></span>
		<span id="upMe4" style="display:none;margin-left:110px;">4. <input name="uploadFile03" type="file" id="uploadFile03" onChange="toggleLayer('upMe5');"></span>
		<span id="upMe5" style="display:none;margin-left:110px;">5. <input name="uploadFile04" type="file" id="uploadFile04" onChange="toggleLayer('upMe6');"></span>
		<span id="upMe6" style="display:none;margin-left:110px;">6. <input name="uploadFile05" type="file" id="uploadFile05" onChange="toggleLayer('upMe7');"></span>
		<span id="upMe7" style="display:none;margin-left:110px;">7. <input name="uploadFile06" type="file" id="uploadFile06" onChange="toggleLayer('upMe8');"></span>
		<span id="upMe8" style="display:none;margin-left:110px;">8. <input name="uploadFile07" type="file" id="uploadFile07" onChange="toggleLayer('upMe9');"></span>
		<span id="upMe9" style="display:none;margin-left:110px;">9. <input name="uploadFile08" type="file" id="uploadFile08" onChange="toggleLayer('upMe10');"></span>
		<span id="upMe10" style="display:none;margin-left:110px;">10. <input name="uploadFile09" type="file" id="uploadFile09" onChange="toggleLayer('upMe11');"></span>
		<span id="upMe11" style="display:none;margin-left:110px;"> <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> You cannot add any more files yet.</span>

		 <div class="tip"><?=$GLOBALS['LANG_GALLERY']['a16'] ?></div>
		</li>
	
		</select>
		 <div class="tip"><?=$GLOBALS['LANG_GALLERY']['a20'] ?></div>
		</li>
	
		<li id="TypeMusic"><label><?=$GLOBALS['_LANG']['_file'] ?>:</label><input name="uploadFile011" type="file" id="uploadFile011">
		<p class="note"><?=$GLOBALS['LANG_GALLERY']['a22'] ?>.</p>
		 <div class="tip"><?=$GLOBALS['LANG_GALLERY']['a23'] ?></div>
		</li>
				
		<li id="TypeYouTube"><label><?=$GLOBALS['_LANG']['_link'] ?>:  </label><input id="YoutubeURL" name="url" type="text" size="40" class="input">
		<p class="note"><?=$GLOBALS['LANG_GALLERY']['a25'] ?></p>
		 <div class="tip"><?=$GLOBALS['LANG_GALLERY']['a26'] ?></div>
		</li>
	

		<li id="TypeVideo"><label><?=$GLOBALS['_LANG']['_file'] ?>:</label><input name="uploadFile012" type="file" id="uploadFile012">
		<p class="note"><?=$GLOBALS['LANG_GALLERY']['a28'] ?></p>
		 <div class="tip"><?=$GLOBALS['LANG_GALLERY']['a29'] ?></div>
		</li>	
		<!-- END FILE TYPES -->
		<? } ?>
		 
		<? if(D_FREE=="no" && ENABLE_ADULTCONTENT=="yes"){ ?>
		<li><label><?=$GLOBALS['_LANG']['_adultContent'] ?>:  </label><select name="upAdult"  class="input">
		<option value="no"><?=$GLOBALS['_LANG']['_no'] ?></option>
		<option value="yes" <? if(isset($file_array) && $file_array['adult_content'] =="yes"){ print "selected";  } ?>><?=$GLOBALS['_LANG']['_yes'] ?></option>  
		</select><p class="note"><?=$GLOBALS['_LANG_ERROR']['_adultWarning'] ?></p></li>
		<? }else{ ?>
		<input type="hidden" name="upAdult" value="no">
		<? } ?>
		
		
		<li><input name="Input" type="submit" value="<?=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn" id="Input"></li>
		</div> 
		
	</div>
	</ul>
	</form>

	<? } ?>













<? }elseif($show_page=="albums"){ 

	 /**
	 * Page: Gallery Manage Albums
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>
<style>
.defaultFile {
border:3px solid red;
}
</style>





<span id="response_gallery" class="responce_alert"></span>

<div class="menu_box_body1">
<div class="album-gallery">	  
  <ul>
    <? foreach($gallery_albums as $value){ ?>
	<li id='Album_<?=$value['aid']?>'  style="background:white;color:#000000;">


		<div class="AlbumFilePic"><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=manage&aid=<?=$value['aid'] ?>"><img src="<?=$value['image'] ?>"></a></div>
		<small style="font-size:16px;"><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=manage&aid=<?=$value['aid'] ?>">Photos</a> ( <?=$value['filecount'] ?> ) |
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_gal/add.gif"  align="absmiddle" style="border:0px;">
        <a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=upload"><?=$GLOBALS['_LANG']['_add'] ?> Photos</a>
		<? if($value['password'] !=""){ ?>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/key_add.png" align="absmiddle" style="border:0px;">		
		<? } ?>
		</small>		
	</li>
    <? } ?>
  </ul>
</div>

</div>











<? }elseif($show_page=="manage"){ 

	 /**
	 * Page: Gallery Manage Album Files
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>

<div class="menu_box_body1">

<!-- DISPLAY FOLDER BODY --->
<div id="FolderBody">

<span id="response_gallery" class="responce_alert"></span>

		<!-- START ALBUM DISPLAY -->
		<div class="gallery">	  
		  <ul>
			<? if(is_array($gallery_display_albums)) { foreach($gallery_display_albums as $value){ ?>
			<div id='File_<?=$value['id'] ?>'>
				<li  style="background:white; height:200px;">
							<!-- DISPLAY ALBUM FILE -->
							<div class="ClearAll"></div>
							<div class="PicFrame">
								<div class="PicFramebody">
                                    <a href="<?=$value['edit_link'] ?>"<? if($value['default'] ==1){ ?>class="defaultFile"<? } ?>>
                                        <img src="<?=$value['image'] ?>">
                                    </a>

                                </div>
                                <input type="image" src="<?=DB_DOMAIN ?>images/rotate.gif" alt="Submit" onclick="rotateimg('<?=$value['bigimage'] ?>')" style="width: 20px;">
								</div><div class="ClearAll"></div>	
							<small style="font-size:20px;"><?=$value['views'] ?> <?=$GLOBALS['_LANG']['_views'] ?><a href='#' onclick="Effect.Fade('File_<?=$value['id'] ?>'); DeleteFile('<?=$value['id'] ?>'); return false;"><?=$GLOBALS['_LANG']['_delete'] ?></a>
							</small>	
<!--<br><? if($value['type'] =="photo" && $value['adult'] !="yes"){ ?><a href='#' onClick="MakeDefaultP(<?=$value['id'] ?>); return false;" style="color:red;"><?=$GLOBALS['LANG_GALLERY']['a44'] ?></a> <? } ?> -->
																	
							<!-- END ALBUM FILE DISPLAY -->
				</li>
				
			</div>					
			<? } }?>
			
			<!-- NO ALBUM FILES -->
			<? if(count($gallery_display_albums) ==0){ ?>
			<li> <img src="<?=DB_DOMAIN ?>images/no_photo_big.jpg" width="86px" style="float:left;padding-left:9px;border:0px;"><?=$GLOBALS['LANG_GALLERY']['a46'] ?></li>
			<? } ?>
			<!-- END NO ALBUM FILES -->
			
		  </ul>
		</div>
		<!-- END ALBUM DISPLAY -->

</div>
<!-- END FOLDER BODY --->
</div>












<? }elseif($show_page=="edit"){ 

	 /**
	 * Page: Gallery Edit File
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>

	<script type='text/javascript' src="newadmin/inc/js/silverlight.js"></script>
	<script type='text/javascript' src="newadmin/inc/js/wmvplayer.js"></script>
	
	
	
	<style>
	#MainImage { max-width:400px;}
	</style>

	<script type="text/javascript" src="<?=DB_DOMAIN ?>inc/js/swfobject.js"></script>
	<script>
	var numAudioPlayers = 1; 
	
	function loadSWFObject(id, pathToFile, src, w, h, v, bgcolor) {
		var strName = "podcast" + id;
	
		var so = new SWFObject(src, strName, w, h, v, bgcolor);
				 so.addParam("name", strName);
				 so.addParam("allowScriptAccess", "sameDomain");
				 so.addVariable("podcastFile", pathToFile);
				 so.addVariable("id", id);
				 so.addVariable("numAudioPlayers", numAudioPlayers);
				 so.write(strName);
	}
	</script>	

	<table width="660"  border="0"><tr><td width="438" valign="top">
		<? if($FileData['type']=="music"){ ?>
			<div id="podcast<?=$FileData['id'] ?>">Please install flash.</div>
			<script type="text/javascript">	loadSWFObject(<?=$FileData['id'] ?>, "<?=WEB_PATH_MUSIC.$FileData['bigimage'] ?>", "<?=DB_DOMAIN ?>inc/exe/flash/mp3_player.swf", "94", "61", "6", "#ffffff"); </script>		
		<? }else{ ?>
				<!-- Rotate Image Function -->
				<?php				
				//if(!empty($_POST['clicks'])){
				if(isset($_POST['clicks'])){
					$deg = $_POST['clicks'];
						$path = $_SERVER['DOCUMENT_ROOT'];
						$path .= "/meet/SimpleImage.php";
						include_once($path);
					$image = $_SERVER['DOCUMENT_ROOT']."/meet/uploads/images/".$_POST['file'];
					$imagesave = "uploads/images/".$_POST['file'];
					//include('../../SimpleImage.php');

					try {
						$img = new abeautifulsite\SimpleImage($image);
						$img->rotate($deg)->save("uploads/images/".$_POST['file']);
						} catch(Exception $e) {
							echo 'Error: ' . $e->getMessage();
					}

				}
				?>
				<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
				<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
				
				<!-- End of Rotate Image Function -->				
	  	<div align="center">
			<script type="text/javascript" src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>		
		<?
		
		echo "<img src='http://www.realblacklove.com/meet/uploads/images/".$FileData['bigimage']."' id='image'>";
		?>
		</div>
		<div>
		
		<form method="post" action="">
		<input type="hidden" name="file" value="<?=$FileData['bigimage']?>">
		<input type="hidden" name="clicks" id="clicks">

		</form>
		<script>
					var value = 0
					$("#img").rotate({
					   bind: 
						 { 
							click: function(){
								value +=90;
								$("#image").rotate({ animateTo:value})
								var clicks = 0;
								
							}
						 } 
					   
					});
					var clicks = 0
					function onClick() {
							clicks += 90;
							document.getElementById("clicks").innerHTML = clicks;
							var elem = document.getElementById("clicks");
							elem.value = clicks%360;
					};
				</script>
	  	</div>
	  <? } ?>	
	
	</td> 
	<!-- DISPLAY FOLDER BODY --->
	
	
	
	<!--<form method="post" action="<?=DB_DOMAIN ?>index.php" name="UpdateBlog">
	<input type="hidden" id="ChangeOrder" name="ChangeOrder" value="maildate" class="hidden">
	<input name="sub" type="hidden" value="edit" class="hidden">
	<input name="aid" type="hidden" value="<?=$_REQUEST['aid'] ?>" class="hidden">
	<input name="lid" type="hidden" value="<?=$_REQUEST['lid'] ?>" class="hidden">
	<input name="do_page" type="hidden" value="gallery" class="hidden">
	</form>-->













<? }elseif($show_page=="search"){ 

	 /**
	 * Page: Gallery Create Album
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>
<? }elseif($show_page=="create"){ 

	 /**
	 * Page: Gallery Create Album
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */


?>

<form method="post" action="<?=DB_DOMAIN ?>index.php" onSubmit="return CheckNullsAlbums('<?=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">
<input type="hidden" name="do" value="addalbum" class="hidden">
<input name="do_page" type="hidden" value="gallery" class="hidden">
<? if(isset($_REQUEST['aid'])){ ?>
<input name="sub" type="hidden" value="albums" class="hidden">
<input type="hidden" name="aid" value="<?=$_REQUEST['aid'] ?>" class="hidden">
<? }else{ ?>
<input name="sub" type="hidden" value="upload" class="hidden">
<? }?>

<ul class="form"> 
<div class="CapBody">                        
<li><label><?=$GLOBALS['_LANG']['_title'] ?>: </label>  <input id="a1" name="title" type="text" class="input" size="40" value="<? if(isset($album)){print $album['title']; } ?>">
<div class="tip"><?=$GLOBALS['LANG_GALLERY']['a64'] ?></div>
</li>


<li><label><?=$GLOBALS['_LANG']['_visibility'] ?></label><br><br>
		
			 <input name="catid"  type="radio" value="private" id="catid_1" class="radio" onclick="javascript:enablePrivateField();" <? if(isset($album)){ if($album['cat'] =="private"){ print"checked";} } ?> style="margin-right:20px;border:0px;"/><?=$GLOBALS['LANG_GALLERY']['a66'] ?><br /> 
			 	 <div style="padding-left: 50px;line-height:40px;">

		              <input type="checkbox" name="ah" value="y" id="catid_type2" style="margin-right:20px;border:0px;" <? if(isset($album)){ if($album['allow_h'] =="y"){ print"checked";}else{ print "disabled"; } } ?>><?=$GLOBALS['_LANG']['_hotList'] ?><br>			
			  
		  </div>
            <input name="catid" type="radio" value="public"  class="radio" onclick="javascript:DisablePrivateField();" style="margin-right:20px;border:0px;" <? if(isset($album)){ if($album['cat'] =="public"){ print"checked";} }else{ print "checked"; } ?> /><?=$GLOBALS['LANG_GALLERY']['a70'] ?>
        <div class="tip"><?=$GLOBALS['LANG_GALLERY']['a71'] ?></div>
	
</li>
<!--
<? if(!isset($_REQUEST['aid'])){ ?>
<? }else{ ?>
<input type="hidden" name="af" value="<?=$album['allow_f'] ?>">
<input type="hidden" name="ah" value="<?=$album['allow_h'] ?>">
<input type="hidden" name="aa" value="<?=$album['allow_a'] ?>">
<input type="hidden" name="catid" value="<?=$album['cat'] ?>">			  
<? } ?>
-->
<li><label><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/key_add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_password'] ?>:  </label><input name="password"  class="input" type="text" size="40" value="<? if(isset($album)){ print $album['password']; } ?>"><p class="note"><?=$GLOBALS['LANG_GALLERY']['76'] ?></p></li>
		
<li><label><?=$GLOBALS['_LANG']['_description'] ?></label>	<textarea id="a2" name="commentsBox" cols=40 rows=7 class="input"><? if(isset($album)){print $album['comment']; } ?></textarea></li>
<li><input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>
</div>
</ul>
</form>








	<div id="eMeetingContentBox">

	<form method="GET" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="dll" type="hidden" value="gallery" class="hidden">
	<input name="sub" type="hidden" value="search" class="hidden">
	
	<div id="Title">
		<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=upload" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
		<span class="a1"><?=$PageTitle ?></span>
		<span class="a2"><?=$PageDesc ?></span>
	</div>

	<?=$ThisPersonsNetworkBar ?>

	<div id="Search">
		<span class="a1"><input name="keyword" type="text" class="input"> <input type="submit" value="<?=$GLOBALS['_LANG']['_search'] ?>" class="NormBtn"></span>
		<span class="a2"><?=$Search_Page_Numbers ?></span>
	</div>
	<div id="Results"> 
		<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
		
	</div>
	
	</form> 

 	<span id="response_event" class="responce_alert"></span>

 	<span id="response_gallery" class="responce_alert"></span>

	
	<form name="SearchResults" method="post" action="<?=DB_DOMAIN ?>index.php?dll=<?=$page ?><? if(isset($search_page)){ print "&view_page=".strip_tags($search_page); }else{ print "&view_page=1"; } ?>">
	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">
	<input name="page" type="hidden" value="<? if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">
	<input name="sub" type="hidden" value="<?=$sub_page ?>" class="hidden">
	<input name="do_page" type="hidden" value="<?=$page ?>" class="hidden">
	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">
	<? if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?=$item_id ?>" class="hidden"> <? } ?>
	<? if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?=$search_uid ?>" class="hidden"> <? } ?>

	<? if($search_total_results ==0){ ?>
	
	<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=gallery&sub=search"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>
	
	<? } ?>
	
	<? $i=1; foreach($search_data as $value){ ?>	
	
	
		<div class="Acc_ListBox <? if($value['ThisApproved']=="no"){ ?>search_display_unapproved<? }else{ if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } } ?>">
		<div class="Acc_ListBox_left"><div class="pic75"><a class="photo_75" href="<?=$value['link'] ?>" title="<?=$value['title'] ?>"><img src="<?=$value['images'][1]['image'] ?>" width="96" height="96"></a></div></div>
		<div class="Acc_ListBox_right">	
		<div class="Acc_ListBox_right1">
		<div class="Acc_ListBox_title_break">
		<a href="<?=$value['link'] ?>" title="<?=$value['title'] ?>"><?=$value['title'] ?></a></div>
		<b>   <?=$GLOBALS['_LANG']['_username'] ?>: <a href="<?=$value['user_link'] ?>"><?=$value['username'] ?></a> - <?=$GLOBALS['_LANG']['_files'] ?> <?=$value['filecount'] ?> </b>
		<div class="Acc_ListBox_margin5"></div>	
		<? if(count($value['images']) >1){for ($ix=2;$ix<=count($value['images']);$ix++) {print '<a href="'.$value['images'][$ix]['link'].'"><img src="'.$value['images'][$ix]['image'].'" style="border:1px solid #ccc; margin-right:8px;" width="40" height="40"></a>';}} ?>
		</div><div class="Acc_ListBox_right2"><div>		
		<? if($value['password'] != ""){  ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/key_delete.png" align="absmiddle"><? }else{ ?><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" width="16" height="16" align="absmiddle"><? } ?> <a href="<?=$value['link'] ?>"><?=$GLOBALS['_LANG']['_view'] ?></a>	 <br>
		<img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/user.png" width="16" height="16" align="absmiddle"> <a href="<?=$value['user_link'] ?>"><?=$GLOBALS['LANG_COMMON'][11] ?></a>				
	
		</div>
		</div><div class="clear"></div></div><div class="clear"></div></div>	
		<div class="ClearAll"></div>
	
	<? $i++; } ?>							

	<div id="Bottom"><?=$Search_Page_Numbers ?></div>
	
	</form>

	</div> <!-- end main box -->


<? } ?>
