<?php
$DB='mysql';
$DBhost=DB_HOST;
$DBname=DB_BASE;
$DBusr=DB_USER;
$DBpwd=DB_PASS;

$Tf='forum_forums';
$Tp='forum_posts';
$Tt='forum_topics';
$Tu='frm_users';
$Tb='forum_banned';

$main_url= DB_DOMAIN."inc/exe/forum/";
$main_url_tag= DB_DOMAIN;
//$bb_admin='bb_admin.php?';

$langf='english';
$skin='default';
$sitename='Forum';
$emailadmin=0;
$emailusers=0;
$userRegName='_A-Za-z0-9 ';
$l_sepr='<span style="color:#006699">°</span>';

$post_text_maxlength=10240;
$post_word_maxlength=70;
$topic_max_length=100;
$viewmaxtopic=10;
$viewlastdiscussions=10;
$viewmaxreplys=4;
$viewmaxsearch=10;
$viewpagelim=50;
$viewTopicsIfOnlyOneForum=0;

$protectWholeForum=0;
$protectWholeForumPwd='pwd';

$postRange=15;

$dateFormat='j F Y H:i:s';

$cookiedomain='';
$cookiename='miniBBsite';
$cookiepath='';
$cookiesecure=FALSE;
$cookie_expires=108000;
$cookie_renew=1800;
$cookielang_exp=2592000;

/* New options for miniBB 1.1 */

$disallowNames=array('Anonymous', 'Fuck', 'Shit');
//$disallowNamesIndex=array('admin'); // 2.0 RC1f

/* New options for miniBB 1.2 */
$sortingTopics=0;
$topStats=4;
$genEmailDisable=0;

/* New options for miniBB 1.3 */
$defDays=60;
$userUnlock=0;

/* New options for miniBB 1.5 */
$emailadmposts=0;
$useredit=86400;

/* New options for miniBB 1.6 */
//$metaLocation='go';
//$closeRegister=1;
//$timeDiff=21600;

/* New options for miniBB 1.7 */
$stats_barWidthLim='31';

/* New options for miniBB 2.0 */

$dbUserSheme=array(
'user_id'=>array(1,'userid','uid'),
'username'=>array(2,'username','login'),
'user_password'=>array(3,'password','passwd'),
);
$dbUserId='userid';
$dbUserDate='login_date'; 
$dbUserDateKey=2;
$dbUserAct=''; // activity
$dbUserNp=''; // user_newpasswd
$dbUserNk=''; // user_newpwdkey

$enableNewRegistrations=FALSE;
$enableProfileUpdate=FALSE;

$indexphp='index.php?';
$useSessions=TRUE;
$usersEditTopicTitle=FALSE;
$pathToFiles='./';
//$includeHeader='header.php';
//$includeFooter='footer.php';
//$emptySubscribe=TRUE;
$allForumsReg=TRUE;
//$registerInactiveUsers=TRUE;
//$mod_rewrite=TRUE;
$enableViews=TRUE;
//$userInfoInPosts=array();
//$userDeleteMsgs=1;
$description='Message Board';
?>