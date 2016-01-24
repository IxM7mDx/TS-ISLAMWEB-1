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

  <title><?php echo $lang["page_title"];?> | Clans Levels - ترتيب الكلانات</title>

  <link rel="apple-touch-icon" href="templates/pro/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://getbootstrapadmin.com/remark/assets/images/favicon.ico">

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
<body class="page-profile">
<?php include 'include/header-ar.php'; ?>
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
<div class="page-header">
      <h1 class="page-title" style="text-align:right;">ترتيب الكلانات</h1>
    </div>
<div class="page-content">
      <!-- Panel -->
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
		              <div class="panel-body">
              <table style="text-align:center;font-weight:700;font-size:13px;" class="tablesaw table-bordered table-hover" data-tablesaw-mode="swipe" data-tablesaw-sortable
              data-tablesaw-sortable-switch>
                <thead>
                  <tr>
                    <th style="text-align:center;font-weight:700;font-size:13px;"></th>
                    <th data-tablesaw-sortable-col style="text-align:center;font-weight:700;font-size:13px;">level</th>
                    <th id="third" data-tablesaw-sortable-col style="text-align:center;font-weight:700;font-size:13px;">اللفل</th>
                    <th data-tablesaw-sortable-col style="text-align:center;font-weight:700;font-size:13px;">
                      <abbr title="Rotten Tomato Rating" style="text-align:center;font-weight:700;font-size:13px;">عدد الاعضاء</abbr>
                    </th>
                    <th style="text-align:center;font-weight:700;font-size:13px;">اسم الكلان</th>
                    <th data-tablesaw-sortable-col data-tablesaw-sortable-default-col style="text-align:center;font-weight:700;font-size:13px;">الترتيب</th>
                  </tr>
                </thead>
                <tbody>
				<?php
	$v22 = 0;
	// Connect to database server
	$con = mysqli_connect("localhost", "root", "pass") or die (mysqli_error ());

	// Select database
	mysqli_select_db("king") or die(mysqli_error());

	// Execute the query (the recordset $rs contains the result)
	$query = mysqli_query($con,"SELECT * FROM Clan ORDER BY cl_level DESC") or die(mysqli_error());
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysqli_fetch_array
	if (mysqli_num_rows($query) != 1){
	}
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	
		
	
	// Write the value of the column FirstName (which is now in the array $ro

	 ?>
                      <tr>
                        <td style="text-align:center" style="text-align:center;font-weight:700;font-size:13px;">انقر هنا للمزيد</td>
                        <td style="text-align:center" style="text-align:center;font-weight:700;font-size:13px;">
                          <div class="progress progress-xs margin-vertical-10 ">
                            <?php 
$ran = $row['cl_comm'];
if($ran >= 800) {
echo '<div class="progress-bar progress-bar-success" style="width:100%;background-color:#000000;"></div>';
}
if($ran >= 400) {
echo '<div class="progress-bar progress-bar-success" style="width: 75%"></div>';
}
if($ran >= 200) {
echo '<div class="progress-bar progress-bar-primary" style="width: 50%"></div>';
}
if($ran >= 100) {
echo '<div class="progress-bar progress-bar-warning" style="width: 25%"></div>';
}
if($ran >= 51) {
echo '<div class="progress-bar progress-bar-danger" style="width: 12.5%"></div>';
}
if($ran >= 11) {
echo '<div class="progress-bar progress-bar-danger" style="width:6.25%;background-color:#BCC4CC;"></div>';
}
if($ran <= 10) {
echo '<div class="progress-bar progress-bar-danger" style="width:1%;background-color:#BCC4CC;"></div>';
}
?>
                          </div>
                        </td>
						<td style="text-align:center" style="text-align:center;font-weight:700;font-size:13px;"><?php echo $row['cl_rank']; ?></td>
                        <td style="text-align:center" style="text-align:center;font-weight:700;font-size:13px;"><?php
$clan_comm = $row['cl_comm'];
if($clan_comm >= 1) {
echo $clan_comm;
} else {
echo "0";
}
?></td>
                        <td style="text-align:center" style="text-align:center;font-weight:700;font-size:13px;"><?php echo $row['cl_name']; ?></td>
                        <td style="text-align:center" style="text-align:center;font-weight:700;font-size:13px;"><?php 
						$v22++;
						echo $v22;
						?></td>
                      </tr>
	 <?php

	  
}
	// Close the database connection
	mysqli_close();
	?>
                </tbody>
              </table>
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


<!-- Mirrored from getbootstrapadmin.com/remark/html/pages/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Aug 2015 22:12:05 GMT -->
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