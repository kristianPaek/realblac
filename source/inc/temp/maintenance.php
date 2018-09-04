<?php if(!isset($_REQUEST['p']) || $_REQUEST['p'] == "updates" || $_REQUEST['p'] == ""){ ?>

	<ul class="form"><div class="box_body">
			
	<li><label><?=$admin_maintenance[1] ?></label> <?=VERSION ?></li>	
	<li><label><?=$admin_maintenance[2] ?></label> <script src="<?=upgrade_link ?>" type="text/javascript"></script></li>  
	
</div></ul>
			  
<?php }elseif($_REQUEST['p'] == "backup"){ ?>

<?php if(ADMIN_DEMO !="yes"){ ?>
<form method="post" action="maintenance.php">
<input type="hidden" name="do" value="backup" class="hidden">
<table width="100%" cellpadding=0 cellspacing=1><thead></thead><tbody><tr><td> 
                <?php 
					$tables=array();
					$result=mysql_query("SHOW TABLES");
					while ($row = mysql_fetch_array($result)) $tables[]=$row[0]; 
					
				?>
<select name="lstTables[]" multiple style="width:100%; height:450px;"><?php foreach ($tables as $table) echo "<option>".$table."</option>"; ?></select></td></tr><tr><td>Unzipped <input type="radio" class="radio" name="arcType" value="" id="radio" checked> Zipped <input type="radio" class="radio" name="arcType" value="gzip" id="radio"></td></tr></tbody></table><br>
<input name="submit" type="submit" class="MainBtn" value="<?=$admin_button_val[8] ?>">
</form>

<?php }else{ ?>Disabled in demo mode <?php } ?>

<?php }elseif($_REQUEST['p'] == "license"){ ?>

	<form method="post" action="">
	<input name="do" type="hidden" value="key" class="hidden">
	<input name="p" type="hidden" value="license" class="hidden">
	<input name="page" type="hidden" value="license" class="hidden">
	<ul class="form"><div class="box_body">
			<?php if(ADMIN_DEMO !="yes"){ ?>
	<li><label>Software License Key:</label> <input name="key" type="text" value="<?=KEY_ID ?>"size="40" maxlength="150" class="input"></li>	 
	<li><label>Branding Free License Key:</label> <input name="bkey" type="text" value="<?=BRAND_ID ?>"size="40" maxlength="150" class="input"></li>	 
	<li><label>Maps License Key:</label> <input name="pkey" type="text" value="<?=MAPS_ID ?>"size="40" maxlength="150" class="input"></li>	 
<li><label>Google API Key:</label> 
<div class="tip">Signup using the link below: http://code.google.com/apis/maps/signup.html</div>
<input name="gkey" type="text" value="<?=GOOGLE_MAPS_KEY ?>"size="40" class="input"></li>	 

<?php }else{ ?>
Disabled in demo mode.
<?php } ?>

    <li><input type="submit" value="<?=$admin_button_val[8] ?>" class="MainBtn"></li>
	  
	</div></ul>
	</form>


<?php }elseif($_REQUEST['p'] == "sms"){ ?>

	<ul class="form"><div class="box_body">			 
	<li><label><?=$admin_maintenance[4] ?>:</label> <script src="<?=sms_link.KEY_ID ?>" type="text/javascript"></script></li>	 
    <li><input type="button" value="<?=$admin_maintenance[5] ?>" class="MainBtn" onClick="javascript:location.href='<?=upgrade_link_buy ?>'"/></li>
	  
	</div></ul>
<?php } ?>