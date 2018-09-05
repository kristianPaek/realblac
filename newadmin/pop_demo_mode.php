<?php 
require_once "inc/config.php";
require_once subd . "inc/config.php";

require_once "inc/func/admin_globals.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><head><meta http-equiv="Content-Type" content="text/html; charset=<?=$admin_layout_header['charset'] ?>"></head>

<div id="definition">
<style>
.box_title { background-color:#eeeeee; padding:8px; color:#666666; font-size:90%;}
.box_body { border:2px solid #eeeeee; padding:8px; font-size:75%;}
h3 { color:#666;}
</style>
<div>
	<h2><?=$admin_pop_demo[1] ?></h2>
	<h3><?=$admin_pop_demo[2] ?></h3>
	<p><?=$admin_pop_demo[3] ?></p>
	<p><?=$admin_pop_demo[4] ?></p>
	<p></p>
	<p class="highlight"><?=$admin_pop_demo[5] ?></p>
	<p></p><br>
	<center><p><a href="#" class="lbAction" rel="deactivate" style="padding:10px; background:#eeeeee;color:#666; border:1px solid #666; font-size:15px;margin-top:15px;"><?=$admin_pop_demo[6] ?></a></p></center>
</div>
</div>

</body></html>