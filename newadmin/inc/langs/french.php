<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "french",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "UTF-8",
	"title" => "Espace Administration "
		
);

$admin_layout = array(

	"3" => "Mes préférences",
	"4" => "Déconnexion",

);


$admin_layout_page1 = array(

	"" => "Tableau de bord",

		"_*" => "Admin de Tableau de bord",
		"_?" => "",

	"members" => "Statistiques de membre",
		
		"members_*" => "Statistiques de membre",
		"members_?" => "Le graphique ci-dessous montre le nombre de nouveaux engagements de membre au cours des deux dernières semaines.",
		"members_^" => "sous",

	"affiliate" => "Statistiques d'affiliation",
 
		"affiliate_*" => "Statistiques d'affiliation",
		"affiliate_?" => "Le graphique ci-dessous montre le nombre de nouvelles inscriptions d'affiliation au cours des deux dernières semaines.",
		"affiliate_^" => "sous",

	"visitor" => "Statistique des visiteurs",
 
		"visitor_*" => "Statistique des visiteurs",
		"visitor_?" => "Le graphique ci-dessous montre le nombre de statistiques web site visiteur enregistré par le logiciel sur chaque jour au cours des deux dernières semaines.",
		"visitor_^" => "sous",

	"maps" => "Google Maps",
 
		"maps_*" => "Lieux d'accueil avec Google Maps",
		"maps_?" => "Cette section vous permet de voir où dans le monde les membres de votre se joignent à votre site web à partir. Cela vous permet de développer votre campagne de marketing et de publicité de manière plus efficace par ciblage et le suivi des différents pays.",
 

	"adminmsg" => "Annonce du site Web",
 
		"adminmsg_*" => "Annonce du site Web",
		"adminmsg_?" => "Saisissez votre message dans la boîte ci-dessous et à chaque fois qu'un membre se connecte à son compte le message sera affiché à eux. C'est parfait pour montrer des messages d'intérêt ou des changements de site Web.",

);
 

$admin_layout_page2 = array(

	"" => "Membres",

		"_$" => "demi",
		"_*" => "Gérer les membres",
 

		
			
				"edit_*" => "Modifier membres",
				"edit_?" => "Utilisez les options ci-dessous pour mettre à jour un compte membres et les détails du profil.",
				"edit_^" => "aucun",


			"fake" => "faux Membres",
	 
				"fake_*" => "Générer des faux Membres",
				"fake_?" => "Utilisez les options ci-dessous pour générer des faux membres pour votre site web, cela aidera votre site web regarde 'busy', alors que votre première mise en route. Son recommandé d'utiliser la même adresse électronique pour tous les membres de faux cas vous souhaitez localiser et de les supprimer à une date ultérieure.",
				"fake_^" => "sous",

	"banned" => "Exclure Membres",
 
		"banned_*" => "Exclure Membres",
		"banned_?" => "Le logiciel est doté d'un système de détection d'intrus dans ce qui bloque automatiquement les membres qui tentent de pirater votre site web. Voici tous les membres actuels (et membre du néant) les détails de hack tentatives.",
		"banned_^" => "sous",

	"monitor" => "Surveiller Membres",
 
		"monitor_*" => "Surveiller Membres",
		"monitor_?" => "De temps en temps les membres peuvent signaler les autres membres pour avoir abusé du système de messagerie ou l'envoi de messages désagréables ou indésirables. Vous pouvez utiliser cet outil pour visualiser et contrôler les messages membres afin de protéger la sécurité d'autrui.",
		"monitor_^" => "sous",

	"import" => "Importer membres",
 
		"import_*" => "Les membres des importations en provenance de base de données ou de fichiers CVS",
		"import_?" => "En utilisant les options ci-dessous vous permet d'importer les membres dans votre site web ou d'un autre site de Rencontres / site de collectivité ou d'un CVS backup.",
		"import_^" => "sous",
		
	"files" => "Fichiers Membres ", 
	"files_*" => "Album Fichiers membres",


	"addfile" => "Envoyer une photo",			 
	"addfile_*" => "Envoyer une photo",
	"addfile_?" => "Parfois, un membre aura du mal à télécharger une photo sur le site web. Utilisation de cette section, vous pouvez télécharger une photo de votre membre.",
	"addfile_^" => "sous",
			
 
	"affiliate" => "Affiliation site Web",
 
		"affiliate_*" => "Affiliation site Web",
		"affiliate_?" => "En utilisant les options ci-dessous, vous pouvez gérer votre site Web affiliés.",
		 
			"addaff" => "Ajouter Nouveau partenaire",
	 
				"addaff_*" => "Ajouter / Modifier un compte d'affiliation",
				"addaff_?" => "Remplissez tous les champs ci-dessous pour ajouter ou modifier un compte d'affilié sur votre site web.",
				"addaff_^" => "sous",

			"affsettings" => "Pages de contenu d'affiliation",
 
				"affsettings_*" => "Affiliation Conception",
				"affsettings_?" => "Utilisez les options ci-dessous pour modifier le texte sur vos pages d'affiliation.",
				"affsettings_^" => "sous",

			"affcom" => "Affiliation Commission",
	 
				"affcom_*" => "Affiliation Commission",
				"affcom_?" => "Ici vous pouvez régler le taux de commission pour vos affiliés. Cela signifie que pour chaque vente faite par un membre de comité de lecture de votre site Web par une société affiliée, elles vont générer le pourcentage de la vente total ci-dessous.",
				"affcom_^" => "sous",


			"affban" => "Bannières Affiliation",
	 
				"affban_*" => "Bannières Affiliation",
				"affban_?" => "Ici vous pouvez configurer les publicités bannières qui seront affichées dans le compte d'affilié pour vos sociétés affiliées à utiliser sur leur site web.",
				"affban_^" => "sous",

);


$admin_layout_page3 = array(

 

		"" => "Thème Galerie",
 
			"_*" => "Thème Galerie",
			"_?" => "Voici la liste de tous les modèles de site Web qui sont actuellement installés sur votre site web. Cliquez sur l'image de prévisualisation de changer instantanément le gabarit sur votre site web.",
			 
				
			"color" => "Agencement des couleurs",
		 
				"color_*" => "Agencement des couleurs",
				"color_?" => "En utilisant les options ci-dessous vous pouvez personnaliser la palette de couleurs pour votre site web. Si vous souhaitez remplacer vos propres images avec, s'il vous plaît utiliser les outils de l'image à thème.",
				"color_^" => "sous",
				
			"logo" => "Logo du site Web",
				"logo_$" => "demi",
				"logo_*" => "Logo du site Web",
				"logo_?" => "Utilisez les options sur cette page pour personnaliser l'apparence logo sur votre site web. Vous pouvez sélectionner à partir d'un logo conçu avant le télécharger",
				"logo_^" => "sous",
				
			"img" => "Thème Images",
				"img_$" => "demi",
				"img_*" => "Thème Images",
				"img_?" => "Les images ci-dessous sont tous stockés dans votre dossier de modèle sur l'image. Utilisez les options ci-dessous pour remplacer les images existantes par de nouvelles que vous sélectionnez.",
				"img_^" => "sous",

			"text" => "Accueil du texte de la page",
				"text_$" => "demi",
				"text_*" => "Accueil du texte de la page",
				"text_?" => "Les champs ci-dessous vous permettent de modifier le texte de bienvenue sur la page d'accueil de votre site web. Certains modèles utilisent des ensembles différents de paires de libellé, de sorte que vous devrez peut-être experiement à trouver celle qui vous convient le mieux.",
				"text_^" => "sous",


			"terms" => "Site Web T&C",
				"terms_$" => "demi",
				"terms_*" => "Modalités du site Web",
				"terms_?" => "Modifiez le champ ci-dessous pour personnaliser votre site web termes et conditions. Ces données sont ensuite affichées sur la page d'inscription lors de votre inscription.",
				"terms_^" => "sous",
	
			"edit" => "Pages & fichiers",
 
			"edit_*" => "Pages du site Web",
			"edit_?" => "Sélectionnez dans la liste des cases ci-dessous pour afficher le contenu des fichiers sur votre site web. Son recommandé de copier et de coller le code dans un éditeur tel que Dreamweaver ou la page de couverture avant de le modifier et de le coller en arrière quand vous avez fini. <b> S'il vous plaît prendre grand soin lors de la configuration système de montage ou des fichiers que les changements sont instantanés et ne peut être défait.</a>",
				
	
	
				"newpage" => "Créer une page",
				"newpage_$" => "demi",
				"newpage_*" => "Créez une nouvelle page",
				"newpage_?" => "Créer une nouvelle page sur votre site web est facile. Il suffit d'entrer un titre un mot dans la case ci-dessous et votre page sera créée prêt pour l'édition.",
				"newpage_^" => "sous",
							
				
			"meta" => "Meta Tags Theme",
				"meta_$" => "demi",
				"meta_*" => "Meta Tag Editor",
				"meta_?" => "eMeeting a un système de méta tag sophistiqués de création intégré au logiciel vous permet d'économiser temps et argent en créant des milliers de descriptions de la page vous-même. Le logiciel génère automatiquement le titre, la description et les balises META mot clé en fonction du contenu affiché sur la page.",
				"meta_^" => "sous",

 

		
			"menu" => "Menu Bars",
				"menu_$" => "demi",
				"menu_*" => "Barre de menus de gestion",
				"menu_?" => "Utilisez les options ci-dessous pour modifier l'ordre de vos barres membre ou ajouter des nouveaux éléments de menu. Vous pouvez également saisir les liens externes tels que http://google.com que le lien de menu pour un élément de menu si vous souhaitez faire un lien vers un autre site web ou une page sur votre site web.",
				"menu_^" => "sous",

	"manager" => "Gestionnaire de fichiers",
		"manager_$" => "demi",
		"manager_*" => "Gestionnaire de fichiers",
		"manager_?" => "Le gestionnaire de fichiers est très utile lors de l'ajout ou la suppression de nouveaux fichiers contenu à votre site web. Vous pouvez parcourir la totalité du compte d'hébergement et de supprimer des fichiers sont nécessaires.",

			"slider" => "Rotation des images",
				"slider_$" => "demi",
				"slider_*" => "Page d'accueil Rotation des images",
				"slider_?" => "Les images sont les images de curseur de rotation s'affiche sur votre page d'accueil. Utilisez les options ci-dessous pour changer l'image, une description et cliquez sur les liens en mesure.",
				"slider_^" => "sous",

	"languages" => "Fichiers de langue",
		"languages_$" => "demi",
		"languages_*" => "Fichiers de langue",
		"languages_?" => "Voici la liste de tous les fichiers de langue chargés sur votre site web. Vous pouvez supprimer tous les fichiers de la langue que vous ne voulez pas utiliser, et ils ne seront pas affichées sur votre site web ou cocher la case pour changer la langue du site Web par défaut. <b> Note, vous devez vous déconnecter de l'admin et le site web pour voir les changements de la langue</b>",

			"editlanguage" => "Modifier le Fichier de Langue",
				"editlanguage_$" => "demi",
				"editlanguage_*" => "Modifier le Fichier de Langue",
				"editlanguage_?" => "TPrenez garde lors de l'édition du fichier de langue ci-dessous, en sorte de garder la syntaxe de même pour éviter les erreurs système. Seuls entrer le contenu dans après la flèche (=>) La première valeur est utilisée comme une clé.",
				"editlanguage_^" => "sous",

			"addlanguage" => "Ajouter un fichier Langue",
				"addlanguage_$" => "demif",
				"addlanguage_*" => "Ajouter un fichier Langue",
				"addlanguage_?" => "Création d'un nouveau fichier de langue tout simplement copier l'un de ceux qui existent déjà vous choisissez ci-dessous et de le renommer, vous pouvez ensuite ouvrir le fichier de langue et modifier le contenu.",
				"addlanguage_^" => "sous",



);


$admin_layout_page4 = array(

	"" => "E-mail and Newsletters",

		"_$" => "demi",
		"_*" => "E-mail et Newsletters",
		"_?" => "Voici une liste de tous les courriels actuellement stockés dans le système. Système de courriels sont utilisés par le logiciel pour envoyer des emails aux membres lorsque des événements se produisent, comme lors de l'inscription ou mot de passe perdu. Vous pouvez personnaliser tous les emails et créer votre propre en utilisant les options ci-dessous",

			"add" => "Créer un Nouveau courriel ",
				"add_$" => "demi",
				"add_*" => "Ajouter / Editer un nouveau courriel",
				"add_?" => "Remplissez les formulaires ci-dessous pour ajouter / modifier votre nouvel e-mail, ce sera alors sauvegardé dans votre e-mail personnalisé dossier des modèles afin que vous puissiez revenir ou envoyer tout moment vous le souhaitez.",
				"add_^" => "sous",

	"welcome" => "Bienvenue Email / SMS",
		"welcome_$" => "demi",
		"welcome_*" => "Bienvenue Email / SMS",
		"welcome_?" => "En utilisant les options ci-dessous vous pouvez décider quel e-mail et SMS est envoyé au participant lorsqu'il s'inscrit ",
		"welcome_^" => "sous",

	"template" => "Email Templates",
		"template_$" => "demi",
		"template_*" => "Email Templates",
		"template_?" => "Ci-dessous sont une sélection de modèles de modèle intégré dans le logiciel. Cliquez sur l'une des images pour ouvrir et modifier le modèle.",
		"template_^" => "sous",

	"export" => "Télécharger e-mails",

		"export_$" => "demi",
		"export_*" => "Télécharger e-mails",
		"export_?" => "Utilisez les options ci-dessous pour télécharger l'ensemble de vos adresses e-mail membres de la base de données.",
		"export_^" => "sous",

	"sendnew" => "Envoyer Lettres d'information",

		"sendnew_$" => "demi",
		"sendnew_*" => "Envoyer Lettres d'information",
		"sendnew_?" => "Utilisez cette section pour commencer à envoyer des newsletters à vos membres. Sélectionnez tout d'abord que les membres d'envoyer et puis sélectionnez les e-mail à envoyer.",

	"send" => "Envoyez l'email simple",

		"send_$" => "demi",
		"send_*" => "Envoyez l'email simple",
		"send_?" => "Employez cette option pour envoyer un email simple à un membre en écrivant l'email address ci-dessous. L'email employé pour envoyer l'email est le même énuméré sur votre compte d'admin.",
		"send_^" => "sous",

	/*"auto" => "Email Scheduler",

		"auto_$" => "demi",
		"auto_*" => "Email Automatique Scheduler",
		"auto_?" => "Des courriers électroniques automatiques. le logiciel envois sur une façon opportune comme une fois par jour, dans la semaine, ou le mois etc. Vous pouvez l'installation de tels courriers électroniques ci-dessous.",
		"auto_^" => "sous",*/

	"subs" => "Rappels de Courrier électronique",

		"subs_$" => "demi",
		"subs_*" => "Rappels de Courrier électronique",
		"subs_?" => "Des courriels de rappel vous permet d'envoyer des emails aux membres qui sont dans un nombre X de jours pour un événement tel que leur appartenance ou non expirant en ajoutant une photo.",
		"subs_^" => "sous",
		
	"tc" => "Rapports de Courrier électronique",
		"tc_$" => "demi",
		"tc_*" => "ERapports de Courrier électronique",
		"tc_?" => "Les rapports de courrier électronique sont produits quand un courrier électronique est envoyé qui contient le code de dépistage. Ils produisent la statistique de combien de membres ont ouvert les courriers électroniques que vous envoyez.",
		"tc_^" => "sous",

			"tracking" => "Code de suivi du courriel",
				"tracking_$" => "demi",
				"tracking_*" => "Code de suivi du courriel",
				"tracking_?" => "Le code de suivi ci-dessous (tracking_id) est remplacé par une image transparente qui est attaché à l'e-mails quand ils sont envoyés. Si l'email est ouvert et l'image n'est pas bloquée, le système peut enregistrer l'e-mail a été ouvert et générer un rapport de suivi pour vous.",
				"tracking_^" => "sous",



	"SMSsend" => "Envoyer des messages SMS",

		"SMSsend_$" => "demi",
		"SMSsend_*" => "Envoyer des messages SMS",
		"SMSsend_?" => "Utilisez les options ci-dessous pour envoyer des SMS / messages pour les membres de votre téléphone mobile.",
);

$admin_layout_page5 = array(

	"" => "Membership Levels",

		"_$" => "demi",
		"_*" => "Niveaux d'adhésion",
		"_?" => "Voici la liste de toutes les formules d'abonnement courant appliqué à votre site web. Les plus mis en évidence en vert sont requises par le système pour contrôler la façon dont les visiteurs et les nouveaux membres sont manipulé par vous donner plus de contrôle sur votre site web.",

			"epackage" => "Ajouter le Forfait",
				"epackage_$" => "demi",
				"epackage_*" => "Ajouter / Editer le Forfait",
				"epackage_?" => "Remplir les formulaires ci-dessous pour ajouter ou mettre à jour la trousse d'adhésion pour votre site web.",
				"epackage_^" => "sous",

			"packaccess" => "Gestion de l'accès",
				"packaccess_$" => "plein",
				"packaccess_*" => "Gestion de l'accès de la page",
				"packaccess_?" => "Ici, vous pouvez contrôler l'accès à votre site Web tout entier basé sur le forfait de l'adhésion. <b> Note: Seuls cocher la case si vous ne souhaitez pas que le membre pour voir cette page. </b>",
				"packaccess_^" => "sous",

			"upall" => "Transfert des membres",
				"upall_$" => "demi",
				"upall_*" => "Les membres de transfert entre les différents Forfaits",
				"upall_?" => "Utilisez cette option lorsque vous souhaitez transférer des membres d'un niveau d'adhésion à un autre.",
				"upall_^" => "sous",


	"gateway" => "Passerelles de paiement",

		"gateway_$" => "demi",
		"gateway_*" => "Passerelles de paiement",
		"gateway_?" => "Les passerelles de paiement vous permet de prendre le paiement de vos mises à jour d'adhésion. Si vous exécutez un site Web gratuit, vous pouvez désactiver le système de paiement dans la zone Paramètres.
",


			"addgateway" => "Ajouter passerelle de paiement",
				"addgateway_$" => "demi",
				"addgateway_*" => "Ajouter passerelle de paiement",
				"addgateway_?" => "Le logiciel a un certain nombre de passerelles de paiement déjà intégrés dans le système, choisir le fournisseur de la liste ci-dessous pour l'utiliser sur votre site web.",
				"addgateway_^" => "sous",


	"billing" => "Système de facturation",

		"billing_$" => "demi",
		"billing_*" => "Système de facturation",	


		"affbilling" => "Historique de la facturation d'affiliation",
	
			"affbilling_$" => "demi",
			"affbilling_*" => "Historique de facturation d'affiliation", 
			"affbilling_^" => "sous",


);

$admin_layout_page6 = array(

	"" => "Bannières et publicité",

		"_$" => "demi",
		"_*" => "Bannières et publicité",
 

			"addbanner" => "Ajouter Banner",
				"addbanner_$" => "demi",
				"addbanner_*" => "Ajouter Banner",
				"addbanner_?" => "Utilisez les options ci-dessous pour ajouter une nouvelle bannière à votre site web.",
				"addbanner_^" => "sous",


);

$admin_layout_page7 = array(

	"" => "Paramètres d'affichage",

		"_$" => "demi",
		"_*" => "Paramètres d'affichage",
		"_?" => "Utilisez les options ci-dessous pour désactiver et sur les caractéristiques du site Web que vous ne souhaitez utiliser.",


	"op" => "Options d'affichage",

		"op_$" => "demi",
		"op_*" => "Options d'affichage",
		"op_?" => "Utilisez les options ci-dessous pour personnaliser les paramètres de votre site web comme vous le souhaitez.",
	
		"op1" => "Paramètres de recherche",
	
			"op1_$" => "demi",
			"op1_*" => "Paramètres d'affichage de la recherche",
			"op1_?" => "Utilisez les options ci-dessous pour personnaliser la façon dont vos pages de recherche sont affichés sur votre site web.",
			"op1_^" => "sous",
	
		"op2" => "Paramètres d'Adhésion",
	
			"op2_$" => "demi",
			"op2_*" => "Paramètres d'Adhésion",
			"op2_?" => "Utilisez les options ci-dessous pour personnaliser votre configuration adhésion site Web est affiché",
			"op2_^" => "sous",

		"op3" => "Paramètres du serveur Flash",
	
			"op3_$" => "demi",
			"op3_*" => "Paramètres du serveur Flash",
			"op3_?" => "Un serveur Flash est utilisé pour stocker la vidéo de voeux membres et est utilisé dans la messagerie instantanée et chat pour afficher les caméras vidéo membre.",
			"op3_^" => "sous",

		"op4" => "API Settings",
	
			"op4_$" => "demi",
			"op4_*" => "Paramètres du API", 
			"op4_^" => "sous",

		"thumbnails" => "Vignettes par défaut",
	
			"thumbnails_$" => "demi",
			"thumbnails_*" => "Vignettes par défaut", 
			"thumbnails_^" => "Voici la liste de toutes les images par défaut actuellement utilisé sur votre site web où les membres n'ont pas télécharger leurs propres photos.",

	"email" => "Email Settings",

		"email_$" => "half",
		"email_*" => "Paramètres Email",
		"email_?" => "Ci-dessous sont une liste des événements du site Web, vous pouvez sélectionner les événements que vous souhaitez le système de vous envoyer une notification par email. Notifications par courrier électronique sera envoyé à tous les administrateurs système qui ont accès aux paramètres du système.",

	"paths" => "Fichier / Chemins de Dossier",

		"paths_$" => "demi",
		"paths_*" => "Fichier / Chemins de Dossier",
		"paths_?" => "Les chemins de fichiers et de dossiers ci-dessous portent sur les fichiers et dossiers sur votre compte d'hébergement. Le logiciel va automatiquement appliquer ces cours de l'installation toutefois Incase elles sont incorrectes, vous pouvez les modifier ci-dessous.",

	"watermark" => "Image Watermark",

		"watermark_$" => "demi",
		"watermark_*" => "Image filigrane",
		"watermark_?" => "Un filigrane image est une image qui est affichée en haut de photos membres quand ils sont affichés. Il s'agit généralement d'un logo de votre site web, images filigrane doit être dans le format PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Domaines du site Web",

		"_$" => "demi",
		"_*" => "Champs de profil, d'enregistrement et de la recherche",
		"_?" => "Voici la liste de tous les champs de courants figurant sur votre site web. Vous pouvez choisir d'afficher les champs sur la page de recherche, pages d'inscription, les pages de profil et même les pages correspondent membres. Vous pouvez ajouter rapidement et facilement de nouveaux champs à votre site Web en utilisant les options ci-dessous.",

		"addfields" => "Créer nouveau champ",
	
			"addfields_$" => "demi",
			"addfields_*" => "Créer un nouveau champ",
			"addfields_?" => "Utilisez les options ci-dessous pour ajouter un nouveau champ à votre site web. Un champ est utilisé pour permettre aux membres de remplir les informations sur eux-mêmes.",
			"addfields_^" => "sous",

		"fieldgroups" => "Manage Groups",
	
			"fieldgroups_$" => "demi",
			"fieldgroups_*" => "Gérez Groupes de champs",
			"fieldgroups_?" => "Les groupes sont une collection de champs qui ont un thème commun. Ainsi, par exemple, vous pouvez créer un groupe appelé  'A propos de moi et au sein du groupe d'ajouter des champs tels que 'Mon nom', 'Mon Age' etc. <b>Si vous supprimez un groupe avec des champs, les champs seront automatiquement déplacé vers le groupe suivant.",
			"fieldgroups_^" => "sous",

		"addgroups" => "Créez Nouveau Groupe",
	
			"addgroups_$" => "demi",
			"addgroups_*" => "Créez Nouveau Groupe de champs",
			"addgroups_?" => "Un groupe de champs est une collection de tous les champs mis sous un titre du groupe principal. Cela vous permet de créer beaucoup de groupes avec les champs qui sont liées au thème du groupe.",
			"addgroups_^" => "sous",




	"cal" => "Calendrier événements",

		"cal_$" => "demi",
		"cal_*" => "Calendrier des événements",
		"cal_?" => "Le calendrier des événements est affiché sur votre site web pour les membres de créer et de visualiser les événements. Utilisez les options ci-dessous pour créer, modifier et importer des événements nouveaux.",

		"caladd" => "Ajouter un événement",
	
			"caladd_$" => "demi",
			"caladd_*" => "Ajouter / Editer un événement",
			"caladd_?" => "Remplissez les champs ci-dessous pour ajouter / modifier un site de l'événement.",
			"caladd_^" => "sous",

		"caladdtype" => "Types d'événement Gérer",
	
			"caladdtype_$" => "demi",
			"caladdtype_*" => "Types d'événement Gérer",
			"caladdtype_?" => "Utilisez les options ci-dessous pour créer des nouveaux types d'événements, de ses recommandé d'ajouter une image à chaque événement pour rendre votre site web d'aspect plus professionnel.",
			"caladdtype_^" => "sous",

		"importcal" => "Importer des Événements",
	
			"importcal_$" => "demi",
			"importcal_*" => "Recherche & Importer des Événements",
			"importcal_?" => "Le logiciel dispose d'un système intégré dans les événements de l'API. Cela vous permet de rechercher une base de données mondiale des événements locaux et internationaux et de les ajouter directement à votre site web.",
			"importcal_^" => "sous",


	"poll" => "Sondage du site Web",

		"poll_$" => "demi",
		"poll_*" => "Sondage du site Web",
		"poll_?" => "Utilisez les options ci-dessous pour créer et gérer votre site web sondages",

		"polladd" => "Ajouter un sondage",
	
			"polladd_$" => "demi",
			"polladd_*" => "Créer un nouveau sondage",
			"polladd_?" => "Remplissez les champs ci-dessous pour créer un nouveau sondage pour votre site web.",
			"polladd_^" => "sous",



	"forum" => "Forum du site Web",

		"forum_$" => "demi",
		"forum_*" => "Catégories Forum du site Web",
		"forum_?" => "Utilisez les options ci-dessous pour gérer votre catégorie sous forme de site Web. Son recommandé d'ajouter des icônes photo pour chaque catégorie de rendre votre site web d'aspect plus professionnel.",

		"forumadd" => "Ajout catégorie Forum",
	
			"forumadd_$" => "demi",
			"forumadd_*" => "Ajouter une catégorie Forum",
			"forumadd_?" => "Remplissez les champs ci-dessous pour ajouter une nouvelle catégorie dans votre site web.",
			"forumadd_^" => "sous",

		"forumchange" => "ThirdParty Forum",
	
			"forumchange_$" => "demi",
			"forumchange_*" => "Gérez Intégration de Forum",
			"forumchange_?" => "Le logiciel a la possibilité pour vous de changer le conseil d'administration du forum, cela signifie que vous pouvez sélectionner l'un des forums ci-dessous pour utiliser à la place du forum par défaut S'il vous plaît se référer aux manuels d'installation pour chaque conseil Forum avant d'activer cette fonctionnalité.",
			"forumchange_^" => "sous",

		"forumpost" => "Gérer les messages",
	
			"forumpost_$" => "demi",
			"forumpost_*" => "Gérer les messages du forum",
			"forumpost_?" => "Voici la liste de tous les messages du forum récentes ajoutées par vos membres. Utilisez les options ci-dessous pour modifier ou supprimer des sujets qui sont inacceptables.",
			"forumpost_^" => "sous",

	"chatrooms" => "Chat du site Web",

		"chatrooms_$" => "demi",
		"chatrooms_*" => "Chat du site Web",
		"chatrooms_?" => "Utilisez les options ci-dessous pour créer de nouvelles salles de chat pour votre site web ou modifier celles qui existent déjà.",


	"faq" => "FAQ du site Web",

		"faq_$" => "demi",
		"faq_*" => "FAQ du site Web",
		"faq_?" => "site Web FAQ sont un excellent moyen pour aider les membres en savoir plus sur votre site web et de répondre aux problèmes qu'ils pourraient avoir. Créez votre propre série de FAQ et de les gérer en utilisant les options ci-dessous.",

		"faqadd" => "Ajouter FAQ",
	
			"faqadd_$" => "demi",
			"faqadd_*" => "Ajouter / modifier FAQ",
			"faqadd_?" => "Remplissez les champs ci-dessous pour ajouter ou modifier une entrée de la FAQ.",
			"faqadd_^" => "sous",

	"words" => "Filtre de Mot",

		"words_$" => "demi",
		"words_*" => "Filtre de Mot",
		"words_?" => "Le filtre est appliqué à mot non désiré dans, les profils des membres, la messagerie instantanée et le forum et filtrer l'un des mots que vous entrez ici et les remplacer par des étoiles (**).",



	"articles" => "Articles du site Web",

		"articles_$" => "demi",
		"articles_*" => "Articles du site Web",
		"articles_?" => "articles du site Web sont un excellent moyen de garder vos membres à jour avec les dernières modifications apportées à votre site Web pour des nouvelles et événements",


		"articleadd" => "Ajouter l'article",
	
			"articleadd_$" => "demi",
			"articleadd_*" => "Créer un nouvel article",
			"articleadd_?" => "Remplissez les champs ci-dessous pour ajouter un nouvel article sur votre site web.",
			"articleadd_^" => "sous",

		"articlerss" => "RSS Import articles",
	
			"articlerss_$" => "demi",
			"articlerss_*" => "RSS Import articles",
			"articlerss_?" => "Les liens RSS peut être utilisé pour importer des articles RSS directement dans l'une des catégories que vous avez créé. Par exemple, vous voudrez peut-être créer une catégorie 'Nouvelles' et entrez le flux RSS à partir d'un site Web de nouvelles. Le logiciel sera ensuite extraire tous les articles de la redevance RSS et de les ajouter à votre site web.",
			"articlerss_^" => "sous",

		"articlecats" => "Catégories article",
	
			"articlecats_$" => "demi",
			"articlecats_*" => "Catégories article",
			"articlecats_?" => "Utilisez les options ci-dessous pour créer des catégories nouvel article pour votre site web.",
			"articlecats_^" => "sous",


	"groups" => "Groupes communautés",

		"groups_$" => "demi",
		"groups_*" => "Groupes communautaires",
		"groups_?" => "Utilisez les options ci-dessous pour créer et gérer votre site Web des groupes communautaires.",


	"class" => "Petites Annonces",

		"class_$" => "demi",
		"class_*" => "Petites Annonces",
		"class_?" => "Voici la liste de toutes les petites annonces créées par vos membres.",


		"addclass" => "Ajouter annonces",
	
			"addclass_$" => "demi",
			"addclass_*" => "Ajouter / modifier l'annonce",
			"addclass_?" => "Utilisez les options ci-dessous pour ajouter / modifier les annonces sur votre site web.",
			"addclass_^" => "sous",

		"addclasscat" => "Gérer les catégories",
	
			"addclasscat_$" => "demi",
			"addclasscat_*" => "Gérer les catégories",
			"addclasscat_?" => "Utilisez les options ci-dessous pour gérer vos catégories annonce classée. Son recommandé d'ajouter une icône pour chaque photo pour faire de votre site web d'aspect plus professionnel.",
			"addclasscat_^" => "sous",

	"games" => "Jeux du Site Web",

		"games_$" => "demi",
		"games_*" => "Jeux du Site Web",
		"games_?" => "Voici la liste de tous les jeux installés sur votre site web. Consultez le manuel pour plus de détails sur l'installation de nouveaux jeux",

	"gamesinstall" => "Installer un jeu",

		"gamesinstall_$" => "demi",
		"gamesinstall_*" => "Installer un jeu",
		"gamesinstall_?" => "Sélectionnez les jeux ci-dessous que vous souhaitez installer. Si vous souhaitez ajouter de nouveaux jeux à votre site web simplement télécharger le goudron jeu des fichiers sur votre emplacement du dossier du jeu: inc/exe/Games/tar/. <b>Consultez le manuel pour plus de détails sur l'installation de nouveaux jeux</b>",
		"gamesinstall_^" => "sous",


);


$admin_layout_page9 = array(

	"" => "Administrateurs",

		"_$" => "demi",
		"_*" => "site Web Admin et Modérateurs",
		"_?" => "Voici la liste de tous les site web admins et les modérateurs ne pas y compris le super-utilisateur. Ajouter de nouveaux modérateurs en utilisant la page de recherche de membres et en cliquant sur l'icône Modérateur côté de leur nom.",

	"pref" => "Préférences Admin",

		"pref_$" => "demi",
		"pref_*" => "Admin Preferences",
		"pref_?" => "Utilisez les options ci-dessous pour personnaliser les préférences des administrateurs.",

	"manage" => "Gérer Modérateurs",

		"manage_$" => "demi",
		"manage_*" => "Gérer le site Web Gérer Modérateurs",
		"manage_?" => "Un site Web peut modérateurs ont deux rôles, ils peuvent être un modérateur du site web qui leur permet d'accéder à modérer le site Web principal uniquement, ou vous pouvez leur fournir leurs propres informations de connexion admin afin qu'ils puissent se connecter au site d'administration et l'utilisation de la outils d'administration.",
		"manage_^" => "sous",

	"email" => "Admin Emails",

		"email_$" => "demi",
		"email_*" => "Admin Emails",
		"email_?" => "Inscrit ci-dessous, sont tous les courriers électroniques qui ont été envoyé  à l'administration des membres de site Web.",

	"compose" => "Ecrire un email",

		"compose_$" => "demi",
		"compose_*" => "Ecrire un email",
		"compose_?" => "Utilisez les options ci-dessous pour créer un nouveau message à envoyer à un membre.",
		"compose_^" => "sous",

	"super" => "Connexion Super utilisateur",

		"super_$" => "demi",
		"super_*" => "Details Connexion Super utilisateur",
		"super_?" => "S'il vous plaît prendre soin lors de l'édition ci-dessous les détails du compte, il s'agit du compte super-utilisateur et vous devriez vous assurer que le mot de passe est gardé secret des autres en tout temps.",
		"super_^" => "sous",
);

$admin_layout_page10 = array(

	"" => "Mises à jour du logicielles",

		"_$" => "demi",
		"_*" => "Mises à jour du logicielles",
		"_?" => "Ci-dessous est la version actuelle du logiciel de votre cours d'exécution par rapport à la dernière version disponible. Si votre version est en date du, s'il vous plaît contactez votre fournisseur pour obtenir les dernières mises à jour.",

	"backup" => "Base de données de sauvegarde",

		"backup_$" => "demi",
		"backup_*" => "Base de données de sauvegarde",
		"backup_?" => "Sélectionnez un ou plusieurs des tableaux ci-dessous pour bakup votre base de données. Il est fortement recommandé d'utiliser la sauvegarde de base de données des caractéristiques zone d'accueil pour s'assurer que toutes les données sont reçues.",


	"license" => "Clés de licence du logiciel",

		"license_$" => "demi",
		"license_*" => "Clés de licence du logiciel",
		"license_?" => "Voici la liste de vos clés de licence du logiciel, s'il vous plaît prendre lors de l'édition de ces afin de s'assurer qu'elles sont correctes.",

	"sms" => "Crédits SMS",

		"sms_$" => "demi",
		"sms_*" => "Crédits SMS",
		"sms_?" => "Ci-dessous, le montant total actuel des crédits de SMS à gauche sur votre compte.",

);

$admin_layout_page11 = array(

	"" => "Logiciel Plugins",

		"_$" => "demi",
		"_*" => "Logiciel Plugins",
		"_?" => "Plugins étendre et d'élargir les fonctionnalitésdu logiciels de eMeeting dating . Une fois le plugin installé, vous pouvez l'activer ou le désactiver ici en utilisant les options de menu sur la gauche.",

);


$admin_layout_nav = array(

	"1" => "Tableau de bord",
		"1a" => "Statistique membres",
		"1b" => "Statistiques d'affiliation",
		"1c" => "Statistique des visiteurs",
		"1d" => "Emplacements des visiteurs",
	"2" => "Membres",
		"2a" => "Gérer les membres",
		"2b" => "Gérer Affiliés",
		"2c" => "Membres Interdit",
		"2d" => "Membres Fichiers",
		"2e" => "Importer membres",
	"3" => "Élaborer",
		"3a" => "Themes",
		"3b" => "Éditer Theme ",
		"3c" => "Gestionnaire d'images Thème",
		"3d" => "Éditer Logo",
		"3e" => "Meta Tags",	
		"3f" => "Langues",
		"3g" => "Page Texte",
		"3h" => "Gestionnaire de fichiers",
		"3i" => "Bar du Menu",
	"4" => "E-mail",
		"4a" => "Gérer les emails",
		"4b" => "Email Templates",
		"4c" => "Rapports par email",
		"4d" => "Envoyez E-mail Seul",
		"4e" => "Email rappels",	
		"4f" => "Télécharger e-mails",
		"4g" => "Envoyer Newsletters",		
	"5" => "Facturation",
		"5a" => "Gérer les Forfaits",
		"5b" => "Passerelles de paiement",
		"5c" => "Histoirie de facturation",
		"5d" => "Histoirie de facturation d'affiliation",
	"6" => "Paramètres",
		"6a" => "Options d'affichage",
		"6b" => "Paramètres d'affichage",
		"6c" => "Système de chemins",
		"6d" => "Photo Watermark",
	"7" => "Contenu",
		"7a" => "Champs de Recherche",
		"7b" => "Calendrier d'Événements",
		"7c" => "Sondage du site",
		"7d" => "Forum du Site ",
		"7e" => "Chat Rooms",	
		"7f" => "FAQ",
		"7g" => "Filtre de Mot",
		"7h" => "Articles / Nouvelles",
		"7i" => "Groupes",
	"8" => "Promotions",	
		"8a" => "Bannières",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Gérer Modérateurs",	
		"10a" => "Gérer Modérateurs",
		"10b" => "Super Utilisateur",
	"11" => "Maintenance",
		"11a" => "Sauvegarde du Système",
		"11b" => "Clés de la Licence",
		"11c" => "Mises à jour de Système",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Système Mis à jour Avec succès",
	"no_update" => "Système de mise à jour mais il n'y avait rien à supprimer!",
	"edit" => "Éditer",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Recherche",
	"1" => "Sélectionner tout",
	"2" => "Tout désélectionner",
	"3" => "Approuver",
	"4" => "Suspendre",
	"5" => "Effacer",	
	"6" => "Faire en vedette un Membre",
	"7" => "Options",	
	"8" => "Mettre à jour",	
	"9" => "Faire en vedette",
	"10" => "Retirer recommandés",	
	"11" => "Mise à jour du Language par défaut",
	"12" => "Envoyer",
	"13" => "Continuer",	
	"14" => "Make Active",
	"15" => "Désactiver",
	"16" => "Update Order",
	"17" => "Mise à jour Pages des champs",	
	"18" => "Permettre",
);

$admin_table_val = array(
	"1" => "Nom d'utilisateur",
	"2" => "Sexe",
	"3" => "Dernière connexion",
	"4" => "Statut",
	"5" => "Forfait",
	"6" => "Mise à jour",
	"7" => "Options",	
	"8" => "Date",
	"9" => "Adresse IP",
	"10" => "Hack String",	
	"11" => "Date d'inscription",	
	"12" => "Nom",
	"13" => "E_mail",
	"14" => "Clics",
	"15" => "Inscription de",
			
	"15" => "Commission rémunérés",
		
	"16" => "Message",
	"17" => "Heure",
	"18" => "Nom de fichier",
	"19" => "Dernière mise à jour",	
	"20" => "Éditer",
	"21" => "Par défaut",	
	"22" => "ID",

	"23" => "Prix",
	"24" => "Visible",	
	"25" => "Type",
	"26" => "Gestion de l'accès",	
	"27" => "Active",

	"28" => "Afficher le code",
	"29" => "Champs",	
	"30" => "Nom d'affiliation",
	"31" => "Total Due",	
	"32" => "Statut",
	
	"33" => "Date mise à niveau",
	"34" => "Date d'échéance",	
	"35" => "Mode de paiement",
	"36" => "Toujours actif",	
	"37" => "Mot de passe",
	"38" => "Derniers connectés",

	"39" => "Position",
	"40" => "Hits",	
	"41" => "Active",
	"42" => "Avant-première",	
	"43" => "Titre",
	"44" => "Articles",
	"45" => "Ordre",

);

$admin_search_val = array(
	"1" => "Pseudo membres",
	"2" => "Tous les Forfaits",
	"3" => "Tous les genres",
	"4" => "par page",
	"5" => "Trier par",
	"6" => "Adresse e-mail",
	
	"7" => "Tout statut",
	"8" => "Membres actifs",
	"9" => "Membres suspendus",
	"10" => "Les membres non approuvées",
	"11" => "Les membres qui désirent annuler",
	"12" => "Toutes les pages",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Gérer tous les groupes",
	"2" => "Group Name",
	"3" => "Language",		
	"4" => "Sujets Gérer",
	"5" => "Gérer les catégories",	
	"6" => "Nom de la catégorie du Groupe",		
	"7" => "Gérer les catégories",	
	"8" => "Nom",	
	"9" => "Compter",	
	"10" => "Ajouter l'article",	
	"11" => "Catégorie",
	"12" => "Titre de la page",	
	"13" => "Description courte",		
	"14" => "Ajouter l'article",
	"15" => "Gérer les catégories",
	"16" => "Listes des champs",
	"17" => "Ordre",
	"18" => "Language",
	"19" => "Liste des valeurs",
	"20" => "Nouveau champ",	
	
	"21" => "Titre du champ",		
	"22" => "Type de champ",
		"23" => "Texte du Champ",	
		"24" => "Zone de texte",	
		"25" => "Boîte de liste",
		"26" => "case à cocher",
		"27" => "case à cocher multiples",
	
	"28" => "Titre de groupe",
	"29" => "Inclure lors de l'inscription",
	"30" => "Sélectionnez ci-dessous",
	
	"31" => "Ajouter un groupe",
	"32" => "Options d'affichage du groupe",
		"34" => "Affichager tous les membres",
		"35" => "Afficher uniquement pour les admins",
		"36" => "Affichage en admin et membre (pas sur le profil)",
	"37" => "Seulement",	
	"38" => "Gérer les groupes",	
	"39" => "Ajouter un événement",	
	"40" => "Légendes sur le champ",
	"41" => "Légende",		
	"42" => "Description Texte",
	"43" => " Type de Légende",	
	"44" => "Recherche Légende",		
	"45" => "Profil Légende",	
	"46" => "Vous devez créer une légende pour la page de profil, comme 'Je suis un' et l'autre pour la page de recherche tels que 'Je cherche un'",	
	"47" => "Légendes existants sur le champ",	
	"48" => "Déplacer le champ à ce groupe",		
	"49" => "Membre ID",
	"50" => "Nom de l'événement",	
	"51" => "Description de l'événement",		
	"52" => "Type d'événement",
	"53" => "Choisir une catégorie",	
	"54" => "Sélectionnez le type",
	"55" => "Heure de l'événement",
	"56" => "Laissez vide pour toute la journée",
	"57" => "Date de l'événement",
	"58" => "Mois",	
	
	"59" => "Jour",	
	"60" => "Année",
	"61" => "Pays",		
	"62" => "Region",
	"63" => "Rue",	
	"64" => "Ville",		
	"65" => "TéléPhone",	
	"66" => "E-mail",	
	"67" => "Site Web",	
	"68" => "Visible à l'événement",		
		"69" => "Tout le monde",
		"70" => "Seuls les amis",	
		
	"71" => "Ajouter un sondage",		
	"72" => "Résultats du sondage",
	"73" => "Nom sondage ",	
	"74" => "Réponse",	
	"75" => "Faites l'Active",
	
	"76" => "Ajouter un sujet au Forum",
	"77" => "Gérer les messages",
	"78" => "thème du Forum",	
		
	"79" => "Titre",	
	"80" => "Description",
	"81" => "Messages du forum",		
	"82" => "Tous les messages",
	"83" => "Aujourd'hui",	
	"84" => "Cette Semaine",		
	"85" => "La semaine dernière",	
	"86" => "Nom de la salle",	
	"87" => "Légendes existantes du champ",	
	"88" => "Mot de passe de la salle",		
	"89" => "Ajouter un nouveau",
	"90" => "Ajouter F.A.Q",
	
	"91" => "Ajouter mot censuré",		
	"92" => "Mot",
	
	"93" => "Approuvé",
	"94" => "Légende",
	"95" => "Résulta Légende",
	"96" => "Language",

	"97" => "Avant-première",
	"98" => "Résultats",
);
$admin_advertising = array(

	"1" => "Bannières site Web",
	"2" => "Ajouter Bannerière",
	"3" => "Affiliation Bannières",	
	"4" => "Ajouter / modifier Bannières",
	"5" => "Type Bannière ",	
	"6" => "Site Web Bannière",			
	"7" => "Affiliation Bannière",	
	"8" => "Nom",	
	"9" => "Envoyer Bannière",	
	"10" => "Entrer HTML",	
	"11" => "Code HTML ",
	"12" => "Envoyer Bannière",	
	"13" => "Lien Bannière",		
	"14" => "Affichage à ",
		"15" => "Tous les membres",
		"16" => "Seuls les membres connectés",
	
	"17" => "Page",
	"18" => "Active",
	
	"19" => "Top Position",
	"20" => "Position millieu",	
	"21" => "Position gauche",		
	"22" => "Position inférieure",
	"23" => "Laissez vide pour utiliser le lien au sein du code de la bannière",
	"24" => "Aperçu Bannière",
	
);


$admin_maintenance = array(

	"1" => "Actuellement en cours d'exécution",
	"2" => "Dernière version",
	"3" => "Credits SMS ",	
	"4" => "Autres crédits SMS",	
	"5" => "Achat de crédits",	

);

$admin_admin = array(

	"1" => "Ajouter Admin",
	"2" => "Nom d'utilisateur",
	"3" => "Mot de passe",	
	"4" => "E-mail",
	
	"5" => "Paramètres Edition Admin",	
	"6" => "Nom complet",			
	"7" => "Niveau d'accès",	
		"8" => "Accès au système complet",	
		"9" => "Accès membres seulement",	
		"10" => "Accès Design seulement",	
		"11" => "Accès uniquement par courriel",
		"12" => "Seuls les accès à la facturation",	
		"13" => "Seuls les paramètres d'accès",		
		"14" => "Access Management seulement",
	"15" => "Admin Icon",

	"17" => "Alertes e-mail",
	"18" => "Alerte Nouvelles Admin",
	"19" => "Transférez tous les membres de ",
	"20" => "Pour le Forfait suivant",	
	"21" => "Modifier le Forfait",		
	"22" => "Forfait Accès",
	"23" => "Ajouter un élément du Forfait",	
	"24" => "Accès  Gérer Forfait",
);

$admin_settings = array(

	"1" => "Afficher les pages",
	"2" => "Activé",
	"3" => "Désactiver",	
	"4" => "Chemins du Web",
	"5" => "Chemins du Serveur",	
	"6" => "Chemins du Thumbnail",			
	"7" => "Ajouter un champ",	
	"8" => "Nom",	
	"9" => "Valeur",	
	"10" => "Type",	
	"11" => "Gérer les champs",
	"12" => "Ajouter des passerelles",	
	"13" => "Système de paiement",		
	"14" => "Code Passerelle de paiement",
	"15" => "Titre",
	"16" => "Accès forfait",
	"17" => "Commentaires",
	"18" => "Transfert membres",
	"19" => "Transférez tous les membres de ",
	"20" => "Pour le forfait suivant",	
	"21" => "Modifier le forfait",		
	"22" => "Accéder au Forfait",
	"23" => "Ajouter un élément du forfait",	
	"24" => "Gérer Accès au forfait",
);

$admin_billing = array(

	"1" => "Ajouter Forfait ",
	"2" => "Gérer Accès au forfait",
	"3" => "Transfert Les membres d'un forfait",			
	"4" => "Votre site web est actuellement en cours dans <b> MODE GRATUIT</b> formules d'abonnement ont donc été désactivé.",
	"5" => "Souhaitez-vous désactiver le mode libre et formules d'abonnement d'affichage?",	
	"6" => "Désactiver le MODE gratuit",		
	"7" => "Ajouter un champ",	
	"8" => "Nom",	
	"9" => "Valeur",	
	"10" => "Type",	
	"11" => "Gérer les champs",
	"12" => "Ajouter des passerelles",	
	"13" => "Système de paiement",		
	"14" => "Code Passerelle de paiement",
	"15" => "Titre",
	"16" => "Accès Forfait",
	"17" => "Commentaires",
	"18" => "Transfert membres",
	"19" => "Transférez tous les membres de",
	"20" => "Pour le forfait suivant",	
	"21" => "Modifier le forfait",		
	"22" => "forfait d'accès",
	"23" => "Ajouter un élément du forfait",	
	"24" => "Gérer Accès Forfait ",
	
	"25" => "En attente d'approbation",
	"26" => "Paiements approuvés",
	"27" => "Paiements rejetés",
	
	"28" => "Tous Historique",
	"29" => "Paiements Active",
	"30" => "Paiements Terminé",
	"31" => "Abonnements actifs",
	"32" => "Abonnements Terminé",
	"33" => "Code d'accès du forfait",
	
);

$admin_email = array(

	"1" => "Système Emails",
	"2" => "Newsletters",
	"3" => "Email Templates",		
	"4" => "Email Editor",
	"5" => "Sujet",	
	"6" => "Aperçu Email",	
	"7" => "A Email",
	
	"8" => "Envoyer à",	
		"9" => "Tous les membres",	
		"10" => "Abonnés au forfait d'adhésion",	
		"11" => "Actif / Suspension / Membres non approuvées",
	"12" => "Pour le forfait",	
	"13" => "Statut de membre",		
	"14" => "Sélectionnez Newsletter",	
	
	"15" => "Créer un nouveau",
	"16" => "Vue personnalisée Créé",
	"17" => "Code de suivi par E-mail",
	"18" => "Créer un nouveau",
	"19" => "Créé Vue personnalisée",
	"20" => "Code de suivi par courriel",
		"21" => "Code HTML ci-dessous",
		
	"22" => "Résultats Courrier suivi",
	"23" => "Il n'y avait aucun rapport trouvé.",
	"24" => "Choisissez le rapport",
	
	"25" => "Envoyez les rappels à tous les membres qui ont entre ",
	"26" => " et ",
	"27" => "jours",
	"28" => "Jours restants de leur abonnement de mise à niveau",
	"29" => "choisir E-mail d'envoyer:",
	"30" => "Télécharger",
	"31" => "Sélectionnez le forfait",
	"32" => "Code de suivi",
	
	
);

$admin_design = array(

	"1" => "Télécharger des thèmes",
	"2" => "Modèle actuel",
	"3" => "Utiliser ce modèle",	
	"4" => "Meta Tags de la page",
	"5" => "Titre de la page",	
	"6" => "Description",
	"7" => "Keywords",
	"8" => "Pages du site Web",	
	"9" => "contenu de la Pages  ",	
	"10" => "Pages personnalisées",	
	"11" => "Créer une page",
	"12" => "Chemin FTP ",	
	"13" => "Thème Fichiers",		
	"14" => "Pages de contenu",	
	"15" => "Pages personnalisées",


	"16" => "Ajouter une langue",
	"17" => "Nouveau nom de fichier",	
	"18" => "Sélectionnez le fichier à copier",
			
	"19" => "Fichier de Langue Modifier",	
	"20" => "Pages personnalisées",

	"21" => "Police",
	"22" => "Taille de la police",	
	"23" => "Couleur de polices",
	"24" => "largeur",	
	"25" => "hauteur",		
	"26" => "Ajouter du texte au Logo",
	"27" => "Type toile",	
		"28" => "Utilisation Toile Vide",
		"29" => "Gardez la conception actuelle",	
		"30" => "Télécharger mon propre fond d'écran / logo",	

	"31" => "Créer une nouvelle page",
	"32" => "Nom de la nouvelle page",	
		"33" => "Les noms de page doivent être très court et un seul mot. EG. Liens, Articles, Nouvelles, Forum etc",
	"34" => "Ajouter Menu onglet?",	
		"35" => "Non! Ne pas créer un onglet",		
		"36" => "Oui. Ajoutez-le à l'espace membres",
		"37" => "Oui. Ajoutez-le à la page principale du site Web, et non pas dans la zone pages des membres.",
			"38" => "If selected a new member tab will be generated on your web site",
);

$admin_overview = array(

	"1" => "Annonce",
	"2" => "Total Membres",
	"3" => "Cette Semaine",
	"3a" => "Aujourd'hui",
	"4" => "Dernières activités sur le site Web",
	"5" => "Rapports du site Web",
	
	"6" => "Visiteurs uniques site Web au cours des deux dernières semaines",
	"7" => "Nouveau membre inscrit au cours des 2 dernières semaines",
	"8" => "Statistiques par sexe membres",	
	"9" => "Statistiques par Âge membres",
	
	"10" => "Nouveau partenaire inscrits dans les 2 dernières semaines",
	"11" => "Paramètres de la carte des visiteurs",
	"12" => "S'il vous plaît entrer votre clé API Google dans le champ ci-dessus.",	
	"13" => "Vous pouvez acheter une clé de licence de l'espace client de notre site web",	
	
	"14" => "Résultats de la recherche de filtre",	
	"15" => "Tous les fichiers",
	
);
$admin_members = array(

	"1" => "Tous les membres",
	"2" => "Modérateurs",
	"3" => "Actif",
	"4" => "Suspendu",
	"5" => "Non approuvées",
	"6" => "Souhaitez annuler",
	"7" => "Actuellement en ligne",
	"8" => "Activité de connexion de membre",	
	"9" => "Modifier les Détails des membres ",	
	"10" => "Ajouter Affiliation",
	"11" => "Affiliation Bannières",
	"12" => "Pages d'affiliation",	
	"13" => "Ajouter Affiliation",	
	"14" => "Affiliation Paramètres",	
	"15" => "Tous les fichiers",
	"16" => "Photos",
	"17" => "Videos",
	"18" => "Musique",
	"19" => "YouTube",
	"20" => "Non approuvées",
	"21" => "En vedette",
	"22" => "Envoyer un fichier",	
	"23" => "Dossier",
	"24" => "Type",
	"25" => "Nom d'utilisateur",
	"26" => "Titre",
	"27" => "Commentaires",
	"28" => "Utiliser par défaut",		
	"29" => "Activité de connexion du membre",	
	"30" => "Affiliation engagé par",
	"31" => "En vedette",
	"a5" => "Nom d'utilisateur",
	"a6" => "Mot de passe",
	"a7" => "Prénom",
	"a8" => "Nom de famille",
	"a9" => "Nom de la société",
	"a10" => "Adresse",
	"a11" => "Rue",
	"a12" => "Ville",
	"a13" => "Pays",
	"a14" => "Code postal ",
	"a15" => "Région",
	"a16" => "Telephone",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Adresse du site Web",
	"a20" => "Rendez le contrôle payable à",
);


// HELP FILES
$admin_help = array(

	"a" => "Commencez dès maintenant",
	"b" => "Non, ca va bien. Merci!",
	"c" => "Continuer",	
	"d" => "Fermer la fenêtre",
	
	
	"1" => "Introduction",
	"2" => "Avez-vous besoin d'aide pour démarrer?",
	"3" => "Bonjour",	
	
	"4" => "et bienvenue à la zone d'administration! Comme c'est la première fois que vous avez ouvert une session dans la zone d'administration, il est recommandé que vous preniez quelques minutes pour suivre l'assistant ci-dessous pour vous aider à démarrer!",
	"5" => "Notre Assistant Mise en route vous guidera à travers les étapes de configuration de base et vous vous levez et en un rien de temps.",	
	"6" => "<strong>(Note)</strong> Vous pouvez revenir sur cette page tout moment en cliquant sur le 'guide d'aide rapide' sur les barres de menu de gauche.",
	
	"7" => "Mise en route",
	"8" => "Bienvenue dans votre espace d'administration!",	
	"9" => "Bienvenue dans votre espace compte d'administrateur pour ",	
	"10" => "Ce logiciel vous permet de gérer tous les différents aspects de votre site web, y compris les membres de votre, fichiers, sécurité, e-mail, plugins, et un ensemble beaucoup plus.",	
	"11" => "Cet assistant de mise en route vous fera découvrir quelques-uns des concepts sous-jacents de gestion du site Web et vous permettent de configurer certains paramètres de base pour votre site web afin que vous puissiez commencer à apporter du trafic (visiteurs) sur votre site.
ÉcouterLire phonétiquement",
	"12" => "<strong>(Se souvenir)</strong> A tout moment, vous pouvez fermer cette fenêtre en utilisant le bouton Fermer et revenir plus tard en cliquant sur le «guide d'aide rapide» dans la barre de menu de gauche.",
		
	"13" => "Introduction à votre espace d'administration!",		
	"14" => "Le secteur de l'administration des logiciels est «basée sur le Web», qui signifie que vous pouvez accéder et gérer votre site Web, n'importe où dans le monde avec une connexion Internet. Il suffit de pointer votre navigateur à l'adresse:",	
	"15" => "et vous connecter avec vos informations de connexion admin.",
	"16" => "Cliquez ici pour mettre en signet ce lien maintenant.",
	
	"17" => "Introduction au tableau de bord.",	
	"18" => "Le tableau de bord logiciel vous donne un aperçu très rapide des performances de votre site web, vous pouvez lire l'annonce de logiciels, de l'histoire inscrits avis de ce membre, consultez membres et tableaux statistiques affiliés et plus.",			
	"19" => "Toutes les informations sur les membres sont stockées dans la base de données MySQL appelée:",	
	"20" => "Introduction aux statistiques du site web.",
	"21" => "Les statistiques logiciel vous donne une représentation visuelle de vos membres et de l'histoire affilié inscrits sur une période de deux semaines. Chaque fois qu'un membre ou affilié rejoint votre site Web de la date et l'heure sont enregistrées et reportées sur les graphiques.",
	
	"22" => "Introduction aux endroits visiteur",		
	"23" => "Introduction à la gestion de vos membres",	
	"24" => "Introduction à la gestion de vos affiliés",	
	"25" => "Introduction à la gestion de vos membres banni",		
	"26" => "Introduction à la gestion de vos fichiers membre",
	"27" => "Introduction aux Membres importateurs",	
	"28" => "Introduction web site thèmes",
	"29" => "Introduction à l'éditeur Thème",	
	"30" => "Introduction à Gestionnaire d'images du Thème",
	"31" => "Introduction au Logo de l'éditeur",
	"32" => "Introduction à Meta Tags",	
	"33" => "Introduction aux Languages",
	"34" => "Introduction à la Gestion des Emails",	
	"35" => "Introduction aux modèles d'email",		
	"36" => "Introduction aux Rapports Courrier",
	"37" => "Introduction à Envoyer Newsletters",
	"38" => "Introduction aux rappels par courriel",
	"39" => "Introduction pour le téléchargement des adresses e-mail",
	"40" => "Introduction aux forfaits d'adhésion",
	"41" => "Introduction à Passerelles de paiement",
	"42" => "Introduction à l'histoirie de Facturation",
	"43" => "Introduction à l'histoirie de facturation d'affiliation",
	"44" => "Introduction pour afficher les options",
	"45" => "Introduction aux paramètres d'affichage",
	"46" => "Introduction au Chemins système",
	"47" => "Introduction à Filigrane",
	"48" => "Introduction à recherche Champs",
	"50" => "Introduction au calendrier d'événements",
	"51" => "Introduction au Sondage du site",
	"52" => "Introduction au Forum",
	"53" => "Introduction à la Chat-Rooms",
	"54" => "Introduction au FAQ",
	"55" => "Introduction  au Filtre des mots",
	"56" => "Introduction aux Nouvelles / Articles",
	"57" => "Introduction aux groupes",

		"22a" => "Les emplacements visiteur carte des parcelles dans les localités de chacun des membres de votre site web vous permettant de voir en un coup d'oeil quels pays sont les membres de votre arrivée en provenance du.",		
		"23a" => "L'outil de gestion de membres vous permet de voir tous les membres qui ont rejoint votre site web. Utilisez les options de recherche pour filtrer vos membres à modifier, mettre à jour et supprimer des profils des membres.
ÉcouterLire phonétiquement",	
		"24a" => "L'outil de gestion d'affiliation vous permet de visualiser un coup d'œil tous vos affiliés site web, vous pouvez afficher, modifier et supprimer des filiales à partir de votre site web et d'approuver nouveau inscrits affilié .",	
		"25a" => "Les magasins interdit membres de la section tous les dossiers des membres et non membres qui tentent de 'pirate' à votre site Web, le logiciel va automatiquement interdire aux membres présumés d'afficher sur votre site web pour éviter que votre site web sois victime de tout dommage.
",		
		"26a" => "l'outil fichiers membre vous permet de visualiser l'ensemble de vos ajouts site Web des membres, musique, vidéo photos etc peuvent être gérés ici. Cliquez sur l'une des photos pour modifier la photo à l'aide de notre outil de recadrage intégré dans.",
		"27a" => "L'outil d'importation membre vous permet d'importer des membres d'une autres applications. Vous entrez simplement les informations de base de données pour que le site web où votre ancien système sont stockées et il le transférer sur votre nouveau site web.",	
		"28a" => "La section thèmes du site vous permet de changer le modèle de site Web et la conception de votre site instantanément! Cliquez simplement sur le thème que vous souhaitez utiliser et votre site sera automatiquement mis à jour.",
		"29a" => "L'éditeur de thèmes outils vous permettent de modifier le site Web de pages directement à partir de la zone d'administration. Vous pouvez également copier et coller le code dans votre éditeur propre du site web et puis la coller de nouveau une fois que vous avez fini d'éditer.",	
		"30a" => "Le thème Image Manager outil vous permet de changer les images en cours sur votre site web en téléchargeant de nouveaux. Nouvelles images remplaceront l'image actuelle et d'être immédiatement appliquée à votre site web.",
		"31a" => "L'éditeur Logo outil vous permet de modifier la conception de votre logo actuel. Vous pouvez également créer votre propre logo en utilisant votre propre forfait d'édition d'image et ensuite sélectionner le 'mettre en ligne mon propre logo' pour ajouter ceci à votre site web.",
		"32a" => "La fonction de Meta Tags vous permet de modifier toutes les meta tags pour les pages de site web généré par le logiciel. Vous pouvez ajouter votre propre titre, mots-clés et des descriptions de chacune des pages de votre site web. ",	
		"33a" => "L'outil de gestion Langue vous permet de supprimer toutes les langues de votre site web que vous ne souhaitez pas utiliser et aussi ajouter votre pack de langue propres.",
		"34a" => "Les outils de gestion des courriels vous permet de créer votre propre système et les courriels newsletter pour donner à votre site web une touche personnelle unique.",	
		"35a" => "Introduction aux modèles d'email",		
		"36a" => "Introduction à Courrier Rapports",
		"37a" => "Introduction à Envoyer Newsletters",
		"38a" => "Introduction aux rappels par e-mail",
		"39a" => "Introduction pour le téléchargement des adresses e-mail",
		"40a" => "Introduction aux forfaits d'adhésion",
		"41a" => "Introduction Passerelles à paiement",
		"42a" => "Introduction à l'histoirie Facturation",
		"43a" => "Introduction à l'histoirie de facturation d'affiliation",
		"44a" => "Introduction pour afficher les options",
		"45a" => "Introduction aux paramètres d'affichage",
		"46a" => "Introduction Chemins au système",
		"47a" => "Introduction à la Filigrane",
		"48a" => "Introduction à champs de recherche",
		"50a" => "Introduction à Calendrier des événements",
		"51a" => "Introduction au site Sondage",
		"52a" => "Introduction au Forum",
		"53a" => "Introduction à Chat-Rooms",
		"54a" => "Introduction à FAQ",
		"55a" => "Introduction à Filtrer les mots",
		"56a" => "Introduction aux Nouvelles / Articles",
		"57a" => "Introduction aux groupes",
);

$admin_login = array(

	"1" => "connexion de Secteur d'Administration",
	"2" => "Mot de passe oublié? Pas de soucis, entrez votre adresse e-mail ci-dessous et nous vous ferons parvenir un nouveau.",
	"3" => "Adresse e-mail",
	"4" => "Texte ci-dessous",
	"5" => "Réinitialiser mot de passe",
	"6" => "Entrez vos informations ci-dessous pour vous connecter.",
	"7" => "Utilisateur",
	"8" => "Mot de passe",	
	"9" => "License",	
	"10" => "Language",
	"11" => "Identifiant",
	"12" => "IP Connecté est",	
	"13" => "Mot de passe oublié",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Le profil en surbrillance ",
	"2" => "Modérateur site Web ",
	"3" => "Forfait d'Adhésion",
	"4" => "Envoyez Courrier électronique de Mise à jour",
	"5" => "Ajouter le Forfait changement de système de facturation ",
	"6" => "Nombre SMS",
	"7" => "Crédits SMS",
	"8" => "Statut du compte Régler",	
	
	"9" => "Cliquez sur la case pour modifier le mot de passe.",	
	"10" => "Les membres Mis en évidence ont un contexte différent dans les résultats de recherche.",
	"11" => "Cela donne à l'accès des membres pour gérer votre site web en tant que modérateur.",
	
	"12" => "affiliés page d'accueil",	
	"13" => "Code d'affichage Bannière",	
	"14" => "Page de Paiement d'affiliation",	
	"15" => "Page Sommaire Affiliation",
	"16" => "Affiliation Modifier la page de compte",
	
	"17" => "Membres d'importation à partir de ",	
	
	"18" => "Age",			
	"19" => "Vues fichier",	
	"20" => "Privé",
	"21" => "Publique",
	
	"22" => "album",		
	"23" => "Contenu pour adultes",	
	"24" => "Contenu public",	
	
	"25" => "Taille",		
	"26" => "Déplacer des fichiers vers Albums pour adultes",
	"27" => "Fichiers Adultes ",

);

$admin_selection = array(

	"1" => "Oui",
	"2" => "Non",
	
	"3" => "On",
	"4" => "Off",
);

$admin_plugins = array(

	"1" => "Plugins étendre et d'élargir les fonctionnalités de eMeeting dating du logiciels. Une fois le plugin installé, vous pouvez l'activer ou le désactiver ici en utilisant les options de menu sur la gauche.",
	"2" => "Vous pouvez consulter et télécharger les plugins de nouveaux logiciels à partir de l'espace client de notre site Web.",
	"3" => "Nom du Plugin",
	"4" => "Details du Plugin ",
	"5" => "Dernière mise à jour",
	"6" => "Statut",

);
$admin_pop_welcome = array(

	"1" => "Bienvenue ",
	"2" => "est ci-dessous un bref apercu de l'inscription des membres et des performances du sites Web d'aujourd'hui.",
	"3" => "Nouveaux membres Aujourd'hui",
	"4" => "Dossiers a approuver",
	"5" => "<strong>NE PAS Oublier</strong> Si vous ne souhaitez pas recevoir ces alertes de bienvenue lorsque vous vous connectez a la zone d'administration vous pouvez les desactiver a tout moment changer vos preferences dans admin.",
	"6" => "Fermer la fenetre",

);
$admin_pop_chmod = array(

	"1" => "Les autorisations de fichiers d'erreur",
	"2" => "Les fichiers sur cette page ne peut pas être modifié",
	"3" => "les fichiers / répertoires suivants doivent avoir 'écrire' pour définir des autorisations avant de pouvoir les modifier. Si vous travaillez sur un système Linux ou Unix hébergeur, vous pouvez utiliser votre programme FTP et d'utiliser le 'CHMOD' ('Change Mode') la fonction d'accorder des autorisations d'écriture. Si votre hôte est sous Windows, vous aurez besoin de les contacter au sujet de la mise en place des autorisations d'écriture sur ces fichiers / dossiers.",
	"4" => "Les fichiers / répertoires qui nécessitent CHMOD 777 sont",
	"5" => "Fermer la fenêtre",

);
$admin_pop_demo = array(

	"1" => "Mode Démo Activé",
	"2" => "Modifications apportées à votre système ne seront pas enregistrées en mode démo",
	"3" => "Vos paramètres d'accès au système ont été mis en mode «démo» qui signifie l'accès à un grand nombre de caractéristiques et fonctionnalités au sein de la zone d'administration sera limité à 'en lecture seule'.",
	"4" => "Vous pouvez naviguer autour de la zone admin comme normal cependant toute modification que vous effectuez ne seront pas enregistrées durant cette période.",
	"5" => "<strong>Se souvenir</strong> Si vous souhaitez supprimer la restriction relative au mode démo sur votre compte s'il vous plaît contactez votre administrateur système pour plus de détails.",
	"6" => "Fermer la fenêtre",
);

$admin_pop_import = array(

	"1" => "Transfert des résultats de base de données",
	"2" => "membres ont été importées avec succès!",
	"3" => "membres ont été importées avec succès à partir",
	"4" => "logiciel. S'il vous plaît suivez les instructions ci-dessous pour vous assurer que vos images des membres mis à jour correctement.
",
	"5" => "The eMeeting image folder paths are below, you must copy the images from old web site to the new paths below;",
	"6" => "Fermer la fenêtre",
);

$admin_loading= array(

	"1" => "Optimisation des tables de base de données",
	"2" => "Attendez s'il vous plaît",

);
$admin_menu_help= array(
"1" => "Guide Aide rapide",
);

$admin_settings_extra = array(

	"1" => "Afficher Page de recherche",
	"2" => "Afficher Page Contact ",
	"3" => "Afficher Tour de la page",
	"4" => "Afficher Page FAQ",
	"5" => "Afficher Événements",
	"6" => "Afficher Groupes",
	"7" => "Afficher Forum",
	"8" => "Afficher Allumettes",	
	"9" => "Afficher Réseau",	
	"10" => "Afficher Système d'affiliation",
	"11" => "Afficher Par SMS / Système d'alerte",
	
	"12" => "Afficher Blogs",	
	"13" => "Afficher Chat Rooms",	
	"14" => "Afficher Instant Messenger",	
	"15" => "Afficher Image de vérification d'enregistrement",
	"16" => "Afficher Recherche du Code postal Royaume-Uni",
	"17" => "Afficher US Zip Codes Recherche",
	"18" => "Afficher MSN/Yahoo Integration",
	
	"19" => "Forfait d'adhésion par défaut",
		"20" => "Il s'agit du forfait d'adhésion par défaut des membres qui se sont inscrits",
	"21" => "Les membres doivent envoyer une image à joindre",
		"22" => "Définir ce qui détermine si les membres sont autorisés à sauter l'option de télécharger une image pendant l'enregistrement.",	
	"23" => "MODE LIBRE",
		"24" => "Activez cette option 'Oui' Si vous souhaitez toutes les fonctionnalités de votre site web pour être accessible par tous.",
	"25" => "MODE MAINTENANCE",
		"26" => "Ceci empêchera tout accès à votre site Web pour les membres et les non-membres et de permettre que l'admin qui se sont connectés au site d'administration pour naviguer sur le site Web.",
		
	"27" => "Nombre de résultats de recherche par page",
		"28" => "Sélectionnez le nombre de profils par page que vous souhaitez être affiché",		
	"29" => "Nombre de résultat sur la page Aperçu",	
		"30" => "Sélectionnez le nombre de profils par page que vous souhaitez afficher.",
		
	"31" => "Email Codes Activation",
		"32" => "Les membres recevront un e-mails avec le code d'activation et doivent le validés avant leur connexion.",
	"33" => "Approuver manuellement les membres",
	"34" => "Activez cette option «oui» ou «non» en fonction de si vous souhaitez vérifier manuellement les comptes des membres avant de pouvoir vous connecter.",
	"35" => "Approuver manuellement les fichiers",
		"36" => "Activez cette option «oui» ou «non» en fonction de si vous souhaitez vérifier manuellement les fichiers avant l'affichage",
	"37" => "Approuver manuellement les enregistrements vidéo",
		"38" => "Activez cette option «oui» ou «non» selon si vous voulez vérifier manuellement émissions membres (vidéo chat RSS).",
		
	"39" => "Display Video Greeting Recorder",
	"40" => "Cela a permis aux membres d'enregistrer leur message vidéo propre à leur profil. Vous devez entrer votre vidéo flash connexion RMS chaîne ci-dessous.",
	"41" => "Flash RMS chaîne de connexion",
		"42" => "You need a flash hosting account to use this",
	"43" => "Display Date Format",
		"44" => "Sélectionnez le format de date que vous souhaitez afficher sur votre site web",
	"45" => "Autoriser le profil / déposer des observations",
		"46" => "Activez cette option si vous souhaitez que les membres pouvent poster des commentaires sur les profils et les fichiers.",
	"47" => "Affichage du Chat et messagerie instantanée dans une fenêtre séparée",
	
	"48" => "Permettez cette option si vous souhaitez que la salle de messagerie instantanée et IM  s'ouvre dans une nouvelle fenêtre.",
	
	"49" => "Moteur de recherche convivial?",
		"50" => "Activez cette option si vous êtes sur Linux ou Unix compte d'hébergement et utilisez la valeur par défaut dossier .htaccess ",
	"51" => "Rechercher des photos Nuls",
		"52" => "Voulez-vous les membres qui n'ont pas ajouté une photo à afficher dans les résultats de recherche?.",
	"53" => "Affichage L'Images Drapeau ",
		"54" => "Activez cette option «oui» ou «non» si vous souhaitez avoir les drapeaux langue affichée sur votre site web.",
	"55" => "Devise Affiliation ",	
	"56" => "Utiliser l'éditeur HTML",	
	"57" => "Activez cette option «oui» ou «non» en fonction de si vous souhaitez vérifier manuellement les fichiers avant l'affichage",

	"58" => "Afficher les articles de la page",

);

$admin_billing_extra = array(

	"1" => "Activez cette option 'Oui' Si vous souhaitez toutes les fonctionnalités de votre site web pour être accessible par tous.",
	
	"2" => "Type du forfait",
	"3" => "Forfait d'Adhésion",
	"4" => "SMS Adhésion",
	"5" => "Sélectionnez Oui si vous souhaitez créer un forfait SMS que ce forfait permettant d'être utilisé pour acheter d'autres crédits SMS sur votre site web.",
	"6" => "Nom du forfait",
		"7" => "Entrez un nom pour ce forfait, qui sera affiché sur votre page d'abonnement.",
	"8" => "Description",	
	"9" => "Prix",	
	"10" => "Combien voulez-vous gratuitement pour les membres de souscrire à ce forfait? Note. Ne pas entrer dans les symboles monétaires",
	"11" => "Display Currency Code",
	
	"12" => "C'est le code de devise qui sera affiché sur votre site web,   Elle n'est pas utilisée pour votre devise de paiement, ce doit être définie dans les paramètres de votre paiement.",	
	"13" => "Abonnement",	
	"14" => "Sélectionnez Oui si vous voulez que cela soit un paiement périodique.",	
	"15" => "Période Mise à jour ",
	
	"16" => "Jour",
	"17" => "Semaine",
	"18" => "Mois",
		"18a" => "Illimité",
	"19" => "Max Messages (quotidien)",
		"20" => "C'est le nombre maximal le membre peut envoyer des messages par jour.",
	"21" => "Max Clins d'œil",
		"22" => "Le nombre maximum de Clins d'œil avec un membre de ce Forfait peut envoyer chaque jour.",	
	"23" => "Téléchargements maximum de dossier",
		"24" => "Le nombre maximum de fichiers qu'un membre peut télécharger.",
	"25" => "Forfait lien icône",
		"26" => "Le lien icône du logiciel doit être un lien vers une image sur votre site web. Taille recommandée: 28px x 90px.",
		
	"27" => "Membre Représenté",
		"28" => "Choisissez oui si vous voudriez que la photo d'affichage(de présentation) de membres aussi soit affichée sur le front de votre site Web.",		
	"29" => "Mis en évidence",	
		"30" => "Sélectionnez Oui si vous voulez les membres de ce Forfait pour avoir un fond mis en évidence dans les résultats de recherche.",
		
	"31" => "Voir Images pour adultes ",
		"32" => "Sélectionnez Oui si vous voulez les membres de ce Forfait peut visualiser les images des membres adultes.",
	"33" => "SMS credits",
	"34" => "C'est le nombre de crédits SMS ajouté aux membres compte quand ils sont mis à jour à ce forfait. Ce point sera ajouté à leur montant actuel, si ils ont déjà des crédits.",
	"35" => "Visible sur le Forfait de mise à niveau"

);

$admin_mainten_extra = array(

	"1" => "Lien",
	"2" => "Seuls entrer un lien si vous souhaitez faire un lien vers un site Web externe",
	"3" => "Flux RSS Nouvelles données",
	
	"4" => "Catégorie",
	"5" => "Vues",
	"6" => "Légende",
	"7" => "Language",
	"8" => "Groupe Privé",
		
	"9" => "Tableau du Forum de Changement",	
	"10" => "Select Forum Board",
	"11" => "Default Forum",
	
	"12" => "Vous utilisez actuellement un forum tiers. S'il vous plaît connecter à leur zone d'administration pour gérer votre forum.",	
	"13" => "Mot de passe"
);

$admin_set_extra1 = array(

	"1" => "Permettez-Photo / Image Télécharge",
	"2" => "Permettre le chargement vidéo",
	"3" => "Permettre le chargement de musique",	
	"4" => "Permettre le chargement YouTube",	
);

$admin_alerts = array(

	"1" => "Alertes",
	"2" => "de nouveaux visiteurs",
	"3" => "nouveaux membres",	
	"4" => "membres non approuvés",	
	"5" => "fichiers non autorisés",
	"6" => "nouvelles mises à jour",	
);

$lang_members_nn = array(

	"0" => "Surveiller les abus membres",
	"1" => "Nom d'utilisateur ou ID",
	"2" => "Aucune Histoire de Chat Trouvée",	
);

$members_opts = array(

	"1" => "Modifier le profil",
	"2" => "Chargement de fichiers",
	"3" => "Historique de facturation",	
	"4" => "Envoyer Email",	
	"5" => "Envoyer un message",
	"6" => "Messages du forum",
	"7" => "Message Abuse",	
);
?>