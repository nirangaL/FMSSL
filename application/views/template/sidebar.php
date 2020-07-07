 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/adminlte/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['session_user_data']['name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="<?php echo base_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li >
          <a href="<?php echo base_url('master/master')?>">
            <i class="fa fa-th"></i> <span>Master</span>
          </a>
        </li>

        <li >
          <a href="<?php echo base_url('rider')?>">
            <i class="fa fa-user"></i> <span>Rider Mng</span>
          </a>
        </li>

        <li >
          <a href="<?php echo base_url('rider_records')?>">
            <i class="fa fa-trophy"></i> <span>Rider Records</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="treeview">
          <a href="#">
            <i class="fa fa fa-book"></i>
            <span>Rider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('reports/RiderCreateDateWise')?>"><i class="fa fa-circle-o"></i>Riding Create Date Wise </a></li>
            <li><a href="<?php echo base_url('reports/racingcatwise')?>"><i class="fa fa-circle-o"></i>Racing Category Wise </a></li>
            <li><a href="<?php echo base_url('reports/ForcesWise')?>"><i class="fa fa-circle-o"></i>Forces Wise </a></li>
            <li><a href="<?php echo base_url('reports/AllRidersList')?>"><i class="fa fa-circle-o"></i>All Riders </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-book"></i>
            <span>Insurance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('reports/AllInsuRiderList')?>"><i class="fa fa-circle-o"></i>All Insu List </a></li> 
            <li><a href="<?php echo base_url('reports/InsuExp')?>"><i class="fa fa-circle-o"></i>Insu Expire  </a></li>
            <li><a href="<?php echo base_url('reports/InsuCatWise')?>"><i class="fa fa-circle-o"></i>Insurance Category Wise </a></li>
         
            <!-- <li><a href="<?php echo base_url('reports/AllRidersList')?>"><i class="fa fa-circle-o"></i>All Riders </a></li>  -->
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-book"></i>
            <span>Medical</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url('reports/AllMediRiderList')?>"><i class="fa fa-circle-o"></i>All Medical Riders </a></li>
            <li><a href="<?php echo base_url('reports/MedicalExp')?>"><i class="fa fa-circle-o"></i>Medical Expire </a></li>
            
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-book"></i>
            <span>Rider Records</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url('reports/LicenceNoWiseRIderRecords')?>"><i class="fa fa-circle-o"></i>Licence No wise </a></li>
            <li><a href="<?php echo base_url('reports/RiderRecordsRaceWise')?>"><i class="fa fa-circle-o"></i>Race Wise Riders </a></li>
            
          </ul>
        </li>


          </ul>
        </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>