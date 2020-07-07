<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
           <?php echo $title?>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <!-- <?php// print_r($bloodgroups);?> -->
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('rider/edit/').$rider[0]->id;?>" method="post" autocomplete="off" >
                    <div class="box-body">
                        <div class="form-group">
                        <label for="license" class="col-sm-2 control-label ">License# :</label>
                        <div class="col-sm-2">
                            <input id="license" name="license" type="text" class="form-control"  value="<?php 
                            if(set_value('license') !=''){
                                echo set_value('license');
                            }else{
                                echo  $rider[0]->licenseNo;
                            }
                           
                            
                            ?>">
                            <span class="error" id="error"><?php echo form_error('license'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name :</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" type="text" class="form-control"  value="<?php  if(set_value('name') !=''){
                                echo set_value('name');
                            }else{
                                echo  $rider[0]->name;
                            }
                            ?>">
                            <span class="error" id="error"><?php echo form_error('name'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="nic" class="col-sm-2 control-label">NIC : </label>
                        <div class="col-sm-3">
                            <input id="nic" name="nic" type="text" maxlength="12" class="form-control" value="<?php  if(set_value('nic') !=''){
                                echo set_value('nic');
                            }else{
                                echo  $rider[0]->nic;
                            }
                           ; ?>">
                            <span class="error" id="error"><?php echo form_error('nic'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date Of Birth : </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                <input id="dob" name="dob" type="text" maxlength="11" class="form-control datepicker" value="<?php  if(set_value('dob') !=''){
                                echo set_value('dob');
                            }else{
                                echo  $rider[0]->dob;
                            }
                            ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('dob'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address : </label>
                        <div class="col-sm-2">
                        <textarea name="address" id="address" cols="30" rows="4"><?php  if(set_value('address') !=''){
                                echo set_value('address');
                            }else{
                                echo  $rider[0]->address;
                            }
                            ?></textarea>
                        <span class="error" id="error"><?php echo form_error('address'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="phone1" class="col-sm-2 control-label">T.P : </label>
                        <div class="col-sm-3">
                        <input id="phone1" name="phone1" type="text"  class="form-control" value="<?php  if(set_value('phone1') !=''){
                                echo set_value('phone1');
                            }else{
                                echo  $rider[0]->phone1;
                            }?>">
                        <span class="error" id="error"><?php echo form_error('phone1'); ?></span>
                        </div>
                        <div class="col-sm-3">
                        <input id="phone2" name="phone2" type="text" class="form-control" value="<?php  if(set_value('phone2') !=''){
                                echo set_value('phone2');
                            }else{
                                echo  $rider[0]->phone2;
                            }?>">
                        <span class="error" id="error"><?php echo form_error('phone2'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                        <label for="bloodg" class="col-sm-2 control-label">Blood Group : </label>
                        <div class="col-sm-2">
                            <select name="bloodg" id="bloodg" class="form-control" >
                            <option value=""></option>
                            <?php
                                if(!empty($bloodgroups)){
                                    foreach($bloodgroups as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>"  <?php 
                                            if(set_select('bloodg') !=''){
                                                echo set_select('bloodg',$item->id);
                                            }else if($item->id == $rider[0]->bloodGroup){
                                                echo  'selected';
                                            }
                                        ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                            </select>
                            <span class="error" id="error"><?php echo form_error('bloodg'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="lissudate" class="col-sm-2 control-label"> License Issue Date: </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="lissudate" name="lissudate" type="text" class="form-control datepicker" value="<?php if(set_value('lissudate') !=''){
                                echo set_value('lissudate');
                            }else{
                                echo  $rider[0]->licenseIssueDate;
                            } ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('lissudate'); ?></span>
                            </div>

                            <label for="lexdate" class="col-sm-2 control-label"> License Expire Date : </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="lexdate" name="lexdate" type="text" class="form-control datepicker" value="<?php if(set_value('lexdate') !=''){
                                echo set_value('lexdate');
                            }else{
                                echo  $rider[0]->licenseexpDate;
                            } ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('lexdate'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="missuedate" class="col-sm-2 control-label"> Medical Issue Date: </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="missuedate" name="missuedate" type="text"  class="form-control datepicker" value="<?php if(set_value('missuedate') !=''){
                                echo set_value('missuedate');
                            }else{
                                echo  $rider[0]->medicalIssueDate;
                            } ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('missuedate'); ?></span>
                            </div>

                            <label for="mexdate" class="col-sm-2 control-label"> Medical Expire Date : </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="mexdate" name="mexdate" type="text"class="form-control datepicker" value="<?php if(set_value('mexdate') !=''){
                                echo set_value('mexdate');
                            }else{
                                echo  $rider[0]->medicalExpDate;
                            } ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('mexdate'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="insuranceNo" class="col-sm-2 control-label">Insurance Ref.No : </label>
                        <div class="col-sm-3">
                            <input id="insuranceNo" name="insuranceNo" type="text"   class="form-control" value="<?php  if(set_value('insuranceNo') !=''){
                                echo set_value('insuranceNo');
                            }else{
                                echo  $rider[0]->insuNo;
                            }  ?>">
                            <span class="error" id="error"><?php echo form_error('insuranceNo'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="insucat" class="col-sm-2 control-label">Insurance Catergory : </label>
                            <div class="col-sm-2">
                                <select name="insucat" id="insucat" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($insuCat)){
                                    foreach($insuCat as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php 
                                           if(set_select('insucat') !=''){
                                            echo set_select('insucat',$item->id);
                                        }else if($item->id == $rider[0]->insuCat){
                                            echo  'selected';
                                        }
                                         ?>><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('insucat'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="insissuedate" class="col-sm-2 control-label"> Insurance Issue Date: </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="insissuedate" name="insissuedate" type="text" class="form-control datepicker" value="<?php if(set_value('insissuedate') !=''){
                                echo set_value('insissuedate');
                            }else{
                                echo  $rider[0]->insuIssueDate;
                            }  ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('insissuedate'); ?></span>
                            </div>
                            
                            <label for="insexdate" class="col-sm-2 control-label"> Insurance Expire Date : </label>
                            <div class="col-sm-3">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="insexdate" name="insexdate" type="text"class="form-control datepicker" value="<?php if(set_value('insexdate') !=''){
                                echo set_value('insexdate');
                            }else{
                                echo  $rider[0]->insuExpDate;
                            } ?>">
                                </div>
                                <span class="error" id="error"><?php echo form_error('insexdate'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="racingcat" class="col-sm-2 control-label"> Racing Category : </label>
                            <div class="col-sm-3">
                                <select name="racingcat" id="racingcat" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($racingCat)){
                                    foreach($racingCat as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php 
                                          if(set_select('racingcat') !=''){
                                            echo set_select('racingcat',$item->id);
                                        }else if($item->id == $rider[0]->racingCat){
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
                            <label for="ridingcat" class="col-sm-2 control-label">Riding category : </label>
                            <div class="col-sm-3">
                                <select name="ridingcat" id="ridingcat" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($ridingCat)){
                                    foreach($ridingCat as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>"  <?php
                                         if(set_select('ridingcat') !=''){
                                            echo set_select('ridingcat',$item->id);
                                        }else if($item->id == $rider[0]->ridingCat){
                                            echo  'selected';
                                        }
                                        ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('ridingcat'); ?></span>
                            </div>
                            
                        </div>
                        <div class="form-group">
                        <label for="ridingforces" class="col-sm-2 control-label">Riding  forces: </label>
                            <div class="col-sm-3">
                                <select name="ridingforces" id="ridingforces" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($ridingforces)){
                                    foreach($ridingforces as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php
                                           if(set_select('ridingforces') !=''){
                                            echo set_select('ridingforces',$item->id);
                                        }else if($item->id == $rider[0]->ridingForce){
                                            echo  'selected';
                                        }
                                        ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('ridingforces'); ?></span>
                            </div>
                        </div>

                        <div class="form-group  col-sm-12 ">  
                                <label class="col-sm-2 control-label">
                                    <input id="deathRider" name="deathRider" type="checkbox" value="1" <?php echo set_checkbox('active', '1');?> <?php if($rider[0]->deathRider){echo "Checked";}?>> Death Riders
                                </label>

                                <label class="col-sm-2 control-label">
                                    <input id="noRiding" name="noRiding" type="checkbox" value="1" <?php echo set_checkbox('active', '1');?> <?php if($rider[0]->noRiding){echo "Checked";}?>> No Riding 
                                </label>
                            
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