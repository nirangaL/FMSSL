<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
           <?php echo $title?>
        </h1>
        <!-- <?php print_r($riderRec);?>  -->
    </section>
    <!-- Main content -->
    <section class="content">
            <!-- <?php// print_r($bloodgroups);?> -->
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('rider_records/edit/').$riderRec[0]->id;?>" method="post" autocomplete="off" >
                    <div class="box-body">
                        <div class="form-group">
                        <label for="licence" class="col-sm-2 control-label ">licence# :</label>
                        <div class="col-sm-2">
                            <input id="licence" name="licence" type="text" class="form-control"  value="<?php 
                            if(set_value('licence') !=''){
                                echo set_value('licence');
                            }else{
                                echo  $riderRec[0]->licenceNo;
                            }
                           
                            ?>" readonly>
                            <span class="error" id="error"><?php echo form_error('licence'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name :</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" type="text" class="form-control"  value="<?php  if(set_value('name') !=''){
                                echo set_value('name');
                            }else{
                                echo  $riderRec[0]->riderName;
                            }
                            ?>" readonly>
                            <span class="error" id="error"><?php echo form_error('name'); ?></span>
                        </div>
                        </div>


                        <div class="form-group">
                            <label for="race" class="col-sm-2 control-label"> Race : </label>
                            <div class="col-sm-4">
                                <select name="race" id="race" class="form-control">
                                <?php
                                if(!empty($race)){
                                    foreach($race as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php 
                                          if(set_select('race') !=''){
                                            echo set_select('race',$item->id);
                                        }else if($item->id == $riderRec[0]->race){
                                            echo  'selected';
                                        }
                                         ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('racingcat'); ?></span>
                            </div>
                            </div>
                      
                        <div class="form-group">
                            <label for="racingcat" class="col-sm-2 control-label"> Racing Category : </label>
                            <div class="col-sm-4">
                                <select name="racingcat" id="racingcat" class="form-control">
                                <?php
                                if(!empty($racingCat)){
                                    foreach($racingCat as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php 
                                          if(set_select('racingcat') !=''){
                                            echo set_select('racingcat',$item->id);
                                        }else if($item->id == $riderRec[0]->category){
                                            echo  'selected';
                                        }
                                         ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('racingcat'); ?></span>
                            </div>
                            
                            
                        </div>
                        <div class="form-group">
                        <label for="location" class="col-sm-2 control-label">Riding  forces: </label>
                            <div class="col-sm-4">
                                <select name="location" id="location" class="form-control">
                                <?php
                                if(!empty($locations)){
                                    foreach($locations as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php
                                           if(set_select('location') !=''){
                                            echo set_select('location',$item->id);
                                        }else if($item->id == $riderRec[0]->location){
                                            echo  'selected';
                                        }
                                        ?> ><?php echo $item->location;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('location'); ?></span>
                            </div>
                        
                    </div>
                <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-warning"><i class="fa  fa-arrow-circle-o-down"></i> Update</button>
                        <!-- <button type="submit" class="btn btn-danger"><i class="fa  fa-trash"></i> Delete</button> -->
                    </div>
                <!-- /.box-footer -->
                </form>
            </div>
          <!-- /.box -->
        </div>
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->

<script>
    
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })
</script>