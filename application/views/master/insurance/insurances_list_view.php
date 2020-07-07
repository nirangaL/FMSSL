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
            Insurance
            <!--<small>it all starts here</small>-->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="box-body well">

<div class="box box-primary col-sm-12 animated zoomIn">
    <div class="panel panel-body">
        <div class="col-sm-1">
            <a href="<?php echo base_url('master/insurance/add'); ?>" class="btn btn-success  btn-flat" >Add Insurance</a> 
        </div> 
        <br>
        <br>
        <hr>
        <!--<div style="background-size:5" style="background-color: white" class="panel panel-body well"></div>-->                                             
        <div class="col-sm-12">                            
            <table id="my_data_table" name="site_list" class="table table-bordered table-striped table-hover table-responsive ">
                <thead class="bg-black">
                    <tr>
                       <th>Insurance Name</th>
                       <th>Amount Rs.</th>
                       <th>Description</th>
                       <th>Create Date</th>
                       <th>Status</th>
                       <th>Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($insurances)) {
                        foreach ($insurances as $insurance) {
                            ?>
                            <tr>
                                <td> <?php echo $insurance->insuName; ?></td>   
                                <td class="text-right"> <?php echo number_format($insurance->amount, 2, ".", ","); ; ?></td>   
                                <td> <?php echo $insurance->description; ?></td>               
                                <td> <?php echo $insurance->createDate; ?></td>               
                                <td class="text-center"> 
                                <?php 
                                    if($insurance->active == 1){
                                        ?>
                                        <span class="badge bg-blue">Active</span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red">Deactive</span>
                                        <?php
                                    }
                                ?>

                                </td>

                                <td class="text-blue text-center">                                        
                                    <a type="button" href="<?php echo base_url('master/insurance/view').'/'.$insurance->id; ?>"><i class="fa fa-hand-o-up "></i></a>  
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