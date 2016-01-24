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
	  <link rel="stylesheet" href="templates/pro/assets/vendor/x-editable/x-editable.min.css">
	  <link rel="stylesheet" href="templates/pro/assets/vendor/x-editable/address.min.css">
      <link rel="stylesheet" href="templates/pro/assets/vendor/typeahead-js/typeahead.min.css">
      <link rel="stylesheet" href="templates/pro/assets/vendor/select2/select2.min.css">
	  
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
				  if(isset($_GET['ide'])){
					  $flter = intval($_GET['ide']);
					  ?>
					  <div class="page animsition" style="-webkit-animation-duration: 0s; opacity: 1;">
    <div class="page-header">
      <h1 class="page-title" style="
    text-align: center;
">تعديل الحظر رقم [7] مبند</h1>
    </div>
    <div class="page-content container-fluid">
      <div class="row">
        <div class="col-lg-3 col-sm-4" style="
    float: right;
">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body" style="
    text-align: right;
">
              <div class="list-group" data-plugin="nav-tabs" role="tablist">
                <a class="list-group-item active" data-toggle="tab" href="#category-1" aria-controls="category-1" role="tab">تعديلات رئيسية</a>
                <a class="list-group-item" data-toggle="tab" href="#category-2" aria-controls="category-2" role="tab">من المبند</a>
                <a class="list-group-item" data-toggle="tab" href="#category-3" aria-controls="category-3" role="tab">عرض الصفحة الرئيسية</a>
              </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>

        <div class="col-lg-9 col-sm-8">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body">
              <div class="tab-content">
                <!-- Categroy 1 -->
                <div class=" tab-pane animation-fade active" id="category-1" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion2" aria-multiselectable="true" role="tablist">
                    <!-- Question 1 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-1" role="tab">
                        <a class="panel-title" aria-controls="answer-1" aria-expanded="true" data-toggle="collapse" href="#answer-1" style="text-align:center;" data-parent="#accordion2">
                        تعديل تاريخ الباند
                      </a>
                      </div>
                      <div class="panel-collapse collapse in" id="answer-1" aria-labelledby="question-1" role="tabpanel">
                        <div class="panel-collapse collapse in" id="answer-1" aria-labelledby="question-1" role="tabpanel" aria-expanded="true">
                        <form class="form-horizontal fv-form fv-form-bootstrap" id="exampleStandardForm" autocomplete="off" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <div class="form-group form-material row">
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid1">hor.</label>
                    <input type="text" class="form-control" id="dat1" name="dat1" placeholder="الساعة">
                  </div>
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">min.</label>
                    <input type="text" class="form-control" id="dat2" name="dat2" placeholder="الدقيقة">
                  </div>
				  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">sec.</label>
                    <input type="text" class="form-control" id="dat3" name="dat3" placeholder="الثانية">
                  </div>
                </div>
<div class="form-group form-material row">
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid1">yea.</label> 
                    <input type="text" class="form-control" id="dat6" name="dat6" placeholder="السنة">
                  </div>
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">mon.</label> 
                    <input type="text" class="form-control" id="dat4" name="dat4" placeholder="الشهر" hidd="">
                  </div>
				  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">day.</label> 
                    <input type="text" class="form-control" id="dat5" name="dat5" placeholder="اليوم">
                  </div>
                </div>
                
                
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2" style="
    margin-right: 50%;
    margin-bottom: 3%;
">تعديل</button>
                </div>
              </form>
                      </div>
                      </div>
                    </div>
                    <!-- End Question 1 -->

                    <!-- Question 2 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-2" role="tab">
                        <a class="panel-title" aria-controls="answer-2" aria-expanded="false" data-toggle="collapse" href="#answer-2" style="text-align:center;" data-parent="#accordion2">
                        من المبند
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-2" aria-labelledby="question-2" role="tabpanel">
                        <div class="panel-collapse collapse in" id="answer-2" aria-labelledby="question-2" role="tabpanel" aria-expanded="true">
                        <div class="panel-collapse collapse in" id="answer-1" aria-labelledby="question-1" role="tabpanel" aria-expanded="true">
                        <form class="form-horizontal fv-form fv-form-bootstrap" id="exampleStandardForm" autocomplete="off" novalidate="novalidate"><button type="submit" class="fv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <div class="form-group form-material row">
                  
                  
				  <div class="col-sm-12">
                    <label class="control-label" for="inputGrid2" style="margin-left: 49%;">sec.</label>
                    <input type="text" class="form-control" id="dat3" name="dat3" placeholder="الثانية" style="
    text-align: center;
">
                  </div>
                </div>

                
                
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2" style="
    margin-right: 47%;
    margin-bottom: 3%;
">تعديل</button>
                </div>
              </form>
                      </div>
                      </div>
                      </div>
                    </div>
                    <!-- End Question 2 -->

                    <!-- Question 3 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-3" role="tab">
                        <a class="panel-title" aria-controls="answer-3" aria-expanded="false" data-toggle="collapse" href="#answer-3" style="text-align:center;"data-parent="#accordion2">
                        تعديل السبب
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-3" aria-labelledby="question-3" role="tabpanel">
                        <div class="panel-body">
                          Lorem ipsum Esse pariatur sit reprehenderit non culpa sint ullamco qui in aliquip
                          enim exercitation laborum ut eu voluptate exercitation
                          Duis dolore amet pariatur id occaecat incididunt deserunt
                          nulla esse proident.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 3 -->
                  </div>
                </div>
                <!-- End Categroy 1 -->

                <!-- Categroy 2 -->
                <div class="tab-pane animation-fade" id="category-2" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion" aria-multiselectable="true" role="tablist">
                    <!-- Question 5 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-5" role="tab">
                        <a class="panel-title" aria-controls="answer-5" aria-expanded="true" data-toggle="collapse" href="#answer-5" data-parent="#accordion">
                        Can I exercitation occaecat voluptate duis ut dolore?
                      </a>
                      </div>
                      <div class="panel-collapse collapse in" id="answer-5" aria-labelledby="question-5" role="tabpanel">
                        <div class="panel-body">
                          Consecutus sicine hominum, artem conclusionemque patientia, omni fuerit intemperantiam
                          efficeretur phaedrum minime obiecta constituam, motus
                          mandamus perfunctio contra, imagines exquisitis reiciat.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 5 -->

                    <!-- Question 6 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-6" role="tab">
                        <a class="panel-title" aria-controls="answer-6" aria-expanded="false" data-toggle="collapse" href="#answer-6" data-parent="#accordion">
                        How do lorem ipsum quis magna magna?
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-6" aria-labelledby="question-6" role="tabpanel">
                        <div class="panel-body">
                          Pluribus horum laetamur forensibus investigandi gravissimis quaeque possumus copulationesque.
                          Sapientium interdictum, secutus servata expressas reici.
                          Dixerit dixerit tantis conscientiam arbitramur reprehensa
                          traditur propositum locos remotis, metus continent maledici
                          attico sermo iucundius gerendarum. Bonarum incommoda
                          afferrent iisque graeca perdiscere munere recordatione
                          nos sapiens, perspexit, oderit nominata.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 6 -->

                    <!-- Question 7 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-7" role="tab">
                        <a class="panel-title" aria-controls="answer-7" aria-expanded="false" data-toggle="collapse" href="#answer-7" data-parent="#accordion">
                        How do I set up lorem ipsum?
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-7" aria-labelledby="question-7" role="tabpanel">
                        <div class="panel-body">
                          Acute ennius fuisset facile plena quem possim tribus antipatrum moveat, praestabiliorem
                          geometria inportuno privamur, remissius habemus desperantes,
                          nullas quas terrore modum uberius homine adiuvet, dissentio
                          iudicabit ac, nullus molita foedus num. Circumcisaque
                          nulla aut etenim doceat pecunias afferrent infinitis,
                          propterea repellat epularum inveneris dissentiet meminerunt
                          malivoli gloriosis, faciunt petat conscientia, nesciunt
                          logikh fortunae, primos expedire aliquo putet aptissimum
                          officiis naturalem.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 7 -->
                  </div>
                </div>
                <!-- End Categroy 2 -->

                <!-- Categroy 3 -->
                <div class="tab-pane animation-fade" id="category-3" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion1" aria-multiselectable="true" role="tablist">
                    <!-- Question 8 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-8" role="tab">
                        <a class="panel-title" aria-controls="answer-8" aria-expanded="true" data-toggle="collapse" href="#answer-8" data-parent="#accordion1">
                        How can I lorem ipsum elit commodo?
                      </a>
                      </div>
                      <div class="panel-collapse collapse in" id="answer-8" aria-labelledby="question-8" role="tabpanel">
                        <div class="panel-body">
                          Lorem ipsum Est dolore eiusmod sunt fugiat sunt minim qui ullamco incididunt mollit.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 8 -->

                    <!-- Question 9 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-9" role="tab">
                        <a class="panel-title" aria-controls="answer-9" aria-expanded="false" data-toggle="collapse" href="#answer-9" data-parent="#accordion1">
                        Where can I lorem ipsum efficere sed ullamco?
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-9" aria-labelledby="question-9" role="tabpanel">
                        <div class="panel-body">
                          Solitudo per mox coerceri efficere vetuit exhorrescere, silano sitisque efficere
                          iniurias adhaesiones agam dolores ponit multa. Exiguam
                          ii genus libidinosarum scribere, hinc ipsius severitatem
                          falsis desistemus praeteritas cogitemus delectu terentii,
                          pedalis angusta scripserit sit iucundum mirari ipsi parta.
                          Maluisti emolumento solido gravissimis amicitia ornatum
                          eademque scribi terentianus tollit, tranquillitatem intellegentium
                          persequeris ordiamur declinationem optio detrimenti inclusae,
                          augendas semper.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 9 -->

                    <!-- Question 10 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-10" role="tab">
                        <a class="panel-title" aria-controls="answer-10" aria-expanded="false" data-toggle="collapse" href="#answer-10" data-parent="#accordion1">
                        Do I have to torquate artem irure et quis dolor?
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-10" aria-labelledby="question-10" role="tabpanel">
                        <div class="panel-body">
                          Exeamus, frustra, imperitorum torquate artem efficeret talem vivendi, primum libidinem
                          virtus apte incurrunt, appetendum utramque, oderis. Homines
                          traditur loquerer fugiat sequitur gravitate nisi recordatione
                          efflorescere. Primisque hostis prorsus praeda, solitudo
                          labefactetur miserum chrysippi afficit deterret ipsam.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 10 -->
                  </div>
                </div>
                <!-- End Categroy 3 -->

              </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>
      </div>
    </div>
  </div>
  
  
  
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
					  die;
				  }
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
				  <div class="widget-title font-size-50 margin-bottom-35 blue-grey-800">الادارة</div>
				  <ul class="list-inline font-size-14">
				  </ul>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="page-content container-fluid">
		<div class="widget-content padding-30" style="min-width:480px;">
		  <div class="row" data-plugin="matchHeight" data-by-row="true">
		  <!-- Panel Traffic -->
		  <div class="row" data-plugin="matchHeight" data-by-row="true">
		  <div class="col-xlg-6 col-md-6" style="height: 400px;">
<div class="widget widget-shadow widget-responsive" id="widgetLineareaColor" style="width:500px;">
            <div class="widget-content">
              <div class="padding-top-30 padding-30" style="height:calc(100% - 250px);">
			
				  <div class="blue-grey-700">
<?php
		if(isset($_POST['submit'])){
			
				if(empty($_POST['cid'])){
				} else {
					
					if (empty($_POST['des'])){
					} else {
							

									$time1 = time();
												
									$time2 = mktime($_POST['dat1'],$_POST['dat2'],$_POST['dat3'],$_POST['dat4'],$_POST['dat5'],$_POST['dat6']);
									$kingtime = $time2 - $time1;
									
									$cid = $_POST['cid'];
									
									$query12 = mysqli_query($connect_panel,"SELECT * FROM prison WHERE cdb_prison='".$cid."'")or die("Could not connect to the activ-q-136");
									
									if (mysqli_num_rows($query12) > 0){
										$alreadybaned = true;
									} else {
						
										$des = $_POST['des'];
										$dat = $_POST['dat'];

										$u_j = date("Y/m/d H:i:s");

										$by_prison = $client_db;

										$time432 = date("Y/m/d H:i:s", strtotime('+'.$kingtime.' seconds')); 
										$adddb = mysqli_query($connect_panel , "INSERT INTO prison (cdb_prison,datede_prison,by_prison,description_prison,datest_prison) VALUES ('$cid','$time432','$by_prison','$des','$u_j')") or die(mysqli_error());
										
										
										if(isset($adddb)){
											
											$clientid = $ts3_VirtualServer->clientGetByDbid($cid);
											$lodeband = $clientid->ban($kingtime,$des);
											
											$banid1 = $lodeband['0'];
											$banid2 = $lodeband['1'];
											 
											$strSQL = mysqli_query($connect_panel , "UPDATE `prison` SET `banid1`='".$banid1."',`banid2`='".$banid2."' WHERE `cdb_prison`=".$cid."") or die(mysqli_error()); 
											
											
											if(isset($strSQL)){

												echo '<div class="alert dark alert-alt alert-success alert-dismissible" role="alert">
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">×</span>
																  </button>
																  تم اضافة السجل <a class="alert-link" href="javascript:void(0)">تاريخ فك السجن '.$dat.'</a>.
																</div>';
															
											}
										}
									}
									
							}
						}
				}
				
				if($alreadybaned == true){
					echo '<div class="alert dark alert-alt alert-danger alert-dismissible" role="alert">
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">×</span>
																  </button>
																  عذراً <a class="alert-link" href="javascript:void(0)">الشخص المختار مسجل مسبقاً تواصل مع الادارة العليا </a>.
																</div>';
				}
?>

                  <!-- Modal -->
          <!-- Panel Floating Lables -->
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title">add to prison</h3>
            </div>
            <div class="panel-body container-fluid">
              <form action="" method="POST" role="form">
				<br />
				<div class="form-group form-material row">
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid1">hor.</label>
                    <input type="text" class="form-control" id="dat1" name="dat1" placeholder="الساعة">
                  </div>
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">min.</label>
                    <input type="text" class="form-control" id="dat2" name="dat2" placeholder="الدقيقة">
                  </div>
				  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">sec.</label>
                    <input type="text" class="form-control" id="dat3" name="dat3" placeholder="الثانية">
                  </div>
                </div>
				
				
				<div class="form-group form-material row">
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid1">yea.</label> 
                    <input type="text" class="form-control" id="dat6" name="dat6" placeholder="السنة">
                  </div>
                  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">mon.</label> 
                    <input type="text" class="form-control" id="dat4" name="dat4" placeholder="الشهر">
                  </div>
				  <div class="col-sm-4">
                    <label class="control-label" for="inputGrid2">day.</label> 
                    <input type="text" class="form-control" id="dat5" name="dat5" placeholder="اليوم">
                  </div>
                </div>
				
				<div class="form-group form-material row">
                  <div class="col-sm-3">
                    <label class="control-label" for="inputGrid1">UId.</label> 
                    <input type="text" class="form-control" id="cid" name="cid" placeholder="الايدي">
                  </div>
                  <div class="col-sm-9">
                    <label class="control-label" for="inputGrid2">Reson.</label> 
                    <input type="text" class="form-control" id="des" name="des" placeholder="السبب">
                  </div>
                </div>
				
	
				<button type="submit" name="submit" class="btn btn-primary btn-block">اضافة السجن</button>
              </form>
            </div>
          </div>
		</div>
    
</div>
              <!-- End Example Form Modal -->
				</div>
			  </div>
			  </div>
		  <div class="col-xlg-6 col-md-6" style="height: 400px;">
<div class="widget widget-shadow widget-responsive" id="widgetLineareaColor">
            <div class="widget-content">
              <div class="padding-top-30 padding-30" style="height:calc(100% - 250px);">
			
				  <div class="blue-grey-700">
                  <!-- Modal -->
          <!-- Panel Floating Lables -->
			<?php
			
			if(isset($_POST['submit2'])){
						$theidd = $_POST['theidd'];

						$query321123 = mysqli_query($connect_panel,"SELECT * FROM prison WHERE cdb_prison=".$theidd."") or die(mysqli_error());
						if (mysqli_num_rows($query321123) != 1){
						}
						while($row432 = mysqli_fetch_array($query321123, MYSQLI_ASSOC)) {
						$getbanid1 = $row432['banid1'];
						$getbanid2 = $row432['banid2'];
						
						$ts3_VirtualServer->banDelete($getbanid1);
						$ts3_VirtualServer->banDelete($getbanid2);
						mysqli_query($connect_panel,"DELETE FROM `prison` WHERE `cdb_prison`=".$theidd."") or die(mysqli_error());

						echo '<div class="alert dark alert-alt alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  تم حذف الباند<a class="alert-link" href="javascript:void(0)"> ياويلك لو على كيفك</a>.
                </div>';
				
						}
					}
			?>
            <div class="panel-heading">
              <h3 class="panel-title"> all prison</h3>
            </div>
			 
                <table class="table">
                  <thead>
                    <tr>
					  <th style="text-align:center;"></th>
                      <th style="text-align:center;">الوصف</th>
                      <th style="text-align:center;">رقم الاداري</th>
                      <th style="text-align:center;">تاريخ الانتهاء</th>
                      <th style="text-align:center;">تاريخ التسجيل</th>
                      <th style="text-align:center;">رقم السجين</th>
					  <th style="text-align:center;">رقم التسجيل</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					
				
					
					
					
	// Execute the query (the recordset $rs contains the result)
	$query = mysqli_query($connect_panel,"SELECT * FROM prison") or die(mysqli_error());
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysqli_fetch_array
	if (mysqli_num_rows($query) != 1){
}
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

	   // Write the value of the column FirstName (which is now in the array $row)
	 ?>
                    <tr>
					  <td class="col-lg-2">
					  <form method="post" role="form" action="<?php echo "prison.php?ide=".$row['cdb_prison']."" ?>" >
					  <input type="hidden" id="theide" name="theide" value="<?php echo $row['cdb_prison'];?>">
					  					  <button class="icon wb-wrench btn btn-primary btn-outline pull-right" type="submit" name="submit1"></button>
					  </form>
					  <form method="post" role="form">
					  <input type="hidden" id="theidd" name="theidd" value="<?php echo $row['cdb_prison'];?>">
					  					  <button class="icon wb-trash btn btn-primary btn-outline pull-right"   type="submit" name="submit2"></button>
					  </form>
					  </td>
					  <td>
					  	<a id="editableSuperuser" href="javascript:void(0)" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" style="display: inline;"><?php echo $row['description_prison']; ?></a>
                      <td>
						<div class="label label-table label-success"><?php echo $row['by_prison']; ?></div>
                      </td>
                      <td>
					  <a id="editableEvent" href="javascript:void(0)" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1" data-title="Setup event date and time" class="editable editable-click editable-empty" style="display: inline;"><?php echo $row['datede_prison']; ?></a>
                      </td>
                      <td>
                        <span class="text-muted"><?php echo $row['datest_prison']; ?></span>
                      </td>
                      <td>
						<div class="label label-table label-danger"><?php echo $row['cdb_prison']; ?></div>
                      </td>
                      <td><?php echo $row['id']; ?></td>
                    </tr>
	 <?php

	  }

	?>
                  </tbody>
                </table>
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
	  <script src="templates/pro/assets/vendor/x-editable/bootstrap-editable.min.js"></script>
	  <script src="templates/pro/assets/vendor/typeahead-js/bloodhound.min.js"></script>
	  <script src="templates/pro/assets/vendor/typeahead-js/typeahead.jquery.min.js"></script>
	  <script src="templates/pro/assets/vendor/x-editable/address.js"></script>
	  <script src="templates/pro/assets/vendor/select2/select2.min.js"></script>
	  <script src="templates/pro/assets/vendor/moment/moment.min.js"></script>
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
<script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;

      $(document).ready(function($) {
        Site.run();
        //enable / disable
        $('#editableEnable').click(function() {
          $('#editableUser .editable').editable('toggleDisabled');
        });

        var init_x_editable = function() {

          $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
            '<i class="icon wb-check" aria-hidden="true"></i>' +
            '</button>' +
            '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
            '<i class="icon wb-close" aria-hidden="true"></i>' +
            '</button>';

          $.fn.editabletypes.datefield.defaults.inputclass =
            "form-control input-sm";

          //defaults
          $.fn.editable.defaults.url = '/post';

          //editables
          $('#editableSuperuser').editable({
            url: '/post',
            type: 'text',
            pk: 1,
            name: 'username',
            title: 'Enter username'
          });

          $('#editableFirstname').editable({
            validate: function(value) {
              if ($.trim(value) === '') return
                'This field is required';
            }
          });

          $('#editableSex').editable({
            prepend: "not selected",
            source: [{
              value: 1,
              text: 'Male'
            }, {
              value: 2,
              text: 'Female'
            }],
            display: function(value, sourceData) {
              var colors = {
                  "": "gray",
                  1: "green",
                  2: "blue"
                },
                elem = $.grep(sourceData, function(o) {
                  return o.value === value;
                });

              if (elem.length) {
                $(this).text(elem[0].text).css("color", colors[
                  value]);
              } else {
                $(this).empty();
              }
            }
          });

          $('#editableVacation').editable({
            datepicker: {
              todayBtn: 'linked'
            }
          });

          $('#editableDob').editable();

          $('#editableEvent').editable({
            placement: 'right',
            combodate: {
              firstItem: 'name'
            }
          });

          $('#editableMeetingStart').editable({
            format: 'yyyy-mm-dd hh:ii',
            viewformat: 'dd/mm/yyyy hh:ii',
            validate: function(v) {
              if (v && v.getDate() === 10) return
                'Day cant be 10!';
            },
            datetimepicker: {
              todayBtn: 'linked',
              weekStart: 1
            }
          });

          $('#editableComments').editable({
            showbuttons: 'bottom'
          });

          $('#editableNote').editable();
          $('#editablePencil').click(function(e) {
            e.stopPropagation();
            e.preventDefault();
            $('#editableNote').editable('toggle');
          });

          $('#editableState').editable({
            source: ["Alabama", "Alaska", "Arizona", "Arkansas",
              "California", "Colorado", "Connecticut",
              "Delaware", "Florida", "Georgia", "Hawaii",
              "Idaho", "Illinois", "Indiana", "Iowa", "Kansas",
              "Kentucky", "Louisiana", "Maine", "Maryland",
              "Massachusetts", "Michigan", "Minnesota",
              "Mississippi", "Missouri", "Montana", "Nebraska",
              "Nevada", "New Hampshire", "New Jersey",
              "New Mexico", "New York", "North Dakota",
              "North Carolina", "Ohio", "Oklahoma", "Oregon",
              "Pennsylvania", "Rhode Island", "South Carolina",
              "South Dakota", "Tennessee", "Texas", "Utah",
              "Vermont", "Virginia", "Washington",
              "West Virginia", "Wisconsin", "Wyoming"
            ]
          });

          var editableStates = ["Alabama", "Alaska", "Arizona",
              "Arkansas", "California", "Colorado", "Connecticut",
              "Delaware", "Florida", "Georgia", "Hawaii", "Idaho",
              "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky",
              "Louisiana", "Maine", "Maryland", "Massachusetts",
              "Michigan", "Minnesota", "Mississippi", "Missouri",
              "Montana", "Nebraska", "Nevada", "New Hampshire",
              "New Jersey", "New Mexico", "New York", "North Dakota",
              "North Carolina", "Ohio", "Oklahoma", "Oregon",
              "Pennsylvania", "Rhode Island", "South Carolina",
              "South Dakota", "Tennessee", "Texas", "Utah", "Vermont",
              "Virginia", "Washington", "West Virginia", "Wisconsin",
              "Wyoming"
            ],
            states = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              local: editableStates
            });

          $('#editableState2').editable({
            value: 'California',
            typeahead: {
              name: 'states',
              source: states
            }
          });

          $('#editableFruits').editable({
            pk: 1,
            limit: 3,
            source: [{
              value: 1,
              text: 'banana'
            }, {
              value: 2,
              text: 'peach'
            }, {
              value: 3,
              text: 'apple'
            }, {
              value: 4,
              text: 'watermelon'
            }, {
              value: 5,
              text: 'orange'
            }]
          });

          $('#editableAddress').editable({
            url: '/post',
            value: {
              city: "Moscow",
              street: "Lenina",
              building: "12"
            },
            validate: function(value) {
              if (value.city === '') return 'city is required!';
            },
            display: function(value) {
              if (!value) {
                $(this).empty();
                return;
              }
              var html = '<b>' + $('<div>').text(value.city).html() +
                '</b>, ' + $('<div>').text(value.street).html() +
                ' st., bld. ' + $('<div>').text(value.building)
                .html();
              $(this).html(html);
            }
          });

          // $("#editableUser").find(".form-control").addClass(".input-sm");
        };

        var destory_x_editable = function() {
          $('#editableSuperuser').editable('destroy');
          $('#editableFirstname').editable('destroy');
          $('#editableSex').editable('destroy');
          // $('#editableStatus').editable('destroy');
          $('#editableVacation').editable('destroy');
          $('#editableDob').editable('destroy');
          $('#editableEvent').editable('destroy');
          $('#editableMeetingStart').editable('destroy');
          $('#editableComments').editable('destroy');
          $('#editableNote').editable('destroy');
          $('#editablePencil').editable('destroy');
          $('#editableState').editable('destroy');
          $('#editableState2').editable('destroy');
          $('#editableFruits').editable('destroy');
          $('#editableAddress').editable('destroy');
        };

        $.fn.editable.defaults.mode = 'inline';
        init_x_editable();

        // $('#editableControls').on("click", "label", function() {
        //   xMode = $(this).find("input").val();
        //   $.fn.editable.defaults.mode = xMode;
        //   destory_x_editable();
        //   init_x_editable();
        // });
      });
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
        echo $e->getMessages();
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