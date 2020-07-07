
<?php
          if(null !== $this->session->flashdata('item')) {
            $message = $this->session->flashdata('item');
               ?>
            <div class="alert ci-flash-alert <?php echo $message['class']?> text-white" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold"> <?php echo $message['msg-title']?></span>&nbsp;&nbsp; <?php echo $message['msg']?>
            </div>
          <?php 
          }
          ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
            Ridirs
            <!--<small>it all starts here</small>-->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box-body well">

<div class="box box-primary col-sm-12 animated zoomIn">
    <div class="panel panel-body">
        <div class="col-sm-1">
            <a href="<?php echo base_url('rider/add'); ?>" class="btn btn-success  btn-flat" >Add New Rider </a> 
        </div> 
        <br>
        <br>
        <hr>
        <!--<div style="background-size:5" style="background-color: white" class="panel panel-body well"></div>-->                                             
        <div class="col-sm-12 table-responsive">                            
            <table id="my_data_table" name="site_list" class="table table-bordered table-striped table-hover table-responsive datatable display" style="width:100%">
                <thead class="bg-black">
                    <tr>
                       <th>License #</th>
                       <th>Name</th>
                       <th>Nic</th>
                       <th>License</th>
                       <th>Insurance </th>
                       <th>Medical </th>
                       <th>Reg.Date </th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($riders)) {
                        $today = date('Y-m-d');
                         
                        foreach ($riders as $rider) {
                            ?>
                            <tr>
                                <td> <?php echo $rider->licenseNo; ?></td>   
                                <td> <?php echo $rider->name; ?></td>   
                                <td> <?php echo $rider->nic; ?></td>               
                                <td class="text-center"> 
                                <?php 
                                 if( $rider->medicalExpDate !=''){
                                    if(strtotime($rider->licenseexpDate) >= strtotime($today)){
                                        ?>
                                        <span class="badge bg-blue"> Valid </span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red ">Expired</span>
                                        <?php
                                    }
                                }else{
                                    ?>
                                   -
                                   <?php 
                                }
                                ?>

                                </td>
                              
                                <td class="text-center"> 
                                <?php 
                                 if( $rider->medicalExpDate !=''){
                                    if(strtotime($rider->medicalExpDate) >= strtotime($today)){
                                        ?>
                                        <span class="badge bg-blue"> Valid </span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red">Expired</span>
                                        <?php
                                    }
                                }else{
                                    ?>
                                   -
                                   <?php 
                                }
                                ?>

                                </td>

                                <td class="text-center"> 
                                <?php 
                                 if( $rider->insuExpDate !=''){
                                    if(strtotime($rider->insuExpDate)  >= strtotime($today)){
                                        ?>
                                        <span class="badge bg-blue"> Valid </span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red">Expired</span>
                                        <?php
                                    }
                                }else{
                                    ?>
                                   -
                                   <?php 
                                }
                                ?>

                                </td>
                                <td> <?php echo date("d-m-Y", strtotime($rider->createDate));?></td> 
                                <td class=" text-center">                                        
                                    <a type="button" href="<?php echo base_url('rider/show').'/'.$rider->id; ?>"><i class="fa fa-external-link"></i></a>  
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--*************************end of creating your amazing application!********************-->
</div><!-- /.box-body -->

    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->

<!-- page script -->
<script>
  $(document).ready(function() {

    // DataTable
    var table = $('.datatable').DataTable({
        "order": [[ 6, "desc" ]]
    });

} );
</script>