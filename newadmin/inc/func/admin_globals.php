
<?
 

function MakeMenuBar($MenuArray, $type="side",$prefix="", $hidesub=0){

 
	$i=1; $String =""; $icon_pic=1;
 
	foreach($MenuArray as $key => $value){ 	
 


if(is_array($value)){


foreach($value as $key1 => $value1){

	$subKey = substr($key1,-1,1); 
	if($subKey !="?" && $subKey !="$" && $subKey !="*" && $subKey !="^" && $MenuArray[$key1."_^"] != "none"){ 
	
		if($type =="top"){
		
			 
			 if(isset($MenuArray[$key1."_^"])){ 
				if($hidesub ==0){$String .= '<a href="'.$prefix.$PageLink.'?p='.$key1.'" class="sub"> <img src="inc/images/icons/resultset_next.png" align="absmiddle">'.$value1.'</a>'; }
			 }else{ 
				$String .= '<a href="'.$prefix.$PageLink.'?p='.$key1.'" class="pluginsub"> <img src="inc/images/16x16/162.png" align="absmiddle"> '.$value1.'</a>';
				$icon_pic++;
			 }
			
		}else{
		
			 if(isset($MenuArray[$key1."_^"])){ 
				$String .= '<li class="inner"><a href="'.$prefix.$PageLink.'?p='.$key1.'"> <img src="inc/images/16x16/162.png" align="absmiddle">'.$value1.'</a></li>';
			 }else{ 
					$String .= '<li><b><a href="'.$prefix.$PageLink.'?p='.$key1.'"> <img src="inc/images/16x16/'.$pageID.$icon_pic.'.png" align="absmiddle">'.$value1.'</a></b></li>';
			 $icon_pic++;
			 }
		 
		}

	}
}

}else{

	$subKey = substr($key,-1,1); 
	if($subKey !="?" && $subKey !="$" && $subKey !="*" && $subKey !="^" && $MenuArray[$key."_^"] != "none"){ 
	
		if($type =="top"){
		
			 
			 if(isset($MenuArray[$key."_^"])){ 
				if($hidesub ==0){$String .= '<a href="'.$prefix.$PageLink.'?p='.$key.'" class="sub"> <img src="inc/images/icons/resultset_next.png" align="absmiddle">'.$value.'</a>'; }
			 }else{ 
				$String .= '<a href="'.$prefix.$PageLink.'?p='.$key.'"> '.$value.'</a>';
				$icon_pic++;
			 }
			
		}else{
		
			 if(isset($MenuArray[$key."_^"])){ 
				$String .= '<li class="inner"><a href="'.$prefix.$PageLink.'?p='.$key.'"> <img src="inc/images/icons/resultset_next.png" align="absmiddle">'.$value.'</a></li>';
			 }else{ 
					$String .= '<li><b><a href="'.$prefix.$PageLink.'?p='.$key.'"> <img src="inc/images/16x16/'.$pageID.$icon_pic.'.png" align="absmiddle">'.$value.'</a></b></li>';
			 $icon_pic++;
			 }
		 
		}

	}
}
		$i++;  	
	
	}
	
	return $String;
}

function MakeMenuDisplay($key, $value, $String, $MenuArray, $type, $prefix, $hidesub, $icon_pic){




	return $String;
}

function Header_LoadScripts($page, $subpage){
 
	print '<script type="text/javascript" src="inc/js/_menu.js"></script>
	<script src="inc/js/Ajax.js" type="text/javascript"></script>
	<script src="inc/js/globals.js" type="text/javascript"></script>';
	
	print '<script type="text/javascript" src="inc/js/prototype.js"></script>';
	print '<script src="inc/js/effects.js" type="text/javascript"></script>';
 
	if($subpage =="files"){
	
	print "<script type='text/javascript' src='inc/js/silverlight.js'></script><script type='text/javascript' src='inc/js/wmvplayer.js'></script>";
	
	}

	if($page==2){

		print '<script src="inc/codepress/codepress.js" type="text/javascript"></script>';
		

	}else{
	print '<script type="text/javascript" src="inc/js/lightbox.js"></script>';
	}

	if($page !=0){
		print '<link href="../inc/css/extras/color_selector.css" rel="stylesheet" type="text/css" />
		<script src="../inc/js/_extras/color_selector.js" type="text/JavaScript"></script>';
		
	}
	if(GOOGLE_MAPS_KEY !="" && $subpage =="maps"){
		print '<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key='.GOOGLE_MAPS_KEY.'" type="text/javascript"></script>'; 
	}
 
	//if( ($subpage =="add" || $subpage =="adminmsg" || $subpage =="send" || $subpage =="compose" || $subpage =="faqadd" || $subpage =="articleadd" || $subpage == "addclass" ) ){ 

    /*print '<script type="text/javascript">_editor_url = "inc/editor08/"; _editor_lang = "en";</script>
    <script type="text/javascript" src="inc/editor08/htmlarea.js"></script>
    <script type="text/javascript">
      function initDocument() {
        var editor = new HTMLArea("editor");
		var config = new HTMLArea.Config();
		config.registerButton("my-hilite", "Highlight text", "my-hilite.gif", false );
		config.width = "550";
		config.height = "300";    
		config.toolbar = [ ["htmlmode", "separator", "fontname", "space", "fontsize", "space","separator", "space", "bold", "italic", "underline", "separator", "forecolor", "hilitecolor", "separator", "insertimage"]];				
		HTMLArea.replace("editor", config);
      }
      HTMLArea.onload = initDocument;
    </script> ';*/

	//}

	print '<script type="text/javascript">function handleError() {return true;}window.onerror = handleError;</script> ';
}

function Header_LoadCSS($page, $subpage){

print '<!-- CSS -->
<link rel="stylesheet" href="inc/css/eMeetingStyles.css" type="text/css" media="screen">
<!--[if IE 6]><link rel="stylesheet" href="inc/css/_ie6.css" type="text/css"><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="inc/css/_ie7.css" type="text/css"><![endif]-->
<!-- CSS -->';

}

function Header_LoadOn($page, $subpage){

	$TableData="";
//die($page."--".$subpage);
	if( $subpage =="add" || $subpage =="send" || $subpage =="adminmsg" || $subpage =="compose" || $subpage =="faqadd" || $subpage =="articleadd" || $subpage == "addclass"){
	
	 print 'HTMLArea.init();';

	}elseif($page==3 && $subpage==""){

	print 'populate_emaillist(0,2);';

	}elseif($page==2 && $subpage=="builder"){

	print 'populate_menulist(1,2)';

	}else{ 
	$DefaultValue=0;
	if($subpage =="cal"){ $TableData="cal"; }
	if($subpage =="class"){ $TableData="class"; }
	if($subpage =="words"){ $TableData="words"; }
	if($subpage =="auto"){ $TableData="auto"; }
	if($subpage =="addclasscat"){ $TableData="addclasscat"; }
	if($subpage =="caladdtype"){ $TableData="caladdtype"; }
	if($subpage =="games"){ $TableData="games"; }
	if($subpage =="faq"){ $TableData="faq"; }
	if($subpage =="chatrooms"){ $TableData="chatrooms"; }
	if($subpage =="forumpost"){ $TableData="forumpost"; }
	if($subpage =="forum"){ $TableData="forum"; }
	if($subpage =="poll"){ $TableData="poll"; }
	if($subpage =="articles"){ $TableData="articles"; }
	if($subpage =="articlecats"){ $TableData="articlecats"; }
	if($subpage =="groups"){ $TableData="groups"; }
	if($subpage =="fieldgroups"){ $TableData="fieldgroups"; }
	if($subpage =="fieldedit"){ $TableData="fieldedit"; $DefaultValue=$_REQUEST['id'];  }
	if($subpage =="fieldlist"){ $TableData="fieldlist"; $DefaultValue=$_REQUEST['id']; if(isset($_GET['linkID'])){ $DefaultValue .="*1"; }  }
	if($subpage =="files"){ $TableData="files"; if(isset($_REQUEST['u']) && $_REQUEST['u'] !=""){ $DefaultValue=$_REQUEST['u']."*username"; } if(isset($_REQUEST['t']) && $_REQUEST['t'] !=""){ $DefaultValue=$_REQUEST['t']; } }
	if($subpage =="affiliate"){ $TableData="affiliate"; }
	if($subpage =="banned"){ $TableData="banned"; }
	if($page==1 && $subpage==""){ $TableData="members"; if(isset($_REQUEST['ustatus']) && $_REQUEST['ustatus'] !=""){ $DefaultValue=$_REQUEST['ustatus']; } }
	if($subpage =="billing"){ $TableData="billing"; }
	if($subpage =="affban"){ $TableData="affban"; }
	if($subpage =="email"){ $TableData="email"; }
	if($subpage =="pages"){ $TableData="pages"; }
	if($page==8 && $subpage==""){ $TableData="banners"; }
	if($page==15 && $subpage==""){ $TableData="admins"; }
    if($subpage =="coupon"){ $TableData="coupon"; }


	if($TableData !=""){ print "LoadTable('".$TableData."','".$DefaultValue."');"; }else{ print "initLightbox();";}

	}
}
 
function unzip($file, $to){

     $zip = new ZipArchive;
     $res = $zip->open($file);
     if ($res === TRUE) {
         $zip->extractTo($to);
         $zip->close();
        return true;
     } else {
         return false;
     }

}
function untar($file,$to){  

	if (substr($to,-1)!="/") $to.="/";  
	$o=fopen($file,"rb"); if (!$o) return false;  
	while(!feof($o)){  
	$d=unpack("a100fn/a24/a12size",fread($o,512));  
	//print_r($d);  
	if (!$d[fn]) break;  
	$dir="";  
	$e=explode("/",$d[fn]);  
	array_pop($e);  
	foreach($e as $v) {$dir.=$v."/";@mkdir($to.$dir);}  
	$d[size]=octdec(trim($d[size])); 
	$o2=fopen($to.$d[fn],"w");  
	if(!$o2) return false;  
	if ($d[size]) fwrite($o2,fread($o,$d[size]));  
	fclose($o2);  $t=512-($d[size]%512); if ($t&&$t!=512) fread($o,$t); }  
	fclose($o);  
	return true;  
}

function GetBrowserData(){

	global $DB;
	$counter=1;
	$DataArray=array();

	$SQL = "select row_num from 
		(
			SELECT count(ID) AS row_num FROM visitors_table WHERE visitor_browser like '%mozilla%'
	 
			union ALL
	
			SELECT count(ID) AS row_num FROM visitors_table WHERE visitor_browser like '%ie%'

			union ALL
	
			SELECT count(ID) AS row_num FROM visitors_table WHERE ( visitor_browser NOT like '%mozilla%' AND visitor_browser NOT like '%ie%' )
		

		) as derived_table";
	 
	$result = $DB->Query($SQL);

	while( $Data = $DB->NextRow($result) ){

		$DataArray[$counter]['total'] = number_format($Data['row_num']);
	
		$counter++;	
	}

	return $DataArray;
}
function GetFeeds($name=""){

	global $DB;
	$counter=1;
	$DataArray=array();
	$result = $DB->Query("SELECT * FROM system_settings WHERE name LIKE '%".$name."%' ORDER BY id DESC");

    while( $Data = $DB->NextRow($result) )
    {

		$DataArray[$counter]['id'] = $Data['id'];
		$DataArray[$counter]['name'] = $Data['name'];
		$DataArray[$counter]['value1'] = $Data['value1'];
		$DataArray[$counter]['value2'] = $Data['value2'];
	
		$counter++;
	}
	
	return $DataArray;
}

function CountMembers($type=1){

	global $DB;
	
	if($type==1){ // ALL MEMBERS		
		
		$re = $DB->Row("SELECT count(id) AS found FROM members");				
		
	}elseif($type==2){ // ALL ACTIVE MEMBERS
		
		
		$re = $DB->Row("SELECT count(id) AS found FROM members WHERE active='active' ");		
		
		
	}elseif($type==3){ // ALL SUSPENDED MEMBERS
		
		
		$re = $DB->Row("SELECT count(id) AS found FROM members WHERE active='suspended' ");	
		
	}elseif($type==4){ // ALL unapproved MEMBERS
		
		$re = $DB->Row("SELECT count(id) AS found FROM members WHERE ( active='unapproved' OR (active='active' AND activate_code !='OK') ) ");	// OR members.activate_code != 'OK'
		
	}elseif($type==5){ // ALL cancel MEMBERS
		
		
			$re = $DB->Row("SELECT count(id) AS found FROM members WHERE active='cancel' ");	
			
	}elseif($type==6){ // ALL cancel MEMBERS
		
		
		$re['found'] = AdminCountOnline();	
		
///////////////////////////// FILES

	}elseif($type==7){ // ALL cancel MEMBERS
		
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files WHERE approved='no'");	
		
	}elseif($type==8){ // ALL cancel MEMBERS
		
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files WHERE type='photo' AND approved='yes'");	
		
	}elseif($type==9){ // ALL cancel MEMBERS
		
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files WHERE type='video' AND approved='yes'");	
		
	}elseif($type==10){ // ALL cancel MEMBERS
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files WHERE type='youtube' AND approved='yes'");	
		
	}elseif($type==11){ // ALL cancel MEMBERS
		
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files WHERE type='music' AND approved='yes'");	
		
	}elseif($type==12){ // ALL cancel MEMBERS
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files");	
		
	}elseif($type==14){ // ALL cancel MEMBERS
		
		
		$re = $DB->Row("SELECT count(uid) AS found FROM files WHERE featured='yes'");	
		
	}elseif($type==15){ // ALL MODORATORS
		
		
		$re = $DB->Row("SELECT count(id) AS found FROM members WHERE moderator='yes'");	
		
	}elseif($type==16){ // SYSTEM EMAILS
		
		
		$re = $DB->Row("SELECT count(nid) AS found FROM email_newsletters WHERE status='system'");	
		
	}elseif($type==17){ // CUSTOM EMAILS
		
		if(!isset($_SESSION['cm17'])){
		$re = $DB->Row("SELECT count(nid) AS found FROM email_newsletters WHERE status='custom'");	
		$_SESSION['cm17'] = $re;
		}else{
			$re = $_SESSION['cm17'];
		}
	}elseif($type==18){ // TEMPLATE EMAILS
		
		if(!isset($_SESSION['cm18'])){
		$re = $DB->Row("SELECT count(nid) AS found FROM email_newsletters WHERE status='template'");	
		$_SESSION['cm18'] = $re;
		}else{
			$re = $_SESSION['cm18'];
		}
	}elseif($type==19){ // TEMPLATE EMAILS
		
		if(!isset($_SESSION['cm19'])){
		$re = $DB->Row("SELECT count(uid) AS found FROM members_billing");	
		$_SESSION['cm19'] = $re;
		}else{
			$re = $_SESSION['cm19'];
		}
	}elseif($type==20){ // TEMPLATE EMAILS
		
		if(!isset($_SESSION['cm20'])){
		$re = $DB->Row("SELECT count(uid) AS found FROM members_billing WHERE members_billing.running='yes' AND members_billing.subscription='no'");	
			$_SESSION['cm20'] = $re;
		}else{
			$re = $_SESSION['cm20'];
		}
	}elseif($type==21){ // TEMPLATE EMAILS
		
		if(!isset($_SESSION['cm21'])){
		$re = $DB->Row("SELECT count(uid) AS found FROM members_billing WHERE members_billing.running='no' AND members_billing.subscription='no'");	
		$_SESSION['cm21'] = $re;
		}else{
			$re = $_SESSION['cm21'];
		}
	}elseif($type==22){ // TEMPLATE EMAILS
		if(!isset($_SESSION['cm22'])){
		$re = $DB->Row("SELECT count(uid) AS found FROM members_billing WHERE members_billing.running='yes' AND members_billing.subscription='yes'");	
		$_SESSION['cm22'] = $re;
		}else{
			$re = $_SESSION['cm22'];
		}
	}elseif($type==23){ // TEMPLATE EMAILS
		if(!isset($_SESSION['cm23'])){
		$re = $DB->Row("SELECT count(uid) AS found FROM members_billing WHERE members_billing.running='no' AND members_billing.subscription='yes'");	
		$_SESSION['cm23'] = $re;
		}else{
			$re = $_SESSION['cm23'];
		}
	}elseif($type==24){ // TEMPLATE EMAILS
	$re = $DB->Row("SELECT count(id) AS found FROM members WHERE TO_DAYS( NOW( 'y-m-d' ) ) - TO_DAYS( members.created ) < 7 ");
	}elseif($type==25){ // FILES TO APPROVE
	
		$re = $DB->Row("SELECT count(id) AS found FROM files WHERE approved='no' AND uid !=0 ");	

	}elseif($type==26){ // NEW TODAY

		$re = $DB->Row("SELECT count(id) AS found FROM members WHERE created LIKE '%".date("Y-m-d")."%' ");	

// WEBSITE ALERTS

	}elseif($type==28){ // NEW TODAY
		

		$re = $DB->Row("SELECT count(id) AS found FROM visitors_table WHERE visitor_date LIKE '%".date("Y-m-d")."%' ");	

	}elseif($type==29){ // billing
	
		$re = $DB->Row("SELECT count(id) AS found FROM members_billing WHERE date_expire LIKE '%".date("Y-m-d")."%' ");	


	}elseif($type==30){ // message photos
		
		
		$re = $DB->Row("SELECT count(id) AS found FROM files WHERE aid=0 AND title='Message Photo' ");	
			

	}elseif($type==31){ // message photos
		
		
		$re = $DB->Row("SELECT count(id) AS found FROM members WHERE highlight='on' ");	
			
	}elseif($type==32){ // message photos
		
		
		$re = $DB->Row("SELECT count(*) AS found FROM messages WHERE messages.mail2id='0' AND mailstatus='unread' ");	
								
	}else{
	
		return 0;
	
	}

	return $re['found'];
	
}

function AdminCountOnline(){

	global $DB;
	
	$OnlineCounter=0;
	$re = $DB->Query("SELECT DISTINCT logid FROM members_online WHERE logid !=0 GROUP BY logid");	
	while( $class = $DB->NextRow($re) )	{
		$OnlineCounter++;
	}
	return $OnlineCounter;
	
}
/**
 * Convert BR tags to nl
 *
 * @param string The string to convert
 * @return string The converted string
 */
function br2nl($string)
{
    return preg_replace('/\<br(\s*)?\/?\>/i', "\n", $string);
}
function nl2br2($string) {
$string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
return $string;
} 

function GetLinkedName($id){

	global $DB;

	if($id ==0){ return "Field Not Linked";}

    $result = $DB->Row("SELECT caption FROM field_caption WHERE Cid=".$id." LIMIT 1");
	
	return $result['caption'];
}

function LinkFieldList($id){

	global $DB;
	$string="";
    $result = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE fvFid ='".$id."' ORDER BY fvOrder ASC");
	
	while( $data = $DB->NextRow($result) )
    {
		
		$string .= "<option value='".$data['fvid']."'>".$data['fvCaption']."</option>";
	}

	return $string;
}

function ResetSession(){

	for($i=2; $i < 27; $i++){
		
		if(isset($_SESSION['cm'.$i])){
			unset($_SESSION['cm'.$i]);
		}
	}
}
function displayTextArea($content=''){

	global $editor;

	$content = eMeetingOutput(html_entity_decode($content),true);
	
	$editor->value = $content;

	if(U_EDITOR =="yes"){
		
		print $editor->display('100%', 400); 

		//print '<textarea id="editor" name="editor" style="height: 30em; width: 100%;">'.$content.'</textarea>';

	}else{
	
		print '<textarea name="editor" style="font-size:12px; height:600px; width:700px;">'.$content.'</textarea>';
	
	}
}

function DisplayPhoto($array,$addSize){
		
		/*
		
			THIS FUNCTION HANDELS ALL THE FILE PREVIEWS BOT SNAP SHOTS AND PLAYERS
			0 = snapshot/thumb ~ 1 = player/big
		*/
		 
		if($array['type'] =="photo"){
		
			if($addSize==1){			
				$UImage = WEB_PATH_IMAGE_THUMBS.$array['File'];						
			}else{						
				$UImage = WEB_PATH_IMAGE_THUMBS.$array['File'];	
			}
		 
			return "<a href='#' onclick=\"NewpopUpWin('".$array['File']."');\"><img src='".$UImage."' width=120 height=120></a>";	
										
		}elseif($array['type'] =="music"){
		
			return '<embed src="inc/js/mediaplayer.swf" width="48" height="20" allowscriptaccess="always" allowfullscreen="true" flashvars="width=48&height=20&file='.WEB_PATH_MUSIC.$array['File'].'" />';
									
		}elseif($array['type'] =="video"){				
		
		return '<a href="javascript:void(0);" onClick="PreviewWin(\'inc/pops/pop_video.php?file='.$array['File'].'\');"><img src="inc/images/16x16/movie_track_next.png" align="absmiddle"> Watch</a>';

						
		}elseif($array['type'] =="youtube"){
						
		return '<a href="javascript:void(0);" onClick="PreviewWin(\'inc/pops/pop_video.php?file='.$array['File'].'&t=y\');"><img src="inc/images/16x16/movie_track_next.png" align="absmiddle"> Watch</a>';
 
		}else{
				return "<img src='../inc/tb.php?src=".DEFAULT_IMAGE."'>";
		}

		return $UImage;
}
##########################################################################################
## 								PACKAGES												##
##########################################################################################
function unhtmlspecialchars( $string )
{
  $string = str_replace ( '&amp;', '&', $string );
  $string = str_replace ( '&#039;', '\'', $string );
  $string = str_replace ( '&quot;', '"', $string );
  $string = str_replace ( '&lt;', '<', $string );
  $string = str_replace ( '&gt;', '>', $string );
  $string = str_replace ( '&uuml;', '?', $string );
  $string = str_replace ( '&Uuml;', '?', $string );
  $string = str_replace ( '&auml;', '?', $string );
  $string = str_replace ( '&Auml;', '?', $string );
  $string = str_replace ( '&ouml;', '?', $string );
  $string = str_replace ( '&Ouml;', '?', $string ); 
  return $string;
}
function PackageItems($id){

	global $DB;

    $result = $DB->Row("SELECT * FROM package WHERE pid=".$id);
	
	return $result;
}
function DisplayGender($garray=""){
	
	global $DB;
	
	$Gen = $DB->Query("SELECT fvid AS id, fvCaption as name FROM field_list_value WHERE fvFid=28 LIMIT 10");
	while( $value = $DB->NextRow($Gen) )
    {
	
		print "<option value='".$value['id']."'>".$value['name']."</option>";
	}

}

function getusername($id){

	global $DB;

    $result = $DB->Row("SELECT username FROM members WHERE id=".$id);

    return $result['username'];
}
function GetPackageName($id){

	global $DB;

	if(!is_numeric($id)){ return $id;}

    $result = $DB->Row("SELECT name FROM package WHERE pid=".$id);

    return $result['name'];
}

function GetUseridFromUsername($id){

	global $DB;

    $result = $DB->Row("SELECT id FROM members WHERE username = ( '".$id."' ) LIMIT 1");

    return $result['id'];
}
function DisplayPackage($id=0){
 
	global $DB;
	$String="";

    $result = $DB->Query("SELECT pid, name FROM package WHERE pid !=7 ");  

    while( $pack = $DB->NextRow($result) )
    {
		if($pack['pid']==$id){
			$String .= "<option value='".$pack['pid']."' selected>".$pack['name']."</option>";
		}else{
			$String .= "<option value='".$pack['pid']."'>".$pack['name']."</option>";
		}
	}
	return $String;
}

function DisplayStatus($current){
	$statusArray = array('---','active', 'suspended', 'unapproved', 'cancel'); 
	$String="";
	
	foreach($statusArray as $value){
	
			if($current == $value){
				$String .= "<option value='".$value."' selected>".$value."</option>";
			}else{
				$String .= "<option value='".$value."'>".$value."</option>";
			}
	}
	
	return $String;

}
function DisplayGenderList($current){

	$String="";
	
	foreach($_SESSION['g_array'] as $value){
	
			if($current == $value){
				$String .= "<option value='".$value['id']."' selected>".$value['caption']."</option>";
			}else{
				$String .= "<option value='".$value['id']."'>".$value['caption']."</option>";
			}
	}
	
	return $String;
}

function DisplayCountryList($current){

	global $DB;
    $result = $DB->Query("SELECT fvCaption FROM field_list_value WHERE fvFid=25");
	$String="";
    while( $data = $DB->NextRow($result) )
    {
			if($current == $data['fvCaption']){
				$String .= "<option value='".$data['fvCaption']."' selected>".$data['fvCaption']."</option>";
			}else{
				$String .= "<option value='".$data['fvCaption']."'>".$data['fvCaption']."</option>";
			}
	}

	return $String;
}
##########################################################################################
## 								TIME / DATE elaspsed									##
##########################################################################################
 

function myAddSlashes( $string ) {

 return $string;

}

function MakeAge($birthday){

        $birth = explode("-", $birthday);
		switch($birth[1]){
			case "FEB": { $MM = "02"; } break;
			case "JAN": { $MM = "01"; } break;
			case "MAR": { $MM = "03"; } break;
			case "APR": { $MM = "04"; } break;
			case "MAY": { $MM = "05"; } break;
			case "JUN": { $MM = "06"; } break;
			case "JUL": { $MM = "07"; } break;
			case "AUG": { $MM = "08"; } break;
			case "SEP": { $MM = "09"; } break;
			case "OCT": { $MM = "10"; } break;
			case "NOV": { $MM = "11"; } break;
			case "DEC": { $MM = "12"; } break;
			default: { $MM = $birth[1]; }
		}

	$d_stamp = date("d.m.Y",time());
	
	$day =$birth[2];
	$month =$MM;
	$year =$birth[0];
	 
	list($cur_day,$cur_month,$cur_year) = explode(".",$d_stamp);
	 
	$year_diff = $cur_year-$year;
	 
	if(($month > $cur_month) || ($month == $cur_month && $cur_day < $day)) {
		  
	$age = $year_diff-1; } else { $age = $year_diff; }
	
	return $age;

}
function GetAgeYear($number){
	$year = date("Y");
	for($i=$number; $i != 0; $i--){
		$year--;
	}
	return $year;
}

function chmodDirectory( $path = '.', $level = 0 ){  

	$ignore = array( 'cgi-bin', '.', '..' );
	
	$dh = @opendir( $path );
	
	while( false !== ( $file = readdir( $dh ) ) ){ // Loop through the directory
	
	if( !in_array( $file, $ignore ) ){
	if( is_dir( "$path/$file" ) ){
	@chmod("$path/$file",0777);
	chmodDirectory( "$path/$file", ($level+1));
	} else {
	@chmod("$path/$file",0777); // desired permission settings
	}//elseif
	
	}//if in array
	
	}//while
	
	closedir( $dh );

}//function

function GetFolderSize($d ="." ) {
    // � kasskooye and patricia benedetto
    $h = @opendir($d);
    if($h==0)return 0;

    while ($f=readdir($h)){
        if ( $f!= "..") {
            $sf+=filesize($nd=$d."/".$f);
            if($f!="."&&is_dir($nd)){
                $sf+=GetFolderSize ($nd);
            }
        }
    }
    closedir($h);
    return byte_convert($sf);
} 

  function byte_convert($bytes)
  {
    $symbol = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');

    $exp = 0;
    $converted_value = 0;
    if( $bytes > 0 )
    {
      $exp = floor( log($bytes)/log(1024) );
      $converted_value = ( $bytes/pow(1024,floor($exp)) );
    }

    return sprintf( '%.2f '.$symbol[$exp], $converted_value );
  }




















##########################################################################################
## 								eMeeting TABLE											##
##########################################################################################
function MakePageNumbers($max_results, $total_results, $page){

$total_page_new = ceil($total_results / $max_results);
if($total_page_new ==0){ $total_page_new=1; }

	if($page ==0){$page=1; }
 
 	$SearchNav = '<table width="200" border="0" style="background:#FD9F31; padding:5px;"><tr> <td><a href="#" onclick="javascript:eMeetingTableSwitch(1,3);"><img src="inc/images/icons/resultset_first.png"></a></td>';   

if($page < $total_page_new+1){

    $pag = new pageNumbers($page, $total_page_new, 1);

    $separator = "";
    foreach($pag->numbers as $pageNumber=>$type)
    {
        switch($type)
        {
            case "current": {

				$SearchNav .= '<td> Page <input name="textfield" type="text" size="3" maxlength="5" value="'.$pageNumber.'" onChange="eMeetingTableSwitch(this.value,3);"> of '.$total_page_new.'</td>';

             } break;
                
            case "link": {

				if($pageNumber < $page){ 

					if(!isset($StopThis1)){ $StopThis1=1;
					$SearchNav .= "<td><a href='#' onclick=\"javascript:eMeetingTableSwitch('".$pageNumber."',3);\"><img src=\"inc/images/icons/resultset_previous.png\"></a></td>"; }

				}else{
					
					if(!isset($StopThis2)){ $StopThis2=1;
					$SearchNav .= "<td><a href='#' onclick=\"javascript:eMeetingTableSwitch('".$pageNumber."',3);\"><img src=\"inc/images/icons/resultset_next.png\"></a></td>"; }
				}
             } break;

        }
    }
}
	$SearchNav .= "<td><a href='#' onclick=\"javascript:eMeetingTableSwitch('".$total_page_new."',3);\"><img src='inc/images/icons/resultset_last.png'></a></td></tr></table> ";

	print $SearchNav;

}
function MakeAllSearchData($SEARCH_VALUE){

	$ReturnString=" WHERE ( ";
	
	foreach($GLOBALS['SEARCH_DATA']["tb_data"] as $value){	
	
		$ReturnString .= " ".eMeetingRemoveASTables($value)." LIKE '%".$SEARCH_VALUE."%' OR ";
 	
	}
	
	$ReturnString .=" ) ";
	
	$ReturnString = str_replace("OR  )",")",$ReturnString);
	
	return $ReturnString;

}

function MakeTable($Data){

	global $DB;

	if(isset($GLOBALS['SEARCH_DATA'])){

	// FORMAT DATA
	$SQL     	  	= (isset($Data['sql']) && $Data['sql'] !="") ? $Data['sql']	: "SELECT %data FROM %tables %where ORDER BY %order %limit"; // MAIN SQL STRING
	$SQL_TOTAL    	= (isset($Data['sql']) && $Data['sql'] !="") ? $Data['sql']	: "SELECT %data FROM %tables %where ORDER BY %order %limit"; // USED ONLY TO GET TOTAL RESULTS
	$PAGE_CURRENT 	= (isset($Data['Cpage']) && is_numeric($Data['Cpage']) && $Data['Cpage'] !="") ? $Data['Cpage']	: 0; // GET THE CURRENT PAGE
	$PAGE_START 	= (isset($Data['Spage']) && is_numeric($Data['Spage']) && $Data['Spage'] !="") ? $Data['Spage']	: 0; // GET THE CURRENT PAGE
	$PAGE_STOP 		= (isset($Data['Tpage']) && is_numeric($Data['Tpage']) && $Data['Tpage'] !="") ? $Data['Tpage']	: $GLOBALS['SEARCH_DATA']['tb_rowsPerPage']; // GET THE CURRENT PAGE
	$PAGE_SORTBY	= (isset($Data['sort']) && $Data['sort'] !="") ? $Data['sort']		: $GLOBALS['SEARCH_DATA']['tb_OrderBy']; // GET THE CURRENT PAGE
	$PAGE_SORTWAY	= (isset($Data['Wsort']) && $Data['Wsort'] !="") ? $Data['Wsort']	: $GLOBALS['SEARCH_DATA']['tb_OrderWay']; // GET THE CURRENT PAGE
	
	$SEARCH_VALUE	= (isset($Data['search']) && $Data['search'] !="") ? $Data['search']	: ""; // GET THE CURRENT PAGE
	$SEARCH_FIELD 	= (isset($Data['sort']) && $Data['sort'] !="") ? $Data['sort']	: $GLOBALS['SEARCH_DATA']['tb_defaultField']; // GET THE CURRENT PAGE
	//
	 

	if(strlen($SEARCH_VALUE) > 2){
	
		if($GLOBALS['SEARCH_DATA']['tb_OrderBy'] == $SEARCH_FIELD){		 
	 	
	 	$SEARCH_STRING	= MakeAllSearchData($SEARCH_VALUE);
	 
		}else{
		
		$SEARCH_STRING	= " WHERE ".$SEARCH_FIELD." LIKE '%".$SEARCH_VALUE."%'";
		
		}	
	
	}else{
	$SEARCH_STRING	= $GLOBALS['SEARCH_DATA']['tb_where'];
	}
	 
	 

	$Page_Start = ($PAGE_CURRENT*$PAGE_STOP)-$PAGE_STOP;
	if($Page_Start < 0){ $Page_Start=0; }	 
 
	$SQL_TOTAL = str_replace("%data","count(*) AS total ",$SQL_TOTAL);	
 
	$SQL_TOTAL = str_replace("%order",$PAGE_SORTBY,$SQL_TOTAL);
	$SQL_TOTAL = str_replace("%limit","",$SQL_TOTAL);
	$SQL_TOTAL = str_replace("%where",$SEARCH_STRING,$SQL_TOTAL);
	$SQL_TOTAL = str_replace("%tables",$GLOBALS['SEARCH_DATA']['tb_tables'],$SQL_TOTAL);

	$SQL = str_replace("%data",implode(",", $GLOBALS['SEARCH_DATA']['tb_data'])."",$SQL);	
	$SQL = str_replace("%order",$PAGE_SORTBY." ".$PAGE_SORTWAY,$SQL);
 	$SQL = str_replace("%limit","LIMIT ".$Page_Start.",".$PAGE_STOP,$SQL); 
	$SQL = str_replace("%where",$SEARCH_STRING,$SQL);
 	$SQL = str_replace("%tables",$GLOBALS['SEARCH_DATA']['tb_tables'],$SQL);

	//$DB->Query("SET sql_big_selects=1"); // UNCHECK THIS IF YOU HAVE PROBLMS WITH BIG QUERY

	$total = $DB->Row($SQL_TOTAL);
	$result = $DB->Query($SQL);

	$TOTAL_DATA =$total['total'];

//print $SQL;
	
	
	print "<div class='bar_save'><p><b>Results Found: ".number_format($total['total'])."</b> - [ <a href=\"#\" onclick=\"idShowHide('rightcolumn');ChangeDiv1();\" style='text-decoration:underline;'> Expand Window</a> - <a href=\"#\" onclick=\"idShowHide('rightcolumn');ChangeDiv2();\" style='text-decoration:underline;'>Extract Window</a> ] </p></div>";
	print '<form name="profile" onSubmit="return false;">

	<input type="hidden" name="HHDefaultValue" id="HHDefaultValue" value="'.$GLOBALS['SEARCH_DATA']['tb_defaultValue'].'">
	<input type="hidden" name="HHSystem" id="HHSystem" value="'.$GLOBALS['SEARCH_DATA']['tb_system'].'">
	<input type="hidden" name="HHOrder" id="HHOrder" value="'.$PAGE_SORTBY.'">
	<input type="hidden" name="HHSearch" id="HHSearch" value="'.$SEARCH_VALUE.'"><input type="hidden" name="HHSearchF" id="HHSearchF" value="'.$SEARCH_FIELD.'">
	<input type="hidden" name="HHOrderWay" id="HHOrderWay" value="'.$PAGE_SORTWAY.'"><input type="hidden" name="HHStart" id="HHStart" value="'.$PAGE_CURRENT.'">
	<input type="hidden" name="HHDeleteValue" id="HHDeleteValue" value="'.$GLOBALS['SEARCH_DATA']['tb_deletevalue'].'"><input type="hidden" name="HHRows" id="HHRows" value="'.$PAGE_STOP.'">
	';

	

	print '<table class="eMeetingTableBar"><tr><td>';

	print "<input type='text' onChange='eMeetingTableSwitch(this.value,1); return false;' class='input' id='SearchKey' value='Enter Keyword'>";

	print "<select onChange='eMeetingChangeWay(); eMeetingTableSwitch(this.value,2);' class='input' style='width:150px;'><option value='1'>Order By</option>"; $cap=0; foreach($GLOBALS['SEARCH_DATA']['tb_data'] as $value){ print "<option value='".eMeetingRemoveASTables($value)."'>".$GLOBALS['SEARCH_DATA']['tb_captions'][$cap]."</option>"; $cap++; } print "</select>";	

	print "<select onChange='eMeetingTableSwitch(this.value,4);' class='input'><option value='1'>Rows Per Page</option><option value='10'>10</option><option value='50'>50</option><option value='100'>100</option></select>";

	print "</td><td><div id='TableAlert'></div></td></tr></table>";

	if($TOTAL_DATA == 0){ print "<div style='padding:20px;text-align:center;'><h1>No Results Found</h1><p><img src='inc/images/icons/files.gif' align='absmiddle'> <a href='".$_SERVER['HTTP_REFERER']."'>Restart Search</a></p></div>"; }
		else{

	// LOAD TABLE HEADERS
	print '<div id="eMeetingTableWrapper"><table id="eMeetingTable">'; 
	print '<thead><tr>';
	print '<th class="sortfirstdesc"></th>';
	$th=0; foreach($GLOBALS['SEARCH_DATA']['tb_data'] as $value){ if(substr($value,-2) =="id" && $GLOBALS['SEARCH_DATA']['tb_hideID'] ==true) { $th++;}else{
	print '<th id="'.$GLOBALS['SEARCH_DATA']['tb_data'][$th].'"><a href="#" onClick="eMeetingChangeWay(); eMeetingTableSwitch(\''.eMeetingRemoveASTables($GLOBALS['SEARCH_DATA']['tb_data'][$th]).'\',2); return false;">'.$GLOBALS['SEARCH_DATA']['tb_captions'][$th].'</a>'.eMeetingSpecialHeader($GLOBALS['SEARCH_DATA']['tb_data'][$th]).'</th>'; 
	$th++; }} 

	if($GLOBALS['SEARCH_DATA']['tb_edit']){ print '<td></td>';}
				
	print '</tr></thead>';

	// LOAD TABLE BODY
	$Counter=1; while( $Data = $DB->NextRow($result) ){	

	if($Counter % 2){ $BGC="roweven"; $BG_C="transparent"; }else { $BGC="rowodd"; }
	print '<tr align="center" id="tr_'.$Counter.'" class="'.$BGC.'"  onmouseover="this.style.backgroundColor=\'#DAEFFF\';" onmouseout="this.style.backgroundColor=\'#ffffff\';"><td style="width:30px;"><input name="d'.$Counter.'" type="checkbox" value="on"><input type=hidden value="'.$Data[eMeetingTableStringKeys($GLOBALS['SEARCH_DATA']['tb_deletevalue'], $GLOBALS['SEARCH_DATA']['tb_data_name'])].'" name="id'.$Counter.'" class="hidden"></td>';
	 
	$i=0; foreach($GLOBALS['SEARCH_DATA']['tb_data'] as $value){ 
 
		if(substr($value,-2) =="id" && $GLOBALS['SEARCH_DATA']['tb_hideID'] ==true) {  }else{
		$ThisValue = $Data[eMeetingTableStringKeys($GLOBALS['SEARCH_DATA']['tb_data'][$i], $GLOBALS['SEARCH_DATA']['tb_data_name'])]; 
		$ThisValue = eMeetingTableValue($ThisValue,$Data[eMeetingTableStringKeys($GLOBALS['SEARCH_DATA']['tb_deletevalue'], $GLOBALS['SEARCH_DATA']['tb_data_name'])],$GLOBALS['SEARCH_DATA']['tb_data'][$i],$i.$Counter,$Data);
		print '<td scope="col" >'.$ThisValue.'</td> ';}

	$i++; } 

	// EDIT BOX
	if($GLOBALS['SEARCH_DATA']['tb_edit']){
		print "<td align='center'><a href='".$GLOBALS['SEARCH_DATA']['tb_edit_path'].$Data[eMeetingTableStringKeys($GLOBALS['SEARCH_DATA']['tb_deletevalue'], $GLOBALS['SEARCH_DATA']['tb_data_name'])]."'>".icon_edit."</a></td>";
	}
	
	print '</tr>';	
	
	 $i=0;$Counter++;} 
	
	 print '</tbody></table></div>';

	}


	// BUILD PAGE BUTTON

	print '<table class="eMeetingTableBar"><tr><td>';

	print MakePageNumbers($PAGE_STOP, $TOTAL_DATA, $PAGE_CURRENT);
	 $Counter--;
	print '</td><td>

		<table width="300" border="0" style="background:#FD9F31; padding:5px;">
		  <tr>
			<td>&nbsp;Showing:</td>
			<td><input name="textfield2" type="text" size="3" maxlength="5" value="'.$PAGE_STOP.'" onChange="eMeetingTableSwitch(this.value,4);"></td>
			<td> per page </td>
			<td style="font-size:10px;font-weight:bold;"> ('.number_format($Counter).' visible /'.number_format($total['total']).' total )</td>
		  </tr>
		</table>

	</td>

    <td>

		<table width="92" border="0" style="padding:5px;">
		  <tr>
			 &nbsp;
		</tr>
		</table>

	</td>

  </tr></table>';

	

	print '<br><div class="bar_save"><input type="button" value="Select All" class="NormBtn" onClick="ca('.$Counter.')"/>
	<input type="button" value="Deselect All" class="NormBtn"  onClick="ua('.$Counter.')"/>
	<input type="button" value="Delete" class="MainBtn" onClick="eMeetingTableSubmit('.$Counter.');" />
<input type="button" value="Approve all" class="MainBtn" onClick="eMeetingCustomApproval('.$Counter.');" /></div>';

	print '</form>';


	}else{
		print "Error! Data not loaded ".$_GET['system'];
	}
	
	
}
function eMeetingRemoveASTables($key){

	if(strpos($key,"AS") ===false){
			
	}else{
		$AsD = explode(" ",$key);
		$key = $AsD[0];		
	}

	return $key;
}
function eMeetingTableStringKeys($key, $ThisArray){ 

	foreach($ThisArray as $Striper){
		if(strpos($key,"AS") ===false){
		$key = str_replace($Striper,"",$key);
		}else{
			$AsD = explode(" ",$key);
			$key = $AsD[2];
		}
	}
	return $key;
}

function eMeetingSpecialHeader($key){

	if(substr($key,-5) =="Order"){
	return ' <a href="#" OnClick="eMeetingSaveListOrder(\''.$key.'\');"> <img src="inc/images/icons/savelist.png" align="absmiddle" alt="Save List Order"> </a> ';
	}else{
		
	}
}

function MakeCountry($id){

	global $DB;
	
	if(!is_numeric($id)){

	return $id;

	}elseif($id == 0 || $id == ""){
	
		return "na";
		
	}else{
		
		
		
			$re3 = $DB->Row("SELECT id, fvCaption FROM field_list_value WHERE fvid='".strip_tags($id)."'  AND lang='".D_LANG."' LIMIT 1");
			$_SESSION['country'][$re3['id']]['name'] = $re3['fvCaption'];
			return $re3['fvCaption'];
		
	}
	
}

function eMeetingTableValue($value, $id, $field, $counter, $ArrayData){

	if($value =="yes"){ $value="<div id='yesNoImg_".$counter."'><a href='#' onClick=\"ChangeYesNo('no','".$id."','".$field."'); ChangeImage('yesNoImg_".$counter."','no','".$id."','".$field."'); return false;\"><img src='inc/images/icons/yes.png' align='absmiddle'></a></div>"; 
	}elseif($value =="no"){ $value="<div id='yesNoImg_".$counter."'><a href='#' onClick=\"ChangeYesNo('yes','".$id."','".$field."'); ChangeImage('yesNoImg_".$counter."','yes','".$id."','".$field."'); return false;\"><img src='inc/images/icons/no.png' align='absmiddle'></a></div>"; }

	elseif(substr($field,-8) =="Category"){

	}elseif(substr($field,-6) =="gender"){

	return "<div id='ChangeDiv_".$counter."' onClick=\"eMeetingChangeDiv('gender','ChangeDiv_".$counter."', '".$value."','".$id."','".$field."')\" style='cursor:pointer;'/>".$_SESSION['g_array'][$value]['icon']." ".$_SESSION['g_array'][$value]['caption']."</div>";
 
	}elseif(substr($field,-4) =="Date"){

	}elseif(substr($field,-5) ==".type"){

	return "<a href='?p=files&t=".$value."'>".$value."</a>";

	}elseif(substr($field,-9) =="lastlogin" || substr($field,-7) =="created"){

	return ShowTimeSince($value);

	}elseif(substr($field,-3) =="age"){
 
	return MakeAge($value);

	}elseif(substr($field,-5) =="Photo"){

	return "<a href='members.php?p=files&u=".$ArrayData['username']."'><img src='".WEB_PATH_IMAGE.$value."' width='120' height='120' style='border:1px solid #6666;'></a>";
//src='".DB_DOMAIN."inc/tb.php?src=".$value."&x=48&y=48'
	}
	elseif(substr($field,-6) =="Verify"){
	//print_r(WEB_PATH_IMAGE.$value);
   return "<a href='javascript:void(0);' onclick='window.open(\"".WEB_PATH_IMAGE.$value."\",\"ghgfhg\",\"height=400,top=350,left=800,width=600\");'><img src='".WEB_PATH_IMAGE.$value."' width='120' height='120' style='border:1px solid #6666;'></a>";
		
	}   

	elseif(substr($field,-8) =="username"){

	return "<a href='".DB_DOMAIN."index.php?dll=profile&pUsername=".$ArrayData['username']."' target='_blank'> ".$value." </a>";

	}elseif(substr($field,-4) =="type"){
 
	}elseif(substr($field,-4) =="icon"){

	$value = str_replace(DB_DOMAIN."uploads/files/","",$value);
	return "<img src='".DB_DOMAIN."uploads/files/".$value."'>";

	}elseif(substr($field,-4) =="aicon"){

	return "<img src='inc/images/avatars/".$value."'>";

 	}elseif(substr($field,-4) =="Icon"){

	return "<img src='".DB_DOMAIN."inc/exe/Games/pics/".$value.".gif'>";

	}elseif(substr($field,-4) =="File"){
	
	return DisplayPhoto($ArrayData,1);

	}elseif(substr($field,-7) =="country"){

	return "<div id='ChangeDiv_".$counter."' onClick=\"eMeetingChangeDiv('country','ChangeDiv_".$counter."', '".$value."','".$id."','".$field."')\" style='cursor:pointer;'/>".MakeCountry($value)."</div>";

	}elseif(substr($field,-8) =="Upgraded"){

	return "".GetPackageName($value)."";

	}elseif(substr($field,-10) =="Membership"){

	return "<div id='ChangeDiv_".$counter."' onClick=\"eMeetingChangeDiv('membership','ChangeDiv_".$counter."', '".$value."','".$id."','".$field."')\" style='cursor:pointer;'/>".GetPackageName($value)."</div>";

	}elseif(substr($field,-10) =="LinkedWith"){

	return "<select onChange=\"eMeetingSaveLinkedListID(this.value, ".$id."); return false;\">".DynamicLinkFieldList($ArrayData['linked_id'],$value)."</select>";


	}
	elseif(substr($field,-6) =="active"){
 
		if($ArrayData['activate_code'] !="OK"){
			$value = "noAK";
		}

	// ADD IMAGES
	switch($value){
	 case"suspended":{ $img ='<img src="inc/images/icons/flag_red.png" align="absmiddle"> ';} break;
	 case"unapproved":{ $img ='<img src="inc/images/icons/flag_blue.png" align="absmiddle"> '; } break;
	 case"cancel":{ $img ='<img src="inc/images/icons/flag_orange.png" align="absmiddle"> '; } break;
	 case "noAK": { $img ='<img src="inc/images/icons/flag_green.png" align="absmiddle"> '; $value="Awaiting Email Activation"; } break;
	 default: {$img=""; }
	}

	return "<div id='ChangeDiv_".$counter."' onClick=\"eMeetingChangeDiv('status','ChangeDiv_".$counter."', '".$value."','".$id."','".$field."')\" style='cursor:pointer;'/>".$img.$value."</div>";


	}
	elseif(substr($field,-9) =="NewActive"){
 
		if($ArrayData['activate_code'] !="OK"){
			$value = "noAK";
		}

	// ADD IMAGES
	switch($value){
	 case"suspended":{ $img ='<img src="inc/images/icons/flag_red.png" align="absmiddle"> ';} break;
	 case"unapproved":{ $img ='<img src="inc/images/icons/flag_blue.png" align="absmiddle"> '; } break;
	 case"cancel":{ $img ='<img src="inc/images/icons/flag_orange.png" align="absmiddle"> '; } break;
	 case "noAK": { $img ='<img src="inc/images/icons/flag_green.png" align="absmiddle"> '; $value="Awaiting Email Activation"; } break;
	 default: {$img=""; }
	}

	//return "<div id='ChangeDiv_".$counter."' onClick=\"eMeetingChangeDiv('status','ChangeDiv_".$counter."', '".$value."','".$id."','".$field."')\" style='cursor:pointer;'/>".$img.$value."gggggg</div>";
	return "<input id='ChangeDiv_NewActive1' type='button' value='Approve' class='MainBtn'  onClick=\"eMeetingSaveDiv('ChangeDiv_NewActive1','status2','approved','".$id."')\"/> <br><br><input id='ChangeDiv_NewActive2' type='button' value='Deny' class='MainBtn'  onClick=\"eMeetingSaveDiv('ChangeDiv_NewActive2','status2','cancel','".$id."')\"/> <br><br><input id='ChangeDiv_NewActive3' type='button' value='Approve & Verify' class='MainBtn'  onClick=\"eMeetingSaveDiv('ChangeDiv_NewActive3','status2','approve_verify','".$id."')\"/> ";


	}
	elseif(substr($field,-5) =="photo" && $value !=""){ 

		if(strpos($value,".") ===false){ // added extra for game icons
		$value ="<img src='".WEB_PATH_FILES.$value.".gif'>";
		}else{
		$value ="<img src='".WEB_PATH_FILES.$value."'>";
		} 		
	
	}elseif(substr($field,-4) =="icon" && $value !=""){ 
 
		if(strpos($field,"game_games.gameid") ===false){ // added extra for game icons
			$value="<img src='".DB_DOMAIN."inc/tb.php?src=".$value."&t=f&x=48&y=48' width='48' height='48' style='border:1px solid #6666;'>";
		}else{
			$value="<img src='".GAME_PATH_PICS.$value.".gif'>";		
		
		}
	}elseif(substr($field,-8) =="filesize"){

		return byte_convert($value);

	}else{
		//if(strlen($value) > 20){ $value = strip_tags(substr($value,0,20)).".."; }else{ $value =strip_tags($value); }

		if(substr($field,-5) =="views"){

			$NewWidth="25px";

		}elseif(substr($field,-2) =="id"){
return $value;

		}elseif(substr($field,-2) =="id"){

			$NewWidth="25px";

		}elseif(substr($field,-5) =="title"){

		}elseif(substr($field,-4) =="rder"){

			$NewWidth="50px";

		}elseif(substr($field,-2) =="ip"){
		$NewWidth="100px";
		
		}elseif(substr($field,-7) =="credits"){
		$NewWidth="50px";
		
		}elseif(substr($field,-6) =="number"){
		$NewWidth="80px";

		}else{
			$NewWidth="150px";
		}

		if(substr($field,-4) =="lang"){
		 $value = "<div id='ChangeLang_".$counter."' onClick=\"eMeetingChangeLang('ChangeLang_".$counter."', '".$value."','".$id."','".$field."')\" style='cursor:pointer;'/> <img src=\"".DB_DOMAIN."images/language/flag_".$value.".gif\" align='absmiddle'> ".$value."</div>"; 
		}else{

		$value = "<input type='text' disabled value=\"".eMeetingOutput($value)."\" onChange=\"eMeetingEditField(this.value,'".$id."','".$field."');\" style='width:".$NewWidth."; font-size:13px;height:25px;background:none;border: 0;text-align: center;text-transform:capitalize;'>";
	 
		}

		}

	return $value;
}

function DynamicLinkFieldList($LinkID, $Value){

	global $DB;
	$string="";
    $result = $DB->Query("SELECT fvid, fvCaption FROM field_list_value WHERE fvFid ='".$LinkID."'");
	
	while( $data = $DB->NextRow($result) )
    {
		if($Value == $data['fvid']){ $Selected ="selected"; }else{ $Selected =""; }
		$string .= "<option value='".$data['fvid']."' ".$Selected.">".$data['fvCaption']."</option>";
	}

	return $string;
}
function eMeetingTableLangs($default="",$div,$id,$field){

	$string ="<select onChange=\"SaveLang(this.value,'".$div."','".$id."','".$field."')\">";
	
	 $ext = array("php");
	 $files = array();
	 $HandlePath ="../../../inc/langs/";
	 if($handle1 = opendir($HandlePath)) {
	 while(false !== ($file = readdir($handle1))){
	 for($i=0;$i<sizeof($ext);$i++){
	  if(strstr($file, ".".$ext[$i])){
	  $flasg_icon = str_replace(".php","",$file);
		if($default ==$flasg_icon){ $SS="selected";}else{ $SS=""; }
		$string .='<option value="'.$flasg_icon.'" '.$SS.'>'.$flasg_icon.'</option>';
		}
	   }
	 }
	}
	
	$string .='</select>';
	
	return $string;
}


function CheckLicense($license){

	global $DB;

	$installed_host="datingscripts.co.uk";
	$installed_directory="/order"; 
	$query_string="license=".$license;		
	$per_server=false;
	$per_install=false;
	$per_site=true;

	//$pos = strpos($license, "VERSION9-EMEETING");
	//if ($pos === false) {
		//return "The key you have entered is not valid for this product.";
	//}

	if ($per_server)
			{
			$server=get_mac_address();
			$query_string.="&access_host=".@gethostbyaddr(@gethostbyname($server[1]));
			$query_string.="&access_mac=".$server[0];
			}
	else if ($per_install)
			{
			$query_string.="&access_directory=".@substr($_SERVER['PATH_TRANSLATED'], 0, @strrpos($_SERVER['PATH_TRANSLATED'], "/"));
			$query_string.="&access_ip=".$_SERVER['SERVER_ADDR'];
			$query_string.="&access_host=".$_SERVER['HTTP_HOST'];
			}
	else if ($per_site)
			{
			$query_string.="&access_ip=".$_SERVER['SERVER_ADDR'];
			$query_string.="&access_host=".$_SERVER['HTTP_HOST'];
	}
		
	$data=exec_socket($installed_host, $installed_directory, "/validate_internal.php", $query_string);
	$parser=@xml_parser_create('');
	@xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	@xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	@xml_parse_into_struct($parser, $data, $values, $tags);
	@xml_parser_free($parser);

	$returned=$values[0]['attributes'];
 
	if ($returned['status']=="invalid")
		{
			$error="Error: The license key entered is invalid<br>";
		}
	
	if ($returned['status']=="suspended")
		{
			$error="Error: The license key entered has been suspended<br>";
		}
	
	if ($returned['status']=="expired")
		{
			$error="Error: The license key entered has expired<br>";
		}
	
	if ($returned['status']=="pending")
		{
			$error="Error: The license key entered is pending<br>";
		}
	if ($returned['status']=="active")
		{
			$error="ok";
		}		
	if ($returned['status']=="") // OUR SERVER MIGHT BE DOWN
		{
			$error="ok";
		}		
	return $error;
}

function exec_socket($http_host, $http_dir, $http_file, $querystring)
	{
			

	$fp=@fsockopen($http_host, 80, $errno, $errstr, 5);
	if (!$fp) { return false; }
	else
		{
		$header="POST ".($http_dir.$http_file)." HTTP/1.0\r\n";
		$header.="Host: ".$http_host."\r\n";
		$header.="Content-type: application/x-www-form-urlencoded\r\n";
		$header.="User-Agent: PHPAudit v2 (http://www.phpaudit.com)\r\n";
		$header.="Content-length: ".@strlen($querystring)."\r\n";
		$header.="Connection: close\r\n\r\n";
		$header.=$querystring;

		$data=false;
		//die("here5: $error :: $returned");
		//@stream_set_timeout($fp, 20);		
		@fputs($fp, $header);
		
		$status=@socket_get_status($fp);
		while (!@feof($fp)&&$status) 
			{ 
			$data.=@fgets($fp, 1024);
			
			$status=@socket_get_status($fp);
			}
		@fclose ($fp);

		if (!$data) { return false; }
		 
		$data=explode("\r\n\r\n", $data, 2);

		return $data[1];
		}
}

function get_mac_address()
		{
		$fp=popen("/sbin/ifconfig", "r");
	
		if (!$fp) { return -1; } # returns invalid, cannot open ifconfig
	
		$res=@fread($fp, 4096);
		@pclose($fp);
	
		$array=@explode("HWaddr", $res);
		if (count($array)<2) { $array=@explode("ether", $res); } # FreeBSD
		$array=@explode("\n", $array[1]);
		$buffer[]=@trim($array[0]);
	
		$array=@explode("inet addr:", $res);
		if (count($array)<2) { $array=@explode("inet ", $res); } # FreeBSD
		$array=@explode(" ", $array[1]);
		$buffer[]=@trim($array[0]);
	
		return $buffer;
}


function ResetConfig(){

	
	$filename = '../inc/config_db.php';
	if (!$file = @fopen($filename, 'a+b')) {						
			die("<h1>YOUR CONFIG FILE IS NOT WIRTABLE</h1> <P> Please CHMOD your config files to CHMOD 777  (inc/config_db.php) </p> ");						
	} else {
					
			$data = array();
			$counter = 1;
			$filecontent = "";
			while (!feof($file)) {
								
										$data[$counter] = fgets($file);
									
										 if ( strstr($data[$counter], "'KEY_ID','".KEY_ID."'") ) {
										 
												$filecontent .= str_replace("'KEY_ID','".KEY_ID."'", "'KEY_ID',''", $data[$counter]);
										  }
										  elseif ( strstr($data[$counter], "'BRAND_ID','".BRAND_ID."'") ) {
										  
												$filecontent .= str_replace("'BRAND_ID','".BRAND_ID."'", "'BRAND_ID',''", $data[$counter]);
										  }
										  elseif ( strstr($data[$counter], "'MAPS_ID','".MAPS_ID."'" ) ) {
										  
												$filecontent .= str_replace("'MAPS_ID','".MAPS_ID."'", "'MAPS_ID',''", $data[$counter]);
										  }
										  else{
												$filecontent .= $data[$counter];
										  }
										  
										  $counter ++;									  
									}
									fclose($file);
			}
			$handle = fopen($filename, 'w');
			fwrite($handle, $filecontent);
			fclose($handle);	

}

function UpdateLicense($current, $newlicense){
	
	// WRITE THE LICENSE KEY TO THE DATABASE
	$ProductType = explode("_",$newlicense);
	
	
	$filename = '../inc/config_db.php';
	if (!$file = fopen($filename, 'a+b')) {						
			die("THERE IS AN ERROR TRYING TO OPEN YOUR CONFIG FILE. PLEASE CHECK IT EXISTS AND IS WRITABLE. (inc/config_db.php)");						
	} else {
					
			$data = array();
			$counter = 1;
			$filecontent = "";
			while (!feof($file)) {
								
										$data[$counter] = fgets($file);
									
										 if ( strstr($data[$counter], "'KEY_ID',''") ) {
										 
												$filecontent .= str_replace("'KEY_ID',''", "'KEY_ID','".$newlicense."'", $data[$counter]);
										  }
										 
										 
										 // auto matic branding 
										 /*										
										
										  elseif ( strstr($data[$counter], "'BRAND_ID',''") && ( ( $ProductType[1] == "PACK2") || ( $ProductType[1] =="PACK3" ) )  ) {
										  
												$filecontent .= str_replace("'BRAND_ID',''", "'BRAND_ID','".$ProductType[2]."'", $data[$counter]);
										  }
										 
										
										  
										  elseif ( strstr($data[$counter], "'MAPS_ID',''") && ( $ProductType[1] == "PACK3" )  ) {
										  
												$filecontent .= str_replace("'MAPS_ID',''", "'MAPS_ID','".$ProductType[2]."'", $data[$counter]);
										  }*/
										  else{
												$filecontent .= $data[$counter];
										  }
										  
										  $counter ++;									  
									}
									fclose($file);
			}
			$handle = fopen($filename, 'w');
			fwrite($handle, $filecontent);
			fclose($handle);			
}
?>
