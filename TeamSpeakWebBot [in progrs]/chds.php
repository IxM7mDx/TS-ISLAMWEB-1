<?php
include 'include/get.php';

    try {
        
        $connect = "serverquery://".$config["USER_QUERY"].":".$config["PASS_QUERY"]."@".$config["HOST_QUERY"].":".$config["PORT_QUERY"]."/?server_port=".$config["SERVER_PORT"]."";
        $ts3_VirtualServer = TeamSpeak3::factory($connect);
        $ts3_VirtualServer->selfUpdate(array('client_nickname'=>$config["NICK_QUERY_activated"])); 
		$verified = 0;
		foreach ($ts3_VirtualServer->clientList() as $cl) {
        if ($cl->getProperty('connection_client_ip') == $_SERVER['REMOTE_ADDR']) {
		$verified++;
		$client_verified = $cl;
		$_SESSION ['ggids'] = explode(",", $client_verified["client_servergroups"]);
		
        if(in_array($config["activation_notid"],$_SESSION['ggids'])){
			header('Location: index.php');
		} else {
		
		include 'include/velis.php';

		// get the q parameter from URL
		$q = $_REQUEST["q"];

		$ver = "".htmlspecialchars($q)."";
	
		$getusername = mysqli_query($connect_panel,"SELECT * FROM `user` WHERE `u_db`='$client_db'") or die ("Could not connect to the 432fd2");
		while($gett43234 = mysqli_fetch_array($getusername, MYSQLI_ASSOC)){
		$u_name = $gett43234['u_name'];
		}
		
		// for cahang description of the client
		$disa = array("client_description" => "GC.tk/".$u_name." | ".$ver."");
		$client_verified->modify($disa);
										
		echo "لقد تم تعديل الوصف الخاص بك الى ".$ver."";	

		die;
        }	 
		die;
		}
		}

	} catch (Exception $e) { 
		include 'issue.php';
        echo $e->getCode();
        echo $e->getMessage();
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