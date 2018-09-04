<?
function Dot2LongIP ($IPaddr)
{
    if ($IPaddr == "") {
        return 0;
    } else {
        $ips = split ("\.", "$IPaddr");
        return ($ips[3] + $ips[2] * 256 + $ips[1] * 256 * 256 + $ips[0] * 256 * 256 * 256);
    }
}
function DisplayNS($default="",$type="custom"){

	global $DB;
	$Extra="";

	if($type !=""){
		$Extra ="status='".$type."' AND";
	}

    $result = $DB->Query("SELECT nid, name FROM email_newsletters WHERE $Extra name !='tracking'");

    while( $new = $DB->NextRow($result) )
    {

		if($new['nid'] == $default){
			print "<option value='".$new['nid']."' selected>".$new['name']."</option>";
		}else{
			print "<option value='".$new['nid']."'>".$new['name']."</option>";
		}
		
	}
}

function DisplayPackageCheck($id ='0'){
	if($id ==""){ $id=0; }
	global $DB;

    $result = $DB->Query("SELECT pid, name FROM package WHERE pid !=7");
	$total = 1;

    while( $pack = $DB->NextRow($result) )
    {
		// SHOULD WE CHECK THIS BOX??

	if($id ==$pack['pid']){
		print "<option value='".$pack['pid']."' selected>".$pack['name']." </option>";
	}else{
		print "<option value='".$pack['pid']."'>".$pack['name']." </option>";
	}
		
		

	}
	 
}

?>