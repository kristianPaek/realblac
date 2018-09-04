</div>
<div class="clear"></div>

<!-- PAGE FOOTER -->
	<div id="page_footer">	


<div style="margin-left:10px;">


<table width="300" border="0" cellpadding="3" cellspacing="3" ><tr>



<? if($_SESSION['auth'] !="yes") { ?>

<? } ?>

</tr></table>
</div>


<center>
<a href="http://www.realblacklove.com/meet/mobile.php?dll=mobilecontact"  style="text-decoration: none;color:#ffffff;font-size:11px;">Contact Us </a> |
<a href="http://realblacklove.com/terms-conditions/"  style="text-decoration: none;color:#ffffff;font-size:11px;">Terms & Conditions</a> | <a href="http://realblacklove.com/terms-conditions/"  style="text-decoration: none;color:#ffffff;font-size:11px;">Privacy Policy </a>
| <a href="http://realblacklove.com/"  style="text-decoration: none;color:#ffffff;font-size:11px;">Home</a>
</center>
<font size="1">

<?
$ReturnData ='<font color="#ffffff"> &copy; '.date('Y').' RealBlackLove.com LLC. Please note criminal background checks are not conducted on users.</font>'.D_CCTEXT.'</a>';


if(BRAND_ID ==""){
	$ReturnData .='';

}

print $ReturnData;


if(D_FLAGS ==1){	
  $FOOTER_MENU_TIMER =ShowLangList(); 
  print $FOOTER_MENU_TIMER;
?>





<? } ?>

</font>
</center>
</td></tr>

</table>


		
	</div>
<div class="clear"></div>
<!-- END FOOTER -->
</div>
<!-- END PAGE MAIN BACKGROUND -->


<br>


<?php e_footer() ?>

<div style="width:300px;margin-left:8px;margin-bottom:8px;";>
<? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="bottom"){ print $banner['display'];}} ?>
</div>


</body>
</html>