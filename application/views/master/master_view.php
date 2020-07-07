<style>
    .bg-darkblue{
        background-color:#34495e !important;
        color:white;
    }

    .bg-neworange{
        background-color:#d35400 !important;
        color:white;
    }
    .bg-newgreen{
        background-color:#01b169 !important;
        color:white;
    }
    .bg-newpurple{
        background-color:#8e44ad !important;
        color:white;
    }
    .bg-newpink{
        background-color:#fa6374 !important;
        color:white;
    }
    .bg-newblue1{
        background-color:#6ab1b8 !important;
        color:white;
    }
    .bg-newgray{
        background-color:#5f5e61 !important;
        color:white;
    }

    .bg-newbrown{
        background-color:#6d4c41 !important;
        color:white;
    }

    .wht{

        color:white;
        -webkit-transition: opacity 1s ease-in-out;
        -moz-transition: opacity 1s ease-in-out;
        -ms-transition: opacity 1s ease-in-out;
        -o-transition: opacity 1s ease-in-out;
        transition: opacity 1s ease-in-out;
        border-radius:0px;
    }
    .wht:hover{
        color:white;
    }
    .wht:active{
        color:white;
        opacity:0.7;

    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <i class="fa fa-th"></i>
            Master Table

        </h1>
    </section>

    <section class="content" style="min-height:600px;">


        <!-- NEW MASTER FILE -->
<br/><br/>



        <div class="col-lg-3 col-xs-3">
            <!--small box-->
            <div class="small-box bg-darkblue">
                <div class="inner">
                    <h3><i class="fa fa-space-shuttle"></i></h3>
                    <p>Racing Category</p>
                </div>
                <div class="icon">
                    <i class="fa fa-space-shuttle"></i>
                </div>
                <a href="<?php echo base_url('master/racecategory'); ?>" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-3">
            <!--small box-->
            <div class="small-box bg-neworange">
                <div class="inner">
                    <h3><i class="fa fa-ambulance"></i></h3>
                    <p>Insurance</p>
                </div>
                <div class="icon">
                    <i class="fa fa-ambulance"></i>
                </div>
                <a href="<?php echo base_url('master/insurance'); ?>" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-3">
            <!--small box-->
            <div class="small-box bg-green-active">
                <div class="inner">
                    <h3><i class="fa fa-automobile "></i></h3>
                    <p>Riding Category</p>
                </div>
                <div class="icon">
                    <i class="fa fa-automobile"></i>
                </div>
                <a href="<?php echo base_url('master/ridingcat'); ?>" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-3">
            <!--small box-->
            <div class="small-box  bg-newgray">
                <div class="inner">
                    <h3><i class="fa  fa-user-secret"></i></h3>
                    <p>Riding Forces</p>
                </div>
                <div class="icon">
                    <i class="fa  fa-user-secret"></i>
                </div>
                <a href="<?php echo base_url('master/ridingforces'); ?>" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-3">
            <!--small box-->
            <div class="small-box  bg-newbrown">
                <div class="inner">
                    <h3><i class="fa  fa fa-road"></i></h3>
                    <p>Race</p>
                </div>
                <div class="icon">
                    <i class="fa  fa fa-road"></i>
                </div>
                <a href="<?php echo base_url('master/race'); ?>" class="small-box-footer">Click Here <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
</section>


</div>