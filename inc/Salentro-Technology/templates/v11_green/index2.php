<? $fdata = DisplayFeaturedMembers(10);	?>

<style>

#splitpage #main_content_wrapper { background: transparent; border:0px;}

#splitpage #main_wrapper_bottom {	background: transparent;}

.search{ font-size:12px; float:left; width: 150px; display:block; height:30px; margin-right:5px; line-height:30px;}

.pImage { float:left; width:100px; height:150px; margin-right:23px;}

.pImageBorder { border:3px solid #eee;}

.pImageUsername { font-size:11px; font-weight:bold; text-align:center}

</style>



<div class="ClearAll"></div>

<table  height="476" border="0" style="margin-top:10px; margin-left:10px; width:98%"><tr><td width="244" height="19" valign="top">

  





	<div style="background: transparent url('inc/templates/<?=D_TEMP ?>/images/small_3.jpg') no-repeat; height:235px; margin-top:10px;">



	<div class="index" style="padding-top:10px;margin-left:12px;color:black;">





		<table width="82%"  border="0" cellpadding="0">

		  <tr>

		<td width="272" height="30" class="inner_nav_bar">&nbsp;&nbsp;<?=$GLOBALS['_LANG']['_member'] ?> <?=$GLOBALS['_LANG']['_login'] ?></td>

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

		  <tr>

			<td height="30" valign="top" style="font-size:13px;"><?=$LANG_WELCOME['_join'] ?> <a href="index.php?dll=register"><?=$LANG_WELCOME['_join2'] ?></a></td>

		  </tr>

		</table>



	</div>	 

	</div>

	

	

	

	</td><td  height="211" valign="top">

	

	<div style="background: transparent url('inc/templates/<?=D_TEMP ?>/images/h4.jpg') top right; background-repeat:no-repeat; height:240px; margin-left:15px;">

		<br>

		<div style="display:block; margin-top:5px;">


			<p style="line-height:23px;"><?=TMP_TXT_4 ?></p>	

			<input type="button" value="&nbsp;&nbsp;<?=$LANG_WELCOME['_join2'] ?>&nbsp;&nbsp;" class="MainBtn" onClick="location.href='index.php?dll=register'" style="font-size:20px;">&nbsp;<font color="#1E90FF" face="arial" size="4"> <B>THE LAST DATING SITE YOU MAY EVER JOIN.</B></font> </div></div></td></tr>

<tr><td width="244" height="280" valign="top" style="background: transparent url('inc/templates/<?=D_TEMP ?>/images/small_2.jpg') no-repeat; height:350px;">



</tr></table><br>

</div>