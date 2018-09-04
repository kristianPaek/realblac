</div>
<div class="clear"></div>

<!-- PAGE FOOTER -->
	<div id="page_footer">	
		<div class="footer_menu"> 
			<ul class="footer_tabs">
				<?=$FOOTER_MENU_BAR ?>							
			</ul>
				
		</div>	
	</div>
<div class="clear"></div>
<!-- END FOOTER -->
</div>
<!-- END PAGE MAIN BACKGROUND -->
<?=$FOOTER_MENU_TIMER ?>
<? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="bottom"){ print $banner['display'];}} ?>
<?php e_footer() ?>




</body>
</html>