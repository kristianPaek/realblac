<h2 class="toph2">Sample Plugins Page</h2>

<!-- DISPLAY TOP BOX -->
<div id="TopBar">
	<span class="icon"><img src="images/DEFAULT/_icons/16/lock.gif"  align="absmiddle">Sample Plugins Page</span>
	<span class="button"><a class="button" href="index.php?dll=register"><span>Sample Plugin Button</span></a></span>
</div>
<!-- END BOX -->

<?
if(isset($_POST['do'])){ 
					
					print "<b>You Submitted:</b> <br>";
					print "Name: ".strip_tags($_POST['name']);
					print "<br>";
					print "Email: ".strip_tags($_POST['email']);	
					print "<br>";
					print "Message: ".strip_tags($_POST['message']);
					print "<br>";	
}
?>

	<ul class="form">   
	<div class="CapTitle">Sample Plugin Page Form</div>
	<div class="CapBody">
<form method="post" action="index.php">
<!--
	THE HIDDEN FIELD 'do' IS USED TO CALL
	THE PAGE FUNCTIONS
-->             
<input name="do" type="hidden" value="send" class="hidden">  
<!--
	THE HIDDEN FIELD 'do_page' IS USED TO CALL
	THE SAME PAGE THAT IS BEING DISPLAYED NOW
-->               
<input name="do_page" type="hidden" value="sample" class="hidden">
                  
    	<li><label>Name: </label> <input name="name" value="" type="text" id="C1"></li>
		<li><label>Email: </label> <input name="email" value="" type="text" id="C2"></li>
     	<li><label>Message: </label> <textarea name="message" cols="50" rows="3" style="width:176px; font-size:11px;" id="C3"></textarea></li>      
	  	<li><input type="submit" value="Submit Form" class="button"></li>	          
</form>
</div>
</ul>	