<?php 
function GetPages(){

	global $DB;
	$RunningCount =1;
	$PageArray = array();
	
    $result = $DB->Query("SELECT name FROM template_pages");
    while( $page = $DB->NextRow($result) )
    {

		array_push($PageArray, $page['name']);	
	}
	return $PageArray;
}
function GetPageContent($page){

	global $DB;
	
    $result = $DB->Row("SELECT content FROM template_pages WHERE name='".$page."' LIMIT 1");

	$content = '<div class="Details">';
	$content .= $result['content'];
	$content .= '</div>';
	return $content;
}
?>