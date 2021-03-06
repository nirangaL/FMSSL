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
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit</h3>
            </div>
            <!-- /.box-header -->
            <div class="row">
                <div class="col-sm-6">

                <form role="form" action="<?php echo base_url('master/insurance/edit/').$insurance[0]->id?>" method="post">
              <div class="box-body">
                <div class="form-group col-sm-12">
                  <label for="cat_name">Insurance Name :</label>
                  <input id="insu_name" name="insu_name" type="text" value="<?php echo $insurance[0]->insuName; ?>" class="form-control" >
                  <span class="error" id="error"><?php echo form_error('insu_name'); ?></span>
                </div>
                <div class="form-group col-sm-6">
                  <label for="exampleInputPassword1">Amount Rs:</label>
                  <input id="amount" name="amount" type="text" value="<?php echo $insurance[0]->amount; ?>" class="form-control text-right">
                  <span class="error" id="error"><?php echo form_error('amount'); ?></span>
                </div>
                <div class="form-group col-sm-12">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea id="insu_desc" name="insu_desc" class="form-control" rows="3"><?php echo $insurance[0]->description; ?></textarea>
                </div>
                <div class="form-group col-sm-12">
                <div class="checkbox">
                  <label>
                    <input id="active" name="active" type="checkbox" value="1" <?php if($insurance[0]->active == 1){echo 'checked';}?> > Active
                  </label>
                </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer col-sm-12">
                <button type="submit" class="btn btn-warning"><i class="fa  a-arrow-circle-o-down"></i> Update </button>

              </div>
            </form>

                </div>
            </div>
            <!-- form start -->

          </div>

    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->


<script>
  // this example uses the id selector & no options passed    
  jQuery(function($) {
      $('#amount').autoNumeric('init');    
  });
</script>