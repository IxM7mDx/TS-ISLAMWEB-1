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
        if(in_array(8,$_SESSION['ggids'])){
        header('Location: activated.php');
        }
		$verified++;
		$nicknames[] = htmlspecialchars($cl->client_nickname);
        $_SESSION['ip'] = $cl->getProperty('connection_client_ip');
        $_SESSION['cuid'] = $cl["client_unique_identifier"];
        $_SESSION['client_status'] = $cl->getIcon();
        $_SESSION['client_description'] = $cl['client_description'];
        $_SESSION['channelid'] = $cl['client_channel_group_id'];
        $_SESSION['client_totalconnections'] = $cl['client_totalconnections'];
		$client_uid = $cl["client_unique_identifier"];
		?>
		<!-- Content Wrapper. Contains page content -->
		<?php include 'include/head.php';?>
		<!-- Content Wrapper. Contains page content -->
		<?php include 'include/header.php';?>
		<!-- Content Wrapper. Contains page content -->
	    <?php include 'include/main.php';?>
		<div class="content-wrapper">
        <!-- page_name -->
		<?php page_name("Dashboard","Control panel","Home","Dashboard") ?>
        <!-- Main content -->
<?php

	$connectdb = mysqli_connect('localhost','root','pass')or die("Could not connect to the server");
	$selectadb = mysqli_select_db("king") or die("The database could not be found!");
	
?>
      </div><!-- /.content-wrapper -->
      <?php include_once 'include/footer.php'; ?>
      <!-- asidef footer -->    
	  <?php include_once 'include/asidef.php'; ?>
      <!-- javacsrbt -->
	  <?php include_once 'include/js.php'; ?>
  </body>
</html>
		<?php
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
		include 'offline.php';
		}
		if($verified > 1){
		echo '
		<META HTTP-EQUIV="Refresh" CONTENT="0;URL=/all.php">  
		';
		}
		?>