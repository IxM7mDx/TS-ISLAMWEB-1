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
		$verified++;
        if(in_array(78,$_SESSION['ggids'])){
		echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=activated.php">  ';
        } else {
		$cookie_name = "SSID";
		$cookie_value = "96871";
		setcookie($cookie_name, $cookie_value, time() + (2592000 * 12), "/");
		include 'include/velis.php';
		
		?>
		
		<!-- Content Wrapper. Contains page content -->
		<?php include 'include/head.php';?>
		
		<script>
		Breakpoints();
		</script>
  
		</head>
		
	<body class="dashboard">
	  <!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
					<?php 
include 'include/header-ar.php';
			?>


	  <!-- Page -->
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
    <div class="page-content">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-body">
          

          <div class="nav-tabs-horizontal">
            <div class="tab-content">
              <div class="tab-pane animation-fade active" id="all_contacts" role="tabpanel">
                <ul class="list-group">
				<?php
$querygetadmins = mysqli_query($connect_panel,"SELECT * FROM admins") or die(mysqli_error());
	// Loop the recordset $rs
	while($row432 = mysqli_fetch_array($querygetadmins, MYSQLI_ASSOC)) {
	   // Write the value of the column FirstName (which is now in the array $row)
	$refre = $row432['admin_udb'];
	 ?>
	 <li class="list-group-item">
                    <div class="media">
                      <div class="media-left">
					  <?php 
				$onlineor = 0;
				$isonline = mysqli_query($connect_rank,"SELECT * FROM `user` WHERE `cldbid`=".$refre."") or die(mysqlI_error());
				while($row31432 = mysqli_fetch_array($isonline, MYSQLI_ASSOC)){
				$onlineor = $row31432['online'];
				$userlive = $row31432['grpid'];
				}
				if($onlineor == 1){
				echo '<div class="avatar avatar-online">
                          <img src="templates/pro/assets/portraits/1.jpg" alt="...">
                          <i class="avatar avatar-busy"></i>
                        </div>';
				} else {
				echo '<div class="avatar avatar-away">
                          <img src="templates/pro/assets/portraits/2.jpg" alt="...">
                          <i class="avatar avatar-busy"></i>
                        </div>';
				}
				?>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">
                          <?php echo $row432['admin_name']; ?>
                          <small><?php echo $row432['admin_group']; ?></small>
                        </h4>
                      </div>
                    </div>
                  </li>
	 <?php

	  }

	?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Panel -->
    </div>
  </div>	  <!-- End Page -->

	  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>


	  <!-- Footer -->
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

	  <!-- Plugins For This Page -->
	  <script src="templates/pro/assets/vendor/chartist-js/chartist.min.js"></script>
	  <script src="templates/pro/assets/vendor/gmaps/gmaps.js"></script>
	  <script src="templates/pro/assets/vendor/matchheight/jquery.matchHeight-min.js"></script>

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
	  <script src="templates/pro/assets/js/components/gmaps.min.js"></script>
	  <script src="templates/pro/assets/js/components/matchheight.min.js"></script>

	  <script>
		$(document).ready(function($) {

		  Site.run();

		  // widget-linearea
		  (function() {
			var linearea = new Chartist.Line('#widgetLinearea .ct-chart', {
			  labels: ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'],
			  series: [
				[0, 2.5, 2, 2.8, 2.6, 3.8, 0],
				[0, 1.4, 0.5, 2, 1.2, 0.9, 0]
			  ]
			}, {
			  low: 0,
			  showArea: true,
			  showPoint: false,
			  showLine: false,
			  fullWidth: true,
			  chartPadding: {
				top: 0,
				right: 10,
				bottom: 0,
				left: 0
			  },
			  axisX: {
				showGrid: false,
				labelOffset: {
				  x: -14,
				  y: 0
				},
			  },
			  axisY: {
				labelOffset: {
				  x: -10,
				  y: 0
				},
				labelInterpolationFnc: function(num) {
				  return num % 1 === 0 ? num : false;
				}
			  }
			});
		  })();

		  // widget gmap
		  (function() {
			var map = new GMaps({
			  el: '#gmap',
			  lat: -12.043333,
			  lng: -77.028333,
			  zoomControl: true,
			  zoomControlOpt: {
				style: "SMALL",
				position: "TOP_LEFT"
			  },
			  panControl: true,
			  streetViewControl: false,
			  mapTypeControl: false,
			  overviewMapControl: false
			});

			map.addStyle({
			  styledMapName: "Styled Map",
			  styles: $.components.get('gmaps', 'styles'),
			  mapTypeId: "map_style"
			});

			map.setStyle("map_style");
		  })();
		});
	  </script>


	  <!-- Google Analytics -->

	</body>


</html>

		<?php
		}
		}
		}

	} catch (Exception $e) { 
		include 'issue.php';
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