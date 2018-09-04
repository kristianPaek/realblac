<?
// eMeeting RSS FEED
require_once ( 'config.php' );
$extraString="";

// switch rss type
if(isset($_GET['type'])){$_GET['type']=1;}

switch($type){

	case "50": { 
	
	} break;

	default: { // TOP 10 ARTICLES
	
		if(isset($sub_page) && is_numeric($sub_page) ){
			$extraString=" AND articles.cat_id = ( '".$sub_page."' ) ";
		}
		
		$SQL = "SELECT articles.title AS title, articles.id AS ID, articles.content  AS content 
		FROM articles, articles_cat 
		WHERE articles.cat_id = articles_cat.id ".$extraString." ORDER BY articles.id DESC limit 10";
		$MODdata1['page'] ='articles';  
		$MODdata1['sub'] ='view';
		$MODdata1['type'] ='system';
	
	};
}





	/***************************************************************************
	 * 
	 *						DO NOT MODIFY THIS FILE
	 *
	 ***************************************************************************/
 
		
if(isset($SQL)){

	$result = $DB->Query($SQL); 
 
	while( $line = $DB->NextRow($result) ){

		$data[] = $line;
	}

}else{

	exit('RSS feed unreachable!');

}
 
$now = date("D, d M Y H:i:s T");

$output = "<?xml version=\"1.0\"?>
            <rss version=\"2.0\">
                <channel>
                    <title>RSS Feed</title>
                    <link>".DB_DOMAIN."inc/rss.php</link>
                    <description>Our RSS feed for the latest website news</description>
                    <language>en-us</language>
                    <pubDate>".$now."</pubDate>
                    <lastBuildDate>".$now."</lastBuildDate>
                    <docs></docs>
                    <managingEditor>".ADMIN_EMAIL."</managingEditor>
                    <webMaster>".ADMIN_EMAIL."</webMaster>
            ";

if(!empty($data)){ 
           
	foreach ($data as $line)
	{

		# make link
				
		$MODdata1['id1'] 	= $line['ID'];
		$MODdata1['id2'] 	= $line['ID2'];
		$MODdata1['name'] 	= $line['title'];	
		$Link = MakeLinkMOD($MODdata1);
 
		$output .= "<item>
					<title>".htmlentities($line['title'])."</title>
					<link>".htmlentities(DB_DOMAIN.$Link)."</link>                    
					<description>".htmlentities(substr(eMeetingOutput($line['content']),0,350))."..</description>
					</item>";
	}

}
$output .= "</channel></rss>";
//header("Content-Type: application/rss+xml");
echo $output;
?>