<!DOCTYPE html>
<html class="no-js before-run" lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title><?php echo htmlspecialchars($cl->client_nickname); ?> | Dashboard</title>

  <link rel="apple-touch-icon" href="../../templates/pro/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="http://getbootstrapadmin.com/remark/assets/images/favicon.ico">
<?php
session_start();
header('Cache-control: private'); // IE 6 FIX
 
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 
// register the session and set the cookie
$_SESSION['lang'] = $lang;
 
setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'ar';
}
 
switch ($lang) {
  case 'ar':
  $lang_file = 'lang.ar.php';
   echo '
 <link rel="stylesheet" href="../../templates/pro/assets/css/bootstrap-ar.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/bootstrap-extend-ar.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/site-ar.min.css">
 ';
  break;
 
  case 'en':
  $lang_file = 'lang.en.php';
   echo '
 <link rel="stylesheet" href="../../templates/pro/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/site.min.css">
 ';
  break;
 
  default:
  $lang_file = 'lang.ar.php';
 echo '
 <link rel="stylesheet" href="../../templates/pro/assets/css/bootstrap-ar.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/bootstrap-extend-ar.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/site-ar.min.css">
 ';
}
 
include_once 'languages/'.$lang_file;
?>
  <!-- Plugins -->
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/animsition/animsition.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/asscrollable/asScrollable.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/switchery/switchery.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/intro-js/introjs.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/slidepanel/slidePanel.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/flag-icon-css/flag-icon.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/css/skintools.css">

  <!-- Plugins For This Page -->
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/chartist-js/chartist.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/vendor/aspieprogress/asPieProgress.min.css">

  <!-- Page -->
  <link rel="stylesheet" href="../../templates/pro/assets/css/dashboard/v2.min.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="../../templates/pro/assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="../../templates/pro/assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700'>

  <!-- Scripts -->
  <script src="../../templates/pro/assets/vendor/modernizr/modernizr.min.js"></script>
  <script src="../../templates/pro/assets/vendor/breakpoints/breakpoints.min.js"></script>
  