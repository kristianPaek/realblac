<?php 

function GetFAQ(){

	global $DB;
	$faq_array = array();
	$cc=1;
    $result = $DB->Query("SELECT id, orderid, subject, content FROM faq ORDER BY orderid ASC");
   
    while( $faq = $DB->NextRow($result) )
    {
		
		$faq_array[$cc]['subject'] 	= $faq['subject'];
		$faq_array[$cc]['id'] 		= $faq['id'];
		$faq_array[$cc]['content'] 	= $faq['content'];
		$cc++;
	}
	return $faq_array;
}

function GetFAQLinks(){

	global $DB;
	$faq_array = array();
	$cc=1;
    $result = $DB->Query("SELECT id, subject FROM faq ORDER BY orderid ASC");
	
    while( $faq = $DB->NextRow($result) )
    {
		$faq_array[$cc]['subject'] 	= $faq['subject'];
		$faq_array[$cc]['id'] 		= $faq['id'];
		$cc++;
	}
	
	return $faq_array;

}
?>