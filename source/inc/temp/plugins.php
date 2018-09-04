<?php if(isset($page) && $page != "" && $page != "index"){

		if($PLUGINS_PAGE_TYPE =="html"){
			
			print $PLUGINS_PAGE_LINK;
			
		}elseif($PLUGINS_PAGE_TYPE =="link"){
			
			require_once (	$PLUGINS_PAGE_LINK 	);	
		}

?>





<?php }else{ ?>

 


<?php      
	 #-- form output
	 $cfg   = (isset($_REQUEST["cfg"])) ?	strip_tags($_REQUEST["cfg"]): $_POST["cfg"];
     $cat 	= $_REQUEST["cat"];
	
	 if($cfg ==""){ $cfg="plugins"; }

	 
     #-- check if writable
     if (!is_writeable($conf->cfg->fn)) {
        
		echo "<div class=\"message error\">{$conf->cfg->fn} is not writable. <p>Use your shell account or FTP access to 'chmod 666 plugins/config_plugins.php'. But don't forget to change this back to 644 after you've done. Or get a professional provider which supports suexec/FastCGI instead of the amateurish 'safe_mode'/mod_php setup.</p></div>";

    
     }elseif ($cfg == "settings") {
		
		print "<form action=\"plugins.php?cfg=$cfg&amp;cat=$cat\" method=\"POST\" enctype=\"multipart/form-data\" accept-encoding=\"ISO-8859-1\">";
		//print '<fieldset>';
			
        #-- headline
 		print '<ul class="form"><div class="CapTitle">'.$cat.'</div><div class="box_body">';
		
        #-- show settings
        foreach ($conf->settings($_REQUEST["cat"]) as $opt) {
		
		   if($_REQUEST["id"] == $opt['plugin']){
        
           echo $conf->html($opt);
		   
		  }
		   
        }	
		//print "<hr>";
		print '<li><input type="submit" name="save" value="Save Settings" title="Save" class="MainBtn"/></li>';
		
		print '</div></ul>';
		print '</form>';
		
     } elseif ($cfg == "plugins") { ?>
	 

			<form action="<?php print "plugins.php?cfg=$cfg&cat=$cat"; ?>" method="POST" enctype="multipart/form-data" accept-encoding="ISO-8859-1">
              <table class="widefat">                
                <thead>                  
                  <tr>                     
                    <th><?=$admin_plugins[3] ?></th>
                                        
                    <th><?=$admin_plugins[6] ?></th>
                    <th></th>
                  </tr>                
                </thead>                
                <tbody>				
				<?php   foreach ($conf->plugins($_REQUEST["cat"]) as $pmd) {  echo $conf->html($pmd);   } ?>                
          </tbody>              
          </table>
		  
		<br class="clear">
		<div class="bar_save">
		<input value="<?=$admin_button_val[8] ?>" type="submit" class="MainBtn" name="save">
		<br class="clear">
		</div>
		</form>	
		<br class="clear">
		<?php  }  ?>
		
		<div class="message"></div>
		<?php } ?>