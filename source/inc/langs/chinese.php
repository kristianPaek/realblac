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
	"title" => "管理员空间"
		
);

$admin_layout = array(

	"3" => "我的最爱",
	"4" => "退出",

);

$admin_layout_nav = array(

	"1" => "控制平台",
		"1a" => "会员统计",
		"1b" => "加盟统计",
		"1c" => "游客统计",
		"1d" => "游客所在地",
	"2" => "会员",
		"2a" => "会员管理系统",
		"2b" => "加盟管理系统",
		"2c" => "会员删除系统",
		"2d" => "会员资料系统",
		"2e" => "会员运输系统",
	"3" => "设计",
		"3a" => "标题",
		"3b" => "标题编辑",
		"3c" => "影像标题经理",
		"3d" => "标志编辑",
		"3e" => "Meta Tags",	
		"3f" => "语言",
		"3g" => "Page Wording",
		"3h" => "File Manager",
		"3i" => "Menu Bars",
	"4" => "电子邮件",
		"4a" => "电子邮件处理",
		"4b" => "电子邮件板块",
		"4c" => "电子邮件报告",
		"4d" => "发送单一电子邮件",
		"4e" => "电子邮件提醒器",	
		"4f" => "电子邮件下载",
		"4g" => "发送热门消息",		
	"5" => "账单记载",
		"5a" => "配套处理",
		"5b" => "付款方式",
		"5c" => "会员账单历史记载",
		"5d" => "加盟账单历史记载",
	"6" => "调整",
		"6a" => "画面选择",
		"6b" => "画面调整",
		"6c" => "系统路向",
		"6d" => "照片底片",
	"7" => "管理",
		"7a" => "搜查空间",
		"7b" => "事件日历表",
		"7c" => "网站投票",
		"7d" => "网站论坛",
		"7e" => "聊天空间",	
		"7f" => "常见问题",
		"7g" => "文字过滤",
		"7h" => "文章/新闻",
		"7i" => "组织",
	"8" => "促销",	
		"8a" => "网络字条",
	"9" => "附加功能",	
		"9a" => "",
	"10" => "网主空间",	
		"10a" => "网主处理",
		"10b" => "超级用户",
	"11" => "维修",
		"11a" => "系统后备",
		"11b" => "准证钥匙",
		"11c" => "系统更新",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "系统更新成功",
	"no_update" => "系统已被更新，没有任何资料需要删除！",
	"edit" => "编辑",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "搜查",
	"1" => "全部挑选",
	"2" => "全部免除",
	"3" => "通过",
	"4" => "吊销",
	"5" => "删除",	
	"6" => "制造特色会员",
	"7" => "选择",	
	"8" => "更新",	
	"9" => "制造特色",
	"10" => "清除特色",	
	"11" => "更新指定语言",
	"12" => "发送",
	"13" => "继续",	
	"14" => "活跃",
	"15" => "失效",
	"16" => "命令更新",
	"17" => "领域页更新",	
	"18" => "允许",
);

$admin_table_val = array(
	"1" => "用户名",
	"2" => "性别",
	"3" => "最后签入",
	"4" => "状况",
	"5" => "配套",
	"6" => "更新",
	"7" => "选择",	
	"8" => "日期",
	"9" => "IP地址",
	"10" => "连串文丐",	
	"11" => "加入日期",	
	"12" => "姓名",
	"13" => "电子邮件",
	"14" => "点击数量",
	"15" => "最新签购",
			
	"15" => "已付佣金",
		
	"16" => "留言信息",
	"17" => "时间",
	"18" => "文件名称",
	"19" => "最后更新",	
	"20" => "编辑",
	"21" => "默认",	
	"22" => "ID",

	"23" => "价格",
	"24" => "透视度",	
	"25" => "种类",
	"26" => "通入处理",	
	"27" => "活跃",

	"28" => "编码观察",
	"29" => "领域",	
	"30" => "联盟姓名",
	"31" => "须付总数",	
	"32" => "状况",
	
	"33" => "升级日期",
	"34" => "有效期限",	
	"35" => "付款方式",
	"36" => "活跃期间",	
	"37" => "密码",
	"38" => "最后签入",

	"39" => "位置",
	"40" => "点击数",	
	"41" => "活跃",
	"42" => "预览",	
	"43" => "题目",
	"44" => "文章",
	"45" => "命令",

);

$admin_search_val = array(
	"1" => "会员用户名称",
	"2" => "全部配套",
	"3" => "全部性别",
	"4" => "每页",
	"5" => "命令于",
	"6" => "电子邮件",
	
	"7" => "任何状况",
	"8" => "活跃会员",
	"9" => "已被暂停的会员",
	"10" => "未经同意的会员",
	"11" => "想取消服务的会员",
	"12" => "全部页数",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "所有小组处理",
	"2" => "小组名称",
	"3" => "语言",		
	"4" => "题目处理",
	"5" => "类别处理",	
	"6" => "小组类别名称",		
	"7" => "类别处理",	
	"8" => "名称",	
	"9" => "计数",	
	"10" => "文章添加",	
	"11" => "类别",
	"12" => "题目页数",	
	"13" => "小段描述",		
	"14" => "文章添加",
	"15" => "类别处理",
	"16" => "文件名单",
	"17" => "命令",
	"18" => "语言",
	"19" => "价值名单",
	"20" => "新领域",	
	
	"21" => "领域题目",		
	"22" => "领域种类",
		"23" => "领域文本",	
		"24" => "区域文本",	
		"25" => "名单箱",
		"26" => "单一检验箱",
		"27" => "多元检验箱",
	
	"28" => "小组标题",
	"29" => "申请时包括在内",
	"30" => "挑选以下",
	
	"31" => "小组添加",
	"32" => "小组显示选择",
		"34" => "显示给所有会员",
		"35" => "显示给网站站主",
		"36" => "显示给所有会员与网主",
	"37" => "只是",	
	"38" => "小组管理",	
	"39" => "事件添加",	
	"40" => "领域说明",
	"41" => "说明",		
	"42" => "文本描述",
	"43" => "说明类型",	
	"44" => "搜查说明",		
	"45" => "个人资料说明",	
	"46" => "你一定要创造一个独特说明，一个是个人资料说明和另外一个是给搜查页",	
	"47" => "已存在领域说明",	
	"48" => "将领域搬迁到此组",		
	"49" => "会员ID ",
	"50" => "事件名称",	
	"51" => "事件描述",		
	"52" => "事件种类",
	"53" => "类别选择",	
	"54" => "类型选择",
	"55" => "事件时间",
	"56" => "全天空闲着",
	"57" => "事件日期",
	"58" => "月份",	
	
	"59" => "天数",	
	"60" => "年份",
	"61" => "国家",		
	"62" => "洲/省份",
	"63" => "街",	
	"64" => "镇/城市",		
	"65" => "电话",	
	"66" => "电子邮件",	
	"67" => "网站",	
	"68" => "事件透视度",		
		"69" => "大伙",
		"70" => "只是朋友",	
		
	"71" => "添加民意测试",		
	"72" => "民意测试结果",
	"73" => "民意测试名称",	
	"74" => "问题",	
	"75" => "活跃启动",
	
	"76" => "增添论坛题目",
	"77" => "文章管理",
	"78" => "论坛题目",	
		
	"79" => "标题",	
	"80" => "描述",
	"81" => "论坛张贴",		
	"82" => "全部张贴",
	"83" => "今天",	
	"84" => "这个星期",		
	"85" => "上个星期",	
	"86" => "空间名称",	
	"87" => "已存在领域说明",	
	"88" => "空间密码",		
	"89" => "增添",
	"90" => "增添常见问题",
	
	"91" => "增添文字检验员",		
	"92" => "文字",
	
	"93" => "已批准",
	"94" => "说明",
	"95" => "说明核对",
	"96" => "语言",

	"97" => "预览",
	"98" => "结果",
);
$admin_advertising = array(

	"1" => "网站横幅",
	"2" => "增添横幅",
	"3" => "联盟横幅",	
	"4" => "添加/编辑横幅",
	"5" => "横幅类型",	
	"6" => "网站横幅",			
	"7" => "联盟横幅",	
	"8" => "姓名",	
	"9" => "横幅上载",	
	"10" => "HTML输入",	
	"11" => "HTML编码",
	"12" => "横幅上载",	
	"13" => "横幅链接",		
	"14" => "显示于",
		"15" => "全体会员",
		"16" => "只有成功签入的会员",
	
	"17" => "页数",
	"18" => "活跃",
	
	"19" => "顶面位置",
	"20" => "中间位置",	
	"21" => "左边位置",		
	"22" => "底下位置",
	"23" => "在横幅编码之间，留下空白给链接用途",
	"24" => "横幅预览",
	
);


$admin_maintenance = array(

	"1" => "当前操从中",
	"2" => "最新的版本",
	"3" => "短信服务信息点数",	
	"4" => "短信服务信息余额",	
	"5" => "购买点数",	

);

$admin_admin = array(

	"1" => "添加管理员",
	"2" => "用户名",
	"3" => "密码",	
	"4" => "电子邮件",
	
	"5" => "管理员编辑设置",	
	"6" => "全名",			
	"7" => "访问级别",	
		"8" => "充分系统访问",	
		"9" => "会员系统访问",	
		"10" => "只限于设计通入",	
		"11" => "只限于邮件通入",
		"12" => "只限于布告通入",	
		"13" => "只限于调整通入",		
		"14" => "只限于管理通入",
	"15" => "管理员象征",

	"17" => "邮件提醒",
	"18" => "管理员新闻提醒",
	"19" => "转移所有成员",
	"20" => "对于以下配套",	
	"21" => "配套编辑",		
	"22" => "配套通入",
	"23" => "添加配套零件",	
	"24" => "配套通入管理",
);

$admin_settings = array(

	"1" => "页数显示",
	"2" => "允许",
	"3" => "使之失效",	
	"4" => "网页道路",
	"5" => "服务器道路",	
	"6" => "指图道路",			
	"7" => "领域添加",	
	"8" => "姓名",	
	"9" => "价值",	
	"10" => "类型",	
	"11" => "领域管理",
	"12" => "门户添加",	
	"13" => "付款系统",		
	"14" => "门户付款代码",
	"15" => "标题",
	"16" => "配套通入",
	"17" => "评论",
	"18" => "会员调动",
	"19" => "从这转移所有成员",
	"20" => "到以下配套",	
	"21" => "配套编辑",		
	"22" => "配套通入",
	"23" => "添加配套零件",	
	"24" => "配套通入管理",
);

$admin_billing = array(

	"1" => "添加配套",
	"2" => "配套通入管理",
	"3" => "调动会员配套",			
	"4" => "你的会员配套之所以会被终止，因为你的网站现今使用<b>FREE MODE</b> 操作",
	"5" => "您要不要调整免费功能，并且将显示会员资格配套释放？ ",	
	"6" => "功能失效释放方式",		
	"7" => "领域添加",	
	"8" => "姓名",	
	"9" => "价值",	
	"10" => "类型",	
	"11" => "领域管理",
	"12" => "门户添加",	
	"13" => "付款系统",		
	"14" => "门户付款编码",
	"15" => "标题",
	"16" => "配套通入",
	"17" => "评论",
	"18" => "会员调动",
	"19" => "从这转移所有成员",
	"20" => "到以下配套",	
	"21" => "配套编辑",		
	"22" => "配套通入",
	"23" => "添加配套零件",	
	"24" => "配套通入管理",
	
	"25" => "等待认同",
	"26" => "付款被培准",
	"27" => "付款被拒绝",
	
	"28" => "所有历史",
	"29" => "活跃付款",
	"30" => "完成付款",
	"31" => "活跃订阅",
	"32" => "完成订阅",
	"33" => "配套存取编码",
	
);

$admin_email = array(

	"1" => "系统电子邮件",
	"2" => "时事通讯",
	"3" => "电子邮件模板",		
	"4" => "电子邮件编辑",
	"5" => "主题",	
	"6" => "电子邮件预览",	
	"7" => "电子邮件至",
	
	"8" => "发送至",	
		"9" => "所有成员",	
		"10" => "会员资格配套订户",	
		"11" => "活跃/被暂停/未经同意的成员",
	"12" => "配套至",	
	"13" => "会员资格状况",		
	"14" => "时事通讯选择",	
	
	"15" => "创造崭新的",
	"16" => "预览已被创造的",
	"17" => "电子邮件追踪编码",
	"18" => "创造崭新的",
	"19" => "预览已被创造的",
	"20" => "电子邮件追踪编码",
		"21" => "以下的HTML编码",
		
	"22" => "电子邮件追踪结果",
	"23" => "没发现任何报告",
	"24" => "报告挑选",
	
	"25" => "发送提示给所有成员",
	"26" => "以及",
	"27" => "天数",
	"28" => "升级订阅剩余的天数",
	"29" => "选择电子邮件发送给：",
	"30" => "下载",
	"31" => "配套选择",
	"32" => "追踪编码",
	
	
);

$admin_design = array(

	"1" => "题材下载",
	"2" => "当前模板",
	"3" => "使用这个摸板",	
	"4" => "页阶标记",
	"5" => "页面标题",	
	"6" => "描述D",
	"7" => "主题词句",
	"8" => "主页网站",	
	"9" => "目录页面",	
	"10" => "当前页面",	
	"11" => "创造页面",
	"12" => "FTP道路",	
	"13" => "题材文件",		
	"14" => "目录页面",	
	"15" => "当前页面",


	"16" => "语言添加",
	"17" => "新文件名称",	
	"18" => "选择复制文件",
			
	"19" => "编辑语言文件",	
	"20" => "当前页面",

	"21" => "字体",
	"22" => "字体大小",	
	"23" => "字体颜色",
	"24" => "宽度",	
	"25" => "高度",		
	"26" => "增加商标文本",
	"27" => "帆布类型",	
		"28" => "使用空白帆布",
		"29" => "保持原状风格",	
		"30" => "上载个人化桌布/商标",	

	"31" => "创造崭新页面",
	"32" => "崭新页面名称",	
		"33" => "页面名称需要非常短和只允许一个词，例如：链接、文章、新闻，论坛等字",
	"34" => "增加菜单选项？",	
		"35" => "不，我现在不需要创造选项",		
		"36" => "是的，我想要将之添加到我的会员管理空间",
		"37" => "是的，请将之添加到主网页面，但不是在我的会员管理空间",
			"38" => "一旦选择，一个新的成员选项将出现在您的网站",
);

$admin_overview = array(

	"1" => "公告",
	"2" => "会员总数",
	"3" => "这个星期",
	"3a" => "今天",
	"4" => "近期网站活动",
	"5" => "网站报告",
	
	"6" => "在最近二个星期间，独特的网站访客次数",
	"7" => "在最近2个星期内新加入的会员",
	"8" => "会员性别统计",	
	"9" => "会员年龄统计",
	
	"10" => "在最近2个星期内新加入的联盟",
	"11" => "访客地图设置",
	"12" => "请将您的谷歌API钥匙输入在以上领域。",	
	"13" => "您能从我们的网站顾客区域，购买一把执照钥匙",	
	
	"14" => "过滤器查寻结果",	
	"15" => "全部文件",
	
);
$admin_members = array(

	"1" => "全部会员",
	"2" => "班主",
	"3" => "活跃",
	"4" => "被暂停",
	"5" => "未经同意",
	"6" => "想被取消",
	"7" => "目前正在网上",
	"8" => "会员签入动向",	
	"9" => "编辑会员资料",	
	"10" => "联盟添加",
	"11" => "联盟横幅",
	"12" => "联盟页面",	
	"13" => "联盟添加",	
	"14" => "联盟设置",	
	"15" => "全部文件",
	"16" => "照片",
	"17" => "录影",
	"18" => "音乐",
	"19" => "Youtube",
	"20" => "未经同意",
	"21" => "特色化",
	"22" => "上载文件",	
	"23" => "文件",
	"24" => "类型",
	"25" => "用户名",
	"26" => "标题",
	"27" => "评论",
	"28" => "固定化",		
	"29" => "会员签入动向",	
	"30" => "已报名参加的会员",
	"31" => "特色化",
	"a5" => "用户名",
	"a6" => "密码",
	"a7" => "姓",
	"a8" => "名",
	"a9" => "生意使用名称",
	"a10" => "住址",
	"a11" => "街",
	"a12" => "镇/省份",
	"a13" => "洲/国家",
	"a14" => "邮编/邮政编码",
	"a15" => "国家",
	"a16" => "联络电话",
	"a17" => "传真",
	"a18" => "电子邮件",
	"a19" => "网站网址",
	"a20" => "台头支票请写",
);


// HELP FILES
$admin_help = array(

	"a" => "正式开始",
	"b" => "我很好，谢谢！",
	"c" => "继续",	
	"d" => "关闭视窗",
	
	
	"1" => "自我介绍",
	"2" => "你需要任何帮助吗？",
	"3" => "你好",	
	
	"4" => "并且欢迎您来到管理区域!因为您是第一次踏入管理区域，我们建议你抽出几分钟的宝贵时间，学习使用我们的简单教学过程。",
	"5" => "我们这个独特的教学程式，将会在短时间内，引导您使用与运作基本的管理设定。",	
	"6" => "<strong>(注意)</strong> 您可以在任何时侯再访这一页“轻易教学指南”，你只需要在左目录杆上点击“轻易教学指南”按钮即可。<strong>(Note)</strong>",
	
	"7" => "正式开始",
	"8" => "欢迎您来到管理员空间！ ",	
	"9" => "欢迎您来到管理员帐户区域",	
	"10" => "这软件允许您处理网站所有不同方面的功能，包括您的会员、文件、安全措施、电子邮件，插入以及更多",	
	"11" => "这个简易教学过程将会为您介绍某些在网站管理的概念，并且允许您配置您的网站一些基本的设置，同时也教导在最短时间内，如何为您的网站带来更多的访客。",
	"12" => "<strong>(切记)</strong> 当您不再需要这个“轻易教学指南”时，您只需要使用关闭键关上这个视窗；您也可在任何时间，点击在左目录杆“轻易教学指南”再度重温。",
		
	"13" => "您的管理区域介绍! ",		
	"14" => "软件管理区域是' 基于互联网' 之间的一些功能，而这些功能是方便您轻易拜访并且处理您的网站，以及随时随地与世界任何角落的互联网相互连接。请把您的浏览器指向：",	
	"15" => "使用您的管理注册细节签入。",
	"16" => "马上点击这里按书签这个链接。",
	
	"17" => "您的仪表板介绍",	
	"18" => "软件仪表板可迅速为您提供您的网站表现和读取重要软件公告。除此而外，您也能够预览新会员签证历史以及观看会员统计表等。",			
	"19" => "所有会员的信息，都被存放在一个名为MYSQL数据库： ",	
	"20" => "网站统计介绍。",
	"21" => "这个软件统计将会为您显示在一个或两个星期间，新会员加入的历史情况。每当有新会员会员加入您的网站时，他们的加入时间与日期会自动被记录以及表在图表上。",
	
	"22" => "访客地点介绍",		
	"23" => "处理您的成员介绍",	
	"24" => "处理您的会员介绍",	
	"25" => "处理已被您被禁止的成员介绍",		
	"26" => "处理您的成员文件介绍",
	"27" => "输入您的成员介绍",	
	"28" => "网站题材介绍",
	"29" => "题材编辑介绍",	
	"30" => "题材图象经理介绍",
	"31" => "商标编辑介绍",
	"32" => "阶标记介绍",	
	"33" => "语言介绍",
	"34" => "电子邮件处理介绍",	
	"35" => "给模板发电子邮件的介绍",		
	"36" => "给报告发电子邮件的介绍",
	"37" => "发送时事通讯的介绍",
	"38" => "给提示发电子邮件的介绍",
	"39" => "电子邮件下载介绍",
	"40" => "会员资格配套介绍",
	"41" => "门户付款介绍",
	"42" => "会员资格布告历史介绍",
	"43" => "联盟布告历史介绍",
	"44" => "选择显示介绍",
	"45" => "显示设置介绍",
	"46" => "系统道路介绍",
	"47" => "水印介绍",
	"48" => "查寻范围介绍",
	"50" => "事件日历介绍",
	"51" => "网站民意测验介绍",
	"52" => "网站论坛介绍",
	"53" => "聊天室介绍",
	"54" => "网站常见问题解答介绍",
	"55" => "文字过滤器的介绍",
	"56" => "新闻/文章的介绍",
	"57" => "小组介绍",

		"22a" => "访客地点地图自动为您纪录你网站的每一名成员资料，让您可以轻易地预览会员们所来自的国家以及区域。",		
		"23a" => "会员处理工具允许您察看加入了您的网站的所有会员。你可使用查寻选择过滤您的会员编辑，更新和删除会员等。",	
		"24a" => "联盟处理工具允许您察看所有加入您网站的联盟。你可以使用查寻选择来过滤或编辑您的联盟，更新和删除联盟等。",	
		"25a" => "为了堤防你的网站遭到已经被删除或非会员的外来攻击，这个软件系统将会自动阻止那些可疑人物游览你的网站，以防止带来不必要的伤害。",		
		"26a" => "会员文件工具允许您观看和加工处理您网站所有的成员上载，音乐以及录像等。随意点击其中一张照片，然后使用编辑我们的工具修改照片。",
		"27a" => "会员进口工具允许您从其他软件应用进口成员功能。您只需要将它输入与存放在您的网站系统，之后将它转移到您的新网站。",	
		"28a" => "网站题材部分允许您即刻改变您的网站模板和设计! 当您点击想使用的题材时，您的网站将会自动更新。",
		"29a" => "题材编辑工具允许您直接地从管理区域编辑网站页。一旦您完成编辑，您可以黏贴它，也可以复制和插入编码于您自己的网站。",	
		"30a" => "题材图象经理工具允许您上载新图像，以方便改变您网站上的当前形象。一旦尚载成功，当前图象将立即被新的图象将替换。",
		"31a" => "商标编辑工具允许您改变您当前的商标设计。您可以上载自己的商标到你的网站，接着使用您自己的图象编辑配套，把它转换成您个人独特的商标。",
		"32a" => "阶标记特点允许您编辑所有软件通用的网站页的阶标记。您能随意地增加您的自己的标题、主题词和描述您的每一网站页面。",	
		"33a" => "语言管理工具允许您添加您想要使用以及删除你不想要的语言。",
		"34a" => "电子邮件管理工具允许您创造您自己的系统和时事通讯电子邮件，这能带给您的网站一种独特的个人风格。",	
		"35a" => "给模板发电子邮件的介绍",		
		"36a" => "给报告发电子邮件的介绍",
		"37a" => "发送时事通讯的介绍",
		"38a" => "给提示发电子邮件的介绍",
		"39a" => "电子邮件下载介绍",
		"40a" => "会员资格配套介绍",
		"41a" => "门户付款介绍",
		"42a" => "会员资格布告历史介绍",
		"43a" => "联盟布告历史介绍",
		"44a" => "选择显示介绍",
		"45a" => "显示设置介绍",
		"46a" => "系统道路介绍",
		"47a" => "水印介绍",
		"48a" => "查寻范围介绍",
		"50a" => "事件日历介绍",
		"51a" => "网站民意测验介绍",
		"52a" => "网站论坛介绍",
		"53a" => "聊天室介绍",
		"54a" => "网站常见问题解答介绍",
		"55a" => "文字过滤器的介绍",
		"56a" => "新闻/文章的介绍",
		"57a" => "小组介绍",
);

$admin_login = array(

	"1" => "管理员地区注册",
	"2" => "忘记了您的密码？不必担心，请在下面输入您的电子邮件，我们保证将送您一个新的密码。",
	"3" => "电子邮件邮址",
	"4" => "下面文本",
	"5" => "重新设置密码",
	"6" => "请在下面输入您的信息以便登录",
	"7" => "用户名",
	"8" => "密码",	
	"9" => "执照",	
	"10" => "语言",
	"11" => "登录",
	"12" => "被采用的IP是",	
	"13" => "忘记密码",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "个人资料重点",
	"2" => "网站班主",
	"3" => "会员配套",
	"4" => "发送升级电子邮件",
	"5" => "增加开单系统的配套变动",
	"6" => "短信服务数字",
	"7" => "短信服务点数",
	"8" => "集合帐户情况",	
	
	"9" => "点击编辑密码箱子。",	
	"10" => "查寻结果显示被着重的成员有不同的存在背景。",
	"11" => "允许访问你网站的会员成为班主，以方便处理处理您的网站。",
	
	"12" => "欢迎联盟页面",	
	"13" => "横幅编码显示页面",	
	"14" => "联盟付款页面",	
	"15" => "联盟概要页面",
	"16" => "联盟帐户编辑页",
	
	"17" => "输入成员",	
	
	"18" => "年龄",			
	"19" => "文件观看",	
	"20" => "私人",
	"21" => "公众",
	
	"22" => "册页",		
	"23" => "有成人文件",	
	"24" => "没有成人文件",	
	
	"25" => "大小",		
	"26" => "将文件移动至成人册页",
	"27" => "成人文件",

);

$admin_selection = array(

	"1" => "是",
	"2" => "不是",
	
	"3" => "开",
	"4" => "关",
);

$admin_plugins = array(

	"1" => "插入式功能可以扩大和扩展eMeeting的约会软件的功能。一旦安装插入式，您可以使用在左边的菜单，选择激活它或撤销它。",
	"2" => "您能够从我们的网站顾客区域观看和下载新的软件插入。",
	"3" => "插入式名称",
	"4" => "插入式资料",
	"5" => "最后更新",
	"6" => "状况",

);
$admin_pop_welcome = array(

	"1" => "欢迎",
	"2" => "下面是今天的成员签约和网站表现的概要。",
	"3" => "今天新加入的会员",
	"4" => "需要批准的文件",
	"5" => "<strong>切记</strong> 如果您不希望继续收到这些受欢迎的字条，那么在您登录时，记得在管理员特区将欢迎字眼关上。",
	"6" => "关闭视窗",

);
$admin_pop_chmod = array(

	"1" => "文件错误允许",
	"2" => "这页的文件不能被修改",
	"3" => "在您编辑或修改他们之前，以下的文件或目录需要有'write'的字眼。如果您是在Linux或Unix的WEB主机操作，那么您能使用您的FTP程式和使用'CHMOD'('改变模式')授予的作用，获得重新写作的许可。如果您是使用Windows的，您将需要与他们联系关于安装写作许可证，在这些文件或文件夹。",
	"4" => "要求CHMOD 777的文件或目录是",
	"5" => "关闭视窗",

);
$admin_pop_demo = array(

	"1" => "启动演示方式",
	"2" => "您系统的变化将不会被保存在演示方式上",
	"3" => "您的系统访问设置已被设置成'演示模式' 这意味着很多从管理区域的内部通入和功能将被限制为'阅读功能'。",
	"4" => "您可以在管理区域附近自由浏览，但是你所作的一切改变将不会被保存。",
	"5" => "<strong>切记</strong> 如果您希望除去约束你账户的演示方式制约，请联络您的系统管理联系以获取更多详情。",
	"6" => "关闭视窗",
);

$admin_pop_import = array(

	"1" => "数据库调动结果",
	"2" => "顺利地输入会员!",
	"3" => "会员顺利地被输入了",
	"4" => "软件。 请遵守以下指示为了确保您能顺利更新您的成员图象。",
	"5" => " eMeeting的图象文件夹道路在下面，而您必须复制旧网站的图象，再将它放到下面新的道路;",
	"6" => "关闭视窗",
);

$admin_loading= array(

	"1" => "优选数据库表",
	"2" => "请等待",

);
$admin_menu_help= array(
"1" => "迅速帮助指南",
);

$admin_settings_extra = array(

	"1" => "显示查寻页",
	"2" => "显示联络页",
	"3" => "显示游览页",
	"4" => "显示常见问题解答页",
	"5" => "显示事件",
	"6" => "显示小组",
	"7" => "显示论坛",
	"8" => "显示比赛",	
	"9" => "显示网络",	
	"10" => "显示联盟系统",
	"11" => "显示短信服务/文字消息警报系统",
	
	"12" => "显示博客",	
	"13" => "显示聊天室",	
	"14" => " Instant Messenger显示",	
	"15" => "注册证明图象显示",
	"16" => "显示英国邮政编码查寻",
	"17" => "显示美国邮政编码查寻",
	"18" => "显示MSN/Yahoo综合化",
	
	"19" => "会员资格配套设定",
		"20" => "这是已经报名加入为指定会员资格配套。",
	"21" => "所有加入的会员必须上载图象",
		"22" => "当会员在注册时，他们可以自行决定是否要跳过上载图象的设置。",	
	"23" => "自由方式FREE MODE",
		"24" => "如果你想让所有人随意连接你的网站，那么请将此设定为“是”。",
	"25" => "维护模式",
		"26" => "这将停止所有会员和非会员通入到您的网站，并只允许登入的管理员入使用管理区域。",
		
	"27" => "每页数字的查寻结果",
		"28" => "选择您希望被显示个人资料的数量页数",		
	"29" => "符合在概要页结果的数字",	
		"30" => "选择您希望被显示个人资料的数量页数",
		
	"31" => "电子邮件激活作用编码",
		"32" => "在会员们登录之前，每位成员将被派送一个激活作用编码到他们的电子邮件，以作为电子邮件激活用途",
	"33" => "手动式成员批准",
	"34" => "在会员们登录之前，如果您希望以手动式核实成员帐户，那么请将此设置为'是' 或者' 不是' 功能。",
	"35" => "手动式文件批准",
		"36" => "如果您希望在显示之前以手动式核实文件，那么请将此设置为'是' 或者' 不是' 功能。",
	"37" => "手动式录影记录批准",
		"38" => "如果您想要手动式核实成员广播(录影闲谈)，那么请将此设置为'是' 或者' 不是' 功能。",
		
	"39" => "录影问候记录器显示",
	"40" => "这方便会员记们将录影消息记录在他们的个人资料。您必须确保录影RMS连接串顺利进行。",
	"41" => "Flash RMS连接串",
		"42" => "您需要一个flash虚拟主机的帐户，方能使用此功能",
	"43" => "数据格式显示",
		"44" => "选择您想要在您的网站上被显示的数据格式",
	"45" => "允许个人资料/文件评论",
		"46" => "如果您希望会员们能够自由地在个人资料和文件评论，那么你就请选择这个功能。",
	"47" => "闲谈和IM的分开视窗显示",
	
	"48" => "如果您希望聊天室和IM能够自由弹出一个新视窗，那么请使用这个选择。",
	
	"49" => "快捷的搜索引擎？",
		"50" => "如果您置身在Linux或Unix虚拟主机帐户和正在使用.htaccess文件，那么请使能这个选择。",
	"51" => "空白照片查寻",
		"52" => "您是否要将那些没有摆上照片的会员在查寻结果显示？",
	"53" => "旗子图象显示",
		"54" => "如果您希望在您的网站上显示语言旗子，那么请调整此设置为'是' 或者'不是'。",
	"55" => "联盟货币",	
	"56" => "使用HTML编辑",	
	"57" => "如果您希望在显示之前，是用手动式核实文件，那么请调整此设置为'是' 或者'不是'。",

	"58" => "文章页数显示",

);

$admin_billing_extra = array(

	"1" => "如果你想让所有人随意连接你的网站，那么请将此设定为“是”。",
	
	"2" => "配套类型",
	"3" => "会员资格配套",
	"4" => "短信服务配套",
	"5" => "如果您仅希望使用短信服务配套，同时只允许在你的网站购买冲值配套，那么请在此选择“是”。",
	"6" => "配套名称",
		"7" => "请在此输入一个配套的名字，这将被显示在您的订阅页面。",
	"8" => "描述",	
	"9" => "价格",	
	"10" => "您想对订阅这个配套的成员征收多少费用？ 注意： 不要输入货币符号",
	"11" => "货币代码显示",
	
	"12" => "这只是在您的网站显示的货币代码，这不代表为您的付款货币。这个必须被设置在您的付款设置内。",	
	"13" => "订阅",	
	"14" => "如果您希望此是重复缴收的费用，那么请选择“是”。",	
	"15" => "升级期限",
	
	"16" => "日期",
	"17" => "星期",
	"18" => "月份",
		"18a" => "无限",
	"19" => "最大容量消息(日报)Max",
		"20" => "这是每位成员每天能发送的最大通讯数量。",
	"21" => "最大容量动漫表情",	
		"22" => "这是每位成员每天能发送的最大动漫表情数量。",	
	"23" => "最大文件上载",
		"24" => "成员所能够上载文件的最大数字。",
	"25" => "象征链接配套",
		"26" => "这个配套需要象征链接到您网站上的一个图象。建议象征使用的大小： 28px x 90px。",
		
	"27" => "特色成员",
		"28" => "如果您希望您照片出现在你的网站，那么请选择“是”功能。",		
	"29" => "着重",	
		"30" => "如果您希望拥有这个配套的会员的个人资料在查寻结果被着重，那么请选择“是”功能。",
		
	"31" => "观看成人图象",
		"32" => "如果您希望拥有这个配套的会员能观看成人图象，那么请选择“是”。",
	"33" => "短信服务点数SMS credits",
	"34" => "当会员们选择升级到这个配套时，这也表示他们的短信服务点数随之更改。如果他们已经拥有剩余点数，这将增加他们的目前点数。",
	"35" => "升级配套预览"

);

$admin_mainten_extra = array(

	"1" => "链接",
	"2" => "如果您只想要连接到一个外在网站，那么只需输入链接",
	"3" => "RSS新闻传递数据",
	
	"4" => "类别",
	"5" => "观看",
	"6" => "说明",
	"7" => "语言",
	"8" => "私人小组",
		
	"9" => "改变论坛板",	
	"10" => "选择论坛板",
	"11" => "默认论坛",
	
	"12" => "您当前使用第三方论坛。请登录他们的管理区域处理您的论坛",
	"13" => "密码"
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