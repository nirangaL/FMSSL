<style>

    .bold{
        font-weight:bold;
    }
    table{
        table-layout: fixed;
    }
    td{
        padding-right:25px;
        word-wrap:break-word;
    }
    tr{
      margin-top:15px;
    }
    tr td:first-child{
        padding-right:50px !important;
        padding-bottom:5px !important;
        width:180px
    }
    tr td:nth-child(2){
        padding-right:50px !important;
        padding-bottom:5px !important;
        width:250px
    }
}

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-bars"></i>
               Rider Details
            <!--<small>it all starts here</small>-->
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-user"></i> <?php echo $rider[0]->name;?>
          <small class="pull-right">Reg. Date: <?php echo  date("Y-m-d", strtotime($rider[0]->createDate));?> </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <!-- <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <?php  $today = date('Y-m-d');?>
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-10 table-responsive">
        <table class="">
          <thead>
          <tr>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td class="bold">License # :</td>
            <td><?php echo $rider[0]->licenseNo;?></td>
            <td></td>
           
          </tr>
          <tr>
            <td class="bold">Name :</td>
            <td><?php echo $rider[0]->name;?></td>
            <td></td>
        
          </tr>
          <tr>
            <td class="bold">NIC :</td>
            <td><?php echo $rider[0]->nic;?></td>
            <td></td>
           
          </tr>
          <tr>
            <td class="bold">Date Of Birth :</td>
            <td><?php echo $rider[0]->dob;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold" style="overflow:hidden">Address :</td>
            <td> 
                <?php echo $rider[0]->address;?>
            </td>
            <td></td>
            
          </tr>
          <tr>
            <td class="bold" style="overflow:hidden">T.P :</td>
            <td> 
                <?php echo $rider[0]->phone1.' / '.$rider[0]->phone2;?>
            </td>
            <td></td>
            
          </tr>
          <tr>
            <td class="bold">Blood Group :</td>
            <td><?php echo $rider[0]->bloodGroup;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">License :</td>
            <td>Issue Date : <?php echo $rider[0]->licenseIssueDate;?></td>
            <td>Exprie Date : 
            <?php 
                echo $rider[0]->licenseexpDate;
                if( $rider[0]->licenseexpDate !=''){
                                    if(strtotime($rider[0]->licenseexpDate) >= strtotime($today)){
                                        ?>
                                        <span class="badge bg-green hidden-print"> Valid </span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red hidden-print">Expired!</span>
                                        <?php
                                    }
                                  }
                                ?>


            </td>
          
          </tr>

          <tr>
            <td class="bold">Medical :</td>
            <td>Issue Date : <?php echo $rider[0]->medicalIssueDate;?></td>
            <td>Exprie Date : 
            <?php 
                echo $rider[0]->medicalExpDate;
                if( $rider[0]->medicalExpDate !=''){
                                    if(strtotime($rider[0]->medicalExpDate) >= strtotime($today)){
                                        ?>
                                        <span class="badge bg-green hidden-print"> Valid </span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red hidden-print">Expired!</span>
                                        <?php
                                    }
                                  }
                                ?>


            </td>
          </tr>
          <tr>
            <td class="bold">Insurance Ref No :</td>
            <td><?php echo $rider[0]->insuNo;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">Insurance Cat :</td>
            <td><?php echo $rider[0]->insuCat;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">Insurance :</td>
            <td>Issue Date : <?php echo $rider[0]->insuIssueDate;?></td>
            <td>Exprie Date : 
            <?php 
                echo $rider[0]->insuExpDate;
                if( $rider[0]->insuExpDate !=''){
                                    if(strtotime($rider[0]->insuExpDate) >= strtotime($today)){
                                        ?>
                                        <span class="badge bg-green hidden-print"> Valid </span>
                                        <?php
                                    }else{
                                        ?>
                                         <span class="badge bg-red hidden-print">Expired!</span>
                                        <?php
                                    }
                                  }
                                ?>


            </td>
          </tr>
          <tr>
            <td class="bold">Racing Category :</td>
            <td><?php echo $rider[0]->racingCat;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">Riding Category :</td>
            <td><?php echo $rider[0]->ridingCat;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">Riding Forces :</td>
            <td><?php echo $rider[0]->ridingForce;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">Death :</td>
            <td><?php 
            if($rider[0]->deathRider == '1'){
              echo 'Yes';
            }else{
              echo 'No';
            }
            ?></td>
            <td></td>
          </tr>
          <tr>
            <td class="bold">No Riding :</td>
            <td><?php 
            if($rider[0]->noRiding == '1'){
              echo 'Yes';
            }else{
              echo 'No';
            }
            ?></td>
            <td></td>
          </tr>
          </tbody>
        </table>
       
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <div style="padding:15px;">
    <div class="panel panel-body ">
        <div class="col-sm-8"></div>
        <div class="col-sm-4 text-right">
            <a href="<?php echo base_url('rider/edit/').$rider[0]->id; ?>" class="btn btn-warning hidden-print" ><i class="fa fa-edit"></i> Edit </a> 
            <button class="btn btn-default hidden-print" onclick="printPage()" ><i class="fa fa-print"></i> Print </button>
            <button class="btn btn-danger hidden-print" onclick=" riderDelete(<?php echo $rider[0]->id?>)" ><i class="fa  fa-trash"></i> Delete </button>
        </div> 
        <!-- <div class="col-sm-1 ">
            <a href="<?php echo base_url('rider/add'); ?>" class="btn btn-default" >Print </a> 
        </div>  -->
        </div> 
        </div> 

                                
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->

<script>
    function printPage() {
        window.print();
    }

    function riderDelete(id){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: ' #d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            window.location.replace("<?php echo base_url('rider/delete/')?>"+id+"");
        }
        })
    }
    
</script>