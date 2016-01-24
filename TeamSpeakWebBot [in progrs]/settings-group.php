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
<div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
    <div class="page-header">
      <h1 class="page-title" style="
    text-align: right;
">اعدادات البوت الشخصية</h1>
      
      
    </div>
    <div class="page-content container-fluid">
      <!-- Panel Validation Styles -->
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title" style="
    text-align: right;
">اضافة العاب</h3>
        </div>
        <div class="panel-body">
          
            
              
               
                
                <p style="text-align:center;"> الحد الاقصى للالعاب <code>1</code> فقط </p>
						  <?php
		  if(isset($_POST['submit'])){
		  $google = true;
		  } else {
		  $google = false;
		  }
		  ?>
<?php 
if($google == true){
		
		$grupos = $_SESSION['grupos'];
       
        
		if(empty($_POST["grupos"])) {
			echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="true" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="true" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning pulseWarning" style="display: block;"> <span class="body pulseWarningIns"></span> <span class="dot pulseWarningIns"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success" style="display: none;"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>اختيار خطا</h2><p class="lead text-muted" style="display: block;">يجب ان تختار الرتب اولاً </p></div>';
			die;
		} else {
			$n_grupos = $_POST["grupos"];
		}
		$checked = count($_POST['grupos']);
		if( $checked > 1) {
		echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="true" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="true" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning pulseWarning" style="display: block;"> <span class="body pulseWarningIns"></span> <span class="dot pulseWarningIns"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success" style="display: none;"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>عفواً اختر اكثر من لعبة واحدة</h2><p class="lead text-muted" style="display: block;"></p></div>';
		} else {
		foreach($grupos as $group) {			
				$needle = $group['id'];
				$miembros = $ts3_VirtualServer->serverGroupClientList($needle);
                $estaengrupo = False;
                foreach($miembros as $m) {
                    if($m["client_unique_identifier"] == $client_uid) { 
                        $estaengrupo = True; 
                    }                                   
                }
				if(in_array($needle,$n_grupos)) {
					if($estaengrupo == False) {
					$ts3_VirtualServer->serverGroupClientAdd($group["id"],$client_db);
					}
				} else {
					if($estaengrupo == True) {
					
						foreach($servergroups as $group2) {      
                
						$miembros = $ts3_VirtualServer->serverGroupClientList($group2["id"]);
						$estaengrupo = False;
						foreach($miembros as $m) {
							if($m["client_unique_identifier"] == $client_uid) { 
								$estaengrupo = True; 
							}                                   
						}
						
						if($estaengrupo) {
							$iconosm = $iconosm + 1;
							echo $group2["id"];
							$ts3_VirtualServer->serverGroupClientDel($group2["id"],$client_db);
						}        
						
						}
			
					}
				}
			}
			echo '<div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -182px;margin-left: -19%;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success animate" style="display: block;"> <span class="line tip animateSuccessTip"></span> <span class="line long animateSuccessLong"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: none;"></div> <h2>تم اضافة رتب الالعاب</h2><p class="lead text-muted" style="display: block;"></p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button></p></div>';
		}
}
?>
<?php


        $_SESSION['client_uid'] = $client_uid;
        $client_uid = $client_uid;
        $proceder = True;
        $conectado = False;
		$_SESSION['client_db'] = $client_db;
		$SID_GROUP3 = array(301);
            
             echo "<form name='formulario' method='POST' action=''>";
            
            $iconosm = 0;
            
            $server_groups = $ts3_VirtualServer->serverGroupList();
            $servergroups = array();
 
            # En vez de iterar por todos los grupos intenten 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                if(in_array($group["sortid"], $SID_GROUP3)) {
                    $servergroups[] = array('name' => (string)$group, 'id' => $group->sgid, 'type' => $group->type);
                }
            }
			$_SESSION['grupos'] = $servergroups;
        
            foreach($servergroups as $group) {      
                
                $miembros = $ts3_VirtualServer->serverGroupClientList($group["id"]);
                $estaengrupo = False;
                foreach($miembros as $m) {
                    if($m["client_unique_identifier"] == $client_uid) { 
                        $estaengrupo = True; 
                    }                                   
                }
                
                if($estaengrupo) {
                    $iconosm = $iconosm + 1;
                    echo '<li><img src="./iconos/icons/'.$group['id']. '.png" alt="" />  ';
                    echo '<label><input type=checkbox name=grupos['.$group["id"].'] id="'.$group["id"].'" value="'. $group["id"] .'"class="icono" checked >'.$group["name"].'</label><br>';
                } else {
                    echo '<li><img src="./iconos/icons/'. $group['id'] . '.png" alt="" />  ';
                    echo '<label><input type=checkbox name=grupos['.$group["id"].'] id="'. $group["id"] .'" value="'. $group["id"] .'" class="icono"> '.$group["name"].'</label><br>';
                }           
            }
		
        
?>
<button type="submit" id="submit" name="submit" class="btn btn-default">save</button>
          </form>
			</script>

        </div>
      </div>
      <!-- End Panel Validation Styles -->

      <div class="row">
        

        
      </div>

      <!-- Panel Full Example -->
      
      

      
      
      
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