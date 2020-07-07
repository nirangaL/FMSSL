
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
        <form action="<?php echo base_url('reports/ForcesWise/getData');?>" method="post">
        
        <div class="form-group">
            <label for="bloodg" class="col-sm-2 control-label">Riding Category : </label>
                <div class="col-sm-3">
                    <select name="racingCat" id="racingCat" class="form-control" required>
                        <option value="0">All</option>
                        <?php
                        if(!empty($forces)){
                            foreach($forces as $item){
                            ?>
                            <option value="<?php echo $item->id;?>"  <?php echo set_select('racingCat',$item->id); ?> ><?php echo $item->name;?></option>   
                            <?php
                            }
                        }
                        ?>
                        </select>
                        <span class="error" id="error"><?php echo form_error('racingCat'); ?></span>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-hand-o-right"></i> Find</button>
        </div> 
        </form>
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
                       <th>Racing Category</th>
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
                                <td> <?php echo $row->cat; ?></td>                        
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