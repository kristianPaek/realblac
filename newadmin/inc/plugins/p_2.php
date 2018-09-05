<?php
/**
 * api: php
 * title: config.php editing
 * description: works non-destructively on configuration php scripts
 * priority: never
 * category: library
 * author: milky
 * license: Public Domain
 * version: 0.9
 * url: http://freshmeat.net/projects/genericplugin/
 * 
 *  Instead of resorting to .INI configuration settings, or XML config
 *  data or even a SQL table, you can use an ordinary PHP script to hold
 *  application settings. This is not only faster, but allows custom by-
 *  hand modifications.
 *  Visual and guided editing are however affected unless that file gets
 *  overwritten on modifications (like PEAR::Config does). So this is
 *  what libconfigedit tries to achieve - make a config.php script
 *  editable from an UI but ensure that comments, custom additions and
 *  code are retained. Then you can use either a text editor or online
 *  config utility.
 *
 *  As configuration settings a block of followingly formatted commands
 *  are recocgnized: (image the file without the dashes)
 *     +-----------------------------------------------------------
 *     |<?php
 *     |
 *   Y |$cfg_array["set1"] = "value";  # only array[] vars are seen
 *   Y |define("SETTING", 123);        # can hold numbers, strings
 *   Y |include_once(".../plugin.php");  // comments are retained
 *     |
 *   C |#include("old.php");           // recognized as disabled plugin
 *     |
 *     |$plain_var = 1;                // ignored, only arrays allowed
 *     |$cfg_var["ok"] = 7 + 5 + x();  // no static value, ignored
 *     |xyz_load("myplugin.php");      // not in our parsing regex
 *     |
 *     |  include_once("old.php");     # ignored
 *     |if (1) { ignored_command(); }  # all else gets ignored too
 *     |
 *  Only plugin/assign/define commands at the start of a line get read
 *  and modified. Leading spaces take things out from treatment, while
 *  uncommented plugins get still "recognized" and eventually reenabled
 *  later (or stripped if doublettes). Other php statements / comments
 *  may appear and are retained after plugin includes, var assignments
 *  and define commands.
 *
 *  It operates only on a single script, loads it, edits it, writes it
 *  back. And a separate editing UI must handle and provide exact plugin
 *  and variable lists, inject $sort-ing info, and when to remove/add
 *  entries then:
 *
 *   $config = new generic_config_edit("./config.php");
 *   $config->add_plugin("captcha", "plugins/lib/captcha.php");
 *   $config->remove_constant("EWIKI_ABORT_ON_ERRORS");
 *   $config->add_variable("app_config[edit_text][]", "Here...");
 *   $config->write();
 *
 *  Plugin names and constants must be alphanumeric. Variable names
 *  have to be array-like, but without leading $, no " inside array
 *  braces, and only alphanumeric hash indicies. (= like PHP accepts
 *  them from submitted <form>s.)
 *  
 *  While load in the class, the current config file and its text lines
 *  are hold in the "cf" array, with following fields:
 *    ->cf[$i]->ctype     0=else, 1=plugin, 2=variable, 3=constant,
 *                        and -1,-2 and -3 are commented out variants
 *    ->cf[$i]->name      plugin name, or variable name, or constname
 *    ->cf[$i]->value     filename, var content, define value
 *    ->cf[$i]->sort      ordering for plugins (most are just zero)
 *    ->cf[$i]->textline  current config.php script text line
 *    ->cf[$i]->cuttext   textline end, with incl(..) or var=x stripped
 *
 *  Use this class in conjunction with libconfig.
 */



/**
 * Non-destructive config.php editing.
 * 
 *
 * initialize:
 *   new generic_config_edit($filename)
 * supply data:
 *   set_sorting_order($name, $sort)
 *   set_sorting_order($namesort_hash)
 * insert command:
 *   add_plugin($name, $filename)
 *   add_setting($name, $value)
 *   add($ctype, $name, $value, $sort=0)
 * remove command:
 *   remove_plugin($name_or_fn)
 *   remove_setting($name)
 *   remove($name, $uncomment=1)
 * save back:
 *   write($filename)
 * 
 */
class generic_config_edit {


   /**
    * filename, and original content
    * 
    */
   var $fn;    // filename "config.php"
   var $origcf;  // original content
   var $start, $end;  // indicies in $cf[] designate treated config area/block
   var $ctype = array( "plugin"=>1, "variable"=>2, "constant"=>3, 'else'=>0,'comment'=>0,'include'=>1,'assign'=>2,'define'=>3,'load'=>1,'var'=>2,'const'=>3, );

   /**
    * the parsed config file,
    * separated into indexed lines[] and with delimited content / control information,
    * used to in-place modify plugin include() commands and variable assignments
    *
    * each line[] contains a config_line_info object, with following attributes:
    *   ->ctype  ->name  ->value  ->sort  ->line  ->trail
    */
   var $cf = array();





   /**
    * constructor
    *
    * @param string $filename    where to read the 'config.php' file from
    *
    */
   function generic_config_edit($filename) {
      if (is_readable($this->fn = $filename)) {
         $this->read();
      }
   }


   
   /**
    * get config file and analyse lines
    * 
    */
   function read() {
      $this->origcf = file($this->fn);
      $this->cf = $this->analyse($this->origcf);
      $this->clean_doublettes();
      $this->determine_config_block();
   }



   /**
    * write the assembled configuration text lines back into a
    * real file
    *
    * @param  string $filename  (optional)
    */
   function write($filename="") {

      if (!$filename) {
         $filename = $this->fn;
      }
      /**
       * combine all lines, check for errors prior writing
       *
       * @param  mixed $php_source  
       * @return mixed
       */
      if (($new_content = $this->assemble()) && empty($this->error) && $this->lint($new_content)) {

// EDIT CONTENT BEING WRITTEN;
$save_content = str_replace("?>","",$new_content);
$save_content .="?>";

         return file_put_contents($filename, $save_content);
      }
      else {
         $this->error("didn't write, due to former erros");
      }
   }


   /**
    * check php syntax,
    * @stub at the moment
    *
    * @param string $php_source  
    * @return bool
    */
   function lint($php_source) {
      return true;
   }




   /**
    * injects a line into the configuration file array
    *
    * if its a plugin, var or const is determined by the $ctype parameter,
    * the right position is automatically searched using $sort
    *
    * @param int/str $ctype    syntax type
    * @param  string $name     plugin or var name
    * @param   mixed $value    data or filename
    * @param integer $sort     grouping info
    * @return  bool
    */
   function add($ctype=0, $name, $value, $sort=0) {
   
      // fix parameters
      $ctype = $this->guess_ctype($ctype, $name, $value);
      if (!$ctype) { return; }

      // check if it is already there
      if ($i = $this->find($name)) {
         $this->modify_line($i, $ctype, $name, $value, $sort);
         return 1;
      }
      
      // walk through to find the right position
      if ($i = $this->sort_position($sort)) {
         $this->inject_line($i, $ctype, $name, $value, $sort);
         return 1;
      }
   }
   // alias
   function add_plugin($name, $filename, $sort=0) {
      $this->add("plugin", $name, $filename, $sort);
   }
   // alias
   function add_setting($name, $value="", $sort=0) {
      $ctype = $this->guess_ctype(0, $name, $value);
      #echo "add_setting($ctype, $name, $value) ";
      $this->add($ctype, $name, $value, $sort);
   }
   // alias
   function add_variable($name, $value="", $sort=0) {
      $this->add("variable", $name, $value, $sort);
   }
   // alias
   function add_constant($name, $value="", $sort=0) {
      $this->add("constant", $name, $value, $sort);
   }


   /**
    * disable or remove a plugin, variable or constant
    * (maybe multiple occourences)
    *
    * @param  string $name        plugin or var name
    * @param  integer $uncomment  delete=0 or just outcomment=1
    * @return integer      how many occourences were removed (should mostly be 1)
    */
   function remove($name, $uncomment=1) {
      // look if it's there more than once, don't care about $ctype
      while ($i = $this->find($name, $i)) {
         $this->remove_line($i, $uncomment);
         // only first occourence #uncommented, doublettes get removed
         $uncomment = 0;
         $n++;
      }
      return $n;
   }
   // alias
   function remove_plugin($name_or_fn, $unc=1) {
      if (strpos($name_or_fn, "/")) {
         $name_or_fn = basename($name_or_fn, ".php");
      }
      return $this->remove($name_or_fn, $unc);
   }
   // alias
   function remove_setting($name, $unc=1) {
      switch ($this->guess_ctype(0, $name, "") == 2) {
         case 2: return $this->remove_variable($name, $unc);
         case 3: return $this->remove_constant($name, $unc);
      }
   }
   // alias
   function remove_variable($name, $unc=1) {
      $name = $this->clean_varname($name);
      return $this->remove($name, $unc);
   }
   // alias
   function remove_constant($name, $unc=1) {
      return $this->remove($name, $unc);
   }





   #-----------------------------------------------------------------





   /**
    * uncomment or delete out a given line in the config file array
    *
    * @param  mixed $i         file line/position
    * @param  bool $uncomment  remove really=0
    */
   function remove_line($i, $uncomment=1) {
#echo "rm:$i:uncomment=$uncomment\n";
      // really remove
      if (($this->cf[$i]->ctype < 0) or !$uncomment) {
#echo "REALLY_REMOVE\n";
         array_splice($this->cf, $i, 1);
         $this->end--;
      }
      // just uncomment
      else {
         $this->cf[$i]->ctype = -1 * abs($this->cf[$i]->ctype);
         $this->cf[$i]->line = "#" . $this->cf[$i]->line;
      }
   }



   /**
    * patch the given line ->$cf[$i] in the config file array,
    * set new values
    *
    * @param  mixed $i        file line/position
    * @param  mixed $ctype    syntax type
    * @param string $name     plugin or varname
    * @param  mixed $value    var data or plugin filename
    * @param  mixed $sort     grouping order
    */
   function modify_line($i, $ctype, $name, $value, $sort) {


      // concat new cfg command with old line end
      $this->cf[$i]->line = $this->new_config_command($ctype, $name, $value)
                          . $this->cf[$i]->trail;
      $this->cf[$i]->ctype = $ctype; // update
      $this->cf[$i]->name = $name;
      $this->cf[$i]->value = $value;
      $this->cf[$i]->sort = $sort;
      $this->cf[$i]->dbg .= "*";

   }



   /**
    * add a text line at the given position in the config file array,
    * set values as if it came from the parser
    *
    * @param  mixed $i        file line/position
    * @param  mixed $ctype    syntax type
    * @param string $name     plugin or varname
    * @param  mixed $value    var data or plugin filename
    * @param  mixed $sort     grouping order
    */
   function inject_line($i, $ctype, $name, $value, $sort) {

      // add empty element
      $a = new generic_config_line(0,"","",0,"#...\n","\n","+");
 
      array_splice($this->cf, $i, 0, array($a));
      // set values
 
      $this->modify_line($i, $ctype, $name, $value, $sort);
      // advance control variables
      $this->end++;
   }



   /**
    * create new include/name/value config.php script command according to $ctype pattern/format
    *
    * @param  mixed $ctype    syntax type
    * @param string $name     plugin or variable name
    * @param  mixed $value    data or filename
    * @return string          completed php script line
    */
   function new_config_command($ctype, $name, $value) {
      // encode strings for syntactic reasons,
      // but doesn't prevent specials like "? >"
      $value = addslashes($value);
      $name = addslashes($name);  // redundant for name, but do it anyhow
      switch ($ctype) {
         // plugins are easy:
         case 1:

            $s = "include_once(\"$value\");"; 
            break;
         // variable assignments have Array[args] without the ["quotes"] normally:
         case 2:
            $s = $this->varname_to_php_expression($name)
               . " = ". $this->value_to_php_expression($value) . ";";
            break;
         // constants name must be all-alphanumeric
         case 3:
            if (!preg_match("/^\w+$/", $name)) {
               $this->error("constant name '$name' invalid");
            }
            $s = 'define("' . $name . '", ' . $this->value_to_php_expression($value) . ');';
            break;
         default:
      }
      return $s;
   }


   /**
    * convert '$varname["arg"]["xyz"]' into 'varname[arg][xyz]' name,
    * (like used in PHP submission forms)
    *
    * @param string $cmd  
    */
   function clean_varname($cmd) {
      return ltrim(preg_replace("_[\"\']+_", "", stripslashes($cmd)), "$");
   }


   
   /**
    * rebuild php expression from varname[without][quotes] and $ prefix
    *
    * @param  string $name  
    * @return string
    */
   function varname_to_php_expression($name) {
      // safety check and transform
      if (preg_match("/^\w+(\[[-_.\w\d]*\])+$/ims", $name)) {
         $name = preg_replace("/\[([^\]]+)\]/", '["$1"]', $name);
         return "\$$name";
      }
      else { $this->error("varname '$name' invalid"); }
   }



   /**
    * encapsulate "strings" or convert numbers into integers
    *
    * @param  string $value  
    * @return mixed
    */
   function value_to_php_expression($value) {   
      return (preg_match("/^\d+$/", $value) ? (int)$value : "'".$this->clean_value($value)."'");
   }



   /**
    * filter variable/constant value (remove syntax breaking newlines, e.g.)
    *
    * @param  string $v  
    * @return string
    */
   function clean_value($v) {
      $v = preg_replace("/[\r\n\001-\007\011-\037\'\"\\\$]/", " ", $v);
      $v= strtr($v, "\000", " ");
      return $v;
   }
   
   
   
   /**
    * generate output textfile from modified $cf[] entries
    * 
    * @return string    a php script
    */
   function assemble() {
      $out = "";
      for ($i=0; $i<count($this->cf); $i++) {
         $out .= ($this->cf[$i]->line);
      }
      return($out);
   }



   /**
    * categorise each individual line, extract basic info
    * 
    */
   function analyse($lines) {
      $cf = array();
   
      #-- peek at each text line
      #   (- note that we don't trim the right side \n off !)
      foreach ($lines as $line) {
         list($ctype, $name, $value, $sort, $orig, $trail) = array(0, false, false, 0, $line, $line);

         // plugin include
         if (preg_match("<^#*\@?(load_plugin|include|require|include_once|require_once)\s*\([\"\'](\w[-/.\w]+)[\"\']\)\s*;>ims", $line, $uu)) {
            $ctype = 1;
            $value = $uu[2];
            $name = basename($value, ".php");   // we don't work on .inc files
            $sort = 0;
         }
         // var=value assignment
         elseif (preg_match("<^#*\@?[\$]([_\w]+\[.+?\])\s*=\s*(?:[\"\'](.*?)[\"\']|([\d]+))\s*;>ims", $line, $uu)) {
            $ctype = 2;
            $name = $this->clean_varname($uu[1]);
            $value = stripslashes($uu[2]);
            if (isset($uu[3])) {
               $value = $uu[3];
            }
            $sort = -100;
         }
         // constant definition
         elseif (preg_match("<^#*\@?define\s*\(\"([_\w]+)\"\s*,\s*[\"\']?(.+?)[\"\']?\)\s*;>ims", $line, $uu)) {
            $ctype = 3;
            $name = $uu[1];
            $value = stripslashes($uu[2]);
            $sort = -100;
         }
         // something else
         else {
            # then we don't care
         }
         
         #-- keep cutted-out textline (for later ->add/remove/modify() use)
         if ($ctype && strlen($uu[0])) {
            $trail = substr($orig, strlen($uu[0]));
         }
         
         #-- detect if just commented out (disabled plugin, assign, define)
         if (preg_match("<^[#]+[@]?[\$]?[\w]+>ims", $line)) {
            $ctype = $ctype * -1;
         }
         
         #-- append line info
         $cf[] = new generic_config_line($ctype, $name, $value, $sort, $orig, $trail);
      }
      
      return($cf);
   }



   /**
    * try to deduce ctype integer (plugin/variable/const) from $name
    *
    * @param int/str $ctype    already integer or abbreviation ("plugin" or "var")
    * @param  string $name     variable or plugin name
    * @param  string $value    data or filename
    * @return integer          real $ctype
    */
   function guess_ctype($ctype, $name, $value) {
      if (($ctype <= 0) or ($ctype >= 4)) {
         if ($ctype = $this->ctype[$ctype]) {
            //
         }
         elseif (strpos($value, $name) && preg_match("_^[-/.\w]+\.php$_")) {
            $ctype = 1;
         }
         elseif (strpos($name, "[")) {
            $ctype = 2;
         }
         elseif (preg_match("/^\w+$/", $name)) {
            $ctype = 3;
         }
         else {
            $ctype = 0;
         }
      }
      return($ctype);
   }



   /**
    * remove disabled/double entries
    * (some plugins/variables/constants might appear twice, sometimes commented out)
    *
    */
   function clean_doublettes() {
      // not strictly necessary to do,
      // plugins might be even added purposefully twice
   }
   


   /**
    * isolate where the editable area is (consecutive plugin/variable statements)
    * - searches for first/last ->ctype!=0 entry
    * - and a maximum of five empty lines to count it in
    *
    *   ...2.......2.23....2..332212.11121.1311.1..2........1...3...
    *              ^                               ^
    *
    * @object $start
    * @object $end
    *
    */
   function determine_config_block() {
      $start = 0;
      $end = count($this->cf) - 1;
      #-- find start
      $start = $this->find_consecutive($start, $end, +1, 5);
      #-- find end
      $end = $this->find_consecutive($end, $start, -1, 5);
      #-- check
      if (!$start || !$end || ($start + 5 > $end)) {
         $start = 0;
         $end = count($this->cf) - 1;
      }
      $this->start = $start;
      $this->end = $end;
   }
   function find_consecutive($from, $to, $step, $num) {
      for ($i=$from; $i!=$to; $i+=$step) {
         if (/*is_entry*/ $this->cf[$i]->ctype != 0) {
            $not_lines = 0;
            if ($yes_lines++ >= $num) {
               break;
            }
            if (!isset($i_begin)) { 
               $i_begin = $i;   // first possible $i, save until break; 
            }
         }
         elseif ($not_lines++ >= $num) {
            $yes_lines = 0;
            unset($i_begin);    // to many nots, reset saved $i
         }
      }
      return $i_begin;
   }



   /**
    * search for first occourence of $name entry in config data list,
    * and return its ->$cf[] index
    *
    * @param   string $name    plugin or var name
    * @param  integer $i       start searching from index $i (for repeated searches)
    * @return integer          position or NULL
    */
   function find($name, $i=NULL) {
      if (isset($i)) {
         $i += 1; // find next
      }
      else {
         $i = $this->start;
      }
      for ($i=$i; $i<=$this->end; $i++) {
#echo "find:$name:$i:{$this->cf[$i]->name}\n";
         if ($this->cf[$i]->name == $name) {
            return $i;
         }
      }
      return NULL;
   }
   function find_enabled($name) {
      while ($i = $this->find($name, $i)) {
         if ($this->cf[$i]->ctype > 0) {
            return $i;
         }
      }
   }
   


   /**
    * get last $cf[$i] spot smaller than $sort class
    *
    * @param  integer $sort  
    * @return integer
    *
    */
   function sort_position($sort) {
      $s = -65535;
      for ($i=$this->start; $i<=$this->end; $i++) {
         $line_sort = $this->cf[$i]->sort;
         if (($this->cf[$i]->ctype) && ($line_sort > $sort)) {
#echo "sort:$i:$sort>$line_sort:\n";
            $i--;
            break;
         }
      }
      // done
      return($i);
   }


   /**
    * set sorting info in existing plugin lines
    *
    * @param array $name    an array with name=>sort pairs
    *
    */
   function set_sorting_order($name, $sort=NULL) {
      if (is_array($name)) {
         $ordering_list = $name;
         foreach ($this->cf as $i=>$row) {
            if (($sort = @$ordering_list[$this->cf[$i]->name]) && isset($sort)) {
               $this->cf[$i]->sort = $sort;
            }
         }
      }
      else {
         while ($i = $this->find($name, $i)) {
            $this->cf[$i]->sort = $sort;
         }
      }
   }



   /**
    * throw errors
    *
    * @param string $s
    */
   function error($s) {
      trigger_error($s, E_USER_WARNING);
      $this->error = 1;
   }

}



/**
 *  config file text line entry for ->cf[] list
 *  (only exists to avoid numeric arrays)
 *
 */
class generic_config_line {
   function generic_config_line($ctype, $name, $value, $sort, $line, $trail, $dbg=NULL) {
      $this->ctype = $ctype;
      $this->name = $name;
      $this->value = $value;
      $this->sort = $sort;
      $this->line = $line;
      $this->trail = $trail;
      if ($dbg) { $this->dbg = $dbg; }
      return($this);
   }
}



?>