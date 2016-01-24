     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo htmlspecialchars($cl->client_nickname); ?></p>
			  <?php $cs = $_SESSION['client_status'];echo '<a><img src="img/client_status/'.$cs.'.png" style="width:16px;height:16px;"/>  Online</a><br />'; ?>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
		  <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>الوصف</span></a></li>
            <li class="header"><?php
			if(isset($_SESSION['client_description'])){
                echo "<div class='description'><p>" .htmlspecialchars($_SESSION['client_description']) . "</p></div>";
                } else {
                echo "لا يوجد وصف‎"; 
                }
			?></li>
			<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>رتبك في السيرفر</span></a></li>
			<li class="header">
			<?php
            $iconosm = 0;
            
            $server_groups = $ts3_VirtualServer->serverGroupList();
            $servergroups = array();
            # En vez de iterar por todos los grupos intenten 
            foreach($server_groups as $group) {
                if($group->type != 1) { continue; }
                    $servergroups[] = array('name' => (string)$group, 'id' => $group->sgid, 'type' => $group->type);
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
                    echo '<img src="./iconos/icons/'.$group['id']. '.png" alt="" />';
                    echo '   '.$group["name"].'<br />';
                } else {
                }           
            }
	

			?>
			</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>لوحة التحكم</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
										  <?php
						if(in_array(2,$_SESSION['ggids'])){
					  ?>
			<li>
              <a href="#">
                <i class="fa fa-th"></i> <span>الادارة</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
					  <?php
					  }
					  ?>
							  <?php
					  $channel_group = $ts3_VirtualServer->channelGroupGetById($_SESSION['channelid']);
					  if($channel_group == $config["channel_admin"]){
					  ?>
			<li>
              <a href="#">
                <i class="fa fa-th"></i> <span>ادارة الغرفة</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
					  <?php
					  }
					  ?>
            <li>
              <a href="#">
                <i class="fa fa-cog"></i> <span>تعديل الالعاب</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-youtube"></i> <span>يوتيوبز</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-home"></i> <span>العشائر</span> <small class="label pull-right bg-green">soon</small>
              </a>
			  <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> التحكم في عشيرة</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> فتح عشيرة</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> الخروج من عشرة</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> ترتيب العشائر</a></li>
              </ul>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-th-list"></i> <span>قائمة البطولات</span> <small class="label pull-right bg-green">soon</small>
              </a>
			  <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> بطولة ماين كرافت</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> البطولات العامة</a></li>
              </ul>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-user"></i> <span>الاصدقاء</span> <small class="label pull-right bg-green">soon</small>
                <!-- <small class="label pull-right bg-yellow">12</small> --> <!-- المتصلين الان من اصدقائك -->
              </a>
			  <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> قائمة الاصدقاء</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> اضافة صديق</a></li>
              </ul>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>المتجر</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-life-buoy"></i> <span> المساعدة</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
			<li>
              <a href="#">
                <i class="fa fa-briefcase"></i> <span>طاقم الادارة</span> <small class="label pull-right bg-green">soon</small>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>