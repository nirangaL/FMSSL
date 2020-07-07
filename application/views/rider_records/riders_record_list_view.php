
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
            Ridirs Records
            <!--<small>it all starts here</small>-->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box-body well">

<div class="box box-primary col-sm-12 animated zoomIn">
    <div class="panel panel-body">
        <div class="col-sm-1">
            <a href="<?php echo base_url('rider_records/add'); ?>" class="btn btn-success  btn-flat" >Add New  </a> 
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
                       <th>Race</th>
                       <th>Catergory</th>
                       <th>Location</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($riderRecords)) {
                        $today = date('Y-m-d');
                         
                        foreach ($riderRecords as $riderRecord) {
                            ?>
                            <tr>
                                <td> <?php echo $riderRecord->licenceNo; ?></td>   
                                <td> <?php echo $riderRecord->riderName; ?></td>   
                                <td> <?php echo $riderRecord->race; ?></td>   
                                <td> <?php echo $riderRecord->category; ?></td>               
                                <td> <?php echo $riderRecord->location; ?></td>                        
                                <td class=" text-center">                                        
                                    <a type="button" href="<?php echo base_url('rider_records/view').'/'.$riderRecord->id; ?>"><i class="fa fa-external-link"></i></a>  
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
    var table = $('.datatable').DataTable();

} );
</script>