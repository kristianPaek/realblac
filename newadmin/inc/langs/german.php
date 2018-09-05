<?php

$admin_charset = '';

ini_set('default_charset', 'iso-8859-1');

$LANG_ = array(
"_language" => "German",
"_charset" => "iso-8859-1", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "iso-8859-1",
	"title" => "Admin Bereich"
		
);

$admin_layout = array(

	"3" => "Meine Einstellungen",
	"4" => "Abmelden",

);


$admin_layout_page1 = array(

	"" => "&Uuml;berblick",

		"_*" => "Admin Bereich &Uuml;berblick",
		"_?" => "",

	"members" => "Mitglieder Statistik",
		
		"members_*" => "Mitglieder Statistik",
		"members_?" => "Die Grafik unterhalb zeigt an wieviel neue Mitglieder in den letzten 2 Wochen neu dazu gekommen sind.",
		"members_^" => "sub",

	"affiliate" => "Partner Statistik",
 
		"affiliate_*" => "Partner Statistik",
		"affiliate_?" => "Die Grafik unterhalb zeigt die neuen Partnerprogramm Zug&auml;nge der letzten 2 Wochen.",
		"affiliate_^" => "sub",

	"visitor" => "Besucher Statistik",
 
		"visitor_*" => "Besucher Statistik",
		"visitor_?" => "Zeigt an die Anzahl der Besucher in den letzten 2 Wochen.",
		"visitor_^" => "sub",

	"maps" => "Google Maps",
 
		"maps_*" => "Ort der Besucher mit Google Maps",
		"maps_?" => "In diesem Bereich siehst Du von wo aus Deine Mitglieder in der Welt Deine Webseite aufrufen. Dies kann f&uuml;r Dich zum Vorteil sein um z.b. Werbekampagnen oder auch Sprachdateien effektiv anzuwenden.",
 

	"adminmsg" => "Webseiten Ank&uuml;ndigungen",
 
		"adminmsg_*" => "Webseiten Ank&uuml;ndigungen",
		"adminmsg_?" => "Erstelle hier einfach eine Nachricht um Deinen Mitglieder beim Anmelden eine Nachricht anzeigen zu lassen. Das kann zum Vorteil sein um z.b. Ank&uuml;ndigungen oder andere wichtige Informationen Deinen Mitgliedern mitzuteilen .",

);
 

$admin_layout_page2 = array(

	"" => "Mitglieder",

		"_$" => "half",
		"_*" => "Mitglieder verwalten",
 

			"edit" => "Details bearbeiten",
	
				"edit_*" => "Mitglieder bearbeiten",
				"edit_?" => "W&auml;hlen um Mitgliederkonto und Profildetails zu bearbeiten.",
				"edit_^" => "keine",


			"fake" => "Fake Mitglieder",
	 
				"fake_*" => "Fake Mitglieder generieren",
				"fake_?" => "Hier kannst Du falsche Mitglieder generieren. Das ist am Anfang wichtig f&uuml;r Dich damit Deine Seite nicht leer aussieht. Alle Profil und Accountdetails k&ouml;nnen sp&auml;ter von Dir nochmals bearbeitet werden wenn Du das m&ouml;chtest.",
				"fake_^" => "sub",

	"banned" => "Geblockte Mitglieder",
 
		"banned_*" => "Geblockte Mitglieder",
		"banned_?" => "Deine Webseite hat einen eingebauten Hackdetektor der sofort IP Adressen blockt von denen ein Hackangriff verzeichnet wird. Unten siest Du unter anderem ob es sich dabei um einen Besucher oder User handelt. Au&szlig;erdem siehst Du Details wie Datum/Zeit, IP-Adresse und benutzter Hackstring.
    .",
		"banned_^" => "sub",

	"monitor" => "Mitgliederschutz",
 
		"monitor_*" => "Mitgliederschutz",
		"monitor_?" => "Du wirst vielleicht hin und wieder Mails von Usern bekommen die berichten das Sie von anderen Usern unerw&uuml;nschte Nachrichten bekommen. Um dies zu &uuml;berpr&uuml;fen und um Deine anderen Mitglieder von solchen Bel&auml;stigungen zu sch&uuml;tzen, kannst Du einzelne Nachrichten nach Eingabe von Benutzername &uuml;berpr&uuml;fen.",
		"monitor_^" => "sub",

	"import" => "Mitglieder importieren",
 
		"import_*" => "Mitglieder importieren",
		"import_?" => "Hier hast Du die M&ouml;glichkeit Mitglieder in Form von einer Datei zu importieren.",
		"import_^" => "sub",
		
	"files" => "Mitglieder Dateien", 
	"files_*" => "Mitglieder Album Dateien",


	"addfile" => "Foto hochladen",			 
	"addfile_*" => "Foto hochladen",
	"addfile_?" => "Hier kannst Du Bilder hochladen wenn ein Mitglied von Dir vielleicht Probleme damit hat.",
	"addfile_^" => "sub",
			
 
	"affiliate" => "Partner",
 
		"affiliate_*" => "Partner",
		"affiliate_?" => "Hier kannst Du Deine Partner verwalten.",
		 
			"addaff" => "Neuen Partner hinzuf&uuml;gen",
	 
				"addaff_*" => "Konto hinzuf&uuml;gen/bearbeiten",
				"addaff_?" => "Alle Felder ausf&uuml;llen um Konto zu bearbeiten oder um ein neues hinzuf&uuml;gen.",
				"addaff_^" => "sub",

			"affsettings" => "Partnerprogramm Inhalte",
 
				"affsettings_*" => "Partnerprogramm Design",
				"affsettings_?" => "Hier kannst Du Dein Angebot bearbeiten.",
				"affsettings_^" => "sub",

			"affcom" => "Partner Verg&uuml;tung",
	 
				"affcom_*" => "Partner Verg&uuml;tung",
				"affcom_?" => "Hier kannst Du die H&ouml;he Deiner Verg&uuml;tung bestimmen. Jedes mal wenn Dir ein Partner ein neues zahlendes Mitglied vermittelt ist dies die Verg&uuml;tung die Dein Partner von Dir erh&auml;lt.",
				"affcom_^" => "sub",


			"affban" => "Partner Banner",
	 
				"affban_*" => "Partner Banner",
				"affban_?" => "Hier kannst Du die Banner f&uuml;r Deine Partner verwalten.",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Vorlagen Gallerie",
 
			"_*" => "Vorlagen Gallerie",
			"_?" => "Hier siehst Du alle verf&uuml;gbaren Vorlagen Deiner Webseite.",
			 
				
			"color" => "Farbschemen",
		 
				"color_*" => "Farbschemen",
				"color_?" => "Hier kannst Du das Fabschema Deiner Webseite &auml;ndern.",
				"color_^" => "sub",
				
			"logo" => "Webseiten Logo",
				"logo_$" => "half",
				"logo_*" => "Webseiten Logo",
				"logo_?" => "Hier kannst Du Dein Webseitenlogo &auml;ndern, indem Du ein neues hochl&auml;dst oder ein bereits bestehendes w&auml;lst.",
				"logo_^" => "sub",
				
			"img" => "Vorlagen Bilder",
				"img_$" => "half",
				"img_*" => "Vorlagen Bilder",
				"img_?" => "Hier siehst Du alle Bilder die im Ordner Deiner Vorlage gespeichert sind. Du kannst diese auf Wunsch einfach ersetzen.",
				"img_^" => "sub",

			"text" => "Webseiten Text",
				"text_$" => "half",
				"text_*" => "Webseiten Text",
				"text_?" => "Hier kannst Du den Willkommenstext Deiner Webseite &auml;ndern.",
				"text_^" => "sub",


			"terms" => "AGB큦",
				"terms_$" => "half",
				"terms_*" => "Nutzungsbestimmungen",
				"terms_?" => "Hier kannst Du die Nutzungsbestimmungen bearbeiten und ab&auml;ndern. Sie werden unter anderem im Registrierungsprozess neuer Mitgliedern angezeigt.",
				"terms_^" => "sub",
	
			"edit" => "Seiten & Dateien",
 
			"edit_*" => "Webseiten",
			"edit_?" => "Hier kannst Du den Inhalt Deiner Webseite ab&auml;ndern. Wir schlagen Dir vor den Code zu kopieren und Ihn dann mit z.b. Dreamweaver zu bearbeiten und Ihn dann wieder einzuf&uuml;gen. <b>Bitte sei vorsichtig wenn Du Configirations oder Systemdateien ab&auml;nderst.</a>",
				
	
	
				"newpage" => "Seite erstellen",
				"newpage_$" => "half",
				"newpage_*" => "Neue Seite erstellen",
				"newpage_?" => "Eine neue Seite zu erstellen ist nicht schwer. W&auml;hle einfach einen Titel f&uuml;r Deine Seite und schon kann diese dann bearbeitet werden.",
				"newpage_^" => "sub",
							
				
			"meta" => "Vorlagen Meta Tags",
				"meta_$" => "half",
				"meta_*" => "Meta Tag Editor",
				"meta_?" => "Emeeting hat einen integrierten Metatag-generator. Aus Hauptw&ouml;rtern und S&auml;tze die Du hier eingeben kannst erstellt die Software in Verbindung mit dem Inhalt Deiner Seiten relevante Metatags und Beschreibungen. Das spart Zeit und Kosten. ",
				"meta_^" => "sub",

 

		
			"menu" => "Men&uuml;s",
				"menu_$" => "half",
				"menu_*" => "Men&uuml;verwaltung",
				"menu_?" => "Hier kannst Du die Anordnung der Men&uuml;leisten f&uuml;r Deine Mitglieder auf der Webseite verwalten und ab&auml;ndern. Du kannst auch Men&uuml;punkte erstellen die z.b. auf andere Webseiten verweisen in Form von (http://google.com).",
				"menu_^" => "sub",

	"manager" => "Datei Manager",
		"manager_$" => "half",
		"manager_*" => "Datei Verwaltung",
		"manager_?" => "Mit dem Datei Manager kannst Du Dateien und Inhalte auf Deiner Seite hinzuf&uuml;gen oder auch l&ouml;schen.",

			"slider" => "Slider",
				"slider_$" => "half",
				"slider_*" => "Slider",
				"slider_?" => "Mit dem Slider verwaltest Du die Bilder die auf Deiner Webseite in Rotation gebracht werden. Du kannst neue Bilder hochladen, eine Beschreibung hinzuf&uuml;gen und einen Link f&uuml;r die Weiterleitung angeben.",
				"slider_^" => "sub",

	"languages" => "Sprachdateien",
		"languages_$" => "half",
		"languages_*" => "Sprachdateien",
		"languages_?" => "Hier aufgef&uuml;hrt sind alle Sprachdateien die auf Deiner Webseite geladen sind. Du kannst Sprachdateien l&ouml;schen die Du nicht ben&ouml;tigst oder eine als Hauptsprache markieren. <b>Beachte, Du musst Dich komplett aus dem Admin und Seitenbereich abmelden, damit die &Auml;nderungen wirksam werden.</b>",

			"editlanguage" => "Sprachdatei bearbeiten",
				"editlanguage_$" => "half",
				"editlanguage_*" => "Sprachdatei bearbeiten",
				"editlanguage_?" => "Bitte sei vorsichtig wenn Du Sprachdateien ab&auml;nderst damit keine Systemfehler entstehen. Berarbeite nur den Text nach diesem Zeichen (=>) Dieses darf nicht gel&ouml;scht werden da es als Schl&uuml;ssel benutzt wird.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Sprachdatei hinzuf&uuml;gen",
				"addlanguage_$" => "half",
				"addlanguage_*" => "Sprache hinzuf&uuml;gen",
				"addlanguage_?" => "Kopiere einfach eine vorhandene Sprache Deiner Wahl und &auml;ndere Sie in die neue um.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Email und Newsletter",

		"_$" => "half",
		"_*" => "Email und Newsletters",
		"_?" => "Hier sind alle Emailvorlagen die von dem System benutzt werden um mit Deinen Mitgliedern zu kommunizieren. Du kannst Sie durch anklicken anschauen, bearbeiten oder auch l&ouml;schen.",
      
      "add" => "Neue Email erstellen",
				"add_$" => "half",
				"add_*" => "Neue Email bearbeiten",
				"add_?" => "Schreibe einfach eine neue Email nach Deinen W&uuml;nschen. Diese wird in als Vorlage gespeichert.",
				"add_^" => "sub",

	"welcome" => "Willkommen큦 Email/ SMS",
		"welcome_$" => "half",
		"welcome_*" => "Willkommen큦 Email/ SMS",
		"welcome_?" => "Hier kannst Du den Betreff und den Text f&uuml;r die erste Email erstellen, die ein Mitglied erh&auml;lt wenn er sich dass erste mal registriert.",
		"welcome_^" => "sub",

	"template" => "Email Vorlagen",
		"template_$" => "half",
		"template_*" => "Email Vorlagen",
		"template_?" => "Hier sind alle Emailvorlagen aufgef&uuml;hrt die auf Deiner Seite gespeichert sind. Klicke einfach eine an um sie anzuschauen oder sie zu bearbeiten.",
		"template_^" => "sub",

	"export" => "Emails runterladen",

		"export_$" => "half",
		"export_*" => "Emails runterladen",
		"export_?" => "Hier kannst Du alle Emailadressen Deiner Mitglieder auf einmal runterladen.",
		"export_^" => "sub",

	"sendnew" => "Newsletter verschicken",

		"sendnew_$" => "half",
		"sendnew_*" => "Newsletter verschicken",
		"sendnew_?" => "Hier kannst Du Newsletter verschicken nachdem Du das Mitgliedslevel ausgew&auml;hlt hast.",

	"send" => "Einzelne Email verschicken",

		"send_$" => "half",
		"send_*" => "Einzelne Email verschicken",
		"send_?" => "Hier kannst Du eine einzelne Email an einen bestimmten User senden. F&uuml;ge einfach die Emailadresse ein.",
		"send_^" => "sub",

	/*"auto" => "Automatische Emails",

		"auto_$" => "half",
		"auto_*" => "Automatische Emails",
		"auto_?" => "Hier kannst Du Emails bestimmen die vom System automatisch in einem vorgegebenen Rhytmus versendet werden.",
		"auto_^" => "sub",*/

	"subs" => "Erinnerungsemail",

		"subs_$" => "half",
		"subs_*" => "Erinnerungsemail",
		"subs_?" => "Hier kannst Du eine Erinnerungsemail bestimmen, f&uuml;r Mitglieder bei denen z.b. die Mitgliedschaft abl&auml;uft.",
		"subs_^" => "sub",
		
	"tc" => "Email Reports",
		"tc_$" => "half",
		"tc_*" => "Email Reports",
		"tc_?" => "Email reports werden generiert wenn eine Email versendet wird die einen Trackingcode enth&auml;lt. Dieser zeigt Dir eine Statistik wieviele Mitglieder die Email ge&ouml;ffnet haben.",
		"tc_^" => "sub",

			"tracking" => "Email Tracking Code",
				"tracking_$" => "half",
				"tracking_*" => "Email Tracking Code",
				"tracking_?" => "Der Trackingcode unterhalb (tracking_id) wird durch ein transparentes Bild ersetzt und an die Email angeh&auml;ngt. Wenn dann die Email vom Mitglied ge&ouml;ffnet, und das Bild nicht geblockt wird, kann dies das System aufzeichnen und Dir dann mitteilen.",
				"tracking_^" => "sub",



	"SMSsend" => "SMS Nachricht versenden",

		"SMSsend_$" => "half",
		"SMSsend_*" => "SMS Nachricht versenden",
		"SMSsend_?" => "Hier kannst Du Nachrichten an die Handys Deiner Mitglieder schicken.",
);

$admin_layout_page5 = array(

	"" => "Mitglieder Gruppen",

		"_$" => "half",
		"_*" => "Mitglieder Gruppen",
		"_?" => "Hier sind alle Mitgliedergruppen aufgef&uuml;hrt die erweitert, gel&ouml;scht und abge&auml;ndert werden k&ouml;nnen. Die Mitgliedergruppen die markiert sind, werden vom System ben&ouml;tigt. ",

			"epackage" => "Packet hinzuf&uuml;gen",
				"epackage_$" => "half",
				"epackage_*" => "Paket hinzuf&uuml;gen/bearbeiten",
				"epackage_?" => "Bitte ausf&uuml;llen um neue Gruppe hinzuf&uuml;gen oder zu aktualisieren.",
				"epackage_^" => "sub",

			"packaccess" => "Zugang verwalten",
				"packaccess_$" => "full",
				"packaccess_*" => "Zugang verwalten",
				"packaccess_?" => "Hier kannst Du die Zug&auml;nge Deiner Webseite den Mitgliedergruppen zuordnen. <b>Beachte: Markiere eine Box wenn Du NICHT m&ouml;chtest das die jeweilige Gruppe Zugang zu diesem Bereich haben soll. </b>",
				"packaccess_^" => "sub",

			"upall" => "Mitglieder transferieren",
				"upall_$" => "half",
				"upall_*" => "Mitglieder zwischen Paketen transferieren",
				"upall_?" => "Hier kannst Du Mtglieder von einem Paket ins andere transferieren.",
				"upall_^" => "sub",


	"gateway" => "Gateways",

		"gateway_$" => "half",
		"gateway_*" => "Gateways",
		"gateway_?" => "Hier kannst Du die Bezahlformen f&uuml;r Deine Mitgliedschaften einrichten. Wenn Du eine rein freie Webseite betreiben m&ouml;chtest, so kannst Du diesen Dienst in den Einstellungen abschalten.",


			"addgateway" => "Gateway hinzuf&uuml;gen",
				"addgateway_$" => "half",
				"addgateway_*" => "Gateway hinzuf&uuml;gen",
				"addgateway_?" => "Das System hat bereits einige Zahlungsdienste f&uuml;r Dich vorinstalliert. Um einen auszuw&auml;hlen klicke einfach einen in der Liste an.",
				"addgateway_^" => "sub",


	"billing" => "Abrechnungs System",

		"billing_$" => "half",
		"billing_*" => "Abrechnungs System",	


		"affbilling" => "Partner Abrechnungs Verlauf",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Partner Abrechnungs Verlauf", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banner und Werbung",

		"_$" => "half",
		"_*" => "Banner und Werbung",
 

			"addbanner" => "Banner hinzuf&uuml;gen",
				"addbanner_$" => "half",
				"addbanner_*" => "Banner hinzuf&uuml;gen",
				"addbanner_?" => "Hier kannst Du einen neuen Banner Deiner Webseite zuf&uuml;gen.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Display Einstellungen",

		"_$" => "half",
		"_*" => "Display Einstellungen",
		"_?" => "Hier kannst Du die Features Deiner Webseite einstellen.",


	"op" => "Display Verwaltung",

		"op_$" => "half",
		"op_*" => "Display Verwaltung",
		"op_?" => "Hier kannst Du verschiedene Sachen wie z.b. Wartungsarbeiten, W&auml;hrung, etc. einstellen.",
	
		"op1" => "Such Einstellungen",
	
			"op1_$" => "half",
			"op1_*" => "Such Display Einstellungen",
			"op1_?" => "Hier kannst Du einstellen wie Suchresultate auf Deiner Webseite dargestellt werden sollen.",
			"op1_^" => "sub",
	
		"op2" => "Mitgliedschaft Einstellungen",
	
			"op2_$" => "half",
			"op2_*" => "Mitgliedschaft Einstellungen",
			"op2_?" => "Hier kannst Du verschieden Sachen rund um die Mitgliedschaft einstellen.",
			"op2_^" => "sub",

		"op3" => "Flash Server Einstellungen",
	
			"op3_$" => "half",
			"op3_*" => "Flash Server Einstellungen",
			"op3_?" => "Ein Flashserver wird ben&ouml;tigt um Videogr&uuml;&szlig;e und Webcams im IM und im Chatraum darzustellen.",
			"op3_^" => "sub",

		"op4" => "API Einstellungen",
	
			"op4_$" => "half",
			"op4_*" => "API Einstellungen", 
			"op4_^" => "sub",

		"thumbnails" => "Vorschaubilder",
	
			"thumbnails_$" => "half",
			"thumbnails_*" => "Vorschaubilder", 
			"thumbnails_^" => "Hier sind Vorschaubilder aufgef&uuml;hrt die vom System benutzt werden, wenn ein Mitglied kein Bild von sich hochgeladen hat.",

	"email" => "Email Einstellungen",

		"email_$" => "half",
		"email_*" => "Email Einstellungen",
		"email_?" => "Hier kann eingestellt werden, bei welchem Vorgang Du automatisch eine Info per Email erh&auml;lst.",

	"paths" => "Datei / Ordner Pfade",

		"paths_$" => "half",
		"paths_*" => "Datei / Ordner Pfade",
		"paths_?" => "Die Pfade zu Deinen Ordnern sind relativ und werden automatisch bei der Installation vom Programm erstellt. Falls Du doch mal einen Pfad ab&auml;ndern willst kannst Du das hier tun.",

	"watermark" => "Bild Wasserzeichen",

		"watermark_$" => "half",
		"watermark_*" => "Wasserzeichen",
		"watermark_?" => "Ein Wasserzeichen kann auf den Bildern Deiner Mitglieder dargestellt werden um diese zu sch&uuml;tzen. Dieses Wasserzeichen sollte im PNG oder 8Bit Format sein.",


);


$admin_layout_page8 = array(

	"" => "Webseiten Felder",

		"_$" => "half",
		"_*" => "Profil, Registrations und Suchfelder",
		"_?" => "Hier sind alle Felder Deiner Webseite aufgef&uuml;hrt. Du kannst sie an unterschiedlichen Pl&auml;tzen wie z.b. Profil, Registrierung oder in der Suche darstellen.",

		"addfields" => "Neues Feld erstellen",
	
			"addfields_$" => "half",
			"addfields_*" => "Neues Feld erstellen",
			"addfields_?" => "Hier kannst Du ein neues Feld erstellen. Felder werden ben&ouml;tigt damit Mitglieder Informationen von sich eintragen k&ouml;nnen.",
			"addfields_^" => "sub",

		"fieldgroups" => "Gruppen verwalten",
	
			"fieldgroups_$" => "half",
			"fieldgroups_*" => "Gruppen verwalten",
			"fieldgroups_?" => "Gruppen sind Bereiche mit Feldern die ein Hauptthema haben z.b. *&Uuml;ber mich* in dieser Gruppe kannst Du dann Felder erstellen wie z.b. *Name* *Hobbys* etc. <b>Wenn Du eine komplette Gruppe l&ouml;schst in der Felder registriert sind, rutschen diese Felder automatisch in die n&auml;chste Gruppe.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Neue Gruppe erstellen",
	
			"addgroups_$" => "half",
			"addgroups_*" => "Neue Gruppe erstellen",
			"addgroups_?" => "Gruppen sind Bereiche mit Feldern die ein Hauptthema haben z.b. *&Uuml;ber mich* in dieser Gruppe kannst Du dann Felder erstellen wie z.b. *Name* *Hobbys* etc. <b>Wenn Du eine komplette Gruppe l&ouml;schst in der Felder registriert sind, rutschen diese Felder automatisch in die n&auml;chste Gruppe.",
			"addgroups_^" => "sub",




	"cal" => "Event Kalender",

		"cal_$" => "half",
		"cal_*" => "Event Kalender",
		"cal_?" => "Der Kalender ist ein Bereich f&uuml;r Deine Mitglieder in den Veranstaltungen eingetragen oder gelesen werden k&ouml;nnen. Du kannst hier neue Veranstaltungen erstellen, bearbeiten oder l&ouml;schen.",

		"caladd" => "Event hinzuf&uuml;gen",
	
			"caladd_$" => "half",
			"caladd_*" => "Bearbeiten/Hinzuf&uuml;gen",
			"caladd_?" => "Bitte ausf&uuml;ffen um eine Veranstaltung hinzuf&uuml;gen oder zu bearbeiten.",
			"caladd_^" => "sub",

		"caladdtype" => "Event Themen verwalten",
	
			"caladdtype_$" => "half",
			"caladdtype_*" => "Event Themen verwalten",
			"caladdtype_?" => "Hier kannst Du die Themen f&uuml;r Deine Veranstaltungen bearbeiten. Lade ein Bild passend zum Event hoch damit Deine Themen interessanter wirken.",
			"caladdtype_^" => "sub",

		"importcal" => "Events importieren",
	
			"importcal_$" => "half",
			"importcal_*" => "Events suchen & importieren",
			"importcal_?" => "Das Programm hat eine eingebaute Event API. Damit k&ouml;nnen im Internet nach Events gesucht werden, und diese automatisch ins System inportiert werden.",
			"importcal_^" => "sub",


	"poll" => "Umfragen",

		"poll_$" => "half",
		"poll_*" => "Umfrage",
		"poll_?" => "Hier kannst Du Deine Umfragen verwalten und bearbeiten.",

		"polladd" => "Umfrage hinzuf&uuml;gen",
	
			"polladd_$" => "half",
			"polladd_*" => "Umfrage hinzuf&uuml;gen",
			"polladd_?" => "Bitte hier ausf&uuml;llen um eine neue Umfrage zu erstellen.",
			"polladd_^" => "sub",



	"forum" => "Webseiten Forum",

		"forum_$" => "half",
		"forum_*" => "Forum Kategorien",
		"forum_?" => "Hier kannst Du die Kategorien in Deinem Forum verwalten. Lade ein Bild zu jeder Kategorie damit Dein Forum interessanter wirkt.",

		"forumadd" => "Forum Kategorie erstellen",
	
			"forumadd_$" => "half",
			"forumadd_*" => "Forum Kategorie erstellen",
			"forumadd_?" => "Bitte ausf&uuml;llen um eine neue Kategorie zu erstellen.",
			"forumadd_^" => "sub",

		"forumchange" => "Forum integrieren",
	
			"forumchange_$" => "half",
			"forumchange_*" => "Forum Integration Verwaltung",
			"forumchange_?" => "Das System erlaubt die andere Forumsysteme als das bereits installierte zu benutzen. Bitte beachte die jeweiligen Installationshinweise der Forumsoftware.",
			"forumchange_^" => "sub",

		"forumpost" => "Eintr&auml;ge verwalten",
	
			"forumpost_$" => "half",
			"forumpost_*" => "Forum Eintr&auml;ge verwalten",
			"forumpost_?" => "Hier sind alle Eintr&auml;ge Deiner Mitglieder aufgef&uuml;hrt. Du kannst Sie bearbeiten oder auch l&ouml;schen.",
			"forumpost_^" => "sub",

	"chatrooms" => "Chatraum",

		"chatrooms_$" => "half",
		"chatrooms_*" => "Chatraum",
		"chatrooms_?" => "Hier kannst Du einen neuen Chatraum erstellen oder einen vorhandenen bearbeiten.",


	"faq" => "Webseite FAQ",

		"faq_$" => "half",
		"faq_*" => "Webseite FAQ",
		"faq_?" => "FAQ ist eine gute M&ouml;glichkeit wo Du h&auml;ufig gestellte Fragen Deinen Mitgliedern beantworten kannst. Je mehr Du erstellst desto weniger werden User Dich wegen Hilfe anschreiben.",

		"faqadd" => "FAQ hinzuf&uuml;gen",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Bearbeiten/Hinzuf&uuml;gen",
			"faqadd_?" => "Bitte ausf&uuml;llen um einen Eintrag zu erstellen oder zu bearbeiten.",
			"faqadd_^" => "sub",

	"words" => "Wort Filter",

		"words_$" => "half",
		"words_*" => "Wort Filter",
		"words_?" => "Der Wortfilter wird im Profil, IM, Chat und Forum benutzt. Er bietet Dir die M&ouml;glichkeit W&ouml;rter zu definieren, die nicht erlaubt sind. Diese W&ouml;rter werden dann durch Sternchen dargestellt (**).",



	"articles" => "Artikel",

		"articles_$" => "half",
		"articles_*" => "Artikel",
		"articles_?" => "Artikel sind eine gute M&ouml;glichkeit Deine Mitglieder mit Updates, Ank&uuml;ndigungen oder Nachrichten auf dem laufenden zu halten.",


		"articleadd" => "Artikel erstellen",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Neuen Artikel erstellen",
			"articleadd_?" => "Bitte ausf&uuml;llen um einen neuen Artikel zu erstellen.",
			"articleadd_^" => "sub",

		"articlerss" => "RSS Artikel importieren",
	
			"articlerss_$" => "half",
			"articlerss_*" => "RSS Artikel importieren",
			"articlerss_?" => "RSS Links k&ouml;nnen direkt in die Kategorien Deiner Webseite importiert werden.",
			"articlerss_^" => "sub",

		"articlecats" => "Artikel Kategorien",
	
			"articlecats_$" => "half",
			"articlecats_*" => "Artikel Kategorien",
			"articlecats_?" => "Hier kannst Du eine neue Kategorie f&uuml;r Deine Artikel erstellen.",
			"articlecats_^" => "sub",


	"groups" => "Community Gruppen",

		"groups_$" => "half",
		"groups_*" => "Community Gruppen",
		"groups_?" => "Hier kannst Du Deine Community Gruppen erstellen und verwalten.",


	"class" => "Anzeigenmarkt",

		"class_$" => "half",
		"class_*" => "Anzeigenmarkt",
		"class_?" => "Hier sind alle Anzeigen Deiner Mitglieder aufgef&uuml;hrt.",


		"addclass" => "Anzeige erstellen",
	
			"addclass_$" => "half",
			"addclass_*" => "hinzuf&uuml;gen/bearbeiten",
			"addclass_?" => "Hier kannst Du die Anzeigen verwalten und neue erstellen.",
			"addclass_^" => "sub",

		"addclasscat" => "Kategorien verwalten",
	
			"addclasscat_$" => "half",
			"addclasscat_*" => "Kategorien verwalten",
			"addclasscat_?" => "Hier kannst Du die Kategorien f&uuml;r Deine Anzeigen verwalten. Lade ein Bild zu jeder Kategorie, damit diese interessanter wirkt.",
			"addclasscat_^" => "sub",

	"games" => "Spiele",

		"games_$" => "half",
		"games_*" => "Spiele",
		"games_?" => "Hier sind alle Spiele aufgef&uuml;hrt die im System installiert sind. Bitte lese das Handbuch(Manuals) wenn Du neue installieren m&ouml;chtest.",

	"gamesinstall" => "Spiel installieren",

		"gamesinstall_$" => "half",
		"gamesinstall_*" => "Spiel installieren",
		"gamesinstall_?" => "W&auml;hle ein Spiel aus das auf der Seite benutzt und installiert werden soll. Wenn Du ein ganz neues das hier noch nicht vorhanden ist installieren m&ouml;chtest, lade die tar dateien in den Spiele Ordner ORT: inc/exe/Games/tar/. <b>F&uuml;r Details schaue bitte in das Benutzerhandbuch(Manual) um mehr zu erfahren. </b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administratoren",

		"_$" => "half",
		"_*" => "Webseiten Admin's & Moderatoren",
		"_?" => "Hier sind alle Admin큦 und Moderatoren aufgef&uuml;hrt au&szlig;er dem Super-Admin. Um einen neuen Moderator zu erstellen, benutze einfach die unten aufgef&uuml;hrte Mitgliedersuche und klicke neben dem Namen auf das Moderator-Icon.",

	"pref" => "Admin Einstellungen",

		"pref_$" => "half",
		"pref_*" => "Admin Einstellungen",
		"pref_?" => "Hier kannst Du Einstellungen zum Admin vornehmen.",

	"manage" => "Moderatoren verwalten",

		"manage_$" => "half",
		"manage_*" => "Moderatoren verwalten",
		"manage_?" => "Ein Moderator kann zwei Funktionen haben. Entweder moderiert er nur auf der Webseite selber. Oder Du kannst Ihm Zugang ins Admin Backend geben und Ihm Berechtigungen zuweisen.",
		"manage_^" => "sub",

	"email" => "Admin Emails",

		"email_$" => "half",
		"email_*" => "Admin Emails",
		"email_?" => "Hier sind alle Emails von Mitgliedern aufgef&uuml;hrt die an den Admin gesendet worden sind.",

	"compose" => "Email erstellen",

		"compose_$" => "half",
		"compose_*" => "Email erstellen",
		"compose_?" => "Hier kannst Du eine neue Nachricht an Deine Mitglieder senden.",
		"compose_^" => "sub",

	"super" => "Super Admin Login",

		"super_$" => "half",
		"super_*" => "Super Admin Login Details",
		"super_?" => "Sei vorsichtig wenn Du die Kontodetails vom Super Admin aktualisierst. Merke Dir das Passwort gut und zeige es niemandem.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Software Updates",

		"_$" => "half",
		"_*" => "Software Updates",
		"_?" => "Hier ist die aktuelle Version von Deinem System verzeichnet und das letzte Update das verf&uuml;gbar ist. Wenn eine neue Version verf&uuml;gbar ist kontaktiere den Hersteller.",

	"backup" => "Datensicherung",

		"backup_$" => "half",
		"backup_*" => "Datensicherung",
		"backup_?" => "W&auml;hle eine oder mehrere Tabellen aus um eine Datensicherung zu erstellen. Es ist sehr wichtig regelm&auml;&szlig;ig Datensicherungen durchzuf&uuml;hren um bei evt. Datenverlust schnell wieder ein stabiles System zu haben.",


	"license" => "Programm Schl&uuml;ssel",

		"license_$" => "half",
		"license_*" => "Programm Schl&uuml;ssel",
		"license_?" => "Hier ist Dein Programm Schl&uuml;ssel aufgef&uuml;hrt.",

	"sms" => "SMS Guthaben",

		"sms_$" => "half",
		"sms_*" => "SMS Guthaben",
		"sms_?" => "Hier ist Dein verf&uuml;gbares SMS Guthaben aufgef&uuml;hrt.",

);

$admin_layout_page11 = array(

	"" => "Programm Plugins",

		"_$" => "half",
		"_*" => "Programm Plugins",
		"_?" => "Plugins erweitern die Funktionen von Deiner Software. Wenn ein Plugin installiert ist, kannst Du es benutzen oder es auch wieder deaktivieren.",

);


$admin_layout_nav = array(

	"1" => "&Uuml;berblick",
		"1a" => "Mitglieder Statistik",
		"1b" => "Partner Statistik",
		"1c" => "Besucher Statistik",
		"1d" => "Herkunft der Besucher",
	"2" => "Mitglieder",
		"2a" => "Mitglieder verwalten",
		"2b" => "Partner verwalten",
		"2c" => "Gesperrte Benutzer",
		"2d" => "Mitglieder Dateien",
		"2e" => "Mitglieder importieren",
	"3" => "Design",
		"3a" => "Vorlagen",
		"3b" => "Vorlagen Editor",
		"3c" => "Vorlagen Bilder Manager",
		"3d" => "Logo Editor",
		"3e" => "Meta Tags",	
		"3f" => "Sprachen",
		"3g" => "Seiten Wortlaut",
		"3h" => "Datei Manager",
		"3i" => "Men&uuml;leisten",
	"4" => "Email",
		"4a" => "Emails verwalten",
		"4b" => "Emails Vorlagen",
		"4c" => "Email Reports",
		"4d" => "Einzelne Email senden",
		"4e" => "Email Erinnerung",	
		"4f" => "Emails runterladen",
		"4g" => "Newsletter senden",		
	"5" => "Abrechnung",
		"5a" => "Pakete verwalten",
		"5b" => "Zahlungsmodule",
		"5c" => "Abrechnungsverlauf",
		"5d" => "Partner Abrechnungsverlauf",
	"6" => "Einstellungen",
		"6a" => "Darstellungen",
		"6b" => "Darstellung vewalten",
		"6c" => "System Pfade",
		"6d" => "Foto Wasserzeichen",
	"7" => "Inhalt",
		"7a" => "Suchfelder",
		"7b" => "Veranstaltungskalender",
		"7c" => "Webseiten Umfrage",
		"7d" => "Webseiten Forum",
		"7e" => "Chat R&auml;ume",	
		"7f" => "FAQ",
		"7g" => "Wort Filter",
		"7h" => "Artikel / News",
		"7i" => "Gruppen",
	"8" => "Werbeaktionen",	
		"8a" => "Banner",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Moderatoren verwalten",	
		"10a" => "Moderatoren verwalten",
		"10b" => "Super Admin",
	"11" => "Wartungsarbeiten",
		"11a" => "Datensicherung",
		"11b" => "Programmschl&uuml;ssel",
		"11c" => "Programm Updates",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "System erfolgreich aktualisiert",
	"no_update" => "Kein Update vorhanden!",
	"edit" => "Bearbeiten",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Suchen",
	"1" => "Alles ausw&auml;hlen",
	"2" => "Alles abw&auml;hlen",
	"3" => "Genehmigt",
	"4" => "Abgelehnt",
	"5" => "L&ouml;schen",	
	"6" => "Mitglied hervorheben",
	"7" => "M&ouml;glichkeiten",	
	"8" => "Aktualisieren",	
	"9" => "hervorheben",
	"10" => "Nicht mehr hervorheben",	
	"11" => "Update Haupt Sprache",
	"12" => "senden",
	"13" => "Fortfahren",	
	"14" => "Aktivieren",
	"15" => "deaktivieren",
	"16" => "Reihenfolge aktualisieren",
	"17" => "Seitenfelder aktualisieren",	
	"18" => "aktivieren",
);

$admin_table_val = array(
	"1" => "Mitgliedsname",
	"2" => "Geschlecht",
	"3" => "Zuletzt angemeldet",
	"4" => "Status",
	"5" => "Paket",
	"6" => "Aktualisiert",
	"7" => "M&ouml;glichkeiten",	
	"8" => "Datum",
	"9" => "IP Addresse",
	"10" => "Hack String",	
	"11" => "Eingetreten am",	
	"12" => "Name",
	"13" => "Email",
	"14" => "Klicks",
	"15" => "Anmeldungen",
			
	"15" => "Bezahlte Verg&uuml;tung",
		
	"16" => "Nachricht",
	"17" => "Zeit",
	"18" => "Datei Name",
	"19" => "Zuletzt aktualisiert",	
	"20" => "Bearbeiten",
	"21" => "Haupt",	
	"22" => "ID",

	"23" => "Preis",
	"24" => "Sichtbar",	
	"25" => "Art",
	"26" => "Zugang verwalten",	
	"27" => "Aktiv",

	"28" => "Code anzeigen",
	"29" => "Felder",	
	"30" => "Partner Name",
	"31" => "Total Anteil",	
	"32" => "Status",
	
	"33" => "Aktualisiert am",
	"34" => "Ablaufsdatum",	
	"35" => "Zahlungsmethode",
	"36" => "Noch Aktiv",	
	"37" => "Passwort",
	"38" => "Zuletzt eingeloggt",

	"39" => "Position",
	"40" => "Treffer",	
	"41" => "Aktiv",
	"42" => "Vorschau",	
	"43" => "&Uuml;berschrift",
	"44" => "Artikel",
	"45" => "Anordnung",

);

$admin_search_val = array(
	"1" => "Benutzername",
	"2" => "Alle Pakete",
	"3" => "All Geschlechter",
	"4" => "Pro Seite",
	"5" => "Sortiert nach",
	"6" => "Email Addresse",
	
	"7" => "Egal",
	"8" => "Aktive Mitglieder",
	"9" => "Gesperrte Mitglieder",
	"10" => "Nicht genehmihte Mitglieder",
	"11" => "Mitglieder die k&uuml;ndigen m&ouml;chten",
	"12" => "Alle Seiten",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Alle Gruppen verwalten",
	"2" => "Gruppen Name",
	"3" => "Sprache",		
	"4" => "Themen verwalten",
	"5" => "Kategorien verwalten",	
	"6" => "Gruppen Kategorie Name",		
	"7" => "Kategorien verwalten",	
	"8" => "Name",	
	"9" => "Anzahl",	
	"10" => "Artikel hinzuf&uuml;gen",	
	"11" => "Kategorie",
	"12" => "Seiten &Uuml;berschrift",	
	"13" => "kurze Beschreibung",		
	"14" => "Artikel hinzuf&uuml;gen",
	"15" => "Kategorien verwalten",
	"16" => "Feld Listen",
	"17" => "Sortiert",
	"18" => "Sprache",
	"19" => "List Value",
	"20" => "Neues Feld",	
	
	"21" => "Feld &Uuml;berschrift",		
	"22" => "Art des Feldes",
		"23" => "Text Feld",	
		"24" => "Text Bereich",	
		"25" => "Listen Box",
		"26" => "Einzelne Check Box",
		"27" => "Multiple Check Box",
	
	"28" => "Gruppen &Uuml;berschrift",
	"29" => "Auch durch Registrierung",
	"30" => "Unterhalb ausw&auml;hlen",
	
	"31" => "Gruppe hinzuf&uuml;gen",
	"32" => "Gruppen Darstellung",
		"34" => "Allen Mitgliedern zeigen",
		"35" => "Nur Admin`s zeigen",
		"36" => "Mitgliedern und Admins zeigen (nicht auf Profile)",
	"37" => "Nur",	
	"38" => "Gruppen verwalten",	
	"39" => "Event hinzuf&uuml;gen",	
	"40" => "Feld Titel",
	"41" => "Titel",		
	"42" => "Titel Text",
	"43" => "Titel Typ",	
	"44" => "Titel suchen",		
	"45" => "Profil Titel",	
	"46" => "Du musst einen Titel f&uuml;r die Profilseite wie z.b.'ich bin' und f&uuml;r die Suchseite z.b.'ich suche'",	
	"47" => "Vorhandene Feld Titel",	
	"48" => "Feld in diese Gruppe senden",		
	"49" => "Mitglied ID",
	"50" => "Event Name",	
	"51" => "Event Beschreibung",		
	"52" => "Event Typ",
	"53" => "W&auml;hle Kategorie",	
	"54" => "W&auml;hle Art",
	"55" => "Event Zeit",
	"56" => "F&uuml;r alle Tage einfach frei lassen",
	"57" => "Event Datum",
	"58" => "Monat",	
	
	"59" => "Tag",	
	"60" => "Jahr",
	"61" => "Land",		
	"62" => "Bundesland",
	"63" => "Stra&szlig;e",	
	"64" => "Stadt",		
	"65" => "Telefon",	
	"66" => "Email",	
	"67" => "Webseite",	
	"68" => "Event sichtbar an",		
		"69" => "Alle",
		"70" => "Nur Freunde",	
		
	"71" => "Umfrage hinzuf&uuml;gen",		
	"72" => "Umfrage Ergebnisse",
	"73" => "Umfrage Name",	
	"74" => "Antwort",	
	"75" => "Aktivieren",
	
	"76" => "Forum Thema hinzuf&uuml;gen",
	"77" => "Eintr&auml;ge verwalten",
	"78" => "Forum Thema",	
		
	"79" => "&Uuml;berschrift",	
	"80" => "Beschreibung",
	"81" => "Forum Eintr&auml;ge",		
	"82" => "Alle Eintr&auml;ge",
	"83" => "Heute",	
	"84" => "die Woche",		
	"85" => "letzte Woche",	
	"86" => "Raum Name",	
	"87" => "Titel existiert bereits",	
	"88" => "Raum Passwort",		
	"89" => "Neu hinzuf&uuml;gen",
	"90" => "F.A.Q hinzuf&uuml;gen",
	
	"91" => "Wort Zensur hinzuf&uuml;gen",		
	"92" => "Wort",
	
	"93" => "Genehmigt",
	"94" => "Titel",
	"95" => "Passender Titel",
	"96" => "Sprache",

	"97" => "Vorschau",
	"98" => "Ergebnisse",
);
$admin_advertising = array(

	"1" => "Webseiten Banner",
	"2" => "Banner hinzuf&uuml;gen",
	"3" => "Partner Banner",	
	"4" => "bearbeiten/hinzuf&uuml;gen",
	"5" => "Banner Art",	
	"6" => "Webseiten Banner",			
	"7" => "Partner Banner",	
	"8" => "Name",	
	"9" => "Banner hochladen",	
	"10" => "HTML einf&uuml;gen",	
	"11" => "HTML Code",
	"12" => "Banner hochladen",	
	"13" => "Banner Link",		
	"14" => "Anzeigen an",
		"15" => "Alle",
		"16" => "Nur eingeloggte Mitglieder",
	
	"17" => "Seite",
	"18" => "Aktiv",
	
	"19" => "Oben",
	"20" => "Mitte",	
	"21" => "Links",		
	"22" => "Boden",
	"23" => "Frei lassen wenn Du einen Link im Bannercode benutzt",
	"24" => "Banner Vorschau",
	
);


$admin_maintenance = array(

	"1" => "Derzeit am laufen",
	"2" => "Letzte Version",
	"3" => "SMS Guthaben",	
	"4" => "&Uuml;briggebliebenes Guthaben",	
	"5" => "Guthaben bestellen",	

);

$admin_admin = array(

	"1" => "Admin hinzuf&uuml;gen",
	"2" => "Benutzername",
	"3" => "Passwort",	
	"4" => "Email",
	
	"5" => "Admin Einstellungen bearbeiten",	
	"6" => "Ganzer Name",			
	"7" => "Zugangsberechtigung",	
		"8" => "Ganzer Systemzugang",	
		"9" => "Nur Mitglieds Zugang",	
		"10" => "Nur Design Zugang",	
		"11" => "Nur Email Zugang",
		"12" => "Nur Abrechnungs Zugang",	
		"13" => "Nur Einstellungen Zugang",		
		"14" => "Nur Verwaltungs Zugang",
	"15" => "Admin Icon",

	"17" => "Email Signal",
	"18" => "Admin News Signal",
	"19" => "Verschiebe alle Mitglieder",
	"20" => "an das folgende paket",	
	"21" => "Paket bearbeiten",		
	"22" => "Paket Zugang",
	"23" => "Artikel zum Paket hinzuf&uuml;gen",	
	"24" => "Paket Zugang verwalten",
);

$admin_settings = array(

	"1" => "Seiten darstellen",
	"2" => "aktiviert",
	"3" => "deaktieviert",	
	"4" => "Web Pfade",
	"5" => "Server Pfade",	
	"6" => "Vorschaubilder Pfade",			
	"7" => "Feld hinzuf&uuml;gen",	
	"8" => "Name",	
	"9" => "Wert",	
	"10" => "Typ",	
	"11" => "Felder verwalten",
	"12" => "Gateway hinzuf&uuml;gen",	
	"13" => "Zahlungs-System",		
	"14" => "Gateway Zahlungs Code",
	"15" => "&Uuml;berschrift",
	"16" => "Paket Zugang",
	"17" => "Kommentare",
	"18" => "Mitglieder verschieben",
	"19" => "Mitglieder verschieben von",
	"20" => "folgendem Paket",	
	"21" => "Paket bearbeiten",		
	"22" => "Paket Zugang",
	"23" => "Paket Artikel hinzuf&uuml;gen",	
	"24" => "Paket Zugang verwalten",
);

$admin_billing = array(

	"1" => "Paket hinzuf&uuml;gen",
	"2" => "Paket Zugang verwalten",
	"3" => "Mitglieder Pakete verschieben",			
	"4" => "Deine Webseite l&auml;uft momentan im <b>FREIEN MODUS</b> deswegen sind momentan alle Pakete deaktiviert.",
	"5" => "M&ouml;chtest Du den freien modus abschalten damit die Pakete angezeigt werden?",	
	"6" => "FREIER MODUS DEAKTIVIEREN",		
	"7" => "Feld hinzuf&uuml;gen",	
	"8" => "Name",	
	"9" => "Wert",	
	"10" => "Typ",	
	"11" => "Felder verwalten",
	"12" => "Gateway hinzuf&uuml;gen",	
	"13" => "Zahlungs System",		
	"14" => "Gateway Zahlungs Code",
	"15" => "&Uuml;berschrift",
	"16" => "Paket Zugang",
	"17" => "Kommentare",
	"18" => "Mitglieder verschieben",
	"19" => "Alle Mitglieder verschieben von",
	"20" => "an das folgende Paket",	
	"21" => "Paket bearbeiten",		
	"22" => "Paket Zugang",
	"23" => "Paket Artikel hinzuf&uuml;gen",	
	"24" => "Pakete Zugang verwalten",
	
	"25" => "noch nicht genehmigt",
	"26" => "Genehmigte Zahlungen",
	"27" => "Abgelehnte Zahlungen",
	
	"28" => "Ganzer Verlauf",
	"29" => "Aktive Bezahlungen",
	"30" => "Beendete Zahlungen",
	"31" => "Aktive Abonnements",
	"32" => "Beendete Abonnements",
	"33" => "Paket Zugang Code",
	
);

$admin_email = array(

	"1" => "System Emails",
	"2" => "Newsletter",
	"3" => "Email Vorlagen",		
	"4" => "Email Editor",
	"5" => "Betreff",	
	"6" => "Email Vorschau",	
	"7" => "An Email",
	
	"8" => "Senden an",	
		"9" => "Alle Mitglieder",	
		"10" => "Mitglieder die Pakete abonnieren",	
		"11" => "Aktive / Abgelehnte / noch nicht genehmigte Benutzer",
	"12" => "An Paket",	
	"13" => "Mitglieds Status",		
	"14" => "Newsletter ausw&auml;hlen",	
	
	"15" => "Neu erstellen",
	"16" => "Anschauen",
	"17" => "Email Tracking Code",
	"18" => "Neu erstellen",
	"19" => "Anschauen",
	"20" => "Email Tracking Code",
		"21" => "HTML Code unterhalb",
		
	"22" => "Email Tracking Results",
	"23" => "Es gibt momentan keine R&uuml;ckmeldung.",
	"24" => "R&uuml;ckmeldung w&auml;hlen",
	
	"25" => "Sende Erinnerung an alle Mitglieder die zwischen",
	"26" => "und",
	"27" => "Tagen",
	"28" => "Tage &uuml;brig Ihres Abonnements",
	"29" => "W&auml;hle Email zum senden:",
	"30" => "Runterladen",
	"31" => "Paket w&auml;hlen",
	"32" => "Tracking Code",
	
	
);

$admin_design = array(

	"1" => "Vorlagen runterladen",
	"2" => "Momentane Vorlage",
	"3" => "Diese Vorlage benutzen",	
	"4" => "Seiten Meta Tags",
	"5" => "Seiten &Uuml;berschrift",	
	"6" => "Beschreibung",
	"7" => "Keyw&ouml;rter",
	"8" => "Webseiten",	
	"9" => "Seiteninhalt",	
	"10" => "individuelle Seite",	
	"11" => "Seite erstellen",
	"12" => "FTP Pfad",	
	"13" => "Themen Datei",		
	"14" => "Seiteninhalt",	
	"15" => "individuelle Seite",


	"16" => "Sprache hinzuf&uuml;gen",
	"17" => "Neuer Datei Name",	
	"18" => "Datei w&auml;hlen zum kopieren",
			
	"19" => "Sprachdatei bearbeiten",	
	"20" => "Individuelle Seiten",

	"21" => "Zeichen",
	"22" => "Zeichengr&ouml;&szlig;e",	
	"23" => "Zeichenfarbe",
	"24" => "Breite",	
	"25" => "H&ouml;he",		
	"26" => "Logotext hinzuf&uuml;gen",
	"27" => "Hintergrund",	
		"28" => "leeren  Hintergrund verwenden",
		"29" => "Momentanes Design behalten",	
		"30" => "Eigenen Hintergrund / Logo hochladen",	

	"31" => "Neue Seite erstellen",
	"32" => "Neuer Seiten Name",	
		"33" => "Seiten Namen sollten nur aus einem Namen bestehen und kurz sein. z.b.. Links, Artikel, News, Forum etc",
	"34" => "Menu Tab hinzuf&uuml;gen?",	
		"35" => "Nein! keinen erstellen",		
		"36" => "Ja. Zum Mitgliederbereich hinzuf&uuml;gen.",
		"37" => "Ja. Zur Haupt Webseite hinzuf&uuml;gen, nicht zu den Seiten im Mitgliederbereich.",
			"38" => "Falls ausgew&auml;hlt wird ein neuer Tab erstellt.",
);

$admin_overview = array(

	"1" => "Ank&uuml;ndigungen",
	"2" => "Alle Mitglieder",
	"3" => "Diese Woche",
	"3a" => "Heute",
	"4" => "Momentane Webseitenaktivit&auml;t",
	"5" => "Webseiten R&uuml;ckmeldungen",
	
	"6" => "Einmalige Besucher der letzten zwei Wochen",
	"7" => "Neue Anmeldungen in den letzten zwei Wochen",
	"8" => "Geschlechter Verteilung",	
	"9" => "Statistik des Alters",
	
	"10" => "Neue Partner Anmeldungen in den letzten 2 Wochen",
	"11" => "Besucher Karten Einstellung",
	"12" => "Bitte f&uuml;ge Deinen Google API Schl&uuml;ssel in das Feld oberhalb ein.",	
	"13" => "Du kannst einen Lizens Schl&uuml;ssel im Kundenbereich von unserer Webseite beziehen",	
	
	"14" => "Gefilterte Such Resultate",	
	"15" => "Alle Dateien",
	
);
$admin_members = array(

	"1" => "Alle Mitglieder",
	"2" => "Modertoren",
	"3" => "Aktiv",
	"4" => "Abgelehnte",
	"5" => "Noch nicht genehmigt",
	"6" => "Die k&uuml;ndigen m&ouml;chten",
	"7" => "Jetzt Online",
	"8" => "Mitglieder Anmeldungen Aktivit&auml;t",	
	"9" => "Mitgliederdetails bearbeiten",	
	"10" => "Partner hinzuf&uuml;gen",
	"11" => "Partner Banner",
	"12" => "Partner Seiten",	
	"13" => "Partner hinzuf&uuml;gen",	
	"14" => "Partner Einstellungen",	
	"15" => "Alle Dateine",
	"16" => "Fotos",
	"17" => "Videos",
	"18" => "Musik",
	"19" => "YouTube",
	"20" => "Noch nicht genehmigt",
	"21" => "Hervorgehoben",
	"22" => "Datei hochladen",	
	"23" => "Datei",
	"24" => "Typ",
	"25" => "Benutzername",
	"26" => "Titel",
	"27" => "Kommentare",
	"28" => "Als Haupt kennzeichnen",		
	"29" => "Mitglieder Anmeldungs Statistik",	
	"30" => "Partner eingeschrieben durch",
	"31" => "Hervorgehoben",
	"a5" => "Benutzername",
	"a6" => "Passwort",
	"a7" => "Vorname",
	"a8" => "Nachname",
	"a9" => "Firma",
	"a10" => "Addresse",
	"a11" => "Stra&szlig;e",
	"a12" => "Stadt",
	"a13" => "Bundesland",
	"a14" => "PLZ",
	"a15" => "Land",
	"a16" => "Telefon",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Webseiten addresse",
	"a20" => "Zahlbar an",
);


// HELP FILES
$admin_help = array(

	"a" => "Fange jetzt an",
	"b" => "Nein! Danke",
	"c" => "Fortsetzen",	
	"d" => "Fenster schlie&szlig;en",
	
	
	"1" => "Einf&uuml;hrung",
	"2" => "Brauchst Du Hilfe um anzufangen?",
	"3" => "Hallo",	
	
	"4" => "und willkommen im A>dministrationsbereich! Weil Du das erste mal hier im Administrations Bereich eingeloggt bist, schlagen wir Dir vor Dir ein paar Minuten Zeit f&uuml;r den Wizard zu nehmen der Dir am Anfang behilflich sein wird.",
	"5" => "Unser Wizard wird Dir helfen und Dir die Basic Einstellungen erkl&auml;ren.",	
	"6" => "<strong>(Beachte)</strong> Du kannst diese Seite immer wieder besuchen in dem Du einfach den 'schnelle Hilfe' Button links im Men&uuml; anklickst",
	
	"7" => "Fange an",
	"8" => "Willkommen im Administrationsbereich!",	
	"9" => "Willkommen in dem Administrationsbereich f&uuml;r",	
	"10" => "Die Software erlaubt Dir komplette Einstellungen f&uuml;r alle Bereich Deiner Webseite vorzunehmen wie z.b Dateien, Sicherheit,Email, Plugins und vieles mehr",	
	"11" => "Der Wizard hilft Dir zu starten und zeigt Dir Dir die ersten Schritte und Einstellungen vorzunehmen um schnellst m&ouml;glich Traffic ( Mitglieder) auf Deine Webseite zu bringen.",
	"12" => "<strong>(Beachte)</strong> Du kannst jederzeit diese Fenster schlie&szlig;en und sp&auml;ter in diesen Dialog kommen indem Du einfach den 'Schnell Hilfe' Button links in der Men&uuml;leiste anklickst.",
		
	"13" => "Einf&uuml;hrung in Deinen Administrationsbereich!",		
	"14" => "Die Software und der Administrations Bereich arbeitet Webbasierend und erm&ouml;glicht Dir Deine Seite von &uuml;berall aus online zu erreichen . Steuer Deinen Browser an mit:",	
	"15" => "und melde Dich an mit Deinen Adminlogin Details.",
	"16" => "Klicke hier um den Link abzuspeichern.",
	
	"17" => "Einf&uuml;hrung in den &Uuml;berblick Bereich.",	
	"18" => "Der &Uuml;berblick Bereich gibt Dir einen schnellen &Uuml;berblick &uuml;ber die Webseiten T&auml;tigkeit. Du erh&auml;lst Informationen &uuml;ber Software Updates, Statistiken Deiner Mitglieder und z.b. Statistiken &uuml;ber Deine Partner Zug&auml;nge.",			
	"19" => "Alle Mitglieder Informationen sind in Deiner MySQL Datenbank gespeichert:",	
	"20" => "Einf&uuml;hrung in die Webseitenstatistik.",
	"21" => "Die Softwarestatistiken geben Dir einen visuellen &Uuml;berblick &uuml;ber die T&auml;tigkeit Deiner Mitglieder der letzten 2 Wochen. Jedesmal wenn ein neues Mitglied oder Partner dazu kommt wird dieser Vorgang gespeichert und in der Grafik dargestellt.",
	
	"22" => "Einf&uuml;hrung Besucher Herkunft",		
	"23" => "Einf&uuml;hrung Besucher verwalten",	
	"24" => "Einf&uuml;hrung Partner verwalten",	
	"25" => "Einf&uuml;hrung Geblockte Mitglieder verwalten",		
	"26" => "Einf&uuml;hrung Mitglieder Dateien verwalten",
	"27" => "Einf&uuml;hrung Mitglieder importieren",	
	"28" => "Einf&uuml;hrung Webseiten Vorlagen",
	"29" => "Einf&uuml;hrung Vorlagen Editor",	
	"30" => "Einf&uuml;hrung in Vorlagen Bilder-Manager",
	"31" => "Einf&uuml;hrung Logo Editor",
	"32" => "Einf&uuml;hrung Meta Tags",	
	"33" => "Einf&uuml;hrung Sprachen",
	"34" => "Einf&uuml;hrung Emails",	
	"35" => "Einf&uuml;hrung Email-Vorlagen",		
	"36" => "Einf&uuml;hrung Email-R&uuml;ckmeldungen",
	"37" => "Einf&uuml;hrung Emails senden",
	"38" => "Einf&uuml;hrung Erinnerungsemail",
	"39" => "Einf&uuml;hrung Emailadressen runterladen",
	"40" => "Einf&uuml;hrung Mitgliedschaft Pakete",
	"41" => "Einf&uuml;hrung Bezahlung Gateways",
	"42" => "Einf&uuml;hrung Abrechnungsverlauf",
	"43" => "Einf&uuml;hrung Partner Abrechnungsverlauf",
	"44" => "Einf&uuml;hrung Darstellungs Optionen",
	"45" => "Einf&uuml;hrung Darstellungs Einstellungen",
	"46" => "Einf&uuml;hrung System Pfade",
	"47" => "Einf&uuml;hrung Wasserzeichen",
	"48" => "Einf&uuml;hrung Suchfelder",
	"50" => "Einf&uuml;hrung Veranstaltungs Kalender",
	"51" => "Einf&uuml;hrung Umfragen",
	"52" => "Einf&uuml;hrung Forum",
	"53" => "Einf&uuml;hrung Chatr&auml;ume",
	"54" => "Einf&uuml;hrung FAQ",
	"55" => "Einf&uuml;hrung Wortfilter",
	"56" => "Einf&uuml;hrung News / Artikel",
	"57" => "Einf&uuml;hrung Gruppen",

		"22a" => "Die Karte mit den Orten zeigt Dir von wo aus Deine Webseite aufgerufen wird. Jedesmal wenn ein Besucher Deine Webseite betritt, scannt die Software den Ort.",		
		"23a" => "Das Verwaltungstool erlaubt Dir alle Mitglieder zu sehen die auf Deiner Seite registriert sind. Mit der Suchfunktion kannst Du Mitglieder filtern um sie danach zu bearbeiten, aktualisieren oder wenn es sein muss auch l&ouml;schen.",	
		"24a" => "Mit dem Verwaltungstool f&uuml;r Deine Partner hast Du einen &Uuml;berblick wer mit Dir zusammen arbeitet. Du kannst Deine Partner bearbeiten, aktualisieren und neue Einschreibungen best&auml;tigen.",	
		"25a" => "Der gesperrte Mitglieder Bereich zeichnet alle Versuche von Mitgliedern oder Besuchern auf, die versuchen Deine Webseite zu hacken. Die Software erkennt gesperrte Mitglieder und IP-Adressen und verbietet den Zutritt auf Deine Webseite.",		
		"26a" => "Das Datei Tool erlaubt Dir alle Musik, Video und Foto Dateien Deiner Mitglieder zu verwalten. Durch anklicken kannst Du Dir die Datei anschauen und sie bearbeiten. Mit dem eingebauten Cropping Werkzeug, kannst Du Fotos nach Deinen W&uuml;nschen beschneiden.",
		"27a" => "Mit dem Import Tool kannst Du Mitglieder von anderen Software Anwendungen importieren. Du gibst einfach nur die Datenbank Informationen der Webseite an wo das System gespeichert ist, und alle Mitglieder dieser Seite werden auf Deine neue Webseite importiert.",	
		"28a" => "Im Webseiten Vorlagen Bereich kannst Du das Design Deiner Seite umgehend &auml;ndern! Klicke einfach auf die gew&uuml;nschte Vorlagen und Deine Seite wird automatisch aktualisiert.",
		"29a" => "Mit dem Vorlagen Editor Tool kannst Du Deine Webseiten direkt vom Adminbereich aus bearbeiten. Du kannst nat&uuml;rlich auch den Code durch kopieren und einf&uuml;gen in Deinem eigenen Editor bearbeiten, und dann den neuen Code zur&uuml;ck kopieren wenn Du fertig bist.",	
		"30a" => "Mit dem Bild Verwaltungtool Deiner Vorlage kannst Du bestehende Bilder durch hochladen neuer ab&auml;ndern. Die neuen Bilder ersetzen die bestehenden und werden umgehend auf Deiner Webseite dargestellt.",
		"31a" => "Mit dem Logo Editor Tool kannst Du das Design vom Logo &auml;ndern. Vielleicht m&ouml;chtest Du ein eigenes Logo das Du erstellt hast benutzen. Durch anklicken von 'eigenes Logo hochladen' kannst Du dieses dann Deiner Webseite hinzuf&uuml;gen.",
		"32a" => "Mit dem Meta Tag Feature kannst Du alle Metatags bearbeiten die von der Software generiert worden sind. Du kannst Deinen eigenen Titel, Schl&uuml;sselw&ouml;rter und Beschreibungen f&uuml;r jede Deiner Seiten hinzuf&uuml;gen und bearbeiten.",
		"33a" => "Das Sprach Verwaltungstool kannst Du benutzen um z.b. Sprachen zu l&ouml;schen die Du nicht auf Deiner Webseite anbieten m&ouml;chtest. Du kannst mit dem Tool auch Dein eigenes Sprachpaket hochladen.",
		"34a" => "Mit dem Emailmanager kannst Du Deine eigenen System und Newsletter Emails erstellen. Dadurch kannst Du Deine Webseite pers&ouml;nlicher gestalten.",	
		"35a" => "Einf&uuml;hrung Email Vorlagen",		
		"36a" => "Einf&uuml;hrung Email R&uuml;ckmeldungen",
		"37a" => "Einf&uuml;hrung Newsletter versenden",
		"38a" => "Einf&uuml;hrung Erinnerungsemail",
		"39a" => "Einf&uuml;hrung Emailadressen runterladen",
		"40a" => "Einf&uuml;hrung Mitgliedschafts Pakete",
		"41a" => "Einf&uuml;hrung Zahlungsmodule",
		"42a" => "Einf&uuml;hrung Mitgliedschafts Abrechnungsverlauf",
		"43a" => "Einf&uuml;hrung Partner Abrechnungsverlauf",
		"44a" => "Einf&uuml;hrung Darstellungs Optionen",
		"45a" => "Einf&uuml;hrung Darstellungs Einstellungen",
		"46a" => "Einf&uuml;hrung System Pfade",
		"47a" => "Einf&uuml;hrung Wasserzeichen",
		"48a" => "Einf&uuml;hrung Suchfelder",
		"50a" => "Einf&uuml;hrung Event Kalender",
		"51a" => "Einf&uuml;hrung Umfragen",
		"52a" => "Einf&uuml;hrung Forum",
		"53a" => "Einf&uuml;hrung Chatr&auml;ume",
		"54a" => "Einf&uuml;hrung FAQ",
		"55a" => "Einf&uuml;hrung Wort Filter",
		"56a" => "Einf&uuml;hrung News/Artikel",
		"57a" => "Einf&uuml;hrung Gruppen",
);

$admin_login = array(

	"1" => "Admin Bereich Login",
	"2" => "Passwort vergessen? Kein Problem, gebe einfach Deine Emailadresse an und wir werden Dir ein neues zu schicken.",
	"3" => "Email Adresse.",
	"4" => "Text unterhalb",
	"5" => "Passwort zur&uuml;ck setzen",
	"6" => "Angaben unterhalb eingeben um einzuloggen.",
	"7" => "Benutzername",
	"8" => "Passwort",	
	"9" => "Lizens",	
	"10" => "Sprache",
	"11" => "Login",
	"12" => "Deine IP ist",	
	"13" => "Passwort vergessen",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Top Profil",
	"2" => "Webseiten Moderator",
	"3" => "Mitgliedschafts Paket",
	"4" => "Upgrade Email senden",
	"5" => "Paket zum Abrechnungssystem hinzuf&uuml;gen ",
	"6" => "SMS Nummer",
	"7" => "SMS Guthaben",
	"8" => "Konto Status ab&auml;ndern",	
	
	"9" => "Box anklicken um Passwort zu &auml;ndern.",	
	"10" => "Hervorgehobene Mitglieder haben einen anderen Hintergrund in den Suchresultaten.",
	"11" => "Dies gibt dem Mitglied Zutritt Deine Webseite als Moderator zu verwalten.",
	
	"12" => "Partner Willkommen큦 Seite",	
	"13" => "Banner Code Darstellung",	
	"14" => "Partner Abrechnungen",	
	"15" => "Partner &Uuml;berblick",
	"16" => "Partner Kontoverwaltung",
	
	"17" => "Mitglieder importieren von",	
	
	"18" => "Alter",			
	"19" => "Datei angesehen",	
	"20" => "Privat",
	"21" => "&Ouml;ffentlich",
	
	"22" => "Album",		
	"23" => "FSK18",	
	"24" => "Inhalt &ouml;ffentlich",	
	
	"25" => "Gr&ouml;&szlig;e",		
	"26" => "Dateien zum FSK18 Album senden",
	"27" => "FSK18 Dateien",

);

$admin_selection = array(

	"1" => "Ja",
	"2" => "Nein",
	
	"3" => "An",
	"4" => "Aus",
);

$admin_plugins = array(

	"1" => "Plugins erweitern die Funktionalit&auml;t der Emeeting Software. Wenn ein Plugin installiert ist, kannst Du es aktivieren oder deaktivieren.",
	"2" => "Du kannst Dir neue Plugins in unserem Kundenbereich anschauen und runterladen.",
	"3" => "Plugin Name",
	"4" => "Plugin Details",
	"5" => "Zuletzt aktualisiert",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Sch&ouml;n das Du wieder da bist!",
	"2" => "Hier ist ein kleiner &Uuml;berblick &uuml;ber neue Mitglieder Einschreibungen und Aktivit&auml;ten von heute.",
	"3" => "Neue Mitglieder heute",
	"4" => "Dateien noch zu genehmigen",
	"5" => "<strong>Beachte</strong> Falls Du diesen Willkommens Hinweis in Zukunft nicht mehr erhalten m&ouml;chtest, kannst Du diesen in den Admin Einstellungen ab&auml;ndern.",
	"6" => "Fenster schlie&szlig;en",

);
$admin_pop_chmod = array(

	"1" => "Datei Zugriffs Fehler",
	"2" => "Die Datei kannt nicht ge&auml;ndert werden",
	"3" => "die folgenden Dateien/Ordner m&uuml;ssen beschreibar sein bevor du sie bearbeiten kannst. Wenn Deine Webseite auf einem Linux oder Unix Server l&auml;uft kannst Du ein FTP Programm benutzen und mit der 'CHMOD' ('Change Mode') Funktion den Zugriff &auml;ndern. Wenn Dein Hoster Windows benutzt musst Du Ihn kontaktieren, damit er die Zugriffsberechtigung f&uuml;r die Ordner/Dateien f&uuml;r Dich ab&auml;ndert.",
	"4" => "Die Dateien/Ordner die CHMOD 777  ben&ouml;tigen lauten",
	"5" => "Fenster schlie&szlig;en",

);
$admin_pop_demo = array(

	"1" => "Demo Modus aktiviert",
	"2" => "Ver&auml;nderungen am System werdem im Demo Modus nicht gespeichert.",
	"3" => "Das System ist auf Demo Modus umgeschaltet. Dies bedeutet das viele Funktionen und Features im Adminbereich nicht sichtbar und nur zur Ansicht gedacht sind.",
	"4" => "Du kannst Dich ganz normal im Admin Bereich umschauen. Was immer Du auch machst, Ver&auml;nderungen werden in dieser Zeit nicht vom System gespeichert.",
	"5" => "<strong>Beachte</strong> Falls Du Dir den normalen Modus anschauen m&ouml;chtest kontaktiere bitte den System Administrator f&uuml;r mehr Informationen.",
	"6" => "Fenster schlie&szlig;en",
);

$admin_pop_import = array(

	"1" => "Datenbank Transfer Ergebnis",
	"2" => "Mitglieder sind erfolgreich importiert!",
	"3" => "Mitglieder sind erfolgreich iportiert worden vom",
	"4" => "system. Bitte beachte den folgenden Hinweis um sicher zu sein das die Bilder korrekt aktualisiert worden sind.",
	"5" => "Der eMeeting Bilder Ordner Pfad steht unterhalb, Du musst die Bilder von der alten Webseite in den neuen Ordner kopieren;",
	"6" => "Fenster schlie&szlig;en",
);

$admin_loading= array(

	"1" => "Tabellen werden optimiert",
	"2" => "Bitte warten,..",

);
$admin_menu_help= array(
"1" => "Schnell Hilfe",
);

$admin_settings_extra = array(

	"1" => "Such Seite anzeigen",
	"2" => "Kontakt Seite anzeigen",
	"3" => "Tour Seite anzeigen",
	"4" => "FAQ Seite anzeigen",
	"5" => "Events anzeigen",
	"6" => "Gruppen anzeigen",
	"7" => "Forum anzeigen",
	"8" => "Matches anzeigen",	
	"9" => "Network anzeigen",	
	"10" => "Partner-System anzeigen",
	"11" => "SMS/Text Nachricht Hinweis System anzeigen",
	
	"12" => "Blogs anzeigen",	
	"13" => "Chat-R&auml;ume anzeigen",	
	"14" => "Instant Messenger anzeigen",	
	"15" => "Verifizierungs-Bild bei Registrierung ",
	"16" => "UK PLZ bei Suche anzeigen",
	"17" => "US PLZ bei Suche anzeigen",
	"18" => "MSN/Yahoo Integration anzeigen",
	
	"19" => "Normales Mitgliedschafts Paket",
		"20" => "Dies ist das normale Paket wenn neue Mitglieder sich registrieren",
	"21" => "Mitglieder m&uuml;ssen Bild hochladen um dabei zu sein",
		"22" => "Einstellen um Mitgliedern zu erm&ouml;glichen den Vorgang des Bild hochladen beim registrieren zu umgehen.",	
	"23" => "FREIER MODUS",
		"24" => "Stelle dies auf 'Ja' ein um allen Mitgliedern alle Features Deiner Webseite zur Verf&uuml;gung zu stellen.",
	"25" => "WARTUNGSARBEITEN MODUS",
		"26" => "Dies wird allen Besuchern und Mitgliedern den Zutritt der Webseite verbieten. Nur Admins die &uuml;ber den Admin Bereich angemeldet sind k&ouml;nnen die Webseite erreichen.",
		
	"27" => "Anzahl der Suchresultate pro Seite",
		"28" => "W&auml;hle die Anzahl der Profile die auf einer Seite dargestellt werden sollen.",		
	"29" => "Anzahl der Matchresultate pro Seite",	
		"30" => "W&auml;hle die Anzahl der Profile die auf einer Seite dargestellt werden sollen.",
		
	"31" => "Email Aktivierungs Code",
		"32" => "Mitglieder bekommen einen Code zugeschickt den sie aktivieren m&uuml;ssen bevor sie sich anmelden k&ouml;nnen.",
	"33" => "Manualles genehmigen der Mitglieder",
	"34" => "Stelle dies auf 'Ja' oder 'Nein' ein ob neue Mitglieder von Dir manuell freigeschaltet werden sollen oder nicht.",
	"35" => "Manualles genehmigen der Dateien",
		"36" => "Stelle dies auf 'Ja' oder 'Nein' ein ob neue Dateien von Deinen Mitgliedern von Dir manuell freigeschlatet werden sollen oder nicht.",
	"37" => "Manualles genehmigen von Videoaufzeichnungen",
		"38" => "Stelle dies auf 'Ja' oder 'Nein' ein ob Videoaufzeichnungen von Dir manuell freigeschaltet werden sollen oder nicht.",
		
	"39" => "Video Gr&uuml;&szlig;e darstellen",
	"40" => "Dies erm&ouml;glicht Mitgliedern Ihren eigenen Videogru&szlig; f&uuml;r das Profil zu erstellen. Du musst unterhalb Deinen flash video RMS connection string eintragen.",
	"41" => "Flash RMS Connection String",
		"42" => "Du ben&ouml;tigst ein Flash Hosting Konto um dies benutzen zu k&ouml;nnen.",
	"43" => "Datums Format",
		"44" => "W&auml;hle ein Format wie Du das Datum auf Deiner Seite darstellen m&ouml;chtest.",
	"45" => "Profil/Datei Kommentare erlauben",
		"46" => "Aktiviere dies um Mitgliedern zu erlauben, Kommentare f&uuml;r Profile und Dateien abzugeben.",
	"47" => "Chat und IM im seberatem Fenster anzeigen",
	
	"48" => "Aktiviere dies wenn Du m&ouml;chtest das Chatr&auml;ume und der IM in einem neuen Fenster aufgepopt werden soll.",
	
	"49" => "Suchmachinenfreundlich?",
		"50" => "Aktiviere dies wenn Du Deine Seite auf einem Linux oder Unix Server liegt und Du die Haupt .htaccess Datei benutzt.",
	"51" => "Blanke Fotos suchen?",
		"52" => "M&ouml;chtest Du Mitglieder ohne Fotos im Profil in Suchresultaten darstellen?.",
	"53" => "Flaggen Bilder darstellen",
		"54" => "Stelle dies auf 'JA' oder 'Nein' ein um die Flaggen der Sprachen auf der Webseite anzuzeigen.",
	"55" => "Partner W&auml;hrung",	
	"56" => "HTML Editor benutzen",	
	"57" => "Stelle dies auf 'Ja' oder 'Nein' ein wenn Du Dateien manuell freischalten m&ouml;chtest oder nicht.",

	"58" => "Artikel darstellen",

);

$admin_billing_extra = array(

	"1" => "Stelle dies auf 'Ja' ein wenn Du m&ouml;chtest das alle Features der Webseite alle Mitglieder benutzen k&ouml;nnen.",
	
	"2" => "Paket Typ",
	"3" => "Mitgliedschafts Paket",
	"4" => "SMS Paket",
	"5" => "W&auml;hle ja wenn Du ein SMS Paket erstellen m&ouml;chtest das den Bezug von Paketen auf Deiner Webseite nur durch SMS Guthaben erlaubt.",
	"6" => "Paket Name",
		"7" => "Trage einen Namen f&uuml;r dieses Paket ein. Dieser wird auf der Mitgliedsbeitrag Seite angezeigt.",
	"8" => "Beschreibung",	
	"9" => "Preis",	
	"10" => "Wieviel soll das Paket f&uuml;r Deine Mitglieder kosten? Beachte, trage bitte keine W&auml;hungszeichen ein.",
	"11" => "W&auml;hrungscode anzeigen",
	
	"12" => "Dies ist der W&auml;hrungscode der auf Deiner Webseite angezeigt wird, dieser wird nicht benutzt f&uuml;r Bezahlungen. Um diesen zu &auml;ndern gehe bitte in die Einstellungen f&uuml;r Bezahlungen.",	
	"13" => "Abonnement",	
	"14" => "W&auml;hle ja um die Bezahlung auf wiederkehrend zu setzen.",	
	"15" => "Upgrade Periode",
	
	"16" => "Tag",
	"17" => "Woche",
	"18" => "Monat",
		"18a" => "Unbefristet",
	"19" => "Max Nachrichten (t&auml;glich)",
		"20" => "Dies ist das Maximum an Nachrichten welches ein Mitglied am tag senden kann.",
	"21" => "Max Winks",
		"22" => "Dies ist das Maximum an Winks welches ein Mitglied t&auml;glich senden kann.",	
	"23" => "Max Datei uploads",
		"24" => "Die maximale Anzahl an Dateien welches ein Mitglied hochladen kann.",
	"25" => "Paket Icon Link",
		"26" => "Der Paket Icon Link muss auf ein Bild Deiner Webseite verweisen. Empfohlene Gr&ouml;&szlig;e: 28px x 90px.",
		
	"27" => "Hervorgehobene Mitglieder",
		"28" => "W&auml;hle ja um die Fotos der Mitglieder auch auf der Frontseite der Webseite anzuzeigen.",		
	"29" => "Highlighted",	
		"30" => "W&auml;hle ja um die Profile der Mitglieder in diesem Paket in Suchresultaten mit einem anderem Hintergrund darzustellen.",
		
	"31" => "FSK18 Bilder anschauen",
		"32" => "W&auml;hle ja um den Mitgliedern in diesem Paket zu erlauben FSK18 Bilder anzuschauen.",
	"33" => "SMS Guthaben",
	"34" => "Das ist die Anzahl vom SMS Guthaben das dem Konto hinzugef&uuml;gt wird wenn ein Mitglied dieses Paket bezieht. Bestehendes Guthaben wird hinzugef&uuml;gt.",
	"35" => "Sichtbar auf dem Upgrade-Paket"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Trage nur einen Link ein wenn Du auf eine externe Webseite verweisen m&ouml;chtest.",
	"3" => "RSS News feed Daten",
	
	"4" => "Kategorie",
	"5" => "betrachtet",
	"6" => "Text",
	"7" => "Sprache",
	"8" => "Private Gruppe",
		
	"9" => "Forum Board &auml;ndern",	
	"10" => "Forum Board &auml;ndern",
	"11" => "Haupt Forum",
	
	"12" => "Du benutzt momentan ein externes forum. Bitte melde Dich in den Adminbereich von diesem Forum ein.",	
	"13" => "Passwort"
);

$admin_set_extra1 = array(

	"1" => "Foto hochladen erlauben",
	"2" => "Video hochladen erlauben",
	"3" => "Musik hochladen erlauben",	
	"4" => "YouTube erlauben",	
);

$admin_alerts = array(

	"1" => "Hinweise",
	"2" => "neue Besucher",
	"3" => "neue Mitglieder",	
	"4" => "noch nicht genehmigte Mitglieder",	
	"5" => "noch nicht genehmigte Dateien",
	"6" => "neue Upgrades",	
);

$lang_members_nn = array(

	"0" => "Mitglieder Beleidigungen anzeigen",
	"1" => "Benutzername oder ID",
	"2" => "Kein Verlauf gefunden",	
);

$members_opts = array(

	"1" => "Profil bearbeiten",
	"2" => "Hochgeladene Dateien",
	"3" => "Abrechnungsverlauf",	
	"4" => "Email senden",	
	"5" => "Nachricht senden",
	"6" => "Forum Eintr&auml;ge",
	"7" => "Nachricht eines Missbrauch",	
);
?>