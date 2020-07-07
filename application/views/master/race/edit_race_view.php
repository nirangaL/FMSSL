<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
            Race
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

                <form role="form" action="<?php echo base_url('master/race/edit/').$race[0]->id;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="race_name">Race Name :</label>
                  <input id="race_name" name="race_name" type="text" value="<?php echo $race[0]->name; ?>" class="form-control" >
                  <span class="error" id="error"><?php echo form_error('race_name'); ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea id="race_desc" name="race_desc" class="form-control" rows="3"><?php echo $race[0]->description; ?></textarea>
                </div>
                
                <div class="checkbox">
                  <label>
                    <input id="active" name="active" type="checkbox" value="1" <?php if($race[0]->active == 1){echo 'checked';}?> > Active
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-warning"><i class="fa a-arrow-circle-o-down"></i> update</button>
              </div>
            </form>

                </div>
            </div>
            <!-- form start -->



         
          </div>


   

    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->