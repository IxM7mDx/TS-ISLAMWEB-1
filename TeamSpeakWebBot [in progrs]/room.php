<?php

include 'include/config.php';
require_once("libraries/TeamSpeak3/TeamSpeak3.php");

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
      <h1 class="page-title">Statistics Widgets</h1>
      <ol class="breadcrumb">
        <li><a href="../index.html">Home</a></li>
        <li><a href="javascript:void(0)">Widgets</a></li>
        <li class="active">Statistics</li>
      </ol>
      <div class="page-header-actions">
        <button type="button" class="btn btn-sm btn-outline btn-default btn-round">
          <span class="text hidden-xs">Settings</span>
          <i class="icon wb-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
    <div class="page-content container-fluid">
      <div class="row">
        

        

        <div class="clearfix visible-lg-block"></div>

        

        

        

        <div class="clearfix visible-lg-block"></div>

        

        

        

        <div class="clearfix visible-lg-block"></div>
<div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-35 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="pull-left">
                    <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                      <span class="ladda-label">«·”Ã‰«¡<i class="icon wb-arrow-right margin-left-10" aria-hidden="true"></i></span>
                    <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                  </div>
                    
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
<div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-35 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="pull-left">
                    <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                      <span class="ladda-label">ÿ·»«  «·ﬂ·«‰«  ··»Ê « <i class="icon wb-arrow-right margin-left-10" aria-hidden="true"></i></span>
                    <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                  </div>
                    
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
<div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-35 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="pull-left">
                    <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                      <span class="ladda-label">«œ«—… «· –«ﬂ—<i class="icon wb-arrow-right margin-left-10" aria-hidden="true"></i></span>
                    <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                  </div>
                    
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
<div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-35 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="pull-left">
                    <button type="button" class="btn btn-primary ladda-button" data-style="slide-right" data-plugin="ladda">
                      <span class="ladda-label">«—”· —”«·… Ã„«⁄Ì… <i class="icon wb-arrow-right margin-left-10" aria-hidden="true"></i></span>
						<div class="modal fade modal-super-scaled" id="exampleNiftySuperScaled" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">◊</span>
                          </button>
                          <h4 class="modal-title">—”«·… Ã„«⁄Ì…</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-4 form-group" style="
    text-align: center;
">
                              <div class="checkbox-custom checkbox-primary">
                  <input type="checkbox" id="inputChecked" checked="">
                  <label for="inputChecked">⁄—÷ «”„ «·„—”·</label>
                </div>
                            </div>
                            <div style="
    text-align: center;
" class="col-lg-4 form-group">
                              <div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" id="inputUltraAwesome" name="porto_is" value="ultra-awesome" data-fv-field="porto_is">
                          <label for="inputUltraAwesome">»Êﬂ</label>
                        </div>
                      </div>
                            </div>
                            <div class="col-lg-4 form-group" style="
    text-align: center;
">
                              <div class="radio-custom radio-primary">
                          <input type="radio" id="inputUltraAwesome" name="porto_is" value="ultra-awesome" data-fv-field="porto_is">
                          <label for="inputUltraAwesome">—”«·… Œ«’…</label>
                        </div>
                            </div>
                            <div class="col-lg-12 form-group">
                              
                        <input type="text" class="form-control" name="vMinLength" data-fv-stringlength="true" data-fv-stringlength-min="8" data-fv-notempty-message="This is required" data-fv-stringlength-message="please enter more than 8 length" placeholder="minlength = 8" data-fv-field="vMinLength">
                      <small class="help-block" data-fv-validator="stringLength" data-fv-for="vMinLength" data-fv-result="VALID" style="display: none;">please enter more than 8 length</small>
                            </div>
                            
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default margin-0 __web-inspector-hide-shortcut__" data-dismiss="modal">«·€«¡</button>
                          <button type="button" class="btn btn-primary">«—”·</button>
                        </div>
                      </div>
                    </div>
                  </div>
					<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                  </div>
                    
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

        <div class="col-lg-8 col-md-12">
          <div class="row">
            <div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-35 bg-white clearfix">
                  <div class="pull-left white">
                    <i class="icon icon-circle icon-2x wb-clipboard bg-red-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right pull-right">
                    <div class="counter-number-group">
                      <span class="counter-number">25</span>
                      <span class="counter-number-related text-capitalize">projects</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">⁄œœ «·”Ã‰«¡</div>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            <div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-35 bg-white clearfix">
                  <div class="counter counter-md pull-left text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">42</span>
                      <span class="counter-number-related text-capitalize">people</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">⁄œœ ÿ·»«  «·‘—«¡</div>
                  </div>
                  <div class="pull-right white">
                    <i class="icon icon-circle icon-2x wb-users bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            <div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-30 bg-white">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase margin-bottom-5">⁄œœ «·“Ê«— «·Ãœœ</div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number">12,657</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs margin-bottom-10">
                        <div class="progress-bar progress-bar-info bg-blue-600" aria-valuenow="70.3" aria-valuemin="0" aria-valuemax="100" style="width: 70.3%" role="progressbar">
                          <span class="sr-only">70.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon blue-600 margin-right-5"><i class="wb-graph-up"></i></span>
                          <span class="counter-number">38%</span>
                          <span class="counter-number-related">«ﬂÀ— „‰ «·‘Â— «·„«÷Ì</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>

            <div class="col-md-6">
              <!-- Widget -->
              <div class="widget">
                <div class="widget-content padding-30 bg-white">
                  <div class="counter counter-md text-left">
                    <div class="counter-label text-uppercase margin-bottom-5">⁄œœ «·“Ê«— «·«‰</div>
                    <div class="counter-number-group margin-bottom-10">
                      <span class="counter-number">2,381</span>
                    </div>
                    <div class="counter-label">
                      <div class="progress progress-xs margin-bottom-5">
                        <div class="progress-bar progress-bar-info bg-red-600" aria-valuenow="20.3" aria-valuemin="0" aria-valuemax="100" style="width: 20.3%" role="progressbar">
                          <span class="sr-only">20.3%</span>
                        </div>
                      </div>
                      <div class="counter counter-sm text-left">
                        <div class="counter-number-group">
                          <span class="counter-icon red-600 margin-right-5"><i class="wb-graph-down"></i></span>
                          <span class="counter-number">14%</span>
                          <span class="counter-number-related">«ﬁ· „‰ «·‘Â— «·„«÷Ì</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Widget -->
            </div>
			

          </div>
        </div>

        <div class="col-lg-2 col-sm-6">
          <!-- Widget -->
          <div class="widget">
            <div class="widget-content padding-30 bg-green-600 height-350">
              <div class="counter counter-lg counter-inverse">
                <div class="counter-label">
                  <div class="font-size-30">«·”‰…</div>
                  <div class="font-size-14">„Ã„Ê⁄ «·„‘ —Ì« </div>
                </div>
                <div class="counter-number-group text-center" style="width:100%;position:absolute;bottom:30px;left:0;">
                  <span class="counter-number">356</span>
                  <span class="counter-number-related font-size-30">$</span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </div>

        <div class="col-lg-2 col-sm-6">
          <!-- Widget -->
          <div class="widget">
            <div class="widget-content padding-30 bg-orange-600 text-center vertical-align height-350">
              <div class="counter counter-lg counter-inverse vertical-align-middle">
                <span class="counter-number">7.3</span>
                <div class="counter-label text-capitalize"> ﬁœÌ— «·„Êﬁ⁄</div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </div>

        <div class="clearfix visible-lg-block"></div>

        

        

        

        
      </div>
    </div>
  </div>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
		</div>
    
</div>
              <!-- End Example Form Modal -->
				</div>
			  </div>
			  </div>
			</div>
		</div>
		  </div> 
		  </div>
		
		  <!-- End Panel Traffic -->
		</div>
	</div>
<?php 
} 
?>
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

      // Example Validataion Full
      // ------------------------
      (function() {
        $('#exampleFullForm').formValidation({
          framework: "bootstrap",
          button: {
            selector: '#validateButton1',
            disabled: 'disabled'
          },
          icon: null,
          fields: {
            username: {
              validators: {
                notEmpty: {
                  message: 'The username is required'
                },
                stringLength: {
                  min: 6,
                  max: 30
                },
                regexp: {
                  regexp: /^[a-zA-Z0-9]+$/
                }
              }
            },
            email: {
              validators: {
                notEmpty: {
                  message: 'The username is required'
                },
                emailAddress: {
                  message: 'The email address is not valid'
                }
              }
            },
            password: {
              validators: {
                notEmpty: {
                  message: 'The password is required'
                },
                stringLength: {
                  min: 8
                }
              }
            },
            birthday: {
              validators: {
                notEmpty: {
                  message: 'The birthday is required'
                },
                date: {
                  format: 'YYYY/MM/DD'
                }
              }
            },
            github: {
              validators: {
                url: {
                  message: 'The url is not valid'
                }
              }
            },
            skills: {
              validators: {
                notEmpty: {
                  message: 'The skills is required'
                },
                stringLength: {
                  max: 300
                }
              }
            },
            porto_is: {
              validators: {
                notEmpty: {
                  message: 'Please specify at least one'
                }
              }
            },
            'for[]': {
              validators: {
                notEmpty: {
                  message: 'Please specify at least one'
                }
              }
            },
            company: {
              validators: {
                notEmpty: {
                  message: 'Please company'
                }
              }
            },
            browsers: {
              validators: {
                notEmpty: {
                  message: 'Please specify at least one browser you use daily for development'
                }
              }
            }
          }
        });
      })();

      // Example Validataion Constraints
      // -------------------------------
      (function() {
        $('#exampleConstraintsForm, #exampleConstraintsFormTypes').formValidation({
          framework: "bootstrap",
          icon: null,
          fields: {
            type_email: {
              validators: {
                emailAddress: {
                  message: 'The email address is not valid'
                }
              }
            },
            type_url: {
              validators: {
                url: {
                  message: 'The url is not valid'
                }
              }
            },
            type_digits: {
              validators: {
                digits: {
                  message: 'The value is not digits'
                }
              }
            },
            type_numberic: {
              validators: {
                integer: {
                  message: 'The value is not an number'
                }
              }
            },
            type_phone: {
              validators: {
                phone: {
                  message: 'The value is not an phone(US)'
                }
              }
            },
            type_credit_card: {
              validators: {
                creditCard: {
                  message: 'The credit card number is not valid'
                }
              }
            },
            type_date: {
              validators: {
                date: {
                  format: 'YYYY/MM/DD'
                }
              }
            },
            type_color: {
              validators: {
                color: {
                  type: ['hex', 'hsl', 'hsla', 'keyword', 'rgb',
                    'rgba'
                  ], // The default value for type
                  message: 'The value is not valid color'
                }
              }
            },
            type_ip: {
              validators: {
                ip: {
                  ipv4: true,
                  ipv6: true,
                  message: 'The value is not valid ip(v4 or v6)'
                }
              }
            }
          }
        });
      })();

      // Example Validataion Standard Mode
      // ---------------------------------
      (function() {
        $('#exampleStandardForm').formValidation({
          framework: "bootstrap",
          button: {
            selector: '#validateButton2',
            disabled: 'disabled'
          },
          icon: null,
          fields: {
            standard_fullName: {
              validators: {
                notEmpty: {
                  message: 'The full name is required and cannot be empty'
                }
              }
            },
            standard_email: {
              validators: {
                notEmpty: {
                  message: 'The email address is required and cannot be empty'
                },
                emailAddress: {
                  message: 'The email address is not valid'
                }
              }
            },
            standard_content: {
              validators: {
                notEmpty: {
                  message: 'The content is required and cannot be empty'
                },
                stringLength: {
                  max: 500,
                  message: 'The content must be less than 500 characters long'
                }
              }
            }
          }
        });
      })();

      // Example Validataion Summary Mode
      // -------------------------------
      (function() {
        $('.summary-errors').hide();

        $('#exampleSummaryForm').formValidation({
          framework: "bootstrap",
          button: {
            selector: '#validateButton3',
            disabled: 'disabled'
          },
          icon: null,
          fields: {
            summary_fullName: {
              validators: {
                notEmpty: {
                  message: 'The full name is required and cannot be empty'
                }
              }
            },
            summary_email: {
              validators: {
                notEmpty: {
                  message: 'The email address is required and cannot be empty'
                },
                emailAddress: {
                  message: 'The email address is not valid'
                }
              }
            },
            summary_content: {
              validators: {
                notEmpty: {
                  message: 'The content is required and cannot be empty'
                },
                stringLength: {
                  max: 500,
                  message: 'The content must be less than 500 characters long'
                }
              }
            }
          }
        })

        .on('success.form.fv', function(e) {
          // Reset the message element when the form is valid
          $('.summary-errors').html('');
        })

        .on('err.field.fv', function(e, data) {
          // data.fv     --> The FormValidation instance
          // data.field  --> The field name
          // data.element --> The field element
          $('.summary-errors').show();

          // Get the messages of field
          var messages = data.fv.getMessages(data.element);

          // Remove the field messages if they're already available
          $('.summary-errors').find('li[data-field="' + data.field +
            '"]').remove();

          // Loop over the messages
          for (var i in messages) {
            // Create new 'li' element to show the message
            $('<li/>')
              .attr('data-field', data.field)
              .wrapInner(
                $('<a/>')
                .attr('href', 'javascript: void(0);')
                // .addClass('alert alert-danger alert-dismissible')
                .html(messages[i])
                .on('click', function(e) {
                  // Focus on the invalid field
                  data.element.focus();
                })
              ).appendTo('.summary-errors > ul');
          }

          // Hide the default message
          // $field.data('fv.messages') returns the default element containing the messages
          data.element
            .data('fv.messages')
            .find('.help-block[data-fv-for="' + data.field + '"]')
            .hide();
        })

        .on('success.field.fv', function(e, data) {
          // Remove the field messages
          $('.summary-errors > ul').find('li[data-field="' + data.field +
            '"]').remove();
          if ($('#exampleSummaryForm').data('formValidation').isValid()) {
            $('.summary-errors').hide();
          }
        });
      })();
    })(document, window, jQuery);
  </script>


	  <!-- Google Analytics -->

	</body>


</html>
		<?php
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