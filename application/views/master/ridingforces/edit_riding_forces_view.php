<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
            Riding Forces
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

                <form role="form" action="<?php echo base_url('master/ridingforces/edit/').$category[0]->id;?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="cat_name">Forces Name :</label>
                  <input id="cat_name" name="cat_name" type="text" value="<?php echo $category[0]->name; ?>" class="form-control" >
                  <span class="error" id="error"><?php echo form_error('cat_name'); ?></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <textarea id="cat_desc" name="cat_desc" class="form-control" rows="3"><?php echo $category[0]->description; ?></textarea>
                </div>
                
                <div class="checkbox">
                  <label>
                    <input id="active" name="active" type="checkbox" value="1" <?php if($category[0]->active == 1){echo 'checked';}?> > Active
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