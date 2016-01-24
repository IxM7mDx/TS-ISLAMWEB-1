<?php
include 'include/config.php';
require_once("libraries/TeamSpeak3/TeamSpeak3.php");
    try {
        $connect = "serverquery://".$config["USER_QUERY"].":".$config["PASS_QUERY"]."@".$config["HOST_QUERY"].":".$config["PORT_QUERY"]."/?server_port=".$config["SERVER_PORT"]."";
        $ts3_VirtualServer = TeamSpeak3::factory($connect);
        $ts3_VirtualServer->selfUpdate(array('client_nickname'=>$config["NICK_QUERY"]));  
		$verified = 0;
		foreach ($ts3_VirtualServer->clientList() as $cl) {
        if ($cl->getProperty('connection_client_ip') == $_SERVER['REMOTE_ADDR']) {
		$client_verified = $cl;
		$_SESSION ['ggids'] = explode(",", $client_verified["client_servergroups"]);
        if(in_array(78,$_SESSION['ggids'])){
        header('Location: activated.php');
        } else {
		$verified++;
		$nicknames[] = htmlspecialchars($cl->client_nickname);
        $_SESSION['ip'] = $cl->getProperty('connection_client_ip');
        $_SESSION['cuid'] = $cl["client_unique_identifier"];
        $_SESSION['client_status'] = $cl->getIcon();
        $_SESSION['client_description'] = $cl['client_description'];
        $_SESSION['channelid'] = $cl['client_channel_group_id'];
        $_SESSION['client_totalconnections'] = $cl['client_totalconnections'];
		$client_uid = $cl["client_unique_identifier"];
		$client_db = $cl["client_database_id"];
?>
<?php
$connectdb = mysql_connect('localhost','root','pass')or die("Could not connect to the server");
$selectadb = mysql_select_db("king") or die("The database could not be found!");
$u_id = intval($_GET['id']);
$query = mysql_query("SELECT * FROM user WHERE u_id='".$u_id."'", $connectdb)or die("");

if (mysql_num_rows($query) != 1){
$c_db = $query['u_db'];
$actions = $_GET['actions'];
$id = intval($_GET['id']);
$to = intval($_GET['to']);

if($actions == 'send'){

	
	$addfr = mysql_query("INSERT INTO frin_req VALUES ('', '$client_db', '$id')") or die(mysql_error());

	if(isset($addfr)){
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/teamspeak-new">  ';
	}
}

if($actions == 'cancel'){

	$carfr = mysql_query("DELETE FROM `frin_req` WHERE `from`='$client_db' AND `to`='$id'") or die(mysql_error());

	if(isset($carfr)){
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/teamspeak-new">  ';
	}
}

if($actions == 'accept'){
	
	$carfr = mysql_query("DELETE FROM `frin_req` WHERE `from`='$id' AND `to`='$client_db'") or die(mysql_error());
	
	$carfr = mysql_query("INSERT INTO frin VALUES ('', '$id', '$client_db')") or die(mysql_error());

	if(isset($carfr)){
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/teamspeak-new">  ';
	}
}

if($actions == 'removefriend'){

	$carfr1 = mysql_query("DELETE FROM frin WHERE (user_one='$client_db' AND user_two='$id') OR (user_one='$id' AND user_two='$client_db')") or die(mysql_error());
	
	if(isset($carfr1)){
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/teamspeak-new">  ';
	}
	
}
echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/teamspeak-new">  ';
?>
<?php
}
}
		}
		}

	} catch (Exception $e) { 
        echo ' ' . $e->getCode() . '';
        die;
		}
		if($verified == 0){
		include 'offline.php';
		}
		if($verified > 1){
		echo '
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/all.php">  
		';
		}
		?>