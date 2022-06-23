<!DOCTYPE html>
<html lang="en">
<head>
    <title>OEE Monitoring!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Link For Bootstrap -->
    <link href="<?php echo base_url()?>/bootstrap_5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.min.js"></script>
    
    <!--Link For CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/css_general.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/production.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management_sub.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_size_css.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/sidemenubar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings_sub.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_sub_test.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_test1.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/graph.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management_sub2.css">
    <!-- temporary for strategy wait for part settings input alignment changes -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/css_demo1.css">

    
    <!-- javascript link for date time -->
<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/common1.js"></script>


<!-- strategy current shift in general settings css -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/current_shift.css">

    <!--Link For FONTS-->
    <link href="<?php echo base_url()?>/assets/fonts/Roboto/Roboto-Black.ttf" rel="stylesheet">

    <!--Script For Menu-Ellipsis Vertical Icon-->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUC"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .paddingm{
      padding: 0;
      margin: 0;
    }

    .sidenave-hover:hover{
        background-color:#EFF7FF;
        color:#595959;
    }
    .icon-font{
        font-size:1.4rem;
        justify-content:center;

    }
    .icon-font1{
        font-size:1.4rem;
        padding: 2px 2px 2px 10px;

    }
    .right-type{
        text-align:right;
        right:1.2rem;
        padding-right:1.2rem;
    }
    .fontbox{
        /*white-space: nowrap; */
        width: 10rem; 
        overflow: hidden;
        text-overflow: ellipsis;
    }
    #settings_div .row .marright1 p {
    text-align: right;
    margin-right: 3rem;
}

.divbox_reject  .divinput_box_reject label {
    position: absolute;
    top: -9px;
    left: 25px;
    color: #999;
    background-color: white;
    transition: 0.5s;
    pointer-events: none;
    font-family: 'Roboto', sans-serif;
    font-size:12px;
    color:#8c8c8c;
    margin-bottom: 0px;
    margin-top: 0px;
}
    .font_weight{
        font-weight: 500;
        font-family: 'Roboto' sans-serif;

    }
    /* .after-industry:active:after{
        background-color:white;
        color:blue;
        font-size:1.8rem;
    }
   */
    /*@media only screen and (min-width: 960px) and (max-width: 1199px) {
        .side-menu {
            margin-left:10px;
        }
    }*/
    .font_weight_modal{
        font-family: 'Roboto' sans-serif;
        font-weight: 550;
    }
</style>
</head>

<body>
<!-- <div> -->  
        <?php require_once 'Header.php' ?>
        <div class="row paddingm"  >
            <!-- side nav bar -->
             <div class="col-lg paddingm left-sidebar" style="top:4rem;">
                <ul class="side-menu">
                        <li class="side-menu-li d-flex" style="margin-top:2rem;">
                            <a href="#">
                                <i class="fa fa-line-chart nav-icon" style="font-size: 30px;" dvalue="Financial" alt="Financial"></i>
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font1"></i>
                            <ul>
                                 <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">FINANCIAL METRICS</p> 
                                </nav>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center; " class="icon-align ">
                                        <i class="fa  fa-angle-double-down paddingm icon-sub " style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;" >
                                        <a href="<?= base_url('Home/load_option/Financial_FOeeDrillDown')?>" id="active-demo" class="nav-sub " dvalue="FOeeDrillDown">OEE DRILL DOWN</a>
                                    </div>
                                </li>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-lightbulb-o paddingm color icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;" class="">
                                        <a href="<?= base_url('Home/load_option/Financial_OpportunityInsights')?>"   dvalue="OpportunityInsights" class=" nav-sub">OPPORTUNITY INSIGHTS</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="side-menu-li d-flex">
                            <a href="#">
                                <i class="nav-icon fa fa-industry after-industry" dvalue="Production" style="font-size: 30px;" alt="Production"></i>
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font1"></i>
                            <ul>
                                 <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">PRODUCTION DATA MANAGEMENT</p> 
                                </nav>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-clock-o paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Production_Downtime')?>" class="nav-sub " dvalue="Downtime">DOWNTIME</a>
                                        <!-- <a href="<?= base_url('Home/load_option/Production_Downtime_Up')?>" class="nav-sub " dvalue="Downtime">DOWNTIME</a> -->

                                    </div>
                                </li>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-ban paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Production_Rejection')?>" class="nav-sub" dvalue="Rejection">QUALITY REJECTS</a>
                                    </div>
                                </li>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-check paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Production_Corrections')?>" class="nav-sub " dvalue="Corrections">CORRECTIONS</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="side-menu-li d-flex ">
                            <a href="<?= base_url('Home/load_option/Current_Shift_Performance')?>">
                                <i class="nav-icon fa fa-clock-o " style="font-size: 30px;" dvalue="Current" alt="Current Shift"></i>
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font1" style=""></i>
                            <ul>
                                 <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">CURRENT SHIFT PERFORMANCE</p> 
                                </nav>
                            </ul>
                        </li>
                        <li class="side-menu-li d-flex ">
                            <a href="#">
                                <i class="nav-icon fa fa-gear" dvalue="Settings" style="font-size: 30px;" alt="Settings"></i>
                            </a>
                            <i class="fa fa-ellipsis-v icons-menu icon-font1" style=""></i>
                            <ul>
                                <nav style="border-bottom:1px solid #d9d9d9;">
                                    <p class="nav-menu-title">SETTINGS</p>
                                </nav>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-angle-double-down paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                         <a href="<?= base_url('Home/load_option/Settings_Machines')?>" class="nav-sub" dvalue="Machines">MACHINE</a>
                                    </div>
                                </li>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-lightbulb-o paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                         <a href="<?= base_url('Home/load_option/Settings_Tools')?>" class="nav-sub" dvalue="Tools">PARTS</a>
                                    </div>
                                </li>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-bullseye paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Settings_Goals_Others')?>" class="nav-sub " dvalue="Goals">GENERAL</a>
                                    </div>
                                </li>
                                <?php if ($this->data['access'][0]['settings_user_management']  >=1) {?>
                                <li class="flex-container sidenave-hover">
                                    <div style="width: 10%;justify-content: center;" class="icon-align">
                                        <i class="fa fa-user-circle-o paddingm icon-sub" style="font-style: 15px;"></i>
                                    </div>
                                    <div style="width: 90%;">
                                        <a href="<?= base_url('Home/load_option/Settings_Users')?>" class="nav-sub" dvalue="Users">USER ACCOUNT</a>
                                    </div>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                </ul>
            </div> 
            <div class="col-lg paddingm">        
                <?php
                     
                    if($select_opt == null && $select_sub_opt == null ){
                        echo "<h1 style='margin-left:6rem;'>No Records Founds!!</h1>" ;
                        echo "<pre>";
                        //echo $this->data['access'][0]['Settings_Machine'];
                    }
                    elseif($select_opt != null && $select_sub_opt == null)
                    {
                        echo view(''. $this->data['select_opt'].'',$this->data);
                    }
                    else{
                        echo view(''. $this->data['select_opt'].'',$this->data);
                    }
                ?>
            </div>        
        </div>
    <!-- </div> -->
<!-- </div> -->
</body>
</html>
<script>
    var MenuOpt = '<?php echo $this->data['select_opt']; ?>';
    var MenuSub = MenuOpt.split("_");
    var listIcons = document.getElementsByClassName("nav-icon");
    var listSubMenu = document.getElementsByClassName("nav-sub");
    var subicon = document.getElementsByClassName("icon-sub");
      for (var i = 0; i < listIcons.length; i++) {
        var x = listIcons[i].getAttribute("dvalue");
         if(MenuSub[0] == x){
             
            listIcons[i].style = "background-color:#005abc;color:white;font-style: 15px;";
         }
      }
      for (var i = 0; i < listSubMenu.length; i++) {
         var y = listSubMenu[i].getAttribute("dvalue");
         //alert(y);
          if(MenuSub[1] == y){
           
           listSubMenu[i].style = "color:#005abc;font-weight:bold";
          subicon[i].style = "color:#005abc;font-weight:bold";
           //listIcons[i].style = "color:#005abc;font-weight:bold";
          }
      }

   
      
</script>
