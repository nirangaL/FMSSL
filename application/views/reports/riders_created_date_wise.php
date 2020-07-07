
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
        <form action="<?php echo base_url('reports/RiderCreateDateWise/getData');?>" method="post">
        
        <div class="form-group">
            <label for="bloodg" class="col-sm-1 control-label"> From : </label>
                <div class="col-sm-4">
                <div class="input-group date">
                        <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                         <input id="date1" name="date1" type="text" maxlength="11" class="form-control datepicker" value="<?php echo $selectDate1?>" required>
                </div>
                </div>

                <label for="bloodg" class="col-sm-1 control-label"> To : </label>
                <div class="col-sm-4">
                <div class="input-group date">
                        <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                         <input id="date2" name="date2" type="text" maxlength="11" class="form-control datepicker" value="<?php echo $selectDate2?>" required>
                </div>
                </div>


                <button type="submit" class="btn btn-primary"><i class="fa fa-hand-o-right"></i> Find</button>
        </div> 
        </form>

        <hr>
        <!--<div style="background-size:5" style="background-color: white" class="panel panel-body well"></div>-->                                             
        <div class="col-sm-12 table-responsive">                            
        <table id="my_data_table" name="site_list" class="table table-bordered table-striped table-hover table-responsive datatable display" style="width:100%">
                <thead class="bg-black">
                    <tr>
                       <th>License #</th>
                       <th>Name</th>
                       <th>Nic</th>
                       <th>DOB</th>
                       <th>Adress</th>
                       <th>Blood Group</th>
                       <th>license Issue.Date</th>
                       <th>license Exp.Date</th>
                       <th>Medical Issue.Date</th>
                       <th>Medical Exp.Date</th>
                       <th>Ins No</th>
                       <th>Ins Cat</th>
                       <th>Ins Issue.Date</th>
                       <th>Ins Exp.Date</th>
                       <th>Racing Cat</th>
                       <th>Riding Cat</th>
                       <th>Riding Force</th>
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
                                <td> <?php echo $row->dob; ?></td>                        
                                <td> <?php echo $row->address; ?></td>                        
                                <td> <?php echo $row->blood; ?></td>                        
                                <td> <?php echo $row->licenseIssueDate; ?></td>                        
                                <td> <?php echo $row->licenseexpDate; ?></td>                        
                                <td> <?php echo $row->medicalIssueDate; ?></td>                        
                                <td> <?php echo $row->medicalExpDate; ?></td>                        
                                <td> <?php echo $row->insuNo; ?></td>                        
                                <td> <?php echo $row->insuCat; ?></td>                        
                                <td> <?php echo $row->insuIssueDate; ?></td>                        
                                <td> <?php echo $row->insuExpDate; ?></td>                        
                                <td> <?php echo $row->racCat; ?></td>                        
                                <td> <?php echo $row->ridCat; ?></td>                        
                                <td> <?php echo $row->forces; ?></td>                        
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
 $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

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