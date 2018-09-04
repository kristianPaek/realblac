<?
/**
* Page: ARTICLES PAGE
*
* @version  9.0
* @created  Sat 25 Oct  2008
* @related  /inc/func/func_articles.php
*/
defined( 'KEY_ID' ) or die( 'Restricted access' );

?>
<div class="TopAffiliate"><div style="float:right;"><? foreach($BANNER_ARRAY as $banner){ if($banner['position'] =="middle"){ print $banner['display'];}} ?></div><span><?=$PageTitle ?></span></div>
<p><?=$PageDesc ?></p>
<? if($show_page=="home"){ ?>


<ul class="form">
<div class="CapBody">
<?=$index_content ?>
</div>
</ul>
<? }elseif($show_page=="join"){ ?>

 

		<form method="post" action="<?=DB_DOMAIN ?>index.php">               
		<input name="do" type="hidden" value="join" class="hidden">            
		<input name="do_page" type="hidden" value="affiliate" class="hidden">
		<input name="sub" type="hidden" value="join" class="hidden">
		
		<ul class="form"> 
			
		<div class="CapTitle"><?=$GLOBALS['LANG_AFFILIATE']['a4'] ?></div>
		<div class="CapBody">
		
		<li><label><?=$GLOBALS['_LANG']['_username'] ?>: </label><input name="j1" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j1']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_password'] ?>:</label><input name="j16" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j16']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_namef'] ?>:</label><input name="j2" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j2']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_namel'] ?>:</label><input name="j3" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j3']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_nameb'] ?>:</label><input name="j4" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j4']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_address'] ?>:</label><input name="j5" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j5']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_street'] ?>:</label><input name="j6" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j6']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_city'] ?>:</label><input name="j7" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j7']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_province'] ?>:</label><input name="j8" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j8']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_zipcode'] ?>:</label><input name="j9" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j9']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_country'] ?>:</label><?=$reg_countries ?></li>
		<li><label><?=$GLOBALS['_LANG']['_phone'] ?>:</label><input name="j11" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j11']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_fax'] ?>:</label><input name="j12" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j12']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_email'] ?>:</label><input name="j13" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j13']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['_LANG']['_website'] ?>:</label><input name="j14" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j14']).'"'; } ?>></li>
		<li><label><?=$GLOBALS['LANG_AFFILIATE']['a41'] ?>:</label><input name="j15" type="text" class="input" size="28" <? if(isset($_POST)){ print 'value="'.eMeetingOutput($_POST['j15']).'"'; } ?>><div class="tip"><?=$GLOBALS['LANG_AFFILIATE']['a42'] ?></div></li>
		<li><input type="submit" name="Submit" value="<?=$GLOBALS['_LANG']['_submit'] ?>" class="MainBtn"></li>
		</div>
		
		</ul>
		</form>
		
		
<? }elseif($show_page=="login"){ ?>

 

<div style="width:340px;float:left">
	<form method="post" action="<?=DB_DOMAIN ?>index.php">
	<input name="do" type="hidden" value="login" class="hidden">
	<input name="do_page" type="hidden" value="affiliate" class="hidden">
	<input name="sub" type="hidden" value="login" class="hidden">

	<ul class="form">   
 
	<div class="CapBody">                
		<li><label><?=$GLOBALS['_LANG']['_username'] ?>:</label> <input maxlength="100" name="username" id="e_username" type="text" class="input" size="30" <? if(isset($_COOKIE['emeeting']['username'])){ print "value='".$_COOKIE['emeeting']['username']."'"; } ?>>
		</li>
		<li><label><?=$GLOBALS['_LANG']['_password'] ?>:</label> <input maxlength="25" name="password" id="e_password" type="password" class="input" size="30"></li>
		<li><input type="checkbox" name="remember" value="1" style="margin-right:15px;" checked='checked'><?=$GLOBALS['_LANG']['_rememberMe']  ?></li>
		<? if(D_REGISTER_IMAGE ==1){ ?><li><label><?=$GLOBALS['_LANG']['_verification'] ?>:</label> <input type="text" name="code" id="C4" class="input"><br><img name="Verification Image" src="<?=DB_DOMAIN ?>inc/classes/class_regimg_img.php?regen=y&<? echo time(); ?>"></li><? } ?>
		<li><input maxlength="15" type="submit"  value="<?=$GLOBALS['_LANG']['_login'] ?>" class="MainBtn"></li>
		<hr><li><img src="<?=DB_DOMAIN ?>images/DEFAULT/_acc/key_go.png" align="absmiddle"> <a href="#" onclick="toggleLayer('ForgottenPassword'); return false;"><?=$GLOBALS['LANG_COMMON'][1] ?></a></li>
 
		</div>
	</ul>

	</form>
</div>
<div style="width:255px; float:right">

	<!-- DISPLAY FORGOT BOX -->
	<div style="display:none" id="ForgottenPassword">	
		<form method="post" action="<?=DB_DOMAIN ?>index.php">
		<input name="do" type="hidden" value="password" class="hidden">
		<input name="do_page" type="hidden" value="affiliate" class="hidden">
			<input name="sub" type="hidden" value="login" class="hidden">
			<ul class="form">   
			<div class="CapTitle" style="background:#900000"><?=$GLOBALS['LANG_LOGIN']['a11'] ?></div>
			<div class="CapBody">	                  
				<li><label><?=$GLOBALS['_LANG']['_email'] ?></label><input maxlength="150" name="email" type="text" size="25" class="input"></li>
				<? if(D_REGISTER_IMAGE ==1){ ?><li><label><?=$GLOBALS['_LANG']['_verification'] ?>:</label> <input maxlength="15" type="text" name="code" id="C4" class="input"><br><img name="Verification Image" src="<?=DB_DOMAIN ?>inc/classes/class_regimg_img.php?regen=y&<? echo time(); ?>"></li><? } ?>
				<li><input type="submit" value="<?=$GLOBALS['_LANG']['_submit'] ?>" class="MainBtn"></li>
			</div>
			</ul>
		</form>
	</div>

</div>



<? }elseif($show_page=="payment"){ ?>

<ul class="form">   
<div class="CapBody">
<?=$payment_content ?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="C0C0C0">
        <tr> 
          <td  bgcolor="F9F9F9" style="color: #333333; font-size: 12px; font-weight: bold"><?=$GLOBALS['LANG_AFFILIATE']['a27'] ?></td>
        </tr>
        <tr> 
          <td valign="top" bgcolor="EFEFEF"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">                
              <thead>                  
                <tr bgcolor="#FFFFFF">                     
                  <th width="20%" height="30"><?=$GLOBALS['_LANG']['_date'] ?></th>
                  <th width="23%"><?=$GLOBALS['LANG_AFFILIATE']['a29'] ?></th>
                  <th width="25%"><?=$GLOBALS['_LANG']['_status'] ?></th>
                  <th width="22%"><?=$GLOBALS['LANG_AFFILIATE']['a31'] ?></th>
                </tr>                
              </thead>                
              <tbody>                  
                <?=displayPayments(); ?>                
              </tbody>
              </table></td>
        </tr>
      </table>
</div>
</ul>

<? }elseif($show_page=="edit"){ ?>
<ul class="form">   
<div class="CapBody">
<?=$edit_content ?>
		<form method="post" action="<?=DB_DOMAIN ?>index.php">               
		<input name="do" type="hidden" value="edit" class="hidden">            
		<input name="do_page" type="hidden" value="affiliate" class="hidden">
		<input name="sub" type="hidden" value="edit" class="hidden">
		
		<ul class="form"> 
			
		<div class="CapTitle"><?=$GLOBALS['LANG_AFFILIATE']['a4'] ?></div>
		<div class="CapBody">
		
		<li><label><?=$GLOBALS['_LANG']['_username'] ?>: </label><input name="j1" type="text" class="input" size="28"  value="<?=$adata['username'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_password'] ?>:</label><input name="j2" type="text" class="input" size="28" value="<?=$adata['password'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_namef'] ?>: </label><input name="j3" type="text" class="input" size="28" value="<?=$adata['firstname'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_namel'] ?>: </label><input name="j4" type="text" class="input" size="28" value="<?=$adata['lastname'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_nameb'] ?>: </label><input name="j5" type="text" class="input" size="28" value="<?=$adata['businessname'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_address'] ?>: </label><input name="j6" type="text" class="input" size="28" value="<?=$adata['address'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_street'] ?>: </label><input name="j7" type="text" class="input" size="28"  value="<?=$adata['street'] ?>" ></li>
		<li><label><?=$GLOBALS['_LANG']['_city'] ?>:</label><input name="j8" type="text" class="input" size="28"  value="<?=$adata['town_city'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_province'] ?>:</label><input name="j9" type="text" class="input" size="28" value="<?=$adata['state_county'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_zipcode'] ?>:</label><input name="j11" type="text" class="input" size="28"  value="<?=$adata['zip_post'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_country'] ?>:</label><?=$reg_countries ?></li>
		<li><label><?=$GLOBALS['_LANG']['_phone'] ?>:</label><input name="j12" type="text" class="input" size="28"  value="<?=$adata['telephone'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_fax'] ?>:</label><input name="j13" type="text" class="input" size="28" value="<?=$adata['fax'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_email'] ?>:</label><input name="j14" type="text" class="input" size="28" value="<?=$adata['email'] ?>"></li>
		<li><label><?=$GLOBALS['_LANG']['_website'] ?>:</label><input name="j15" type="text" class="input" size="28" value="<?=$adata['website'] ?>"></li>
		<li><label><?=$GLOBALS['LANG_AFFILIATE']['a41'] ?>:</label><input name="j16" type="text" class="input" size="28" value="<?=$adata['payment_to'] ?>"><div class="tip"><?=$GLOBALS['LANG_AFFILIATE']['a42'] ?></div></li>
		<li><input type="submit" name="Submit" value="<?=$GLOBALS['_LANG']['_submit'] ?>" class="MainBtn"></li>
		</div>
		
		</ul>
		</form>

</div>
</ul>

<? }elseif($show_page=="banners"){ ?>
<ul class="form">   
<div class="CapBody">
<?=GetPages('code') ?>
 <div align="center"><?=DisplayBanners() ?></div>
</div>
</ul>
<? }elseif($show_page=="summary"){ ?>

<? $totals = GetTotals() ?>

<ul class="form">
   
  <div class="CapBody">
    <?=GetPages('summary') ?>
    <table width="100%"  border="0" cellpadding="4" cellspacing="2">
            <tr>            
          <td valign='top' align='left' colspan="3">
            </td>
        </tr>
        <tr valign="bottom">
            
          <td height="43" colspan="3" align='left'>
            <p><strong><?=$GLOBALS['LANG_AFFILIATE']['a32'] ?>:</strong>  
              <?=$totals['joined'] ?>
              <br>
              <strong><?=$GLOBALS['LANG_AFFILIATE']['a33'] ?></strong>:
              <?=GetPages('commission') ?>
            %</p>
            <p><b><?=$GLOBALS['LANG_AFFILIATE']['a34'] ?></b>:
            </p></td>
        </tr>

          
        <tr>

            
          <td width="420" colspan="2" align='left' valign='top'>
            </td>
          <td width="148" align='left' valign='top'>
            </td>
        </tr>

          
        <tr>

            
          <td colspan="2" align='left' valign='top' bgcolor="#E4E4E4"><?=$GLOBALS['LANG_AFFILIATE']['a35'] ?>:</td>
          <td align='left' valign='top' bgcolor="#F8F8F8">
            <?=$totals['total_clicks'] ?>
      </td>
        </tr>

          
        <tr class="tdodd">

            
          <td colspan="2" align='left' valign='top' bgcolor="#E4E4E4"><?=$GLOBALS['LANG_AFFILIATE']['a36'] ?>:</td>
          <td align='left' valign='top' bgcolor="#F8F8F8">
              
            <?=$totals['total_registered'] ?>
      </td>
        </tr>

          
        <tr class="tdeven">

            
          <td colspan="2" align='left' valign='top' bgcolor="#E4E4E4"><?=$GLOBALS['LANG_AFFILIATE']['a37'] ?>:</td>
          <td align='left' valign='top' bgcolor="#F8F8F8">
              
            <?=GetSubs() ?>
      </td>
        </tr>

          
        <tr class="tdodd">

            
          <td colspan="2" align='left' valign='top' bgcolor="#E4E4E4"><strong>Total Commission</strong>:</td>
          <td align='left' valign='top' bgcolor="#F8F8F8">
            <? $TE = GetSubsAmount(); print AFF_CURRENCY.$TE; ?>
      </td>
        </tr>



          
        <tr>

            
          <td colspan="2" align='left' valign='top'>
            </td>
          <td valign='top' align='left'>
            </td>
        </tr>
          
        <tr>
            
          <td colspan="3" align='left' valign='top' class="tdfoot">&nbsp; Your referral link is: <a href='<?=DB_DOMAIN?>index.php?affid=<?=$_SESSION['aff_uid'] ?>'><?=DB_DOMAIN?>index.php?affid=<?=$_SESSION['aff_uid'] ?></a> </td>

        </tr>
         
      </form>
    </table><br /><br />
Note: total commission will be updated by the 7th of every month and commissions will be deposited/mailed before the 15th of every month.

  </div>
</ul>

<? } ?>
