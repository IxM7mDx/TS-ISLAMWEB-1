<?php
$nicknames[] = htmlspecialchars($cl->client_nickname);
$_SESSION['ip'] = $cl->getProperty('connection_client_ip');
$_SESSION['cuid'] = $cl["client_unique_identifier"];
$_SESSION['client_status'] = $cl->getIcon();
$_SESSION['client_description'] = $cl['client_description'];
$_SESSION['channelid'] = $cl['client_channel_group_id'];
$_SESSION['client_totalconnections'] = $cl['client_totalconnections'];
$client_uid = $cl["client_unique_identifier"];
$client_db = $cl["client_database_id"];
$ip = $_SERVER['REMOTE_ADDR'];
?>