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

	"" => "Plo��a",

		"_*" => "Administratorjeva plo��a",
		"_?" => "",

	"members" => "Statistike �lanov",
		
		"members_*" => "Statistike �lanov",
		"members_?" => "Spodnji graf prikazuje vpise �lanov preteklih dveh tednov.",
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
		"maps_?" => "Ta izbira prikazuje, s katerega dela sveta se vpisujejo �lani. To ti dovoli izvedbo bolj natan�nih marketin�kih kampanj.",
 

	"adminmsg" => "Obvestila spletne strani",
 
		"adminmsg_*" => "Obvestilo spletne strani",
		"adminmsg_?" => "Vnesi sporo�ilo v spodnji okvir in vsaki�, ko se �lan prijavi v svoj ra�un, bo videl obvestilo. To je odli�en na�in za stalno obve��anje o novostih.",

);
 

$admin_layout_page2 = array(

	"" => "�lani",

		"_$" => "pol",
		"_*" => "Uredi �lane",
 

			"edit" => "Uredi podatke �lanov",
	
				"edit_*" => "Uredi �lana",
				"edit_?" => "Uporabi spodnje mo�nosti za posodobitev profila �lana.",
				"edit_^" => "ni�",


			"fake" => "La�ni �lani",
	 
				"fake_*" => "Ustvari la�ne �lane",
				"fake_?" => "Uporabi spodnje mo�nosti, da ustvari� la�ne �lane. Tako bo spletna stran na za�etku delovala zasedeno.",
				"fake_^" => "pod",

	"banned" => "Izgnani �lani",
 
		"banned_*" => "Izgnani �lani",
		"banned_?" => "Program ima vgrajen sistem za zaznavanje hekerskih vdorov. Spodaj so podatki o poskusih s strani �lanov in ne-�lanov.",
		"banned_^" => "pod",

	"monitor" => "Nadzor �lanov",
 
		"monitor_*" => "Nadzor �lanov",
		"monitor_?" => "Od �asa do �asa �lani po�iljajo neza�elena ali opolzka sporo�ila drugim �lanom. Ta nadzor ti omogo�a obdr�ati spletno stran varno za tvoje �lane.",
		"monitor_^" => "pod",

	"import" => "Uvozi �lane",
 
		"import_*" => "Uvozi �lane iz baze podatkov ali CSV datoteke",
		"import_?" => "Uporabi spodnje mo�nosti za uvoz �lanov iz drugih platform ali CSV datoteke.",
		"import_^" => "pod",
		
	"files" => "�lanske mape", 
	"files_*" => "�lanske album mape",


	"addfile" => "Nalo�i Fotko",			 
	"addfile_*" => "Nalo�i fotko",
	"addfile_?" => "V�asih ima �lan te�av.",
	"addfile_^" => "sub",
			 
 
	"affiliate" => "Partnerji",
 
		"affiliate_*" => "Partnerji",
		"affiliate_?" => "Uporabi spodnje mo�nosti za urejanje partnerjev.",
		 
			"addaff" => "Dodaj novega partnerja",
	 
				"addaff_*" => "Dodaj/Uredi ra�un partnerja",
				"addaff_?" => "Izpolni vsa polja za dodajanje /urejanje partnerskega ra�una.",
				"addaff_^" => "pod",

			"affsettings" => "Partnerske strani",
 
				"affsettings_*" => "Dizajn partnerskih strani",
				"affsettings_?" => "Uporabi spodnje mo�nosti za urejanje izgleda partnerskih strani.",
				"affsettings_^" => "pod",

			"affcom" => "Partnerske provizije",
	 
				"affcom_*" => "Partnerska provozija",
				"affcom_?" => "Tukaj lahko nastavi� provizijo za partnerje. To pomeni, da vsak zaslu�ek, pridobljen s strani partnerja, bele�i njegovo provizijo.",
				"affcom_^" => "pod",


			"affban" => "Partnerski bannerji",
	 
				"affban_*" => "Partnerski bannerji",
				"affban_?" => "Tukaj lahko nastavi� bannerje, ki se bodo prikazali na partnerskih straneh.",
				"affban_^" => "pod",

);


$admin_layout_page3 = array(

 

		"" => "Tema spletne strani",
 
			"_*" => "Tema spletne strani",
			"_?" => "Na spodnjem seznamu sp vse template, ki jih lahko uporabi� za svojo spletno stran.",
			 
				
			"color" => "Barvne opcije",
		 
				"color_*" => "Barvne opcije",
				"color_?" => "Uporabi spodnje mo�nosti, da nastavi� barvne opcije za spletno stran. Lahko zamenja� tudi slike.",
				"color_^" => "pod",
				
			"logo" => "Logo",
				"logo_$" => "pol",
				"logo_*" => "Logo",
				"logo_?" => "Uporabi spodnje mo�nosti za nastavitve logotipa. Lahko uporabi� �e narejene logotipe ali nalo�i� svojega.",
				"logo_^" => "pod",
				
			"img" => "Slike spletne strani",
				"img_$" => "pol",
				"img_*" => "Slike spletne strani",
				"img_?" => "Spodnje slike so shranjene v mapi slik. Lahko jih zamenja� s svojimi.",
				"img_^" => "pod",

			"text" => "Naslovni text",
				"text_$" => "pol",
				"text_*" => "Naslovni text",
				"text_?" => "Spodnja polja ti dovoljujejo zamenjati naslovni text na spletni strani. Razli�ne teme imajo razli�ne texte, zato malce experimentiraj.",
				"text_^" => "pod",


			"terms" => "Pogoji spletne strani",
				"terms_$" => "pol",
				"terms_*" => "Pogoji spletne strani",
				"terms_?" => "Uredi spodnje polje. Ti pogoji se prika�ejo ob registraciji �lana.",
				"terms_^" => "pod",
	
			"edit" => "Strani in Datoteke",
 
			"edit_*" => "Strani",
			"edit_?" => "Izberi s spodnjega seznama stran, ki jo ho�e� urediti. Uporabi� lahko tudi Dreamweaverja. <b>Bodi previden pri urejanju, saj se ne da ve� popraviti nazaj.</a>",
				
	
	
				"newpage" => "Ustvari stran",
				"newpage_$" => "pol",
				"newpage_*" => "Ustvari novo stran",
				"newpage_?" => "Ustvarjanje nove strani je preprosto. Klikni na gumb, napi�i naslov in �e je pripravljeno.",
				"newpage_^" => "pol",
							
				
			"meta" => "Meta oznake",
				"meta_$" => "pol",
				"meta_*" => "Urejanje meta oznak",
				"meta_?" => "eMeeting ima poseben sistem za urejanje Meta oznak. Na vsako stran bo avtomati�no dodal naslov, opis in klju�ne besede, ki si jih nastavil/a tukaj.",
				"meta_^" => "pod",

 

		
			"menu" => "Menu polja",
				"menu_$" => "pol",
				"menu_*" => "Urejanje polj Menu-ja",
				"menu_?" => "Uporabi spodnje mo�nosti za urejanje polj menujev. Lahko doda� tudi zunanje povezave.",
				"menu_^" => "pod",

	"manager" => "Manager datotek",
		"manager_$" => "pol",
		"manager_*" => "Manager datotek",
		"manager_?" => "Ta Manager je zelo uporaben za pregled vseh datotek, ki jih ima� na gostiteljskem ra�unu. Lahko jih tudi izbri�e�.",

			"slider" => "Rotacijske slike",
				"slider_$" => "pol",
				"slider_*" => "Rotacijske slike naslovnice",
				"slider_?" => "Rotacijske slike se pojavijo na naslovnici. Uporabi mo�nosti, da zamenja� slike, povezave in ostalo.",
				"slider_^" => "pod",

	"languages" => "Jeziki",
		"languages_$" => "pol",
		"languages_*" => "Jeziki",
		"languages_?" => "Spodaj so vsi jeziki, ki jih lahko uporablja� na spletni strani ali izbri�e�. <b>Mora� se odjaviti kot administrator, da vidi� spremembe.</b>",

			"editlanguage" => "Uredi Jezik",
				"editlanguage_$" => "pol",
				"editlanguage_*" => "Uredi Jezik",
				"editlanguage_?" => "Bodi previden ko ureja� jezik. Spremeni le vsebino za pu��ico (=>). Prva vrednost se uporablja kot klju�.",
				"editlanguage_^" => "pod",

			"addlanguage" => "Dodaj Jezik",
				"addlanguage_$" => "pol",
				"addlanguage_*" => "Dodaj Jezik",
				"addlanguage_?" => "Ustvarjanje novega jezika bo prekopiralo obstoje�i jezik, katerega potem lahko odpre� in uredi�.",
				"addlanguage_^" => "pod",



);


$admin_layout_page4 = array(

	"" => "Email in e-zini",

		"_$" => "pol",
		"_*" => "Email ain e-zini",
		"_?" => "Spodaj so vsi emaili, ki jih sistem uporablja ob registraciji ali izgubljenem geslu. Lahko ih uredi�, kot �eli�.",

			"add" => "Ustvari nov Email",
				"add_$" => "pol",
				"add_*" => "Dodaj/Uredi Email",
				"add_?" => "Izpolni spodnja polja da uredi� Email. Kasneje se lahko vrne� in po�lje� komur �eli�.",
				"add_^" => "pod",

	"welcome" => "Pozdravni Email/ SMS",
		"welcome_$" => "pol",
		"welcome_*" => "Sestavi Pozdravni Email/ SMS",
		"welcome_?" => "Uporabi spodnje mo�nosti za sestavo pozdravnega Emaila/SMS-ja.",
		"welcome_^" => "pod",

	"template" => "Email Template",
		"template_$" => "pol",
		"template_*" => "Email Template",
		"template_?" => "Spodaj so vse template email-ov. Odpri in uredi jih kakor �eli�.",
		"template_^" => "pod",

	"export" => "Download Email-e",

		"export_$" => "pol",
		"export_*" => "Download Email-e",
		"export_?" => "Uporabi spodnje mo�nosti da download-a� email naslove iz baze.",
		"export_^" => "pod",

	"sendnew" => "Po�lji e-zine",

		"sendnew_$" => "pol",
		"sendnew_*" => "Po�lji e-zin",
		"sendnew_?" => "Uporabi izbiro za po�iljanje e-zinov �lanom. Najprej ozna�i �lane in e-zin.",

	"send" => "Po�lji en Email",

		"send_$" => "pol",
		"send_*" => "Po�lji en Email",
		"send_?" => "Uporabi to mo�nost za po�iljanje enega email-a. Po�iljatelj je isti kot tvoj administratorski e-mail.",
		"send_^" => "pod",

	"subs" => "Email Opomini",

		"subs_$" => "pol",
		"subs_*" => "Email Opomini",
		"subs_?" => "Email Opomini ti omogo�ajo obve��anje �lanov o podalj�anju njihovega �lanstva in podobno.",
		"subs_^" => "pod",
		
	"tc" => "Email Poro�ila",
		"tc_$" => "pol",
		"tc_*" => "Email Poro�ila",
		"tc_?" => "Email Poro�ila vsebujejo sledilno kodo, katera ti pove koliko �lanov je odprlo ali dobilo sporo�ilo.",
		"tc_^" => "sub",

			"tracking" => "Email sledilna koda",
				"tracking_$" => "pol",
				"tracking_*" => "Email sledilna koda",
				"tracking_?" => "Sledilna koda spodaj (tracking_id) je zamenjana s sliko, katera bele�i odprtje email-ov, �e je ogled slik dovoljen s strani prejemnika.",
				"tracking_^" => "pod",



	"SMSsend" => "Po�lji SMS sporo�ila",

		"SMSsend_$" => "pol",
		"SMSsend_*" => "Po�lji SMS sporo�ila",
		"SMSsend_?" => "Uporabi spodnje mo�nosti za po�iljanje SMS/text sporo�il svojim �lanom.",
);

$admin_layout_page5 = array(

	"" => "Stopnje �lanstva",

		"_$" => "pol",
		"_*" => "Stopnje �lanstva",
		"_?" => "Spodaj so vsi �lanski paketi na spletni strani. Zelena polja ti omogo�ajo ve�jo kontrolo nad �lani in obiskovalci.",

			"epackage" => "Dodaj paket",
				"epackage_$" => "pol",
				"epackage_*" => "Dodaj/Uredi paket",
				"epackage_?" => "Uporabi spodnja polja, da doda�/uredi� pakete �lanstva.",
				"epackage_^" => "pod",

			"packaccess" => "Uredi dostop",
				"packaccess_$" => "poln",
				"packaccess_*" => "Uredi dostop",
				"packaccess_?" => "Tukaj lahko dolo�i� dostop do tvojih vsebin glede na paket �lanstva. <b>Pozor: Ozna�i le tista polja, za katera ne �eli� dovoliti dostopa. </b>",
				"packaccess_^" => "pod",

			"upall" => "Prenesi �lane",
				"upall_$" => "pol",
				"upall_*" => "Prenesi �lane med paketi",
				"upall_?" => "Uporabi spodnje mo�nosti da prenese� �lane med paketi.",
				"upall_^" => "pod",


	"gateway" => "Pla�ilni prehodi",

		"gateway_$" => "pol",
		"gateway_*" => "Pla�ilni prehodi",
		"gateway_?" => "Pla�ilni prehodi ti omogo�ajo prejemanje pla�il za �lanstvo. �e vodi� zastonj spletno stran, jih lahko tudi izklju�i�.",


			"addgateway" => "Dodaj pla�ilni prehod",
				"addgateway_$" => "pol",
				"addgateway_*" => "Dodaj pla�ilni prehod",
				"addgateway_?" => "Program ima celo vrsto �e vgrajenih pla�ilnih prehodov, lahko pa doda� tudi novega.",
				"addgateway_^" => "pod",


	"billing" => "Pla�ilni Sistem",

		"billing_$" => "pol",
		"billing_*" => "Pla�ilni sistem",	


		"affbilling" => "Zgodovina pla�il partnerjem",
	
			"affbilling_$" => "pol",
			"affbilling_*" => "Zgodovina pla�il partnerjem", 
			"affbilling_^" => "pod",


);

$admin_layout_page6 = array(

	"" => "Bannerji in ogla�evanje",

		"_$" => "pol",
		"_*" => "Bannerji in ogla�evanje",
 

			"addbanner" => "Dodaj Banner",
				"addbanner_$" => "pol",
				"addbanner_*" => "Dodaj Banner",
				"addbanner_?" => "Uporabi spodnje mo�nosti da doda� nov banner na spletno stran.",
				"addbanner_^" => "pod",


);

$admin_layout_page7 = array(

	"" => "Nastavitve Prikaza",

		"_$" => "pol",
		"_*" => "Nastavitve Prikaza",
		"_?" => "Uporabi spodnje mo�nosti za vklop/izklop prikazov aplikacij na spletni strani.",


	"op" => "Opcije Prikaza",

		"op_$" => "pol",
		"op_*" => "Opcije Prikaza",
		"op_?" => "Uporabi spodnje mo�nosti za nastavitve prikaza spletne strani, kot ti odgovarja.",
	
		"op1" => "Nastavitve Iskanja",
	
			"op1_$" => "pol",
			"op1_*" => "Nastavitve Iskanja",
			"op1_?" => "Uporabi spodnje mo�nosti za nastavitve prikaza iskanih strani na spletni strani.",
			"op1_^" => "pod",
	
		"op2" => "Nastavitve �lanstva",
	
			"op2_$" => "pol",
			"op2_*" => "Nastavitve �lanstva",
			"op2_?" => "Uporabi spodnje mo�nosti za nastavitve �lanstva.",
			"op2_^" => "pod",

		"op3" => "Flash Server nastavitve",
	
			"op3_$" => "pol",
			"op3_*" => "Flash Server nastavitve",
			"op3_?" => "Flash server se uporablja za shranjevanje video pozdravov �lanov, kot tudi v Chatu ter IM.",
			"op3_^" => "pod",

		"op4" => "API Nastavitve",
	
			"op4_$" => "pol",
			"op4_*" => "API Nastavitve", 
			"op4_^" => "pod",

		"thumbnails" => "Standardne slike",
	
			"thumbnails_$" => "pol",
			"thumbnails_*" => "Standardne slike", 
			"thumbnails_^" => "Spodaj so prikazane slike, ki se uporabljajo, kadar �lani ne nalo�ijo svojih slik.",

	"email" => "Email nastavitve",

		"email_$" => "pol",
		"email_*" => "Email nastavitve",
		"email_?" => "Spodaj so prikazani vsi dogodki na spletni strani. Izberi dogodek in sistem bo poslal email obvestilo vsem �lanom, kot tudi administratorjem.",

	"paths" => "Poti Datotek in Map",

		"paths_$" => "pol",
		"paths_*" => "Poti Datotek in Map",
		"paths_?" => "Poti Datotek in Map vsebujejo vse datoteke na tvojem gostiteljskem ra�unu. Program jih bo samodejno nastavil med instalacijo, ampak jih lahko zamenj�a ali spremeni� po �elji.",

	"watermark" => "Slikovni �ig",

		"watermark_$" => "pol",
		"watermark_*" => "Slikovni �ig",
		"watermark_?" => "Slikovni �ig se prikazuje na slikah �lanov kot za��ita slik. Lahko je v formatu PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Polja spletne strani",

		"_$" => "pol",
		"_*" => "Profil, registracija in iskalna polja",
		"_?" => "Spodaj so vsa polja na spletni strani. Ta vsebujejo registracijske, iskalne in celo ujemalne strani. Lahko hitro doda� nova polja z mo�nostmi spodaj.",

		"addfields" => "Ustvari novo polje",
	
			"addfields_$" => "pol",
			"addfields_*" => "Ustvari novo polje",
			"addfields_?" => "Uporabi spodnje mo�nosti za dodajanje novih polj. Ta obi�ajno slu�ijo �lanom, da izpolnijo svoje podatke.",
			"addfields_^" => "pod",

		"fieldgroups" => "Uredi skupine",
	
			"fieldgroups_$" => "pol",
			"fieldgroups_*" => "Uredi skupine",
			"fieldgroups_?" => "Skupine so zbirka polj z isto temo. Tako lahko na primer ustvari� skupino 'O meni', katera vsebuje polja 'Moji hobiji', in tako dalje. <b>�e izbri�e� skupino, ki vsebuje polja, bodo le-ta prene�ena v naslednjo skupino.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Ustvari novo skupino",
	
			"addgroups_$" => "pol",
			"addgroups_*" => "Ustvari novo skupino",
			"addgroups_?" => "Skupina je skupina polj, ki so zdru�ena pod isto skupinsko temo. To ti omogo�a, da ustvari� veliko skupin pod isto temo.",
			"addgroups_^" => "pod",




	"cal" => "Koledar dogodkov",

		"cal_$" => "pol",
		"cal_*" => "Koledar dogodkov",
		"cal_?" => "Koledar dogodkov slu�i za prikaz dogodkov, ki jih objavijo �lani. Uporabi spodnje mo�nosti za dodajanje ali urejanje dogodkov.",

		"caladd" => "Dodaj dogodek",
	
			"caladd_$" => "pol",
			"caladd_*" => "Dodaj/Uredi dogodek",
			"caladd_?" => "Izpolni spodnja polja za dodajo/urejanje dogodka.",
			"caladd_^" => "pod",

		"caladdtype" => "Uredi tipe dogodkov",
	
			"caladdtype_$" => "pol",
			"caladdtype_*" => "Uredi tipe dogodkov",
			"caladdtype_?" => "Uporabi spodnje mo�nosti za urejanje tipa dogodkov. Dodaja slike bo dala tvoji spletni strani bolj profesionalen izgled.",
			"caladdtype_^" => "pod",

		"importcal" => "Uvozi dogodke",
	
			"importcal_$" => "pol",
			"importcal_*" => "I��i in Uvozi dogodke",
			"importcal_?" => "Program ima vgrajen api sistem za iskanje in uvoz dogodkov iz svetovne baze dogodkov.",
			"importcal_^" => "pod",


	"poll" => "Anketa spletne strani",

		"poll_$" => "pol",
		"poll_*" => "Anketa spletne strani",
		"poll_?" => "Uporabi spodnje mo�nosti za dodajo in urejanje anket",

		"polladd" => "Dodaj anketo",
	
			"polladd_$" => "pol",
			"polladd_*" => "Ustvari novo anketo",
			"polladd_?" => "Izpolni spodnja polja za dodajo nove ankete na spletno stran.",
			"polladd_^" => "pod",



	"forum" => "Forum",

		"forum_$" => "pol",
		"forum_*" => "Forum kategorije",
		"forum_?" => "Uporabi spodnje mo�nosti za dodajo in urejanje kategorij foruma. Priporo�amo dodajo ikon za bolj profesionalen izgled spletne strani.",

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
			"forumpost_?" => "Spodaj so prikazani vsi komentarji na forumu od tvojih �lanov. Uporabi spodnje mo�nosti za urejanje ali brisanje neprimernih komentarjev.",
			"forumpost_^" => "pod",

	"chatrooms" => "Chat soba",

		"chatrooms_$" => "pol",
		"chatrooms_*" => "Chat soba",
		"chatrooms_?" => "Uporabi spodnje mo�nosti za dodajanje ali urejanje Chat sob.",


	"faq" => "FAQ",

		"faq_$" => "pol",
		"faq_*" => "FAQ",
		"faq_?" => "FAQ/Pogosta vpra�anja so odli�en na�in za pomo� tvojim �lanom pri og.",

		"faqadd" => "Add FAQ",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Add/Edit FAQ",
			"faqadd_?" => "Izpolni spodnja polja za dodajo in urejanje FAQ.",
			"faqadd_^" => "pod",

	"words" => "Filter besed",

		"words_$" => "pol",
		"words_*" => "Filter besed",
		"words_?" => "Filter besed se nana�a na �lanske profile, IM in forum. Vse neprimerne besede bo zamenjal z zvezdicami (**).",



	"articles" => "�lanki",

		"articles_$" => "pol",
		"articles_*" => "�lanki",
		"articles_?" => "�lanki so odli�no sredstvo za obve��anje tvojih �lanov o novostih in spremembah spletne strani.",


		"articleadd" => "Dodaj �lanek",
	
			"articleadd_$" => "pol",
			"articleadd_*" => "Dodaj nov �lanek",
			"articleadd_?" => "Izpolni polja za dodajo novega �lanka.",
			"articleadd_^" => "pod",

		"articlerss" => "Uvozi RSS �lanke",
	
			"articlerss_$" => "pol",
			"articlerss_*" => "Uvozi RSS �lanke",
			"articlerss_?" => "RSS povezave slu�ijo za uvoz �lankov v kategorije, ki si jih ustvaril. Na primer, ustvari� lahko kategorijo 'Novice' ter uvozi� �lanke iz spletnega portala z novicami. Program bo izlu��il vse RSS �lanke ter jih vstavil v tvojo kategorijo.",
			"articlerss_^" => "pod",

		"articlecats" => "Kategorije �lankov",
	
			"articlecats_$" => "pol",
			"articlecats_*" => "Kategorije �lankov",
			"articlecats_?" => "Uporabi spodnje mo�nosti za dodajo kategorij �lankov.",
			"articlecats_^" => "pod",


	"groups" => "Skupine",

		"groups_$" => "pol",
		"groups_*" => "Skupine",
		"groups_?" => "Uporabi spodnje mo�nosti za urejanje in dodajanje skupin.",


	"class" => "Mali oglasi",

		"class_$" => "pol",
		"class_*" => "Mali oglasi",
		"class_?" => "Spodaj so vsi Mali oglasi tvojih �lanov.",


		"addclass" => "Dodaj Mali oglas",
	
			"addclass_$" => "pol",
			"addclass_*" => "Dodaj/Uredi oglas",
			"addclass_?" => "Uporabi spodnje mo�nosti za dodajo/urejanje oglasov.",
			"addclass_^" => "pod",

		"addclasscat" => "Uredi kategorije",
	
			"addclasscat_$" => "pol",
			"addclasscat_*" => "Uredi kategorije",
			"addclasscat_?" => "Uporabi spodnje mo�nosti za urejanje kategorij Malih oglasov. Priporo�amo, da doda� sliko ali ikono za bolj profesionalen izgled.",
			"addclasscat_^" => "pod",

	"games" => "Igre",

		"games_$" => "pol",
		"games_*" => "Igre",
		"games_?" => "Spodaj so vse igre na tvoji spletni strani. Preberi navodila za instalacijo novih iger.",

	"gamesinstall" => "Instaliraj igro",

		"gamesinstall_$" => "pol",
		"gamesinstall_*" => "Instaliraj igro",
		"gamesinstall_?" => "Izberi igre ki jih ho�e� instalirati. Igre se shranijo v mapo: inc/exe/Games/tar/. <b>Poglej dokumentacijo za instalacijo iger</b>",
		"gamesinstall_^" => "pod",


);


$admin_layout_page9 = array(

	"" => "Administratorji",

		"_$" => "pol",
		"_*" => "Administratorji in moderatorji",
		"_?" => "Spodaj so vsi administratorji in moderatorji. Moderatorje dodaja� tako, da na iskalni strani ozna�i� polje moderator, poler profila.",

	"pref" => "Nastavitve administratorja",

		"pref_$" => "pol",
		"pref_*" => "Nastavitve administratorja",
		"pref_?" => "Uporabi spodnje mo�nosti za nastavitve administratorja.",

	"manage" => "Uredi moderatorje",

		"manage_$" => "pol",
		"manage_*" => "Uredi moderatorje",
		"manage_?" => "Moderatorji so lahko v dveh vlogah; kot urejevalci glavne spletne strani ali kot administratorji z dostopom do administratorskih orodij.",

	"email" => "Emaili administratorja",

		"email_$" => "pol",
		"email_*" => "Emaili administratorja",
		"email_?" => "Spodaj so vsi emaili, poslani od �lanov administratorju.",

	"compose" => "Sestavi Email",

		"compose_$" => "pol",
		"compose_*" => "Sestavi Email",
		"compose_?" => "Uporabi spodnje mo�nosti za sestavo novega emaila in po�iljanje �lanom.",
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
		"_?" => "Spodaj je trenutna verzija programa, ki ga uporablja�. Preveri sprotne posodobitve.",

	"backup" => "Backup baze",

		"backup_$" => "pol",
		"backup_*" => "Backup baze",
		"backup_?" => "Izberi tabele za urejanje baze. Priporo�ljivo je uporabiti mo�nosti urejanja in backupa baze na tvojem gostiteljskem ra�unu.",


	"license" => "Licen�ni klju�i",

		"license_$" => "pol",
		"license_*" => "Licen�ni klju�i",
		"license_?" => "Spodaj so licen�ni klju�i programa. Previdno z urejanjem.",

	"sms" => "SMS Krediti",

		"sms_$" => "pol",
		"sms_*" => "SMS Krediti",
		"sms_?" => "Spodaj so vsi SMS Krediti na tvojem ra�unu.",

);

$admin_layout_page11 = array(

	"" => "Vti�niki",

		"_$" => "pol",
		"_*" => "Vti�niki",
		"_?" => "Vti�niki raz�irijo funkcionalnosti programa. Ko je vti�nik instaliran, ga lahko aktivira� ali deaktivira�.",

);


$admin_layout_nav = array(

	"1" => "Plo��a",
		"1a" => "Statistike �lanov",
		"1b" => "Statistike partnerjev",
		"1c" => "Statistike obiskovalcev",
		"1d" => "Lokacije obiskovalcev",
	"2" => "Members",
		"2a" => "Uredi �lane",
		"2b" => "Uredi partnerje",
		"2c" => "Izgnani �lani",
		"2d" => "Datoteke �lanov",
		"2e" => "Uvozi �lane",
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
		"4c" => "Email Poro�ila",
		"4d" => "Po�lji en Email",
		"4e" => "Email Opomini",	
		"4f" => "Download Emaile",
		"4g" => "Po�lji E-Zine",		
	"5" => "Billing",
		"5a" => "Uredi pakete",
		"5b" => "Pla�ilni prehodi",
		"5c" => "Zgodovina pla�il",
		"5d" => "Zgodovina pla�il partnerjem",
	"6" => "Settings",
		"6a" => "Prikazne opcije",
		"6b" => "Prikazne nastavitve",
		"6c" => "Sistemske poti",
		"6d" => "Slikovni �ig",
	"7" => "Content",
		"7a" => "Iskalna polja",
		"7b" => "Koledar dogodkov",
		"7c" => "Anketa",
		"7d" => "Forum",
		"7e" => "Chat sobe",	
		"7f" => "FAQ",
		"7g" => "Filter besed",
		"7h" => "�lanki/novice",
		"7i" => "Skupine",
	"8" => "Promocije",	
		"8a" => "Bannerji",
	"9" => "Vti�niki",	
		"9a" => "",
	"10" => "Uredi Moderatorje",	
		"10a" => "Uredi Moderatorje",
		"10b" => "Super Uporabnik",
	"11" => "Vzdr�evanje",
		"11a" => "Sistem Backup",
		"11b" => "Licen�ni klju�i",
		"11c" => "Sistem posodobitve",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Sistem posodobljen uspe�no",
	"no_update" => "Sistem posodobljen ampak ni� ni bilo za izbrisati!",
	"edit" => "Uredi",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Iskanje",
	"1" => "Ozna�i vse",
	"2" => "Odzna�i vse",
	"3" => "Odobri",
	"4" => "Prekli�i",
	"5" => "Izbri�i",	
	"6" => "Naredi zadnjega �lana",
	"7" => "Opcije",	
	"8" => "Posodobi",	
	"9" => "Naredi zadnje",
	"10" => "Odstrani zadnje",	
	"11" => "Posodobi standardni jezik",
	"12" => "Po�lji",
	"13" => "Nadaljuj",	
	"14" => "Naredi aktivnega",
	"15" => "Onemogo�i",
	"16" => "Posodobi naro�ilo",
	"17" => "Posodobi polja strani",	
	"18" => "Omogo�i",
);

$admin_table_val = array(
	"1" => "Uporabni�ko ime",
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
			
	"15" => "Pla�ano provizije",
		
	"16" => "Sporo�ilo",
	"17" => "�as",
	"18" => "Ime datoteke",
	"19" => "Zadnji� posodobljeno",	
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
	"31" => "Za pla�ati",	
	"32" => "Status",
	
	"33" => "Datum posodobitve",
	"34" => "Datum prenehanja",	
	"35" => "Na�in pla�ila",
	"36" => "�e aktiven",	
	"37" => "Geslo",
	"38" => "Zadnja prijava",

	"39" => "Pozicija",
	"40" => "Zadetkov",	
	"41" => "Aktiven",
	"42" => "Predogled",	
	"43" => "Naslov",
	"44" => "�lanki",
	"45" => "Naro�ilo",

);

$admin_search_val = array(
	"1" => "Upor. ime �lana",
	"2" => "Vsi paketi",
	"3" => "Vsi spoli",
	"4" => "Na stran",
	"5" => "Naro�ilo od",
	"6" => "Email Naslov",
	
	"7" => "Katerikoli Status",
	"8" => "Aktivni �lani",
	"9" => "Preklicani �lani",
	"10" => "Neodobreni �lani",
	"11" => "�lani �elijo preklic",
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
	"9" => "�tevilo",	
	"10" => "Dodaj �lanek",	
	"11" => "Kategorija",
	"12" => "Naslov strani",	
	"13" => "Kratek opis",		
	"14" => "Dodaj �lanek",
	"15" => "Uredi opis",
	"16" => "Seznam polj",
	"17" => "Vrsta",
	"18" => "Jezik",
	"19" => "Seznam vrednosti",
	"20" => "Novo polje",	
	
	"21" => "Naslov polja",		
	"22" => "Tip polja",
		"23" => "Polje Texta",	
		"24" => "Obmo�je Texta",	
		"25" => "Okvir Seznama",
		"26" => "En potrditveni okvir",
		"27" => "Ve� potrditvenih okvirjev",
	
	"28" => "Naslovnica skupine",
	"29" => "Dodaj med registracijo",
	"30" => "Ozna�i spodaj",
	
	"31" => "Dodaj skupino",
	"32" => "Opcije prikaza skupine",
		"34" => "Prika�i vsem �lanom",
		"35" => "Prika�i le administratorjem",
		"36" => "Prika�i �lanom in administratorjem (ni na profilu)",
	"37" => "samo",	
	"38" => "Uredi skupine",	
	"39" => "Dodaj dogodke",	
	"40" => "Zajem polja",
	"41" => "Zajem",		
	"42" => "Opisni text",
	"43" => "Tip zajema",	
	"44" => "Zajem iskanja",		
	"45" => "Zajem profila",	
	"46" => "Ustvariti mora� en zajem profila, kot 'Jaz sem' ter drugi zajem, kot 'Jaz i��em'",	
	"47" => "Obstoje�i zajemi polja",	
	"48" => "Premakni polje v to skupino",		
	"49" => "ID �lana",
	"50" => "Ime Dogodka",	
	"51" => "Opis Dogodka",		
	"52" => "Tip Dogodka",
	"53" => "Izberi kategorijo",	
	"54" => "Izberi tip",
	"55" => "�as dogodka",
	"56" => "Pusti prazno za cel dan",
	"57" => "Datum Dogodka",
	"58" => "Mesec",	
	
	"59" => "Dan",	
	"60" => "Leto",
	"61" => "Dr�ava",		
	"62" => "Regija",
	"63" => "Ulica",	
	"64" => "Mesto",		
	"65" => "Telefon",	
	"66" => "Email",	
	"67" => "Spletna stran",	
	"68" => "Dogodek prikazan",		
		"69" => "Vsem",
		"70" => "Samo �lanom",	
		
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
	"85" => "Prej�nji teden",	
	"86" => "Ime sobe",	
	"87" => "Obstoje�i zajemi polj",	
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
	"9" => "Nalo�i Banner",	
	"10" => "Vnesi HTML",	
	"11" => "HTML Koda",
	"12" => "Nalo�i Banner",	
	"13" => "Banner Povezava",		
	"14" => "Prika�i",
		"15" => "Vsem �lanom",
		"16" => "Samo prijavljenim �lanom",
	
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

	"1" => "Trenutno delujo�e",
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
		"9" => "Samo �lanski dostop",	
		"10" => "Samo oblikovni dostop",	
		"11" => "Samo email dostop",
		"12" => "Samo pla�ilni dostop",	
		"13" => "Samo dostop do nastavitev",		
		"14" => "Samo management dostop",
	"15" => "Admin Ikona",

	"17" => "Email Opozorila",
	"18" => "Admin opozorila novic",
	"19" => "Prenesi vse �lane iz",
	"20" => "v naslednji paket",	
	"21" => "Uredi paket",		
	"22" => "Dostop paketa",
	"23" => "Dodaj stvar paketu",	
	"24" => "Uredi dostop paketa",
);

$admin_settings = array(

	"1" => "Prika�i strani",
	"2" => "Omogo�eno",
	"3" => "Onemogo�i",	
	"4" => "Spletne poti",
	"5" => "Poti stre�nika",	
	"6" => "Poti ikon",			
	"7" => "dodaj polje",	
	"8" => "Ime",	
	"9" => "Vrednost",	
	"10" => "Tip",	
	"11" => "Uredi polja",
	"12" => "Dodaj prehode",	
	"13" => "Pla�ilni sistem",		
	"14" => "Koda pla�ilnega prehoda",
	"15" => "Naslov",
	"16" => "Dostop paketa",
	"17" => "Komentarji",
	"18" => "Prenesi �lane",
	"19" => "Prenesi vse �lane iz",
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
	"4" => "Tvoja spletna stran trenutno te�e v <b>ZASTONJ NA�INU</b> zato so bili �lanski paketi onemogo�eni.",
	"5" => "�eli� onemogo�iti zastonj na�in ter omogo�iti �lanske pakete?",	
	"6" => "ONEMOGO�I ZASTONJ NA�IN",		
	"7" => "Dodaj polje",	
	"8" => "Ime",	
	"9" => "Vrednost",	
	"10" => "Tip",	
	"11" => "Uredi polja",
	"12" => "Dodaj prehode",	
	"13" => "Pla�ilni sistem",		
	"14" => "Koda pla�ilnega prehoda",
	"15" => "Naslov",
	"16" => "Dostop paketa",
	"17" => "Komentarji",
	"18" => "Prenesi �lane",
	"19" => "Prenesi vse �lane iz",
	"20" => "V naslednji paket",	
	"21" => "Uredi paket",		
	"22" => "Dostop paketa",
	"23" => "Dodaj stvar paketu",	
	"24" => "Uredi dostop paketa",
	
	"25" => "�akanje na odobritev",
	"26" => "Odobrena pla�ila",
	"27" => "Zavrnjena pla�ila",
	
	"28" => "Vsa zgodovina",
	"29" => "Aktivna pla�ila",
	"30" => "Zaklju�ena pla�ila",
	"31" => "Aktivne naro�nine",
	"32" => "Zaklju�ene naro�nine",
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
	
	"8" => "Po�lji ",	
		"9" => "Vsem �lanom",	
		"10" => "Naro�nikom �lanskih paketov",	
		"11" => "Aktivnim / Preklicanim / Neodobrenim �lanom",
	"12" => "Do paketa",	
	"13" => "Status �lanstva",		
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
	"24" => "Izberi poro�ilo",
	
	"25" => "Po�lji opomin vsem �lanom kateri imajo med",
	"26" => "in",
	"27" => "dnevi",
	"28" => "Dnevi preostalimi za nadgradnjo naro�nine",
	"29" => "Izberi Emaile za po�iljanje:",
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
	"7" => "Klju�ne besede",
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
	"24" => "�irina",	
	"25" => "vi�ina",		
	"26" => "Dodaj Logo Text",
	"27" => "Canvas Tip",	
		"28" => "Uporabi prazen Canvas",
		"29" => "Obdr�i trenuten Design",	
		"30" => "Nalo�i svoje ozadje / logo",	

	"31" => "Ustvari novo stran",
	"32" => "Ime nove strani",	
		"33" => "Ime strani naj bo kratko in le ena beseda. Na primer: Povezave, Forum, �lanki, itd.",
	"34" => "Dodam Menu vnos?",	
		"35" => "Ne! Ne dodaj menu vnosa",		
		"36" => "Da. Dodaj ga �lanskem obmo�ju",
		"37" => "Da. Dodaj ga na glavne strani, ne k �lanskem obmo�ju.",
			"38" => "�e izbrano, bo nov �lanski vnos dodan na tvojo stran",
);

$admin_overview = array(

	"1" => "Obvestilo",
	"2" => "Vsi �lani",
	"3" => "Ta teden",
	"3a" => "Danes",
	"4" => "Aktivnost spletne strani pred kratkim",
	"5" => "Poro�ila spletne strani",
	
	"6" => "Unikatnih obiskovalcev v zadnjih dveh tednih",
	"7" => "Prijave novih �lanov v zadnjih dveh tednih",
	"8" => "Statistike spola �lanov",	
	"9" => "Statistike starosti �lanov",
	
	"10" => "Prijave novih partnerjev v zadnjih dveh tednih",
	"11" => "Nastavitve zemljevidov obiskovalcev",
	"12" => "Prosimo vnesi svoj Google API klju� zgoraj.",	
	"13" => "Lahko kupi� licen�ni klju� na oddelku za stranke na spletni strani proizvajalca",	
	
	"14" => "Filtriraj iskalne rezultate",	
	"15" => "Vse datoteke",
	
);
$admin_members = array(

	"1" => "Vsi �lani",
	"2" => "Moderatorji",
	"3" => "Aktivni",
	"4" => "Preklicani",
	"5" => "Neodobreni",
	"6" => "�elijo preklic",
	"7" => "Online Zdaj",
	"8" => "Aktivnost vpisov",	
	"9" => "Uredi podatke �lana",	
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
	"22" => "Nalo�i datoteko",	
	"23" => "Datoteka",
	"24" => "Tip",
	"25" => "Upor. ime",
	"26" => "Naslov",
	"27" => "Komentarji",
	"28" => "Naredi standardno",		
	"29" => "Aktivnost vpisov �lanov",	
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
	"a14" => "Zip/Po�tna koda",
	"a15" => "Dr�ava",
	"a16" => "Telefon",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Spletna stran",
	"a20" => "�ek pla�ljiv na",
);


// HELP FILES
$admin_help = array(

	"a" => "Za�ni zdaj",
	"b" => "Ne, hvala!",
	"c" => "Nadaljuj",	
	"d" => "Zapri okno",
	
	
	"1" => "Predstavitev",
	"2" => "Potrebuje� pomo� pri za�etku?",
	"3" => "�ivjo",	
	
	"4" => "in pozdravljen v administratorski kot! Ker je to prvi�, priporo�amo da sledi� �arovniku spodaj, ki ti bo pomagal pri prvih korakih!",
	"5" => "Na� �arovnik ti bo pomagal pri za�etnih nastavitvah, tako da bo� imel sestavljeno stran zelo kmalu.",	
	"6" => "<strong>(Pozor)</strong> Lahko uporabi� to opcijo kadarkoli tako, da klikne� na povezavo na levi strani menu-ja.",
	
	"7" => "Za�etek",
	"8" => "Dobrodo�el v administratorski kot!",	
	"9" => "Dobrodo�el v tvoj administratorski kot za",	
	"10" => "Ta program ti omogo�a nadzor nad vsemi podro�ji spletne strani, kot so �lani, datoteke, emaili, vti�niki in �e veliko ve�.",	
	"11" => "Ta �arovnik ti bo predstavil nekaj osnovnih konceptov o delovanju spletne strani, tako da bo� lahko pripeljal �imve� obiskovalcev na svojo spletno stran.",
	"12" => "<strong>(Ne pozabi)</strong> Kadarkoli lahko zapre� to okno in znova za�ne� s klikom na 'Hitro pomo�' na levi strani menu-ja.",
		
	"13" => "Predstavitev administratorskega kota!",		
	"14" => "Ta administratorski kot je spletno dostopen, tako da lahko dostopa� do njega kjerkoli na svetu z uporabo brskalnika. Preprosto usmeri svoj brskalnik:",	
	"15" => "in se prijavi s svojimi podatki.",
	"16" => "Klikni tukaj za zaznamek.",
	
	"17" => "Predstavitev tvoje plo��e.",	
	"18" => "Programska plo��a ti da hiter pregled nad delovanjem tvoje strani, lahko prebere� obvestila, �lanske statistike, partnerske vpise, itd.",			
	"19" => "Vsi �lanski podatki so shranjeni v MySQL bazi, imenovani:",	
	"20" => "Predstavitev spletnih statistik.",
	"21" => "Programska statistika ti da podroben pregled nad vpisi �lanov in partnerjev za zadnja dva tedna. Vsaki�, ko se zgodi nov vpis, se podatki zabele�ijo in prika�ejo na grafu.",
	
	"22" => "Predstavitev lokacij obiskovalcev",		
	"23" => "Predstavitev urejanja �lanov",	
	"24" => "Predstavitev urejanja partnerjev",	
	"25" => "Predstavitev urejanja izgnanih �lanov",		
	"26" => "Predstavitev urejanja �lanskih datotek",
	"27" => "Predstavitev uvoza �lanov",	
	"28" => "Predstavitev urejanja tem",
	"29" => "Predstavitev urejevalnika tem",	
	"30" => "Predstavitev managerja slik teme",
	"31" => "Predstavitev urejevalnika logotipa",
	"32" => "Predstavitev Meta Oznak",	
	"33" => "Predstavitev jezikov",
	"34" => "Predstavitev urejanja Emailov",	
	"35" => "Predstavitev Email templat",		
	"36" => "Predstavitev to Email poro�il",
	"37" => "Predstavitev po�iljanja E-Zinov",
	"38" => "Predstavitev Email opominov",
	"39" => "Predstavitev Downloadanja Email naslovov",
	"40" => "Predstavitev �lanskih paketov",
	"41" => "Predstavitev pla�ilnih prehodov",
	"42" => "Predstavitev zgodovine �lanskih pla�il",
	"43" => "Predstavitev zgodovine partnerskih pla�il",
	"44" => "Predstavitev opcij prikaza",
	"45" => "Predstavitev nastavitev prikaza",
	"46" => "Predstavitev poti sistema",
	"47" => "Predstavitev slikovnega �iga",
	"48" => "Predstavitev iskalnih polj",
	"50" => "Predstavitev Koledarja dogodkov",
	"51" => "Predstavitev anket",
	"52" => "Predstavitev Foruma",
	"53" => "Predstavitev Chat sob",
	"54" => "Predstavitev FAQ",
	"55" => "Predstavitev Filtra besed",
	"56" => "Predstavitev Novic/�lankov",
	"57" => "Predstavitev Skupin",

		"22a" => "Lokacijski zemljevid ti omogo�a, da vidi�, s katere dr�ave ali regije se tvoji �lani vpisujejo.",		
		"23a" => "Orodje, ki ti omogo�a pregled nad prijavljenimi �lani. Uporabi iskalne opcije za urejanje �lanov.",	
		"24a" => "Urejevalnik partnerjev ti omogo�a pregled nad vpisanimi partnerji, njihovimi uspehi, zaslu�ki ter mnogo ve�.",	
		"25a" => "Izgnani �lani je orodje, s katerim sistem iz�ene �lane, ki posku�ajo vdreti na spletno stran ali ji �kodovati.",		
		"26a" => "�lanske datoteke je orodje, ki ti omogo�a pregled nad glasbo, videi in slikami tvojih �lanov ter njihovo urejanje.",
		"27a" => "Uvoz �lanov je orodje, ki ti omogo�a uvoz �lanov iz drugih baz podatkov - prenos opravi sistem samodejno, potem ko mu posreduje� podatke o bazi.",	
		"28a" => "Urejevalnik tem je orodje, ki ti omogo�a enostavno spreminjanje tem, le s klikom na gumb.",
		"29a" => "Uporabi urejevalnika teme za neposredno urejanje kode tvoje strani.",	
		"30a" => "Urejevalnik slik teme ti omogo�a spreminjanje ali urejanje obstoje�ih slik tvoje teme.",
		"31a" => "Logo urejevalnik ti omogo�a urejanje logotipa, dodajanje obstoje�ega ali tvojega lastnega logotipa.",
		"32a" => "Meta Oznake je orodje, ki ti omogo�a urejanje in dodajanje meta oznak na vse tvoje strani avtomatsko. ",	
		"33a" => "Urejevalnik jezikov ti omogo�a odstranjevanje, dodajanje ali urejanje jezikov spletne strani.",
		"34a" => "Email urejevalnik je orodje, ki ti omogo�a enostavno urejanje ali kreiranje unikatnih e-zinov ali email sporo�il za tvojo spletno stran.",	
		"35a" => "Predstavitev Email templat",		
		"36a" => "Predstavitev Email poro�il",
		"37a" => "Predstavitev po�iljanja e-zinov",
		"38a" => "Predstavitev Email opominov",
		"39a" => "Predstavitev Downloadanja Email naslovov",
		"40a" => "Predstavitev �lanskih paketov",
		"41a" => "Predstavitev Pla�ilnih prehodov",
		"42a" => "Predstavitev Zgodovine �lanskih pla�il",
		"43a" => "Predstavitev Zgodovine partnerskih pla�il",
		"44a" => "Predstavitev Opcij prikaza",
		"45a" => "Predstavitev Nastavitev prikaza",
		"46a" => "Predstavitev Sistemskih poti",
		"47a" => "Predstavitev Slikovnega �iga",
		"48a" => "Predstavitev Iskalnih polj",
		"50a" => "Predstavitev Koledarja dogodkov",
		"51a" => "Predstavitev Anket",
		"52a" => "Predstavitev Foruma",
		"53a" => "Predstavitev Chat sob",
		"54a" => "Predstavitev FAQ",
		"55a" => "Predstavitev Filtra besed",
		"56a" => "Predstavitev Novic/�lankov",
		"57a" => "Predstavitev Skupin",
);

$admin_login = array(

	"1" => "Admin Prijava",
	"2" => "Pozabil svoje geslo? Ni� hudega, vnesi svoj email naslov spodaj in poslali ti bomo novega.",
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
	"3" => "Paket �lanstva",
	"4" => "Po�lji Email o nadgradnji",
	"5" => "Dodaj spremembo paketa v pla�ilni sistem ",
	"6" => "SMS �tevilka",
	"7" => "SMS Krediti",
	"8" => "Nastavi Status ra�una na",	
	
	"9" => "Klikni okvir za urejanje gesla.",	
	"10" => "Osvetljeni �lani imajo druga�no ozadje v profilu.",
	"11" => "To daje �lanu privilegije moderatorja.",
	
	"12" => "partnerska pozdravna stran",	
	"13" => "Stran z banner kodo",	
	"14" => "Stran s pla�ili partnerjem",	
	"15" => "Stran s pregledom partnerskega ra�una",
	"16" => "Stran za urejanje partnerskega ra�una",
	
	"17" => "Uvozi �lane iz",	
	
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

	"1" => "Vti�niki raz�irjajo zmogljivosti programa. Ko je vti�nik instaliran, ga lahko vklopi� ali izklopi� z mo�nostmi na levi strani menu-ja.",
	"2" => "Nove vti�nike lahko pregleda� in nalo�i� v tvojem oddelku za stranke na strani proizvajalca.",
	"3" => "Ime vti�nika",
	"4" => "Podatki o vti�niku",
	"5" => "Zadnji� posodobljeno",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Pozdravljen nazaj",
	"2" => "Spodaj je hiter pregled vpisov �lanov in delovanju spletne strani za danes.",
	"3" => "Novi �lani danes",
	"4" => "Datoteke za odobritev",
	"5" => "<strong>Ne pozabi</strong> �e ne �eli� sprejemati teh opozoril, jih lahko izklju�i� v tvojih nastavitvah.",
	"6" => "Zapri Okno",

);
$admin_pop_chmod = array(

	"1" => "Napaka pri dovoljenjih datotek",
	"2" => "Datoteke na tej strani se ne morejo modificirati",
	"3" => "naslednje datoteke morajo imeti 'write' dovoljenja. �e vodi� spletno stran na Unix ali Linux gostitelju, lahko uporabi� FTP program in spremeni� CHMOD (sprememba dovoljenj) za pisanje. �e je tvoj gostitelj na Windows sistemu, ga mora� kontaktirati glede teh nastavitev.",
	"4" => "Datoteke/direktoriji, ki zahtevajo 777 dovoljenje, so:",
	"5" => "Zapri Okno",

);
$admin_pop_demo = array(

	"1" => "Demo na�in vklopljen",
	"2" => "Spremembe v tvojem sistemu NE bodo veljale v demo na�inu",
	"3" => "Nastavitve tvojega sistema so bile nastavljene v 'demo' na�inu, kar pomeni da je veliko funkcij omogo�enih le za branje.",
	"4" => "Lahko pregleduje� administratorski kot kot obi�ajno, vendar nastavitve ne bodo shranjene.",
	"5" => "<strong>Ne pozabi</strong> �e �eli� odstraniti demo omejitve, kontaktiraj administratorja.",
	"6" => "Zapri Okno",
);

$admin_pop_import = array(

	"1" => "Rezultati prenosa baze",
	"2" => "�lani so bili uspe�no uvo�eni!",
	"3" => "�lani so bili uspe�no uvo�eni iz",
	"4" => "programa. Preveri, �e so bile slike pravilno nastavljene.",
	"5" => "Mape slik so spodaj, kopirati mora� slike v program in sicer v te poti;",
	"6" => "Zapri Okno",
);

$admin_loading= array(

	"1" => "Optimiziranje tabel baze",
	"2" => "Prosimo po�akaj",

);
$admin_menu_help= array(
"1" => "Vodi� hitre pomo�i",
);

$admin_settings_extra = array(

	"1" => "Poka�i stran za iskanje",
	"2" => "Poka�i stran s kontakti",
	"3" => "Poka�i stran z ogledom",
	"4" => "Poka�i stran s FAQ",
	"5" => "Poka�i Dogodke",
	"6" => "Poka�i Skupine",
	"7" => "Poka�i Forum",
	"8" => "Poka�i Ujemanja",	
	"9" => "Poka�i Mre�o",	
	"10" => "Poka�i Partnerski sistem",
	"11" => "Poka�i SMS/Text opozorilni sistem",
	
	"12" => "Poka�i Bloge",	
	"13" => "Poka�i Chat sobe",	
	"14" => "Poka�i Instant Messenger",	
	"15" => "Poka�i verifikacijsko kodo",
	"16" => "Poka�i US ZIP kode iskanje",
	"17" => "Poka�i UK ZIP kode iskanje",
	"18" => "Poka�i MSN/Yahoo Integracijo",
	
	"19" => "Standardni �lanski paket",
		"20" => "To je paket, kateri je dolo�en �lanu ob vpisu",
	"21" => "�lani morajo nalo�iti sliko ob registraciji",
		"22" => "Ta nastavitev bo dolo�ala, ali lahko �lani presko�ijo nalaganje slike ob registraciji.",	
	"23" => "ZASTONJ NA�IN",
		"24" => "Nastavi na 'Da', �e �eli� da so funkcije dostopne vsem �lanom.",
	"25" => "VZDR�EVALNI NA�IN",
		"26" => "To bo onemogo�ilo dostop vsem, razen administratorju.",
		
	"27" => "�tevilo rezultatov iskanja na stran",
		"28" => "Nastavi �tevilo profilov, prikazanih na strani",		
	"29" => "�tevilo rezultatov ujemanja na strani",	
		"30" => "Ta izbira bo dolo�ila �tevilo prikazanih profilov na strani.",
		
	"31" => "Email Aktivacijske kode",
		"32" => "�lani bodo prejeli aktivacijsko kodo na svoj email naslov, katero bodo morali potrditi pred prvim vpisom.",
	"33" => "Ro�na odobritev �lanov",
	"34" => "Nastavi to opcijo na 'Da' ali 'Ne', �e �eli� ro�no odobriti ra�une �lanov pred prvim vpisom.",
	"35" => "Ro�na odobritev datotek",
		"36" => "Nastavi to opcijo na 'Da' ali 'Ne', �e �eli� datoteke odobriti ro�no pred prikazom",
	"37" => "Ro�na odobritev video posnetkov",
		"38" => "Nastavi to opcijo na 'Da' ali 'Ne', �e �eli� video odobriti ro�no pred prikazom(video chat vnose).",
		
	"39" => "Prika�i Video pozdrav snemalnik",
	"40" => "To omogo�a �lanom snemanje video pozdrava v profilu. Vnesti mora� svojo flash video RMS povezavo spodaj.",
	"41" => "Flash RMS povezava",
		"42" => "Potreboval bo� flash gostovanje za to opcijo",
	"43" => "Prika�i format datuma",
		"44" => "Izberi format datuma za prikaz na spletni strani",
	"45" => "Dovoli komentarje profila/datoteke",
		"46" => "Ta opcija bo omogo�ila �lanom komentiranje profilov in datotek.",
	"47" => "Prika�i Chat in IM v novem oknu",
	
	"48" => "Ta opcija bo omogo�ila prikaz Chata in IM-ja v novem oknu.",
	
	"49" => "Brskalnikom prijazno?",
		"50" => "Omogo�i to opcijo, �e gostuje� na Unix/Linux ra�unu",
	"51" => "Iskanje praznih fotk",
		"52" => "�eli�, da so �lani brez fotke prikazani v iskalnih rezultatih?.",
	"53" => "Prika�i slike zastav",
		"54" => "�eli� imeti zastave jezikov prikazane na strani?",
	"55" => "Partnerska valuta",	
	"56" => "Uporabi HTML urejevalnik",	
	"57" => "Nastavi to opcijo na 'Da' ali 'Ne', �e �eli� ro�no odobriti datoteke.",

	"58" => "Prika�i stran s �lanki",

);

$admin_billing_extra = array(

	"1" => "Nastavi to opcijo, �e �eli� da so funkcionalnosti dostopne vsem.",
	
	"2" => "Tip paketa",
	"3" => "Paket �lanstva",
	"4" => "SMS Paket",
	"5" => "Ozna�i 'Da', �e �eli� ustvariti samo SMS Paket, pri katerem lahko uporabniki kupujejo Kredite na tvoji spletni strani.",
	"6" => "Ime paketa",
		"7" => "Vnesi ime paketa, kateri bo prikazan v opisu na spletni strani.",
	"8" => "Opis",	
	"9" => "Cena",	
	"10" => "Koliko �eli� ra�unati �lanom za ta paket. Pozor: Ne vna�aj valutnih simbolov",
	"11" => "Prika�i valutno kodo",
	
	"12" => "To je koda valute, prikazana na spletni strani, to NI tvoja pla�ilna valuta - ta mora biti nastavljena v nastavitvah pla�il.",	
	"13" => "Naro�nina",	
	"14" => "Izberi Da, �e �eli� da ja to ponavljajo�e se pla�ilo.",	
	"15" => "Doba nadgradnje",
	
	"16" => "Dan",
	"17" => "Teden",
	"18" => "Mesec",
		"18a" => "Neomejeno",
	"19" => "Max sporo�il (dnevno)",
		"20" => "To je maximalno �tevilo dnevno poslanih sporo�il.",
	"21" => "Max Pome�ikov",
		"22" => "Maximalno �tevilo Pome�ikov poslanih dnevno.",	
	"23" => "Max nalaganja datotek",
		"24" => "Maximalno �tevilo datotek, ki jih �lan lahko nalo�i.",
	"25" => "Ikona povezave paketa",
		"26" => "Ta ikona paketa mora biti povezana na sliko v tvojem sistemu. Priporo�ena velikost: 28px x 90px.",
		
	"27" => "Zadnji �lan",
		"28" => "Izberi 'Da', �e �eli�, da je fotka �lana prikazana na tvoji doma�i strani.",		
	"29" => "Osvetljeno",	
		"30" => "Izberi 'Da', �e �eli�, da je ozadje �lana osvetljeno v iskalnih rezultatih.",
		
	"31" => "Ogled odraslih slik",
		"32" => "Izberi 'Da', �e �eli�, da �lani lahko vidijo odrasle slike drugih �lanov.",
	"33" => "SMS krediti",
	"34" => "To je �tevilo kreditov, dodanih �lanu med nadgradnjo paketa. Ti krediti bodo dodani �e obstoje�im kreditom na ra�unu �lana.",
	"35" => "Vidno na paketu nadgradnje"

);

$admin_mainten_extra = array(

	"1" => "Povezava",
	"2" => "Vnesi povezavo le, �e �eli� prikazati povezavo do zunanje strani",
	"3" => "RSS Novice",
	
	"4" => "Kategorija",
	"5" => "Ogledi",
	"6" => "Zajem",
	"7" => "Jezik",
	"8" => "Privat Skupina",
		
	"9" => "Spremeni Forum",	
	"10" => "Ozna�i Forum",
	"11" => "Standard Forum",
	
	"12" => "Trenutno uporablja� forum tretje stranke. Prosimo logiraj se na njihov prijavni sistem.",	
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
	"3" => "novi �lani",	
	"4" => "neodobreni �lani",	
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
	"3" => "Zgodovina pla�il",	
	"4" => "Po�lji Email",	
	"5" => "Po�lji Sporo�ilo",
	"6" => "Forum Komentarji",
	"7" => "Sporo�ilo zlorabe",	
);
?>