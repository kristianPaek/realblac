<?

function ChangeDo($DoCall, $values = false){

/*
	$values ARE THE POST DATA VALUES
	$_POST['name'] would now be called $values['name']
*/
		switch($DoCall){
		
			case "send": {
					
				//print_r($values);
					
				return "Nice one, you submitted a form**1";						

			
			} break;
			
		}
	
	
	return "error_invalid_call";	
}

?>