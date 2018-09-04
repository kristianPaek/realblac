<?php
/***************************************************************************
 *
 *	 PROJECT: eMeeting Dating Software
 *	 VERSION: 6
 *	 LISENSE: OWN / LEASED (http://www.datingscripts.co.uk/license.php)
 *
 *	 This program is a commercial software product and any kind of usage
 *	 means agreement to the eMeeting software License Agreement.
 *
 *	 This notice MUST NOT be removed from the code.   
 *
 *   Copyright 2006-2007 eMeeting Ltd.
 *   http://www.datingscripts.co.uk/
 *
 ***************************************************************************
 * 
 *						DO NOT MODIFY THIS FILE
 *
 ***************************************************************************/

/***********************************/
/*********** VALIDATION ************/

function ValEmail($email){

if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) 
	{
		return false;
	}else{
	
		return true;
	}
}

/***********************************/
/*********** CURL SETUP ************/


function cURL_GO($url,$post="",$follow=1,$debugmode=0){

	global $curlstatus,$cookiepath, $system;
	
	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

   	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_COOKIEJAR,$cookiepath);
	curl_setopt($ch,CURLOPT_COOKIEFILE,$cookiepath);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	curl_setopt($ch,CURLOPT_HEADER,0);
	@curl_setopt($ch,CURLOPT_FOLLOWLOCATION,$follow);
	if($post){curl_setopt($ch, CURLOPT_POST,1); curl_setopt($ch,CURLOPT_POSTFIELDS,$post);}
	
	$returned=curl_exec($ch);
	$curlstatus=curl_getinfo($ch);
	curl_close($ch);
	
	return $returned;

 }
 
/***********************************/
/*********** STRIP DATA************/

function SortHidden($getinputs){
	$ac=null;
	foreach($getinputs as $eachinput){
		$ac.="&".urlencode(html_entity_decode(@$eachinput[1]))."=".urlencode(html_entity_decode(@$eachinput[2]));
	}
	return $ac;
}

function GetHiddenData($html){
	preg_match_all('|<input[^>]+type="hidden"[^>]+name\="([^"]+)"[^>]+value\="([^"]*)"[^>]*>|',$html,$getinputs,PREG_SET_ORDER);
	return $getinputs;
}

function isexist($ary,$dt){
	foreach($ary as $scont){
		if(@$scont[1]==$dt){return true;}
	}
	return false;
}

/*******************************************************************************/
/*********************** DO NOT EDIT BELOW *************************************/

function eMeeting_Contacts($UserEmail,$UserPassword,$UserSystem, $CookieSPath){

	global $curlstatus, $Temail, $cookiepath;
	$CookieSPath = str_replace("/images", "", PATH_IMAGE);

	$ct=0;

	while(file_exists($CookieSPath."emeeting".$ct.".xgc")===true){$ct++;}
	$cookiepath = $CookieSPath."emeeting".$ct.".xgc";
	@fopen($CookieSPath."emeeting".$ct.".xgc", "w");

	$UserEmailtmp=$UserEmail;
 
	// GET THE DOOMAIN NAME FROM EMAIL
	preg_match('/.*\@([^\@]*)/',$UserEmail,$Fdomain);
	$Fdomain=strtolower(trim(@$Fdomain[1]));

	if(isset($DoExtra)){$UserSystem="hotmail"; }
	
		switch($UserSystem){
		
			case "gmail": {
			
				$FST=cURL_GO("http://mail.google.com/mail/",0,1,0);
			
			} break;
	
			case "yahoo": {
			
				$FST=cURL_GO("https://login.yahoo.com/config/login?","login=".$UserEmail."&passwd=".$UserPassword."&.done=http%3a//mail.yahoo.com",1,0);
				$FST=cURL_GO("https://login.yahoo.com/config/verify?.done=http%3a//mail.yahoo.com",0,1,0);
				$FST=cURL_GO("http://address.yahoo.com/yab/us?A=B",0,1,0);
			
			} break;

			case "hotmail": {
			
				$FST=cURL_GO("http://login.live.com/login.srf?id=2&svc=mail&cbid=24325&msppjph=1&tw=0&fs=1&fsa=1&fsat=1296000&lc=1033","PPStateXfer=1",1,0);			

			} break;	
			
			case "aol": {
			
				$FST=cURL_GO("https://my.screenname.aol.com/_cqr/login/login.psp?mcState=initialized&uitype=mini&sitedomain=registration.aol.com&
				authLev=1&seamless=novl&lang=en&locale=us",0,1,0);
			
			} break;	
		}
		
	
		// SWITCH SYSTEM
		switch($UserSystem){
	
			case "gmail": {
			
				$inputs=GetHiddenData($FST);
				
				preg_match('/<form[^>]+action\="([^"]*)"[^>]*>/',$FST,$getlink);
			
				$FST=cURL_GO($getlink[1],"Email=".urlencode($UserEmail)."&Passwd=".urlencode($UserPassword).SortHidden($inputs),1,0);
			
				/*Get Javascript Redirection Link !optional -not used*/
				preg_match('/url=\'([^\']*)\'/',$FST,$getlink);				
				
				if(!isset($dsfsdf)){			
				//if(!strncmp(@$curlstatus['url'],"https://www.google.com/accounts/CheckCookie?",44)){	

						$FST=cURL_GO("http://mail.google.com/mail/h/",0,1,0);
						$FST=cURL_GO("http://mail.google.com/mail/?view=sec",0,1,0);
				
						preg_match('/<input[^>]+type=hidden[^>]+name\=at[^>]+value\="([^"]*)"[^>]*>/',$FST,$at);
						
						if(!@$at){preg_match('/<input[^>]+type="hidden"[^>]+name\="at"[^>]+value\="([^"]*)"[^>]*>/',$FST,$at);}
						$FST=cURL_GO("http://mail.google.com/mail/?view=fec","ac=".urlencode("Export Contacts")."&ecf=o&at=".urlencode(@$at[1])."&view=fec",1,0);

						/*Match new lines*/
						preg_match_all('|([^\n]*)\n|',$FST,$records,PREG_SET_ORDER);
				
						$tmp=array(); $newfields=array();
						
						foreach($records as $record){
				
						$currentrecord=count($newfields);
						$newfields[$currentrecord]=array();
				
						$stat=0; $i=0; $storetmp=null; $skip=0;
				
								while($i<=strlen($record[1])){
				
									if($skip==0){
											
											if(substr($record[1],$i,1)=="\""&&substr($record[1],$i,2)!="\"\""){
											if($stat==1){$stat=0;}else{$stat=1;}
									}elseif(substr($record[1],$i,1)=="\""&&substr($record[1],$i,2)=="\"\""){
									
										$skip=1;
									
									}else{
									
										$skip=0;
									}
				
									if($stat==0&&(substr($record[1],$i,1)==","||substr($record[1],$i,1)=="")){
									
										$storetmp=trim($storetmp);
										
										if(substr($storetmp,0,1)=="\""&&substr($storetmp,strlen($storetmp)-1,1)=="\""){
										
											$storetmp=substr($storetmp,1,strlen($storetmp)-2); //strip the limit quotes off
										}
				
										array_push($newfields[$currentrecord],$storetmp); 
										$storetmp=null;
				
									}else{$storetmp.=substr($record[1],$i,1);}
				
								}else{
									$skip=0;
								}
				
							$i++;
							}
					}				
							////////////////////////////////////////////////////////
							////////////////////////////////////////////////////////
							
							$getary=array("Name","E-mail Address");
							$returnary=array();
							
							$i=0;
							
							while($i<count($newfields[0])){
							
								$ib=0;
								while($ib<count($getary)){
								if($newfields[0][$i]==$getary[$ib]){$returnary[$ib]=$i;}
								$ib++;
								}
							
								$i++;
							}
							
								/*Cancel out the first line (CSV Header)*/
								array_shift($newfields);
								
								$tmp=array();
								foreach($newfields as $contact){
								
									$email=@$contact[@$returnary[1]];
								
									$getname=@$contact[@$returnary[0]];
								
									$contact=array($getname,$email);
								
									/*Filter out blank email and invalid email address !important*/
									if(@$contact[1]&&ValEmail(@$contact[1])){array_push($tmp,$contact);}}
									$contactemails=$tmp;
								
								unlinkcookie();

				}else{
					
					// NOT SURE WHAT THIS IS, SO LETS STOP
					unlinkcookie();
					$contactemails = false;
				}
				
							
			} break;
			
			case "yahoo": {
				
				if(!strncmp(@$curlstatus['url'],"http://address.yahoo.com/yab/us?",32)){
				
						$inputs=GetHiddenData($FST);
						$FST=cURL_GO("http://address.yahoo.com/index.php","submit[action_export_yahoo]=Export+Now".SortHidden($inputs),1,0);
						preg_match_all('|"([^"]*)","([^"]*)","([^"]*)","([^"]*)","([^"]*)","[^"]*","[^"]*","([^"]*)"[^\n]*\n|',$FST,$contactemails,PREG_SET_ORDER);
						array_shift($contactemails);
						
						
						
						$tmp=array();
						foreach($contactemails as $contact){
						
								$getnamea=@$contact[1];
								$getnameb=@$contact[2];
								$getnamec=@$contact[3];
								
								$getemaila=@$contact[6];
								$getemailb=@$contact[5];
								
								$getname=@$contact[4];
								
								if($getnamec||$getnamea||$getnameb){
									$getname=null;
									if($getnamec){$getname.=$getnamec;}
									if($getnamea){if($getname==null){$getname.=$getnamea;}else{$getname.=", ".$getnamea;}}
									if($getnameb){if($getname==null){$getname.=$getnameb;}else{$getname.=", ".$getnameb;}}
								}
								$email=null;
								if($getemaila && isset($getdomain)){$email=$getemaila."@".$getdomain;}
								if($getemailb){$email=$getemailb;}
								
								$contact=array($getname,$email);
								
								/*Filter out blank email and invalid email address !important*/
								if(@$contact[1]&&ValEmail(@$contact[1])){array_push($tmp,$contact);}
						}
						
						$contactemails=$tmp;
						unlinkcookie();

				}else{
								
					// NOT SURE WHAT THIS IS, SO LETS STOP
					unlinkcookie();
					$contactemails = false;
				}
					
			} break;

			case "hotmail": {
			
				$inputs=GetHiddenData($FST);
				
				$mailmode=0;
				/*Get Form POST action page*/
				preg_match('/<form[^>]+action\="([^"]*)"[^>]*>/',$FST,$getlink);
							
				
				$FST=cURL_GO(@$getlink[1],"login=".urldecode($UserEmail)."&passwd=".urldecode($UserPassword)."&LoginOptions=2".SortHidden($inputs),1,0);
				preg_match('/window\.location\.replace\("([^"]*)"\)\;/',$FST,$getlink);
				
					 
				if(@$getlink[1]){
					$FST=cURL_GO(@$getlink[1],0,1,0);
					preg_match('/^(http:\/\/by[^\.]*fd\.bay[^\.]*\.hotmail\.msn\.com\/)cgi\-bin\/dasp\/ua\_info\.asp\?/',$curlstatus['url'],$checklink);
					preg_match ('/^https:\/\/login\.live\.com\/login\.srf\?[^&]*&ru=(http:\/\/by[^\.]*w\.bay[^\.]*\.mail\.live\.com\/)mail\/mail\.aspx?/',urldecode($curlstatus['url']),$checklinklive);
					if(@$checklinklive[1]){$mailmode=1;}
					if(@$checklink[1]){$mailmode=2;}
				}
 
				// NOW WE ARE LOGGED INTO MSN, LETS GET THE DETAILS FROM THE RIGHT PAGE //
				//////////////////////////////////////////////////////////////////////////
				if($mailmode==1 || $mailmode==0 ){
				
				// MSN LIVE VERSION //
				/////////////////////
				
				if($mailmode==1){
					$FST=cURL_GO(@$checklinklive[1]."mail/GetContacts.aspx","",1,0);
				}else{
					$FST=cURL_GO("http://by129w.bay129.mail.live.com/mail/GetContacts.aspx","",1,0);
				}
				
				// CHECK THAT THE OBJECT HASNT MOVED
				$pos = strpos($FST, 'Object moved');
				if ($pos === false) {
					
				} else {
				
					$dd = explode('<h2>Object moved to <a href="',$FST);
					$dd1 = explode('"',$dd[1]);
					$FST=cURL_GO($dd1[0],"",1,0);
				
				}				
			
						/*Match new lines*/
						preg_match_all('|([^\n]*)\n|',$FST,$records,PREG_SET_ORDER);
						
						$tmp=array(); $newfields=array();
						foreach($records as $record){
						
								$currentrecord=count($newfields);
								$newfields[$currentrecord]=array();
								
								$stat=0; $i=0; $storetmp=null; $skip=0;
								while($i<=strlen($record[1])){
								
									if($skip==0){
									
										if(substr($record[1],$i,1)=="\""&&substr($record[1],$i,2)!="\"\""){
											if($stat==1){$stat=0;}else{$stat=1;}
										}
										if(substr($record[1],$i,1)=="\""&&substr($record[1],$i,2)=="\"\""){$skip=1;}else{$skip=0;}
										
										if($stat==0&&(substr($record[1],$i,1)==","||substr($record[1],$i,1)==";"||substr($record[1],$i,1)=="")){
											
												$storetmp=trim($storetmp);
												if(substr($storetmp,0,1)=="\""&&substr($storetmp,strlen($storetmp)-1,1)=="\""){
													$storetmp=substr($storetmp,1,strlen($storetmp)-2); //strip the limit quotes off
												}									
												array_push($newfields[$currentrecord],$storetmp); $storetmp=null;
									
										}else{
											$storetmp.=substr($record[1],$i,1);
										}
									
									}else{$skip=0;}
									
									$i++;
								}
					
						}
						//end foreach
						
						$getary=array("Title","First Name","Middle Name","Last Name","E-mail Address");
						$returnary=array();
						
						$i=0;
						while($i<count($newfields[0])){
						
						$ib=0;
						while($ib<count($getary)){
						if($newfields[0][$i]==$getary[$ib]){$returnary[$ib]=$i;}
						$ib++;
						}
						
						$i++;
						}
						
						/*Cancel out the first line (CSV Header)*/
						array_shift($newfields);
						
						$tmp=array();
						foreach($newfields as $contact){
						
						$getnamea=@$contact[@$returnary[1]];
						$getnameb=@$contact[@$returnary[2]];
						$getnamec=@$contact[@$returnary[3]];
						
						$email=@$contact[@$returnary[4]];
						
						$getname=@$contact[@$returnary[0]];
						
						if($getnamec||$getnamea||$getnameb){
						$getname=null;
						if($getnamec){$getname.=$getnamec;}
						if($getnamea){if($getname==null){$getname.=$getnamea;}else{$getname.=", ".$getnamea;}}
						if($getnameb){if($getname==null){$getname.=$getnameb;}else{$getname.=", ".$getnameb;}}
						}
						
						$contact=array($getname,$email);
						
						/*Filter out blank email and invalid email address !important*/
						if(@$contact[1]&&ValEmail(@$contact[1])){array_push($tmp,$contact);}}
						$contactemails=$tmp;
						
						unlinkcookie();
			
				
				
				}elseif($mailmode==2){
					
					// MSN ORIGINAL //
					//////////////////
					
					preg_match('/_UM="([^"]*)"/',$FST,$getum);
					
					$FST=cURL_GO(@$checklink[1]."cgi-bin/AddressPicker?Context=InsertAddress&_HMaction=Edit&qF=to&".@$getum[1],0,1,0);
					
					preg_match_all('|<option[^><]+value="([^"]*)"[^><]*>([^><]*)\s&lt;[^><]*&gt;<\/option>|',$FST,$contactemails,PREG_SET_ORDER);
					
					/*Cancel out the first array value and Filter*/
					$tmp=array();
					foreach($contactemails as $contact){
					
						array_shift($contact);
						
						/*Decode HTML Entities*/
						$contact[0]=html_entity_decode($contact[0]);
						$contact[1]=html_entity_decode($contact[1]);
						
						/*Swap Position*/
						$contact=array(@$contact[1],@$contact[0]);
						
						/*Filter out blank email and invalid email address !important*/
						if(@$contact[1]&&ValEmail(@$contact[1])&&!isexist($tmp,@$contact[1])){array_push($tmp,$contact);}}
						$contactemails=$tmp;
						
						unlinkcookie();											
				}else{
				
					// NOT SURE WHAT THIS IS, SO LETS STOP
					unlinkcookie();
					$contactemails = false;
				}
			
			} break;
			
			case "aol": {
				
				$inputs=GetHiddenData($FST);
			
				preg_match('/<form[^>]+action\="([^"]*)"[^>]*>/',$FST,$getlink);			
				
				$FST=cURL_GO("https://my.screenname.aol.com".@$getlink[1],"loginId=".urlencode($UserEmail)."&password=".urlencode($UserPassword).SortHidden($inputs),1,0);
				
				preg_match('/&mcAuth=([^\'&]*)[&|\']/',$FST,$getmcauth);
			
				$FST=cURL_GO("http://registration.aol.com/_cqr/login?sitedomain=registration.aol.com&authLev=1&siteState=OrigUrl%3Dhttp%253a%252f%252fregistration%252eaol%252ecom%252fmail%253fs%255furl%253dhttp%25253a%25252f%25252fwebmail%25252eaol%25252ecom%25252f%25255fcqr%25252fLoginSuccess%25252easpx%25253fsitedomain%25253dsns%25252ewebmail%25252eaol%25252ecom%252526siteState%25253dver%2525253a1%252525252c0%25252526ld%2525253awebmail%25252eaol%25252ecom%25252526pv%2525253aAOL%25252526lc%2525253aen%25252dus%25252526ud%2525253aaol%25252ecom&lang=en&locale=us&uitype=mini&mcAuth=".@$getmcauth[1],0,1,0,1);
				
				preg_match('/var gSuccessPath = "\/([^\/"]*)\/[^"]*"/',$FST,$getversion);
								
				preg_match('/&uid:([^&;]*)[&|\;]/',$FST,$getuid);
				
				//$getuid[1]="zZwxq7HEUx";
				//die(print_r($getuid)."<--".print_r($inputs));
				if(@$getuid[1]){

					$FST=cURL_GO("http://d02.webmail.aol.com/".@$getversion[1]."/aim/en-us/Suite.aspx",0,1,0);
					
					$FST=cURL_GO("http://d03.webmail.aol.com/".@$getversion[1]."/aim/en-us/AB/addresslist-print.aspx?command=all&undefined&sort=LastFirstNick&sortDir=Descending&nameFormat=FirstLastNick&version=".@$getversion[1]."&user=".urlencode(@$getuid[1]),0,1,0);
					
					
					/*Get the Mapping of the contact table cells*/
					$fpos=strpos($FST,"<tr><td colspan=\"4\"><span class=\"fullName\">");
					$spos=strrpos($FST,"<tr><td colspan=\"4\"><hr class=\"contactSeparator\"></td></tr>");
					
					/*Focus on the important area*/
					$FST=substr($FST,$fpos,$spos-$fpos+59);
					
					$contactemails=explode("<tr><td colspan=\"4\"><hr class=\"contactSeparator\"></td></tr>",$FST);
					
					$tmp=array();
					
					foreach($contactemails as $contact){
					
						preg_match('/<span class="fullName">([^<>]*)\s<i>([^<>]*)<\/i><\/span>/',$contact,$getname);
						$getname=html_entity_decode(@$getname[1]." ".@$getname[2]);
						
						preg_match('/<span>Screen Name:<\/span> <span>([^<>]*)<\/span>/',$contact,$getsname);
						$getsname=html_entity_decode(@$getsname[1]);
						
						preg_match('/<span>Email 1:<\/span> <span>([^<>]*)<\/span>/',$contact,$getemaila);
						$getemaila=html_entity_decode(@$getemaila[1]);
						
						preg_match('/<span>Email 2:<\/span> <span>([^<>]*)<\/span>/',$contact,$getemailb);
						$getemailb=html_entity_decode(@$getemailb[1]);
					
					$email=null;
					if($getemaila){$email=$getemaila;}
					if($getemailb){$email=$getemailb;}
					if($getsname){$email=$getsname;}
					
					$contact=array($getname,$email);
					
					/*Filter out blank email and invalid email address !important*/
					if(@$contact[1]&&ValEmail(@$contact[1])){array_push($tmp,$contact);}}
					
						$contactemails=$tmp;					
						unlinkcookie();					
					
					}else{
					
						// NOT SURE WHAT THIS IS, SO LETS STOP
						unlinkcookie();
						$contactemails = FALSE;
					
					}
			
			} break;
		}			
		
		return $contactemails;		
}

// COOKIE
function unlinkcookie(){
	global $cookiepath;
	
	@unlink($cookiepath);
	return;
}
?>