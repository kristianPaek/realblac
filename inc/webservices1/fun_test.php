<?php

	function test($user_id) {
		include("fun_common_api.php");

		global $DB;

		$query = sprintf("Select * From messages Where uid = 0 AND mail_room_id = 0 AND mailstatus = '%s'", "unread");
		$result = $DB->Query($query);
		while ($message = $DB->NextRow($result)) {
			$query = sprintf("Select count(id) as total From message_room Where owner_id = 0 AND partner_id = %d", $message['mail2id']);
			$total = $DB->Row($query);
			if ($total['total'] == 0) {
				$query = sprintf("INSERT INTO message_room (`owner_id`, `partner_id`, `subject`, `timestamp`) VALUES(%d, %d, '%s', '%s')", 0, $message['mail2id'], "Something real awaits.", date('Y-m-d H:i:s'));
                $DB->Insert($query);
			}
		}

		$query = sprintf("Select * From message_room Where owner_id = 0");
		$result = $DB->Query($query);

		while ($room = $DB->NextRow($result)) {
			$query = sprintf("Update messages Set mail_room_id = %d Where uid = 0 AND mail2id = %d AND mail_room_id = 0 AND mailstatus = 'unread'", $room['id'], $room['partner_id']);
			$DB->Update($query);
		}

		

	    return "Finished";
	}
?>