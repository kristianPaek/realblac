<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Spanish",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "UTF-8",
	"title" => "Administration Area"
		
);

$admin_layout = array(

	"3" => "Mis preferencias",
	"4" => "Logout",

);


$admin_layout_page1 = array(

	"" => "Panel",

		"_*" => "Panel area de administracion",
		"_?" => "",

	"members" => "Estadísticas miembros",
		
		"members_*" => "Estadísticas miembros",
		"members_?" => "El siguiente gráfico muestra el número de registro del nuevo miembro durante las últimas dos semanas.",
		"members_^" => "sub",

	"affiliate" => "Estadisticas afiliad.",
 
		"affiliate_*" => "Estadisticas afiliad.",
		"affiliate_?" => "El siguiente gráfico muestra el número de registro de afiliados nuevos a lo largo de las últimas dos semanas.",
		"affiliate_^" => "sub",

	"visitor" => "Estadísticas de Visitas",
 
		"visitor_*" => "Estadísticas de Visita",
		"visitor_?" => "El siguiente gráfico muestra  las estadísticas de visitantes del sitio web registrados en cada día durante las últimas dos semanas.",
		"visitor_^" => "sub",

	"maps" => "Google Maps",
 
		"maps_*" => "Visitantes Locales con Google Maps",
		"maps_?" => "Esta sección le permite ver en qué lugar del mundo se están uniendo a sus miembros de su sitio web . Esto le permite desarrollar su campaña de marketing y la publicidad más efectiva de focalización y seguimiento de diferentes países.",
 

	"adminmsg" => "Anuncio del sitio Web",
 
		"adminmsg_*" => "Anuncio del sitio Web",
		"adminmsg_?" => "Introduce tu mensaje en el cuadro de abajo y cada vez que un miembro de los registros entre su cuenta el mensaje será mostrado a ellos. Esto es excelente para mostrar anuncios de servicio o de cambios en el sitio web.",

);
 

$admin_layout_page2 = array(

	"" => "Miembros",

		"_$" => "half",
		"_*" => "Administrar miembros",
 

			"edit" => "Editar detall. miembros",
	
				"edit_*" => "Editar miembros",
				"edit_?" => "Utilice las opciones a continuación para actualizar una cuenta de los miembros y los detalles del perfil.",
				"edit_^" => "ninguno",


			"fake" => "Miembros falsos",
	 
				"fake_*" => "Generar falso miembro",
				"fake_?" => "Utilice las opciones a continuación para generar falsos  miembros de su sitio web, esto ayudará a su sitio web se vea 'ocupado' mientras logra de empezar. Su recomienda utilizar la misma dirección de email para todos los miembros falsos por si desea localizar y eliminar en una fecha posterior.",
				"fake_^" => "sub",

	"banned" => "Miembros prohibido",
 
		"banned_*" => "Miembros prohibido",
		"banned_?" => "El programa tiene incorporado un sistema de detección de piratas informáticos, que bloquea automáticamente los miembros que están tratando de hackear su sitio web. A continuación se presentan todos los miembros actuales y los detalles de los intentos de piratear.",
		"banned_^" => "sub",

	"monitor" => "Monitor Miembros",
 
		"monitor_*" => "Monitor Miembros",
		"monitor_?" => "De vez en vez que los miembros pueden informar a otros miembros de abusar del sistema de mensajes o enviar mensajes desagradables o no deseadas. Usted puede utilizar esta herramienta para ver y controlar los mensajes miembros para ayudar a proteger la seguridad de los demás.",
		"monitor_^" => "sub",

	"import" => "Importar miembros",
 
		"import_*" => "Importar miembros de base de datos o archivos CVS",
		"import_?" => "Uso de las opciones a continuación puede importar los miembros en su sitio web desde otro data / plataforma de software de la comunidad o de una copia de seguridad de CVS.",
		"import_^" => "sub",
		
	"files" => "Archivos de miembros", 
	"files_*" => "Archivo de album de miembros",


	"addfile" => "Cargar  foto",			 
	"addfile_*" => "Cargar una  foto",
	"addfile_?" => "A veces un miembro tendrá problemas para subir una foto a su sitio web. El uso de esta sección puede subir una foto de su miembro.",
	"addfile_^" => "sub",
			
 
"affiliate" => "Afiliados",
 
		"affiliate_*" => "Afiliados",
		"affiliate_?" => "Uso de las opciones de abajo se puede administrar su sitio web afiliados.",
		 
			"addaff" => "Añadir nuevo afiliado",
	 
				"addaff_*" => "Añadir o editar cuenta de afiliado",
				"addaff_?" => "Rellene todos los campos de abajo para añadir / editar una cuenta de afiliado en su sitio web.",
				"addaff_^" => "sub",

			"affsettings" => "Pág. contenido afiliados",
 
				"affsettings_*" => "Diseño página afiliado",
				"affsettings_?" => "Utilice las siguientes opciones para editar el texto en sus páginas de afiliados.",
				"affsettings_^" => "sub",

			"affcom" => "Comision afiliados",
	 
				"affcom_*" => "Comision afiliados",
				"affcom_?" => "Aquí se puede establecer el tipo de comisión para sus afiliados. Esto significa que por cada venta realizada por un afiliador a su sitio web , se generará el porcentaje de la venta total a continuación.",
				"affcom_^" => "sub",


			"affban" => "Banners afiliados",
	 
				"affban_*" => "Banners afiliados",
				"affban_?" => "Aquí usted puede configurar los banners de anuncios que aparecerán en la cuenta de afiliado para que sus afiliados  usen en su sitio web.",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(

 

		"" => "Tema de galeria",
 
			"_*" => "Temas  galeria",
			"_?" => "A continuación se enumeran todas las plantillas de sitio web que están instalados actualmente en su sitio web. Haga clic en la imagen de vista previa Para cambiar la plantilla en su sitio web.",
			 
				
			"color" => "Esquemas de color",
		 
				"color_*" => "Esquemas de color",
				"color_?" => "Uso de las opciones de abajo se puede personalizar el esquema de color para tu sitio web. Si desea sustituir las imágenes con los suyos, puede utilizar las herramientas tema de la imagen.",
				"color_^" => "sub",
				
			"logo" => "Logo del sitio",
				"logo_$" => "Medio",
				"logo_*" => "Logo del sitio",
				"logo_?" => "Utilice las opciones de esta página para personalizar el aspecto del logotipo en su sitio web. Usted puede seleccionar de un logotipo diseñado antes o subir su propio.",
				"logo_^" => "sub",
				
			"img" => "Imágenes Tema",
				"img_$" => "Medio",
				"img_*" => "Tema de imagenes",
				"img_?" => "Las imágenes a continuación son almacenados en su carpeta de plantillas de imagen. Utilice las siguientes opciones para sustituir las imágenes existentes con otros nuevos que usted seleccione.",
				"img_^" => "sub",

			"text" => "Pagina de texto",
				"text_$" => "Medio",
				"text_*" => "Pagina de texto",
				"text_?" => "Los campos de abajo le permiten cambiar el texto de bienvenida en la página principal de su sitio web. Algunas plantillas utilizar diferentes conjuntos de pares de palabras que puede que tenga que experiement para averiguar cuál es el adecuado para usted.",
				"text_^" => "sub",


			"terms" => "Condiciones y terminos",
				"terms_$" => "Half",
				"terms_*" => "Terminos y condiciones de la web",
				"terms_?" => "Edite el campo de abajo para personalizar su página web los términos y condiciones. Estos se muestran en la página de registro .",
				"terms_^" => "sub",
	
			"edit" => "Páginas y archivos",
 
			"edit_*" => "Páginas Web",
			"edit_?" => "Seleccione una de las casillas de la lista siguiente para ver el contenido de los archivos en su sitio web. Su recomienda copiar y pegar el código en un editor como Dreamweaver o la primera página antes de editar y pegar de nuevo cuando su acabado. <b> Por favor tener mucho cuidado cuando de configuración o edición de archivos de sistema, los cambios son instantáneos y no se puede deshacer. </ a>",
				
	
	
				"newpage" => "Crear pagina",
				"newpage_$" => "medio",
				"newpage_*" => "Crear nueva pagina",
				"newpage_?" => "Creación de una nueva página en su sitio web es fácil. Basta con introducir una palabra, un título en el cuadro de abajo y la página se creará listo para editar.",
				"newpage_^" => "sub",
							
				
			"meta" => "Crear Meta Tags",
				"meta_$" => "medio",
				"meta_*" => "Meta Tag Editor",
				"meta_?" => "eMeeting tiene un sofisticado sistema de etiqueta meta de creación integrado en el software que le ahorra tiempo y dinero, creando miles de descripciones de página usted mismo. El software generará automáticamente el título, descripción y etiquetas meta de palabras clave basadas en el contenido que aparece en la página.",
				"meta_^" => "sub",

 

		
			"menu" => "Barras de menús",
				"menu_$" => "medio",
				"menu_*" => "Gestión Barra de menús ",
				"menu_?" => "Utilice las siguientes opciones para cambiar el orden de los elementos de las  barras  o añadir nuevos elementos de menú. También puede introducir los enlaces externos como http://google.com como el vínculo del menú de un elemento de menú si desea enlazar a otra página web o página de su sitio web.",
				"menu_^" => "sub",


	"manager" => "Gestion de archivos",
		"manager_$" => "medio",
		"manager_*" => "Gestion de archivos",
		"manager_?" => "El gestor de archivos es muy útil al agregar o eliminar archivos nuevos contenidos para su sitio web. Puede navegar por la cuenta de alojamiento completo y eliminar los archivos no obligatorios.",

			"slider" => "Rotar Imagenes",
				"slider_$" => "medio",
				"slider_*" => "Rotación de imágenes en la pagina principal",
				"slider_?" => "Las imágenes  de rotacion que aparece en su página de inicio. Utilice las siguientes opciones para cambiar la imagen, la descripción y haga clic en enlaces .",
				"slider_^" => "sub",

	"languages" => "Archivos de idioma",
		"languages_$" => "Medio",
		"languages_*" => "Archivos de idioma",
		"languages_?" => "A continuación se enumeran todos los archivos de idioma cargado en su sitio web. Usted puede eliminar cualquiera de los archivos de idioma que usted no desee utilizar y no se mostrará en su sitio web o marque la casilla para cambiar el idioma predeterminado del sitio web. <b> Nota, debe cerrar la sesión de la administración y el sitio web para ver los cambios de lenguaje </ b>",

			"editlanguage" => "Editar idioma",
				"editlanguage_$" => "medio",
				"editlanguage_*" => "Editar archivo de idioma",
				"editlanguage_?" => "Tenga	cuidado al editar el archivo de idioma a continuación, asegúrese de mantener la sintaxis de la misma para evitar cualquier error de sistema. Sólo introducir el contenido dentro de después de la flecha (=>) El primer valor se utiliza como una clave.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Añadir archivo de idioma",
				"addlanguage_$" => "Medio",
				"addlanguage_*" => "Añadir archivo de idioma",
				"addlanguage_?" => "Para Creación de un nuevo fichero de idioma simplemente copiar uno de los ya existentes que seleccione a continuación y cambie su nombre, puede abrir el archivo de idioma y editar el contenido.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "Email y  Newsletters",

		"_$" => "medio",
		"_*" => "Email y Newsletters",
		"_?" => "Abajo hay una lista de todos los correos electrónicos almacenados en el sistema. Sistema de correos electrónicos son utilizados por el software para enviar correos electrónicos a los miembros cuando los eventos ocurren como durante el registro o contraseña perdida. Usted puede personalizar todos los mensajes de correo electrónico y crear su propio uso de las opciones de abajo",

			"add" => "Crear New Email",
				"add_$" => "medio",
				"add_*" => "Add/Edit New Email",
				"add_?" => "Completar los formularios de abajo para añadir / editar su nuevo correo electrónico, este será guardado en su carpeta de plantillas personalizadas de correo electrónico para que pueda regresar a ella o enviar en cualquier momento que desee.",
				"add_^" => "sub",

	"welcome" => "Bienvenido a Email/ SMS",
		"welcome_$" => "Medio",
		"welcome_*" => "Bienvenido al programa de instalacion Email/ SMS",
		"welcome_?" => "Uso de las opciones de abajo se puede decidir cuál de correo electrónico y mensaje de texto es enviado a los miembros cuando se registro en primer lugar.",
		"welcome_^" => "sub",

	"template" => "Email Templates",
		"template_$" => "medio",
		"template_*" => "Email Templates",
		"template_?" => "Se enumeran a continuación  una selección de efectos de sonido integrado en el software. Haga clic en cualquiera de las imágenes para abrir y editar la plantilla.",
		"template_^" => "sub",

	"export" => "Descargar Emails",

		"export_$" => "medio",
		"export_*" => "Descarga de  Emails",
		"export_?" => "Utilice las opciones de abajo para descargar todas sus direcciones de correo electrónico  de miembros en la base de datos.",
		"export_^" => "sub",

	"sendnew" => "Enviar Newsletters",

		"sendnew_$" => "medio",
		"sendnew_*" => "Enviar Newsletter",
		"sendnew_?" => "Utilice esta sección para comenzar a enviar boletines informativos a sus miembros. Primero, seleccione  los miembros a enviar y luego seleccionar los  correo electrónico para enviar.",

	"send" => "Enviar email individual",

		"send_$" => "medio",
		"send_*" => "Enviar email individual",
		"send_?" => "Utilice esta opción para enviar un simple correo electrónico a un miembro, selecione la dirección de correo electrónico a continuación. El correo electrónico utilizado para enviar el correo electrónico es el mismo que aparece en su cuenta de administrador.",
		"send_^" => "sub",

	/*"auto" => "Email Scheduler",

		"auto_$" => "half",
		"auto_*" => "Automatic Email Scheduler",
		"auto_?" => "Automatic emails are emails that are sent out by the software on a timely manner such as once a day, week, month etc. You can setup such emails below.",
		"auto_^" => "sub",*/

	"subs" => " email recordar",

		"subs_$" => "medio",
		"subs_*" => "email recordar",
		"subs_?" => "Recordatorios de correo electrónico le permiten enviar mensajes de correo electrónico a los miembros que están dentro de un X número de días para un evento como su pertenencia a expirar o no añadir una foto.",
		"subs_^" => "sub",
		
	"tc" => "Informes por email",
		"tc_$" => "half",
		"tc_*" => "Informes por email",
		"tc_?" => "Informes por correo electrónico se generan cuando se envía un correo electrónico que contiene el código de seguimiento. Que generan las estadísticas de cuántos miembros abrieron los correos electrónicos que envíe.",
		"tc_^" => "sub",

			"tracking" => "Cód. seguimiento mail",
				"tracking_$" => "half",
				"tracking_*" => "Cod. seguimiento mail",
				"tracking_?" => "El código de seguimiento de abajo (tracking_id) se sustituye por una imagen transparente que se adjunta a los mensajes cuando se envían. Si el correo electrónico se abre y la imagen no bloqueado, el sistema puede grabar el mensaje ha sido abierto y generar un informe de seguimiento para usted.",
				"tracking_^" => "sub",



	"SMSsend" => "Enviar Mensajes SMS",

		"SMSsend_$" => "half",
		"SMSsend_*" => "Enviar Mensajes SMS",
		"SMSsend_?" => "Utilice las opciones de abajo para enviar SMS / mensajes de texto a los miembros de su teléfono móvil.",
);

$admin_layout_page5 = array(

	"" => "Niveles de Membresía",

		"_$" => "half",
		"_*" => "Niveles de Membresía",
		"_?" => "A continuación se enumeran todos los paquetes de los miembros actuales aplicados a su sitio web. Los resaltados en verde son requeridos por el sistema para controlar cómo los usuarios y los nuevos miembros se manejan que le dan más control de su sitio web.",

			"epackage" => "Añadir Package",
				"epackage_$" => "half",
				"epackage_*" => "Add/Edit Package",
				"epackage_?" => "Completar los formularios de abajo para añadir o actualizar el paquete de membresía para su sitio web.",
				"epackage_^" => "sub",

			"packaccess" => "Gestionar  acceso",
				"packaccess_$" => "full",
				"packaccess_*" => "Gestionar Pagina de  Acceso",
				"packaccess_?" => "Aquí usted puede controlar el acceso a su sitio Web completo basado en el paquete de miembro. <b> Nota: Sólo marcar la casilla si no desean que el miembro para ver esta página. </ b>",
				"packaccess_^" => "sub",

			"upall" => "Transfer. de miembros",
				"upall_$" => "half",
				"upall_*" => "Transferencia  de miembros entre paquetes ",
				"upall_?" => "Utilice esta opción se desea transferir a los miembros de un nivel de afiliación a otro.",
				"upall_^" => "sub",


	"gateway" => "Pasarelas de Pago",

		"gateway_$" => "half",
		"gateway_*" => "Pasarelas de Pago",
		"gateway_?" => "Pasarelas de pago le permiten el pago por las actualizaciones de adhesión. Si está ejecutando un sitio web gratuito que puede apagar el sistema de pago en el área de configuración.",


			"addgateway" => "Añadir pasarela pago",
				"addgateway_$" => "half",
				"addgateway_*" => "Añadir plataforma pago",
				"addgateway_?" => "El software tiene una serie de pasarelas de pago ya está integrado en el sistema, seleccione el proveedor de la lista a continuación para utilizar esto en su sitio web.",
				"addgateway_^" => "sub",


	"billing" => "Sistema Facturación",

		"billing_$" => "half",
		"billing_*" => "Sistema Facturación",	


		"affbilling" => "Hist. fact. afiliados",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Hist. fact. afiliados", 
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banners y Publicidad",

		"_$" => "half",
		"_*" => "Banners y Publicidad",
 

			"addbanner" => "Añadir Banner",
				"addbanner_$" => "half",
				"addbanner_*" => "Añadir Banner",
				"addbanner_?" => "Utilice las opciones de abajo para añadir un nuevo banner en su sitio web.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Config. de pantalla",

		"_$" => "half",
		"_*" => "Config. de pantalla",
		"_?" => "Utilice las siguientes opciones para apagar y encender las características del sitio web que usted no desee utilizar.",


	"op" => "Opciones de pantalla",

		"op_$" => "half",
		"op_*" => "Opciones de pantalla",
		"op_?" => "Utilice las siguientes opciones para personalizar la configuración del sitio web de la forma que desee.",
	
		"op1" => "Config. de búsqueda",
	
			"op1_$" => "half",
			"op1_*" => "Config. de búsqueda",
			"op1_?" => "Utilice las siguientes opciones para personalizar la forma en que sus páginas de búsqueda se muestran a través de su sitio web.",
			"op1_^" => "sub",
	
		"op2" => "Config. de socios",
	
			"op2_$" => "half",
			"op2_*" => "Config. de socios",
			"op2_?" => "Utilice las siguientes opciones para personalizar la forma de configuración de su sitio web segun la adhesión del miembro.",
			"op2_^" => "sub",

		"op3" => "Config.del servidor flash",
	
			"op3_$" => "half",
			"op3_*" => "Config.del servidor flash",
			"op3_?" => "Un servidor de Flash se utiliza para almacenar los saludos de vídeo miembros y se utiliza en la mensajería instantánea y chat para visualizar las cámaras de vídeo miembros.",
			"op3_^" => "sub",

		"op4" => "Configuración de la API",
	
			"op4_$" => "half",
			"op4_*" => "Configuración de la API", 
			"op4_^" => "sub",

		"thumbnails" => "Imagenes por Defecto ",
	
			"thumbnails_$" => "half",
			"thumbnails_*" => "Imagenes por defecto", 
			"thumbnails_^" => "A continuación se enumeran todas las imágenes por defecto se utiliza actualmente a través de su sitio web, cuando los miembros no han subido sus propias fotos.",

	"email" => "Configuración del email",

		"email_$" => "half",
		"email_*" => "Configuración del email",
		"email_?" => "A continuación se enumeran una lista de eventos del sitio web, usted puede seleccionar los eventos que te gustaría que el sistema enviará una notificación por correo electrónico. Notificaciones de correo electrónico será enviado a todos los administradores de sistema que tienen acceso a la configuración del sistema.",

	"paths" => "Ruta Archivo /Carpeta",

		"paths_$" => "half",
		"paths_*" => "Ruta archivos/ Carpetas",
		"paths_?" => "El archivo de carpetas y caminos a continuación se refieren a los archivos y carpetas en su cuenta de hosting. El software se aplicará automáticamente a las mismas durante el proceso de instalación sin embargo si cree que  son incorrectos puede modificar a continuación.",

	"watermark" => "Imagen de agua",

		"watermark_$" => "half",
		"watermark_*" => "Imagen de agua",
		"watermark_?" => "Una marca de agua de la imagen es una imagen que se muestra en la parte superior de las fotos miembros cuando se muestran. Esto suele ser un logotipo de su sitio web, imágenes de marca de agua debe estar en el formato PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Campos del sitio web",

		"_$" => "half",
		"_*" => "Campos de búsqueda del perfil y registro",
		"_?" => "A continuación se enumeran todos los campos actuales que aparecen en su sitio web. Usted puede seleccionar para mostrar los campos en la página de búsqueda, páginas de registro, páginas de perfiles e incluso las páginas de los miembros coinciden. Usted puede rápidamente y fácilmente añadir nuevos campos a su sitio web utilizando las opciones siguientes.",

		"addfields" => "Crear nuevo campo",
	
			"addfields_$" => "half",
			"addfields_*" => "Crear nuevo campo",
			"addfields_?" => "Utilice las opciones de abajo para añadir un nuevo campo a su sitio web. Un campo se utiliza para permitir a los miembros  llenar la información sobre sí mismos.",
			"addfields_^" => "sub",

		"fieldgroups" => "Gestionar grupos",
	
			"fieldgroups_$" => "half",
			"fieldgroups_*" => "Gestion de campos de grupo",
			"fieldgroups_?" => "Los grupos son un conjunto de campos que tienen un tema común. Así, por ejemplo, puede crear un grupo denominado 'Acerca de mí' y en el grupo de agregar campos, como 'Mi nombre', 'Mi edad etc.' <b> Si elimina un grupo con ellos en los campos, los campos serán automáticamente trasladados al siguiente grupo </ b>.",
			"fieldgroups_^" => "sub",
			
			            
		"addgroups" => "Crea new campo de Grup.",
	
			"addgroups_$" => "half",
			"addgroups_*" => "Crea New Campo Grup",
			"addgroups_?" => "Un grupo de campo es una colección de todos los campos sometidos a un titular del grupo principal. Esto le permite crear muchos grupos con los campos que están relacionados con el tema del grupo.",
			"addgroups_^" => "sub",




	"cal" => "Calendario eventos",

		"cal_$" => "half",
		"cal_*" => "Calendario eventos",
		"cal_?" => "calendario de eventos que se muestra en su sitio web para los miembros para crear y ver eventos. Utilice las siguientes opciones para crear, editar e importar nuevos eventos.",

		"caladd" => "Añadir Evento",
	
			"caladd_$" => "half",
			"caladd_*" => "Add /Edit Evento",
			"caladd_?" => "Complete los campos abajo para add/edit eventos.",
			"caladd_^" => "sub",

		"caladdtype" => "Gest. tip. evento",
	
			"caladdtype_$" => "half",
			"caladdtype_*" => "Gest. tip. evento",
			"caladdtype_?" => "	Utilice las opciones de abajo para crear nuevos tipos de eventos, se recomienda añadir una imagen a cada evento para hacer de su sitio web un aspecto más profesional.",
			"caladdtype_^" => "sub",

		"importcal" => "Importar Eventos",
	
			"importcal_$" => "half",
			"importcal_*" => "Search & Import Eventos",
			"importcal_?" => "El software se ha construido en los eventos de la API del sistema. Esto le permite buscar en una base de datos mundial de los eventos locales e internacionales y añadirlas directamente a su sitio web.",
			"importcal_^" => "sub",


	"poll" => "Encuestas ",

		"poll_$" => "half",
		"poll_*" => "Encuestas",
		"poll_?" => "Utilice las siguientes opciones para crear y administrar su sitio web las encuestas",

		"polladd" => "Añadir encuesta",
	
			"polladd_$" => "half",
			"polladd_*" => "Crea new encuesta",
			"polladd_?" => "Complete los campos para añadir una nueva encuesta.",
			"polladd_^" => "sub",



	"forum" => "Foro",

		"forum_$" => "half",
		"forum_*" => "Categorias foro",
		"forum_?" => "Utilice las siguientes opciones para administrar las Categoría  del foro. Su recomienda añadir los iconos de foto para cada categoría para hacer de su sitio web un aspecto más profesional.",

		"forumadd" => "Add cat. de foro",
	
			"forumadd_$" => "half",
			"forumadd_*" => "Add cat. foro",
			"forumadd_?" => "Complete los campos de abajo para añadir categorias al foro.",
			"forumadd_^" => "sub",

		"forumchange" => "Cambiar foro",
	
			"forumchange_$" => "half",
			"forumchange_*" => "Manejar Integración foro",
			"forumchange_?" => "El software tiene la capacidad para cambiar la junta del foro, esto significa que usted puede seleccionar cualquiera de los foros mencionados a continuación en lugar de utilizar el foro por defecto Por favor refiérase a los manuales de instalación para cada Junta foro antes de habilitar esta característica.",
			"forumchange_^" => "sub",

		"forumpost" => "Gestion Posts",
	
			"forumpost_$" => "half",
			"forumpost_*" => "Gest. Posts",
			"forumpost_?" => "A continuación se enumeran todos los posts reciente foro añadido por sus miembros. Utilice las opciones a continuación para editar o eliminar temas que son inaceptables.",
			"forumpost_^" => "sub",

	"chatrooms" => "Chats",

		"chatrooms_$" => "half",
		"chatrooms_*" => "Chats",
		"chatrooms_?" => "Utilice las siguientes opciones para crear nuevas salas de chat para tu sitio web o modificar las ya existentes.",


	"faq" => "FAQ",

		"faq_$" => "half",
		"faq_*" => "FAQ",
		"faq_?" => "Sitio Web FAQ son una gran manera de ayudar a los miembros de aprender más sobre su sitio web y responder a cualquier problema que pueda tener. Crea tu propio juego de preguntas más frecuentes y gestionar usando las opciones siguientes.",

		"faqadd" => "Añadir FAQ",
	
			"faqadd_$" => "half",
			"faqadd_*" => "Add/Edit FAQ",
			"faqadd_?" => "Rellene los campos de abajo para añadir o editar una entrada de la FAQ.",
			"faqadd_^" => "sub",

	"words" => "Filtro de palbras",

		"words_$" => "half",
		"words_*" => "Filtro palabras",
		"words_?" => "El filtro de palabras se aplica a los perfiles de los miembros, la mensajería instantánea y el foro y filtrar cualquiera de las palabras que usted ingrese aquí y reemplazarlos con las estrellas (**).",



	"articles" => "Articulos",

		"articles_$" => "half",
		"articles_*" => "Articulos",
		"articles_?" => "Los artículos del sitio Web son una gran manera de mantener a sus miembros al día con los últimos cambios a su sitio web de noticias y eventos",


		"articleadd" => "Add Articulo",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Crea new articulo",
			"articleadd_?" => "Rellene los campos de abajo para añadir un nuevo artículo a su sitio web.",
			"articleadd_^" => "sub",

		"articlerss" => "Import RSS Articulos",
	
			"articlerss_$" => "half",
			"articlerss_*" => "Import RSS Articulos",
			"articlerss_?" => "Los enlaces RSS pueden utilizarse para la importación de artículos RSS directamente en una de las categorías que ha creado. Así, por ejemplo, es posible que desee crear una categoría de Noticias,  introduzca la fuente RSS de un sitio web de noticias. Entonces, el programa que va a extraer todos los artículos de la tasa de RSS y agregarlas a su sitio web.",
			"articlerss_^" => "sub",

		"articlecats" => "Catg. Articulo",
	
			"articlecats_$" => "half",
			"articlecats_*" => "Catg. Articulo",
			"articlecats_?" => "Utilice las opciones de abajo para crear categorías nuevas de artículo para su sitio web.",
			"articlecats_^" => "sub",


	"groups" => "Grupos comunidad",

		"groups_$" => "half",
		"groups_*" => "Grupos comunidad",
		"groups_?" => "Utilice las siguientes opciones para crear y administrar su sitio web de grupos de la comunidad.",


	"class" => "Clasificados",

		"class_$" => "half",
		"class_*" => "Clasificados",
		"class_?" => "A continuación se enumeran todos los anuncios clasificados creado por los miembros .",


		"addclass" => "Add Clasificado",
	
			"addclass_$" => "half",
			"addclass_*" => "Add/Edit Anuncio",
			"addclass_?" => "Utilice las opciones de abajo para añadir / editar los anuncios en su sitio web.",
			"addclass_^" => "sub",

		"addclasscat" => "Gest. Categorias",
	
			"addclasscat_$" => "half",
			"addclasscat_*" => "Gest. Categorias",
			"addclasscat_?" => "Utilice las siguientes opciones para administrar sus categorías de anuncios clasificados. Su recomienda añadir un icono de foto para cada uno para hacer de su sitio web un aspecto más profesional.",
			"addclasscat_^" => "sub",

	"games" => "Juegos",

		"games_$" => "half",
		"games_*" => "Juegos",
		"games_?" => "A continuación se enumeran todos los juegos instalados actualmente en su sitio web. Consulte el manual para más detalles sobre la instalación de nuevos juegos",

	"gamesinstall" => "Instalar juego",

		"gamesinstall_$" => "half",
		"gamesinstall_*" => "Instalar juegos",
		"gamesinstall_?" => "Seleccione los siguientes juegos que desea instalar. Si desea añadir nuevos juegos a tu sitio web simplemente subir los archivos del juego de  su ubicación a la carpeta: inc / exe / games / tar /. <b> Consulte el manual para más detalles sobre la instalación de nuevos juegos </ b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administradores",

		"_$" => "half",
		"_*" => "admin. y moderadores",
		"_?" => "A continuación se enumeran todos los administradores y moderadores del sitio web no incluye el super usuario. Añadir nuevos moderadores mediante la página de búsqueda de miembros y haciendo clic en el icono de moderador al lado de su nombre.",

	"pref" => "Preferencias del admin",

		"pref_$" => "half",
		"pref_*" => "Preferencias del admin",
		"pref_?" => "Utilice las siguientes opciones para personalizar las preferencias de los administradores.",

	"manage" => "Gest. moderador",

		"manage_$" => "half",
		"manage_*" => "Gest. moderador",
		"manage_?" => "A los moderadores del sitio web puede tener dos funciones, que puede ser un moderador del sitio web que les permite el acceso a moderar el sitio web principal solamente, o puede proporcionar con sus propios datos de acceso de administración por lo que puede registrarse en el área de administración y el uso de la herramientas de administración.",
		"manage_^" => "sub",

	"email" => "Admin Emails",

		"email_$" => "half",
		"email_*" => "Admin Emails",
		"email_?" => "A continuación se enumeran todos los mensajes de correo electrónico enviar a la administración de los miembros del sitio web.",

	"compose" => "Crear Email",

		"compose_$" => "half",
		"compose_*" => "Crear Email",
		"compose_?" => "Utilice las opciones de abajo para crear un nuevo mensaje para enviar a un miembro.",
		"compose_^" => "sub",

	"super" => "Super User Login",

		"super_$" => "half",
		"super_*" => "Detalles Super User  ",
		"super_?" => "Por favor tenga cuidado cuando los datos de la cuenta de edición más adelante, esta es la cuenta de super usuario y usted debe asegurarse de que la contraseña se mantiene en secreto de los demás en todo momento.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Software Updates",

		"_$" => "half",
		"_*" => "Software Updates",
		"_?" => "A continuación se ofrece la versión actual del software de su funcionamiento en comparación con la última versión disponible. Si su versión es obsoleta, por favor, póngase en contacto con su proveedor para las actualizaciones más recientes.",

	"backup" => "Database Backup",

		"backup_$" => "half",
		"backup_*" => "Database Backup",
		"backup_?" => "Seleccione una o más de las tablas a continuación para bakup su base de datos. Se recomienda encarecidamente que utilice la copia de seguridad de base de datos de alojamiento zona cuenta para asegurar que todos los datos se reciben.",


	"license" => "Software License Keys",

		"license_$" => "half",
		"license_*" => "Software License Keys",
		"license_?" => "A continuación se enumeran las claves de licencia de software, por favor tome durante la edición de estos para garantizar que son correctos.",

	"sms" => "SMS Creditos",

		"sms_$" => "half",
		"sms_*" => "SMS Creditos",
		"sms_?" => "A continuación figura el monto total actual de los créditos de SMS deja en tu cuenta.",

);

$admin_layout_page11 = array(

	"" => "Software Plugins",

		"_$" => "half",
		"_*" => "Software Plugins",
		"_?" => "Plugins extender y ampliar la funcionalidad de eMeeting data de software. Una vez que se instala un plug-in, usted puede activarlo o desactivarlo aquí usando las opciones del menú de la izquierda.",

);


$admin_layout_nav = array(

	"1" => "Panel",
		"1a" => "Estadistica de miembro",
		"1b" => "Estadistica afiliados",
		"1c" => "Estadistica visitantes",
		"1d" => "Localizacion visitantes",
	"2" => "Miembros",
		"2a" => "Gestion Miembros",
		"2b" => "Gestion Afiliados",
		"2c" => "Miembros prohibido",
		"2d" => "Fotos de miembros",
		"2e" => "Miembros importados",
	"3" => "Diseño",
		"3a" => "Temas",
		"3b" => "Editor de Temas",
		"3c" => "Gestion de imagenes",
		"3d" => "Logo Editor",
		"3e" => "Meta Tags",	
		"3f" => "Languajes",
		"3g" => "Página de Redacción",
		"3h" => "Gestion archivos",
		"3i" => "Barras de menu",
	"4" => "Email",
		"4a" => "Gest. Emails",
		"4b" => "Plantillas Email ",
		"4c" => "Informes de email",
		"4d" => "Enviar email indivdual",
		"4e" => "Email Recordatorio",	
		"4f" => "Descarga Emails",
		"4g" => "Enviar Newsletters",		
	"5" => "Facturas",
		"5a" => "Gestion Packg",
		"5b" => "Pasarela de pagos",
		"5c" => "Historico de facturacion",
		"5d" => "Historia fact. afiliados",
	"6" => "Configuración",
		"6a" => "Opcions. pantalla",
		"6b" => "Config. pantalla",
		"6c" => "rutas del sistema",
		"6d" => "Marca de agua",
	"7" => "Contenido",
		"7a" => "Buscar campos",
		"7b" => "Calendario de eventos",
		"7c" => "Encuestas",
		"7d" => "Foro",
		"7e" => "Sala de Chat",	
		"7f" => "FAQ",
		"7g" => "Filtro de palabras",
		"7h" => "Articulos / News",
		"7i" => "Grupos",
	"8" => "Promociones",	
		"8a" => "Banners",
	"9" => "Plugins",	
		"9a" => "",
	"10" => "Manage Moderators",	
		"10a" => "Gestion de moderadores",
		"10b" => "Super Usuario",
	"11" => "Mantenimiento",
		"11a" => "System Backup",
		"11b" => "License Keys",
		"11c" => "Actualizaciones del sistema",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Sistema actualizado con éxito",
	"no_update" => "Sistema de actualización sin embargo no había nada que borrar!",
	"edit" => "Editar",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Busqueda",
	"1" => "Selecionar todo",
	"2" => "Desmarcar todo",
	"3" => "Aprobar",
	"4" => "Suspender",
	"5" => "Eliminar",	
	"6" => "Hacer destacados miembros",
	"7" => "Opciones",	
	"8" => "Actualizar",	
	"9" => "Hacer destacados",
	"10" => "Eliminar destacados",	
	"11" => "Actualizar lenguaje por defecto",
	"12" => "Enviar",
	"13" => "Continuar",	
	"14" => "Hacer Activos",
	"15" => "Desactivar",
	"16" => "Actualizar Orden",
	"17" => "Actualizar campos Páginas",	
	"18" => "Activar",
);

$admin_table_val = array(
	"1" => "Nombre de usuario",
	"2" => "Género",
	"3" => "Ultimo Login",
	"4" => "Status",
	"5" => "Pack",
	"6" => "Actualizado",
	"7" => "Opciones",	
	"8" => "Dato",
	"9" => "IP Address",
	"10" => "Hack String",	
	"11" => "Fecha de Antigüedad",	
	"12" => "Nombre",
	"13" => "Email",
	"14" => "Clicks",
	"15" => "Registro",
			
	"15" => "Comisión pagada",
		
	"16" => "Mensaje",
	"17" => "Tiempo",
	"18" => "Nombre de archivo",
	"19" => "Última Actualización",	
	"20" => "Editar",
	"21" => "Defecto",	
	"22" => "ID",

	"23" => "Precio",
	"24" => "Visible",	
	"25" => "Type",
	"26" => "Gestion de  Acceso",	
	"27" => "Activo",

	"28" => "Ver codigo",
	"29" => "Campos",	
	"30" => "Nombre de afiliado",
	"31" => "Total a Pagar",	
	"32" => "Estado",
	
	"33" => "Fecha actualizacion",
	"34" => "Fecha caducidad",	
	"35" => "Metodo de pago",
	"36" => "Todavía activo",	
	"37" => "Password",
	"38" => "Ultimo ingreso",

	"39" => "Posicion",
	"40" => "Visitas",	
	"41" => "Activo",
	"42" => "Previo",	
	"43" => "Titulo",
	"44" => "Articulos",
	"45" => "Orden",

);

$admin_search_val = array(
	"1" => "Usuario  miembro",
	"2" => "Todos los packs",
	"3" => "Todos los Géneros",
	"4" => "Por página",
	"5" => "Ordenar por",
	"6" => "Direcion de email",
	
	"7" => "Cualquier estado",
	"8" => "Miembros Activos",
	"9" => "Miembros suspendidos",
	"10" => "Miembros no aprobados",
	"11" => "miembros que deseen cancelar",
	"12" => "Todas las páginas",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Administrar todos los Grupos",
	"2" => "Nombre del grupo",
	"3" => "Languaje",		
	"4" => "Gestión de temas",
	"5" => "Gestion de Categorias",	
	"6" => "Nombre del grupo Categoría",		
	"7" => "Gestion de  Categorias",	
	"8" => "Nombre",	
	"9" => "cuenta",	
	"10" => "Añadir articulo",	
	"11" => "Categoria",
	"12" => "Titulo de la pagina",	
	"13" => "Descripción corta",		
	"14" => "Añadir Articulo",
	"15" => "Gestion de Categorias",
	"16" => "Lista de campos",
	"17" => "Orden",
	"18" => "Languaje",
	"19" => "Lista de  Valores",
	"20" => "Nuevo campo",	
	
	"21" => "Titulo del campo",		
	"22" => "Tipo de campo",
		"23" => "Texto del campo",	
		"24" => "Area de texto",	
		"25" => "Cuadro de lista",
		"26" => "Casilla de verificación simple",
		"27" => "Casilla de verificación multiple",
	
	"28" => "Grupo Cabeza",
	"29" => "Incluir durante el registro",
	"30" => "Seleccione más abajo",
	
	"31" => "Añadir Grupo",
	"32" => "Opciones de Visualización del grupo",
		"34" => "Visualizar todos los miembros",
		"35" => "Mostrar únicamente el administrador del sitio web",
		"36" => "Mostrar a admin y miembro (no en el perfil)",
	"37" => "único",	
	"38" => "Gestion de  Grupos",	
	"39" => "Añadir Evento",	
	"40" => "Títulos de campo",
	"41" => "subtítulo",		
	"42" => "Descripción de texto",
	"43" => "Tipo de título",	
	"44" => "Buscar titulo",		
	"45" => "Titulo del perfil",	
	"46" => "Usted debe crear un título para el perfil, tales como 'Yo soy  'y otro para la página de búsqueda, tales como' Estoy buscando a '",	
	"47" => "Titulos de campo existentes",	
	"48" => "Mover el campo a este grupo",		
	"49" => "ID de miembro",
	"50" => "Nombre de evento",	
	"51" => "Descripcion del evento",		
	"52" => "Tipo de evento",
	"53" => "Selección Categoría",	
	"54" => "Selecion Tipo",
	"55" => "Hora del evento",
	"56" => "Deja en blanco para todo el día",
	"57" => "Fecha del evento",
	"58" => "Mes",	
	
	"59" => "Dia",	
	"60" => "año",
	"61" => "Pais",		
	"62" => "Provinccia",
	"63" => "Calle",	
	"64" => "Localidad",		
	"65" => "Telefono",	
	"66" => "Email",	
	"67" => "Web site",	
	"68" => "Evento Visible para",		
		"69" => "todo el mundo",
		"70" => "Amigos conectados",	
		
	"71" => "Añadir encuesta",		
	"72" => "Resultados de la encuesta",
	"73" => "Nombre de la encuesta",	
	"74" => "resultado",	
	"75" => "Hacer Activo",
	
	"76" => "Añadir Tema del foro",
	"77" => "Administrar entradas",
	"78" => "Tema del foro",	
		
	"79" => "Titulo",	
	"80" => "Descripcion",
	"81" => "Entradas del foro",		
	"82" => "Todas las entradas",
	"83" => "Hoy",	
	"84" => "Esta Semana",		
	"85" => "La semana pasada",	
	"86" => "Nombre de la sala",	
	"87" => "Campos de titulo existente",	
	"88" => "Contraseña de la sala",		
	"89" => "Añadir New",
	"90" => "Añadir F.A.Q",
	
	"91" => "Añadir censor de palabras",		
	"92" => "Palabra",
	
	"93" => "Aprobado",
	"94" => "título",
	"95" => "Titulo del partido",
	"96" => "Languaje",

	"97" => "Previo",
	"98" => "Resultados",
);
$admin_advertising = array(

	"1" => "Banners",
	"2" => "Añadir Banner",
	"3" => "Banners de afiliado",	
	"4" => "Add / Edit Banners",
	"5" => "Banner Type",	
	"6" => "Banner del sitio",			
	"7" => "Banner de afiliado",	
	"8" => "Nombre",	
	"9" => "Cargar Banner",	
	"10" => "Enter HTML",	
	"11" => "HTML Code",
	"12" => "Cargar Banner",	
	"13" => "Banner Link",		
	"14" => "Pantalla para",
		"15" => "Todos los miembros",
		"16" => "Sólo miembros conectados en este",
	
	"17" => "Pagina",
	"18" => "Activo",
	
	"19" => "Top Posicion",
	"20" => "Posicion media",	
	"21" => "Posición Izquierda",		
	"22" => "Última posición",
	"23" => "Deja en blanco para usar enlace de código de banner",
	"24" => "Vista previa del banner",
	
);


$admin_maintenance = array(

	"1" => "Actualmente en ejecución",
	"2" => "La última versión",
	"3" => "Creditos SMS",	
	"4" => "Resto de créditos de SMS",	
	"5" => "Compra de créditos",	

);

$admin_admin = array(

	"1" => "Añadir Admin",
	"2" => "Nombre de usuario",
	"3" => "Password",	
	"4" => "Email",
	
	"5" => "Editar configuración del administrador",	
	"6" => "Nombre completo",			
	"7" => "Nivel de acceso",	
		"8" => "Completa del sistema de acceso",	
		"9" => "Acceso Sólo miembros",	
		"10" => "Acceso unico a diseño",	
		"11" => "Acceso unico al correo electrónico ",
		"12" => "El acceso unico a facturación ",	
		"13" => "Aceso unico a configuracion",		
		"14" => "Acceso unico administracion",
	"15" => "Admin Icono",

	"17" => "Alertas Email",
	"18" => "Admin alertas News",
	"19" => "Transferencia de todos los miembros",
	"20" => "Para el siguiente paquete",	
	"21" => "Editar  Package",		
	"22" => "Paquete de Acceso",
	"23" => "Agregar paquete del artículo",	
	"24" => "Administrar Acceso al paquete",
);

$admin_settings = array(

	"1" => "Mostrar páginas",
	"2" => "Habilitado",
	"3" => "Desabilitado",	
	"4" => "Rutas Web",
	"5" => "Rutas de servidor",	
	"6" => "Rutas de Miniatura",			
	"7" => "Añadir campo",	
	"8" => "Nombre",	
	"9" => "Valor",	
	"10" => "Tipo",	
	"11" => "Administrar campos",
	"12" => "Añadir pasarelas",	
	"13" => "Sistema de pago",		
	"14" => "Codigo de pasarela de pago",
	"15" => "Titulo",
	"16" => "Paquete de Acceso",
	"17" => "Comentarios",
	"18" => "Transfer. de miembros",
	"19" => "Transferir todos los miembros",
	"20" => "Para el siguiente paquete",	
	"21" => "Editar Pack",		
	"22" => "Pack Accesos",
	"23" => "Agregar articulo al pack",	
	"24" => "Administrar aceso al pack",
);

$admin_billing = array(

	"1" => "Añadir Pack",
	"2" => "Administrar pack acceso",
	"3" => "Transferir pack de miembros",			
	"4" => "Su sitio web está actualmente en ejecución en <b> modo gratuito </ b> por lo tanto los paquetes de la adhesión ha sido desactivado.",
	"5" => "¿Le gustaría deshabilitar el modo libre y visualizar los tipos de pack?",	
	"6" => "Deshabilitar modo gratuito",		
	"7" => "Añadir campos",	
	"8" => "Nombre",	
	"9" => "Valor",	
	"10" => "Tipo",	
	"11" => "Administrar campos",
	"12" => "Añadir paserelas de pago",	
	"13" => "Sistema de pago",		
	"14" => "Codigo pasarela de pago",
	"15" => "Titulo",
	"16" => "Acceso al pack",
	"17" => "Comentarios",
	"18" => "Transferir miembros",
	"19" => "Transfer. todos los miembros",
	"20" => "Para el siguiente paquete",	
	"21" => "Editar Pack",		
	"22" => "Acceso al pack",
	"23" => "Añadir articulo al pack",	
	"24" => "Administrar acceso al pack",
	
	"25" => "Pendiente de aprobación",
	"26" => "Pagos aprobados",
	"27" => "Pagos rechazados",
	
	"28" => "Todos Historicos",
	"29" => "Pagos Activo",
	"30" => "Pagos finalizados",
	"31" => "Suscripciones activas",
	"32" => "Suscripciones finalizadas",
	"33" => "Codigo de acceso al Pack",
	
);

$admin_email = array(

	"1" => "Sistema Emails",
	"2" => "Newsletters",
	"3" => "Plantillas email",		
	"4" => "Editor de email",
	"5" => "asunto",	
	"6" => "Vista previa Email",	
	"7" => "To Email",
	
	"8" => "Enviar a",	
		"9" => "Todos los miembros",	
		"10" => "Socios Suscriptores Pack",	
		"11" => "Activar / Suspender / Desaprobar miembros",
	"12" => "Para packs",	
	"13" => "ESTADO DE MEMBRESÍA",		
	"14" => "Selecionar Newsletter",	
	
	"15" => "Crear New",
	"16" => "Creación de vistas personalizadas",
	"17" => "Código de seguimiento de correo electrónico",
	"18" => "Crear New",
	"19" => "Creación de vistas personalizadas",
	"20" => "Código de seguimiento de correo electrónico",
		"21" => "Codigo HTML abajo",
		
	"22" => "Resultados del rastreo de correo electrónico",
	"23" => "No hubo informes de resultados.",
	"24" => "Seleccione el informe",
	
	"25" => "Enviar recordatorios a todos los miembros que tienen entre",
	"26" => "y",
	"27" => "dias",
	"28" => "Días restantes de su suscripción para actualización",
	"29" => "Selecionar Email para enviar:",
	"30" => "Descargar",
	"31" => "Selecionar Pack",
	"32" => "Código de seguimiento",
	
	
);

$admin_design = array(

	"1" => "Descargar temas",
	"2" => "La plantilla actual",
	"3" => "Uso de la plantilla",	
	"4" => "Pagina Meta Tags",
	"5" => "Pagina de Title",	
	"6" => "Descripcion",
	"7" => "Keywords",
	"8" => "Paginas del sitio",	
	"9" => "Contenido de las Paginas",	
	"10" => "Páginas personalizadas",	
	"11" => "Crear Pagina",
	"12" => "Ruta del FTP",	
	"13" => "Tema Archivos",		
	"14" => "Contenido de  Paginas",	
	"15" => "Personalizar Paginas",


	"16" => "Añadir Languaje",
	"17" => "Nuevo nombre de archivo",	
	"18" => "Selecionar archivo a copiar",
			
	"19" => "Editar archivo de idioma",	
	"20" => "Personalizar Paginas",

	"21" => "Fuente",
	"22" => "Tamaño de la fuente",	
	"23" => "Color de la fuente",
	"24" => "ancho",	
	"25" => "Altura",		
	"26" => "Añadir Logo Texto",
	"27" => "Lienzo Tipo",	
		"28" => "Utilice fondo blanco",
		"29" => "Mantenerse al corriente de diseño",	
		"30" => "Subir mi propio fondo de logo",	

	"31" => "Crear una nueva página",
	"32" => "Nuevo nombre de pagina",	
		"33" => "Nombres de página debe ser muy breve y sólo una palabra.  Enlaces, Artículos, Noticias, Foro, etc",
	"34" => "Añadir menú de las pestañas?",	
		"35" => "No! no crear una ficha",		
		"36" => "Sí. Añadir a la zona de miembros",
		"37" => "Sí. Añadir a las páginas principales del sitio web, no las páginas de área de miembros.",
			"38" => "Si se selecciona una ficha nuevo miembro se generará en su sitio web",
);

$admin_overview = array(

	"1" => "comunicación",
	"2" => "Total de miembros",
	"3" => "Esta Semana",
	"3a" => "Hoy",
	"4" => "Actividad reciente del sitio Web",
	"5" => "Informes de sitio Web",
	
	"6" => "visitantes del sitio Web a través de las últimas dos semanas",
	"7" => "Registro Nuevo miembro en las últimas 2 semanas",
	"8" => "Estadisticas de genero de miembros",	
	"9" => "Estadisticas de edad de miembros",
	
	"10" => "Nuevo registro de afiliados en las 2 últimas semanas",
	"11" => "Configurar mapa de visitante",
	"12" => "Por favor, introduzca su clave de API de Google en el campo de arriba.",	
	"13" => "Usted puede comprar una clave de licencia desde el área de clientes de nuestro sitio web",	
	
	"14" => "Filtrar los resultados de la búsqueda",	
	"15" => "Todos los archivos",
	
	
);
$admin_members = array(

	"1" => "Todos los miembros",
	"2" => "Moderadores",
	"3" => "Activo",
	"4" => "Suspendido",
	"5" => "No aprobados",
	"6" => "Desea cancelar",
	"7" => "Ahora en línea:",
	"8" => "Actividad de miembros en linea",	
	"9" => "Editar detalles de miembros",	
	"10" => "Añadir afiliados",
	"11" => "Banners de afiliados",
	"12" => "Paginas de afiliados",	
	"13" => "Añadir afiliado",	
	"14" => "Configuración de afiliados",	
	"15" => "Todos los archivos",
	"16" => "Fotos",
	"17" => "Videos",
	"18" => "Musica",
	"19" => "YouTube",
	"20" => "No aprobados",
	"21" => "Destacado",
	"22" => "Subir archivo",	
	"23" => "Archivo",
	"24" => "Tipo",
	"25" => "Nombre de usuario",
	"26" => "Titulo",
	"27" => "Comentarios",
	"28" => "Establecer como predeterminado",		
	"29" => "Actividad de miembros en linea",	
	"30" => "Afiliados contratado por el",
	"31" => "Destacado",
	"a5" => "Nombre de usuario",
	"a6" => "Password",
	"a7" => "Primer nombre",
	"a8" => "Segundo nombre",
	"a9" => "Nombre de la empresa",
	"a10" => "Direccion",
	"a11" => "Calle",
	"a12" => "Localidad",
	"a13" => "Pais",
	"a14" => "Codigo postal",
	"a15" => "Country",
	"a16" => "Telefono",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Nombre de la pagina web",
	"a20" => "Haga el cheque a nombre de",
);


// HELP FILES
$admin_help = array(

	"a" => "Empezar ahora",
	"b" => "No, estoy bien. Gracias!",
	"c" => "Continuar",	
	"d" => "Cerrar la ventana",
	
	
	"1" => "Introduccion",
	"2" => "¿Necesitas ayuda para empezar?",
	"3" => "Hola",	
	
	"4" => "Bienvenidos a la zona de administración! Como esta es la primera vez que ha entrado en el área de administración se recomienda que se tome unos minutos para seguir el asistente a continuación para ayudarle a empezar!",
	"5" => "Nuestro asistente de inicio le guiará a través de pasos de configuración par conseguir  la puesta en funcionamiento en poco tiempo.",	
	"6" => "<strong>(Nota)</strong> Usted puede visitar esta página en cualquier momento haciendo clic en la 'guía de ayuda rápida 'en las barras de menú de la izquierda.",
	
	"7" => "Cómo empezar",
	"8" => "Bienvenido a su área de administración!",	
	"9" => "Bienvenido a su cuenta de administrador ",	
	"10" => "Este software te permite gestionar todos los aspectos diferentes de su sitio web, incluyendo sus miembros, archivos, seguridad, correo electrónico, plugins, y mucho más.",	
	"11" => "Este Asistente de introducción le dará a conocer algunos de los conceptos detrás de la administración del sitio web y te permite configurar algunos parámetros básicos para su sitio web para que pueda comenzar a traer tráfico (visitantes) a su sitio.",
	"12" => "<strong>(Recuerde)</strong> En cualquier momento, puede cerrar esta ventana utilizando el botón de cerrar y volver más tarde haciendo clic en la 'guía de ayuda rápida' de la barra de menú de la izquierda.",
		
	"13" => "Introducción a su área de administración!",		
	"14" => "El área de administración de software 'basado en la web', que significa que usted puede acceder y gestionar su sitio web en cualquier parte del mundo con una conexión a Internet. Simplemente apunte su navegador a:",	
	"15" => "Entrar con tus datos de acceso de administrador.",
	"16" => "Haga clic aquí para Añadir este enlace ahora.",
	
	"17" => "Introducción a su escritorio.",	
	"18" => "El tablero de instrumentos de software ofrece una visión muy rápida del rendimiento de su sitio web, puede leer el anuncio de software, de su miembro ver el historial registro, vea los miembros y cuadros estadísticos de afiliados y más.",			
	"19" => "Toda la información de usuario es almacenada en la base de datos MySQL llamado:",	
	"20" => "Introducción a las estadísticas del sitio web.",
	"21" => "Las estadísticas de software ofrece una representación visual de sus miembros y de la historia de registro de afiliados en un período de dos semanas. Cada vez que un miembro o afiliado se une a su sitio web la fecha y hora se registra y se representa en los gráficos.",
	
	"22" => "Introducción a los lugares para visitantes",		
	"23" => "Introducción a la gestión de los miembros",	
	"24" => "Introducción a la gestión de sus afiliados",	
	"25" => "Introducción a la gestión de los miembros de su prohibición",		
	"26" => "Introducción a la gestión de sus archivos de miembro",
	"27" => "Introducción a los Miembros importados",	
	"28" => "Introducción a los temas del sitio web",
	"29" => "Introducción al Editor de Temas",	
	"30" => "Introducción a la Gestión de las imagenes",
	"31" => "Introducción a Logo Editor",
	"32" => "Introducion a Meta Tags",	
	"33" => "Introduccion a los  Languages",
	"34" => "Introduccion a la gestion de  Emails",	
	"35" => "Introducción a las Plantillas de correo electrónico",		
	"36" => "Introducción a los informes de correo electrónico",
	"37" => "Introduccion al envio Newsletters",
	"38" => "Introducción a los recordatorios de correo electrónico",
	"39" => "Introducción a la descarga de direcciones de correo electrónico",
	"40" => "Introducción a la Composición Packs",
	"41" => "Introducción a las Pasarelas de Pago",
	"42" => "Introducción a la Historia de facturación de miembros",
	"43" => "Introducción a la Historia de facturación de afiliados",
	"44" => "Introducción a las Opciones de Visualización",
	"45" => "Introducción a la configuración de la pantalla",
	"46" => "Introducción al Sistema de Rutas",
	"47" => "Introducción a la marca de agua",
	"48" => "Introducción a los Campos de búsqueda",
	"50" => "Introducción al Calendario de Eventos",
	"51" => "Introducción al sitio web de encuestas",
	"52" => "Introducción al sitio web del Foro",
	"53" => "Introducción a las Salas de Chat",
	"54" => "Introducción al sitio web de Preguntas más frecuentes",
	"55" => "Introducción al filtro de palabras",
	"56" => "Introducción a las Noticias / Artículos",
	"57" => "Introducción a los Grupos",

		"22a" => "Las ubicaciones de los visitantes en el mapa determina la localización de cada uno de los miembros de su sitio web que le permite ver de un vistazo la que los países se están uniendo a sus miembros de.",		
		"23a" => "La gestión de la herramienta de los miembros le permite ver todos los miembros que se han unido a su sitio web. Utilice las opciones de búsqueda para filtrar a través de sus miembros para editar, actualizar y eliminar perfiles de usuario.",	
		"24a" => "La herramienta Administrador de afiliados le permite ver de un vistazo todas sus filiales sitio web, usted puede ver, editar y borrar los afiliados de su sitio web y aprobar el registro de nuevos afiliados.",	
		"25a" => "Las tiendas prohibido miembros de la sección todos los registros de miembros y no miembros que están tratando de 'hack' en su sitio web, el software automáticamente de la lista de presuntos miembros de visualización de su sitio web para evitar que la causa de su sitio web de cualquier daño",		
		"26a" => "La herramienta de miembros de archivos le permite ver todos los archivos que has subido de miembros del sitio web, música, fotos, video, etc se pueden manejar todos aquí. Haga clic en cualquiera de las fotos para editar la foto con nuestro construido en herramienta de recorte.",
		"27a" => "La herramienta de importación de miembro le permite importar los miembros de otras aplicaciones de software. Simplemente introduzca la información de base de datos para el sitio web en la que su antiguo sistema se almacena y se transfiere a su nuevo sitio web.",	
		"28a" => "La sección de temas le permite cambiar la plantilla del sitio Web y el diseño de su sitio al instante! Simplemente haga clic en el tema que desea utilizar y el sitio web se actualizará automáticamente.",
		"29a" => "El Editor de Tema  le permiten editar las páginas de la web directamente desde el área de administración. Es posible que también desee copiar y pegar el código en su propio editor de sitios web y pegarlo de nuevo la edición de una vez que haya terminado.",	
		"30a" => "La gestion de imagenes del tema le permite cambiar la imagen actual de su sitio web mediante la subida de otros nuevos. Nuevas imágenes reemplazará a la imagen actual y se aplica inmediatamente a su sitio web.",
		"31a" => "El  Editor  de logo le permite cambiar el diseño de su logo actual. Es posible que también desee crear su propio logotipo utilizando su propio paquete de edición de imagen y luego seleccione la opción 'subir mi propio logo para agregar esto a su sitio web.",
		"32a" => "La característica de Meta Tags te permite editar todas las meta tags para páginas del sitio web generado por el software. Puede añadir su propio título, palabras clave y descripciones para cada una de sus páginas web. ",	
		"33a" => "La herramienta de gestión de idiomas le permite eliminar cualquier idioma de su sitio web que usted no desea utilizar y también añadir su propio paquete de idioma.",
		"34a" => "Las herramientas de gestión de correo electrónico le permiten crear su propio sistema de mensajes de correo electrónico y boletín de noticias para dar a su sitio web un toque personal único.",	
		"35a" => "Introducción a las Plantillas de correo electrónico",		
		"36a" => "Introducción a los informes de correo electrónico ",
		"37a" => "Introducción a enviar boletines",
		"38a" => "Introducción a los recordatorios de correo electrónico",
		"39a" => "Introducción a la descarga de direcciones de correo electrónico",
		"40a" => "Introducción a la Composición Paquetes",
		"41a" => "Introducción a las Pasarelas de Pago",
		"42a" => "Introducción a la Historia de facturación de miembros",
		"43a" => "Introducción a la Historia de facturación de afiliados",
		"44a" => "Introducción a las Opciones de Visualización",
		"45a" => "Introducción a la configuración de la pantalla",
		"46a" => "Introducción al Sistema de Rutas",
		"47a" => "Introducción a la marca de agua",
		"48a" => "Introducción a los Campos de búsqueda",
		"50a" => "Introducción al Calendario de Eventos",
		"51a" => "Introducción al sitio web de encuestas",
		"52a" => "Introducción al sitio web del Foro",
		"53a" => "Introducción a las Salas de Chat",
		"54a" => "Introducción al sitio web de Preguntas más frecuentes",
		"55a" => "Introducción al filtro de palabras",
		"56a" => "Introducción a las Noticias / Artículos",
		"57a" => "Introducción a los Grupos",
);

$admin_login = array(

	"1" => "Admin Area Login",
	"2" => "¿Olvidaste tu contraseña? No se preocupe, introduzca su dirección de correo electrónico y le enviaremos una nueva.",
	"3" => "Direccion de Email",
	"4" => "Texto abajo",
	"5" => "Resetea Password",
	"6" => "Introduzca su información a continuación para entrar ",
	"7" => "Nombre de usuario",
	"8" => "Password",	
	"9" => "Licencia",	
	"10" => "Idioma",
	"11" => "Login",
	"12" => "Ip de registro",	
	"13" => "He olvidado la contraseña",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Perfil destacado",
	"2" => "Moderador",
	"3" => "Paquete de membresía",
	"4" => "Enviar correo de actualización",
	"5" => "Añadir cambio paquete a la facturación ",
	"6" => "Número de SMS",
	"7" => "Créditos de SMS",
	"8" => "Establecer Estado de la cuenta de",	
	
	"9" => "Haga clic en la casilla para modificar la contraseña.",	
	"10" => "Los Miembros destacados tienen un fondo diferente en los resultados de búsqueda.",
	"11" => "Esto le da  acceso al miembro para gestionar su sitio web como un moderador.",
	
	"12" => "Página de bienvenida de afiliados",	
	"13" => "Código de visualización de página de banner",	
	"14" => "Página de pago de afiliados",	
	"15" => "Página de resumen de afiliados",
	"16" => "Editar la pagina de cuenta del afiliado ",
	
	"17" => "Miembros de importación de",	
	
	"18" => "Años",			
	"19" => "Vistas del archivo",	
	"20" => "Privado",
	"21" => "Publico",
	
	"22" => "album",		
	"23" => "Contenido para adultos",	
	"24" => "Contenido publico",	
	
	"25" => "Tamaño",		
	"26" => "Mover archivos de adultos a discos",
	"27" => "Archivos de adultos",

);

$admin_selection = array(

	"1" => "Si",
	"2" => "No",
	
	"3" => "On",
	"4" => "Off",
);

$admin_plugins = array(

	"1" => "Plugins extender y ampliar la funcionalidad de eMeeting data de software. Una vez que se instala un plug-in, usted puede activarlo o desactivarlo aquí usando las opciones del menú de la izquierda.",
	"2" => "Usted puede ver y descargar plugins de software nuevo de la zona de clientes de nuestro sitio web.",
	"3" => "Nombre del Plugin",
	"4" => "Plugin Detalles",
	"5" => "Última Actualización",
	"6" => "Estado",

);
$admin_pop_welcome = array(

	"1" => "Bienvenido de nuevo",
	"2" => "A continuacion se muestra un resumen rapido de la suscripcion de miembros y el rendimiento del sitio web de hoy.",
	"3" => "Miembros nuevos hoy",
	"4" => "Archivos por aprobar",
	"5" => "<strong>Recuerde</strong> Si usted no desea recibir estas alertas de bienvenida cuando te conectes a el area de administracion puede desactivarlos en cualquier momento cambiando las preferencias de administracion.",
	"6" => "Cerrar ventana",

);
$admin_pop_chmod = array(

	"1" => "Permisos de archivo de error",
	"2" => "Los archivos en esta página no puede ser modificados",
	"3" => "los siguientes archivos / directorios necesidad de tener 'escribir' permisos establecidos para poder editarlos. Si usted está ejecutando en un sistema Linux o Unix anfitrión de la tela, usted puede utilizar su programa de FTP y el uso de la 'chmod' ( 'Cambiar el modo') para conceder permisos de escritura. Si su servidor está ejecutando Windows, tendrá que contactar con ellos sobre la configuración de permisos de escritura en estos archivos / carpetas.",
	"4" => "Los archivos / directorios que requieren CHMOD 777 son",
	"5" => "Cerrar ventana",

);
$admin_pop_demo = array(

	"1" => "El modo de demostración habilitado",
	"2" => "Los cambios en su sistema, no se guardará en el modo de demostración",
	"3" => "La configuración de acceso al sistema se han establecido para el modo 'demo' que significa acceso a un montón de características y funcionalidad dentro del área de administración se limita a 'sólo lectura'.",
	"4" => "Usted puede navegar en todo el área de administración como normal, sin embargo todas las modificaciones que realice no se guardarán durante este tiempo.",
	"5" => "<strong>Recuerde</strong> Si desea eliminar la restricción de modo de demostración sobre su cuenta, por favor póngase en contacto con la administración del sistema para más detalles.",
	"6" => "Cerrar ventana",
);

$admin_pop_import = array(

	"1" => "Transferencia de resultados de base de datos",
	"2" => "Los miembros fueron importados con éxito!",
	"3" => "Los miembros se han importado con éxito de",
	"4" => "Por favor, siga las siguientes instrucciones para asegurar que las imágenes miembros se actualizan correctamente.",
	"5" => "Las rutas de la carpeta eMeeting están por debajo de la imagen, debe copiar las imágenes desde el sitio web  a los nuevos caminos a continuación;",
	"6" => "Cerrar ventana",
);

$admin_loading= array(

	"1" => "Optimización de las tablas de la  base de datos ",
	"2" => "Espere por favor",

);
$admin_menu_help= array(
"1" => "Guia de ayuda rapida",
);

$admin_settings_extra = array(

	"1" => "Mostrar Pagina de busqueda",
	"2" => "Mostrar página de contacto",
	"3" => "Mostrar  pagina Tour",
	"4" => "Mostrar pagina de FAQ",
	"5" => "Mostrar eventos",
	"6" => "Mostrar grupos",
	"7" => "Mostrar foros",
	"8" => "Mostrar juegos",	
	"9" => "Mostrar red",	
	"10" => "Mostrar sistema de afiliados",
	"11" => "Mostrar SMS / mensajes de texto y alertas del sistema",
	
	"12" => "Mostrar Blogs",	
	"13" => "Mostrar sala de chat",	
	"14" => "Mostrar Instant Messenger",	
	"15" => "Mostrar verificación de Inscripción de la imagen",
	"16" => "Mostrar busqueda por codigo postal",
	"17" => "Mostrar EE.UU. Códigos Postales de búsqueda",
	"18" => "Mostrar MSN / Yahoo Integración",
	
	"19" => "Paquete de membresía por defecto",
		"20" => "Este es el paquete de adhesión  por defecto",
	"21" => "Los miembros deben subir una imagen para unirse ",
		"22" => "Establezca si los miembros están autorizados a saltar la opción de cargar una imagen durante el registro.",	
	"23" => "MODO GRATUITO",
		"24" => "Ponga esto a 'sí' si usted desea todas las características de su sitio web sea accesible por todos.",
	"25" => "MODO MANTENIMIENTO",
		"26" => "Esto impedirá  todos los accesos a su sitio web para los miembros y no miembros y permitir que solo admin's que han iniciado sesión en el área de administración para navegar por el sitio web.",
		
	"27" => "Número de resultados por página",
		"28" => "Seleccione el número de perfiles por cada página que desea que se muestre",		
	"29" => "Número de resultados correspondientes en la página visión general",	
		"30" => "Seleccione el número de perfiles por cada página que desea mostrar.",
		
	"31" => "Codigos de activacion de email",
		"32" => "A los miembros se enviará un código de activación a su correo electrónico que debe ser validada antes de que se puede acceder.",
	"33" => "Aprobar a miembros de forma manual",
	"34" => "Ponga esto a «sí» o «no» en función de si desea comprobar manualmente cuentas de usuario antes de que se puede acceder.",
	"35" => "Aprobar los archivos manualmente",
		"36" => "Ponga esto a «sí» o «no» en función de si desea comprobar manualmente los archivos antes de mostrar",
	"37" => "Aprobar grabaciones de vídeo de forma manual",
		"38" => "Ponga esto a «sí» o «no» dependiendo de si desea comprobar manualmente emisiones miembro (canales de chat de vídeo).",
		
	"39" => "La pantalla de grabar vídeo de felicitación ",
	"40" => "Los miembros pueden grabar su propio mensaje en vídeo para su perfil. Usted debe ingresar su conexión de vídeo flash RMS cadena de abajo.",
	"41" => "Conexion Flash de  RMS String",
		"42" => "Usted necesita una cuenta de alojamiento flash para utilizar este",
	"43" => "Mostrar Formato de la fecha",
		"44" => "Seleccione el formato de fecha que desea que se muestre en su sitio web",
	"45" => "Permitir  Comentarios",
		"46" => "Habilitar esta opción si desea  para poder enviar comentarios en los perfiles y los archivos.",
	"47" => "Despliegue del Chat y la mensajería instantánea en una ventana separada",
	
	"48" => "Habilitar esta opción si desea que la sala de chat de mensajería instantánea se abran en una nueva ventana pop up.",
	
	"49" => "Buscas amistad?",
		"50" => "Habilitar esta opción si estás en Linux o Unix cuenta de alojamiento y están utilizando el valor predeterminado .htaccess file",
	"51" => "Buscar Fotos en blanco",
		"52" => "¿Quieres que los miembros que no han añadido una foto  se muestren en los resultados de búsqueda?.",
	"53" => "Mostrar imágenes de abuso",
		"54" => "Ponga esto en 'sí' o 'no' si desea que las banderas de idiomas  aparezcan en su sitio web.",
	"55" => "Divisas de afiliados",	
	"56" => "Use HTML Editor",	
	"57" => "Ponga esto a «sí» o «no» en función de si desea comprobar manualmente los archivos antes de mostrar",

	"58" => "Mostrar los artículos en la Pagina",

);

$admin_billing_extra = array(

	"1" => "Ponga esto a 'sí' si usted desea todas las características de su sitio web sea accesible por todos.",
	
	"2" => "Tipo de pack",
	"3" => "Pack de membresia",
	"4" => "pack SMS",
	"5" => "Seleccione Sí si desea crear un paquete de SMS sólo permite este paquete para ser utilizado para la compra adicional de créditos de SMS en su sitio web.",
	"6" => "Nombre del Pack",
		"7" => "Escriba un nombre para este paquete, este se mostrará en la página de suscripción.",
	"8" => "Descripcion",	
	"9" => "Precio",	
	"10" => "¿Cuánto quiere usted cobrar por suscribirse a este paquete? Nota. No ingrese los símbolos de moneda",
	"11" => "Mostrar El Código de moneda",
	
	"12" => "Este es el código de moneda que se muestra en su sitio web, esta no se utiliza para su moneda de pago, este tiene que establecer en las opciones de pago.",	
	"13" => "Subscripcion",	
	"14" => "Seleccione Sí si desea que se trata de un pago periódico.",	
	"15" => "Periodo de actualización",
	
	"16" => "Dia",
	"17" => "Semana",
	"18" => "Mes",
		"18a" => "Ilimitado",
	"19" => "Número máximo de mensajes (todos los días)",
		"20" => "Este es el número máximo de mensajes que los miembros pueden enviar por día.",
	"21" => "Maximo de guiños",
		"22" => "El número máximo de guiños a un miembro con este paquete puede enviar cada día.",	
	"23" => "Número máximo de envío de archivos",
		"24" => "El número máximo de archivos que un miembro puede subir.",
	"25" => "Icono link de paquete",
		"26" => "El vínculo icono del paquete tiene que ser un enlace a una imagen en su sitio web. El tamaño recomendado: 28px x 90px.",
		
	"27" => "Miembro destacado",
		"28" => "Seleccione Sí si desea que los miembros con fotos  también se mostrará en la parte frontal de su sitio web.",		
	"29" => "Destacados",	
		"30" => "Seleccione Sí si desea que los miembros de este paquete puedan tener un fondo de relieve en los resultados de búsqueda.",
		
	"31" => "Ver imagenes de adulto",
		"32" => "Seleccione Sí si desea que los miembros de este paquete puedan poder ver los miembros de imágenes para adultos.",
	"33" => "Creditos SMS",
	"34" => "Este es el número de créditos de SMS añadido a los miembros de la cuenta cuando se actualicen a este paquete. Esto se añade a la cantidad actual en caso de que ya tienen créditos.",
	"35" => "Visible en el paquete de actualización"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Sólo entrar  un vínculo si desea un vínculo a un sitio web externo",
	"3" => "Noticias RSS feed de datos",
	
	"4" => "Categoria",
	"5" => "Vistas",
	"6" => "Leyenda",
	"7" => "Idioma",
	"8" => "Grupo privado",
		
	"9" => "Cambiar Foro ",	
	"10" => "Selecionar Foro",
	"11" => "Foro por defecto",
	
	"12" => "Usted está utilizando un foro de terceros. Por favor, identifíquese con su área de administración para administrar su foro.",	
	"13" => "Password"
);

$admin_set_extra1 = array(

	"1" => "Permitir carga de fotos / imágenes",
	"2" => "Permitir carga de Video",
	"3" => "Permitir carga de musica",	
	"4" => "Permitir carga YouTube ",	
);

$admin_alerts = array(

	"1" => "Alertas",
	"2" => "Nuevo visitante",
	"3" => "Nuevo miembro",	
	"4" => "Miembros no aprobados",	
	"5" => "Archivo no aprobado",
	"6" => "nuevas actualizaciones",	
);

$lang_members_nn = array(

	"0" => "Monitor de Miembros de Abuso",
	"1" => "Nombre de usuario o ID",
	"2" => "No se ha encontrado Historial de Chat",	
);

$members_opts = array(

	"1" => "Editar perfil",
	"2" => "Carga de Archivos",
	"3" => "Historial de facturación",	
	"4" => "Enviar Email",	
	"5" => "Enviar Mensaje",
	"6" => "Escribir en el foro",
	"7" => "Mensaje del Abuso",	
);
?>