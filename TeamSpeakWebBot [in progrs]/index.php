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
	  <div class="page">
		<div class="page-header padding-0">
		  <div class="widget widget-article type-flex">
			<div class="widget-header cover overlay">
			  <img class="cover-image height-300" src="templates/pro/assets/example-images/dashboard-header.jpg"
			  alt="">
			  <div class="overlay-panel text-center vertical-align">
				<div class="widget-metas vertical-align-middle blue-grey-800">
				  <div class="widget-title font-size-50 margin-bottom-35 blue-grey-800">الرئيسية</div>
				  <ul class="list-inline font-size-14">
				  </ul>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="page-content container-fluid">
		  <div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xlg-3 col-lg-4 col-md-12">
			  <!-- Panel Web Designer -->
			  <div class="widget widget-shadow">
				<div class="widget-content text-center bg-white padding-40">
				  <div class="blue-grey-700" style="
    text-align: end;
">شروحات</div>
				  
				  <br>
				  
				  <br>
				  
				</div>
			  </div>
			  <!-- End Panel Web Designer -->
			</div>

			<div class="col-xlg-6 col-lg-8 col-md-12">
			  <!-- Panel Traffic -->
			  <div class="widget widget-shadow example-responsive" id="widgetLinearea">
				<div class="widget-content padding-30" style="min-width:480px;">
				  <div class="row padding-bottom-20" style="height:calc(100% - 322px);">
					<div class="col-sm-8 col-xs-6">
					  <div class="blue-grey-700" style="
    text-align: end;
">منشورات اصدقائك</div>
					</div>
				  </div>
				</div>
			  </div>
			  <!-- End Panel Traffic -->
			</div>

			<div class="col-xlg-3 col-md-12">
			  <div class="row height-full">
				<div class="col-xlg-12 col-md-6" style="height:50%;">
				  <!-- Panel Overall Sales -->
				  <div class="widget widget-shadow">
					<div class="widget-content padding-30 bg-blue-600 white">
					  <div class="counter counter-lg counter-inverse text-left">
						<div class="counter-label margin-bottom-20">
						  <div style="text-align:right;">حالة الموقع</div>
						  <div style="text-align:right;">نسبة اكتمال الموقع</div>
						</div>
						<div class="counter-number-group margin-bottom-15">
						  <span class="counter-number-related font-weight-bold">%</span>
						  <span class="counter-number font-weight-bold">3</span>
						</div>
						<div class="counter-label">
						  <div class="progress progress-xs margin-bottom-10 bg-blue-800">
							<div class="progress-bar progress-bar-info bg-white" style="width: 3%" aria-valuemax="100"
							aria-valuemin="0" aria-valuenow="3" role="progressbar">
							  <span class="sr-only">3%</span>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- End Panel Overall Sales -->
				</div>

				<div class="col-xlg-12 col-md-6" style="height:50%;">
				  <!-- Panel Today's Sales -->
				  <div class="widget widget-shadow">
					<div class="widget-content padding-30 bg-red-600 white">
					  <div class="counter counter-lg counter-inverse text-left">
						<div class="counter-label margin-bottom-20">
						  <div style="text-align:right;">مستواك</div>
						  <div style="text-align:right;">قم بجمع المستويات حتى تكون لك مميزات اكثر</div>
						</div>
						<div class="counter-number-group margin-bottom-10">
						  <span class="counter-number-related font-weight-bold">^</span>
						  <?php

$req_quedd3 = mysqli_query($connect_rank,"SELECT * FROM `user` WHERE `cldbid`='$client_db'") or die ("Could not connect to the server3");
$fro11 = 1;
while($kkkk32 = mysqli_fetch_array($req_quedd3, MYSQLI_ASSOC)){
	$fro11 = $kkkk32['nextup'];
				  if(in_array(143,$_SESSION['ggids'])){
				  $echo = "10";
				  } elseif(in_array(144,$_SESSION['ggids'])){
				  $echo = "60";
				  } elseif(in_array(145,$_SESSION['ggids'])){
				  $echo = "120";
				  }elseif(in_array(147,$_SESSION['ggids'])){
				  $echo = "240";
				  }elseif(in_array(148,$_SESSION['ggids'])){
				  $echo = "606";
				  }elseif(in_array(149,$_SESSION['ggids'])){
				  $echo = "6060";
				  }elseif(in_array(150,$_SESSION['ggids'])){
				  $echo = "7200";
				  }elseif(in_array(151,$_SESSION['ggids'])){
				  $echo = "8200";
				  }elseif(in_array(152,$_SESSION['ggids'])){
				  $echo = "66440";
				  }elseif(in_array(153,$_SESSION['ggids'])){
				  $echo = "66406640";
				  }
	$oneh = 100;
	$kiw3 = $fro11 / $echo * $oneh;
	}
	
?>
						  <span class="counter-number font-weight-bold"><?php
				  if(in_array(143,$_SESSION['ggids'])){
				  echo "1";
				  }
				  if(in_array(144,$_SESSION['ggids'])){
				  echo "2";
				  }
				  if(in_array(145,$_SESSION['ggids'])){
				  echo "3";
				  }
				  if(in_array(147,$_SESSION['ggids'])){
				  echo "4";
				  }
				  if(in_array(148,$_SESSION['ggids'])){
				  echo "5";
				  }
				  if(in_array(149,$_SESSION['ggids'])){
				  echo "6";
				  }
				  if(in_array(150,$_SESSION['ggids'])){
				  echo "7";
				  }
				  if(in_array(151,$_SESSION['ggids'])){
				  echo "8";
				  }
				  if(in_array(152,$_SESSION['ggids'])){
				  echo "9";
				  }
				  if(in_array(153,$_SESSION['ggids'])){
				  echo "10";
				  }

                    ?></span>
						</div>
						<div class="counter-label">
						  <div class="progress progress-xs margin-bottom-10 bg-red-800">
							<div class="progress-bar progress-bar-info bg-white" style="width: <?php echo $kiw3; ?>%" aria-valuemax="100"
							aria-valuemin="0" aria-valuenow="<?php echo $kiw3; ?>" role="progressbar">
							  <span class="sr-only"><?php echo $kiw3; ?>%</span>
							</div>
						  </div>
						  <div class="counter counter-sm text-left">
							<div class="counter-number-group" style="text-align:right;">
							  <span class="counter-number font-size-14" style="text-align:right;">اعلى رانك في السيرفر</span>
							  <span class="counter-number-related font-size-14" style="text-align:right;">50</span>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- End Panel Today's Sales -->
				</div>
			  </div>
			</div>
		  </div>

		  <div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-lg-4 col-md-6">
			  <!-- Panel Followers -->
			  <div class="panel" id="followers">
				<div class="panel-heading">
				  <h3 class="panel-title" style="
    text-align: right;
">الاصدقاء</h3>
				</div>
				<div class="panel-body">
				  <ul class="list-group list-group-dividered list-group-full">
					<!--<li class="list-group-item">
					  <div class="media">
						<div class="media-left">
						  <a class="avatar avatar-away" href="javascript:void(0)">
							<img src="templates/pro/assets/portraits/10.jpg" alt="">
							<i></i>
						  </a>
						</div>
						<div class="media-body">
						  <div class="pull-right">
							<button type="button" class="btn btn-success btn-default btn-sm"><i class="icon wb-check" aria-hidden="true"></i>Following</button>
						  </div>
						  <div><a class="name" href="javascript:void(0)">Ronnie Ellis</a></div>
						  <small>@kingronnie24</small>
						</div>
					  </div>
					</li>-->
				  </ul>
				</div>
			  </div>
			  <!-- End Panel Followers -->
			</div>

			<div class="col-lg-4 col-md-6">
			  <!-- Panel Tickets -->
			  <div class="panel">
				<div class="panel-heading">
				  <h3 class="panel-title" style="
    text-align: right;
">التذاكر</h3>
				</div>
				<div class="panel-body">
				  <ul class="list-group list-group-dividered list-group-full">
					<!--<li class="list-group-item">
					  <small class="label label-round label-info pull-right">Completed</small>
					  <p><a class="hightlight" href="javascript:void(0)">Server unavaible</a>
						<span>[13060]</span>
					  </p>
					  <small>Opened by
						<a class="hightlight" href="javascript:void(0)">
						  <span class="avatar avatar-xs">
							<img src="templates/pro/assets/portraits/1.jpg" alt="">
						  </span>
						  <span>Herman Beck</span>
						</a>
						<time datetime="2015-07-01T08:55">2 hours ago</time>
					  </small>
					</li>-->
				  </ul>
				</div>
			  </div>
			  <!-- End Panel Tickets -->
			</div>

			<div class="col-lg-4 col-md-12">
			  <!-- Panel Title -->
			  <div class="widget widget-shadow" id="widgetGmap">
				<div class="map height-full" id="gmap"></div>
			  </div>
			  <!-- End Panel Title -->
			</div>
		  </div>
		</div>
	  </div>
	  <!-- End Page -->

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