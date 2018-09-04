<?
	function f($Name) {
		return $Name[shortevent];
	}
    function GetByDate($month, $day, $year, $fstring)
    {
	  global $DB;
	  
      $chkdate = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
      $query = "SELECT shortevent, id FROM calendar_data WHERE ( eventdate='$chkdate') $fstring GROUP BY calendar_data.id ORDER BY eventtime";
	  $result = $DB->Query($query);
      return $result;
    }
    
    function GetYearly($month, $day)
    {
      global $DB;
	  
      $chkdate = date("1900-m-d", mktime(0, 0, 0, $month, $day, 0));
      $query = "SELECT shortevent, id FROM calendar_data WHERE eventdate='$chkdate' ORDER BY eventtime";
      $result = $DB->Query($query);
      return $result;
    }
    
    function GetMonthly($day)
    {
      global $DB;
      $chkdate = date("1900-00-d", mktime(0, 0, 0, 0, $day, 0));
      $query = "SELECT shortevent, id FROM calendar_data WHERE eventdate='$chkdate' ORDER BY eventtime";
      $result = $DB->Query($query);
      return $result;
    }

    function GetWeekly($weekday)
    {
		return ;
    }
    
    function GetYearlyRecurring($month, $weekday)
    {
		return;
    }
    
    function GetMonthlyRecurring($weekday)
    {
      
		return;
    }

    function GetFullByDate($month, $day, $year)
    {
      global $DB;
      $chkdate = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
      $query = "SELECT longevent, eventtime FROM calendar_data WHERE eventdate='$chkdate' ORDER BY eventtime";
      $result = $DB->Query($query);
      return $result;
    }
    
    function GetFullYearly($month, $day)
    {
      global $DB;
      $chkdate = date("1900-m-d", mktime(0, 0, 0, $month, $day, 0));
      $query = "SELECT longevent, eventtime FROM calendar_data WHERE eventdate='$chkdate' ORDER BY eventtime";
      $result = $DB->Query($query);
      return $result;
    }
    
    function GetFullMonthly($day)
    {
      global $DB;
      $chkdate = date("1900-00-d", mktime(0, 0, 0, 0, $day, 0));
      $query = "SELECT longevent, eventtime FROM calendar_data WHERE eventdate='$chkdate' ORDER BY eventtime";
      $result = $DB->Query($query);
      return $result;
    }

    function GetFullWeekly($weekday)
    {
		return;
    }
    
    function GetFullYearlyRecurring($month, $weekday)
    {
		return;
    }
    
    function GetFullMonthlyRecurring($weekday)
    {
		return;
    } 

    
    function GetRecurList($rights, $userid)
    {
       	return;
    }

    function GetRepeatList($rights, $userid)
    {
       
		return;
    }
?>