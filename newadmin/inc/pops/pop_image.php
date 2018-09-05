<?php 
require_once "../config.php";
require_once "../../../inc/config.php";
require_once "../langs/".A_LANG.".php";
require_once "../func/admin_globals.php";
if(ADMIN_DEMO == "yes"){ die("Disabled in demo mode"); }

if(isset($_POST['whichTmp'])){		

		$copy = @copy($_FILES['FileUpload']['tmp_name'], PATH_FILES.$_FILES['FileUpload']['name']);

			if($copy){
	
					$ThisPhoto = $_FILES['FileUpload']['name'];
	
			}else{
								
					$ThisPhoto="";
							
			}


		## now we have the array of store files, lets store them

		$filename = subd.'../../inc/config_template.php';
		if (!$file = fopen($filename, 'a+b')) {
			die("There was an error opening your config.php file. Please make sure it exsits and is located in the includes/ directory.");
		} else {
					 
			$data = array();
			$counter = 1;
			$filecontent = "";
			while (!feof($file)) {

							$data[$counter] = fgets($file);
							// check line and replace string
														
							  if ( strstr($data[$counter], "'TMP_BACKGROUND_IMG','".TMP_BACKGROUND_IMG."'") && ( $_POST['whichTmp'] ==1 ) && ( $ThisPhoto !="" || $_POST['FileRemove'] == 1 ) ) {
							 	 
									$filecontent .= str_replace("'TMP_BACKGROUND_IMG','".TMP_BACKGROUND_IMG."'", "'TMP_BACKGROUND_IMG','".$ThisPhoto."'", $data[$counter]);
							  }

							  elseif ( strstr($data[$counter], "'TMP_BACKGROUND_PO','".TMP_BACKGROUND_PO."'") && ( $_POST['whichTmp'] ==1 ) && ( $_POST['FilePosition'] !="" ) ) {
							  	
									$filecontent .= str_replace("'TMP_BACKGROUND_PO','".TMP_BACKGROUND_PO."'", "'TMP_BACKGROUND_PO','".$_POST['FilePosition']."'", $data[$counter]);
							  }
			  
							  else{
									$filecontent .= $data[$counter];
							  }		 
							 $counter ++;
						}	
						fclose($file);
			}

			//now we have to write in all the new data to this file
			if (!$handle = fopen($filename, 'w')) {echo "Cannot open file ($filename)"; exit;  }
			// Write $somecontent to our opened file. 
			if (fwrite($handle, $filecontent) === FALSE) { echo "Cannot write to file ($filename)"; exit; } 
			fclose($handle);
 
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=<?=$admin_layout_header['charset'] ?>"></head>

<div id="definition">
<style>
.box_title { background-color:#eeeeee; padding:8px; color:#666666; font-size:90%;}
.box_body { border:2px solid #eeeeee; padding:8px; font-size:75%;}
h3 { color:#666;}
</style>
<div>
<? if(isset($_GET['tt'])){ ?>
<form action="pop_image.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="whichTmp" value="<?=$_GET['tt'] ?>">
	<h2>Upload Images</h2>
	<h3>Click the browse box below and select an image to apply to your website layout.</h3>
	<p><input name="FileUpload" type="file"></p>
	<p><select name="FilePosition" style="width:200px; font-size:14px; height:25px;"><option value="no-repeat" >Don't Repeat Image</option><option value="repeat" selected>Tile Image</option><option value="repeat-y">Repeat Vertically</option> <option value="repeat-x" >Repeat Horizontally</option></select></p>
	
	<p class="highlight"><input name="FileRemove" type="checkbox" value="1"> Remove Current Image</p>
<p><input name="" type="submit" value="Save Image"></p>
	<p></p><br>
</form>
<? }else{ ?>
<h1>System Updated Successfully.</h1>
<p>Please close the window to refresh the system.</p>
<? } ?>
</div>
</div>
<?php if(TMP_BACKGROUND_IMG !=""){ ?>
<h4>Current Image</h4>
<img src="<?=DB_DOMAIN."uploads/files/".TMP_BACKGROUND_IMG ?>">
<?php } ?>
</body></html>