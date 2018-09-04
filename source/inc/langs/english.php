<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "English",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "UTF-8",
	"title" => "Administration Area"
		
);

$admin_layout = array(

	"3" => "My Preferences",
	"4" => "Logout",

);


$admin_layout_page1 = array(

	"" => "Dashboard",

		"_*" => "Admin Area Dashboard",
		"_?" => "",

	"members" => "Member Statistics",
		
		"members_*" => "Member Statistics",
		"members_?" => "The graph below shows the number of new member signup's over the last two weeks.",
		"members_^" => "sub",

	"affiliate" => "Affiliate Statistics",
 
		"affiliate_*" => "Affiliate Statistics",
		"affiliate_?" => "The graph below shows the number of new affiliate signup's over the last two weeks.",
		"affiliate_^" => "sub",

	"visitor" => "Visitor Statistics",
 
		"visitor_*" => "Visitor Statistics",
		"visitor_?" => "The graph below shows the number of web site visitor statistics recorded by the software on each day over the last two weeks.",
		"visitor_^" => "sub",

	"maps" => "Google Maps",
 
		"maps_*" => "Visitor Locations with Google Maps",
		"maps_?" => "This section allows you to see where in the world your members are joining your web site from. This allows you to develop your marketing and advertising campaign's more effectively by targeting and monitoring different countries.",
 

	"adminmsg" => "Web Site Announcement",
 
		"adminmsg_*" => "Web Site Announcement",
		"adminmsg_?" => "Enter your message into the box below and each time a member logs into their account the message will be displayed to them. This is great for showing service announcements or web site changes.",

);
 

$admin_layout_page2 = array(

	"" => "Members",

		"_$" => "half",
		"_*" => "Manage Members",
 

			"edit" => "Edit Member Details",
	
				"edit_*" => "Edit Member",
				"edit_?" => "Use the options below to update a members account and profile details.",
				"edit_^" => "none",


			"fake" => "Fake Members",
	 
				"fake_*" => "Generate Fake Members",
				"fake_?" => "Use the options below to generate fake members for your web site, this will help your web site looks 'busy' whilst your first getting started. Its recommended you use the same email address for all fake members incase you wish to locate and delete them at a later date.",
				"fake_^" => "sub",

	"banned" => "Banned Members",
 
		"banned_*" => "Banned Members",
		"banned_?" => "The software has a built in hacker detection system which automatically blocks members who are attempting to hack your web site. Below are all the current member (and none member) details for hack attempts.",
		"banned_^" => "sub",

	"monitor" => "Monitor Members",
 
		"monitor_*" => "Monitor Members",
		"monitor_?" => "From time to time members may report other members for abusing the message system or sending nasty or unwanted messages. You can use this tool to view and monitor member messages to help protect the safety of others.",
		"monitor_^" => "sub",

	"import" => "Import Members",
 
		"import_*" => "Import Members from Database or CVS File",
		"import_?" => "Using the options below you can import members into your web site from another dating/community  software platform or from a CVS backup.",
		"import_^" => "sub",
		
	"files" => "Member Files", 
	"files_*" => "Member Album Files",


	"addfile" => "Upload Photo",			 
	"addfile_*" => "Upload a photo",
	"addfile_?" => "Sometimes a member will have difficulty uploading a photo to their web site. Using this section you can upload a photo for your member.",
	"addfile_^" => "sub",
			
 
	"affiliate" => "Web Site Affiliates",
 
		"affiliate_*" => "Web Site Affiliates",
		"affiliate_?" => "Using the options below you can manage your web site affiliates.",
		 
			"addaff" => "Add New Affiliate",
	 
				"addaff_*" => "Add/Edit Affiliate Account",
				"addaff_?" => "Complete all of the fields below to add/edit an affiliate account on your web site.",
				"addaff_^" => "sub",

			"affsettings" => "Affiliate Content Pages",
 
				"affsettings_*" => "Affiliate Page Design",
				"affsettings_?" => "Use the options below to edit the wording on your affiliate pages.",
				"affsettings_^" => "sub",

			"affcom" => "Affiliate Commission",
	 
				"affcom_*" => "Affiliate Commission",
				"affcom_?" => "Here you can set the commission rate for your affiliates. This means that for every sale made by a member refereed to your web site by an affiliate, they will generate the percentage of the total sale below.",
				"affcom_^" => "sub",


			"affban" => "Affiliate Banners",
	 
				"affban_*" => "Affiliate Banners",
				"affban_?" => "Here you can setup the banner adverts that will be displayed within the affiliate account for your affiliates to use on their web site.",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Theme Gallery",
 
			"_*" => "Theme Gallery",
			"_?" => "Listed below are all the web site templates that are currently installed onto your web site. Click on the preview image to instantly change the template on your web site.",
			 
				
			"color" => "Colour Schemes",
		 
				"color_*" => "Colour Schemes",
				"color_?" => "Using the options below you can customize the colour scheme for your web site. If you wish to replace images with your own, please use the theme image tools.",
				"color_^" => "sub",
				
			"logo" => "Web Site Logo",
				"logo_$" => "half",
				"logo_*" => "Web Site Logo",
				"logo_?" => "Use the options on this page to customize the logo appearance on your web site. You can select from a pre designed logo or upload your own.",
				"logo_^" => "sub",
				
			"img" => "Theme Images",
				"img_$" => "half",
				"img_*" => "Theme Images",
				"img_?" => "The images below are all stored within your template image folder. Use the options below to replace existing images with new ones you select.",
				"img_^" => "sub",

			"text" => "Home Page Text",
				"text_$" => "half",
				"text_*" => "Home Page Text",
				"text_?" => "The fields below allow you to change the welcome text on the home page of your website. Some templates use different sets of wording pairs so you may need to experiement to find out which one is right for you.",
				"text_^" => "sub",


			"terms" => "Website T&C",
				"terms_$" => "half",
				"terms_*" => "Website Terms and Conditions",
				"terms_?" => "Edit the field below to customize your website terms and conditions. These are then displayed on the register page during signup.",
				"terms_^" => "sub",
	
			"edit" => "Pages & Files",
 
			"edit_*" => "Web Site Pages",
			"edit_?" => "Select from the list boxes below to view the content of the files on your web site. Its recommended to copy and paste the code into an editor such as front page or dreamweaver before editing and paste it back when your finished. <b>Please take great care when editing config or system files as changes are instant and cannot be undone.</a>",
				
	
	
				"newpage" => "Create Page",
				"newpage_$" => "half",
				"newpage_*" => "Create a new page",
				"newpage_?" => "Creating a new page on your web site is easy. Simply enter a one word title in the box below and your page will be created ready for editing.",
				"newpage_^" => "sub",
							
				
			"meta" => "Theme Meta Tags",
				"meta_$" => "half",
				"meta_*" => "Meta Tag Editor",
				"meta_?" => "Our software has a sophisticated meta tag creation system built into the software saving you time and money creating thousands of page descriptions yourself. The software will automatically generate title, description and keyword meta tags based on the content displayed on the page.",
				"meta_^" => "sub",

 

		
			"menu" => "Menu Bars",
				"menu_$" => "half",
				"menu_*" => "Menu Bar Management",
				"menu_?" => "Use the options below to change the order of your member bars or add new menu items. You can also enter external links such as http://google.com as the menu link for a menu item if you wish to link to another web site or page on your web site.",
				"menu_^" => "sub",

	"manager" => "File Manager",
		"manager_$" => "half",
		"manager_*" => "File Manager",
		"manager_?" => "The file manager is very useful when adding or deleting new files/content to your web site. You can browse the entire hosting account and delete files are required.",

			"slider" => "Rotating Images",
				"slider_$" => "half",
				"slider_*" => "Home Page Rotating Images",
				"slider_?" => "The slider images are the rotating images displayed on your home page. Use the options below to change the image, description and click able links.",
				"slider_^" => "sub",

	"languages" => "Language Files",
		"languages_$" => "half",
		"languages_*" => "Language Files",
		"languages_?" => "Listed below are all the language files loaded onto your web site. You can delete any of the language files that you don't want to use and they will not be displayed on your web site or check the box to change the default web site language. <b>Note, you must logout of the admin and web site to see language changes</b>",

			"editlanguage" => "Edit Language File",
				"editlanguage_$" => "half",
				"editlanguage_*" => "Edit Language File",
				"editlanguage_?" => "Take care when editing the language file below, ensure to keep the syntax the same to prevent any system errors. Only enter the content within after the arrow (=>) The first value is used as a key.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Add Language File",
				"addlanguage_$" => "half",
				"addlanguage_*" => "Add Language File",
				"addlanguage_?" => "Creating a new language file will simply copy one of the existing ones you choose below and rename it, you can then open up the language file and edit the contents.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Email and Newsletters",

		"_$" => "half",
		"_*" => "Email and Newsletters",
		"_?" => "Below are a list of all the emails currently stored within the system. System emails are used by the software to send emails to members when events happen such as during registration or lost password. You can customize all emails and create your own using the options below",

			"add" => "Create New Email",
				"add_$" => "half",
				"add_*" => "Add/Edit New Email",
				"add_?" => "Complete the forms below to add/edit your new email, this will then be saved into your custom email templates folder so you can return to it or send it any time you like.",
				"add_^" => "sub",

	"welcome" => "Welcome Email/ SMS",
		"welcome_$" => "half",
		"welcome_*" => "Setup Welcome Email/ SMS",
		"welcome_?" => "Using the options below you can decide which email and text message is sent to the member when they first signup.",
		"welcome_^" => "sub",

	"template" => "Email Templates",
		"template_$" => "half",
		"template_*" => "Email Templates",
		"template_?" => "Listed below are a selection of template templates built into the software. Click on any of the images to open and edit the template.",
		"template_^" => "sub",

	"export" => "Download Emails",

		"export_$" => "half",
		"export_*" => "Download Emails",
		"export_?" => "Use the options below to download all of your member email addresses from the database.",
		"export_^" => "sub",

	"sendnew" => "Send Newsletters",

		"sendnew_$" => "half",
		"sendnew_*" => "Send Newsletter",
		"sendnew_?" => "Use this section to begin sending newsletters to your members. First select which members to send to and then select which email to send.",

	"send" => "Send Single Email",

		"send_$" => "half",
		"send_*" => "Send Single Email",
		"send_?" => "Use this option to send a single email to a member by entering the email address below. The email used to send the email is the same one listed on your admin account.",
		"send_^" => "sub",

	/*"auto" => "Email Scheduler",

		"auto_$" => "half",
		"auto_*" => "Automatic Email Scheduler",
		"auto_?" => "Automatic emails are emails that are sent out by the software on a timely manner such as once a day, week, month etc. You can setup such emails below.",
		"auto_^" => "sub",*/

	"subs" => "Email Reminders",

		"subs_$" => "half",
		"subs_*" => "Email Reminders",
		"subs_?" => "Email reminders allow you to send emails to members which are within a X number of days for an event such as their membership expiring or not adding a photo.",
		"subs_^" => "sub",
		
	"tc" => "Email Reports",
		"tc_$" => "half",
		"tc_*" => "Email Reports",
		"tc_?" => "Email reports are generated when an email is sent that contains the tracking code. They generate statistics of how many members opened the emails you send.",
		"tc_^" => "sub",

			"tracking" => "Email Tracking Code",
				"tracking_$" => "half",
				"tracking_*" => "Email Tracking Code",
				"tracking_?" => "The tracking code below (tracking_id) is replaced by a transparent image which is attached to the emails when they are sent. If the email is opened and the image not blocked, the system can record the email has been opened and generate a tracking report for you.",
				"tracking_^" => "sub",



	"SMSsend" => "Send SMS Messages",

		"SMSsend_$" => "half",
		"SMSsend_*" => "Send SMS Messages",
		"SMSsend_?" => "Use the options below to send SMS/text messages to your members mobile phones.",
);

$admin_layout_page5 = array(

	"" => "Membership Levels",

		"_$" => "half",
		"_*" => "Membership Levels",
		"_?" => "Listed below are all the current membership packages applied to your web site. The ones highlighted in green are required by the system to control how visitors and new members are handled giving you more control of your web site.",

			"epackage" => "Add Package",
				"epackage_$" => "half",
				"epackage_*" => "Add/Edit Package",
				"epackage_?" => "Complete the forms below to add or update the membership package for your web site.",
				"epackage_^" => "sub",

			"packaccess" => "Manage Access",
				"packaccess_$" => "full",
				"packaccess_*" => "Manage Page Access",
				"packaccess_?" => "Here you can control access to your entire web site based on membership package. <b>Note: Only tick the box if you do NOT wish the member to view that page. </b>",
				"packaccess_^" => "sub",

			"upall" => "Transfer Members",
				"upall_$" => "half",
				"upall_*" => "Transfer Members Between Packages",
				"upall_?" => "Use this option is you wish to transfer members from one membership level to another.",
				"upall_^" => "sub",


	"gateway" => "Payment Gateways",

		"gateway_$" => "half",
		"gateway_*" => "Payment Gateways",
		"gateway_?" => "Payment gateways allow you to take payment for your membership upgrades. If you are running a free web site you can turn off the payment system in the settings area.",


			"addgateway" => "Add Payment Gateway",
				"addgateway_$" => "half",
				"addgateway_*" => "Add Payment Gateway",
				"addgateway_?" => "The software has a number of payment gateways already built into the system, select the provider from the list below to use this on your web site.",
				"addgateway_^" => "sub",


	"billing" => "Billing System",

		"billing_$" => "half",
		"billing_*" => "Billing System",	


		"affbilling" => "Affiliate Billing History",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Affiliate Billing History", 
			"affbilling_^" => "sub",

    "coupon" => "Coupon System",
        "coupon_$" => "half",
        "coupon_*" => "Coupon System",

);

$admin_layout_page6 = array(

	"" => "Banners and Advertising",

		"_$" => "half",
		"_*" => "Banners and Advertising",
 

			"addbanner" => "Add Banner",
				"addbanner_$" => "half",
				"addbanner_*" => "Add Banner",
				"addbanner_?" => "Use the options below to add a new banner to your web site.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Display Settings",

		"_$" => "half",
		"_*" => "Display Settings",
		"_?" => "Use the options below to turn off and on web site features that you dont wish to use.",


	"op" => "Display Options",

		"op_$" => "half",
		"op_*" => "Display Options",
		"op_?" => "Use the options below to customize your web site settings the way you like.",
	
		"op1" => "Search Settings",
	
			"op1_$" => "half",
			"op1_*" => "Search Display Settings",
			"op1_?" => "Use the options below to customize the way your search pages are displayed throughout your web site.",
			"op1_^" => "sub",
	
		"op2" => "Membership Settings",
	
			"op2_$" => "half",
			"op2_*" => "Membership Settings",
			"op2_?" => "Use the options below to customize the way your web site membership setup is displayed.",
			"op2_^" => "sub",

		"op3" => "Flash Server Settings",
	
			"op3_$" => "half",
			"op3_*" => "Flash Server Settings",
			"op3_?" => "A flash server is used to store member video greetings and is used within the IM and chat room to display member video cameras.",
			"op3_^" => "sub",

		"op4" => "API Settings",
	
			"op4_$" => "half",
			"op4_*" => "API Settings", 
			"op4_^" => "sub",

		"thumbnails" => "Default Thumbnails",
	
			"thumbnails_$" => "half",
			"thumbnails_*" => "Default Thumbnails", 
			"thumbnails_^" => "Listed below are all the current default images used throughout your web site when members have not upload their own photos.",

	"email" => "Email Settings",

		"email_$" => "half",
		"email_*" => "Email Settings",
		"email_?" => "Listed below are a list of web site events, you can select which events you would like the system to send you an email notification. Email notifications will be sent to all system admins who have access to system settings.",

	"paths" => "File / Folder Paths",

		"paths_$" => "half",
		"paths_*" => "File / Folder Paths",
		"paths_?" => "The File and Folder paths below relate to the files and folders on your hosting account. The software will automatically apply these during the installation process however incase they are incorrect you can modify them below.",

	"watermark" => "Image Watermark",

		"watermark_$" => "half",
		"watermark_*" => "Image Watermark",
		"watermark_?" => "An image watermark is a image that is displayed on top of member photos when they are displayed. This is usually a your web site logo, watermark images must be in the format PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Web Site Fields",

		"_$" => "half",
		"_*" => "Profile, Registration and Search Fields",
		"_?" => "Listed below are all the current fields listed on your web site. You can select to display the fields on the search page, registration pages, profile pages and even the member match pages. You can quickly and easily add new fields to your web site using the options below.",

		"addfields" => "Create New Field",
	
			"addfields_$" => "half",
			"addfields_*" => "Create New Field",
			"addfields_?" => "Use the options below to add a new field to your web site. A field is used to allow members to fill out information about themselves.",
			"addfields_^" => "sub",

		"fieldgroups" => "Manage Groups",
	
			"fieldgroups_$" => "half",
			"fieldgroups_*" => "Manage Field Groups",
			"fieldgroups_?" => "Groups are a collection of fields which have a common theme. So for example you may create a group called 'About me' and within the group add fields such as 'My Name', 'My Age' etc. <b>If you delete a group with fields in them, the fields will automatically be moved to the next group.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Create New Field Group",
	
			"addgroups_$" => "half",
			"addgroups_*" => "Create New Field Group",
			"addgroups_?" => "A field group is a collection of fields all put under one main group headline. This enables you to create lots of groups with fields which are related to the group theme.",
			"addgroups_^" => "sub",




	"cal" => "Events Calendar",

		"cal_$" => "half",
		"cal_*" => "Events Calendar",
		"cal_?" => "The events calendar is displayed on your web site for members to create and view events. Use the options below to create, edit and import new events.",

		"caladd" => "Add Event",
	
			"caladd_$" => "half",
			"caladd_*" => "Add /Edit Event",
			"caladd_?" => "Complete the fields below to add/edit a web site event.",
			"caladd_^" => "sub",

		"caladdtype" => "Manage Event Types",
	
			"caladdtype_$" => "half",
			"caladdtype_*" => "Manage Event Types",
			"caladdtype_?" => "Use the options below to create new event types, its recommended to add an image to each event to make your web site look more professional.",
			"caladdtype_^" => "sub",

		"importcal" => "Import Events",
	
			"importcal_$" => "half",
			"importcal_*" => "Search & Import Events",
			"importcal_?" => "The software has a built in events api system. This allows you to search a worldwide database of local and international events and add them directly to your web site.",
			"importcal_^" => "sub",


	"poll" => "Web Site Poll",

		"poll_$" => "half",
		"poll_*" => "Web Site Poll",
		"poll_?" => "Use the options below to create and manage your web site polls",

		"polladd" => "Add Poll",
	
			"polladd_$" => "half",
			"polladd_*" => "Create a new poll",
			"polladd_?" => "Complete the fields below to create a new poll for your web site.",
			"polladd_^" => "sub",



	"forum" => "Web Site Forum",

		"forum_$" => "half",
		"forum_*" => "Web Site Forum Categories",
		"forum_?" => "Use the options below to manage your web site form category. Its recommended to add photo icons for each category to make your web site look more professional.",

		"forumadd" => "Add Forum Category",
	
			"forumadd_$" => "half",
			"forumadd_*" => "Add Forum Category",
			"forumadd_?" => "Complete the fields below to add a new category to your web site.",
			"forumadd_^" => "sub",

		"forumchange" => "ThirdParty Forum",
	
			"forumchange_$" => "half",
			"forumchange_*" => "Manage Forum Integration",
			"forumchange_?" => "The software has the ability for you to change the forum board, this means you can select any of the forums listed below to use instead of the default forum Please refer to the installation manuals for each forum board before enabling this feature.",
			"forumchange_^" => "sub",

		"forumpost" => "Manage Posts",
	
			"forumpost_$" => "half",
			"forumpost_*" => "Manage Forum Posts",
			"forumpost_?" => "Listed below are all the recent forum posts added by your members. Use the options below to edit or delete topics which are unacceptable.",
			"forumpost_^" => "sub",

	"chatrooms" => "Web Site Chatroom",

		"chatrooms_$" => "half",
		"chatrooms_*" => "Web Site Chatroom",
		"chatrooms_?" => "Use the options below to create new chat rooms for your web site or edit the existing ones.",


	"faq" => "Web Site FAQ",

		"faq_$" => "half",
		"faq_*" => "Web Site FAQ",
		"faq_?" => "Web site FAQ are a great way to help members learn more about your web site and answer any problems they might have. Create your own set of FAQ and manage them using the options below.",

		"faqadd" => "Add FAQ",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Add/Edit FAQ",
			"faqadd_?" => "Complete the fields below to add or edit an FAQ entry.",
			"faqadd_^" => "sub",

	"words" => "Word Filter",

		"words_$" => "half",
		"words_*" => "Word Filter",
		"words_?" => "The word filter is applied to member profiles, IM and forum and will filter out any of the words you enter here and replace them with stars (**).",



	"articles" => "Web Site Articles",

		"articles_$" => "half",
		"articles_*" => "Web Site Articles",
		"articles_?" => "Web site articles are a great way to keep your members up to date with the latest changes to your web site for news and event",


		"articleadd" => "Add Article",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Create a new article",
			"articleadd_?" => "Complete the fields below to add a new article to your web site.",
			"articleadd_^" => "sub",

		"articlerss" => "Import RSS Articles",
	
			"articlerss_$" => "half",
			"articlerss_*" => "Import RSS Articles",
			"articlerss_?" => "The RSS links can be used to import RSS articles directly into one of the categories you have created. So for example you might want to create a 'News' category and enter the RSS feed from a news web site. The software will then extract all the articles from the RSS fee and add them to your web site.",
			"articlerss_^" => "sub",

		"articlecats" => "Article Categories",
	
			"articlecats_$" => "half",
			"articlecats_*" => "Article Categories",
			"articlecats_?" => "Use the options below to create new article categories for your web site.",
			"articlecats_^" => "sub",


	"groups" => "Community Groups",

		"groups_$" => "half",
		"groups_*" => "Community Groups",
		"groups_?" => "Use the options below to create and manage your web site community groups.",


	"class" => "Classified Adverts",

		"class_$" => "half",
		"class_*" => "Classified Adverts",
		"class_?" => "Listed below are all the classified adverts created by your members.",


		"addclass" => "Add Classified",
	
			"addclass_$" => "half",
			"addclass_*" => "Add/Edit Advert",
			"addclass_?" => "Use the options below to add/edit the adverts on your web site.",
			"addclass_^" => "sub",

		"addclasscat" => "Manage Categories",
	
			"addclasscat_$" => "half",
			"addclasscat_*" => "Manage Categories",
			"addclasscat_?" => "Use the options below to manage your classified advert categories. Its recommended to add a photo icon for each to make your web site look more professional.",
			"addclasscat_^" => "sub",

	"games" => "Web Site Games",

		"games_$" => "half",
		"games_*" => "Web Site Games",
		"games_?" => "Listed below are all the games currently installed on your web site. Refer to the manual for details on installing new games",

	"gamesinstall" => "Install Game",

		"gamesinstall_$" => "half",
		"gamesinstall_*" => "Install Games",
		"gamesinstall_?" => "Select the games below that you wish to install. If you wish to add new games to your web site simply upload the game tar files to your game folder location: inc/exe/Games/tar/. <b>Refer to the manual for details on installing new games</b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administrators",

		"_$" => "half",
		"_*" => "web site Admin's & Moderators",
		"_?" => "Listed below are all the web site admins and moderators not including the super user. Add new moderators by using the member search page and clicking the moderator icon next to their name.",

	"pref" => "Admin Preferences",

		"pref_$" => "half",
		"pref_*" => "Admin Preferences",
		"pref_?" => "Use the options below to customize the administrators preferences.",

	"manage" => "Manage Moderators",

		"manage_$" => "half",
		"manage_*" => "Manage web site Manage Moderators",
		"manage_?" => "A web site moderators can have two roles, they can be a web site moderator which allows them access to moderate the main web site only, or you can provide them with their own admin login details so they can login to the admin area and use the admin tools.",
		"manage_^" => "sub",

	"email" => "Admin Emails",

		"email_$" => "half",
		"email_*" => "Admin Emails",
		"email_?" => "Listed below are all the emails send to the admin from the web site members.",

	"compose" => "Compose Email",

		"compose_$" => "half",
		"compose_*" => "Compose Email",
		"compose_?" => "Use the options below to create a new message to send to a member.",
		"compose_^" => "sub",

);

$admin_layout_page10 = array(

	"" => "Software Updates",

		"_$" => "half",
		"_*" => "Software Updates",
		"_?" => "Listed below is the current version of the software your running compared to the latest available release. If your version is out dated, please contact your provider for the latest upgrades.",

	"backup" => "Database Backup",

		"backup_$" => "half",
		"backup_*" => "Database Backup",
		"backup_?" => "Select one or more of the tables below to bakup your database. It is strongly recommended that you use the hosting area database backup features to ensure all data is received.",


	"license" => "Software License Keys",

		"license_$" => "half",
		"license_*" => "Software License Keys",
		"license_?" => "Listed below are your software license keys, please take when editing these to ensure they are correct.",

	"sms" => "SMS Credits",

		"sms_$" => "half",
		"sms_*" => "SMS Credits",
		"sms_?" => "Listed below is the current total amount of SMS credits left on your account.",

);

$admin_layout_page11 = array(

	"" => "Software Plugins",

		"_$" => "half",
		"_*" => "Software Plugins",
		"_?" => "Plugins extend and expand the functionality of our dating software. Once a plugin is installed, you may activate it or deactivate it here using the menu options on the left.",

);


$admin_layout_nav = array(

	"1" => "Dashboard",
		"1a" => "Member Statistics",
		"1b" => "Affiliate Statistics",
		"1c" => "Visitor Statistics",
		"1d" => "Visitor Locations",
	"2" => "Old Members",
		"2a" => "Manage Members",
		"2b" => "Manage Affiliates",
		"2c" => "Banned Members",
		"2d" => "Member Files",
		"2e" => "Import Members",
	"3" => "Design",
		"3a" => "Themes",
		"3b" => "Theme Editor",
		"3c" => "Theme Image Manager",
		"3d" => "Logo Editor",
		"3e" => "Meta Tags",	
		"3f" => "Languages",
		"3g" => "Page Wording",
		"3h" => "File Manager",
		"3i" => "Menu Bars",
	"4" => "Email",
		"4a" => "Manage Emails",
		"4b" => "Email Templates",
		"4c" => "Email Reports",
		"4d" => "Send Single Email",
		"4e" => "Email Reminders",	
		"4f" => "Download Emails",
		"4g" => "Send Newsletters",		
	"5" => "Billing",
		"5a" => "Manage Packages",
		"5b" => "Payment Gateways",
		"5c" => "Billing History",
		"5d" => "Affiliate Billing History",
	"6" => "Settings",
		"6a" => "Display Options",
		"6b" => "Display Settings",
		"6c" => "System Paths",
		"6d" => "Photo Watermark",
	"7" => "Content",
		"7a" => "Search Fields",
		"7b" => "Events Calendar",
		"7c" => "Web site Poll",
		"7d" => "Web site Forum",
		"7e" => "Chat Rooms",	
		"7f" => "FAQ",
		"7g" => "Word Filter",
		"7h" => "Articles / News",
		"7i" => "Groups",
	"8" => "Promotions",	
		"8a" => "Banners",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Manage Moderators",	
		"10a" => "Manage Moderators",
		"10b" => "Super User",
	"11" => "Maintenance",
		"11a" => "System Backup",
		"11b" => "License Keys",
		"11c" => "System Updates",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "System Updated Successfully",
	"no_update" => "System updated however there was nothing to delete!",
	"edit" => "Edit",
    "addfalse" => "Redemption code already in use",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Search",
	"1" => "Select All",
	"2" => "Unselect All",
	"3" => "Approve",
	"4" => "Suspend",
	"5" => "Delete",	
	"6" => "Make Featured Member",
	"7" => "Options",	
	"8" => "Update",	
	"9" => "Make Featured",
	"10" => "Remove Featured",	
	"11" => "Update Default Language",
	"12" => "Send",
	"13" => "Continue",	
	"14" => "Make Active",
	"15" => "Disable",
	"16" => "Update Order",
	"17" => "Update Field Pages",	
	"18" => "Enable",
    "19" => "Add new",
);

$admin_table_val = array(
	"1" => "Username",
	"2" => "Gender",
	"3" => "Last Login",
	"4" => "Status",
	"5" => "Package",
	"6" => "Updated",
	"7" => "Options",	
	"8" => "Date",
	"9" => "IP Address",
	"10" => "Hack String",	
	"11" => "Date Joined",	
	"12" => "Name",
	"13" => "Email",
	"14" => "Clicks",
	"15" => "Signup's",
			
	"15" => "Commission Paid",
		
	"16" => "Message",
	"17" => "Time",
	"18" => "File Name",
	"19" => "Last Updated",	
	"20" => "Edit",
	"21" => "Default",	
	"22" => "ID",

	"23" => "Price",
	"24" => "Visible",	
	"25" => "Type",
	"26" => "Manage Access",	
	"27" => "Active",

	"28" => "View Code",
	"29" => "Fields",	
	"30" => "Affiliate Name",
	"31" => "Total Due",	
	"32" => "Status",
	
	"33" => "Date Upgraded",
	"34" => "Date Expires",	
	"35" => "Payment Method",
	"36" => "Still Active",	
	"37" => "Password",
	"38" => "Last Logged In",

	"39" => "Position",
	"40" => "Hits",	
	"41" => "Active",
	"42" => "Preview",	
	"43" => "Title",
	"44" => "Articles",
	"45" => "Order",

);

$admin_search_val = array(
	"1" => "Member Username",
	"2" => "All Packages",
	"3" => "All Genders",
	"4" => "Per Page",
	"5" => "Order By",
	"6" => "Email Address",
	
	"7" => "Any Status",
	"8" => "Active Members",
	"9" => "Suspended Members",
	"10" => "Unapproved Members",
	"11" => "Members wishing to cancel",
	"12" => "All Pages",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Manage All Groups",
	"2" => "Group Name",
	"3" => "Language",		
	"4" => "Manage Topics",
	"5" => "Manage Categories",	
	"6" => "Group Category Name",		
	"7" => "Manage Categories",	
	"8" => "Name",	
	"9" => "Count",	
	"10" => "Add Article",	
	"11" => "Category",
	"12" => "Page Title",	
	"13" => "Short Description",		
	"14" => "Add Article",
	"15" => "Manage Categories",
	"16" => "Field Lists",
	"17" => "Order",
	"18" => "Language",
	"19" => "List Values",
	"20" => "New Field",	
	
	"21" => "Field Title",		
	"22" => "Field Type",
		"23" => "Text Field",	
		"24" => "Text Area",	
		"25" => "List Box",
		"26" => "Single Check Box",
		"27" => "Multiple Check Box",
	
	"28" => "Group Headline",
	"29" => "Include during Registration",
	"30" => "Select Below",
	
	"31" => "Add Group",
	"32" => "Group Display Options",
		"34" => "Display to all members",
		"35" => "Display only for web site admin's",
		"36" => "Display to admin's and member (not on profile)",
	"37" => "Only",	
	"38" => "Manage Groups",	
	"39" => "Add Event",	
	"40" => "Field Captions",
	"41" => "Caption",		
	"42" => "Description Text",
	"43" => "Caption Type",	
	"44" => "Search Caption",		
	"45" => "Profile Caption",	
	"46" => "You must create one caption for the profile page such as 'i am a' and one for the search page such as 'i am seeking a'",	
	"47" => "Existing Field Captions",	
	"48" => "Move Field to this group",		
	"49" => "Member ID",
	"50" => "Event Name",	
	"51" => "Event Description",		
	"52" => "Event Type",
	"53" => "Select Category",	
	"54" => "Select Type",
	"55" => "Event Time",
	"56" => "Leave blank for all day",
	"57" => "Event Date",
	"58" => "Month",	
	
	"59" => "Day",	
	"60" => "Year",
	"61" => "Country",		
	"62" => "State / Province",
	"63" => "Street",	
	"64" => "Town / City",		
	"65" => "Phone",	
	"66" => "Email",	
	"67" => "Web site",	
	"68" => "Event Visible to",		
		"69" => "Everyone",
		"70" => "Friends Only",	
		
	"71" => "Add Poll",		
	"72" => "Web site Poll Results",
	"73" => "Poll name",	
	"74" => "Answer",	
	"75" => "Make Active",
	
	"76" => "Add Forum Topic",
	"77" => "Manage Posts",
	"78" => "Forum Topic",	
		
	"79" => "Title",	
	"80" => "Description",
	"81" => "Forum Posts",		
	"82" => "All Posts",
	"83" => "Today",	
	"84" => "This Week",		
	"85" => "Last Week",	
	"86" => "Room Name",	
	"87" => "Existing Field Captions",	
	"88" => "Room Password",		
	"89" => "Add New",
	"90" => "Add F.A.Q",
	
	"91" => "Add Word Censor",		
	"92" => "Word",
	
	"93" => "Approved",
	"94" => "Caption",
	"95" => "Match Caption",
	"96" => "Language",

	"97" => "Preview",
	"98" => "Results",
);
$admin_advertising = array(

	"1" => "Web site Banners",
	"2" => "Add Banner",
	"3" => "Affiliate Banners",	
	"4" => "Add / Edit Banners",
	"5" => "Banner Type",	
	"6" => "Web site Banner",			
	"7" => "Affiliate Banner",	
	"8" => "Name",	
	"9" => "Upload Banner",	
	"10" => "Enter HTML",	
	"11" => "HTML Code",
	"12" => "Upload Banner",	
	"13" => "Banner Link",		
	"14" => "Display to",
		"15" => "All Members",
		"16" => "Only Logged In Members",
	
	"17" => "Page",
	"18" => "Active",
	
	"19" => "Top Position",
	"20" => "Middle Position",	
	"21" => "Left Position",		
	"22" => "Bottom Position",
	"23" => "Leave blank to use link within banner code",
	"24" => "Banner Preview",
	
);


$admin_maintenance = array(

	"1" => "Currently Running",
	"2" => "Latest Version",
	"3" => "SMS Credits",	
	"4" => "Remaining SMS Credits",	
	"5" => "Purchase Credits",	

);

$admin_admin = array(

	"1" => "Add Admin",
	"2" => "Username",
	"3" => "Password",	
	"4" => "Email",
	
	"5" => "Edit Admin Settings",	
	"6" => "Full Name",			
	"7" => "Access Level",	
		"8" => "Full System Access",	
		"9" => "Member Access Only",	
		"10" => "Design Access Only",	
		"11" => "Email Access Only",
		"12" => "Billing Access Only",	
		"13" => "Settings Access Only",		
		"14" => "Management Access Only",
	"15" => "Admin Icon",

	"17" => "Email Alerts",
	"18" => "Admin News Alert",
	"19" => "Transfer all members from",
	"20" => "To the following package",	
	"21" => "Edit Package",		
	"22" => "Package Access",
	"23" => "Add Package Item",	
	"24" => "Manage Package Access",
);

$admin_settings = array(

	"1" => "Display Pages",
	"2" => "Enabled",
	"3" => "Disable",	
	"4" => "Web Paths",
	"5" => "Server Paths",	
	"6" => "Thumbnail Paths",			
	"7" => "Add Field",	
	"8" => "Name",	
	"9" => "Value",	
	"10" => "Type",	
	"11" => "Manage Fields",
	"12" => "Add Gateways",	
	"13" => "Payment System",		
	"14" => "Gateway Payment Code",
	"15" => "Title",
	"16" => "Package Access",
	"17" => "Comments",
	"18" => "Transfer Members",
	"19" => "Transfer all members from",
	"20" => "To the following package",	
	"21" => "Edit Package",		
	"22" => "Package Access",
	"23" => "Add Package Item",	
	"24" => "Manage Package Access",
);

$admin_billing = array(

	"1" => "Add Package",
	"2" => "Manage Package Access",
	"3" => "Transfer Members Packages",			
	"4" => "Your web site is currently running in <b>FREE MODE</b> therefore membership packages have been disabled.",
	"5" => "Would you like to disable free mode and display membership packages?",	
	"6" => "DISABLE FREE MODE",		
	"7" => "Add Field",	
	"8" => "Name",	
	"9" => "Value",	
	"10" => "Type",	
	"11" => "Manage Fields",
	"12" => "Add Gateways",	
	"13" => "Payment System",		
	"14" => "Gateway Payment Code",
	"15" => "Title",
	"16" => "Package Access",
	"17" => "Comments",
	"18" => "Transfer Members",
	"19" => "Transfer all members from",
	"20" => "To the following package",	
	"21" => "Edit Package",		
	"22" => "Package Access",
	"23" => "Add Package Item",	
	"24" => "Manage Package Access",
	
	"25" => "Pending Approval",
	"26" => "Approved Payments",
	"27" => "Rejected Payments",
	
	"28" => "All History",
	"29" => "Active Payments",
	"30" => "Finished Payments",
	"31" => "Active Subscriptions",
	"32" => "Finished Subscriptions",
	"33" => "Package Access Code",
	
);

$admin_email = array(

	"1" => "System Emails",
	"2" => "Newsletters",
	"3" => "Email Templates",		
	"4" => "Email Editor",
	"5" => "Subject",	
	"6" => "Preview Email",	
	"7" => "To Email",
	
	"8" => "Send to",	
		"9" => "All Members",	
		"10" => "Membership Package Subscribers",	
		"11" => "Active / Suspended / Unapproved Members",
	"12" => "To Package",	
	"13" => "Membership Status",		
	"14" => "Select Newsletter",	
	
	"15" => "Create New",
	"16" => "View Custom Created",
	"17" => "Email Tracking Code",
	"18" => "Create New",
	"19" => "View Custom Created",
	"20" => "Email Tracking Code",
		"21" => "HTML Code Below",
		
	"22" => "Email Tracking Results",
	"23" => "There were no reports found.",
	"24" => "Select Report",
	
	"25" => "Send Reminders to all members who have between",
	"26" => "and",
	"27" => "days",
	"28" => "Days left of their upgrade subscription",
	"29" => "Select Email to Send:",
	"30" => "Download",
	"31" => "Select Package",
	"32" => "Tracking Code",
	
	
);

$admin_design = array(

	"1" => "Download Themes",
	"2" => "Current Template",
	"3" => "Use This Template",	
	"4" => "Page Meta Tags",
	"5" => "Page Title",	
	"6" => "Description",
	"7" => "Keywords",
	"8" => "Web site Pages",	
	"9" => "Content Pages",	
	"10" => "Custom Pages",	
	"11" => "Create Page",
	"12" => "FTP Path",	
	"13" => "Theme Files",		
	"14" => "Content Pages",	
	"15" => "Custom Pages",


	"16" => "Add Language",
	"17" => "New File Name",	
	"18" => "Select file to copy",
			
	"19" => "Edit Language File",	
	"20" => "Custom Pages",

	"21" => "Font",
	"22" => "Font Size",	
	"23" => "Font Colour",
	"24" => "width",	
	"25" => "height",		
	"26" => "Add Logo Text",
	"27" => "Canvas Type",	
		"28" => "Use Blank Canvas",
		"29" => "Keep Current Design",	
		"30" => "Upload my own background / logo",	

	"31" => "Create New Page",
	"32" => "New Page Name",	
		"33" => "Page Names should be very short and only one word. EG. Links, Articles, News, Forum etc",
	"34" => "Add Menu Tab?",	
		"35" => "No! Do no create a tab",		
		"36" => "Yes. Add it to the members area",
		"37" => "Yes. Add it to the main web site pages, not the members area pages.",
			"38" => "If selected a new member tab will be generated on your web site",
);

$admin_overview = array(

	"1" => "Announcement",
	"2" => "Total Members",
	"3" => "This Week",
	"3a" => "Today",
	"4" => "Recent Web site Activity",
	"5" => "Web site Reports",
	
	"6" => "Unique Web site Visitors over the last two weeks",
	"7" => "New member signup's in the last 2 weeks",
	"8" => "Member Gender Statistics",	
	"9" => "Member Age Statistics",
	
	"10" => "New Affiliate signup's in the last 2 weeks",
	"11" => "Visitor Map Settings",
	"12" => "Please enter your Google API key into the field above.",	
	"13" => "You can purchase a license key from the customer area of our web site",	
	
	"14" => "Filter Search Results",	
	"15" => "All Files",
	
);
$admin_members = array(

	"1" => "All Members",
	"2" => "Moderators",
	"3" => "Active",
	"4" => "Suspended",
	"5" => "Unapproved",
	"6" => "Wish to Cancel",
	"7" => "Online Now",
	"8" => "Member Login Activity",	
	"9" => "Edit Member Details",	
	"10" => "Add Affiliate",
	"11" => "Affiliate Banners",
	"12" => "Affiliate Pages",	
	"13" => "Add Affiliate",	
	"14" => "Affiliate Settings",	
	"15" => "All Files",
	"16" => "Photos",
	"17" => "Videos",
	"18" => "Music",
	"19" => "YouTube",
	"20" => "Unapproved",
	"21" => "Featured",
	"22" => "Upload File",	
	"23" => "File",
	"24" => "Type",
	"25" => "Username",
	"26" => "Title",
	"27" => "Comments",
	"28" => "Make Default",		
	"29" => "Member Login Activity",	
	"30" => "Affiliates Signed Up By",
	"31" => "Featured",
	"a5" => "Username",
	"a6" => "Password",
	"a7" => "First Name",
	"a8" => "Last Name",
	"a9" => "Business Name",
	"a10" => "Address",
	"a11" => "Street",
	"a12" => "Town/City",
	"a13" => "State/County",
	"a14" => "Zip/Post Code",
	"a15" => "Country",
	"a16" => "Telephone",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Web site address",
	"a20" => "Make check payable to",
);


// HELP FILES
$admin_help = array(

	"a" => "Get Started Now",
	"b" => "No, I'm fine. Thanks!",
	"c" => "Continue",	
	"d" => "Close Window",
	
	
	"1" => "Introduction",
	"2" => "Do you need help getting started?",
	"3" => "Hello",	
	
	"4" => "and welcome to the administration area! As this is the first time you have logged into the administration area it is recommended that you take a few minutes to follow the wizard below to help you get started!",
	"5" => "Our Getting Started Wizard will guide you through basic setup steps and get you up and running in no time.",	
	"6" => "<strong>(Note)</strong> You can revisit this page any time by clicking on the 'quick help guide' on the left menu bars.",
	
	"7" => "Getting Started",
	"8" => "Welcome to your administration area!",	
	"9" => "Welcome to your admin account area for",	
	"10" => "This software allows you to manage all different aspects of your web site, including your members, files, security, email, plugins, and a whole lot more.",	
	"11" => "This getting started wizard will introduce you to some of the concepts behind web site management and allow you to configure some basic settings for your web site so that you can start bringing traffic (visitors) to your site.",
	"12" => "<strong>(Remember)</strong> At any time, you can close this window using the close button and come back later by clicking on the 'quick help guide' from the left menu bar.",
		
	"13" => "Introduction to your administration area!",		
	"14" => "The software administration area is 'web based' which means you can access and manage your web site anywhere in the world with an internet connection. Simply point your browser at:",	
	"15" => "and login with your admin login details.",
	"16" => "Click here to bookmark this link now.",
	
	"17" => "Introduction to your dashboard.",	
	"18" => "The software dashboard gives you a very quick overview of your web site performance, you can read software announcement's, view member signup history, see member and affiliate statistic charts and more.",			
	"19" => "All member information is stored in the MYSQL database called:",	
	"20" => "Introduction to web site statistics.",
	"21" => "The software statistics gives you a visual representation of your member and affiliate signup history over a two week period. Each time a member or affiliate joins your web site the time and date is recorded and plotted onto the graphs.",
	
	"22" => "Introduction to visitor locations",		
	"23" => "Introduction to managing your members",	
	"24" => "Introduction to managing your affiliates",	
	"25" => "Introduction to managing your banned members",		
	"26" => "Introduction to managing your member files's",
	"27" => "Introduction to importing Members",	
	"28" => "Introduction to web site themes",
	"29" => "Introduction to Theme Editor",	
	"30" => "Introduction to Theme Image Manager",
	"31" => "Introduction to Logo Editor",
	"32" => "Introduction to Meta Tags",	
	"33" => "Introduction to Languages",
	"34" => "Introduction to Manage Emails",	
	"35" => "Introduction to Email Templates",		
	"36" => "Introduction to Email Reports",
	"37" => "Introduction to Send Newsletters",
	"38" => "Introduction to Email Reminders",
	"39" => "Introduction to Downloading Email Addresses",
	"40" => "Introduction to Membership Packages",
	"41" => "Introduction to Payment Gateways",
	"42" => "Introduction to Membership Billing History",
	"43" => "Introduction to Affiliate Billing History",
	"44" => "Introduction to Display Options",
	"45" => "Introduction to Display Settings",
	"46" => "Introduction to System Paths",
	"47" => "Introduction to Watermark",
	"48" => "Introduction to Search Fields",
	"50" => "Introduction to Events Calendar",
	"51" => "Introduction to web site Poll",
	"52" => "Introduction to web site Forum",
	"53" => "Introduction to Chat Rooms",
	"54" => "Introduction to web site FAQ",
	"55" => "Introduction to Word Filter",
	"56" => "Introduction to News / Articles",
	"57" => "Introduction to Groups",

		"22a" => "The visitor locations map plots the locations of each of your web site members allowing you to see at a glance which countries your members are joining from.",		
		"23a" => "The manage members tool allows you to see all of the members who have joined your web site. Use the search options to filter through your members to edit, update and delete member profiles.",	
		"24a" => "The affiliate manager tool allows you to view at a glance all your web site affiliates, you can view, edit and delete affiliates from your web site and approve new affiliate signup's.",	
		"25a" => "The banned members section stores all records of members and non members who are trying to 'hack' at your web site, the software will automatically ban suspected members from viewing your web site to prevent them causing your web site any harm.",		
		"26a" => "The member files tool allows you to view all of your web site member uploads, music, video photos etc can all be managed here. Click on any of the photos to edit the photo using our built in cropping tool.",
		"27a" => "The member import tool allows you to import members from other software applications. You simply enter the database information for the web site where your old system is stored and it will transfer it to your new web site.",	
		"28a" => "The web site themes section allows you to change the web site template and design of your site instantly! Simply click on the theme you wish to use and your web site will automatically be updated.",
		"29a" => "The Theme Editor tools allow you to edit the web site pages directly from the administration area. You may also wish to copy and paste the code into your own web site editor and then paste it back again once you have finished editing.",	
		"30a" => "The Theme Image Manager tool allows you to change the current images on your web site by uploading new ones. New images will replace the current image and be instantly applied to your web site.",
		"31a" => "The Logo Editor tool allows you to change the design of your current logo. You may also wish to create your own logo using your own image editing package and then select the 'upload my own logo' to add this to your web site.",
		"32a" => "The Meta Tags feature allows you to edit all of the meta tags for web site pages generated by the software. You can add your own title, keywords and descriptions for each of your web site pages. ",	
		"33a" => "The Language management tool allows you to delete any language from your web site that you don't wish to use and also add your own language pack.",
		"34a" => "The Email management tools allow you to create your own system and newsletter emails to give your web site a unique personal touch.",	
		"35a" => "Introduction to Email Templates",		
		"36a" => "Introduction to Email Reports",
		"37a" => "Introduction to Send Newsletters",
		"38a" => "Introduction to Email Reminders",
		"39a" => "Introduction to Downloading Email Addresses",
		"40a" => "Introduction to Membership Packages",
		"41a" => "Introduction to Payment Gateways",
		"42a" => "Introduction to Membership Billing History",
		"43a" => "Introduction to Affiliate Billing History",
		"44a" => "Introduction to Display Options",
		"45a" => "Introduction to Display Settings",
		"46a" => "Introduction to System Paths",
		"47a" => "Introduction to Watermark",
		"48a" => "Introduction to Search Fields",
		"50a" => "Introduction to Events Calendar",
		"51a" => "Introduction to web site Poll",
		"52a" => "Introduction to web site Forum",
		"53a" => "Introduction to Chat Rooms",
		"54a" => "Introduction to web site FAQ",
		"55a" => "Introduction to Word Filter",
		"56a" => "Introduction to News / Articles",
		"57a" => "Introduction to Groups",
);

$admin_login = array(

	"1" => "Admin Area Login",
	"2" => "Forgot your password? No worries, enter your email address below and we will send you a new one.",
	"3" => "Email Address",
	"4" => "Text Below",
	"5" => "Reset Password",
	"6" => "Enter your information below to log in.",
	"7" => "Username",
	"8" => "Password",	
	"9" => "License",	
	"10" => "Language",
	"11" => "Login",
	"12" => "Logged IP is",	
	"13" => "Forgotten Password",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Highlighted Profile",
	"2" => "Web site Moderator",
	"3" => "Membership Package",
	"4" => "Send Upgrade Email",
	"5" => "Add package change to billing system ",
	"6" => "SMS Number",
	"7" => "SMS Credits",
	"8" => "Set Account Status to",	
	
	"9" => "Click the box to edit the password.",	
	"10" => "Highlighted members have a different background in the search results.",
	"11" => "This gives the member access to manage your web site as a moderator.",
	
	"12" => "affiliates welcome page",	
	"13" => "Banner Code Display Page",	
	"14" => "Affiliate Payment Page",	
	"15" => "Affiliate Summary Page",
	"16" => "Affiliate Edit Account Page",
	
	"17" => "Import Members From",	
	
	"18" => "Age",			
	"19" => "File Views",	
	"20" => "Private",
	"21" => "Public",
	
	"22" => "album",		
	"23" => "Adult Content",	
	"24" => "Public Content",	
	
	"25" => "Size",		
	"26" => "Move Files to Adult Albums",
	"27" => "Adult Files",

);

$admin_selection = array(

	"1" => "Yes",
	"2" => "No",
	
	"3" => "On",
	"4" => "Off",
);

$admin_plugins = array(

	"1" => "Plugins extend and expand the functionality of our dating software. Once a plugin is installed, you may activate it or deactivate it here using the menu options on the left.",
	"2" => "You can view and download new software plugins from the customer area of our web site.",
	"3" => "Plugin Name",
	"4" => "Plugin Details",
	"5" => "Last Updated",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Welcome back",
	"2" => "below is a quick overview of the member signup's and web site performance for today.",
	"3" => "New Members Today",
	"4" => "Files to approve",
	"5" => "You can update your email address and password by selecting Admin My Preferences.",
	"6" => "Close Window",

);
$admin_pop_chmod = array(

	"1" => "File Permissions Error",
	"2" => "The files on this page cannot be modified",
	"3" => "the following files/directories need to have 'write' permissions set before you can edit them. If you're running on a Linux or Unix web host, you can use your FTP program and use the 'CHMOD' ('Change Mode') function to grant write permissions. If your host is running Windows, you will need to contact them about setting up write permissions on these files/folders.",
	"4" => "The files/directories that require CHMOD 777 are",
	"5" => "Close Window",

);
$admin_pop_demo = array(

	"1" => "Demo Mode Enabled",
	"2" => "Changes to your system will NOT be saved in demo mode",
	"3" => "Your system access settings have been set to 'demo mode' which means access to a lot of features and functionality from within the admin area will be limited to 'read only'.",
	"4" => "You can browse around the admin area as normal however any alterations you make will not be saved during this time.",
	"5" => "<strong>Remember</strong> If you wish to remove the demo mode restriction upon your account please contact your system administration for more details.",
	"6" => "Close Window",
);

$admin_pop_import = array(

	"1" => "Database Transfer Results",
	"2" => "members were imported successfully!",
	"3" => "members were imported successfully from",
	"4" => "software. Please follow the instructions below to ensure your member images are updated correctly.",
	"5" => "The image folder paths are below, you must copy the images from old web site to the new paths below;",
	"6" => "Close Window",
);

$admin_loading= array(

	"1" => "Optimizing Database Tables",
	"2" => "Please Wait",

);
$admin_menu_help= array(
"1" => "Quick Help Guide",
);

$admin_settings_extra = array(

	"1" => "Display Search Page",
	"2" => "Display Contact Page",
	"3" => "Display Tour Page",
	"4" => "Display FAQ Page",
	"5" => "Display Events",
	"6" => "Display Groups",
	"7" => "Display Forum",
	"8" => "Display Matches",	
	"9" => "Display Network",	
	"10" => "Display Affiliate System",
	"11" => "Display SMS / Text Message Alert System",
	
	"12" => "Display Blogs",	
	"13" => "Display Chat Rooms",	
	"14" => "Display Instant Messenger",	
	"15" => "Display Registration Verification Image",
	"16" => "Display UK Post Code Search",
	"17" => "Display US Zip Codes Search",
	"18" => "Display MSN/Yahoo Integration",
	
	"19" => "Default Membership Package",
		"20" => "This is the membership package members are signed up to as default",
	"21" => "Members must upload an image to join",
		"22" => "Set this will determine if members are allowed to skip the option to upload an image during  registration.",	
	"23" => "FREE MODE",
		"24" => "Set this to 'yes' if you wish all the features of your web site to be accessible by everyone.",
	"25" => "MAINTENANCE MODE",
		"26" => "This will stop all access to your web site to members and non-members and allow only admin's who have logged into the admin area to browse the web site.",
		
	"27" => "Number of search results per page",
		"28" => "Select the number of profiles per page you wish to be displayed",		
	"29" => "Number of match results on overview page",	
		"30" => "Select the number of profiles per page you wish to be displayed.",
		
	"31" => "Email Activation Codes",
		"32" => "Members will be sent an activation code to their email which must be validated before they can login.",
	"33" => "Manually Approve Members",
	"34" => "Set this to 'yes' or 'no' depending on if you wish to manually verify member accounts before they can login.",
	"35" => "Manually Approve Files",
		"36" => "Set this to 'yes' or 'no' depending on if you wish to manually verify files before display",
	"37" => "Manually Approve Video Recordings",
		"38" => "Set this to 'yes' or 'no' depending if you want to manually verify member broadcasts (video chat feeds).",
		
	"39" => "Display Video Greeting Recorder",
	"40" => "This enabled members to record their own video message for their profile. You must enter your flash video RMS connection string below.",
	"41" => "Flash RMS Connection String",
		"42" => "You need a flash hosting account to use this",
	"43" => "Display Date Format",
		"44" => "Select the date format you wish to be displayed on your web site",
	"45" => "Allow Profile / File Comments",
		"46" => "Enable this option if you wish member to be able to post comments on profiles and files.",
	"47" => "Display Chat and IM in separate window",
	
	"48" => "Enable this option if you wish chat room and IM pop up's to open in a new window.",
	
	"49" => "Search Engine Friendly?",
		"50" => "Enable this option if you are on linux or unix hosting account and are using the default .htaccess file",
	"51" => "Search Blank Photos",
		"52" => "Do you want members who have not added a photo to be displayed in the search results?.",
	"53" => "Display Flag Images",
		"54" => "Set this to 'yes' or 'no' if you wish to have the language flags displayed on your web site.",
	"55" => "Affiliate Currency",	
	"56" => "Use HTML Editor",	
	"57" => "Set this to 'yes' or 'no' depending on if you wish to manually verify files before display",

	"58" => "Display Articles Page",

);

$admin_billing_extra = array(

	"1" => "Set this to 'yes' if you wish all the features of your web site to be accessible by everyone.",
	
	"2" => "Package Type",
	"3" => "Membership Package",
	"4" => "SMS Package",
	"5" => "Select yes if you wish to create an SMS only package allowing this package to be used to purchase additional SMS credits on your web site.",
	"6" => "Package Name",
		"7" => "Enter a name for this package, this will be displayed on your subscription page.",
	"8" => "Description",	
	"9" => "Price",	
	"10" => "How much do you want to charge for members to subscribe to this package? Note. Do not enter currency symbols",
	"11" => "Display Currency Code",
	
	"12" => "This is the currency code that will be displayed on your web site, this is NOT used for your payment currency, this needs to be set in your payment settings.",	
	"13" => "Subscription",	
	"14" => "Select yes if you would like this to be a recurring payment.",	
	"15" => "Upgrade Period",
	
	"16" => "Day",
	"17" => "Week",
	"18" => "Month",
		"18a" => "Unlimited",
	"19" => "Max Messages (daily)",
		"20" => "This is the maximum number of messages members can send per day.",
	"21" => "Max Winks",
		"22" => "Maximum number of winks a member with this package can send each day.",	
	"23" => "Max File uploads",
		"24" => "Maximum number of files a member  can upload.",
	"25" => "Package Icon Link",
		"26" => "The package icon link needs to be a link to an image on your web site. Recommended size: 28px x 90px.",
		
	"27" => "Featured Member",
		"28" => "Select yes if you would like the members display photo to also be displayed on the front of your web site.",		
	"29" => "Highlighted",	
		"30" => "Select yes if you would like members with this package to have a highlighted background in the search results.",
		
	"31" => "View Adult Images",
		"32" => "Select yes if you would like the members on this package to be able to view members adult images.",
	"33" => "SMS credits",
	"34" => "This is the number of SMS credits added to the members account when they are upgraded to this package. This will be added to their current amount if they already have credits.",
	"35" => "Visible on upgrade package"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Only enter a link if you wish to link to an external web site",
	"3" => "RSS News feed Data",
	
	"4" => "Category",
	"5" => "Views",
	"6" => "Caption",
	"7" => "Language",
	"8" => "Private Group",
		
	"9" => "Change Forum Board",	
	"10" => "Select Forum Board",
	"11" => "Default Forum",
	
	"12" => "You are currently using a third party forum. Please login to their admin area to manage your forum.",	
	"13" => "Password"
);

$admin_set_extra1 = array(

	"1" => "Allow Photo / Image Uploads",
	"2" => "Allow Video Uploads",
	"3" => "Allow Music Uploads",	
	"4" => "Allow YouTube Uploads",	
);

$admin_alerts = array(

	"1" => "Alerts",
	"2" => "new visitors",
	"3" => "new members",	
	"4" => "unapproved members",	
	"5" => "unapproved files",
	"6" => "new upgrades",	
);

$lang_members_nn = array(

	"0" => "Member Abuse Monitor",
	"1" => "Username",
	"2" => "No Chat History Found",	
);

$members_opts = array(

	"1" => "Edit Profile",
	"2" => "File Uploads",
	"3" => "Billing History",	
	"4" => "Send Email",	
	"5" => "Send Message",
	"6" => "Forum Posts",
	"7" => "Message Abuse",	
);
?>