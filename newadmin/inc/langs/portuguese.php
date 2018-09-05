<?php

$admin_charset = '';

ini_set('default_charset', 'iso-8859-1');

$LANG_ = array(
"_language" => "Portuguese",
"_charset" => "iso-8859-1",
);
$GLOBALS['_META'] = $LANG_;

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "iso-8859-1",
	"title" => "Área de Administraçao"

);

$admin_layout = array(

	"3" => "Preferencias",
	"4" => "Sair",

);


$admin_layout_page1 = array(

	"" => "Painel de instrumentos",

		"_*" => "Admin painel de instrumentos",
		"_?" => "",

	"members" => "Estatísticas membros",

		"members_*" => "Estatísticas membros",
		"members_?" => "O gráfico abaixo mostra o número de inscriçao de novos membros ao longo das últimas duas semanas.",
		"members_^" => "sub",

	"affiliate" => "Estatísticas afiliados",

		"affiliate_*" => "Estatísticas afiliados",
		"affiliate_?" => "O gráfico abaixo mostra o número de inscriçao de novos afiliados ao longo das últimas duas semanas.",
		"affiliate_^" => "sub",

	"visitor" => "Estatísticas de visitantes",

		"visitor_*" => "Estatísticas de visitantes",
		"visitor_?" => "O gráfico abaixo mostra o número de estatísticas de web site visitantes registados pelo software em cada dia durante as últimas duas semanas.",
		"visitor_^" => "sub",

	"maps" => "Mapas google",

		"maps_*" => "Visitante locais com mapas google",
		"maps_?" => "Esta secçao permite ver onde no mundo os seus membros estao a juntar-se a partir de seu site. Isto permite-lhe desenvolver o seu marketing e campanhas publicitárias de forma mais eficaz, orientando e acompanhando diferentes países.",


	"adminmsg" => "Anúncios do site",

		"adminmsg_*" => "Anúncios do site",
		"adminmsg_?" => "Digite a sua mensagem na caixa abaixo e cada vez que um membro se registar na sua conta, a mensagem será exibida. Isso é óptimo para mostrar anúncios de serviço ou mudanças no seu site.",

);


$admin_layout_page2 = array(

	"" => "Membros",

		"_$" => "Metada",
		"_*" => "Administrar membros",


			"edit" => "Detalhes dos membros",

				"edit_*" => "Editar membro",
				"edit_?" => "Utilize as opçoes abaixo para actualizar contas de membros e detalhes do perfil.",
				"edit_^" => "Nenhum",


			"fake" => "Falsos membros",

				"fake_*" => "Gerar falsos membros",
				"fake_?" => "Utilize as opçoes abaixo para gerar falsos membros para o seu site, isso irá ajudar o seu site parece ter membros ao começar. É recomendado que voce use o mesmo endereço de e-mail para todos os membros falso, caso os deseja localizar e excluí-los numa data posterior.",
				"fake_^" => "sub",

	"banned" => "Membros banidos",

		"banned_*" => "Membros banidos",
		"banned_?" => "O software foi construído com um sistema de detecçao de hacker que bloqueia automaticamente os membros que estao a tentar cortar o seu site. Abaixo estao todos os membros (e nenhum membro) que fizeram tentativas.",
		"banned_^" => "sub",

	"monitor" => "Monitorizar membros",

		"monitor_*" => "Monitorizar membros",
		"monitor_?" => "De tempo em tempo os membros podem abusar do sistema de mensagens ou o envio de mensagens desagradáveis ou indesejáveis. Voce pode usar esta ferramenta para visualizar e acompanhar as mensagens dos membros para ajudar a proteger a segurança dos outros.",
		"monitor_^" => "sub",

	"import" => "Importar membros",

		"import_*" => "Importa membros de banco de dados ou arquivo CVS",
		"import_?" => "Usando as opçoes abaixo, voce pode importar os membros para o seu site a partir de outra base de dados ou de um backup CVS.",
		"import_^" => "sub",

	"files" => "Álbuns membros",
	"files_*" => "Ficheiros álbuns dos membros",


	"addfile" => "Upload foto",
	"addfile_*" => "Upload uma foto",
	"addfile_?" => "Rs vezes, um membro terá dificuldade em fazer upload de uma foto para o seu site. Usando esta secçao, voce pode enviar uma foto para o seu membro.",
	"addfile_^" => "sub",


	"affiliate" => "Afiliados do seu Site",

		"affiliate_*" => "Afiliados do seu Site",
		"affiliate_?" => "Usando as opçoes abaixo, voce pode administrar os afiliados do seu site.",

			"addaff" => "Adicionar novo afiliado",

				"addaff_*" => "Adicionar/Editar conta de afiliado",
				"addaff_?" => "Complete todos os campos abaixo para adicionar/editar uma conta de afiliado no seu site.",
				"addaff_^" => "sub",

			"affsettings" => "Páginas de afiliados",

				"affsettings_*" => "Página design afiliados",
				"affsettings_?" => "Utilize as opçoes abaixo para editar o texto das páginas dos seus afiliados.",
				"affsettings_^" => "sub",

			"affcom" => "Afiliados comissoes",

				"affcom_*" => "Afiliados comissoes ",
				"affcom_?" => "Aqui voce pode definir a taxa de comissao para os seus afiliados. Isto significa que para cada venda feita por um membro vindo de um site afiliado, será gerada uma percentagem da venda total.",
				"affcom_^" => "sub",


			"affban" => "Banners de afiliados",

				"affban_*" => "Banners de afiliados",
				"affban_?" => "Aqui voce pode configurar os banners de anúncios que serao exibido dentro da conta dos seus afiliados para eles usarem no seu site.",
				"affban_^" => "sub",

);


$admin_layout_page3 = array(



		"" => "Tema galeria",

			"_*" => "Tema galeria",
			"_?" => "Listados abaixo estao os sites modelos que estao actualmente instalados no seu site. Clique na imagem para visualizar instantaneamente ou mudar o modelo do seu site.",


			"color" => "Esquema de cores",

				"color_*" => "Esquema de cores",
				"color_?" => "Usando as opçoes abaixo, voce pode personalizar o esquema de cores do seu site. Se deseja substituir as imagens pelas suas, por favor, use as ferramentas de imagem tema.",
				"color_^" => "sub",

			"logo" => "Logótipo do seu site",
				"logo_$" => "metade",
				"logo_*" => "Logótipo do seu site",
				"logo_?" => "Utilize as opçoes para personalizar a aparencia do logótipo do seu site. Voce pode seleccionar um logótipo pré-desenhado ou fazer um upload do seu próprio.",
				"logo_^" => "sub",

			"img" => "Tema imagens",
				"img_$" => "metade",
				"img_*" => "Tema imagens",
				"img_?" => "As imagens abaixo sao todas as que estao armazenadas dentro do seu modelo na pasta de imagens. Utilize as opçoes abaixo para substituir as imagens existentes por novas.",
				"img_^" => "sub",

			"text" => "Texto da página inicial",
				"text_$" => "Metade",
				"text_*" => "Texto da página inicial",
				"text_?" => "Os campos abaixo permitem-lhe alterar o texto de boas-vindas na página inicial do seu site. Alguns modelos utilizam diferentes conjuntos de pares de formulaçao de modo que pode precisar de experimentar para descobrir qual é o certo para si.",
				"text_^" => "sub",


			"terms" => "Termos e Condiçoes",
				"terms_$" => "metade",
				"terms_*" => "Termos e Condiçoes do site",
				"terms_?" => "Edite o campo abaixo para personalizar os termos e condiçoes do seu site. Estes sao exibidos na página durante a inscriçao.",
				"terms_^" => "sub",

			"edit" => "Páginas e ficheiros",

			"edit_*" => "Páginas Website",
			"edit_?" => "Escolha a partir das caixas de listagem abaixo para visualizar o conteúdo dos arquivos do seu site. É recomendado copiar e colar o código para um editor como FrontPage ou Dreamweaver antes de editar. <b> Por favor tome muito cuidado, as alteraçoes sao instantâneas e nao pode ser desfeita. </a>",



				"newpage" => "Criar página",
				"newpage_$" => "metade",
				"newpage_*" => "Criar nova página",
				"newpage_?" => "Criar uma nova página no seu site é fácil. Basta digitar um título na caixa de texto abaixo e a sua página será criada pronta para ediçao.",
				"newpage_^" => "sub",


			"meta" => "Tema Meta Tags",
				"meta_$" => "metade",
				"meta_*" => "Editor Meta Tag",
				"meta_?" => "Temos um sofisticado sistema de criaçao de meta tag incorporadas ao software economizando tempo e dinheiro na criaçao de milhares de descriçoes de páginas. O software irá gerar automaticamente o título, meta tags descriçao e palavra-chave com base no conteúdo exibido nas páginas.",
				"meta_^" => "sub",




			"menu" => "Barras menu",
				"menu_$" => "metade",
				"menu_*" => "Gestao Barra menu",
				"menu_?" => "Utilize as opçoes abaixo para alterar a ordem das barras de seus membros ou adicionar novos itens de menu. Voce também pode inserir links externos, tais como http://google.com, um link do menu para outro item de menu se quiser link para outro site ou página do seu site.",
				"menu_^" => "sub",

	"manager" => "Gestao de ficheiros",
		"manager_$" => "metade",
		"manager_*" => "Gestao de ficheiros",
		"manager_?" => "O gestor de ficheiros é muito útil quando quer adicionar ou excluir novos arquivos / conteúdo no seu site. Voce pode consultar a sua conta de hospedagem e apagar ficheiros que sao necessários.",

			"slider" => "Rodar imagens",
				"slider_$" => "metade",
				"slider_*" => "Página principal rodar imagens",
				"slider_?" => "As imagens rotativas, sao as imagens na página principal do seu site. Use as opçoes abaixo para alterar a imagem, descriçao e links clicáveis.",
				"slider_^" => "sub",

	"languages" => "Ficheiros de idioma",
		"languages_$" => "metade",
		"languages_*" => "Ficheiros de idioma",
		"languages_?" => "Listados abaixo estao todos os arquivos de idioma carregados do seu site. Voce pode excluir qualquer um dos idiomas, marque a caixa para alterar o idioma padrao do site. <b> Note, voce deve sair do painel de administraçao e do site para ver as alteraçoes linguísticas</b>",

			"editlanguage" => "Editar ficheiros de idioma",
				"editlanguage_$" => "metade",
				"editlanguage_*" => "Editar ficheiros de idioma",
				"editlanguage_?" => "Tome cuidado ao editar o ficheiro de idioma, certifique-se de manter a mesma sintaxe para evitar os erros do sistema. Apenas inserir o conteúdo dentro e depois da seta (=>) . O primeiro valor é usado como uma chave.",
				"editlanguage_^" => "sub",

			"addlanguage" => "Adicionar idioma",
				"addlanguage_$" => "metade",
				"addlanguage_*" => "Adicionar idioma",
				"addlanguage_?" => "Para criar um novo ficheiro de idioma, simplesmente copie um dos existentes e renomeio-o, voce pode entao abrir o ficheiro e editar o seu conteúdo.",
				"addlanguage_^" => "sub",



);


$admin_layout_page4 = array(

	"" => "E-mail e boletins",

		"_$" => "metade",
		"_*" => "E-mail e boletins informativos",
		"_?" => "Abaixo está uma lista de todos os e-mails actualmente armazenados no sistema. Sistema de e-mails sao usados pelo software para enviar e-mails aos membros, quando os eventos acontecem, como durante o registro ou perda de senha. Voce pode personalizar todos os e-mails e criar seus próprios utilizando as opçoes abaixo",

			"add" => "Criar um novo e-mail",
				"add_$" => "metade",
				"add_*" => "Adicionar/Editar novo e-mail",
				"add_?" => "Complete o formulário abaixo para adicionar/editar o seu novo e-mail, este será salvo na pasta modelo e-mail personalizado, para que possa retornar a ela ou enviá-lo a qualquer momento que pretenda.",
				"add_^" => "sub",

	"welcome" => "Bem-vindo E-mail/SMS",
		"welcome_$" => "metade",
		"welcome_*" => "Configurar E-mail Bem-vindo/SMS",
		"welcome_?" => "Usando as opçoes abaixo, voce pode decidir qual o e-mail / mensagem de texto é enviado para o membro quando eles fazem a sua primeira inscriçao.",
		"welcome_^" => "sub",

	"template" => "Modelos de e-mail",
		"template_$" => "metade",
		"template_*" => "Modelos de e-mail",
		"template_?" => "Listadas abaixo, está uma selecçao de modelo construídos no software. Clique em qualquer uma das imagens para abrir e editar o modelo.",
		"template_^" => "sub",

	"export" => "Baixar e-mails",

		"export_$" => "metade",
		"export_*" => "Baixar e-mails",
		"export_?" => "Utilize as opçoes abaixo para baixar todos os seus endereços de e-mail dos seus membros do banco de dados.",
		"export_^" => "sub",

	"sendnew" => "Enviar boletins",

		"sendnew_$" => "metade",
		"sendnew_*" => "Enviar boletim informativo",
		"sendnew_?" => "Use esta secçao para começar a enviar boletins informativos para os seus membros. Primeiro, seleccione quais os membros a que quer enviar e qual e-mail.",

	"send" => "Enviar e-mail único",

		"send_$" => "metade",
		"send_*" => "Enviar e-mail único",
		"send_?" => "Utilize esta opçao para enviar um único e-mail a um membro digitando o endereço de e-mail abaixo. O e-mail usado para enviar é o mesmo listado na sua conta de administrador.",
		"send_^" => "sub",

	/*"auto" => "Email Scheduler",

		"auto_$" => "half",
		"auto_*" => "Automatic Email Scheduler",
		"auto_?" => "Automatic emails are emails that are sent out by the software on a timely manner such as once a day, week, month etc. You can setup such emails below.",
		"auto_^" => "sub",*/

	"subs" => "E-mail lembretes",

		"subs_$" => "metade",
		"subs_*" => "E-mail lembretes",
		"subs_?" => "Lembretes de e-mail, permite que voce envie e-mails para membros que estejam dentro de um número de X dias para um evento. Ex: a sua adesao a terminar ou nao adicionar uma foto.",
		"subs_^" => "sub",

	"tc" => "Relatórios de e-mail",
		"tc_$" => "metade",
		"tc_*" => "Relatórios de e-mail",
		"tc_?" => "Relatórios e-mail sao gerados quando uma mensagem que contém o código de monitoramento é enviado. Eles geram estatísticas de quantos membros abrem os e-mails que voce envia.",
		"tc_^" => "sub",

			"tracking" => "Monitoramento de e-mail",
				"tracking_$" => "metade",
				"tracking_*" => "Código de monitoramento de e-mail",
				"tracking_?" => "O código de monitoramento abaixo (tracking_id) passa a ter uma imagem transparente, que é anexa ao e-mail quando ele é enviado. Se o e-mail for aberto e a imagem nao for bloqueada, o sistema grava que o e-mail foi aberto e gerar um relatório de monitoramento para si.",
				"tracking_^" => "sub",



	"SMSsend" => "Enviar SMS",

		"SMSsend_$" => "metade",
		"SMSsend_*" => "Enviar SMS",
		"SMSsend_?" => "Utilize as opçoes abaixo para enviar SMS/Mensagens de texto para os telemóveis dos seus membros.",
);

$admin_layout_page5 = array(

	"" => "Níveis de acesso",

		"_$" => "metade",
		"_*" => "Níveis de acesso",
		"_?" => "Listados abaixo estao todos os pacotes de adesao corrente aplicados ao seu site. Os que estao destacados em verde sao exigidos pelo sistema para o controle de como os visitantes e novos membros sao tratados dando-lhe mais controle sobre o seu site.",

			"epackage" => "Adicionar pacote",
				"epackage_$" => "metade",
				"epackage_*" => "Adicionar/Editar pacote",
				"epackage_?" => "Complete o formulário abaixo para adicionar ou actualizar o pacote de adesao para o seu site.",
				"epackage_^" => "sub",

			"packaccess" => "Controle o acesso",
				"packaccess_$" => "completo",
				"packaccess_*" => "Controle o acesso r página",
				"packaccess_?" => "Aqui voce pode controlar o acesso ao site inteiro baseado no pacote de adesao. <b> Nota: Apenas marque a caixa se nao deseja que o membro veja esta página. </b>",
				"packaccess_^" => "sub",

			"upall" => "Transferir membros",
				"upall_$" => "metade",
				"upall_*" => "Transferir membros entre os pacotes",
				"upall_?" => "Utilize esta opçao é que voce deseja transferir os membros de um nível de acesso para outro.",
				"upall_^" => "sub",


	"gateway" => "Gateways de pagamento",

		"gateway_$" => "metade",
		"gateway_*" => "Gateways de pagamento",
		"gateway_?" => "Gateways de pagamento permite-lhe tirar o pagamento de actualizaçao (upgrades) para os seus membros. Se estiver a executar um site gratuito, pode desligar o sistema de pagamento na área de configuraçoes.",


			"addgateway" => "Ad gateway",
				"addgateway_$" => "metade",
				"addgateway_*" => "Adic. gateway",
				"addgateway_?" => "O software tem um número de gateways de pagamento já incorporado ao sistema, seleccione o provedor na lista abaixo para usar no seu site.",
				"addgateway_^" => "sub",


	"billing" => "Facturamento",

		"billing_$" => "metade",
		"billing_*" => "Facturamento",


		"affbilling" => "Histórico de factu. da filial",

			"affbilling_$" => "metade",
			"affbilling_*" => "Histórico de facturamento da filial",
			"affbilling_^" => "sub",


);

$admin_layout_page6 = array(

	"" => "Banners e publicidade",

		"_$" => "metade",
		"_*" => "Banners e Publicidade",


			"addbanner" => "Adicionar banner",
				"addbanner_$" => "metade",
				"addbanner_*" => "Adicionar banner",
				"addbanner_?" => "Utilize as opçoes abaixo para adicionar um novo banner ao seu site.",
				"addbanner_^" => "sub",


);

$admin_layout_page7 = array(

	"" => "Mostrar configuraçoes",

		"_$" => "metade",
		"_*" => "Mostrar configuraçoes",
		"_?" => "Use as opçoes abaixo para activar e desactivar funcionalidades do site.",


	"op" => "Mostrar opçoes",

		"op_$" => "metade",
		"op_*" => "Mostrar opçoes",
		"op_?" => "Utilize as opçoes abaixo para personalizar as configuraçoes do site.",

		"op1" => "Configurar de pesquisa",

			"op1_$" => "metade",
			"op1_*" => "Mostrar configuraçoes de pesquisa",
			"op1_?" => "Use as opçoes abaixo para personalizar a maneira como as páginas de pesquisa sao exibidas no seu site.",
			"op1_^" => "sub",

		"op2" => "Configuraçao de membros",

			"op2_$" => "metade",
			"op2_*" => "Configuraçao de membros",
			"op2_?" => "Utilize as opçoes abaixo para personalizar como a configuraçao de membros é exibida.",
			"op2_^" => "sub",

		"op3" => "Servidor flash",

			"op3_$" => "metade",
			"op3_*" => "Configuraçoes do servidor flash",
			"op3_?" => "Um servidor de flash é usado para armazenar saudaçoes de vídeo do membro, é usado também dentro do IM e bate-papo para mostrar as câmaras de vídeo.",
			"op3_^" => "sub",

		"op4" => "Configuraçoes API",

			"op4_$" => "metade",
			"op4_*" => "Configuraçoes API",
			"op4_^" => "sub",

		"thumbnails" => "Imagens padrao",

			"thumbnails_$" => "metade",
			"thumbnails_*" => "Imagens padrao",
			"thumbnails_^" => "Listados abaixo estao todas as imagens padrao para quando os membros nao carregar as suas próprias fotos.",

	"email" => "Configuraçoes e-mail",

		"email_$" => "metade",
		"email_*" => "Configuraçoes e-mail",
		"email_?" => "Abaixo está a lista de eventos do site, voce pode seleccionar quais eventos para o qual o sistema envia um e-mail de notificaçao. Estas notificaçoes de e-mail serao enviadas para todos os administradores que tem acesso rs configuraçoes do sistema.",

	"paths" => "Caminhos Pastas",

		"paths_$" => "metade",
		"paths_*" => "Caminhos Pastas",
		"paths_?" => "Os caminhos das pastas e ficheiros a seguir referem-se aos arquivos e pastas da sua conta de hospedagem. O software irá automaticamente cria-las durante o processo de instalaçao, no entanto se por algum motivo eles estao incorrectos pode modificá-los abaixo.",

	"watermark" => "Marca d'água",

		"watermark_$" => "metade",
		"watermark_*" => "Marca d'água",
		"watermark_?" => "Uma marca d'água da imagem é uma imagem que é exibida na parte superior das fotos dos membros. Estas sao geralmente o seu logótipo, a imagem de marca d'água deve estar no formato PNG, 8bit.",


);


$admin_layout_page8 = array(

	"" => "Campos site",

		"_$" => "metadw",
		"_*" => "Campos do perfil, registro e pesquisa",
		"_?" => "Listados abaixo estao todos os campos actuais listados em seu site. Voce pode seleccionar para mostrar os campos na página de pesquisa, páginas de registo, página de perfil e até mesmo as páginas de correspondencia membro. Pode rápida e facilmente adicionar novos campos utilizando as opçoes abaixo.",

		"addfields" => "Criar novo campo",

			"addfields_$" => "metade",
			"addfields_*" => "Criar novo campo",
			"addfields_?" => "Use as opçoes abaixo para adicionar um novo campo para o seu site. A área é usada para permitir que membros possam preencher as informaçoes sobre si.",
			"addfields_^" => "sub",

		"fieldgroups" => "Gerir grupos",

			"fieldgroups_$" => "metade",
			"fieldgroups_*" => "Gerir campos grupos",
			"fieldgroups_?" => "Grupos sao uma colecçao de campos que tem um tema comum. Assim, por exemplo, voce pode criar um grupo chamado 'Sobre mim' e dentro do grupo adicionar campos como 'Meu Nome',' Minha Idade', etc <b> Se excluir um grupo com os campos, os campos serao automaticamente transferidos para o próximo grupo.",
			"fieldgroups_^" => "sub",

		"addgroups" => "Criar novo campo",

			"addgroups_$" => "metade",
			"addgroups_*" => "Criar novo campo",
			"addgroups_?" => "Um grupo de campos é uma colecçao de campos colocados sob um título do grupo principal. Isto permite-lhe criar lotes de grupos com os campos que estao relacionados com o tema do grupo.",
			"addgroups_^" => "sub",




	"cal" => "Calendário de eventos",

		"cal_$" => "metade",
		"cal_*" => "Calendário de eventos",
		"cal_?" => "O calendário de eventos é exibido no site para os membros poderem criar e visualizar os eventos. Utilize as opçoes abaixo para criar, editar e importar novos eventos.",

		"caladd" => "Adicionar um evento",

			"caladd_$" => "metade",
			"caladd_*" => "Adicionar/Editar evento",
			"caladd_?" => "Preencha os campos abaixo para adicionar/editar um evento.",
			"caladd_^" => "sub",

		"caladdtype" => "Gerir tipos de evento",

			"caladdtype_$" => "metade",
			"caladdtype_*" => "Gerir tipos de evento",
			"caladdtype_?" => "Utilize as opçoes abaixo para criar novos tipos de eventos, é recomendado adicionar uma imagem a cada evento para o seu site ter um aspecto mais profissional.",
			"caladdtype_^" => "sub",

		"importcal" => "Importar eventos",

			"importcal_$" => "metade",
			"importcal_*" => "Pesquisar & importar eventos",
			"importcal_?" => "O software tem um sistema de eventos api. Isso permite que voce procure um banco de dados mundial de eventos locais e internacionais e adicioná-los directamente no o seu site.",
			"importcal_^" => "sub",


	"poll" => "Votaçao Site",

		"poll_$" => "metade",
		"poll_*" => "Votaçao site",
		"poll_?" => "Utilize as opçoes abaixo para criar e administrar as votaçoes do seu site",

		"polladd" => "Adicionar votaçao",

			"polladd_$" => "metade",
			"polladd_*" => "Criar uma nova votaçao",
			"polladd_?" => "Preencha os campos abaixo para criar uma nova votaçao para o seu site.",
			"polladd_^" => "sub",



	"forum" => "Web Site Fórum",

		"forum_$" => "metade",
		"forum_*" => "Categorias do fórum",
		"forum_?" => "Utilize as opçoes abaixo para editar as categorias do fórum. É recomendado adicionar ícones de foto para cada categoria para seu site ter um aspecto mais profissional.",

		"forumadd" => "Adicionar categoria",

			"forumadd_$" => "metade",
			"forumadd_*" => "Adicionar categoria",
			"forumadd_?" => "Preencha os campos abaixo para adicionar uma nova categoria.",
			"forumadd_^" => "sub",

		"forumchange" => "Fórum de terceiros",

			"forumchange_$" => "metade",
			"forumchange_*" => "Editar fórum integraçao",
			"forumchange_?" => "O software tem a capacidade de mudar a base do fórum, isso significa que voce pode escolher qualquer um dos fóruns abaixo para usar em vez do padrao. Por favor, consulte os manuais de instalaçao para cada placa dos fórum antes de habilitar esse recurso.",
			"forumchange_^" => "sub",

		"forumpost" => "Editar mensagens",

			"forumpost_$" => "metade",
			"forumpost_*" => "Editar mensagens",
			"forumpost_?" => "Listados abaixo estao todas as mensagens recentes adicionadas pelos seus membros. Use as opçoes abaixo para editar ou apagar tópicos que sao abusivos.",
			"forumpost_^" => "sub",

	"chatrooms" => "Salas de chat",

		"chatrooms_$" => "metade",
		"chatrooms_*" => "Salas de chat",
		"chatrooms_?" => "Utilize as opçoes abaixo para criar novas salas de chat ou editar as já existentes.",


	"faq" => "Web site FAQ",

		"faq_$" => "half",
		"faq_*" => "Web site FAQ",
		"faq_?" => "As FAQ sao uma óptima maneira de ajudar os membros a aprenderem mais sobre seu site e responder a quaisquer problemas que possam ter. Crie o seu próprio conjunto de FAQ e edite-os usando as opçoes abaixo.",

		"faqadd" => "Adicionar FAQ",

			"faqadd_$" => "metade",
			"faqadd_*" => "Adicionar/Editar FAQ",
			"faqadd_?" => "Preencha os campos abaixo para adicionar ou editar uma entrada de FAQ.",
			"faqadd_^" => "sub",

	"words" => "Filtro de Palavras",

		"words_$" => "metade",
		"words_*" => "Filtro de palavras",
		"words_?" => "O filtro de palavras é aplicado a perfis de membros, mensagens instantâneas e fórum. Filtra qualquer uma das palavras que voce inserir aqui e substituí-los com as estrelas (**).",



	"articles" => "Artigos",

		"articles_$" => "metade",
		"articles_*" => "Artigos",
		"articles_?" => "Artigos do site sao uma óptima maneira de manter os seus membros actualizados com as últimas alteraçoes ao seu site de notícias e eventos",


		"articleadd" => "Adicionar um artigo",

			"articleadd_$" => "metade",
			"articleadd_*" => "Criar um artigo",
			"articleadd_?" => "Preencha os campos abaixo para adicionar um novo artigo no seu site.",
			"articleadd_^" => "sub",

		"articlerss" => "Importar Artigos RSS",

			"articlerss_$" => "metade",
			"articlerss_*" => "Importar artigos RSS",
			"articlerss_?" => "Os links RSS podem ser usado para importar artigos RSS directamente para uma das categorias que criou. Assim, por exemplo, voce pode querer criar uma categoria 'News' e digite o feed RSS de um site de notícias. O software irá extrair todos os artigos de RSS e adicioná-los ao seu site.",
			"articlerss_^" => "sub",

		"articlecats" => "Categorias do artigo",

			"articlecats_$" => "metade",
			"articlecats_*" => "Categorias do artigo",
			"articlecats_?" => "Use as opçoes abaixo para criar categorias de artigo para o seu site.",
			"articlecats_^" => "sub",


	"groups" => "Grupos da comunidade",

		"groups_$" => "metade",
		"groups_*" => "Grupos da comunidade",
		"groups_?" => "Utilize as opçoes abaixo para criar e administrar os grupos da comunidade  do seu site.",


	"class" => "Anúncios classificados",

		"class_$" => "metade",
		"class_*" => "Anúncios classificados",
		"class_?" => "Listados abaixo estao todos os anúncios classificados criados pelos seus membros.",


		"addclass" => "Adicionar classificados",

			"addclass_$" => "metade",
			"addclass_*" => "Adicionar/Editar classificado",
			"addclass_?" => "Use as opçoes abaixo para adicionar/editar os anúncios do seu site.",
			"addclass_^" => "sub",

		"addclasscat" => "Gerir as categorias",

			"addclasscat_$" => "metade",
			"addclasscat_*" => "Gerir as categorias",
			"addclasscat_?" => "Utilize as opçoes abaixo para administrar as categorias dos classificados. É recomendado adicionar um ícone para cada categoria, assim o seu site ganha um aspecto mais profissional.",
			"addclasscat_^" => "sub",

	"games" => "Jogos",

		"games_$" => "metade",
		"games_*" => "Jogos",
		"games_?" => "Listados abaixo estao todos os jogos instalados actualmente no seu site. Consulte o manual para obter mais detalhes sobre a instalaçao de novos jogos",

	"gamesinstall" => "Instalar Jogo",

		"gamesinstall_$" => "metade",
		"gamesinstall_*" => "Instalar jogo",
		"gamesinstall_?" => "Seleccione os jogos abaixo que deseja instalar. Se voce quiser adicionar novos jogos para o seu site basta carregar o jogo arquivos tar para o local da pasta do jogo: inc/exe/Jogos/tar/. <b> Consulte o manual para obter mais detalhes sobre a instalaçao de novos jogos </ b>",
		"gamesinstall_^" => "sub",


);


$admin_layout_page9 = array(

	"" => "Administradores",

		"_$" => "metade",
		"_*" => "Administradores e moderadores",
		"_?" => "Listados abaixo estao todos os administradores e moderadores nao incluindo o super usuário. Para adicionar moderadores novos, pode usar a página de pesquisa de membros e clicar no ícone de moderador ao lado do nome.",


	"pref" => "Preferencias Admin",

		"pref_$" => "metade",
		"pref_*" => "Preferencias Admin",
		"pref_?" => "Utilize as opçoes abaixo para personalizar as preferencias dos administradores.",

	"manage" => "Gerir moderadores",

		"manage_$" => "metade",
		"manage_*" => "Gerir moderadores",
		"manage_?" => "Um moderador pode ter duas funçoes, pode ser um moderador do site que permite o acesso a moderar o site principal apenas, ou voce pode fornece-los com os seus dados de login admin para que ele possa fazer o login para a área de administrativa e use as ferramentas de administrador.",
		"manage_^" => "sub",

	"email" => "Admin E-mails",

		"email_$" => "metade",
		"email_*" => "Admin E-mails",
		"email_?" => "Listados abaixo estao todos os e-mails enviados para o administrador dos seus membros.",

	"compose" => "Compor E-mail",

		"compose_$" => "metade",
		"compose_*" => "Compor E-mail",
		"compose_?" => "Utilize as opçoes abaixo para criar uma nova mensagem para enviar a um membro.",
		"compose_^" => "sub",

	"super" => "Super membro login",

		"super_$" => "metade",
		"super_*" => "Detalhes super membro login",
		"super_?" => "Por favor, tome cuidado ao editar os detalhes da conta abaixo, esta é a conta de super usuário e deve se certificar que a senha é mantida em segredo dos outros momentos.",
		"super_^" => "sub",
);

$admin_layout_page10 = array(

	"" => "Atualizar sotf.",

		"_$" => "metade",
		"_*" => "Atualizar sotf.",
		"_?" => "Listadas abaixo está a versao actual do software em execuçao, compare com a versao mais recente disponível. Se sua versao é mais antiga, por favor contacte o seu fornecedor para as últimas actualizaçoes.",

	"backup" => "Backup base de dados",

		"backup_$" => "metade",
		"backup_*" => "Backup base de dados",
		"backup_?" => "Seleccione um ou mais quadros abaixo para backup do banco de dados. É altamente recomendado que voce use o backup do banco de dados fornecidos pela empresa de hospedagem.",


	"license" => "Chaves / licença",

		"license_$" => "metade",
		"license_*" => "Chaves / licença",
		"license_?" => "Listadas abaixo estao as chaves de licença do software, por favor tenha atençao que elas estejam correctas.",

	"sms" => "SMS Créditos",

		"sms_$" => "metade",
		"sms_*" => "SMS Créditos",
		"sms_?" => "Listadas abaixo é a quantidade actual total de créditos de SMS deixados na sua conta.",

);

$admin_layout_page11 = array(

	"" => "Software Plugins",

		"_$" => "metade",
		"_*" => "Software plugins",
		"_?" => "Plugins adicionam funcionalidades extra ao software. Uma vez que o plugin é instalado, voce pode activá-lo ou desactivá-lo aqui, usando as opçoes do menu r esquerda.",

);


$admin_layout_nav = array(

	"1" => "Pain. Instrumentos",
		"1a" => "Estatísticas membros",
		"1b" => "Estatísticas afiliados",
		"1c" => "Estatísticas de visitantes",
		"1d" => "Locais dos visitantes ",
	"2" => "Membros",
		"2a" => "Gerir membros",
		"2b" => "Gerir afiliados",
		"2c" => "Membros banidos",
		"2d" => "Membros ficheiros",
		"2e" => "Importar membros",
	"3" => "Design",
		"3a" => "Tema",
		"3b" => "Editar tema",
		"3c" => "Gerir imagens do tema",
		"3d" => "Editar logo",
		"3e" => "Meta tags",
		"3f" => "Idiomas",
		"3g" => "Redaçao da página",
		"3h" => "Gerir ficheiros",
		"3i" => "Menu baras",
	"4" => "E-mail",
		"4a" => "Gerir e-mails",
		"4b" => "E-mail modelos",
		"4c" => "Relatórios de e-mail",
		"4d" => "Enviar e-mail único",
		"4e" => "E-mail lembretes",
		"4f" => "Baixar e-mails",
		"4g" => "Enviar boletins informativos",
	"5" => "Faturamento",
		"5a" => "Gerir pacotes",
		"5b" => "Gateways de pagamento",
		"5c" => "Histórico de faturamento",
		"5d" => "Histórico de faturamento da afiliado",
	"6" => "Configuraçoes",
		"6a" => "Opçoes de exibiçao",
		"6b" => "Configuraçoes de exibiçao",
		"6c" => "Caminhos sistema",
		"6d" => "Marca d'água fotos",
	"7" => "Conteúdo",
		"7a" => "Campos de pesquisa",
		"7b" => "Calendário de eventos",
		"7c" => "Web site votaçao",
		"7d" => "Web site fórum",
		"7e" => "Salas de chat",
		"7f" => "FAQ",
		"7g" => "Filtros de palavras",
		"7h" => "Artigos/Notícias",
		"7i" => "Grupos",
	"8" => "Promoçoes",
		"8a" => "Banners",
	"9" => "Plugins",
		"9a" => "",
	"10" => "Gerir moderadores",
		"10a" => "Gerir moderadores",
		"10b" => "Super membro",
	"11" => "Manutençao",
		"11a" => "Sistema backup",
		"11b" => "Chave de licença",
		"11c" => "Atualizaçoes do sistema",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Sistema atualizado com sucesso",
	"no_update" => "Sistema atualizado no entanto, nao havia nada para apagar!",
	"edit" => "Editar",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Pesquisar",
	"1" => "Seleccionar tudo",
	"2" => "Desseleccionar tudo",
	"3" => "Aprovar",
	"4" => "Suspender",
	"5" => "Apagar",
	"6" => "Pôr Membros em destaque",
	"7" => "Opçoes",
	"8" => "Update",
	"9" => "Ponha em destaque",
	"10" => "Apagar destaque",
	"11" => "Update idioma padrao",
	"12" => "Enviar",
	"13" => "Continuar",
	"14" => "Pôr activo",
	"15" => "Desabilitar ",
	"16" => "Update 0rdem",
	"17" => "Update campo da páginas",
	"18" => "Activado",
);

$admin_table_val = array(
	"1" => "Nome de utilizador",
	"2" => "Genero",
	"3" => "Último login",
	"4" => "Estado",
	"5" => "Pacote",
	"6" => "Updated",
	"7" => "Opçoes",
	"8" => "Data",
	"9" => "Endereço IP",
	"10" => "Hack string",
	"11" => "Registrado em",
	"12" => "Nome",
	"13" => "E-mail",
	"14" => "Clicks",
	"15" => "Registro",

	"15" => "Comissao paga",

	"16" => "Mensagem",
	"17" => "Tempo",
	"18" => "Nome do ficheiro",
	"19" => "Última actulizaçao (updated)",
	"20" => "Editar",
	"21" => "Padrao",
	"22" => "ID",

	"23" => "Preço",
	"24" => "Visível",
	"25" => "Tipo",
	"26" => "Editar acesso",
	"27" => "Activo",

	"28" => "Ver código",
	"29" => "Campos",
	"30" => "Nome da filial",
	"31" => "Total em dívida",
	"32" => "Estado",

	"33" => "Data da atualizaçao",
	"34" => "Data da expiraçao",
	"35" => "Forma de pagamento",
	"36" => "Ainda activo",
	"37" => "Password",
	"38" => "Último logged in",

	"39" => "Posiçao",
	"40" => "Hits",
	"41" => "Activo",
	"42" => "Prever",
	"43" => "Título",
	"44" => "Artigos",
	"45" => "Ordenar",

);

$admin_search_val = array(
	"1" => "Nome de utilizador do membro",
	"2" => "Todos os pacotes",
	"3" => "Todos os generos",
	"4" => "Por página",
	"5" => "Ordenar por",
	"6" => "E-mail",

	"7" => "Qualquer estado",
	"8" => "Membros activos",
	"9" => "Membros suspensos",
	"10" => "Membros nao aprovados",
	"11" => "Membros que pretendam cancelar",
	"12" => "Todas as páginas",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Administrar todos os grupos",
	"2" => "Nome do grupo",
	"3" => "Idioma",
	"4" => "Gerir tópicos",
	"5" => "Gerir categorias",
	"6" => "Grupo nome da categoria",
	"7" => "Gerir as categorias",
	"8" => "Nome",
	"9" => "Contar",
	"10" => "Adicionar um artigo",
	"11" => "Categoria",
	"12" => "Título da página",
	"13" => "Breve descriçao",
	"14" => "Adicionar um artigo",
	"15" => "Gerir categorias",
	"16" => "lista de Campos",
	"17" => "Ordem",
	"18" => "Idioma",
	"19" => "Lista de valores",
	"20" => "Novo campo",

	"21" => "Título do campo",
	"22" => "Tipo de campo",
		"23" => "Campo de texto",
		"24" => "Text area",
		"25" => "List box",
		"26" => "Única check box",
		"27" => "Multipla check box",

	"28" => "Grupo título",
	"29" => "Incluir durante o registo",
	"30" => "Selecione abaixo",

	"31" => "Adicionar um grupo",
	"32" => "Opçoes de exibiçao do grupo",
		"34" => "Mostrar a todos os membros",
		"35" => "Mostrar apenas a administradores ",
		"36" => "Mostrar ao administrador e membro (nao no perfil)",
	"37" => "Apenas",
	"38" => "Gerir grupos",
	"39" => "Adicionar evento",
	"40" => "Título do campo",
	"41" => "Título",
	"42" => "Descriçao do texto",
	"43" => "Tipo de título",
	"44" => "Pesquisar título",
	"45" => "Título do perfil",
	"46" => "Voce deve criar um título para a página de perfil, como 'eu sou um' e outra para a página da pesquisa como 'Eu procuro um'",
	"47" => "Títulos de campo existentes",
	"48" => "Mover o campo a este grupo",
	"49" => "Membro ID",
	"50" => "Nome do evento",
	"51" => "Descriçao do evento",
	"52" => "Tipo de evento",
	"53" => "Selecione a categoria",
	"54" => "Selecione o tipo",
	"55" => "Hora do evento",
	"56" => "Deixe em branco para todo os dia",
	"57" => "Data do evento",
	"58" => "Mes",

	"59" => "Dia",
	"60" => "Ano",
	"61" => "País",
	"62" => "Distrito",
	"63" => "Rua",
	"64" => "Cidade",
	"65" => "Telefone",
	"66" => "E-mail",
	"67" => "Web site",
	"68" => "Evento visível para",
		"69" => "Todos",
		"70" => "Apenas amigos",

	"71" => "Adicionar inquérito",
	"72" => "Resultados do inquérito",
	"73" => "Nome do inquérito",
	"74" => "Resultado",
	"75" => "Pôr activo",

	"76" => "Adicionar tópico ao fórum",
	"77" => "Administrar mensagens",
	"78" => "Tópico do fórum",

	"79" => "Título",
	"80" => "Descriçao",
	"81" => "Mensagens fórum",
	"82" => "Todas as mensagens",
	"83" => "Hoje",
	"84" => "Esta semana",
	"85" => "Semana passada",
	"86" => "Nome da sala",
	"87" => "Campos de título existente",
	"88" => "Senha da sala",
	"89" => "Adicionar nova",
	"90" => "Adicionar F.A.Q",

	"91" => "Adicionar filtro de palavra",
	"92" => "Palavra",

	"93" => "Approvado",
	"94" => "Título",
	"95" => "Título do partido",
	"96" => "Idioma",

	"97" => "Prever",
	"98" => "Resultados",
);
$admin_advertising = array(

	"1" => "Banners do site ",
	"2" => "Adicionar banner",
	"3" => "Banners do afiliado",
	"4" => "Adicionar/Editar banners",
	"5" => "Banner tipo",
	"6" => "Banner do site",
	"7" => "Banner do afiliado",
	"8" => "Nome",
	"9" => "Upload banner",
	"10" => "Entrar HTML",
	"11" => "HTML código",
	"12" => "Upload banner",
	"13" => "Banner Link",
	"14" => "Mostrar a",
		"15" => "Todos os membros",
		"16" => "Membros conectados",

	"17" => "Página",
	"18" => "Activo",

	"19" => "Posiçao top",
	"20" => "Posiçao centro",
	"21" => "Posiçao esquerda",
	"22" => "Posiçao inferior",
	"23" => "Deixe em branco para usar link no código do banner",
	"24" => "Banner prever",

);


$admin_maintenance = array(

	"1" => "Em andamento",
	"2" => "Versao mais recente",
	"3" => "SMS créditos",
	"4" => "Resto de créditos de SMS",
	"5" => "Comprar créditos",

);

$admin_admin = array(

	"1" => "Adicionar Admin",
	"2" => "Nome de utilizador",
	"3" => "Senha",
	"4" => "E-mail",

	"5" => "Editar configuraçoes Admin",
	"6" => "Nome completo",
	"7" => "Nivel de acesso",
		"8" => "Acesso completo",
		"9" => "Acesso só membro",
		"10" => "Acesso só design",
		"11" => "Acesso só ao e-mail",
		"12" => "Acesso só ao faturamento",
		"13" => "Acesso só rs configuraçoes",
		"14" => "Acesso só r administraçao",
	"15" => "Admin icon",

	"17" => "Alertas e-mail",
	"18" => "Admin alerta noticias",
	"19" => "Transferir todos os membros de",
	"20" => "Para o seguinte pacote",
	"21" => "Editar pacote",
	"22" => "Pacote de acesso",
	"23" => "Adicionar pacote ao item",
	"24" => "Administrar acesso ao pacote",
);

$admin_settings = array(

	"1" => "Mostrar páginas",
	"2" => "Activo",
	"3" => "Desactivo",
	"4" => "Caminhos Web",
	"5" => "Caminho servidor",
	"6" => "Caminho thumbnail",
	"7" => "Adicionar campo",
	"8" => "Nome",
	"9" => "Valor",
	"10" => "Tipo",
	"11" => "Administrar campos",
	"12" => "Adicionar gateways",
	"13" => "Sistemas de pagamento",
	"14" => "Código gateway de pagamento",
	"15" => "Título",
	"16" => "Pacote de acesso",
	"17" => "Comentários",
	"18" => "Transfererir membros",
	"19" => "Transfer todos os membros de",
	"20" => "Para o seguinte pacote",
	"21" => "Editar pacote",
	"22" => "Pacote de acesso",
	"23" => "Adicionar pacote item",
	"24" => "Administrar pacotes de acesso",
);

$admin_billing = array(

	"1" => "Adicionar pacote",
	"2" => "Administrar pacotes de acesso",
	"3" => "Transferir membros pacotes",
	"4" => "O seu site está actualmente em execuçao no <b> Modo Livre </ b>, portanto, todos os pacotes de adesao estao desactivados.",
	"5" => "Gostaria desactivar o modo livre e mostrar os pacotes de adesao?",
	"6" => "Desactivar o modo livre",
	"7" => "Adicionar campo",
	"8" => "Nome",
	"9" => "Valor",
	"10" => "Tipo",
	"11" => "Administrar campos",
	"12" => "Adicionar gateways",
	"13" => "Sistema de pagamentos",
	"14" => "Código Gateway de pagamento",
	"15" => "Título",
	"16" => "Pacote acesso",
	"17" => "Comentários",
	"18" => "Transferir membros",
	"19" => "Transferir todos os membros de",
	"20" => "Para o seguinte pacote",
	"21" => "Editar pacote",
	"22" => "Pacote acesso",
	"23" => "Adicionar artigo ao pacote",
	"24" => "Administrar pacotes de acesso",

	"25" => "Pendente de aprovaçao",
	"26" => "Pagamentos aprovados",
	"27" => "Pagamentos rejeitados",

	"28" => "Todo o histórico",
	"29" => "Pagamentos activos",
	"30" => "Pagamentos terminados",
	"31" => "Subscriçoes activas",
	"32" => "Subscriçoes terminadas",
	"33" => "Pacote Código de acesso",

);

$admin_email = array(

	"1" => "Sistema de e-mails",
	"2" => "Boletins informativos",
	"3" => "E-mail modelos",
	"4" => "Editor e-mail",
	"5" => "Assunto",
	"6" => "Prever e-mail",
	"7" => "Para e-mail",

	"8" => "Enviar para",
		"9" => "Todos os membros",
		"10" => "Membros com pacotes subscritos",
		"11" => "Activos / Suspensos / Membros nao aprovados",
	"12" => "Para Pacote",
	"13" => "Membro estado",
	"14" => "Selecione boletim informativo",

	"15" => "Criar novo",
	"16" => "Ver os criados personalizados",
	"17" => "E-mail código de monitoramento",
	"18" => "Criar novo",
	"19" => "Ver os criados personalizados",
	"20" => "E-mail código de monitoramento",
		"21" => "Abaixo código HTML",

	"22" => "Resultados de monitoramento de e-mail",
	"23" => "Nao houve nenhum encontrado.",
	"24" => "Selecione relatório",

	"25" => "Enviar lembretes para todos os membros que tem entre",
	"26" => "e",
	"27" => "dias",
	"28" => "Dias que deixou de atualizar a sua assinatura",
	"29" => "Selecione o e-mail para enviar:",
	"30" => "Baixar",
	"31" => "Seleccione o pacote",
	"32" => "Código de monitoramento",


);

$admin_design = array(

	"1" => "Baixar temas",
	"2" => "Modelo atual",
	"3" => "Use este modelo",
	"4" => "Meta tags da página",
	"5" => "Título da página",
	"6" => "Descriçao",
	"7" => "Palavras-chave",
	"8" => "Páginas do Web site",
	"9" => "Conteúdo das páginas",
	"10" => "Páginas personalizadas",
	"11" => "Criar página",
	"12" => "Caminho FTP",
	"13" => "Ficheiros do tema",
	"14" => "Conteúdo das páginas",
	"15" => "Personalizar páginas",


	"16" => "Adicionar idioma",
	"17" => "Nome do novo ficheiro",
	"18" => "Selecione o ficheiro para copiar",

	"19" => "Editar idioma",
	"20" => "Personalizar páginas",

	"21" => "Fonte",
	"22" => "Fonte tamanho",
	"23" => "Fonte cor",
	"24" => "largura",
	"25" => "altura",
	"26" => "Adicionar texto logo",
	"27" => "Tela Tipo",
		"28" => "Use tela em branco",
		"29" => "Mantenha o design atual",
		"30" => "Upload meu próprio fundo/logotipo",

	"31" => "Criar nova página",
	"32" => "Nome da nova página",
		"33" => "Os nomes das páginas devem ser muito curtos e só uma palavra. Ex: Links, artigos, notícias, fórums, etc",
	"34" => "Adicionar Tab Menu?",
		"35" => "Nao! Nao crie um Tab Menu",
		"36" => "Sim. Adicione-o r área de membros",
		"37" => "Sim. Adicione-o rs páginas do site principal, e nao rs páginas da área de membros.",
			"38" => "Se seleccionado um novo membro tab será criado no seu site",
);

$admin_overview = array(

	"1" => "Comunicaçao",
	"2" => "Total de membros",
	"3" => "Esta semana",
	"3a" => "Hoje",
	"4" => "Atividade recentes do site",
	"5" => "Relatórios do site",

	"6" => "Visitantes do site nas últimas duas semanas",
	"7" => "New member signup's in the last 2 weeks",
	"8" => "Estatísticas membros género",
	"9" => "Estatísticas membros idade",

	"10" => "Inscriçoes de afiliados nas últimos 2 semanas",
	"11" => "Configurar mapa de visitante",
	"12" => "Por favor, insira a sua chave Google API no campo superior.",
	"13" => "É possível comprar uma chave de licença na área cliente do nosso web site",

	"14" => "Filtrar resultados da pesquisa",
	"15" => "Todos os ficheiros",

);
$admin_members = array(

	"1" => "Todos os membros",
	"2" => "Moderadores",
	"3" => "Activo",
	"4" => "Suspenso",
	"5" => "Nao aprovado",
	"6" => "Deseja cancelar",
	"7" => "Online agora",
	"8" => "Actividade dos membros online",
	"9" => "Editar detalhes do membro",
	"10" => "Adicionar afiliado",
	"11" => "Afiliado banners",
	"12" => "Páginas do afiliado",
	"13" => "Adicionar afiliado",
	"14" => "Configurar afiliado",
	"15" => "Todos os ficheiros",
	"16" => "Fotos",
	"17" => "Vídeos",
	"18" => "Musica",
	"19" => "YouTube",
	"20" => "Nao aprovado",
	"21" => "Destacado",
	"22" => "Upload ficheiro",
	"23" => "Ficheiro",
	"24" => "Tipo",
	"25" => "Nome de utilizador",
	"26" => "Título",
	"27" => "Comentários",
	"28" => "Pôr predefinido",
	"29" => "Actividade do membros online",
	"30" => "Afiliados assinado por",
	"31" => "Destacado",
	"a5" => "Nome de utilizador",
	"a6" => "Palavra chave",
	"a7" => "Primeiro nome",
	"a8" => "Último nome",
	"a9" => "Nome da empresa",
	"a10" => "Endereço",
	"a11" => "Rua",
	"a12" => "Cidade",
	"a13" => "Distrito",
	"a14" => "Código postal",
	"a15" => "País",
	"a16" => "Telefone",
	"a17" => "Fax",
	"a18" => "E-mail",
	"a19" => "Web site endereço",
	"a20" => "Faça um cheque em nome de",
);


// HELP FILES
$admin_help = array(

	"a" => "Começar agora",
	"b" => "Nao, eu estou bem. Obrigado!",
	"c" => "Continuar",
	"d" => "Fechar janela",


	"1" => "Introduçao",
	"2" => "Precisa de ajuda para começar?",
	"3" => "Olá",

	"4" => "Bem-vindos r área de administraçao! Como esta é a primeira vez que entrou na área de administraçao, é recomendado que tome alguns minutos a acompanhar o assistente abaixo para o ajudar a começar!",
	"5" => "O nosso assistente vai guiá-lo através dos passos básicos de configuraçao e deixá-lo pronto e a funcionar num instante.",
	"6" => "<strong> (Nota) </ strong> Voce pode revisitar esta página a qualquer momento, clicando no 'guia de ajuda rápida' sobre as barras de menu r esquerda.",

	"7" => "Primeiros passos",
	"8" => "Bem-vindo r sua área de administraçao!",
	"9" => "Bem vindo r sua conta de administrador",
	"10" => "Este software permite gerenciar todos os diferentes aspectos de seu web site, incluindo membros, segurança, e-mail, plugins, e muito mais.",
	"11" => "Este assistente de introduçao apresentar-lhe alguns dos conceitos por trás da gestao do web site e permite que voce faça algumas configuraçoes básicas, para que assim comesse a trazer tráfego (visitantes) para o seu site.",
	"12" => "<strong> (Lembre-se) </ strong> A qualquer momento, voce pode fechar essa janela usando o botao de fechar e voltar mais tarde, clicando no 'guia de ajuda rápida' na barra de menu r esquerda.",

	"13" => "Introduçao r sua área de administraçao!",
	"14" => "A área de administraçao do software é 'baseada na web' que significa que voce pode acessar e gerenciar o seu site em qualquer lugar do mundo com uma conexao r internet. Basta apontar o seu browser para:",
	"15" => "e faça o login com os seus dados de administrador.",
	"16" => "Clique aqui para marcar este link agora.",

	"17" => "Introduçao ao seu painel.",
	"18" => "O painel do software dá-lhe uma visao rápida do desempenho do seu site, voce pode ler o anúncio de software, ver o histórico de registos, os membros, estatísticas dos afiliados e mais.",
	"19" => "Todas as informaçoes dos membros sao armazenadas no banco de dados MYSQL chamado:",
	"20" => "Introduçao rs estatísticas do site.",
	"21" => "As estatísticas dao-lhe uma representaçao visual do historial de registo dos membros e dos afiliados por um período de duas semanas. Cada vez que um membro ou afiliado se regista ao seu site, a hora e a data é gravada e mostrada nos gráficos.",

	"22" => "Introduçao aos locais de visitante",
	"23" => "Introduçao r gestao de membros",
	"24" => "Introduçao r gestao de seus afiliados",
	"25" => "Introduçao r gestao de seus membros banidos",
	"26" => "Introduçao r gestao de seus ficheiros do membro",
	"27" => "Introduçao aos membros importados",
	"28" => "Introduçao aos temas do site",
	"29" => "Introduçao ao editor do tema",
	"30" => "Introduçao ao gestor das imagens do tema",
	"31" => "Introduçao ao editor do logo",
	"32" => "Introduçao ao meta tags",
	"33" => "Introduçao aos idiomas",
	"34" => "Introduçao ao gestor de e-mails",
	"35" => "Introduçao aos e-mails modelo",
	"36" => "Introduçao aos relatórios de e-mails",
	"37" => "Introduçao para enviar boletins informativos",
	"38" => "Introduçao aos lembretes de e-mail",
	"39" => "Introduçao ao baixar endereços de e-mail",
	"40" => "Introduçao aos pacotes de membros",
	"41" => "Introduçao aos pagamento gateways",
	"42" => "Introduçao ao historial de facturamento do membro",
	"43" => "Introduçao ao historial de facturamento do afiliado",
	"44" => "Introduçao rs opçoes de exibiçao",
	"45" => "Introduçao rs configuraçoes de exibiçao",
	"46" => "Introduçao aos sistemas de rotas",
	"47" => "Introduçao r marca d'água",
	"48" => "Introduçao aos campos de pesquisa",
	"50" => "Introduçao ao Calendário de Eventos",
	"51" => "Introduçao aos inquéritos do site",
	"52" => "Introduçao ao fórum",
	"53" => "Introduçao rs salas de chat",
	"54" => "Introduçao rs FAQ",
	"55" => "Introduçao ao filtro de palavras",
	"56" => "Introduçao rs Notícias / Artigos",
	"57" => "Introduçao aos grupos",

		"22a" => "Os mapas dos locais dos visitante, permite-lhe ver num relance de quais países os seus membros estao a aderir.",
		"23a" => "A ferramenta de gestao membros permite que voce veja todos os membros que se juntaram a seu site. Use as opçoes de pesquisa para filtrar os seus membros, para editar, actualizar e excluir os perfis dos membros.",
		"24a" => "A ferramenta de gestor de afiliados permite-lhe ver de relance todos os seus afiliados. Pode nao só visualizar, mas também editar, apagar e aprovar novas inscriçoes.",
		"25a" => "A secçao de membros banidos regista todos os membros e nao membros que tentam 'hackar' o seu site. O software suspende automaticamente os membros de verem o seu site prevenindo algum prejuízo.",
		"26a" => "A ferramenta de ficheiros permite-lhe ver e gerir todas as músicas, vídeos, fotos, etc dos seus membros. Pode ainda usar a nossa 'cropping tool' para editar e corta as fotos.",
		"27a" => "A ferramenta de importaçao de membros permite-lhe importar membros de outras aplicaçoes. Basta digitar a informaçao da base de dados do site antigo e ele será transferido para o seu novo site.",
		"28a" => "A secçao dos temas permite-lhe mudar o modelo e design do seu site na hora! Basta clicar no tema desejado e ele será actualizado automaticamente.",
		"29a" => "A ferramenta 'editor de temas' permite-lhe editar as páginas do seu site directamente na área de administraçao. Voce também pode copiar e colar o código do seu editor e colá-lo novamente depois de ter terminado a ediçao.",
		"30a" => "O gestor de imagens do tema permite-lhe mudar as imagens do tema por outras instantaneamente. As novas imagens serao aplicadas automaticamente.",
		"31a" => "A ferramenta de gestao do logótipo permite-lhe alterar o design actual do seu logótipo. Voce pode também criar um logótipo usando o seu próprio editor e depois usar a ferramenta 'upload - carregar o meu próprio'.",
		"32a" => "A ferramenta meta tags permite-lhe editar todas as metas tags das páginas do seu site geradas pelo software. Voce pode adicionar o seu próprio título, palavras-chave e descriçoes de cada uma das páginas. ",
		"33a" => "A ferramenta de gerir idiomas permite-lhe excluir ou adicionar qualquer idioma no seu site.",
		"34a" => "A ferramenta de gestao de e-mails permite-lhe criar o seu próprio boletim informativo, dando-lhe um toque único e pessoal ao seu site.",
		"35a" => "Introduçao aos modelos de e-mail",
		"36a" => "Introduçao aos relatórios e-mail",
		"37a" => "Introduçao ao enviar boletins informativos",
		"38a" => "Introduçao aos lembretes e-mai",
		"39a" => "Introduçao ao baixar endereços de e-mail",
		"40a" => "Introduçao aos pacotes de membros",
		"41a" => "Introduçao aos pagamento Gateways",
		"42a" => "Introduçao ao historial de facturamento do membro",
		"43a" => "Introduçao ao historial de facturamento do afiliado",
		"44a" => "Introduçao rs Opçoes de exibiçao",
		"45a" => "Introduçao rs configuraçoes de exibiçao",
		"46a" => "Introduçao aos sistemas de rotas",
		"47a" => "Introduçao r marca d'água",
		"48a" => "Introduçao aos campos de pesquisa",
		"50a" => "Introduçao ao calendário de eventos",
		"51a" => "Introduçao aos inquéritos do site",
		"52a" => "Introduçao ao fórum",
		"53a" => "Introduçao rs salas de chat",
		"54a" => "Introduçao rs FAQ",
		"55a" => "Introduçao ao filtro de palavras",
		"56a" => "Introduçao rs Notícias / Artigos",
		"57a" => "Introduçao aos grupos",
);

$admin_login = array(

	"1" => "Admin Area Login",
	"2" => "Esqueceu a sua senha? Nao se preocupe, digite o seu endereço de e-mail abaixo e enviaremos uma nova.",
	"3" => "Endereço de e-mail",
	"4" => "Texto abaixo",
	"5" => "Reset senha",
	"6" => "Digite seus dados abaixo para login.",
	"7" => "Nome de utilizador",
	"8" => "Senha",
	"9" => "Licença",
	"10" => "Idioma",
	"11" => "Login",
	"12" => "IP registrado é",
	"13" => "Esqueci minha senha",
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Destaque perfil",
	"2" => "Web site moderador",
	"3" => "Pacote membro",
	"4" => "Enviar e-mail de atualizaçao(upgrade)",
	"5" => "Adicionar pacote mudar de sistema de faturamento",
	"6" => "SMS número",
	"7" => "SMS creditos",
	"8" => "Definir status da conta para",

	"9" => "Clique na caixa para editar a senha.",
	"10" => "Destaque membros com um fundo diferente na pesquisa.",
	"11" => "Isto dá a acesso a membros a gerir seu site como um moderador.",

	"12" => "afiliados página de boas-vindas",
	"13" => "Mostrar código do banner",
	"14" => "Afiliados página de pagamento",
	"15" => "Afiliado página de resumo",
	"16" => "Afiliado editar página da conta",

	"17" => "Importar membros de",

	"18" => "Idade",
	"19" => "Ficheiros visto",
	"20" => "Privado",
	"21" => "Público",

	"22" => "album",
	"23" => "Conteúdo adulto",
	"24" => "Conteúdo público",

	"25" => "Tamanho",
	"26" => "Mover os ficheiros para álbuns adulto ",
	"27" => "Ficheiros para adulto",

);

$admin_selection = array(

	"1" => "Sim",
	"2" => "Nao",

	"3" => "Ligado",
	"4" => "Desligado",
);

$admin_plugins = array(

	"1" => "Plugins estende e expande as funcionalidades do software. Uma vez instalado, voce pode activar ou desactivar no menu r esquerda .",
	"2" => "Voce pode ver e baixar novos plugins na área de cliente do nosso site.",
	"3" => "Nome do plugin",
	"4" => "Detalhes do plugin",
	"5" => "Ultima actualizaçao",
	"6" => "Estado",

);
$admin_pop_welcome = array(

	"1" => "Bem-vindo de volta",
	"2" => "Abaixo esta uma visao geral das inscricoes dos membros (logins) e do desempenho do seu site para hoje.",
	"3" => "Membros novos hoje",
	"4" => "Ficheiros para aprovar",
	"5" => "<strong> Lembre-se </strong> Se nao deseja receber estes alertas de boas-vindas quando acessar na area administrativa, pode desliga-los a qualquer momento alterando as suas preferencias de admin.",
	"6" => "Fechar janela",

);
$admin_pop_chmod = array(

	"1" => "Ficheiros de permissao erro",

	"2" => "Os ficheiros desta página nao podem ser modificados",
	"3" => "Os seguintes ficheiros/directórios precisam de ter o acesso `write´ (escrever) nas suas permissoes antes de os poder editar. Se está a usar um servidor Linux ou Unix Web host, voce pode usar um programa FTP e mudar o `CHMOD´(`Change Mode´) para alterar as permissoes. Se está a usar um servidor Windows, precisa de contactar a sua companhia de alojamento e pedir-lhes para alterarem esses ficheiros/directórios.",
	"4" => "Os ficheiros/directórios que exigem CHMOD 777 sao",
	"5" => "Fechar janela",

);
$admin_pop_demo = array(

	"1" => "Modo demo ligado",
	"2" => "As alteraçoes no modo DEMO nao serao salvas",
	"3" => "As configuraçoes de acesso ao sistema foram estabelecidas em modo 'DEMO', o que significa que muitos recursos e funcionalidades dentro da área de administraçao serao limitados a'somente leitura'.",
	"4" => "Voce pode navegar normal pela área administrativa, no entanto, qualquer alteraçao nao será salva.",
	"5" => "<strong> Lembre-se</strong> Se deseja remover a restriçao sobre o modo de demonstraçao da sua conta (DEMO), por favor entre em contacto com a administraçao do sistema para obter mais detalhes.",
	"6" => "Fechar janela",
);

$admin_pop_import = array(

	"1" => "Resultados da transferencia da base de dados",
	"2" => "membros foram importados com sucesso!",
	"3" => "membros foram importados com sucesso de",
	"4" => "software. Por favor, siga as instruçoes abaixo para garantir que as imagens do seus membros sao actualizadas correctamente.",
	"5" => "Os caminhos de pasta das imagens estao abaixo, voce deve copiar as imagens do site antigo para estes os novos caminhos;",
	"6" => "Fechar janela",
);

$admin_loading= array(

	"1" => "A optimizar as tabelas da base de dados",
	"2" => "Por favor espere",

);
$admin_menu_help= array(
"1" => "Guia ajuda rápida",
);

$admin_settings_extra = array(

	"1" => "Mostrar página de pesquisa",
	"2" => "Mostrar página de contacto",
	"3" => "Mostrar página Tour",
	"4" => "Mostrar página FAQ",
	"5" => "Mostrar eventos",
	"6" => "Mostrar gruposs",
	"7" => "Mostrar fórum",
	"8" => "Mostrar jogos",
	"9" => "Mostrar rede",
	"10" => "Mostrar sistema de afiliados",
	"11" => "Mostrar SMS / mensagens de texto e alertas do sistema",

	"12" => "Mostrar blogs",
	"13" => "Mostrar salas chat",
	"14" => "Mostrar mensagens instantâneas (chat privado)",
	"15" => "Mostrar a imagem de verificaçao no registo",
	"16" => "Mostrar o UK código postal na pesquisa ",
	"17" => "Mostrar o UK código postal na pesquisa ",
	"18" => "Mostrar integraçao MSN/Yahoo",

	"19" => "Pacote por defeito para os membros ",
		"20" => "Este pacote será para todos os registos padrao do membros",
	"21" => "Tem de incluir (upload) uma imagem para se registar",
		"22" => "Se activar, os membros tem a permissao para saltar a opçao de inserir (upload) uma imagem durante o registo.",
	"23" => "MODO GRÁTIS",
		"24" => "Defina esta opçao para 'sim' se quiser que todas as funcionalidades do seu site possam ser acessíveis a todos.",
	"25" => "MODO MANUTENÇAO",
		"26" => "Isto irá parar todos os acessos ao seu site para os membros e nao membros e permitir que somente o administrador registado tem acesso para ver o site.",

	"27" => "Número de resultados de pesquisa por página",
		"28" => "Seleccione o número de perfis a ser exibidos por página",
	"29" => "Número de resultados correspondentes revisao geral da página",
		"30" => "Seleccione o número de perfis a serem exibidos por página.",

	"31" => "Códigos de activaçao de e-mail",
		"32" => "Aos membros será enviado um código de activaçao para seu e-mail que devem ser validados antes que eles possam fazer login (aceder).",
	"33" => "Aprovar membros manualmente",
	"34" => "Defina esta opçao para 'sim' ou 'nao' dependendo se deseja verificar manualmente as contas de membros antes que eles possam fazer o login.",
	"35" => "Aprovar ficheiros manualmente",
		"36" => "Defina esta opçao para 'sim' ou 'nao' dependendo se deseja verificar manualmente os ficheiros antes de os exibir",
	"37" => "Aprovar gravaçoes de vídeo manualmente",
		"38" => "Defina esta opçao para 'sim' ou 'nao' dependendo se quiser verificar manualmente membro transmissoes (video chat feeds).",

	"39" => "Mostrar gravaçao de saudaçao de video",
	"40" => "Isto permite os membros de gravar a sua mensagem de vídeo próprio para o seu perfil. Voce deve digitar o seu RMS sequencia flash vídeo abaixo.",
	"41" => "Flash RMS String de conexao",
		"42" => "Voce precisa de ter um servidor flash para usar isto",
	"43" => "Exibiçao da data ",
		"44" => "Seleccione o formato da exibiçao da data que deseja para seu site",
	"45" => "Permitir perfil / comentários ficheiros",
		"46" => "Ative esta opçao se deseja que os membros deixem comentários sobre os perfis e ficheiros.",
	"47" => "Mostrar IM mensagens instantâneas (chat privado) numa janela separada",

	"48" => "Habilite esta opçao se voce quiser chat privado e mensagens instantâneas abram numa nova janela.",

	"49" => "Pesquisa amigável?",
		"50" => "Habilite esta opçao se estiver num servidor Linux ou Unix usando o padrao. Htaccess",
	"51" => "Pesquisar fotos em branco",
		"52" => "Quer que os membros que nao tenham fotos apareçam na pesquisa?.",
	"53" => "Mostrar imagens da bandeira",
		"54" => "Definir 'sim' ou 'nao' se deseja ter as bandeiras de idioma exibidas no seu site.",
	"55" => "Afiliados Moeda",
	"56" => "Usar HTML Editor",
	"57" => "Defina esta opçao para 'sim' ou 'nao' dependendo se deseja verificar manualmente os ficheiros antes de exibir",

	"58" => "Mostrar página de artigos",

);

$admin_billing_extra = array(

	"1" => "Defina esta opçao para 'sim' se quiser que todas as funcionalidades do seu site sejam acessíveis a todos.",

	"2" => "Pacote tipo",
	"3" => "Pacote membro",
	"4" => "SMS pacote",
	"5" => "Seleccione Sim, se voce deseja criar um pacote SMS que possa a ser usado para comprar créditos adicionais SMS no seu site.",
	"6" => "Nome do pacote",
		"7" => "Digite um nome para este pacote, este será exibido na página de subscriçao.",
	"8" => "Descriçao",
	"9" => "Preço",
	"10" => "Quanto quer cobrar para que os membros inscrevam-se nesse pacote? Note. Nao entre símbolos de moeda",
	"11" => "Mostrar Código de Moeda",

	"12" => "Este é o código da moeda que será exibida no seu site, ele nao é utilizado para a moeda de pagamento, este deve ser fixado nas definiçoes de pagamento.",
	"13" => "Subscriçao",
	"14" => "Seleccione Sim, se voce gostaria que este pagamento se torne recorrente.",
	"15" => "Período de actualizaçao (upgrade)",

	"16" => "Dia",
	"17" => "Semana",
	"18" => "Mes",
		"18a" => "Ilimitado",
	"19" => "Máximo mensagens (dia)",
		"20" => "Este é o número máximo de mensagens que os membros podem enviar por dia.",
	"21" => "Máximos interesses",
		"22" => "O número máximo de interesses que um membro com este pacote pode enviar por dia.",
	"23" => "Max Ficheiros máximos para upload ",
		"24" => "Ficheiros máximos que um membro pode fazer upload.",
	"25" => "Pacote icon link",
		"26" => "O link ícone do pacote deve ser um link para uma imagem do seu site. Recomendando-mos tamanho: 28px x 90px.",

	"27" => "Membro em destaque",
		"28" => "Seleccione Sim, se quiser exibir as fotos destes membros na frente de seu site.",
	"29" => "Destacados",
		"30" => "Seleccione Sim, se gostaria que membros com este pacote fiquem com um fundo em destaque nos resultados da pesquisa.",

	"31" => "Ver imagens adulto",
		"32" => "Seleccione Sim, se quiser que os membros com este pacote possam visualizar as imagens de membros para adultos.",
	"33" => "SMS creditos",
	"34" => "Este é o número de créditos SMS acrescentado para os membros quando eles sao actualizados para este pacote. Este será acrescentado ao seu valor actual, se eles já tiverem créditos.",
	"35" => "Visível na página de upgrade"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Apenas insira um link se deseja uma ligaçao para um site externo",
	"3" => "Notícias RSS feed data",

	"4" => "Categoria",
	"5" => "Vistas",
	"6" => "Legenda",
	"7" => "Idioma",
	"8" => "Grupo privado",

	"9" => "Alterar Fórum",
	"10" => "Seleccionar Fórum",
	"11" => "Fórum padrao",

	"12" => "Voce está a usar um fórum de terceiros. Faça o login na sua área de administraçao para administrar o seu fórum",
	"13" => "Palavra chave"
);

$admin_set_extra1 = array(

	"1" => "Permitir Foto/Imagem Uploads",
	"2" => "Permitir Vídeo Uploads",
	"3" => "Permitir Musica Uploads",
	"4" => "Permitir YouTube Uploads",
);

$admin_alerts = array(

	"1" => "Alertas",
	"2" => "Novos visitantes",
	"3" => "Novos membros",
	"4" => "Membros nao aprovados",
	"5" => "Ficheiros nao aprovados",
	"6" => "novas atualizaçoes",
);

$lang_members_nn = array(

	"0" => "Monitor de membros com abuso",
	"1" => "Nome de utilizador",
	"2" => "Nenhum histórico de Chat encontrados",
);

$members_opts = array(

	"1" => "Editar perfil",
	"2" => "Ficheiros Uploads",
	"3" => "Histórico de faturamento",
	"4" => "Enviar E-mail",
	"5" => "Enviar Mensagem",
	"6" => "Fórum mensagens",
	"7" => "Mensagens abusivas",
);

$admin_overview = array(



	"1" => "Anúncio",

	"2" => "Membros totais",

	"3" => "Esta semana",

	"3a" => "Hoje",

	"4" => "Actividade recente do site",

	"5" => "Relatórios Web site",



	"6" => "Visitantes únicos nas últimas duas semanas",

	"7" => "Novos membros inscritos  nas últimas 2 semanas",

	"8" => "Estatísticas de membros por género",

	"9" => "Estatísticas de membros por idade",



	"10" => "Novos afiliados registados nas últimas 2 semanas",

	"11" => "Visitor Map Settings",

	"12" => "Por favor insira a sua chave Google API no campo acima.",

	"13" => "Você pode comprar uma chave de licença na área do nosso site web",



	"14" => "Resultados da pesquisa",

	"15" => "Todos os ficheiros",

);
?>
