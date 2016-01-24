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
  <link rel="stylesheet" href="../compiled/flipclock.css">
  <script src="../compiled/flipclock.js"></script>
  <!-- Stylesheets -->
  <link rel="stylesheet" href="templates/pro/assets/css/bootstrap-ar.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/bootstrap-extend-ar.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/site-ar.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="templates/pro/assets/vendor/animsition/animsition.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/switchery/switchery.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/intro-js/introjs.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/slidepanel/slidePanel.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/flag-icon-css/flag-icon.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/skintools.css">

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
if(isset($_GET['id'])){
	$id_room = intval($_GET['id']);
	$connectdb = mysqli_connect('localhost','root','pass')or die("Could not connect to the server");
	$selectadb = mysqli_select_db("king") or die("The database could not be found!");
	$query = mysqli_query($connectdb,"SELECT * FROM clantocreated WHERE id_room='".$id_room."'")or die("");
	
	if (mysqli_num_rows($query) != 1){
	}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	$kking = $row['cl_owner'];
	$kkiid = $row['id'];
	
	$query321432 = mysqli_query($connectdb,"SELECT * FROM clantocreated WHERE cl_owner='$kking' limit 1");
		while($row2 = mysqli_fetch_array($query321432, MYSQLI_ASSOC)) {
		$kking23 = $row2['id_room'];
	$f = 1;
?>
<body class="page-profile">
<?php include 'include/header-ar.php'; ?>
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Page Widget -->
          <div class="widget widget-shadow text-center">
            <div class="widget-header">
              <div class="widget-header-content">
                
                <h4 class="profile-user"><?php echo $kking23; ?></h4>
                
                <p><?php echo "http://localhost/teamspeak-new/clancreating.php?id=".$kkiid.""; ?></p>
<?php
/* Connect */										
$connectdb = mysqli_connect(
							'localhost', //HostName
							'root', //UserName
							'pass' //PassWord
							)or die(mysqli_error());
/* select */		
$selectadb = mysqli_select_db("king") or die(mysqli_error());
?>
<?php
if(isset($_POST['submit'])){
	echo '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  تم تسجيل اسمك في الكلان<a class="alert-link"> you are in the clan </a>.
                </div>';
	
}

if(isset($_POST['submit'])){
$query123 = mysqli_query($connectdb,"SELECT * FROM clanwantcreated WHERE `id_clinet`=$client_db") or die(mysqli_error());
$f = 1;
while($row = mysqli_fetch_array($query123, MYSQLI_ASSOC)) {
$f++;
}
if($f == 2){
echo '                <form method="post" role="form">
					<button type="submit" name="submit" class="btn btn-primary btn-block">طلب انشاء الكلان ودخولة</button>
				</form>';
} else {
}
$adddb43243432 = mysqli_query($connectdb,"INSERT INTO clanwantcreated (id_clan,id_clinet) VALUES ('$id_room','$client_db')") or die(mysqli_error());
	
if($f >= 3){
$query13322344 = mysqli_query($connectdb,"DELETE FROM `clanwantcreated` WHERE `id_clinet`=$client_db");
}
}
if(isset($_POST['submit2'])){

$query1323424 = mysqli_query($connectdb,"DELETE FROM `clanwantcreated` WHERE `id_clinet`=$client_db");
	// Close the database connection
	mysqli_close();
	
}
$query123 = mysqli_query($connectdb,"SELECT * FROM clanwantcreated WHERE `id_clinet`=$client_db") or die(mysqli_error());
$f = 1;
while($row = mysqli_fetch_array($query123, MYSQLI_ASSOC)) {
$f++;
}
if($f == 1){
echo '                <form method="post" role="form">
					<button type="submit" name="submit" class="btn btn-primary btn-block">طلب انشاء الكلان ودخولة</button>
				</form>';
}
if($f == 2){
echo '                <form method="post" role="form">
					<button type="submit2" name="submit2" class="btn btn-primary btn-block">الغاء طلب انشاء الكلان ودخولة</button>
				</form>';
}
?>
              </div>
            </div>
            <div class="widget-footer">
              <div class="row no-space">
                <div class="col-xs-4">
                  
                  
                </div>
<div id="links">
                <div class="col-xs-4">
<?php
$query3432621 = mysqli_query($connectdb,"SELECT * FROM clanwantcreated WHERE id_clan='$kking23'");
$cele7 = 0;
while($row3 = mysqli_fetch_array($query3432621, MYSQLI_ASSOC)) {
		$kikgg = $row3['id_clan'];
		$cele7++;
		}
?>
                  <strong class="profile-stat-count"><?php echo $cele7; ?></strong>
                  <span>شخص</span>
                </div>
</div>
<script language="javascript" type="text/javascript">
function loadlink(){
    $('#links').load('clancreating.php',function () {
         $(this).unwrap();
    });
}

loadlink(); // This will run on page load
setInterval(function(){
    loadlink() // this will run after every 5 seconds
}, 5000);
</script>
<?php 
}
}
}
}
}
?>
                <div class="col-xs-4">
                  
                  
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