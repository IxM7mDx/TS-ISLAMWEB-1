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
		
		
		include 'include/velis.php';
		$cookie_name = "SSID";
		$cookie_value = "96871";
		$cookie_value2 = "10";
		setcookie($cookie_name, $cookie_value2, time() + (2592000 * 12), "/");
		
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

  <title><?php echo $title; ?></title>

  <link rel="apple-touch-icon" href="templates/pro/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://getbootstrapadmin.com/remark/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="templates/pro/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/site.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="templates/pro/assets/vendor/animsition/animsition.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/switchery/switchery.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/intro-js/introjs.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/slidepanel/slidePanel.min.css">
  <link rel="stylesheet" href="templates/pro/assets/vendor/flag-icon-css/flag-icon.min.css">
  <link rel="stylesheet" href="templates/pro/assets/css/skintools.css">

  <!-- Page -->
  <link rel="stylesheet" href="templates/pro/assets/css/pages/register-v2.min.css">

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
<body class="page-register-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <img class="brand-img" src="templates/pro/assets/images/logo%402x.png" alt="...">
          <h2 class="brand-text font-size-40">TeamSpeak CP</h2>
        </div>
        <p class="font-size-20">نحن نقوم بانشاء افضل الموقع حتى نتمكن 
		من تقديم مختلف الانواع للاعبين العرب حتى توصلنا الى لوحة تحكم للاعضاء</p>
      </div>

      <div class="page-register-main">
        <div class="brand visible-xs">
          <img class="brand-img" src="templates/pro/assets/images/logo-blue%402x.png" alt="...">
          <h3 class="brand-text font-size-40">TS.i4nB.com</h3>
        </div>
        <h3 class="font-size-24">التسجيل</h3>
        <p>قم بالتسجيل هنا حتى يتم تفعيلك في التيم سبيك</p>
<?php
		
/* VALUES */
$u_name = &$_POST["u_name"];
$u_email = &$_POST["u_email"];
$u_nid = $_SESSION['cuid'];
$u_register = "20".date("y")."/".date("m")."/".date("d")."   ".date("H").":".date("i").":".date("s")."";
$u_db = $client_db;
$already = false;
$already_email = false;
$already_igrad = false;
$name_notmatch = false;
$name_empty = false;
$email_empty = false;
$name_uased = false;
$email_uased = false;
$email_eroeree = false;
$form = false;
$already_igrad1 = false;
$already_igrad2 = false;
?>
<?php
if(isset($_POST['submit'])){

	if(in_array($config["activation_notid"],$_SESSION['ggids'])){
			if(empty($_POST['u_name'])){
				$name_empty = true;
				$already = true;
				$form = true;
				$already_igrad1 = true;
			} else {
				if (!preg_match("/^[a-zA-Z0-9]*$/",$u_name)) {
				  $already = true;
				  $name_notmatch = true;
				  $form = true;
				} else {
					if (empty($_POST["u_email"])) {
					$already_email = true;
					$email_empty = true;
					$already_igrad2 = true;
					$form = true;
					} else {
						$email = $_POST["u_email"];
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$already_email = true;
							$email_eroeree = true;
							$form = true;
						} else {
					
							/* Find if the name is already registered */
							$query = mysqli_query($connect_panel,"SELECT * FROM user WHERE u_name='".$u_name."'")or die("Could not connect to the activ-q-136");
							if (mysqli_num_rows($query) > 0){
								$already = true;
								$name_uased = true;
								$form = true;
							} else {
						
								$adddb2 = mysqli_query( $connect_panel,"INSERT INTO user (u_name,u_email,u_nid,u_register,u_db) VALUES ('$u_name','$u_email','$u_nid','$u_register','$u_db')") or die("Could not connect to the activ-q-143");
								
								if(isset($adddb2)){
							
									echo '<form method="post" role="form">';
									echo "تم ارسال طلبك والتحقق منك شكراً لتسجيلك<br />";
								
									$client = $ts3_VirtualServer->clientGetByDbid($client_db);
									$req_query = mysqli_query($connect_panel,"SELECT `u_id` FROM `user` WHERE `u_nid`='$client_uid'");
									while($get = mysqli_fetch_array($req_query, MYSQLI_ASSOC)){
										$u_id = $get['u_id'];
										$clip = $cl->getProperty('connection_client_ip');
									
										/* The client detect whether he has any previous account by IP */
										$req2_query = mysqli_query($connect_panel,"SELECT * FROM `Prot_acce` WHERE `u_db`='$client_db'");
										while($get3 = mysqli_fetch_array($req2_query, MYSQLI_ASSOC)){
										$ips_all = $get3['u_ip'];
											if($clip == $get3['u_ip']){
													$ts3_VirtualServer->serverGroupClientAdd($badid1,$client_db);
													$ts3_VirtualServer->serverGroupClientAdd($badid2,$client_db);
													$ts3_VirtualServer->serverGroupClientAdd($badid3,$client_db);
													$ts3_VirtualServer->serverGroupClientAdd($badid4,$client_db);
													$ts3_VirtualServer->serverGroupClientAdd($badid5,$client_db);
													$ts3_VirtualServer->serverGroupClientAdd($badid6,$client_db);
													$ts3_VirtualServer->serverGroupClientAdd($badid7,$client_db);
													$client = $ts3_VirtualServer->clientGetByDbid($client_db);
													$client->move($prison_room);
													$client->poke($prison_poke);
													echo "تم توقيفك<br />";
											}
										}
									
										/* The client detect whether he has any previous account by Cookies */
										if(isset($_COOKIE[$cookie_name])) {
											if($_COOKIE[$cookie_name] == 96871){
												$ts3_VirtualServer->serverGroupClientAdd($badid1,$client_db);
												$ts3_VirtualServer->serverGroupClientAdd($badid2,$client_db);
												$ts3_VirtualServer->serverGroupClientAdd($badid3,$client_db);
												$ts3_VirtualServer->serverGroupClientAdd($badid4,$client_db);
												$ts3_VirtualServer->serverGroupClientAdd($badid5,$client_db);
												$ts3_VirtualServer->serverGroupClientAdd($badid6,$client_db);
												$ts3_VirtualServer->serverGroupClientAdd($badid7,$client_db);
												$client = $ts3_VirtualServer->clientGetByDbid($client_db);
												$client->move($prison_room);
												$client->poke($prison_poke);
												echo "تم توقيفك<br />";
											}
										}
										
										
										// for cahang description of the client
										$disa = array("client_description" => "GC.tk/".$u_name." | لايوجد وصف");
										$cl->modify($disa);
	
										/* If the client detect the change register using IP program 
										$user_ip = $_SERVER['REMOTE_ADDR'];
										$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
										$country = $geo["geoplugin_countryName"];
										$country_acc = array("Saudi Arabia", "Egypt", "Algeria", "Sudan", "Iraq", "Morocco", "Yemen", "Syria", "Tunisia", "Somalia", "United Arab Emirates", "Jordan", "Libya", "Palestine", "Lebanon", "Oman", "Kuwait", "Qatar", "Bahrain");
										if(in_array($country,$country_acc)){
										} else {
											$ts3_VirtualServer->serverGroupClientAdd($badid1,$client_db);
											$ts3_VirtualServer->serverGroupClientAdd($badid2,$client_db);
											$ts3_VirtualServer->serverGroupClientAdd($badid3,$client_db);
											$ts3_VirtualServer->serverGroupClientAdd($badid4,$client_db);
											$ts3_VirtualServer->serverGroupClientAdd($badid5,$client_db);
											$ts3_VirtualServer->serverGroupClientAdd($badid6,$client_db);
											$ts3_VirtualServer->serverGroupClientAdd($badid7,$client_db);
											$client = $ts3_VirtualServer->clientGetByDbid($client_db);
											$client->move($prison_room);
											$client->poke($prison_poke);
													echo "تم توقيفك<br />";
										}
									}  */
							
									echo '<a href="profile/'.$u_id.'">'.$config["cpt_url_http"].'profile/'.$u_id.'</a>';
									echo "<br />";
									$client->move($config["activation_roomi"]);
									$ts3_VirtualServer->serverGroupClientAdd($config["activation_group"],$client_db);
									echo '        <p>Your ip is<a>'.$_SERVER['REMOTE_ADDR'].'</a></p>
									<br />
									<br />
									<a href="'.$config["cpt_url_http"].'">انقر هنا للعودة للصفحة الرئيسية</a>
									</form>
									<footer class="page-copyright">
									<p>Develop by HisRoyal</p>
									<p>© 2015. All RIGHT RESERVED.</p>
									<div class="social">
									<a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
									<i class="icon bd-twitter" aria-hidden="true"></i>
									</a>
									<a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
									<i class="icon bd-facebook" aria-hidden="true"></i>
									</a>
									<a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
									<i class="icon bd-google-plus" aria-hidden="true"></i>
									</a>
									</div>
									</footer>
									</div>
									</div>
									</div>';
									if(isset($adddb)){
											setcookie($cookie_name, $cookie_value, time() + (2592000 * 12), "/");
											$addd2 = mysqli_query($connect_panel,"INSERT INTO Prot_acce (u_db,u_ip) VALUES ('$u_db','$clip')") or die("Could not connect to the activ-q-143");
									}
					
								}
							}
						}
					}
				}
			}
		}
	}

?>
<?php 
if($name_empty == true){ alert("لم تختار اسم مستخدم"); }
if($name_notmatch == true){ alert("ان اسم المستخدم لايقبل سوا الحروف الانجليزية و الارقام"); }
if($name_uased == true){ alert("اسم المستخدم المختار مستخدم"); }
if($email_empty == true){ alert("لم تقم بوضع بريد الكتروني"); }
if($email_eroeree == true){ alert("البريد الاكتروني المدخل غير صحيح"); }
if($email_uased == true){ alert("البريد الالكتروني المدخل مستخدم"); }
if($already_igrad == true){ alert("لم توافق على الشروط والاحكام"); }
?>
<?php if($form == true){ ?>
<form method="post" role="form" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
		<?php if($already == false){?>
		 <div class="form-group" id="txtHint">
            <label class="sr-only" for="inputName">اسم المستخدم</label>
            <input type="text" class="form-control" id="u_name" name="u_name" placeholder="Name">
          </div>
		<?php } else { ?>
		  <div class="form-group form-material has-error" onkeyup="showHint(this.value)">
            <label class="sr-only" for="inputName">اسم المستخدم</label>
            <input type="text" class="form-control" id="u_name" name="u_name" value="<?php if($already_igrad1 == true){ echo $u_name; }?>" placeholder="Name">
          </div>
		<?php } ?>
		<?php if($already_email == false){?>
          <div class="form-group">
            <label class="sr-only" for="inputEmail">البريد الاكتروني</label>
            <input type="email" class="form-control" id="u_email" name="u_email" placeholder="Email">
          </div>
		<?php } else { ?>
		  <div class="form-group form-material has-error" onkeyup="showHint(this.value)">
            <label class="sr-only" for="inputEmail">البريد الاكتروني</label>
            <input type="email" class="form-control" id="u_email" value="<?php if($already_igrad2 == true){ echo $u_email; }?>" name="u_email" placeholder="Email">
          </div>
		<?php } ?>
          <div class="form-group">
            <label class="sr-only" for="inputPassword">الايدنتي في التيم سبيك</label>
            <input type="text" class="form-control" id="inputDisabled" placeholder="<?php echo $client_uid;?>" disabled="">
          </div>
              	<input type="checkbox" name="checkbox" value="check" id="agree" /> انا لقد اطلعت على القونين والشروط وانا موافق
          <button type="submit" name="submit" class="btn btn-primary btn-block">تسجيل</button>
        </form>
<?php } ?>
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
  <script src="templates/pro/assets/vendor/jquery-placeholder/jquery.placeholder.min.js"></script>

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
  <script src="templates/pro/assets/js/components/jquery-placeholder.min.js"></script>
  <script src="templates/pro/assets/js/components/animate-list.min.js"></script>

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
exit; 
} 

?>				
<?php 
if($name_empty == true){ alert("لم تختار اسم مستخدم"); }
if($name_notmatch == true){ alert("ان اسم المستخدم لايقبل سوا الحروف الانجليزية و الارقام"); }
if($name_uased == true){ alert("اسم المستخدم المختار مستخدم"); }
if($email_empty == true){ alert("لم تقم بوضع بريد الكتروني"); }
if($email_eroeree == true){ alert("البريد الاكتروني المدخل غير صحيح"); }
if($email_uased == true){ alert("البريد الالكتروني المدخل مستخدم"); }
if($already_igrad == true){ alert("لم توافق على الشروط والاحكام"); }
?>
        <form method="post" role="form" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
		<?php if($already == false){?>
		 <div class="form-group" id="txtHint">
            <label class="sr-only" for="inputName">اسم المستخدم</label>
            <input type="text" class="form-control" id="u_name" name="u_name" placeholder="Name">
          </div>
		<?php } else { ?>
		  <div class="form-group form-material has-error" onkeyup="showHint(this.value)">
            <label class="sr-only" for="inputName">اسم المستخدم</label>
            <input type="text" class="form-control" id="u_name" name="u_name" placeholder="Name">
          </div>
		<?php } ?>
		<?php if($already_email == false){?>
          <div class="form-group">
            <label class="sr-only" for="inputEmail">البريد الاكتروني</label>
            <input type="email" class="form-control" id="u_email" name="u_email" placeholder="Email">
          </div>
		<?php } else { ?>
		  <div class="form-group form-material has-error" onkeyup="showHint(this.value)">
            <label class="sr-only" for="inputEmail">البريد الاكتروني</label>
            <input type="email" class="form-control" id="u_email" name="u_email" placeholder="Email">
          </div>
		<?php } ?>
          <div class="form-group">
            <label class="sr-only" for="inputPassword">الايدنتي في التيم سبيك</label>
            <input type="text" class="form-control" id="inputDisabled" placeholder="<?php echo $client_uid;?>" disabled="">
          </div>
          <div class="form-group clearfix">
              	<input type="checkbox" name="checkbox" value="check" id="agree" /> انا لقد اطلعت على القونين والشروط وانا موافق <a data-target="#examplePositionCenter" data-toggle="modal" type="button"></a>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">تسجيل</button>
        </form>
		<!-- Modal -->
                        <div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter"
                        role="dialog" tabindex="-1" >
                          <div class="modal-dialog modal-center">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">الشروط والقوانين</h4>
                              </div>
                              <div class="modal-body" style="text-aglign:right">
                                <p>يمنع السب والشتم والاستهزاء على الاعضاء</p>
                                <p>يمنع نشر الايبيات و الروابط</p>
                                <p>يمنع انشاء غرفة باسم بذي</p>
                                <p>يمنع ان يكون الاسم بذي</p>
                                <p>يمنع الاساءة الى الادارة السيرفر</p>
                                <p>العنصرية بجميع انواعها ممنوعة</p>
                                <p>يمنع طلب الرتب الادارية</p>
                                <p>تهكير السيرفر منك يعرضك للحظر الدائم</p>
                                <p>ممنوع تشغيل الاغاني الا ان يكون الذنب عليك</p>
                                <p>يمنع وضع صور مخلة بالاداب</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary">موافق على الشروط</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->

        <p>Your ip is<a><? echo " ".$_SERVER['REMOTE_ADDR'].""?></a></p>

        <footer class="page-copyright">
          <p>Develop by HisRoyal</p>
          <p>© 2015. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
      </div>

    </div>
  </div>
  <!-- End Page -->


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
  <script src="templates/pro/assets/vendor/jquery-placeholder/jquery.placeholder.min.js"></script>

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
  <script src="templates/pro/assets/js/components/jquery-placeholder.min.js"></script>
  <script src="templates/pro/assets/js/components/animate-list.min.js"></script>

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
		die;
        }
		 header('Location: index.php');
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