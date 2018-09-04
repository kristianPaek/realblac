<?
## block direct page access
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>

<div class="TopMatches"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div><br>
<p><?=$PageDesc  ?></p>











<? if(isset($show_page) && ( $show_page !="home" ) ){  ?>

<link rel="stylesheet" href="<?=DB_DOMAIN ?>inc/css/_profile.css" type="text/css">
<div id="eMeeting" class="user">
  <div class="header account_tabs">
    <ul>	 	
		<li <? if($show_page=="test"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test"><span><?=$LANG_MATCH_MENU['test'] ?></span></a></li>
		<li <? if($show_page=="taken"){ ?>class="selected"<? } ?>><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=taken"><span><?=$LANG_MATCH_MENU['taken'] ?></span></a></li>
    </ul>
    <div class="ClearAll"></div>
 </div>
</div>
<br>
<? } ?>




<? if($show_page=="home"){ 

	 /**
	 * Page: Match Options
	 *
	 * @version  8.0
	 * @created  Fri Jan 18 10:48:31 EEST 2008
	 * @updated  Fri Sep 24 16:28:31 EEST 2008
	 */

?>




	<b class="b1f"></b><b class="b2f"></b><b class="b3f"></b><b class="b4f"></b><div class="contentf"><div style="margin-right:10px;"><div style="padding:10px;font-weight:bold;"> <h3 style="padding:0px; margin:0px;"></h3>
	</div>
	<b class="i1f"></b><b class="i2f"></b><b class="i3f"></b><b class="i4f"></b><div class="contenti" style="margin-left:0px;">
		
	
	
	<style>
	.s1 { background: url(images/DEFAULT/_icons/new/acc/mat_1.jpg) no-repeat; background-position: 0% 50%}
	.s2 { background: url(images/DEFAULT/_icons/new/acc/mat_2.jpg) no-repeat; background-position: 0% 50%}
	.s3 { background: url(images/DEFAULT/_icons/new/acc/mat_3.jpg) no-repeat; background-position: 0% 50%}
	</style>
	
	
<?=BuildPageHomeMenu($SubSub_Lang, $page) ?>
	
	
	<br><br>
	</div>
	<b class="i4f"></b><b class="i3f"></b><b class="i2f"></b><b class="i1f"></b></div></div><b class="b4f"></b><b class="b3f"></b><b class="b2f"></b><b class="b1f"></b>
	
	
	<div class="ClearAll"></div>

 
<? }elseif($show_page=="addquiz"){

/*
create a new quiz
*/

?>

<script>
function MakeIconSelection(icon){
	document.getElementById('QuizIconImage').innerHTML='<img src="<?=DB_DOMAIN ?>images/DEFAULT/_quiz/'+icon+'.png" width="48" height="48">';
	document.getElementById('QuizIconPhoto').value = icon;
}
</script>
<form action="<?=DB_DOMAIN ?>index.php" method="post">
<input name="do_page" type="hidden" value="matches" class="hidden">
<input name="sub" type="hidden" value="test" class="hidden">
<input type="hidden" name="do" value="new" class="hidden">
<input type="hidden" name="QuizIcon" value="1" class="hidden" id="QuizIconPhoto">
<? if(isset($edit_array)){ ?>
<input name="eid" type="hidden" value="<?=$item_id ?>" class='hidden'>
<? } ?>
<ul class="form"> 
<div class="CapBody">
 
	<li><label><?=$GLOBALS['_LANG']['_title'] ?>:</label><input class="input" name="quizTitle" size='40' maxlength='300' value="<? if(isset($edit_array)){ print $edit_array['title']; } ?>">
	<div class="tip"> EXAMPLE TITLE: Let us find out if we are compatible! </div>
	</li>
	
<li><label>LoveQuiz Icon<BR /><span id="QuizIconImage"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_quiz/<? if(isset($edit_array)){ print $edit_array['icon']; }else{ print "1";} ?>.png" width="48" height="48"></span></label>
	<div style="width:330px; background:#eeeeee; height:80px; border:1px dashed #666666; padding:5px; overflow:auto;">
<table width="310"  border="0" cellspacing="8">
  <tr align="center">
    <td width="73"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_quiz/1.png" width="48" height="48" onClick="MakeIconSelection(1); return false;" style="cursor:pointer;"></td>
 <td width="73"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_quiz/2.png" width="48" height="48" onClick="MakeIconSelection(2); return false;" style="cursor:pointer;"></td>
  </tr>
</table>


</div>

</li>
	<input value="<?=$GLOBALS['_LANG']['_save'] ?>" type="submit" class="MainBtn" >	
</div>
</ul>
</form>



<? }elseif($show_page=="test"){ ?>


<script>
function AddQuestionsTest(id){
document.getElementById('quizidtd').value=''+id+'';
document.AddQuestions.submit();
}
function ViewResultsT(id){
document.getElementById('quizid').value=''+id+'';
document.ViewResults.submit();
}
function UpdateBlogOrder(orderby) {
	document.getElementById('ChangeOrder').value=''+orderby+'';
	document.getElementById('ChangeOrderTotal').value=''+orderby+'';
	document.UpdateMatchOrder.submit();
}
</script>



<div id="eMeetingContentBox">

	<form method="POST" action="<?=DB_DOMAIN ?>index.php" name="ClassSearch">
	<input name="sub" type="hidden" value="<?=$sub_page ?>" class="hidden">
	<input name="do_page" type="hidden" value="<?=$page ?>" class="hidden">
	
		<div id="Title">
<div class="AddIcon"><br><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=addquiz" class="MainBtn">  <img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/add.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_createNew'] ?></a></div>
			<span class="a1"><?=$PageTitle ?></span>
			<span class="a2"><?=$PageDesc ?></span>
		</div>
		<div id="Search">
			<span class="a1"><form method="post" action="<?=DB_DOMAIN ?>index.php">
			<input name="do_page" type="hidden" value="matches" class="hidden">
			<input type="hidden" name="ChangeOrderTotal" value="maildate" id="ChangeOrderTotal" class="hidden">
			<input name="sub" type="hidden" value="test" class="hidden">
			<select name="sto" onchange="this.form.submit();" style="width:150px;font-size:12px;">
						<option value="10"><?=str_replace("%s","10",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="20"><?=str_replace("%s","20",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="30"><?=str_replace("%s","30",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="40"><?=str_replace("%s","40",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="50"><?=str_replace("%s","50",$GLOBALS['_LANG']['_sort6']) ?></option>
			</select>
			</form>	</span>
			 
		</div>
		<div id="Results"> 
			<span class="a1"> <b><?=$search_total_results ?></b> <?=$GLOBALS['_LANG']['_results'] ?> </span>
			<span class="a2"><?=$GLOBALS['_LANG']['_sort'] ?>: 

<a href="#" onclick="UpdateBlogOrder('date'); return false;"><?=$GLOBALS['_LANG']['_date'] ?></a> 
				<a href="#" onclick="UpdateBlogOrder('title'); return false;"><?=$GLOBALS['_LANG']['_title'] ?></a></span>
		</div>
	
	</form> 



	<? if($search_total_results ==0){ ?>
	
	<div style="padding:50px;line-height:30px;"><h1><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=addquiz"> <?=$GLOBALS['_LANG_ERROR']['_noResults'] ?></a></h1></div>
	
	<? } ?>

	<? $i=1; foreach($match_data_array as $value){ ?>	
	 
		<div class="Acc_ListBox <?php if($i % 2){ ?>search_display_off<? }else{ ?>search_display_on<? } ?>" id="match_<?=$value['id'] ?>">
		<div class="Acc_ListBox_left"  style="width:100px;"><div class="pic75"><a class="photo_75" href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=addquiz&item_id=<?=$value['id'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_quiz/<?=$value['icon'] ?>.png" width="48" height="48" class="img_border"></a> 
		</div> </div>
		<div class="Acc_ListBox_right">	
		<div class="Acc_ListBox_right1">
		<div class="Acc_ListBox_title_break"><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=addquiz&item_id=<?=$value['id'] ?>"><?=$value['title'] ?> </a><br></div>
	
		<b><?=$value['description'] ?></b>
		<div>
		<?=$lang_match_page['11'] ?> (<?=$value['total_results'] ?>). <br>
		<?=$GLOBALS['_LANG']['_date'] ?>: <?=$value['date'] ?> <br>
		<?=$GLOBALS['_LANG']['_questions'] ?>: (<?=$value['total_questions'] ?>)
		 <br>
	
		</div>
		</div><div class="Acc_ListBox_right2"><div>
 
          	
		<? if($value['total_questions'] > 0){ ?><a href="javascript:void(0);" onClick="NewpopUpWin('<?=DB_DOMAIN ?>inc/exe/quiz/start.php?item_id=<?=$_SESSION['uid'] ?>&item2_id=<?=$value['id'] ?>', 400, 300);return false;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/zoom.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_view'] ?> <?=$GLOBALS['_LANG']['_quiz1'] ?></a><br> <? } ?>
		<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=addquiz&item_id=<?=$value['id'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/pencil.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_edit'] ?> <?=$GLOBALS['_LANG']['_quiz1'] ?></a> <br>
		<? if($value['total_results'] > 0){ ?><a href="javascript:void(0);" onClick="ViewResultsT('<?=$value['id'] ?>'); return false;" class="sender"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/zoom_in.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_view'] ?> <?=$GLOBALS['_LANG']['_results'] ?></a><br> <? } ?>
		<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=add&item_id=<?=$value['id'] ?>"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/vcard_edit.png" align="absmiddle"> <?=$GLOBALS['_LANG']['_questions'] ?></a><br>
		<a href="javascript:void(0);" onclick="Effect.Fade('match_<?=$value['id'] ?>'); DeleteMatchTest('<?=$value['id'] ?>'); return false;"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_off.png"  align="absmiddle"><?=$GLOBALS['_LANG']['_delete'] ?></a>
	
		</div>
		</div>
		<div class="clear"></div></div> <div class="clear"></div>
		</div>
	
		<? $i++; } ?>

  			<div id="Bottom" style="font-size:12px; padding:5px; font-weight:bold; height:25px;"><? if(($show_page_current) > 1){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test&sta=<?=$show_page_prev?><?=$show_page_rows?>&cpage=<?=$show_page_current-1; ?>"><</a>
			<? } ?>  
			<?=$GLOBALS['_LANG']['_page'] ?> <?=$show_page_current ?> <?=$GLOBALS['_LANG']['_of'] ?> <?=$show_page_num_of ?> 
			<? if($show_page_current < $show_page_num_of){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test&sta=<?=$show_page_next?><?=$show_page_rows?>&cpage=<?=$show_page_current+1; ?>">></a>
			<? } ?></div>	
</div> <!-- end main box -->




<form method="post" action="<?=DB_DOMAIN ?>index.php" name="UpdateMatchOrder" id="UpdateMatchOrder">
<input type="hidden" id="ChangeOrder" name="ChangeOrder" value="date" class="hidden">
<input type="hidden" id="sub" name="sub" value="test" class="hidden">
<input name="do_page" type="hidden" value="matches" class="hidden">
</form>

<form method="post" action="<?=DB_DOMAIN ?>index.php" name="EditMatch" id="EditMatch">
<input type="hidden" id="eid" name="eid" value="0" class="hidden">
<input type="hidden" id="sub" name="sub" value="test" class="hidden">
<input name="do_page" type="hidden" value="matches" class="hidden">
</form>

<form method="post" action="<?=DB_DOMAIN ?>index.php" name="ViewResults" id="ViewResults">
<input type="hidden" id="quizid" name="quizid" value="0" class="hidden">
<input type="hidden" id="sub" name="sub" value="results" class="hidden">
<input name="do_page" type="hidden" value="matches" class="hidden">
</form>

 




<? }elseif($show_page=="add"){ ?>


<script>
function DeleteQuestionQ(id){
	Timer_Icon('response_match');
	eMeetingDo('<?=DB_DOMAIN ?>inc/ajax/_actions.php?action=deleteQuestion&id='+id,"response_match");
}
function EditQuestionQ(id) {
	document.getElementById('QQid').value=''+id+'';
	document.EditQuestion.submit();
}
function CheckNulls(){

	if( 
		(document.getElementById('qtitle').value =="") ||
		(document.getElementById('q1').value =="") || 
		(document.getElementById('q2').value =="") || 
		(document.getElementById('q3').value =="") ||
		(document.getElementById('q4').value =="")
	){
		document.getElementById('response_match').innerHTML ="Please complete all 4 possible answers.";
		return false;
	}
	
	return true;
}
</script>


<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_question'] ?></div>
<div class="menu_box_body1">
<form method="post" action="<?=DB_DOMAIN ?>index.php" onSubmit="return CheckNulls();">
<input type="hidden" name="do" value="addquestion" class="hidden">
<input type="hidden" id="sub" name="sub" value="add" class="hidden">
<input name="do_page" type="hidden" value="matches" class="hidden">
<input name="q5" type="hidden" value="0">
<input type="hidden" name="quizid" value="<?=$item_id ?>" class="hidden">
<? if(isset($item2_id) && is_numeric($item2_id) && $item2_id > 0){ ?>
<input type="hidden" name="qqeid" value="<?=$item2_id ?>" class="hidden">
<? } ?>
  <ul class="form">
     
  
    <table width="523" border=0 align="center" cellpadding=2 cellspacing=1>
      <tr> 
      
        <td colspan="3"><strong>
          <?=$GLOBALS['_LANG']['_question'] ?>
          :</strong> <span id="response_match" class="responce_alert"></span></td>
      </tr>
      <tr> 
        <td colspan="3"><input name="quizQuestion" id="qtitle" class="input" size=55 maxlength=300 value="<? if(isset($questions_details)){ print $questions_details['question_title']; } ?>"> 
      </td>
      </tr>
      <tr>       
        <td colspan="3"><strong><?=$GLOBALS['LANG_MATCH']['a36'] ?></strong><br><small>(<?=$GLOBALS['LANG_MATCH']['a37'] ?>)</small></td>
      </tr>
      <tr> 
        <td width="31" >
        a)</td>
        <td width="338"><input name="q1" id="q1" class="input" size=45 maxlength=100 value="<? if(isset($questions_details)){ print $questions_details['q1']; } ?>"></td>
        <td width="138"><input name="quizCorrect"  type=radio value=1 <? if(isset($questions_details) && isset($item2_id) && is_numeric($item2_id)){if($questions_details['answer'] ==1){ print "checked"; } }else{ print "checked"; } ?>>
          <?=$GLOBALS['_LANG']['_correct'] ?>
        </td>
      </tr>
      <tr> 
        <td >b)</td>
        <td><input name="q2" id="q2" size=45 class="input" maxlength=100 value="<? if(isset($questions_details)){ print $questions_details['q2']; } ?>"></td>
        <td><input type=radio name="quizCorrect"  value=2 <? if(isset($questions_details)){if($questions_details['answer'] ==2){ print "checked"; } } ?>>
          <?=$GLOBALS['_LANG']['_correct'] ?>
      </td>
      </tr>
      <tr> 
        <td >c)</td>
        <td><input name="q3" id="q3" size=45 class="input" maxlength=100 value="<? if(isset($questions_details)){ print $questions_details['q3']; } ?>"></td>
        <td><input type=radio name="quizCorrect"  value=3 <? if(isset($questions_details)){if($questions_details['answer'] ==3){ print "checked"; } } ?>>
          <?=$GLOBALS['_LANG']['_correct'] ?>
      </td>
      </tr>
      <tr> 
        <td >d)</td>
        <td><input name="q4" id="q4" size=45 class="input" maxlength=100 value="<? if(isset($questions_details)){ print $questions_details['q4']; } ?>"></td>
        <td><input name="quizCorrect" type=radio value=4 <? if(isset($questions_details)){if($questions_details['answer'] ==4){ print "checked"; } } ?>>
          <?=$GLOBALS['_LANG']['_correct'] ?>
      </td> 
      <tr>
        <td >&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td >&nbsp;</td>
        <td><input name="submit" type=submit class="MainBtn" value='<?=$GLOBALS['_LANG']['_add']." ".$GLOBALS['_LANG']['_question'] ?>'></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </ul>
</form>  
</div>
 

<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_questions'] ?></div>
<div class="menu_box_body1">

<table width="640"  border="0">
<? $i=1; if(isset($questions_array) && !empty($questions_array) ){ foreach($questions_array as $QQ){ ?>
  <tr id="qq_<?=$QQ['id'] ?>">
    <td width="32">Q<?=$i; $i++; ?>.</td>
    <td width="404"><?=$QQ['title'] ?></td>
    <td width="68"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/reply.gif" align="absmiddle"> <a href="#" onClick="EditQuestionQ('<?=$QQ['id'] ?>'); return false;"><?=$GLOBALS['_LANG']['_edit'] ?></a></td>
    <td width="78"><img src="<?=DB_DOMAIN ?>images/DEFAULT/_msg/delete.gif" align="absmiddle"> <a href="#" onclick="Effect.Fade('qq_<?=$QQ['id'] ?>'); DeleteQuestionQ('<?=$QQ['id'] ?>'); return false;"><?=$GLOBALS['_LANG']['_delete'] ?></a></td>
  </tr>
<? } } ?>
</table>

</div>

	
	<? if(empty($questions_array)){ ?>		
		<div class="nomail"><?=$GLOBALS['LANG_MATCH']['a42'] ?></div>		
	<? } ?>
	


<form method="post" action="<?=DB_DOMAIN ?>index.php" name="EditQuestion" id="EditQuestion">
<input type="hidden" id="QQid" name="item2_id" value="0" class="hidden">
<input type="hidden" id="sub" name="sub" value="add" class="hidden">
<input type="hidden" name="item_id" value="<?=$item_id ?>" class="hidden">
<input name="do_page" type="hidden" value="matches" class="hidden">
</form>



<? }elseif($show_page=="results"){ ?>


<span id="response_match" class="responce_alert"></span>


<div class="menu_box_title1"><?=$GLOBALS['_LANG']['_results'] ?></div>
<div class="menu_box_body1">
<div id="DisplayList">
  <ul>
	<li> <strong style="text-transform:uppercase"> <?=$GLOBALS['_LANG']['_quiz'] ?> </strong> 
			
			<!-- DISPLAY PAGE NUMBERS -->
			<span>
			<? if(($show_page_current) > 1){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test&sta=<?=$show_page_prev?><?=$show_page_rows?>&cpage=<?=$show_page_current-1; ?>"><</a>
			<? } ?>  
			<?=$show_page_current ?> <?=$GLOBALS['_LANG']['_of'] ?> <?=$show_page_num_of ?> 
			<? if($show_page_current < $show_page_num_of){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test&sta=<?=$show_page_next?><?=$show_page_rows?>&cpage=<?=$show_page_current+1; ?>">></a>
			<? } ?>
			</span> 
			<!-- END PAGE NUMBERS -->			
      <div class="ClearAll"></div>
    </li>

    <li class="middle">
      <ul>	 
		<? if(isset($match_data_array) && !empty($match_data_array)){ foreach($match_data_array as $Match){ ?>			
        <li id="match_<?=$Match['id'] ?>"> 			
          <!-- Message Buttons -->
			<strong>
			<h1><?=$Match['percentage'] ?>%</h1><br>
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_no.png" align="absmiddle"> <a href="#" onclick="Effect.Fade('match_<?=$Match['id'] ?>'); DeleteMatchTestResult('<?=$Match['id'] ?>'); return false;"><?=$GLOBALS['_LANG']['_delete'] ?></a>
			</strong>			
          <!-- Messahe Text -->
			<span style="font-size:13px;line-height:25px;"> 
          <strong><img src="<?=$Match['image'] ?>" width="48" height="48" style="float:left; padding-right:20px;"></strong> 

		<b><a href="<?=$Match['user_link'] ?>"><?=$Match['username'] ?></a></b> <br>
		<?=$Match['comments']?> <?=$GLOBALS['_LANG']['_questions'] ?> <?=$GLOBALS['_LANG']['_correct'] ?>!<br>

           <?=$GLOBALS['_LANG']['_date'] ?>: <?=$Match['date'] ?>
         
      
          </span><div class="ClearAll"></div>
		  </span>
		</li>		
		<? } } ?>		
		<? if(empty($match_data_array)){ ?>		
		<li class="nomail"><a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=test"><?=$GLOBALS['_LANG']['_noResults'] ?></a></li>		
		<? } ?>		
      </ul>
    </li>
    <li> 
      	<div class="ClearAll"></div>
    </li>	
  </ul>
</div>
</div>
 



<? }elseif($show_page=="taken"){ ?>
 

<div class="menu_box_title1"><?=$GLOBALS['LANG_MATCH']['a60'] ?></div>
<div class="menu_box_body1">

<span id="response_match" class="responce_alert"></span>
<div id="DisplayList">
  <ul>
	<li> <strong style="text-transform:uppercase"><?=$GLOBALS['LANG_MATCH']['a61'] ?></strong> 
			
			<!-- DISPLAY PAGE NUMBERS -->
			<span>
			<? if(($show_page_current) > 1){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=taken&sta=<?=$show_page_prev?><?=$show_page_rows?>&cpage=<?=$show_page_current-1; ?>"><</a>
			<? } ?>  
			<?=$GLOBALS['_LANG']['_page'] ?> <?=$show_page_current ?> <?=$GLOBALS['_LANG']['_of'] ?> <?=$show_page_num_of ?> 
			<? if($show_page_current < $show_page_num_of){ ?>
			<a href="<?=DB_DOMAIN ?>index.php?dll=matches&sub=taken&sta=<?=$show_page_next?><?=$show_page_rows?>&cpage=<?=$show_page_current+1; ?>">></a>
			<? } ?>
			</span> 
			<!-- END PAGE NUMBERS -->			
      <div class="ClearAll"></div>
    </li>

    <li class="middle">
      <ul>	 
		<? $i=1; foreach($match_data_array as $Match){ ?>			
        <li id="match_<?=$Match['id'] ?>"> 			
          <!-- Message Buttons -->
			<strong>
			<h1><?=$Match['percentage'] ?>%</h1><br>
			<img src="<?=DB_DOMAIN ?>images/DEFAULT/_icons/new/chk_no.png" align="absmiddle"> <a href="#" onclick="Effect.Fade('match_<?=$Match['id'] ?>'); DeleteMatchTestResult('<?=$Match['id'] ?>'); return false;"><?=$GLOBALS['_LANG']['_delete'] ?></a>
			</strong>			
          <!-- Messahe Text -->
			<span style="font-size:13px;line-height:25px;"> 

          <strong><img src="<?=$Match['image'] ?>" width="48" height="48" style="float:left; padding-right:20px;"></strong>

 

<a href="javascript:void(0);" onClick="NewpopUpWin('<?=DB_DOMAIN ?>inc/exe/quiz/start.php?item_id=<?=$_SESSION['uid'] ?>&item2_id=<?=$Match['quiz_id'] ?>', 400, 300);return false;"><?=$Match['title'] ?></a> 
<br><?=nl2br($Match['comments']) ?> <?=$GLOBALS['_LANG']['_questions'] ?> <?=$GLOBALS['_LANG']['_correct'] ?>!<br> 
<?=$GLOBALS['_LANG']['_date'] ?>:<?=$Match['date'] ?><br>
           
          </span><div class="ClearAll"></div>
		  </span>
		</li>
		<? if($i ==1){ ?> <script type="text/javascript" language="javascript">Effect.Pulsate('match_<?=$Match['id'] ?>', { pulses : 4, duration : 4, from : 0.1 });</script> <? } ?>		
		<? $i++;} ?>		
		<? if(empty($match_data_array)){ ?>		
		<li class="nomail"><?=$GLOBALS['LANG_MATCH']['a66'] ?></li>		
		<? } ?>		
      </ul>
    </li>
    <li> 

		<span>
			<form method="post" action="<?=DB_DOMAIN ?>index.php">
			<input name="do_page" type="hidden" value="matches" class="hidden">
			<input type="hidden" name="ChangeOrderTotal" value="maildate" id="ChangeOrderTotal" class="hidden">
			<input name="sub" type="hidden" value="taken" class="hidden">
			<select name="sto" onchange="this.form.submit();" style="width:150px;font-size:12px;">
					<option value="10"><?=str_replace("%s","10",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="20"><?=str_replace("%s","20",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="30"><?=str_replace("%s","30",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="40"><?=str_replace("%s","40",$GLOBALS['_LANG']['_sort6']) ?></option>
						<option value="50"><?=str_replace("%s","50",$GLOBALS['_LANG']['_sort6']) ?></option>
			</select>
			</form>		
		</span> 
      	<div class="ClearAll"></div>
    </li>	
  </ul>
</div>
</div>

<script>
function TakeTestQ(id,userid) {
document.getElementById('quizid').value=''+id+'';
document.getElementById('profileId').value=''+userid+'';
document.TakeTest.submit();
}
</script>
<form method="post" action="<?=DB_DOMAIN ?>index.php" name="TakeTest" id="TakeTest">
<input type="hidden" id="profileId" name="profileId" value="0" class="hidden">
<input type="hidden" id="quizid" name="quizid" value="0" class="hidden">
<input type="hidden" id="sub" name="sub" value="taketest" class="hidden">
<input name="do_page" type="hidden" value="matches" class="hidden">
</form>
<? } ?>