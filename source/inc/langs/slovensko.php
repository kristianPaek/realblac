<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Slovensko",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "iso-8859-1",
	"title" => "Administratorjev kot"
		
);

$admin_layout = array(

	"3" => "Moje nastavitve",
	"4" => "Odjava",

);


$admin_layout_page1 = array(

	"" => "Plošèa",

		"_*" => "Administratorjeva plošèa",
		"_?" => "",

	"members" => "Statistike èlanov",
		
		"members_*" => "Statistike èlanov",
		"members_?" => "Spodnji graf prikazuje vpise èlanov preteklih dveh tednov.",
		"members_^" => "pod",

	"affiliate" => "Statistike partnerjev",
 
		"affiliate_*" => "Statistike partnerjev",
		"affiliate_?" => "Spodnji graf prikazuje vpise novih partnerjev v zadnjih dveh tednih.",
		"affiliate_^" => "pod",

	"visitor" => "Statistike obiskovalcev",
 
		"visitor_*" => "Statistike obiskovalcev",
		"visitor_?" => "Spodnji graf prikazuje statistike dnevnih obiskov v zadnjih dveh tednih.",
		"visitor_^" => "pod",

	"maps" => "Google Maps",
 
		"maps_*" => "Lokacije obiskovalcev z Google Maps",
		"maps_?" => "Ta izbira prikazuje, s katerega dela sveta se vpisujejo èlani. To ti dovoli izvedbo bolj natanènih marketinških kampanj.",
 

	"adminmsg" => "Obvestila spletne strani",
 
		"adminmsg_*" => "Obvestilo spletne strani",
		"adminmsg_?" => "Vnesi sporoèilo v spodnji okvir in vsakiè, ko se èlan prijavi v svoj raèun, bo videl obvestilo. To je odlièen naèin za stalno obvešèanje o novostih.",

);
 

$admin_layout_page2 = array(

	"" => "Èlani",

		"_$" => "pol",
		"_*" => "Uredi Èlane",
 

			"edit" => "Uredi podatke èlanov",
	
				"edit_*" => "Uredi Èlana",
				"edit_?" => "Uporabi spodnje možnosti za posodobitev profila èlana.",
				"edit_^" => "niè",


			"fake" => "Lažni Èlani",
	 
				"fake_*" => "Ustvari lažne èlane",
				"fake_?" => "Uporabi spodnje možnosti, da ustvariš lažne èlane. Tako bo spletna stran na zaèetku delovala zasedeno.",
				"fake_^" => "pod",

	"banned" => "Izgnani Èlani",
 
		"banned_*" => "Izgnani Èlani",
		"banned_?" => "Program ima vgrajen sistem za zaznavanje hekerskih vdorov. Spodaj so podatki o poskusih s strani èlanov in ne-èlanov.",
		"banned_^" => "pod",

	"monitor" => "Nadzor Èlanov",
 
		"monitor_*" => "Nadzor Èlanov",
		"monitor_?" => "Od èasa do èasa èlani pošiljajo nezaželena ali opolzka sporoèila drugim èlanom. Ta nadzor ti omogoèa obdržati spletno stran varno za tvoje èlane.",
		"monitor_^" => "pod",

	"import" => "Uvozi Èlane",
 
		"import_*" => "Uvozi Èlane iz baze podatkov ali CSV datoteke",
		"import_?" => "Uporabi spodnje možnosti za uvoz èlanov iz drugih platform ali CSV datoteke.",
		"import_^" => "pod",
		
	"files" => "Èlanske mape", 
	"files_*" => "Èlanske album mape",


	"addfile" => "Naloži Fotko",			 
	"addfile_*" => "Naloži fotko",
	"addfile_?" => "Vèasih ima èlan težav.",
	"addfile_^" => "sub",
			 
 
	"affiliate" => "Partnerji",
 
		"affiliate_*" => "Partnerji",
		"affiliate_?" => "Uporabi spodnje možnosti za urejanje partnerjev.",
		 
			"addaff" => "Dodaj novega partnerja",
	 
				"addaff_*" => "Dodaj/Uredi raèun partnerja",
				"addaff_?" => "Izpolni vsa polja za dodajanje /urejanje partnerskega raèuna.",
				"addaff_^" => "pod",

			"affsettings" => "Partnerske strani",
 
				"affsettings_*" => "Dizajn partnerskih strani",
				"affsettings_?" => "Uporabi spodnje možnosti za urejanje izgleda partnerskih strani.",
				"affsettings_^" => "pod",

			"affcom" => "Partnerske provizije",
	 
				"affcom_*" => "Partnerska provozija",
				"affcom_?" => "Tukaj lahko nastaviš provizijo za partnerje. To pomeni, da vsak zaslužek, pridobljen s strani partnerja, beleži njegovo provizijo.",
				"affcom_^" => "pod",


			"affban" => "Partnerski bannerji",
	 
				"affban_*" => "Partnerski bannerji",
				"affban_?" => "Tukaj lahko nastaviš bannerje, ki se bodo prikazali na partnerskih straneh.",
				"affban_^" => "pod",

);


$admin_layout_page3 = array(

 

		"" => "Tema spletne strani",
 
			"_*" => "Tema spletne strani",
			"_?" => "Na spodnjem seznamu sp vse template, ki jih lahko uporabiš za svojo spletno stran.",
			 
				
			"color" => "Barvne opcije",
		 
				"color_*" => "Barvne opcije",
				"color_?" => "Uporabi spodnje možnosti, da nastaviš barvne opcije za spletno stran. Lahko zamenjaš tudi slike.",
				"color_^" => "pod",
				
			"logo" => "Logo",
				"logo_$" => "pol",
				"logo_*" => "Logo",
				"logo_?" => "Uporabi spodnje možnosti za nastavitve logotipa. Lahko uporabiš že narejene logotipe ali naložiš svojega.",
				"logo_^" => "pod",
				
			"img" => "Slike spletne strani",
				"img_$" => "pol",
				"img_*" => "Slike spletne strani",
				"img_?" => "Spodnje slike so shranjene v mapi slik. Lahko jih zamenjaš s svojimi.",
				"img_^" => "pod",

			"text" => "Naslovni text",
				"text_$" => "pol",
				"text_*" => "Naslovni text",
				"text_?" => "Spodnja polja ti dovoljujejo zamenjati naslovni text na spletni strani. Razliène teme imajo razliène texte, zato malce experimentiraj.",
				"text_^" => "pod",


			"terms" => "Pogoji spletne strani",
				"terms_$" => "pol",
				"terms_*" => "Pogoji spletne strani",
				"terms_?" => "Uredi spodnje polje. Ti pogoji se prikažejo ob registraciji èlana.",
				"terms_^" => "pod",
	
			"edit" => "Strani in Datoteke",
 
			"edit_*" => "Strani",
			"edit_?" => "Izberi s spodnjega seznama stran, ki jo hoèeš urediti. Uporabiš lahko tudi Dreamweaverja. <b>Bodi previden pri urejanju, saj se ne da veè popraviti nazaj.</a>",
				
	
	
				"newpage" => "Ustvari stran",
				"newpage_$" => "pol",
				"newpage_*" => "Ustvari novo stran",
				"newpage_?" => "Ustvarjanje nove strani je preprosto. Klikni na gumb, napiši naslov in že je pripravljeno.",
				"newpage_^" => "pol",
							
				
			"meta" => "Meta oznake",
				"meta_$" => "pol",
				"meta_*" => "Urejanje meta oznak",
				"meta_?" => "eMeeting ima poseben sistem za urejanje Meta oznak. Na vsako stran bo avtomatièno dodal naslov, opis in kljuène besede, ki si jih nastavil/a tukaj.",
				"meta_^" => "pod",

 

		
			"menu" => "Menu polja",
				"menu_$" => "pol",
				"menu_*" => "Urejanje polj Menu-ja",
				"menu_?" => "Uporabi spodnje možnosti za urejanje polj menujev. Lahko dodaš tudi zunanje povezave.",
				"menu_^" => "pod",

	"manager" => "Manager datotek",
		"manager_$" => "pol",
		"manager_*" => "Manager datotek",
		"manager_?" => "Ta Manager je zelo uporaben za pregled vseh datotek, ki jih imaš na gostiteljskem raèunu. Lahko jih tudi izbrišeš.",

			"slider" => "Rotacijske slike",
				"slider_$" => "pol",
				"slider_*" => "Rotacijske slike naslovnice",
				"slider_?" => "Rotacijske slike se pojavijo na naslovnici. Uporabi možnosti, da zamenjaš slike, povezave in ostalo.",
				"slider_^" => "pod",

	"languages" => "Jeziki",
		"languages_$" => "pol",
		"languages_*" => "Jeziki",
		"languages_?" => "Spodaj so vsi jeziki, ki jih lahko uporabljaš na spletni strani ali izbrišeš. <b>Moraš se odjaviti kot administrator, da vidiš spremembe.</b>",

			"editlanguage" => "Uredi Jezik",
				"editlanguage_$" => "pol",
				"editlanguage_*" => "Uredi Jezik",
				"editlanguage_?" => "Bodi previden ko urejaš jezik. Spremeni le vsebino za pušèico (=>). Prva vrednost se uporablja kot kljuè.",
				"editlanguage_^" => "pod",

			"addlanguage" => "Dodaj Jezik",
				"addlanguage_$" => "pol",
				"addlanguage_*" => "Dodaj Jezik",
				"addlanguage_?" => "Ustvarjanje novega jezika bo prekopiralo obstojeèi jezik, katerega potem lahko odpreš in urediš.",
				"addlanguage_^" => "pod",



);


$admin_layout_page4 = array(

	"" => "Email in e-zini",

		"_$" => "pol",
		"_*" => "Email ain e-zini",
		"_?" => "Spodaj so vsi emaili, ki jih sistem uporablja ob registraciji ali izgubljenem geslu. Lahko ih urediš, kot želiš.",

			"add" => "Ustvari nov Email",
				"add_$" => "pol",
				"add_*" => "Dodaj/Uredi Email",
				"add_?" => "Izpolni spodnja polja da urediš Email. Kasneje se lahko vrneš in pošlješ komur želiš.",
				"add_^" => "pod",

	"welcome" => "Pozdravni Email/ SMS",
		"welcome_$" => "pol",
		"welcome_*" => "Sestavi Pozdravni Email/ SMS",
		"welcome_?" => "Uporabi spodnje možnosti za sestavo pozdravnega Emaila/SMS-ja.",
		"welcome_^" => "pod",

	"template" => "Email Template",
		"template_$" => "pol",
		"template_*" => "Email Template",
		"template_?" => "Spodaj so vse template email-ov. Odpri in uredi jih kakor želiš.",
		"template_^" => "pod",

	"export" => "Download Email-e",

		"export_$" => "pol",
		"export_*" => "Download Email-e",
		"export_?" => "Uporabi spodnje možnosti da download-aš email naslove iz baze.",
		"export_^" => "pod",

	"sendnew" => "Pošlji e-zine",

		"sendnew_$" => "pol",
		"sendnew_*" => "Pošlji e-zin",
		"sendnew_?" => "Uporabi izbiro za pošiljanje e-zinov èlanom. Najprej oznaèi èlane in e-zin.",

	"send" => "Pošlji en Email",

		"send_$" => "pol",
		"send_*" => "Pošlji en Email",
		"send_?" => "Uporabi to možnost za pošiljanje enega email-a. Pošiljatelj je isti kot tvoj administratorski e-mail.",
		"send_^" => "pod",

	"subs" => "Email Opomini",

		"subs_$" => "pol",
		"subs_*" => "Email Opomini",
		"subs_?" => "Email Opomini ti omogoèajo obvešèanje èlanov o podaljšanju njihovega èlanstva in podobno.",
		"subs_^" => "pod",
		
	"tc" => "Email Poroèila",
		"tc_$" => "pol",
		"tc_*" => "Email Poroèila",
		"tc_?" => "Email Poroèila vsebujejo sledilno kodo, katera ti pove koliko èlanov je odprlo ali dobilo sporoèilo.",
		"tc_^" => "sub",

			"tracking" => "Email sledilna koda",
				"tracking_$" => "pol",
				"tracking_*" => "Email sledilna koda",
				"tracking_?" => "Sledilna koda spodaj (tracking_id) je zamenjana s sliko, katera beleži odprtje email-ov, èe je ogled slik dovoljen s strani prejemnika.",
				"tracking_^" => "pod",



	"SMSsend" => "Pošlji SMS sporoèila",

		"SMSsend_$" => "pol",
		"SMSsend_*" => "Pošlji SMS sporoèila",
		"SMSsend_?" => "Uporabi spodnje možnosti za pošiljanje SMS/text sporoèil svojim èlanom.",
);

$admin_layout_page5 = array(

	"" => "Stopnje èlanstva",

		"_$" => "pol",
		"_*" => "Stopnje èlanstva",
		"_?" => "Spodaj so vsi èlanski paketi na spletni strani. Zelena polja ti omogoèajo veèjo kontrolo nad èlani in obiskovalci.",

			"epackage" => "Dodaj paket",
				"epackage_$" => "pol",
				"epackage_*" => "Dodaj/Uredi paket",
				"epackage_?" => "Uporabi spodnja polja, da dodaš/urediš pakete èlanstva.",
				"epackage_^" => "pod",

			"packaccess" => "Uredi dostop",
				"packaccess_$" => "poln",
				"packaccess_*" => "Uredi dostop",
				"packaccess_?" => "Tukaj lahko doloèiš dostop do tvojih vsebin glede na paket èlanstva. <b>Pozor: Oznaèi le tista polja, za katera ne želiš dovoliti dostopa. </b>",
				"packaccess_^" => "pod",

			"upall" => "Prenesi Èlane",
				"upall_$" => "pol",
				"upall_*" => "Prenesi Èlane med paketi",
				"upall_?" => "Uporabi spodnje možnosti da preneseš èlane med paketi.",
				"upall_^" => "pod",


	"gateway" => "Plaèilni prehodi",

		"gateway_$" => "pol",
		"gateway_*" => "Plaèilni prehodi",
		"gateway_?" => "Plaèilni prehodi ti omogoèajo prejemanje plaèil za èlanstvo. Èe vodiš zastonj spletno stran, jih lahko tudi izkljuèiš.",


			"addgateway" => "Dodaj plaèilni prehod",
				"addgateway_$" => "pol",
				"addgateway_*" => "Dodaj plaèilni prehod",
				"addgateway_?" => "Program ima celo vrsto že vgrajenih plaèilnih prehodov, lahko pa dodaš tudi novega.",
				"addgateway_^" => "pod",


	"billing" => "Plaèilni Sistem",

		"billing_$" => "pol",
		"billing_*" => "Plaèilni sistem",	


		"affbilling" => "Zgodovina plaèil partnerjem",
	
			"affbilling_$" => "pol",
			"affbilling_*" => "Zgodovina plaèil partnerjem", 
			"affbilling_^" => "pod",


);

$admin_layout_page6 = array(

	"" => "Bannerji in oglaševanje",

		"_$" => "pol",
		"_*" => "Bannerji in oglaševanje",
 

			"addbanner" => "Dodaj Banner",
				"addbanner_$" => "pol",
				"addbanner_*" => "Dodaj Banner",
				"addbanner_?" => "Uporabi spodnje možnosti da dodaš nov banner na spletno stran.",
				"addbanner_^" => "pod",


);

$admin_layout_page7 = array(

	"" => "Nastavitve Prikaza",

		"_$" => "pol",
		"_*" => "Nastavitve Prikaza",
		"_?" => "Uporabi spodnje možnosti za vklop/izklop prikazov aplikacij na spletni strani.",


	"op" => "Opcije Prikaza",

		"op_$" => "pol",
		"op_*" => "Opcije Prikaza",
		"op_?" => "Uporabi spodnje možnosti za nastavitve prikaza spletne strani, kot ti odgovarja.",
	
		"op1" => "Nastavitve Iskanja",
	
			"op1_$" => "pol",
			"op1_*" => "Nastavitve Iskanja",
			"op1_?" => "Uporabi spodnje možnosti za nastavitve prikaza iskanih strani na spletni strani.",
			"op1_^" => "pod",
	
		"op2" => "Nastavitve èlanstva",
	
			"op2_$" => "pol",
			"op2_*" => "Nastavitve èlanstva",
			"op2_?" => "Uporabi spodnje možnosti za nastavitve èlanstva.",
			"op2_^" => "pod",

		"op3" => "Flash Server nastavitve",
	
			"op3_$" => "pol",
			"op3_*" => "Flash Server nastavitve",
			"op3_?" => "Flash server se uporablja za shranjevanje video pozdravov èlanov, kot tudi v Chatu ter IM.",
			"op3_^" => "pod",

		"op4" => "API Nastavitve",
	
			"op4_$" => "pol",
			"op4_*" => "API Nastavitve", 
			"op4_^" => "pod",

		"thumbnails" => "Standardne slike",
	
			"thumbnails_$" => "pol",
			"thumbnails_*" => "Standardne slike", 
			"thumbnails_^" => "Spodaj so prikazane slike, ki se uporabljajo, kadar èlani ne naložijo svojih slik.",

	"email" => "Email nastavitve",

		"email_$" => "pol",
		"email_*" => "Email nastavitve",
		"email_?" => "Spodaj so prikazani vsi dogodki na spletni strani. Izberi dogodek in sistem bo poslal email obvestilo vsem èlanom, kot tudi administratorjem.",

	"paths" => "Poti Datotek in Map",

		"paths_$" => "pol",
		"paths_*" => "Poti Datotek in Map",
		"paths_?" => "Poti Datotek in Map vsebujejo vse datoteke na tvojem gostiteljskem raèunu. Program jih bo samodejno nastavil med instalacijo, ampak jih lahko zamenjša ali spremeniš po želji.",

	"watermark" => "Slikovni žig",

		"watermark_$" => "pol",
		"watermark_*" => "Slikovni žig",
		"watermark_?" => "Slikovni žig se prikazuje na slikah èlanov kot zašèita slik. Lahko je v formatu PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Polja spletne strani",

		"_$" => "pol",
		"_*" => "Profil, registracija in iskalna polja",
		"_?" => "Spodaj so vsa polja na spletni strani. Ta vsebujejo registracijske, iskalne in celo ujemalne strani. Lahko hitro dodaš nova polja z možnostmi spodaj.",

		"addfields" => "Ustvari novo polje",
	
			"addfields_$" => "pol",
			"addfields_*" => "Ustvari novo polje",
			"addfields_?" => "Uporabi spodnje možnosti za dodajanje novih polj. Ta obièajno služijo èlanom, da izpolnijo svoje podatke.",
			"addfields_^" => "pod",

		"fieldgroups" => "Uredi skupine",
	
			"fieldgroups_$" => "pol",
			"fieldgroups_*" => "Uredi skupine",
			"fieldgroups_?" => "Skupine so zbirka polj z isto temo. Tako lahko na primer ustvariš skupino 'O meni', katera vsebuje polja 'Moji hobiji', in tako dalje. <b>Èe izbrišeš skupino, ki vsebuje polja, bodo le-ta prenešena v naslednjo skupino.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Ustvari novo skupino",
	
			"addgroups_$" => "pol",
			"addgroups_*" => "Ustvari novo skupino",
			"addgroups_?" => "Skupina je skupina polj, ki so združena pod isto skupinsko temo. To ti omogoèa, da ustvariš veliko skupin pod isto temo.",
			"addgroups_^" => "pod",




	"cal" => "Koledar dogodkov",

		"cal_$" => "pol",
		"cal_*" => "Koledar dogodkov",
		"cal_?" => "Koledar dogodkov služi za prikaz dogodkov, ki jih objavijo èlani. Uporabi spodnje možnosti za dodajanje ali urejanje dogodkov.",

		"caladd" => "Dodaj dogodek",
	
			"caladd_$" => "pol",
			"caladd_*" => "Dodaj/Uredi dogodek",
			"caladd_?" => "Izpolni spodnja polja za dodajo/urejanje dogodka.",
			"caladd_^" => "pod",

		"caladdtype" => "Uredi tipe dogodkov",
	
			"caladdtype_$" => "pol",
			"caladdtype_*" => "Uredi tipe dogodkov",
			"caladdtype_?" => "Uporabi spodnje možnosti za urejanje tipa dogodkov. Dodaja slike bo dala tvoji spletni strani bolj profesionalen izgled.",
			"caladdtype_^" => "pod",

		"importcal" => "Uvozi dogodke",
	
			"importcal_$" => "pol",
			"importcal_*" => "Išèi in Uvozi dogodke",
			"importcal_?" => "Program ima vgrajen api sistem za iskanje in uvoz dogodkov iz svetovne baze dogodkov.",
			"importcal_^" => "pod",


	"poll" => "Anketa spletne strani",

		"poll_$" => "pol",
		"poll_*" => "Anketa spletne strani",
		"poll_?" => "Uporabi spodnje možnosti za dodajo in urejanje anket",

		"polladd" => "Dodaj anketo",
	
			"polladd_$" => "pol",
			"polladd_*" => "Ustvari novo anketo",
			"polladd_?" => "Izpolni spodnja polja za dodajo nove ankete na spletno stran.",
			"polladd_^" => "pod",



	"forum" => "Forum",

		"forum_$" => "pol",
		"forum_*" => "Forum kategorije",
		"forum_?" => "Uporabi spodnje možnosti za dodajo in urejanje kategorij foruma. Priporoèamo dodajo ikon za bolj profesionalen izgled spletne strani.",

		"forumadd" => "Dodaj Forum kategorijo",
	
			"forumadd_$" => "pol",
			"forumadd_*" => "Dodaj Forum kategorijo",
			"forumadd_?" => "Izpolni spodnja polja za dodajo nove kategorije.",
			"forumadd_^" => "pod",

		"forumchange" => "Forum tretje stranke",
	
			"forumchange_$" => "pol",
			"forumchange_*" => "Uredi integracijo foruma",
			"forumchange_?" => "Program ima vgrajeno opcijo za spreminjanje forum ponudnika. Prosimo preberi navodila za uporabo te opcije.",
			"forumchange_^" => "pod",

		"forumpost" => "Uredi komentarje",
	
			"forumpost_$" => "pol",
			"forumpost_*" => "Uredi komentarje foruma",
			"forumpost_?" => "Spodaj so prikazani vsi komentarji na forumu od tvojih èlanov. Uporabi spodnje možnosti za urejanje ali brisanje neprimernih komentarjev.",
			"forumpost_^" => "pod",

	"chatrooms" => "Chat soba",

		"chatrooms_$" => "pol",
		"chatrooms_*" => "Chat soba",
		"chatrooms_?" => "Uporabi spodnje možnosti za dodajanje ali urejanje Chat sob.",


	"faq" => "FAQ",

		"faq_$" => "pol",
		"faq_*" => "FAQ",
		"faq_?" => "FAQ/Pogosta vprašanja so odlièen naèin za pomoè tvojim èlanom pri og.",

		"faqadd" => "Add FAQ",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Add/Edit FAQ",
			"faqadd_?" => "Izpolni spodnja polja za dodajo in urejanje FAQ.",
			"faqadd_^" => "pod",

	"words" => "Filter besed",

		"words_$" => "pol",
		"words_*" => "Filter besed",
		"words_?" => "Filter besed se nanaša na èlanske profile, IM in forum. Vse neprimerne besede bo zamenjal z zvezdicami (**).",



	"articles" => "Èlanki",

		"articles_$" => "pol",
		"articles_*" => "Èlanki",
		"articles_?" => "Èlanki so odlièno sredstvo za obvešèanje tvojih èlanov o novostih in spremembah spletne strani.",


		"articleadd" => "Dodaj èlanek",
	
			"articleadd_$" => "pol",
			"articleadd_*" => "Dodaj nov èlanek",
			"articleadd_?" => "Izpolni polja za dodajo novega èlanka.",
			"articleadd_^" => "pod",

		"articlerss" => "Uvozi RSS èlanke",
	
			"articlerss_$" => "pol",
			"articlerss_*" => "Uvozi RSS èlanke",
			"articlerss_?" => "RSS povezave služijo za uvoz èlankov v kategorije, ki si jih ustvaril. Na primer, ustvariš lahko kategorijo 'Novice' ter uvoziš èlanke iz spletnega portala z novicami. Program bo izlušèil vse RSS èlanke ter jih vstavil v tvojo kategorijo.",
			"articlerss_^" => "pod",

		"articlecats" => "Kategorije èlankov",
	
			"articlecats_$" => "pol",
			"articlecats_*" => "Kategorije èlankov",
			"articlecats_?" => "Uporabi spodnje možnosti za dodajo kategorij èlankov.",
			"articlecats_^" => "pod",


	"groups" => "Skupine",

		"groups_$" => "pol",
		"groups_*" => "Skupine",
		"groups_?" => "Uporabi spodnje možnosti za urejanje in dodajanje skupin.",


	"class" => "Mali oglasi",

		"class_$" => "pol",
		"class_*" => "Mali oglasi",
		"class_?" => "Spodaj so vsi Mali oglasi tvojih èlanov.",


		"addclass" => "Dodaj Mali oglas",
	
			"addclass_$" => "pol",
			"addclass_*" => "Dodaj/Uredi oglas",
			"addclass_?" => "Uporabi spodnje možnosti za dodajo/urejanje oglasov.",
			"addclass_^" => "pod",

		"addclasscat" => "Uredi kategorije",
	
			"addclasscat_$" => "pol",
			"addclasscat_*" => "Uredi kategorije",
			"addclasscat_?" => "Uporabi spodnje možnosti za urejanje kategorij Malih oglasov. Priporoèamo, da dodaš sliko ali ikono za bolj profesionalen izgled.",
			"addclasscat_^" => "pod",

	"games" => "Igre",

		"games_$" => "pol",
		"games_*" => "Igre",
		"games_?" => "Spodaj so vse igre na tvoji spletni strani. Preberi navodila za instalacijo novih iger.",

	"gamesinstall" => "Instaliraj igro",

		"gamesinstall_$" => "pol",
		"gamesinstall_*" => "Instaliraj igro",
		"gamesinstall_?" => "Izberi igre ki jih hoèeš instalirati. Igre se shranijo v mapo: inc/exe/Games/tar/. <b>Poglej dokumentacijo za instalacijo iger</b>",
		"gamesinstall_^" => "pod",


);


$admin_layout_page9 = array(

	"" => "Administratorji",

		"_$" => "pol",
		"_*" => "Administratorji in moderatorji",
		"_?" => "Spodaj so vsi administratorji in moderatorji. Moderatorje dodajaš tako, da na iskalni strani oznaèiš polje moderator, poler profila.",

	"pref" => "Nastavitve administratorja",

		"pref_$" => "pol",
		"pref_*" => "Nastavitve administratorja",
		"pref_?" => "Uporabi spodnje možnosti za nastavitve administratorja.",

	"manage" => "Uredi moderatorje",

		"manage_$" => "pol",
		"manage_*" => "Uredi moderatorje",
		"manage_?" => "Moderatorji so lahko v dveh vlogah; kot urejevalci glavne spletne strani ali kot administratorji z dostopom do administratorskih orodij.",

	"email" => "Emaili administratorja",

		"email_$" => "pol",
		"email_*" => "Emaili administratorja",
		"email_?" => "Spodaj so vsi emaili, poslani od èlanov administratorju.",

	"compose" => "Sestavi Email",

		"compose_$" => "pol",
		"compose_*" => "Sestavi Email",
		"compose_?" => "Uporabi spodnje možnosti za sestavo novega emaila in pošiljanje èlanom.",
		"compose_^" => "pod",

	"super" => "Prijava Super uporabnika",

		"super_$" => "pol",
		"super_*" => "Prijava Super uporabnika",
		"super_?" => "Bodi previden pri urejanju teh podatkov. Geslo mora biti skrito vsem ostalim uporabnikom.",
		"super_^" => "pod",
);

$admin_layout_page10 = array(

	"" => "Posodobitve programa",

		"_$" => "pol",
		"_*" => "Posodobitve programa",
		"_?" => "Spodaj je trenutna verzija programa, ki ga uporabljaš. Preveri sprotne posodobitve.",

	"backup" => "Backup baze",

		"backup_$" => "pol",
		"backup_*" => "Backup baze",
		"backup_?" => "Izberi tabele za urejanje baze. Priporoèljivo je uporabiti možnosti urejanja in backupa baze na tvojem gostiteljskem raèunu.",


	"license" => "Licenèni kljuèi",

		"license_$" => "pol",
		"license_*" => "Licenèni kljuèi",
		"license_?" => "Spodaj so licenèni kljuèi programa. Previdno z urejanjem.",

	"sms" => "SMS Krediti",

		"sms_$" => "pol",
		"sms_*" => "SMS Krediti",
		"sms_?" => "Spodaj so vsi SMS Krediti na tvojem raèunu.",

);

$admin_layout_page11 = array(

	"" => "Vtièniki",

		"_$" => "pol",
		"_*" => "Vtièniki",
		"_?" => "Vtièniki razširijo funkcionalnosti programa. Ko je vtiènik instaliran, ga lahko aktiviraš ali deaktiviraš.",

);


$admin_layout_nav = array(

	"1" => "Plošèa",
		"1a" => "Statistike èlanov",
		"1b" => "Statistike partnerjev",
		"1c" => "Statistike obiskovalcev",
		"1d" => "Lokacije obiskovalcev",
	"2" => "Members",
		"2a" => "Uredi èlane",
		"2b" => "Uredi partnerje",
		"2c" => "Izgnani èlani",
		"2d" => "Datoteke èlanov",
		"2e" => "Uvozi èlane",
	"3" => "Design",
		"3a" => "Teme",
		"3b" => "Urejevalnik tem",
		"3c" => "Urejanje slik tem",
		"3d" => "Logo urejanje",
		"3e" => "Meta Oznake",	
		"3f" => "Jeziki",
		"3g" => "Besede strani",
		"3h" => "File Manager",
		"3i" => "Menu tabele",
	"4" => "Email",
		"4a" => "Uredi Emaile",
		"4b" => "Email Template",
		"4c" => "Email Poroèila",
		"4d" => "Pošlji en Email",
		"4e" => "Email Opomini",	
		"4f" => "Download Emaile",
		"4g" => "Pošlji E-Zine",		
	"5" => "Billing",
		"5a" => "Uredi pakete",
		"5b" => "Plaèilni prehodi",
		"5c" => "Zgodovina plaèil",
		"5d" => "Zgodovina plaèil partnerjem",
	"6" => "Settings",
		"6a" => "Prikazne opcije",
		"6b" => "Prikazne nastavitve",
		"6c" => "Sistemske poti",
		"6d" => "Slikovni žig",
	"7" => "Content",
		"7a" => "Iskalna polja",
		"7b" => "Koledar dogodkov",
		"7c" => "Anketa",
		"7d" => "Forum",
		"7e" => "Chat sobe",	
		"7f" => "FAQ",
		"7g" => "Filter besed",
		"7h" => "Èlanki/novice",
		"7i" => "Skupine",
	"8" => "Promocije",	
		"8a" => "Bannerji",
	"9" => "Vtièniki",	
		"9a" => "",
	"10" => "Uredi Moderatorje",	
		"10a" => "Uredi Moderatorje",
		"10b" => "Super Uporabnik",
	"11" => "Vzdrževanje",
		"11a" => "Sistem Backup",
		"11b" => "Licenèni kljuèi",
		"11c" => "Sistem posodobitve",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Sistem posodobljen uspešno",
	"no_update" => "Sistem posodobljen ampak niè ni bilo za izbrisati!",
	"edit" => "Uredi",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Iskanje",
	"1" => "Oznaèi vse",
	"2" => "Odznaèi vse",
	"3" => "Odobri",
	"4" => "Preklièi",
	"5" => "Izbriši",	
	"6" => "Naredi zadnjega èlana",
	"7" => "Opcije",	
	"8" => "Posodobi",	
	"9" => "Naredi zadnje",
	"10" => "Odstrani zadnje",	
	"11" => "Posodobi standardni jezik",
	"12" => "Pošlji",
	"13" => "Nadaljuj",	
	"14" => "Naredi aktivnega",
	"15" => "Onemogoèi",
	"16" => "Posodobi naroèilo",
	"17" => "Posodobi polja strani",	
	"18" => "Omogoèi",
);

$admin_table_val = array(
	"1" => "Uporabniško ime",
	"2" => "Spol",
	"3" => "Zadnja prijava",
	"4" => "Status",
	"5" => "Paket",
	"6" => "Posodobljen",
	"7" => "Opcije",	
	"8" => "Datum",
	"9" => "IP Naslov",
	"10" => "Hack String",	
	"11" => "Datum vpisa",	
	"12" => "Ime",
	"13" => "Email",
	"14" => "Klikov",
	"15" => "Prijav",
			
	"15" => "Plaèano provizije",
		
	"16" => "Sporoèilo",
	"17" => "Èas",
	"18" => "Ime datoteke",
	"19" => "Zadnjiè posodobljeno",	
	"20" => "Uredi",
	"21" => "Standard",	
	"22" => "ID",

	"23" => "Cena",
	"24" => "Vidno",	
	"25" => "Tip",
	"26" => "Uredi dostop",	
	"27" => "Aktiven",

	"28" => "Poglej kodo",
	"29" => "Polja",	
	"30" => "Ime partnerja",
	"31" => "Za plaèati",	
	"32" => "Status",
	
	"33" => "Datum posodobitve",
	"34" => "Datum prenehanja",	
	"35" => "Naèin plaèila",
	"36" => "Še aktiven",	
	"37" => "Geslo",
	"38" => "Zadnja prijava",

	"39" => "Pozicija",
	"40" => "Zadetkov",	
	"41" => "Aktiven",
	"42" => "Predogled",	
	"43" => "Naslov",
	"44" => "Èlanki",
	"45" => "Naroèilo",

);

$admin_search_val = array(
	"1" => "Upor. ime èlana",
	"2" => "Vsi paketi",
	"3" => "Vsi spoli",
	"4" => "Na stran",
	"5" => "Naroèilo od",
	"6" => "Email Naslov",
	
	"7" => "Katerikoli Status",
	"8" => "Aktivni Èlani",
	"9" => "Preklicani Èlani",
	"10" => "Neodobreni Èlani",
	"11" => "Èlani želijo preklic",
	"12" => "Vse strani",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Uredi vse skupine",
	"2" => "Ime skupine",
	"3" => "Jezik",		
	"4" => "Uredi teme",
	"5" => "Uredi kategorije",	
	"6" => "Ime kategorije skupine",		
	"7" => "Uredi kategorije",	
	"8" => "Ime",	
	"9" => "Število",	
	"10" => "Dodaj èlanek",	
	"11" => "Kategorija",
	"12" => "Naslov strani",	
	"13" => "Kratek opis",		
	"14" => "Dodaj èlanek",
	"15" => "Uredi opis",
	"16" => "Seznam polj",
	"17" => "Vrsta",
	"18" => "Jezik",
	"19" => "Seznam vrednosti",
	"20" => "Novo polje",	
	
	"21" => "Naslov polja",		
	"22" => "Tip polja",
		"23" => "Polje Texta",	
		"24" => "Obmoèje Texta",	
		"25" => "Okvir Seznama",
		"26" => "En potrditveni okvir",
		"27" => "Veè potrditvenih okvirjev",
	
	"28" => "Naslovnica skupine",
	"29" => "Dodaj med registracijo",
	"30" => "Oznaèi spodaj",
	
	"31" => "Dodaj skupino",
	"32" => "Opcije prikaza skupine",
		"34" => "Prikaži vsem èlanom",
		"35" => "Prikaži le administratorjem",
		"36" => "Prikaži èlanom in administratorjem (ni na profilu)",
	"37" => "samo",	
	"38" => "Uredi skupine",	
	"39" => "Dodaj dogodke",	
	"40" => "Zajem polja",
	"41" => "Zajem",		
	"42" => "Opisni text",
	"43" => "Tip zajema",	
	"44" => "Zajem iskanja",		
	"45" => "Zajem profila",	
	"46" => "Ustvariti moraš en zajem profila, kot 'Jaz sem' ter drugi zajem, kot 'Jaz išèem'",	
	"47" => "Obstojeèi zajemi polja",	
	"48" => "Premakni polje v to skupino",		
	"49" => "ID Èlana",
	"50" => "Ime Dogodka",	
	"51" => "Opis Dogodka",		
	"52" => "Tip Dogodka",
	"53" => "Izberi kategorijo",	
	"54" => "Izberi tip",
	"55" => "Èas dogodka",
	"56" => "Pusti prazno za cel dan",
	"57" => "Datum Dogodka",
	"58" => "Mesec",	
	
	"59" => "Dan",	
	"60" => "Leto",
	"61" => "Država",		
	"62" => "Regija",
	"63" => "Ulica",	
	"64" => "Mesto",		
	"65" => "Telefon",	
	"66" => "Email",	
	"67" => "Spletna stran",	
	"68" => "Dogodek prikazan",		
		"69" => "Vsem",
		"70" => "Samo èlanom",	
		
	"71" => "Dodaj anketo",		
	"72" => "Rezultati ankete",
	"73" => "Ime ankete",	
	"74" => "Odgovor",	
	"75" => "Naredi aktivno",
	
	"76" => "Dodaj temo Foruma",
	"77" => "Uredi komentarje",
	"78" => "Tema Foruma",	
		
	"79" => "Naslov",	
	"80" => "Opis",
	"81" => "Forum komentarji",		
	"82" => "Vsi komentarji",
	"83" => "Danes",	
	"84" => "Ta teden",		
	"85" => "Prejšnji teden",	
	"86" => "Ime sobe",	
	"87" => "Obstojeèi zajemi polj",	
	"88" => "Geslo sobe",		
	"89" => "Dodaj novo",
	"90" => "Dodaj F.A.Q",
	
	"91" => "Dodaj cenzuro besed",		
	"92" => "Beseda",
	
	"93" => "Odobreno",
	"94" => "Zajem",
	"95" => "Zajem ujemanja",
	"96" => "Jezik",

	"97" => "Predogled",
	"98" => "Rezultati",
);
$admin_advertising = array(

	"1" => "Bannerji",
	"2" => "Dodaj Banner",
	"3" => "Partnerski Bannerji",	
	"4" => "Dodaj/Uredi Bannerje",
	"5" => "Tip Bannerja",	
	"6" => "Banner",			
	"7" => "Partnerski Banner",	
	"8" => "Ime",	
	"9" => "Naloži Banner",	
	"10" => "Vnesi HTML",	
	"11" => "HTML Koda",
	"12" => "Naloži Banner",	
	"13" => "Banner Povezava",		
	"14" => "Prikaži",
		"15" => "Vsem Èlanom",
		"16" => "Samo prijavljenim Èlanom",
	
	"17" => "Stran",
	"18" => "Aktivni",
	
	"19" => "Top Pozicija",
	"20" => "Sredinska Pozicija",	
	"21" => "Leva Pozicija",		
	"22" => "Spodnja Pozicija",
	"23" => "Leave prazno za uporabo povezavo v kodi bannerja",
	"24" => "Banner Predogled",
	
);


$admin_maintenance = array(

	"1" => "Trenutno delujoèe",
	"2" => "Zadnja Verzija",
	"3" => "SMS Krediti",	
	"4" => "Preostali SMS Krediti",	
	"5" => "Kupi Kredite",	

);

$admin_admin = array(

	"1" => "Dodaj Administratorja",
	"2" => "Upor. ime",
	"3" => "Geslo",	
	"4" => "Email",
	
	"5" => "Uredi nastavitve Administratorja",	
	"6" => "Polno Ime",			
	"7" => "Stopnja dostopa",	
		"8" => "Poln sistemski dostop",	
		"9" => "Samo èlanski dostop",	
		"10" => "Samo oblikovni dostop",	
		"11" => "Samo email dostop",
		"12" => "Samo plaèilni dostop",	
		"13" => "Samo dostop do nastavitev",		
		"14" => "Samo management dostop",
	"15" => "Admin Ikona",

	"17" => "Email Opozorila",
	"18" => "Admin opozorila novic",
	"19" => "Prenesi vse èlane iz",
	"20" => "v naslednji paket",	
	"21" => "Uredi paket",		
	"22" => "Dostop paketa",
	"23" => "Dodaj stvar paketu",	
	"24" => "Uredi dostop paketa",
);

$admin_settings = array(

	"1" => "Prikaži strani",
	"2" => "Omogoèeno",
	"3" => "Onemogoèi",	
	"4" => "Spletne poti",
	"5" => "Poti strežnika",	
	"6" => "Poti ikon",			
	"7" => "dodaj polje",	
	"8" => "Ime",	
	"9" => "Vrednost",	
	"10" => "Tip",	
	"11" => "Uredi polja",
	"12" => "Dodaj prehode",	
	"13" => "Plaèilni sistem",		
	"14" => "Koda plaèilnega prehoda",
	"15" => "Naslov",
	"16" => "Dostop paketa",
	"17" => "Komentarji",
	"18" => "Prenesi Èlane",
	"19" => "Prenesi vse èlane iz",
	"20" => "V naslednji paket",	
	"21" => "Uredi Paket",		
	"22" => "Dostop paketa",
	"23" => "Dodaj stvar paketu",	
	"24" => "Uredi dostop paketa",
);

$admin_billing = array(

	"1" => "Dodaj paket",
	"2" => "Uredi dostop paketa",
	"3" => "Prenesi dostop paketa",			
	"4" => "Tvoja spletna stran trenutno teèe v <b>ZASTONJ NAÈINU</b> zato so bili èlanski paketi onemogoèeni.",
	"5" => "Želiš onemogoèiti zastonj naèin ter omogoèiti èlanske pakete?",	
	"6" => "ONEMOGOÈI ZASTONJ NAÈIN",		
	"7" => "Dodaj polje",	
	"8" => "Ime",	
	"9" => "Vrednost",	
	"10" => "Tip",	
	"11" => "Uredi polja",
	"12" => "Dodaj prehode",	
	"13" => "Plaèilni sistem",		
	"14" => "Koda plaèilnega prehoda",
	"15" => "Naslov",
	"16" => "Dostop paketa",
	"17" => "Komentarji",
	"18" => "Prenesi èlane",
	"19" => "Prenesi vse èlane iz",
	"20" => "V naslednji paket",	
	"21" => "Uredi paket",		
	"22" => "Dostop paketa",
	"23" => "Dodaj stvar paketu",	
	"24" => "Uredi dostop paketa",
	
	"25" => "Èakanje na odobritev",
	"26" => "Odobrena plaèila",
	"27" => "Zavrnjena plaèila",
	
	"28" => "Vsa zgodovina",
	"29" => "Aktivna plaèila",
	"30" => "Zakljuèena plaèila",
	"31" => "Aktivne naroènine",
	"32" => "Zakljuèene naroènine",
	"33" => "Koda dostopa paketa",
	
);

$admin_email = array(

	"1" => "Emaili sistema",
	"2" => "E-Zini",
	"3" => "Email Template",		
	"4" => "Email Urejevalnik",
	"5" => "Predmet",	
	"6" => "Predogled Emaila",	
	"7" => "Do Emaila",
	
	"8" => "Pošlji ",	
		"9" => "Vsem Èlanom",	
		"10" => "Naroènikom Èlanskih paketov",	
		"11" => "Aktivnim / Preklicanim / Neodobrenim Èlanom",
	"12" => "Do paketa",	
	"13" => "Status Èlanstva",		
	"14" => "Izberi E-Zin",	
	
	"15" => "Ustvari novega",
	"16" => "Poglej narejene extra",
	"17" => "Email Sledilna koda",
	"18" => "Ustvari novo",
	"19" => "Poglej narejeno extra",
	"20" => "Email Sledilna koda",
		"21" => "HTML koda spodaj",
		
	"22" => "Email Rezultati sledenja",
	"23" => "Ni najdenih rezultatov.",
	"24" => "Izberi poroèilo",
	
	"25" => "Pošlji opomin vsem èlanom kateri imajo med",
	"26" => "in",
	"27" => "dnevi",
	"28" => "Dnevi preostalimi za nadgradnjo naroènine",
	"29" => "Izberi Emaile za pošiljanje:",
	"30" => "Download",
	"31" => "Izberi paket",
	"32" => "Sledilna koda",
	
	
);

$admin_design = array(

	"1" => "Download Teme",
	"2" => "Trenutna Templata",
	"3" => "Uporabi to Templato",	
	"4" => "Meta Oznake strani",
	"5" => "Naslov strani",	
	"6" => "Opis",
	"7" => "Kljuène besede",
	"8" => "Strani portala",	
	"9" => "Strani vsebin",	
	"10" => "Extra Strani",	
	"11" => "Ustvari stran",
	"12" => "FTP Pot",	
	"13" => "Datoteke teme",		
	"14" => "Strani vsebin",	
	"15" => "Extra strani",


	"16" => "Dodaj jezik",
	"17" => "Ime nove datoteke",	
	"18" => "Izberi datoteko za kopiranje",
			
	"19" => "Uredi jezik",	
	"20" => "Extra strani",

	"21" => "Font",
	"22" => "Velikost fontov",	
	"23" => "Barva fontov",
	"24" => "širina",	
	"25" => "višina",		
	"26" => "Dodaj Logo Text",
	"27" => "Canvas Tip",	
		"28" => "Uporabi prazen Canvas",
		"29" => "Obdrži trenuten Design",	
		"30" => "Naloži svoje ozadje / logo",	

	"31" => "Ustvari novo stran",
	"32" => "Ime nove strani",	
		"33" => "Ime strani naj bo kratko in le ena beseda. Na primer: Povezave, Forum, Èlanki, itd.",
	"34" => "Dodam Menu vnos?",	
		"35" => "Ne! Ne dodaj menu vnosa",		
		"36" => "Da. Dodaj ga èlanskem obmoèju",
		"37" => "Da. Dodaj ga na glavne strani, ne k èlanskem obmoèju.",
			"38" => "Èe izbrano, bo nov èlanski vnos dodan na tvojo stran",
);

$admin_overview = array(

	"1" => "Obvestilo",
	"2" => "Vsi èlani",
	"3" => "Ta teden",
	"3a" => "Danes",
	"4" => "Aktivnost spletne strani pred kratkim",
	"5" => "Poroèila spletne strani",
	
	"6" => "Unikatnih obiskovalcev v zadnjih dveh tednih",
	"7" => "Prijave novih èlanov v zadnjih dveh tednih",
	"8" => "Statistike spola èlanov",	
	"9" => "Statistike starosti èlanov",
	
	"10" => "Prijave novih partnerjev v zadnjih dveh tednih",
	"11" => "Nastavitve zemljevidov obiskovalcev",
	"12" => "Prosimo vnesi svoj Google API kljuè zgoraj.",	
	"13" => "Lahko kupiš licenèni kljuè na oddelku za stranke na spletni strani proizvajalca",	
	
	"14" => "Filtriraj iskalne rezultate",	
	"15" => "Vse datoteke",
	
);
$admin_members = array(

	"1" => "Vsi èlani",
	"2" => "Moderatorji",
	"3" => "Aktivni",
	"4" => "Preklicani",
	"5" => "Neodobreni",
	"6" => "Želijo preklic",
	"7" => "Online Zdaj",
	"8" => "Aktivnost vpisov",	
	"9" => "Uredi podatke èlana",	
	"10" => "Dodaj partnerja",
	"11" => "Partnerski Bannerji",
	"12" => "Partnerske strani",	
	"13" => "Dodaj partnerja",	
	"14" => "Nastavitve partnerja",	
	"15" => "Vse datoteke",
	"16" => "Fotke",
	"17" => "Video",
	"18" => "Glasba",
	"19" => "YouTube",
	"20" => "Neodobreno",
	"21" => "Zadnje",
	"22" => "Naloži datoteko",	
	"23" => "Datoteka",
	"24" => "Tip",
	"25" => "Upor. ime",
	"26" => "Naslov",
	"27" => "Komentarji",
	"28" => "Naredi standardno",		
	"29" => "Aktivnost vpisov èlanov",	
	"30" => "Partnerji prijavljeni od",
	"31" => "Zadnji",
	"a5" => "Upor. ime",
	"a6" => "Geslo",
	"a7" => "Ime",
	"a8" => "Priimek",
	"a9" => "Business Ime",
	"a10" => "Naslov",
	"a11" => "Ulica",
	"a12" => "Mesto",
	"a13" => "Regija",
	"a14" => "Zip/Poštna koda",
	"a15" => "Država",
	"a16" => "Telefon",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Spletna stran",
	"a20" => "Èek plaèljiv na",
);


// HELP FILES
$admin_help = array(

	"a" => "Zaèni zdaj",
	"b" => "Ne, hvala!",
	"c" => "Nadaljuj",	
	"d" => "Zapri okno",
	
	
	"1" => "Predstavitev",
	"2" => "Potrebuješ pomoè pri zaèetku?",
	"3" => "Živjo",	
	
	"4" => "in pozdravljen v administratorski kot! Ker je to prviè, priporoèamo da slediš èarovniku spodaj, ki ti bo pomagal pri prvih korakih!",
	"5" => "Naš èarovnik ti bo pomagal pri zaèetnih nastavitvah, tako da boš imel sestavljeno stran zelo kmalu.",	
	"6" => "<strong>(Pozor)</strong> Lahko uporabiš to opcijo kadarkoli tako, da klikneš na povezavo na levi strani menu-ja.",
	
	"7" => "Zaèetek",
	"8" => "Dobrodošel v administratorski kot!",	
	"9" => "Dobrodošel v tvoj administratorski kot za",	
	"10" => "Ta program ti omogoèa nadzor nad vsemi podroèji spletne strani, kot so èlani, datoteke, emaili, vtièniki in še veliko veè.",	
	"11" => "Ta èarovnik ti bo predstavil nekaj osnovnih konceptov o delovanju spletne strani, tako da boš lahko pripeljal èimveè obiskovalcev na svojo spletno stran.",
	"12" => "<strong>(Ne pozabi)</strong> Kadarkoli lahko zapreš to okno in znova zaèneš s klikom na 'Hitro pomoè' na levi strani menu-ja.",
		
	"13" => "Predstavitev administratorskega kota!",		
	"14" => "Ta administratorski kot je spletno dostopen, tako da lahko dostopaš do njega kjerkoli na svetu z uporabo brskalnika. Preprosto usmeri svoj brskalnik:",	
	"15" => "in se prijavi s svojimi podatki.",
	"16" => "Klikni tukaj za zaznamek.",
	
	"17" => "Predstavitev tvoje plošèe.",	
	"18" => "Programska plošèa ti da hiter pregled nad delovanjem tvoje strani, lahko prebereš obvestila, èlanske statistike, partnerske vpise, itd.",			
	"19" => "Vsi èlanski podatki so shranjeni v MySQL bazi, imenovani:",	
	"20" => "Predstavitev spletnih statistik.",
	"21" => "Programska statistika ti da podroben pregled nad vpisi èlanov in partnerjev za zadnja dva tedna. Vsakiè, ko se zgodi nov vpis, se podatki zabeležijo in prikažejo na grafu.",
	
	"22" => "Predstavitev lokacij obiskovalcev",		
	"23" => "Predstavitev urejanja èlanov",	
	"24" => "Predstavitev urejanja partnerjev",	
	"25" => "Predstavitev urejanja izgnanih èlanov",		
	"26" => "Predstavitev urejanja èlanskih datotek",
	"27" => "Predstavitev uvoza èlanov",	
	"28" => "Predstavitev urejanja tem",
	"29" => "Predstavitev urejevalnika tem",	
	"30" => "Predstavitev managerja slik teme",
	"31" => "Predstavitev urejevalnika logotipa",
	"32" => "Predstavitev Meta Oznak",	
	"33" => "Predstavitev jezikov",
	"34" => "Predstavitev urejanja Emailov",	
	"35" => "Predstavitev Email templat",		
	"36" => "Predstavitev to Email poroèil",
	"37" => "Predstavitev pošiljanja E-Zinov",
	"38" => "Predstavitev Email opominov",
	"39" => "Predstavitev Downloadanja Email naslovov",
	"40" => "Predstavitev èlanskih paketov",
	"41" => "Predstavitev plaèilnih prehodov",
	"42" => "Predstavitev zgodovine èlanskih plaèil",
	"43" => "Predstavitev zgodovine partnerskih plaèil",
	"44" => "Predstavitev opcij prikaza",
	"45" => "Predstavitev nastavitev prikaza",
	"46" => "Predstavitev poti sistema",
	"47" => "Predstavitev slikovnega žiga",
	"48" => "Predstavitev iskalnih polj",
	"50" => "Predstavitev Koledarja dogodkov",
	"51" => "Predstavitev anket",
	"52" => "Predstavitev Foruma",
	"53" => "Predstavitev Chat sob",
	"54" => "Predstavitev FAQ",
	"55" => "Predstavitev Filtra besed",
	"56" => "Predstavitev Novic/Èlankov",
	"57" => "Predstavitev Skupin",

		"22a" => "Lokacijski zemljevid ti omogoèa, da vidiš, s katere države ali regije se tvoji èlani vpisujejo.",		
		"23a" => "Orodje, ki ti omogoèa pregled nad prijavljenimi èlani. Uporabi iskalne opcije za urejanje èlanov.",	
		"24a" => "Urejevalnik partnerjev ti omogoèa pregled nad vpisanimi partnerji, njihovimi uspehi, zaslužki ter mnogo veè.",	
		"25a" => "Izgnani èlani je orodje, s katerim sistem izžene èlane, ki poskušajo vdreti na spletno stran ali ji škodovati.",		
		"26a" => "Èlanske datoteke je orodje, ki ti omogoèa pregled nad glasbo, videi in slikami tvojih èlanov ter njihovo urejanje.",
		"27a" => "Uvoz èlanov je orodje, ki ti omogoèa uvoz èlanov iz drugih baz podatkov - prenos opravi sistem samodejno, potem ko mu posreduješ podatke o bazi.",	
		"28a" => "Urejevalnik tem je orodje, ki ti omogoèa enostavno spreminjanje tem, le s klikom na gumb.",
		"29a" => "Uporabi urejevalnika teme za neposredno urejanje kode tvoje strani.",	
		"30a" => "Urejevalnik slik teme ti omogoèa spreminjanje ali urejanje obstojeèih slik tvoje teme.",
		"31a" => "Logo urejevalnik ti omogoèa urejanje logotipa, dodajanje obstojeèega ali tvojega lastnega logotipa.",
		"32a" => "Meta Oznake je orodje, ki ti omogoèa urejanje in dodajanje meta oznak na vse tvoje strani avtomatsko. ",	
		"33a" => "Urejevalnik jezikov ti omogoèa odstranjevanje, dodajanje ali urejanje jezikov spletne strani.",
		"34a" => "Email urejevalnik je orodje, ki ti omogoèa enostavno urejanje ali kreiranje unikatnih e-zinov ali email sporoèil za tvojo spletno stran.",	
		"35a" => "Predstavitev Email templat",		
		"36a" => "Predstavitev Email poroèil",
		"37a" => "Predstavitev pošiljanja e-zinov",
		"38a" => "Predstavitev Email opominov",
		"39a" => "Predstavitev Downloadanja Email naslovov",
		"40a" => "Predstavitev Èlanskih paketov",
		"41a" => "Predstavitev Plaèilnih prehodov",
		"42a" => "Predstavitev Zgodovine èlanskih plaèil",
		"43a" => "Predstavitev Zgodovine partnerskih plaèil",
		"44a" => "Predstavitev Opcij prikaza",
		"45a" => "Predstavitev Nastavitev prikaza",
		"46a" => "Predstavitev Sistemskih poti",
		"47a" => "Predstavitev Slikovnega žiga",
		"48a" => "Predstavitev Iskalnih polj",
		"50a" => "Predstavitev Koledarja dogodkov",
		"51a" => "Predstavitev Anket",
		"52a" => "Predstavitev Foruma",
		"53a" => "Predstavitev Chat sob",
		"54a" => "Predstavitev FAQ",
		"55a" => "Predstavitev Filtra besed",
		"56a" => "Predstavitev Novic/Èlankov",
		"57a" => "Predstavitev Skupin",
);

$admin_login = array(

	"1" => "Admin Prijava",
	"2" => "Pozabil svoje geslo? Niè hudega, vnesi svoj email naslov spodaj in poslali ti bomo novega.",
	"3" => "Email Naslov",
	"4" => "Text Spodaj",
	"5" => "Ponastavi Geslo",
	"6" => "Vnesi svoje informacije za prijavo.",
	"7" => "Upor. ime",
	"8" => "Geslo",	
	"9" => "Licenca",	
	"10" => "Jezik",
	"11" => "Prijava",
	"12" => "Tvoja IP je",	
	"13" => "Pozabljeno Geslo",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Osvetljeni Profil",
	"2" => "Moderator",
	"3" => "Paket Èlanstva",
	"4" => "Pošlji Email o nadgradnji",
	"5" => "Dodaj spremembo paketa v plaèilni sistem ",
	"6" => "SMS Številka",
	"7" => "SMS Krediti",
	"8" => "Nastavi Status raèuna na",	
	
	"9" => "Klikni okvir za urejanje gesla.",	
	"10" => "Osvetljeni èlani imajo drugaèno ozadje v profilu.",
	"11" => "To daje èlanu privilegije moderatorja.",
	
	"12" => "partnerska pozdravna stran",	
	"13" => "Stran z banner kodo",	
	"14" => "Stran s plaèili partnerjem",	
	"15" => "Stran s pregledom partnerskega raèuna",
	"16" => "Stran za urejanje partnerskega raèuna",
	
	"17" => "Uvozi èlane iz",	
	
	"18" => "Starost",			
	"19" => "Ogledov datoteke",	
	"20" => "Privat",
	"21" => "Javno",
	
	"22" => "album",		
	"23" => "Odrasla vsebina",	
	"24" => "Javna vsebina",	
	
	"25" => "Velikost",		
	"26" => "Premakni datoteke v albume za odrasle",
	"27" => "Odrasle datoteke",

);

$admin_selection = array(

	"1" => "Da",
	"2" => "Ne",
	
	"3" => "On",
	"4" => "Off",
);

$admin_plugins = array(

	"1" => "Vtièniki razširjajo zmogljivosti programa. Ko je vtiènik instaliran, ga lahko vklopiš ali izklopiš z možnostmi na levi strani menu-ja.",
	"2" => "Nove vtiènike lahko pregledaš in naložiš v tvojem oddelku za stranke na strani proizvajalca.",
	"3" => "Ime vtiènika",
	"4" => "Podatki o vtièniku",
	"5" => "Zadnjiè posodobljeno",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Pozdravljen nazaj",
	"2" => "Spodaj je hiter pregled vpisov èlanov in delovanju spletne strani za danes.",
	"3" => "Novi èlani danes",
	"4" => "Datoteke za odobritev",
	"5" => "<strong>Ne pozabi</strong> Èe ne želiš sprejemati teh opozoril, jih lahko izkljuèiš v tvojih nastavitvah.",
	"6" => "Zapri Okno",

);
$admin_pop_chmod = array(

	"1" => "Napaka pri dovoljenjih datotek",
	"2" => "Datoteke na tej strani se ne morejo modificirati",
	"3" => "naslednje datoteke morajo imeti 'write' dovoljenja. Èe vodiš spletno stran na Unix ali Linux gostitelju, lahko uporabiš FTP program in spremeniš CHMOD (sprememba dovoljenj) za pisanje. Èe je tvoj gostitelj na Windows sistemu, ga moraš kontaktirati glede teh nastavitev.",
	"4" => "Datoteke/direktoriji, ki zahtevajo 777 dovoljenje, so:",
	"5" => "Zapri Okno",

);
$admin_pop_demo = array(

	"1" => "Demo naèin vklopljen",
	"2" => "Spremembe v tvojem sistemu NE bodo veljale v demo naèinu",
	"3" => "Nastavitve tvojega sistema so bile nastavljene v 'demo' naèinu, kar pomeni da je veliko funkcij omogoèenih le za branje.",
	"4" => "Lahko pregleduješ administratorski kot kot obièajno, vendar nastavitve ne bodo shranjene.",
	"5" => "<strong>Ne pozabi</strong> Èe želiš odstraniti demo omejitve, kontaktiraj administratorja.",
	"6" => "Zapri Okno",
);

$admin_pop_import = array(

	"1" => "Rezultati prenosa baze",
	"2" => "èlani so bili uspešno uvoženi!",
	"3" => "èlani so bili uspešno uvoženi iz",
	"4" => "programa. Preveri, èe so bile slike pravilno nastavljene.",
	"5" => "Mape slik so spodaj, kopirati moraš slike v program in sicer v te poti;",
	"6" => "Zapri Okno",
);

$admin_loading= array(

	"1" => "Optimiziranje tabel baze",
	"2" => "Prosimo poèakaj",

);
$admin_menu_help= array(
"1" => "Vodiè hitre pomoèi",
);

$admin_settings_extra = array(

	"1" => "Pokaži stran za iskanje",
	"2" => "Pokaži stran s kontakti",
	"3" => "Pokaži stran z ogledom",
	"4" => "Pokaži stran s FAQ",
	"5" => "Pokaži Dogodke",
	"6" => "Pokaži Skupine",
	"7" => "Pokaži Forum",
	"8" => "Pokaži Ujemanja",	
	"9" => "Pokaži Mrežo",	
	"10" => "Pokaži Partnerski sistem",
	"11" => "Pokaži SMS/Text opozorilni sistem",
	
	"12" => "Pokaži Bloge",	
	"13" => "Pokaži Chat sobe",	
	"14" => "Pokaži Instant Messenger",	
	"15" => "Pokaži verifikacijsko kodo",
	"16" => "Pokaži US ZIP kode iskanje",
	"17" => "Pokaži UK ZIP kode iskanje",
	"18" => "Pokaži MSN/Yahoo Integracijo",
	
	"19" => "Standardni èlanski paket",
		"20" => "To je paket, kateri je doloèen èlanu ob vpisu",
	"21" => "Èlani morajo naložiti sliko ob registraciji",
		"22" => "Ta nastavitev bo doloèala, ali lahko èlani preskoèijo nalaganje slike ob registraciji.",	
	"23" => "ZASTONJ NAÈIN",
		"24" => "Nastavi na 'Da', èe želiš da so funkcije dostopne vsem èlanom.",
	"25" => "VZDRŽEVALNI NAÈIN",
		"26" => "To bo onemogoèilo dostop vsem, razen administratorju.",
		
	"27" => "Število rezultatov iskanja na stran",
		"28" => "Nastavi število profilov, prikazanih na strani",		
	"29" => "Število rezultatov ujemanja na strani",	
		"30" => "Ta izbira bo doloèila število prikazanih profilov na strani.",
		
	"31" => "Email Aktivacijske kode",
		"32" => "Èlani bodo prejeli aktivacijsko kodo na svoj email naslov, katero bodo morali potrditi pred prvim vpisom.",
	"33" => "Roèna odobritev èlanov",
	"34" => "Nastavi to opcijo na 'Da' ali 'Ne', èe želiš roèno odobriti raèune èlanov pred prvim vpisom.",
	"35" => "Roèna odobritev datotek",
		"36" => "Nastavi to opcijo na 'Da' ali 'Ne', èe želiš datoteke odobriti roèno pred prikazom",
	"37" => "Roèna odobritev video posnetkov",
		"38" => "Nastavi to opcijo na 'Da' ali 'Ne', èe želiš video odobriti roèno pred prikazom(video chat vnose).",
		
	"39" => "Prikaži Video pozdrav snemalnik",
	"40" => "To omogoèa èlanom snemanje video pozdrava v profilu. Vnesti moraš svojo flash video RMS povezavo spodaj.",
	"41" => "Flash RMS povezava",
		"42" => "Potreboval boš flash gostovanje za to opcijo",
	"43" => "Prikaži format datuma",
		"44" => "Izberi format datuma za prikaz na spletni strani",
	"45" => "Dovoli komentarje profila/datoteke",
		"46" => "Ta opcija bo omogoèila èlanom komentiranje profilov in datotek.",
	"47" => "Prikaži Chat in IM v novem oknu",
	
	"48" => "Ta opcija bo omogoèila prikaz Chata in IM-ja v novem oknu.",
	
	"49" => "Brskalnikom prijazno?",
		"50" => "Omogoèi to opcijo, èe gostuješ na Unix/Linux raèunu",
	"51" => "Iskanje praznih fotk",
		"52" => "Želiš, da so èlani brez fotke prikazani v iskalnih rezultatih?.",
	"53" => "Prikaži slike zastav",
		"54" => "Želiš imeti zastave jezikov prikazane na strani?",
	"55" => "Partnerska valuta",	
	"56" => "Uporabi HTML urejevalnik",	
	"57" => "Nastavi to opcijo na 'Da' ali 'Ne', èe želiš roèno odobriti datoteke.",

	"58" => "Prikaži stran s èlanki",

);

$admin_billing_extra = array(

	"1" => "Nastavi to opcijo, èe želiš da so funkcionalnosti dostopne vsem.",
	
	"2" => "Tip paketa",
	"3" => "Paket èlanstva",
	"4" => "SMS Paket",
	"5" => "Oznaèi 'Da', èe želiš ustvariti samo SMS Paket, pri katerem lahko uporabniki kupujejo Kredite na tvoji spletni strani.",
	"6" => "Ime paketa",
		"7" => "Vnesi ime paketa, kateri bo prikazan v opisu na spletni strani.",
	"8" => "Opis",	
	"9" => "Cena",	
	"10" => "Koliko želiš raèunati èlanom za ta paket. Pozor: Ne vnašaj valutnih simbolov",
	"11" => "Prikaži valutno kodo",
	
	"12" => "To je koda valute, prikazana na spletni strani, to NI tvoja plaèilna valuta - ta mora biti nastavljena v nastavitvah plaèil.",	
	"13" => "Naroènina",	
	"14" => "Izberi Da, èe želiš da ja to ponavljajoèe se plaèilo.",	
	"15" => "Doba nadgradnje",
	
	"16" => "Dan",
	"17" => "Teden",
	"18" => "Mesec",
		"18a" => "Neomejeno",
	"19" => "Max sporoèil (dnevno)",
		"20" => "To je maximalno število dnevno poslanih sporoèil.",
	"21" => "Max Pomežikov",
		"22" => "Maximalno število Pomežikov poslanih dnevno.",	
	"23" => "Max nalaganja datotek",
		"24" => "Maximalno število datotek, ki jih èlan lahko naloži.",
	"25" => "Ikona povezave paketa",
		"26" => "Ta ikona paketa mora biti povezana na sliko v tvojem sistemu. Priporoèena velikost: 28px x 90px.",
		
	"27" => "Zadnji Èlan",
		"28" => "Izberi 'Da', èe želiš, da je fotka èlana prikazana na tvoji domaèi strani.",		
	"29" => "Osvetljeno",	
		"30" => "Izberi 'Da', èe želiš, da je ozadje èlana osvetljeno v iskalnih rezultatih.",
		
	"31" => "Ogled odraslih slik",
		"32" => "Izberi 'Da', èe želiš, da èlani lahko vidijo odrasle slike drugih èlanov.",
	"33" => "SMS krediti",
	"34" => "To je število kreditov, dodanih èlanu med nadgradnjo paketa. Ti krediti bodo dodani že obstojeèim kreditom na raèunu èlana.",
	"35" => "Vidno na paketu nadgradnje"

);

$admin_mainten_extra = array(

	"1" => "Povezava",
	"2" => "Vnesi povezavo le, èe želiš prikazati povezavo do zunanje strani",
	"3" => "RSS Novice",
	
	"4" => "Kategorija",
	"5" => "Ogledi",
	"6" => "Zajem",
	"7" => "Jezik",
	"8" => "Privat Skupina",
		
	"9" => "Spremeni Forum",	
	"10" => "Oznaèi Forum",
	"11" => "Standard Forum",
	
	"12" => "Trenutno uporabljaš forum tretje stranke. Prosimo logiraj se na njihov prijavni sistem.",	
	"13" => "Geslo"
);

$admin_set_extra1 = array(

	"1" => "Dovoli nalaganje Fotk/Videa",
	"2" => "Dovoli nalaganje Videa",
	"3" => "Dovoli nalaganje Glasbe",	
	"4" => "Dovoli nalaganje YouTube",	
);

$admin_alerts = array(

	"1" => "Opozorila",
	"2" => "novi obiskovalci",
	"3" => "novi èlani",	
	"4" => "neodobreni èlani",	
	"5" => "neodobrene datoteke",
	"6" => "nove nadgradnje",	
);

$lang_members_nn = array(

	"0" => "Nadzor nad zlorabo",
	"1" => "Upor. ime ali ID",
	"2" => "Ni Chat zgodovine",	
);

$members_opts = array(

	"1" => "Uredi Profil",
	"2" => "Nalaganje datotek",
	"3" => "Zgodovina plaèil",	
	"4" => "Pošlji Email",	
	"5" => "Pošlji Sporoèilo",
	"6" => "Forum Komentarji",
	"7" => "Sporoèilo zlorabe",	
);
?>