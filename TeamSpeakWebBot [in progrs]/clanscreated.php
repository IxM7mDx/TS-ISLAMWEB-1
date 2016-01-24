<?php

include 'include/get.php';

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
		
		include 'include/velis.php';
		
		?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Profile | Remark Admin Template</title>

  <link rel="apple-touch-icon" href="templates/pro/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://getbootstrapadmin.com/remark/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="templates/pro/assets/css/bootstrap-ar.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/bootstrap-extend-ar.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/site-ar.min.css">
  <link rel="stylesheet" href="../compiled/flipclock.css">
  <script src="../compiled/flipclock.js"></script>
  <!-- Plugins -->
  <link rel="stylesheet" href="templates/pro/assets/vendor/animsition/animsition.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/switchery/switchery.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/intro-js/introjs.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/slidepanel/slidePanel.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/flag-icon-css/flag-icon.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/skintools.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="jquery.countdown.js"></script>
  <!-- Page -->
  <link rel="stylesheet" href="templates/pro/assets/css/pages/profile.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-table/bootstrap-table.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/filament-tablesaw/tablesaw.min.css">
  
  <!-- Fonts -->
  <link rel="stylesheet" href="templates/pro/assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="templates/pro/assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700'>

  <!--[if lt IE 9]>
    <script src="templates/pro/assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="templates/pro/assets/vendor/media-match/media.match.min.js"></script>
    <script src="templates/pro/assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="templates/pro/assets/vendor/modernizr/modernizr.min.js"></script>
  <script src="templates/pro/assets/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<?php
	$testmode = 4;
	// Select rool
	$rool = false;
	
	//qurey mysql SELECT all FROM clan_ce WHERE cl_owner="by client db"
	$query_mysql_1 = mysqli_query($connect_panel,"SELECT * FROM clan_ce WHERE cl_owner=$client_db") or die(mysqli_error());

	
	//if he have order 
	if(isset($query_mysql_1)){
	
		while($r3ow = mysqli_fetch_array($query_mysql_1, MYSQLI_ASSOC)) {
		$mocer = $r3ow['cl_date'];
		$monow = time();
		$delei = $r3ow['cl_dele'];
		$mecer = count($mocer);
		$rool = true;
		}
		
	}
	
	//if he have order 
	if($rool == true){
	
		if($monow >= $delei){
		$query_mysql_2 = mysqli_query($connect_panel,"DELETE FROM `clan_ce` WHERE `cl_owner`=$client_db") or die(mysqli_error());
		
			if(isset($query_mysql_2)){
				echo "2";
			}
			
		}
			
	}
	

	/*$cl_date_y = "20".date("y")."";
	$cl_date_me = "".date("m")."";
	$cl_date_d = "".date("d")."";
	$cl_date_h = "".date("H")."";
	$cl_date_mi = "".date("i")."";
	$cl_date_s = "".date("s")."";
	$cl_dat2 = "". time()+600 ."";*/

if($rool == false){
	echo '<body class="page-profile">';
	include 'include/header-ar.php';
	echo '<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;"><div class="page-header"><h1 class="page-title" style="text-align:right;">فتح عشيرة جديدة</h1></div><div class="page-content"><div class="panel"><div class="panel-body container-fluid"><div class="row row-lg"><div class="panel-body"><form method="post" role="form">';

	if(isset($_POST['submit'])){
		$cl_name = $_POST['ClanName'];
		$server_dew  = $_POST['ClanGroup'];
		if(empty($cl_name)){
		echo '<div class="alert dark alert-alt alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  الحقل الاول<a class="alert-link" href="javascript:void(0)"> لم يتم كتابة شيء به</a>.
                </div>';
		} else {
		
				if (!preg_match("/^[a-zA-Z0-9]*$/",$cl_name)) {
					echo '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					لايسمح الا <a class="alert-link" href="javascript:void(0)"> بالحروف الانجليزية و الارقام في الخيار الاول</a>.
					</div>';
			} else {
			
				if(empty($server_dew)){
					echo '<div class="alert dark alert-alt alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					الحقل الثاني<a class="alert-link" href="javascript:void(0)"> لم يتم كتابة شيء به</a>.
					</div>';
				} else {
		
					if (!preg_match("/^[a-zA-Z0-9]*$/",$server_dew)) {
						  $already = true;
						  echo '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						  </button>
						   لايسمح الا <a class="alert-link" href="javascript:void(0)"> بالحروف الانجليزية و الارقام في الخيار الثاني</a>.
						</div>';
					} else {
	
							// Select time
							$cl_date = "". time() ."";
							$data_time_in = "601";
							$data_add_600 = $cl_date + $data_time_in;
							
							// Select client db
							$cl_owner_db = $client_db;
							
							// Select mysql_query INSERT
							$adddb432432 = mysqli_query($connect_panel,"INSERT INTO clan_ce (cl_owner,cl_date,cl_dele) VALUES ('$cl_owner_db','$cl_date','$data_add_600')") or die(mysqli_error());
					}
				}	
			}
		}
	}

	
	?>
			  <div class="form-group">
            <label class="sr-only" for="inputName">اسم الكلان</label>
            <input type="text" class="form-control" id="ClanName" name="ClanName" placeholder="ClanName">
          </div>
          <div class="form-group">
            <label class="sr-only" for="inputEmail">اسم الرتبة</label>
            <input type="text" class="form-control" id="ClanGroup" name="ClanGroup" placeholder="ClanGroup">
          </div>
		  
          <button type="submit" name="submit" class="btn btn-primary btn-block">تسجيل الكلان</button>
        </form>
            </div>
            <div class="clearfix visible-md-block visible-lg-block"></div>
          </div>
        </div>
      </div>
      <!-- End Panel -->
   </div>
         <!-- End Panel -->
        </div>
		
      </div>
    </div>
  </div>
  </div>
  </div>
<?php 
  }
  if($rool == true){ ?>
<body class="page-profile">
<?php include 'include/header-ar.php'; ?>
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
<div class="page-header">
      <h1 class="page-title" style="text-align:right;">صناعة العشائر</h1>
    </div>
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Page Widget -->
          <div class="widget widget-shadow text-center">
            <div class="widget-header">
              <div class="widget-header-content">
                
                <h4 class="profile-user"></h4>
				
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
					<div id="links">
<?php 
	$query_mysql_234 = mysqli_query($connect_panel,"SELECT * FROM `clan_ce` WHERE `cl_owner`='$client_db'") or die(mysqli_error());
	
	// Select mysql_query while
	while($row43434322 = mysqli_fetch_array($query_mysql_234, MYSQLI_ASSOC)) {
	$io1 = $row43434322['cl_date'];
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<div class="clock" style="margin:2em;"><?php echo 'the owner of clan is '.$client_db; ?></div>
						<!-- هنا المؤقت -->
					</div>
<?php } ?>

              </div>
            </div>
            <div class="widget-footer">
              <div class="row no-space">
                <div class="col-xs-4">
                  
                  
                </div>
                <div class="col-xs-4">
<?php
	$m4 = 0;
	$query1233111 = mysqli_query($connect_panel,"SELECT * FROM clanwantcreated WHERE `id_owner`=$client_db") or die(mysqli_error());
	while($row54 = mysqli_fetch_array($query1233111, MYSQLI_ASSOC)) {
	$m4++;
	}
?>
                  <strong class="profile-stat-count"><?php echo $m4; ?></strong>
                  <span>شخص</span>
                </div>
                <div class="col-xs-4">
		<form method="post" role="form">
				<button type="submit" name="mkce" class="btn btn-primary btn-block">تسجيل الكلان</button>
        </form>
<?php
	if(isset($_POST['mkce'])){
	$fjviske = true;
	} else {
	$fjviske = false;
	}
	
	if($fjviske == true){
		$f = 0;
		$query1233111432 = mysqli_query($connect_panel,"SELECT * FROM clanwantcreated WHERE `id_owner`=$client_db") or die(mysqli_error());
		while($row54432 = mysqli_fetch_array($query1233111432, MYSQLI_ASSOC)) {
		$odek1 = $row54432['id_owner'];
		$odek2 = $row54432['id_clan'];
		$f++;
		}
		
		$clan134 = 3;
$clan13 = 3;
$clan1343 = 3;
$clan1344 = 3;
$clan1345 = 3;
$clan1346 = 3;
$clan1347 = 3;
$clan1348 = 3;
$clan1349 = 3;
$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
		while($row = mysqli_fetch_array($rs)) {
		$rows[] = $row;
		  }
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
		while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
		$clan13 = $row542321236['is_sele'];
		}
		if($clan13 == "1"){
		$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
		while($row = mysqli_fetch_array($rs)) {
		$rows[] = $row;
		  }
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan134 = $row542321236['is_sele'];
			}
		}
		if($clan134 == "1"){
		$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
			while($row = mysqli_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan1344 = $row542321236['is_sele'];
			}
		}
		if($clan1344 == "1"){
		$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
			while($row = mysqli_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan1345 = $row542321236['is_sele'];
			}
		}
		if($clan1345 == "1"){
		$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
			while($row = mysqli_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan1346 = $row542321236['is_sele'];
			}
		}
		if($clan1346 == "1"){
		$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
			while($row = mysqli_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan1347 = $row542321236['is_sele'];
			}
		}
		if($clan1347 == "1"){
		$rs = mysqli_query($connect_panel."SELECT * FROM clantocreated");
		$rows = array();
			while($row = mysqli_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan1348 = $row542321236['is_sele'];
			}
		}
		if($clan1348 == "1"){
		$rs = mysqli_query($connect_panel,"SELECT * FROM clantocreated");
		$rows = array();
			while($row = mysqli_fetch_array($rs)) {
			$rows[] = $row;
			}
		$max = count($rows) - 1;
		$odek13 = $rows[rand(0, $max)][1];
		$query114325243 = mysqli_query($connect_panel,"SELECT * FROM clantocreated WHERE `id_room`=$odek13") or die(mysqli_error());
			while($row542321236 = mysqli_fetch_array($query114325243, MYSQLI_ASSOC)) {
			$clan1349 = $row542321236['is_sele'];
			}
		}
		if ($clan1349 == '1'){
		echo 'حظك زق'; // هنا المفروض يكرشة 
		} else { // يكمل شعلة
		$top_cid = $odek13;
		$yes = 1;
		$query323212344 = mysqli_query($connect_panel,"UPDATE `clantocreated` SET `is_sele`=$yes WHERE `id_room`=$odek13");

			
			$query321 = mysqli_query($connect_panel."SELECT * FROM clantocreated WHERE `id_room`=$odek13");
			while($row2 = mysqli_fetch_array($query321, MYSQLI_ASSOC)) {
			$id_group = $row2['id_group'];
			$cl_owner = $row2['cl_owner'];
			}
			
			// create a sub-level channel and get its ID
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 1 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 2 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 3 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 4 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 5 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "I.W.J.C[".$top_cid."]",
			 "channel_topic" => "I.W.J.C room[".$top_cid."] for clan",
			 "channel_description" => "غير مفعل",
			 "channel_needed_talk_power" => "75",
			 "channel_maxclients" => "0",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			 ));
			 $sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "New Clan | 6 | كلان جديد",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			));
			$sub_cid = $ts3_VirtualServer->channelCreate(array(
			 "channel_name" => "AFK",
			 "channel_topic" => "AFK room[".$top_cid."] for clan",
			 "channel_description" => "غير مفعل",
			 "channel_needed_talk_power" => "75",
			 "channel_codec" => TeamSpeak3::CODEC_SPEEX_NARROWBAND,
			 "channel_flag_permanent" => TRUE,
			 "cpid" => $top_cid,
			 ));
			$mychannel = $ts3_VirtualServer->channelGetById(''.$top_cid.''); // this will select ur channel depending on its id (this case: 555)
			$mychannel["channel_name"] = "[cspacerclan1]﹝ • ".$top_cid." CLAN • ﹞"; // setting name of channel above selected with custom name.
			$myserver1 = $ts3_VirtualServer->serverGroupRename($id_group, $server_dew);
			$mensaje = "تم فتح كلانك";
			$roomove = $top_cid;
			$cl_comm = 0;
			//$adddb5432 = mysql_query("INSERT INTO clanwantcreated (id_clan,id_clinet) VALUES ('$top_cid','$client_db')", $connect_panel) or die(mysql_error());
			$query1423 = mysqli_query($connect_panel,"SELECT * FROM `clanwantcreated` WHERE `id_clan`='$top_cid'");
			while($row643 = mysqli_fetch_array($query1423, MYSQLI_ASSOC)) {
				$client_dbid = $row643['id_clinet'];
				$myserver2 = $ts3_VirtualServer->serverGroupClientAdd($id_group, $client_dbid);
				$client = $ts3_VirtualServer->clientGetByDbid($client_dbid);
				$myserver4 = $client->move($roomove);
				$myserver3 = $client->poke($mensaje);
				$cl_comm++;
			} 
			if($cl_comm >= 800) {
			$cl_level = "7";
			}
			if($cl_comm >= 400) {
			$cl_level = "6";
			}
			if($cl_comm >= 200) {
			$cl_level = "5";
			}
			if($cl_comm >= 100) {
			$cl_level = "4";
			}
			if($cl_comm >= 51) {
			$cl_level = "3";
			}
			if($cl_comm >= 11) {
			$cl_level = "2";
			}
			if($cl_comm <= 10) {
			$cl_level = "1";
			}
			$cl_reg = "20".date("y")."/".date("m")."/".date("d")."   ".date("H").":".date("i").":".date("s")."";
			$cl_owner_db = $client_db;
			$cl_name = "test";
			$adddb432 = mysqli_query($connect_panel,"INSERT INTO clan (cl_room,cl_name,cl_owner,cl_comm,cl_level,cl_reg) VALUES ('$top_cid','$cl_name','$cl_owner_db','$cl_comm','$cl_level','$cl_reg')") or die(mysqli_error());
			$group_owner = "105";
			$ownerr = $ts3_VirtualServer->clientGetByDbid($cl_owner_db);
			$ownerr2 = $ownerr->SetChannelGroup($top_cid, $group_owner);
			//$query132 = mysql_query("DELETE FROM `clantocreated` WHERE `id_room`=$top_cid", $connect_panel);
			//$query231 = mysql_query("DELETE FROM `clanwantcreated` WHERE `id_clan`=$top_cid", $connect_panel);
			echo 'تم';

	  
	}
		}

	  	// Close the database connection
	mysqli_close();
?>
                </div>
              </div>
            </div>
          </div>
          <!-- End Page Widget -->
        </div>

        
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
  </div>
  </div>
 <?php } ?>
 
    </div>
  </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <?php include 'include/footer.php'; ?>
    <!-- Core  -->
  <script src="templates/pro/assets/vendor/jquery/jquery.min.js"></script>
  <script src="templates/pro/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="templates/pro/assets/vendor/animsition/jquery.animsition.min.js"></script>
  <script src="templates/pro/assets/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="templates/pro/assets/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="templates/pro/assets/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="templates/pro/assets/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="templates/pro/assets/vendor/switchery/switchery.min.js"></script>
  <script src="templates/pro/assets/vendor/intro-js/intro.min.js"></script>
  <script src="templates/pro/assets/vendor/screenfull/screenfull.js"></script>
  <script src="templates/pro/assets/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Scripts -->
  <script src="templates/pro/assets/js/core.min.js"></script>
  <script src="templates/pro/assets/js/site.min.js"></script>

  <script src="templates/pro/assets/js/sections/menu.min.js"></script>
  <script src="templates/pro/assets/js/sections/menubar.min.js"></script>
  <script src="templates/pro/assets/js/sections/sidebar.min.js"></script>
  <script src="templates/pro/assets/js/sections/skintools.min.js"></script>

  <script src="templates/pro/assets/js/configs/config-colors.min.js"></script>
  <script src="templates/pro/assets/js/configs/config-tour.min.js"></script>

  <script src="templates/pro/assets/js/components/asscrollable.min.js"></script>
  <script src="templates/pro/assets/js/components/animsition.min.js"></script>
  <script src="templates/pro/assets/js/components/slidepanel.min.js"></script>
  <script src="templates/pro/assets/js/components/switchery.min.js"></script>


  <!-- Scripts For This Page -->
  <script src="templates/pro/assets/vendor/bootstrap-table/bootstrap-table.min.js"></script>
  <script src="templates/pro/assets/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js"></script>

   <!-- Plugins For This Page -->
  <script src="templates/pro/assets/vendor/filament-tablesaw/tablesaw.js"></script>

<script>
    function cellStyle(value, row, index) {
      var classes = ['active', 'success', 'info', 'warning', 'danger'];

      if (index % 2 === 0 && index / 2 < classes.length) {
        return {
          classes: classes[index / 2]
        };
      }
      return {};
    }

    function rowStyle(row, index) {
      var classes = ['active', 'success', 'info', 'warning', 'danger'];

      if (index % 2 === 0 && index / 2 < classes.length) {
        return {
          classes: classes[index / 2]
        };
      }
      return {};
    }

    function scoreSorter(a, b) {
      if (a > b) return 1;
      if (a < b) return -1;
      return 0;
    }

    function nameFormatter(value) {
      return value + '<i class="icon wb-book" aria-hidden="true"></i> ';
    }

    function starsFormatter(value) {
      return '<i class="icon wb-star" aria-hidden="true"></i> ' + value;
    }

    function queryParams() {
      return {
        type: 'owner',
        sort: 'updated',
        direction: 'desc',
        per_page: 100,
        page: 1
      };
    }

    function buildTable($el, cells, rows) {
      var i, j, row,
        columns = [],
        data = [];

      for (i = 0; i < cells; i++) {
        columns.push({
          field: 'field' + i,
          title: 'Cell' + i
        });
      }
      for (i = 0; i < rows; i++) {
        row = {};
        for (j = 0; j < cells; j++) {
          row['field' + j] = 'Row-' + i + '-' + j;
        }
        data.push(row);
      }
      $el.bootstrapTable('destroy').bootstrapTable({
        columns: columns,
        data: data,
        iconSize: 'outline',
        icons: {
          columns: 'wb-list-bulleted'
        }
      });
    }

    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function($) {
        Site.run();
      });

      // Example Bootstrap Table From Data
      // ---------------------------------
      (function() {
        var bt_data = [{
          "Tid": "1",
          "First": "Jill",
          "Last": "Smith",
          "Score": "50"
        }, {
          "Tid": "2",
          "First": "Eve",
          "Last": "Jackson",
          "Score": "94"
        }, {
          "Tid": "3",
          "First": "John",
          "Last": "Doe",
          "Score": "80"
        }, {
          "Tid": "4",
          "First": "Adam",
          "Last": "Johnson",
          "Score": "67"
        }, {
          "Tid": "5",
          "First": "Fish",
          "Last": "Johnson",
          "Score": "100"
        }, {
          "Tid": "6",
          "First": "CC",
          "Last": "Joson",
          "Score": "77"
        }, {
          "Tid": "7",
          "First": "Piger",
          "Last": "Yoson",
          "Score": "87"
        }];

        $('#exampleTableFromData').bootstrapTable({
          data: bt_data,
          // mobileResponsive: true,
          height: "250"
        });
      })();

      // Example Bootstrap Table Columns
      // -------------------------------
      (function() {
        $('#exampleTableColumns').bootstrapTable({
          url: "../../assets/data/bootstrap_table_test.json",
          height: "400",
          iconSize: 'outline',
          showColumns: true,
          icons: {
            refresh: 'wb-refresh',
            toggle: 'wb-order',
            columns: 'wb-list-bulleted'
          }
        });
      })();

      // Example Bootstrap Table Large Columns
      // -------------------------------------
      buildTable($('#exampleTableLargeColumns'), 50, 50);

      // Example Bootstrap Table Toolbar
      // -------------------------------
      (function() {
        $('#exampleTableToolbar').bootstrapTable({
          url: "../../assets/data/bootstrap_table_test2.json",
          search: true,
          showRefresh: true,
          showToggle: true,
          showColumns: true,
          toolbar: '#exampleToolbar',
          iconSize: 'outline',
          icons: {
            refresh: 'wb-refresh',
            toggle: 'wb-order',
            columns: 'wb-list-bulleted'
          }
        });
      })();

      // Example Bootstrap Table Events
      // ------------------------------
      (function() {
        $('#exampleTableEvents').bootstrapTable({
          url: "../../assets/data/bootstrap_table_test.json",
          search: true,
          pagination: true,
          showRefresh: true,
          showToggle: true,
          showColumns: true,
          iconSize: 'outline',
          toolbar: '#exampleTableEventsToolbar',
          icons: {
            refresh: 'wb-refresh',
            toggle: 'wb-order',
            columns: 'wb-list-bulleted'
          }
        });

        var $result = $('#examplebtTableEventsResult');

        $('#exampleTableEvents').on('all.bs.table', function(e, name,
            args) {
            console.log('Event:', name, ', data:', args);
          })
          .on('click-row.bs.table', function(e, row, $element) {
            $result.text('Event: click-row.bs.table');
          })
          .on('dbl-click-row.bs.table', function(e, row, $element) {
            $result.text('Event: dbl-click-row.bs.table');
          })
          .on('sort.bs.table', function(e, name, order) {
            $result.text('Event: sort.bs.table');
          })
          .on('check.bs.table', function(e, row) {
            $result.text('Event: check.bs.table');
          })
          .on('uncheck.bs.table', function(e, row) {
            $result.text('Event: uncheck.bs.table');
          })
          .on('check-all.bs.table', function(e) {
            $result.text('Event: check-all.bs.table');
          })
          .on('uncheck-all.bs.table', function(e) {
            $result.text('Event: uncheck-all.bs.table');
          })
          .on('load-success.bs.table', function(e, data) {
            $result.text('Event: load-success.bs.table');
          })
          .on('load-error.bs.table', function(e, status) {
            $result.text('Event: load-error.bs.table');
          })
          .on('column-switch.bs.table', function(e, field, checked) {
            $result.text('Event: column-switch.bs.table');
          })
          .on('page-change.bs.table', function(e, size, number) {
            $result.text('Event: page-change.bs.table');
          })
          .on('search.bs.table', function(e, text) {
            $result.text('Event: search.bs.table');
          });
      })();
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
</body>

</html>
		<?php
		
		}
		}
	} catch (Exception $e) { 
		echo '
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