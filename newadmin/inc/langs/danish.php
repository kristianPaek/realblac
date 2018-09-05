<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Danish",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "UTF-8",
	"title" => "Administration"
		
);

$admin_layout = array(

	"3" => "Mine Pr&#30;ferencer",
	"4" => "Logud",

);


$admin_layout_page1 = array(

	"" => "Side Info",

		"_*" => "Admin Side Info",
		"_?" => "",

	"members" => "Medlem Statistik",
		
		"members_*" => "Medlem Statistik",
		"members_?" => "Grafen nedenfor viser antallet af nye medlemer som er blivet registreringer i l&#248;bet af de sidste to uger.",
		"members_^" => "sub",

	"affiliate" => "Partner Statistik",
 
		"affiliate_*" => "Partner Statistik",
		"affiliate_?" => "Grafen nedenfor viser antallet af nye partner registreringer i l&#248;bet af de sidste to uger.",
		"affiliate_^" => "sub",

	"visitor" => "Bes&#248;g Statistik",
 
		"visitor_*" => "Bes&#248;g Statistik",
		"visitor_?" => "Grafen nedenfor viser antallet af web sides bes&#248;ger statistikker som er blivet registreret af software p&#229; hver dag i l&#248;bet af de sidste to uger.",
		"visitor_^" => "sub",

	"maps" => "Google Kort",
 
		"maps_*" => "Bes&#248;gernes Steder med Google Kort",
		"maps_?" => "Dette afsnit giver dig mulighed for at se, hvor i verden dine medlemmer kommer fra il dit hjemmeside. Dette giver dig mulighed for at udvikle din markedsf&#248;ring og reklame kampagne mere effektivt ved at m&#229;lrette og overv&#229;ge af forskellige lande.",
 

	"adminmsg" => "Annoncering",
 
		"adminmsg_*" => "Annoncering",
		"adminmsg_?" => "Skriv din besked i feltet nedenfor og hver gang et medlem logger ind p&#229; deres konto den besked vil blive vist til dem. Dette er fantastisk til at vise service meddelelser eller hjemmesidees &#230;ndringer.",

);
 

$admin_layout_page2 = array(

	"" => "Medlemmer",

		"_$" => "halv",
		"_*" => "Administrer Medlemmer",
 

			"edit" => "Rediger Medlemmer",
	
				"edit_*" => "Rediger Medlemmer",
				"edit_?" => "Brug mulighederne nedenfor for at opdatere en medlemmers konto og profil oplysninger.",
				"edit_^" => "ingen",


			"fake" => "Falske Medlemmer",
	 
				"fake_*" => "Generer Falske Medlemmer",
				"fake_?" => "Brug mulighederne nedenfor for at generere falske medlemmer til dit hjemmeside, vil dette hj&#230;lpe din hjemmeside ser 'travlt' mens din f&#248;rste komme i gang. Dens anbefalede du bruger den samme Email adresse til alle falske medlemmer i tilf&#230;ldt du &3248;nsker at finde og slette dem p&#229; et senere tidspunkt.",
				"fake_^" => "sub",

	"banned" => "Bandlyst Medlemmer",
 
		"banned_*" => "Bandlyst Medlemmer",
		"banned_?" => "Softwaren har en indbygget hacker detektionssystem som automatisk blokke medlemmer, som fors&3248;ger at hacke dit hjemmeside. Nedenfor er alle de nuv&#230;rende medlemers (og ikke medlemers) detaljerne som fors&#248;gte ar hackke sig.",
		"banned_^" => "sub",

	"monitor" => "Overv&#229;ge Medlemmer",
 
		"monitor_*" => "Overv&#229;ge Medlemmer",
		"monitor_?" => "Fra tid til tid medlemmer kan indberette andre medlemmer for at misbruge besked system eller sende v&#230;mmeligt eller u&#248;nskede beskeder. Du kan bruge dette v&#230;rkt&#248;j til at se og overv&#229;ge medlemers indl&#230;g for at beskytte andres sikkerhed.",
		"monitor_^" => "sub",

	"import" => "Inds&#230;tte Medlemmer",
 
		"import_*" => "Inds&#230;tte Medlemmer fra Database eller CVS Filer",
		"import_?" => "Brug af mulighederne nedenfor kan du importere medlemmer til din hjemmeside fra en anden dating/community software platform eller fra en CVS backup.",
		"import_^" => "sub",
		
	"files" => "Medlems Filer", 
	"files_*" => "Medlems Album Filer",


	"addfile" => "Inds&#230;t Foto",			 
	"addfile_*" => "Inds&#230;t Foto",
	"addfile_?" => "Sommetider et medlem vil have problemer med at uploade et billede til deres profil. Brug af denne sektion kan du uploade et billede til dit medlem.",
	"addfile_^" => "sub",
			
 
	"affiliate" => "Partner",
 
		"affiliate_*" => "Partner",
		"affiliate_?" => "Brug af mulighederne nedenfor kan du styre dit hjemmesides partner.",
		 
			"addaff" => "Tilf&#248;j ny Partner",
	 
				"addaff_*" => "Tilf&#248;j/Rediger Partneres Konto",
				"addaff_?" => "Udfyld alle felterne nedenfor for at tilf&#248;je/redigere et partneres konto p&#229; din hjemmeside.",
				"addaff_^" => "sub",

			"affsettings" => "Partneres Indholdssider",
 
				"affsettings_*" => "Partneres Side Design",
				"affsettings_?" => "Brug indstillingerne nedenfor til at redigere teksten p&#229; partneres sider.",
				"affsettings_^" => "sub",

			"affcom" => "Partneres Kommissionen",
	 
				"affcom_*" => "Partners Kommissionen",
				"affcom_?" => "Her kan du indstille provisionssats for din partner. Dette betyder, at der for hvert salg foretaget af et medlem refereed til dit hjemmeside med en partner, de vil skabe den procentdel af det samlede salg nedenfor.",
				"affcom_^" => "sub",


			"affban" => "Partneres Banner",
	 
				"affban_*" => "Partneres Banner",
				"affban_?" => "Her kan du ops&#230;tte banner reklamer, der vil blive vist inden for partnerkonto for din partner til brug p&#229; deres website.",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Tema Galleri",
 
			"_*" => "Tema Galleri",
			"_?" => "Nedenfor er alle hjemmesides skabeloner, der aktuelt er installeret p&#229; dit hjemmeside. Klik p&#229; vis-billede for at &#230;ndre den skabelon p&#229; dit hjemmeside.",
			 
				
			"color" => "Farveskemaer",
		 
				"color_*" => "Farveskemaer",
				"color_?" => "Brug af mulighederne nedenfor kan du tilpasse farverne til din hjemmeside. Hvis du &#248;nsker at erstatte billeder med din egen, skal du bruge temaet billede v&#230;rkt&#248;jer.",
				"color_^" => "sub",
				
			"logo" => "Logo",
				"logo_$" => "halv",
				"logo_*" => "Logo",
				"logo_?" => "Brug valgmulighederne p&#229; denne side til at tilpasse logoet udseendet p&#229; dit hjemmeside. Du kan v&#230;lge fra en p&#229; forh&#229;nd designet logo eller uploade dit eget.",
				"logo_^" => "sub",
				
			"img" => "Tema Billede",
				"img_$" => "halv",
				"img_*" => "Tema Billede",
				"img_?" => "Billederne nedenfor er alle gemt i din skabelon image mappe. Brug indstillingerne nedenfor til at erstatte eksisterende billeder med nye, du v&#230;lger.",
				"img_^" => "sub",

			"text" => "Hjemmeside Tekst",
				"text_$" => "halv",
				"text_*" => "Hjemmeside Tekst",
				"text_?" => "Felterne nedenfor giver dig mulighed for at &#230;ndre den velkomst tekst p&#229; startsiden p&#229; dit hjemmeside. Nogle skabeloner bruge forskellige s&#230;t af ordlyden par, s&#229; du kan f&#229; brug for at ekperiementere at finde ud af, hvilken en der passer til dig.",
				"text_^" => "sub",
	
			"edit" => "Sider & Filer",
 
			"edit_*" => "Sider",
			"edit_?" => "V&#230;lg fra listen bokse nedenfor for at se indholdet af filerne p&#229; din hjemmeside. Dens anbefales at kopiere og inds&#230;tte koden i en editor s&#229;som forsiden eller Dreamweaver f&#248;r du kan redigere det og s&#230;tte det tilbage, n&#229;r din f&#230;rdige. <b>V&#230;r meget omhyggelig, n&#229;r du redigerer config eller system filer som &#230;ndringer er instant og kan ikke fortrydes.</b>",
				
	
	
				"newpage" => "Opret Side",
				"newpage_$" => "halv",
				"newpage_*" => "Opret en ny side",
				"newpage_?" => "Oprettelse af en ny side p&#229; dit hjemmeside er let. Indtast blot et ord titel i boksen nedenfor og din side vil blive skabt klar til redigering.",
				"newpage_^" => "sub",
							
				
			"meta" => "Tema Metatags",
				"meta_$" => "halv",
				"meta_*" => "Metatags Editor",
				"meta_?" => "eMeeting har et sofistikeret metatag oprettelsen system indbygget i software, du sparer tid og penge at skabe tusindvis af siden beskrivelser selv. Softwaren vil automatisk generere titel, beskrivelse og s&#248;geord metatags baseret p&#229; indhold, der vises p&#229; siden.",
				"meta_^" => "sub",

 

		
			"menu" => "Menulinje",
				"menu_$" => "halv",
				"menu_*" => "Menulinje Management",
				"menu_?" => "Brug indstillingerne nedenfor til at &#230;ndre r&#230;kkef&#248;lgen af dine medlemsoplysninger barer eller tilf&#248;je nye menupunkter. Du kan ogs&#229; indtaste eksterne links s&#229;som http://google.com som menuen link til et menupunkt, hvis du &#248;nsker at linke til et andet hjemmeside eller en side p&#229; dit hjemmeside.",
				"menu_^" => "sub",

	"manager" => "Filh&#229;ndtering",
		"manager_$" => "halv",
		"manager_*" => "Filh&#229;ndtering",
		"manager_?" => "Filh&#229;ndteringen er meget nyttigt, n&#229;r tilf&#248;jelse eller sletning af nye filer/indhold til din hjemmeside. Du kan gennemse hele hosting konto og slette filer er n&#248;dvendige.",

			"slider" => "Roterende Billeder",
				"slider_$" => "halv",
				"slider_*" => "Hjemmesides Roterende Billeder",
				"slider_?" => "Skyderen billeder er den roterende billeder vises p&#229; din startside. Brug indstillingerne nedenfor til at &#230;ndre billedet, beskrivelse og klik stand links.",
				"slider_^" => "sub",

	"languages" => "Sprog Filer",
		"languages_$" => "halv",
		"languages_*" => "Sprog Filer",
		"languages_?" => "Anf&#248;rt nedenfor er alle sproglige filer lastes p&#229; dit hjemmeside. Du kan slette et af de sprog filer, du ikke &#248;nsker at bruge, og de vil ikke blive vist p&#229; dit hjemmeside eller marker afkrydsningsfeltet for at &#230;ndre standardindstillingerne hjemmeside sprog. <b>Bem&#230;rk, skal du logge af admin og web site for at se sproglige &#230;ndringer</b>",

			"editlanguage" => "Rediger Sprog Filer",
				"editlanguage_$" => "halv",
				"editlanguage_*" => "Rediger Sprog Filer",
				"editlanguage_?" => "V&#230;r forsigtig, n&#229;r du redigerer sprog fil nedenfor, sikre at holde syntaks det samme for at undg&#229; systemfejl. Kun angive indholdet inden efter pil (&#61;&#62;) Den f&#248;rste v&#230;rdi, der skal bruges som en n&#248;gle.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Tilf&#248;j Sprog Filer",
				"addlanguage_$" => "halv",
				"addlanguage_*" => "Tilf&#248;j Sprog Filer",
				"addlanguage_?" => "Oprettelse af et nyt sprog fil vil blot kopiere en af de eksisterende, du v&#230;lger nedenfor og omd&#248;be det, kan du &#229;bne sprog fil og redigere indholdet.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Email og Nyhedsbreve",

		"_$" => "halv",
		"_*" => "Email og Nyhedsbreve",
		"_?" => "Herunder er en liste over alle de emails som er oplagret inden for systemet. System emails bruges af softwaren til at sende emails til medlemmer, n&#229;r begivenhederne sker s&#229;som under registreringen eller forsvundne adgangskode. Du kan tilpasse alle emails og oprette dine egne ved hj&#230;lp af nedenst&#229;ende muligheder",

			"add" => "Opret ny Email",
				"add_$" => "halv",
				"add_*" => "Tilf&#248;j/Rediger Ny Email",
				"add_?" => "Komplet formularerne nedenfor for at tilf&#248;je/redigere din nye email, dette vil s&#229; blive gemt i din tilpassede emailskabeloner mappe, s&#229; du kan vende tilbage til den eller sende den enhver tid du vil.",
				"add_^" => "sub",

	"welcome" => "Velkommen Email/SMS",
		"welcome_$" => "halv",
		"welcome_*" => "Ops&#230;t Velkommen Email/SMS",
		"welcome_?" => "Brug af mulighederne nedenfor kan du afg&#248;re, hvilken email og SMS-besked er sendt til det medlem, n&#229;r de f&#248;rste er logget ind.",
		"welcome_^" => "sub",

	"template" => "Email Skabeloner",
		"template_$" => "halv",
		"template_*" => "Email Skabeloner",
		"template_?" => "Anf&#248;rt nedenfor er et udvalg af skabelon, skabeloner indbygget i softwaren. Klik p&#229; et af billederne for at &#229;bne og redigere den skabelon.",
		"template_^" => "sub",

	"export" => "Hent Emailerne",

		"export_$" => "halv",
		"export_*" => "Hent Emailerne",
		"export_?" => "Brug indstillingerne nedenfor til at downloade alle dine medlems email-adresser fra databasen.",
		"export_^" => "sub",

	"sendnew" => "Send Nyhedsbreve",

		"sendnew_$" => "halv",
		"sendnew_*" => "Send Nyhedsbreve",
		"sendnew_?" => "Brug denne sektion til at begynde at sende nyhedsbreve til dine medlemmer. V&#230;lg f&#248;rst hvilke medlemmer der skal sendes til, og derefter v&#230;lge, hvilken email for at sende.",

	"send" => "Send Enkelt Email",

		"send_$" => "halv",
		"send_*" => "Send Enkelt Email",
		"send_?" => "Brug denne funktion til at sende en enkelt e-mail til et medlem ved at indtaste email-adresse nedenfor. Den email bruges til at sende emailen er den samme p&#229; din admin konto.",
		"send_^" => "sub",

	"subs" => "Email P&#229;mindelser",

		"subs_$" => "halv",
		"subs_*" => "Email P&#229;mindelser",
		"subs_?" => "Email p&#229;mindelser giver dig den mulighed at du sender emails til medlemmer, der er inden for et x antal dage for en begivenhed, fx. deres medlemskab udl&#248;ber eller har ikke tilf&#248;je et foto.",
		"subs_^" => "sub",
		
	"tc" => "Email Rapporter",
		"tc_$" => "halv",
		"tc_*" => "Email Rapporter",
		"tc_?" => "Email rapporter er genereret, n&#229;r en email er sendt, der indeholder sporingskoden. De genererer statistik over, hvor mange medlemmer &#229;bnede emails du sender.",
		"tc_^" => "sub",

			"tracking" => "Email Sporingskode",
				"tracking_$" => "halv",
				"tracking_*" => "Email Sporingskode",
				"tracking_?" => "Sporingskoden nedenfor (tracking_id) er erstattet af et gennemsigtigt billede, der er knyttet til de emails, n&#229;r de er sendt. Hvis emailen &#229;bnes, og billedet ikke er blokeret, kan man registrere den email der er blevet &#229;bnet og generere et sporingsnummer rapport for dig.",
				"tracking_^" => "sub",



	"SMSsend" => "Send SMS Beskeder",

		"SMSsend_$" => "halv",
		"SMSsend_*" => "Send SMS Beskeder",
		"SMSsend_?" => "Brug indstillingerne nedenfor til at sende SMS/SMS-beskeder til dine medlemmers mobiltelefoner.",
);

$admin_layout_page5 = array(

	"" => "Medlemskabes Pakker",

		"_$" => "halv",
		"_*" => "Medlemskabes Pakker",
		"_?" => "Anf&#248;rt nedenfor er alle nuv&#230;rende medlemskab pakker anvendt til dit hjemmeside. Dem med gr&#248;nt der er n&#248;dvendige af system til kontrol af, hvordan de bes&#248;gende og nye medlemmer er h&#229;ndteret giver dig mere kontrol over dit hjemmeside.",

			"epackage" => "Tilf&#248;j Pakke",
				"epackage_$" => "halv",
				"epackage_*" => "Tilf&#248;j/Rediger Pakke",
				"epackage_?" => "udfyld formularerne nedenfor for at tilf&#248;je eller opdatere medlemskab pakke til dit hjemmeside.",
				"epackage_^" => "sub",

			"packaccess" => "Administrer Adgang",
				"packaccess_$" => "ful",
				"packaccess_*" => "Administrer Side Adgang",
				"packaccess_?" => "Her kan du styre adgangen til hele dit hjemmeside baseret p&#229; medlemskabs pakke. <b>Bem&#230;rk: Kun kryds i boksen, hvis du ikke &#248;nsker det for at se denne side. </b>",
				"packaccess_^" => "sub",

			"upall" => "Flytte Medlemmerne",
				"upall_$" => "halv",
				"upall_*" => "Flytte Medlemmerne Mellem Pakkerne",
				"upall_?" => "Brug denne valgmulighed, hvis du &#248;nsker at overf&#248;re medlemmer fra et medlemskab pakke til et andet.",
				"upall_^" => "sub",


	"gateway" => "Betaling Gateways",

		"gateway_$" => "halv",
		"gateway_*" => "Betaling Gateways",
		"gateway_?" => "Betaling gateways giver dig mulighed for at tage betaling for dit medlemskab opgraderinger. Hvis du k&#248;rer en gratis hjemmeside kan du slukke for betalingssystem i indstillingerne omr&#229;de.",


			"addgateway" => "Tilf&#248;j Betaling Gateway",
				"addgateway_$" => "halv",
				"addgateway_*" => "Tilf&#248;j Betaling Gateway",
				"addgateway_?" => "Softwaren har en r&#230;kke betaling gateways allerede indbygget i systemet, skal du v&#230;lge den udbyder p&#229; listen herunder for at bruge denne p&#229; dit hjemmeside.",
				"addgateway_^" => "sub",


	"billing" => "Faktureringssystem",

		"billing_$" => "halv",
		"billing_*" => "Faktureringssystem",	


		"affbilling" => "Partners Fakturaoplysninger",
	
			"affbilling_$" => "halv",
			"affbilling_*" => "Partners Fakturaoplysninger", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Bannere og Reklame",

		"_$" => "halv",
		"_*" => "Bannere og Reklame",
 

			"addbanner" => "Tilf&#248;j Banner",
				"addbanner_$" => "halv",
				"addbanner_*" => "Tilf&#248;j Banner",
				"addbanner_?" => "Brug mulighederne nedenfor for at tilf&#248;je et nyt banner til din hjemmeside.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Sideindstillinger",

		"_$" => "halv",
		"_*" => "Sideindstillinger",
		"_?" => "Brug indstillingerne nedenfor til at slukke og funktioner, som du ikke &#248;nsker at bruge.",


	"op" => "Side Instillinger",

		"op_$" => "halv",
		"op_*" => "Side Ops&#230;tning",
		"op_?" => "Brug indstillingerne nedenfor til at tilpasse din hjemmeside indstillinger den m&#229;de, du &#248;nsker.",
	
		"op1" => "S&#248;g Indstillinger",
	
			"op1_$" => "halv",
			"op1_*" => "S&#248;g Indstillinger",
			"op1_?" => "Brug indstillingerne nedenfor til at tilpasse den m&#22),de din s&#248;gning sider vises hele dit hjemmeside.",
			"op1_^" => "sub",
	
		"op2" => "Medlemskab Indstillinger",
	
			"op2_$" => "halv",
			"op2_*" => "Medlemskab Indstillinger",
			"op2_?" => "Brug indstillingerne nedenfor til at tilpasse den m&#229;de, din hjemmeside medlemskab ops&#230;tningen vises.",
			"op2_^" => "sub",

		"op3" => "Flash Server Indstillinger",
	
			"op3_$" => "halv",
			"op3_*" => "Flash Server Indstillinger",
			"op3_?" => "En flash server bruges til at lagre medlems video hilsener og anvendes inden for IM og chatrum for at vise medlems videokameraer.",
			"op3_^" => "sub",

		"op4" => "API Indstillinger",
	
			"op4_$" => "halv",
			"op4_*" => "API Indstillinger", 
			"op4_^" => "sub",

		"thumbnails" => "Standard Billeder",
	
			"thumbnails_$" => "halv",
			"thumbnails_*" => "Standard Billeder", 
			"thumbnails_^" => "Anf&#248;rt nedenfor er alle nuv&#230;rende standard billeder anvendes i hele dit hjemmeside, n&#229;r medlemmer har ikke uploade deres egne billeder.",

	"email" => "Email Indstillinger",

		"email_$" => "halv",
		"email_*" => "Email Indstillinger",
		"email_?" => "Anf&#248;rt nedenfor er en liste over web site begivenheder, kan du v&#230;lge, hvilke begivenheder du vil have at systemet sende til dig en email meddelelse. Email meddelelser vil blive sendt til alle system admins, der har adgang til systemindstillinger.",

	"paths" => "Fil / Mappe Paths",

		"paths_$" => "halv",
		"paths_*" => "Fil / Mappe Paths",
		"paths_?" => "Filer og mapper stier nedenfor vedr&#248;rer de filer og mapper p&#229; din hosting-konto. Softwaren vil automatisk anvende disse under installationen imidlertid incase de er forkert kan du &#230;ndre dem under.",

	"watermark" => "Billede Vandm&#230;rke",

		"watermark_$" => "halv",
		"watermark_*" => "Billede Vandm&#230;rke",
		"watermark_?" => "Et billede vandm&#230;rke er et billede, der vises p&#229; toppen af medlem billeder, n&#229;r de vises. Dette er normalt et dit hjemmeside logo, vandm&#230;rke billeder skal v&#230;re i formatet PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Felter",

		"_$" => "halv",
		"_*" => "Profil, Registrering og S&#248;g Felter",
		"_?" => "Anf&#248;rt nedenfor er alle de nuv&#230;rende felter opf&#248;rt p&#229; dit hjemmeside. Du kan v&#230;lge at vise de omr&#229;der p&#229; s&#248;gesiden, registrering sider profil sider og selv medlem match sider. Du kan hurtigt og nemt at tilf&#248;je nye felter til dit hjemmeside ved hj&#230;lp af nedenst&#229;ende muligheder.",

		"addfields" => "Opret Nyt Felt",
	
			"addfields_$" => "halv",
			"addfields_*" => "Opret Nyt Felt",
			"addfields_?" => "Brug mulighederne nedenfor for at tilf&#248;je et nyt felt til dit hjemmeside. Et felt bruges til at give medlemmerne mulighed for at udfylde oplysninger om sig selv.",
			"addfields_^" => "sub",

		"fieldgroups" => "Administrer Grupper",
	
			"fieldgroups_$" => "halv",
			"fieldgroups_*" => "Administrer Gruppernes Felter",
			"fieldgroups_?" => "Grupper er en samling af omr&#229;der, som har et f&#230;lles tema. S&#229; for eksempel kan du oprette en gruppe kaldet 'Om mig' og inden for koncernen tilf&#248;je omr&#229;der som 'Mit Navn', 'Mit Ader' osv. <b> Hvis du sletter en gruppe med felter i dem, for de omr&#229;der, vil automatisk blive flyttet til den n&#230;ste gruppe.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Opret Ny Gruppe Felt",
	
			"addgroups_$" => "halv",
			"addgroups_*" => "Opret Ny Gruppe Felt",
			"addgroups_?" => "Et felt gruppe er en samling af felter alle sat under en st&#248;rste gruppe overskrift. Dette giver dig mulighed for at skabe masser af grupper med omr&#229;der, som er relateret til gruppen tema.",
			"addgroups_^" => "sub",




	"cal" => "Begivenhed Kalender",

		"cal_$" => "halv",
		"cal_*" => "Begivenhed Kalender",
		"cal_?" => "Begivenhederne kalender vises p&#229; dit hjemmeside for medlemmer til at oprette og f&#229; vist begivenheder. Brug indstillingerne nedenfor til at oprette, redigere og import nye begivenheder.",

		"caladd" => "Tilf&#248;j Begivenhed",
	
			"caladd_$" => "halv",
			"caladd_*" => "Tilf&#248;j/Rediger Begivenhed",
			"caladd_?" => "Udfyld felterne nedenfor for at tilf&#248;je/redigere et hjemmeside begivenhed.",
			"caladd_^" => "sub",

		"caladdtype" => "Administrer Begivenhed Type",
	
			"caladdtype_$" => "halv",
			"caladdtype_*" => "Administrer Begivenhed Type",
			"caladdtype_?" => "Brug indstillingerne nedenfor til at skabe nye typer af begivenheder, vi anbefaler at tilf&#248;je et billede til hvert arrangement for at g&#248;re dit hjemmeside ser mere professionelle.",
			"caladdtype_^" => "sub",

		"importcal" => "Inds&#230;t Begivenhed",
	
			"importcal_$" => "halv",
			"importcal_*" => "S&#248;g & Inds&#230;t Begivenhed",
			"importcal_?" => "Softwaren har en indbygget arrangementer api system. Dette giver dig mulighed for at s&#248;ge et verdensomsp&#230;ndende database over lokale og internationale begivenheder og tilf&#248;je dem direkte til dit hjemmeside.",
			"importcal_^" => "sub",


	"poll" => "Megafon",

		"poll_$" => "halv",
		"poll_*" => "Megafon",
		"poll_?" => "Brug indstillingerne nedenfor til at oprette og administrere din hjemmesides megafon/meningsm&#229;linger",

		"polladd" => "Tilf&#248;j Megafon",
	
			"polladd_$" => "halv",
			"polladd_*" => "Opret Ny Megafon",
			"polladd_?" => "Udfyld felterne nedenfor for at oprette en ny megafon for dit hjemmeside.",
			"polladd_^" => "sub",



	"forum" => "Forum",

		"forum_$" => "halv",
		"forum_*" => "Forum Kategorier",
		"forum_?" => "Brug indstillingerne nedenfor til at administrere din hjemmeside form kategori. Vi anbefaler at tilf&#248;je foto ikoner for hver kategori for at g&#248;re dit hjemmeside ser mere professionelle.",

		"forumadd" => "Tilf&#248;j Forum Kategorier",
	
			"forumadd_$" => "halv",
			"forumadd_*" => "Tilf&#248;j Forum Kategorier",
			"forumadd_?" => "Udfyld felterne nedenfor for at tilf&#248;je en ny kategori til dit hjemmeside.",
			"forumadd_^" => "sub",

		"forumchange" => "Tredjepart Forum",
	
			"forumchange_$" => "halv",
			"forumchange_*" => "Administrer Forum Integration",
			"forumchange_?" => "Softwaren har mulighed for at &#230;ndre forum bord det betyder dette at du kan v&#230;lge et af de fora anf&#248;rt nedenfor for at bruge i stedet for standard-forum Se installationsvejledningerne for hvert forum bord f&#248;r aktivering af denne funktion.",
			"forumchange_^" => "sub",

		"forumpost" => "Administrer Indl&#230;g",
	
			"forumpost_$" => "halv",
			"forumpost_*" => "Administrer Forum Indl&#230;g",
			"forumpost_?" => "Anf&#248;rt nedenfor er alle de seneste forum stillinger tilf&#248;jet af dine medlemmer. Brug indstillingerne nedenfor til at redigere eller slette emner, som er uacceptable.",
			"forumpost_^" => "sub",

	"chatrooms" => "Chatroom",

		"chatrooms_$" => "halv",
		"chatrooms_*" => "Chatroom",
		"chatrooms_?" => "Brug indstillingerne nedenfor til at oprette nye chatrum for dit hjemmeside eller redigere eksisterende.",


	"faq" => "FAQ",

		"faq_$" => "halv",
		"faq_*" => "FAQ",
		"faq_?" => "FAQ er en god m&#229;de at hj&#230;lpe medlemmer l&#230;re mere om dit hjemmeside og besvare eventuelle problemer, de m&#229;tte have. Opret din egen s&#230;t OSS og h&#229;ndtere dem ved hj&#230;lp af nedenst&#229;ende muligheder.",

		"faqadd" => "Tilf&#248;j FAQ",
	
			"faqadd_$" => "halv",
			"faqadd_*" => "Tilf&#248;j/Rediger FAQ",
			"faqadd_?" => "Udfyld felterne nedenfor for at tilf&#248;je eller redigere en FAQ.",
			"faqadd_^" => "sub",

	"words" => "Ord Filter",

		"words_$" => "halv",
		"words_*" => "Ord Filter",
		"words_?" => "Ordet filter anvendes til medlem profiler, chat og forum og vil bortfiltrere nogen af de ord, du indtaster her, og erstatte dem med stjerner (**).",



	"articles" => "Artikler",

		"articles_$" => "halv",
		"articles_*" => "Artikler",
		"articles_?" => "Artikler er en fantastisk m&#229;de at holde dine medlemmer ajour med de seneste &#230;ndringer til din hjemmeside for nyheder og begivenheder",


		"articleadd" => "Tilf&#248;j Artikel",
	
			"articleadd_$" => "halv",
			"articleadd_*" => "Oprette Ny Artikel",
			"articleadd_?" => "Udfyld felterne nedenfor for at tilf&#248;je en ny artikel til dit hjemmeside.",
			"articleadd_^" => "sub",

		"articlerss" => "Inds&#230;t RSS Artikel",
	
			"articlerss_$" => "halv",
			"articlerss_*" => "Inds&#230;t RSS Artikel",
			"articlerss_?" => "RSS links kan bruges til at importere RSS artikler direkte i en af de kategorier du har oprettet. S&#229; for eksempel vil du m&#229;ske gerne oprette en 'Nyheder' kategori og indtaste RSS feed fra et nyheder web site. Softwaren vil derefter udtr&#230;kke alle artiklerne fra RSS gebyr og tilf&#248;je dem til dit hjemmeside.",
			"articlerss_^" => "sub",

		"articlecats" => "Artikel Kategorier",
	
			"articlecats_$" => "halv",
			"articlecats_*" => "Artikel Kategorier",
			"articlecats_?" => "Brug indstillingerne nedenfor til at skabe nye artikel kategorier til din hjemmeside.",
			"articlecats_^" => "sub",


	"groups" => "F&#230;llesskabet Grupper",

		"groups_$" => "halv",
		"groups_*" => "F&#230;llesskabet Grupper",
		"groups_?" => "Brug indstillingerne nedenfor til at oprette og administrere din hjemmeside samfundsgrupper.",


	"class" => "Klassificerede Annoncer",

		"class_$" => "halv",
		"class_*" => "Klassificerede Annoncer",
		"class_?" => "Anf&#248;rt nedenfor er alle klassificerede reklamer skabt af Deres medlemmer.",


		"addclass" => "Tilf&#248;j Annoncer",
	
			"addclass_$" => "halv",
			"addclass_*" => "Tilf&#248;j/Rediger Annoncer",
			"addclass_?" => "Brug mulighederne nedenfor for at tilf&#248;je/redigere annoncer p&#229; dit hjemmeside.",
			"addclass_^" => "sub",

		"addclasscat" => "Administrer Kategorierne",
	
			"addclasscat_$" => "halv",
			"addclasscat_*" => "Administrer Kategorierne",
			"addclasscat_?" => "Brug indstillingerne nedenfor til at administrere din klassificeret annonce kategorier. Vi anbefaler at tilf&#248;je et foto ikonet for den enkelte til at g&#248;re dit hjemmeside ser mere professionelle.",
			"addclasscat_^" => "sub",

	"games" => "Spil",

		"games_$" => "halv",
		"games_*" => "Spil",
		"games_?" => "Anf&#248;rt nedenfor er alle spil i &#248;jeblikket er installeret p&#248; dit hjemmeside. Se manualen for n&#230;rmere oplysninger om installering af nye spil",

	"gamesinstall" => "Install Spil",

		"gamesinstall_$" => "halv",
		"gamesinstall_*" => "Install Spil",
		"gamesinstall_?" => "V&#230;lg det spil, som du &#248;nsker at installere. Hvis du &#248;nsker at tilf&#248;je nye spil til din hjemmeside blot uploade spillet tar filer til dit spil mappeplacering: inc/exe/Games/tar/. <b>Se manualen for n&#230;rmere oplysninger om installering af nye spil</b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administratorer",

		"_$" => "half",
		"_*" => "Admins & Moderatorer",
		"_?" => "Anf&#248;rt nedenfor er alle web site admins og moderatorer ikke herunder superbruger. Tilf&#248;j nye moderatorer ved hj&#230;lp af medlem s&#248;geside og klikke p&#229; moderator ikon ud for deres navn.",

	"pref" => "Admin Pr&#230;ferencer",

		"pref_$" => "halv",
		"pref_*" => "Admin Pr&#230;ferencer",
		"pref_?" => "Brug indstillingerne nedenfor til at tilpasse de administratorer pr&#230;ferencer.",

	"manage" => "Administrer Moderatorer",

		"manage_$" => "halv",
		"manage_*" => "Administrer webside og Moderatorer",
		"manage_?" => "En webside moderatorer kan have to roller, de kan v&#230;re et hjemmeside moderator der giver dem adgang til moderat de vigtigste hjemmeside, eller du kan give dem deres egen admin login detaljer, s&#229; de kan logge p&#229; admin omr&#229;,de og bruge admin v&#230;rkt&#248;jer.",

	"email" => "Admin Emails",

		"email_$" => "halv",
		"email_*" => "Admin Emails",
		"email_?" => "Anf&#248;rt nedenfor er alle emails sendes til admin fra hjemmesideet medlemmer.",

	"compose" => "Ny Email",

		"compose_$" => "halv",
		"compose_*" => "Ny Email",
		"compose_?" => "Brug indstillingerne nedenfor til at oprette en ny besked at sende til et medlem.",
		"compose_^" => "sub",

	"super" => "Super Bruger Logind",

		"super_$" => "halv",
		"super_*" => "Super Bruger Logind Detaljer",
		"super_?" => "V&#230;r forsigtig, n&#229;r du redigerer den konto oplysninger nedenfor, er dette den superbruger-konto, og du b&#248;r s&#248;rge adgangskoden hemmeligholdt fra andre p&#229; alle tidspunkter.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Softwareopdateringer",

		"_$" => "halv",
		"_*" => "Softwareopdateringer",
		"_?" => "Anf&#248;rt nedenfor, er den aktuelle version af din software i forhold til de senest tilg&#230;ngelige frigivelse. Hvis din version er dateret, kan du kontakte eMeeting for de nyeste opgraderinger.",

	"backup" => "Database Backup",

		"backup_$" => "halv",
		"backup_*" => "Database Backup",
		"backup_?" => "V&#230;lg en eller flere af nedenst&#229;ende tabeller til bakup din database. Det anbefales kraftigt at du bruger hosting omr&#229;de database backup-funktioner for at sikre, at alle data er modtaget.",


	"license" => "Software Licens N&#248;gle",

		"license_$" => "halv",
		"license_*" => "Software Licens N&#248;gle",
		"license_?" => "Anf&#248;rt nedenfor er din softwarelicens n&#248;gle som du skal have n&#229;r du redigerer denne software, se om den er korrekte.",

	"sms" => "SMS Kreditter",

		"sms_$" => "halv",
		"sms_*" => "SMS Kreditter",
		"sms_?" => "Anf&#248;rt nedenfor er de nuv&#230;rende samlede SMS-kreditter tilbage p&#229; din konto.",

);

$admin_layout_page11 = array(

	"" => "Software Plugins",

		"_$" => "halv",
		"_*" => "Software Plugins",
		"_?" => "Plugins forl&#230;nge og udvide funktionaliteten af eMeeting dating software. N&#229;r et plugin er installeret, kan du aktivere eller deaktivere den her ved hj&#230;lp af menupunkter til venstre.",

);


$admin_layout_nav = array(

	"1" => "Side Info",
		"1a" => "Medlem Statistik",
		"1b" => "Partner Statistik",
		"1c" => "Bes&#248;gendes Statistik",
		"1d" => "Bes&#248;gendes Steder",
	"2" => "Gamle Medlemmer",
		"2a" => "Administrer Medlemmer",
		"2b" => "Administrer Partnere",
		"2c" => "Bandlyst Medlemmer",
		"2d" => "Medlems Filer",
		"2e" => "Inds&#230;t Medlemmerne",
	"3" => "Design",
		"3a" => "Temaer",
		"3b" => "Temaer Editor",
		"3c" => "Temaer Billede Manager",
		"3d" => "Logo Editor",
		"3e" => "Metatags",	
		"3f" => "Sprog",
		"3g" => "Side Formulering",
		"3h" => "Filer Manager",
		"3i" => "Menulinje",
	"4" => "Email",
		"4a" => "Administrer Emails",
		"4b" => "Email Skabeloner",
		"4c" => "Email Rapporter",
		"4d" => "Send Enkelt Email",
		"4e" => "Email P&#229;mindelser",	
		"4f" => "Hente Emails",
		"4g" => "Send Nyhedsbreve",		
	"5" => "Fakturering",
		"5a" => "Administrer Pakker",
		"5b" => "Betalings Gateways",
		"5c" => "Faktura Historie",
		"5d" => "Partner Faktura Historie",
	"6" => "Indstillinger",
		"6a" => "Sideindstillinger",
		"6b" => "Sideinstillinger",
		"6c" => "System Paths",
		"6d" => "Foto Vandm&#230;rke",
	"7" => "Indhold",
		"7a" => "S&#248;g Felter",
		"7b" => "Begivenhed Kalender",
		"7c" => "Megafon",
		"7d" => "Forum",
		"7e" => "Chat Rooms",	
		"7f" => "FAQ",
		"7g" => "Ord Filter",
		"7h" => "Artikler / Nyheder",
		"7i" => "Grupper",
	"8" => "Tilbud",	
		"8a" => "Bannere",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Administrer Moderatorer",	
		"10a" => "Administrer Moderatorer",
		"10b" => "Super Bruger",
	"11" => "Vedligeholdelse",
		"11a" => "System Backup",
		"11b" => "Licens N&#248;le",
		"11c" => "System Opdateringer",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "System Opdateret",
	"no_update" => "System opdateret men der var intet at slette!",
	"edit" => "Rediger",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "S&#248;gning",
	"1" => "V&#230;lg Alle",
	"2" => "Frav&#230;lg Alle",
	"3" => "Godkend",
	"4" => "Suspendere",
	"5" => "Slet",	
	"6" => "Lave Featured Medlem",
	"7" => "Instillinger",	
	"8" => "Opdater",	
	"9" => "Lave Featured",
	"10" => "Fjerne Featured",	
	"11" => "Opdater Standard Sprog",
	"12" => "Send",
	"13" => "Forts&#230;t",	
	"14" => "Lave Aktiv",
	"15" => "Deaktivere",
	"16" => "Opdatere R&#230;kkef&#248;lge",
	"17" => "Opdatering Side Felter",	
	"18" => "Enable",
);

$admin_table_val = array(
	"1" => "Brugernavn",
	"2" => "K&#248;n",
	"3" => "Sidste Logind",
	"4" => "Status",
	"5" => "Pakke",
	"6" => "Opdateret",
	"7" => "Instillinger",	
	"8" => "Dato",
	"9" => "IP Adresse",
	"10" => "Hack String",	
	"11" => "Oprettelses dato",	
	"12" => "Navn",
	"13" => "Email",
	"14" => "Klik",
	"15" => "Bruger",
			
	"15" => "Kommissionen Betalt",
		
	"16" => "Besked",
	"17" => "Tid",
	"18" => "Filnavn",
	"19" => "Sidst Opdateret",	
	"20" => "Rediger",
	"21" => "Standard",	
	"22" => "ID",

	"23" => "Pris",
	"24" => "Synlig",	
	"25" => "Type",
	"26" => "Administrer Adgang",	
	"27" => "Aktiv",

	"28" => "Se Kode",
	"29" => "Felter",	
	"30" => "Partners Navn",
	"31" => "Total grund",	
	"32" => "Status",
	
	"33" => "Opgraderings Dato",
	"34" => "Udl&#248;bnings Dato",	
	"35" => "Betalingsmetode",
	"36" => "Stadig Aktiv",	
	"37" => "Password",
	"38" => "Senest Logget Ind",

	"39" => "Holdning",
	"40" => "Hits",	
	"41" => "Aktiv",
	"42" => "Vis",	
	"43" => "Titel",
	"44" => "Artikler",
	"45" => "R&#230;kkef&#248;lge",

);

$admin_search_val = array(
	"1" => "Medlem Brugernavn",
	"2" => "Alle Pakker",
	"3" => "Alle K&#248;n",
	"4" => "Per Side",
	"5" => "Bestil pr",
	"6" => "Email Adresse",
	
	"7" => "Enhver Status",
	"8" => "Aktive Medlemmer",
	"9" => "Suspenderede Medlemmer",
	"10" => "Ikke-godkendte Medlemmer",
	"11" => "Medlemmer, der &#248;nsker at annullere",
	"12" => "Alle Sider",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Administrer Alle Grupper",
	"2" => "Gruppens Navn",
	"3" => "Sprog",		
	"4" => "Administrer Emner",
	"5" => "Administrer Kategorier",	
	"6" => "Gruppe Kategori Navn",		
	"7" => "Administrer Kategorier",	
	"8" => "Navn",	
	"9" => "Count",	
	"10" => "Tilf&#248;j Artikel",	
	"11" => "Kategori",
	"12" => "Side Titel",	
	"13" => "Kort Beskrivelse",		
	"14" => "Tilf&#248;j Artikel",
	"15" => "Administrer Kategorier",
	"16" => "Felt Lister",
	"17" => "R&#230;kkef&#248;lge",
	"18" => "Sprog",
	"19" => "Liste V&#230;rdier",
	"20" => "Ny Felter",	
	
	"21" => "Felt Titel",		
	"22" => "Felttype",
		"23" => "Tekstfelt",	
		"24" => "Tekst Omr&#229;de",	
		"25" => "Listefelt",
		"26" => "Single afkrydsningsfeltet",
		"27" => "Multiple afkrydsningsfeltet",
	
	"28" => "Gruppen Navn",
	"29" => "Medtag under registreringen",
	"30" => "V&#230;lg Nedenfor",
	
	"31" => "Tilf&#248;j Gruppe",
	"32" => "Gruppen visningsvalgmulighederne",
		"34" => "Vis til alle medlemmer",
		"35" => "Vis kun for hjemmesidesudgiverne admin",
		"36" => "Vis til admin og medlem (ikke p&#229; profil)",
	"37" => "Kun",	
	"38" => "Administrer Grupper",	
	"39" => "Tilf&#248;j Begivenhed",	
	"40" => "Felts Overskrift",
	"41" => "Overskrift",		
	"42" => "Beskrivelse Tekst",
	"43" => "Overskriftes Type",	
	"44" => "S&#248;g Overskrift",		
	"45" => "Profil Overskrift",	
	"46" => "Du skal oprette en billedtekst til profilen side s&#229;som ÈJeg er en 'og en for s&#248;gesiden s&#229;som' Jeg s&#248;ger en'",	
	"47" => "Eksisterende Felt Overskrift",	
	"48" => "Flyt Felt til denne gruppe",		
	"49" => "Medlem ID",
	"50" => "Begivenheds Navn",	
	"51" => "Begivenheds Beskrivelse",		
	"52" => "Begivenheds Type",
	"53" => "V&#230;lg Kategori",	
	"54" => "V&#230;lg Type",
	"55" => "Begivenheds Tidspunkt",
	"56" => "Efterlad blank for hele dagen",
	"57" => "Begivenheds Dato",
	"58" => "M&#229;ned",	
	
	"59" => "Dag",	
	"60" => "&#229;r",
	"61" => "Land",		
	"62" => "Region",
	"63" => "Gade",	
	"64" => "By",		
	"65" => "Telefon",	
	"66" => "Email",	
	"67" => "Web side",	
	"68" => "Begivenhed Synlig for",		
		"69" => "Alle",
		"70" => "Venner",	
		
	"71" => "Tilf&#248;j Megafon",		
	"72" => "Web side Megafon Resultater",
	"73" => "Megafon navn",	
	"74" => "Svar",	
	"75" => "Foretag Active",
	
	"76" => "Tilf&#248;j Forum Topic",
	"77" => "Administrer indl&#230;g",
	"78" => "Forum Topic",	
		
	"79" => "Titel",	
	"80" => "Beskrivelse",
	"81" => "Forum indl&#230;g",		
	"82" => "Alle indl&#230;g",
	"83" => "Idag",	
	"84" => "Denne Uge",		
	"85" => "Sidste Uge",	
	"86" => "V&#230;relse Navn",	
	"87" => "Eksisterende Felt Overskrifter",	
	"88" => "V&#230;relse Password",		
	"89" => "Tilf&#248;j Ny",
	"90" => "Tilf&#248;j F.A.Q",
	
	"91" => "Tilf&#248;j Ord censure",		
	"92" => "Ord",
	
	"93" => "Godkendt",
	"94" => "Overskrift",
	"95" => "Match Overskrifter",
	"96" => "Sprog",

	"97" => "Vis",
	"98" => "Resultater",
);
$admin_advertising = array(

	"1" => "Web side Bannere",
	"2" => "Tilf&#248;j Banner",
	"3" => "Parners Banner",	
	"4" => "Tilf&#248;j / Rediger Bannere",
	"5" => "Banner Type",	
	"6" => "Web sides Banner",			
	"7" => "Partners Banner",	
	"8" => "Navn",	
	"9" => "Upload Banner",	
	"10" => "Indtast HTML",	
	"11" => "HTML Kode",
	"12" => "Upload Banner",	
	"13" => "Banner Link",		
	"14" => "Vis til",
		"15" => "Alle Medlemmer",
		"16" => "Kun Logget Ind Medlemmernes",
	
	"17" => "Side",
	"18" => "Aktiv",
	
	"19" => "&#248;verst p&#229; Siden",
	"20" => "I Midten",	
	"21" => "Venstre Side",		
	"22" => "I Bunden",
	"23" => "Lad den st&#229; tom for at bruge linket i banner kode",
	"24" => "Vis Banner",
	
);


$admin_maintenance = array(

	"1" => "K&#248;rer i &#248;jeblikket",
	"2" => "Seneste version",
	"3" => "SMS Kreditter",	
	"4" => "Resterende SMS Kreditter",	
	"5" => "K&#248;b Kreditter",	

);

$admin_admin = array(

	"1" => "Tilf&#248;j Admin",
	"2" => "Brugernavn",
	"3" => "Password",	
	"4" => "Email",
	
	"5" => "Rediger Admin Indstillinger",	
	"6" => "Fulde Navn",			
	"7" => "Adgangsniveau",	
		"8" => "Fuld adgang til systemet",	
		"9" => "Kun Medlems Adgang",	
		"10" => "Adgang Kun Design System",	
		"11" => "Adgang Kun Email System",
		"12" => "Adgang Kun Betaling System",	
		"13" => "Adgang Kun til Instilling Systemmet",		
		"14" => "Adgang Kun til Admin Systemmet",
	"15" => "Admin Icon",

	"17" => "Email Advarsler",
	"18" => "Admin Nyhed Advarsler",
	"19" => "Overf&#248;re alle medlemmer fra",
	"20" => "Til f&#248;lgende pakke",	
	"21" => "Rediger Pakker",		
	"22" => "Pakke Adgang",
	"23" => "Tilf&#248;j Pakke Konto",	
	"24" => "Administrer Pakke Adgang",
);

$admin_settings = array(

	"1" => "Vis sider",
	"2" => "Aktiveret",
	"3" => "Deaktivere",	
	"4" => "Web Paths",
	"5" => "Server Paths",	
	"6" => "Thumbnail Paths",			
	"7" => "Tilf&#248;j felt",	
	"8" => "Navn",	
	"9" => "V&#230;rdi",	
	"10" => "Type",	
	"11" => "Administrer felter",
	"12" => "Tilf&#248;j Gateways",	
	"13" => "Betalingssystem",		
	"14" => "Gateway Betaling Kode",
	"15" => "Titel",
	"16" => "Pakke Adgang",
	"17" => "Kommentar",
	"18" => "Overf&#248;re medlemmer",
	"19" => "Overf&#248;re alle medlemmer fra",
	"20" => "Til f&#248;lgende pakke",	
	"21" => "Rediger Pakker",		
	"22" => "Pakke Adgang",
	"23" => "Tilf&#248;j Pakke Konto",	
	"24" => "Administrer Pakke Adgang",
);

$admin_billing = array(

	"1" => "Tilf&#248;j Pakker",
	"2" => "Administrer Pakke Adgang",
	"3" => "Overf&#248;re Medlems Pakker",			
	"4" => "Dit hjemmeside k&#248;rer i &#248;jeblikket i<b>FRI MODE</b> derfor medlemskab pakker er blevet deaktiveret.",
	"5" => "Vil du deaktivere fri mode og vise medlemskab pakker?",	
	"6" => "DEAKTIVERE FRI MODE",		
	"7" => "Tilf&#248;j felt",	
	"8" => "Navn",	
	"9" => "V&#230;rdi",	
	"10" => "Type",	
	"11" => "Administrer felter",
	"12" => "Tilf&#248;j Gateways",	
	"13" => "Betalingssystem",		
	"14" => "Gateway Betaling Kode",
	"15" => "Titel",
	"16" => "Pakke Adgang",
	"17" => "Kommentar",
	"18" => "Overf&#248;re medlemmer",
	"19" => "Overf&#248;re alle medlemmer fra",
	"20" => "Til f&#248;lgende pakke",	
	"21" => "Rediger Pakker",		
	"22" => "Pakke Adgang",
	"23" => "Tilf&#248;j Pakke Konto",	
	"24" => "Administrer Pakke Adgang",
	
	"25" => "Afventer godkendelse",
	"26" => "Godkendt Betalinger",
	"27" => "Afvist Betalinger",
	
	"28" => "Alle Historie",
	"29" => "Aktiv Betalinger",
	"30" => "Ferdig Betalinger",
	"31" => "Aktiv Abonnementer",
	"32" => "Ferdig Abonnementer",
	"33" => "Pakkes Adgangs Kode",
	
);

$admin_email = array(

	"1" => "System Emails",
	"2" => "Nyhedsbreve",
	"3" => "Email Skabeloner",		
	"4" => "Email Editor",
	"5" => "Emne",	
	"6" => "Vis Email",	
	"7" => "Til Email",
	
	"8" => "Send til",	
		"9" => "Alle medlemmer",	
		"10" => "Medlemskab Abonnenter Pakker",	
		"11" => "Aktiv / Suspenderede / ikke-godkendte medlemmer",
	"12" => "Til Pakker",	
	"13" => "Medlemsstatus",		
	"14" => "V&#230;lg Nyhedsbrev",	
	
	"15" => "Opret ny",
	"16" => "Se ny oprettet",
	"17" => "Email Sporingskode",
	"18" => "Opret ny",
	"19" => "Se ny oprettet",
	"20" => "Email Sporingskode",
		"21" => "HTML Koden nedenfor",
		
	"22" => "Email Sporings Resultater",
	"23" => "Der var ingen rapporter fundet.",
	"24" => "V&#230;lg rapport",
	
	"25" => "Send P&#229;mindelser til alle medlemmer, der har mellem",
	"26" => "og",
	"27" => "dage",
	"28" => "Dage tilbage af deres opgradereret abonnement",
	"29" => "V&#230;lg Email til at Send:",
	"30" => "Hente",
	"31" => "V&#230;lg Pakke",
	"32" => "Sporingskoden",
	
	
);

$admin_design = array(

	"1" => "Hente Temaer",
	"2" => "Nuv&#230;rende skabelone",
	"3" => "Brug denne skabelon",	
	"4" => "Side Metatags",
	"5" => "Side Titel",	
	"6" => "Beskrivelse",
	"7" => "N&#248;gleord",
	"8" => "hjemmesidessider",	
	"9" => "Indholdssider",	
	"10" => "Custom Sider",	
	"11" => "Opret side",
	"12" => "FTP Path",	
	"13" => "Tema Filerne",		
	"14" => "Indholdssider",	
	"15" => "Custom Sider",


	"16" => "Tilf&#248;j Sprog",
	"17" => "Ny Filnavn",	
	"18" => "V&#230;lg fil for at kopiere",
			
	"19" => "Rediger Sprog Fil",	
	"20" => "Custom Side",

	"21" => "Skrifttype",
	"22" => "Skriftst&#248;rrelse",	
	"23" => "Skriftsfarve",
	"24" => "bredde",	
	"25" => "h&#248;jde",		
	"26" => "Tilf&#248;j Logo Tekst",
	"27" => "Canvas Type",	
		"28" => "Brug Blank Canvas",
		"29" => "Beholde Nuv&#230;rende Design",	
		"30" => "Upload min egen baggrund / logo",	

	"31" => "Opret ny side",
	"32" => "Ny Side Navn",	
		"33" => "Side navne b&#248;r v&#230;re meget kort og kun Žt ord. EG. Links, artikler, nyheder, forum osv.",
	"34" => "Tilf&#248;j Menu Fane?",	
		"35" => "Nej! M&#229; ikke oprette en fane",		
		"36" => "Ja. F&#248;je det til medlemmerne omr&#229;de",
		"37" => "Ja. L&#230;g det til de vigtigste hjemmesidessider, ikke medlemmerne omr&#229;de sider.",
			"38" => "Hvis der v&#230;lges et nyt medlem fanen vil blive frembragt p&#229; dit hjemmeside",
);

$admin_overview = array(

	"1" => "Meddelelse",
	"2" => "Total medlemmer",
	"3" => "Denne uge",
	"3a" => "I dag",
	"4" => "Nylige hjemmeside Aktivitet",
	"5" => "Webside Rapporter",
	
	"6" => "Unique Websidenes bes&#248;ger i l&#248;bet af de sidste to uger",
	"7" => "Ny medlem tilmeldinger i de sidste 2 uger",
	"8" => "Medlems K&#248;n Statistik",	
	"9" => "Medlems Alder Statistik",
	
	"10" => "New Partner tilmeldinger i de sidste 2 uger",
	"11" => "Bes&#248;gendes Kort Indstillinger",
	"12" => "Indtast din Google API-n&#248;gle i feltet ovenfor.",	
	"13" => "Du kan k&#248;be en licens n&#248;gle fra kundens omr&#229;de af vores hjemmeside",	
	
	"14" => "Filter S&#248;geresultater",	
	"15" => "Alle Filer",
	
);
$admin_members = array(

	"1" => "Alle Medlemmer",
	"2" => "Moderatorer",
	"3" => "Aktiv",
	"4" => "Suspenderet",
	"5" => "Ikke-godkendte",
	"6" => "&#248;nsker at annullere",
	"7" => "Online Nu",
	"8" => "Medlems Logind Aktivitet",	
	"9" => "Rediger Medlemmer",	
	"10" => "Tilf&#248;j Partner",
	"11" => "Partners Bannere",
	"12" => "Partner Sider",	
	"13" => "Tilf&#248;j Partner",	
	"14" => "Partner Indstillinger",	
	"15" => "Alle Filer",
	"16" => "Billeder",
	"17" => "Videoer",
	"18" => "Musik",
	"19" => "YouTube",
	"20" => "Ikke-godkendte",
	"21" => "Featured",
	"22" => "Upload fil",	
	"23" => "Fil",
	"24" => "Type",
	"25" => "Brugernavn",
	"26" => "Titel",
	"27" => "Komentar",
	"28" => "G&#248;r den til Standard",		
	"29" => "Medlems Logind Aktivitet",	
	"30" => "Partner Tilmeldt af",
	"31" => "Featured",
	"a5" => "Brugernavn",
	"a6" => "Password",
	"a7" => "Fornavn",
	"a8" => "Efternavn",
	"a9" => "Virksomhedens navn",
	"a10" => "Adresse",
	"a11" => "Gade",
	"a12" => "By",
	"a13" => "Region",
	"a14" => "Postnummer",
	"a15" => "Land",
	"a16" => "Telefon",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Web sides adresse",
	"a20" => "Skal betales til",
);


// HELP FILES
$admin_help = array(

	"a" => "Kom i gang nu",
	"b" => "Nej tak",
	"c" => "Forts&#230;t",	
	"d" => "Luk vindue",
	
	
	"1" => "Indledning",
	"2" => "Har du brug for hj&#230;lp til at komme i gang?",
	"3" => "Hej",	
	
	"4" => "og velkommen til administration omr&#229;de! Da dette er f&#248;rste gang du har logget ind p&#229; administrationen omr&#229;de anbefales det at du tager et par minutter til at f&#248;lge guiden nedenfor til at hj&#230;lpe dig i gang!",
	"5" => "Vores Introduktion Wizard vil guide dig igennem grundl&#230;ggende ops&#230;tning skridt og f&#229; dig op at k&#248;re p&#229; ingen tid.",	
	"6" => "<strong>(NB)</strong> Du kan tage denne side enhver tid ved at klikke p&#229; hurtig hj&#230;lp guide til venstre menulinjer.",
	
	"7" => "Kom i gang",
	"8" => "Velkommen til din administration omr&#229;de!",	
	"9" => "Velkommen til din administratorkonto for",	
	"10" => "Denne software giver dig mulighed for at h&#229;ndtere alle de forskellige aspekter af dit hjemmeside, herunder Deres medlemmer, arkiver, sikkerhed, e-mail, plugins, og en hel del mere.",	
	"11" => "Dette at komme i gang guiden vil pr&#230;sentere dig for nogle af tankerne bag web site forvaltning og giver dig mulighed for at konfigurere nogle grundl&#230;ggende indstillinger for dit hjemmeside, s&#229; du kan begynde at bringe trafik (bes&#248;gende) til dit hjemmeside.",
	"12" => "<strong>(Husk)</strong> Til enhver tid, kan du lukke dette vindue ved hj&#230;lp af knappen Luk og komme tilbage senere ved at klikke p&#229; hurtig hj&#230;lp vejledning i menulinjen til venstre.",
		
	"13" => "Introduktion til din administration omr&#229;de!",		
	"14" => "Softwaren administration omr&#229;de er Èweb-baseret, som betyder, at du kan f&#229; adgang til og administrere din hjemmeside overalt i verden med en internetforbindelse. Enkel klik p&#229; browseren :",	
	"15" => "og logge ind med din admin login oplysninger.",
	"16" => "Klik her for at bogm&#230;rke dette link nu.",
	
	"17" => "Introduktion til dit betjeningspanel.",	
	"18" => "Softwaren betjeningspanel giver dig et hurtigt overblik over dit hjemmeside ydeevne, kan du l&#230;se software bebudelse's, se medlems tilmelding historie, se medlem og partners Statistik diagrammer og mere.",			
	"19" => "Alle medlem information er lagret i MySQL-database:",	
	"20" => "Introduktion til hjemmeside statistik.",
	"21" => "Softwaren statistikker giver dig en visuel repr&#230;sentation af dine medlemsoplysninger og partner tilmelding historie over en to ugers periode. Hver gang et medlem eller partner slutter sig til dit hjemmeside klokkesl&#230;t og dato registreres og vises ind p&#229; grafer.",
	
	"22" => "Introduktion til bes&#248;gendes steder",		
	"23" => "Introduktion til administration af dine medlemmer",	
	"24" => "Introduktion til administration af din partner",	
	"25" => "Introduktion til administration af din forbudt medlemmer",		
	"26" => "Introduktion til administration af din medlems filer",
	"27" => "Introduktion til importerere medlemmer",	
	"28" => "Introduktion til web sides temaer",
	"29" => "Introduktion til Tema Editor",	
	"30" => "Introduktion til Tema Billede Manager",
	"31" => "Introduktion til Logo Editor",
	"32" => "Introduktion til Metatags",	
	"33" => "Introduktion til Sprog",
	"34" => "Introduktion til Administrer Emails",	
	"35" => "Introduktion til Administrer Emails",		
	"36" => "Introduktion til Email-rapporter",
	"37" => "Introduktion til Send Nyhedsbreve",
	"38" => "Introduktion til Email P&#229;mindelser",
	"39" => "Introduktion til Hentning af Email-adresser",
	"40" => "Introduktion til Medlemskab Pakker",
	"41" => "Introduktion til Betaling Gateways",
	"42" => "Introduktion til Medlemskab Fakturerings Historie",
	"43" => "Introduktion til Partner Fakturerings Historie",
	"44" => "Introduktion til visningsvalgmulighederne",
	"45" => "Introduction til Side Instillinger",
	"46" => "Introduction til System Paths",
	"47" => "Introduktion til Vandm&#230;rke",
	"48" => "Introduktion til S&#248;gning Omr&#229;der",
	"50" => "Introduktion til Begivenheds Kalendar",
	"51" => "Introduction til Megafon",
	"52" => "Introduction til Forum",
	"53" => "Introduction til Chat Rooms",
	"54" => "Introduction til FAQ",
	"55" => "Introduction til Ord Censure",
	"56" => "Introduktion til Nyheder / Artikler",
	"57" => "Introduktion til Grupper",

		"22a" => "Den bes&#248;gende steder kort observationsomr&#229;der placeringen af hver af dine web site medlemmer giver dig mulighed for at se et overblik hvilke lande dine medlemmer er fra.",		
		"23a" => "Administrer medlemmer v&#230;rkt&#248;j giver dig mulighed for at se alle de medlemmer, der har tilsluttet sig til dit hjemmeside. Brug s&#248;gemulighederne til at filtrere gennem dine medlemmer til at redigere, opdatere og slette medlemes profiler.",	
		"24a" => "Den partner manager v&#230;rkt&#248;j giver dig mulighed for at se et overblik over alle dine web site partner, her kan du se, redigere og slette partner fra dit hjemmeside og godkende nye partner tilmeldninger.",	
		"25a" => "De forbudte medlemmer afsnittet opbevarer alle registre og ikke-medlemmer, som fors&#248;ger at 'hack' p&#229; dit hjemmeside, softwaren automatisk forbud formodede medlemmer fra at se din hjemmeside for at forhindre dem for&#229;rsager dit hjemmeside nogen skade.",		
		"26a" => "Medlem filer v&#230;rkt&#248;j giver dig mulighed for at se alle dine web sides medlemers uploads, musik, video billeder osv.. Klik p&#229; et af billederne for at redigere billedet ved hj&#230;lp af vores indbygget v&#230;rkt&#248;j.",
		"27a" => "Medlem import v&#230;rkt&#248;j giver dig mulighed for at importere medlemmer fra andre software-applikationer. Du skal blot indtaste den database oplysninger til hjemmesideet, hvor din gamle system er gemt, og det vil overf&#248;re det til din nye hjemmeside.",	
		"28a" => "hjemmesideet temasektionen giver dig mulighed for at &#230;ndre web site skabelon og design p&#229; dit hjemmeside &#248;jeblikkeligt! Du skal blot klikke p&#229; det tema, du &#248;nsker at bruge, og din hjemmeside vil automatisk blive opdateret.",
		"29a" => "Temaet Editor v&#230;rkt&#248;jer giver dig mulighed for at redigere hjemmesidessider direkte fra administrationen omr&#229;de. Du kan ogs&#229; kopiere og inds&#230;tte koden p&#229; din egen hjemmeside editor og s&#230;t den tilbage igen, n&#229;r du er f&#230;rdig med redigeringen.",	
		"30a" => "Temaet Billede Manager v&#230;rkt&#248;j giver dig mulighed for at &#230;ndre den nuv&#230;rende billeder p&#229; dit hjemmeside ved at uploade nye. Nye billeder vil erstatte det nuv&#230;rende billede og vil &#248;jeblikkeligt anvendes til dit hjemmeside.",
		"31a" => "Logo Editor v&#230;rkt&#248;j giver dig mulighed for at &#230;ndre designet p&#229; din nuv&#230;rende logo. Du kan ogs&#229; oprette dit eget logo ved hj&#230;lp af din egen billedredigeringsfunktioner pakke og derefter v&#230;lge 'Upload mit eget logo' for at tilf&#248;je dette til dit hjemmeside.",
		"32a" => "Metataggene funktion giver dig mulighed for at redigere alle de metatags for hjemmesidessider genereres af softwaren. Du kan tilf&#248;je din egen titel, n&#248;gleord og beskrivelser for hver af dine hjemmesidessider. ",	
		"33a" => "Sprog forvaltningsredskab giver dig mulighed for at slette alle sprog fra dit hjemmeside, som du ikke &#248;nsker at bruge, og ogs&#229; tilf&#248;je dit eget sprog.",
		"34a" => "E-mail forvaltningsv&#230;rkt&#248;jer giver dig mulighed for at oprette dit eget system og nyhedsbrev e-mails for at give din hjemmeside en enest&#229;ende personlige.",	
		"35a" => "Introduktion til Email Skabeloner",		
		"36a" => "Introduktion til Email-rapporter",
		"37a" => "Introduktion til Send Nyhedsbreve",
		"38a" => "Introduktion til Email P&#229;mindelser",
		"39a" => "Introduktion til Hentning af Email-adresser",
		"40a" => "Introduktion til Medlemskabs Pakker",
		"41a" => "Introduktion til Betaling Gateways",
		"42a" => "Introduktion til Medlemskab Fakturerings Historie",
		"43a" => "Introduktion til Partners Fakturerings Historie",
		"44a" => "Introduction til Side Ops&#230;ttning",
		"45a" => "Introduction til Sideinstillinger",
		"46a" => "Introduction til System Paths",
		"47a" => "Introduktion til Vandm&#230;rke",
		"48a" => "Introduktion til S&#248;gning Omr&#229;der",
		"50a" => "Introduktion til Begivenheds Kalendar",
		"51a" => "Introduction til Megafon",
		"52a" => "Introduction til Forum",
		"53a" => "Introduction til Chat Rooms",
		"54a" => "Introduction til FAQ",
		"55a" => "Introduction til Ord Censure",
		"56a" => "Introduktion til Nyheder / Artikler",
		"57a" => "Introduktion til Grupper",
);

$admin_login = array(

	"1" => "Admin Logind",
	"2" => "Glemt password? V&#230;r ikke bekymret, skal du indtaste din e-mail adresse nedenfor og vi sender dig en ny.",
	"3" => "Email Adresse",
	"4" => "Tekst Nedenfor",
	"5" => "Nulstil Password",
	"6" => "Indtast dine oplysninger nedenfor for at logge ind",
	"7" => "Brugernavn",
	"8" => "Password",	
	"9" => "Licens",	
	"10" => "Sprog",
	"11" => "Logind",
	"12" => "Logget IP er",	
	"13" => "Glemt Password",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Fremh&#230;vet Profil",
	"2" => "Webside Moderator",
	"3" => "Medlemskabs Pakker",
	"4" => "Send Opgraderet Email",
	"5" => "Tilf&#248;j pakke &#230;ndring i faktureringssystem ",
	"6" => "SMS Nummer",
	"7" => "SMS Kreditter",
	"8" => "Indstil kontostatus til",	
	
	"9" => "Klik p&#229; boksen for at redigere password.",	
	"10" => "Fremh&#230;vede medlemmer har en anden baggrund i s&#248;geresultaterne.",
	"11" => "Dette giver medlem adgang til at administrere din hjemmeside som en moderator.",
	
	"12" => "partners velkommen side",	
	"13" => "Banner Kode Vis side",	
	"14" => "Partners Betaling Side",	
	"15" => "Partners opsummeringsside",
	"16" => "Rediger Partners kontooplysninger",
	
	"17" => "Importering af medlemmer fra",	
	
	"18" => "Alder",			
	"19" => "File Visninger",	
	"20" => "Privat",
	"21" => "Offentligt",
	
	"22" => "album",		
	"23" => "Adult Indhold",	
	"24" => "Offentligt indhold",	
	
	"25" => "St&#248;rrelse",		
	"26" => "Flytte filer til Adult Albums",
	"27" => "Adult Filer",

);

$admin_selection = array(

	"1" => "Ja",
	"2" => "Nej",
	
	"3" => "til",
	"4" => "Fra",
);

$admin_plugins = array(

	"1" => "Plugins udvider funktionaliteten af eMeeting dating software. N&#229;r et plugin er installeret, du m&#229; aktivere den eller deaktivere here p&#229; menu p&#229; venstre side.",
	"2" => "Du kan se og downloade ny software plugins fra kundens omr&#229;de af vores hjemmeside.",
	"3" => "Plugin Navn",
	"4" => "Plugin Detaljer",
	"5" => "Sidst opdateret",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Velkommen tilbage",
	"2" => "nedenfor er et hurtigt overblik over ny medlems tilmeldinger og hjemmesidesformidling pr&#230;stationer for i dag.",
	"3" => "Nye medlemmer i dag",
	"4" => "Filer til at godkende",
	"5" => "<strong>Huske</strong> Hvis du ikke &#248;nsker at modtage disse Velkommen indberetninger, n&#229;r du logger ind p&#229; den admin omr&#229;de, kan du sl&#229; dem fra n&#229;r som helst &#230;ndre dine admin pr&#230;ferencer.",
	"6" => "Luk vindue",

);
$admin_pop_chmod = array(

	"1" => "Filrettigheder Fejl",
	"2" => "Filerne p&#229; denne side kan ikke &#230;ndres",
	"3" => "f&#248;lgende filer/mapper er n&#248;dt til at have 'skrive' tilladelse s&#230;t, f&#248;r du kan redigere dem. Hvis du k&#248;rer p&#229; en Linux eller Unix webhostingfirma, du kan bruge dit FTP-program og bruge 'chmod' ('Skift Mode') funktion er at yde skrive tilladelser. Hvis din host k&#248;rer Windows, er du n&#248;dt til at kontakte dem om at oprette skrive tilladelser p&#229; disse filer/mapper.",
	"4" => "De filer/mapper, der kr&#230;ver chmod 777 er",
	"5" => "Luk vindue",

);
$admin_pop_demo = array(

	"1" => "Demo Mode Aktiveret",
	"2" => "&#230;ndringer i dit system, vil ikke blive gemt i demo-mode",
	"3" => "Dit system adgangsindstillinger er blevet indstillet til 'demo-mode', hvilket betyder adgang til en masse funktioner og funktionalitet inde fra admin omr&#229;de vil v&#230;re begr&#230;nset til 'read only'.",
	"4" => "Du kan bladre rundt i admin omr&#229;de som normale dog eventuelle &#230;ndringer du foretager vil ikke blive gemt i dette gang.",
	"5" => "<strong>Huske</strong> Hvis du &#248;nsker at fjerne demo mode begr&#230;nsning p&#229; din konto, bedes du kontakte dit system administration for flere detaljer.",
	"6" => "Luk vindue",
);

$admin_pop_import = array(

	"1" => "Database Transfer Resultater",
	"2" => "medlemmer er importeret!",
	"3" => "medlemmer er importeret fra",
	"4" => "software. F&#248;lg venligst nedenst&#229;ende vejledning for at sikre din medlems billeder er opdateret korrekt.",
	"5" => "eMeeting billede mappe er nedenfor, skal du kopiere billeder fra gamle hjemmeside til nye;",
	"6" => "Luk vindue",
);

$admin_loading= array(

	"1" => "Optimering af Database Tabeller",
	"2" => "Vent venligst",

);
$admin_menu_help= array(
"1" => "Hurtig Hj&#230;lpe Guide",
);

$admin_settings_extra = array(

	"1" => "Vise S&#248;gnings Side",
	"2" => "Vis Kontakt Side",
	"3" => "Vis Tour Side",
	"4" => "Vis FAQ Side",
	"5" => "Vis Begivenhed",
	"6" => "Vis Gruppe",
	"7" => "Vis Forum",
	"8" => "Vis Matches",	
	"9" => "Vis Netverk",	
	"10" => "Vis Partner System",
	"11" => "Vis SMS / Text Besked P&#229;minedelse System",
	
	"12" => "Vis Blogs",	
	"13" => "Vis Chat Rooms",	
	"14" => "Vis Instant Messenger",	
	"15" => "Vis Registrering Verifikation Billede",
	"16" => "Vis UK Postnummer",
	"17" => "Vis US Postnummer",
	"18" => "Vis MSN/Yahoo Integration",
	
	"19" => "Standard Medlemskabs Pakke",
		"20" => "Dette er den medlemskab pakke som medlemmer er tilmeldt som standard",
	"21" => "Medlemmerne skal uploade et billede",
		"22" => "S&#230;t dette vil v&#230;re afg&#248;rende, hvis medlemmer f&#229;r lov til at springe den mulighed for at uploade et billede under registreringen.",	
	"23" => "FRI MODE",
		"24" => "S&#230;t dette til 'Ja', hvis du &#248;nsker alle de funktioner, som din hjemmeside skal v&#230;re tilg&#230;ngelig ved alle.",
	"25" => "VEDLIGEHOLDELSE MODE",
		"26" => "Dette vil stoppe al adgang til din hjemmeside for medlemmer og ikke-medlemmer og kun tillade admin's, der har logget p&#229; admin omr&#229;de til at gennemse hjemmesideet.",
		
	"27" => "Antal s&#248;geresultater pr side",
		"28" => "V&#230;lg det antal profiler pr side, du &#248;nsker at blive vist",		
	"29" => "Antal matcher resultater p&#229; Oversigtsside",	
		"30" => "V&#230;lg det antal profiler pr side, du &#248;nsker at blive vist.",
		
	"31" => "Email aktiveringskoder",
		"32" => "Der vil blive sendt en aktiveringskode til medlemmernes e-mail som skal godkendes, f&#248;r de kan logge ind.",
	"33" => "Manuelt Godkend Medlemmer",
	"34" => "Sat til 'ja' eller 'nej', afh&#230;ngigt af, hvis du &#248;nsker at manuelt kontrollere medlem regnskaber, f&#248;r de kan logge ind.",
	"35" => "Manuelt Godkend Filer",
		"36" => "Sat til 'ja' eller 'nej', afh&#230;ngigt af, hvis du &#248;nsker at manuelt kontrollere filer",
	"37" => "Manuelt Godkend Video Optagelser",
		"38" => "Sat til 'ja' eller 'nej', alt hvis du vil manuelt kontrollere medlem udsendelser (video chat feeds).",
		
	"39" => "Vis Video Hilsen Optagelser",
	"40" => "Det gjorde det muligt for medlemmerne at registrere deres egen video budskab til deres profil. Du skal indtaste dit flash video RMS forbindelse strengen nedenfor.",
	"41" => "Flash RMS Forbindelsesstyring String",
		"42" => "Du skal have en flash-hosting-konto for at bruge denne",
	"43" => "Vis Dato Format",
		"44" => "V&#230;lg den dato format du &#248;nsker at blive vist p&#229; dit hjemmeside",
	"45" => "Tillad Profil / Fil Komentar",
		"46" => "Aktiver denne indstilling, hvis du &#248;nsker medlemerne ken skrive kommentarer p&#229; profiler og filer.",
	"47" => "Vis Chat og IM i separat vindue",
	
	"48" => "Aktiver denne indstilling, hvis du &#248;nsker chatrum og IM pop up's til at &#229;bne i et nyt vindue.",
	
	"49" => "S&#248;gning Engine Friendly?",
		"50" => "Aktiver denne indstilling, hvis du er p&#229; Linux eller Unix hosting konto og bruger den standard .htaccess fil",
	"51" => "S&#248;g Blank Billeder",
		"52" => "&#248;nsker du, at medlemmer som ikke har tilf&#248;jet et billede til at blive vist i s&#248;geresultaterne?.",
	"53" => "Vis Flag Billede",
		"54" => "Sat til 'ja' eller 'nej', hvis du &#248;nsker at have det sprog flag vises p&#229; dit hjemmeside.",
	"55" => "Partners Valuta",	
	"56" => "Brug HTML Editor",	
	"57" => "Sat til 'ja' eller 'nej', afh&#230;ngigt af, hvis du &#248;nsker at manuelt kontrollere filer, f&#248;r visning",

	"58" => "Vis artikl side",

);

$admin_billing_extra = array(

	"1" => "S&#230;t dette til 'Ja', hvis du &#248;nsker alle de funktioner, som din hjemmeside har skal v&#230;re tilg&#230;ngelig.",
	
	"2" => "Pakke Type",
	"3" => "Medlemskabs Pakke",
	"4" => "SMS Pakke",
	"5" => "V&#230;lg Ja, hvis du vil oprette en SMS eneste pakke, der skal bruges til at k&#248;be ekstra SMS krediteringer p&#229; din hjemmeside.",
	"6" => "Pakke Navn",
		"7" => "Indtast et navn for denne pakke, som vil blive vist p&#229; dit abonnement side.",
	"8" => "Beskrivelse",	
	"9" => "Pris",	
	"10" => "Hvor meget har du lyst til at opkr&#230;ve betaling for medlemmer for at abonnere p&#229; denne pakke? NB. Indtast ikke valutasymboler",
	"11" => "Vis Valutakode",
	
	"12" => "Dette er den valuta-kode, der vil blive vist p&#229; dit hjemmeside, er det ikke anvendes til din betaling valuta, dette skal s&#230;ttes i din betaling indstillinger.",	
	"13" => "Abbonnement",	
	"14" => "V&#230;lg Ja, hvis du &#248;nsker dette for at v&#230;re et tilbagevendende betaling.",	
	"15" => "Opgraderings Periode",
	
	"16" => "Dag",
	"17" => "Uge",
	"18" => "M&#229;ned",
		"18a" => "Ubegr&#230;nset",
	"19" => "Max Beskeder (dagligt)",
		"20" => "Dette er det maksimale antal beskeder medlemmer kan sende per dag.",
	"21" => "Max Blink",
		"22" => "Maksimalt antal blink et medlem med denne pakke kan sende hver dag.",	
	"23" => "Max Fil upload",
		"24" => "Maximum number of files a member  can upload.",
	"25" => "Pakke Ikon Link",
		"26" => "Pakken ikon link er n&#248;dt til at v&#230;re et link til et billede p&#229; din hjemmeside. Anbefalet st&#248;rrelse: 28px x 90px.",
		
	"27" => "Featured Medlem",
		"28" => "V&#230;lg Ja, hvis du vil have at medlemmernes fotografier blive vist p&#229; forsiden af din hjemmeside.",		
	"29" => "Fremh&#230;vet",	
		"30" => "V&#230;lg Ja, hvis du vil gerne have at medlemmerne med denne pakke har et fremh&#230;vet baggrund i s&#248;geresultaterne.",
		
	"31" => "Se Adult Billeder",
		"32" => "V&#230;lg Ja, hvis du vil gerne have at medlemmerne med denne pakke kunne se medlemmers adult billeder.",
	"33" => "SMS Kreditter",
	"34" => "Dette er antallet af SMS-kreditter tilf&#248;jet til medlemmerne, n&#229;r de er blevet opgraderet til denne pakke. Dette vil blive tilf&#248;jet til deres nuv&#230;rende bel&#248;b, hvis de allerede har kreditter.",
	"35" => "Synlige p&#229; opgraderings pakker"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Kun angive et link, hvis du &#248;nsker at linke til en ekstern hjemmeside",
	"3" => "RSS Nyheder",
	
	"4" => "Kategori",
	"5" => "Visninger",
	"6" => "Caption",
	"7" => "Sprog",
	"8" => "Private Gruppe",
		
	"9" => "Skift Forum Board",	
	"10" => "V&#230;lg Forum Board",
	"11" => "Standard Forum",
	
	"12" => "Du bruger i &#248;jeblikket en tredjemand forum. Please login til deres admin omr&#229;de til at administrere din forum.",	
	"13" => "Password"
);

$admin_set_extra1 = array(

	"1" => "Tillad Photo / Image uploads",
	"2" => "Tillad videooverf&#248;rsler",
	"3" => "Tillad Musik uploads",	
	"4" => "Tillad YouTube uploads",	
);

$admin_alerts = array(

	"1" => "Indberetninger",
	"2" => "nye bes&#248;ger",
	"3" => "nye medlemmer",	
	"4" => "ikke-godkendte medlemmer",	
	"5" => "ikke-godkendte filer",
	"6" => "nye opgraderinger",	
);

$lang_members_nn = array(

	"0" => "Medlem Misbrug Monitor",
	"1" => "Brugernavn eller ID",
	"2" => "Ingen Chatoversigt Found",	
);

$members_opts = array(

	"1" => "Rediger profil",
	"2" => "File Uploads",
	"3" => "Faktureringsindstillinger Historie",	
	"4" => "Send Email",	
	"5" => "Send Message",
	"6" => "Forum indl&#230;g",
	"7" => "Besked Misbrug",	
);
?>