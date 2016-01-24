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
        if(in_array(78,$_SESSION['ggids'])){
        header('Location: activated.php');
        }
		$verified++;
		
		include 'include/velis.php';
		
		?>

<?php
if(isset($_GET['id'])){
	$u_id = intval($_GET['id']);
	$query = mysqli_query($connect_panel,"SELECT * FROM user WHERE u_id='".$u_id."'")or die("");
	
	if (mysqli_num_rows($query) != 1){
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

  <title><?php echo $lang["page_title"];?> | erroe - خطاً</title>

  <link rel="apple-touch-icon" href="../templates/pro/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://getbootstrapadmin.com/remark/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../templates/pro/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/css/site.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="../templates/pro/assets/vendor/animsition/animsition.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/switchery/switchery.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/intro-js/introjs.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/slidepanel/slidePanel.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/flag-icon-css/flag-icon.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/css/skintools.css">

  <!-- Page -->
  <link rel="stylesheet" href="../templates/pro/assets/css/pages/errors.min.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="../templates/pro/assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700'>

  <!--[if lt IE 9]>
    <script src="../templates/pro/assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../templates/pro/assets/vendor/media-match/media.match.min.js"></script>
    <script src="../templates/pro/assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../templates/pro/assets/vendor/modernizr/modernizr.min.js"></script>
  <script src="../templates/pro/assets/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-error page-error-404 layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <header>
        <h1 class="animation-slide-top">998</h1>
        <p>هناك خطاً</p>
      </header>
      <a class="btn btn-primary btn-round" href="../index.html">الرجوع الى صفحة الرئيسية</a>

      <footer class="page-copyright">
        <p>WEBSITE BY amazingSurge</p>
        <p>© 2015. All RIGHT RESERVED.</p>
        <div class="social">
          <a href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-dribbble" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="../templates/pro/assets/vendor/jquery/jquery.min.js"></script>
  <script src="../templates/pro/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../templates/pro/assets/vendor/animsition/jquery.animsition.min.js"></script>
  <script src="../templates/pro/assets/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="../templates/pro/assets/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="../templates/pro/assets/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="../templates/pro/assets/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="../templates/pro/assets/vendor/switchery/switchery.min.js"></script>
  <script src="../templates/pro/assets/vendor/intro-js/intro.min.js"></script>
  <script src="../templates/pro/assets/vendor/screenfull/screenfull.js"></script>
  <script src="../templates/pro/assets/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Scripts -->
  <script src="../templates/pro/assets/js/core.min.js"></script>
  <script src="../templates/pro/assets/js/site.min.js"></script>

  <script src="../templates/pro/assets/js/sections/menu.min.js"></script>
  <script src="../templates/pro/assets/js/sections/menubar.min.js"></script>
  <script src="../templates/pro/assets/js/sections/sidebar.min.js"></script>
  <script src="../templates/pro/assets/js/sections/skintools.min.js"></script>

  <script src="../templates/pro/assets/js/configs/config-colors.min.js"></script>
  <script src="../templates/pro/assets/js/configs/config-tour.min.js"></script>

  <script src="../templates/pro/assets/js/components/asscrollable.min.js"></script>
  <script src="../templates/pro/assets/js/components/animsition.min.js"></script>
  <script src="../templates/pro/assets/js/components/slidepanel.min.js"></script>
  <script src="../templates/pro/assets/js/components/switchery.min.js"></script>


  <!-- Scripts For This Page -->


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../../../../www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>


</html>
<?php
	}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	$c_id = $row['u_id'];
	$c_nid = $row['u_nid'];
	$c_ret = $row['u_register'];
	$c_name = $row['u_name'];
	$c_db = $row['u_db'];
	?>
<html class="no-js before-run" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title><?php echo $lang["page_title"];?> | Profile - الملف الشخصي</title>

  <link rel="apple-touch-icon" href="../templates/pro/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://getbootstrapadmin.com/remark/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../templates/pro/assets/css/bootstrap-ar.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/css/bootstrap-extend-ar.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/css/site-ar.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="../templates/pro/assets/vendor/animsition/animsition.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/switchery/switchery.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/intro-js/introjs.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/slidepanel/slidePanel.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/vendor/flag-icon-css/flag-icon.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/css/skintools.css">

  <!-- Page -->
  <link rel="stylesheet" href="../templates/pro/assets/css/pages/profile.min.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="../templates/pro/assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../templates/pro/assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700'>

  <!--[if lt IE 9]>
    <script src="../templates/pro/assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../templates/pro/assets/vendor/media-match/media.match.min.js"></script>
    <script src="../templates/pro/assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../templates/pro/assets/vendor/modernizr/modernizr.min.js"></script>
  <script src="../templates/pro/assets/vendor/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-profile">
<?php include 'include/header-ar.php'; ?>
  <div class="page animsition">
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Page Widget -->
          <div class="widget widget-shadow text-center">
            <div class="widget-header">
              <div class="widget-header-content">
                <a class="avatar avatar-lg" href="javascript:void(0)">
                </a>
                <h4 class="profile-user">[<?php echo $c_db;?>] <?php echo $c_name;?> <p class="wb-small-point" style="color: rgb<?php 
				$onlineor = 0;
				$isonline = mysqli_query($connect_rank,"SELECT * FROM `user` WHERE `cldbid`='$c_db'") or die(mysqli_error());
				while($row31432 = mysqli_fetch_array($isonline, MYSQLI_ASSOC)){
				$onlineor = $row31432['online'];
				$userlive = $row31432['grpid'];
				}
				if($onlineor == 1){
				echo '(3, 230, 3)';
				} else {
				echo '(230, 3, 3)';
				}
				?>;"></p></h4>
                <p class="profile-job"><?php echo $c_ret;?></p>
                <p class="profile-job"><?php echo $c_nid;?></p>
                <p class="profile-job"><?php echo $userlive;?></p>
				<?php 
				$ishavedesf = 0;
				$ishavedes = mysqli_query($connect_panel,"SELECT `u_des` FROM `user` WHERE `u_db`='$c_db'") or die(mysqli_error());
				while($row2345 = mysqli_fetch_array($ishavedes, MYSQLI_ASSOC)){
				$ishavedesf = $row2345['u_des'];
				}
				if($ishavedesf == 1){
				$thedesquer = mysqli_query($connect_panel,"SELECT `u_text` FROM `userDescription` WHERE `u_db`='$c_db'") or die(mysqli_error());
				while($row24321 = mysqli_fetch_array($ishavedes, MYSQLI_ASSOC)){
				$thedesdb = $row24321['u_text'];
				}
				echo $thedesdb;
				  }
				if($ishavedesf == 0){
					if($client_uid != $c_nid){
						echo 'لايوجد وصف';
						echo '<br />';
					}
				}
			    if($client_uid == $c_nid){
				
				}
				  ?>
				 <?php 
				$socialquery = mysqli_query($connect_panel,"SELECT `u_soc` FROM `user` WHERE `u_db`='$c_db'") or die(mysqli_error());
				while($row63345 = mysqli_fetch_array($socialquery, MYSQLI_ASSOC)){
				$socialget = $row63345['u_soc'];
				}
				if($socialget == 1){
				echo '<div class="profile-social">';
				$socialiquery = mysqli_query($connect_panel,"SELECT * FROM `usersocial` WHERE `u_db`='$c_db'") or die(mysqli_error());
				while($row21346 = mysqli_fetch_array($socialiquery, MYSQLI_ASSOC)){
				$socialgett = $row21346['u_twi'];
				$socialgety = $row21346['u_you'];
				$socialgets = $row21346['u_sib'];
				}
					// twitter
					if($socialgett >= 1){
						echo "<a class='icon bd-twitter' href='javascript:void(0)'>https://twitter.com/".$socialgett."</a>";
					}
					// youtube ?
					if($socialgety >= 1){
						echo "<a class='icon bd-youtube' href='javascript:void(0)'>https://youtube.com/".$socialgety."</a>";
					}
					// snpchat ×
					if($socialgets >= 1){
						echo "<a class='icon bd-snpchat' href='javascript:void(0)'>".$socialgets."</a>";
					}
                echo '</div>';
				} else {
				
				}
				 ?>
<?php if($client_uid != $c_nid){
		
				 $check_frnd_query = mysqli_query($connect_panel,"SELECT id FROM frin WHERE (user_one='$client_db' AND user_two='$c_db') OR (user_one='$c_db' AND user_two='$client_db')");
			   	 
				 if(mysqli_num_rows($check_frnd_query) == 1) {
				 
					echo "<a class'box'>Already Frind</a> | <a href='../actions.php?actions=removefriend&id=$c_db&to=$c_id' class'box'>remove ".$c_name." from frind </a>";
				 
				 } else {
				 
					 $from_frnd_query = mysqli_query($connect_panel,"SELECT `id` FROM `frin_req` WHERE `from`='$c_db' AND `to`='$client_db'");
					 $to_frnd_query = mysqli_query($connect_panel,"SELECT `id` FROM `frin_req` WHERE `from`='$client_db' AND `to`='$c_db'");
					 
					 if(mysqli_num_rows($from_frnd_query) == 1) {
						echo "<a href='#' class='btn btn-primary'>Ignore</a> | <a href='../actions.php?actions=accept&id=$c_db&to=$c_id' class='btn btn-primary'>Accept</a>";
					 } else if(mysqli_num_rows($to_frnd_query) == 1){
						echo "<a href='../actions.php?actions=cancel&id=$c_db&to=$c_id' class='btn btn-primary'>Cancel Request</a>";
					 } else {
						echo "<a href='../actions.php?actions=send&id=$c_db&to=$c_id' class='btn btn-primary'>Send Frinde Request</a>";
					 }
					 
				 
				 }
		} else {
		echo '<a href="#" class="btn btn-primary">تعديل البيانات</a>';
		}
		?>
              </div>
            </div>
            <div class="widget-footer">
              <div class="row no-space">
                <div class="col-xs-4">
				<?php 
				$cofrin2 = 0;
				$req_query = mysqli_query($connect_panel,"SELECT p_from FROM `post` WHERE `p_from`='$c_db'") or die(mysqli_error());
				$carfr1 = mysqli_query($connect_panel,"SELECT * FROM `frin` WHERE (`user_one`='$c_db') OR (`user_two`='$c_db')") or die(mysqli_error());
				while($row3 = mysqli_fetch_array($carfr1, MYSQLI_ASSOC)){
				$cofrin = count($row3['user_one'],$cofrin2++);
				}
				?>
                  <strong class="profile-stat-count"><?php echo $cofrin2; ?></strong>
                  <span>صديق</span>
                </div>
                <div class="col-xs-4">
                  <strong class="profile-stat-count">soon</strong>
                  <span>اعجاب</span>
                </div>
                <div class="col-xs-4">
				<?php 
				$copost1 = 0;
				$req_query = mysqli_query($connect_panel,"SELECT p_from FROM `post` WHERE `p_from`='$c_db'") or die(mysqli_error());
				while($row1 = mysqli_fetch_array($req_query, MYSQLI_ASSOC)){
				$copost = count($row1['p_from'],$copost1++);
				}
				?>
                  <strong class="profile-stat-count"><?php echo $copost1;?></strong>
                  <span>نشرة</span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Page Widget -->
        </div>

        <div class="col-md-9">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body nav-tabs-animate">
              <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
                <li class="active" role="presentation">
				<a data-toggle="tab" href="#activities" aria-controls="activities" role="tab">المنشورات</a>
				  </li>
				  <li role="presentation" class=""><a data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-expanded="false">الاصدقاء</a></li>
              </ul>
						<?php if($client_uid == $c_nid){?>
							  <form method="POST" role="form">
                              <div class="modal-body">
                                <textarea class="form-control" name="post" id="post" rows="5" data-fv-field="standard_content"></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                <button type="submit" name="submit" onclick="myFunction()" class="btn btn-primary">ارسل</button>
                              </div>
							  </form>
							  							  <?php 
							  if(isset($_POST['submit'])){
							  if(empty($_POST['post'])){
							  } else {
							  $p_from = $client_db;
							  $p_text = $_POST['post'];
							  $dateh = date("H",strtotime("+1 hours"));
							  if($dateh >= "13"){
							  $datehnow = date("H",strtotime("-12 hours"));
							  } else {
							  $datehnow = date("H");
							  }
							  if($dateh >= "13"){
							  $thedam = "pm";
							  } else {
							  $thedam = "am";
							  }
							  $p_date = "20".date("y").",".date("m").",".date("d")." - ".$datehnow.":".date("i").":".date("s")."".$thedam."";
							  $adddb = mysqli_query($connect_panel,"INSERT INTO post (p_from,p_text,p_date) VALUES ('$p_from','$p_text','$p_date')") or die(mysqli_error());
							  }
							  } 
							  } ?>
							  
							  
<?php /* if($client_uid != $c_nid){
							  echo '<form method="POST" role="form">
                              <div class="modal-body">
                                <textarea class="form-control" name="post" id="post" rows="5" data-fv-field="standard_content"></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                <button type="send" name="send" onclick="myFunction()" class="btn btn-primary">ارسل</button>
                              </div>
							  </form>';
							  							 
							  if(isset($_POST['send'])){
							  if(empty($_POST['post'])){
							  } else {
							  $p_from = $client_db;
							  $p_text = $_POST['post'];
							  $dateh = date("H",strtotime("+1 hours"));
							  if($dateh >= "13"){
							  $datehnow = date("H",strtotime("-12 hours"));
							  } else {
							  $datehnow = date("H");
							  }
							  if($dateh >= "13"){
							  $thedam = "pm";
							  } else {
							  $thedam = "am";
							  }
							  $p_date = "20".date("y").",".date("m").",".date("d")." - ".$datehnow.":".date("i").":".date("s")."".$thedam."";
							  $adddb = mysqli_query("INSERT INTO post (p_from,p_text,p_date) VALUES ('$p_from','$p_text','$p_date')", $connect_panel) or die(mysqli_error());
							  }
							  } 
						 } */?>
              <div class="tab-content">
                <div class="tab-pane active animation-slide-left" id="activities" role="tabpanel">
                  <ul class="list-group">
<?php
$req_query = mysqli_query($connect_panel,"SELECT * FROM `post` WHERE `p_from`='$c_db'") or die(mysqli_error());


?>
<?php
while($row1 = mysqli_fetch_array($req_query, MYSQLI_ASSOC)){
	$p_from = $row1['p_from'];
	$p_date = $row1['p_date'];
	$p_text = $row1['p_text'];

	$get_query = mysqli_query($connect_panel,"SELECT * FROM user WHERE u_db='$p_from'")or die(mysqli_error());
	while($row = mysqli_fetch_array($get_query, MYSQLI_ASSOC)){
		$us_name = $row['u_name'];
		echo '
						                    <li class="list-group-item">
                      <div class="media">
                        <div class="media-left">
                          <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="../templates/pro/assets/portraits/3.jpg"
                            alt="...">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading">'.$us_name.'
                          </h4>
                          <small>'.$p_date.'</small>
                          <div class="profile-brief">'.$p_text.'</div>
                        </div>
                      </div>
                    </li>';					
}
}
?>
			  <?php
if($copost1 == "0"){
if($client_uid != $c_nid){
echo "<a style='text-align:right;'>لاتوجد اي مشاركة</a>";
} else {
echo "<a style='text-align:right;'>لم تقم حتى الان باي مشاركة</a>";
}
}
?>
                  </ul>
                </div>
              <div class="tab-pane animation-slide-left active" id="profile" role="tabpanel">
                  <ul class="list-group">
<?php 
$kikic = mysqli_query($connect_panel,"SELECT * FROM `frin` WHERE (`user_one`='$c_db') OR (`user_two`='$c_db')") or die(mysqli_error());

while($rowko = mysqli_fetch_array($kikic, MYSQLI_ASSOC)){
if($rowko['user_one'] != $c_db){
$ckjn = $rowko['user_one'];
} else {
$ckjn = $rowko['user_two'];
}

$kikic33 = mysqli_query($connect_panel,"SELECT * FROM `user` WHERE `u_db`=$ckjn") or die(mysqli_error());
while($rowko5 = mysqli_fetch_array($kikic33, MYSQLI_ASSOC)){
$ckjn3 = $rowko5['u_name'];
$ck4jn3 = $rowko5['u_id'];

echo '
				  <li class="list-group-item">
                    <div class="media">
                      <div class="media-left">
                        <div class="avatar avatar-online">
                          <img src="../templates/pro/assets/portraits/1.jpg" alt="...">
                        </div>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">
                          <a href="'.$config["web_url_http"].'profile/'.$ck4jn3.'">'.$ckjn3.'</a>
						  ';
						  
						if($c_db == $client_db){
						  echo '
						 <small><a href="'.$config["web_url_http"].'actions.php?actions=removefriend&id='.$ck4jn3.'&to='.$c_id.'" class"box">remove</a></small>
                        ';
						} else {
						
						}
						
						echo '
						</h4>
                      </div>
                    </div>
                  </li>
				  ';
				  }
}
?>
                 </ul>
                </div>
			  </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
  </div>
  <?php include 'include/footer.php'; ?>
    <!-- Core  -->
  <script src="../templates/pro/assets/vendor/jquery/jquery.min.js"></script>
  <script src="../templates/pro/assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../templates/pro/assets/vendor/animsition/jquery.animsition.min.js"></script>
  <script src="../templates/pro/assets/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="../templates/pro/assets/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="../templates/pro/assets/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="../templates/pro/assets/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="../templates/pro/assets/vendor/switchery/switchery.min.js"></script>
  <script src="../templates/pro/assets/vendor/intro-js/intro.min.js"></script>
  <script src="../templates/pro/assets/vendor/screenfull/screenfull.js"></script>
  <script src="../templates/pro/assets/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Scripts -->
  <script src="../templates/pro/assets/js/core.min.js"></script>
  <script src="../templates/pro/assets/js/site.min.js"></script>

  <script src="../templates/pro/assets/js/sections/menu.min.js"></script>
  <script src="../templates/pro/assets/js/sections/menubar.min.js"></script>
  <script src="../templates/pro/assets/js/sections/sidebar.min.js"></script>
  <script src="../templates/pro/assets/js/sections/skintools.min.js"></script>

  <script src="../templates/pro/assets/js/configs/config-colors.min.js"></script>
  <script src="../templates/pro/assets/js/configs/config-tour.min.js"></script>

  <script src="../templates/pro/assets/js/components/asscrollable.min.js"></script>
  <script src="../templates/pro/assets/js/components/animsition.min.js"></script>
  <script src="../templates/pro/assets/js/components/slidepanel.min.js"></script>
  <script src="../templates/pro/assets/js/components/switchery.min.js"></script>


  <!-- Scripts For This Page -->


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
</body>

</html>

	<?php
	}
 
	?>
	<?php
	
	} else die ('<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>'.$lang["page_title"].' | thename - الاسم?></title>
  <link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="assets1/css/site.min.css">
  <link rel="stylesheet" href="assets1/css/main.css">
</head>
<body>

  <div class="vertical_center" >
    <div class="profile_widget" >
      <div class="pw_info" >
        <h1>لابد من ادخال اسم مستخدم</h1>
        <div class="pw_tag" >
          <img src="assets1/img/tag.png" alt="" />
        </div><!-- /.pw_tag -->
      </div><!-- /.pw_info -->
    </div><!-- /.profile_widget -->
  </div><!-- /.vertical_center --> 
  
</body>
</html>');
?>

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