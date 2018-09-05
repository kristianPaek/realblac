<?php

$admin_charset = '';

ini_set('default_charset', 'UTF-8');

$LANG_ = array(
"_language" => "Turkish",
"_charset" => "UTF-8", 
);
$GLOBALS['_META'] = $LANG_;	

// ADMIN AREA
$admin_layout_header = array(

	"charset" => "UTF-8",
	"title" => "Yönetim Paneli"
		
);

$admin_layout = array(

	"3" => "Tercihlerim",
	"4" => "Çýkýþ",

);


$admin_layout_page1 = array(

	"" => "Anasayfa",

		"_*" => "Yönetim Paneli Anasayfa",
		"_?" => "",

	"members" => "Üye Ýstatistikleri",
		
		"members_*" => "Üye Ýstatistikleri",
		"members_?" => "Bu grafik aþaðýda son iki hafta içinde üye kaydýný gösterir.",
		"members_^" => "alt",

	"affiliate" => "Ortaklýk Ýstatistikleri",
 
		"affiliate_*" => "Ortaklýk Ýstatistikleri",
		"affiliate_?" => "Bu grafik aþaðýda son iki hafta içinde  ortaklýk kaydýný gösterir.",
		"affiliate_^" => "alt",

	"visitor" => "Ziyaretçi Ýstatistikleri",
 
		"visitor_*" => "Ziyaretçi Ýstatistikleri",
		"visitor_?" => "Bu grafik aþaðýda son iki hafta içinde her gün kayýt tutulan ziyaretçi istatistiklerini gösterir.",
		"visitor_^" => "alt",

	"maps" => "Google Maps",
 
		"maps_*" => "Google Maps ile Ziyaretçi Yerleþimi",
		"maps_?" => "Bu bölüm üyelerinizin dünya üzerinde nerede olduðunu görmenize izin verir. Pazarlama ve reklam kampanyalarýnýzý daha etkili gerçekleþtirip farklý ülkeleri izlemenize ve hedef belirlemenize izin verir.",
 

	"adminmsg" => "Web Site Duyurularý",
 
		"adminmsg_*" => "Web Site Duyurularý",
		"adminmsg_?" => "Aþaðýdaki kutunun içine mesajýnýzý girin ve girdiðiniz mesajýnýz üyelerinize duyuru olarak gösterilecektir. Bu sayede web site duyurularýný web site yeniliklerini üyelerinize gösterebilirsiniz.",

);
 

$admin_layout_page2 = array(

	"" => "Üyeler",

		"_$" => "yarým",
		"_*" => "Üyeleri Yönet",
 

			"edit" => "Üye Detaylarýný Düzenle",
	
				"edit_*" => "Üye Düzenle",
				"edit_?" => "Üyenin hesabýný ve profil detaylarýný güncellemek için aþaðýdaki seçenekleri kullanýn.",
				"edit_^" => "hiç",


			"fake" => "Sahte Üyeler",
	 
				"fake_*" => "Sahte Üye Oluþtur",
				"fake_?" => "Web siteniz için sahte üye oluþturmak için aþaðýdaki seçenekleri kullanýn, bu yöntemle ilk aþamada web sitenize robot üyeler oluþturabilir ve gerçek ziyaretçilerin web sitenize daha kolay gelmesini saðlayabilirsiniz. Sahte üyeleri için ayný e-mail adresi kullanýn. Daha sonra bu üyeleri silebilirsiniz.",
				"fake_^" => "alt",

	"banned" => "Banned Members",
 
		"banned_*" => "Banlanmýþ Üyeler",
		"banned_?" => "Sistem, hacking saldýrýlarýný kontrol eder ve otomatik olarak bunu gerçekleþtirmek isteyen kötü niyetli üyeyi ya da ziyaretçiyi banlar. Aþaðýda bu hack giriþiminde bulunanlarýn detaylarýný görebilirsiniz.",
		"banned_^" => "alt",

	"monitor" => "Üyeleri Ýzle",
 
		"monitor_*" => "Üyeleri Ýzle",
		"monitor_?" => "Zaman zaman üyeler kötü ve istenmeyen mesaj gönderen üyeleri size þikayet edebilirler. Bu özelliði kullanarak diðer üyelerin güvenliði ve huzuru için kötü niyetli üyenin mesajlarýný görüntüleyebilir ve bu üyeyi izleyebilir, tesbit edip banlayabilirsiniz.",
		"monitor_^" => "alt",

	"import" => "Üye Aktar",
 
		"import_*" => "CVS veya Database dosyasýndan Üye Aktar",
		"import_?" => "Bu özelliði kullanarak diðer dating sistemlerinden sitenize üye aktarabilir, üyelerinizi bu özelliði kullanarak taþýyabilirsiniz.",
		"import_^" => "alt",
		
	"files" => "Üye Dosyalarý", 
	"files_*" => "Üye Albüm Dosyalarý",


	"addfile" => "Fotoðraf Yükle",			 
	"addfile_*" => "Bir Fotoðraf Yükle",
	"addfile_?" => "Bazen üyeler siteye fotoðraf yükleme konusunda sorun yaþayabilirler. Bu özelliði kullanarak üyeniz için fotoðraf yükleyebilirsiniz.",
	"addfile_^" => "alt",
			
 
	"affiliate" => "Web Site Ortaklýklarý",
 
		"affiliate_*" => "Web Site Ortaklýklarý",
		"affiliate_?" => "Bu özelliði kullanarak Web Site Ortaklýklarýnýzý yönetebilirsiniz.",
		 
			"addaff" => "Yeni Ortaklýk Ekle",
	 
				"addaff_*" => "Yeni Ortaklýk Hesabý Ekle/Düzenle",
				"addaff_?" => "Web sitenize bir ortaklýk hesabý eklemek/düzenlemek için aþaðýdaki bütün alanlarý doldurun.",
				"addaff_^" => "alt",

			"affsettings" => "Ortaklýk Ýçerik Sayfalarý",
 
				"affsettings_*" => "Ortaklýk Sayfasý Dizayný",
				"affsettings_?" => "Ortaklýk sayfalarýnýzý düzenlemek için aþaðýdaki seçenekleri kullanýn.",
				"affsettings_^" => "alt",

			"affcom" => "Ortaklýk Komisyonu",
	 
				"affcom_*" => "Ortaklýk Komisyonu",
				"affcom_?" => "Buradan ortaklýk komisyon oranýnýzý belirleyebilirsiniz. Eðer bir ortaðýn referansýyla siteniz bir üye kazanmýþsa ortaðýnýza vermek istediðiniz komisyon oranýný oluþturabilirsiniz.",
				"affcom_^" => "alt",


			"affban" => "Ortaklýk Bannerlarý",
	 
				"affban_*" => "Ortaklýk Bannerlarý",
				"affban_?" => "Buradan ortaklarýnýzýn sitelerinde kullanmalarý için bannerlar hazýrlayabilirsiniz.",
				"affban_^" => "alt",

);


$admin_layout_page3 = array(

 

		"" => "Tema Galerisi",
 
			"_*" => "Tema Galerisi",
			"_?" => "Aþaðýdaki liste web sitenizde þuanda yüklü olan temalarý gösterir. Aþaðýdaki temalardan birine týklayarak temanýzý deðiþtirebilirsiniz.",
			 
				
			"color" => "Renk Þemasý",
		 
				"color_*" => "Renk Þemasý",
				"color_?" => "Aþaðýdaki seçenekleri kullanarak web siteniz için kendinize özgü renkler oluþturabilirsiniz. Resimleri kendi resimlerinizle deðiþtirmek isterseniz, lütfen resimler özelliðini kullanabilirsiniz.",
				"color_^" => "alt",
				
			"logo" => "Web Site Logo",
				"logo_$" => "yarým",
				"logo_*" => "Web Site Logo",
				"logo_?" => "Aþaðýdaki seçenekleri kullanarak kendinize ait bir logo oluþturabilirsiniz. Ayrýca kendi logonuzuda ekleyebilirsiniz.",
				"logo_^" => "alt",
				
			"img" => "Tema Resimler",
				"img_$" => "yarým",
				"img_*" => "Tema Resimleri",
				"img_?" => "Resimler tema klasöründe bulunmaktadýr. Var olan resimleri sizin seçtiðiniz resimlerinizle deðiþtirmek için aþaðýdaki seçenekleri kullanýn.",
				"img_^" => "alt",

			"text" => "Anasayfa Yazýsý",
				"text_$" => "yarým",
				"text_*" => "Anasayfa Yazýsý",
				"text_?" => "Bu alan web sitenizin anasayfasýndaki yazýlarý deðiþtirmenize izin vererek anasayfanýzda yazýlar oluþturmanýza yardýmcý olur.",
				"text_^" => "alt",


			"terms" => "Website Þ&K",
				"terms_$" => "yarým",
				"terms_*" => "Website Þartlar ve Koþullar",
				"terms_?" => "Web sitenizin kullaným koþullarý ve þartlarýný düzenleyebilirsiniz.",
				"terms_^" => "alt",
	
			"edit" => "Sayfalarý & Dosyalar",
 
			"edit_*" => "Web Site Sayfalarý",
			"edit_?" => "Aþaðýdaki listeden web sitenizdeki dosyalarýn içeriðini görüntüleyebilirsiniz. Lütfen deðiþtirmek istediðiniz dosyanýn içeriðini yedekledikten sonra düzenleme yapýnýz <b>Çünkü hata yaptýðýnýzda yaptýðýnýz iþlem geri alýnamaz.</a>",
				
	
	
				"newpage" => "Sayfa Oluþtur",
				"newpage_$" => "yarým",
				"newpage_*" => "Yeni bir sayfa oluþtur",
				"newpage_?" => "Web sitenizde bir sayfa oluþturun.",
				"newpage_^" => "alt",
							
				
			"meta" => "Tema Meta Tags",
				"meta_$" => "half",
				"meta_*" => "Meta Tag Düzenleyicisi",
				"meta_?" => "eMeeting binlerce sayfanýza meta tag oluþturmanýzý saðlayan geliþmiþ bir siteme sahiptir. eMeeting otomatik olarak sitenizin içeriðiyle ilgili sayfa baþlýðý, taným, meta tag ve anahtar kelime oluþturmanýza yardýmcý olacak.",
				"meta_^" => "alt",

 

		
			"menu" => "Menu Bars",
				"menu_$" => "half",
				"menu_*" => "Menu Bar Yönetimi",
				"menu_?" => "Aþaðýdaki seçenekleri kullanarak yeni menü isimleri ekleyerek menü isimlerini deðiþtirebilirsiniz. Eðer sitenizde baþka sitelere link vermek isterseniz http://google.com olarak menünüze dýþ linkler verebilirsiniz.",
				"menu_^" => "alt",

	"manager" => "Dosya Yöneticisi",
		"manager_$" => "yarým",
		"manager_*" => "Dosya Yöneticisi",
		"manager_?" => "Dosya Yöneticisi yeni dosya veya içerik eklemek ya da silmek istediðinizde size yardýmcý olur. Hosting hesabýnýza girip dosyalara göz atabilirsiniz.",

			"slider" => "Dönen Resimler",
				"slider_$" => "yarým",
				"slider_*" => "Anasayfada Dönen Resimler",
				"slider_?" => "Anasayfanýzda görünen resim slayt geçiþleri gösterir. Resimleri resim tanýmlarýný ve linklerini düzenlemek için aþaðýdaki seçenekleri kullanýn..",
				"slider_^" => "alt",

	"languages" => "Dil Dosyalarý",
		"languages_$" => "yarým",
		"languages_*" => "Dil Dosyalarý",
		"languages_?" => "Aþaðýda web sitenizde yüklü bütün diller listelenmiþtir. Kullanmak istemediðiniz herhangi bir dil dosyasýný silebilir veya varsayýlan web site dilinizi deðiþtirebilirsiniz. <b>Dil dosyasý deðiþimi yaptýktan sonra yaptýðýnýz deðiþikliklerin admin paneline yansýmasý için admin panelinden çýkýþ yapýp tekrar oturum açýn</b>",

			"editlanguage" => "Dil Dosyasýný Düzenle",
				"editlanguage_$" => "yarým",
				"editlanguage_*" => "Dil Dosyasýný Düzenle",
				"editlanguage_?" => "Aþaðýda dil dosyalarýný düzenlerken dikkatli olun, herhangi bir sistem hatasýna sebeb olmamak için syntaxlara dikkat ediniz. Sadece (=>) iþaretinden sonra týrnak içerisindeki yerleri deðiþtirin.",
				"editlanguage_^" => "alt",

			"addlanguage" => "Dil Dosyasý Ekle",
				"addlanguage_$" => "yarým",
				"addlanguage_*" => "Dil Dosyasý Ekle",
				"addlanguage_?" => "Var olan dil dosyalarýndan birini kopyalayýp ismini deðiþtirerek yeni bir dil oluþturabilir, sonra  bu dil dosyasýný açýp içeriðini düzenleyebilirsiniz.",
				"addlanguage_^" => "alt",



);


$admin_layout_page4 = array(

	"" => "Email ve E-Bültenler",

		"_$" => "half",
		"_*" => "Email ve E-Bültenler",
		"_?" => "Aþaðýda sistemde yer alan bütün e-maillerin bir listesi vardýr. Sistem emailleri üyelik iþlemlerinde, þifre hatýrlatma iþlemlerinde ve birtakým kullanýcý iþlemlerinde üyelere email göndermenize yardým eder. Aþaðýdaki seçenekleri kullanarak bu e-mailleri oluþturabilir, düzenleyebilirsiniz.",

			"add" => "Yeni Email Oluþtur",
				"add_$" => "yarým",
				"add_*" => "Yeni Emaili Ekle/Düzenle",
				"add_?" => "Yeni emailinizi eklemek/düzenlemek için aþaðýdaki formlarý doldurun, oluþturduðunuz bu email kendi oluþturduðunuz emailler bölümünde kayýt altýna alýnacaktýr.",
				"add_^" => "alt",

	"welcome" => "Karþýlama Email/SMS",
		"welcome_$" => "half",
		"welcome_*" => "Karþýlama Email/ SMS Oluþtur",
		"welcome_?" => "Aþaðýdaki seçenekleri kullanarak yeni üye olan üyenize gönderilecek olan email ve yazýlarý belirleyin.",
		"welcome_^" => "alt",

	"template" => "Email Þablonlarý",
		"template_$" => "yarým",
		"template_*" => "Email Þablonlarý",
		"template_?" => "Aþaðýda sistemde olan þablon(lar) listelenmiþtir. Þablonu açmak ve düzenlemek için resmin üstüne týklayýn.",
		"template_^" => "alt",

	"export" => "Email Yükle",

		"export_$" => "yarým",
		"export_*" => "Email Yükle",
		"export_?" => "Database'den email adreslerini yüklemek için aþaðýdaki seçenekleri kullanabilirsiniz.",
		"export_^" => "alt",

	"sendnew" => "E-bülten Gönder",

		"sendnew_$" => "yarým",
		"sendnew_*" => "E-bülten Gönder",
		"sendnew_?" => "Üyelerinize e-bülten göndermeye baþlamak için aþaðýdaki seçenekleri kullanýn, Önce hangi üyelere göndereceðinizi ve sonra hangi e-postayý göndereceðinizi seçin.",

	"send" => "Tek Email Gönder",

		"send_$" => "yarým",
		"send_*" => "Tek Email Gönder",
		"send_?" => "Aþaðýdaki seçenekleri kullanarak herhangi üyenize tek bir email gönderebilirsiniz. Emaili göndermekte kullanýlan email, yönetici hesabýnýzda listelenenle aynýdýr.",
		"send_^" => "alt",

	"subs" => "Email Hatýrlatýcýlarý",

		"subs_$" => "yarým",
		"subs_*" => "Email Hatýrlatýcýlarý",
		"subs_?" => "Email hatýrlatýcýlarý, üyelere üyeliklerinin sona ermesi gibi bir olay için kaç gün kaldýðý veya resim eklemedikleri konusunda e-postalar gönderebilmenizi saðlar..",
		"subs_^" => "alt",
		
	"tc" => "Email Raporlarý",
		"tc_$" => "yarým",
		"tc_*" => "Email Raporlarý",
		"tc_?" => "Ýzleme kodu içeren bir email gönderildiði zaman Email raporlarý oluþturulur. Gönderdiðiniz emaillerin kaç üye tarafýndan açýldýðýna iliþkin istatistikler oluþturur.",
		"tc_^" => "alt",

			"tracking" => "Email Ýzleme Kodu",
				"tracking_$" => "yarým",
				"tracking_*" => "Email Ýzleme Kodu",
				"tracking_?" => "Aþaðýdaki izleme kodunun (izleme kimliði) yerine, gönderilen emaillere eklenen þeffaf bir görüntü konulur, eðer email açýlýr ve görüntü engellenmezse, sistem emailinin açýldýðýný kaydederek sizin için bir izleme raporu üretir.",
				"tracking_^" => "alt",



	"SMSsend" => "SMS Mesajlarý Gönder",

		"SMSsend_$" => "alt",
		"SMSsend_*" => "SMS Mesajlarý Gönder",
		"SMSsend_?" => "Üyelerinizin cep telefonlarýna SMS/text mesaji göndermek için aþaðýdaki seçenekleri kullanýn.",
);

$admin_layout_page5 = array(

	"" => "Üyelik Seviyeleri",

		"_$" => "yarým",
		"_*" => "Üyelik Seviyeleri",
		"_?" => "Aþaðýda internet sitenize uygulanan mevcut üyelik paketleri sýralanmýþtýr. Yeþil renkli olanlar sistemin ziyaretçi ve yeni üyeleri kontrol edebilmesi için gereklidir ve böylece internet sitenizi daha iyi denetleyebilirsiniz.",

			"epackage" => "Paket Ekle",
				"epackage_$" => "yarým",
				"epackage_*" => "Paket Ekle/Düzenle",
				"epackage_?" => "Web siteniz için üyelik paketleri eklemek veya güncellemek için aþaðýdaki formlarý tamamlayýn",
				"epackage_^" => "sub",

			"packaccess" => "Giriþleri Yönet",
				"packaccess_$" => "tam",
				"packaccess_*" => "Sayfa Giriþlerini Yönet",
				"packaccess_?" => "Üyelik paketlerinize baðlý tüm giriþleri buradan kontrol edebilirsiniz. <b>Not: Eðer üyenin bu sayfayý görüntülemesini istemezseniz kutuya sadece imge býrakýn. </b>",
				"packaccess_^" => "alt",

			"upall" => "Üyeleri Transfer Et",
				"upall_$" => "yarým",
				"upall_*" => "Paketler Arasý Üyeleri Transfer Et",
				"upall_?" => "Üyeleri bir üyelik seviyesinden baþka bir üyelik seviyesine transfer etmek için bu seçenekleri kullanýn.",
				"upall_^" => "alt",


	"gateway" => "Ödeme Yöntemi",

		"gateway_$" => "yarým",
		"gateway_*" => "Ödeme Yöntemi",
		"gateway_?" => "Ödeme yöntemleri üyelik yükseltmeleri için ödeme almanýza olanak saðlar. Eðer üyelikleriniz ücretsizse ödeme sistemleri bölümünden bu ayarý kapatabilirsiniz.",


			"addgateway" => "Ödeme Yöntemi Ekle",
				"addgateway_$" => "yarým",
				"addgateway_*" => "Ödeme Yöntemi Ekle",
				"addgateway_?" => "Yazýlým sistemin içinde kurulu bazý ödeme yöntemlerine sahiptir; bunu sitenizde kullanmak için aþaðýdaki listeden saðlayýcý seçin..",
				"addgateway_^" => "alt",


	"billing" => "Fatura Sistemi",

		"billing_$" => "yarým",
		"billing_*" => "Fatura Sistemi",	


		"affbilling" => "Ortaklýk Fatura Geçmiþi",
	
			"affbilling_$" => "half",
			"affbilling_*" => "Ortaklýk Fatura Geçmiþi", 
			"affbilling_^" => "alt",


);

$admin_layout_page6 = array(

	"" => "Banner ve Reklam",

		"_$" => "yarým",
		"_*" => "Banner ve Reklam",
 

			"addbanner" => "Banner Ekle",
				"addbanner_$" => "yarým",
				"addbanner_*" => "Banner Ekle",
				"addbanner_?" => "Web sitenize yeni bir banner eklemek için aþaðýdaki seçenekleri kullanýn.",
				"addbanner_^" => "alt",


);

$admin_layout_page7 = array(

	"" => "Görünüm Ayarlarý",

		"_$" => "yarým",
		"_*" => "Görünüm Ayarlarý",
		"_?" => "Ýstemediðiniz web sitesi özelliklerini aþaðýdaki seçenekleri kullanarak kapatabilirsiniz.",


	"op" => "Görünüm Seçenekleri",

		"op_$" => "yarým",
		"op_*" => "Görünüm Seçenekleri",
		"op_?" => "Ýstediðiniz web site ayarlarýný kendinize göre uyarlamak için aþaðýdaki seçenekleri kullanýn.",
	
		"op1" => "Arama Ayarlarý",
	
			"op1_$" => "yarým",
			"op1_*" => "Arama Görünümü Ayarlarý",
			"op1_?" => "Aþaðýdaki seçenekleri kullanarak web sitenizde arama sayfasýnýn görünümü deðiþtirebilirsiniz.",
			"op1_^" => "sub",
	
		"op2" => "Üyelik Ayarlarý",
	
			"op2_$" => "yarým",
			"op2_*" => "Üyelik Ayarlarý",
			"op2_?" => "Web sitenizin üyelik kurulumunun nasýl görüntülendiðini ayarlamak için aþaðýdaki seçenekleri kullanýn.",
			"op2_^" => "alt",

		"op3" => "Flash Sunucu Ayarlarý",
	
			"op3_$" => "yarým",
			"op3_*" => "Flash Sunucu Ayarlarý",
			"op3_?" => "Üye video selamlamalarýný depolamak için bir flash sunucu kullanýlýr ve üye video kameralarýný görüntülemek için IM(anlýk mesajlaþma) ve sohbet odasý dahilinde kullanýlýr.",
			"op3_^" => "alt",

		"op4" => "API Ayarlarý",
	
			"op4_$" => "yarým",
			"op4_*" => "API Ayarlarý", 
			"op4_^" => "alt",

		"thumbnails" => "Varsayýlan Küçük Resimler",
	
			"thumbnails_$" => "half",
			"thumbnails_*" => "Varsayýlan Küçük Resimler", 
			"thumbnails_^" => "Üyeler resim yüklemediklerinde varsayýlan olarak belirlenen resimler aþaðýda listelenmiþtir.",

	"email" => "Email Ayarlarý",

		"email_$" => "half",
		"email_*" => "Email Ayarlarý",
		"email_?" => "Aþaðýda web site etkinliklerinin listesi belirtilmiþtir, Sistemin bir email bildirimi göndermesini isterseniz herhangi bir etkinliði seçebilirsiniz. Email bildirimleri sistem ayarlarýna girebilen bütün sistem yöneticilerine gönderilecektir.",

	"paths" => "Dosya/Klasör Yolu",

		"paths_$" => "half",
		"paths_*" => "Dosya/Klasör Yolu",
		"paths_?" => "Dosya/Klasör Yollarý hosting hesabýnýzdaki dosya ve klasörlerle iliþkilidir. Yazýlým bu yükleme esnasýnda otomatik olarak uygulayacak ama aþadaki bilgileri kendi hostunuza göre uyarlamanýz gerekiyor.",

	"watermark" => "Resim Sembolü",

		"watermark_$" => "yarým",
		"watermark_*" => "Resim Sembolü",
		"watermark_?" => "Resim sembolü üye görüntülendiðinde üyenin üstünde görüntülenen bir resimdir. Bu genellikle web sitenizin logosudur, ya da farklý web sitenizin kimliðini yansýtan bir resim olabilir. Resim sembolleri PNG formatýnda ve 8bit olmalýdýr.",


);


$admin_layout_page8 = array(

	"" => "Web Site Alaný",

		"_$" => "yarým",
		"_*" => "Profil, Kayýt ve Arama Alanlarý",
		"_?" => "Aþaðýda þuanda web sitenizde mevcut olan bütün alanlar listelenmiþtir. Bu alanlarý kayýt, arama profil eþ uyumu sayfasýnda görüntülemek için seçebilirsiniz. Aþaðýdaki seçenekleri kullanarak web sitenize hýzlý ve kolayca yeni alanlar ekleyebilirsiniz.",

		"addfields" => "Yeni Alan Oluþtur",
	
			"addfields_$" => "yarým",
			"addfields_*" => "Yeni Alan Oluþtur",
			"addfields_?" => "Aþaðýdaki seçenekleri kullanarak web sitenize yeni bir alan ekleyin. Alanlar üyelerinizin kendileri hakkýnda doldurabilecekleri bilgiler oluþturmanýzý saðlar.",
			"addfields_^" => "alt",

		"fieldgroups" => "Gruplarý Yönet",
	
			"fieldgroups_$" => "yarým",
			"fieldgroups_*" => "Alan Gruplarýný Yönet",
			"fieldgroups_?" => "Gruplar içine alanlar ekleyebileceðiniz bir alanlar topluluðudur. Örneðin: 'Hakkýmda' diye bir grup oluþturup bu grubun içine 'Ýsmim' 'Yaþým' vs. alanlar ekleyebilirsiniz. <b> Eðer bir grubu alanlarýyla silerseniz, alanlar bir sonraki gruba taþýnacaktýr.",
			"fieldgroups_^" => "alt",

		"addgroups" => "Alan Gruplarý Oluþtur",
	
			"addgroups_$" => "yarým",
			"addgroups_*" => "Yeni Alan Grubu Oluþtur",
			"addgroups_?" => "Bir alan grubu ana grup baþlýðý altýna konulan alanlar topluluðudur. Bu size içine alanlar ekleyebileceðiniz birçok grup oluþturmanýzý saðlar.",
			"addgroups_^" => "alt",




	"cal" => "Etkinlik Takvimi",

		"cal_$" => "yarým",
		"cal_*" => "Etkinlik Takvimi",
		"cal_?" => "Etkinlik takvimi web sitenizde etkinlik oluþturup ve bu etkinlikleri üyelerinizin katýlmasýný saðlar. Yeni bir etkinlik oluþturmak, düzenlemek ve aktarmak için aþaðýdaki seçenekleri kullanýn.",

		"caladd" => "Etkinlik Ekle",
	
			"caladd_$" => "yarým",
			"caladd_*" => "Etkinlik Ekle/Düzenle",
			"caladd_?" => "Bir web sitesi etkinliði eklemek/düzenlemek için aþaðýdaki alanlarý tamamlayýn.",
			"caladd_^" => "alt",

		"caladdtype" => "Etkinlik Türü Yönet",
	
			"caladdtype_$" => "yarým",
			"caladdtype_*" => "Etkinlik Türü Yönet",
			"caladdtype_?" => "Yeni etkinlik türü oluþturmak için aþaðýdaki seçenekleri kullanýn, Her etkinlik için bir resim eklemeniz web sitenizi dah profesyonel göstermeniz açýsýndan tavsiye edilir.",
			"caladdtype_^" => "alt",

		"importcal" => "Etkinlik Aktar",
	
			"importcal_$" => "yarým",
			"importcal_*" => "Etkinlik Ara & Aktar",
			"importcal_?" => "eMeetin api sistemine sahiptir. Bu özelliði kulanarak bütün dünyada yerel veya uluslararasý databaselerde etkinlik aramasý yapabilir ve istediðiniz etkinliði web sitenize ekleyebilirsiniz.",
			"importcal_^" => "alt",


	"poll" => "Web Site Anket",

		"poll_$" => "half",
		"poll_*" => "Web Site Anket",
		"poll_?" => "Web siteniz için anketler oluþturmak ve düzenlemek için aþaðýdaki seçenekleri kullanýn.",

		"polladd" => "Anket Ekle",
	
			"polladd_$" => "yarým",
			"polladd_*" => "Yeni Bir Anket Oluþtur",
			"polladd_?" => "Web sitenize yeni bir anket oluþrumak için aþaðýdaki alanlarý doldurun.",
			"polladd_^" => "alt",



	"forum" => "Web Site Forum",

		"forum_$" => "yarým",
		"forum_*" => "Web Site Forum Kategorileri",
		"forum_?" => "Forum kategorilerinizi yönetmek için aþaðýdaki seçenekleri kullanýn. Her kategori için fotoðraf iconu eklemeniz web sitenizi daha profesyonel göstermesi açýsýndan önerilir.",

		"forumadd" => "Forum Kategorisi Ekle",
	
			"forumadd_$" => "yarým",
			"forumadd_*" => "Forum Kategorisi Ekle",
			"forumadd_?" => "Yeni bir forum kategorisi eklemek için aþaðýdaki alanlarý doldurun.",
			"forumadd_^" => "alt",

		"forumchange" => "Üçüncü Parti Forum",
	
			"forumchange_$" => "yarým",
			"forumchange_*" => "Forum Entegrasyonunu Yönet",
			"forumchange_?" => "eMeeting forum ekleme özelliðinede sahip, Varsayýlan eMeetin forumunun yerine baþka bir forum kullanmak isterseniz aþaðýdaki listeden kullanmak istediðiniz forumu seçebilirsiniz. Bu özelliði aktif etmeden önce lütfen kullanmak istediðiniz forum kurulum kýlavuzuna baþvurun.",
			"forumchange_^" => "alt",

		"forumpost" => "Postalarý Yönet",
	
			"forumpost_$" => "yarým",
			"forumpost_*" => "Forum Postalarýný Yönet",
			"forumpost_?" => "Aþaðýda üyeleriniz tarafýndan eklenmiþ son forum postalarý listelenmiþtir. Kabul etmek istemediðiniz konularý silmek ya da düzenlemek için aþaðýdaki seçenekleri kullanýn.",
			"forumpost_^" => "alt",

	"chatrooms" => "Web Site Chatroom",

		"chatrooms_$" => "yarým",
		"chatrooms_*" => "Web Site Chat Odasý",
		"chatrooms_?" => "Web siteniz için chat odasý oluþturmak veya var olan chat odalarýný düzenlemek için aþaðýdaki seçenekleri kullanýn.",


	"faq" => "Web Site SSS",

		"faq_$" => "yarým",
		"faq_*" => "Web Site SSS",
		"faq_?" => "Web site SSS üyelerinizin sýkça sorduklarý sorulara cevap vermek ve onlara bu bölümde yardým edebilmek için mükemmel bir yoldur. Aþaðýdaki seçenekleri kullanarak kendi SSS bölümünüzü oluþturun ve düzenleyin.",

		"faqadd" => "SSS Ekle",
	
			"faqadd_$" => "yarým",
			"faqadd_*" => "SSS Ekle/Düzenle",
			"faqadd_?" => "SSS girdisi eklemek ya da düzenlemek için aþaðýdaki alanlarý doldurun.",
			"faqadd_^" => "alt",

	"words" => "Kelime Süzgeci",

		"words_$" => "half",
		"words_*" => "Kelime Süzgeci",
		"words_?" => "Kelime Süzgeci üye profillerinde IM'de(anýnda mesajlaþma) ve forumlarda etkilidir ve süzgece yazýlan sözcükleri deðiþtirerek (**) þeklinde gösterir.",



	"articles" => "Web Site Makaleleri",

		"articles_$" => "yarým",
		"articles_*" => "Web Site Makaleleri",
		"articles_?" => "Web site Makalelerini kullanarak sitenizle ilgili deðiþimleri, bilgileri, haberleri, etkinlikleri vs. üyelerinize ulaþtýrabilirsiniz.",


		"articleadd" => "Makale Ekle",
	
			"articleadd_$" => "half",
			"articleadd_*" => "Yeni Bir Makale Oluþtur",
			"articleadd_?" => "Web sitenize yeni bir makale eklemek için aþaðýdaki alanlarý doldurun.",
			"articleadd_^" => "alt",

		"articlerss" => "RSS Makaleleri Aktar",
	
			"articlerss_$" => "yarým",
			"articlerss_*" => "RSS Makaleleri Aktar",
			"articlerss_?" => "Oluþturduðunuz kategorilerin içine direk RSS makaleleri eklemek RSS linkleri kullanýlabilir. Örneðin 'Haberler' diye bir kategori oluþturmak isteyebilir ve bir haber sitesinden RSS beslemesi girebilirsiniz.",
			"articlerss_^" => "alt",

		"articlecats" => "Makale Kategorileri",
	
			"articlecats_$" => "yarým",
			"articlecats_*" => "Makale Kategorileri",
			"articlecats_?" => "Web siteniz için yeni makale kategorileri olutþrumak için aþaðýdaki seçenekleri kullanýn.",
			"articlecats_^" => "alt",


	"groups" => "Topluluk Gruplarý",

		"groups_$" => "half",
		"groups_*" => "Topluluk Gruplarý",
		"groups_?" => "Web sitenize Topluluk Grubu eklemek için aþaðýdaki seçenekleri kullanýn.",


	"class" => "Ýlanlar",

		"class_$" => "yarým",
		"class_*" => "Ýlanlar",
		"class_?" => "Aþaðýda üyeleriniz tarafýndan oluþturulan ilanlar listelenmiþtir.",


		"addclass" => "Ýlan Ekle",
	
			"addclass_$" => "yarým",
			"addclass_*" => "Ýlan Ekle/Düzenle",
			"addclass_?" => "Web sitenize ilan eklemek için aþaðýdaki seçenekleri kullanýn.",
			"addclass_^" => "alt",

		"addclasscat" => "Kategorileri Yönet",
	
			"addclasscat_$" => "yarým",
			"addclasscat_*" => "Kategorileri Yönet",
			"addclasscat_?" => "Ýlan kategorisi eklemek için aþaðýdaki seçenekleri kullanýn. Her kategori için bir fotoðraf ikonu eklemeniz web sitenizin daha profesyonel gözükmesi açýsýndan tavsiye edilir.",
			"addclasscat_^" => "alt",

	"games" => "Web Site Oyunlarý",

		"games_$" => "yarým",
		"games_*" => "Web Site Oyunlarý",
		"games_?" => "Aþaðýda web sitenizde yüklü olan tüm oyunlar listelenmiþtir. Yeni bir oyun yüklemek isterseniz lütfen yeni bir oyun yüklemekle ilgili dökümaný okuyun.",

	"gamesinstall" => "Oyun Yükle",

		"gamesinstall_$" => "yarým",
		"gamesinstall_*" => "Oyunlarý Yükle",
		"gamesinstall_?" => "Aþaðýda yüklemek istediðiniz oyunlarý seçin. Eðer yeni bir oyun yüklemek isterseniz, oyun tar dosyalarýný klasör yoluna doðru bir þekilde yükleyin: inc/exe/Games/tar/. <b>Yeni oyun yükleme konusunda lütfen dökümaný inceleyin.</b>",
		"gamesinstall_^" => "alt",


);


$admin_layout_page9 = array(

	"" => "Yöneticiler",

		"_$" => "yarým",
		"_*" => "web site Yönetici & Moderatörleri",
		"_?" => "Aþaðýda yöneticiler ve moderatörler listelenmiþtir. Üye arama sayfasýný kullanýp çýkan üyelerden istediðinizi, isminin yanýndaki moderatör iconuna týklayarak yeni moderatörler olarak atayýn.",

	"pref" => "Yönetici Tercihleri",

		"pref_$" => "yarým",
		"pref_*" => "Yönetici Tercihleri",
		"pref_?" => "Yönetici Tercihlerini kendinize uyarlamak için aþaðýdaki ayarlarý kullanýn.",

	"manage" => "Moderatörleri Yönet",

		"manage_$" => "yarým",
		"manage_*" => "Web site Moderatörlerini Yönet",
		"manage_?" => "Web sitesi moderatörleri iki role sahiptir, onlar sadece web site anasayfasýnda düzenleme hakkýna sahiptir, veya onlara yönetici giriþ detaylarýný saðlayarak yönetim bölümününde de düzenleme yapmasýna olanak saðlayabilirsiniz.",

	"email" => "Yönetici Emailleri",

		"email_$" => "yarým",
		"email_*" => "Yönetici Emailleri",
		"email_?" => "Aþaðýda üyelerden yönetime gelen bütün mesajlar listelenmiþtir.",

	"compose" => "Email Oluþtur",

		"compose_$" => "yarým",
		"compose_*" => "Email Oluþtur",
		"compose_?" => "Üyelerinize göndermek üzere yeni bir mesaj oluþturmak için aþaðýdaki seçenekleri kullanýn.",
		"compose_^" => "altý",

	"super" => "Süper Kullanýcý Giriþi",

		"super_$" => "yarým",
		"super_*" => "Süper Kullanýcý Oturum Açma Detaylarý",
		"super_?" => "Aþaðýda hesap detaylarýný düzenlerken dikkat edin, bu süper kullanýcý hesabýdýr ve her zaman diðerlerinden gizli tutulduðuna emin olmalýsýnýz.",
		"super_^" => "altý",
);

$admin_layout_page10 = array(

	"" => "Yazýlým Güncellemeleri",

		"_$" => "yarým",
		"_*" => "Yazýlým Güncellemeleri",
		"_?" => "Aþaðýda son yayýnlanan yazýlým versiyonu ve sizin yazýlýmýnýzýn versiyonu gösterilmiþtir. Eðer güncellemeniz gerekiyorsa, lütfen son güncelleme için þirketinizle iletiþime geçin.",

	"backup" => "Database Yedekleme",

		"backup_$" => "yarým",
		"backup_*" => "Database Yedekleme",
		"backup_?" => "Aþaðýda database yedeklemesi yapamak için bir ya da daha fazla tablo seçin. Kullandýðýnýz hosting database yedekleme alanýný kullanmanýz taviye edilir.",


	"license" => "Yazýlým Lisans Anahtarý",

		"license_$" => "yarým",
		"license_*" => "Yazýlým Lisans Anahtarý",
		"license_?" => "Aþaðýda yazýlým lisans anahtarýnýz gösterilmiþtir, lütfen doðru olarak girdiðinizden emin olun.",

	"sms" => "SMS Kredileri",

		"sms_$" => "yarým",
		"sms_*" => "SMS Kredileri",
		"sms_?" => "Aþaðýda SMS kredinizin toplam miktarý ve hesabýnýzda kalan miktarý belirtilmiþtir.",

);

$admin_layout_page11 = array(

	"" => "Yazýlým Eklentileri",

		"_$" => "yarým",
		"_*" => "Yazýlým Eklentileri",
		"_?" => "Plugins extend and expand the functionality of eMeeting dating software. Once a plugin is installed, you may activate it or deactivate it here using the menu options on the left.",

);


$admin_layout_nav = array(

	"1" => "Pano",
		"1a" => "Üye Ýstatistikleri",
		"1b" => "Ortaklýk Ýstatistikleri",
		"1c" => "Ziyaretçi Ýstatistikleri",
		"1d" => "Ziyaretçi Yerleþimleri",
	"2" => "Üyeler",
		"2a" => "Üyeleri Yönet",
		"2b" => "Ortaklýklarý Yönet",
		"2c" => "Banlanmýþ Üyeler",
		"2d" => "Üye Dosyalarý",
		"2e" => "Üye Aktar",
	"3" => "Tasarým",
		"3a" => "Temalar",
		"3b" => "Teme Düzenleyici",
		"3c" => "Tema Resim Yöneticisi",
		"3d" => "Logo Düzenleyici",
		"3e" => "Meta Taglar",	
		"3f" => "Diller",
		"3g" => "Sayfalama",
		"3h" => "File Manager",
		"3i" => "Menü Bar",
	"4" => "Email",
		"4a" => "Emailleri Yönet",
		"4b" => "Email Þablonlarý",
		"4c" => "Email Raporlarý",
		"4d" => "Tek Email Gönder",
		"4e" => "Email Hatýrlatýcýlarý",	
		"4f" => "Emailleri Ýndir",
		"4g" => "E-bülten Gönder",		
	"5" => "Fatura",
		"5a" => "Paketleri Yönet",
		"5b" => "Ödeme Yöntemleri",
		"5c" => "Fatura Geçmiþi",
		"5d" => "Ortaklýk Fatura Geçmiþi",
	"6" => "Ayarlar",
		"6a" => "Görüntüleme Seçenekleri",
		"6b" => "Görüntüleme Ayarlarý",
		"6c" => "Sistem Yollarý",
		"6d" => "Fotoðraf Sembolü",
	"7" => "Ýçerik",
		"7a" => "Arama Alanlarý",
		"7b" => "Etkinlik Takvimi",
		"7c" => "Web site Anket",
		"7d" => "Web site Forum",
		"7e" => "Chat Odalarý",	
		"7f" => "SSS",
		"7g" => "Kelime Süzgeci",
		"7h" => "Makaleler/Haberler",
		"7i" => "Gruplar",
	"8" => "Promosyonlar",	
		"8a" => "Bannerlar",
	"9" => "Eklentiler",	
		"9a" => "",
	"10" => "Moderatörleri Yönet",	
		"10a" => "Moderatörleri Yönet",
		"10b" => "Süper Kullanýcý",
	"11" => "Bakým",
		"11a" => "Sistem Yedekleme",
		"11b" => "Lisans Anahtarý",
		"11c" => "Sistem Güncelleme",
);

// MEMBERS PAGE
$lang_members_code = array(
	"update" => "Sistem Baþarýyla Güncellendi",
	"no_update" => "Sistem güncellendi bununla birlikte silmek için hiçbirþey yok!",
	"edit" => "Düzenle",
);
$GLOBALS['lang_admin_edit'] = " ".$lang_members_code['edit'];

$admin_button_val = array(
	"0" => "Arama",
	"1" => "Hepsini Seç",
	"2" => "Hiçbirini Seçme",
	"3" => "Onaylar",
	"4" => "Askýya Al",
	"5" => "Sil",	
	"6" => "Özel Üye Yap",
	"7" => "Seçenekler",	
	"8" => "Güncelle",	
	"9" => "Özel Yap",
	"10" => "Özel Kaldýr",	
	"11" => "Varsayýlan Dili Güncelle",
	"12" => "Gönder",
	"13" => "Devam Et",	
	"14" => "Aktif Yap",
	"15" => "Geçersiz Kýl",
	"16" => "Order Güncelle",
	"17" => "Alan Sayfalarýný Güncelle",	
	"18" => "Geçerli Kýl",
);

$admin_table_val = array(
	"1" => "Kullanýcý Adý",
	"2" => "Cinsiyet",
	"3" => "Son Aktivitesi",
	"4" => "Durum",
	"5" => "Paket",
	"6" => "Güncellenmiþ",
	"7" => "Seçenekler",	
	"8" => "Tarih",
	"9" => "IP Adresi",
	"10" => "Hack String",	
	"11" => "Katýlým Tarihi",	
	"12" => "Ýsim",
	"13" => "Email",
	"14" => "Týklamalar",
	"15" => "Üyelikleri",
			
	"15" => "Ödenmiþ Komisyon",
		
	"16" => "Mesaj",
	"17" => "Zaman",
	"18" => "Dosya Adý",
	"19" => "Son Güncellenmiþ",	
	"20" => "Düzenle",
	"21" => "Varsayýlan",	
	"22" => "ID(Kimlik)",

	"23" => "Fiyat",
	"24" => "Görünür",	
	"25" => "Tür",
	"26" => "Giriþleri Yönet",	
	"27" => "Aktif",

	"28" => "Kodu Görüntüle",
	"29" => "Alanlar",	
	"30" => "Ortaklýk Ýsmi",
	"31" => "Toplam Vade",	
	"32" => "Durum",
	
	"33" => "Yükseltilen Tarih",
	"34" => "Bitiþ Tarihi",	
	"35" => "Ödeme Metodu",
	"36" => "Hala Aktif",	
	"37" => "Þifre",
	"38" => "En Son Giriþ",

	"39" => "Durum",
	"40" => "Hit",	
	"41" => "Aktif",
	"42" => "Önizle",	
	"43" => "Baþlýk",
	"44" => "Makaleler",
	"45" => "Order",

);

$admin_search_val = array(
	"1" => "Üye Kullanýcý Adý",
	"2" => "Bütün Paketler",
	"3" => "Tüm Cinsiyetler",
	"4" => "Sayfa Baþýna",
	"5" => "Þipariþe Göre",
	"6" => "Email Adresi",
	
	"7" => "Herhangi Bir Durum",
	"8" => "Aktif Üyeler",
	"9" => "Askýya Alýnan Üyeler",
	"10" => "Onaylanmayan Üyeler",
	"11" => "Hesabýný Silmek Ýsteyen Üyeler",
	"12" => "Tüm Sayfalar",
);
////////////////////////// MAIN PAGES ////////////////////////////////////
$admin_management = array(

	"1" => "Tüm Gruplarý Yönet",
	"2" => "Grup Adý",
	"3" => "Dil",		
	"4" => "Konularý Yönet",
	"5" => "Kategorileri Yönet",	
	"6" => "Grup Kategori Adý",		
	"7" => "Kategorileri Yönet",	
	"8" => "Ýsim",	
	"9" => "Sayý",	
	"10" => "Makale Ekle",	
	"11" => "Kategori",
	"12" => "Sayfa Baþlýðý",	
	"13" => "Kýsa Taným",		
	"14" => "Makale Ekle",
	"15" => "Kategorileri Yönet",
	"16" => "Alan Listeleri",
	"17" => "Order",
	"18" => "Dil",
	"19" => "Liste Deðerleri",
	"20" => "Yeni Alan",	
	
	"21" => "Alan Baþlýðý",		
	"22" => "Alan Türü",
		"23" => "Text Alaný",	
		"24" => "Text Bölgesi",	
		"25" => "Liste Kutusu",
		"26" => "Tek Ýþaret Kutusu",
		"27" => "Çoklu Ýþaret Kutusu",
	
	"28" => "Grup Baþlýðý",
	"29" => "Kayýt Sýrasýnda Ýçersin",
	"30" => "Aþaðý Seç",
	
	"31" => "Grup Ekle",
	"32" => "Grup Görüntüleme Seçenekleri",
		"34" => "Bütün Üyelere Göster",
		"35" => "Sadece Yöneticilere Göster",
		"36" => "Yönetici ve üyelere göster(profilde deðil)",
	"37" => "Sadece",	
	"38" => "Gruplarý Yönet",	
	"39" => "Etkinlik Ekle",	
	"40" => "Field Captions",
	"41" => "Caption",		
	"42" => "Text Tanýmý",
	"43" => "Caption Türü",	
	"44" => "Arama Caption",		
	"45" => "Profil Caption",	
	"46" => "Profil sayfasý için 'i am a' gibi bir caption, arama sayfasý için 'i am seeking a' gibi bir caption oluþturmalýsýnýz.",	
	"47" => "Mevcut Field Captionlar",	
	"48" => "Field'ý bu gruba taþý",		
	"49" => "Üye ID",
	"50" => "Etkinlik Adý",	
	"51" => "Etkinlik Tanýmý",		
	"52" => "Etkinlik Türü",
	"53" => "Kategori Seç",	
	"54" => "Tür Seç",
	"55" => "Etkinlik Zamaný",
	"56" => "Bütün günler için boþluk býrak",
	"57" => "Etkinlik Tarihi",
	"58" => "Ay",	
	
	"59" => "Gün",	
	"60" => "Yýl",
	"61" => "Ülke",		
	"62" => "Bölge/Þehir",
	"63" => "Street",	
	"64" => "Kasaba/Þehir",		
	"65" => "Telefon",	
	"66" => "Email",	
	"67" => "Web site",	
	"68" => "Etkinlik Görünebilirliði",		
		"69" => "Herkese",
		"70" => "Sadece Arkadaþlara",	
		
	"71" => "Anket Ekle",		
	"72" => "Web site Anket Sonuçlarý",
	"73" => "Anket Ýsmi",	
	"74" => "Cevap",	
	"75" => "Aktif Yap",
	
	"76" => "Forum Konusu Ekle",
	"77" => "Postalarý Yönet",
	"78" => "Forum Konusu",	
		
	"79" => "Baþlýk",	
	"80" => "Taným",
	"81" => "Forum Postalarý",		
	"82" => "Bütün Postalar",
	"83" => "Bugün",	
	"84" => "Bu Hafta",		
	"85" => "Son Hafta",	
	"86" => "Oda Ýsimleri",	
	"87" => "Mevcut Field Captionlar",	
	"88" => "Oda Þifresi",		
	"89" => "Yeni Ekle",
	"90" => "S.S.S Ekle",
	
	"91" => "Kelime Sansürü Ekle",		
	"92" => "Kelime",
	
	"93" => "Onaylanmýþ",
	"94" => "Caption",
	"95" => "Match Caption",
	"96" => "Dil",

	"97" => "Önizleme",
	"98" => "Sonuçlar",
);
$admin_advertising = array(

	"1" => "Web site Bannerlarý",
	"2" => "Banner Ekle",
	"3" => "Ortaklýk Bannerlarý",	
	"4" => "Banner Ekle/Düzenle",
	"5" => "Banner Türü",	
	"6" => "Web site Banner",			
	"7" => "Ortaklýk Banner",	
	"8" => "Ýsim",	
	"9" => "Banner Yükle",	
	"10" => "HTML Gir",	
	"11" => "HTML Kodu",
	"12" => "Banner Yükle",	
	"13" => "Banner Link",		
	"14" => "Göster",
		"15" => "Tüm Üyelere",
		"16" => "Sadece Oturum Açmýþ Üyelere",
	
	"17" => "Sayfa",
	"18" => "Aktif",
	
	"19" => "Top Pozisyon",
	"20" => "Orta Pozisyon",	
	"21" => "Sol Pozisyon",		
	"22" => "Alt Pozisyon",
	"23" => "Banner kodlu link kullanmak için boþluk býrakýn",
	"24" => "Banner Önizleme",
	
);


$admin_maintenance = array(

	"1" => "Þuanki Çalýþan",
	"2" => "En Son Versiyon",
	"3" => "SMS Kredileri",	
	"4" => "Kalan SMS Kredileri",	
	"5" => "Kredi Satýn Al",	

);

$admin_admin = array(

	"1" => "Yönetici Ekle",
	"2" => "Kullanýcý Adý",
	"3" => "Þifre",	
	"4" => "Email",
	
	"5" => "Yönetici Ayarlarýný Düzenle",	
	"6" => "Tam Ýsim",			
	"7" => "Giriþ Seviyesi",	
		"8" => "Tam Sistem Giriþi",	
		"9" => "Sadece Üye Giriþi",	
		"10" => "Sadece Tasarým Giriþi",	
		"11" => "Sadece Email Giriþi",
		"12" => "Sadece Faturalama Giriþi",	
		"13" => "Sadece Ayarlar Giriþi",		
		"14" => "Sadece Yönetim Giriþi",
	"15" => "Yönetici Ýkonu",

	"17" => "Email Uyarýlarý",
	"18" => "Yönetici Haber Uyarýsý",
	"19" => "Bütün üyeleri þuanki paketten",
	"20" => "aþaðýdaki pakete transfer et",	
	"21" => "Paket Düzenle",		
	"22" => "Paket Giriþi",
	"23" => "Paket Öðesi Ekle",	
	"24" => "Paket Giriþlerini Yönet",
);

$admin_settings = array(

	"1" => "Görüntü Sayfalarý",
	"2" => "Geçerli",
	"3" => "Geçersiz",	
	"4" => "Web Yolu",
	"5" => "Sunucu yolu",	
	"6" => "Küçük Resim Yolu",			
	"7" => "Field Ekle",	
	"8" => "Ýsim",	
	"9" => "Deðer",	
	"10" => "Tür",	
	"11" => "Fields Yönet",
	"12" => "Gateways Ekle",	
	"13" => "Ödeme Sistemi",		
	"14" => "Ödeme Sistemi Kodu",
	"15" => "Baþlýk",
	"16" => "Paket Giriþi",
	"17" => "Yorumlar",
	"18" => "Üyeleri Transfer Et",
	"19" => "Bütün üyeleri þuanki paketten",
	"20" => "aþaðýdaki pakete transfer et",	
	"21" => "Paket Düzenle",		
	"22" => "Paket Giriþi",
	"23" => "Paket Öðesi Ekle",	
	"24" => "Paket Giriþlerini Yönet",
);

$admin_billing = array(

	"1" => "Paket Ekle",
	"2" => "Paket Giriþlerini Yönet",
	"3" => "Üyeleri Paketlere Transfer Et",			
	"4" => "Web siteniz þuanda <b>FREE MOD</b> olarak çalýþýyor, bu nedenle üyelik paketleri pasif kýlýndý.",
	"5" => "Free Mod'u pasif kýlmak ve üyelik paketlerini göstermek ister misiniz?",	
	"6" => "FREE MODU PASÝF KIL",		
	"7" => "Field Ekle",	
	"8" => "Ýsim",	
	"9" => "Deðer",	
	"10" => "Tür",	
	"11" => "Fields Yönet",
	"12" => "Gateways Ekle",	
	"13" => "Payment Sistemi",		
	"14" => "Ödeme Yöntemi Kodu",
	"15" => "Baþlýk",
	"16" => "Paket Giriþi",
	"17" => "Yorumlar",
	"18" => "Üyeleri Transfer Et",
	"19" => "Bütün üyeleri þuanki paketten",
	"20" => "aþaðýdaki pakete transfer et",	
	"21" => "Paket Düzenle",		
	"22" => "Paket Giriþi",
	"23" => "Paket Öðesi Ekle",	
	"24" => "Paket Giriþlerini Yönet",
	
	"25" => "Onay Bekliyor",
	"26" => "Onaylanmýþ Ödemeler",
	"27" => "Reddedilmiþ Ödemeler",
	
	"28" => "Bütün Geçmiþ",
	"29" => "Aktif Ödemeler",
	"30" => "Bitmiþ Ödemeler",
	"31" => "Aktif Abonelikler",
	"32" => "Bitmiþ Abonelikler",
	"33" => "Paket Giriþ Kodu",
	
);

$admin_email = array(

	"1" => "Sistem Emailleri",
	"2" => "E-bültenler",
	"3" => "Email Þablonlarý",		
	"4" => "Email Editör",
	"5" => "Konu",	
	"6" => "Email Önizle",	
	"7" => "To Email",
	
	"8" => "Gönder to",	
		"9" => "Bütün Üyeler",	
		"10" => "Üyelik Paketleri Aboneleri",	
		"11" => "Aktif / Askýya Alýnmýþ / Onaylanmamýþ Üyeler",
	"12" => "To Paket",	
	"13" => "Üyelik Durumlarý",		
	"14" => "E-bülten seç",	
	
	"15" => "Yeni Oluþtur",
	"16" => "Özel Oluþturulmuþ Görüntüle",
	"17" => "Email Ýzleme Kodu",
	"18" => "Yeni Oluþtur",
	"19" => "Özel Oluþturulmuþ Görüntüle",
	"20" => "Email Ýzleme Kodu",
		"21" => "HTML Kodu Aþaðýda",
		
	"22" => "Email Ýzleme Sonuçlarý",
	"23" => "Bulunmuþ hiç rapor yok.",
	"24" => "Rapor Seç",
	
	"25" => "Þu günler arasýnda olan bütün üyelere hatýrlatma gönder",
	"26" => "ve",
	"27" => "günler",
	"28" => "gün kalan yükseltme aboneliklerine.",
	"29" => "Göndermek Ýçin Email Seç:",
	"30" => "Ýndir",
	"31" => "Paket Seç",
	"32" => "Ýzleme Kodu",
	
	
);

$admin_design = array(

	"1" => "Temalar Ýndir",
	"2" => "Þuanki Þablon",
	"3" => "Bu Þablonu Kullan",	
	"4" => "Sayfa Meta Taglarý",
	"5" => "Sayfa Baþlýðý",	
	"6" => "Taným",
	"7" => "Anahtar Kelimeler",
	"8" => "Web site Sayfalarý",	
	"9" => "Ýçerik Sayfalarý",	
	"10" => "Özel Sayfalar",	
	"11" => "Sayfa Oluþtur",
	"12" => "FTP Yolu",	
	"13" => "Tema Dosyalarý",		
	"14" => "Ýçerik Sayfalarý",	
	"15" => "Özel Sayfalar",


	"16" => "Dil Ekle",
	"17" => "Yeni Dosya Ýsmi",	
	"18" => "Kopyalamak Ýçin Dosyayý Seç",
			
	"19" => "Dil Dosyasýný Düzenle",	
	"20" => "Özel Sayfalar",

	"21" => "Font",
	"22" => "Font Boyutu",	
	"23" => "Font Rengi",
	"24" => "geniþlik",	
	"25" => "boy",		
	"26" => "Logo Yazýsý Ekle",
	"27" => "Canvas Tipi",	
		"28" => "Blank Canvas Kullan",
		"29" => "Mevcut Dizayný Koru",	
		"30" => "Kendi arkaplanýmý / logomu ekle",	

	"31" => "Yeni sayfa oluþtur",
	"32" => "Yeni Sayfa Ýsmi",	
		"33" => "Sayfa Ýsimleri çok kýsa olmalý ve sadece bir kelime olmalý Örneðin: Linkler, Makaleler, Haberler, Forum vs.",
	"34" => "Menu Tab Ekle?",	
		"35" => "Hayýr! bir tab oluþturma",		
		"36" => "Evet. Onu üye alanýna ekle",
		"37" => "Evet. Onu anasayfaya ekle, üye alaný sayfalarýna deðil.",
			"38" => "Eðer yeni bir üye seçerseniz tab web sitenizde oluþturulacak.",
);

$admin_overview = array(

	"1" => "Duyuru",
	"2" => "Toplam Üyeler",
	"3" => "Bu Hafta",
	"3a" => "Bugün",
	"4" => "Son Web Site Aktivitesi",
	"5" => "Web site Raporlarý",
	
	"6" => "Son iki hafta içinde tekil Web Site Ziyaretçisi",
	"7" => "Son iki hafta içinde yeni üye kayýtlarý",
	"8" => "Üye Cinsiyet Ýstatistikleri",	
	"9" => "Üye Yaþ Ýstatistikleri",
	
	"10" => "Son iki hafta içinde Yeni Ortaklýk Kayýtlarý",
	"11" => "Ziyaretçi Harita Ayarlarý",
	"12" => "Lütfen aþaðýdaki alana Google API anahtarýnýzý giriniz.",	
	"13" => "Web sitemizin müþteri bölümünden bir lisans anahtarý satýn alabilirsiniz.",	
	
	"14" => "Arama Sonuçlarý Filtre",	
	"15" => "Tüm Dosyalr",
	
);
$admin_members = array(

	"1" => "Tüm Üyeler",
	"2" => "Moderatörler",
	"3" => "Aktif",
	"4" => "Askýya Alýnmýþ",
	"5" => "Onaylanmamýþ",
	"6" => "Üyelik Ýptali Ýsteyenler",
	"7" => "Þuanda Online",
	"8" => "Üye Oturum Açma Aktivitesi",	
	"9" => "Üye Detaylarýný Düzenle",	
	"10" => "Ortaklýk Ekle",
	"11" => "Ortaklýk Bannerlarý",
	"12" => "Ortaklýk Sayfalarý",	
	"13" => "Ortaklýk Ekle",	
	"14" => "Ortaklýk Ayarlarý",	
	"15" => "Tüm Dosyalar",
	"16" => "Fotoðraflar",
	"17" => "Videolar",
	"18" => "Müzikler",
	"19" => "YouTube",
	"20" => "Onaylanmamýþ",
	"21" => "Özel",
	"22" => "Dosya Yükle",	
	"23" => "Dosya",
	"24" => "Tür",
	"25" => "Kullanýcý Adý",
	"26" => "Baþlýk",
	"27" => "Yorumlar",
	"28" => "Varsayýlan Yap",		
	"29" => "Üye Oturum Açma Aktivitesi",	
	"30" => "Þu ortak tarafýndan üye edildi: ",
	"31" => "Özel",
	"a5" => "Kullanýcý Adý",
	"a6" => "Þifre",
	"a7" => "Ýsim",
	"a8" => "Soyad",
	"a9" => "Ticari Ünvan",
	"a10" => "Adres",
	"a11" => "Sokak",
	"a12" => "Kasaba/Semt",
	"a13" => "Bölge/Þehir",
	"a14" => "Posta Kodu",
	"a15" => "Ülke",
	"a16" => "Telefon",
	"a17" => "Faks",
	"a18" => "E-mail",
	"a19" => "Web site adresi",
	"a20" => "Ödenebiliri Kontrol et ",
);


// HELP FILES
$admin_help = array(

	"a" => "Þimdi Baþla",
	"b" => "Hayýr, Böyle Ýyiyim. Teþekkürler!",
	"c" => "Devam",	
	"d" => "Pencereyi Kapat",
	
	
	"1" => "Tanýtým",
	"2" => "Yardýma ihtiyacýnýz var mý?",
	"3" => "Merhaba",	
	
	"4" => "yönetim paneline hoþgeldiniz! Bu yönetim paneline ilk giriþinizse aþaðýda size yardým etmek için bekleyen yardým sihirbazýndan faydalanabilirsiniz!",
	"5" => "Baþlangýç sihirbazýmýz size adým adým yardým edip hemen yol gösterecektir.",	
	"6" => "<strong>(Not)</strong> Yönetim paneline tekrar giriþinizde bu sayfaya sol menü barda bulunan 'hýzlý yardým rehberi' linkine týklayarak ulaþabilirsiniz.",
	
	"7" => "Buradan Baþlayýn",
	"8" => "Yönetim paneline hoþgeldiniz!",	
	"9" => "Yönetici hesabýnýza hoþgeldiniz",	
	"10" => "Sistem web sitenizin üyelerini, dosyalarýný, güvenliðini, emailleri, eklentileri ve daha fazla özelliklerini tüm farklý bakýþ açýlarýyla yönetmenize izin verir.",	
	"11" => "Bu baþlangýþ sihirbazý web sitesi yönetiminin arkasýnda gerisinde size bazý fikirler sunacak ve web siteniz için bazý ayar ve seçeneklerini yapýlandýrmanýza izin verecek böylece sitenize ziyaretçi tarafiði saðlamaya baþlayabilirsiniz.",
	"12" => "<strong>(Hatýrlatma)</strong> Dilediðiniz zaman bu pencereyi kapatabilir, daha sonra sol menü bardan 'hýzlý yardým rehber' aracýný kullanarak tekrar ulaþabilirsiniz.",
		
	"13" => "Introduction to your administration area!",		
	"14" => "The software administration area is 'web based' which means you can access and manage your web site anywhere in the world with an internet connection. Simply point your browser at:",	
	"15" => "and login with your admin login details.",
	"16" => "Click here to bookmark this link now.",
	
	"17" => "Introduction to your dashboard.",	
	"18" => "The software dashboard gives you a very quick overview of your web site performance, you can read software announcement's, view member signup history, see member and affiliate statistic charts and more.",			
	"19" => "All member information is stored in the MYSQL database called:",	
	"20" => "Introduction to web site statistics.",
	"21" => "The software statistics gives you a visual representation of your member and affiliate signup history over a two week period. Each time a member or affiliate joins your web site the time and date is recorded and plotted onto the graphs.",
	
	"22" => "Ziyaretçi yerleþkesine Giriþ",		
	"23" => "Üyeler yönetimine Giriþ",	
	"24" => "Ortaklýk yönetimine Giriþ",	
	"25" => "Banlanmýþ kullanýcýlar yönetimine Giriþ",		
	"26" => "Dosya yönetimine Giriþ",
	"27" => "Üye aktarýmýna Giriþ",	
	"28" => "Web site temalarýna Giriþ",
	"29" => "Tema düzenleyicisine Giriþ",	
	"30" => "Tema resmi düzenleyicisine Giriþ",
	"31" => "Logo düzenleyicisine Giriþ",
	"32" => "Meta taglara Giriþ",	
	"33" => "Dillere Giriþ",
	"34" => "Emailler yönetimine Giriþ",	
	"35" => "Email þablonlarýna Giriþ",		
	"36" => "Email raporlarýna Giriþ",
	"37" => "E-bülten gönderimine Giriþ",
	"38" => "Email hatýrlatýcýlarýna Giriþ",
	"39" => "Email adresleri yüklemeye Giriþ",
	"40" => "Üyelik paketlerine Giriþ",
	"41" => "Ödeme yöntemlerine Giriþ",
	"42" => "Üyelik fatura geçmiþine Giriþ",
	"43" => "Ortaklýk fatura geçmiþine Giriþ",
	"44" => "Görünüm seçeneklerine Giriþ",
	"45" => "Görünüm ayarlarýna Giriþ",
	"46" => "Sistem yollarýna Giriþ",
	"47" => "Resim sembollerine Giriþ",
	"48" => "Arama alanlarýna Giriþ",
	"50" => "Etkinlik takvimine Giriþ",
	"51" => "Web site anketlere Giriþ",
	"52" => "Web site forumlarýna Giriþ",
	"53" => "Sohbet odalarýna Giriþ",
	"54" => "Web site SSS Giriþ",
	"55" => "Kelime süzgecine Giriþ",
	"56" => "Haberler/Makaleler Giriþ",
	"57" => "Gruplara Giriþ",

		"22a" => "Ziyaretçi yerleþke haritasý üyelerinizin hanig ülke ve bölgelerden sitenize katýlýp üye olduklarýný gösterir.",		
		"23a" => "Üye yönetimi aracý web sitenize katýlan tüm üyeleri görmenize yardýmcý olur. Üyeleriniz düzenlemek, güncellemek veya silmek için arama seçeneklerini kullanabilirsiniz.",	
		"24a" => "Ortaklýk yöneticisi web sitenizin tüm ortaklarýna gözatmanýza yardýmcý olur, web sitenizden ortaklarýný görüntüleyebilir, silebilir, düzenleyebilir ve yeni ortaklýk kayýtlarýný onaylayabilirsiniz.",	
		"25a" => "Banlanmýþ üyeler bölümü üyelerinizin, ziyaretçilerinizin veya 'hack' giriþiminde bulunanlarýn tüm kayýtlarýný tutar, sistem web sitenize herhangi bir zarar vermek isteyenleri engellemek için web sitenize giren þüpheli üyeleri otomatik olarak banlar.",		
		"26a" => "Üye dosyasý aracý üyelerin dosyalarýný, müziklerini, videolarýný, fotoðraflarýný buradan yönetebilmenize olanak saðlar. Cropping aracýný kullanýp fotoðrafý düzenlemek için hernhangi bir fotoðrafa týklayýn.",
		"27a" => "Üye aktarma aracý diðer yazýlýmlardan üye aktarmanýza olanak saðlar. Eski sistemde yer alan web site database bilgilerini girerek üyeleri yeni web sitenize kolayca transfer edip aktarýn.",	
		"28a" => "Web site temalarý bölümü sitenizin dizaynýný ve þablonunu anýnda deðiþtirmenize olanak saðlar. Kullanmak istediðiniz temanýn üstüne týklayarak o temayý anýnda aktif edebilirsiniz.",
		"29a" => "Tema düzenleyisi aracý yönetim panelinizden web site sayfalarýný düzenlemenize izin verir. Hemde web site editörünüzün içine kod kopyalayýp yapýþtýrmak isteyebilir ve daha sonra düzenlemeyi bitirdiðinizde tekrar kopyalayabilirsiniz.",	
		"30a" => "Tema resim düzenleyicisi aracý yeni bir tana yükleyerek mevcut resimleri deðiþtirmenize izin verir. Yeni resimler mevcut resimle yer deðiþecek ve web sitenize anýnda uygulanacaktýr..",
		"31a" => "Logo düzenleyicisi aracý mevcut logonuzun dizaynýný deðiþtirmenize olanak saðlar. Hemde kendi resim düzenleme yazýlýmýnýzý kullanarak logonuzu oluþturmak isteyebilir ve daha sonra sitenize bunu eklemek üzere 'kendi logomu yükle' alanýný kullanabilirsiniz.",
		"32a" => "Meta tag aracý yazýlým tarafýndan web sitesi sayfalarý için oluþturulan meta taglarý düzenlemenize yardýmcý olur. Her sayfa için kendi baþlýðýnýzý, tanýmýnýzý ve anahtar kelimenizi ekleyebilirsiniz.",	
		"33a" => "Dil yönetimi aracý, kullanmak istemediðiniz herhangi bir dili silmenize ve kendi dil paketi eklemenize olanak saðlar.",
		"34a" => "Email yönetim aracý kendinize özel e-bülten emailleri oluþturmanýza olanak saðlar.",	
		"35a" => "Email þaplonlarýna Giriþ",		
		"36a" => "Email raporlarýna Giriþ",
		"37a" => "E-bülten gönderimlerine Giriþ",
		"38a" => "Email hatýrlatmalarýna Giriþ",
		"39a" => "Email adresleri yüklemeye Giriþ",
		"40a" => "Üyelik paketlerine Giriþ",
		"41a" => "Ödeme yöntemlerine Giriþ",
		"42a" => "Üyelik fatura geçmiþine Giriþ",
		"43a" => "Ortaklýk fatura geçmiþine Giriþ",
		"44a" => "Görüntüleme seçeneklerine Giriþ",
		"45a" => "Görüntüleme ayarlarýna Giriþ",
		"46a" => "Sistem yollarýna Giriþ",
		"47a" => "Resim sembolüne Giriþ",
		"48a" => "Arama alanýna Giriþ",
		"50a" => "Etkinlik takvimine Giriþ",
		"51a" => "Web site anketlere Giriþ",
		"52a" => "Web site forumlara Giriþ",
		"53a" => "Chat odalarýna Giriþ",
		"54a" => "Web site SSS Giriþ",
		"55a" => "Kelime süzgecine Giriþ",
		"56a" => "Haberler/Makaleler Giriþ",
		"57a" => "Gruplara Giriþ",
);

$admin_login = array(

	"1" => "Yönetici Bölgesi Oturum Açma",
	"2" => "Þifrenizi mi unuttunuz? Endiþelenmeyin, email adresinizi girerek yeni þifre isteyin.",
	"3" => "Email Adresi",
	"4" => "Aþaðýdaki Yazýyý Girin",
	"5" => "Yeni Þifre Ýste",
	"6" => "Oturum açmak için aþaðýdaki bilgileri girin.",
	"7" => "Kullanýcý Adý",
	"8" => "Þifre",	
	"9" => "Lisans",	
	"10" => "Dil",
	"11" => "Oturum Aç",
	"12" => "IP Adresiniz",	
	"13" => "Þifremi Unuttum",	
);

// EXTRA BITS

$admin_members_extra = array(

	"1" => "Vurgulanmýþ Profil",
	"2" => "Web site Moderatör",
	"3" => "Üyelik Paketleri",
	"4" => "Yükseltim Emaili Gönder",
	"5" => "Fatura sistemine paket deðiþimi ekle ",
	"6" => "SMS Numarasý",
	"7" => "SMS Kredileri",
	"8" => "Durumuna Hesap Kur",	
	
	"9" => "Þifre düzenlemek için kutuya týklayýn.",	
	"10" => "Vurgulanmýþ üyeler arama sonuçlarýnda farklý arka plan rengiyle gözükecektir.",
	"11" => "Bu, moderatör olarak web sitenizi yönetmek için üyeye giriþ yetkisi verir.",
	
	"12" => "ortaklýk karþýlama sayfasý",	
	"13" => "Banner Kodu Görüntüleme Sayfasý",	
	"14" => "Ortaklýk Ödeme Sayfasý",	
	"15" => "Ortaklýk Özet Sayfasý",
	"16" => "Ortaklýk Hesap Düzenleme Sayfasý",
	
	"17" => "Üyeleri Aktar",	
	
	"18" => "Yaþ",			
	"19" => "Dosya Görünümleri",	
	"20" => "Özel",
	"21" => "Umumi",
	
	"22" => "albüm",		
	"23" => "Yetiþkin Ýçerim",	
	"24" => "Umumi Ýçerik",	
	
	"25" => "Boyut",		
	"26" => "Dosyalarý Yetiþkin Albümlerine Taþý",
	"27" => "Yetiþkin Ýçerik Dosyalar",

);

$admin_selection = array(

	"1" => "Evet",
	"2" => "Hayýr",
	
	"3" => "Açýk",
	"4" => "Kapalý",
);

$admin_plugins = array(

	"1" => "Eklentiler eMeeting'in iþlevselliðini artýrýr ve geniþletir. Bir eklenti yüklendiðinde, soldaki menü seçeneklerini kullanarak aktif veya pasif getirebilirsiniz.",
	"2" => "Web sitemizin müþteri panelinden yeni eklentilere bakabilir beðendiklerinizi indirebilir yükleyebilirsiniz.",
	"3" => "Eklenti Ýsmi",
	"4" => "Eklten Detaylarý",
	"5" => "Son Güncellenenler",
	"6" => "Durum",

);
$admin_pop_welcome = array(

	"1" => "Tekrar Hoþgeldiniz",
	"2" => "Bugün için web site performansý ve üyelik kayýtlarý aþaðýda gösterilmiþtir.",
	"3" => "New Members Today",
	"4" => "Files to approve",
	"5" => "<strong>Hatýrlatma</strong> Yönetim paneline giriþ yaptýðýnýzda, bu karþýlama uyarýlarýný almak istemezseniz, yönetici tercihleri bölümünden bu ayarý kapatabilirsiniz.",
	"6" => "Pnecereyi Kapat",

);
$admin_pop_chmod = array(

	"1" => "Dosya Ýzinleri Hatasý",
	"2" => "Dosyalar bu sayfada modifiye edilemez.",
	"3" => "Aþaðýdaki dosya ve dizinleri düzenlemeden önce dosya izin ayarlarý yapmanýz gerekir. Eðer sisteminiz Linux veya Unix bir sistemse, Ftp programýnýzý kullanabilir and 'CHMOD' ayarlarýný deðiþtirip gerekli izinleri verebilirsiniz. Eðer sisteminiz Window'sa, bu dosya izni ayarlarýný verebilmek için hostunuzla iletiþim kurmanýz gerekecektir.",
	"4" => "Dosyalar/dizinler eriþim izni CHMOD 777 olmasý gerekir",
	"5" => "Pencereyi Kapat",

);
$admin_pop_demo = array(

	"1" => "Demo Modu Aktif",
	"2" => "Demo modundaki yapýlan deðiþiklikler kayýt edilmeyecektir.",
	"3" => "Sisteminizin giriþ ayarlarýnýn demo modunda çalýþmasý, yönetim panelininde hiçbir deðiþiklik yapýlamamasý sadece panelde gezinebilme durumu saðladýðý anlamýna geliyor.",
	"4" => "Yönetim paneline normal bir þekilde gözatabilir bununla birlikte bu gözatma esnasýnda yapýlan herhnagi bir deðiþiklik kayýt edilip geçerli ayarlarýnýzý deðiþtirmeyecektir..",
	"5" => "<strong>Hatýrlatma</strong> Eðer bu demo modu kýsýtlamasýný kaldýrmak isterseniz lütfen sistem yönetiminizle iletiþime geçin.",
	"6" => "Pencereyi Kapat",
);

$admin_pop_import = array(

	"1" => "Database Transfer Sonuçlarý",
	"2" => "üyeler baþarýyla aktarýldý!",
	"3" => "üyeler oradan baþarýyla aktarýldý",
	"4" => "yazýlým. Üye resimlerinizin doðru bir þekilde güncellenmesi için lütfen aþaðýdaki yönergeleri takip edin.",
	"5" => "eMeeting imaj dosyasý yolu aþaðýda gösterilmiþtir, eski web sitenizden resimleri aþaðýdaki yeni yola kopyalamalýsýnýz;",
	"6" => "Pencereyi Kapat",
);

$admin_loading= array(

	"1" => "Database tablolarý optimize ediliyor..",
	"2" => "Lütfen Bekleyin!",

);
$admin_menu_help= array(
"1" => "Hýzlý Yardým Rehberi",
);

$admin_settings_extra = array(

	"1" => "Arama Sayfasý Görüntüle",
	"2" => "Ýletiþim Sayfasý Görüntüle",
	"3" => "Tur Sayfasý Görüntüle",
	"4" => "SSS Sayfasý Görüntüle",
	"5" => "Etkinlikleri Görüntüle",
	"6" => "Gruplar Görüntüle",
	"7" => "Forumu Görüntüle",
	"8" => "Eþleþmeyi Görüntüle",	
	"9" => "Aðý Görüntüle",	
	"10" => "Ortaklýk Sistemini Görüntüle",
	"11" => "SMS/Text Mesajlarý Uyarý Sistemini Görüntüle",
	
	"12" => "Bloglarý Görüntüle",	
	"13" => "Chat Odalarýný Görüntüle",	
	"14" => "Anlýk Mesajlaþtýrýcý Görüntüle",	
	"15" => "Kayýt Doðrulama Resmi Görüntüle",
	"16" => "UK Posta Kodu Aramayý Görüntüle",
	"17" => "US Zip Kodu Aramayý Görüntüle",
	"18" => "Display MSN/Yahoo Integration",
	
	"19" => "Varsayýlan Üyelik Paketi",
		"20" => "Bu üyelik paketi üyelerin varsayýlan paket olarak kayýt olduðu pakettir.",
	"21" => "Üyeler üye olmak için bir resim yüklemeli",
		"22" => "Üyelerin kayýt esnasýnda resim yükleme seçeneðini es geçebilme durumuna izin verilmiþse, bu belirtilecektir.",	
	"23" => "FREE MOD",
		"24" => "Eðer web sitenizin bütün özellikleri herkes tarafýndan kullanýlabilir olmasýný istiyorsanýz bu ayarý 'evet olarak ayalayýn.",
	"25" => "BAKIM MODU",
		"26" => "Yöneticilerin yönetim paneline girebilmesi dýþýnda bu seçenek web sitenize bütün giriþleri durduraraktýr.",
		
	"27" => "Her sayfa için arama sonuçlarý sayýsý",
		"28" => "Her sayfada görüntülenmesini istediðiniz profil sayýsýný seçin.",		
	"29" => "Genel görünüm sayfasýnda üyenin eþleþme sonuçlarý sayýsý",	
		"30" => "Her sayfada görüntülenmesini istediðiniz profil sayýsýný seçin.",
		
	"31" => "Email Aktivasyon Kodu",
		"32" => "Oturum açmadan önce üyeliklerini doðrulamak için üyelere bir aktivasyon kodu gönderilecektir.",
	"33" => "Üyeleri Elle Onaylama",
	"34" => "Eðer üyelikleri otomatik olarak deðilde elle kendiniz doðrulamak isterseniz, bu ayarý isteðinize baðlý 'evet' veya 'hayýr' diye deðiþtirebilirsiniz.",
	"35" => "Dosyalarý Elle Onaylama",
		"36" => "Eðer dosyalarý otomatik olarak deðilde elle kendiniz doðrulamak isterseniz, bu ayarý isteðinize baðlý 'evet' veya 'hayýr' diye deðiþtirebilirsiniz",
	"37" => "Video Kayýtlarýný Elle Doðrulama",
		"38" => "Eðer üye yayýnlamalarýný(video kayýtlarý) otomatik olarak deðilde elle kendiniz doðrulamak isterseniz, bu ayarý isteðinize baðlý 'evet' veya 'hayýr' diye deðiþtirebilirsiniz(video sohbet beslemeleri).",
		
	"39" => "Video Selamlama Kaydedici Görüntüle",
	"40" => "Bu üylerin profillerinde kendi video selamlamalarýný kaydetmelerine olanak saðlar. Aþaðýda flash video RMS baðlantý string'ini girmeniz gerekiyor.",
	"41" => "Flash RMS Baðlantý String",
		"42" => "Bunu kullanabilmek için flash bir hosting hesabýna ihtiyacýnýz var.",
	"43" => "Tarih Formatýný Görüntüle",
		"44" => "Web sitenizde görüntülenmesini istediðiniz tarih formatýný seçin.",
	"45" => "Profile Ýzin Ver / Dosya Yorumlarý",
		"46" => "Eðer üyenin dosyalara ve profillere yorum yapabilmesini isterseniz bu seçeneði etkinleþtirin.",
	"47" => " Chat ve IM Ayrý Pencerede Görüntüle",
	
	"48" => "Eðer chat odasý ve IM'ý yeni pencerede pop-up olarak açýlmasýný isterseniz bu seçeneði etkinleþtirin.",
	
	"49" => "Arama Motoru Dostu?",
		"50" => "Eðer sisteminiz Linux ya da Unix ise ve varsayýlan olarak .htaccess dosyasýný kullanýyorsanýz bu özelliði etkinleþtirebilirsiniz.",
	"51" => "Boþ Fotoðraflarý Ara",
		"52" => "Arama sonuçlarýnda görüntülenmesi için resim eklemeyen üyeler ister misiniz?",
	"53" => "Bayrak Resimleri Göster",
		"54" => "Web sitenizde dillere ait bayraklar görüntülemek isterseniz bu seçeneði isteðiniz doðrultusunda 'evet' ya da 'hayýr' olarak deðiþtirebilirsiniz.",
	"55" => "Ortaklýk Para Birimi",	
	"56" => "HTML Editörü Kullan",	
	"57" => "Dosyalarý görüntülenmeden önce elle kendiniz doðrulamak isterseniz, bu ayarý isteðiniz doðrultusunda 'evet' ya da 'hayýr' olarak deðiþtirebilirsiniz.",

	"58" => "Makale Sayfasý Görüntüle",

);

$admin_billing_extra = array(

	"1" => "Web sitenizin bütün özellikleri herkes tarafýndan kullanýlabilir olmasýný isterseniz bu seçeneði evet olarak deðiþtirin.",
	
	"2" => "Paket Türü",
	"3" => "Üyelik Paketi",
	"4" => "SMS Paketi",
	"5" => "Eðer web sitenizde ek SMS kredisi satýn almaya izin veren sadece bir SMS paketi oluþturmak isterseniz eveti seçin.",
	"6" => "Paket Ýsmi",
		"7" => "Bu paket için bir isim girin, yazdýðýnýz bu isim abonelik ödemesi sayfasýnda görüntülenecektir.",
	"8" => "Taným",	
	"9" => "Ücret",	
	"10" => "Bu pakete abone olan üyeler için ne kadar fiyat belirliyorsunuz? Not: Para birimi sembolleri girmeyin!",
	"11" => "Para Birimi Kodu Göster",
	
	"12" => "Bu para birimi kodu web sitenizde görüntülenecektir, bu ödeme para biriminiz için kullanýlmýyor, bunun ödeme ayarlarýnýzdan ayarlanmasý gerekir.",	
	"13" => "Abonelik",	
	"14" => "Eðer yinelenen bir ödeme olmasýný isterseniz eveti seçin.",	
	"15" => "Yükseltme Süresi",
	
	"16" => "Gün",
	"17" => "Hafta",
	"18" => "Ay",
		"18a" => "Limitsiz",
	"19" => "Max Mesajlar (günlük)",
		"20" => "Bu üyelerin günlük maksimum mesaj gönderme sayýsýdýr.",
	"21" => "Max Göz Kýrpma",
		"22" => "Bu üyelerin günlük maksimum göz kýrpma gönderme sayýsýdýr..",	
	"23" => "Max Dosya Yüklemsi",
		"24" => "Üyelerin yükleyebileceklir maksimum dosya sayýsý",
	"25" => "Paket Ýkon Linki",
		"26" => "Web sitenizdeki bir resme link verebilmek için paket ikon linki gerektirir. Tavsiye Edilen Boyutlar: 28px x 90px.",
		
	"27" => "Özel Üye",
		"28" => "Eðer web sitenizde istediðiniz fotoðraflý üyeyi özel üye yapmak ve web sitenizin anasayfasýnda özel üyeleri göstermek isterseniz eveti seçin.",		
	"29" => "Vurgulanmýþ",	
		"30" => "Eðer arama sonuçlarýndan vurgulanmýþ profiller göstermek isterseniz eveti seçin.",
		
	"31" => "Yetiþkin Ýçerik Resimleri Göster",
		"32" => "Bu pakette olan üyelerin yetiþkin içerik resimleri görüntüleyebilmelerini isterseniz eveti seçin.",
	"33" => "SMS Kredileri",
	"34" => "Bu, üyeler bu pakete yükseltildiklerinde üye hesaplarýna eklenen SMS kredilerinin sayýsýdýr. Eðer üyelerin kredisi zaten varsa bu onlarýn mevcut miktarlarýna eklenecektir.",
	"35" => "Yükseltme paketinde görünür"

);

$admin_mainten_extra = array(

	"1" => "Link",
	"2" => "Web sitenize harici(dýþ) link vermek isterseniz sadece bir link adresi girin",
	"3" => "RSS Haberleri Feed Data",
	
	"4" => "Kategori",
	"5" => "Görünümler",
	"6" => "Caption",
	"7" => "Dil",
	"8" => "Özel Grup",
		
	"9" => "Forum Boardunu Deðiþtir",	
	"10" => "Forum Boardunu Seç",
	"11" => "Varsayýlan Forum",
	
	"12" => "Þuanda üçüncü parti forum sistemi kullanýyorsunuz. Forumunuzu yönetmek için lütfen yönetim paneline giriþ yapýn.",	
	"13" => "Password"
);

$admin_set_extra1 = array(

	"1" => "Fotoðraf Ýzin Ver / Resim Yüklemeleri",
	"2" => "Video Yüklemelerine Ýzin Ver",
	"3" => "Müzik Yüklemelerine Ýzin Ver",	
	"4" => "Youtube Yüklemelerine Ýzin Ver",	
);

$admin_alerts = array(

	"1" => "Uyarýlar",
	"2" => "yeni ziyaretçiler",
	"3" => "yeni üyeler",	
	"4" => "onaylanmamýþ üyeler",	
	"5" => "onaylanmamýþ dosyalar",
	"6" => "yeni üyelik yükseltimleri",	
);

$lang_members_nn = array(

	"0" => "Üye Suç Gözetle",
	"1" => "Kullanýcý Adý veya ID",
	"2" => "Hiç Chat Geçmiþi Bulunamadý",	
);

$members_opts = array(

	"1" => "Profil Düzenle",
	"2" => "Dosya Yüklemeleri",
	"3" => "Fatura Geçmiþi",	
	"4" => "Email Gönder",	
	"5" => "Mesaj Gönder",
	"6" => "Forum Postalarý",
	"7" => "Kötü Mesaj",
);
?>