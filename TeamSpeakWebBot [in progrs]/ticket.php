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
	  <link rel="stylesheet" href="templates/pro/assets/vendor/select2/select2.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-select/bootstrap-select.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/icheck/icheck.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/switchery/switchery.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/asrange/asRange.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/asspinner/asSpinner.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/clockpicker/clockpicker.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/ascolorpicker/asColorPicker.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-touchspin/bootstrap-touchspin.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/card/card.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/jquery-labelauty/jquery-labelauty.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/jt-timepicker/jquery-timepicker.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/jquery-strength/jquery-strength.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/multi-select/multi-select.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/typeahead-js/typeahead.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/formvalidation/formValidation.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-sweetalert/sweet-alert.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/toastr/toastr.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/summernote/summernote.min.css">
	  
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
<?php
if(isset($_GET['tasks'])){
	$tasks = $_GET['tasks'];
if($tasks == "admin"){

?>
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
	  <div class="page-header">
        <ol class="breadcrumb">
          <li><a style="text-align: left;" href="../index.html">الادارة</a></li>
          <li><a style="text-align: left;" href="javascript:void(0)">الدعم</a></li>
          <li style="text-align: left;" class="active">الرئيسية</li>
        </ol>
		<h1 class="page-title" style="text-align: right;">ادارة الشكاوي</h1>
      </div>
    <div class="page-content">
	<div class="panel">
        <div class="panel-body">
          <!-- Example Responsive -->
          <div class="example-wrap">
            <h4 class="example-title" style="text-align: right;">تعميم</h4>
            <p style="text-align: right;">نرجوا التحدث مع العملاء بافضل طريقة</p>
            <div class="example">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
				   	  <th style="text-align: right;"></th>
                      <th style="text-align: right;">الحالة</th>
					  <th style="text-align: right;">تاريخ الرفع</th>
					  <th style="text-align: right;">نص الشكوى</th>
					  <th style="text-align: right;">موضوع الشكوى</th>
					  <th style="text-align: right;">العميل</th>
					  <th style="text-align: right;">رقم التذكرة</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
	// Execute the query (the recordset $rs contains the result)
	$query = mysqli_query($connect_panel,"SELECT * FROM complaint") or die(mysqli_error());
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	if (mysqli_num_rows($query) != 1){
}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	 ?>
                    <tr>
					  <td><a src="" class="btn btn-block btn-info" href="<?php echo "ticket.php?tasks=admin&eid=".$row['c_byuuid'];?>">انقر هنا للمزيد</a></td>
                      <td>
						<?php if($row['c_status'] == "0") {?>
                        <div class="label label-table label-success" style="float:right;">مفتوحة</div>
						<?php }?>
						<?php if($row['c_status'] == "1") {?>
                        <div class="label label-warning" style="float:right;">انتظار رد العميل</div>
						<?php }?>
						<?php if($row['c_status'] == "2") {?>
                        <div class="label label-table label-info" style="float:right;">انتظار رد الادارة</div>
						<?php }?>
						<?php if($row['c_status'] == "3") {?>
                        <div class="label label-danger" style="float:right;">مقفلة</div>
						<?php }?>
						<?php if($row['c_status'] == "4") {?>
                        <div class="label label-default" style="float:right;">ألغيت</div>
						<?php }?>
                      </td>
					  <td>
                        <span class="text-muted" style="float:right;"><?php echo $row['c_date']; ?>  <i class="wb wb-time"></i></span>
                      </td>
                      <td style="text-align: right;">...<?php $small = substr($row['text_complaint'], 0, 8); echo $small;?></td>
					  <td style="text-align: right;"><?php echo $row['subject_complaint']; ?></td>
                      <td style="text-align: right;"><?php echo $row['c_byuuid']; ?></td>
                      <td style="text-align: right;"><a href="javascript:void(0)">Complaint #<?php echo $row['c_id']; ?></a></td>
                    </tr>
	 <?php

	  }

	?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Example Responsive -->

          <!-- Example Contextual Classes -->
          
          <!-- End Example Contextual Classes -->
        </div>
    </div>
</div>
    <div class="page-header">
      <h1 class="page-title" style="text-align: right;">ادارة الاقتراحات</h1>
    </div>
    <div class="page-content">
	<div class="panel">
        <div class="panel-body">
          <!-- Example Responsive -->
          <div class="example-wrap">
            <h4 class="example-title" style="text-align: right;">تعميم</h4>
            <p style="text-align: right;">نرجوا التحدث مع العملاء بافضل طريقة</p>
            <div class="example">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
				   	  <th style="text-align: right;"></th>
                      <th style="text-align: right;">الحالة</th>
					  <th style="text-align: right;">تاريخ الرفع</th>
					  <th style="text-align: right;">نص الشكوى</th>
					  <th style="text-align: right;">موضوع الشكوى</th>
					  <th style="text-align: right;">العميل</th>
					  <th style="text-align: right;">رقم التذكرة</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
	// Execute the query (the recordset $rs contains the result)
	$query = mysqli_query($connect_panel,"SELECT * FROM suggestions") or die(mysqli_error());
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	if (mysqli_num_rows($query) != 1){
}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	 ?>
                    <tr>
					  <td><a src="" class="btn btn-block btn-info">انقر هنا للمزيد</a></td>
					  <td>
						<?php if($row['s_status'] == "0") {?>
                        <div class="label label-table label-success" style="float:right;">مفتوحة</div>
						<?php }?>
						<?php if($row['s_status'] == "1") {?>
                        <div class="label label-warning" style="float:right;">انتظار رد العميل</div>
						<?php }?>
						<?php if($row['s_status'] == "2") {?>
                        <div class="label label-table label-info" style="float:right;">انتظار رد الادارة</div>
						<?php }?>
						<?php if($row['s_status'] == "3") {?>
                        <div class="label label-danger" style="float:right;">مقفلة</div>
						<?php }?>
						<?php if($row['s_status'] == "4") {?>
                        <div class="label label-default" style="float:right;">ألغيت</div>
						<?php }?>
                      </td>
					  <td>
                        <span class="text-muted" style="float:right;"><?php echo $row['s_date']; ?>  <i class="wb wb-time"></i></span>
                      </td>
                      <td style="text-align: right;">...<?php $small = substr($row['text_suggestions'], 0, 8); echo $small;?></td>
					  <td style="text-align: right;"><?php echo $row['subject_suggestions']; ?></td>
                      <td style="text-align: right;"><?php echo $row['s_byuuid']; ?></td>
                      <td style="text-align: right;"><a href="javascript:void(0)">Suggestions #<?php echo $row['s_id']; ?></a></td>
                    </tr>
	 <?php

	  }

	// Close the database connection
	mysqli_close();
	?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- End Example Responsive -->

          <!-- Example Contextual Classes -->
          
          <!-- End Example Contextual Classes -->
        </div>
    </div>
</div>
</div>
<?php
}
}
?>
<?php
if(isset($_GET['tasks'])){
	$tasks = $_GET['tasks'];
if($tasks == "suggestions"){

?>
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
    <div class="page-header">
        <ol class="breadcrumb">
          <li><a style="text-align: left;" href="../index.html">فتح تذكرة</a></li>
          <li><a style="text-align: left;" href="javascript:void(0)">الدعم</a></li>
          <li style="text-align: left;" class="active">الرئيسية</li>
        </ol>
        <h1 class="page-title" style="text-align: right;">ارسال تذكرة اقتراح</h1>
      </div>
    <div class="page-content container-fluid">
      <div class="row">
        

        
		  <?php

$s_byuuid = $_SESSION['cuid'];
$subject_suggestions = &$_POST["subject_suggestions"];
$text_suggestions = &$_POST["text_suggestions"];
$s_date = "20".date("y")."/".date("m")."/".date("d")."   ".date("H",strtotime("+1 hours")).":".date("i").":".date("s")."";
?>
        <div class="col-lg-12">
          <!-- Panel Examples -->
           <!-- Panel Air Mode -->
		   <form action="" method="POST">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align:right;">ارسل تذكرة اقتراح</h3>
            </div>
            <div class="panel-body">
			<?php
if(isset($_POST['submit'])){

	if(empty($_POST['subject_suggestions'])){
		echo '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" style="
    text-align: center;
">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-close" aria-hidden="true"></i> يجب ان يكون هناك موضوع
                </div>';
	} else {
	$pattern="[زوةىرؤءئشسيبلاتنمكطدجحخهعغفقثصض0-9_\-]";
	if (!preg_match("~^[a-z\-'\s\p{Arabic}]{1,60}$~iu", $subject_suggestions)) {
		echo '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" style="
    text-align: center;
">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-close" aria-hidden="true"></i> لايتم قبول نص يحتوي على غير اللغة العربية او اللغة الانجلزية او الارقام
                </div>'; 
	} else {
	
	if(empty($_POST['text_suggestions'])){
		echo '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" style="
    text-align: center;
">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-close" aria-hidden="true"></i> يجب ان يكون هناك نص
                </div>';
	} else {
	
		$addcp = mysqli_query($connect_panel,"INSERT INTO suggestions (s_byuuid,subject_suggestions,text_suggestions,s_date,s_status) VALUES ('$s_byuuid','$subject_suggestions','$text_suggestions','$s_date','0')") or die(mysqli_error());
		
			if(isset($addcp)){
				echo '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert" style="text-align:center;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-check" aria-hidden="true"></i> تم ارسال الاقتراح
                </div>';
				exit;
			}
			
	  }
	
	}
}
}
?>
			<div class="">
                <h4 class="example-title" style="text-align:right;margin-top:20px">موضوع الاقتراح</h4>
              <input type="text" class="form-control" style="text-align:center;" name="subject_suggestions" id="subject_suggestions" placeholder="موضوع الاقتراح">
			</div>
			<div class="example-wrap">
                <h4 class="example-title" style="text-align:right;margin-top:20px">نص الاقتراح</h4>
              <textarea class="form-control" name="text_suggestions" id="text_suggestions" style="text-align:right;" rows="3" placeholder="نص الاقتراح"></textarea>
             </div>
            </div>
          </div>  
          <!-- End Panel Air Mode -->
        </div>
      </div>
	  <div class="panel">
            <div class="panel-body">
              <p>
                <button class="btn btn-outline btn-primary" type="submit" name="submit">ارسال</button>
              </p>
            </div>
          </div>
		  </form>
    </div>
  </div>

<?php
}
}
?>
<?php
if(isset($_GET['tasks'])){
	$tasks = $_GET['tasks'];
if($tasks == "complaints"){

?>
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
    <div class="page-header">
        <ol class="breadcrumb">
          <li><a style="text-align: left;" href="../index.html">فتح تذكرة</a></li>
          <li><a style="text-align: left;" href="javascript:void(0)">الدعم</a></li>
          <li style="text-align: left;" class="active">الرئيسية</li>
        </ol>
        <h1 class="page-title" style="text-align: right;">ارسال شكوى</h1>
      </div>
    <div class="page-content container-fluid">
      <div class="row">
        

        
		  <?php

$s_byuuid = $_SESSION['cuid'];
$subject_complaint = &$_POST["subject_complaint"];
$text_complaint = &$_POST["text_complaint"];
$s_date = "20".date("y")."/".date("m")."/".date("d")."   ".date("H",strtotime("+1 hours")).":".date("i").":".date("s")."";
?>
        <div class="col-lg-12">
          <!-- Panel Examples -->
           <!-- Panel Air Mode -->
		   <form action="" method="POST">
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title" style="text-align:right;">ارسل تذكرة شكوى</h3>
            </div>
            <div class="panel-body">
			<?php
if(isset($_POST['submit'])){

	if(empty($_POST['subject_complaint'])){
		echo '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" style="
    text-align: center;
">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-close" aria-hidden="true"></i> يجب ان يكون هناك موضوع
                </div>';
	} else {
	$pattern="[زوةىرؤءئشسيبلاتنمكطدجحخهعغفقثصض0-9_\-]";
	if (!preg_match("~^[a-z\-'\s\p{Arabic}]{1,60}$~iu", $subject_complaint)) {
		echo '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" style="
    text-align: center;
">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-close" aria-hidden="true"></i> لايتم قبول نص يحتوي على غير اللغة العربية او اللغة الانجلزية او الارقام
                </div>'; 
	} else {
	
	if(empty($_POST['text_complaint'])){
		echo '<div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" style="
    text-align: center;
">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-close" aria-hidden="true"></i> يجب ان يكون هناك نص
                </div>';
	} else {
	
		$addcp = mysqli_query($connect_panel,"INSERT INTO complaint (c_byuuid,subject_complaint,text_complaint,c_date,c_status) VALUES ('$s_byuuid','$subject_complaint','$text_complaint','$s_date','0')") or die(mysqli_error());
		
			if(isset($addcp)){
				echo '<div class="alert dark alert-icon alert-success alert-dismissible" role="alert" style="text-align:center;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="icon wb-check" aria-hidden="true"></i> تم ارسال الشكوى
                </div>';
				exit;
			}
			
	  }
	
	}
}
}
?>
			<div class="">
                <h4 class="example-title" style="text-align:right;margin-top:20px">موضوع الشكوى</h4>
              <input type="text" class="form-control" style="text-align:center;" name="subject_complaint" id="subject_complaint" placeholder="موضوع الاقتراح">
			</div>
			<div class="example-wrap">
                <h4 class="example-title" style="text-align:right;margin-top:20px">نص الشكوى</h4>
              <textarea class="form-control" name="text_complaint" id="text_complaint" style="text-align:right;" rows="3" placeholder="نص الاقتراح"></textarea>
             </div>
            </div>
          </div>  
          <!-- End Panel Air Mode -->
        </div>
      </div>
	  <div class="panel">
            <div class="panel-body">
              <p>
                <button class="btn btn-outline btn-primary" type="submit" name="submit">ارسال</button>
              </p>
            </div>
          </div>
		  </form>
    </div>
  </div>

<?php
}
}
?>
<?php
if(isset($_GET['tasks'])){
	$tasks = $_GET['tasks'];
if($tasks == "prosecute"){

?>
<div class="page bg-white animsition" style="-webkit-animation-duration: 0s; opacity: 1;">

    <!-- Mailbox Sidebar -->
    <div class="page-aside">
      <div class="page-aside-switch">
        <i class="icon wb-chevron-left" aria-hidden="true"></i>
        <i class="icon wb-chevron-right" aria-hidden="true"></i>
      </div>
      <div class="page-aside-inner">
        <div class="page-aside-section">
          <div class="list-group">
            <a class="list-group-item active" href="javascript:void(0)">
              <span class="badge badge-danger">6</span><i class="icon wb-inbox" aria-hidden="true"></i>Inbox</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Mailbox Content -->
    <div class="page-main">

      <!-- Mailbox Header -->
      <div class="page-header">
        <h1 class="page-title">Mailbox</h1>
        <div class="page-header-actions">
          <form>
            <div class="input-search input-search-dark">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="" placeholder="Search...">
            </div>
          </form>
        </div>
      </div>

      <!-- Mailbox Content -->
      <div class="page-content page-content-table" data-selectable="selectable">

        <!-- Mailbox -->
        <table class="table" data-plugin="animateList" data-animate="fade" data-child="tr">
          <tbody>
            <tr data-url="panel.tpl" data-toggle="slidePanel" class="animation-fade" style="-webkit-animation-fill-mode: backwards; -webkit-animation-duration: 250ms; -webkit-animation-delay: 0ms;">
			  <td class="cell-30 responsive-hide">
                <i class="icon wb-paperclip" aria-hidden="true"></i>
              </td>
			  <td>
                <div class="content">
                  <div class="title" style="text-align:right;">اليوم وانا اتكلم</div>
                  <div class="abstract" style="text-align:right;">اجا واحد سبني اسمة....</div>
                </div>
              </td>
              <td class="cell-60 responsive-hide">
                <a class="avatar" href="javascript:void(0)">
                  <img class="img-responsive" src="../../templates/pro/assets/portraits/11.jpg" alt="...">
                </a>
              </td>
			  <td class="cell-130">
                <div class="time" style="
    text-align: right;
">منذ يوم واحد</div>
                <div class="identity" style="
    text-align: right;
">بانتظار الرد<i class="wb-medium-point red-600" aria-hidden="true"></i></div>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- pagination -->
        <ul data-plugin="paginator" data-total="50" data-skin="pagination-gap" class="pagination pagination-gap"><li class="pagination-prev disabled"><a href="javascript:void(0)"><span class="icon wb-chevron-left-mini"></span></a></li><li class="pagination-items active" data-value="1"><a href="javascript:void(0)">1</a></li><li class="pagination-items" data-value="2"><a href="javascript:void(0)">2</a></li><li class="pagination-items" data-value="3"><a href="javascript:void(0)">3</a></li><li class="pagination-items" data-value="4"><a href="javascript:void(0)">4</a></li><li class="pagination-items" data-value="5"><a href="javascript:void(0)">5</a></li><li class="pagination-next"><a href="javascript:void(0)"><span class="icon wb-chevron-right-mini"></span></a></li></ul>
      </div>
    </div>
  </div>
<div class="content-wrapper" style="min-height: 916px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            ترتيب الكلانات
            <small>تحديث اسبوعي</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="#">العشائر</a></li>
            <li class="active">ترتيب العشائر</li>
          </ol>
        </section>
	 <section class="content">
		<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>رقم التذكرة</th>
                      <th>من قام برفعها</th>
                      <th>موضوع الشكوى</th>
                      <th>نص الشكوى</th>
                      <th>تاريخ الرفع</th>
                      <th>الحالة</th>
                      <th></th>
                    </tr>
<?php
	// Execute the query (the recordset $rs contains the result)
	$query = mysqli_query($connect_panel,"SELECT * FROM complaint WHERE c_byuuid='".$client_uid."'")or die(mysqli_error());
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	if (mysqli_num_rows($query) != 1){
}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	 ?>
                    <tr>
                      <td><?php echo $row['c_id']; ?></td>
                      <td><?php echo $row['c_byuuid']; ?></td>
                      <td><?php echo $row['subject_complaint']; ?></td>
                      <td><?php $small = substr($row['text_complaint'], 0, 50); echo $small;?></td>
                      <td><?php echo $row['c_date']; ?></td>
                      <td><?php echo $row['c_status']; ?></td>
                      <td>انقر هنا للمزيد</td>
                    </tr>
	 <?php

	  }

	// Close the database connection
	mysqli_close();
	?>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
		 </section>
	 </div>

<?php
}
}
?>
<?php
if(isset($_GET['tasks'])){
	$tasks = $_GET['tasks'];
if($tasks == "view"){
?>
<?php
if(isset($_GET['id'])){
$c_id = intval($_GET['id']);
?>
<?php

	// Execute the query (the recordset $rs contains the result)
	$query = mysqli_query($connect_panel,"SELECT * FROM complaint WHERE c_id='".$c_id."'")or die(mysqli_error());
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	if (mysqli_num_rows($query) != 1){
}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	 ?>
<?php
if($row['c_byuuid'] == $client_uid){
?>
<div class="content-wrapper" style="min-height: 916px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            عرض الشكاوي
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="#">التذاكر</a></li>
            <li class="active">عرض التذكرة</li>
          </ol>
        </section>
	 <section class="content">
		<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>رقم التذكرة</th>
                      <th>موضوع الشكوى</th>
                      <th>تاريخ الرفع</th>
                      <th>الحالة</th>
                    </tr>
                    <tr>
                      <td><?php echo $row['c_id']; ?></td>
                      <td><?php echo $row['subject_complaint']; ?></td>
                      <td><?php echo $row['c_date']; ?></td>
                      <td><?php echo $row['c_status']; ?></td>
                    </tr>
                  </tbody></table>
				  <?php echo $row['text_complaint']; ?>
				  <?php 
				  if(empty($row['reply_complaint'])){
				  
				  } else {
				  echo $row['reply_complaint'];
				  }
				  
				  
				  
				  if(empty($row['reply_c_2'])){
				  
				  } else {
				  echo $row['reply_c_2'];
				  }
				  
				  
				  
				  
				  if(empty($row['reply_o_2'])){
				  
				  } else {
				  echo $row['reply_o_2'];
				  }
				  ?>
<?php

	  } else { mysqli_close(); echo '
	  <div class="content-wrapper" style="min-height: 916px;">
	  غير مصرح لك برؤيةهذه الصفحة
	  </div>
	  
	  '; 
	  
	  exit;
	  }
	  
	}
	// Close the database connection
	mysqli_close();
	
	
} else die ('	  <div class="content-wrapper" style="min-height: 916px;">
        <section class="content-header">
          <h1>
            ترتيب الكلانات
            <small>تحديث اسبوعي</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="#">العشائر</a></li>
            <li class="active">ترتيب العشائر</li>
          </ol>
        </section>
	 عفواً هناك خطاً اختر من القائمة الاختيار السابق
	  </div>'); ?>
                </div><!-- /.box-body -->
				
              </div><!-- /.box -->
            </div>
          </div>
	 </div>
</section>
<?php
}
}
?>
	  <!-- End Page -->

	  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>


	  
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
	  <script src="templates/pro/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	  
	  <!-- Plugins -->
	  <script src="templates/pro/assets/vendor/switchery/switchery.min.js"></script>
	  <script src="templates/pro/assets/vendor/intro-js/intro.min.js"></script>
	  <script src="templates/pro/assets/vendor/screenfull/screenfull.js"></script>
	  <script src="templates/pro/assets/vendor/slidepanel/jquery-slidePanel.min.js"></script>

	  <!-- Plugins For This Page -->
	  <script src="templates/pro/assets/vendor/chartist-js/chartist.min.js"></script>
	  <script src="templates/pro/assets/vendor/gmaps/gmaps.js"></script>
	  <script src="templates/pro/assets/vendor/matchheight/jquery.matchHeight-min.js"></script>
	  <script src="templates/pro/assets/vendor/bootbox/bootbox.js"></script>
	  <script src="templates/pro/assets/vendor/bootstrap-sweetalert/sweet-alert.min.js"></script>
	  <script src="templates/pro/assets/vendor/toastr/toastr.min.js"></script>
  
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
	    <script src="templates/pro/assets/js/components/select2.min.js"></script>
  <script src="templates/pro/assets/js/components/bootstrap-tokenfield.min.js"></script>
  <script src="templates/pro/assets/js/components/bootstrap-tagsinput.min.js"></script>
  <script src="templates/pro/assets/js/components/bootstrap-select.min.js"></script>
  <script src="templates/pro/assets/js/components/icheck.min.js"></script>
  <script src="templates/pro/assets/js/components/switchery.min.js"></script>
  <script src="templates/pro/assets/js/components/asrange.min.js"></script>
  <script src="templates/pro/assets/js/components/asspinner.min.js"></script>
  <script src="templates/pro/assets/js/components/clockpicker.min.js"></script>
  <script src="templates/pro/assets/js/components/ascolorpicker.min.js"></script>
  <script src="templates/pro/assets/js/components/bootstrap-maxlength.min.js"></script>
  <script src="templates/pro/assets/js/components/jquery-knob.min.js"></script>
  <script src="templates/pro/assets/js/components/bootstrap-touchspin.min.js"></script>
  <script src="templates/pro/assets/js/components/card.min.js"></script>
  <script src="templates/pro/assets/js/components/jquery-labelauty.min.js"></script>
  <script src="templates/pro/assets/js/components/bootstrap-datepicker.min.js"></script>
  <script src="templates/pro/assets/js/components/jt-timepicker.min.js"></script>
  <script src="templates/pro/assets/js/components/datepair-js.min.js"></script>
  <script src="templates/pro/assets/js/components/jquery-strength.min.js"></script>
  <script src="templates/pro/assets/js/components/multi-select.min.js"></script>
  <script src="templates/pro/assets/js/components/jquery-placeholder.min.js"></script>
  <script src="templates/pro/assets/vendor/formvalidation/formValidation.min.js"></script>
  <script src="templates/pro/assets/vendor/formvalidation/framework/bootstrap.min.js"></script>
  <script src="templates/pro/assets/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
  <script src="templates/pro/assets/vendor/marked/marked.min.js"></script>
  <script src="templates/pro/assets/vendor/to-markdown/to-markdown.js"></script>
  <script src="templates/pro/assets/vendor/summernote/summernote.min.js"></script>
  <script src="templates/pro/assets/js/components/summernote.min.js"></script>

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function($) {
        Site.run();
      });

      // $('#exampleModal').on('show.bs.modal', function(event) {
      //   var button = $(event.relatedTarget);
      //   var recipient = button.data('whatever');
      //   var modal = $(this);
      //   modal.find('.modal-title').text('New message to ' + recipient);
      //   modal.find('.modal-body input').val(recipient);
      // });

      window.exampleBootboxAlertCallback = function() {
        toastr.info("Hello world callback");
      };

      window.exampleBootboxConfirmCallback = function(result) {
        toastr.info("Confirm result: " + result);
      };

      window.exampleBootboxPromptCallback = function(result) {
        if (result === null) {
          toastr.info("Prompt dismissed");
        } else {
          toastr.info("Hi <b>" + result + "</b>");
        }
      };

      // Example Examples
      // ----------------
      (function() {
        $('#exampleBootboxPromptDefaultValue').on('click', function() {
          bootbox.prompt({
            title: "What is your real name?",
            value: "makeusabrew",
            callback: function(result) {
              if (result === null) {
                toastr.info("Prompt dismissed");
              } else {
                toastr.info("Hi <b>" + result + "</b>");
              }
            }
          });
        });

        $('#exampleBootboxCustomDialog').on('click', function() {
          bootbox.dialog({
            message: "I am a custom dialog",
            title: "Custom title",
            buttons: {
              success: {
                label: "Success!",
                className: "btn-success",
                callback: function() {
                  toastr.info("great success");
                }
              },
              danger: {
                label: "Danger!",
                className: "btn-danger",
                callback: function() {
                  toastr.info("uh oh, look out!");
                }
              },
              main: {
                label: "Click ME!",
                className: "btn-primary",
                callback: function() {
                  toastr.info("Primary button");
                }
              }
            }
          });
        });

        $('#exampleBootboxCustomHtmlContents').on('click', function() {
          bootbox.dialog({
            title: "That html",
            message: 'You can also use <b>html</b>'
          });
        });

        $('#exampleBootboxCustomHtmlForms').on('click', function() {
          bootbox.dialog({
            title: "This is a form in a modal.",
            message: '<form class="form-horizontal">' +
              '<div class="form-group">' +
              '<label class="col-md-4 control-label" for="name">Name</label>' +
              '<div class="col-md-6">' +
              '<input type="text" class="form-control input-md" id="name" name="name" placeholder="Your name"> ' +
              '<span class="help-block">Here goes your name</span></div>' +
              '</div>' +
              '<div class="form-group">' +
              '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label>' +
              '<div class="col-md-6"><div class="radio-custom radio-primary">' +
              '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked>' +
              '<label for="awesomeness-0">Really awesome </label>' +
              '</div><div class="radio-custom radio-primary">' +
              '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome">' +
              '<label for="awesomeness-1">Super awesome </label>' +
              '</div>' +
              '</div></div>' +
              '</form>',
            buttons: {
              success: {
                label: "Save",
                className: "btn-success",
                callback: function() {
                  var name = $('#name').val();
                  var answer = $(
                    "input[name='awesomeness']:checked").val();
                  toastr.info("Hello " + name +
                    ". You've chosen <b>" + answer + "</b>");
                }
              }
            }
          });
        });
      })();

      // Example Styles
      // --------------
      (function() {
        $('#exampleWarningConfirm').on("click", function() {
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes, delete it!',
              closeOnConfirm: false,
              //closeOnCancel: false
            },
            function() {
              swal("Deleted!",
                "Your imaginary file has been deleted!",
                "success");
            });
        });

        $('#exampleWarningCancel').on("click", function() {
          swal({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: "No, cancel plx!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm) {
              if (isConfirm) {
                swal("Deleted!",
                  "Your imaginary file has been deleted!",
                  "success");
              } else {
                swal("Cancelled", "Your imaginary file is safe :)",
                  "error");
              }
            });
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