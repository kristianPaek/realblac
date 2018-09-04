<?php

## block direct page access

defined( 'KEY_ID' ) or die( 'Restricted access' );



?>





<?php if(isset($show_page) && ( $show_page=="albums" ||  $show_page=="display" || $show_page=="create" ||  $show_page=="upload" ||  $show_page=="manage" ||  $show_page=="edit" ) ){  ?>





<div id="eMeeting" class="user">

  <div class="header account_tabs">

    <ul>

	 	<li <?php if($show_page=="albums" ||  $show_page=="manage" ||  $show_page=="edit" ){ ?>class="selected"<?php } ?>><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=albums"><span><font color="#693333">View My Photos</font></span></a></li>

				<li <?php if($show_page=="upload"){ ?>class="selected"<?php } ?>><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=upload"><span><font color="#693333">Add Photos</font></span></a></li>

		<li <?php if($show_page=="display"){ ?>class="selected"<?php } ?>><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=display"><span><font color="#693333">Change Main Photo</font></span></a></li>



    </ul>

    <div class="ClearAll"></div>

 </div>

</div>

<br>

<?php } ?>







<?php if($show_page=="home"){ 





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

	<?php=BuildPageHomeMenu($SubSub_Lang, $page) ?>













<?php }elseif($show_page=="display"){ 



	 /**

	 * Page: Display Photo

	 *

	 * @version  8.0

	 * @created  Fri Jan 18 10:48:31 EEST 2008

	 * @updated  Fri Sep 24 16:28:31 EEST 2008

	 */



?>







<?php if(!empty($my_image_array)){ ?>

		<!-- START DISPLAY IMAGE -->

	<div class="menu_box_title1">

	<span><a onclick="Effect.toggle('su','blind', {queue: 'end'}); return false;"> <img src="<?php=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'su'); return false;" class="menu_expand"></a></span>

	<?php=$GLOBALS['LANG_GLO_OPTIONS']['37'] ?>

	</div>

	<div class="menu_box_body1" >	

<table width="240"  border="0">

  <tr><td width="91">



<div id="ShowDefaultPhoto1"><img src="<?php=$GLOBALS['MyProfile']['image'] ?>&x=58&y=58" width="48" height="48"></div>



</td> <td width="549">





		<div id="form_car2">

		  <div class="previous_button"></div>  

		  <div class="container">

			<ul>

		   <?php  foreach( $my_image_array as $value){ ?> <li><img src="<?php=$value['image'] ?>" id="<?php=$value['filename'] ?>" onClick="Over_ChangeDefaultPhoto('<?php=$value['filename'] ?>','<?php=$_SESSION['uid'] ?>');" style="cursor:pointer;" width="48" height="48"></li><?php } ?>

			</ul>

		  </div>

		  <div class="next_button"></div>

	</div>

	

	<script>function runTest() {        hCarousel = new UI.Carousel("form_car2");     }Event.observe(window, "load", runTest); </script>

	<!-- END DISPLAY IMAGE -->

</td> </tr></table>

<div class="ClearAll"></div>

	</div>



<?php }else{ ?>

<h2>No Uploaded Photos. </h2>

<?php } ?>



<?php }elseif($show_page=="upload"){ 



	 /**

	 * Page: Gallery Upload

	 *

	 * @version  8.0

	 * @created  Fri Jan 18 10:48:31 EEST 2008

	 * @updated  Fri Sep 24 16:28:31 EEST 2008

	 */



?>



 

	<?php if(UP_PHOTO !=0 || UP_VIDEO !=0 || UP_MUSIC != 0 || UP_YOUTUBE != 0){ ?>

	<span id="response_upload" class="responce_alert"></span>

	<form name="FileUpload" enctype="multipart/form-data" method="post" action="<?php=DB_DOMAIN ?>index.php" <?php if(!isset($_REQUEST['eid'])){ ?> onSubmit="return CheckUploadNulls();" <?php } ?>>

	<?php if(isset($_GET['eid'])){ ?>

	<input type="hidden" name='eid' value="<?php=$_REQUEST['eid'] ?>" class="hidden">

	<input type="hidden" name='do' value="edit" class="hidden">

	<input name="sub" type="hidden" value="albums" class="hidden">

	<?php }else{ ?>

	<input type="hidden" name='do' value="upload" class="hidden">

	<input name="sub" type="hidden" value="upload" class="hidden">

	<?php } ?>

	<input type="hidden" name="default" value="0" class="hidden">

	<input type="hidden" name="type" value="photo" id="UploadType" class="hidden">

	<input type="hidden" name='uploadNeed' value=1 class="hidden">	

	<input name="do_page" type="hidden" value="gallery" class="hidden">

	<input name="javascriptType" type="hidden" value="photo" class="hidden" id="javascriptType">

	<input name="javascriptError" type="hidden" value="<?php=$GLOBALS['_LANG_ERROR']['_notaccepted'] ?>" class="hidden" id="javascriptError">





	<ul class="form"><div class="CapBody">        

	

		<!-- ****************** UPLOAD WAITING / LOADING SCREEN ************** -->

		<div id="UploadWait">

			<p><strong><?php=$GLOBALS['LANG_GALLERY']['a4'] ?></strong></p>

			<p><?php=$GLOBALS['LANG_GALLERY']['a5'] ?></p>

			<p><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_gal/loading.gif"></p>

		</div>

		<!-- **************************************************************** -->   

		

		<div id="UploadBox">

					  

		<li><label><font color="#693333">Destination</font> </label><select name="aid">  <?php=$gallery_display_showalbums ?> </select></li>

		<?php if(!isset($_REQUEST['eid'])){ ?>

		

		<!-- DISPLAY UPLOAD OPTIONS -->

		<li id="FileType"><label><font color="#693333">Type</font></label>

			<select class="input" name="type" onchange="javascript:ChangeUploadType(this.value); return false;">

			<option value="photo">--- CHOOSE A FILE --- </option>

			 <?php if(UP_PHOTO ==1){ ?> <option value="photo"><?php=$GLOBALS['_LANG']['_photo'] ?></option> <?php } ?>

			 <?php if(UP_VIDEO ==1){ ?> <option value="video"><?php=$GLOBALS['_LANG']['_video'] ?></option> <?php } ?>

			 <?php if(UP_MUSIC ==1){ ?> <option value="music"><?php=$GLOBALS['_LANG']['_music'] ?></option> <?php } ?>

			 <?php if(UP_YOUTUBE ==1){ ?> <option value="youtube">YouTube</option><?php } ?>

			</select>

		</li>

		

	

		<li id="TypePhoto"><label><?php=$GLOBALS['_LANG']['_file'] ?>: </label>

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

		<span id="upMe11" style="display:none;margin-left:110px;"> <img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/cancel.png" align="absmiddle"> You cannot add any more files yet.</span>



		 <div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a16'] ?></div>

		</li>

	

		</select>

		 <div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a20'] ?></div>

		</li>

	

		<li id="TypeMusic"><label><?php=$GLOBALS['_LANG']['_file'] ?>:</label><input name="uploadFile011" type="file" id="uploadFile011">

		<p class="note"><?php=$GLOBALS['LANG_GALLERY']['a22'] ?>.</p>

		 <div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a23'] ?></div>

		</li>

				

		<li id="TypeYouTube"><label><?php=$GLOBALS['_LANG']['_link'] ?>:  </label><input id="YoutubeURL" name="url" type="text" size="40" class="input">

		<p class="note"><?php=$GLOBALS['LANG_GALLERY']['a25'] ?></p>

		 <div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a26'] ?></div>

		</li>

	



		<li id="TypeVideo"><label><?php=$GLOBALS['_LANG']['_file'] ?>:</label><input name="uploadFile012" type="file" id="uploadFile012">

		<p class="note"><?php=$GLOBALS['LANG_GALLERY']['a28'] ?></p>

		 <div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a29'] ?></div>

		</li>	

		<!-- END FILE TYPES -->

		<?php } ?>

		 

		<?php if(D_FREE=="no" && ENABLE_ADULTCONTENT=="yes"){ ?>

		<li><label><?php=$GLOBALS['_LANG']['_adultContent'] ?>:  </label><select name="upAdult"  class="input">

		<option value="no"><?php=$GLOBALS['_LANG']['_no'] ?></option>

		<option value="yes" <?php if(isset($file_array) && $file_array['adult_content'] =="yes"){ print "selected";  } ?>><?php=$GLOBALS['_LANG']['_yes'] ?></option>  

		</select><p class="note"><?php=$GLOBALS['_LANG_ERROR']['_adultWarning'] ?></p></li>

		<?php }else{ ?>

		<input type="hidden" name="upAdult" value="no">

		<?php } ?>

		

		

		<li><input name="Input" type="submit" value="<?php=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn" id="Input"></li>

		</div> 

		

	</div>

	</ul>

	</form>



	<?php } ?>



























<?php }elseif($show_page=="albums"){ 



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

    <?php foreach($gallery_albums as $value){ ?>

	<li id='Album_<?php=$value['aid']?>'  style="background:white;color:#000000;">

	

		<span> <font color="#530000">My Photos</font></span>		

		

		<div class="AlbumFilePic"><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=manage&aid=<?php=$value['aid'] ?>"><img src="<?php=$value['image'] ?>"></a></div>		

		<small style="font-size:11px;"><?php=$GLOBALS['_LANG']['_files'] ?> <?php=$value['filecount'] ?> <br>

		<img src="<?php=DB_DOMAIN ?>images/DEFAULT/_gal/add.gif"  align="absmiddle" style="border:0px;"> <a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=upload"><?php=$GLOBALS['_LANG']['_add'] ?></a> |

		<img src="<?php=DB_DOMAIN ?>images/DEFAULT/_gal/delete.gif"  align="absmiddle" style="border:0px;"> <a href="#" onclick="Effect.Fade('Album_<?php=$value['aid'] ?>'); DeleteAlbum('<?php=$value['aid'] ?>'); return false;"><?php=$GLOBALS['_LANG']['_delete'] ?></a>



		<?php if($value['password'] !=""){ ?>

		<img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/key_add.png" align="absmiddle" style="border:0px;">		

		<?php } ?>

		</small>		

	</li>

    <?php } ?>

  </ul>

</div>



</div>























<?php }elseif($show_page=="manage"){ 



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

			<?php if(is_array($gallery_display_albums)) { foreach($gallery_display_albums as $value){ ?>				

			<div id='File_<?php=$value['id'] ?>'>		

				<li  style="background:white; height:150px;">

							<!-- DISPLAY ALBUM FILE -->

							<div class="ClearAll"></div>

							<div class="PicFrame">

								<div class="PicFramebody"><a href="<?php=$value['edit_link'] ?>"<?php if($value['default'] ==1){ ?>class="defaultFile"<?php } ?>><img src="<?php=$value['image'] ?>"></a></div>

								

								<h4><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=upload&eid=<?php=$value['id'] ?>">

<U>Edit Photo</U></a></h4></div>							



							<div class="ClearAll"></div>	

							<small style="font-size:10px;">

								<?php=$value['views'] ?> <?php=$GLOBALS['_LANG']['_views'] ?>

								<?php if($value['adult'] =="yes"){ ?>[ Adult ]<?php } ?>

								[ <a href='#' onclick="Effect.Fade('File_<?php=$value['id'] ?>'); DeleteFile('<?php=$value['id'] ?>'); return false;"><?php=$GLOBALS['_LANG']['_delete'] ?></a> ]

							</small>	

<!--<br><?php if($value['type'] =="photo" && $value['adult'] !="yes"){ ?><a href='#' onClick="MakeDefaultP(<?php=$value['id'] ?>); return false;" style="color:red;"><?php=$GLOBALS['LANG_GALLERY']['a44'] ?></a> <?php } ?> -->

																	

							<!-- END ALBUM FILE DISPLAY -->

				</li>

				

			</div>					

			<?php } }?>

			

			<!-- NO ALBUM FILES -->

			<?php if(count($gallery_display_albums) ==0){ ?>

			<li> <img src="<?php=DB_DOMAIN ?>images/no_photo_big.jpg" width="86px" style="float:left;padding-left:9px;border:0px;"><?php=$GLOBALS['LANG_GALLERY']['a46'] ?></li>

			<?php } ?>

			<!-- END NO ALBUM FILES -->

			

		  </ul>

		</div>

		<!-- END ALBUM DISPLAY -->



</div>

<!-- END FOLDER BODY --->

</div>

























<?php }elseif($show_page=="edit"){ 



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



	<script type="text/javascript" src="<?php=DB_DOMAIN ?>inc/js/swfobject.js"></script>

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

		<?php if($FileData['type']=="music"){ ?>

			<div id="podcast<?php=$FileData['id'] ?>">Please install flash.</div>

			<script type="text/javascript">	loadSWFObject(<?php=$FileData['id'] ?>, "<?php=WEB_PATH_MUSIC.$FileData['bigimage'] ?>", "<?php=DB_DOMAIN ?>inc/exe/flash/mp3_player.swf", "94", "61", "6", "#ffffff"); </script>		

		<?php }else{ ?>

	  	<div align="center"><?php=$FileData['src'] ?></div>

	  <?php } ?>	

	

	</td> <td width="212" valign="top">



	

	<div class="menu_box_title1">

	<span><img src="<?php=DB_DOMAIN ?>images/DEFAULT/blank.gif" width="30" height="29" onClick="expandcontent(this,'s1')" class="menu_noexpand"></span>

	<?php=$GLOBALS['_LANG']['_information'] ?> </div>

	<div class="menu_box_body1">

	

	<div style="background:#eee; border:1px solid #ccc; overflow:auto; height:100px; line-height:25px;">

	

	<strong><?php=$GLOBALS['_LANG']['_title'] ?>:</strong> <br><span id="FileCaption1" style="margin-bottom:15px;"> <?php=$FileData['title'] ?></span>   <br>

	<strong><?php=$GLOBALS['_LANG']['_description'] ?>:</strong> <br> <span id="FileDesc"> <?php=$FileData['description'] ?></span>

	

	</div>

	<span><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_icons/new/pencil.png" width="16" height="16" align="absmiddle"> <a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=upload&eid=<?php=$item3_id ?>"><?php=$GLOBALS['_LANG']['_edit'] ?></a></span><br>

	

	<br>

	<span><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/emoticon_tongue.png" width="16" height="16" align="absmiddle"> (<?php=$FileData['rating'] ?> %) <?php=$FileData['rating_image'] ?> </span><br>

	<br>

	<img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" alt="views" align="absmiddle"> (<?php print $FileData['views']; ?> <?php=$GLOBALS['_LANG']['_views'] ?>) <br>

	<p>

	<span><?php=$GLOBALS['_LANG']['_album'] ?>: </span><SPAN class=tags><?php print $FileData['album_title']; ?></SPAN>&nbsp; <img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/wrench.png" align="absmiddle"><BR>

	</p>

	

	

	<form method="post" action="<?php=DB_DOMAIN ?>index.php">

	<input name="do_page" type="hidden" value="gallery" class="hidden">

	<input name="sub" type="hidden" value="albums" class="hidden">

	<input name="aid" type="hidden" value="<?php=$item2_id ?>" class="hidden">

	<input name="lid" type="hidden" value="<?php=$item3_id ?>" class="hidden">

	<input type="hidden" name='do' value="changeAlbum" class="hidden">

	  <select name="new_aid" class="input">

		<?php=$gallery_display_showalbums ?>

	  </select>

	  <input type="submit" name="Submit" value="<?php=$GLOBALS['_LANG']['_save'] ?>" class="MainBtn">

	</form>

	<br>

	<span><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_icons/16/lock.gif" width="16" height="16" align="absmiddle"> <?php=$GLOBALS['_LANG']['_adultContent'] ?>: <?php=$FileData['adult_content']; ?></span>

	

	

	<p>

	</div></td>

	  </tr>

	</table>

	<!-- DISPLAY FOLDER BODY --->

	

	

	

	<form method="post" action="<?php=DB_DOMAIN ?>index.php" name="UpdateBlog">

	<input type="hidden" id="ChangeOrder" name="ChangeOrder" value="maildate" class="hidden">

	<input name="sub" type="hidden" value="edit" class="hidden">

	<input name="aid" type="hidden" value="<?php=$_REQUEST['aid'] ?>" class="hidden">

	<input name="lid" type="hidden" value="<?php=$_REQUEST['lid'] ?>" class="hidden">

	<input name="do_page" type="hidden" value="gallery" class="hidden">

	</form>



























<?php }elseif($show_page=="search"){ 



	 /**

	 * Page: Gallery Create Album

	 *

	 * @version  8.0

	 * @created  Fri Jan 18 10:48:31 EEST 2008

	 * @updated  Fri Sep 24 16:28:31 EEST 2008

	 */





?>

<?php }elseif($show_page=="create"){ 



	 /**

	 * Page: Gallery Create Album

	 *

	 * @version  8.0

	 * @created  Fri Jan 18 10:48:31 EEST 2008

	 * @updated  Fri Sep 24 16:28:31 EEST 2008

	 */





?>



<form method="post" action="<?php=DB_DOMAIN ?>index.php" onSubmit="return CheckNullsAlbums('<?php=$GLOBALS['_LANG_ERROR']['_incomplete'] ?>');">

<input type="hidden" name="do" value="addalbum" class="hidden">

<input name="do_page" type="hidden" value="gallery" class="hidden">

<?php if(isset($_REQUEST['aid'])){ ?>

<input name="sub" type="hidden" value="albums" class="hidden">

<input type="hidden" name="aid" value="<?php=$_REQUEST['aid'] ?>" class="hidden">

<?php }else{ ?>

<input name="sub" type="hidden" value="upload" class="hidden">

<?php }?>



<ul class="form"> 

<div class="CapBody">                        

<li><label><?php=$GLOBALS['_LANG']['_title'] ?>: </label>  <input id="a1" name="title" type="text" class="input" size="40" value="<?php if(isset($album)){print $album['title']; } ?>">

<div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a64'] ?></div>

</li>





<li><label><?php=$GLOBALS['_LANG']['_visibility'] ?></label><br><br>

		

			 <input name="catid"  type="radio" value="private" id="catid_1" class="radio" onclick="javascript:enablePrivateField();" <?php if(isset($album)){ if($album['cat'] =="private"){ print"checked";} } ?> style="margin-right:20px;border:0px;"/><?php=$GLOBALS['LANG_GALLERY']['a66'] ?><br /> 

			 	 <div style="padding-left: 50px;line-height:40px;">



		              <input type="checkbox" name="ah" value="y" id="catid_type2" style="margin-right:20px;border:0px;" <?php if(isset($album)){ if($album['allow_h'] =="y"){ print"checked";}else{ print "disabled"; } } ?>><?php=$GLOBALS['_LANG']['_hotList'] ?><br>			

			  

		  </div>

            <input name="catid" type="radio" value="public"  class="radio" onclick="javascript:DisablePrivateField();" style="margin-right:20px;border:0px;" <?php if(isset($album)){ if($album['cat'] =="public"){ print"checked";} }else{ print "checked"; } ?> /><?php=$GLOBALS['LANG_GALLERY']['a70'] ?>

        <div class="tip"><?php=$GLOBALS['LANG_GALLERY']['a71'] ?></div>

	

</li>

<!--

<?php if(!isset($_REQUEST['aid'])){ ?>

<?php }else{ ?>

<input type="hidden" name="af" value="<?php=$album['allow_f'] ?>">

<input type="hidden" name="ah" value="<?php=$album['allow_h'] ?>">

<input type="hidden" name="aa" value="<?php=$album['allow_a'] ?>">

<input type="hidden" name="catid" value="<?php=$album['cat'] ?>">			  

<?php } ?>

-->

<li><label><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/key_add.png" align="absmiddle"> <?php=$GLOBALS['_LANG']['_password'] ?>:  </label><input name="password"  class="input" type="text" size="40" value="<?php if(isset($album)){ print $album['password']; } ?>"><p class="note"><?php=$GLOBALS['LANG_GALLERY']['76'] ?></p></li>

		

<li><label><?php=$GLOBALS['_LANG']['_description'] ?></label>	<textarea id="a2" name="commentsBox" cols=40 rows=7 class="input"><?php if(isset($album)){print $album['comment']; } ?></textarea></li>

<li><input value="<?php=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn"></li>

</div>

</ul>

</form>

















	<div id="eMeetingContentBox">



	<form method="GET" action="<?php=DB_DOMAIN ?>index.php" name="ClassSearch">

	<input name="dll" type="hidden" value="gallery" class="hidden">

	<input name="sub" type="hidden" value="search" class="hidden">

	

	<div id="Title">

		<div class="AddIcon"><br><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=upload" class="MainBtn">  <img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?php=$GLOBALS['_LANG']['_createNew'] ?></a></div>

		<span class="a1"><?php=$PageTitle ?></span>

		<span class="a2"><?php=$PageDesc ?></span>

	</div>



	<?php=$ThisPersonsNetworkBar ?>



	<div id="Search">

		<span class="a1"><input name="keyword" type="text" class="input"> <input type="submit" value="<?php=$GLOBALS['_LANG']['_search'] ?>" class="NormBtn"></span>

		<span class="a2"><?php=$Search_Page_Numbers ?></span>

	</div>

	<div id="Results"> 

		<span class="a1"> <b><?php=$search_total_results ?></b> <?php=$GLOBALS['_LANG']['_results'] ?> </span>

		

	</div>

	

	</form> 



 	<span id="response_event" class="responce_alert"></span>



 	<span id="response_gallery" class="responce_alert"></span>



	

	<form name="SearchResults" method="post" action="<?php=DB_DOMAIN ?>index.php?dll=<?php=$page ?><?php if(isset($search_page)){ print "&view_page=".strip_tags($search_page); }else{ print "&view_page=1"; } ?>">

	<input name="searchPage" type="hidden" id="searchPage" value="1" class="hidden">

	<input name="page" type="hidden" value="<?php if(isset($search_page) && is_numeric($search_page) ){ print strip_tags($search_page); }else{ print "1"; } ?>" class="hidden" id="Spage">

	<input name="sub" type="hidden" value="<?php=$sub_page ?>" class="hidden">

	<input name="do_page" type="hidden" value="<?php=$page ?>" class="hidden">

	<input type="hidden" name="sort" value="1" class="hidden" id="SSort">

	<?php if(is_numeric($item_id)){ ?><input name="item_id" type="hidden" value="<?php=$item_id ?>" class="hidden"> <?php } ?>

	<?php if(is_numeric($search_uid)){ ?><input name="fcid" type="hidden" value="<?php=$search_uid ?>" class="hidden"> <?php } ?>



	<?php if($search_total_results ==0){ ?>

	

	<div style="padding:50px;line-height:30px;"><h1><a href="<?php=DB_DOMAIN ?>index.php?dll=gallery&sub=search"> <?php=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>

	

	<?php } ?>

	

	<?php $i=1; foreach($search_data as $value){ ?>	

	

	

		<div class="Acc_ListBox <?php if($value['ThisApproved']=="no"){ ?>search_display_unapproved<?php }else{ if($i % 2){ ?>search_display_off<?php }else{ ?>search_display_on<?php } } ?>">

		<div class="Acc_ListBox_left"><div class="pic75"><a class="photo_75" href="<?php=$value['link'] ?>" title="<?php=$value['title'] ?>"><img src="<?php=$value['images'][1]['image'] ?>" width="96" height="96"></a></div></div>

		<div class="Acc_ListBox_right">	

		<div class="Acc_ListBox_right1">

		<div class="Acc_ListBox_title_break">

		<a href="<?php=$value['link'] ?>" title="<?php=$value['title'] ?>"><?php=$value['title'] ?></a></div>

		<b>   <?php=$GLOBALS['_LANG']['_username'] ?>: <a href="<?php=$value['user_link'] ?>"><?php=$value['username'] ?></a> - <?php=$GLOBALS['_LANG']['_files'] ?> <?php=$value['filecount'] ?> </b>

		<div class="Acc_ListBox_margin5"></div>	

		<?php if(count($value['images']) >1){for ($ix=2;$ix<=count($value['images']);$ix++) {print '<a href="'.$value['images'][$ix]['link'].'"><img src="'.$value['images'][$ix]['image'].'" style="border:1px solid #ccc; margin-right:8px;" width="40" height="40"></a>';}} ?>

		</div><div class="Acc_ListBox_right2"><div>		

		<?php if($value['password'] != ""){  ?><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/key_delete.png" align="absmiddle"><?php }else{ ?><img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/zoom.png" width="16" height="16" align="absmiddle"><?php } ?> <a href="<?php=$value['link'] ?>"><?php=$GLOBALS['_LANG']['_view'] ?></a>	 <br>

		<img src="<?php=DB_DOMAIN ?>images/DEFAULT/_acc/user.png" width="16" height="16" align="absmiddle"> <a href="<?php=$value['user_link'] ?>"><?php=$GLOBALS['LANG_COMMON'][11] ?></a>				

	

		</div>

		</div><div class="clear"></div></div><div class="clear"></div></div>	

		<div class="ClearAll"></div>

	

	<?php $i++; } ?>							



	<div id="Bottom"><?php=$Search_Page_Numbers ?></div>

	

	</form>



	</div> <!-- end main box -->





<?php } ?>