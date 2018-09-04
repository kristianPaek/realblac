<? $fdata = DisplayFeaturedMembers(10);	?>

<style>

#splitpage #main_content_wrapper { background: transparent; border:0px;}

#splitpage #main_wrapper_bottom {	background: transparent;}

.search{ font-size:12px; float:left; width: 50px; display:block; height:30px; margin-right:5px; line-height:30px;}

.pImage { float:left; width:100px; height:150px; margin-right:23px;}

.pImageBorder { border:3px solid #eee;}

.pImageUsername { font-size:11px; font-weight:bold; text-align:center}

</style>

<div class="ClearAll"></div>

<table  height="776" border="0" style="margin-top:10px; margin-left:10px; width:98%"><tr><td width="244" height="19" valign="top">

  
	<div style="background: transparent url('inc/templates/<?=D_TEMP ?>/images/small_3.jpg') no-repeat; height:235px; margin-top:10px;">

	<div class="index" style="padding-top:10px;margin-left:12px;color:black;">

		<table width="100%"  border="0" cellpadding="0">

		  <tr>

		<td width="472" height="30" class="inner_nav_bar">&nbsp;&nbsp;<?=$GLOBALS['_LANG']['_member'] ?> <?=$GLOBALS['_LANG']['_login'] ?></td>

		  </tr>

		  <tr>

			<td height="145" valign="top"><form method="post" action="index.php">

              <input name="do" type="hidden" value="login" class="hidden">

              <input name="visible" value="0" type="hidden">

              <input name="do_page" type="hidden" value="login" class="hidden">

              <table width="100%"  border="0" style="margin-top:10px;">

                <tr>

                  <td width="29%"><?=$GLOBALS['_LANG']['_username'] ?></td>

                  <td width="30%"><input name="username" id="username" type="text" class="input" size="15" <? if(isset($_COOKIE['emeeting']['username'])){ print "value='".$_COOKIE['emeeting']['username']."'"; } ?>></td>

                </tr>

                <tr>

                  <td colspan="2"></td>

                </tr>

                <tr>

                  <td><?=$GLOBALS['_LANG']['_password'] ?></td>

                  <td><input name="password" id="password" type="password" class="input" size="15"></td>

                </tr>

                <tr>

                  <td colspan="2"><input name="submit" type="submit" class="NormBtn" value="<?=$GLOBALS['_LANG']['_login'] ?>">

                      <input type="checkbox" name="remember" value="1" style="margin-right:15px;" checked='checked'>

                      <small>

                      <?=$GLOBALS['_LANG']['_rememberMe'] ?>

                    </small></td>

                </tr>
              </table>
			  </form></td>

		  </tr>

		  <tr><br /><center>

			<td height="30" valign="top" style="font-size:16px;"><?=$LANG_WELCOME['_join'] ?></FONT><a href="index.php?dll=register"><br /><FONT SIZE="4" color="#f00056"><u>Join us Now</u></font></a></td></center>

		  </tr>

		</table>



	</div>	 

	</div>

	
	</td><td  height="211" valign="top">


	<div style="background: transparent url('inc/templates/<?=D_TEMP ?>/images/h4.jpg') top right; background-repeat:no-repeat; height:240px; margin-left:15px;">

		<div style="display:block; margin-top:5px;">
			<p style="line-height:23px;">RealBlackLove.com is a community comprised of singles that know exactly what<br /> they want and what they deserve. What do you deserve?<br />
<br />"I want to say thank you a million times, because I don't think one thank you 
<br />is enough to describe how much I appreciate RealBlackLove.com! I was <br />
a little skeptical, but I really did not have much to lose considering that my <br />
dating life was at a standstill. I joined RealBlackLove.com because I was looking <br />
for a guy that is true, faithful and honest. I knew that they were out there, and <br />
I found him on RealBlackLove.com."
<br /><br /> <i> Trisha Washington - Real Estate Broker</i>
<br /><br />
<center><iframe width="600" height="450" src="http://www.youtube.com/v/vVY0Wc8gAR0?hl=en_US&amp;version=3&amp;rel=0;HD=1;controls=0;showinfo=0" frameborder="0"></iframe></center>
</p>


			</div></div></td></tr>

<tr><td width="244" height="280" valign="top" style="background: transparent url('inc/templates/<?=D_TEMP ?>/images/small_2.jpg') no-repeat; height:350px;">


</tr>

</table><br>

</div>


