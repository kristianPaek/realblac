<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Romanian",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "iso-8859-1",
	"title" => "Zona de administrare"
		
);

$admin_layout = array(

	"3" => "Preferintele mele",
	"4" => "Iesire",

);


$admin_layout_page1 = array(

	"" => "Panou control",

		"_*" => "Zona de administrare",
		"_?" => "",

	"members" => "Statistici membri",
		
		"members_*" => "Statistici membri",
		"members_?" => "Graficul va prezinta numarul de utilizatori inregistrati in ultimele doua saptamani.",
		"members_^" => "sub",

	"affiliate" => "Statistici afiliati",
 
		"affiliate_*" => "Statistici afiliati",
		"affiliate_?" => "Graficul va prezinta numarul de afiliati inregistrati in ultimele doua saptamani.",
		"affiliate_^" => "sub",

	"visitor" => "Statistici vizitatori",
 
		"visitor_*" => "Statistici vizitatori",
		"visitor_?" => "Graficul va prezinta numarul de vizitatori din ultimele doua saptamani, inregistrati zilnic.",
		"visitor_^" => "sub",

	"maps" => "Google Maps",
 
		"maps_*" => "Localizarea vizitatorilor prin Google Maps",
		"maps_?" => "Aceasta sectiune va arata de ce loc al lumii provin cei care se inregistreaza. Aceasta va permite sa concepeti campanii de marketing si publicitare mult mai efective, pe zone geografice, prin monitorizarea continua a acestora",
 

	"adminmsg" => "Anunturi Site",
 
		"adminmsg_*" => "Anunturi Site",
		"adminmsg_?" => "Introduceti mesajul dumneavoastra in casuta de mai jos si, de fiecare data cand un utilizator se va autentifica, va aparea acest mesaj in mod automat. Aceasta este o modalitate foarte buna de a prezenta noi servicii sau schimbari pe site.",

);
 

$admin_layout_page2 = array(

	"" => "Membri",

		"_$" => "jumatate",
		"_*" => "Administreaza membri",
 

			"edit" => "Editeaza detalii membru",
	
				"edit_*" => "Editeaza membru",
				"edit_?" => "Actualizati mai jos contul de membru si detaliile din profil",
				"edit_^" => "nici unul",


			"fake" => "Membri demo",
	 
				"fake_*" => "Genereaza membri demo",
				"fake_?" => "Folositi setarile de mai jos pentru a genera membri demo, aceasta optiune ajutandu-va sa aveti un site ... plin, mai ales cand sunteti la inceput. Este recomandat sa folositi aceasi adresa de email, aceasta pentru a va fi mai usor la eventuala stergere ulterioara.",
				"fake_^" => "sub",

	"banned" => "Membri blocati",
 
		"banned_*" => "Membri blocati",
		"banned_?" => "Siteul are un sistem automatizat anti-hacker care blocheaza in mod automat membrii siteului care incearca sa treaca de protectia siteului. Mai jos gasiti detalii cu privire la acest aspect.",
		"banned_^" => "sub",

	"monitor" => "Monitorizare membri",
 
		"monitor_*" => "Monitorizare membri",
		"monitor_?" => "Membrii siteului pot raporta alti utilizatori care abuzeaza de sistemul de trimitere a mesajelor sau al altor facilitati de pe site. In aceasta sectiune puteti monitoriza mesajele membrilor pentru a proteja in acest fel securitatea celorlalti.",
		"monitor_^" => "sub",

	"import" => "Importa membri",
 
		"import_*" => "Importa membri dintr-o baza de date sau fisier de tip CVS",
		"import_?" => "Din aceasta sectiune puteti importa membri dintr-un alt sistem de tip dating/community  sau dintr-un fisier de tip CVS.",
		"import_^" => "sub",
		
	"files" => "Fisiere membri", 
	"files_*" => "Fisiere membri",


	"addfile" => "Incarca o fotografie",			 
	"addfile_*" => "Incarca o fotografie",
	"addfile_?" => "Este posibil ca unii membri ai siteului sa nu poata incarca fotografii ei insisi. Folositi aceasta sectiune pentru a incarca o fotografie, in locul lor.",
	"addfile_^" => "sub",
			
 
	"affiliate" => "Afiliati",
 
		"affiliate_*" => "Afiliati",
		"affiliate_?" => "In aceasta sectiune puteti administra afiliatii siteului.",
		 
			"addaff" => "Adauga noi afiliati",
	 
				"addaff_*" => "Adauga/Editeaza cont afiliat",
				"addaff_?" => "Completeaza toate campurile de mai jos pentru a completa profilul unui afiliat.",
				"addaff_^" => "sub",

			"affsettings" => "Paginile continut afiliat",
 
				"affsettings_*" => "Design pagina afiliat",
				"affsettings_?" => "Sectiunea va permite sa editati paginile dedicate afiliatilor.",
				"affsettings_^" => "sub",

			"affcom" => "Comision afiliati",
	 
				"affcom_*" => "Comision afiliati",
				"affcom_?" => "In aceasta zona puteti sa setati comisionul afiliatilor dumneavoastra. Aceasta inseamna ca pentru fiecare cheltuiala facuta pe siteul dumneavoastra de un membru, trimis de catre afiliat, acesta va primi un comsion pentru acest serviciu.",
				"affcom_^" => "sub",


			"affban" => "Banere afiliati",
	 
				"affban_*" => "Banere afiliati",
				"affban_?" => "Aici vor fi postate banerele siteului dvs. pentru ca afiliatii sa le poata folosi pe siteurile lor",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Galerie teme",
 
			"_*" => "Galerie teme site",
			"_?" => "Mai jos aveti toate temele siteului dumneavoastra, instalate pe server. Apasati pe imaginea sablonului pentru a schimba instantaneu felul cum arata siteul dvs.",
			 
				
			"color" => "Scheme de culoare",
		 
				"color_*" => "Scheme de culoare",
				"color_?" => "Mai jos puteti seta o schema de culoare pentru siteul dumneavoastra. Daca doriti sa schimbati inclusvi imaginile, va rugam sa folositi optiunile concepute pentru aceasta.",
				"color_^" => "sub",
				
			"logo" => "Logo site",
				"logo_$" => "half",
				"logo_*" => "Logo site",
				"logo_?" => "Folositi optiunile de mai jos pentru a schimba caracteristicile logo-ului siteului dumneavoastra. Puteti alege dintre cele deja realizate sau puteti incarca dvs. insiva unul.",
				"logo_^" => "sub",
				
			"img" => "Imagini sablon",
				"img_$" => "half",
				"img_*" => "Imagini sablon",
				"img_?" => "Imaginile de mai jos sunt salvate in cadrul sablonului respectiv. Folositi optiunile de mai jos pentru a inlocui imaginile din sablon cu unele noi.",
				"img_^" => "sub",

			"text" => "Text Prima Pagina",
				"text_$" => "half",
				"text_*" => "Text Prima Pagina",
				"text_?" => "In aceasta sectiune puteti schimba textul de bun venit de pe prima pagina a siteului. Unele sabloane folosesc texte diferite, conceptii diferite. Alegeti ce vi se pare mai potrivit siteului dvs.",
				"text_^" => "sub",
	
			"edit" => "Pagini & Fisiere",
 
			"edit_*" => "Paginile siteului",
			"edit_?" => "In aceastaa  sectiune puteti vizualiza paginile siteului. Este recomandat sa copiati codul existent intr-un editor precum Frontpage sau Dreamweaver pentru editare. <b>Aveti grija cand editati fisierele de configurare sau fisierele de sistem, intrucat schimbarile sunt instantanee si nu mai pot fi reparate.</a>",
				
	
	
				"newpage" => "Creaza Pagina",
				"newpage_$" => "half",
				"newpage_*" => "Creaza o noua pagina",
				"newpage_?" => "Creaza o pagina pe site intr-un mod foarte rapid. Adauga numai titlul in campul de mai jos si imediat siteul va creea tot ce este necesar pentru a edita pagina.",
				"newpage_^" => "sub",
							
				
			"meta" => "Sablon Meta Taguri ",
				"meta_$" => "half",
				"meta_*" => "Editor Meta Tag-uri ",
				"meta_?" => "eMeeting are un sistem extrem de complex de creare a meta tag-urilor, incluse deja in site, ajutandu-va pe dumneavoastra sa castigati timp si bani, in loc sa creati pagini intregi cu descrieri. sistemul va genera in mod automat titlul, descrierea si meta tag-urile bazate pe continutul afisat pe fiecare pagina.",
				"meta_^" => "sub",

 

		
			"menu" => "Administrare meniu",
				"menu_$" => "half",
				"menu_*" => "Administrare meniu",
				"menu_?" => "Folositi optiunile de mai jos pentru a schimba meniul principal sau cel al utilizatorilor. Puteti introduce inclusiv un link extern precum http://google.com ca meniu daca doriti ca din siteul dvs. sa fie accesat un site extern sau o pagina din cadrul siteului dvs.",
				"menu_^" => "sub",

	"manager" => "Manager fisiere",
		"manager_$" => "half",
		"manager_*" => "Manager fisiere",
		"manager_?" => "Managerul de fisiere este foarte util cand aveti nevoie sa stergeti fisiere sau continut pe siteul dvs. Puteti rasfoi toate directorele siteului si sterge orice fisier este nevoie.",

			"slider" => "Imagini rotative",
				"slider_$" => "half",
				"slider_*" => "Imagini rotative - Pagina de start",
				"slider_?" => "Imaginile de mai jos sunt cele care se rotesc pe prima pagina a siteului. Puteti schimba imaginea, descrierea si eventualele linkuri.",
				"slider_^" => "sub",

	"languages" => "Fisierele de limba",
		"languages_$" => "half",
		"languages_*" => "Fisiere de limba",
		"languages_?" => "Mai jos afisati fisierele de limba disponibile.Puteti sterge oricare fisier de limba si acesta nu mai este afisat pe site sau selectati casuta din dreptul limbilor disponibile pentru a schimba limba disponibila initial pentru intreg siteul.</b>",

			"editlanguage" => "Editeaza fisierul de limba",
				"editlanguage_$" => "half",
				"editlanguage_*" => "Editeaza fisierul de limba",
				"editlanguage_?" => "Atentie la editarea acestor fisiere, asigurati-va ca pastrati sintaxa originala pentru a preveni erorile. Traduceti numai textul care se afla dupa simbolul (=>) Prima valoare este o cheie.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Adauga un fisier de limba",
				"addlanguage_$" => "half",
				"addlanguage_*" => "Adauga fisier de liimba",
				"addlanguage_?" => "Prin crearea unei noi limbi disponibile, se copiaza unul din fisierele de liba disponibile, se redenumeste si se traduce corespunzator.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Email si Newsletere",

		"_$" => "half",
		"_*" => "Email si Newsletere",
		"_?" => "Mia jos gasiti o lista de emailuri stocate de catre site. Emailurile de sistem sunt folosite de sistem pentru a trimite emailuri diverse, in cazul in care . You can customize all emails and create your own using the options below",

			"add" => "Creaza un nou email",
				"add_$" => "half",
				"add_*" => "Adauga/Editeaza email nou",
				"add_?" => "Completeaza campurile de mai jos pentru a  adauga/edita un nou email, acesta va fi salvat in folderul de sabloane facut de catre dvs,  astfel incat il puteti redita sau trimite oricand.",
				"add_^" => "sub",

	"welcome" => "Email/ SMS de Bun venit",
		"welcome_$" => "half",
		"welcome_*" => "Configurare Email/ SMS de Bun venit!",
		"welcome_?" => "Folosind setarile de mai jos puteti alege care email sau mesaj text va fi trimis unui utilizator care tocmai ce s-a inregistrat pe site.",
		"welcome_^" => "sub",

	"template" => "Sabloane email",
		"template_$" => "half",
		"template_*" => "Sabloane email",
		"template_?" => "Aveti la dispozitie o serie de sabloane email deja introduse in site. Faceti click pe oricare dintre acestea pentru a edita sablonul.",
		"template_^" => "sub",

	"export" => "Descarca Emailuri",

		"export_$" => "half",
		"export_*" => "Descarca Emailuri",
		"export_?" => "Folositi optiunile de mai jos pentru a descarca toate adresele de email ale membrilor siteului din baza de date.",
		"export_^" => "sub",

	"sendnew" => "Trimite Newsletere",

		"sendnew_$" => "half",
		"sendnew_*" => "Trimite Newsletere",
		"sendnew_?" => "Folositi optiunile de mai jos pentru a trimite newsletere care vor fi trimise membrilor siteului. Selectati intai membrii siteului care vor primi emailul si apoi care din newsletere.",

	"send" => "Trimite un singur email",

		"send_$" => "half",
		"send_*" => "Trimite un singur email",
		"send_?" => "Folositi optiunile de mai jos pentru a trimite un singur email unui membru, introducandu-i adresa de email in campul de mai jos. Adresa de email folosita pentru a trimite mesajul este cel setat in contul dumneavoastra de administrator.",
		"send_^" => "sub",

	"subs" => "Trimite email cu alerte",

		"subs_$" => "half",
		"subs_*" => "Alerte email",
		"subs_?" => "Alertele prin email va permit sa trimiteti emailuri membrilor care mai au X zile pana la un anumit eveniment sau cand abonamentul lor este pe cale de expirare sau nu au adaugat nici o fotografie.",
		"subs_^" => "sub",
		
	"tc" => "Rapoarte email",
		"tc_$" => "half",
		"tc_*" => "Rapoarte email",
		"tc_?" => "Rapoartele email sunt generate cand un email este trimis, intrucat fiecare email contine un cod special de tracking. Acesta permite analizarea emailurilor care au fost deschise de primitori.",
		"tc_^" => "sub",

			"tracking" => "Codul tracking pentru email",
				"tracking_$" => "half",
				"tracking_*" => "Codul tracking pentru email",
				"tracking_?" => "Codul de tracking de mai jos (tracking_id) este inlocuit cu o imagine transparenta care este atasata emailurilor trimise. Daca emailul este deschis si imaginea nu este blocata un raport va fi generat in aceasta pagina.",
				"tracking_^" => "sub",



	"SMSsend" => "Trimite mesaje SMS",

		"SMSsend_$" => "half",
		"SMSsend_*" => "Trimite mesaje SMS",
		"SMSsend_?" => "Folositi setarile de mai jos pentru a trimite SMS/mesaje text catre telefoanele membrilor siteului.",
);

$admin_layout_page5 = array(

	"" => "Nivelurile de abonament",

		"_$" => "half",
		"_*" => "Nivelurile de abonament",
		"_?" => "Acestea sunt pachetele de abonament care se aplica siteului dumneavoastra. Abonamentul marcat este cerut de catre sistem pentru a controla vizitatorii si membri siteului, dandu-va posibilitatea de a controla siteul.",

			"epackage" => "Adauga pachet",
				"epackage_$" => "half",
				"epackage_*" => "Adauga/Editeaza Pachet",
				"epackage_?" => "Completeaza campurile de mai jos pentru a adauga sau actualiza un pachet de abonament pentru siteul dvs.",
				"epackage_^" => "sub",

			"packaccess" => "Administreaza accesul",
				"packaccess_$" => "full",
				"packaccess_*" => "Administreaza accesul la pagina",
				"packaccess_?" => "Aici puteti controla accesul la siteul dvs. pe baza abonamentului contractat de vizitatori.<b>Nota: Marcati casuta pentru ca un membru al siteului sa nu vizualizeze acea pagina. </b>",
				"packaccess_^" => "sub",

			"upall" => "Transfera membri",
				"upall_$" => "half",
				"upall_*" => "Transfera membri intre pachetele de abonamente",
				"upall_?" => "Folositi aceasta optiune pentru a muta utilizatorii de la un abonament la altul.",
				"upall_^" => "sub",


	"gateway" => "Procesatorul de plati",

		"gateway_$" => "half",
		"gateway_*" => "Procesatorul de plati",
		"gateway_?" => "Acestea proceseaza platile facute pentru upgradarea abonamentelor siteului dvs.. Daca vreti ca siteul sa fie complet gratuit puteti alege ca platile sa nu se faca. Aceasta se face din zona de configurare.",


			"addgateway" => "Adauga un procesator de plati",
				"addgateway_$" => "half",
				"addgateway_*" => "Adauga procesator de plati",
				"addgateway_?" => "Siteul are deja un numar predefinit de procesatoare de plati prin care se pot face platile. Selectati din lista de mai jos procesatorul prin care doriti sa faceti plata.",
				"addgateway_^" => "sub",


	"billing" => "Sistemul de facturi",

		"billing_$" => "half",
		"billing_*" => "Sistemul de facturi",	


		"affbilling" => "Istoric facturi afiliati",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Istoricul facturilor afiliatilor", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banere si reclame",

		"_$" => "half",
		"_*" => "Banere si reclame",
 

			"addbanner" => "Adauga banere",
				"addbanner_$" => "half",
				"addbanner_*" => "Adauga baner",
				"addbanner_?" => "Folositi optiunile de mai jos pentru a adauga un banner pe site.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Configurare module site",

		"_$" => "half",
		"_*" => "Configurare module site",
		"_?" => "In aceasta zona puteti activa sau dezactiva anumite module existente pe site.",


	"op" => "Configurare module site",

		"op_$" => "half",
		"op_*" => "Configurare module site",
		"op_?" => "In aceasta zona puteti modifica optiunile modulelor existente pe site.",
	
		"op1" => "Configurare modul cautare",
	
			"op1_$" => "half",
			"op1_*" => "Configurare modul de cautare",
			"op1_?" => "In aceasta zona puteti alege modul in care vor arata paginile de cautare in intregul site.",
			"op1_^" => "sub",
	
		"op2" => "Configurare abonament",
	
			"op2_$" => "half",
			"op2_*" => "Configurare abonament",
			"op2_?" => "In aceasta zona puteti stabili modul in care vor aparea abonamentele in cadrul siteului.",
			"op2_^" => "sub",

		"op3" => "Configurare Server Flash",
	
			"op3_$" => "half",
			"op3_*" => "Configurare Server Flash",
			"op3_?" => "Un server flash este folosit pentru a stoca videoclipurile membrilor, este folosit in cadrul mesageriei instant si este folosit de asemenea in cadrul mesageriei instant pentru a arata web camerele celorlalti membri.",
			"op3_^" => "sub",

		"op4" => "Configurare API",
	
			"op4_$" => "half",
			"op4_*" => "Configurare API", 
			"op4_^" => "sub",

		"thumbnails" => "Avatare prestabilite",
	
			"thumbnails_$" => "half",
			"thumbnails_*" => "Micro imagini prestabilite", 
			"thumbnails_^" => "Mai jos puteti vizualiza avatarele prestabilite, care pot fi folosite cand membrii siteului nu isi incarca propriile fotografii.",

	"email" => "Configurare email",

		"email_$" => "half",
		"email_*" => "Configurare email",
		"email_?" => "Mai jos puteti vizualiza o lista a evenimentelor inregistrate pe site. Aveti posibilitatea sa selectati evenimentele la care doriti ca sistemul sa va trimita un email de notificare. Notificarile prin email vor fi transmise tuturor administratorilor siteului care au acces in zona de administrare.",

	"paths" => "Cale fisiere / foldere",

		"paths_$" => "half",
		"paths_*" => "Cale fisiere / foldere",
		"paths_?" => "Calea catre fisierele sau folderele (dosarele) siteului dumneavoastra sunt legate direct de locatia reala a fisierelor si dosarelor de pe serverul pe care este gazduit siteul dvs. Desi acestea  sunt stabilite in mod automat in cadrul procesului de instalare,  este posibil ca unele sa fie incorecte, in aceasta sectiune putand sa le modificati.",

	"watermark" => "Marcare fotografii",

		"watermark_$" => "half",
		"watermark_*" => "Marcare fotografii",
		"watermark_?" => "Prin marcarea fotografiilor intelegem o imagine pe care o puteti alege si care va aparea in partea superioara a fotografiilor incarcate de membri. In mod obisnuit, aceasta este un logo al siteului si trebuie sa fie in format PNG, 8 biti.",


);


$admin_layout_page8 = array(

	"" => "Campuri de text",

		"_$" => "half",
		"_*" => "Profil, Inregistrare si campurile de cautare",
		"_?" => "Mai jos sunt campurile de text curente, prezente pe site in acest moment. Puteti selecta aparitia acestora pe pagina de cautare, inregistrare, pe paginile de profil a membrilor si chiar pe cele de compatibilitate. Puteti foarte rapid si usor sa adaugati noi campuri de text in cadrul siteului prin utilizarea optiunilor de mai jos.",

		"addfields" => "Creaza un camp nou",
	
			"addfields_$" => "half",
			"addfields_*" => "Creaza un camp nou",
			"addfields_?" => "folositi optiunile de mai jos pentru a adauga un camp nou de text in cadrul siteului. Un camp de text poate fi completat de catre membrii siteului cu informatii despre ei insisi.",
			"addfields_^" => "sub",

		"fieldgroups" => "Administreaza grupurile de campuri de text",
	
			"fieldgroups_$" => "half",
			"fieldgroups_*" => "Administreaza campurile de text grupate",
			"fieldgroups_?" => "Grupurile de campuri de text sunt o colectie de campuri de text care au o tema comuna. De exemplu puteti crea un camp numit 'Despre mine' si in cadrul acestora alte campuri: 'Numele meu', 'Varsta', etc. <b>Daca stergeti un camp de text grupat care contine campuri de text acestea sunt in mod automat transferate grupului urmator.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Creaza un Grup nou de campuri de text",
	
			"addgroups_$" => "half",
			"addgroups_*" => "Creaza un Grup nou de campuri de text",
			"addgroups_?" => "Un Grup nou de campuri de text este o colectie de campuri care se afla sub un nou grup principal. Aceasta va permite sa creati noi grupuri de campuri care sunt relationate cu o tema de grupa.",
			"addgroups_^" => "sub",




	"cal" => "Calendar de evenimente",

		"cal_$" => "half",
		"cal_*" => "Calendar de evenimente",
		"cal_?" => "Calendarul de evenimente este afisat pe site si permite membrilor sa creeze si sa vizualize evenimente. Mai jos puteti sa creati, edita si importa evenimente.",

		"caladd" => "Adauga evenimente",
	
			"caladd_$" => "half",
			"caladd_*" => "Adauga/Editeaza Evenimente",
			"caladd_?" => "Compeltati campurile de text de mai jos entru a adauga sau a edita un eveniment.",
			"caladd_^" => "sub",

		"caladdtype" => "Administreaza tipurile de evenimente",
	
			"caladdtype_$" => "half",
			"caladdtype_*" => "Administreaza tipurile de evenimente",
			"caladdtype_?" => "Creati tipuri de evenimente noi. Pentru ca siteul sa arate profesional, este recomandat sa adaugati si o imagine pentru tipurile de evenimente precum si pentru evenimente.",
			"caladdtype_^" => "sub",

		"importcal" => "Importa evenimente",
	
			"importcal_$" => "half",
			"importcal_*" => "Cauta & Importa Evenimente",
			"importcal_?" => "Acest site are inclus un sitem de evenimente bazate pe API. Aceast lucru va permite sa cautati in baza de date ale altor siteuri care permit conectarea prin API dupa evenimente locale sau internationale si sa le adaugati direct in site.",
			"importcal_^" => "sub",


	"poll" => "Sondaje site",

		"poll_$" => "half",
		"poll_*" => "Sondaje site",
		"poll_?" => "Creati si administrati sondajele siteului.",

		"polladd" => "Adauga sondaj",
	
			"polladd_$" => "half",
			"polladd_*" => "Creaza un nou sondaj",
			"polladd_?" => "Completeaza campurile de mai jos pentru a creea un sondaj nou in cadrul siteului tau.",
			"polladd_^" => "sub",



	"forum" => "Forum Site",

		"forum_$" => "half",
		"forum_*" => "Categorii Forum Site",
		"forum_?" => "Administrati categoriile forumului siteului dvs. Este recomandat sa adaugati o fotografie-avatar pentru fiecare categorie pentru ca siteul sa arata mai profesional.",

		"forumadd" => "Adauga o categorie in forum",
	
			"forumadd_$" => "half",
			"forumadd_*" => "Adauga o categorie in forum",
			"forumadd_?" => "Completeaza campurile de text de mai jos pentru a adauga o noua categorie in cadrul formului siteului.",
			"forumadd_^" => "sub",

		"forumchange" => "forum realizat de un tert",
	
			"forumchange_$" => "half",
			"forumchange_*" => "Administreaza integrarea forumului",
			"forumchange_?" => "Acest site are capacitatea sa schimbe forumul. Astfel, puteti selecta oricare din forumurile afisate mai jos si al afisa pe site in locul celui prestabilit.  Va rugam sa cititi cu atentie manualele de instalare a acestor forumuri inainte de a activa aceasta optiune.",
			"forumchange_^" => "sub",

		"forumpost" => "Administreaza postari",
	
			"forumpost_$" => "half",
			"forumpost_*" => "MAdministreaza postarile de pe forum",
			"forumpost_?" => "Mai jos sunt afisate cele mai recente postari de pe siteul dumneavoastra. Aveti posibilitatea sa stergeti sau sa editati postarile care incalca termenii si conditiile siteului.",
			"forumpost_^" => "sub",

	"chatrooms" => "Chat Site - Grupuri discutii",

		"chatrooms_$" => "half",
		"chatrooms_*" => "Chat Site - grupuri discutii",
		"chatrooms_?" => "Creati un nou grup pentru chat sau editati pe cele existente.",


	"faq" => "Intrebari si raspunsuri",

		"faq_$" => "half",
		"faq_*" => "Intrebari si raspunsuri",
		"faq_?" => "Sectiunea de Intrebari si raspunsuri este o modalitate excelenta de a ajuta pe membrii siteului dvs., pentru a le raspunde intrebarilor cu privire la site sau orice problema ar avea acestia. Creaza propriul set de intrebari si raspunsuri sau administrati-le pe cele existente.",

		"faqadd" => "Adauga Intrebari si raspunsuri",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Adauga/Editeaza Intrebari si raspunsuri",
			"faqadd_?" => "Completeeaza campurile de mai jos pentru a edita sau a adauga noi intrebari/raspunsuri.",
			"faqadd_^" => "sub",

	"words" => "Filtru cuvinte",

		"words_$" => "half",
		"words_*" => "Filtru cuvinte",
		"words_?" => "Filtrul de cuvinte se aplica tuturor profilelor membrilor, mesageriei instant si forumului. Acest sistem va filtra toate cuvintele introduse in formularul de mai jos si le va inlocui cu urmatoarele simboluri:(**).",



	"articles" => "Articole site",

		"articles_$" => "half",
		"articles_*" => "Articole Site",
		"articles_?" => "Articolele publicate pe site sunt o modalitate foarte buna sa tii la curent pe membrii siteului cu cele mai noi schmbari referitoare la site precum si alte stiri sau evenimente.",


		"articleadd" => "Adauga articole",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Creaza un nou articol",
			"articleadd_?" => "Completeaza campurile text de mai jos pentru a adauga un articol.",
			"articleadd_^" => "sub",

		"articlerss" => "Importa Articole RSS",
	
			"articlerss_$" => "half",
			"articlerss_*" => "Importa Articole RSS",
			"articlerss_?" => "Linkurile catre feeduri RSS pot fi folosite pentru a adauga articolele publicate prin RSS direct intr-una din categoriile siteului, create anterior. De exemplu, puteti crea categoria 'Stiri' si puteti folosi un feed RSS de pe un site de stiri. Siteul va extrage automat articolele din RSS si le va introduce direct in site.",
			"articlerss_^" => "sub",

		"articlecats" => "Categorii articole",
	
			"articlecats_$" => "half",
			"articlecats_*" => "Categorii articole",
			"articlecats_?" => "Folositit optiunile de mai jos pentru a creea categorii de articole.",
			"articlecats_^" => "sub",


	"groups" => "Grupuri",

		"groups_$" => "half",
		"groups_*" => "Grupuri",
		"groups_?" => "Folositit optiunile de mai jos pentru a creea si administra grupurile siteului.",


	"class" => "Anunturi ale membrilor",

		"class_$" => "half",
		"class_*" => "Anunturi ale membrilor",
		"class_?" => "Aveti mai jos toate anunturile create de catre membrii siteului.",


		"addclass" => "Adauga anunt",
	
			"addclass_$" => "half",
			"addclass_*" => "Adauga/Editeaza anunt",
			"addclass_?" => "Folositit optiunile de mai jos pentru a adauga/edita anunturi pe site.",
			"addclass_^" => "sub",

		"addclasscat" => "Administreza categorii",
	
			"addclasscat_$" => "half",
			"addclasscat_*" => "Administreaza categorii",
			"addclasscat_?" => "Folositit optiunile de mai jos pentru a administra categoriile de anunturi. Este recomandat sa adaugati o fotografie la fiecare categorie pentru ca siteul sa arate profesional. ",
			"addclasscat_^" => "sub",

	"games" => "Jocuri",

		"games_$" => "half",
		"games_*" => "Jocuri",
		"games_?" => "Aveti listate mai jos toate jocurile instalate pe siteul dvs. Consultati manualul pentru a afla mai multe despre cum se instaleaza un joc.",

	"gamesinstall" => "Instaleaza joc",

		"gamesinstall_$" => "half",
		"gamesinstall_*" => "Instaleaza joc",
		"gamesinstall_?" => "Selectati mai jos jocurile pe care doriti sa le instalati. Daca doriti sa adaugati si alte jocuri, incarcati arhivele tar ale jocului in urmatoarea locatie: inc/exe/Games/tar/. <b>Consultati manualul pentru a afla mai multe despre cum se instaleaza un joc.</b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administratori",

		"_$" => "half",
		"_*" => "Administratorii si Moderatorii siteului",
		"_?" => "Aveti listatati mai jos toti administratorii si, dupa caz, moderatorii siteului, cu exceptia super utilizatorului. Adaugati noi moderatori prin cautarea de noi membri si facand click pe iconita 'moderator' de langa numelele lor.",

	"pref" => "Preferinte administrator",

		"pref_$" => "half",
		"pref_*" => "Preferinte administrator",
		"pref_?" => "Modificati preferintele administratorului pe aceasta pagina.",

	"manage" => "Administreaza moderatori",

		"manage_$" => "half",
		"manage_*" => "Administreaza moderatori",
		"manage_?" => "Un moderator are doua roluri. Acesta poate modera numai siteul principal sau le puteti oferi drepturi de autentificare in zona de administrare cu tot ce implica aceasta.",

	"email" => "Emailuri catre administrator",

		"email_$" => "half",
		"email_*" => "Emailuri catre administrator",
		"email_?" => "Aveti afisate mai jos emailurile trimise de catre membrii siteului administratorului.",

	"compose" => "Scrie un email",

		"compose_$" => "half",
		"compose_*" => "Scrie un email",
		"compose_?" => "Creati un email care va fi trimis unui membru",
		"compose_^" => "sub",

	"super" => "Autentificare super utilizator",

		"super_$" => "half",
		"super_*" => "Detalii autentificare super utilizator",
		"super_?" => "Atentie la editarea contului de mai jos, acesta este un super cont si parola trebuie tinuta in cel mai mare secret.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Actualizari software",

		"_$" => "half",
		"_*" => "Actualizari software",
		"_?" => "Aveti afisate mai jos versiunea curenta a programului care ruleaza siteul comparativ cu cea mai nou versiune disponibila. Daca nu aveti cea mai noua versiune contactati providerul software-ului pentru a primi o versiune noua.",

	"backup" => "Copie de siguranta baza de date",

		"backup_$" => "half",
		"backup_*" => "Dopie de siguranta baza de datep",
		"backup_?" => "Selectati una sau mai multe tabele ale bazei de date pentru a face o copie de siguranta. Va recomandam sa folositi facilitatile de realizare a copiilor de siguranta ale hostingului dvs. pentru a asigura o copiere perfecta.",


	"license" => "Codurile de licenta ale programului",

		"license_$" => "half",
		"license_*" => "Codurile de licenta ale programului",
		"license_?" => "Acestea sunt codurile de licenta ale programului, atentie la editarea acestora intr-o maniera corecta.",

	"sms" => "Credite SMS",

		"sms_$" => "half",
		"sms_*" => "Credite SMS",
		"sms_?" => "Acestea sunt creditele SMS ramase la dispozitia contului dvs.",

);

$admin_layout_page11 = array(

	"" => "Pluginuri",

		"_$" => "half",
		"_*" => "Pluginuri",
		"_?" => "Pluginurile extind functionalitatea programului EMeeting. Imediat ce un plugin este instalat, il puteti activa sau dezactiva folosind meniul din partea stanga a siteului. ",

);


$admin_layout_nav = array(

	"1" => "Info globale",
		"1a" => "Statistici membri",
		"1b" => "Statistici afiliati",
		"1c" => "Statistici vizitatori",
		"1d" => "Locatiile vizitatorilor",
	"2" => "Membri",
		"2a" => "Administreaza membri",
		"2b" => "Administreaza afiliati",
		"2c" => "Membri blocati",
		"2d" => "Fisiere membri",
		"2e" => "Importa membri",
	"3" => "Design",
		"3a" => "Sabloane",
		"3b" => "Editor sabloane",
		"3c" => "Manger imagini sabloane",
		"3d" => "Editor Logo ",
		"3e" => "Meta Taguri",	
		"3f" => "Localizare",
		"3g" => "Text pagini",
		"3h" => "Manager fisiere",
		"3i" => "Bare meniuri",
	"4" => "Email",
		"4a" => "Administreaza emailuri",
		"4b" => "Sabloane email",
		"4c" => "Rapoarte email",
		"4d" => "Trimite un singur email",
		"4e" => "Emailuri de atentionare",	
		"4f" => "Descarca emailuri",
		"4g" => "Trimite newsletere",		
	"5" => "Plati",
		"5a" => "Administreaza pachete",
		"5b" => "Procesatori plati",
		"5c" => "Istoric plati",
		"5d" => "Istoric plati afiliati",
	"6" => "Configurare",
		"6a" => "Optiuni afisare",
		"6b" => "Setari afisare",
		"6c" => "Cai ale sistemului",
		"6d" => "Marcare fotografie",
	"7" => "Continut",
		"7a" => "Campuri de cautare",
		"7b" => "Calendar de evenimente",
		"7c" => "Sondaje",
		"7d" => "Forum",
		"7e" => "Chat",	
		"7f" => "Intrebari si Raspunsuri",
		"7g" => "filtru cuvinte",
		"7h" => "Articole / Stiri",
		"7i" => "Grupuri",
	"8" => "Promotii",	
		"8a" => "Banere",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Administreaza Moderatori",	
		"10a" => "Administreaza Moderatori",
		"10b" => "Super utilizator",
	"11" => "Mentenanta",
		"11a" => "Copie de siguranta",
		"11b" => "Coduri licenta",
		"11c" => "Actualizari site",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Sistemul a fost actualizat cu succes",
	"no_update" => "Sistemul a fost actualizat dar nu a fost nimic care sa fie sters!",
	"edit" => "Editeaza",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Cauta",
	"1" => "Cauta tot",
	"2" => "Deselecteaza tot",
	"3" => "Aproba",
	"4" => "Suspenda",
	"5" => "Sterge",	
	"6" => "Activeaza-l membru featured",
	"7" => "Optiuni",	
	"8" => "Actualizare",	
	"9" => "Activeaza optiuni de top",
	"10" => "Sterge optiuni de top",	
	"11" => "Actualizeaza limba predefinita",
	"12" => "Trimite",
	"13" => "Continua",	
	"14" => "Activeaza",
	"15" => "Anuleaza",
	"16" => "Actualizeaza comanda",
	"17" => "Actualizeaza campurile de pe pagina",	
	"18" => "Activeaza",
);

$admin_table_val = array(
	"1" => "Utilizator",
	"2" => "Gen",
	"3" => "Ultima autentificare",
	"4" => "Status",
	"5" => "Pachet",
	"6" => "Uctualizat",
	"7" => "Optiuni",	
	"8" => "Data",
	"9" => "IP",
	"10" => "Hack - ",	
	"11" => "Data inregistrarii",	
	"12" => "Nume",
	"13" => "Email",
	"14" => "Clickuri",
	"15" => "Insregistrari",
			
	"15" => "Comision de platit",
		
	"16" => "Mesaj",
	"17" => "Ora",
	"18" => "Nume fisier",
	"19" => "Ultima actualizare",	
	"20" => "Editeaza",
	"21" => "Prestabilit",	
	"22" => "ID",

	"23" => "Pret",
	"24" => "Visibil",	
	"25" => "Tip",
	"26" => "Administreaza Acces",	
	"27" => "Activ",

	"28" => "Vizualizare cod",
	"29" => "Campuri",	
	"30" => "Nume afiliat",
	"31" => "Total",	
	"32" => "Status",
	
	"33" => "Data Upgradarii",
	"34" => "Data expirarii",	
	"35" => "Metoda de plata",
	"36" => "Inca activ",	
	"37" => "Parola",
	"38" => "Cea mai recenta autentificare",

	"39" => "Positie",
	"40" => "Vizite",	
	"41" => "Activ",
	"42" => "Previzualizare",	
	"43" => "Titlu",
	"44" => "Articole",
	"45" => "Ordine",

);

$admin_search_val = array(
	"1" => "Username membru",
	"2" => "Toate pachetele",
	"3" => "Toate sexele",
	"4" => "Pe Pagina",
	"5" => "Ordoneaza dupa",
	"6" => "Email",
	
	"7" => "Oricare Status",
	"8" => "Membri activi",
	"9" => "Membri suspendati",
	"10" => "Membri neaprobati",
	"11" => "Membri care doresc anularea",
	"12" => "Toate paginile",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Administreaza toate grupurile",
	"2" => "Nume grup",
	"3" => "LaLimbanguage",		
	"4" => "Administreaza topicuri",
	"5" => "Administreaza categorii",	
	"6" => "Nume categorie grup",		
	"7" => "Administreaza categorii",	
	"8" => "Numere",	
	"9" => "Numara",	
	"10" => "Adauga articol",	
	"11" => "Categorie",
	"12" => "Titlu pagina",	
	"13" => "Descriere scurta",		
	"14" => "Adauga articolee",
	"15" => "Administreaza categorii",
	"16" => "Lista campuri",
	"17" => "Comanda",
	"18" => "Limba",
	"19" => "Listeaza Valori",
	"20" => "Camp nou",	
	
	"21" => "Titlu camp",		
	"22" => "Tipul campului",
		"23" => "Camp text",	
		"24" => "Zona text",	
		"25" => "Camp derulant",
		"26" => "Casuta de validare",
		"27" => "Casute de validare multipla",
	
	"28" => "Groupuri Headlines",
	"29" => "Include in timpul inregistrarii",
	"30" => "Selecteaza mai jos",
	
	"31" => "Adauga grup",
	"32" => "Optiuni afisare grup",
		"34" => "Afiseaza tuturor membrior",
		"35" => "Afiseaza numai administratorului",
		"36" => "Afiseaza administratorilor si membrilor (nu in profil)",
	"37" => "Numai",	
	"38" => "Administreaza grupuri",	
	"39" => "Adauga eveniment",	
	"40" => "Campuri text",
	"41" => "Text",		
	"42" => "Text descriere",
	"43" => "Tip text",	
	"44" => "Cauta text",		
	"45" => "Text profil",	
	"46" => "Trebuie sa creati un text pentru aceasta pagina de profil, ca de exemplu 'sunt un/o' si un text pentru pagina de cautare ca de exemplu 'cau un/o'",	
	"47" => "Textele campurilor existente",	
	"48" => "Muta campul in acest grup",		
	"49" => "ID Membru",
	"50" => "Nume eveniment",	
	"51" => "Descriere eveniment",		
	"52" => "Tip eveniment",
	"53" => "Selecteaza Categoria",	
	"54" => "Selecteaza Tipul",
	"55" => "Timp eveniment",
	"56" => "Lasa necompletat pentru toata ziua",
	"57" => "Data eveniment",
	"58" => "Luna",	
	
	"59" => "Zi",	
	"60" => "Anr",
	"61" => "Stat",		
	"62" => "Stat",
	"63" => "Strada",	
	"64" => "Oras",		
	"65" => "Telefon",	
	"66" => "Email",	
	"67" => "Site web",	
	"68" => "Eveniment invizibil",		
		"69" => "Oricui",
		"70" => "Numai prietenilor",	
		
	"71" => "Adauga sondaj",		
	"72" => "Rezultate sondaj site",
	"73" => "Nume sondaje",	
	"74" => "Raspuns",	
	"75" => "Seteaza-l activ",
	
	"76" => "Adauga subiect in forum",
	"77" => "Administreaza postari",
	"78" => "Subiect Forum ",	
		
	"79" => "Titlu",	
	"80" => "Descriere",
	"81" => "Postari Forum",		
	"82" => "Toate postarile",
	"83" => "Azi",	
	"84" => "Aceasta saptamana",		
	"85" => "Ultima saptamana",	
	"86" => "Nume camera",	
	"87" => "Campuri de text existente",	
	"88" => "Parola camera",		
	"89" => "Adauga nou",
	"90" => "Adauga Intrebari si Raspunsuri",
	
	"91" => "Adauga cuvant cenzurat",		
	"92" => "Cuvant",
	
	"93" => "Aprobat",
	"94" => "Text",
	"95" => "Text compatibilitate",
	"96" => "Limba",

	"97" => "Previzualizare",
	"98" => "Resultate",
);
$admin_advertising = array(

	"1" => "Banere",
	"2" => "Adauga Baner",
	"3" => "Banere afililiat",	
	"4" => "Adauga / Editeaza Banere",
	"5" => "Tip banner",	
	"6" => "Banner site",			
	"7" => "Banner Afiliati ",	
	"8" => "Nume",	
	"9" => "Incarca Banner",	
	"10" => "Introduceti HTML",	
	"11" => "Code HTML",
	"12" => "Incarcare Banner",	
	"13" => "Link Banner",		
	"14" => "Cui afisati bannerul",
		"15" => "Toti membrii",
		"16" => "Numai membrii autentificati",
	
	"17" => "Unde va fi afisat ?",
	"18" => "Activ",
	
	"19" => "Pozitionat sus",
	"20" => "Pozitionat in mijloc",	
	"21" => "Pozitionat in stanga",		
	"22" => "Pozitionat in partea superioara",
	"23" => "Lasati necompletat pentru a folosi un link in cadrul bannerului.",
	"24" => "Previzualizare banner",
	
);


$admin_maintenance = array(

	"1" => "Rulati",
	"2" => "Cea mai recenta versiune",
	"3" => "Credite sMs",	
	"4" => "Credite SMS ramase",	
	"5" => "Cumpara credite",	

);

$admin_admin = array(

	"1" => "Adauga Administrator",
	"2" => "Utilizator",
	"3" => "Parola",	
	"4" => "Email",
	
	"5" => "Editeaza setari administrator",	
	"6" => "Nume complet",			
	"7" => "Nivelul de acces",	
		"8" => "Acces complet la sistem",	
		"9" => "Acces numai la membri",	
		"10" => "Acces numai la design",	
		"11" => "Acces numai la email",
		"12" => "Numai acces la plati",	
		"13" => "Numai acces la setari",		
		"14" => "Numai acces de management",
	"15" => "Avatar administrator",

	"17" => "Alerte email",
	"18" => "alerta stiri administrator",
	"19" => "transfera toti membrii de la",
	"20" => "catre pachetul",	
	"21" => "Editeaza pachet",		
	"22" => "Acces la pachet",
	"23" => "Adauga optiune la pachet",	
	"24" => "Administreaza accesul la pachet",
);

$admin_settings = array(

	"1" => "Pagini afisare",
	"2" => "Activate",
	"3" => "Anulate",	
	"4" => "Cai web",
	"5" => "Cai server",	
	"6" => "Cai foto-avatare",			
	"7" => "Adauga camp",	
	"8" => "Nume",	
	"9" => "Valoare",	
	"10" => "Tip",	
	"11" => "Administreaza campuri",
	"12" => "Adauga Procesator de plati",	
	"13" => "Sistem de plata",		
	"14" => "Codul de acces la procesator",
	"15" => "Titlu",
	"16" => "Acces pachete",
	"17" => "Comentarii",
	"18" => "Transfera Membri",
	"19" => "Transfera toti membrii de la",
	"20" => "catre urmatorul pachet",	
	"21" => "Editeaza pachet",		
	"22" => "Acces la pachet",
	"23" => "Adauga optiune la pachet",	
	"24" => "Administreaza accesul la pachet",
);

$admin_billing = array(

	"1" => "Adauga pachet",
	"2" => "Administreaza accesul la pachet",
	"3" => "Transfera pachetele membrilor",			
	"4" => "Siteul dvs. ruleaza in acest moment in <b>MODUL GRATUIT</b>, de aceea pachetele de abonament au fost eliminate de pe site.",
	"5" => "Doriti sa anulati modul gratuit si sa afisati optiunile pachetelor de abonament ?",	
	"6" => "ANULEAZA MODUL GRATUIT",		
	"7" => "Adauga camp",	
	"8" => "Nume",	
	"9" => "Valoare",	
	"10" => "Tip",	
	"11" => "Administreaza campuri",
	"12" => "Adauga procesator",	
	"13" => "Sistem de plata",		
	"14" => "Cod de plata procesator",
	"15" => "Titlu",
	"16" => "Acces la pachet",
	"17" => "Commentarii",
	"18" => "Transfera Membri",
	"19" => "Transfera toti membrii de la",
	"20" => "Catre urmatorul pachet",	
	"21" => "Editeaza pachet",		
	"22" => "Acces la pachet",
	"23" => "Adauga optiune la pachet",	
	"24" => "Administreaza acces la pachet",
	
	"25" => "Aprobare in curs",
	"26" => "Plati aprobate",
	"27" => "Pleti refuzate",
	
	"28" => "Istoric",
	"29" => "Plati active",
	"30" => "Plati finalizate",
	"31" => "Subscrieri active",
	"32" => "Subscrieri finalizate",
	"33" => "Cod de acces packet subscriere",
	
);

$admin_email = array(

	"1" => "Emailuri de sistem",
	"2" => "Newsletere",
	"3" => "Sabloane Email",		
	"4" => "Email Editor",
	"5" => "Subiect",	
	"6" => "Previzualizare email",	
	"7" => "Catre",
	
	"8" => "Trimis catre",	
		"9" => "Toti membrii",	
		"10" => "Subscriere la pachetul de abonament",	
		"11" => "Activ / Suspendat / Membri neaprobati",
	"12" => "catre pachetul",	
	"13" => "Status Inscriere",		
	"14" => "Selecteaza Newsleter",	
	
	"15" => "Creaza nou",
	"16" => "Vizualizare definita",
	"17" => "Codul tracking email",
	"18" => "Creaza nou",
	"19" => "Vizualizare definita",
	"20" => "Cod de tracking email",
		"21" => "Codul HTML",
		
	"22" => "Rezultat tracking emailuri",
	"23" => "Nu am gasit nici un raport.",
	"24" => "Selecteaza Raport",
	
	"25" => "Trimite averitzari tuturor membrilor care au intre",
	"26" => "si",
	"27" => "zile",
	"28" => "zile ramase din pachetul de serviciu subscris.",
	"29" => "Selecteaza Email pentru a trimite:",
	"30" => "Descarca",
	"31" => "Selecteaza pachet servicii",
	"32" => "Cod tracking",
	
	
);

$admin_design = array(

	"1" => "Descarca sabloane",
	"2" => "Sablonul curent",
	"3" => "Activeaza acest sablon",	
	"4" => "Meta Taguri Site",
	"5" => "Titlu paginae",	
	"6" => "Descriere",
	"7" => "Keywords",
	"8" => "Pagini website",	
	"9" => "Pagini continut",	
	"10" => "Creaza pagini custom",	
	"11" => "Creaza pagina",
	"12" => "Cale FTP",	
	"13" => "Fisiere sablon",		
	"14" => "Pagini continut",	
	"15" => "Pagini custom",


	"16" => "Adauga limba",
	"17" => "Nume fisier nou",	
	"18" => "Selecteaza fisierul de copiat",
			
	"19" => "Editeaza fisierul de limba",	
	"20" => "Pagina custom",

	"21" => "Litera",
	"22" => "Marime litera",	
	"23" => "Culoare litera",
	"24" => "latime",	
	"25" => "inaltime",		
	"26" => "Adauga text logo ",
	"27" => "Tipul formelor",	
		"28" => "Folosete forme goale",
		"29" => "Pastreaza designul curent",	
		"30" => "Incarca foto fundal  / logo",	

	"31" => "Creaza o pagina noua",
	"32" => "Nume pagina noua",	
		"33" => "Numele de pagina trebuie sa fie foarte scurte si formate dintr-un singur cuvant. EX. Legaturi, Articole, Stiri, Forum etc",
	"34" => "Adaug un nou meniu?",	
		"35" => "Nu! Nu creea un nou meniu.",		
		"36" => "Da. Adauga in zona membrilor",
		"37" => "Da. Adauga la siteul principal, nu in cadrul paginilor membrilor.",
			"38" => "Daca este selectat, un nou meniu pentru noul membru va fi generat pe site.",
);

$admin_overview = array(

	"1" => "Anunturi",
	"2" => "Nr. total membbri",
	"3" => "Aceasta saptamana",
	"3a" => "Azi",
	"4" => "Activitatea recenta de pe site",
	"5" => "Rapoarte site",
	
	"6" => "Vizitatorii unici de pe site din ultimele 2 saptamani.",
	"7" => "Inregistrarile noilor membri din ultimele 2 saptamani.",
	"8" => "Statistica membri - pe sex",	
	"9" => "Statistica membri - pe varsta",
	
	"10" => "Inregistrarile afiliatilor din ultimele 2 saptamani",
	"11" => "Setari - Harta vizitatorilor",
	"12" => "Introduceti cheia API a Google in campul de mai jos.",	
	"13" => "Puteti cumpara o cod de licenta din zona clienti a site-ului nostru.",	
	
	"14" => "Filtreaza rezultatele de cautare",	
	"15" => "Toate fisierele",
	
);
$admin_members = array(

	"1" => "Toti Membrii",
	"2" => "Moderatori",
	"3" => "Activ",
	"4" => "Suspendat",
	"5" => "Neaprobat",
	"6" => "Doresc sa anuleze",
	"7" => "Online acum",
	"8" => "Activitatea de autentificare a membrului",	
	"9" => "Editeaza detalii membru",	
	"10" => "Adauga Afiliati",
	"11" => "Bannere afiliati",
	"12" => "Pagini afiliati",	
	"13" => "Adauga Afiliat",	
	"14" => "configurare afiliati",	
	"15" => "Toate fisierele",
	"16" => "Potografii",
	"17" => "Videoclipuri",
	"18" => "Musica",
	"19" => "YouTube",
	"20" => "Neaprobat",
	"21" => "Recomandat",
	"22" => "Incarca fisier",	
	"23" => "Fisier",
	"24" => "Tip",
	"25" => "Utilizator",
	"26" => "Titlu",
	"27" => "Comentariu",
	"28" => "Activeaza-l ca prestabilit",		
	"29" => "Activitatea de autentificare a membrilor",	
	"30" => "Afiliatii s-au inscris pe",
	"31" => "Recomandati",
	"a5" => "Utiliator",
	"a6" => "Parola",
	"a7" => "Nume",
	"a8" => "Prenume",
	"a9" => "Nume companie",
	"a10" => "Adresa",
	"a11" => "Strada",
	"a12" => "Oras",
	"a13" => "Stat",
	"a14" => "Cod postal",
	"a15" => "Stat",
	"a16" => "Telefon",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Adresa web",
	"a20" => "Cecul sa fie platit catre",
);


// HELP FILES
$admin_help = array(

	"a" => "Incepe acum",
	"b" => "Nu, ma descurc. Multumesc!",
	"c" => "Continua",	
	"d" => "Inchide fereastra",
	
	
	"1" => "Introducere",
	"2" => "Vreti sa va ajut?",
	"3" => "Salut",	
	
	"4" => "si bine ati venit in zona de administrare! Intrucat este pentru prima data cand ati accesat aceasta zona va recomandam sa petreceti cateva minute cu o scurta prezentare a optiunilor pe care le are zona de administrare.",
	"5" => "Asistentul de ajutor va fi ghid prin pasii de configurare, astfel incat siteul sa fie configurat fara pierdere de vreme.",	
	"6" => "<strong>(Nota)</strong> Puteti sa reveniti pe aceasta pagina oricand facand click pe 'Ghid rapid', din partea stanga a meniului.",
	
	"7" => "Pentru inceput",
	"8" => "Bine ati venit in zona de administrare!",	
	"9" => "Bine ai venit in zona de administrare pentr",	
	"10" => "Acest software va permite sa administrati diferitele aspecte al siteului dvs, incluzand membrii, fisierele, securitatea, emailul si multe altele.",	
	"11" => "Asistentul de ajutor va va prezenta cateva concepte legate de managementul siteului si va permite sa configurati unele setari de baza ale siteului, astfel incat sa puteti sa atrageti cat mai multi vizitatori.",
	"12" => "<strong>(Atentie)</strong> In orice moment puteti inchide fereastra folosind butonul CLOSE si va puteti intoarce facand click pe 'ghid rapid' din meniul situat in partea stanga.",
		
	"13" => "Introducere in zona de administrare",		
	"14" => "Zona de administrare are o interfata web, ceea ce inseamna ca se poate accesa si administra din orice locatie, de oriunde din lume, avand nevoie numai de o conexiune la internet. Deschideti browserul web si scrieti urmatoarea adresa:",	
	"15" => "si autentificati-va cu date de administrator.",
	"16" => "Click aici pentru a pune la Favorite acest link.",
	
	"17" => "Introducere in sumarul siteului.",	
	"18" => "Sumarul siteului va ofera o privire de ansamblu asupra performantei siteului, puteti citi anunturile siteului, vizualiza istoricul inregistrarilor, etc.",			
	"19" => "Toate informatiile referitoare la membri sunt stocate intr-o baza de date MYSQL numita:",	
	"20" => "introducere in sectiunea de statistici.",
	"21" => "Sectiunea de statistici va ofera o reprezentare vizuala a inregistrarii membrilor si afiliatilor, pe o perioada de 2 saptamani. De fiecare data cand un membru sau afiliat se inregistreaza data si ora sunt memorate si afisate in imagine.",
	
	"22" => "Prezentare - locatiile vizitatorului",		
	"23" => "Prezentare - administreaza membrii",	
	"24" => "Prezentare - administreaza afiliatii",	
	"25" => "Prezentare - administreaza membrii blocati",		
	"26" => "Prezentare - administreaza fisierele membrilor siteului",
	"27" => "Prezentare - importa membri",	
	"28" => "Prezentare -  - sabloane site",
	"29" => "Prezentare - Editor sabloane",	
	"30" => "Prezentare - Manager de imagini - sabloane",
	"31" => "Prezentare - Editor Logo ",
	"32" => "Prezentare - Meta Taguri",	
	"33" => "Prezentare - Localizare",
	"34" => "Prezentare - Administreaza Emailuri",	
	"35" => "Prezentare - Sabloane email",		
	"36" => "Prezentare - Rapoarte email",
	"37" => "Prezentare - Trimite Newsletere",
	"38" => "Prezentare - Avertizare email",
	"39" => "Prezentare - Descarcare adrese de email",
	"40" => "Prezentare - Pachete de abonament",
	"41" => "Prezentare - Procesatoare de plati",
	"42" => "Prezentare - Istoric plati abonamente",
	"43" => "Prezentare - Istoric plati afiliat",
	"44" => "Prezentare - Optiuni afisare",
	"45" => "Prezentare - Configurare afisare",
	"46" => "Prezentare - Cale sistem",
	"47" => "Prezentare - Imagine marcaj",
	"48" => "Prezentare - Campuri de cautare",
	"50" => "Prezentare - Calendar de evenimente",
	"51" => "Prezentare - Sondaje",
	"52" => "Prezentare - Forum",
	"53" => "Prezentare - Chat",
	"54" => "Prezentare - Intrebari/Raspunsuri",
	"55" => "Prezentare - Filtru cuvinte",
	"56" => "Prezentare - Stiri / Articole",
	"57" => "Prezentare - Grupuri",

		"22a" => "Zona de vizualizare a locatiei vizitatorilor prezinta locatia fiecaruia dintre membrii siteului, pentru a vedea rapid din ce zone ale globului se inscriu vizitatorii.",		
		"23a" => "Zona de administrare a membrilor permite sa vizualizati membrii care s-au incris pe site. Folositi filtrul de optiuni pentru a administra membrii, pentru a le edita, actualiza sau sterge profilele.",	
		"24a" => "TSectiunea de management a afiliatilor va permite sa vedeti in mod global afiliatii siteului dvs, puteti vizualiza, edita si sterge afiliati, precum si aporbarea noilor inregistrati.",	
		"25a" => "Sectiunea de membri blocati pastreaza toate informatiile cu privire la atat membri cat si vizitatorii siteului care incaerca sa 'sparga' protectiile siteului, programul blocand in mod automat membrii suspectati de astfel de activitati, in felul acesta siteul dvs fiind protejati.",		
		"26a" => "Zona de administrare a fisierelor membrilor va permite sa vizualizati toate fisierele incarcate de catre membri, muzica, video, foto. Faceti click pe orice fotografie pentru a o edita online.",
		"27a" => "Zona de import a membrilor va permite importul membrilor din alte programe. Trebuie numai sa introduceti informatii cu privire la baza de date a siteului unde de se afla vechiul program si aceasta va fi transferat automat in siteul dvs.",	
		"28a" => "Sectiunea cu sabloanele siteului va permite schimbarea sablonului siteului si prin aceasta designul siteului. Faceti click pe sablonul pe care-l doriti activat si siteul se va actualiza la noul design in mod automat.",
		"29a" => "Editorul de sabloane va permite editarea paginilor siteului direct din zona de administrare. De asemenea, este posibil sa copiati codul din pagina sablon, editata in alt editor HTML si apoi incarcat pe pagina sablon.",	
		"30a" => "Managerul de imagini ale sablonului va permite schimbarea imaginilor curente de pe site cu unele noi. Noile imagini vor inlocui imaginile curente si vor aparea instantaneu pe site.",
		"31a" => "Editorul fisierului LOGO va permite schimbarea designului fisierului logo curent. Puteti in acceasi masura sa creati propriul logo si apoi sa selectati 'Incarca prorpiul logo' pentru a schimba designul siteului.",
		"32a" => "Optiunile de meta taguri va permit editarea meta tagurilor pentru paginile generate de program. Puteti adauga propriul titlu, cuvinte cheie, descrieri fiecarei pagini din site.",	
		"33a" => "Optiunile de management al limbii va permite sa stergeti orice fisier de localizare al unei limbi pe care nu vreti sa o folositi sau sa adaugati un nou pachet de localizare.",
		"34a" => "Optiunile de management al emailurilor va permite sa creati propriul sistem de mail si newsleletere, in felul acesta siteul dvs fiind personalizat asa cum doriti.",	
		"35a" => "Prezentare - Sabloane email",		
		"36a" => "Prezentare - Rapoarte email",
		"37a" => "Prezentare - Trimite Newslettere",
		"38a" => "Prezentare - Avertizari prin email",
		"39a" => "Prezentare - Descarcare adrese de email",
		"40a" => "Prezentare - Pachete abonament",
		"41a" => "Prezentare - Procesatori plati",
		"42a" => "Prezentare - Istorica plati pachete abonament",
		"43a" => "Prezentare - Istoric plati afiliati",
		"44a" => "Prezentare - Optiuni afisare",
		"45a" => "Prezentare - Configurare sfisaj",
		"46a" => "Prezentare - Cai sistem",
		"47a" => "Prezentare - Fotografie marcaj",
		"48a" => "Prezentare - Campuri de cautare",
		"50a" => "Prezentare - Calendar evenimente",
		"51a" => "Prezentare - Sondaje",
		"52a" => "Prezentare Forum",
		"53a" => "Prezentare Chat",
		"54a" => "Prezentare Intrebari/Raspunsuri",
		"55a" => "Prezentare Filtru Cuvinte",
		"56a" => "Prezentare Stiri / Articole",
		"57a" => "Prezentare Groupuri",
);

$admin_login = array(

	"1" => "Autentificare in zona de administrare",
	"2" => "Ai uitat parola? fi fara grija, introdu adresa ta de email in campul de mai jos si iti vom trimite una noua.",
	"3" => "Adresa Email",
	"4" => "Textul mai jos",
	"5" => "Resetare parola",
	"6" => "Introduceti mai jos informatiile necesare pentru autentificare.",
	"7" => "utilizator",
	"8" => "Parola",	
	"9" => "Licenta",	
	"10" => "Limba",
	"11" => "autentificare",
	"12" => "IP inregistrat este ",	
	"13" => "Parola uitata",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Profil marcat",
	"2" => "Moderator site",
	"3" => "Pachet optiuni",
	"4" => "Trimite un email de upgradare",
	"5" => "Adauga schimbarea pachetului la sistemul de facturare ",
	"6" => "Numar SMS",
	"7" => "Credite SMS",
	"8" => "Setati contul ca",	
	
	"9" => "click pentru a edita parola.",	
	"10" => "Membri marcati au in pagina de rezultate un fundal diferit.",
	"11" => "Acesta da membrilor acces la site in calitate de moderator.",
	
	"12" => "- Pagina de bun venit pentru afiliati",	
	"13" => "Pagina de afisare a codului pentru baner",	
	"14" => "Pagina de plata afiliati",	
	"15" => "Pagina sumaar afiliati",
	"16" => "Pagina de editare cont afiliati",
	
	"17" => "Importa membri din",	
	
	"18" => "Varsta",			
	"19" => "Vizualizare fisier",	
	"20" => "Personal",
	"21" => "Public",
	
	"22" => "album",		
	"23" => "Continut pentru adulti",	
	"24" => "Continut public",	
	
	"25" => "Marime",		
	"26" => "Muta fisierele in albumele pentru adulti",
	"27" => "Fisiere pentru adulti",

);

$admin_selection = array(

	"1" => "Da",
	"2" => "Nu",
	
	"3" => "Activat",
	"4" => "Dezactivat",
);

$admin_plugins = array(

	"1" => "Pluginurile extind functionalitatea lui eMeeting. Imediat ce un plugin este instalat, il puteit activa sau dezactiva de pe aceasta pagina, folosind optiunile meniului din partea stanga.",
	"2" => "Puteti vizualiza si descarca noi module (plugin) din zona pentru clienti a siteului nostru.",
	"3" => "Nume plugin",
	"4" => "Detaliu plugin",
	"5" => "Cea mai recenta actualizare",
	"6" => "Stadiu",

);
$admin_pop_welcome = array(

	"1" => "Bine ai revenit",
	"2" => "mai jos aveti un raport scurt cu privire la membrii inscrisi si performanta siteului pnetru astazi.",
	"3" => "Membri nou inscrisi azi",
	"4" => "Fisiere de aprobat",
	"5" => "<strong>Atentie:</strong> Daca nu doriti sa primiti aceste atentionari la autentificare le puteti dezactiva oricand din zona de administrare a preferintelor administratorilor.",
	"6" => "Inchide fereastra",

);
$admin_pop_chmod = array(

	"1" => "Eroare permisiuni fisiere",
	"2" => "Fisierele de pe aceasta pagina nu se pot modifica.",
	"3" => "urmatoarele fisiere/directoare trebuie sa aiba permisiune de scriere pentru a fi editate. Daca rulati pe un server Linux sau Unix puteti folosi un program FTP si folosi functia 'CHMOD' ('Change Mode') pentru a stabili permisiuni. Daca rulati pe un server Windows va trebui sa contactati firma care va ofera hosting pentru a face aceste operatiuni pentru dvs.",
	"4" => "Fisierele/directoarele care cer CHMOD 777 sunt",
	"5" => "Inchide fereasstra",

);
$admin_pop_demo = array(

	"1" => "Modul DEMO activat",
	"2" => "Schimbarile facute in cadrul zonei de administrare nu se vor salva in modul DEMO.",
	"3" => "Setarile de sistem au trecut in modul DEMO, ceea ce inseamna ca accesul la multe din actiuni este permis, cu exceptia modificarii acestora.",
	"4" => "Puteti sa accesati zona de administrare, desi unele setari pe care le faceti nu se vor salva.",
	"5" => "<strong>Va rugam sa aveti in vedere urmatoarele:</strong> Daca doriti sa stergeti restrictiile specifice un cont demo trebuie sa contactati pe administratorul siteului pentru mai multe detalii.",
	"6" => "Inchide fereastra",
);

$admin_pop_import = array(

	"1" => "Rezultate transfer baza de date",
	"2" => "membrii au fost importati cu succes!",
	"3" => "membrii au fost importati cu succes din programul",
	"4" => "Va rugam sa urmati instructiunile pentru a va asigura ca imaginile membrilor sunt actualizate corect.",
	"5" => "Caile catre folderul de imagini ale eMeeting sunt afisate mai jos, trebuie sa copiati vechile cai in caile noi;",
	"6" => "Inchide fereastra",
);

$admin_loading= array(

	"1" => "Optimizez tabelele bazei de date ...",
	"2" => "Va rog asteptati ...",

);
$admin_menu_help= array(
"1" => "Ghid - ajutor rapid",
);

$admin_settings_extra = array(

	"1" => "Afiseaza pagina de cautare",
	"2" => "Afiseaza pagina de contact",
	"3" => "Afiseaza Pagina turul siteului",
	"4" => "Afiseaza pagina de intrebari si raspunsuri",
	"5" => "Afiseaza Evenimente",
	"6" => "Afiseaza Grupuri",
	"7" => "Afiseaza Forum",
	"8" => "Afiseaza modulul de compatibilitati",	
	"9" => "Afiseaza Reteaua",	
	"10" => "Afiseaza sistemul de afiliere",
	"11" => "Afiseaza sistemul de alerta SMS / Mesaje text",
	
	"12" => "Afiseaza Blogurile",	
	"13" => "Afiseaza camerele de chat",	
	"14" => "Afiseaza mesageria instant",	
	"15" => "Afiseaza sistemul de verificare vizuala la inregistrare",
	"16" => "Afiseaza cautarea codurilor postale din Marea Britanie",
	"17" => "Afiseaza cautarea codurilor postale din SUA",
	"18" => "Afiseaza integrarea MSN/Yahoo",
	
	"19" => "Pachetul de servicii prestabilit",
		"20" => "Acestul este pachetul de servicii prestabilit, unde membrii noi sunt inclusi automat.",
	"21" => "Membrii trebuie sa incarce o fotografie pentru a se inscrie",
		"22" => "Puteti alege daca doriti ca membrii sa nu fie obligati sa incarca ofotografie pe site pentru a li se permite inregistrarea.",	
	"23" => "MODUL GRATUIT",
		"24" => "Selectati DA daca doriti ca toate optiunile de pe site sa fie accesibile tuturor.",
	"25" => "MODUL MENTENANTA",
		"26" => "Acest mod va opri accesul pe site atat a membrilor cat si vizitatorilor, singurul care va putea sa acceseze siteul fiind administratorul, numai daca se autentifica.",
		
	"27" => "Numarul de profiluri cauteate/pagina",
		"28" => "Selectati cate profiluri doriti sa fie afisate pe pagina",		
	"29" => "Numarul de profiluri de compatibilitate/pagina",	
		"30" => "Selectati cate profiluri doriti sa fie afisate pe pagina.",
		
	"31" => "Coduri activare email",
		"32" => "Membrilor le este trimis un cod de activare la adresa de email care trebuie validata inainte de a se putea autentifica.",
	"33" => "Aprobare manuala a membrilor",
	"34" => "Selectati DA sau NU daca doriti sa nu sa verificati manual conturile noilor membri.",
	"35" => "Aprobare manuala a fisierelor",
		"36" => "Selectati DA sau NU daca doriti sa verificati manual fisierele inainte sa fie afisate pe site.",
	"37" => "Aprobarea manuala a inregistrarilor video",
		"38" => "Selectati DA sau NU daca doriti sa verificati manual transmiterile video ale membrilor (fluxurile video chat)",
		
	"39" => "Inregistrare video - mesaje",
	"40" => "Aceasta permite inregistrarea de catre membri a propriilor video mesaje in cadrul profilului. Trebuie insa sa introduceti propriul server flash RMS in campurile de mai jos.",
	"41" => "Conectare Flash RMS",
		"42" => "Va trebuie un hosting flash (flash hosting) pentru a folosi aceasta optiune",
	"43" => "Format data",
		"44" => "Selectati formatul datei care va fi afisata pe site.",
	"45" => "Permeite comentarii la profile/fisiere",
		"46" => "Activati aceasta optiune daca doriti ca membrii sa adauge comentarii la profile si la fisierele incarcate pe site.",
	"47" => "Afisare Chat si mesagerie instant intr-o fereastra noua",
	
	"48" => "Activati aceasta optiune daca doriti ca mesageria instant si camerele de chat sa se deschida intr-o fereastra noua.",
	
	"49" => "Activati Search Engine Friendly?",
		"50" => "Activati aceasta optiune in functie de hostingul dvs: linux sau unix si daca folositi fisierul .htaccess",
	"51" => "Cauta membrii fara fotografie",
		"52" => "Doriti ca membrii care nu au incarcat o fotografie proprie sa fie afisati in paginile de rezultate ?",
	"53" => "Afisaeaza steagurile corelative limbii",
		"54" => "Selectati DA sau NU daca doriti sa apara steagul corelativ limbii in care este afisat siteul.",
	"55" => "Moneda de plata pentru afiliat",	
	"56" => "Folositi editorul HTML",	
	"57" => "Selectati YES sau NU, in functie de modul de verificare al fisierlor: manual sau automat.",

	"58" => "Afiseaza pagina de articole",

);

$admin_billing_extra = array(

	"1" => "Apasati pe 'yes' daca doriti ca toate optiunile siteului sa fie accesibile tuturor.",
	
	"2" => "Tipul de abonament",
	"3" => "Abonament membru",
	"4" => "Pachet SMS",
	"5" => "Selectati YES daca doriti sa creati numai un pachet SMS care sa permita cumpararea de credite SMS suplimentare",
	"6" => "Nume pachet",
		"7" => "Introduceti un nume pentru acest pachet. Acesta va aparea pe pagina in care utilizatorii vor alege upgradarea pachetului existent.",
	"8" => "Descriere",	
	"9" => "Pret",	
	"10" => "Cat doriti sa coste upgradarea la acest pachet ? Atentie: Scrieti numai cifra, fara simbolul monedei.",
	"11" => "Simbolul monedei",
	
	"12" => "Acesta este simbolul moendei care va fi afisat pe site. Acesta nu este moneda de plata, aceasta treuie introdusa in setarile de plata.",	
	"13" => "Subscriere",	
	"14" => "Selecteaza DA daca doriti sa fie o plata repetata (lunar, etc).",	
	"15" => "Perioada de upgradare",
	
	"16" => "Zi",
	"17" => "Saptamana",
	"18" => "Luna",
		"18a" => "Nelimitat",
	"19" => "Numarul maxim de mesaje/zi",
		"20" => "Acesta este numarul maxim de mesaje pe care membrii le pot trimite pe zi.",
	"21" => "Numarul maxim de pupici",
		"22" => "Numarul maxim de pupici pe care un membru care are abonamentul curent poate trimite pe zi.",	
	"23" => "Numarul maxim de fisiere",
		"24" => "Numarul maxim de fisiere pe care un utilizator le poate incarca.",
	"25" => "Pachetul Link-Avatar",
		"26" => "Pachetul Link-Avatar trebuie sa contina un link catre o imagine de pe siteul dumneavoastra. Marime recomandata: 28px x 90px.",
		
	"27" => "Membrul zilei",
		"28" => "Selectati DA daca doriti ca fotografiile membrilor sa fie afisate si pe prima pagina a siteului.",		
	"29" => "Evidentiere",	
		"30" => "Selectati DA daca doriti ca membrii acestui abonament sa fie evidentiati in cadrul paginilor de rezultate, cu ajutorul imaginii de fundal.",
		
	"31" => "Vizualizare imagini destinate adultilor",
		"32" => "Selectati DA daca doriti ca membrii abonamentului acesta sa poata vizualiza fotografii incarcate de alti membri si destinate numai adultilor.",
	"33" => "Credite SMS",
	"34" => "Acesta este numarul de credite SMS adaugate contului membrilor siteului cand acestia upgradeaza la acest abonament. Acesta va fi adaugat creditului deja existent, in cazul in care mai au si alte credite.",
	"35" => "Vizibil la upgradarea abonamentului"

);

$admin_mainten_extra = array(

	"1" => "Link (legatura)",
	"2" => "Introduceti numai linkul daca doriti o legatura catre un alt site.",
	"3" => "flux RSS",
	
	"4" => "Categorie",
	"5" => "Vizualizari",
	"6" => "Informatie suplimentara",
	"7" => "Limba",
	"8" => "Grup privat",
		
	"9" => "Schimba forum",	
	"10" => "Selecteaza Forum",
	"11" => "forumul prestabilit",
	
	"12" => "Folositi un forum produs de o companie terta. Va rugam sa va autentificati pentru a administrat forumul.",	
	"13" => "Parola"
);

$admin_set_extra1 = array(

	"1" => "Permite incarcare imagini",
	"2" => "Accepta incarcare fisiere video",
	"3" => "Accepta incarcare fisiere muzica",	
	"4" => "Accepta import de pe YouTube",	
);

$admin_alerts = array(

	"1" => "Alerte",
	"2" => "vizitatori noi",
	"3" => "membrii noi",	
	"4" => "membri neaprobate",	
	"5" => "fisiere neaprobate",
	"6" => "actualizari noi",	
);

$lang_members_nn = array(

	"0" => "Monitorizare membri de abuzuri",
	"1" => "Utilizator sau ID",
	"2" => "Nu exista un istoric al chat-ului",	
);

$members_opts = array(

	"1" => "Editeaza Profil",
	"2" => "Incarcari fisiere",
	"3" => "Istorie plati",	
	"4" => "Trimite Email",	
	"5" => "Trimite Mesaj",
	"6" => "Postari forum",
	"7" => "Abuz mesaje",	
);
?>