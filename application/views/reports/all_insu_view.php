
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
        <h3>
            <i class="fa fa-hashtag"></i>
            <?php echo $title;?>
            <!--<small>it all starts here</small>-->
        </h3>
    </section>
    <!-- <?php print_r($forces);?> -->
    <!-- Main content -->
    <section class="content">

    <div class="box-body well">

<div class="box box-primary col-sm-12 animated zoomIn">
    <div class="panel panel-body">
        <div class="col-sm-12">
       
        <!--<div style="background-size:5" style="background-color: white" class="panel panel-body well"></div>-->                                             
        <div class="col-sm-12 table-responsive">                            
            <table id="my_data_table" name="site_list" class="table table-bordered table-striped table-hover table-responsive datatable display" style="width:100%">
                <thead class="bg-black">
                    <tr>
                       <th>License #</th>
                       <th>Name</th>
                       <th>Nic</th>
                       <th>Ins No</th>
                       <th>Ins Cat</th>
                       <th>Ins Issue.Date</th>
                       <th>Ins Exp.Date</th>
                       <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($tblData)) {
                        $today = date('Y-m-d');
                        foreach ($tblData as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $row->licenseNo; ?></td>   
                                <td> <?php echo $row->name; ?></td>   
                                <td> <?php echo $row->nic; ?></td>                                 
                                <td> <?php echo $row->insuNo; ?></td>                        
                                <td> <?php echo $row->insuName; ?></td>                        
                                <td> <?php echo $row->insuIssueDate; ?></td>                        
                                <td> <?php echo $row->insuExpDate; ?></td>                                            
                                <td class=" text-center">                                        
                                    <a type="button" href="<?php echo base_url('rider/show').'/'.$row->id; ?>" target="_blank"><i class="fa fa-external-link"></i></a>  
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
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
} );
</script>