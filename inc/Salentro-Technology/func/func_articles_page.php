<?php

defined( 'KEY_ID' ) or die( 'Restricted access' );


function DisplayArticleCats(){

	global $DB;
	
	$Counter =1;
	$DataArray = array();
	
	$result = $DB->query("SELECT * FROM articles_cat ");

	while( $com = $DB->NextRow($result) ){
	
			$DataArray[$Counter]['name'] 	= $com['name'];
			$DataArray[$Counter]['count'] 	= $com['count'];
			$DataArray[$Counter]['id'] 	= $com['id'];

				# make cat link
				$MODdata1['page'] ='articles';  
				$MODdata1['type'] ='system';
				$MODdata1['id1'] = 0;
				$MODdata1['id2'] = $com['id'];
				$MODdata1['name'] = $com['name'];					 
				$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata1);

			$Counter++;
			
	}
		
	return $DataArray;
}


function DisplayArticles($catid=0){

	global $DB;
	
	$Counter =1;	$DataArray = array(); $MODdata['page'] ='articles';  $MODdata['type'] ='system';
	
	if(is_numeric($catid) && $catid !=0){
	
		$extraString=" AND articles.cat_id = ( '".$catid."' ) ";
	
	}else{
	
		$extraString=" ORDER BY articles.id DESC"; // LIMIT 10 
	
	}
	
	$result = $DB->query("SELECT *, articles_cat.id AS cat_link_id, articles.id AS artid FROM articles, articles_cat WHERE articles.cat_id = articles_cat.id $extraString");
	while( $com = $DB->NextRow($result) ){
	
			$DataArray[$Counter]['date'] 		= dates_interconv($com['date']);
			$DataArray[$Counter]['title'] 		= $com['title'];
			$DataArray[$Counter]['content'] 	= $com['content'];
			$DataArray[$Counter]['views'] 		= $com['views'];
			$DataArray[$Counter]['short'] 		= $com['short'];
			$DataArray[$Counter]['cat'] 		= $com['name'];
			if($com['link'] ==""){

					# make link
					$MODdata['sub'] ='view';
					$MODdata['id1'] = $com['artid'];
					$com['title'] = str_replace("?","",$com['title']);
					$com['title'] = str_replace(":","",$com['title']);
					$com['title'] = str_replace("'","",$com['title']);
					$MODdata['name'] = $com['title'];
					$DataArray[$Counter]['link'] = MakeLinkMOD($MODdata);

			$DataArray[$Counter]['dontshow'] = true;
			}else{
			$DataArray[$Counter]['link'] = $com['link'];
			$DataArray[$Counter]['dontshow'] = false;
			}

				# make cat link
				$MODdata1['page'] ='articles';  
				$MODdata1['type'] ='system';
				$MODdata1['id2'] = $com['cat_link_id'];
				$MODdata1['name'] = $com['name'];					 
				$DataArray[$Counter]['cat_link'] = MakeLinkMOD($MODdata1);
	 
			$Counter++;
			
	}
		
	return $DataArray;
}

function GetArticleData($id){

	global $DB;
	
	$DB->Update("UPDATE articles SET views=views+1 WHERE articles.id=( ".$id." ) limit 1");
	
    $result = $DB->Row("SELECT *, articles_cat.id AS cat_link_id, articles.id AS artid FROM articles, articles_cat WHERE articles.cat_id = articles_cat.id AND articles.id=( ".$id." ) limit 1");
	
	$result['title'] 	= eMeetingOutput($result['title']);
	$result['content'] 	= eMeetingOutput($result['content'],true);
	$result['date'] 		= dates_interconv($result['date']);
	$result['id'] 		= $result['artid'];

	$result['content'] = preg_replace( '(' .chr(ord("“")). ')', "\"", $result['content'] );        # “
	$result['content'] = preg_replace( '(' .chr(ord("”")). ')', "\"", $result['content'] );        # ”
	$result['content'] = preg_replace( '(' .chr(ord("`")). ')', "'", $result['content'] );        # `
	$result['content'] = preg_replace( '(' .chr(ord("´")). ')', "'", $result['content'] );        # ´
	$result['content'] = preg_replace( '(' .chr(ord("„")). ')', ",", $result['content'] );        # „
	$result['content'] = preg_replace( '(' .chr(ord("`")). ')', "'", $result['content'] );        # `
	$result['content'] = preg_replace( '(' .chr(ord("´")). ')', "'", $result['content'] );        # ´
	$result['content'] = preg_replace( '(' .chr(ord("´")). ')', "'", $result['content'] );        # ´
	$result['content'] = preg_replace( '(' .chr(ord("’")). ')', "'", $result['content'] );        # ´
	$result['content'] = preg_replace( '(' .chr(149). ')', "&#8226;", $result['content'] );    # bullet •
	$result['content'] = preg_replace( '(' .chr(150). ')', "&ndash;", $result['content'] );    # en dash
	$result['content'] = preg_replace( '(' .chr(151). ')', "&mdash;", $result['content'] );    # em dash
	$result['content'] = preg_replace( '(' .chr(153). ')', "&#8482;", $result['content'] );    # trademark
	$result['content'] = preg_replace( '(' .chr(169). ')', "&copy;", $result['content'] );    # copyright mark
	$result['content'] = preg_replace( '(' .chr(174). ')', "&reg;", $result['content'] );        # registration mark


	return $result;
}
?>