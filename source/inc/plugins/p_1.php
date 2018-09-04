<?php
/**
 * title: libconfig
 * description: im in ur server, configurrring ur pluginz
 * category: library
 * api: php
 * type: functions
 * priority: never
 * depends: libconfigedit, pluginmetadata
 * license: Public Domain
 * author: milky
 * version: 0.6
 * url: http://milki.erphesfurt.de/genericplugins/
 * 
 * 
 * Combines plugin meta data management and config file editing.
 * It is actually an extension of the PMD module, but also meant
 * to provide simpler hooks for an editing UI.
 * 
 * - loose collection of utility code
 * - filter api:, priority:, category:, ...
 * - centers around base directory and config.php script
 * - adds some dependency checking
 *     - depends: and replaces: also respect virtual plugin names
 *     - conflicts: and suggests: work on real plugin names only
 *  
 */




/**
 * combines ->pmd and editable ->cfg file for easier access
 *
 *
 *   categories();            // for plugins + settings
 *   plugins();               // from single or all sections
 *   settings($catg);         // same for settings
 *   pluginsettings($name);
 *   hidden($plugin);         // test plugin category
 *   required($plugin);       // test plugin category
 *   state($name);            // get current ->cfg set state / value
 *   assign($name, $value);   // for plugins and config
 *   state_list();
 *   save();                  // finish and save edited config
 *
 */
class generic_config {


   #-- sub-objects
   var $pmd;   // plugin meta data
   var $cfg;   // config.php file opened for editing
   //var $set;   // secondary list of currently enabled stuff - do we need that really??

   #-- parameters
   var $supported_api = array("php");  // not enforced, but collected from plugins with "PROVIDES: api:sysname"
   var $category_min = 2;
   var $hide_category = array("hide", "hidden", "never", "none", "null");
   var $hide_priority = array("hide", "hidden", "never", /*auto*/);
   var $hide_type     = array("R");
   var $priority_core = array("core", "required", "always", "musthave", "force", "indispensable", "requisite", "necessary", "needed", "implicit");
   var $priority_base = array("base", "standard", "default");

   #-- should these be ->pmd built-in defaults?
   var $lcase_fields = array("api", "priority", "category", "type");
   var $set_defaults = array("category"=>"else", "api"=>"php", "type"=>"functions", "priority"=>"rare");



   /**
    * constructor
    * - initializes child objects
    *
    */
   function generic_config($basedir="..", $conffn="config.php") {
      $this->pmd = new generic_pmd();
      $this->pmd->scan("$basedir/"); 
      $this->cfg = new generic_config_edit("$basedir/$conffn");
      $this->normalize_pmd();
      $this->transform_api_into_dependency();
      $this->transfuse_dependencies_into_sort();
      $this->transfer_sorting_order();
   }
   



   /**
    * return enabled state or value of any plugin/setting
    *
    */
   function state($name) {
      if ($i = $this->cfg->find_enabled($name)) {
         #echo "state:$name:$i:found..\n"; print_r($this->cfg->cf[$i]);
         return($this->cfg->cf[$i]->value);
      }
   }
   

   
   /**
    * set state of a plugin, or value of a variable/constant
    *
    */
   function assign($name, $value) {

      #-- plugins first need their filename:
      if (isset($this->pmd->plugin[$name])) {
         if (!$value) {
            $this->cfg->remove($name);
         }
         elseif ($filename = $this->pmd->plugin[$name]["fn"]) {
            $this->cfg->add_plugin($name, $filename);
         }
         else {
            $this->error("no filename for plugin '$name'");
         }
      }
   
      #-- variables: or constants:
      elseif (isset($this->pmd->config[$name])) {
         if (!$this->not_default($name, $value) && !isset($value)) {
            $this->cfg->remove($name); 
         }
         else {
            $this->cfg->add_setting($name, $value);
         }
      }
      
      #-- incorrect name
      else {
         $this->error("could not recognize '$name' as either plugin or setting");
      }
   }
   
   
   /**
    * compares config setting against default value
    *
    */
   function not_default($name, $value) {
      return $this->set_always
          || ($this->pmd->config[$name]["set"] == "always")
          || ($this->pmd->config[$name]["value"] != $value);
   }
   


   /**
    * list of categories (for both plugins and settings)
    *
    */
   function categories() {
      $r = array();
      foreach ($this->pmd->plugin as $i=>$row) {
         $r[$row["category"]] = 1;
      }
      foreach ($this->pmd->config as $i=>$row) {
         $r[$row["category"]] = 1;
      }
      return array_keys($r);
   }
   

   /**
    * list of plugins in a given category
    *
    */
   function plugins($catg="") {
      $r = array();
      foreach ($this->pmd->plugin as $id=>$row) {
         if (empty($catg) || ($row["category"]==$catg)) {
            $r[$id] = & $this->pmd->plugin[$id];
         }
      }
      return($r);
   }



   /**
    * list of settings in a given category
    *
    */
   function settings($catg) {
      $r = array();
      foreach ($this->pmd->config as $id=>$row) {
         if (empty($catg) || ($row["category"]==$catg)) {
            $r[$id] = & $this->pmd->config[$id];
         }
      }
      return($r);
   }
   
   
   /**
    * or settings that are provided by a certain plugin
    * (BUG: this method doesn't handle options that are provided by two plugins under identical names)
    *
    */
   function pluginsettings($name) {
      $r = array();
      foreach ($this->pmd->config as $id=>$row) {
         if ($row["plugin"] == $name) {
            $r[$id] = & $this->pmd->config[$id];
         }
      }
      return($r);
   }



   #-- unwanted plugins
   function hidden($row) {
      if (is_string($row)) { $row = $this->pmd[$row]; }
      return
        !strlen($row["title"])
        || in_array($row["type"], $this->hide_type)
        || in_array($row["priority"], $this->hide_priority)
        || in_array($row["category"], $this->hide_category);
   }

   #-- indeactivyableableablyable plugins
   function required($row) {
      if (is_string($row)) { $row = $this->pmd[$row]; }
      return
         (strpos($row["title"], "core") !== false)
         || in_array($row["priority"], $this->priority_core);
   }








   /**
    * add missing fields to ->pmd,
    * and change case of some fields
    * (allthough most changes are presentational, we might move this to ->pmd)
    */
   function normalize_pmd() {
   
      #-- lowercase fields and set defaults
      foreach ($this->lcase_fields as $field) {
         foreach ($this->pmd->plugin as $id=>$row) {
            if (isset($this->pmd->plugin[$id][$field])) {
               $this->pmd->plugin[$id][$field] = strtolower($this->pmd->plugin[$id][$field]);
            }
            elseif (isset($this->set_defaults[$field])) {
               $this->pmd->plugin[$id][$field] = $this->set_defaults[$field];
               //echo "setting $field: for $id\n";
            }
         }
      }

      #-- derive category: from parent plugin if unset in config/setting
      foreach ($this->pmd->config as $id=>$row) {
         if (empty($row["category"])) {
            $this->pmd->config[$id]["category"] = $this->pmd->plugin[$row["plugin"]]["category"];
         }
      }
   }




   /**
    * use plugin sorting, to ensure dependencies are loaded first
    *
    */
   function transfuse_dependencies_into_sort() {
      $pl = & $this->pmd->plugin;
      $rounds = 20;
      do {
         // regardless if we need that dependend plugin
         foreach ($this->pmd->depends as $id=>$deplist) foreach($deplist as $dep) {
            if ((int)$pl[$dep]["sort"] >= (int)$pl[$id]["sort"]) {
               $pl[$dep]["sort"] = $pl[$id]["sort"] - 1;
               $might_need_more_shuffling = 1;
            }
         }
      }
      while (($might_need_more_shuffling-->0) && ($rounds-->0));
   }
   




   // move sort information into ->cfg
   function transfer_sorting_order() {
      $sort = array();
      foreach ($this->pmd->plugin as $id=>$row) {
         if (isset($row["sort"])) {
            $sort[$id] = $row["sort"];
         }
      }
      foreach ($this->pmd->config as $id=>$row) {
         if (isset($row["sort"])) {
            $sort[$id] = $row["sort"];
         }
      }
      $this->cfg->set_sorting_order($sort);
   }
   


   
   // inject "depends: api:sysname" or search for "provides: api:sysname"
   function transform_api_into_dependency() {
      foreach ($this->pmd->provides as $id=>$list) {
         if (strpos($id, "api:") === 0) {
            $api = substr($id, 4);
            $this->supported_api[] = "$api";
            $this->supported_api_providers["$api"] = array_values($list);
         }
      }
   }





   #----------------------------------------------------------------------------


   #-- return list of enabled/disabled plugins
   function state_list() {
      $ls = array();
      foreach ($this->pmd->plugin as $id=>$row) {
         $ls[$id] = $this->state($id) ? 1 : 0;
      }
      return($ls);
   }   
      

   #-- returns single plugin name for virtual names (provides:)
   function find_providing_plugin($what) {
      if (count($this->pmd->provides[$what])) {
         foreach ($this->pmd->provides[$what] as $opt) {
            if ($this->state($opt)) {
               return($opt);  // return already enabled plugin
            }
         }
         return($this->pmd->provides[$what][0]); // or simply the first
      }
      elseif (isset($this->pmd->plugin[$what])) {
         return $what;  // is a plugin itself
      }
      else {
         // doesn't exist
      }
   }


   #-- returns list of alternative names for plugin/dependency
   function aliases($plugin_name) {
      if (count($this->pmd->provides[$what])) {
         return($this->pmd->provides[$what]);
      }
      else {
         #if (isset($this->pmd->plugin[$what])) {
         return(array($what));  // just the plugin itself
      }
   }


   // libconfig
   #-- apply dependencies on plugin list
   function resolve_dependencies($add_suggested=0) {
      $error = array();

      #-- check all currently enabled plugins
      $ls = $this->state_list();
      foreach ($ls as $id=>$on) if ($on) {

         #-- depends (add [single] other)
         if (isset($this->pmd->depends[$id])) {
            foreach ($this->pmd->depends[$id] as $name) {
               if ($name = $this->find_providing_plugin($name)) {
                  $this->assign($name, 1);
                  $ls[$name] = 1;
               }
               else {
                  $this->error("A dependency on '$what' could not be met.");
               }
            }
         }
         
         #-- replaces (remove [multiple] others)
         if (isset($this->pmd->replaces[$id])) {
            foreach ($this->pmd->replaces[$id] as $name) {
               foreach ($this->aliases($name) as $name) {
                  $this->assign($name, 0);
                  $ls[$name] = 0;
               }
            }
         }

         #-- conflicts (remove CURRENT)
         if (isset($this->pmd->conflicts[$id])) {
            foreach ($this->pmd->conflicts[$id] as $name) {
               // only if the conflicting other one is actually enabled
               if ($ls[$name]) {
                  $this->assign($id, 0);
                  $ls[$id] = 0;
               }
               // might open up a missing dependency;
               // but hey, this is not a apt/dpkg replacement
            }
         }

         #-- suggests (add [single] other)
         if ($add_suggested && isset($this->pmd->suggests[$id])) {
            foreach ($this->pmd->suggests[$id] as $name) {
               if ($name = $this->find_providing_plugin($name)) {
                  $this->assign($name, 1);
                  $ls[$name] = 1;
               }
            }
         }
      }//foreach

      return($ls);
   }


   function save() {
      $this->resolve_dependencies();
      $this->cfg->write();
   }
   
   
   function error($s) {
      $this->cfg->error($s);
   }
   
}






/**
 * Additional HTML output for plugins and settings.
 *
 * This actually belongs into the admin_ui script. But we just keep it here,
 * because it will be the default client anyhow. And it still contains a lot
 * of configuration logic (default values, types, accessing ->pmd and ->cfg)
 *
 */
class generic_config_html extends generic_config {

   /**
    * force variable generation from default value?
    *
    * @BUG: we access this var actually in the parent classe,
    *    most code for default checking moved into ->assign()
    */
   var $set_always = 0;

   /**
    * output <img/> tags
    *
    */
   var $img_plugin = '';
   var $img_setting = '';
   var $img_moreinfo = '';


   /**
    * either plugin or setting
    *
    */
   function html($row) {
      if ($row["id"]||$row["fn"]) {
         return $this->html_plugin($row);
      }
      else {
         return $this->html_setting($row);
      }
   }


   /**
    * output form fields for a plugin
    *
    */
   function html_plugin($row) {
 

      $id = htmlentities($row["id"]);
      $chk = $this->state($row["id"]) ? " checked=\"checked\"" : "";
	  
	  $ThisValue  = '<tr>';
	  $ThisValue .= '<td><strong>' . htmlentities($row["title"]).'</strong> - Version '.$row[version].' <br><br>'.htmlentities($row["description"]).' <br><br><small> Author Url: <a href="'.$row[url].'" target="_blank">'.$row[url].'</a> - Updated: '.$row[updated].' </small>  </td>';
	 // $ThisValue .= '<td align=center>'.$row[author].' <br><br>  eMeeting Version '.$row[version].'</td>';
	//  $ThisValue .= '<td align=center>'.$row[updated].'</td>';
	  $ThisValue .= '<td align=center style="width:110px;">';
	
	  if($chk !=""){ $Thisstatus ="<b style='color:green;'>Active</b> "; }else{  $Thisstatus ="<b>Not Active</b>";}
	  $ThisValue .= " <div style=' font-size:12px;'><a href='plugins.php?cfg=settings&cat=" . htmlentities($row["category"])."&id=".$id."'>".$Thisstatus." | <b> Edit </b> </a> </div>";

	  $ThisValue .= '</td>';
	  $ThisValue .= '<td align=center>';
	  $ThisValue .= "<input type='checkbox' name='plugin[".$id."]' value=1 id='plugin_".$id."' ".$chk."/>";
	  $ThisValue .= "<input type='hidden' name='submit[".$id."]' value=1 />";
	  $ThisValue .= '</td>';
	  $ThisValue .= '</tr>';
	  
	  return $ThisValue;
   }


   /**
    * output form fields for var/const settings
    *
    */
   function html_setting($row) {
   
      $field = "";
      $name = rawurlencode($row["name"]);
      $jsid = preg_replace("/[^\w]/", "_", $row["name"]);
      $regex = isset($row["regex"]) ? 'x:regex="'.htmlentities($row["regex"]).'" xmlns:x="urn:x-vnd.ewiki:0:regex:0" ' : '';
      $title = $row["title"] ? htmlentities($row["title"]) : htmlentities($row["name"]);
	  $class = $row["class"] ? htmlentities($row["class"]) : htmlentities($row["class"]);
      #-- current value
      $value = $this->state($row["name"]);
      $default = $row["value"];
      // we don't want to store an anyhow *default* value later..
      if (!isset($value) && ($value!=='') && isset($default)) {
         // echo "override $name default "; var_dump($value); echo ":=$default <br>\n";
         $value = $default;
      }
      
      #-- guess type
      if (!empty($row["multi"])) {
         $row["type"] = "multi";
      }

      #-- test if type is set
      switch (strtolower(@$row["type"])) {
      
         #-- simple text field
         case "string":
         case "text":
         case "int":
         case "":
            $type = "text";
         case "integer":
            $value = htmlentities($value);
            $field = "<input class='input' size='60' type=\"$type\" name=\"setting[$name]\" id=\"setting_$jsid\" value=\"$value\" $regex/>";
         break;

         #-- simple checkbox
         case "checkbox":
         case "boolean":
         case "bool":
            $checked = $value ? 'checked="checked" ' : '';
            $field = "<input class=\"$class\" type=\"checkbox\" name=\"setting[$name]\" id=\"setting_$jsid\" value=\"1\" $checked/>";
         break;

         #-- select box
         case "multi":
         case "select":
         case "option":
            $field = "<select class='input' name=\"setting[$name]\" id=\"setting_$jsid\">";
            if (!isset($row["multi"][$value])) {
               $row["multi"][$value] = $value;
            }
            foreach ($row["multi"] as $v=>$t) {
               $checked = (($value==$v) ? " selected=\"selected\"" : "");
               $field .= "<option value=\"" . htmlentities($v)
                      ."\"$checked>" . htmlentities($t) . "</option>";
            }
            $field .= "</select>";
         break;

         default:
            $this->error("setting '$name' is of unknown type");
            return;
      }

      #-- assemble
	  	return '<li><label>'.$title . "</label>"
           . $field		
			//.'</td><td width="69%">'
			. "<input type=\"hidden\" name=\"previous[$name]\" value=\"".htmlentities($value)."\" />"
			. '<div class="tip">'.htmlentities($row["description"]).'</div>'
           . "<input type=\"hidden\" name=\"submit[$name]\" value=\"1\" />";

   }


   /**
    * evaluates a submitted plugin/settings edit form
    * - using the <form> array names as defined in the previous methods
    *
    */
   function form_receive() {
   
      #-- lists of settings, plugins
      $submitlist = (array)$_REQUEST["submit"];   // which form elements are present
      $setplugin = (array)$_REQUEST["plugin"];    // on/off
      $setoption = (array)$_REQUEST["setting"];   // value
      $previous = (array)$_REQUEST["previous"];   // let's avoid resetting defaults

      #-- peak at each
      foreach ($submitlist as $FORMname=>$is) {
         $name = urldecode($FORMname);

         #-- plugin?
         if (isset($this->pmd->plugin[$name])) {
            $this->assign($name, $setplugin[$FORMname]);
         }
         #-- setting?
         elseif (isset($this->pmd->config[$name])) {

            // only add, if it isn't default value / identical to current setting
            if ($previous[$FORMname] != $setoption[$FORMname])
            {
               $this->assign($name, "$setoption[$FORMname]");   // convert to string, fixes boolean handling

               // fix boolean redisplay in form code above (else ->state() returns null)
               //$this->cfg->cf[  $this->cfg->find_enabled($name) ]->value = "$setoption[$FORMname]";
            }
            else {
               // "unwanted default for $name<br>";
            }

         }
         else {
            // unrecognized $name
         }
      }
      
      #-- done
      $this->save();
   }   

}




?>