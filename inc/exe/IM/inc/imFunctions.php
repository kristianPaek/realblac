<?



	 /**

	 * Info: eMeeting Input and Output checking

	 * 		

	 * @version  8.0

	 * @created  Fri Jan 18 10:48:31 EEST 2008

	 * @updated  Fri Jan 18 10:48:31 EEST 2008

	 */



	function eMeetingIMOutput($output, $forceInt = false) 

	{

	

		 if (is_numeric($output)) 

		  { 

			  return $output; 

		  }	

		

		if($forceInt){



			return stripslashes($output); 



		}else{



			//return htmlentities(stripslashes($output)); 

			return @stripslashes($output);



		}			

	

	}


function MakeEffect($message){



	$ring_bell=1;



	$pos1 = strpos($message, "*yehaw*");

	if ($pos1 !== false) {		

		$ring_bell = "yehaw";

	}



	$pos2 = strpos($message, "*boo*");

	if ($pos2 !== false) {		

		$ring_bell = "boo";		

	}



	$pos3 = strpos($message, "*giggle*");

	if ($pos3 !== false) {

		

		$ring_bell = "giggle";

	}



	$pos4 = strpos($message, "*sneeze*");

	if ($pos4 !== false) {

		$ring_bell = "sneeze";

	}



	$pos5 = strpos($message, "*snore*");

	if ($pos5 !== false) {		

		$ring_bell = "snore";

	}



return $ring_bell;

}



function StripMessage($message){





	$message  = str_replace("<p>","",$message);

	$message  = str_replace("</p>","",$message);

	$message  = str_replace("<br/>","",$message);
	$message  = str_replace("<br>","",$message);
	$message  = str_replace("<br />","",$message);

	$message  = str_replace("&lt;br /&gt;","",$message);

	$message  = eMeetingIMOutput($message);

	return $message;

}



function MakeAge($birthday){



        $birth = explode("-", $birthday);

		switch($birth[1]){

			case "JAN": { $MM = "01"; } break;

			case "FEB": { $MM = "02"; } break;

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





	$day =$birth[2];

	$month =$MM;

	$year =$birth[0];



	$year_diff  = date("Y") - $year;   

    $month_diff = date("m") - $month;   

    $day_diff   = date("d") - $day;   

    

	if ($month_diff < 0) $year_diff--;   

        elseif (($month_diff==0) && ($day_diff < 0))$year_diff--;

        elseif (($month_diff==0) && ($day_diff >= 0))$year_diff++;

        return $year_diff; 



}

?>