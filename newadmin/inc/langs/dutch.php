<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Dutch",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "UTF-8",
	"title" => "Administratie Gedeelte"
		
);

$admin_layout = array(

	"3" => "Mijn voorkeuren",
	"4" => "Log uit",

);


$admin_layout_page1 = array(

	"" => "Dashboard",

		"_*" => "Admin Dashboard",
		"_?" => "",

	"members" => "Leden Statistieken",
		
		"members_*" => "Leden Statistieken",
		"members_?" => "The grafiek laat zien hoeveel nieuwe leden er bij zijn gekomen de laatste 2 weken.",
		"members_^" => "sub",

	"affiliate" => "Affiliate Statistieken",
 
		"affiliate_*" => "Affiliate Statistieken",
		"affiliate_?" => "De grafiek laat zien hoeveel nieuwe affiliates zich hebben aangemeld de afgelopen twee weken.",
		"affiliate_^" => "sub",

	"visitor" => "Bezoeker statistieken",
 
		"visitor_*" => "Bezoeker statistiekens",
		"visitor_?" => "De grafiek laat zien hoeveel website bezoekers zijn getraceerd via de software, elke dag sinds de laatste twee weken.",
		"visitor_^" => "sub",

	"maps" => "Google Maps",
 
		"maps_*" => "Bezoeker Locaties met Google Maps",
		"maps_?" => "Deze sectie laat zien van waar in de wereld je leden naar je site toekomen. Hier kun je je advertentie technieken verbeteren door te kijken hoe je effectiever kunt adverteren.",
 

	"adminmsg" => "Web Site Aankondiging",
 
		"adminmsg_*" => "Web Site Aankondiging",
		"adminmsg_?" => "Geef je bericht in het vak hieronder weer en elke keer als een lid zich aanmeldt, op hun rekening, het bericht wordt weergegeven aan hen. Dit is goed voor het tonen van dienst aankondigingen of wijzigingen op de website.",

);
 

$admin_layout_page2 = array(

	"" => "Leden",

		"_$" => "half",
		"_*" => "Beheer leden",
 

			"edit" => "Edit leden Details",
	
				"edit_*" => "Edit lid",
				"edit_?" => "Gebruik de onderstaande opties om een leden-account en profiel gegevens bij te werken.",
				"edit_^" => "geen",


			"fake" => "Fake leden",
	 
				"fake_*" => "Maak Fake leden",
				"fake_?" => "Gebruik de onderstaande opties om nep-leden te genereren voor uw website, dit zal helpen om uw web site er 'druk' uit te laten zien, als je net begint. Het is aanbevolen  hetzelfde e-mailadres te gebruiken voor alle nep-leden van je website indien je ze later terug wenst te vinden, om te verwijderen op een later tijdstip.",
				"fake_^" => "sub",

	"banned" => "Gebande leden",
 
		"banned_*" => "Gebande leden",
		"banned_?" => "De software heeft een ingebouwde hacker detectie systeem dat automatisch alle leden blokkeert  die proberen om uw website te hacken. Hieronder staan ​​alle huidige lidstaten (en geen lid) details voor hack pogingen.",
		"banned_^" => "sub",

	"monitor" => "Monitor leden",
 
		"monitor_*" => "Monitor leden",
		"monitor_?" => "Van tijd tot tijd kunnen leden rapporteren of er andere leden misbruik maken van  het berichten systeem of bv voor het verzenden van vervelende of ongewenste berichten. U kunt met deze tool bekijken en controleren of er nieuwe berichten zijn, om zo de veiligheid van anderen te beschermen..",
		"monitor_^" => "sub",

	"import" => "Importeer Leden",
 
		"import_*" => "Importeer leden van een Database of CVS File",
		"import_?" => "Met behulp van de onderstaande opties, kunt  u leden importeren van uw website van bv een andere dating / community software platform, die je hebt en wilt overzetten naar dit systeem, of van een CVS back-up.",
		"import_^" => "sub",
		
	"files" => "Leden Files", 
	"files_*" => "Leden Album Files",


	"addfile" => "Upload foto",			 
	"addfile_*" => "Upload een foto",
	"addfile_?" => "Soms heeft een lid problemen met het uploaden van een foto op je website, hier kun je dat zelf doen als zij u contacteren en een foto aan u verzenden via email.",
	"addfile_^" => "sub",
			
 
	"affiliate" => "Web Site Affiliates",
 
		"affiliate_*" => "Web Site Affiliates",
		"affiliate_?" => "Bij deze opties hieronder kun je web site affiliates beheren.",
		 
			"addaff" => "Voeg nieuwe Affiliate toe",
	 
				"addaff_*" => "Voeg toe/Edit Affiliate Account",
				"addaff_?" => "Vul hieronder alle velden in  om / een affiliate account te bewerken op uw website.",
				"addaff_^" => "sub",

			"affsettings" => "Affiliate inhoud pagina",
 
				"affsettings_*" => "Affiliate Pagina Design",
				"affsettings_?" => "Gebruik de onderstaande opties om de tekst te bewerken op uw affiliate pagina's.",
				"affsettings_^" => "sub",

			"affcom" => "Affiliate Commissies",
	 
				"affcom_*" => "Affiliate Commissies",
				"affcom_?" => "Hier kunt u de commissie tarieven voor uw affiliates bewerken en veranderen. Dit betekent dat zij voor elke verkoop die door een affiliate refereert naar uw website, zij een bepaald percentage zullen verdienen..",
				"affcom_^" => "sub",


			"affban" => "Affiliate Banners",
	 
				"affban_*" => "Affiliate Banners",
				"affban_?" => "Hier kun je de banner advertenties bijwerken, die worden weergegeven in de affiliate account voor uw affilates om te gebruiken op <br />
hun website(s).",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Thema Gallery",
 
			"_*" => "Thema Gallery",
			"_?" => "Hieronder zijn alle website templates die momenteel zijn geïnstalleerd op uw website. Klik op het voorbeeld om het thema direct te wijzigen op uw website..",
			 
				
			"color" => "Kleuren Schema's",
		 
				"color_*" => "Kleur Schema's",
				"color_?" => "Met behulp van de onderstaande opties kun je de kleurenschema's voor uw website veranderen en bijwerken. Als u foto's wilt vervangen door uw eigen foto's, gebruik dan de thema afbeelding tools.",
				"color_^" => "sub",
				
			"logo" => "Web Site Logo",
				"logo_$" => "half",
				"logo_*" => "Web Site Logo",
				"logo_?" => "Gebruik de opties op deze pagina om het logo aan te passen op uw website. U kunt kiezen uit een vooraf ontworpen logo of je eigen.",
				"logo_^" => "sub",
				
			"img" => "Thema Foto's",
				"img_$" => "half",
				"img_*" => "Thema Foto's",
				"img_?" => "De foto's hieronder zijn allemaal opgeslagen in je template map met afbeeldingen. Gebruik de onderstaande opties om bestaande beelden te vervangen door nieuwe, die u selecteert.",
				"img_^" => "sub",

			"text" => "Home Pagina Tekst",
				"text_$" => "half",
				"text_*" => "Home Pagina Tekst",
				"text_?" => "Bij onderstaande velden kunt u de welkomst tekst, op de startpagina van uw website wijzigen. Sommige templates maken gebruik van verschillende sets van formulerings woorden of zinnen, zodat u soms moet experimenteren om uit te vinden welke de juiste is voor u.",
				"text_^" => "sub",


			"terms" => "Website T&C",
				"terms_$" => "half",
				"terms_*" => "Website Algemene Voorwaarden",
				"terms_?" => "Bewerk het onderstaande veld, om de website bepalingen en voorwaarden aan te passen. Deze worden vervolgens weergegeven op het registreerformulier tijdens de aanmeldings pagina.",
				"terms_^" => "sub",
	
			"edit" => "Pages & Files",
 
			"edit_*" => "Web Site Pagina's",
			"edit_?" => "Kies uit de keuzelijsten hieronder om de inhoud van de bestanden op uw website te bewerken. Het is aanbevolen om deze codes in een speciaal programma te bewerken zoals bv dreamweaver. <b> Alstublieft, wees voorzichtig bij het bewerken van de config of systeembestanden, de veranderingen zijn direct en kunnen niet ongedaan gemaakt worden.</a>",
				
	
	
				"newpage" => "Creëer Pagina",
				"newpage_$" => "half",
				"newpage_*" => "Creëer een nieuwe Pagina",
				"newpage_?" => "Het creëren van een nieuwe pagina op uw website is eenvoudig. Geef simpelweg een titel in het Invoerschema en je pagina wordt aangemaakt en is klaar om te bewerken.",
				"newpage_^" => "sub",
							
				
			"meta" => "Thema Meta Tags",
				"meta_$" => "half",
				"meta_*" => "Meta Tag Editor",
				"meta_?" => "Onze software heeft een verfijnd meta tag functie ingebouwd, in de software. Het bespaart u tijd en geld voor het creëren van duizenden pagina beschrijvingen jezelf. De software zal automatisch de titel, beschrijvingen en keyword meta tags generen op basis van de inhoud die wordt weergegeven op de pagina.",
				"meta_^" => "sub",

 

		
			"menu" => "Menu Balken",
				"menu_$" => "half",
				"menu_*" => "Menu Balk Management",
				"menu_?" => "Gebruik de onderstaande opties om de volgorde van de leden menubalken te veranderen of nieuwe menu-items toe te voegen. U kunt ook externe links, zoals bv http://google.com als menu link of toevoegen of bv voor een menu-item als u naar een andere website of pagina link op uw website wilt verwijzen.",
				"menu_^" => "sub",

	"manager" => "Bestand Manager",
		"manager_$" => "half",
		"manager_*" => "Bestand Manager",
		"manager_?" => "De file manager is erg handig bij het toevoegen of verwijderen van nieuwe bestanden / inhoud van uw website. U kunt bladeren door de gehele hosting account en bestanden verwijderen.",

			"slider" => "Roterende Foto's",
				"slider_$" => "half",
				"slider_*" => "Home Pagina Roterende Foto's",
				"slider_?" => "De slider foto's zijn de roterende afbeeldingen op uw homepagina. Gebruik de onderstaande opties om de afbeelding en / of omschrijving te veranderen en de klikbare linken te wijzigen.",
				"slider_^" => "sub",

	"languages" => "Taal Bestanden",
		"languages_$" => "half",
		"languages_*" => "Taal Bestanden",
		"languages_?" => "Hieronder zijn alle taal bestanden geladen op uw website. U kunt elk van de taal bestanden die u niet wilt gebruiken aanvinken en zij zullen niet worden weergegeven op uw website of vink het vakje aan om de standaard-website taal te wijzigen. <b> Let op, u moet uitloggen van de admin en website om de taal veranderingen te zien</b>",

			"editlanguage" => "Bewerk taalbestand",
				"editlanguage_$" => "half",
				"editlanguage_*" => "Bewerk taalbestand",
				"editlanguage_?" => "Wees voorzichtig bij het bewerken van het taalbestand hieronder, zorg ervoor dat de syntaxis behouden blijft zoals het is om systeem fouten te voorkomen. Alleen de inhoud bewerken na de pijl (=>) De eerste waarde wordt gebruikt als een belangrijke keyfunctie voor de website!.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Voeg taalbestand toe",
				"addlanguage_$" => "half",
				"addlanguage_*" => "Voeg taalbestand toe",
				"addlanguage_?" => "Het creëren van een nieuw taal bestand kan gewoon door een van de bestaande hieronder te kiezen en het een andere taal naam te geven, bv dutch, hierna kunt u vervolgens het taal bestand openen en de inhoud ervan bewerken.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Email en Nieuwsbrieven",

		"_$" => "half",
		"_*" => "Email en Nieuwsbrieven",
		"_?" => "Hieronder vindt u een overzicht van alle e-mails die momenteel zijn opgeslagen in het systeem. De systeem e-mails worden gebruikt door de website software, om e-mails te versturen naar de leden, wanneer gebeurtenissen plaatsvinden, zoals bij de registratie of bv een verloren wachtwoord. U kunt alle e-mails bijwerken en je eigen gebruikersopties veranderen of bijwerken",

			"add" => "Creëer Nieuwe Mail",
				"add_$" => "half",
				"add_*" => "Maak /Edit Nieuwe Email",
				"add_?" => "Vul onderstaande formulieren in, om uw nieuwe e-mail te bewerken, deze zal dan worden opgeslagen in uw eigen e-mail templates map, zodat u deze standaard template elke keer kunt gebruiken om te versturen op elk gewenst moment.",
				"add_^" => "sub",

	"welcome" => "Welkomst Email/ SMS",
		"welcome_$" => "half",
		"welcome_*" => "Set up Welkomst Email/ SMS",
		"welcome_?" => "Met behulp van de onderstaande opties kunt u beslissen welke e-mail en SMS-bericht wordt verzonden naar leden wanneer ze zich voor het eerst aanmelden.",
		"welcome_^" => "sub",

	"template" => "Email Templates",
		"template_$" => "half",
		"template_*" => "Email Templates",
		"template_?" => "Hieronder is een selectie van de template templates ingebouwd in de website software. Klik op een van de foto's en bewerk het sjabloon.",
		"template_^" => "sub",

	"export" => "Download Emails",

		"export_$" => "half",
		"export_*" => "Download Emails",
		"export_?" => "Gebruik de onderstaande opties om al uw leden e-mailadressen te downloaden uit de database.",
		"export_^" => "sub",

	"sendnew" => "Verstuur Nieuwsbrieven",

		"sendnew_$" => "half",
		"sendnew_*" => "Verstuur Nieuwsbrieven",
		"sendnew_?" => "Gebruik deze sectie om te beginnen met het versturen van nieuwsbrieven naar uw leden. Selecteer eerst aan welke leden u de nieuwsbrief naar wenst te versturen en selecteer daarna welke e-mail u wilt verzenden.",

	"send" => "Stuur een Email",

		"send_$" => "half",
		"send_*" => "Stuur een Email",
		"send_?" => "Gebruik deze optie om een email te sturen naar een lid door het invoeren van het e-mailadres hieronder. De e-mail die gebruikt wordt is dezelfde als vermeld op uw admin account.",
		"send_^" => "sub",

	/*"auto" => "Email Scheduler",

		"auto_$" => "half",
		"auto_*" => "Automatic Email Scheduler",
		"auto_?" => "Automatic emails are emails that are sent out by the software on a timely manner such as once a day, week, month etc. You can setup such emails below.",
		"auto_^" => "sub",*/

	"subs" => "Email Herinneringen",

		"subs_$" => "half",
		"subs_*" => "Email herinneringen",
		"subs_?" => "Email herinneringen kun je gebruiken om leden welke een x aantal dagen gratis lid zijn uit te nodigen om lid te worden of om mee te doen met een evenement oid.",
		"subs_^" => "sub",
		
	"tc" => "Email Rapporten",
		"tc_$" => "half",
		"tc_*" => "Email Rapporten",
		"tc_?" => "Email rapporten worden gegenereerd wanneer u een e-mail verzonden met daarin de conversiecode. Ze genereren statistieken van hoeveel leden de e-mails openden die u verzendt.",
		"tc_^" => "sub",

			"tracking" => "Email Tracking Code",
				"tracking_$" => "half",
				"tracking_*" => "Email Tracking Code",
				"tracking_?" => "rapporten worden gegenereerd wanneer een e-mail verzonden wordt met daarin de conversiecode. Ze genereren statistieken van hoeveel tracking codes hieronder (tracking_id) worden vervangen door een transparante afbeelding, die is bevestigd aan de e-mails als ze worden verzonden. Als de e-mail wordt geopend en het beeld niet geblokkeerd, kan het systeem de e-mail registreren die is geopend en hierdoor een tracking rapport voor je generen.",
				"tracking_^" => "sub",



	"SMSsend" => "Verstuur SMS Berichten",

		"SMSsend_$" => "half",
		"SMSsend_*" => "Verstuur SMS Berichten",
		"SMSsend_?" => "Gebruik de onderstaande opties om SMS / SMS-berichten te versturen naar uw leden via de mobiele telefoon.",
);

$admin_layout_page5 = array(

	"" => "Lidmaatschapsniveaus",

		"_$" => "half",
		"_*" => "lidmaatschapsniveaus",
		"_?" => "Hieronder zijn alle huidige leden pakketten van toepassing op uw website. De -groen gemarkeerden- zijn vereist door het systeem, om te bepalen hoe bezoekers en nieuwe leden worden behandeld en geven u meer controle over uw website.",

			"epackage" => "Voeg pakket toe",
				"epackage_$" => "half",
				"epackage_*" => "Voeg toe/ verander pakket",
				"epackage_?" => "Vul onderstaande formulieren in om een pakket toe te voegen of het lidmaatschap pakket te updaten voor uw website.",
				"epackage_^" => "sub",

			"packaccess" => "Toegang beheren",
				"packaccess_$" => "full",
				"packaccess_*" => "Pagina toegang beheren",
				"packaccess_?" => "Hier kunt u de toegang tot uw gehele website beheren  op basis van het lidmaatschap pakket. <b> Opmerking: Vink alleen vink het vakje aan als u niet wilt dat een lid  deze pagina kan bekijken. </b>",
				"packaccess_^" => "sub",

			"upall" => "Transporteer leden",
				"upall_$" => "half",
				"upall_*" => "Transporteer ledennaar pakketten",
				"upall_?" => "Gebruik deze optie als je wilt dat de leden van het ene lidmaatschapspakket naar een ander niveau verplaatst worden.",
				"upall_^" => "sub",


	"gateway" => "Betalings opties",

		"gateway_$" => "half",
		"gateway_*" => "Betalings opties",
		"gateway_?" => "Betalings opties kunt u betalingen van uw lidmaatschapspakketten aanmaken. Als u werkt met een gratis web site kunt u dit uitschakelen bij het betalingsverkeer bij de instellingen.",


			"addgateway" => "Voeg betalings optie toe",
				"addgateway_$" => "half",
				"addgateway_*" => "Voeg betalings optie toe",
				"addgateway_?" => "Het website systeem heeft een aantal betalings mogelijkheden al ingebouwd in het systeem, selecteert u de bank of paypall uit de onderstaande lijst om dit te gebruiken op uw website.",
				"addgateway_^" => "sub",


	"billing" => "Betalings Systeem",

		"billing_$" => "half",
		"billing_*" => "Betalings Systeem",	


		"affbilling" => "Affiliate betalings History",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Affiliate betalings History", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banners en Advertenties",

		"_$" => "half",
		"_*" => "Banners en Advertenties",
 

			"addbanner" => "Plaats een Banner",
				"addbanner_$" => "half",
				"addbanner_*" => "Plaats een Banner",
				"addbanner_?" => "Gebruik de optie hier onder om een nieuwe banner toe te voegen aan uw website.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Scherm instellingen",

		"_$" => "half",
		"_*" => "Scherm instellingen",
		"_?" => "Gebruik de opties hieronder om de website mogelijkheden uit te zetten omdat je ze niet wenst te gebruiken.",


	"op" => "Scherm Opties",

		"op_$" => "half",
		"op_*" => "Scherm Opties",
		"op_?" => "Gebruik de opties hier onder om je website instellingen zo te bewerken zoals jij dit wenst.",
	
		"op1" => "Zoek instellingen",
	
			"op1_$" => "half",
			"op1_*" => "Zoek  scherm instellingen",
			"op1_?" => "Gebruik de onderstaande opties om de wijze waarop uw zoekpagina's worden weergegeven op uw website aan te passen.",
			"op1_^" => "sub",
	
		"op2" => "Lidmaatschap instellingen",
	
			"op2_$" => "half",
			"op2_*" => "Lidmaatschap instellingen",
			"op2_?" => "Gebruik de onderstaande opties om de wijze waarop uw website lidmaatschap instellingen laat ziend.",
			"op2_^" => "sub",

		"op3" => "Flash server instellen",
	
			"op3_$" => "half",
			"op3_*" => "Flash Server instellingen",
			"op3_?" => "Een flash-server wordt gebruikt om  ledenvideo opnames op te slaan en wordt gebruikt binnen de IM en chat room om de aangesloten videocamera's weer te geven.",
			"op3_^" => "sub",

		"op4" => "API Settings",
	
			"op4_$" => "half",
			"op4_*" => "API Instellingen", 
			"op4_^" => "sub",

		"thumbnails" => "Standaard Thumbnails",
	
			"thumbnails_$" => "half",
			"thumbnails_*" => "Standaard Thumbnails", 
			"thumbnails_^" => "Hieronder staan alle standaard afbeeldingen,gebruikt in uw website als leden geen eigen foto uploaden.",

	"email" => "Email Instellingen",

		"email_$" => "half",
		"email_*" => "Email Instellingen",
		"email_?" => "Hieronder vind je een lijst van de website gebeurtenissen, je kunt kiezen van welke gebeurtenissen het systeem u een email stuurt. E-mail notificaties worden verzonden aan alle systeembeheerders die toegang hebben tot de systeeminstellingen.",

	"paths" => "File / Folder Paden",

		"paths_$" => "half",
		"paths_*" => "File / Folder Paden",
		"paths_?" => "De bestanden en mappen paden hieronder hebben betrekking op de bestanden en mappen op uw hosting account. De software zal automatisch de instellingen verzorgen, tijdens de installatie.deze echter van toepassing, maar als ze niet correct zijn kun je ze hieronder alsnog wijzigen.",

	"watermark" => "Foto Watermerk",

		"watermark_$" => "half",
		"watermark_*" => "Foto Watermerk",
		"watermark_?" => "Een fotowatermerk is een plaatje dat geplaatst wordt op de bovenkant van ledenfoto's als ze te zien zijn. Vaak is dit een websitelogo, watermerk fplaatjes moeten in het formaat PNG zijn en 8 bit.",


);


$admin_layout_page8 = array(

	"" => "Web Site velden",

		"_$" => "half",
		"_*" => "Profiel, Registratie en zoek velden",
		"_?" => "Hieronder zie je alle huidige velden die vermeld staan op uw website. Je kunt kiezen om de velden op de zoekpagina, registratiepagina's, profielpagina's en zelfs de leden overeenkomen's weer te geven. U kunt snel en eenvoudig nieuwe velden toevoegen aan uw website met behulp van de onderstaande opties.",

		"addfields" => "Creëer nieuw veld",
	
			"addfields_$" => "half",
			"addfields_*" => "Creëer nieuw veld",
			"addfields_?" => "Gebruik de onderstaande opties om een ​​nieuw veld toe te voegen aan uw website. Een veld wordt gebruikt om de informatie voor de leden aan te vullen.",
			"addfields_^" => "sub",

		"fieldgroups" => "Beheer groepen",
	
			"fieldgroups_$" => "half",
			"fieldgroups_*" => "Beheer groepen",
			"fieldgroups_?" => "Groepen zijn een verzameling velden, die een gemeenschappelijk thema hebben. Dus je hebt bijvoorbeeld een groep genaamd 'Over mij' en binnen de groep heb je dan velden die je kunt toevoegen zoals 'Mijn naam', 'Mijn leeftijd' enz. <b> Als u een groep met velden verwijderd, worden de velden automatisch verplaatst naar de volgende groep.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Creëer Nieuw Groepsveld",
	
			"addgroups_$" => "half",
			"addgroups_*" => "Creëer Nieuw Groepsveld",
			"addgroups_?" => "Een groeps veld is een verzameling velden samen gebracht onder een titel voor de hoofdgroep. Dit stelt u in staat om veel groepen te maken met velden die verband houden met het groeps thema.",
			"addgroups_^" => "sub",




	"cal" => "Evenementen Kalender",

		"cal_$" => "half",
		"cal_*" => "Evenementen Kalender",
		"cal_?" => "De evenementen kalender wordt weergegeven op uw website,voor de leden om advertenties van evenementen te creëren en om evenementen te bekijken. Gebruik de onderstaande opties voor het creëren, bewerken en importeren van nieuwe evenementen.",

		"caladd" => "Plaats evenement",
	
			"caladd_$" => "half",
			"caladd_*" => "Plaats of bewerk een evenement",
			"caladd_?" => "Bewerk de velden hieronder of een evenement te bewerken of te plaatsen.",
			"caladd_^" => "sub",

		"caladdtype" => "Beheer de evenementen",
	
			"caladdtype_$" => "half",
			"caladdtype_*" => "Beheer de evenementen",
			"caladdtype_?" => "Gebruik de opties beneden om nieuwe evenement types te plaatsen het is een goed idee om een plaatje bij elk evenement te plaatsen zodat uw website er 
			professioneler uit ziet.",
			"caladdtype_^" => "sub",

		"importcal" => "Importeer Evenementen",
	
			"importcal_$" => "half",
			"importcal_*" => "Zoek & Importeer Evenementen",
			"importcal_?" => "De software heeft een ingebouwd gebeurtenissen api systeem. Hiermee kunt u een wereldwijde database van lokale en internationale evenementen zoeken en direct toe  voegen aan uw website.",
			"importcal_^" => "sub",


	"poll" => "Web Site Poll",

		"poll_$" => "half",
		"poll_*" => "Web Site Poll",
		"poll_?" => "Gebruik de opties hier onder om een poll te maken of om een poll te bewerken",

		"polladd" => "Plaats een Poll",
	
			"polladd_$" => "half",
			"polladd_*" => "Maak een nieuwe poll",
			"polladd_?" => "Maak een nieuwe poll aan hieronder.",
			"polladd_^" => "sub",



	"forum" => "Web Site Forum",

		"forum_$" => "half",
		"forum_*" => "Web Site Forum Categorieen",
		"forum_?" => "Gebruik onderstaande opties om uw website forum categorieen te beheren. Het is aan te raden om foto pictogrammen voor elke categorie toe te voegen om uw website er meer professioneel uit te laten zien.",

		"forumadd" => "Plaats Forum Categorie",
	
			"forumadd_$" => "half",
			"forumadd_*" => "Plaats Forum Categorie",
			"forumadd_?" => "Vul onderstaande velden om een ​​nieuwe categorie toe te voegen aan uw website.",
			"forumadd_^" => "sub",

		"forumchange" => "Derde groep Forum",
	
			"forumchange_$" => "half",
			"forumchange_*" => "Beheer Forum Integratie",
			"forumchange_?" => "De software heeft de mogelijkheid voor u om het forum  besturingssysteem te wijzigen, dit betekent  dat u kunt kiezen voor een van de forums hieronder om in de plaats van het standaard forum te gebruiken, en verwijzen naar de installatie handleidingen voor elk forum. Houd voor het inschakelen van deze functie de instructies voor het te implanteren forum goed in de gaten!.",
			"forumchange_^" => "sub",

		"forumpost" => "Beheer berichten",
	
			"forumpost_$" => "half",
			"forumpost_*" => "Beheer berichten",
			"forumpost_?" => "Hieronder zie je alle recente forum berichten geplaatst door.Gebruik hier de mogelijkheid om de berichten bij te werken of te verwijderen.",
			"forumpost_^" => "sub",

	"chatrooms" => "Web Site Chatroom",

		"chatrooms_$" => "half",
		"chatrooms_*" => "Web Site Chatroom",
		"chatrooms_?" => "Gebruik de opties hier onder om nieuwe chatrooms te maken voor je website of om bestaande chatrooms bij te werken of te veranderen.",


	"faq" => "Web Site FAQ",

		"faq_$" => "half",
		"faq_*" => "Web Site FAQ",
		"faq_?" => "Web site FAQ is een geweldige manier om leden te helpen informatie te krijgen over uw website en beantwoord alle problemen die zij zouden kunnen tegenkomen. Maak je eigen FAQ en beheer ze met behulp van de onderstaande opties.",

		"faqadd" => "Add FAQ",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Bewerk of voeg een FAQ toe",
			"faqadd_?" => "Vul onderstaande velden in om uw FAQ te bewerken of om iets toe te voegen.",
			"faqadd_^" => "sub",

	"words" => "Woord Filter",

		"words_$" => "half",
		"words_*" => "Woord Filter",
		"words_?" => "Het woord filter wordt toegepast op leden profielen, IM en het forum en zal een van de woorden die u hier invoert filteren en vervangen met sterren.(**).",



	"articles" => "Web Site Artikelen",

		"articles_$" => "half",
		"articles_*" => "Web Site Artikelen",
		"articles_?" => "Web site artikelen zijn een goede manier om je leden up to date te houden met de laatste veranderingen aan de website bv,  of om datingverhalen te schrijven van leden die bv een fijn contact hebben opgebouwd dankzij uw website, of gewoon voor nieuws of meetings",


		"articleadd" => "Plaats Artikel",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Maak een nieuw artikel",
			"articleadd_?" => "Plaats hieronder uw artikel voor de website.",
			"articleadd_^" => "sub",

		"articlerss" => "Import RSS Artikelen",
	
			"articlerss_$" => "half",
			"articlerss_*" => "Import RSS Artikelen",
			"articlerss_?" => "De RSS linken kun je gebruiken om RRS artikelen direct te importenOf in een categorie die je hebt aangemaakt. Bv je kunt een nieuws categorie maken en dan daar de rrs feed van een nieuwswebsite plaatsen. De website zal dit direct op de website tonen.",
			"articlerss_^" => "sub",

		"articlecats" => "Artikel Categorie",
	
			"articlecats_$" => "half",
			"articlecats_*" => "Artikel Categorie",
			"articlecats_?" => "Gebruik de opties hier onder om een nieuw artikel categorie toe te voegen aan je website.",
			"articlecats_^" => "sub",


	"groups" => "Community Groepen",

		"groups_$" => "half",
		"groups_*" => "Community Groepen",
		"groups_?" => "Gebruik de opties hieronder om je community groepen te beheren of om ze aan te maken.",


	"class" => "Portaal voor advertenties",

		"class_$" => "half",
		"class_*" => "Portaal voor advertenties",
		"class_?" => "Zie hieronder de lijsten voor het Portaal voor advertenties en de linken die leden hebben aangemaakt.",


		"addclass" => "Plaats advertenties",
	
			"addclass_$" => "half",
			"addclass_*" => "Plaats of bewerk advertenties",
			"addclass_?" => "Gebruik de opties hieronder om uw advertenties op uw website te bewerken of  toe te voegen.",
			"addclass_^" => "sub",

		"addclasscat" => "Beheer de Categorieen",
	
			"addclasscat_$" => "half",
			"addclasscat_*" => "Beheer de Categorieen",
			"addclasscat_?" => "Gebruik de opties hier onder om uw advertenties categorieen te beheren bij te werken of toe te voegen. Het is een goed idee om een foto icoon toe te voegen om te website er iets interessanter/ aantrekkelijker uit te laten zien.",
			"addclasscat_^" => "sub",

	"games" => "Web Site Games",

		"games_$" => "half",
		"games_*" => "Web Site Games",
		"games_?" => "Hieronder zie je  alle games die op je website zijn geinstalleerd. Bekijk de gebruiksaanwijzing voor details of over hoe je nieuwe games kunt installeren.",

	"gamesinstall" => "Installeer Game",

		"gamesinstall_$" => "half",
		"gamesinstall_*" => "Installeer Games",
		"gamesinstall_?" => "Selecteer de games hieronder welke je wenst te installeren. Wil je nieuwe games installeren op je website, dan moet je de game tar files uploaden naar je website in de gamefolder locatie: inc/exe/Games/tar/. <b>Bekijk de beschrijving voor meer details over hoe je nieuwe games installeerd</b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administrators",

		"_$" => "half",
		"_*" => "web site Admin's & Moderators",
		"_?" => "Hieronder zie je alle  web site admins en moderators, exclusief de hoofdgebruiker. Plaats hier nieuwe moderators door de leden zoek pagina te gebruiken en te klikken op de moderator icoon naast hun naam.",

	"pref" => "Admin Instellingen",

		"pref_$" => "half",
		"pref_*" => "Admin Instellingen",
		"pref_?" => "Gebruik de opties hier onder om de administrator voorkeuren en instellingen te bewerken.",

	"manage" => "Beheer de Moderators",

		"manage_$" => "half",
		"manage_*" => "Beheer de website Moderators",
		"manage_?" => "Een website moderator kan twee rollen hebben, bv de website moderator, die hen in staat stelt tot toegang tot de belangrijkste opties van de  website of slechts een matige, of u kunt hen ook voorzien van hun eigen admin login-gegevens, zodat ze kunnen inloggen op het admin gedeelte en de admin tools gebruiken..",
		"manage_^" => "sub",

	"email" => "Admin Emails",

		"email_$" => "half",
		"email_*" => "Admin Emails",
		"email_?" => "Hieronder zie je alle emails die verzonden zijn naar de Admin door leden van deze website.",

	"compose" => "Email samenstellen",

		"compose_$" => "half",
		"compose_*" => "Email samenstellen",
		"compose_?" => "Gebruik de onderstaande opties om een nieuw bericht te maken om naar uw leden te verzenden.",
		"compose_^" => "sub",

);

$admin_layout_page10 = array(

	"" => "Software Updates",

		"_$" => "half",
		"_*" => "Software Updates",
		"_?" => "Hieronder zie je de versie van uw website tot aan de laatste release. Als de versie (te)oud is geworden, neem dan contact op met E meeting voor de nieuwste updates aub.",

	"backup" => "Database Backup",

		"backup_$" => "half",
		"backup_*" => "Database Backup",
		"backup_?" => "Selecteer 1 of meer tabellen hieronder om een back up te maken van je database. Het is erg belangrijk om het hosting databasegebied te gebruiken om een goede backup te maken zodat er niets verloren gaat!!! En om er zeker van te zijn dat je alle data hebt ontvangen.",


	"license" => "Software License Keys",

		"license_$" => "half",
		"license_*" => "Software License Keys",
		"license_?" => "Hieronder zie je de website license keys, aub kijk uit met bewerken dat ze correct zijn!!",

	"sms" => "SMS Credits",

		"sms_$" => "half",
		"sms_*" => "SMS Credits",
		"sms_?" => "Hier zie je het totaal aan SMS credits die over zijn op je account.",

);

$admin_layout_page11 = array(

	"" => "Software Plugins",

		"_$" => "half",
		"_*" => "Software Plugins",
		"_?" => "Plugins verlengen en uitbreiden voor de functionaliteit van onze dating software. Zodra een plugin is geïnstalleerd, kan u deze activeren of hier deactiveren via de menu opties aan de linkerkant.",

);


$admin_layout_nav = array(

	"1" => "Dashboard",
		"1a" => "Leden Statistieken",
		"1b" => "Affiliate Statieken",
		"1c" => "Bezoekers Statistieken",
		"1d" => "Bezoekers Locaties",
	"2" => "Oude Leden",
		"2a" => "Beheer Leden",
		"2b" => "Beheer Affiliates",
		"2c" => "Gebande Leden",
		"2d" => "Leden Files",
		"2e" => "Importeer Leden",
	"3" => "Design",
		"3a" => "Thema's",
		"3b" => "Thema Editor",
		"3c" => "Thema Foto Manager",
		"3d" => "Logo Editor",
		"3e" => "Meta Tags",	
		"3f" => "Talen",
		"3g" => "Pagina formulering",
		"3h" => "File Manager",
		"3i" => "Menu Balken",
	"4" => "Email",
		"4a" => "beheer Emails",
		"4b" => "Email Templates",
		"4c" => "Email Rapporten",
		"4d" => "Verstuur een Email",
		"4e" => "Email Herinneringen",	
		"4f" => "Download Emails",
		"4g" => "Verstuur Nieuwsbrieven",		
	"5" => "Betalingen",
		"5a" => "Beheer Pakketten",
		"5b" => "Betalings Poort",
		"5c" => "Betalings Historie",
		"5d" => "Affiliate Betalings Historie",
	"6" => "Instellingen",
		"6a" => "Weergaveopties",
		"6b" => "Weergave Instellingen",
		"6c" => "Systeem Paden",
		"6d" => "Foto Watermark",
	"7" => "Inhoud",
		"7a" => "Zoek Velden",
		"7b" => "Evenementen Kalender",
		"7c" => "Web site Poll",
		"7d" => "Web site Forum",
		"7e" => "Chat Rooms",	
		"7f" => "FAQ",
		"7g" => "Woord Filter",
		"7h" => "Artikelen / Nieuws",
		"7i" => "Groups",
	"8" => "Promoties",	
		"8a" => "Banners",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Beheer Moderators",	
		"10a" => "beheer Moderators",
		"10b" => "Hoofd Gebruiker",
	"11" => "Onderhoud",
		"11a" => "Systeem Backup",
		"11b" => "License Keys",
		"11c" => "Systeem Updates",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Systeem Updated Succesvol",
	"no_update" => "Systeem updated, ook al was er niets om te verwijderen!",
	"edit" => "Edit",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Zoek",
	"1" => "Selecteer Alles",
	"2" => "Deselecteer Alles",
	"3" => "Goedgekeurd",
	"4" => "Opschorten",
	"5" => "Verwijder",	
	"6" => "Maak een lid spotlight lid",
	"7" => "Opties",	
	"8" => "Update",	
	"9" => "Maak spotlight",
	"10" => "Verwijder de Spotlight",	
	"11" => "Update Standaard Gebruikte Taal",
	"12" => "Verstuur",
	"13" => "Voortzetten",	
	"14" => "Maak Actief",
	"15" => "Uitschakelen",
	"16" => "Update Order",
	"17" => "Update Veld Pagina's",	
	"18" => "Uitschakelen",
);

$admin_table_val = array(
	"1" => "Gebruikersnaam",
	"2" => "Geslacht",
	"3" => "Laatst ingelogd",
	"4" => "Status",
	"5" => "Pakket",
	"6" => "Updated",
	"7" => "Opties",	
	"8" => "Datum",
	"9" => "IP Adres",
	"10" => "Hack Snaar",	
	"11" => "Datum Lid Geworden",	
	"12" => "Naam",
	"13" => "Email",
	"14" => "Kliks",
	"15" => "Inschrijvingen",
			
	"15" => "Betaalde Provisie",
		
	"16" => "Bericht",
	"17" => "Tijd",
	"18" => "File Naam",
	"19" => "Laatst GeUpdate",	
	"20" => "Bewerk",
	"21" => "Standaard",	
	"22" => "ID",

	"23" => "Prijs",
	"24" => "Zichtbaar",	
	"25" => "Type",
	"26" => "Beheer de Toegang",	
	"27" => "Actief",

	"28" => "Bekijk de Code",
	"29" => "Velden",	
	"30" => "Affiliate Naam",
	"31" => "Totaal verschuldigd",	
	"32" => "Status",
	
	"33" => "Datum GeUpgrade",
	"34" => "Datum Vervalt",	
	"35" => "Betalings Methode",
	"36" => "Nog Actief",	
	"37" => "Wachtwoord",
	"38" => "Laatst IngeLogged",

	"39" => "Positie",
	"40" => "Bezoeken",	
	"41" => "Actief",
	"42" => "Bekijk",	
	"43" => "Titel",
	"44" => "Artikelen",
	"45" => "Bestel",

);

$admin_search_val = array(
	"1" => "Leden Gebruikersnaam",
	"2" => "Alle Pakketten",
	"3" => "Alle mannen en vrouwen",
	"4" => "Per Pagina",
	"5" => "Besteld door",
	"6" => "Email Adres",
	
	"7" => "Elke Status",
	"8" => "Aktieve Leden",
	"9" => "Opgeschorte Leden",
	"10" => "Niet geaccepteerde Leden",
	"11" => "Leden die willen cancelen",
	"12" => "Alle Pagina's",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Beheer Alle Groepen",
	"2" => "Groep Naam",
	"3" => "Taal",		
	"4" => "Beheer Topics",
	"5" => "beheer Categoriëen",	
	"6" => "Groep Categorie Naam",		
	"7" => "Beheer Categorieen",	
	"8" => "Naam",	
	"9" => "Tellen",	
	"10" => "Plaats Artikel",	
	"11" => "Categorie",
	"12" => "Pagina Titels",	
	"13" => "Korte Beschrijving",		
	"14" => "Plaats Artikel",
	"15" => "Beheer de Categoriëen",
	"16" => "Veld lijst",
	"17" => "Volgorde",
	"18" => "Taal",
	"19" => "Ljst waarden",
	"20" => "Nieuw Veld",	
	
	"21" => "Veld Titel",		
	"22" => "Veld Type",
		"23" => "Tekst veld",	
		"24" => "Tekst gedeelte",	
		"25" => "Lijst Box",
		"26" => "Eén Selectievak",
		"27" => "Meerdere selectievakken",
	
	"28" => "Groep Hoofdlijn",
	"29" => "Voeg toe tijdens registratie",
	"30" => "Selecteer Hieronder",
	
	"31" => "Maak Groep",
	"32" => "Toon groep opties",
		"34" => "Toon dit aan alle leden",
		"35" => "Toon dit alleen aan de website admin's",
		"36" => "Toon dit aan admin's en leden (Niet op het profiel)",
	"37" => "Enige",	
	"38" => "Beheer Groepen",	
	"39" => "Plaats Evenement",	
	"40" => "Veld Onderschrift",
	"41" => "Onderschrift",		
	"42" => "Beschrijvings tekst",
	"43" => "Onderschrift Type",	
	"44" => "Zoek Onderschrift",		
	"45" => "Profiel Onderschrift",	
	"46" => "Hier moet je een bijschrift voor de profiel pagina instellen, bv'ik ben een' (Vrouw/Man) en een voor de zoekpagina, zoals 'ik ben op zoek naar een'",	
	"47" => "Bestaand Veld Onderschriften",	
	"48" => "Verplaats dit Veld naar deze Groep",		
	"49" => "Lid ID",
	"50" => "Evenement Naam",	
	"51" => "Evenement Beschrijving",		
	"52" => "Evenement Type",
	"53" => "Selecteer Categorie",	
	"54" => "Selecteer Type",
	"55" => "Evenement Tijd",
	"56" => "Laat dit leeg als dit voor 'alle dagen' geldt",
	"57" => "Evenement Datum",
	"58" => "Maand",	
	
	"59" => "Dag",	
	"60" => "Jaar",
	"61" => "Land",		
	"62" => "Provincie",
	"63" => "Straat",	
	"64" => "Stad",		
	"65" => "Telefoon",	
	"66" => "Email",	
	"67" => "Website",	
	"68" => "Evenement Zichtbaar voor",		
		"69" => "Iedereen",
		"70" => "Alleen vrienden",	
		
	"71" => "Plaats een Poll",		
	"72" => "Website Poll Resultaten",
	"73" => "Poll naam",	
	"74" => "Antwoord",	
	"75" => "Maak aktief",
	
	"76" => "Plaats Forum Topic",
	"77" => "Beheer Berichten",
	"78" => "Forum Topic",	
		
	"79" => "Titel",	
	"80" => "Beschrijving",
	"81" => "Forum Berichten",		
	"82" => "Alle Berichten",
	"83" => "Vandaag",	
	"84" => "Deze Week",		
	"85" => "Vorige Week",	
	"86" => "Room Naam",	
	"87" => "Bestaande Veld Onderschriften",	
	"88" => "Room Wachtwoord",		
	"89" => "Plaats Nieuw",
	"90" => "Plaats F.A.Q",
	
	"91" => "Plaats een Woord Censor",		
	"92" => "Woord",
	
	"93" => "Geaccepteerd",
	"94" => "Bijschrift",
	"95" => "Bijschrift overeenkomstig",
	"96" => "Taal",

	"97" => "Bekijk",
	"98" => "Resultaten",
);
$admin_advertising = array(

	"1" => "Website Banners",
	"2" => "Plaats Banner",
	"3" => "Affiliate Banners",	
	"4" => "Bewerk / Plaats Banners",
	"5" => "Banner Type",	
	"6" => "Website Banner",			
	"7" => "Affiliate Banner",	
	"8" => "Naam",	
	"9" => "Upload Hier uw Banner",	
	"10" => "Plaats HTML",	
	"11" => "HTML Code",
	"12" => "Upload Uw Banner",	
	"13" => "Banner Link",		
	"14" => "Zichtbaar voor",
		"15" => "Alle Leden",
		"16" => "Alleen ingelogte Leden",
	
	"17" => "Pagina",
	"18" => "Actief",
	
	"19" => "Top Positie",
	"20" => "Middelste Positie",	
	"21" => "Positie links",		
	"22" => "Positie onderaan de website",
	"23" => "Laat dit leeg als je een link gebruikt in de bannercode",
	"24" => "Bekijk Banner",
	
);


$admin_maintenance = array(

	"1" => "Aktief op dit moment",
	"2" => "Laatste Versie",
	"3" => "SMS Credits",	
	"4" => "Resterende SMS Credits",	
	"5" => "Aankoop van Credits",	

);

$admin_admin = array(

	"1" => "Plaats Admin",
	"2" => "Gebruikersnaam",
	"3" => "Wachtwoord",	
	"4" => "Email",
	
	"5" => "Bewerk Admin Instellingen",	
	"6" => "Volledige Naam",			
	"7" => "Toegangs Level",	
		"8" => "Volledig Toegang Tot Het Systeem",	
		"9" => "Alleen Toegang voor de Leden",	
		"10" => "Alleen toegang tot het DesignGedeelte",	
		"11" => "Alleen Toegang tot de Emails",
		"12" => "Alleen Toegang tot het BetalingsGedeelte",	
		"13" => "Alleen toegang tot de Instellingen",		
		"14" => "Alleen Toegang tot het Beheren van de Website",
	"15" => "Admin Icoon(Avatar)",

	"17" => "Email Waarschuwingen",
	"18" => "Admin Nieuws Waarschuwingen",
	"19" => "Alle leden verplaatsen van",
	"20" => "Naar het volgende Pakket",	
	"21" => "Bewerk Pakket",		
	"22" => "Toegang tot Pakket",
	"23" => "Plaats een Pakket Item",	
	"24" => "Beheer de toegang tot het pakket",
);

$admin_settings = array(

	"1" => "Toon de Pagina's",
	"2" => "Ingeschakeld / Inschakelen",
	"3" => "Uitgeschakeld / Uitschakelen",	
	"4" => "Web Paden",
	"5" => "Server Paden",	
	"6" => "Thumbnail Paden",			
	"7" => "Plaats Veld",	
	"8" => "Naam",	
	"9" => "Waarde",	
	"10" => "Type",	
	"11" => "Beheer de Velden",
	"12" => "Plaats Gateways- Poort",	
	"13" => "Betalings Systeem",		
	"14" => "Gateway Betalings Code",
	"15" => "Titel",
	"16" => "Pakket Toegang",
	"17" => "Commentaren",
	"18" => "Verplaats Leden",
	"19" => "Verplaats alle leden naar",
	"20" => "Naar het Volgende Pakket",	
	"21" => "Bewerk het Pakket",		
	"22" => "Toegang tot het Pakket",
	"23" => "Plaats Pakket Item",	
	"24" => "Beheer de toegang tot de Pakketten",
);

$admin_billing = array(

	"1" => "Plaats Pakket",
	"2" => "Beheer toegang tot de pakketten",
	"3" => "Verplaats de leden Pakketten",			
	"4" => "Je website is momenteel <b>GRATIS</b> Omdat de ledenpakketen Uitgeschakeld staan.",
	"5" => "Wil je de GRATIS optie uitschakelen en de ledenpakketten zichtbaar maken?",	
	"6" => "SCHAKEL GRATIS LIDMAATSCHAP UIT",		
	"7" => "Plaats veld",	
	"8" => "Naam",	
	"9" => "Waarde",	
	"10" => "Type",	
	"11" => "Beheer de Velden",
	"12" => "Plaats Gateways",	
	"13" => "Betalings Systeem",		
	"14" => "Gateway Betalings Code",
	"15" => "Titel",
	"16" => "Pakket Toegang",
	"17" => "Commentaren",
	"18" => "Verplaats Leden",
	"19" => "Verplaats alle Leden van",
	"20" => "Naar het volgende Pakket",	
	"21" => "Bewerk het Pakket",		
	"22" => "Pakket Toegang",
	"23" => "Plaats Pakket Item",	
	"24" => "Beheer toegang tot de Pakketten",
	
	"25" => "In afwachting op goedkeuring",
	"26" => "Goedgekeurde Betalingen",
	"27" => "Geweigerde Betalingen",
	
	"28" => "Geschiedenis",
	"29" => "Actieve Betalingen",
	"30" => "Betaalde Betalingen",
	"31" => "Actieve Abonnementen",
	"32" => "Betaalde Volledige Abonnementen",
	"33" => "Pakket Toegangs Code",
	
);

$admin_email = array(

	"1" => "Systeem Emails",
	"2" => "Nieuwsbrieven",
	"3" => "Email Sjablonen",		
	"4" => "Email Editor",
	"5" => "Onderwerp",	
	"6" => "Bekijk Email",	
	"7" => "Email naar",
	
	"8" => "Verstuur aan",	
		"9" => "Alle Leden",	
		"10" => "Ingeschreven Leden",	
		"11" => "Actieve / Opgeschortte / (Nog) niet goedgekeurde Leden",
	"12" => "Naar Pakket",	
	"13" => "Lidmaatschaps Status",		
	"14" => "Selecteer Nieuwsbrief",	
	
	"15" => "Maak nieuwe",
	"16" => "Bekijk op maat gemaakt",
	"17" => "Email Traceer Code",
	"18" => "Maak Nieuw",
	"19" => "Bekijk op maat gemaakt",
	"20" => "Email Traceer Code",
		"21" => "HTML Code Hieronder",
		
	"22" => "Email Traceer Resultaten",
	"23" => "Er zijn geen rapporten gevonden.",
	"24" => "Selecteer Rapport",
	
	"25" => "Stuur Herinneringen naar alle leden die nog geen profiel hebben aangemaakt",
	"26" => "en",
	"27" => "dagen",
	"28" => "Dagen Te gaan voor de Upgrade Aanmelding",
	"29" => "Selecteer Email Om te Verzenden:",
	"30" => "Download",
	"31" => "Selecteer Pakket",
	"32" => "Traceer Code",
	
	
);

$admin_design = array(

	"1" => "Download Thema's",
	"2" => "Huidige Template",
	"3" => "Gebruik deze Template",	
	"4" => "Pagina Meta Tags",
	"5" => "Pagina Titel",	
	"6" => "Beschrijving",
	"7" => "Keywords",
	"8" => "Web site Pagina's",	
	"9" => "Inhoud Pagina's",	
	"10" => "Standaard Pagina's",	
	"11" => "Creër een Pagina",
	"12" => "FTP Pad",	
	"13" => "Thema Bestanden",		
	"14" => "Inhoud Pagina's",	
	"15" => "Standaard Pagina's",


	"16" => "Plaats Taal Bestand",
	"17" => "Nieuwe bestandsnaam",	
	"18" => "Selecteer bestand om te kopiëren",
			
	"19" => "Bewerk TaalBestand",	
	"20" => "Standaard Pagina's",

	"21" => "Font / Lettertype",
	"22" => "Font Grootte",	
	"23" => "Font Kleur",
	"24" => "Breedte",	
	"25" => "Hoogte",		
	"26" => "Plaats Logo Tekst",
	"27" => "Canvas Soort",	
		"28" => "Gebruik leeg Canvas",
		"29" => "Behoudt het huidige Design",	
		"30" => "Upload mijn eigen Achtergrond / logo",	

	"31" => "Creëer Nieuwe Pagina",
	"32" => "Nieuwe Pagina Naam",	
		"33" => "Pagina namen moeten kort zijn en enkel één woord!.Bv EG. Linken, Artikelen, Nieuws, Forum etc",
	"34" => "Plaats Menu Tab?",	
		"35" => "Nee! Creër geen tab",		
		"36" => "Ja. Plaats dit op de Leden Omgeving",
		"37" => "Ja. Plaats dit op de Hoofdwebsite en niet op de ledenpagina's.",
			"38" => "Als gekozen is voor een nieuw lid tab wordt deze gegenereerd op uw website",
);

$admin_overview = array(

	"1" => "Aankondiging",
	"2" => "Totaal Leden",
	"3" => "Deze Week",
	"3a" => "Vandaag",
	"4" => "Recente Website Activiteiten",
	"5" => "Website Rapporten",
	
	"6" => "Unieke Website Bezoekers van de afgelopen twee weken",
	"7" => "Nieuwe leden die zich registreerden de afgelopen Twee Weken",
	"8" => "Leden Geslacht Man of Vrouw  statistieken",	
	"9" => "Leden leeftijd statistieken",
	
	"10" => "Nieuwe Affiliate Registratie's in de afgelopen twee weken",
	"11" => "Bezoekers Map Instellingen",
	"12" => "AUB plaats hier je Google API key in het veld hierboven.",	
	"13" => "Je kunt een licentie sleutel *key*  aankopen via het klantengedeelte van onze website",	
	
	"14" => "Filter Zoek Resultaten",	
	"15" => "Alle Bestanden",
	
);
$admin_members = array(

	"1" => "Alle Leden",
	"2" => "Moderators",
	"3" => "Actief",
	"4" => "Verlopen",
	"5" => "Niet goedgekeurd",
	"6" => "Ik wil dit Cancelen",
	"7" => "Online Nu",
	"8" => "Leden Login Activiteit",	
	"9" => "Bewerk Leden Details",	
	"10" => "Plaats een Affiliate",
	"11" => "Affiliate Banners",
	"12" => "Affiliate Pagina's",	
	"13" => "Plaats een Affiliate",	
	"14" => "Affiliate Instellingen",	
	"15" => "Alle Bestanden",
	"16" => "Foto's",
	"17" => "Video's",
	"18" => "Muziek",
	"19" => "YouTube",
	"20" => "Niet goedgekeurd",
	"21" => "Belangrijk",
	"22" => "Upload Bestand",	
	"23" => "Bestand",
	"24" => "Type",
	"25" => "Gebruikersnaam",
	"26" => "Titel",
	"27" => "Reactie's",
	"28" => "Maak Standaard",		
	"29" => "Leden Login Activiteit",	
	"30" => "Affiliates Ingeschreven door",
	"31" => "Belangrijk",
	"a5" => "Gebruikersnaam",
	"a6" => "Wachtwoord",
	"a7" => "Voornaam",
	"a8" => "Achternaam",
	"a9" => "Zakelijke Naam",
	"a10" => "Adres",
	"a11" => "Straat",
	"a12" => "Stad",
	"a13" => "Land",
	"a14" => "PostCode",
	"a15" => "Land",
	"a16" => "Telefoon",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Website adres",
	"a20" => "Maak check betaalbaar aan",
);


// HELP FILES
$admin_help = array(

	"a" => "Begin Nu",
	"b" => "Nee bedankt!",
	"c" => "Ga door",	
	"d" => "Sluit Venster",
	
	
	"1" => "Introductie",
	"2" => "Heb je hulp nodig bij het starten?",
	"3" => "Hallo",	
	
	"4" => "En Welkom op het admin gedeelte! Als dit de eerste keer is dat je inlogt op het admin gedeelte is het belangrijk dat je een aantal minuten neemt om de wizard te bekijken voor je begint!",
	"5" => "Onze start Wizard zal je helpen om de basis begrippen te begrijpen en om je instellingen juist in te voeren.",	
	"6" => "<strong>(Note)</strong> Je kunt deze pagina altijd bekijken door op de 'Snelle help gids ' te Klikken links in het menu.",
	
	"7" => "Begin hier",
	"8" => "Welkom op onze administratie pagina's!",	
	"9" => "Welkom op onze administratie pagina's voor",	
	"10" => "Deze software stelt u in staat om alle verschillende aspecten van uw website te beheren, met inbegrip van uw leden, bestanden, beveiliging, email, plugins, en nog veel meer.",	
	"11" => "Deze wizard laat u kennismaken met een aantal van de concepten achter de website van het beheer en u kunt een aantal basisinstellingen configureren voor uw website, zodat u kunt beginnen om verkeer (bezoekers) naar uw site te sturen.",
	"12" => "<strong>(Remember)</strong> Op elk moment, kunt u dit venster sluiten met behulp van de knop Sluiten en later terugkomen door te klikken op de 'snelle hulp gids' in de linker menubalk.",
		
	"13" => "Inleiding tot uw administratie omgeving!",		
	"14" => "De software administratie omgeving is 'web based' wat betekent dat u toegang tot uw website overal ter wereld kunt beheren met een internet verbinding in uw browser op:",	
	"15" => "en login met je admin login gegevens.",
	"16" => "Klik hier om deze link aan uw favorieten toe te voegen.",
	
	"17" => "Inleiding tot uw dashboard.",	
	"18" => "Het software dashboard geeft u een zeer snel overzicht van uw websiteprestaties, u kunt softwareupdates lezen, Lidmaatschap registratie geschiedenis bekijken zie leden en affiliate statistische diagrammen en nog veel meer.",			
	"19" => "Alle leden informatie wordt opgeslagen in de MySQL database genaamd:",	
	"20" => "Inleiding tot de web site statistieken.",
	"21" => "De software statistieken geeft u een visuele weergave van uw lid en affiliate aanmelding geschiedenis over een periode van twee weken. Elke keer dat een lid of partner zich aansluit bij uw website worden de tijd en datum wordt opgenomen en uitgezet op de grafieken..",
	
	"22" => "Introductie tot bezoeker locaties",		
	"23" => "Introductie tot het beheren van uw leden",	
	"24" => "Introductie tot het beheren van uw partners",	
	"25" => "Introductie tot het beheren van uw geblokkeerde leden",		
	"26" => "Introductie tot het beheer van uw ledenbestanden",
	"27" => "Introductie tot geïmporterende leden",	
	"28" => "Introductie naar website thema's",
	"29" => "Introductie tot Thema Editor",	
	"30" => "Introductie tot Thema Foto Manager",
	"31" => "Introductie tot Logo Editor",
	"32" => "Introductie tot Meta Tags",	
	"33" => "Introductie tot Taal bestanden",
	"34" => "Introductie tot Beheer Emails",	
	"35" => "Introductie tot Email Templates",		
	"36" => "Introductie tot Email Rapporten",
	"37" => "Introductie tot Nieuwsbrieven versturen",
	"38" => "Introductie tot Herinnerings E-mail",
	"39" => "Introductie tot Download Email Adressen",
	"40" => "Introductie tot de lidmaatschap pakketten",
	"41" => "Introductie tot Betalings Gateways",
	"42" => "Introductie tot de lidmaatschap Betalings Geschiedenis",
	"43" => "Introductie tot Partner Betalings Geschiedenis",
	"44" => "Introductie tot Toon opties weergeven",
	"45" => "Introductie naar Toon Instellingen",
	"46" => "Introductie tot Systeem Paden",
	"47" => "Introductie tot Watermerk",
	"48" => "Introductie naar Zoekvelden",
	"50" => "Introductie naar Evenementen Kalender",
	"51" => "Introductie over de website Poll",
	"52" => "Introductie tot website Forum",
	"53" => "Introductie tot chatrooms",
	"54" => "Introductie over website FAQ",
	"55" => "Introductie naar Woordfilter",
	"56" => "Introductie naar Nieuws / Artikelen",
	"57" => "Introductie tot de groepen",

		"22a" => "De bezoeker locatie kaart laat de locaties van elk van uw website leden zien zodat u in een oogopslag zien uit welke landen uw leden inloggen.",		
		"23a" => "Door het beheren van de leden tool kunt u van alle leden die zijn toegetreden tot uw website de zoekopties filteren door middel van uw leden te bewerken, updaten en profielen van leden te verwijderen.",	
		"24a" => "Met de affiliate manager tool kunt u in een oogopslag al uw website Affiliates bekijken en bewerken en de affiliates bv ook verwijderen van uw website en de nieuwe affiliate signup's goed te keuren.",	
		"25a" => "De verboden leden sectie slaat alle records van leden en niet-leden op die proberen de website te 'hacken', en zal de software automatisch vermoedelijke leden uitsluiten van het bekijken van uw web site om zo te voorkomen dat zij uw website schade kunnen berokkenen.",		
		"26a" => "Het lid-bestanden tool kunt u alles van de website leden uploads, muziek, video's, foto's etc. vanaf hier worden beheerd. Klik op een van de foto's bv om de foto met behulp van onze ingebouwde bijsnijdingstools te bewerken.",
		"27a" => "De leden import tool stelt u in staat om  leden van andere software-applicaties te importeren. U hoeft alleen de database gegevens voor de website op te geven waar je oude systeem is opgeslagen en deze  zal dit naar de nieuwe website exporteren.",	
		"28a" => "De website templates u kunt de website template en het ontwerp van uw site direct veranderen! Klik gewoon op het thema dat je wilt gebruiken en uw website zal automatisch worden bijgewerkt.",
		"29a" => "De Thema-editor tools kunt u direct bewerken van uw website pagina's uit het administratie gebied. U kunt ook als u wilt kopiëren en de code plakken in uw eigen web-site editor en dan  terug plakkenals je eenmaal klaar bent met bewerken.",	
		"30a" => "Het Thema foto Manager tool, hier kunt u de huidige afbeeldingen op uw website veranderen door het uploaden van nieuwe. Nieuwe afbeeldingen vervangen het huidige beeld en worden onmiddellijk toegepast op uw web site.",
		"31a" => "De Logo-editor tool kunt u de vormgeving van uw huidige logo bijwerken. U kunt ook uw eigen logo met uw eigen beeldbewerkings pakket maken en vervolgens de optie 'upload mijn eigen logo' om deze toe te voegen aan uw website.",
		"32a" => "De Meta Tags functie hier kunt u alle meta-tags bewerken voor de website gegenereerd door de software. U kunt uw eigen titel, trefwoorden en beschrijvingen toevoegen voor elk van uw web site's. ",	
		"33a" => "De Taal management tool, hiermee kunt u elke taal van uw website die u niet wilt verwijderen of toch gebruiken en ook je eigen taalpakket toe te voegen.",
		"34a" => "De E-mail management tool kunt u hier uw eigen systeem en nieuwsbrief e-mail  creëren om uw website een unieke persoonlijke touch te geven.",	
		"35a" => "Introductie tot Email Templates",		
		"36a" => "Introductie tot Email Rapporten",
		"37a" => "Introductie tot Verstuur nieuwsbrieven",
		"38a" => "Introductie tot Email Herinneringen",
		"39a" => "Introductie tot Download Email Adressen",
		"40a" => "Introductie tot Lidmaatschaps Pakketten",
		"41a" => "Introductie tot Betalings Gateways",
		"42a" => "Introductie tot Leden Betalings geschiedenis",
		"43a" => "Introductie tot Affiliate Betalings geschiedenis",
		"44a" => "Introductie tot Toon Opties",
		"45a" => "Introductie tot Toon Instellingens",
		"46a" => "Introductie tot System Paden",
		"47a" => "Introductie tot Watermerk",
		"48a" => "Introductie tot Zoek velden",
		"50a" => "Introductie tot Evenementen Kalender",
		"51a" => "Introductie tot website Poll",
		"52a" => "Introductie tot website Forum",
		"53a" => "Introductietot ChatRooms",
		"54a" => "Introductie tot website FAQ",
		"55a" => "Introductie tot Woord Filter",
		"56a" => "Introductie tot Nieuws / Artikelen",
		"57a" => "Introductie tot Groepen",
);

$admin_login = array(

	"1" => "Admin Omgeving Login",
	"2" => "Wachtwoord vergeten? Geen probleem. Plaats je email adres hier onder en we sturen je een nieuwe.",
	"3" => "Email Adres",
	"4" => "Tekst hieronder",
	"5" => "Reset wachtwoord",
	"6" => "Voer uw gegevens hieronder in  om te loggen.",
	"7" => "Gebruikersnaam",
	"8" => "Wachtwoord",	
	"9" => "Licentie",	
	"10" => "Taal",
	"11" => "Log in",
	"12" => "Gelogde IP is",	
	"13" => "Wachtwoord vergeten",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Spotlight Profiel",
	"2" => "Web site Moderator",
	"3" => "Lidmaatschap Pakket",
	"4" => "Stuur een Upgrade Email",
	"5" => "Plaats pakket om het betalingsysteem te veranderen ",
	"6" => "SMS Nummer",
	"7" => "SMS Credits",
	"8" => "Zet de Account Status om naar",	
	
	"9" => "Klik op de box om het wachtwoord te bewerken.",	
	"10" => "Spotlight Leden hebben een andere kleur achtergrond in de zoekresultaten.",
	"11" => "Dit geeft de leden toegang tot de website om deze als een moderator te beheren!!!.",
	
	"12" => "Affiliates Welkomst Pagina",	
	"13" => "Banner Code Pagina",	
	"14" => "Affiliate Betalings Pagina",	
	"15" => "Affiliate Overzichts Pagina",
	"16" => "Affiliate Bewerk Account Pagina",
	
	"17" => "Importeer Leden Van",	
	
	"18" => "Leeftijd",			
	"19" => "Bekeken files",	
	"20" => "Prive",
	"21" => "Publiek",
	
	"22" => "album",		
	"23" => "18+ Inhoud",	
	"24" => "Publieke Inhoud",	
	
	"25" => "Grootte",		
	"26" => "Verplaats Files naar de 18+ Albums",
	"27" => "18+  Files",

);

$admin_selection = array(

	"1" => "Ja",
	"2" => "Nee",
	
	"3" => "Aan",
	"4" => "Uit",
);

$admin_plugins = array(

	"1" => "Plug-ins uitbreiden en uitbreiden van de functionaliteit van onze dating software. Zodra een plug-in is geïnstalleerd, kunt u deze hier activeren of deactiveren via de menu-opties aan de linkerkant.",
	"2" => "U kunt nieuwe software plug-ins downloaden en bekijken op het klant gedeelte van onze website.",
	"3" => "Plugin Naam",
	"4" => "Plugin Details",
	"5" => "Laatst Geupdate",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Welkom Terug",
	"2" => "Hieronder vindt u een snel overzicht van de leden inschrijvingen en de website van de prestaties voor vandaag.",
	"3" => "Nieuw Leden Vandaag",
	"4" => "Goed te keuren bestanden",
	"5" => "U kunt uw e-mailadres en wachtwoord bijwerken door de Admin voorkeuren hier in te stellen.",
	"6" => "Sluit Venster",

);
$admin_pop_chmod = array(

	"1" => "Bestand Machtigingen Error",
	"2" => "De bestanden op deze pagina kan niet worden gewijzigd",
	"3" => "Op de volgende mappen en directories moet u  'write' permissies goed instellen voordat je ze kunt bewerken. Als je een Linux or Unix web hosting hebt,kun je het FTP programma gebruiken en de 'CHMOD' ('Change Mode') functie veranderen om het om te zetten in schrijf permissies. Als je hosting op windows draait, moet je contact opnemen met je provider om de instellingen goed te zetten op deze files en folders.",
	"4" => "De files/directories welke je moet CHMOD naar 777 ",
	"5" => "Sluit venster",

);
$admin_pop_demo = array(

	"1" => "Demo Mode Geactiveerd",
	"2" => "Wijzigingen in het systeem zal NIET worden opgeslagen in demo-modus",
	"3" => "Uw toegang tot de systeem instellingen zijn ingesteld op de 'demo mode' de toegang tot veel functies en functionaliteit vanuit het admin gebied zal worden beperkt tot 'alleen lezen''.",
	"4" => "Je kunt nu normaal rondkijken in de admin panel hoewel de wijzigingen die u aanbrengt niet worden opgeslagen.",
	"5" => "<strong>Belangrijk!!!</strong> Als u de demo-modus beperking wilt verwijderen op uw account neem dan contact op met uw systeembeheerder voor meer informatie.",
	"6" => "Sluit Venster",
);

$admin_pop_import = array(

	"1" => "Database Overdracht Resultaten",
	"2" => "Leden zijn succesvol Geïmporteerd!",
	"3" => "Leden zijn succesvol geïmporteerd van",
	"4" => "Software. AUB volg de instructie hieronder goed om zeker te zijn dat je leden foto's correct worden geupdate.",
	"5" => "De foto folder paden staan hier beneden, je moet de foto's kopiëren van de oude website in de nieuwe paden hieronder;",
	"6" => "Sluit Venster",
);

$admin_loading= array(

	"1" => "Optimaliseer Database Tabellen",
	"2" => "AUB Wacht",

);
$admin_menu_help= array(
"1" => "Snelle Help Gids",
);

$admin_settings_extra = array(

	"1" => "Toon Zoekpagina",
	"2" => "Toon Inhoud Pagina",
	"3" => "Toon Website Toer pagina",
	"4" => "Toon FAQ Pagina",
	"5" => "Toon Evenementen",
	"6" => "Toon Groepen",
	"7" => "Toon Forum",
	"8" => "Toon Matches",	
	"9" => "Toon Netwerk",	
	"10" => "Toon Affiliate Systeem",
	"11" => "Toon SMS / Text Message Alert Systeem",
	
	"12" => "Toon Blogs",	
	"13" => "Toon Chat Rooms",	
	"14" => "Toon Instant Messenger",	
	"15" => "Toon het Registratie Verificatie Plaatje",
	"16" => "Toon UK Postcode zoekbalk",
	"17" => "Toon US Postcode Zoekbalk",
	"18" => "Toon MSN/Yahoo Integratie",
	
	"19" => "Standaard Leden Pakket",
		"20" => "Dit is een standaard Pakket als leden zich registreren",
	"21" => "Leden moeten een foto uploaden om zich te registreren",
		"22" => "Als je dit instelt kunnen leden die zich registreren niet langer registreren zonder een foto te uploaden.",	
	"23" => "Tijdelijk Gratis",
		"24" => "Stel dit in op  'Ja' als je wilt dat alle website mogelijkheden te gebruiken zijn door iedereen.",
	"25" => "Momenteel in Onderhoud",
		"26" => "Dit stopt alle toegang tot uw website van alle leden en niet leden, alleen de admin's hebben nu toegang, als ze zijn ingelogd op het admin gedeelte van uw website.
.",
		
	"27" => "Aantal zoekresultaten per pagina",
		"28" => "Selecteer het aantal profielen die je per pagina wilt laten zien",		
	"29" => "Aantal Match resultaten die men kan zien op de overzichtspagina",	
		"30" => "Selecteer het aantal profielen die je per pagina wilt laten zien.",
		
	"31" => "Email Activatie Codes",
		"32" => "De leden zal een activatie code toegezonden krijgen omdat hun e-mail moeten worden gevalideerd voordat ze kunnen inloggen..",
	"33" => "Handmatig Leden Goedkeuren",
	"34" => "Zet deze op 'ja' of 'nee', afhankelijk of u handmatig nieuwe leden wilt controleren en toestaan op uw website, voordat ze kunnen inloggen.",
	"35" => "Handmatig Files Goedkeuren",
		"36" => "Zet deze op 'ja' of 'nee', afhankelijk of u handmatig bestanden wilt controleren voordat ze weergegeven worden op uw website",
	"37" => "Handmatig video bestanden wel/of niet accepteren.",
		"38" => "Zet deze op 'ja' of 'nee', afhankelijk of u handmatig wilt controleren of een lid mag uitzenden via de video-chat feeds.",
		
	"39" => "Toon video recorder groet",
	"40" => "Dit stelt de leden in staat om hun eigen video-boodschap voor hun profiel op te nemen. U moet uw flash-video RMS-connectie hieronder invoeren",
	"41" => "Flash RMS Connectie",
		"42" => "Je hebt een flash-hosting nodig om dit te kunnen gebruiken.",
	"43" => "Toon Datum Formaat",
		"44" => "Selecteer de datum formaat zoals deze moet worden weergegeven op uw web site",
	"45" => "Accepteer Profiel / File (Bestanden) reacties",
		"46" => "Activeer deze optie als je wilt dat leden kunnen reageren op profielen en bestanden.",
	"47" => "Toon Chat en IM in een apart venster",
	
	"48" => "Activeer deze optie als u wilt dat chat room-en IM-pop up's openen in een Nieuw/Apart venster.",
	
	"49" => "Zoek optie vriendelijk??",
		"50" => "Activeer deze optie als u op een linux of unix hosting zit en gebruik maakt van het standaard. Htaccess bestand",
	"51" => "Zoek lege foto's",
		"52" => "Wilt u de leden die geen foto hebben toegevoegd dat ze toch worden weergegeven in de zoekresultaten?.",
	"53" => "Toon vlaggen foto's",
		"54" => "Zet deze op 'ja' of 'nee' als u wilt dat de taalvlaggen op uw web site zichtbaar zijn.",
	"55" => "Affiliate Valuta",	
	"56" => "Gebruik HTML Editor",	
	"57" => "Zet deze op 'ja' of 'nee', afhankelijk of u handmatig bestanden wilt controleren voordat ze worden weergegeven.",

	"58" => "Toon artikel pagina.",
	"59" => "Toon Video Pagina",
	"60" => "Toon Muziek Pagina",
	"61" => "Toon Berichten",
	"62" => "Toon Foto albums en Bestand uploads",
	"63" => "Toon Evenementen Pagina",
	"64" => "Toon Instelling Pagina",
	"65" => "Toon Mijn Account Pagina",
	"66" => "Toon Advertentie Pagina",
	"67" => "Toon Game Pagina",
	"68" => "Toon de Profiel Designer",
	"69" => "Toon Profiel Waarderingen",
	"70" => "Toon Plaats Profiel Partner",
	"71" => "Toon Plaats Profiel Vrienden",
	"72" => "Toon Profiel Hotlijst",
	"73" => "Toon Verstuur een knipoog",
	"74" => "Toon Skype veld in de leden instellingen",
	"75" => "Toon Sterrenbeelden",
	"76" => "Toon Quizzen",   
	"77" => "Toon Reacties",


);

$admin_billing_extra = array(

	"1" => "Stel dit in op 'Ja' als u wilt dat alle functies van uw website toegankelijk zijn voor iedereen.",
	
	"2" => "Pakket Type",
	"3" => "Lidmaatschaps Pakket",
	"4" => "SMS Pakket",
	"5" => "Selecteer Ja als u een SMS pakket wilt Creëren om te worden gebruikt om bv extra SMS-krediet aan te bieden op uw website.",
	"6" => "Pakket Naam",
		"7" => "Plaats een naam voor dit pakket zoals dit zal worden weergegeven op uw abonnements pagina.",
	"8" => "Beschrijving",	
	"9" => "Prijs",	
	"10" => "Hoeveel wilt u in rekening brengen voor de leden die zich inschrijven voor dit pakket? Notitie. Voer geen valutasymbolen in AUB!",
	"11" => "Voeg hier de Valuta Code in",
	
	"12" => "Dit is de valuta code die wordt weergegeven op uw website, dit wordt NIET gebruikt voor uw betalings valuta, dat moet dit worden ingesteld in uw betalings-instellingen.",	
	"13" => "Abonnement",	
	"14" => "Selecteer Ja als u wilt dat dit een terugkerende betaling wordt.",	
	"15" => "Upgrade Periode",
	
	"16" => "Dag",
	"17" => "Week",
	"18" => "Maand",
		"18a" => "Ongelimiteerd",
	"19" => "Max berichten (per dag)",
		"20" => "Dit is het maximale aantal berichten welke leden per dag kunnen versturen.",
	"21" => "Max Knipogen(Winks)",
		"22" => "Maximum aantal knipogen(Winks) welke een lid met dit pakket elke dag kan versturen.",	
	"23" => "Max File uploads",
		"24" => "Maximum aantal bestanden die een lid kan uploaden.",
	"25" => "Pakket Icoon Link",
		"26" => "Het pakket icoon link maakt een link naar een afbeelding op uw website. Aanbevolen grootte:.. 28px x 90px.",
		
	"27" => "Spotlight Lid",
		"28" => "Selecteer Ja als je wilt dat de leden foto ook op de voorpagina van uw website te zien zijn.",		
	"29" => "Spotlight",	
		"30" => "Selecteer Ja als je wilt dat de leden met dit pakket een gekleurde rand om hun foto krijgen in de zoekresultaten.",
		
	"31" => "Bekijk 18+ Content",
		"32" => "Selecteer JA als je wilt dat de leden bij dit pakket 18+ Leden foto's mogen bekijken.",
	"33" => "SMS credits",
	"34" => "Dit is het aantal sms credits van de leden accounts als zij hun pakket upgraden naar dit pakket. Dit zal automatisch aangevuld worden met het aantal credits die ze al hebben gekocht.",
	"35" => "Zichtbaar bij het upgrade pakket"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Plaats alleen een link als je wilt dat deze linkt naar een andere website",
	"3" => "RSS Nieuws feed Data",
	
	"4" => "Categorie",
	"5" => "Bekeken",
	"6" => "Ondershrift",
	"7" => "Taal",
	"8" => "Prive Groep",
		
	"9" => "Verander het Forum Board",	
	"10" => "Selecteer Forum Board",
	"11" => "Standaard Forum",
	
	"12" => "Je gebruikt nu een ander type forum. Log in om hun admin gedeelte van je forum te beheren.",	
	"13" => "Wachtwoord"
);

$admin_set_extra1 = array(

	"1" => "Accepteer Foto / Plaatjes Uploads",
	"2" => "Accepteer Video Uploads",
	"3" => "Accepteer Muziek Uploads",	
	"4" => "Accepteer YouTube Uploads",	
);

$admin_alerts = array(

	"1" => "Waarschuwingen",
	"2" => "Nieuwe bezoekers",
	"3" => "Nieuwe leden",	
	"4" => "Niet goedgekeurde leden",	
	"5" => "Niet goedgekeurde bestanden",
	"6" => "nieuwe upgrades",	
);

$lang_members_nn = array(

	"0" => "Leden misbruik Monitor",
	"1" => "Gebruikersnaam",
	"2" => "Geen Chat Historie Gevonden",	
);

$members_opts = array(

	"1" => "Edit Profiel",
	"2" => "Bestanden Uploads",
	"3" => "Betalings Historie",	
	"4" => "Verstuur Email",	
	"5" => "Verstuur bericht",
	"6" => "Forum berichten",
	"7" => "Berichten Misbruik",	
);
?>
