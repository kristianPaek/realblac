<!-- TinyMCE -->

<script type="text/javascript" src="inc/js/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">



function setfocus(a_field_id) {
        $(a_field_id).focus()
    }


	tinyMCE.init({

		// General options

		mode : "exact",

		elements : "im_message_send",

		theme : "advanced",

		skin : "o2k7",

		skin_variant : "black",

		plugins : "-example,emotions",//"safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups",

		force_p_newlines : false,
		force_br_newlines : true,
		forced_root_block: false,

		entity_encoding : "raw",

	    setup : function(ed) {

        // Display an alert onclick

        ed.onChange.add(function(ed) {

            if(ed.getContent() !="") { tinyMCE.get('im_message_send').focus; sendChatText(); tinyMCE.get('im_message_send').focus; }

        }); },

		// Theme options

		theme_advanced_buttons1 : "mylistbox,mysplitbutton,myBackground,|,bold,italic,underline,|,forecolor,|,fontselect,fontsizeselect,",

		theme_advanced_buttons2 : "",//"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

		theme_advanced_buttons3 : "",//"tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",

		theme_advanced_buttons4 : "",//"insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		//theme_advanced_statusbar_location : "bottom",

		//theme_advanced_resizing : true,



		// Example content CSS (should be your site CSS)

		//content_css : "css/content.css",



		// Drop lists for link/image/media/template dialogs

		template_external_list_url : "lists/template_list.js",

		external_link_list_url : "lists/link_list.js",

		external_image_list_url : "lists/image_list.js",

		media_external_list_url : "lists/media_list.js",



		// Replace values for the template plugin

		template_replace_values : {

			username : "Some User",

			staffid : "991234"

		}

	});



// Creates a new plugin class and a custom listbox

tinymce.create('tinymce.plugins.ExamplePlugin', {

    createControl: function(n, cm) {



        switch (n) {



            case 'mylistbox':



                var c = cm.createSplitButton('mylistbox', {

                    title : 'My split button',

                    image : 'inc/images/sound.png',

                    onclick : function() {

                       tinyMCE.execCommand('mceInsertContent',false,'[giggle]');

                    }

                });



                c.onRenderMenu.add(function(c, m) {

                    m.add({title : 'Sound Effects', 'class' : 'mceMenuItemTitle'}).setDisabled(1);



                    m.add({title : 'Boo', onclick : function() {

                        tinyMCE.execCommand('mceInsertContent',false,'[boo]');

                    }});



                    m.add({title : 'Giggle', onclick : function() {

                       tinyMCE.execCommand('mceInsertContent',false,'[giggle]');

                    }});



                    m.add({title : 'Sneeze', onclick : function() {

                       tinyMCE.execCommand('mceInsertContent',false,'[sneeze]');

                    }});





                    m.add({title : 'Snore', onclick : function() {

                       tinyMCE.execCommand('mceInsertContent',false,'[snore]');

                    }});





                    m.add({title : 'Yehhaw!', onclick : function() {

                       tinyMCE.execCommand('mceInsertContent',false,'[yehaw]');

                    }});

                });



                // Return the new splitbutton instance

                return c;







            case 'myBackground':



                var c = cm.createSplitButton('myBackground', {

                    title : 'Change Colour',

                    image : 'inc/images/map.png',

                    onclick : function() {

                       document.getElementById('im_content').style.background = 'white';

                    }

                });



                c.onRenderMenu.add(function(c, m) {

                    m.add({title : 'Background', 'class' : 'mceMenuItemTitle'}).setDisabled(1);



                    m.add({title : 'Red', onclick : function() {

                       document.getElementById('im_content').style.background = 'red';

                    }});



                    m.add({title : 'Blue', onclick : function() {

                       document.getElementById('im_content').style.background = 'blue';

                    }});



                    m.add({title : 'Green', onclick : function() {

                       document.getElementById('im_content').style.background = 'green';

                    }});



                    m.add({title : 'Orange', onclick : function() {

                       document.getElementById('im_content').style.background = 'orange';

                    }});



                    m.add({title : 'None', onclick : function() {

                       document.getElementById('im_content').style.background = 'white';

                    }});

                });



                // Return the new splitbutton instance

                return c;





            case 'mysplitbutton':



                var c = cm.createSplitButton('mysplitbutton', {

                    title : 'My split button',

                    image : 'inc/images/user.png',

                    onclick : function() {

                       document.getElementById('AvarTarIcon_img').value="smile3.gif";

                    }

                });



                c.onRenderMenu.add(function(c, m) {         

          

  					m.add({title : 'My Chat Icon', 'class' : 'mceMenuItemTitle'}).setDisabled(1);



                    m.add({title : 'Star', onclick : function() {

                  

						document.getElementById('AvarTarIcon').src='inc/images/avartar/star.png';

						document.getElementById('AvarTarIcon_img').value="star.png";



                    }});



                    m.add({title : 'Smile 1', onclick : function() {

                  

						document.getElementById('AvarTarIcon').src='inc/images/avartar/smile1.gif';

						document.getElementById('AvarTarIcon_img').value="smile1.gif";



                    }});



                    m.add({title : 'Smile 2', onclick : function() {

                  

						document.getElementById('AvarTarIcon').src='inc/images/avartar/smile2.gif';

						document.getElementById('AvarTarIcon_img').value="smile3.gif";



                    }});



                    m.add({title : 'Smile 3', onclick : function() {

                  

						document.getElementById('AvarTarIcon').src='inc/images/avartar/smile3.gif';

						document.getElementById('AvarTarIcon_img').value="smile3.gif";



                    }});



                    m.add({title : 'Smile 4', onclick : function() {

                  

						document.getElementById('AvarTarIcon').src='inc/images/avartar/smile4.gif';

						document.getElementById('AvarTarIcon_img').value="smile4.gif";



                    }});



                });



                // Return the new splitbutton instance

                return c;

        }



        return null;

    }

});


// Register plugin with a short name
tinymce.PluginManager.add('example', tinymce.plugins.ExamplePlugin);





</script>



<textarea id="im_message_send" name="im_message_send" maxlength="10" rows="15" cols="80" style="width:400px; height:100px;font-size:13px;"></textarea>
<div id="sendIndicator" style="display:none;width:400px;text-align:right"><img src="inc/exe/IM/inc/images/indicator.gif" border="0" align="center" /></div>