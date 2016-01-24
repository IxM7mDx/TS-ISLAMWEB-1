<?php
$USER_QUERY = "serveradmin";
$PASS_QUERY = "pass";
$HOST_QUERY = "localhost";
$PORT_QUERY = "10011";
$SERVER_PORT = "9987";
$NICK_QUERY = "WEB BOT";
?>
<?php
require_once("libraries/TeamSpeak3/TeamSpeak3.php");
$verified = 0;
    try {
        
        $connect = "serverquery://".$USER_QUERY.":".$PASS_QUERY."@".$HOST_QUERY.":".$PORT_QUERY."/?server_port=".$SERVER_PORT."";
        $ts3_VirtualServer = TeamSpeak3::factory($connect);
        $ts3_VirtualServer->selfUpdate(array('client_nickname'=>$NICK_QUERY));  
		foreach ($ts3_VirtualServer->clientList() as $cl) {
        if ($cl->getProperty('connection_client_ip') == $_SERVER['REMOTE_ADDR']) {
		$client_verified = $cl;
		$_SESSION ['ggids'] = explode(",", $client_verified["client_servergroups"]);
		$verified++;
        if(in_array(8,$_SESSION['ggids'])){
		header('Location: index.php');
		}
        ?>
		<?php
							$_SESSION['cuid'] = $cl["client_unique_identifier"];
							$client_uid = $_SESSION['cuid'];
							$client = $ts3_VirtualServer->clientGetByUid($client_uid);     
							$_SESSION['client_db'] = $client["client_database_id"];
							$client_db = $_SESSION['client_db'];
						?>
<?php
if(isset($_GET['id'])){
	$u_id = intval($_GET['id']);
	$connectdb = mysql_connect('localhost','root','pass')or die("Could not connect to the server");
	$selectadb = mysql_select_db("king") or die("The database could not be found!");
	$query = mysql_query("SELECT * FROM user WHERE u_id='".$u_id."'", $connectdb)or die("");
if(isset($_POST['yes'])){
$sgid = "280"; 
				$ts3_VirtualServer->serverGroupClientAdd($sgid,$client_db);
}
if(isset($_POST['no'])){
header('Location: index.php');
}
	if (mysql_num_rows($query) != 1){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Profile Widget</title>
  <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="assets1/css/site.min.css">
  <link rel="stylesheet" href="assets1/css/main.css">
</head>
<body>

  <div class="vertical_center" >
    <div class="profile_widget" >
      <div class="pw_info" >
        <h1>هناك خطاء ما !</h1>
        <div class="pw_tag" >
          <img src="assets1/img/tag.png" alt="" />
        </div><!-- /.pw_tag -->
      </div><!-- /.pw_info -->
    </div><!-- /.profile_widget -->
  </div><!-- /.vertical_center --> 
  
</body>
</html>
<?php
	}
	while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
	$c_id = $row['u_id'];
	$c_nid = $row['u_nid'];
	$c_ret = $row['u_register'];
	$c_name = $row['u_name'];
		echo '
					<h1>هل انت متاكد بانك ترغب بدخول الكلان</h1>
					<form action="" method="POST">
						<div class="message-box hidden"></div> 
						<button class="button expand" type="submit" id="yes" name="yes">نعم</button>
						<button class="button expand" type="submit" id="no" name="no">لا</button>
					</form>
';
	}
 
	
	} else die ('<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Profile Widget</title>
  <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="assets1/css/site.min.css">
  <link rel="stylesheet" href="assets1/css/main.css">
</head>
<body>

  <div class="vertical_center" >
    <div class="profile_widget" >
      <div class="pw_info" >
        <h1>لم تقم باختيار كلان</h1>
        <div class="pw_tag" >
          <img src="assets1/img/tag.png" alt="" />
        </div><!-- /.pw_tag -->
      </div><!-- /.pw_info -->
    </div><!-- /.profile_widget -->
  </div><!-- /.vertical_center --> 
  
</body>
</html>');
		}
		}
	} catch (Exception $e) { 
		echo '
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=issue.php">  
		';
        echo $e->getCode();
        die;
		}
		if($verified == 0){
		echo '
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">  
		';
		}
		if($verified > 1){
		echo '
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/all.php">  
		';
		}
?>
