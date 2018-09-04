<?

$admin_charset = '';

$LANG_ = array(
"_language" => "English",
"_charset" => "GB2312", 
);
$GLOBALS['_META'] = $LANG_;	



$admin_layout_page1 = array(

	"" => "Dashboard",

		"_$" => "half",
		"_*" => "Admin Area Dashboard",
		"_?" => "",

	"members" => "Member Statistics",
		"members_$" => "half",
		"members_*" => "Member Statistics",
		"members_?" => "The graph below shows the number of new member signup's over the last two weeks.",
		"members_^" => "sub",

	"affiliate" => "Affiliate Statistics",

		"affiliate_$" => "half",
		"affiliate_*" => "Affiliate Statistics",
		"affiliate_?" => "The graph below shows the number of new affiliate signup's over the last two weeks.",
		"affiliate_^" => "sub",

	"visitor" => "Visitor Statistics",

		"visitor_$" => "half",
		"visitor_*" => "Visitor Statistics",
		"visitor_?" => "The graph below shows the number of website visitor statistics recorded by the software on each day over the last two weeks.",
		"visitor_^" => "sub",

	"maps" => "Visitor Locations",

		"maps_$" => "half",
		"maps_*" => "Visitor Locations with Google Maps",
		"maps_?" => "This section allows you to see where in the world your members are joining your website from. This allows you to develop your marketing and advertising campaign's more effectivtly by targeting and monitoring different countries.",
 

	"adminmsg" => "Website Annocement",

		"adminmsg_$" => "half",
		"adminmsg_*" => "Website Annocement",
		"adminmsg_?" => "Enter your message into the box below and each time a member logs into their account the message will be displayed to them. This is great for showing service announcements or website changes.",

);



$admin_layout_page2 = array(

	"" => "Members",

		"_$" => "half",
		"_*" => "Manage Members",
 

			"edit" => "Edit Member Details",
	
				"edit_$" => "half",
				"edit_*" => "Edit Member",
				"edit_?" => "Use the options below to update a members account and profile details.",
				"edit_^" => "none",


			"fake" => "Fake Members",
		
				"fake_$" => "half",
				"fake_*" => "Generate Fake Members",
				"fake_?" => "Use the options below to generate fake members for your website, this will help your website looks 'busy' whilst your first getting started. Its recommended you use the same email address for all fake members incase you wish to locate and delete them at a later date.",
				"fake_^" => "sub",

	"banned" => "Banned Members",

		"banned_$" => "half",
		"banned_*" => "Banned Members",
		"banned_?" => "The software has a built in hacker detection system which automatically blocks members who are attempting to hack your website. Below are all the current member (and none member) details for hack attempts.",
		"banned_^" => "sub",

	"monitor" => "Monitor Members",

		"monitor_$" => "half",
		"monitor_*" => "Monitor Members",
		"monitor_?" => "From time to time members may report other members for abusing the message system or sending nasty or unwanted messages. You can use this tool to view and monitor member messages to help protect the safety of others.",
		"monitor_^" => "sub",

	"import" => "Import Members",

		"import_$" => "half",
		"import_*" => "Import Members from Database or CVS File",
		"import_?" => "Using the options below you can import members into your website from another dating/community  software platform or from a CVS backup.",
		"import_^" => "sub",



	"affiliate" => "Website Affiliates",

		"affiliate_$" => "half",
		"affiliate_*" => "Website Affiliates",
		"affiliate_?" => "Using the options below you can manage your website affiliates.",
		


			"addaff" => "Add New Affiliate",
	
				"addaff_$" => "half",
				"addaff_*" => "Add/Edit Affiliate Account",
				"addaff_?" => "Complete all of the fields below to add/edit an affiliate account on your website.",
				"addaff_^" => "sub",

			"affsettings" => "Affiliate Content Pages",
	
				"affsettings_$" => "half",
				"affsettings_*" => "Affiliate Page Design",
				"affsettings_?" => "Use the options below to edit the wording on your affiliate pages.",
				"affsettings_^" => "sub",

			"affcom" => "Affiliate Commission",
	
				"affcom_$" => "half",
				"affcom_*" => "Affiliate Commission",
				"affcom_?" => "Here you can set the commission rate for your affiliates. This means that for every sale made by a member refered to your website by an affiliate, they will genderated the percentage of the total sale below.",
				"affcom_^" => "sub",


			"affban" => "Affiliate Banners",
	
				"affban_$" => "half",
				"affban_*" => "Affiliate Banners",
				"affban_?" => "Here you can setup the banner adverts that will be displayed within the affiliate account for your affiliates to use on their website.",
				"affban_^" => "sub",


	"files" => "Member Files",

		"files_$" => "half",
		"files_*" => "Member Album Files",


		"addfile" => "Upload Photo",
	
			"addfile_$" => "half",
			"addfile_*" => "Upload a photo",
			"addfile_?" => "Sometimes a member will have difficulty uploading a photo to their website. Using this section you can upload a photo for your member.",
			"addfile_^" => "sub",






);


$admin_layout_page3 = array(



	"builder" => "Theme Builder",
		"builder_$" => "half",
		"builder_*" => "Theme Builder",
		"builder_?" => "",

		"" => "Theme Gallery",
	
			"_$" => "half",
			"_*" => "Theme Gallery",
			"_?" => "Listed below are all the website templates that are currently installed onto your website. Click on the preview image to instantly change the template on your website.",
			"_^" => "sub",

			"meta" => "Theme Meta Tags",
				"meta_$" => "half",
				"meta_*" => "Meta Tag Editor",
				"meta_?" => "Select the page from the list below and update the meta tags allowing you to create unique meta tags for each page.",
				"meta_^" => "sub",

			"slider" => "Rotating Images",
				"slider_$" => "half",
				"slider_*" => "Home Page Rotating Images",
				"slider_?" => "The slider images are the rotating images displayed on your home page. Use the options below to change the image, description and clickable links.",
				"slider_^" => "sub",

			"img" => "Theme Images",
				"img_$" => "half",
				"img_*" => "Theme Images",
				"img_?" => "The images below are all stored within your template image folder. Use the options below to replace existing images with new ones you select.",
				"img_^" => "sub",
		
			"edit" => "Theme Editor",
				"edit_$" => "half",
				"edit_*" => "Theme Editor",
				"edit_?" => "Select from the list boxes below to view the content of the files on your website. Its recommended to copy and paste the code into an editor such as frontpage or dreamweaver before editing and paste it back when your finished. <b>Please take great care when editing config or system files as changes are instant and cannot be undone.</a>",
				"edit_^" => "sub",
		
			"newpage" => "Create Page",
				"newpage_$" => "half",
				"newpage_*" => "Create a new page",
				"newpage_?" => "Creating a new page on your website is easy. Simply enter a one word title in the box below and your page will be created ready for editing.",
				"newpage_^" => "sub",
		
			"menu" => "Menu Bars",
				"menu_$" => "half",
				"menu_*" => "Menu Bar Management",
				"menu_?" => "Use the options below to change the order of your member bars or add new menu items. You can also enter external links such as http://google.com as the menu link for a menu item if you wish to link to another website or page on your website.",
				"menu_^" => "sub",

	"manager" => "File Manager",
		"manager_$" => "half",
		"manager_*" => "File Manager",
		"manager_?" => "The file manager is very useful when adding or deleting new files/content to your website. You can browse the entrie hosting account and delete files are required.",



	"languages" => "Language Files",
		"languages_$" => "half",
		"languages_*" => "Language Files",
		"languages_?" => "Listed below are all the language files loaded onto your website. You can delete any of the language files that you dont want to use and they will not be displayed on your website or check the box to change the default website language. <b>Note, you must logout of the admin and website to see language changes</b>",

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
		"_?" => "Below are a list of all the emails currently stored within the system. System emails are used by the software to send emails to members when events happen such as during registration or lost password. You can customise all emails and create your own using the options below",

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

	"subs" => "Emal Reminders",

		"subs_$" => "half",
		"subs_*" => "Emal Reminders",
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
		"_?" => "Listed below are all the current membership packages applied to your website. The ones highlighted in green are required by the system to control how visitors and new members are handled giving you more control of your website.",

			"epackage" => "Add Package",
				"epackage_$" => "half",
				"epackage_*" => "Add/Edit Package",
				"epackage_?" => "Complete the forms below to add or update the membership package for your website.",
				"epackage_^" => "sub",

			"packaccess" => "Manage Access",
				"packaccess_$" => "full",
				"packaccess_*" => "Manage Page Access",
				"packaccess_?" => "Here you can control access to your entire website based on membership package. <b>Note: Only tick the box if you do NOT wish the member to view that page. </b>",
				"packaccess_^" => "sub",

			"upall" => "Transfer Members",
				"upall_$" => "half",
				"upall_*" => "Transfer Members Between Packages",
				"upall_?" => "Use this option is you wish to transfer members from one membership level to another.",
				"upall_^" => "sub",


	"gateway" => "Payment Gateways",

		"gateway_$" => "half",
		"gateway_*" => "Payment Gateways",
		"gateway_?" => "Payment gateways allow you to take payment for your membership upgrades. If you are running a free website you can turn off the payment system in the settings area.",


			"addgateway" => "Add Payment Gateway",
				"addgateway_$" => "half",
				"addgateway_*" => "Add Payment Gateway",
				"addgateway_?" => "The software has a number of payment gateways already built into the system, select the provider from the list below to use this on your website.",
				"addgateway_^" => "sub",


	"billing" => "Billing System",

		"billing_$" => "half",
		"billing_*" => "Billing System",	


		"affbilling" => "Affiliate Billing History",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Affiliate Billing History", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banners and Advertising",

		"_$" => "half",
		"_*" => "Banners and Advertising",
 

			"addbanner" => "Add Banner",
				"addbanner_$" => "half",
				"addbanner_*" => "Add Banner",
				"addbanner_?" => "Use the options below to add a new banner to your website.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Display Settings",

		"_$" => "half",
		"_*" => "Display Settings",
		"_?" => "Use the options below to turn off and on website features that you dont wish to use.",


	"op" => "Display Options",

		"op_$" => "half",
		"op_*" => "Display Options",
		"op_?" => "Use the options below to customize your website settings the way you like.",
	
		"op1" => "Search Settings",
	
			"op1_$" => "half",
			"op1_*" => "Search Display Settings",
			"op1_?" => "Use the options below to customize the way your search pages are displayed throughout your website.",
			"op1_^" => "sub",
	
		"op2" => "Membership Settings",
	
			"op2_$" => "half",
			"op2_*" => "Membership Settings",
			"op2_?" => "Use the options below to customize the way your website membership setup is displayed.",
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
			"thumbnails_^" => "Listed below are all the current default images used throughout your website when members have not upload their own photos.",

	"email" => "Email Settings",

		"email_$" => "half",
		"email_*" => "Email Settings",
		"email_?" => "Listed below are a list of website events, you can select which events you would like the system to send you an email notification. Email notifications will be sent to all system admins who have acces to system settings.",

	"paths" => "File / Folder Paths",

		"paths_$" => "half",
		"paths_*" => "File / Folder Paths",
		"paths_?" => "The File and Folder paths below relate to the files and folders on your hosting account. The software will automatically apply these during the installation process however incase they are incorrect you can modify them below.",

	"watermark" => "Image Watermark",

		"watermark_$" => "half",
		"watermark_*" => "Image Watermark",
		"watermark_?" => "An image watermark is a image that is displayed on top of member photos when they are displayed. This is usually a your website logo, watermark images must be in the format PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Website Fields",

		"_$" => "half",
		"_*" => "Profile, Registration and Search Fields",
		"_?" => "Listed below are all the current fields listed on your website. You can select to display the fields on the search page, registration pages, profile pages and even the member match pages. You can quickly and easily add new fields to your website using the options below.",

		"addfields" => "Create New Field",
	
			"addfields_$" => "half",
			"addfields_*" => "Create New Field",
			"addfields_?" => "Use the options below to add a new field to your website. A field is used to allow members to fill out information about themselves.",
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
		"cal_?" => "The events calendar is displayed on your website for members to create and view events. Use the options below to create, edit and import new events.",

		"caladd" => "Add Event",
	
			"caladd_$" => "half",
			"caladd_*" => "Add /Edit Event",
			"caladd_?" => "Complete the fields below to add/edit a website event.",
			"caladd_^" => "sub",

		"caladdtype" => "Manage Event Types",
	
			"caladdtype_$" => "half",
			"caladdtype_*" => "Manage Event Types",
			"caladdtype_?" => "Use the options below to create new event types, its recommended to add an image to each event to make your website look more professional.",
			"caladdtype_^" => "sub",

		"importcal" => "Import Events",
	
			"importcal_$" => "half",
			"importcal_*" => "Search & Import Events",
			"importcal_?" => "The software has a built in events api system. This allows you to search a worldwide database of local and international events and add them directly to your website.",
			"importcal_^" => "sub",


	"poll" => "Website Poll",

		"poll_$" => "half",
		"poll_*" => "Website Poll",
		"poll_?" => "Use the options below to create and manage your website polls",

		"polladd" => "Add Poll",
	
			"polladd_$" => "half",
			"polladd_*" => "Create a new poll",
			"polladd_?" => "Complete the fields below to create a new poll for your website.",
			"polladd_^" => "sub",



	"forum" => "Website Forum",

		"forum_$" => "half",
		"forum_*" => "Website Forum Categories",
		"forum_?" => "Use the options below to manage your website form category. Its recommended to add photo icons for each category to make your website look more professional.",

		"forumadd" => "Add Forum Category",
	
			"forumadd_$" => "half",
			"forumadd_*" => "Add Forum Category",
			"forumadd_?" => "Complete the fields below to add a new category to your website.",
			"forumadd_^" => "sub",

		"forumchange" => "ThirdParty Forum",
	
			"forumchange_$" => "half",
			"forumchange_*" => "Manage Forum Integration",
			"forumchange_?" => "The software has the ability for you to change the forum board, this means you can select any of the forums listed below to use instead of the default forum Please refer to the installation manuals for each forum board before enabling this feature.",
			"forumchange_^" => "sub",

		"forumpost" => "Manage Posts",
	
			"forumpost_$" => "half",
			"forumpost_*" => "Manage Forum Posts",
			"forumpost_?" => "Listed below are all the recent forum posts added by your memers. Use the options below to edit or delete topics which are unacceptable.",
			"forumpost_^" => "sub",

	"chatrooms" => "Website Chatroom",

		"chatrooms_$" => "half",
		"chatrooms_*" => "Website Chatroom",
		"chatrooms_?" => "Use the options below to create new chat rooms for your website or edit the existing ones.",


	"faq" => "Website FAQ",

		"faq_$" => "half",
		"faq_*" => "Website FAQ",
		"faq_?" => "Website FAQ are a great way to help members learn more about your website and answer any problems they might have. Create your own set of FAQ and manage them using the options below.",

		"faqadd" => "Add FAQ",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Add/Edit FAQ",
			"faqadd_?" => "Complete the fields below to add or edit an FAQ entry.",
			"faqadd_^" => "sub",

	"words" => "Word Filter",

		"words_$" => "half",
		"words_*" => "Word Filter",
		"words_?" => "The word filter is applied to member profiles, IM and forum and will filter out any of the words you enter here and replace them with stars (**).",



	"articles" => "Website Articles",

		"articles_$" => "half",
		"articles_*" => "Website Articles",
		"articles_?" => "Website articles are a great way to keep your members up to date with the latest changes to your website for news and event",


		"articleadd" => "Add Article",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Create a new article",
			"articleadd_?" => "Complete the fields below to add a new article to your website.",
			"articleadd_^" => "sub",

		"articlerss" => "Import RSS Articles",
	
			"articlerss_$" => "half",
			"articlerss_*" => "Import RSS Articles",
			"articlerss_?" => "The RSS links can be used to imporn RSS articles directly into one of the categories you have created. So for example you might want to create a 'News' category and enter the RSS feed from a news website. The software will then extract all the articles from the RSS fee and add them to your website.",
			"articlerss_^" => "sub",

		"articlecats" => "Article Categories",
	
			"articlecats_$" => "half",
			"articlecats_*" => "Article Categories",
			"articlecats_?" => "Use the options below to create new article categories for your website.",
			"articlecats_^" => "sub",


	"groups" => "Community Groups",

		"groups_$" => "half",
		"groups_*" => "Community Groups",
		"groups_?" => "Use the options below to create and manage your website community groups.",


	"class" => "Classified Adverts",

		"class_$" => "half",
		"class_*" => "Classified Adverts",
		"class_?" => "Listed below are all the classified adverts created by your members.",


		"addclass" => "Add Classified",
	
			"addclass_$" => "half",
			"addclass_*" => "Add/Edit Advert",
			"addclass_?" => "Use the options below to add/edit the adverts on your website.",
			"addclass_^" => "sub",

		"addclasscat" => "Manage Categories",
	
			"addclasscat_$" => "half",
			"addclasscat_*" => "Manage Categories",
			"addclasscat_?" => "Use the options below to manage your classified advert categories. Its recommended to add a photo icon for each to make your website look more professional.",
			"addclasscat_^" => "sub",

	"games" => "Website Games",

		"games_$" => "half",
		"games_*" => "Website Games",
		"games_?" => "Listed below are all the games currently installed on your website. Refer to the manual for details on installing new games",

	"gamesinstall" => "Install Game",

		"gamesinstall_$" => "half",
		"gamesinstall_*" => "Install Games",
		"gamesinstall_?" => "Select the games below that you wish to install. If you wish to add new games to your website simply upload the game tar files to your game folder location: inc/exe/Games/tar/. <b>Refer to the manual for details on installing new games</b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administrators",

		"_$" => "half",
		"_*" => "Website Admin's & Moderators",
		"_?" => "Listed below are all the website admins and moderators not including the super user. Add new moderators by using the member search page and clicking the moderator icon next to their name.",

	"pref" => "Admin Preferences",

		"pref_$" => "half",
		"pref_*" => "Admin Preferences",
		"pref_?" => "Use the options below to customize the administrators preferences.",

	"manage" => "Manage Moderators",

		"manage_$" => "half",
		"manage_*" => "Manage Website Manage Moderators",
		"manage_?" => "A website moderators can have two roles, they can be a website moderator which allows them access to moderate the main website only, or you can provide them with their own admin login details so they can login to the admin area and use the admin tools.",

	"email" => "Admin Emails",

		"email_$" => "half",
		"email_*" => "Admin Emails",
		"email_?" => "Listed below are all the emails send to the admin from the website members.",

	"compose" => "Compose Email",

		"compose_$" => "half",
		"compose_*" => "Compose Email",
		"compose_?" => "Use the options below to create a new message to send to a member.",
		"compose_^" => "sub",

	"super" => "Super User Login",

		"super_$" => "half",
		"super_*" => "Super User Login Details",
		"super_?" => "Please take care when editing the account details below, this is the super user account and you should make sure the password is kept secret from others at all times.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Software Updates",

		"_$" => "half",
		"_*" => "Software Updates",
		"_?" => "Listed below is the current version of the software your running compared to the latest available release. If your version is out dated, please contact your provider for the latest upgrades.",

	"backup" => "Database Backup",

		"backup_$" => "half",
		"backup_*" => "Database Backup",
		"backup_?" => "Select one or more of the tables below to bakup your database. It is strongly recommended that you use the hosting area database backup features to ensure all data is recived.",


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
		"_?" => "Plugins extend and expand the functionality of eMeeting dating software. Once a plugin is installed, you may activate it or deactivate it here using the menu options on the left.",

);

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "GB2312",
	"title" => "����Ա�ռ�"
		
);

$admin_layout = array(

	"3" => "�ҵ��",
	"4" => "�˳�",

);

$admin_layout_nav = array(

	"1" => "����ƽ̨",
		"1a" => "��Աͳ��",
		"1b" => "����ͳ��",
		"1c" => "�ο�ͳ��",
		"1d" => "�ο����ڵ�",
	"2" => "��Ա",
		"2a" => "��Ա����ϵͳ",
		"2b" => "���˹���ϵͳ",
		"2c" => "��Աɾ��ϵͳ",
		"2d" => "��Ա����ϵͳ",
		"2e" => "��Ա����ϵͳ",
	"3" => "���",
		"3a" => "����",
		"3b" => "����༭",
		"3c" => "Ӱ����⾭��",
		"3d" => "��־�༭",
		"3e" => "Meta Tags",	
		"3f" => "����",
		"3g" => "Page Wording",
		"3h" => "File Manager",
		"3i" => "Menu Bars",
	"4" => "�����ʼ�",
		"4a" => "�����ʼ�����",
		"4b" => "�����ʼ����",
		"4c" => "�����ʼ�����",
		"4d" => "���͵�һ�����ʼ�",
		"4e" => "�����ʼ�������",	
		"4f" => "�����ʼ�����",
		"4g" => "����������Ϣ",		
	"5" => "�˵�����",
		"5a" => "���״���",
		"5b" => "���ʽ",
		"5c" => "��Ա�˵���ʷ����",
		"5d" => "�����˵���ʷ����",
	"6" => "����",
		"6a" => "����ѡ��",
		"6b" => "�������",
		"6c" => "ϵͳ·��",
		"6d" => "��Ƭ��Ƭ",
	"7" => "����",
		"7a" => "�Ѳ�ռ�",
		"7b" => "�¼�������",
		"7c" => "��վͶƱ",
		"7d" => "��վ��̳",
		"7e" => "����ռ�",	
		"7f" => "��������",
		"7g" => "���ֹ���",
		"7h" => "����/����",
		"7i" => "��֯",
	"8" => "����",	
		"8a" => "��������",
	"9" => "���ӹ���",	
		"9a" => "",
	"10" => "�����ռ�",	
		"10a" => "��������",
		"10b" => "�����û�",
	"11" => "ά��",
		"11a" => "ϵͳ��",
		"11b" => "׼֤Կ��",
		"11c" => "ϵͳ����",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "ϵͳ���³ɹ�",
	"no_update" => "ϵͳ�ѱ����£�û���κ�������Ҫɾ����",
	"edit" => "�༭",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "�Ѳ�",
	"1" => "ȫ����ѡ",
	"2" => "ȫ�����",
	"3" => "ͨ��",
	"4" => "����",
	"5" => "ɾ��",	
	"6" => "������ɫ��Ա",
	"7" => "ѡ��",	
	"8" => "����",	
	"9" => "������ɫ",
	"10" => "�����ɫ",	
	"11" => "����ָ������",
	"12" => "����",
	"13" => "����",	
	"14" => "��Ծ",
	"15" => "ʧЧ",
	"16" => "�������",
	"17" => "����ҳ����",	
	"18" => "����",
);

$admin_table_val = array(
	"1" => "�û���",
	"2" => "�Ա�",
	"3" => "���ǩ��",
	"4" => "״��",
	"5" => "����",
	"6" => "����",
	"7" => "ѡ��",	
	"8" => "����",
	"9" => "IP��ַ",
	"10" => "������ؤ",	
	"11" => "��������",	
	"12" => "����",
	"13" => "�����ʼ�",
	"14" => "�������",
	"15" => "����ǩ��",
			
	"15" => "�Ѹ�Ӷ��",
		
	"16" => "������Ϣ",
	"17" => "ʱ��",
	"18" => "�ļ�����",
	"19" => "������",	
	"20" => "�༭",
	"21" => "Ĭ��",	
	"22" => "ID",

	"23" => "�۸�",
	"24" => "͸�Ӷ�",	
	"25" => "����",
	"26" => "ͨ�봦��",	
	"27" => "��Ծ",

	"28" => "����۲�",
	"29" => "����",	
	"30" => "��������",
	"31" => "�븶����",	
	"32" => "״��",
	
	"33" => "��������",
	"34" => "��Ч����",	
	"35" => "���ʽ",
	"36" => "��Ծ�ڼ�",	
	"37" => "����",
	"38" => "���ǩ��",

	"39" => "λ��",
	"40" => "�����",	
	"41" => "��Ծ",
	"42" => "Ԥ��",	
	"43" => "��Ŀ",
	"44" => "����",
	"45" => "����",

);

$admin_search_val = array(
	"1" => "��Ա�û�����",
	"2" => "ȫ������",
	"3" => "ȫ���Ա�",
	"4" => "ÿҳ",
	"5" => "������",
	"6" => "�����ʼ�",
	
	"7" => "�κ�״��",
	"8" => "��Ծ��Ա",
	"9" => "�ѱ���ͣ�Ļ�Ա",
	"10" => "δ��ͬ��Ļ�Ա",
	"11" => "��ȡ������Ļ�Ա",
	"12" => "ȫ��ҳ��",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "����С�鴦��",
	"2" => "С������",
	"3" => "����",		
	"4" => "��Ŀ����",
	"5" => "�����",	
	"6" => "С���������",		
	"7" => "�����",	
	"8" => "����",	
	"9" => "����",	
	"10" => "�������",	
	"11" => "���",
	"12" => "��Ŀҳ��",	
	"13" => "С������",		
	"14" => "�������",
	"15" => "�����",
	"16" => "�ļ�����",
	"17" => "����",
	"18" => "����",
	"19" => "��ֵ����",
	"20" => "������",	
	
	"21" => "������Ŀ",		
	"22" => "��������",
		"23" => "�����ı�",	
		"24" => "�����ı�",	
		"25" => "������",
		"26" => "��һ������",
		"27" => "��Ԫ������",
	
	"28" => "С�����",
	"29" => "����ʱ��������",
	"30" => "��ѡ����",
	
	"31" => "С�����",
	"32" => "С����ʾѡ��",
		"34" => "��ʾ�����л�Ա",
		"35" => "��ʾ����վվ��",
		"36" => "��ʾ�����л�Ա������",
	"37" => "ֻ��",	
	"38" => "С�����",	
	"39" => "�¼����",	
	"40" => "����˵��",
	"41" => "˵��",		
	"42" => "�ı�����",
	"43" => "˵������",	
	"44" => "�Ѳ�˵��",		
	"45" => "��������˵��",	
	"46" => "��һ��Ҫ����һ������˵����һ���Ǹ�������˵��������һ���Ǹ��Ѳ�ҳ",	
	"47" => "�Ѵ�������˵��",	
	"48" => "�������Ǩ������",		
	"49" => "��ԱID ",
	"50" => "�¼�����",	
	"51" => "�¼�����",		
	"52" => "�¼�����",
	"53" => "���ѡ��",	
	"54" => "����ѡ��",
	"55" => "�¼�ʱ��",
	"56" => "ȫ�������",
	"57" => "�¼�����",
	"58" => "�·�",	
	
	"59" => "����",	
	"60" => "���",
	"61" => "����",		
	"62" => "��/ʡ��",
	"63" => "��",	
	"64" => "��/����",		
	"65" => "�绰",	
	"66" => "�����ʼ�",	
	"67" => "��վ",	
	"68" => "�¼�͸�Ӷ�",		
		"69" => "���",
		"70" => "ֻ������",	
		
	"71" => "����������",		
	"72" => "������Խ��",
	"73" => "�����������",	
	"74" => "����",	
	"75" => "��Ծ����",
	
	"76" => "������̳��Ŀ",
	"77" => "���¹���",
	"78" => "��̳��Ŀ",	
		
	"79" => "����",	
	"80" => "����",
	"81" => "��̳����",		
	"82" => "ȫ������",
	"83" => "����",	
	"84" => "�������",		
	"85" => "�ϸ�����",	
	"86" => "�ռ�����",	
	"87" => "�Ѵ�������˵��",	
	"88" => "�ռ�����",		
	"89" => "����",
	"90" => "����������",
	
	"91" => "�������ּ���Ա",		
	"92" => "����",
	
	"93" => "����׼",
	"94" => "˵��",
	"95" => "˵���˶�",
	"96" => "����",

	"97" => "Ԥ��",
	"98" => "���",
);
$admin_advertising = array(

	"1" => "��վ���",
	"2" => "������",
	"3" => "���˺��",	
	"4" => "���/�༭���",
	"5" => "�������",	
	"6" => "��վ���",			
	"7" => "���˺��",	
	"8" => "����",	
	"9" => "�������",	
	"10" => "HTML����",	
	"11" => "HTML����",
	"12" => "�������",	
	"13" => "�������",		
	"14" => "��ʾ��",
		"15" => "ȫ���Ա",
		"16" => "ֻ�гɹ�ǩ��Ļ�Ա",
	
	"17" => "ҳ��",
	"18" => "��Ծ",
	
	"19" => "����λ��",
	"20" => "�м�λ��",	
	"21" => "���λ��",		
	"22" => "����λ��",
	"23" => "�ں������֮�䣬���¿հ׸�������;",
	"24" => "���Ԥ��",
	
);


$admin_maintenance = array(

	"1" => "��ǰ�ٴ���",
	"2" => "���µİ汾",
	"3" => "���ŷ�����Ϣ����",	
	"4" => "���ŷ�����Ϣ���",	
	"5" => "�������",	

);

$admin_admin = array(

	"1" => "��ӹ���Ա",
	"2" => "�û���",
	"3" => "����",	
	"4" => "�����ʼ�",
	
	"5" => "����Ա�༭����",	
	"6" => "ȫ��",			
	"7" => "���ʼ���",	
		"8" => "���ϵͳ����",	
		"9" => "��Աϵͳ����",	
		"10" => "ֻ�������ͨ��",	
		"11" => "ֻ�����ʼ�ͨ��",
		"12" => "ֻ���ڲ���ͨ��",	
		"13" => "ֻ���ڵ���ͨ��",		
		"14" => "ֻ���ڹ���ͨ��",
	"15" => "����Ա����",

	"17" => "�ʼ�����",
	"18" => "����Ա��������",
	"19" => "ת�����г�Ա",
	"20" => "������������",	
	"21" => "���ױ༭",		
	"22" => "����ͨ��",
	"23" => "����������",	
	"24" => "����ͨ�����",
);

$admin_settings = array(

	"1" => "ҳ����ʾ",
	"2" => "����",
	"3" => "ʹ֮ʧЧ",	
	"4" => "��ҳ��·",
	"5" => "��������·",	
	"6" => "ָͼ��·",			
	"7" => "�������",	
	"8" => "����",	
	"9" => "��ֵ",	
	"10" => "����",	
	"11" => "�������",
	"12" => "�Ż����",	
	"13" => "����ϵͳ",		
	"14" => "�Ż��������",
	"15" => "����",
	"16" => "����ͨ��",
	"17" => "����",
	"18" => "��Ա����",
	"19" => "����ת�����г�Ա",
	"20" => "����������",	
	"21" => "���ױ༭",		
	"22" => "����ͨ��",
	"23" => "����������",	
	"24" => "����ͨ�����",
);

$admin_billing = array(

	"1" => "�������",
	"2" => "����ͨ�����",
	"3" => "������Ա����",			
	"4" => "��Ļ�Ա����֮���Իᱻ��ֹ����Ϊ�����վ�ֽ�ʹ��<b>FREE MODE</b> ����",
	"5" => "��Ҫ��Ҫ������ѹ��ܣ����ҽ���ʾ��Ա�ʸ������ͷţ� ",	
	"6" => "����ʧЧ�ͷŷ�ʽ",		
	"7" => "�������",	
	"8" => "����",	
	"9" => "��ֵ",	
	"10" => "����",	
	"11" => "�������",
	"12" => "�Ż����",	
	"13" => "����ϵͳ",		
	"14" => "�Ż��������",
	"15" => "����",
	"16" => "����ͨ��",
	"17" => "����",
	"18" => "��Ա����",
	"19" => "����ת�����г�Ա",
	"20" => "����������",	
	"21" => "���ױ༭",		
	"22" => "����ͨ��",
	"23" => "����������",	
	"24" => "����ͨ�����",
	
	"25" => "�ȴ���ͬ",
	"26" => "�����׼",
	"27" => "����ܾ�",
	
	"28" => "������ʷ",
	"29" => "��Ծ����",
	"30" => "��ɸ���",
	"31" => "��Ծ����",
	"32" => "��ɶ���",
	"33" => "���״�ȡ����",
	
);

$admin_email = array(

	"1" => "ϵͳ�����ʼ�",
	"2" => "ʱ��ͨѶ",
	"3" => "�����ʼ�ģ��",		
	"4" => "�����ʼ��༭",
	"5" => "����",	
	"6" => "�����ʼ�Ԥ��",	
	"7" => "�����ʼ���",
	
	"8" => "������",	
		"9" => "���г�Ա",	
		"10" => "��Ա�ʸ����׶���",	
		"11" => "��Ծ/����ͣ/δ��ͬ��ĳ�Ա",
	"12" => "������",	
	"13" => "��Ա�ʸ�״��",		
	"14" => "ʱ��ͨѶѡ��",	
	
	"15" => "����ո�µ�",
	"16" => "Ԥ���ѱ������",
	"17" => "�����ʼ�׷�ٱ���",
	"18" => "����ո�µ�",
	"19" => "Ԥ���ѱ������",
	"20" => "�����ʼ�׷�ٱ���",
		"21" => "���µ�HTML����",
		
	"22" => "�����ʼ�׷�ٽ��",
	"23" => "û�����κα���",
	"24" => "������ѡ",
	
	"25" => "������ʾ�����г�Ա",
	"26" => "�Լ�",
	"27" => "����",
	"28" => "��������ʣ�������",
	"29" => "ѡ������ʼ����͸���",
	"30" => "����",
	"31" => "����ѡ��",
	"32" => "׷�ٱ���",
	
	
);

$admin_design = array(

	"1" => "�������",
	"2" => "��ǰģ��",
	"3" => "ʹ���������",	
	"4" => "ҳ�ױ��",
	"5" => "ҳ�����",	
	"6" => "����D",
	"7" => "����ʾ�",
	"8" => "��ҳ��վ",	
	"9" => "Ŀ¼ҳ��",	
	"10" => "��ǰҳ��",	
	"11" => "����ҳ��",
	"12" => "FTP��·",	
	"13" => "����ļ�",		
	"14" => "Ŀ¼ҳ��",	
	"15" => "��ǰҳ��",


	"16" => "�������",
	"17" => "���ļ�����",	
	"18" => "ѡ�����ļ�",
			
	"19" => "�༭�����ļ�",	
	"20" => "��ǰҳ��",

	"21" => "����",
	"22" => "�����С",	
	"23" => "������ɫ",
	"24" => "���",	
	"25" => "�߶�",		
	"26" => "�����̱��ı�",
	"27" => "��������",	
		"28" => "ʹ�ÿհ׷���",
		"29" => "����ԭ״���",	
		"30" => "���ظ��˻�����/�̱�",	

	"31" => "����ո��ҳ��",
	"32" => "ո��ҳ������",	
		"33" => "ҳ��������Ҫ�ǳ��̺�ֻ����һ���ʣ����磺���ӡ����¡����ţ���̳����",
	"34" => "���Ӳ˵�ѡ�",	
		"35" => "���������ڲ���Ҫ����ѡ��",		
		"36" => "�ǵģ�����Ҫ��֮��ӵ��ҵĻ�Ա����ռ�",
		"37" => "�ǵģ��뽫֮��ӵ�����ҳ�棬���������ҵĻ�Ա����ռ�",
			"38" => "һ��ѡ��һ���µĳ�Աѡ�������������վ",
);

$admin_overview = array(

	"1" => "����",
	"2" => "��Ա����",
	"3" => "�������",
	"3a" => "����",
	"4" => "������վ�",
	"5" => "��վ����",
	
	"6" => "������������ڼ䣬���ص���վ�ÿʹ���",
	"7" => "�����2���������¼���Ļ�Ա",
	"8" => "��Ա�Ա�ͳ��",	
	"9" => "��Ա����ͳ��",
	
	"10" => "�����2���������¼��������",
	"11" => "�ÿ͵�ͼ����",
	"12" => "�뽫���Ĺȸ�APIԿ����������������",	
	"13" => "���ܴ����ǵ���վ�˿����򣬹���һ��ִ��Կ��",	
	
	"14" => "��������Ѱ���",	
	"15" => "ȫ���ļ�",
	
);
$admin_members = array(

	"1" => "ȫ����Ա",
	"2" => "����",
	"3" => "��Ծ",
	"4" => "����ͣ",
	"5" => "δ��ͬ��",
	"6" => "�뱻ȡ��",
	"7" => "Ŀǰ��������",
	"8" => "��Աǩ�붯��",	
	"9" => "�༭��Ա����",	
	"10" => "�������",
	"11" => "���˺��",
	"12" => "����ҳ��",	
	"13" => "�������",	
	"14" => "��������",	
	"15" => "ȫ���ļ�",
	"16" => "��Ƭ",
	"17" => "¼Ӱ",
	"18" => "����",
	"19" => "Youtube",
	"20" => "δ��ͬ��",
	"21" => "��ɫ��",
	"22" => "�����ļ�",	
	"23" => "�ļ�",
	"24" => "����",
	"25" => "�û���",
	"26" => "����",
	"27" => "����",
	"28" => "�̶���",		
	"29" => "��Աǩ�붯��",	
	"30" => "�ѱ����μӵĻ�Ա",
	"31" => "��ɫ��",
	"a5" => "�û���",
	"a6" => "����",
	"a7" => "��",
	"a8" => "��",
	"a9" => "����ʹ������",
	"a10" => "סַ",
	"a11" => "��",
	"a12" => "��/ʡ��",
	"a13" => "��/����",
	"a14" => "�ʱ�/��������",
	"a15" => "����",
	"a16" => "����绰",
	"a17" => "����",
	"a18" => "�����ʼ�",
	"a19" => "��վ��ַ",
	"a20" => "̨ͷ֧Ʊ��д",
);


// HELP FILES
$admin_help = array(

	"a" => "��ʽ��ʼ",
	"b" => "�Һܺã�лл��",
	"c" => "����",	
	"d" => "�ر��Ӵ�",
	
	
	"1" => "���ҽ���",
	"2" => "����Ҫ�κΰ�����",
	"3" => "���",	
	
	"4" => "���һ�ӭ��������������!��Ϊ���ǵ�һ��̤������������ǽ������������ӵı���ʱ�䣬ѧϰʹ�����ǵļ򵥽�ѧ���̡�",
	"5" => "����������صĽ�ѧ��ʽ�������ڶ�ʱ���ڣ�������ʹ�������������Ĺ����趨��",	
	"6" => "<strong>(ע��)</strong> ���������κ�ʱ���ٷ���һҳ�����׽�ѧָ�ϡ�����ֻ��Ҫ����Ŀ¼���ϵ�������׽�ѧָ�ϡ���ť���ɡ�<strong>(Note)</strong>",
	
	"7" => "��ʽ��ʼ",
	"8" => "��ӭ����������Ա�ռ䣡 ",	
	"9" => "��ӭ����������Ա�ʻ�����",	
	"10" => "�����������������վ���в�ͬ����Ĺ��ܣ��������Ļ�Ա���ļ�����ȫ��ʩ�������ʼ��������Լ�����",	
	"11" => "������׽�ѧ���̽���Ϊ������ĳЩ����վ����ĸ����������������������վһЩ���������ã�ͬʱҲ�̵������ʱ���ڣ����Ϊ������վ��������ķÿ͡�",
	"12" => "<strong>(�м�)</strong> ����������Ҫ��������׽�ѧָ�ϡ�ʱ����ֻ��Ҫʹ�ùرռ���������Ӵ�����Ҳ�����κ�ʱ�䣬�������Ŀ¼�ˡ����׽�ѧָ�ϡ��ٶ����¡�",
		
	"13" => "���Ĺ����������! ",		
	"14" => "�������������' ���ڻ�����' ֮���һЩ���ܣ�����Щ�����Ƿ��������װݷò��Ҵ���������վ���Լ���ʱ����������κν���Ļ������໥���ӡ�������������ָ��",	
	"15" => "ʹ�����Ĺ���ע��ϸ��ǩ�롣",
	"16" => "���ϵ�����ﰴ��ǩ������ӡ�",
	
	"17" => "�����Ǳ�����",	
	"18" => "����Ǳ���Ѹ��Ϊ���ṩ������վ���ֺͶ�ȡ��Ҫ������档���˶��⣬��Ҳ�ܹ�Ԥ���»�Աǩ֤��ʷ�Լ��ۿ���Աͳ�Ʊ�ȡ�",			
	"19" => "���л�Ա����Ϣ�����������һ����ΪMYSQL���ݿ⣺ ",	
	"20" => "��վͳ�ƽ��ܡ�",
	"21" => "������ͳ�ƽ���Ϊ����ʾ��һ�����������ڼ䣬�»�Ա�������ʷ�����ÿ�����»�Ա��Ա����������վʱ�����ǵļ���ʱ�������ڻ��Զ�����¼�Լ�����ͼ���ϡ�",
	
	"22" => "�ÿ͵ص����",		
	"23" => "�������ĳ�Ա����",	
	"24" => "�������Ļ�Ա����",	
	"25" => "�����ѱ�������ֹ�ĳ�Ա����",		
	"26" => "�������ĳ�Ա�ļ�����",
	"27" => "�������ĳ�Ա����",	
	"28" => "��վ��Ľ���",
	"29" => "��ı༭����",	
	"30" => "���ͼ�������",
	"31" => "�̱�༭����",
	"32" => "�ױ�ǽ���",	
	"33" => "���Խ���",
	"34" => "�����ʼ��������",	
	"35" => "��ģ�巢�����ʼ��Ľ���",		
	"36" => "�����淢�����ʼ��Ľ���",
	"37" => "����ʱ��ͨѶ�Ľ���",
	"38" => "����ʾ�������ʼ��Ľ���",
	"39" => "�����ʼ����ؽ���",
	"40" => "��Ա�ʸ����׽���",
	"41" => "�Ż��������",
	"42" => "��Ա�ʸ񲼸���ʷ����",
	"43" => "���˲�����ʷ����",
	"44" => "ѡ����ʾ����",
	"45" => "��ʾ���ý���",
	"46" => "ϵͳ��·����",
	"47" => "ˮӡ����",
	"48" => "��Ѱ��Χ����",
	"50" => "�¼���������",
	"51" => "��վ����������",
	"52" => "��վ��̳����",
	"53" => "�����ҽ���",
	"54" => "��վ�������������",
	"55" => "���ֹ������Ľ���",
	"56" => "����/���µĽ���",
	"57" => "С�����",

		"22a" => "�ÿ͵ص��ͼ�Զ�Ϊ����¼����վ��ÿһ����Ա���ϣ������������׵�Ԥ����Ա�������ԵĹ����Լ�����",		
		"23a" => "��Ա�������������쿴������������վ�����л�Ա�����ʹ�ò�Ѱѡ��������Ļ�Ա�༭�����º�ɾ����Ա�ȡ�",	
		"24a" => "���˴������������쿴���м�������վ�����ˡ������ʹ�ò�Ѱѡ�������˻�༭�������ˣ����º�ɾ�����˵ȡ�",	
		"25a" => "Ϊ�˵̷������վ�⵽�Ѿ���ɾ����ǻ�Ա������������������ϵͳ�����Զ���ֹ��Щ�����������������վ���Է�ֹ��������Ҫ���˺���",		
		"26a" => "��Ա�ļ������������ۿ��ͼӹ���������վ���еĳ�Ա���أ������Լ�¼��ȡ�����������һ����Ƭ��Ȼ��ʹ�ñ༭���ǵĹ����޸���Ƭ��",
		"27a" => "��Ա���ڹ������������������Ӧ�ý��ڳ�Ա���ܡ���ֻ��Ҫ��������������������վϵͳ��֮����ת�Ƶ���������վ��",	
		"28a" => "��վ��Ĳ������������̸ı�������վģ������! ���������ʹ�õ����ʱ��������վ�����Զ����¡�",
		"29a" => "��ı༭����������ֱ�ӵشӹ�������༭��վҳ��һ������ɱ༭���������������Ҳ���Ը��ƺͲ�����������Լ�����վ��",	
		"30a" => "���ͼ������������������ͼ���Է���ı�����վ�ϵĵ�ǰ����һ�����سɹ�����ǰͼ���������µ�ͼ���滻��",
		"31a" => "�̱�༭�����������ı�����ǰ���̱���ơ������������Լ����̱굽�����վ������ʹ�����Լ���ͼ��༭���ף�����ת���������˶��ص��̱ꡣ",
		"32a" => "�ױ���ص��������༭�������ͨ�õ���վҳ�Ľױ�ǡ�������������������Լ��ı��⡢����ʺ���������ÿһ��վҳ�档",	
		"33a" => "���Թ������������������Ҫʹ���Լ�ɾ���㲻��Ҫ�����ԡ�",
		"34a" => "�����ʼ��������������������Լ���ϵͳ��ʱ��ͨѶ�����ʼ������ܴ���������վһ�ֶ��صĸ��˷��",	
		"35a" => "��ģ�巢�����ʼ��Ľ���",		
		"36a" => "�����淢�����ʼ��Ľ���",
		"37a" => "����ʱ��ͨѶ�Ľ���",
		"38a" => "����ʾ�������ʼ��Ľ���",
		"39a" => "�����ʼ����ؽ���",
		"40a" => "��Ա�ʸ����׽���",
		"41a" => "�Ż��������",
		"42a" => "��Ա�ʸ񲼸���ʷ����",
		"43a" => "���˲�����ʷ����",
		"44a" => "ѡ����ʾ����",
		"45a" => "��ʾ���ý���",
		"46a" => "ϵͳ��·����",
		"47a" => "ˮӡ����",
		"48a" => "��Ѱ��Χ����",
		"50a" => "�¼���������",
		"51a" => "��վ����������",
		"52a" => "��վ��̳����",
		"53a" => "�����ҽ���",
		"54a" => "��վ�������������",
		"55a" => "���ֹ������Ľ���",
		"56a" => "����/���µĽ���",
		"57a" => "С�����",
);

$admin_login = array(

	"1" => "����Ա����ע��",
	"2" => "�������������룿���ص��ģ����������������ĵ����ʼ������Ǳ�֤������һ���µ����롣",
	"3" => "�����ʼ���ַ",
	"4" => "�����ı�",
	"5" => "������������",
	"6" => "������������������Ϣ�Ա��¼",
	"7" => "�û���",
	"8" => "����",	
	"9" => "ִ��",	
	"10" => "����",
	"11" => "��¼",
	"12" => "�����õ�IP��",	
	"13" => "��������",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "���������ص�",
	"2" => "��վ����",
	"3" => "��Ա����",
	"4" => "�������������ʼ�",
	"5" => "���ӿ���ϵͳ�����ױ䶯",
	"6" => "���ŷ�������",
	"7" => "���ŷ������",
	"8" => "�����ʻ����",	
	
	"9" => "����༭�������ӡ�",	
	"10" => "��Ѱ�����ʾ�����صĳ�Ա�в�ͬ�Ĵ��ڱ�����",
	"11" => "�����������վ�Ļ�Ա��Ϊ�������Է��㴦����������վ��",
	
	"12" => "��ӭ����ҳ��",	
	"13" => "���������ʾҳ��",	
	"14" => "���˸���ҳ��",	
	"15" => "���˸�Ҫҳ��",
	"16" => "�����ʻ��༭ҳ",
	
	"17" => "�����Ա",	
	
	"18" => "����",			
	"19" => "�ļ��ۿ�",	
	"20" => "˽��",
	"21" => "����",
	
	"22" => "��ҳ",		
	"23" => "�г����ļ�",	
	"24" => "û�г����ļ�",	
	
	"25" => "��С",		
	"26" => "���ļ��ƶ������˲�ҳ",
	"27" => "�����ļ�",

);

$admin_selection = array(

	"1" => "��",
	"2" => "����",
	
	"3" => "��",
	"4" => "��",
);

$admin_plugins = array(

	"1" => "����ʽ���ܿ����������չeMeeting��Լ������Ĺ��ܡ�һ����װ����ʽ��������ʹ������ߵĲ˵���ѡ�񼤻�����������",
	"2" => "���ܹ������ǵ���վ�˿�����ۿ��������µ�������롣",
	"3" => "����ʽ����",
	"4" => "����ʽ����",
	"5" => "������",
	"6" => "״��",

);
$admin_pop_welcome = array(

	"1" => "��ӭ",
	"2" => "�����ǽ���ĳ�ԱǩԼ����վ���ֵĸ�Ҫ��",
	"3" => "�����¼���Ļ�Ա",
	"4" => "��Ҫ��׼���ļ�",
	"5" => "<strong>�м�</strong> �������ϣ�������յ���Щ�ܻ�ӭ����������ô������¼ʱ���ǵ��ڹ���Ա��������ӭ���۹��ϡ�",
	"6" => "�ر��Ӵ�",

);
$admin_pop_chmod = array(

	"1" => "�ļ���������",
	"2" => "��ҳ���ļ����ܱ��޸�",
	"3" => "�����༭���޸�����֮ǰ�����µ��ļ���Ŀ¼��Ҫ��'write'�����ۡ����������Linux��Unix��WEB������������ô����ʹ������FTP��ʽ��ʹ��'CHMOD'('�ı�ģʽ')��������ã��������д������ɡ��������ʹ��Windows�ģ�������Ҫ��������ϵ���ڰ�װд�����֤������Щ�ļ����ļ��С�",
	"4" => "Ҫ��CHMOD 777���ļ���Ŀ¼��",
	"5" => "�ر��Ӵ�",

);
$admin_pop_demo = array(

	"1" => "������ʾ��ʽ",
	"2" => "��ϵͳ�ı仯�����ᱻ��������ʾ��ʽ��",
	"3" => "����ϵͳ���������ѱ����ó�'��ʾģʽ' ����ζ�źܶ�ӹ���������ڲ�ͨ��͹��ܽ�������Ϊ'�Ķ�����'��",
	"4" => "�������ڹ������򸽽����������������������һ�иı佫���ᱻ���档",
	"5" => "<strong>�м�</strong> �����ϣ����ȥԼ�����˻�����ʾ��ʽ��Լ������������ϵͳ������ϵ�Ի�ȡ�������顣",
	"6" => "�ر��Ӵ�",
);

$admin_pop_import = array(

	"1" => "���ݿ�������",
	"2" => "˳���������Ա!",
	"3" => "��Ա˳���ر�������",
	"4" => "����� ����������ָʾΪ��ȷ������˳���������ĳ�Աͼ��",
	"5" => " eMeeting��ͼ���ļ��е�·�����棬�������븴�ƾ���վ��ͼ���ٽ����ŵ������µĵ�·;",
	"6" => "�ر��Ӵ�",
);

$admin_loading= array(

	"1" => "��ѡ���ݿ��",
	"2" => "��ȴ�",

);
$admin_menu_help= array(
"1" => "Ѹ�ٰ���ָ��",
);

$admin_settings_extra = array(

	"1" => "��ʾ��Ѱҳ",
	"2" => "��ʾ����ҳ",
	"3" => "��ʾ����ҳ",
	"4" => "��ʾ����������ҳ",
	"5" => "��ʾ�¼�",
	"6" => "��ʾС��",
	"7" => "��ʾ��̳",
	"8" => "��ʾ����",	
	"9" => "��ʾ����",	
	"10" => "��ʾ����ϵͳ",
	"11" => "��ʾ���ŷ���/������Ϣ����ϵͳ",
	
	"12" => "��ʾ����",	
	"13" => "��ʾ������",	
	"14" => " Instant Messenger��ʾ",	
	"15" => "ע��֤��ͼ����ʾ",
	"16" => "��ʾӢ�����������Ѱ",
	"17" => "��ʾ�������������Ѱ",
	"18" => "��ʾMSN/Yahoo�ۺϻ�",
	
	"19" => "��Ա�ʸ������趨",
		"20" => "�����Ѿ���������Ϊָ����Ա�ʸ����ס�",
	"21" => "���м���Ļ�Ա��������ͼ��",
		"22" => "����Ա��ע��ʱ�����ǿ������о����Ƿ�Ҫ��������ͼ������á�",	
	"23" => "���ɷ�ʽFREE MODE",
		"24" => "����������������������������վ����ô�뽫���趨Ϊ���ǡ���",
	"25" => "ά��ģʽ",
		"26" => "�⽫ֹͣ���л�Ա�ͷǻ�Աͨ�뵽������վ����ֻ�������Ĺ���Ա��ʹ�ù�������",
		
	"27" => "ÿҳ���ֵĲ�Ѱ���",
		"28" => "ѡ����ϣ������ʾ�������ϵ�����ҳ��",		
	"29" => "�����ڸ�Ҫҳ���������",	
		"30" => "ѡ����ϣ������ʾ�������ϵ�����ҳ��",
		
	"31" => "�����ʼ��������ñ���",
		"32" => "�ڻ�Ա�ǵ�¼֮ǰ��ÿλ��Ա��������һ���������ñ��뵽���ǵĵ����ʼ�������Ϊ�����ʼ�������;",
	"33" => "�ֶ�ʽ��Ա��׼",
	"34" => "�ڻ�Ա�ǵ�¼֮ǰ�������ϣ�����ֶ�ʽ��ʵ��Ա�ʻ�����ô�뽫������Ϊ'��' ����' ����' ���ܡ�",
	"35" => "�ֶ�ʽ�ļ���׼",
		"36" => "�����ϣ������ʾ֮ǰ���ֶ�ʽ��ʵ�ļ�����ô�뽫������Ϊ'��' ����' ����' ���ܡ�",
	"37" => "�ֶ�ʽ¼Ӱ��¼��׼",
		"38" => "�������Ҫ�ֶ�ʽ��ʵ��Ա�㲥(¼Ӱ��̸)����ô�뽫������Ϊ'��' ����' ����' ���ܡ�",
		
	"39" => "¼Ӱ�ʺ��¼����ʾ",
	"40" => "�ⷽ���Ա���ǽ�¼Ӱ��Ϣ��¼�����ǵĸ������ϡ�������ȷ��¼ӰRMS���Ӵ�˳�����С�",
	"41" => "Flash RMS���Ӵ�",
		"42" => "����Ҫһ��flash�����������ʻ�������ʹ�ô˹���",
	"43" => "���ݸ�ʽ��ʾ",
		"44" => "ѡ������Ҫ��������վ�ϱ���ʾ�����ݸ�ʽ",
	"45" => "�����������/�ļ�����",
		"46" => "�����ϣ����Ա���ܹ����ɵ��ڸ������Ϻ��ļ����ۣ���ô�����ѡ��������ܡ�",
	"47" => "��̸��IM�ķֿ��Ӵ���ʾ",
	
	"48" => "�����ϣ�������Һ�IM�ܹ����ɵ���һ�����Ӵ�����ô��ʹ�����ѡ��",
	
	"49" => "��ݵ��������棿",
		"50" => "�����������Linux��Unix���������ʻ�������ʹ��.htaccess�ļ�����ô��ʹ�����ѡ��",
	"51" => "�հ���Ƭ��Ѱ",
		"52" => "���Ƿ�Ҫ����Щû�а�����Ƭ�Ļ�Ա�ڲ�Ѱ�����ʾ��",
	"53" => "����ͼ����ʾ",
		"54" => "�����ϣ����������վ����ʾ�������ӣ���ô�����������Ϊ'��' ����'����'��",
	"55" => "���˻���",	
	"56" => "ʹ��HTML�༭",	
	"57" => "�����ϣ������ʾ֮ǰ�������ֶ�ʽ��ʵ�ļ�����ô�����������Ϊ'��' ����'����'��",

	"58" => "����ҳ����ʾ",

);

$admin_billing_extra = array(

	"1" => "����������������������������վ����ô�뽫���趨Ϊ���ǡ���",
	
	"2" => "��������",
	"3" => "��Ա�ʸ�����",
	"4" => "���ŷ�������",
	"5" => "�������ϣ��ʹ�ö��ŷ������ף�ͬʱֻ�����������վ�����ֵ���ף���ô���ڴ�ѡ���ǡ���",
	"6" => "��������",
		"7" => "���ڴ�����һ�����׵����֣��⽫����ʾ�����Ķ���ҳ�档",
	"8" => "����",	
	"9" => "�۸�",	
	"10" => "����Զ���������׵ĳ�Ա���ն��ٷ��ã� ע�⣺ ��Ҫ������ҷ���",
	"11" => "���Ҵ�����ʾ",
	
	"12" => "��ֻ����������վ��ʾ�Ļ��Ҵ��룬�ⲻ����Ϊ���ĸ�����ҡ�������뱻���������ĸ��������ڡ�",	
	"13" => "����",	
	"14" => "�����ϣ�������ظ����յķ��ã���ô��ѡ���ǡ���",	
	"15" => "��������",
	
	"16" => "����",
	"17" => "����",
	"18" => "�·�",
		"18a" => "����",
	"19" => "���������Ϣ(�ձ�)Max",
		"20" => "����ÿλ��Աÿ���ܷ��͵����ͨѶ������",
	"21" => "���������������",	
		"22" => "����ÿλ��Աÿ���ܷ��͵����������������",	
	"23" => "����ļ�����",
		"24" => "��Ա���ܹ������ļ���������֡�",
	"25" => "������������",
		"26" => "���������Ҫ�������ӵ�����վ�ϵ�һ��ͼ�󡣽�������ʹ�õĴ�С�� 28px x 90px��",
		
	"27" => "��ɫ��Ա",
		"28" => "�����ϣ������Ƭ�����������վ����ô��ѡ���ǡ����ܡ�",		
	"29" => "����",	
		"30" => "�����ϣ��ӵ��������׵Ļ�Ա�ĸ��������ڲ�Ѱ��������أ���ô��ѡ���ǡ����ܡ�",
		
	"31" => "�ۿ�����ͼ��",
		"32" => "�����ϣ��ӵ��������׵Ļ�Ա�ܹۿ�����ͼ����ô��ѡ���ǡ���",
	"33" => "���ŷ������SMS credits",
	"34" => "����Ա��ѡ���������������ʱ����Ҳ��ʾ���ǵĶ��ŷ��������֮���ġ���������Ѿ�ӵ��ʣ��������⽫�������ǵ�Ŀǰ������",
	"35" => "��������Ԥ��"

);

$admin_mainten_extra = array(

	"1" => "����",
	"2" => "�����ֻ��Ҫ���ӵ�һ��������վ����ôֻ����������",
	"3" => "RSS���Ŵ�������",
	
	"4" => "���",
	"5" => "�ۿ�",
	"6" => "˵��",
	"7" => "����",
	"8" => "˽��С��",
		
	"9" => "�ı���̳��",	
	"10" => "ѡ����̳��",
	"11" => "Ĭ����̳",
	
	"12" => "����ǰʹ�õ�������̳�����¼���ǵĹ���������������̳",
	"13" => "����"
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
	"1" => "Username or ID",
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