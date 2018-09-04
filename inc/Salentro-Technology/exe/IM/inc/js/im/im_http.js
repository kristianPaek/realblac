// JavaScript Document
		var sendReq = getXmlHttpRequestObject();
			var receiveReq = getXmlHttpRequestObject();
			var lastMessage = 0;
            var chat_user = '5';
            var chat_userid = '10';
            var room = '1';
			var mTimer;
			//Gets the browser specific XmlHttpRequest Object
			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest();
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP");
				} else {
					document.getElementById('im_error').innerHTML = 'Status: Cound not create XmlHttpRequest Object.  Consider upgrading your browser.';
				}
			}

			//Function for initializating the page.
			function startChat() {
				//Set the focus to the Message Box.
				//document.getElementById('im_message_send').focus();
				//Start Recieving Messages.
				getChatText();
			}

			//Gets the current messages from the server
			function getChatText() {
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					receiveReq.open("GET", '../imData.php?chat=1&last=' + lastMessage + '&room=' + room + '&chat_user=' + chat_user, true);
					receiveReq.onreadystatechange = handleReceiveChat; 
					receiveReq.send(null);
				}

				//Auto scroll to bottom of div
				if(document.getElementById('autoscroll').checked==true)
				{
					var objDiv = document.getElementById("im_message_window");
					objDiv.scrollTop = objDiv.scrollHeight;
			    }
			}

			//Function for handling the return of chat text
			function handleReceiveChat() {

				if (receiveReq.readyState == 4) {

					var chat_div = document.getElementById('im_message_window');
					var xmldoc = receiveReq.responseXML;
					var message_nodes = xmldoc.getElementsByTagName("message"); 
					var n_messages = message_nodes.length
					for (i = 0; i < n_messages; i++) {
						var user_node = message_nodes[i].getElementsByTagName("user");
						var text_node = message_nodes[i].getElementsByTagName("text");
						var time_node = message_nodes[i].getElementsByTagName("time");
						var avatar_node = message_nodes[i].getElementsByTagName("avatar_img");

						chat_div.innerHTML += '<font class="chat_avatar">' + avatar_node[0].firstChild.nodeValue + '</font>&nbsp;';						
						chat_div.innerHTML += '<font class="chat_time">(' + time_node[0].firstChild.nodeValue + ')</font>&nbsp;';						
						chat_div.innerHTML += '<font class="username">' + user_node[0].firstChild.nodeValue + '</font>&nbsp;';
						chat_div.innerHTML += '<font class="user_message">' + text_node[0].firstChild.nodeValue + '</font><br />';

						//This if statement enables/disables auto scroll
						if(document.getElementById('autoscroll').checked==true)
						{
							chat_div.scrollTop = chat_div.scrollHeight;
 			            }

						lastMessage = (message_nodes[i].getAttribute('id'));

					}
					mTimer = setTimeout('getChatText();',10000); // refresh rate
				}
			}
