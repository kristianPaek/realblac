<?php
function wrapText($wrap,$text){
$exploded=explode(' ',$text);

for($i=0;$i<sizeof($exploded);$i++) {
if(!isset($foundTag)) $foundTag=0;
$str=$exploded[$i];

if (substr_count($str, '<')>0) $foundTag=1;

if(substr_count($str, '&#')>0 or substr_count($str, '&quot;')>0 or substr_count($str, '&amp;')>0 or substr_count($str, '&lt;')>0 or substr_count($str, '&gt;')>0 or substr_count($str, "\n")>0) $fnAmp=1; else $fnAmp=0;

if(strlen($str)>$wrap and ($foundTag==1 or $fnAmp==1)) {

$chkPhr=''; $symbol=0;
$foundAmp=0;

for ($a=0; $a<strlen($str); $a++) {

if($foundTag==0 and $foundAmp==0) $symbol++;

if ($str[$a]=='<') { $foundTag=1; }
if ($str[$a]=='>' and $foundTag==1) { $foundTag=0;}

if ($str[$a]=='&') { $foundAmp=1; }
if ($str[$a]==';' and $foundAmp==1) { $foundAmp=0; }

if($str[$a]==' ' or $str[$a]=="\n") {$symbol=0;}
if($symbol>=$wrap and $foundTag==0 and $foundAmp==0 and isset($str[$symbol+1])) { $chkPhr.=$str[$a].' '; $symbol=0; }
else $chkPhr.=$str[$a];

}//a cycle

if (strlen($chkPhr)>0) $exploded[$i]=$chkPhr;

}
elseif (strlen($str)>$wrap) $exploded[$i]=chunk_split($exploded[$i],$wrap,' ');
else{
if (substr_count($str, '<')>0 or substr_count($str, '>')>0) {
for ($a=strlen($str)-1;$a>=0;$a--){
if($str[$a]=='>') {$foundTag=0;break;}
elseif($str[$a]=='<') {$foundTag=1;break;}
}
}
}
} //i cycle

return implode(' ',$exploded);
}

//--------------->
function urlMaker($text,$wrap){
$text=str_replace("\n", " \n ", $text);

$words=explode(' ',$text);

for($i=0;$i<sizeof($words);$i++){

$word=$words[$i];
//Trim below is necessary is the tag is placed at the begin of string
$c=0;

if(strtolower(substr($words[$i],0,7))=='http://' and strlen($words[$i])>10) {$c=1;$word='<a href=\"'.trim($words[$i]).'\" target=\"_new\" rel=\"nofollow\">'.trim($word).'</a>';}
elseif(strtolower(substr($words[$i],0,8))=='https://' and strlen($words[$i])>11) {$c=1;$word='<a href=\"'.trim($words[$i]).'\" target=\"_new\" rel=\"nofollow\">'.trim($word).'</a>';}
elseif(strtolower(substr($words[$i],0,6))=='ftp://' and strlen($words[$i])>9) {$c=1;$word='<a href=\"'.trim($words[$i]).'\" target=\"_new\" rel=\"nofollow\">'.trim($word).'</a>';}
elseif(strtolower(substr($words[$i],0,4))=='ftp.' and strlen($words[$i])>9) {$c=1;$word='<a href=\"ftp://'.trim($words[$i]).'\" target=\"_new\" rel=\"nofollow\">'.trim($word).'</a>';}
elseif(strtolower(substr($words[$i],0,4))=='www.' and strlen($words[$i])>7) {$c=1;$word='<a href="http://'.trim($words[$i]).'\" target=\"_new\" rel=\"nofollow\">'.trim($word).'</a>';}
if ($c==1) $words[$i]=$word;
//$words[$i]=str_replace ("\n ", "\n", $words[$i]);
}
$ret=str_replace (" \n ", "\n", implode(' ',$words));
return $ret;
}

//--------------->
function textFilter($text,$size,$wrap,$urls,$bbcodes,$eofs,$admin){
$text= eMeetingInput($text);
$text=str_replace('\&#039;', '&#039;', $text);
$text=str_replace('\&quot;', '&quot;', $text);
$text=str_replace(chr(92).chr(92).chr(92).chr(92), '&#92;&#92;', $text);
$text=str_replace(chr(92).chr(92), '&#92;', $text);
$text=str_replace('&amp;#', '&#', $text);
$text=str_replace('$', '&#036;', $text);
if($urls and !$bbcodes) {
$text=urlMaker($text,$wrap);
}
if (!$bbcodes) {
$text=enCodeBB($text, $admin);
$text=str_replace('><img src=','> <img src=',$text);
}
//echo $text; 
$text=wrapText($wrap,$text);

//echo "<br><br>\n\n".$text; 
//exit;

if($size) {
if(strlen($text)>$size) {
$text=substr($text,0,$size);
//Avoid special symbols extract
$tmpArr=explode ('&', $text);
$last=sizeof($tmpArr)-1;
if ($last>0) {
if (substr_count($tmpArr[$last], ';')==0) array_pop($tmpArr);
$text=implode ('&', $tmpArr);
}
}
}
if($eofs){
while (substr_count($text, "\r\n\r\n\r\n\r\n")>4) $text=str_replace("\r\n\r\n\r\n\r\n","\r\n",$text);
while (substr_count($text, "\n\n\n\n")>4) $text=str_replace("\n\n\n\n","\n",$text);
$text=str_replace("\n",'<br>',$text);
}
while(substr($text,-1)==chr(92)) $text=substr($text,0,strlen($text)-1);
return $text;
}

?>