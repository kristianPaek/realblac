<?
require_once "inc/config.php";
require_once subd . "inc/config.php";

require_once "inc/func/admin_globals.php";

if(!isset($_GET['p'])){ $_GET['p']=-1; }
if(!isset($_GET['n'])){ $_GET['n']=-1; }
if($_GET['n'] > 7){ $_GET['n']=-1; $_GET['p']=-1; }
//print $_GET['p']."".$_GET['n'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=<?=$admin_layout_header['charset'] ?>">
<script>
function idShowHide(obj) {
     var el = document.getElementById(obj);
     if ( el.style.display != "none" ) {
     el.style.display = 'none';
     } else {
     el.style.display = 'block';
     }
}
function bookmarksite(title,url){
if (window.sidebar) // firefox
	window.sidebar.addPanel(title, url, "");
else if(window.opera && window.print){ // opera
	var elem = document.createElement('a');
	elem.setAttribute('href',url);
	elem.setAttribute('title',title);
	elem.setAttribute('rel','sidebar');
	elem.click();
} 
else if(document.all)// ie
	window.external.AddFavorite(url, title);
}
</script>

<style>
.box_title { background-color:#eeeeee; padding:8px; color:#666666; font-size:90%;}
.box_body { border:2px solid #eeeeee; padding:8px; font-size:75%;}
h3 { color:#666;}
.but { padding:10px; background:#eeeeee;color:#666; border:1px solid #666; font-size:15px;margin-top:15px; font-weight:normal; }
.img_show { width:450px; height:150px; border:1px dashed #666; overflow:hidden; }
</style>
</head>
<body>
<div id="definition">

<!-- INTRODUCTION PAGE -->
<div id="intro" style="display:<?php if($_GET['p'] ==-1 && $_GET['p']==-1){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h2><?=$admin_help[1] ?></h2>
	<h3><?=$admin_help[2] ?></h3>
	<p><strong><?=$admin_help[3] ?> <?=$_SESSION['admin_name'] ?></strong> <?=$admin_help[4] ?></p>
	<p></p>
	<p><?=$admin_help[5] ?></p>
	<p></p>
	<p class="highlight"><?=$admin_help[6] ?></p>
	<p></p><br>
	<center><p><a href="#" onClick="idShowHide('intro'); idShowHide('step1');"><b class="but"><?=$admin_help['a'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['b'] ?></b></a></p></center>
</div>

<!-- INTRODUCTION PAGE -->
<div id="step1" style="display:none;">
	<h2><?=$admin_help[7] ?></h2>
	<h3><?=$admin_help[8] ?></h3>
	<p><?=$admin_help[9] ?> <?=DB_DOMAIN ?>. <?=$admin_help[10] ?></p>
	<p><?=$admin_help[11] ?></p>
	<p class="highlight"><?=$admin_help[12] ?></p>
	<p></p><br>
	<center><p><a href="#" onClick="idShowHide('step1'); idShowHide('step2');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>


<div id="step2" style="display:none;">
	<h3><?=$admin_help[13] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/1.jpg"></div></p>
	<p><?=$admin_help[14] ?> <?=DB_DOMAIN ?>/newadmin/ <?=$admin_help[15] ?></p>
	<p><a href="javascript:bookmarksite('My Admin Area Login', '<?=DB_DOMAIN ?>/newadmin');"><?=$admin_help[16] ?></a></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step2'); idShowHide('step3');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step3" style="display:<?php if($_GET['n'] ==0 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help[17] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/2.jpg"></div></p>
	<p></p>
	<p><?=$admin_help[18] ?></p>
	<p class="highlight"><?=$admin_help[19] ?> <b></b><?=DB_BASE ?></b></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step3'); idShowHide('step4');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>


<div id="step4" style="display:<?php if($_GET['n'] ==0 && ( $_GET['p']=="visitor" || $_GET['p']=="affiliate" || $_GET['p']=="members" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help[20] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/3.jpg"></div></p>
	<p></p>
	<p><?=$admin_help[21] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step4'); idShowHide('step5');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step5" style="display:<?php if($_GET['n'] ==0 && ( $_GET['p']=="maps" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help[22] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/4.jpg"></div></p>
	<p></p>
	<p><?=$admin_help[1] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step5'); idShowHide('step6');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>


<div id="step6" style="display:<?php if($_GET['n'] ==1 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['23'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/5.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['23a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step6'); idShowHide('step7');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step7" style="display:<?php if($_GET['n'] ==1 && ( $_GET['p']=="affiliate" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['24'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/6.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['24a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step7'); idShowHide('step8');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step8" style="display:<?php if($_GET['n'] ==1 && ( $_GET['p']=="banned" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['25'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/7.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['25a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step8'); idShowHide('step9');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step9" style="display:<?php if($_GET['n'] ==1 && ( $_GET['p']=="files" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['26'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/8.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['26a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step9'); idShowHide('step10');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step10" style="display:<?php if($_GET['n'] ==1 && ( $_GET['p']=="import" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['27'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/9.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['27a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step10'); idShowHide('step11');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>


<div id="step11" style="display:<?php if($_GET['n'] ==2 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['28'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/10.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['28a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step11'); idShowHide('step12');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step12" style="display:<?php if($_GET['n'] ==2 && ( $_GET['p']=="edit" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['29'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/11.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['29a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step12'); idShowHide('step13');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step13" style="display:<?php if($_GET['n'] ==2 && ( $_GET['p']=="img" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['30'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/12.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['30a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step13'); idShowHide('step14');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step14" style="display:<?php if($_GET['n'] ==2 && ( $_GET['p']=="logo" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['31'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/13.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['31a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step14'); idShowHide('step15');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step15" style="display:<?php if($_GET['n'] ==2 && ( $_GET['p']=="meta" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['32'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/14.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['32a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step15'); idShowHide('step16');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step16" style="display:<?php if($_GET['n'] ==2 && ( $_GET['p']=="languages" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['33'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/15.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['33a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step16'); idShowHide('step17');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step17" style="display:<?php if($_GET['n'] ==3 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['34'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/16.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['34a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step17'); idShowHide('step18');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step18" style="display:<?php if($_GET['n'] ==3 && ( $_GET['p']=="template" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['35'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/17.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['35a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step18'); idShowHide('step19');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step19" style="display:<?php if($_GET['n'] ==3 && ( $_GET['p']=="tc" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['36'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/18.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['36a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step19'); idShowHide('step20');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step20" style="display:<?php if($_GET['n'] ==3 && ( $_GET['p']=="sendnew" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['37'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/19.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['37a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step20'); idShowHide('step21');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step21" style="display:<?php if($_GET['n'] ==3 && ( $_GET['p']=="send" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['38'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/20.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['38a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step21'); idShowHide('step22');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step22" style="display:<?php if($_GET['n'] ==3 && ( $_GET['p']=="subs" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['39'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/21.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['39a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step22'); idShowHide('step23');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<!-- MEMBERSHIP PACKAGES -->

<div id="step23" style="display:<?php if($_GET['n'] ==4 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['40'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/22.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['40a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step23'); idShowHide('step24');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step24" style="display:<?php if($_GET['n'] ==4 && ( $_GET['p']=="gateway" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['41'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/23.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['41a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step24'); idShowHide('step25');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step25" style="display:<?php if($_GET['n'] ==4 && ( $_GET['p']=="billing" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['42'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/24.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['42a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step25'); idShowHide('step26');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step26" style="display:<?php if($_GET['n'] ==4 && ( $_GET['p']=="affbilling" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['43'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/25.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['43a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step26'); idShowHide('step27');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>


<div id="step27" style="display:<?php if($_GET['n'] ==6 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['44'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/26.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['44a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step27'); idShowHide('step28');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step28" style="display:<?php if($_GET['n'] ==6 && ( $_GET['p']=="op" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['45'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/27.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['45a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step28'); idShowHide('step29');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step29" style="display:<?php if($_GET['n'] ==6 && ( $_GET['p']=="paths" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['46'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/28.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['46a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step29'); idShowHide('step30');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step30" style="display:<?php if($_GET['n'] ==6 && ( $_GET['p']=="watermark" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['47'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/29.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['47a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step30'); idShowHide('step31');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step31" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['48'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/30.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['48a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step31'); idShowHide('step32');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step32" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="cal" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['50'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/31.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['50a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step32'); idShowHide('step33');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step33" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="poll" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['51'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/32.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['51a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step33'); idShowHide('step34');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step34" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="forum" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['52'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/33.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['52a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step34'); idShowHide('step35');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step35" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="chatrooms" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['53'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/34.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['53a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step35'); idShowHide('step36');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step36" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="faq" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['54'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/35.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['54a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step36'); idShowHide('step37');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step37" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="words" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['55'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/36.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['55a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step37'); idShowHide('step38');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step38" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="articles" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['56'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/37.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['56a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step38'); idShowHide('step39');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

<div id="step39" style="display:<?php if($_GET['n'] ==7 && ( $_GET['p']=="groups" ) ){ ?>visible<?php }else{ ?>none<?php } ?>;">
	<h3><?=$admin_help['57'] ?></h3>
	<p><div class="img_show"><img src="inc/images/help/38.jpg"></div></p>
	<p></p>
	<p><?=$admin_help['57a'] ?></p>
	<p></p>
	<center><p><a href="#" onClick="idShowHide('step39'); idShowHide('step40');"><b class="but"><?=$admin_help['c'] ?></b></a> <a href="#" class="lbAction" rel="deactivate"><b class="but"><?=$admin_help['d'] ?></b></a></p></center>
</div>

</div></body></html>