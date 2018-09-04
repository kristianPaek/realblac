<?php
if (!defined('INCLUDED776')) die ('Fatal error.');

if ($handle=opendir($pathToFiles.'lang')) {
while(($file=readdir($handle))!=false) {
if($file!='.' && $file!='..' && substr($file, -4)=='.php' && substr_count($file,'_')==0) {
$a=0;
$fd=fopen($pathToFiles.'lang/'.$file,'r'); 
while($a<3) { $getLang=fgets($fd,1024); $a++; }
fclose($fd);
$key=substr($file,0,3);
$getLang=explode('$Lang:',$getLang); $getLang=explode(':$', $getLang[1]);
$glang[$key]=$getLang[0];
}
}
closedir($handle);
asort($glang); 
}
?>