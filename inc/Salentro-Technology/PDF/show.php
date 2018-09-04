<?php
$page_array = array('groups','classads','calendar');

if(in_array($_GET['page'],$page_array) && is_numeric($_GET['id'])){

	$subd = "../../../";
	require_once $subd."inc/config.php";

	require_once $subd."inc/API/api_functions.php";

	require_once ('class.ezpdf.php');
	$pdf =& new Cezpdf();
	$pdf->selectFont('fonts/Helvetica.afm');
	## NOW LETS GET THE DETAILS FROM THE DATABASE ABOUT THIS ADVERT.

	switch($_GET['page']){

		case "groups": { 
		
				$data = $DB->Row("SELECT groups.name, groups.description, members.username, members.id FROM `groups`
				LEFT JOIN members ON ( members.id = groups.uid )
				WHERE groups.id= ( '".$_GET['id']."' ) LIMIT 1");

				$pdf->ezText(eMeetingOutput($data['name'])."\n",30,array('justification'=>'centre'));
				$pdf->ezText(eMeetingOutput($data['description'])."\n",20,array('justification'=>'centre'));
				$pdf->ezText("Author: ".$data['username']." \n<c:alink:".DB_DOMAIN."index.php?dll=profile&pId=".$data['uid'].">Visit Profile</c:alink>",18,array('justification'=>'centre'));
				$pdf->ezText("\n<c:alink:http://localhost/DATING/index.php?dll=groups&sub=show&item_id=".$_GET['id'].">Visit Webpage</c:alink>\n\n".date('l jS \of F Y'),18,array('justification'=>'centre'));

		} break;
		
		case "classads": { 

			$data = $DB->Row("SELECT class_adverts.title, class_adverts.sub_title, class_adverts.comments, members.username, members.id FROM `class_adverts`
			LEFT JOIN members ON ( members.id = class_adverts.uid )  
			WHERE class_adverts.id= ( '".$_GET['id']."' ) LIMIT 1");

				$pdf->ezText(eMeetingOutput($data['title'])."\n",30,array('justification'=>'centre'));
				$pdf->ezText(eMeetingOutput($data['sub_title'])."\n",20,array('justification'=>'centre'));
				$pdf->ezText(eMeetingOutput($data['comments'])."\n",18,array('justification'=>'centre'));
				$pdf->ezText("Author: ".$data['username']." \n<c:alink:".DB_DOMAIN."index.php?dll=profile&pId=".$data['uid'].">Visit Profile</c:alink>",18,array('justification'=>'centre'));
				$pdf->ezText("\n<c:alink:index.php?dll=classads&sub=view&item_id=".$_GET['id'].">Visit Webpage</c:alink>\n\n".date('l jS \of F Y'),18,array('justification'=>'centre'));

		} break;
		
		case "calendar": { 

			$data = $DB->Row("SELECT calendar_data.*, members.username, members.id FROM `calendar_data` 
			LEFT JOIN members ON ( members.id = calendar_data.uid ) 
			WHERE calendar_data.id= ( '".$_GET['id']."' ) LIMIT 1");



$order   = array('\r\n', '\n', '\r');
$replace = '';
$data['longevent'] = str_replace($order, $replace, $data['longevent']);

$data['longevent'] = striphtml($data['longevent']);
$data['country'] = MakeCountry($data['country']);


				$pdf->ezText(eMeetingOutput($data['shortevent'])."\n",30,array('justification'=>'centre'));
				$pdf->ezText($data['longevent']."\n",20,array('justification'=>'centre'));

				if($data['eventdate'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_date']." ".$data['eventdate'] ."\n",20,array('justification'=>'centre'));  }
				if($data['eventtime'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_time']." ".$data['eventtime'] ."\n",20,array('justification'=>'centre'));  }
				if($data['country'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_country']." ".$data['country'] ."\n",20,array('justification'=>'centre'));  }
				if($data['province'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_province']." ".$data['province'] ."\n",20,array('justification'=>'centre'));  }
				if($data['street'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_street']." ".$data['street'] ."\n",20,array('justification'=>'centre'));  }
				if($data['city'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_city']." ".$data['city'] ."\n",20,array('justification'=>'centre'));  }
				if($data['phone'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_phone']." ".$data['phone'] ."\n",20,array('justification'=>'centre'));  }
				if($data['email'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_email']." ".$data['email'] ."\n",20,array('justification'=>'centre'));  }
				if($data['website'] !=""){ $pdf->ezText("".$GLOBALS['_LANG']['_website']." ".$data['website'] ."\n",20,array('justification'=>'centre'));  }

				$pdf->ezText("Author: ".$data['username']." \n<c:alink:".DB_DOMAIN."index.php?dll=profile&pId=".$data['uid'].">Visit Profile</c:alink>",18,array('justification'=>'centre'));
				$pdf->ezText("\n<c:alink:".DB_DOMAIN."index.php?dll=calendar&sub=view&item_id=".$_GET['id'].">Visit Webpage</c:alink>\n\n".date('l jS \of F Y'),18,array('justification'=>'centre'));


		} break;

	}

	$pdf->ezSetDy(-100);
	$pdf->ezStream();

}
?>