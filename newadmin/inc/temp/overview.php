<?php
/*
 SYSTEM CHECK AND POP-UP ENTIRES
*/
if( ADMIN_DEMO =="yes" && !isset($_SESSION['warn_demo']) && !in_array(A_LANG,$cant_pop) ){
	print '<input class="lbOn" id="lbOnAuto" type="hidden" value="pop_demo_mode.php">';
	$_SESSION['warn_demo']=1;
}
/*
if( isset($_SESSION['logincount']) && $_SESSION['logincount'] ==0 && $_SESSION['admin_super_user'] !="yes" && !in_array(A_LANG,$cant_pop)){
	print '<input class="lbOn" id="lbOnAuto" type="hidden" value="pop_introduction.php">';
	$_SESSION['logincount']=1;
}
*/

if( ($_SESSION['admin_alerts']=="yes" && !in_array(A_LANG,$cant_pop))  ){
	print '<input class="lbOn" id="lbOnAuto" type="hidden" value="pop_welcome.php">';
	$_SESSION['admin_alerts']="no";
}


$new_today = number_format(CountMembers(26));


if(!isset($_REQUEST['p']) || $_REQUEST['p']=="" ){ 


	## define variables
	$AlertArray = array(); $Counter=1; 

	$SQL = "select row_num from 
		(
			SELECT count(id) AS row_num FROM members
	 
			union ALL
	
			SELECT count(id) AS row_num FROM comments

			union ALL
	
			SELECT count(topic_id) AS row_num FROM forum_topics 

			union ALL
	
			SELECT count(id) AS row_num FROM calendar_data

			union ALL
	
			SELECT count(id) AS row_num FROM files WHERE  ( type='video' OR type='youtube' )

			union ALL
	
			SELECT count(id) AS row_num FROM files WHERE  ( type='photo' )

			union ALL
	
			SELECT count(id) AS row_num FROM files WHERE  ( type='music' )

			union ALL
	
			SELECT count(pollid) AS row_num FROM poll_desc 

			union ALL
	
			SELECT count(id) AS row_num FROM game_games 

			union ALL
	
			SELECT count(id) AS row_num FROM tag_cloud   

			union ALL
	
			SELECT count(id) AS row_num FROM articles 

			union ALL
	
			SELECT count(id) AS row_num FROM groups

			union ALL
	
			SELECT count(id) AS row_num FROM class_adverts  

			union ALL
	
			SELECT count(id) AS row_num FROM members_network

			union ALL
	
			SELECT count(id) AS row_num FROM blog_posts 

		) as derived_table";
	 
	$Data = $DB->Query($SQL);
 
	## loop data from query
 	while( $DataArray = $DB->NextRow($Data) ){

		$AlertArray[$Counter]['total'] = number_format($DataArray['row_num']); 
		$Counter++;
	}
?>


<style>
.overview_title { padding:5px; color:#FFFFFF; dont-weight:bold; font-size:13px; }
</style>
<ul class="form"><div class="box_body">
<table width="595"  border="0" cellspacing="5">
  <tr>
    <td colspan="2" bgcolor="#666666" class="overview_title"><img src="inc/images/icons/resultset_next.png" width="16" height="16" align="absmiddle"> New Member Signups</td>
  </tr>
  <tr>
    <td colspan="2">

<SCRIPT type="text/javascript" src="inc/js/_flash.js"></SCRIPT>
 
<SCRIPT language="JavaScript">
	displayeMeeting("inc/charts/chart.swf?xml_file=inc/charts/data.php?d1=<?=GetMemberGraphData() ?>","100%","300",{menu:"false",bgcolor:"#ffffff",version:"6,0,47,0",align:"middle", zindex:"0",wmode:"transparent"});
</SCRIPT></td>
  </tr>
</table>
<table width="595"  border="0" cellspacing="5">
  <tr>
    <td colspan="2" bgcolor="#666666" class="overview_title">&nbsp;Web Site Usage</td>
  </tr>
  <tr>
    <td colspan="2"><table width="583" height="142"  border="0" bgcolor="#eeeeee" style="font-size:13px;">
        <tr>
          <td width="132" height="26"><img src="inc/images/16x16/users.png" width="16" height="16" align="absmiddle"> Members</td>
          <td width="78" align="right"><strong>
            <?=$AlertArray[1]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td width="116"><img src="inc/images/16x16/comment_add.png" width="16" height="16" align="absmiddle"> Comments </td>
          <td width="68" align="right"><strong>
            <?=$AlertArray[2]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td width="111" height="30"><img src="inc/images/16x16/73.png" width="16" height="16" align="absmiddle"> Forum Topics</td>
          <td width="64" align="right"><strong>
            <?=$AlertArray[3]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="26"><img src="inc/images/16x16/application.png" width="16" height="16" align="absmiddle"> Events</td>
          <td align="right"><strong>
            <?=$AlertArray[4]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td><img src="inc/images/16x16/movie_track.png" width="16" height="16" align="absmiddle"> Profile Videos</td>
          <td align="right"><strong>
            <?=$AlertArray[5]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td height="30"><img src="inc/images/16x16/image_next.png" width="16" height="16" align="absmiddle"> Photos</td>
          <td align="right"><strong>
            <?=$AlertArray[6]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="26"><img src="inc/images/16x16/sound.png" width="16" height="16" align="absmiddle"> Profile Music </td>
          <td align="right"><strong>
            <?=$AlertArray[7]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td><img src="inc/images/16x16/chart.png" width="16" height="16" align="absmiddle"> Polls</td>
          <td align="right"><strong>
            <?=$AlertArray[8]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td height="30"><img src="inc/images/16x16/710.png" width="16" height="16" align="absmiddle"> Games</td>
          <td align="right"><strong>
            <?=$AlertArray[9]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="26"><img src="inc/images/16x16/71.png" width="16" height="16" align="absmiddle"> Tags</td>
          <td align="right"><strong>
            <?=$AlertArray[10]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td><img src="inc/images/16x16/77.png" width="16" height="16" align="absmiddle"> Articles</td>
          <td align="right"><strong>
            <?=$AlertArray[11]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td height="30"><img src="inc/images/16x16/63.png" width="16" height="16" align="absmiddle"> Groups</td>
          <td align="right"><strong>
            <?=$AlertArray[12]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td height="26"><img src="inc/images/16x16/search_add.png" width="16" height="16" align="absmiddle"> Classifieds</td>
          <td align="right"><strong>
            <?=$AlertArray[13]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td><img src="inc/images/16x16/she_user.png" width="16" height="16" align="absmiddle"> Friends</td>
          <td align="right"><strong>
            <?=$AlertArray[14]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
          <td height="30"><img src="inc/images/16x16/rss_add.png" width="16" height="16" align="absmiddle"> Blogs</td>
          <td align="right"><strong>
            <?=$AlertArray[15]['total'] ?>
          </strong>&nbsp;&nbsp;</td>
        </tr>
      </table></td>
    </tr>
</table>




<style>
.search_display_on { background:#eeeeee;}
.search_display_off { }
</style>
<table width="595"  border="0" cellspacing="5">
  <tr bgcolor="#666666">
    <td width="277" height="27" class="overview_title">Rcently Logged in Members </td>
    <td width="299" height="27"  class="overview_title">Latest Member Signups </td>
  </tr>
  <tr>
    <td height="35"><table width="100%"  border="0">
      <tr>
        <td width="50%" style="font-size:13px;">
<ul>
<?php
$i=1;
	$Data = $DB->Query("SELECT members.username,  members.id,  members.lastlogin, members.hits, members_data.gender FROM members, members_data WHERE members.id = members_data.uid  ORDER BY lastlogin DESC LIMIT 0,10"); 
	## loop data from query
 	while( $value = $DB->NextRow($Data) ){
?>
<li class="<?php if($i % 2){ ?>search_display_off<?php }else{ ?>search_display_on<?php } ?>"> <?=$_SESSION['g_array'][$value['gender']]['icon'] ?> <a href="../index.php?dll=profile&pId=<?=$value['id'] ?>" target="_blank"><b><?=$value['username'] ?></b></a> <?=ShowTimeSince($value['lastlogin']) ?></li>
<?php $i++; } ?>
</ul>

</td>
        </tr>
    </table></td>
    <td><table width="100%"  border="0">
      <tr>
        <td style="font-size:13px;">
          <ul>
            <?php
$i=1;
	$Data = $DB->Query("SELECT members.username,  members.id,  members.created, members_data.gender FROM members, members_data WHERE members.id = members_data.uid  ORDER BY created DESC LIMIT 10"); 
	## loop data from query
 	while( $value2 = $DB->NextRow($Data) ){
?>
            <li class="<?php if($i % 2){ ?>search_display_off<?php }else{ ?>search_display_on<?php } ?>">
              
              &nbsp;&nbsp; <?php print $_SESSION['g_array'][$value2['gender']]['icon'] ?> <a href="../index.php?dll=profile&pId=<?=$value2['id'] ?>" target="_blank"><b><?=$value2['username'] ?></b></a> <?=ShowTimeSince($value2['created']) ?>
            </li>
            <?php $i++; } ?>
        </ul> </td>
        </tr>
    </table></td>
  </tr>
  <tr bgcolor="#cccccc">
    <td height="25"> <img src="inc/images/icons/resultset_next.png" width="16" height="16" align="absmiddle"> <a href="members.php">Search Members</a></td>
    <td height="25"><img src="inc/images/icons/resultset_next.png" width="16" height="16" align="absmiddle"> <a href="members.php?ustatus=unapprovedemail">View Unapproved Members</a> </td>
  </tr>
</table>
<table width="595"  border="0" cellspacing="5">
  <tr bgcolor="#666666">
    <td width="276" height="27" class="overview_title">Latest Website Referials </td>
    <td width="300" height="27"  class="overview_title">Latest Article </td>
  </tr>
  <tr>
    <td height="35">
          <ul>
            <?php
$i=1;
	$Data = $DB->Query("SELECT visitor_refferer FROM visitors_table WHERE visitor_refferer !='' ORDER BY ID DESC LIMIT 5"); 
	## loop data from query
 	while( $value3 = $DB->NextRow($Data) ){
?>
            <li class="<?php if($i % 2){ ?>search_display_off<?php }else{ ?>search_display_on<?php } ?>">
              
               <a href="<?=$value3['visitor_refferer'] ?>" target="_blank"><?=substr($value3['visitor_refferer'],0,40) ?>..</a>
            </li>
            <?php $i++; } ?>
        </ul> 

</td>
    <td>

<?php
	if ($rs = $rss->get('http://www.datingscripts.co.uk/rss.php?type=news')) {
		$count=1;
		foreach($rs['items'] as $item) {
		if($count <2){
			echo "<p><b>".$item['title']."</b></p>";
			echo "<p>".$item['description']."...</p>";
			//print "<a href=\"$item[link]\" target=\"_blank\">Read Full Article </a>";
			print "<p></p>";
		}
		$count++;
		}
		
	}else {    echo "Error: It's not possible to reach RSS file...\n";} 
?></td>
  </tr>
  <tr bgcolor="#cccccc">
    <td height="25"><img src="inc/images/icons/resultset_next.png" width="16" height="16" align="absmiddle"> <a href="overview.php?p=visitor">View All Referials</a> </td>
    <td height="25"><img src="inc/images/icons/resultset_next.png" width="16" height="16" align="absmiddle"> <a href="<?=$item[link] ?>">View Full Article</a></td>
  </tr>
</table></div></ul>


 

 

 

 

 

<?php }elseif($_REQUEST['p'] == "adminmsg"){ ?>


<?php $msgData = DisplayAdminMsg(); ?>
<form method="post" action="overview.php" name="form1">
<input name="do" type="hidden" value="msg" class="hidden">
<input name="page" type="hidden" value="adminmsg" class="hidden">

 
	<ul class="form"><div class="box_body"> 
	<li><label>Title: </label>
<div class="tip">Enter a title or introduction paragraph here.</div>
<input name="subject" type="text" size="40" class="input" value="<?=$msgData['title'] ?>"></li>
	<li><?php if(!isset($msgData)){ $msgData['content']=""; } print displayTextArea($msgData['content']); ?></li>
<li><input type="submit" name="Submit2" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li> 
</div></ul><ul class="form"><div class="box_body"> 
	<li><label>Hide Box: </label>
<div class="tip">Select yes if you wish to stop the popup welcome message from appearing.</div>
<select name="hidebox" class="input" style="width:100px;"><option value="yes" <?php if($msgData['display']=="yes"){ print "selected";} ?>><?=$admin_selection[2] ?></option><option value="no" <?php if($msgData['display']=="no"){ print "selected";} ?>><?=$admin_selection[1] ?></option></select></li>
	<li><input type="submit" name="Submit2" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>      
	
	</div></ul>
</form>

<?php }elseif($_REQUEST['p'] == "visitor"){ ?>

<ul class="form"><div class="box_body">
<li><label><?=$admin_overview[6] ?></label></li>
<SCRIPT type="text/javascript" src="inc/js/_flash.js"></SCRIPT>
 
<div class="box_body">
<SCRIPT language="JavaScript">
	displayeMeeting("inc/charts/chart.swf?xml_file=inc/charts/data.php?d1=<?=GetVisitorGraphData() ?>","100%","300",{menu:"false",bgcolor:"#ffffff",version:"6,0,47,0",align:"middle",wmode:"transparent"});
</SCRIPT>
</div></ul>


<ul class="form"><div class="box_body">
<li><label>Last 50 Visitor References</label></li>
<table class="widefat">
     <thead>
      <tr> 

         <th>IP</th>
          <th>Reference</th>
<th></th>
        </tr>
      </thead>
      <tbody>
<?php
	$result = $DB->Query("SELECT * FROM visitors_table WHERE visitor_refferer !='' ORDER BY `visitor_date` DESC LIMIT 50");

    while( $Data = $DB->NextRow($result) )
    {

?>
         <tr>
		<td><?=$Data['visitor_ip'] ?></td>
		<td><?=substr($Data['visitor_refferer'],0,40) ?>..</td>
		<td><a href="<?=$Data['visitor_refferer'] ?>" target="_blank">View Website</a></td>
		</tr>
<?php } ?>
     </tbody>
</table>
</div></ul>




<?php }elseif($_REQUEST['p'] == "members"){ ?>

<ul class="form"><div class="box_body">
<li><label><?=$admin_overview[7] ?></label></li>
<SCRIPT type="text/javascript" src="inc/js/_flash.js"></SCRIPT>
 
<SCRIPT language="JavaScript">
	displayeMeeting("inc/charts/chart.swf?xml_file=inc/charts/data.php?d1=<?=GetMemberGraphData() ?>","100%","300",{menu:"false",bgcolor:"#ffffff",version:"6,0,47,0",align:"middle", zindex:"0",wmode:"transparent"});
</SCRIPT>
</div>	</ul>




<?php }elseif($_REQUEST['p'] == "affiliate"){ ?>

<ul class="form"><div class="box_body"> 

<SCRIPT type="text/javascript" src="inc/js/_flash.js"></SCRIPT>
<div class="box_title"><?=$admin_overview[10] ?></div>
<div class="box_body">
<SCRIPT language="JavaScript">
	displayeMeeting("inc/charts/chart.swf?xml_file=inc/charts/data.php?d1=<?=GetAffiliateGraphData() ?>","100%","300",{menu:"false",bgcolor:"#ffffff",version:"6,0,47,0",align:"middle",wmode:"transparent"});
</SCRIPT>
</div>	

</div>	</ul>




<?php }elseif($_REQUEST['p'] == "maps"){ ?>

		<?php if(GOOGLE_MAPS_KEY ==""){ ?>		
		<form method="post" action="">
		<input name="do" type="hidden" value="update" class="hidden">
		<input name="p" type="hidden" value="maps" class="hidden">
		<ul class="form"><div class="box_body">
		<li><label>Google API Key:</label><input name="google_key" type="text" class="input" value="<?=GOOGLE_MAPS_KEY ?>"size="40"><div class="tip"><?=$admin_overview[12] ?></div></li>
		<li><input type="submit" value="Update Settings" class="MainBtn"></li> 
		</div></ul>
		</form>
			  
		<?php }else{ ?>  
		<link rel="stylesheet" type="text/css" media="all" href="inc/css/google_maps.css">
		
		
		<noscript><b>JavaScript must be enabled in order for you to use Google Maps.</b> 
			 However, it seems JavaScript is either disabled or not supported by your browser. 
			  To view Google Maps, enable JavaScript by changing your browser options, and then 
			  try again.
		</noscript>
		
		<div id="toolbar">		
		  <h1><?=$admin_overview[14] ?></h1>  
		  <form action="" method="post">
		  <input name="do" type="hidden" value="search" class="hidden">
		  <input name="p" type="hidden" value="maps" class="hidden">
		  <ul id="options">                	
			<li><select name="sgender" style="width:120px;"> <option value="0"><?=$admin_search_val[3] ?></option><?=DisplayGenders(); ?> </select></li>
			<li><select name="spackage" style="width:120px;"> <option value="0"><?=$admin_search_val[2] ?></option><?=DisplayPackages(); ?></select></li>
			<li><select name="sstatus" style="width:120px;">
				  <option value="0"><?=$admin_search_val[7] ?></option>
				  <option value="active"><?=$admin_search_val[8] ?></option>
				  <option value="suspended"><?=$admin_search_val[9] ?></option>
				  <option value="unapproved"><?=$admin_search_val[10] ?></option>
				  <option value="cancel"><?=$admin_search_val[11] ?></option>
				</select></li>
			<li><select name="sjoin"  style="width:110px;">
				  <option value="0">Anytime</option>
				  <option value="1">Joined Today</option>
				  <option value="2">This Week</option>
				  <option value="3">This Month</option>
				  <option value="4">This year</option>
				</select></li>
			<li><input name="susername" type="text" value="<?=$admin_table_val['1'] ?>" style="width:100px;" onfocus="this.value='';"><input type="hidden" name="u_value" value="<?=$admin_table_val['1'] ?>"></li>
			<li><input type="submit" value="<?=$admin_button_val[0] ?>"></li>
		  </ul>
		  </form>
		</div>	
		
		<div id="content1">		
		  <div id="map-wrapper">			
			<div id="mapThis"></div>
		  </div>
		  <div id="sidebar1" style="display:none;">			
			<ul id="sidebar-list" style="display:block;">			
			</ul><br class="clear">
		  </div>
		</div>
		<br class="clear">
		
		<script type="text/javascript">
		
		  var gmarkers = [];
		  var htmls = [];
		
		function init() {
		
		  handleResize();
		  
		  var side_bar_html = "";
		  var markers = [ <?=$ReturnData ?> {'code': '', 'name': 'no', 'latitude':0, 'longitude':0, 'html':' ' } ];
		
		  map = new GMap(document.getElementById("mapThis"));
		  map.addControl(new GLargeMapControl());
		  map.setCenter(new GLatLng(10, 10), 2);
		  map.addControl(new GMapTypeControl());
				  
		  var arLen =markers.length;
		  for ( var id=0, len=arLen; id<len; ++id ){
				 if(markers[id].name !="" && markers[id].name !="reverse" && markers[id].name !="no"){
						createMarker(markers[id], id);
						 side_bar_html += '<li><div class="label">'+ markers[id].code +'</div><a href="javascript:myclick(' + id + ')">' + markers[id].name + '</a></li>';
				  }
		  }	
			  document.getElementById("sidebar-list").innerHTML = side_bar_html;
		}
		
		function createMarker(pointData,id) {
		  var latlng = new GLatLng(pointData.latitude, pointData.longitude);   
		  var marker = new GMarker(latlng);  
		  GEvent.addListener(marker, "click", function() { marker.openInfoWindowHtml(pointData.html);  });
		  map.addOverlay(marker); 
		  gmarkers[id] = marker;
		  htmls[id] = pointData.html;
		  return marker;
		}
		function myclick(i) { gmarkers[i].openInfoWindowHtml(htmls[i]);	}
		function handleResize() {
		  var height = windowHeight() - document.getElementById('toolbar').offsetHeight - 30;
		  document.getElementById('mapThis').style.height = height + 'px';
		  document.getElementById('sidebar1').style.height = height + 'px';
		}
		
		function windowHeight() {
		  // Standard browsers (Mozilla, Safari, etc.)
		  if (self.innerHeight) {
			return self.innerHeight;
		  }
		  // IE 6
		  if (document.documentElement && document.documentElement.clientHeight) {
		   return document.documentElement.clientHeight;
		  }
		  // IE 5
		  if (document.body) {
			return document.body.clientHeight;
		  }
		  // Just in case. 
		  return 0;
		}
		window.onresize = handleResize;
		window.onload = init;
		window.onunload = GUnload;
		</script>
		<?php } ?>

<?php } ?>