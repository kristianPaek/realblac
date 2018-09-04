<?php

include_once 'GCM.php';

$gcm = new GCM();

$registatoin_ids = array("APA91bG7pauav_5GCIzCHTeVrpEF-TxpsLelMgamvC91TvL5o9H5mNQ6BA4oeX3jBCZv0-Diatla9sPRXJn1D35YhqkbnOC-bQG0oEIlUPxgn_JWnytbEIQplKOKKiSJh90I3iE_tKS_D2Ny1JVw1TaJF7t9EUgPrA");
$message = array("alert" => "test message", "user_id" => "3847", "user_name" => "male1","type" => "wink");

$result = $gcm->send_notification($registatoin_ids, $message);

?>