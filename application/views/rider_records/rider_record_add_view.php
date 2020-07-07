

<style>
  .select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 34px;
    user-select: none;
    -webkit-user-select: none;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 4px;
    right: 1px;
    width: 20px;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
            Rider Record
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
            <!-- <?php// print_r($bloodgroups);?> -->
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo base_url('rider_records/store');?>" method="post" autocomplete="off" >
                    <div class="box-body">
                        <div class="form-group">
                        <label for="licence" class="col-sm-2 control-label ">Licence# :</label> 
                        <div class="col-sm-2">
                                <select name="licence" id="licence" class="form-control select2" onChange="getName()">
                                <option value=""></option>
                                <?php
                                if(!empty($licenceNos)){
                                    foreach($licenceNos as $item){
                                        ?>
                                         <option value="<?php echo $item->licenseNo;?>" <?php echo set_select('licence',$item->licenseNo); ?> ><?php echo $item->licenseNo;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('licence'); ?></span>
                            </div>
                        
                        <label for="name" class="col-sm-2 control-label">Name :</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" type="text" class="form-control"  value="<?php echo set_value('name'); ?>" readonly>
                            <span class="error" id="error"><?php echo form_error('name'); ?></span>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="race" class="col-sm-2 control-label"> Race : </label>
                            <div class="col-sm-4">
                                <select name="race" id="race" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($race)){
                                    foreach($race as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php echo set_select('race',$item->id); ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('race'); ?></span>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="racingcat" class="col-sm-2 control-label">Category : </label>
                            <div class="col-sm-4">
                                <select name="racingcat" id="racingcat" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($ridingCat)){
                                    foreach($ridingCat as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>"  <?php echo set_select('racingcat',$item->id); ?> ><?php echo $item->name;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('racingcat'); ?></span>
                            </div>
                            
                        </div>
                        <div class="form-group">
                        <label for="location" class="col-sm-2 control-label">Riding  Location: </label>
                            <div class="col-sm-4">
                                <select name="location" id="location" class="form-control">
                                <option value=""></option>
                                <?php
                                if(!empty($location)){
                                    foreach($location as $item){
                                        ?>
                                         <option value="<?php echo $item->id;?>" <?php echo set_select('location',$item->id); ?> ><?php echo $item->location;?></option>   
                                        <?php
                                    }
                                }
                            ?>
                                </select>
                                <span class="error" id="error"><?php echo form_error('location'); ?></span>
                            </div>
                        </div>
                    </div>
                <!-- /.box-body -->
                    <div class="box-footer text-right">
                        
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Clear</button>
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

    $('.select2').select2();

    function getName(){
       var id =  $('#licence').val();

       if(id != ''){

        $.ajax({
            data: {
                id:id,
            },
            type: 'POST',
            url: '<?php echo base_url('rider_records/getName')?>',
            success: function(data, textStatus, jqXHR) {
                $('#name').val(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // When AJAX call has failed
                console.log('AJAX call failed.');
                console.log(textStatus + ': ' + errorThrown);
            }
        });

       }else{
        $('#name').val('');
       }
    }

</script>