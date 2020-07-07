  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Info boxes -->
       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Number of Riders</span>
              <h1 class="info-box-number" style="font-size:50px; margin-top:-2px"><?php echo $riderCount;?></h1>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
     
      </div>
      <!-- / Info boxes -->
      <div class="row">
        <!-- license -->
        <div class="col-sm-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Licence  Expired</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin datatable">
                  <thead>
                  <tr>
                    <th>Licence No</th>
                    <th>Name</th>
                    <th>Nic</th>
                    <th>Exp.Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <?php 
                      if(!empty($liceExp)){

                        foreach($liceExp as $row){
                        ?>
                        <tr>
                        <td><a href="<?php echo base_url('rider/show').'/'.$row->id; ?>"><?php echo $row->licenseNo;?></a></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->nic;?></td>
                        <td>
                        <?php 
                       
                        if($row->licenseexpDate == '0000-00-00'){
                          ?>
                          <span class="label label-warning">
                          <?php
                          echo 'No License';
                        }else{
                          ?>
                          <span class="label label-danger">
                          <?php
                          echo $row->licenseexpDate;
                        }
                        
                        ?>
                        
                        </span></td>
                        </tr>
                        <?php
                        }
                      }
                    ?>

                    
                 

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
        </div>
        <!-- /license -->

        <!-- Medical Expired -->
        <div class="col-sm-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Medical Expired</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Licence No</th>
                    <th>Name</th>
                    <th>Nic</th>
                    <th>Exp.Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <?php 
                      if(!empty($mediExp)){

                        foreach($mediExp as $row){
                        ?>
                        <tr>
                        <td><a href="<?php echo base_url('rider/show').'/'.$row->id; ?>"><?php echo $row->licenseNo;?></a></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->nic;?></td>
                        <td>
                        
                        <?php 
                       
                        if($row->medicalExpDate == '0000-00-00'){
                          ?>
                          <span class="label label-warning">
                          <?php
                          echo 'No Medical';
                        }else{
                          ?>
                          <span class="label label-danger">
                          <?php
                          echo $row->medicalExpDate;
                        }
                        
                        ?>
                        
                        </span></td>
                        </tr>
                        <?php
                        }
                        
                      }
                    ?>

                    
                  

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
        </div>         
        <!-- Medical Expired -->
      </div>

      <div class="row">
       <!-- Medical Expired -->
       <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Insurance Expired</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Licence No</th>
                    <th>Name</th>
                    <th>Nic</th>
                    <th>Insu.No</th>
                    <th>Exp.Date</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                    <?php 
                      if(!empty($insuExp)){

                        foreach($insuExp as $row){
                        ?>
                         <tr>
                        <td><a href="<?php echo base_url('rider/show').'/'.$row->id; ?>"><?php echo $row->licenseNo;?></a></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->nic;?></td>
                        <td><?php echo $row->insuNo;?></td>
                        <td>
                        <?php 
                       
                        if($row->insuExpDate == '0000-00-00'){
                          ?>
                          <span class="label label-warning">
                          <?php
                          echo 'No Insurance';
                        }else{
                          ?>
                          <span class="label label-danger">
                          <?php
                          echo $row->insuExpDate;
                        }
                        
                        ?>
                        
                        </span>
                        
                        </td>
                        <tr>
                        <?php
                        }
                      }
                    ?>

                    
                  </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All</a>
            </div> -->
            <!-- /.box-footer -->
          </div>
        </div>         
        <!-- Medical Expired -->
      </div>


    </section>
    <!-- /.content -->
  </div>