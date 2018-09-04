</div>
<div class="clear"></div>



<!-- PAGE FOOTER -->
<footer>
  <div id="footer">
    <div class="row">
    
        <div class="three columns">
            <div class="widgets-container footer_location">
            <div class="widgets clearfix widget_kleo_about_us" id="kleo_about_us-2"><h5><i class="icon-heart"></i> About Us</h5>
			
			<p>RealBlackLove.com is an online dating community serving African-American singles in the United States. We are devoted to ensuring black singles have the highest opportunity for romantic success.</p>
			

			
						<p class="footer-social-icons">Stay in touch:<br>
								<a title="Follow us on Twitter" data-width="210" class="has-tip tip-bottom" href="http://www.twitter.com/4RealBlackLove"><i class="icon-twitter-sign icon-2x"></i></a>
												<a title="Find us on Facebook" data-width="210" class="has-tip tip-bottom" href="http://www.facebook.com/4RealBlackLove"><i class="icon-facebook-sign icon-2x"></i></a>

								
							</p>
			   
		</div>            </div>
        </div>
        <div class="three columns">
            <div class="widgets-container footer_location">
            <div class="widgets clearfix widget_kleo_twitter" id="kleo_twitter-2"><h5><i class="icon-twitter"></i> How Tweet It Is.</h5><div class="twitter_wrap"><ul class="tweet_list"><li class="clearfix"><div class="tweet_item"><div class="tweet_content"><div class="tweet_txt">Trust doesn't come with a refill, once its gone, you won't get it back, if you do, it'll never be the same.</div>
    <span class="tweet_time">
    <a target="_blank" href="https://twitter.com/4RealBlackLove/status/407073820625747969">
    read more
    </a>
    </span></div></div></li><li class="clearfix"><div class="tweet_item"><div class="tweet_content"><div class="tweet_txt">Sometimes you fall in love with someone who just wasn't ready to be loved.</div>
    <span class="tweet_time">
    <a target="_blank" href="https://twitter.com/4RealBlackLove/status/403702391251300352">
    read more
    </a>
    </span></div></div></li><li class="clearfix"><div class="tweet_item"><div class="tweet_content"><div class="tweet_txt">At some point you have to realize that some people can stay in your heart, but not in your life.</div>
    <span class="tweet_time">
    <a target="_blank" href="https://twitter.com/4RealBlackLove/status/395482206065266692">
   read more
    </a>
    </span></div></div></li></ul></div></div>            </div>
        </div>
        <div class="three columns">
            <div class="widgets-container footer_location">
            <div class="widgets clearfix widget_nav_menu" id="nav_menu-2"><h5>Useful Links</h5><div class="menu-footer-container"><ul class="menu2" id="menu-footer">
<li><a href="http://www.realblacklove.com/meet">Home</a></li>
<li><a href="http://realblacklove.com/reasons-to-join/">Reasons to Join</a></li>
<li><a href="http://www.realblacklove.com/home.php/money-back-guarantee/">Our Guarantee</a></li>
<li><a href="http://www.realblacklove.com/home.php//blog/">Dating Blog</a></li>
<li><a href="http://www.realblacklove.com/home.php/contact-2/">Contact Us</a></li>
<li><a href="http://realblacklove.com/press-releases/">Press Releases</a></li>
<li><a href="http://www.realblacklove.com/home.php/terms-conditions/">Terms & Conditions</a></li>
</ul></div></div>            </div>
        </div>
        <div class="three columns">
            <div class="widgets-container footer_location">
            		<div class="widgets clearfix widget_recent_entries" id="recent-posts-3">		<h5>Recent Blog Post</h5>		<ul>
				
<li>
				<a href="http://www.realblacklove.com/warning-dating-red-flags/">WARNING! Dating Red Flags.</a>
						</li>
					<li>
				<a href="http://www.realblacklove.com/your-head-doesnt-fall-in-love/">Your Head Does Not Fall In Love.</a>
						</li>
					<li>
				<a href="http://www.realblacklove.com/to-date-a-co-worker-or-not-that-is-the-question/">To Date a Co-Worker or Not? That is the Question.</a>
						</li>
				</ul>
	   </div>     </div>
       </div>
    	
      <div class="twelve columns">
        <hr>
        <p>Copyright &copy; 2014 RealBlackLove.com - More than Dating. Building Relationships. &#0153;  <br class="hide-for-large show-for-small"></p>      </div>
    </div>
  </div><!--end footer-->
</footer>
<!-- END FOOTER -->

<p id="btnGoUp">Go up</p>
</div>
<!-- END PAGE MAIN BACKGROUND -->
<?=$FOOTER_MENU_TIMER ?>

<script type="text/javascript">
/* Lost password ajax */
jQuery(document).ready(function(){
    jQuery("#forgot_form #recover").on("click",function(){
        jQuery.ajax({
               url: ajaxurl,
               type: 'POST',
               data: {
                       action: 'kleo_lost_password',
                       email: jQuery("#forgot-email").val(),
               },
               success: function(data){
                       jQuery('#lost_result').html("<p>"+data+"</p>");
               },
               error: function() {
                       jQuery('#lost_result').html('Sorry, an error occurred.').css('color', 'red');
               }

        });
        return false;
	});
});
</script>
    
<script type="text/javascript">
/* Buddpress Groups widget */
jQuery(document).ready(function(){
	jQuery(".widgets div#groups-list-options a").on("click",function(){
		var a=this;jQuery(a).addClass("loading");
		jQuery(".widgets div#groups-list-options a").removeClass("selected");
		jQuery(this).addClass("selected");
		jQuery.post(
			ajaxurl,
			{
				action:"widget_groups_list",
				cookie:encodeURIComponent(document.cookie),
				_wpnonce:jQuery("input#_wpnonce-groups").val(),
				max_groups:jQuery("input#groups_widget_max").val(),
				filter:jQuery(this).attr("id")
			},
			function(b){
				jQuery(a).removeClass("loading");
				groups_wiget_response(b)
			}
		);
		return false;
	})
});
function groups_wiget_response(a){
	a=a.substr(0,a.length-1);
	a=a.split("[[SPLIT]]");
	if(a[0]!="-1"){
		jQuery(".widgets ul#groups-list").fadeOut(200,function(){
			jQuery(".widgets ul#groups-list").html(a[1]);
			jQuery(".widgets ul#groups-list").fadeIn(200)
		})
	}else{
		jQuery(".widgets ul#groups-list").fadeOut(200,function(){
			var b="<p>"+a[1]+"</p>";
			jQuery(".widgets ul#groups-list").html(b);
			jQuery(".widgets ul#groups-list").fadeIn(200)
		})
	}
};    

/* Buddpress Members widget */
jQuery(document).ready(function(){
	jQuery(".widgets div#members-list-options a").on("click",function(){var a=this;jQuery(a).addClass("loading");jQuery(".widgets div#members-list-options a").removeClass("selected");jQuery(this).addClass("selected");jQuery.post(ajaxurl,{action:"widget_members",cookie:encodeURIComponent(document.cookie),_wpnonce:jQuery("input#_wpnonce-members").val(),"max-members":jQuery("input#members_widget_max").val(),filter:jQuery(this).attr("id")},function(b){jQuery(a).removeClass("loading");member_wiget_response(b)});return false})
});

function member_wiget_response(a){
	a=a.substr(0,a.length-1);a=a.split("[[SPLIT]]");if(a[0]!="-1"){jQuery(".widgets ul#members-list").fadeOut(200,function(){jQuery(".widgets ul#members-list").html(a[1]);jQuery(".widgets ul#members-list").fadeIn(200)})}else{jQuery(".widgets ul#members-list").fadeOut(200,function(){var b="<p>"+a[1]+"</p>";jQuery(".widgets ul#members-list").html(b);jQuery(".widgets ul#members-list").fadeIn(200)})}
};


</script>
	<script type="text/javascript">
	jQuery(document).ready(function() {
			jQuery('.activity-content .activity-inner iframe').each(function ()
			{
					if ( !jQuery(this).parent().hasClass('flex-video') ) {
							jQuery(this).wrap('<div class="flex-video widescreen"></div>');
					}
			});
	});
	</script>
<script type='text/javascript'>
/* <![CDATA[ */
var foundTranslated = {"back":"Back"};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.realblacklove.com/wp-content/themes/sweetdate/assets/scripts/foundation.min.js?ver=20140212'></script>
<script type='text/javascript' src='http://www.realblacklove.com/wp-content/themes/sweetdate/assets/scripts/scripts.js?ver=20140212'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var kleoFramework = {"blank_img":"http:\/\/www.realblacklove.com\/wp-content\/themes\/sweetdate\/assets\/images\/blank.png","ajaxurl":"http:\/\/www.realblacklove.com\/wp-admin\/admin-ajax.php","mainColor":"#09a9d9","tosAlert":"You must agree with the terms and conditions.","loadingmessage":"<i class=\"icon icon-refresh icon-spin\"><\/i> Sending info, please wait..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.realblacklove.com/wp-content/themes/sweetdate/assets/scripts/app.js?ver=20140212'></script>
<script type='text/javascript' src='//platform.twitter.com/widgets.js?ver=3.8.1'></script>
</body>
</html>