<?php
$subd = "../../../";
require_once $subd . "inc/config.php";
require "layout.inc.php";
require "functions.php";

if(!isset($_SESSION['auth']) || $_SESSION['auth'] != "yes"){
header("location: ../../../index.php");
die();
}

	print '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<title>Untitled Document</title>
	<meta http-equiv="Content-Type" content="text/html; charset='.$_SESSION['lang_charset'].'">
	</head>';

	// GET ARRAY OF MY FRIENDS IDS TO SEARCH THE EVENTS
	$myFriends = GetFriendIDS();

   if (!isset($_REQUEST['month']) || $_REQUEST['month'] == "" || $_REQUEST['month'] > 12 || $_REQUEST['month'] < 1)
   {
      $month = date("m");
   }else{
  	 $month = strip_tags(trim($_REQUEST['month']));
   }
   if (!isset($_REQUEST['year']) || $_REQUEST['year'] == "" || $_REQUEST['year'] < 1972 || $_REQUEST['year'] > 2036)
   {
      $year = date("Y");
   }else{
   	$year = strip_tags(trim($_REQUEST['year']));
   }

   $timestamp = mktime(0, 0, 0, $month, 1, $year);
   
   $current = date("F Y", $timestamp);

   if ($month < 2)
   {
      $prevmonth = 12;
      $prevyear = $year - 1;
   }
   else
   {
      $prevmonth = $month - 1;
      $prevyear = $year;
   }

   if ($month > 11)
   {
      $nextmonth = 1;
      $nextyear = $year + 1;
   }
   else
   {
      $nextmonth = $month + 1;
      $nextyear = $year;
   }

   $backward = date("F Y", mktime(0, 0, 0, $prevmonth, 1, $prevyear));
   $forward = date("F Y", mktime(0, 0, 0, $nextmonth, 1, $nextyear));

   $first = date("w", mktime(0, 0, 0, $month, 1, $year));
   
   $lastday = 28;
   
   for ($i=$lastday;$i<32;$i++)
   {
      if (checkdate($month, $i, $year))
      {
         $lastday = $i;
      }
   }
   
   function AddDay($fday, $fmonth, $fyear, $ThisEventData)
   {


		

		if(!empty($ThisEventData)){

			$fvar="";
			foreach($ThisEventData as $data){
				$fvar .= $data['name'];
				$schurl = DB_DOMAIN.'index.php?dll=calendar&sub=view&item_id='.$data['id'];
			}

			
		}else{
			$fvar="";
		}


      if (!isset($fday) || $fday == "")
      {
         echo '	<TD class="calendar" align="left" valign="top" width=90 height=70>&nbsp;';
      }
      else
      {
         

         if (date("m") == $fmonth && date("Y") == $fyear && date("j") == $fday)
         {
            echo '	<TD ID="day'.$fday.'" class="curday" style="cursor: hand" align="left" valign="top" width=90 height=70 
		onClick="parent.location.href=\''.$schurl.'\'" target="_parent">';
         }
         else
         {
            echo '	<TD ID="day'.$fday.'" class="calendar" style="cursor: hand" align="left" valign="top" width=90 height=70 

		onClick="parent.location.href=\''.$schurl.'\'" target="_parent">';
         }
         echo '		<b>'.$fday.'</b><br>';
         if (isset($fvar) && $fvar != "")
         {
            echo '		<A class=\'calendar\' style="cursor: hand" onClick="parent.location.href=\''.$schurl.'\'" target="_parent">';
            echo '		'.$fvar.'		</A>';
         }
      }
      echo '	</TD>';
   }

   function FillDay($dayofweek, $dayofmonth, $thismonth, $thisyear, $myFriends)
   {
   	  global $DB;
      $textbody = ''; $ThisEvent = array();$i=1;
	  
      $nr = GetByDate($thismonth, $dayofmonth, $thisyear, $myFriends);

	  while( $coRow = $DB->NextRow($nr) ){

	  	$ThisEvent[$i]['name'] = $coRow['shortevent'];
		$ThisEvent[$i]['id'] = $coRow['id'];
	  	$i++;
		
	  }  

      return $ThisEvent;
   }
   echo '<STYLE TYPE="text/css">
	<!--
		BODY {background-color: #'.$background_color.'; border-style: none; border-width: 0px; color: #'.$plain_text_color.'; 
			font-family: Arial; font-size: 12px; font-style: normal; margin: 0px;padding:0px;
			text-align: left; text-decoration: none; text-indent: 0px}
		A {border-style: none; border-width: 0px; color: #'.$link_color.'; font-family: Arial; font-size: 12px; 
			font-style: normal; margin: 0px; padding: 0px; text-align: left; text-decoration: none;
			text-indent: 0px}
		A.normal {font-size: 12px; text-decoration: underline}
		A.calendar {color: #'.$calendar_link_color.'; font-size:10px}
		A.bottom {color: #'.$link_color.'; font-size:10px}
		P {font-size: 10px; text-align:center; color: #'.$link_color,'}
		IMG {border-style: none; border-width: 0px; margin: 0px; padding: 0px}
		TABLE {border-style: none; margin: 0px; padding: 0px; border-width: none; font-size: 12px; text-indent: 0px;
			font-weight: normal; width: 580px; background-color: #'.$calendar_bg_color.'; color: #'.$plain_text_color.'}
		TABLE.top {width: 100%; height: 60px}
		TABLE.form {width: 100%; height: 60px; text-align: center; border-style:none; border-width: 0px; background-color: #'.$background_color.'; color: #'.$plain_text_color.'}
		TR {border-style: none; border-width: 0px; margin: 0px; padding: 0px}
		TD {border-style: solid; border-width: thin; margin: 0px; padding: 0px; border-color: #'.$calendar_border_color.';	border-width:1px; font-weight: normal; background-color: #'.$calendar_bg_color.'}
		TD.top {padding: 4px; font-size: 16px; height: 60px; text-align:center; font-weight: bold; 	border-style: none; border-width: 0px}
		TD.ends {padding: 4px; font-size: 12px; height: 60px; text-align: center; border-style: none; border-width: 0px; font-weight: bold}
		TD.form {padding: 0px; font-size: 12px; border-style: none; border-width: 0px; background-color: #'.$background_color.'; color: #'.$plain_text_color.'}
		TD.days {padding: 2px; font-size: 12px; width: 70px; height: 40px; text-align:center; font-weight: bold}
		TD.curday {width: 70px; text-align: left; font-size: 10px; height: 70px; background-color: #'.$current_day_color.'}
		TD.calendar {width: 70px; text-align: left; font-size: 10px; height: 70px}
	-->
	</STYLE>
';
	echo '</HEAD>
';
	echo '<BODY TOPMARGIN=0 LEFTMARGIN=0 MARGINHEIGHT=0 MARGINWIDTH=0>
	<CENTER>
	<TABLE cellspacing=0 cellpadding=0 width=560 border=0>
	<TR>
	<TD class="form" align="center" valign="bottom" width="100%" COLSPAN=7>
		<FORM METHOD="post" ACTION="calendar.php">
		<TABLE class="form" cellspacing=0 cellpadding=0 width="100%" border=0>
		<TR>
		<TD class="form" align="left" valign="bottom">
			<b>'.$GLOBALS['_LANG']['_month'].':</b> <select name="month">
';
$la=1;

			for ($j=1;$j<=12;$j++)
			{
			   echo'<option value='.$j;
			   if ($month == $j)
			   {
			      echo ' selected';

$ThisMonth = MakeCalendarMonth($la);
$tat1 = $la+1;
$NextMonth = MakeCalendarMonth($tat1);
$tat = $la-1;
$BackMonth = MakeCalendarMonth($tat);

			   }


			   echo '>'.MakeCalendarMonth($j).'
			   ';
$la++;
			}
			echo '			</select>			
		         &nbsp;&nbsp;<b>'.$GLOBALS['_LANG']['_year'].':</b> <select name="year">
';
			for ($j=2008;$j<=2018;$j++)
			{
			   echo'<option value='.$j;
			   if ($year == $j)
			   {
			      echo ' selected';

			   }
			   echo '>'.$j.'
			   ';
			}
			echo '			</select>
			 &nbsp;&nbsp;<input type="submit" value="'.$GLOBALS['_LANG']['_search'].'">			
		</TD>
		</TR>
		<TR>
		</TR>
		</TABLE>
		</FORM>
	</TD>	
	</TR>
	<TR>
	<TD align="center" valign="middle" height=60 COLSPAN=7>
		<TABLE class="top" cellspacing=0 cellpadding=0 width=560 border=0>
		<TR>
		<TD class="ends" nowrap align="center" valign="bottom">
			<A HREF="calendar.php?month='.$prevmonth.'&year='.$prevyear.'"><< '.$BackMonth.'</a>
		</TD>
		<TD class="top" nowrap align="center" valign="middle" width=350 style="height:5px;">';
   echo '<br>'.$ThisMonth.'
		</TD>
		<TD class="ends" nowrap align="center" valign="bottom">
			<A HREF="calendar.php?month='.$nextmonth.'&year='.$nextyear.'">'.$NextMonth.' >></a>
		</TD>
		</TR>
		</TABLE>
	</TD>
	</TR>
	<TR>';
   if (isset($start_day) && $start_day <= 6 && $start_day >= 0)
   {
      $n = $start_day;
   }
   else
   {
      $n = 0;
   } 
   for ($i=0;$i<7;$i++)
   {
      if ($n > 6)
      {
         $n = 0;
      }
      if ($n == 0)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_sunday'].'</TD>';
      }
      if ($n == 1)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_monday'].' </TD>';
      }
      if ($n == 2)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_tuesday'].'	</TD>';
      }
      if ($n == 3)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_wednesday'].'	</TD>';
      }
      if ($n == 4)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_thursday'].'	</TD>';
      }
      if ($n == 5)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_friday'].'	</TD>';
      }
      if ($n == 6)
      {
         echo '	<TD class="days" nowrap align="center" valign="middle" width=90 height=40>		'.$GLOBALS['_LANG']['_saturday'].'</TD>';
      }
      $n++;
   }
   echo'	</TR>
';
   $calday = 1;
   while ($calday <= $lastday)
   {
/* Alternate beginning day of the week for calendar view was created by Marion Heider of clixworx.net. */
      echo '<TR>';
      for ($j=0;$j<7;$j++)
      {
         if ($j == 0)
         {
            $n = $start_day;
         }
         else
         {
            if ($n < 6)
            {
               $n = $n + 1;
            }
            else
            {
               $n = 0;
            }
         }
         if ($calday == 1)
         {
            if ($first == $n)
            {
 
               $info = FillDay($n, $calday, $month, $year, $myFriends);
               AddDay($calday, $month, $year, $info);
               $calday++;
            }
            else
            {
               AddDay('', '', '', '');
            }
         }
         else
         {
            if ($calday > $lastday)
            {
               AddDay('', '', '', '');
            }
            else
            {
               $info = FillDay($n, $calday, $month, $year, $myFriends);
               AddDay($calday, $month, $year, $info);
               $calday++;
            }
         }
      } 
      echo '</TR>';
   }
   echo '</TABLE></CENTER></body></html>';
?>