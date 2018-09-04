<?
// DATABASES TO COPY INCLUDES

// 1. BANNERS
// 2. MEMBERS
// 3  MEMBERS_DATA
// 4. MEMBERS_PRIVACY
// 5. ALBUMS
// 6. FILES
// 7. FILES_COMMENTS
// 8. BLOGS
// 9. BLOG COMMENTS
// 10. AFFILIATES

function TransferMembersData($cOne, $cTwo, $version){

			/////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////
			$db_one = mysql_connect($cOne['host'], $cOne['username'], $cOne['password']);
			mysql_select_db($cOne['database'], $db_one);
			
			$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
			//////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////			
			$count=0;
			if($version ==2){ // EMEETING VERSIONS 5 AND 6
				$Query = "SELECT members.id ,members.username ,members.password ,members.email 	,members.ip ,members.lastlogin 	,members.visible ,members.active ,members.created ,members.packageid ,members.hits ,members.profile_complete ,members.updated ,members.moderator ,members.activate_code ,members.highlight, members_data.age ,members_data.headline 	,members_data.country 	,members_data.location 	,members_data.gender 	,members_data.description FROM members, members_data WHERE members.id = members_data.uid";
				
			}elseif($version ==3){ // EMEETING VERSION 4
				$Query = "SELECT * FROM frm_users";
			}

			$result = mysql_query($Query, $db_one);
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				
				if($version ==2){
					$id = $row['id'];
					$packid = $row['packageid'];
					$created = $row['created'];
				}elseif($version ==3){
					$id = $row['userid'];
					$packid = $row['usergroupid'];
					$created = $row['joindate'];
					$row['profile_complete']=50;
				}			
			mysql_select_db($cTwo['database'], $db_two);
				
			mysql_query("INSERT INTO `members` (`id` ,`username` ,`password` ,`email` ,`session` ,`ip` ,`lastlogin` ,`visible` ,`active` ,`created` ,`packageid` ,`hits` ,`profile_complete` ,`templateid` ,`updated` ,`moderator` ,`activate_code` ,`highlight`
			)VALUES ('".$id."', '".$row['username']."', '".$row['password']."', '".$row['email']."', '".$row['session']."', '".$row['ip']."', '".$row['lastlogin']."', '".$row['visible']."', '".$row['active']."', '".$created."', '".$packid."', '".$row['hits']."', '".$row['profile_complete']."', '1', '".$row['updated']."', '".$row['moderator']."', 'OK', '".$row['highlight']."')", $db_two);
			
			if($version ==3){
			
				// GENDER TYPE
				if($row['gender'] ==1){ $gNum =63; }else{ $gNum =64;}
				mysql_query("INSERT INTO `members_data` (
				`uid` ,
				`em_eha20070509` ,
				`em_46h20070511` ,
				`em_86t20070511` ,
				`em_8cx20070511` ,
				`postcode` ,
				`age` ,
				`headline` ,
				`country` ,
				`location` ,
				`description` ,
				`gender` ,
				`em_hrh20080113` ,
				`em_kxb20080113` ,
				`em_1k820080113` ,
				`em_heh20080113` ,
				`em_93n20080113` ,
				`em_jsh20080113` ,
				`em_q0m20080113` ,
				`em_jhb20080113` ,
				`em_ygz20080113` ,
				`em_yh020080113` ,
				`em_7jr20080113` ,
				`em_wvh20080113` ,
				`em_vqf20080113` ,
				`em_qck20080113` ,
				`em_r9720080113` ,
				`em_s5j20080113` ,
				`em_zay20080113` ,
				`em_rn620080113` ,
				`em_s1620080113` ,
				`em_kjc20080113` ,
				`em_72220080113` ,
				`em_txg20080113` ,
				`em_y8520080116` ,
				`em_grm20080116`
				)VALUES ('".$id."', '', '0', '0', '0', '".$row['postcode']."', '".$row['birthday']."', '".$row['self']."', 'United Kingdom', 'London', '".$row['me']."', '".$gNum."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");
			}else{			
				mysql_query("INSERT INTO `members_data` ( `uid` ) values ( '".$id."' )", $db_two);
				mysql_query("UPDATE `members_data` SET age='".$row['age']."',headline='".$row['headline']."', country='".$row['country']."',location='".$row['location']."',gender='".$row['gender']."', description='".$row['description']."' WHERE uid='".$id."' LIMIT 1", $db_two);
			}
			mysql_query("INSERT INTO `members_privacy` ( `uid` , `Newsletters` , `Notifications` , `IM` , `Language` , `Time Zone` ) VALUES ('".$id."', 'yes', 'yes', 'yes', 'english', '')", $db_two);
 

			// MEMBER NETWORK
			if($version ==2){
			
				mysql_select_db($cOne['database'], $db_one);
				$Query5 = "SELECT * FROM members_network WHERE to_uid=".$id;
				$result5 = mysql_query($Query5, $db_one);
				while ($row5 = mysql_fetch_array($result5, MYSQL_BOTH)) {
				
					mysql_select_db($cTwo['database'], $db_two);
					mysql_query("INSERT INTO `members_network` ( `id` , `uid` , `to_uid` , `date` , `comments` , `type` , `approved` )
					VALUES ('".$row5['id']."', '".$row5['uid']."', '".$row5['to_uid']."', '".$row5['date']."', '".$row5['comments']."', '".$row5['type']."', '".$row5['approved']."')", $db_two);
					
				}
			}
								
					// TRANSFER ALBUMS
				if($version ==2){
					mysql_select_db($cOne['database'], $db_one);	
					$Query1 = "SELECT * FROM album WHERE uid=".$id;					
					$result1 = mysql_query($Query1, $db_one);
					while ($row1 = mysql_fetch_array($result1, MYSQL_BOTH)) {
						mysql_select_db($cTwo['database'], $db_two);
						mysql_query("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a` )
						VALUES ('".$row1['aid']."', '".$row1['uid']."', '".$row1['title']."', '".$row1['comment']."', '".$row1['filecount']."', '".$row1['cat']."', '".$row1['allow_f']."', '".$row1['allow_h']."', '".$row1['allow_n']."', '".$row1['allow_a']."')", $db_two);
																	
						
						// TRANSFER FILES WITHIN THIS ALBUM
						mysql_select_db($cOne['database'], $db_one);	
						$Query2 = "SELECT * FROM files WHERE uid=".$id." AND aid=".$row1['aid'];
						$result2 = mysql_query($Query2, $db_one);
						while ($row2 = mysql_fetch_array($result2, MYSQL_BOTH)) {
							
							mysql_select_db($cTwo['database'], $db_two);
							mysql_query("INSERT INTO `files` ( `id` , `aid` , `user` , `uid` , `date` , `title` , `description` , `bigimage` , `width` , `height` , `filesize` , `views` , `medwidth` , `medheight` , `medsize` , `approved` , `rating` , `default` , `featured` , `type` , `rating_votes` )
							VALUES ('".$row2['id']."', '".$row2['aid']."', '".$row2['user']."', '".$row2['uid']."', '".$row2['date']."', '".$row2['title']."', '".$row2['description']."' , '".$row2['bigimage']."', ".$row2['width']." , ".$row2['height']." , '".$row2['filesize']."', '".$row2['views']."', '0', '0', '0', 'yes', '0.00', '1', '".$row2['default']."', '".$row2['type']."', '0')", $db_two);
							
							mysql_query("UPDATE `album` SET filecount=filecount+1 WHERE aid='".$row2['aid']."' LIMIT 1");
						}
									
					}
				
				}else{
					
					mysql_select_db($cTwo['database'], $db_two);
					// VERSION 4 IMAGE TRANSFER
					mysql_query("INSERT INTO `album` ( `aid` , `uid` , `title` , `comment` , `filecount` , `cat` , `allow_f` , `allow_h` , `allow_n` , `allow_a` )
					VALUES ('".$row1['aid']."', '".$row1['uid']."', 'My Photos', '', '', '".$row1['cat']."', '".$row1['allow_f']."', '".$row1['allow_h']."', '".$row1['allow_n']."', '".$row1['allow_a']."')", $db_two);
					$albumID = mysql_insert_id();
					
					mysql_select_db($cOne['database'], $db_one);
					$Query2 = "SELECT * FROM frm_photos WHERE id=".$id;
					$result2 = mysql_query($Query2, $db_one);
					while ($row2 = mysql_fetch_array($result2, MYSQL_BOTH)) {
							
							mysql_select_db($cTwo['database'], $db_two);
							mysql_query("INSERT INTO `files` ( `id` , `aid` , `user` , `uid` , `date` , `title` , `description` , `bigimage` , `width` , `height` , `filesize` , `views` , `medwidth` , `medheight` , `medsize` , `approved` , `rating` , `default` , `featured` , `type` , `rating_votes` )
							VALUES ('".$row2['id']."', '".$albumID."', '".$row2['user']."', '".$id."', '".$row2['date']."', '".$row2['title']."', '".$row2['description']."' , '".$row2['bigimage']."', ".$row2['width']." , ".$row2['height']." , '".$row2['filesize']."', '".$row2['views']."', '0', '0', '0', 'yes', '0.00', '1', '".$row2['default']."', 'photo', '0')", $db_two);
							
							mysql_query("UPDATE `album` SET filecount=filecount+1 WHERE aid='".$albumID."' LIMIT 1");
					
					}
				
				}
				
				
				// MEMBERS BILLING SYSTEM DATA
				
				
					mysql_select_db($cOne['database'], $db_one);
					$Query7 = "SELECT * FROM members_billing WHERE uid=".$id;
					$result7 = mysql_query($Query7, $db_one);
					while ($row77 = mysql_fetch_array($result7, MYSQL_BOTH)) {
							
							mysql_select_db($cTwo['database'], $db_two);
							mysql_query("INSERT INTO `members_billing` (`uid`, `packageid`, `date_upgrade`, `date_expire`, `pay_method`, `running`, `subscription`, `bill_email`) 
							VALUES ('".$row77['uid']."', '".$row77['packageid']."', '".$row77['date_upgrade']."', '".$row77['date_expire']."', '".$row77['pay_method']."', '".$row77['running']."', '".$row77['subscription']."', '".$row77['bill_email']."')", $db_two);							
					
					}
			$count++;
			}
			
			
			// TRANSFER MEMBER ALBUMS
			return "<br> ".$count." Members Data Transfered <BR>";
								
			mysql_close($db_one); 
			mysql_close($db_two);						
}

function TransferForumData($cOne, $cTwo, $version){

			/////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////
			$db_one = mysql_connect($cOne['host'], $cOne['username'], $cOne['password']);
			mysql_select_db($cOne['database'], $db_one);
			
			$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
			//
			//////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////		
			
			$count=0;
			if($version ==2){
				$PREFIX="forum_";
				$Query = "SELECT * FROM forum_forums";
			}elseif($version==3){
				$PREFIX="emeeting_";
				$Query = "SELECT * FROM emeeting_forums";
			}
			$result = mysql_query($Query, $db_one);
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				
				mysql_select_db($cTwo['database'], $db_two);
				mysql_query("INSERT INTO `forum_forums` (`forum_id` ,`forum_name` ,`forum_desc` ,`forum_order` ,`forum_icon` ,`topics_count` ,`posts_count` ,`forum_group`) 
				VALUES ('".$row['forum_id']."' , '".$row['forum_name']."', '".$row['forum_desc']."', '".$row['forum_order']."', '".$row['forum_icon']."', '".$row['topics_count']."', '".$row['posts_count']."', '".$row['forum_group']."')", $db_two);
				$count++;
			}
			
			mysql_select_db($cOne['database'], $db_one);
			$Query1 = "SELECT * FROM ".$PREFIX."posts";
			$result1 = mysql_query($Query1, $db_one);
			while ($row1 = mysql_fetch_array($result1, MYSQL_BOTH)) {
				
				mysql_select_db($cTwo['database'], $db_two);
				mysql_query("INSERT INTO `forum_posts` (`post_id` ,`forum_id` ,`topic_id` ,`poster_id` ,`poster_name` ,`post_text` ,`post_time` ,`poster_ip` ,`post_status`)
				VALUES ('".$row1['post_id']."', '".$row1['forum_id']."', '".$row1['topic_id']."', '".$row1['poster_name']."', '".$row1['post_text']."', '', '".$row1['post_time']."', '".$row1['poster_ip']."', '".$row1['post_status']."')", $db_two);
			
			}			

			mysql_select_db($cOne['database'], $db_one);
			$Query2 = "SELECT * FROM ".$PREFIX."topics";
			$result2 = mysql_query($Query2, $db_one);
			while ($row2 = mysql_fetch_array($result2, MYSQL_BOTH)) {
				
				mysql_select_db($cTwo['database'], $db_two);
				mysql_query("INSERT INTO `forum_topics` ( `topic_id` ,`topic_title` ,`topic_poster` ,`topic_poster_name` ,`topic_time` ,`topic_views` , `forum_id` ,`topic_status` ,`topic_last_post_id` ,`posts_count` ,`sticky` ,`topic_last_post_time`) 
				VALUES ('".$row2['topic_id']."' , '".$row2['topic_title']."', '".$row2['topic_poster']."', '".$row2['topic_poster_name']."', '".$row2['topic_time']."', '".$row2['topic_views']."', '".$row2['forum_id']."', '".$row2['topic_status']."', '".$row2['topic_last_post_id']."', '".$row2['posts_count']."', '".$row2['sticky']."', '".$row2['topic_last_post_time']."')", $db_two);
			
			}
			
			return $count." Forum Data Completed <br>";

			mysql_close($db_one); 
			mysql_close($db_two);			
}


function TransferBannersData($cOne, $cTwo){

			/////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////
			$db_one = mysql_connect($cOne['host'], $cOne['username'], $cOne['password']);
			mysql_select_db($cOne['database'], $db_one);
			
			$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
			mysql_select_db($cTwo['database'], $db_two);
			//////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////		
			
			$count=0;
			$Query = "SELECT * FROM banners";
			$result = mysql_query($Query, $db_one);
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			
				mysql_query("INSERT INTO `banners` (`bid` ,`bName` ,`imglocation` ,`urllocation` ,`page` ,`active` ,`clicks` ,`width` ,`height` ,`impressions` , `code` ,`position`) 
				VALUES ('".$row['bid']."', '".$row['bName']."', '".$row['imglocation']."', '".$row['urllocation']."', '".$row['page']."', '".$row['active']."', '".$row['clicks']."', '".$row['width']."', '".$row['height']."', '".$row['impressions']."', '".$row['code']."', '".$row['position']."')", $db_two);
				$count++;
			}
			
			return $count." Banners Transfered Successfully <br>";
			
			mysql_close($db_one); 
			mysql_close($db_two);
			
}
function TransferPackageData($cOne, $cTwo, $version){

			/////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////
			$db_one = mysql_connect($cOne['host'], $cOne['username'], $cOne['password']);
			mysql_select_db($cOne['database'], $db_one);
			
			$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
			//
			//////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////		
			if($version ==2){
			
				$count=0;
				$Query = "SELECT * FROM package";
				$result = mysql_query($Query, $db_one);
				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
					
					mysql_select_db($cTwo['database'], $db_two);
					mysql_query("INSERT INTO `package` ( `pid` , `name` , `price` , `imageSpace` , `visible` , `icon` , `comments` , `type` , `numdays` , `maxFiles` , `maxMessage` , `subscription` , `currency_code` , `SMS_credits` , `Highlighted` , `Featured` , `wink` , `view_adult` )
					VALUES ('".$row['pid']."', '".$row['name']."', '".$row['price']."', '".$row['imageSpace']."', '".$row['visible']."', './images/emeeting/_packages/package_icon1.gif', '".$row['comments']."', 'custom', '1', '5', '5', 'no', '', '0', 'no', 'no', '5', 'no')", $db_two);
					$count++;
				}
			
			}elseif($version==3){

				$count=0;
				$Query = "SELECT * FROM frm_groups";
				$result = mysql_query($Query, $db_one);
				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
					
					mysql_select_db($cTwo['database'], $db_two);
					mysql_query("INSERT INTO `package` ( `pid` , `name` , `price` , `imageSpace` , `visible` , `icon` , `comments` , `type` , `numdays` , `maxFiles` , `maxMessage` , `subscription` , `currency_code` , `SMS_credits` , `Highlighted` , `Featured` , `wink` , `view_adult` )
					VALUES ('".$row['groupid']."', '".$row['gName']."', '".$row['gPrice']."', '".$row['gImageSpace']."', 'yes', './images/emeeting/_packages/package_icon1.gif', '', 'custom', '1', '5', '5', 'no', '', '0', 'no', 'no', '5', 'no')", $db_two);
					$count++;
				}
			
			}	
			
			mysql_close($db_one); 
			mysql_close($db_two);
					
			return $count." Packages Transfered <br>";
			

			
}

function TransferEmailData($cOne, $cTwo){

			/////////////////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////////////////
			$db_one = mysql_connect($cOne['host'], $cOne['username'], $cOne['password']);
			mysql_select_db($cOne['database'], $db_one);
			
			$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
			mysql_select_db($cTwo['database'], $db_two);
			//////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////		
			
			$count=0;
			$Query = "SELECT * FROM email_newsletters WHERE status='custom'";
			$result = mysql_query($Query, $db_one);
			while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			
				mysql_query("INSERT INTO `email_newsletters` ( `nid` , `name` , `status` , `content` )
				VALUES ('".$row['nid']."', '".$row['name']."', 'custom', '".$row['content']."')", $db_two);
				$count++;
			}
			
			return $count." Admin Emails Transfered <br>";
			
			mysql_close($db_one); 
			mysql_close($db_two);
			
}

function DisplayProfileData($_POST, $cTwo){

	// MAKE 2 DATABASE CONNECTIONS	
	$db_one = mysql_connect($_POST['emeeting_dbhost'], $_POST['emeeting_dbuser'], $_POST['emeeting_dbpass']);
	mysql_select_db($_POST['emeeting_db'], $db_one);
	///////////////////////////////////

		// GET LIST OF FIELD NAMES TO MAKE AN LIST OPTION ARRAY
		//$TableNames = array;
		$Tablei =1;
		
		$sql = "SHOW FIELDS FROM members_data";
		$result = mysql_query($sql, $db_one);
		while ($row = mysql_fetch_row($result)) {
		
		 // CHECK TO SEE IF THIS HERE		
		// if(stristr($row[0], "em_") === FALSE) {
		// 	$TableNames[$Tablei][1] = "{$row[0]}";
		//	$TableNames[$Tablei][2] = "{$row[0]}";
		 //}else{	
			 $value = mysql_query("SELECT field_caption.caption AS result FROM field_caption, field WHERE field.fid =  field_caption.Cid AND field.fName='".$row[0]."' LIMIT 1",$db_one);
			 $row1 = mysql_fetch_row($value);
			 $TableNames[$Tablei][1] = "{$row[0]}";
			 $TableNames[$Tablei][2] =$row1[0];		 
		// }
		 
			$Tablei++;	
		}
		mysql_close($db_one);
	///////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////
	//// NOW WE HAVE ALL THE DATA INA STRING, LETS GET THE CURRENT FIELD NAMES
	$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
	mysql_select_db($cTwo['database'], $db_two);				
	
	$subd ="../";
	require_once $subd."inc/config_db.php";
	require_once $subd."inc/classes/class_mysql.php";
	$DB = new DB(DB_HOST, DB_USER, DB_PASS, DB_BASE);
	$DB->Connect();

	$NumFields = 1;

    $result = $DB->Query("SELECT fid,fType,fName FROM field ORDER BY fType ASC");
    while( $groups = $DB->NextRow($result) )
    {

			$Caption = $DB->Row("SELECT caption FROM field_caption WHERE Cid=".$groups['fid']." limit 1");
			print "<label>";			
						
			if($groups['fType'] == 1){
					/// SELECT FIELD ADDED
					print '<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #666666"><tr><td width="69%" height="60" bgcolor="#F2F2F2"><strong>';
					
					print $Caption['caption']."</strong><br><br>";

					print "<select name='FieldValue".$NumFields."'>";
					print "<option value=''>Leave Blank</option>";
					print MakeSelectOptions($TableNames);
					print "</select";
					print '</td><td width="31%" bgcolor="#F2F2F2"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
							  <td><font size="2">Select the table name from the drop down menu which 
									holds the data for this headline.If there is no data from your old 
									database that matches this headline clikc "Leave Blank".</font></td>
							</tr>
						  </table></td> </tr></table>';
					/// SELECT FIELD ADDED		
			}elseif($groups['fType'] == 4){
				if($Value[$groups['fName']] ==1){ $ex = "checked"; }else{ $ex="";}
				print "<input type='checkbox' name='FieldValue".$NumFields."' value='1' ".$ex.">";
		    }elseif($groups['fType'] == 2){
					/// SELECT FIELD ADDED
					print '<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #666666"><tr><td width="69%" height="60" bgcolor="#F2F2F2"><strong>';
					print $Caption['caption']."</strong><br><br>";

					print "<select name='FieldValue".$NumFields."'>";
					print "<option value=''>Leave Blank</option>";
					print MakeSelectOptions($TableNames);
					print "</select";
					print '</td><td width="31%" bgcolor="#FFFFFF"><font size="2">Select the table name from the drop down menu which 
									holds the data for this headline.If there is no data from your old 
									database that matches this headline clikc "Leave Blank".</font></td> </tr></table>';
					/// SELECT FIELD ADDED
			}elseif($groups['fType'] == 3){
						/* This is a list box */
						
							print '<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #666666">
						  <tr bgcolor="#FFF3E1"> 
							<td width="69%" height="60"><strong>';
							print $Caption['caption']."</strong><br><br>";
							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' Order by fvOrder");

							print "<select name='FieldValue".$NumFields."'>";
							while( $ListValue = $DB->NextRow($result2) )  
							{ 			
								if($Value[$groups['fName']] == $ListValue['fvid']){
									print "<option value='".$ListValue['fvid']."' selected>".$ListValue['fvCaption']."</option>";
								}else{
									print "<option value='".$ListValue['fvid']."'>".$ListValue['fvCaption']."</option>";
								}					
								
							}	
							print "</select>";
							print '</td>
							<td width="31%"> 
							  <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
								<tr>
								  <td><font size="2">Data from this field cannot be transfered directly 
									therefore you can create a default value which will be displayed temporarily 
									until the member updates their account.</font></td>
								</tr>
							  </table>
							  <font color="#666666" size="2">&nbsp;</font></td>
						  </tr>
						</table>';
							
			}elseif($groups['fType'] == 5){
										print '<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border:1px solid #666666">
						  <tr bgcolor="#FFF3E1"> 
							<td width="69%" height="60"><strong>';
							print $Caption['caption']."</strong><br><br>";
							print "<div style='margin-left:20px;'>";
							$result2 = $DB->Query("SELECT * FROM field_list_value WHERE fvFid = '". $groups['fid'] ."' Order by fvOrder");
							while( $ListValue = $DB->NextRow($result2) )  
							{ 										
								print "<input type='checkbox' name='FieldValue".$NumFields."' value='1' class=radio>".$ListValue['fvCaption'];								
								
								print "<input type='hidden' class='hidden' name='FieldName".$NumFields."' value='".$groups['fName']."'>";
								print "<input type='hidden' class='hidden' name='FieldType".$NumFields."' value='".$groups['fType']."'>";					
								print "<br>";
								$NumFields++;
								
							}
							print "</div>";
														print '</td>
							<td width="31%"> 
							  <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
								<tr>
								  <td><font size="2">Data from this field cannot be transfered directly 
									therefore you can create a default value which will be displayed temporarily 
									until the member updates their account.</font></td>
								</tr>
							  </table>
							  <font color="#666666" size="2">&nbsp;</font></td>
						  </tr>
						</table>';
			}			
			if($groups['fType'] != 5){
				print "<input type='hidden' class='hidden' name='FieldName".$NumFields."' value='".$groups['fName']."'>";
				print "<input type='hidden' class='hidden' name='FieldType".$NumFields."' value='".$groups['fType']."'>";
				print "<input type='hidden' class='hidden' name='NewFieldName".$NumFields."' value='".$groups['fName']."'>";
				$NumFields++;
			}
			
			print "</label>";	
	}
	print "<input name='TotalNumberOfRows' type='hidden' class='hidden' value='$NumFields'>";
}
function MakeSelectOptions($data){
	
	$counter=1;
	
	$ReturnString ="";
	while ( $counter <= count($data) ) {
		$ReturnString .= "<option value='".$data[$counter][1]."'>".$data[$counter][2]."</option>";
		$counter++;
	}
	
	return $ReturnString;
}
function MakeQuery($data){
	
	$counter=1;
	
	$ReturnString ="";
	while ( $counter <= count($data) ) {
		$ReturnString .= "".$data[$counter]." AS ".$data[$counter].", ";
		$counter++;
	}
	
	return $ReturnString;
}

function MakeDataTransferTool($_POST, $cTwo){

				$Counter=0;
				$db_one = mysql_connect($_POST['emeeting_dbhost'], $_POST['emeeting_dbuser'], $_POST['emeeting_dbpass']);
				mysql_select_db($_POST['emeeting_db'], $db_one);				
				
				$db_two = mysql_connect($cTwo['host'], $cTwo['username'], $cTwo['password']);
				mysql_select_db($cTwo['database'], $db_two);				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				// GET LIST OF FIELD NAMES TO MAKE AN LIST OPTION ARRAY
				$TableNames = array();
				$Tablei =1;
				
				$sql = "SHOW FIELDS FROM members_data";
				$result = mysql_query($sql, $db_one);
				while ($row = mysql_fetch_row($result)) {
								
					 // CHECK TO SEE IF THIS HERE
					$TableNames[$Tablei] = "{$row[0]}";				 
				 
					$Tablei++;	
				}		
				/////////////////////////////////////////////////////
				/////////////////////////////////////////////////////
						
				$Query = "SELECT ".MakeQuery($TableNames)." uid AS userid FROM members_data";
								
				$result = mysql_query($Query, $db_one);
				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
				$RunExtra="";				
				
					// only update if the members username is the same in the new version as the old one
					$resultInner = mysql_query("SELECT uid FROM members_data WHERE uid ='".$row['userid']."'", $db_two);
					while ($row1 = mysql_fetch_array($resultInner, MYSQL_BOTH)) {

						for($i = 1; $i < $_POST['TotalNumberOfRows']; $i++) { 
						
							if($_POST['FieldValue'. $i] != ""){							
								//////////////////////////////////////
								/// MULTIPLE CHECK BOX CODE
								//////////////////////////////////////
								if($_POST['FieldType'.$i] ==5){
									// multiple check box															
										if($_POST['FieldValue'.$i] == 1){
											$BuiltArray .="1**";
										}else{
											$BuiltArray .="0**";
										}
										$RunExtra.= $_POST['FieldName'.$i] ."='".$BuiltArray."', ";
								}
														
								elseif($_POST['FieldType'.$i] !=5){
									
									if (preg_match ("/^([0-9.,-]+)$/", $_POST['FieldValue'. $i])) {
										$RunExtra .= $_POST['FieldName'. $i]."='".str_replace("'", "",$_POST['FieldValue'. $i])."', ";
									}else{
										$RunExtra .= $_POST['FieldName'. $i]."='".str_replace("'", "",$row[$_POST['FieldValue'. $i]])."', ";
									}
								}
							}
						}

						mysql_query("UPDATE members_data SET $RunExtra uid='".$row['userid']."', gender='".$row['gender']."', location='".$row['location']."', description='".$row['description']."', age='".$row['age']."', headline='".$row['headline']."' 
						WHERE members_data.uid = ".$row['userid'], $db_two);
						$Counter++;
						
						mysql_close();
					}
				}
		return $Counter;
}

?>