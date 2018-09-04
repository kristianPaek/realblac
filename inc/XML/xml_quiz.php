<?
if(isset($_GET['item_id']) && is_numeric($_GET['item_id']) && isset($_GET['item2_id']) && is_numeric($_GET['item2_id'])){
	require_once "../config.php";
	require_once "../API/api_functions.php";
 
	$dd = displayQuizQuestions($item_id,$item2_id); 
	
	header("Content-type: text/xml"); 
	print '<?xml version="1.0" encoding="utf-8"?><climber> ';

	if(!empty($dd)){foreach($dd as $value){	

		switch($value['answer']){
		
			case "1":{ $Answer="A"; }break;
			case "2":{ $Answer="B"; }break;
			case "3":{ $Answer="C"; }break;
			case "4":{ $Answer="D"; }break;
		
		}
		print '
			<question style="multi" correct="'.$Answer.'">
				<ask><![CDATA['.htmlspecialchars($value['title']).']]></ask>
				<answer><![CDATA[Sorry you were wrong!.]]></answer>	
				<choices>
					<A>'.htmlspecialchars($value['q1']).'</A>
					<B>'.htmlspecialchars($value['q2']).'</B>
					<C>'.htmlspecialchars($value['q3']).'</C>
					<D>'.htmlspecialchars($value['q4']).'</D>
				</choices>		
			</question> 
		';
	
	}}
print '</climber>';
 } ?>