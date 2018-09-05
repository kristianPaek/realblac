<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Svenska",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "iso-8859-1",
	"title" => "Administrationsområde"
		
);

$admin_layout = array(

	"3" => "Mina preferenser",
	"4" => "Logga ut",

);


$admin_layout_page1 = array(

	"" => "Instrumentbräda",

		"_*" => "Administrationsområde instrumentbräda",
		"_?" => "",

	"members" => "Medlemsstatistik",
		
		"members_*" => "Medlemsstatistik",
		"members_?" => "Grafen nedan visar siffrorna över nya medlemmar som registrerat sig under de senaste två veckorna.",
		"members_^" => "sub",

	"affiliate" => "Affiliatestatistik",
 
		"affiliate_*" => "Affiliatestatistik",
		"affiliate_?" => "Grafen nedan visar siffrorna över nya affiliates som registrerat sig under de senaste två veckorna.",
		"affiliate_^" => "sub",

	"visitor" => "Besökarstatistik",
 
		"visitor_*" => "Besökarstatistik",
		"visitor_?" => "Grafen nedan visar siffrorna över besökarstatistik på webbsajten som sparats av mjukvaran varje dag under de senaste två veckorna.",
		"visitor_^" => "sub",

	"maps" => "Googlekartor",
 
		"maps_*" => "Besökares belägenhet med Googlekartor",
		"maps_?" => "Denna avdelning tillåter dig att se varifrån i världen dina medlemmar besöker din webbsajt. Detta tillåter dig att utveckla din marknadsföring och annonseringskampanjer mer effektivt genom att rikta in dig på olika länder.",
 

	"adminmsg" => "Tillkännagivanden på webbsajten",
 
		"adminmsg_*" => "Meddelanden på webbsajten",
		"adminmsg_?" => "Skriv in ditt meddelande i rutan nedanför och varje gång en medlem loggar in på sitt konto kommer meddelandet att visas för dem. Detta är perfekt för att visa tillkännagivanden om en service eller ändringar på webbsajten.",

);
 

$admin_layout_page2 = array(

	"" => "Medlemmar",

		"_$" => "halv",
		"_*" => "Administrera medlemmar",
 

			"edit" => "Redigera medlemsuppgifter",
	
				"edit_*" => "Redigera medlem",
				"edit_?" => "Använd valmöjligheterna nedanför för att uppdatera medlemskonto och profiluppgifter.",
				"edit_^" => "ingen",


			"fake" => "Fejkmedlemmar",
	 
				"fake_*" => "Generera fejkmedlemmar",
				"fake_?" => "Använd valmöjligheterna nedan för att generera fejkmedlemmar till din webbsajt, detta får din webbsajt att se 'välbesökt' ut medan du kommer igång. Det rekommenderas att du använder samma epostadress för alla fejkmedlemmar ifall du skulle vilja lokalisera och ta bort dem vid senare tillfälle.",
				"fake_^" => "sub",

	"banned" => "Förbjudna medlemmar",
 
		"banned_*" => "Förbjudna medlemmar",
		"banned_?" => "Mjukvaran har ett inbyggt hackers upptäckarsystem som automatiskt blockerar medlemmar som försöker hacka din webbsajt. Nedan finns alla de nuvarande medlems- (och icke medlem) uppgifterna för hackningsförsök.",
		"banned_^" => "sub",

	"monitor" => "Övervaka medlemmar",
 
		"monitor_*" => "Övervaka medlemmar",
		"monitor_?" => "Då och då kan medlemmar rapportera andra medlemmar för att missbruka meddelandesystemet eller för att skicka otrevliga eller oönskade medlemmar. Du kan använda detta verktyg för att se och övervaka medlemsmeddelanden för att hjälpa till att skydda andras säkerhet.",
		"monitor_^" => "sub",

	"import" => "Importera medlemmar",
 
		"import_*" => "Importera medlemmar från databas eller CVS fil",
		"import_?" => "Genom att använda valmöjligheterna nedanför kan du importera medlemmar till din webbsajt från annan dating/community mjukvaruplattform eller från en CVS backup.",
		"import_^" => "sub",
		
	"files" => "Medlemsfiler", 
	"files_*" => "Medlemmarnas albumfiler",


	"addfile" => "Ladda upp foto",			 
	"addfile_*" => "Ladda upp ett foto",
	"addfile_?" => "Ibland kommer en medlem att ha svårt att ladda upp ett foto till sin webbsajt. Genom att använda denna avdelning kan du ladda upp ett foto åt din medlem.",
	"addfile_^" => "sub",
			
 
	"affiliate" => "Webbsajtsaffiliates",
 
		"affiliate_*" => "Webbsajtsaffiliates",
		"affiliate_?" => "Genom att använda valmöjligheterna nedanför kan du sköta dina webbsajtsaffiliates.",
		 
			"addaff" => "Lägg till ny affiliate",
	 
				"addaff_*" => "Lägg till/Redigera affiliatekonto",
				"addaff_?" => "Fyll i alla fälten nedanför för att lägga till/redigera ett affiliatekonto på din webbsajt.",
				"addaff_^" => "sub",

			"affsettings" => "Affiliate innehållssidor",
 
				"affsettings_*" => "Affiliate sidodesign",
				"affsettings_?" => "Använd valmöjligheterna nedanför för att redigera ordvalet på dina affiliatesidor.",
				"affsettings_^" => "sub",

			"affcom" => "Affiliateprovision",
	 
				"affcom_*" => "Affiliateprovision",
				"affcom_?" => "Här kan du ange provisionsnivån för dina affiliates. Detta innebär att för varje försäljning som gjorts av en medlem som skickats till din webbsajt av en affiliate , kommer de att generera procent av den totala summan nedanför.",
				"affcom_^" => "sub",


			"affban" => "Affiliatebanners",
	 
				"affban_*" => "Affiliatebanners",
				"affban_?" => "Här kan du göra i ordning bannerannonserna som kommer att visas inom affiliatekontot för dina affiliates att använda på deras webbsajter.",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Temagalleri",
 
			"_*" => "Temagalleri",
			"_?" => "Listade nedanför finns alla webbsajtsschabloner som för tillfället finns installerade på din webbsajt. Klicka på förhandstitta på bild för att direkt ändra schablonen på din webbsajt.",
			 
				
			"color" => "Färgscheman",
		 
				"color_*" => "Färgscheman",
				"color_?" => "Genom att använda valmöjligheterna nedanför kan du anpassa färgschemat för din webbsajt. Om du vill ersätta bilder med dina egna, vänligen använd bildverktyget för temat.",
				"color_^" => "sub",
				
			"logo" => "Webbsajtslogo",
				"logo_$" => "halv",
				"logo_*" => "Webbsajtslogo",
				"logo_?" => "Använd valmöjligheterna på denna sida för att anpassa logoutseendet på din webbsajt. Du kan välja en fördesignad logo eller ladda upp din egen.",
				"logo_^" => "sub",
				
			"img" => "Temabilder",
				"img_$" => "halv",
				"img_*" => "Temabilder",
				"img_?" => "Bilderna nedanför är alla lagrade i din schablon bildmapp. Använd valmöjligheterna nedanför för att ersätta existerande bilder med nya som du väljer.",
				"img_^" => "sub",

			"text" => "Hemsidestext",
				"text_$" => "halv",
				"text_*" => "Hemsidestext",
				"text_?" => "Fälten nedan tillåter dig att ändra välkomsttexten på din webbsajts hemsida. Vissa schabloner använder olika uppsättningar av ordval så du kan behöva experimentera för att komma fram till vilket som är det rätta för dig.",
				"text_^" => "sub",


			"terms" => "Villkor för webbsajt",
				"terms_$" => "halv",
				"terms_*" => "Villkor för webbsajt",
				"terms_?" => "Redigera fältet nedanför för att anpassa villkoren för din webbsajt. Dessa visas sedan på registreringssidan under registreringen.",
				"terms_^" => "sub",
	
			"edit" => "Sidor & Filer",
 
			"edit_*" => "Webbsajtssidor",
			"edit_?" => "Välj från listrutorna nedanför för att se innehållet i filerna på din webbsajt. Det rekommenderas att man kopierar och klistrar in koden i en editor som frontpage eller dreamweaver innan redigering och klistrar tillbaka det när du är färdig. <b>Vänligen var noga när du redigerar config eller systemfiler eftersom ändringar är omedelbara och inte kan backas.</a>",
				
	
	
				"newpage" => "Skapa sida",
				"newpage_$" => "halv",
				"newpage_*" => "Skapa en ny sida",
				"newpage_?" => "Att skapa en ny sida på din webbsajt är enkelt. Skriv in en ordtitel i rutan nedanför och din sida kommer att skapas redo att redigeras.",
				"newpage_^" => "sub",
							
				
			"meta" => "Metataggar för tema",
				"meta_$" => "halv",
				"meta_*" => "Editor för metataggar",
				"meta_?" => "eMeeting har ett sofistikerat skapelsesystem för metataggar inbyggt i mjukvaran som hjälper dig att spara tid och pengar när du inte behöver skapa tusentals sidobeskrivningar på egen hand. Mjukvaran kommer automatiskt att generera titel, beskrivning och nyckelord för metataggar baserade på innehållet som visas på sidan.",
				"meta_^" => "sub",

 

		
			"menu" => "Menyrad",
				"menu_$" => "halv",
				"menu_*" => "Menyradshantering",
				"menu_?" => "Använd valmöjligheterna nedanför för att ändra ordningen på dina medlemmars rader eller lägga till nytt menyinnehåll. Du kan också skriva in externa länkar så som http://google.com som menylänk för ett menyval om du önskar länka till en annan webbsajt eller sida på din webbsajt.",
				"menu_^" => "sub",

	"manager" => "Filhanterare",
		"manager_$" => "halv",
		"manager_*" => "Filhanterare",
		"manager_?" => "Filhanteraren är väldigt användbar när man ska lägga till eller ta bort nya filer/innehåll till din webbsajt. Du kan söka genom hela värdkontot och ta bort filer om det behövs.",

			"slider" => "Roterande bilder",
				"slider_$" => "halv",
				"slider_*" => "Roterande bilder på hemsida",
				"slider_?" => "Sliderbilderna är de roterande bilderna som visas på din hemsida. Använd valmöjligheterna nedanför för att ändra bilden, beskrivningen och klickbara länkar.",
				"slider_^" => "sub",

	"languages" => "Språkfiler",
		"languages_$" => "halv",
		"languages_*" => "Språkfiler",
		"languages_?" => "Listade nedan finns alla språkfiler som finns laddade till din webbsajt. Du kan ta bort vilken som helst av språkfilerna som du inte vill använda och de kommer inte att visas på din webbsajt eller markera rutan för att ändra standardspråk för webbsajten. <b>Lägg märke till att du måste logga ut från admin och webbsajten för att se eventuella språkändringar</b>",

			"editlanguage" => "Redigera språkfiler",
				"editlanguage_$" => "halv",
				"editlanguage_*" => "Redigera språkfiler",
				"editlanguage_?" => "Var försiktig när du redigerar språkfilen nedan, se till att behålla samma syntax för att förhindra systemfel. Skriv bara in innehållet inom efter pilen (=>) Det första värdet används som nyckel.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Lägg till språkfil",
				"addlanguage_$" => "halv",
				"addlanguage_*" => "Lägg till språkfil",
				"addlanguage_?" => "Att skapa en ny språkfil kommer helt enkelt att kopiera en av de existerande som du väljer nedan och döpa om den, du kan sedan öppna upp språkfilen och redigera innehållet.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Epost och nyhetsbrev",

		"_$" => "halv",
		"_*" => "Epost och nyhetsbrev",
		"_?" => "Nedan finns listan över alla epostadresser som för tillfället finns lagrade i systemet. System epost används av mjukvaran för att skicka epostmeddelande till medlemmarna vid händelser så som registrering eller vid förlorat lösenord. Du kan anpassa all epost och skapa din egen genom att använda valmöjligheterna nedan",

			"add" => "Skapa nytt epostmeddelande",
				"add_$" => "halv",
				"add_*" => "Lägg till/Redigera nytt epostmeddelande",
				"add_?" => "Fyll i formulären nedanför för att lägga till/redigera ditt nya epostmeddelande, detta kommer då att sparas i din mapp för epostmallar så att du kan återvända till det eller skicka det när du vill.",
				"add_^" => "sub",

	"welcome" => "Välkomstepost/ SMS",
		"welcome_$" => "halv",
		"welcome_*" => "Ordna välkomstepost/ SMS",
		"welcome_?" => "Genom att använda valmöjligheterna nedan kan du välja vilket epostmeddelande och textmeddelande som ska skickas till medlemmen vid registrering.",
		"welcome_^" => "sub",

	"template" => "Epostmallar",
		"template_$" => "halv",
		"template_*" => "Epostmallar",
		"template_?" => "Listade nedan finns ett urval av mallar som är inbyggda i mjukvaran. Klicka på någon av bilderna för att öppna och redigera mallen.",
		"template_^" => "sub",

	"export" => "Ladda ner epost",

		"export_$" => "halv",
		"export_*" => "Ladda ner epost",
		"export_?" => "Använd valmöjligheterna nedan för att ladda ner alla medlemmars epostadresser från databasen.",
		"export_^" => "sub",

	"sendnew" => "Skicka nyhetsbrev",

		"sendnew_$" => "halv",
		"sendnew_*" => "Skicka nyhetsbrev",
		"sendnew_?" => "Använd den här avdelningen för att börja skicka nyhetsbrev till dina medlemmar. Välj först vilka medlemmar det ska skickas till och välj sedan vilket epostmeddelande som ska skickas.",

	"send" => "Skicka enskilt epostmeddelande",

		"send_$" => "halv",
		"send_*" => "Skicka enskilt epostmeddelande",
		"send_?" => "Använd denna valmöjlighet för att skicka ett enskilt epostmeddelande till en medlem genom att skriva in epostadressen nedan. Eposten som används för att skicka brevet är samma som som finns listad på ditt adminkonto.",
		"send_^" => "sub",

	"subs" => "Epostpåminnelse",

		"subs_$" => "halv",
		"subs_*" => "Epostpåminnelse",
		"subs_?" => "Epostpåminnelse tillåter dig att skicka epostmeddelanden till medlemmar som befinner sig X antal dagar från en händelse som att deras medlemskap håller på att gå ut eller att de inte har ett foto inlagt.",
		"subs_^" => "sub",
		
	"tc" => "Epostrapporter",
		"tc_$" => "halv",
		"tc_*" => "Epostrapporter",
		"tc_?" => "Epostrapporter genereras när ett epostmeddelande skickas som innehåller spårningskoden. De genererar statistik över hur många medlemmar som öppnat det epostmeddelande som du skickat.",
		"tc_^" => "sub",

			"tracking" => "Spårningskod för epost",
				"tracking_$" => "halv",
				"tracking_*" => "Spårningskod för epost",
				"tracking_?" => "Spårningskoden nedan (spårnings_id) ersätts med en transparent bild som bifogas till epostmeddelandet när det skickas. Om meddelandet öppnas och bilden inte blockeras kan systemet se att meddelandet har öppnats och genererar därmed en spårningsrapport till dig.",
				"tracking_^" => "sub",



	"SMSsend" => "Skicka SMS-meddelanden",

		"SMSsend_$" => "halv",
		"SMSsend_*" => "Skicka SMS-meddelanden",
		"SMSsend_?" => "Använd valmöjligheterna nedanför för att skicka SMS/textmeddelanden till dina medlemmars mobiltelefoner.",
);

$admin_layout_page5 = array(

	"" => "Medlemskapsnivåer",

		"_$" => "halv",
		"_*" => "Medlemskapsnivåer",
		"_?" => "Listade nedan finns alla nuvarande medlemskapspaket som finns på din webbsajt. De som är belysta med grönt krävs av systemet för att kontrollera hur besökare och nya medlemmar hanteras vilket ger dig mer kontroll över din webbsajt.",

			"epackage" => "Lägg till paket",
				"epackage_$" => "halv",
				"epackage_*" => "Lägg till/Redigera paket",
				"epackage_?" => "Fyll i formulären nedan för att lägga till eller uppdatera medlemskapspaketen för din webbsajt.",
				"epackage_^" => "sub",

			"packaccess" => "Hantera tillgång",
				"packaccess_$" => "full",
				"packaccess_*" => "Hantera sidotillgång",
				"packaccess_?" => "Här kan du kontrollera tillgång till hela din webbsajt baserat på medlemskapspaket. <b>Notera: Klicka bara i rutan om du INTE vill att medlemmen ska se den sidan. </b>",
				"packaccess_^" => "sub",

			"upall" => "Flytta över medlemmar",
				"upall_$" => "halv",
				"upall_*" => "Flytta över medlemmar mellan paket",
				"upall_?" => "Andvänd den här valmöjligheten om du vill flytta en medlem från ett medlemskapsnivå till en annan.",
								"upall_^" => "sub",


	"gateway" => "Betalningsportar",

		"gateway_$" => "halv",
		"gateway_*" => "Betalningsportar",
		"gateway_?" => "Betalningsportar tillåter dig att ta betalt för medlemskapsuppgraderingar. Om du driver en kostnadsfri webbsajt kan du stänga av betalningssystemet i inställningsfunktionen.",


			"addgateway" => "Lägg till betalningsport",
				"addgateway_$" => "halv",
				"addgateway_*" => "Lägg till betalningsport",
				"addgateway_?" => "Mjukvaran har ett antal betalningsportar som redan är inbyggda i systemet, välj leverantör från listan nedan för att använda denna på din webbsajt.",
				"addgateway_^" => "sub",


	"billing" => "Faktureringssystem",

		"billing_$" => "halv",
		"billing_*" => "Faktureringssystem",	


		"affbilling" => "Faktureringshistorik för affiliate",
	
			"affbilling_$" => "halv",
			"affbilling_*" => "Faktureringshistorik för affiliate", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banners och annonsering",

		"_$" => "halv",
		"_*" => "Banners och annonsering",
 

			"addbanner" => "Lägg till banner",
				"addbanner_$" => "halv",
				"addbanner_*" => "Lägg till banner",
				"addbanner_?" => "Använd valmöjligheterna nedan för att lägga till en ny banner till din webbsajt.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Visningsinställningar",

		"_$" => "halv",
		"_*" => "Visningsinställningar",
		"_?" => "Använd valmöjligheterna nedan för att sätta på/stänga av webbsajtsfunktioner som du inte vill använda.",


	"op" => "Visa valmöjligheter",

		"op_$" => "halv",
		"op_*" => "Visa valmöjligheter",
		"op_?" => "Använd valmöjligheterna nedan för att anpassa inställningarna på din webbsajt som du vill ha dem.",
	
		"op1" => "Sök inställningar",
	
			"op1_$" => "halv",
			"op1_*" => "Sök visningsinställningar",
			"op1_?" => "Använd valmöjligheterna nedan för att anpassa sättet som dina söksidor visas på din webbsajt.",
			"op1_^" => "sub",
	
		"op2" => "Medlemskapsinställningar",
	
			"op2_$" => "halv",
			"op2_*" => "Medlemskapsinställningar",
			"op2_?" => "Använd valmöjligheterna nedan för att anpassa sättet som medlemskapet på din webbsajt visas.",
			"op2_^" => "sub",

		"op3" => "Flash Serverinställningar",
	
			"op3_$" => "halv",
			"op3_*" => "Flash Serverinställningar",
			"op3_?" => "En flash server används för att lagra medlemmarnas videohälsningar och används inom IM och chatrummen för att visa medlemmarnas videokameror.",
			"op3_^" => "sub",

		"op4" => "API inställningar",
	
			"op4_$" => "halv",
			"op4_*" => "API inställningar", 
			"op4_^" => "sub",

		"thumbnails" => "Standard thumbnailbilder",
	
			"thumbnails_$" => "halv",
			"thumbnails_*" => "Standard thumbnailbilder", 
			"thumbnails_^" => "Listade nedan finns alla nuvarande standardbilder som används på din webbsajt när medlemmar inte har laddat upp egna foton.",

	"email" => "Epostinställningar",

		"email_$" => "halv",
		"email_*" => "Epostinställningar",
		"email_?" => "Nedan finns en lista med webbsajtsevenemang, du kan välja vilka händelser du vill att systemet ska skicka dig epostmeddelande om. Epostmeddelande kommer att skickas till alla systemadministratörer som har tillgång till systeminställningar.",

	"paths" => "Fil/Mappvägar",

		"paths_$" => "halv",
		"paths_*" => "Fil/Mappvägar",
		"paths_?" => "Fil och mappvägarna nedan relaterar till filerna och mapparna på ditt värdkonto. Mjukvaran kommer automatiskt att använda dessa under installationsprocessen och om de skulle vara inkorrekta kan du ändra dem nedan.",

	"watermark" => "Vattenstämpel på bild",

		"watermark_$" => "halv",
		"watermark_*" => "Vattenstämpel på bild",
		"watermark_?" => "En bildvattenstämpel är en bild som visas längst upp på medlemmarnas foton när de visas. Detta är vanligtvis ett logo för din webbsajt, vattenstämplar måste vara i formatet PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Webbsajtsfält",

		"_$" => "halv",
		"_*" => "Profil, registrering och sökfält",
		"_?" => "Listade nedan finns alla nuvarande fält som finns listade på din webbsajt. Du kan välja att visa fälten på söksidan, registreringssidorna, profilsidor och till och med på medlemsmatchningssidor. Du kan snabbt och lätt lägga till nya fält till din webbsajt genom att använda valmöjligheterna nedanför.",

		"addfields" => "Skapa nytt fält",
	
			"addfields_$" => "halv",
			"addfields_*" => "Skapa nytt fält",
			"addfields_?" => "Använd valmöjligheterna nedan för att lägga till ett nytt fält på din webbsajt. Ett fält används för att tillåta medlemmarna att fylla i information om sig själva.",
			"addfields_^" => "sub",

		"fieldgroups" => "Hantera grupper",
	
			"fieldgroups_$" => "halv",
			"fieldgroups_*" => "Hantera fältgrupper",
			"fieldgroups_?" => "Grupper är en samling av fält som har ett gemensamt tema. Du skapar till exempel en grupp som heter 'Om mig' och inom gruppen lägger du till fält så som 'Mitt namn', 'Min ålder' etc. <b>Om du tar bort en grupp med fält i så kommer fälten automatiskt att flyttas till nästa grupp.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Skapa ny fältgrupp",
	
			"addgroups_$" => "halv",
			"addgroups_*" => "Skapa ny fältgrupp",
			"addgroups_?" => "En fältgrupp är en samling fält som alla sätts under samma grupprubrik. Detta gör det möjligt för dig att skapa massor av grupper med fält som är relaterade till grupptemat.",
			"addgroups_^" => "sub",




	"cal" => "Evenemangskalender",

		"cal_$" => "halv",
		"cal_*" => "Evenemangskalender",
		"cal_?" => "Evenemangskalendern visas på din webbsajt för medlemmar för att skapa och se evenemang. Använd valmöjligheterna nedan för att skapa, redigera och importera nya evenemang.",

		"caladd" => "Lägg till evenemang",
	
			"caladd_$" => "halv",
			"caladd_*" => "Lägg till/Redigera evenemang",
			"caladd_?" => "Fyll i fälten nedan för att lägga till/redigera ett webbsajtevenemang.",
			"caladd_^" => "sub",

		"caladdtype" => "Hantera evenemangtyper",
	
			"caladdtype_$" => "halv",
			"caladdtype_*" => "Hantera evenemangtyper",
			"caladdtype_?" => "Använd valmöjligheterna nedan för att skapa nya evenemangtyper, det rekommenderas att lägga till en bild för varje evenemang för att få din webbsajt att se mer professionell ut.",
			"caladdtype_^" => "sub",

		"importcal" => "Importera evenemang",
	
			"importcal_$" => "halv",
			"importcal_*" => "Sök & Importera evenemang",
			"importcal_?" => "Mjukvaran har ett inbyggt evenemangs apisystem. Detta tillåter dig att söka i en världsomfattande databas över lokala och internationella evenemang och lägga till dem direkt på din webbsajt.",
			"importcal_^" => "sub",


	"poll" => "Webbsajtsenkät",

		"poll_$" => "halv",
		"poll_*" => "Webbsajtsenkät",
		"poll_?" => "Använd valmöjligheterna nedan för att skapa och hantera dina webbsajtsenkäter",

		"polladd" => "Lägg till enkät",
	
			"polladd_$" => "halv",
			"polladd_*" => "Skapa en ny enkät",
			"polladd_?" => "Fyll i fälten nedan för att skapa en ny enkät till din webbsajt.",
			"polladd_^" => "sub",



	"forum" => "Webbsajtsforum",

		"forum_$" => "halv",
		"forum_*" => "Kategorier för webbsajtsforum",
		"forum_?" => "Använd valmöjligheterna nedan för att hantera kategorier för ditt webbsajtsforum. Det rekommenderas att man lägger till fotoikoner för varje kategori för att få din webbsajt att se mer professionell ut.",

		"forumadd" => "Lägg till forumkategori",
	
			"forumadd_$" => "halv",
			"forumadd_*" => "Lägg till forumkategori",
			"forumadd_?" => "Fyll i fälten nedan för att lägga till en ny kategori på din webbsajt.",
			"forumadd_^" => "sub",

		"forumchange" => "Tredje parts forum",
	
			"forumchange_$" => "halv",
			"forumchange_*" => "Hantera forumintegration",
			"forumchange_?" => "Mjukvaran ger dig förmåga att ändra forumtavlan, detta betyder att du kan välja att använda vilket som helst av forumen i listan nedan istället för standardforumet. Vänligen gå till installationsmanualen för varje forum innan du väljer ut en forumtavla.",
			"forumchange_^" => "sub",

		"forumpost" => "Hantera inlägg",
	
			"forumpost_$" => "halv",
			"forumpost_*" => "Hantera foruminlägg",
			"forumpost_?" => "Listade nedan finns alla de senaste foruminläggen publicerade av dina medlemmar. Använd valmöjligheterna nedan för att redigera eller ta bort ämnen som inte är godtagbara.",
			"forumpost_^" => "sub",

	"chatrooms" => "Webbsajtens chatrum",

		"chatrooms_$" => "halv",
		"chatrooms_*" => "webbsajtens chatrum",
		"chatrooms_?" => "Använd valmöjligheterna nedanför för att skapa nya chatrum för din webbsajt eller redigera de redan existerande.",


	"faq" => "webbsajtsFAQ",

		"faq_$" => "halv",
		"faq_*" => "webbsajtsFAQ",
		"faq_?" => "webbsajtsFAQ är ett bra sätt att hjälpa medlemmar lära sig mer om din webbsajt och svara på alla problem som de kan tänkas ha. Skapa din egen uppsättning av FAQ och hantera dem genom att använda valmöjligheterna nedanför.",

		"faqadd" => "Lägg till FAQ",
	
			"faqadd_$" => "halv",
			"faqadd_*" => "Lägg till/redigera FAQ",
			"faqadd_?" => "Fyll i fälten nedanför för att lägga till eller redigera ett inlägg i FAQ.",
			"faqadd_^" => "sub",

	"words" => "Ordfilter",

		"words_$" => "halv",
		"words_*" => "Ordfilter",
		"words_?" => "Ordfiltret används på medlemsprofiler, IM och forum och kommer att filtrera ut de ord du skriver in här och ersätta dem med stjärnor (**).",



	"articles" => "Webbsajtsartiklar",

		"articles_$" => "halv",
		"articles_*" => "Webbsajtsartiklar",
		"articles_?" => "Webbsajtsartiklar är ett bra sätt att hålla dina medlemmar uppdaterade med de senaste ändringarna på webbsajten för nyheter och evenemang",


		"articleadd" => "Lägg till artikel",
	
			"articleadd_$" => "halv",
			"articleadd_*" => "Skapa en ny artikel",
			"articleadd_?" => "Fyll i fälten nedanför för att lägga till en ny artikel på din webbsajt.",
			"articleadd_^" => "sub",

		"articlerss" => "Importera RSS-artiklar",
	
			"articlerss_$" => "halv",
			"articlerss_*" => "Importera RSS-artiklar",
			"articlerss_?" => "RSS-länkarna kan användas för att importera RSS-artikla direkt in i en av kategorierna du har skapat. Du kan till exempel vilja skapa en 'Nyheter' kategori och skriva in RSS-flöde från en webbsajt med nyheter. Mjukvaran kommer då automatiskt att extrahera alla artiklar från RSS-flödet och lägga till dem på din webbsajt.",
			"articlerss_^" => "sub",

		"articlecats" => "Artikelkategorier",
	
			"articlecats_$" => "halv",
			"articlecats_*" => "Artikelkategorier",
			"articlecats_?" => "Använd valmöjligheterna nedanför för att skapa nya artikelkategorier till din webbsajt.",
			"articlecats_^" => "sub",


	"groups" => "Communitygrupper",

		"groups_$" => "halv",
		"groups_*" => "Communitygrupper",
		"groups_?" => "Använd valmöjligheterna nedanför för att skapa och hantera communitygrupperna på din webbsajt.",


	"class" => "Rubrikannonser",

		"class_$" => "halv",
		"class_*" => "Rubrikannonser",
		"class_?" => "Listade nedanför finns alla rubrikannonser skapade av dina medlemmar.",


		"addclass" => "Rubrikannonser",
	
			"addclass_$" => "halv",
			"addclass_*" => "Lägg till/redigera annons",
			"addclass_?" => "Använd valmöjligheterna nedan för att lägga till/redigera annonserna på din webbsajt.",
			"addclass_^" => "sub",

		"addclasscat" => "Hantera kategorier",
	
			"addclasscat_$" => "halv",
			"addclasscat_*" => "Hantera kategorier",
			"addclasscat_?" => "Använd valmöjligheterna nedan för att hantera dina rubrikannonskategorier. Det rekommenderas att man lägger till en fotoikon för varje för att få din webbsajt att se mer professionell ut.",
			"addclasscat_^" => "sub",

	"games" => "Webbsajtsspel",

		"games_$" => "halv",
		"games_*" => "Webbsajtsspel",
		"games_?" => "Listade nedan finns alla spel som nu finns på din webbsajt. Se manualen för information om hur man installerar nya spel",

	"gamesinstall" => "Installera spel",

		"gamesinstall_$" => "halv",
		"gamesinstall_*" => "Installera spel",
		"gamesinstall_?" => "Välj spelen nedan som du vill installera. Om du vill lägga till nya spel till din webbsajt laddar du helt enkelt upp tarfilerna för spelet till din spelmapp som finns i: inc/exe/Games/tar/. <b>Titta i manualen för information om hur man installerar nya spel</b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administratörer",

		"_$" => "halv",
		"_*" => "webbsajtsadmin & moderatorer",
		"_?" => "Listade nedan finns alla webbsajtens admins och moderatorer förutom superanvändaren. Lägg till nya moderatorer genom att använda medlemssöksidan och klicka på moderatorikonen bredvid deras namn.",

	"pref" => "Adminpreferenser",

		"pref_$" => "halv",
		"pref_*" => "Adminpreferenser",
		"pref_?" => "Använd valmöjligheterna nedanför för att anpassa administratorspreferenserna.",

	"manage" => "Hantera moderatorer",

		"manage_$" => "halv",
		"manage_*" => "Hantera webbsajt Hantera moderatorer",
		"manage_?" => "En webbsajtsmoderator kan ha två roller, de kan vara en webbsajtsmoderator som tillåter dem tillgång att moderera enbart huvudwebbsajten eller så kan du ge dem deras egna inloggningsuppgifter som admin så att de kan logga in i adminområdet och använda adminverktygen.",

	"email" => "Epost för admin",

		"email_$" => "halv",
		"email_*" => "Epost för admin",
		"email_?" => "Listade nedan finns alla epost skickade till admin från webbsajtens medlemmar.",

	"compose" => "Skriv epost",

		"compose_$" => "halv",
		"compose_*" => "Skriv epost",
		"compose_?" => "Använd valmöjligheterna nedanför för att skapa ett nytt meddelande att skicka till en medlem.",
		"compose_^" => "sub",

	"super" => "Superanvändarinloggning",

		"super_$" => "halv",
		"super_*" => "Superanvändare inloggningsinformation",
		"super_?" => "Vänligen var försiktig när kontoinformationen nedan redigeras, detta är superanvändarkontot och du bör se till att lösenordet förvaras säkert från andra hela tiden.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Mjukvaruuppdateringar",

		"_$" => "halv",
		"_*" => "Mjukvaruuppdateringar",
		"_?" => "Listad nedanför är den nuvarande versionen av mjukvaran du använder jämförd med den senaste tillgängliga versionen. Om din version är för gammal, vänligen kontakta din leverantör för de senaste uppgraderingarna.",

	"backup" => "Databasbackup",

		"backup_$" => "halv",
		"backup_*" => "Databasbackup",
		"backup_?" => "Välj en eller flera av tabellerna nedan för att göra backup på databasen. Det är starkt rekommenderat att du använder värdområdets funktioner för databasbackup för att se till att all information är mottagen.",


	"license" => "Licensnyckel för mjukvara",

		"license_$" => "halv",
		"license_*" => "Licensnyckel för mjukvara",
		"license_?" => "Listade nedan finns dina licensnycklar, vänligen ta dessa vid redigering för att se till att de är korrekta.",

	"sms" => "SMS-krediter",

		"sms_$" => "halv",
		"sms_*" => "SMS-krediter",
		"sms_?" => "Listade nedan finns det totala antalet SMS-krediter som finns kvar på ditt konto.",

);

$admin_layout_page11 = array(

	"" => "Mjukvaruplugins",

		"_$" => "halv",
		"_*" => "Mjukvaruplugins",
		"_?" => "Plugins expanderar funktionaliteten av eMeeting datingmjukvara. När en plugin är installerad kan du aktivera eller avaktivera den här genom att använda menyvalen till vänster.",

);


$admin_layout_nav = array(

	"1" => "Instrumentbräda",
		"1a" => "Medlemsstatistik",
		"1b" => "Affiliatestatistik",
		"1c" => "Besöksstatistik",
		"1d" => "Besökarnas lokalisering",
	"2" => "Medlemmar",
		"2a" => "Hantera medlemmar",
		"2b" => "Hantera affiliates",
		"2c" => "Förbjudna medlemmar",
		"2d" => "Medlemsfiler",
		"2e" => "Importera medlemmar",
	"3" => "Design",
		"3a" => "Teman",
		"3b" => "Temaeditor",
		"3c" => "Tema bildhanterare",
		"3d" => "Logoeditor",
		"3e" => "Metataggar",	
		"3f" => "Språk",
		"3g" => "Sidoordval",
		"3h" => "Filhanterare",
		"3i" => "Menyknappar",
	"4" => "Epost",
		"4a" => "Hantera epost",
		"4b" => "Epostmallar",
		"4c" => "Epostrapporter",
		"4d" => "Skicka enskilt epostmeddelande",
		"4e" => "Epostpåminnelse",	
		"4f" => "Ladda ner epost",
		"4g" => "Skicka nyhetsbrev",		
	"5" => "Fakturering",
		"5a" => "Hantera paket",
		"5b" => "Betalningsportar",
		"5c" => "Faktureringshistorik",
		"5d" => "Affiliate faktureringshistorik",
	"6" => "Inställningar",
		"6a" => "Visningsval",
		"6b" => "Visningsinställningar",
		"6c" => "Systemstigar",
		"6d" => "Foto vattenstämpel",
	"7" => "Innehåll",
		"7a" => "Sök fält",
		"7b" => "Evenemangkalender",
		"7c" => "Webbsajtsenkät",
		"7d" => "Webbsajtsforum",
		"7e" => "Chatrum",	
		"7f" => "FAQ",
		"7g" => "Ordfilter",
		"7h" => "Artiklar/Nyheter",
		"7i" => "Grupper",
	"8" => "Kampanjer",	
		"8a" => "Banners",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Hantera moderatorer",	
		"10a" => "Hantera moderatorer",
		"10b" => "Superanvändare",
	"11" => "Underhåll",
		"11a" => "Systembackup",
		"11b" => "Licensnycklar",
		"11c" => "Systemuppdateringar",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "System uppdaterades framgångsrikt",
	"no_update" => "System uppdaterat, det fanns dock inget att ta bort!",
	"edit" => "Redigera",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Sök",
	"1" => "Välj alla",
	"2" => "Avmarkera alla",
	"3" => "Godkänn",
	"4" => "Stäng av",
	"5" => "Ta bort",	
	"6" => "Gör utvald medlem",
	"7" => "Valmöjligheter",	
	"8" => "Uppdatera",	
	"9" => "Gör utvalda",
	"10" => "Ta bort utvalda",	
	"11" => "Uppdatera standardspråk",
	"12" => "Skicka",
	"13" => "Fortsätt",	
	"14" => "Gör aktiv",
	"15" => "Gör inaktivt",
	"16" => "Uppdatera beställning",
	"17" => "Uppdatera fältsidor",	
	"18" => "Gör aktivt",
);

$admin_table_val = array(
	"1" => "Användarnamn",
	"2" => "Kön",
	"3" => "Senaste inloggning",
	"4" => "Status",
	"5" => "Paket",
	"6" => "Uppdaterad",
	"7" => "Valmöjligheter",	
	"8" => "Datum",
	"9" => "IP-adress",
	"10" => "Hackserie",	
	"11" => "Registreringsdatum",	
	"12" => "Namn",
	"13" => "Epost",
	"14" => "Klick",
	"15" => "Registreringar",
			
	"15" => "Betald provision",
		
	"16" => "Meddelande",
	"17" => "Tid",
	"18" => "Filnamn",
	"19" => "Senast uppdaterad",	
	"20" => "Redigera",
	"21" => "Standard",	
	"22" => "ID",

	"23" => "Pris",
	"24" => "Synlig",	
	"25" => "Typ",
	"26" => "Hantera tillgång",	
	"27" => "Aktiv",

	"28" => "Se kod",
	"29" => "Fält",	
	"30" => "Affiliatenamn",
	"31" => "Totalt förfallet",	
	"32" => "Status",
	
	"33" => "Uppgraderingsdatum",
	"34" => "Utgångsdatum",	
	"35" => "Betalningsmetod",
	"36" => "Fortfarande aktiv",	
	"37" => "Lösenord",
	"38" => "Senast inloggad",

	"39" => "Position",
	"40" => "Träffar",	
	"41" => "Aktiv",
	"42" => "Förhandstitt",	
	"43" => "Titel",
	"44" => "Artiklar",
	"45" => "Beställ",

);

$admin_search_val = array(
	"1" => "Medlemmens användarnamn",
	"2" => "Alla paket",
	"3" => "Alla kön",
	"4" => "Per sida",
	"5" => "Beställ av",
	"6" => "Epostadress",
	
	"7" => "Vilken status som helst",
	"8" => "Aktiva medlemmar",
	"9" => "Avstängda medlemmar",
	"10" => "Icke godkända medlemmar",
	"11" => "Medlemmar som vill avsluta",
	"12" => "Alla sidor",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Hantera alla grupper",
	"2" => "Gruppnamn",
	"3" => "Språk",		
	"4" => "Hantera ämnen",
	"5" => "Hantera kategorier",	
	"6" => "Gruppkategorinamn",		
	"7" => "Hantera kategorier",	
	"8" => "Namn",	
	"9" => "Räkna",	
	"10" => "Lägg till artikel",	
	"11" => "Kategori",
	"12" => "Sidotitel",	
	"13" => "Kort beskrivning",		
	"14" => "Lägg till artikel",
	"15" => "Hantera kategorier",
	"16" => "Fältlista",
	"17" => "Beställ",
	"18" => "Språk",
	"19" => "Listvärden",
	"20" => "Nytt fält",	
	
	"21" => "Fälttitel",		
	"22" => "Fälttyp",
		"23" => "Textfält",	
		"24" => "Textområde",	
		"25" => "Listruta",
		"26" => "Enskild kryssruta",
		"27" => "Flertal checkruta",
	
	"28" => "Grupprubrik",
	"29" => "Inkludera under registrering",
	"30" => "Välj nedanför",
	
	"31" => "Lägg till grupp",
	"32" => "Gruppvisningsval",
		"34" => "Visa för alla medlemmar",
		"35" => "Visa enbart för webbsajtsadmin",
		"36" => "Visa för admin och medlemmar (inte på profil)",
	"37" => "Bara",	
	"38" => "Hantera grupper",	
	"39" => "Lägg till evenemang",	
	"40" => "Fälttext",
	"41" => "Text",		
	"42" => "Beskrivningstyp",
	"43" => "Texttyp",	
	"44" => "Söktext",		
	"45" => "Profiltext",	
	"46" => "Du måste skapa en text för profilsidan så som 'jag är en' och en till söksidan så som 'jag söker en'",	
	"47" => "Existerande fälttext",	
	"48" => "Flytta fält till denna grupp",		
	"49" => "Medlems-ID",
	"50" => "Evenemangsnamn",	
	"51" => "Evenemangsbeskrivning",		
	"52" => "Evenemangstyp",
	"53" => "Välj kategori",	
	"54" => "Välj typ",
	"55" => "Evenemangstid",
	"56" => "Lämna tom för hela dagen",
	"57" => "Evenemangsdatum",
	"58" => "Månad",	
	
	"59" => "Dag",	
	"60" => "År",
	"61" => "Land",		
	"62" => "Län/landskap",
	"63" => "Gata",	
	"64" => "Ort/stad",		
	"65" => "Telefon",	
	"66" => "Epost",	
	"67" => "Webbsajt",	
	"68" => "Evenemang synligt för",		
		"69" => "Alla",
		"70" => "Enbart vänner",	
		
	"71" => "Lägg till enkät",		
	"72" => "Enkätresultat på webbsajt",
	"73" => "Enkätnamn",	
	"74" => "Svara",	
	"75" => "Gör aktiv",
	
	"76" => "Lägg till forumämne",
	"77" => "Hantera inlägg",
	"78" => "Forumämne",	
		
	"79" => "Titel",	
	"80" => "Beskrivning",
	"81" => "Foruminlägg",		
	"82" => "Alla inlägg",
	"83" => "Idag",	
	"84" => "Denna veckan",		
	"85" => "Förra veckan",	
	"86" => "Rumsnamn",	
	"87" => "Existerande fälttext",	
	"88" => "Lösenord till rum",		
	"89" => "Lägg till ny",
	"90" => "Lägg till F.A.Q",
	
	"91" => "Lägg till ordcensur",		
	"92" => "Ord",
	
	"93" => "Godkänd",
	"94" => "Text",
	"95" => "Matchningstext",
	"96" => "Språk",

	"97" => "Förhandstitt",
	"98" => "Resultat",
);
$admin_advertising = array(

	"1" => "Webbsajtsbanner",
	"2" => "Lägg till banner",
	"3" => "Affiliatebanner",	
	"4" => "Lägg till/redigera banner",
	"5" => "Bannertyp",	
	"6" => "Webbsajtsbanner",			
	"7" => "Affiliatebanner",	
	"8" => "Namn",	
	"9" => "Ladda upp banner",	
	"10" => "Skriv in HTML",	
	"11" => "HTML-kod",
	"12" => "Ladda upp banner",	
	"13" => "Bannerlänk",		
	"14" => "Visa för",
		"15" => "Alla medlemmar",
		"16" => "Enbart inloggade medlemmar",
	
	"17" => "Sida",
	"18" => "Aktiv",
	
	"19" => "Topposition",
	"20" => "Mittenposition",	
	"21" => "Vänsterposition",		
	"22" => "Bottenposition",
	"23" => "Lämna tom för att använda länk inom bannerkod",
	"24" => "Förhandstitt på banner",
	
);


$admin_maintenance = array(

	"1" => "Nu körs",
	"2" => "Senaste versionen",
	"3" => "SMS-krediter",	
	"4" => "Återstående SMS-krediter",	
	"5" => "Köp krediter",	

);

$admin_admin = array(

	"1" => "Lägg till admin",
	"2" => "Användarnamn",
	"3" => "Lösenord",	
	"4" => "Epost",
	
	"5" => "Redigera admininställningar",	
	"6" => "Fullständigt namn",			
	"7" => "Tillgångsnivå",	
		"8" => "Full systemtillgång",	
		"9" => "Enbart medlemstillgång",	
		"10" => "Enbart designtillgång",	
		"11" => "Enbart eposttillgång",
		"12" => "Enbart faktureringstillgång",	
		"13" => "Enbart inställningstillgång",		
		"14" => "Enbart styrningstillgång",
	"15" => "Adminikon",

	"17" => "Epostlarm",
	"18" => "Admin nyhetsmeddelande",
	"19" => "Flytta över medlemmar från",
	"20" => "Till följande paket",	
	"21" => "Redigera paket",		
	"22" => "Pakettillgång",
	"23" => "Lägg till paketartikel",	
	"24" => "Hantera pakettillgång",
);

$admin_settings = array(

	"1" => "Visa sidor",
	"2" => "Aktiverad",
	"3" => "Avaktivera",	
	"4" => "Webbvägar",
	"5" => "Servervägar",	
	"6" => "Thumbnailvägar",			
	"7" => "Lägg till fält",	
	"8" => "Namn",	
	"9" => "Värde",	
	"10" => "Typ",	
	"11" => "Hantera fält",
	"12" => "Lägg till portar",	
	"13" => "Betalningssystem",		
	"14" => "Betalningskod för port",
	"15" => "Titel",
	"16" => "Pakettillgång",
	"17" => "Kommentarer",
	"18" => "Flytta över medlemmar",
	"19" => "Flytta över alla medlemmar från",
	"20" => "Till följande paket",	
	"21" => "Redigera paket",		
	"22" => "Pakettillgång",
	"23" => "Lägg till paketartikel",	
	"24" => "Hantera pakettillgång",
);

$admin_billing = array(

	"1" => "Lägg till paket",
	"2" => "Hantera pakettillgång",
	"3" => "Flytta över medlemspaket",			
	"4" => "Din webbsajt körs för närvarande i <b>FRITT LÄGE</b> eftersom medlemskapspaket har avaktiverats.",
	"5" => "Skulle du vilja avaktivera fritt läge och visa medlemspaket?",	
	"6" => "AVAKTIVERA FRITT LÄGE",		
	"7" => "Lägg till fält",	
	"8" => "Namn",	
	"9" => "Värde",	
	"10" => "Typ",	
	"11" => "Hantera fält",
	"12" => "Lägg till portar",	
	"13" => "Betalningssystem",		
	"14" => "Betalningskod för port",
	"15" => "Titel",
	"16" => "Pakettillgång",
	"17" => "Kommentarer",
	"18" => "Flytta över medlemmar",
	"19" => "Flytta över alla medlemmar från",
	"20" => "Till följande paket",	
	"21" => "Redigera paket",		
	"22" => "Pakettillgång",
	"23" => "Lägg till paketartikel",	
	"24" => "Hantera pakettillgång",
	
	"25" => "Väntar på godkännande",
	"26" => "Godkända betalningar",
	"27" => "Nekade betalningar",
	
	"28" => "All historik",
	"29" => "Aktiva betalningar",
	"30" => "Slutförda betalningar",
	"31" => "Aktiva anmälningar",
	"32" => "Slutförda anmälningar",
	"33" => "Accesskod till paket",
	
);

$admin_email = array(

	"1" => "Systemepost",
	"2" => "Nyhetsbrev",
	"3" => "Epostmallar",		
	"4" => "Eposteditor",
	"5" => "Ämne",	
	"6" => "Förhandstitta på epost",	
	"7" => "Till epost",
	
	"8" => "Skicka till",	
		"9" => "Alla medlemmar",	
		"10" => "Anmälare till medlemskapspaket",	
		"11" => "Aktiva / Avstängda / Icke godkända medlemmar",
	"12" => "Till paket",	
	"13" => "Medlemskapstatus",		
	"14" => "Välj nyhetsbrev",	
	
	"15" => "Skapa ny",
	"16" => "Se skapad praxis",
	"17" => "Epost spårningskod",
	"18" => "Skapa ny",
	"19" => "Se skapad praxis",
	"20" => "Epost spårningskod",
		"21" => "HTML-kod nedanför",
		
	"22" => "Epost spårningsresultat",
	"23" => "Inga rapporter hittades.",
	"24" => "Välj rapport",
	
	"25" => "Skicka påminnelse till alla medlemmar som har mellan",
	"26" => "och",
	"27" => "dagar",
	"28" => "Dagar kvar av deras uppgradering",
	"29" => "Välj epost att skicka:",
	"30" => "Ladda ner",
	"31" => "Välj paket",
	"32" => "Spårningskod",
	
	
);

$admin_design = array(

	"1" => "Ladda ner teman",
	"2" => "Nuvarande mall",
	"3" => "Använd denna mall",	
	"4" => "Metataggar för sida",
	"5" => "Sidotitel",	
	"6" => "Beskrivning",
	"7" => "Nyckelord",
	"8" => "Webbsajtssidor",	
	"9" => "Innehållssidor",	
	"10" => "Praxissidor",	
	"11" => "Skapa sida",
	"12" => "FTP stig",	
	"13" => "Temafiler",		
	"14" => "Innehållssidor",	
	"15" => "Praxissidor",


	"16" => "Lägg till språk",
	"17" => "Nytt filnamn",	
	"18" => "Välj fil att kopiera",
			
	"19" => "Redigera språkfil",	
	"20" => "Praxissidor",

	"21" => "Text",
	"22" => "Textstorlek",	
	"23" => "Textfärg",
	"24" => "bredd",	
	"25" => "höjd",		
	"26" => "Lägg till logotext",
	"27" => "Canvastyp",	
		"28" => "Använd tom canvas",
		"29" => "Behåll nuvarande design",	
		"30" => "Ladda upp min egen bakgrund/logo",	

	"31" => "Skapa ny sida",
	"32" => "Nytt sidonamn",	
		"33" => "Sidonamn bör vara mycket korta och enbart ett ord. Till exempel länkar, artiklar, nyheter, forum, etc",
	"34" => "Lägg till menyknapp?",	
		"35" => "Nej! Skapa inte en knapp",		
		"36" => "Ja. Lägg till det i medlemsavdelningen",
		"37" => "Ja. Lägg till det på webbsajtens huvudsidor, inte medlemsområdet.",
			"38" => "Om man valt det kommer en ny medlemsknapp att genereras på din webbsajt",
);

$admin_overview = array(

	"1" => "Meddelande",
	"2" => "Totalt antal medlemmar",
	"3" => "Denna vecka",
	"3a" => "Idag",
	"4" => "Senaste webbsajtsaktiviteten",
	"5" => "Webbsajtrapporter",
	
	"6" => "Unika besökare på webbsajten under de senaste två veckorna",
	"7" => "Nya registrerade medlemmar de senaste 2 veckorna",
	"8" => "Medlemmarna könstatistik",	
	"9" => "Medlemmarnas ålderstatistik",
	
	"10" => "Nya affiliateregistreringar de senaste 2 veckorna",
	"11" => "Besökares kartinställningar",
	"12" => "Vänligen skriv in din Google API nyckel i fältet ovanför.",	
	"13" => "Du kan köpa en licensnyckel från kundområdet på vår webbsajt",	
	
	"14" => "Filtersökresultat",	
	"15" => "Alla filer",
	
);
$admin_members = array(

	"1" => "Alla medlemmar",
	"2" => "Moderatorer",
	"3" => "Aktiv",
	"4" => "Avstängd",
	"5" => "Icke godkända",
	"6" => "Önskar avbryta",
	"7" => "Online nu",
	"8" => "Inloggningsaktivitet för medlem",	
	"9" => "Redigera medlemsinformation",	
	"10" => "Lägg till affiliate",
	"11" => "Affiliatebanners",
	"12" => "Affiliatesidor",	
	"13" => "Lägg till affiliate",	
	"14" => "Affiliateinställningar",	
	"15" => "Alla filer",
	"16" => "Foton",
	"17" => "Videos",
	"18" => "Musik",
	"19" => "YouTube",
	"20" => "Icke godkänd",
	"21" => "Utvald",
	"22" => "Ladda upp fil",	
	"23" => "Fil",
	"24" => "Typ",
	"25" => "Användarnamn",
	"26" => "Titel",
	"27" => "Kommentarer",
	"28" => "Gör till standard",		
	"29" => "Inloggningsaktivitet för medlem",	
	"30" => "Affiliates registrerade",
	"31" => "Utvald",
	"a5" => "Användarnamn",
	"a6" => "Lösenord",
	"a7" => "Förnamn",
	"a8" => "Efternamn",
	"a9" => "Företagsnamn",
	"a10" => "Adress",
	"a11" => "Gata",
	"a12" => "Ort/Stad",
	"a13" => "Landskap/Län",
	"a14" => "Postnummer",
	"a15" => "Land",
	"a16" => "Telefon",
	"a17" => "Fax",
	"a18" => "Epost",
	"a19" => "Webbsajtsadress",
	"a20" => "Gör check betalbar till",
);


// HELP FILES
$admin_help = array(

	"a" => "Kom igång nu",
	"b" => "Nej, det är bra. Tack!",
	"c" => "Fortsätt",	
	"d" => "Stäng fönster",
	
	
	"1" => "Introduktion",
	"2" => "Behöver du hjälp för att komma igång?",
	"3" => "Hej",	
	
	"4" => "och välkommen till adminstrationsområdet! Eftersom detta är första gången du loggar in på administrationsområdet rekommenderar vi att du tar dig tid några få minuter och följer guiden nedanför för att få hjälp till att komma igång!",
	"5" => "Vår kom igång-guide kommer att guida dig genom vanliga inställningssteg och få igång dig på nolltid.",	
	"6" => "<strong>(Note)</strong> Du kan komma tillbaka till denna sida när som helst genom att klicka på 'snabbhjälpsguiden' på den vänstra menyknappen.",
	
	"7" => "Komma igång",
	"8" => "Välkommen till ditt adminområde!",	
	"9" => "Välkommen till adminkontoområdet för",	
	"10" => "Denna mjukvara tillåter dig att hantera alla olika aspekter av din webbsajt, inklusive dina medlemmar, filer, säkerhet, epost, plugins, och en massa annat.",	
	"11" => "Denna guide för att komma igång kommer att introducera dig för några av koncepten bakom webbsajtsstyrande och tillåter dig att konfigurera några grundläggande inställningar för din webbsajt så att du kan börja driva in trafik (besökare) till din webbsajt.",
	"12" => "<strong>(Kom ihåg)</strong> Du kan när som helst stänga detta fönster genom att använda stängningsknappen och komma tillbaka senare genom att klicka på 'snabbhjälpsguiden' från den vänstra menyknappen.",
		
	"13" => "Introduktion till ditt administrationsområde!",		
	"14" => "Mjukvarans administrationsområde är 'webbaserad' vilket innebär att du kan komma åt och hantera din webbsajt vart du än befinner dig i världen med hjälp av en internetuppkoppling. Ställ bara in din browser på:",	
	"15" => "och logga in med dina inloggningsuppgifter för admin.",
	"16" => "Klicka här för att sätta bokmärke på denna länk nu.",
	
	"17" => "Introduktion till din instrumentbräda.",	
	"18" => "Mjukvarans instrumentbräda ger dig en väldigt snabb översikt av din webbsajts prestation, du kan läsa mjukvarumeddelanden, se medlemmars registreringshistorik, se medlemsstatistik och affiliatestatistik bland annat.",			
	"19" => "All medlemsinformation lagras i MYSQL databasen som heter:",	
	"20" => "Introduktion till webbsajtsstatistik.",
	"21" => "Mjukvarans statistik ger dig en visuell representation av registreringshistoriken för medlemmar och affiliates över en tvåveckorsperiod. Varje gång en medlem eller affiliate ansluter sig till din webbsajt sparas tid och datum och ritas in på grafer.",
	
	"22" => "Introduktion till besökarnas belägenhet",		
	"23" => "Introduktion till att hantera dina medlemmar",	
	"24" => "Introduktion till att hantera dina affiliates",	
	"25" => "Introduktion till att hantera dina förbjudna medlemmar",		
	"26" => "Introduktion till att hantera dina medlemsfiler",
	"27" => "Introduktion till att importera medlemmar",	
	"28" => "Introduktion till webbsajtsteman",
	"29" => "Introduktion till temaeditorn",	
	"30" => "Introduktion till temabildhanteraren",
	"31" => "Introduktion till logoeditor",
	"32" => "Introduktion till metataggar",	
	"33" => "Introduktion till språk",
	"34" => "Introduktion till eposthantering",	
	"35" => "Introduktion till epostmallar",		
	"36" => "Introduktion till epostrapporter",
	"37" => "Introduktion till skicka nyhetsbrev",
	"38" => "Introduktion till epostpåminnelser",
	"39" => "Introduktion till nerladdning av epostadresser",
	"40" => "Introduktion till medlemskapspaket",
	"41" => "Introduktion till betalningsportar",
	"42" => "Introduktion till faktureringshistorik för medlemskap",
	"43" => "Introduktion till faktureringshistorik för affiliates",
	"44" => "Introduktion till visningsval",
	"45" => "Introduktion till visningsinställningar",
	"46" => "Introduktion till systemstigar",
	"47" => "Introduktion till vattenstämpel",
	"48" => "Introduktion till sökfält",
	"50" => "Introduktion till evenemangskalender",
	"51" => "Introduktion till webbsajtsenkät",
	"52" => "Introduktion till webbsajtsforum",
	"53" => "Introduktion till chatrum",
	"54" => "Introduktion till webbsajtsFAQ",
	"55" => "Introduktion till ordfilter",
	"56" => "Introduktion till nyheter/artiklar",
	"57" => "Introduktion till grupper",

		"22a" => "Besökarnas belägenhetskarta markerar belägenheten för var och en av dina webbsajtsmedlemmar och tillåter dig att med en snabb blick se vilka länder dina medlemmar kommer från.",		
		"23a" => "Medlemshanteringsverktyget tillåter dig att se alla medlemmar som har gått med på din webbsajt. Använd sökverktyget för att filtrera bland dina medlemmar för att redigera, uppdatera och ta bort medlemsprofiler.",	
		"24a" => "Affiliatehanteringsverktyget tillåter dig att med en snabb blick se alla affiliates på din webbsajt. Du kan se, redigera och ta bort affiliates från din webbsajt och godkänna nya registrerade affiliates.",	
		"25a" => "Sektionen för förbjudna medlemmar lagrar allt om medlemmar och icke medlemmar som försöker hacka din webbsajt. Mjukvaran kommer automatiskt att förbjuda misstänkta medlemmar från att se din webbsajt för att förhindra att de orsakar någon skada.",		
		"26a" => "Medlemsfilverktyget tillåter dig att se alla medlemmarnas uppladdningar, musik, video, foton, etc kan alla hanteras här. Klicka på något av fotona för att redigera fotot med hjälp av vårt inbyggda skärverktyg.",
		"27a" => "Medlemsimportverktyget tillåter dig att importera medlemmar från andra mjukvaruapplikationer. Du skriver helt enkelt in databasinformationen för den webbsajt där ditt gamla system är lagrat och det kommer att överföras till din nya webbsajt.",	
		"28a" => "Temaavdelningen på webbsajten tillåter dig att ändra mallen för webbsajten och designen på din egen sajt omedelbart! Klicka bara på temat du vill använda och din webbsajt blir omedelbart uppdaterad.",
		"29a" => "Temaeditorverktyget tillåter dig att redigera webbsajtssidorna direkt från administrationsområdet. Du kanske också vill kopiera och klistra in koden i din egen webbsajtseditor och sedan klistra tillbaka den igen när du har slutfört redigeringen.",	
		"30a" => "Temabildhanteraren tillåter dig att ändra de nuvarande bilderna på din webbsajt genom att ladda upp nya. Nya bilder kommer att ersätta de nuvarande bilderna och direkt läggas till på din webbsajt.",
		"31a" => "Logoeditorverktyget tillåter dig att ändra designen på din nuvarande logo. Du kanske också vill skapa din egen logo genom att använda ditt eget fotoredigeringspaket och välj sedan 'ladda upp min egen logo' för att lägga till den på din webbsajt.",
		"32a" => "Metataggfunktionen tillåter dig att redigera alla metataggar för webbsajten som genererats av mjukvaran. Du kan lägga till din egen titel, nyckelord och beskrivningar för var och en av sidorna på din webbsajt. ",	
		"33a" => "Språkhanteringsverktyget tillåter dig att ta bort vilket språk som helst från webbsajten som du inte vill använda och du kan också lägga till ditt eget språkpaket.",
		"34a" => "Eposthanteringsverktyget tillåter dig att skapa ditt eget system och nyhetsbrev för att ge din webbsajt en unik personlig känsla.",	
		"35a" => "Introduktion till epostmallar",		
		"36a" => "Introduktion till epostrapporter",
		"37a" => "Introduktion till skicka nyhetsbrev",
		"38a" => "Introduktion till epostpåminnelser",
		"39a" => "Introduktion till nedladdning av epostadresser",
		"40a" => "Introduktion till medlemskapspaket",
		"41a" => "Introduktion till betalningsportar",
		"42a" => "Introduktion till faktureringshistorik för medlemskap",
		"43a" => "Introduktion till faktureringshistorik för affiliates",
		"44a" => "Introduktion till visningsval",
		"45a" => "Introduktion till visningsinställningar",
		"46a" => "Introduktion till systemstigar",
		"47a" => "Introduktion till vattenstämpel",
		"48a" => "Introduktion till sök fält",
		"50a" => "Introduktion till evenemangkalender",
		"51a" => "Introduktion till webbsajtenkät",
		"52a" => "Introduktion till webbsajtforum",
		"53a" => "Introduktion till chatrum",
		"54a" => "Introduktion till webbsajtFAQ",
		"55a" => "Introduktion till ordfilter",
		"56a" => "Introduktion till nyheter/artiklar",
		"57a" => "Introduktion till grupper",
);

$admin_login = array(

	"1" => "Logga in till adminområdet",
	"2" => "Glömt ditt lösenord? Inga problem, skriv in din epostadress nedan och vi kommer att skicka ett nytt till dig.",
	"3" => "Epostadress",
	"4" => "Skriv nedan",
	"5" => "Återställ lösenord",
	"6" => "Skriv in dina uppgifter nedan för att logga in.",
	"7" => "Användarnamn",
	"8" => "Lösenord",	
	"9" => "Licens",	
	"10" => "Språk",
	"11" => "Logga in",
	"12" => "Loggad IP är",	
	"13" => "Glömt lösenord",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Belyst profil",
	"2" => "Webbsajtmoderator",
	"3" => "Medlemskapspaket",
	"4" => "Skicka uppgraderingsepost",
	"5" => "Lägg till paketändring till faktureringssystem ",
	"6" => "SMS Nummer",
	"7" => "SMS Krediter",
	"8" => "Ange kontostatus till",	
	
	"9" => "Klicka i rutan för att redigera lösenordet.",	
	"10" => "Belysta medlemmar har en annorlunda bakgrund i sökresultaten.",
	"11" => "Detta ger medlemmen tillgång att hantera din webbsajt som moderator.",
	
	"12" => "välkomstsida för affiliates",	
	"13" => "Visningssida för bannerkod",	
	"14" => "Betalningssida för affiliates",	
	"15" => "Sammanfattningssida för affiliates",
	"16" => "Redigera kontosida för affiliates",
	
	"17" => "Importera medlemmar från",	
	
	"18" => "Ålder",			
	"19" => "Filvisningar",	
	"20" => "Privat",
	"21" => "Publik",
	
	"22" => "album",		
	"23" => "Vuxet innehåll",	
	"24" => "Publikt innehåll",	
	
	"25" => "Storlek",		
	"26" => "Flytta filer till vuxenalbum",
	"27" => "Vuxenfilter",

);

$admin_selection = array(

	"1" => "Ja",
	"2" => "Nej",
	
	"3" => "På",
	"4" => "Av",
);

$admin_plugins = array(

	"1" => "Plugins ökar och expanderar funktionaliteten av eMeeting datingmjukvara. När en plugin är installerad kan du aktivera eller inaktivera den här genom att använda menyvalen till vänster.",
	"2" => "Du kan se och ladda ner nya mjukvaruplugins från kundområdet på vår webbsajt.",
	"3" => "Pluginnamn",
	"4" => "Plugindetaljer",
	"5" => "Senast uppdaterad",
	"6" => "Status",

);
$admin_pop_welcome = array(

	"1" => "Välkommen tillbaka",
	"2" => "nedan är en snabb översikt över medlemsregistreringar och webbsajtsprestation för dagen.",
	"3" => "Nya medlemmar idag",
	"4" => "Filer att godkänna",
	"5" => "<strong>Kom ihåg</strong> Om du inte vill få dessa välkomstmeddelanden när du loggar in till adminområdet kan du stänga av dem när som helst genom att ändra dina adminval.",
	"6" => "Stäng fönster",

);
$admin_pop_chmod = array(

	"1" => "Tillståndsfel för fil",
	"2" => "Filerna på denna sida kan inte modifieras",
	"3" => "följande filer/kataloger behöver ha 'skriv' tillåtelse angivna innan du kan redigera dem. Om du kör med en Linux eller Unix värd kan du använda ditt FTP-program och använda 'CHMOD' ('Ändringsläge') funktionen för att ge skrivtillstånd. Om din värd kör Windows måste du kontakta dem om att sätta upp tillstånd för dessa filer/mappar.",
	"4" => "Filerna som kräver CHMOD 777 är",
	"5" => "Stäng fönster",

);
$admin_pop_demo = array(

	"1" => "Demoläge på",
	"2" => "Ändringar av systemet kommer INTE att sparas i demoläge",
	"3" => "Dina tillgångsinställningar för systemet har angetts till 'demoläge' vilket innebär att tillgång till massor av funktioner inom adminområdet kommer att vara begränsad till 'bara läsa'.",
	"4" => "Du kan surfa runt i adminområdet som vanligt men ändringar du gör kommer inte att sparas under den här tiden.",
	"5" => "<strong>Kom ihåg</strong> Om du vill ta bort demolägesbegränsningen på ditt konto vänligen kontakta din systemadministration för mer information.",
	"6" => "Stäng fönster",
);

$admin_pop_import = array(

	"1" => "Resultat av databasöverföring",
	"2" => "medlemmar importerades framgångsrikt!!",
	"3" => "medlemmar importerades framgångsrikt från",
	"4" => "mjukvara. Vänligen följ instruktionerna nedan för att se till att dina medlemsbilder uppdateras korrekt.",
	"5" => "eMeeting bildmappens vägar finns nedanför, du måste kopiera bilderna från gamla webbsajten till de nya vägarna nedanför;",
	"6" => "Stäng fönster",
);

$admin_loading= array(

	"1" => "Optimera databastabeller",
	"2" => "Vänligen vänta",

);
$admin_menu_help= array(
"1" => "Snabbhjälpsguide",
);

$admin_settings_extra = array(

	"1" => "Visa söksida",
	"2" => "Visa kontaktsida",
	"3" => "Visa rundturssida",
	"4" => "Visa FAQ-sida",
	"5" => "Visa evenemang",
	"6" => "Visa grupper",
	"7" => "Visa forum",
	"8" => "Visa matchningar",	
	"9" => "Visa nätverk",	
	"10" => "Visa affiliatesystem",
	"11" => "Visa SMS / Textmeddelande varningssystem",
	
	"12" => "Visa bloggar",	
	"13" => "Visa chatrum",	
	"14" => "Visa Instant Messenger",	
	"15" => "Visa verifikationsbild för registrering",
	"16" => "Visa Postkodssökning för Storbritannien",
	"17" => "Visa ZIP-kodssökning för USA",
	"18" => "Visa MSN/Yahoo Integration",
	
	"19" => "Standardmedlemskapspaket",
		"20" => "Detta är det medlemskapspaket som medlemmar registreras till som standard",
	"21" => "Medlemmar måste ladda upp en bild för att gå med",
		"22" => "Detta kommer att avgöra om medlemmar tillåts att hoppa över valet att ladda upp en bild under registreringen.",	
	"23" => "FRITT LÄGE",
		"24" => "Ange 'ja' om du vill att alla funktioner på din webbsajt ska vara tillgängliga för alla.",
	"25" => "UNDERHÅLLSLÄGE",
		"26" => "Detta kommer att stoppa all tillgång till din webbsajt för medlemmar och icke medlemmar och tillåta enbart admins som har loggat in i adminområdet att använda sajten.",
		
	"27" => "Antal sökresultat per sida",
		"28" => "Välj antal profiler som du vill ska visas per sida",		
	"29" => "Antal matchande resultat på översiktssida",	
		"30" => "Välj antal profiler som du vill ska visas per sida.",
		
	"31" => "Aktiveringskoder med epost",
		"32" => "Medlemmar kommer att skickas en aktiveringskod till deras epost som måste valideras innan de kan logga in.",
	"33" => "Godkänn medlemmar manuellt",
	"34" => "Ange 'ja' eller 'nej' beroende på om du vill verifiera medlemskonton manuellt innan de kan logga in.",
	"35" => "Godkänn filer manuellt",
		"36" => "Ange 'ja' eller 'nej' beroende på om du vill verifiera filer manuellt före visning",
	"37" => "Godkänn videoinspelningar manuellt",
		"38" => "Ange 'ja' eller 'nej' beroende på om du vill verifiera medlemmars sändningar manuellt (video chat feeds).",
		
	"39" => "Visa videohälsningsinspelaren",
	"40" => "Detta gör det möjligt för medlemmar att spela in sitt eget videomeddelande till sin profil. Du måste skriva in din flash video RMS uppkopplingsserie nedanför.",
	"41" => "Flash RMS uppkopplingsserie",
		"42" => "Du behöver ett flash värdkonto för att använda detta",
	"43" => "Visa datumformat",
		"44" => "Välj det datumformat som du vill ska visas på din webbsajt",
	"45" => "Tillåt profil/filkommentarer",
		"46" => "Tillgängliggör detta val om du vill att medlemmar ska kunna posta kommentarer på profiler och filer.",
	"47" => "Visa chat och IM i separat fönster",
	
	"48" => "Tillgängliggör detta val om du vill att chatrum och IM popup ska öppnas i ett nytt fönster.",
	
	"49" => "Sökmotorvänligt?",
		"50" => "Tillgängliggör detta val om du använder linux eller unix värdkonto och använder standard .htaccess fil",
	"51" => "Sök blanka foton",
		"52" => "Vill du att medlemmar som inte har lagt till ett foto ska visas i sökresultaten?.",
	"53" => "Visa flaggbilder",
		"54" => "Ange 'ja' eller 'nej' om du vill att språkflaggorna ska visas på din webbsajt.",
	"55" => "Affiliate valuta",	
	"56" => "Använd HTML-editor",	
	"57" => "Ange 'ja' eller 'nej' beroende på om du vill verifiera filer manuellt före visning",

	"58" => "Visa artikelsida",

);

$admin_billing_extra = array(

	"1" => "Ange 'ja' om du vill att alla egenskaper på din webbsajt ska vara tillgängliga för alla.",
	
	"2" => "Pakettyp",
	"3" => "Medlemskapspaket",
	"4" => "SMS-paket",
	"5" => "Välj ja om du vill skapa ett paket enbart för SMS och tillåta detta paket att användas för att köpa fler SMS-krediter på din webbsajt.",
	"6" => "Paketnamn",
		"7" => "Skriv in ett namn för detta paket, detta kommer att visas på din anmälningssida.",
	"8" => "Beskrivning",	
	"9" => "Pris",	
	"10" => "Hur mycket vill du ta betalt för medlemmar som väljer detta paket? Notera. Skriv inte in några valutasymboler",
	"11" => "Visa valutakod",
	
	"12" => "Detta är valutakoden som kommer att visas på din webbsajt, detta används INTE för din betalningsvaluta, detta behöver ställas in i dina betalningsinställningar.",	
	"13" => "Anmälan",	
	"14" => "Välj ja om du skulle vilja att detta var en återkommande betalning.",	
	"15" => "Uppgradera period",
	
	"16" => "Dag",
	"17" => "Vecka",
	"18" => "Månad",
		"18a" => "Obegränsad",
	"19" => "Max antal meddelanden (dagligen)",
		"20" => "Detta är max antal meddelanden som en medlem kan skicka per dag.",
	"21" => "Max antal blinkningar",
		"22" => "Max antal blinkningar som en medlem med detta paket kan skicka varje dag.",	
	"23" => "Max antal filuppladdningar",
		"24" => "Max antal filer en medlem kan ladda upp.",
	"25" => "Paket ikonlänk",
		"26" => "Ikonlänken till paketet måste vara en länk till en bild på din webbsajt. Rekommenderad storlek: 28px x 90px.",
		
	"27" => "Utvald medlem",
		"28" => "Välj ja om du skulle vilja att medlemmarnas visningsbild också visas på framsidan av din webbsajt.",		
	"29" => "Belysta",	
		"30" => "Välj ja om du skulle vilja att medlemmar med detta paket ska ha en belyst bakgrund i sökresultaten.",
		
	"31" => "Se vuxenbilder",
		"32" => "Välj ja om du vill att medlemmarna med det här paketet ska kunna se medlemmars vuxenbilder.",
	"33" => "SMS-krediter",
	"34" => "Detta är antalet SMS-krediter som läggs till medlemmarnas konto när de uppgraderar till detta paket. Detta kommer att läggas till deras nuvarande summa om de redan har krediter.",
	"35" => "Synbart med uppgraderingspaket"

);

$admin_mainten_extra = array(

	"1" => "Länk",
	"2" => "Skriv bara in en länk om du vill länka till en extern webbsajt",
	"3" => "RSS Nyhetsflödesinformation",
	
	"4" => "Kategori",
	"5" => "Visningar",
	"6" => "Filmtext",
	"7" => "Språk",
	"8" => "Privat grupp",
		
	"9" => "Ändra forumtavla",	
	"10" => "Välj forumtavla",
	"11" => "Standardforum",
	
	"12" => "Du använder för närvarande en tredje parts forum. Vänligen logga in på deras adminområde för att hantera deras forum.",	
	"13" => "Lösenord"
);

$admin_set_extra1 = array(

	"1" => "Tillåt foto/bilduppladdningar",
	"2" => "Tillåt videouppladdningar",
	"3" => "Tillåt musikuppladdningar",	
	"4" => "Tillåt YouTube uppladdningar",	
);

$admin_alerts = array(

	"1" => "Varningar",
	"2" => "nya besökare",
	"3" => "nya medlemmar",	
	"4" => "icke godkända medlemmar",	
	"5" => "icke godkända filer",
	"6" => "nya uppgraderingar",	
);

$lang_members_nn = array(

	"0" => "Medlemsmissbrukövervakning",
	"1" => "Användarnamn eller ID",
	"2" => "Ingen chathistorik hittades",	
);

$members_opts = array(

	"1" => "Redigera profil",
	"2" => "Filuppladdningar",
	"3" => "Faktureringshistorik",	
	"4" => "Skicka epostmeddelande",	
	"5" => "Skicka meddelande",
	"6" => "Foruminlägg",
	"7" => "Meddelandemissbruk",	
);
?>