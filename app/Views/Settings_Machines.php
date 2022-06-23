<style type="text/css">
    .contentContainer{
        margin-top: 4.5rem;
    }
    .padin{
        padding-left:1.5rem;
    }
     .img_font_wh{
        width: 1.9rem;
        height: 1.4rem;
        padding-right: 0.6rem;
    }
    .img_font_wh1{
        width: 1.8rem;
        height: 1.2rem;
        padding-right: 0.6rem;
        color: #a6a6a6;
    }
    .img_font_wh2{
        width: 1.9rem;
        height: 1.2rem;
        padding-right: 0.6rem;
        color: #a6a6a6;
    }
    .menu-font-change{
        font-size: 0.5rem;

    }
    .mar_right{
        padding-left: 1rem;
    }
   /* .font_weight{
        font-weight: bold;
        font-size: 1rem;
    }*/
    .left-align{
        
        padding-left:1.4rem;
 
     }
</style>
<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Machine Settings</p>
              <div class="d-flex">
                    
                    <p class="float-end stcode" class="active_click" style="color: #005CBC;">
                        <span  id="Active"></span>Active
                    </p>
                    <p class="float-end stcode" style="color: #C00000;">
                        <span  id="Iactive"></span>Inactive
                    </p>
              </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
          <div class="container-fluid paddingm ">
            <p class="float-start"></p>
              <div class="d-flex innerNav">
                    <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class=" float-end  undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;"></i>
                    <a style="background: #cde4ff;color: #005abc;width:7rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#FilterMachineModal" id="filterData">FILTER</a>

                    <?php 
                         if($this->data['access'][0]['settings_machine'] == 3){ 
                    ?>

<!--                     <a style="background: #005abc;color: white;width:9rem;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#AddMachineModal">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD MACHINE
                    </a>   -->
                    <a style="background: #005abc;color: white;width:9rem;" class="settings_nav_anchor float-end" id="add_machine_button">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD MACHINE
                    </a>  

                    <?php 
                         }
                    ?>
                </div>
            </div>
        </nav>
        <div class="tableContent">
            <div class="settings_machine_header sticky-top fixtabletitle">
                <div class="row paddingm">
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">MACHINE ID</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">MACHINE NAME</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm mar_right">
                      <p class="basic_right">MACHINE RATE HOUR</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm ">
                      <p class="basic_right">MACHINE OFF RATE HOUR</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">TONNAGE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">MACHINE BRAND</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">STATUS</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="justify-content: center;">
                      <p class="basic_header">ACTION</p>
                    </div>
                </div>
            </div>

            <div class="contentMachine contentContainer paddingm ">
            <?php
                        if($this->data['settings_machine'] != null)
                        {
                            foreach ($this->data['settings_machine'] as $row) {
                                 $img = base_url('assets/img/pencil.png');
                                    $img1 = base_url('assets/img/delete.png');
                                    $img2 = base_url('assets/img/info.png');
                                    $img3 = base_url('assets/img/activate.png');
                                // $datetime = explode(" ",$row['Last_Updated_On']);
                                // $date = $datetime[0];
                                if ($row['status'] == 1) {
                                   
                                    //echo "active";
                                    echo('
                                        <div id="settings_div" class="active_div">
                                            <div class="row paddingm">
                                                <div class="col-sm-1 col marleft" ><p>'.$row['machine_id'].'</p></div>
                                                <div class="col-sm-2 col marleft" ><p title="'.$row['machine_name'].'">'.$row['machine_name'].'</p></div>        
                                                <div class="col-sm-2 col marright" >
                                                    <p><i class="fa fa-inr" style="margin-right:5px;"></i>'.number_format((float)$row['rate_per_hour'], 2, '.', '').'</p>
                                                </div>
                                                <div class="col-sm-2 col marright" >
                                                    <p><i class="fa fa-inr" style="margin-right:5px;"></i>'.number_format((float)$row['machine_offrate_per_hour'], 2, '.', '').'</p>
                                                </div>
                                                <div class="col-sm-1 col marleft" ><p>'.$row['tonnage'].'T</p></div>
                                                <div class="col-sm-2 col marleft" ><p>'.$row['machine_brand'].'</p></div>
                                                <div class="col-sm-1 col settings_active marleft" style="color:#005CBC;"><p style="color: #005CBC"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>
                                                <div class="col-sm-1 col d-flex justify-content-center fasdiv">
                                                    <ul class="edit-menu">
                                                        <li class="d-flex justify-content-center">
                                                            <a href="#">
                                                                <i class="edit fa fa-ellipsis-v icon-font text-grey" alt="Edit"></i>
                                                            </a>
                                                            <ul class="edit-subMenu">
                                                                <li class="edit-opt info-machine1" lvalue="'.$row['machine_id'].'" style="display:none;"><a href="#"><img src="'.$img2.'" class="img_font_wh2" style="margin-left:5px;">INFO</a></li>
                                                                <li class="edit-opt edit-machine menu-font-change" lvalue="'.$row['machine_id'].'" ><a href="#"><img src="'.$img.'" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>
                                                                <li class="edit-opt deactivate-machine" lvalue="'.$row['machine_id'].'" svalue="'.$row['status'].'"><a href="#"><img src="'.$img1.'" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>                
                                                </div>
                                                
                                            </div>
                                        </div>
                                    ');
                                 }
                                else{
                                    echo('
                                        <div id="settings_div" class="inactive_div">
                                            <div class="row paddingm">
                                                <div class="col-sm-1 col marleft" ><p>'.$row['machine_id'].'</p></div>
                                                <div class="col-sm-2 col marleft" ><p title="'.$row['machine_name'].'">'.$row['machine_name'].'</p></div>        
                                                <div class="col-sm-2 col marright" >
                                                    <p><i class="fa fa-inr" style="margin-right:5px;"></i>'.number_format((float)$row['rate_per_hour'], 2, '.', '').'</p>
                                                </div>
                                                <div class="col-sm-2 col marright" >
                                                    <p><i class="fa fa-inr" style="margin-right:5px;"></i>'.number_format((float)$row['machine_offrate_per_hour'], 2, '.', '').'</p>
                                                </div> 
                                                <div class="col-sm-1 col marleft" ><p>'.$row['tonnage'].'T</p></div>
                                                <div class="col-sm-2 col marleft" ><p>'.$row['machine_brand'].'</p></div>
                                                <div class="col-sm-1 col settings_active marleft" style="color:#C00000;"><p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>
                                                <div class="col-sm-1 col d-flex justify-content-center fasdiv">
                                                    <ul class="edit-menu">
                                                        <li class="d-flex justify-content-center">
                                                            <a href="#">
                                                                <i class="edit fa fa-ellipsis-v icon-font text-grey" alt="Edit"></i>
                                                            </a>
                                                            <ul class="edit-subMenu">
                                                                <li class="edit-opt info-machine" lvalue="'.$row['machine_id'].'"><a href="#"><img src="'.$img2.'" class="img_font_wh2" style="margin-left:5px;">INFO</a></li>
                                                                <li class="edit-opt activate-machine" lvalue="'.$row['machine_id'].'" svalue="'.$row['status'].'"><a href="#"><img src="'.$img3.'" class="img_font_wh2" style="margin-left:5px;font-size:15px;">ACTIVATE</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>                
                                                </div>
                                                
                                            </div>
                                        </div>
                                    ');
                                   // echo "Inactive";
                                }
                                
                            }
                        }
                        else{
                            echo ('<div id="settings_div">
                                    <div class="row paddingm">
                                        <div class="col-lg col textAlignCenter" ><p>*No Records Found!</p></div>
                                    </div>
                                    </div>
                                ');
                        }
            ?>
            </div>
        </div>
</div>

<div class="modal fade" id="AddMachineModal" tabindex="-1" aria-labelledby="AddMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="AddMachineModal1" style="">ADD MACHINE</h5>
            </div> 
            <form method="post" class="addMachineForm" id="AddMachineFormSub" action="<?= base_url('Settings_controller/addMachine/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">      
                                <input type="text" class="form-control font_weight_modal" id="inputMachineName" name="inputMachineName">
                                <label for="inputMachineName" class="input-padding">Machine Name</label>
                                <span class="paddingm float-start validate" id="inputMachineNameErr"></span> 
                                <span class="float-end charCount" id="inputMachineNameCunt"></span> 
                            </div>
                        </div>
                    </div>
                    <div class="row">                      
                        <div class="col-lg-3 box">
                            <div class=" input-box fieldStyle">
                                <input type="text" class="form-control padin font_weight_modal" id="inputMachineRateHour" name="inputMachineRateHour">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label for="inputMachineRateHour" class="input-padding">Machine Rate Hour</label>
                                <span class="paddingm float-start validate" id="inputMachineRateHourErr"></span> 
                                
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input padin font_weight_modal" id="inputMachineOffRateHour" name="inputMachineOffRateHour">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label for="inputMachineOffRateHour" class="input-padding">Machine OFF Rate Hour</label>
                                <span class="paddingm float-start validate" id="inputMachineOffRateHourErr"></span> 
                                <!-- <span class="float-end charCount">Character Count</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class=" input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputTonnage" name="inputTonnage">
                                <label for="inputTonnage" class="input-padding">Tonnage</label>
                                <span class="paddingm float-start validate" id="inputTonnageErr"></span> 
                                <span class="unit clip">T</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputMachineBrand" name="inputMachineBrand">
                                <label for="inputMachineBrand" class="input-padding">Machine Brand</label>
                                <span class="paddingm float-start validate" id="inputMachineBrandErr"></span> 
                                <span class="float-end charCount" id="inputMachineBrandCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-5 box" >
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputMachineSerialId" name="inputMachineSerialId">
                                <label for="inputNewSiteName" class="input-padding">Machine serial ID</label>
                                <span class="paddingm float-start validate" id="inputMachineSerialId_err"></span> 
                                <span class="float-end charCount" id="inputNewSiteNameCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <input type="text" class="form-control form-control-md" name="site_id" id="site_id" value="<?php echo  $this->data['user_details'][0]['site_id']; ?>">
                    </div>
                </div>

                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Add_Machine_Data saveBtnStyle" name="Add_Machine" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveMachineModal" tabindex="-1" aria-labelledby="DeactiveMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveMachineModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body" style="max-width:max-content;">
                    <label style="color: black;">Are you sure you want to delete this machine record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-Machine saveBtnStyle" name="Edit_Machine" value="SAVE" >Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ActiveMachineModal" tabindex="-1" aria-labelledby="ActiveMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="ActiveMachineModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
            <!-- <form method="post" class="addMachineForm" action="" > -->
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to activate this machine record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-Machine saveBtnStyle" name="Edit_Machine" value="SAVE" >Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditMachineModal" tabindex="-1" aria-labelledby="EditMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditMachineModal1" style="">EDIT MACHINE DETAILS</p>
            </div>
            <form method="" class="addMachineForm" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label for="" class="col-form-label headTitle">Machine ID</label>
                                        <p><span id="machineid" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" float-end">
                                        <label for="" class="col-form-label headTitle">Status</label>
                                        <p><b><span id="machinestatus" class="font_weight_modal" style="font-weight:bold;opacity:1;font-size:0.9rem;"></span></b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="editMachineName" name="" required=""  value="">
                                <label class="input-padding">Machine Name</label>
                                <span class="paddingm float-start validate" id="editMachineNameErr"></span>
                                <!-- <span class="float-end count_message" id="editMachineNameC">h</span>
                                <br> -->
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 box" style="margin-bottom: 0px;">
                            <div class="input-box fieldStyle paddingm">
                                <select class="inputSiteName  form-select" name="inputSiteName" id="inputSiteName"></select>
                                <label for="inputSiteName" class="input-padding">Site Name</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Site ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="machinesiteid"></span></p>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input left-align font_weight_modal" id="editMachineRateHour" name="" required=""  value=" ">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label class="input-padding">Machine Rate Hour</label>
                                <span class="paddingm float-start validate" id="editMachineRateHourErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input left-align font_weight_modal" id="editMachineOffRateHour" name="" required=""  value=" ">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label class="input-padding">Machine OFF Rate Hour</label>
                                <span class="paddingm float-start validate" id="editMachineOffRateHourErr"></span>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Site Location</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="machinelocation"></span></p>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input paddinginright font_weight_modal" id="editTonnage" name="" required=""  value=" ">
                                <label class="input-padding">Tonnage</label>
                                <span class="paddingm float-start validate" id="editTonnageErr"></span>
                                <span class="unit clip">T</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineBrand" name="" required=""  value=" ">
                                <label class="input-padding">Machine Brand</label>
                                <span class="paddingm float-start validate" id="editMachineBrandErr"></span>
                            </div>
                        </div>
                        <?php 
                         if($this->data['user_details'][0]['role'] == "Smart Admin"){ 
                        ?>
                         <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineSerialNumber" name="" required=""  value=" ">
                                <label class="input-padding">Machine Serial ID</label>
                                <span class="paddingm float-start validate" id="editMachineSerialNumber_err"></span>
                            </div>
                        </div>
                       
                    <?php }else{ ?>
                         <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineSerialNumber" name="" required=""  value=" " readonly="true">
                                <label class="input-padding">Machine Serial ID</label>
                                <span class="paddingm float-start validate" id="editMachineSerialNumber_err"></span>
                            </div>
                        </div>
                    <?php }?>
                        <!-- <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input" id="editNewSiteNameEdit" name="" required=""  value=" ">
                                <label class="input-padding">New Site Name</label>
                                <span class="paddingm float-start validate" id="editNewSiteNameEditErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input" id="editNewSiteLocationEdit" name="" required=""  value=" ">
                                <label class="input-padding">New Site Location</label>
                                <span class="paddingm float-start validate" id="editNewSiteLocationEditErr"></span>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label headTitle">Last updated by</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="last_updated_by" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-lg-4 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label headTitle">Last updated on</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id='last_updated_on' class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditMachine btn fo bn saveBtnStyle" name="EditMachine" value="SAVE">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<div class="modal fade" id="InfoMachineModal" tabindex="-1" aria-labelledby="InfoMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="InfoMachineModal1" style="">INFO MACHINE</h5>
            </div>
                <div class="modal-body addMachineForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine ID</label>
                            <p><span id="MId" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Status</label>
                            <p><span id="MStatus" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Name</label>
                            <p><span id="MName" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Brand</label>
                            <p><span id="MBrand" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Rate Hour</label>
                            <p><span id="MRateHour" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine OFF Rate Hour</label>
                            <p><span id="MOffRate" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Tonnage</label>
                            <p><span id="MTonnage" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Serial Number</label>
                            <p><span id="MSerialNumber" class="font_weight_modal"></span></p>
                        </div>
                        <!-- <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Site Name</label>
                            <p><span id="MSiteName"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Site ID</label>
                            <p><span id="MSiteId"></span></p>
                        </div> -->
                    </div>
                    <div class="row">
                       <!--  <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Site Location</label>
                            <p><span id="MSiteLocation"></span></p>
                        </div> -->
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Last updated by</label>
                            <p><span id="last_updated_by1" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Last updated on</label>
                            <p><span id="last_updated_on1" class="font_weight_modal"></span></p>
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">CANCEL</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="FilterMachineModal" tabindex="-1" aria-labelledby="FilterMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="FilterMachineModal1" style="">FILTER MACHINES</h5>
            </div>
            <form method="" class="addMachineForm" action="" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 box" style="padding-right:0;">
                            <div class="input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterFrom" name="filterFrom">
                                <label for="filterFrom" class="input-padding">Registered on</label>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding-left:0.5rem;">
                            <div class=" input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterTo" name="filterTo">
                                <label for="filterTo" class="input-padding"></label>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="fieldStyle input-box">
                                <select class="form-select font_weight" name="filterMachineBrand" id="filterMachineBrand"></select>
                                <label for="filterMachineBrand" class="input-padding">Machine Brand</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class=" fieldStyle input-box">
                                <input type="text" class="form-control font_weight" id="filterkey" name="filterkey"> 
                                <label for="filterkey" class="input-padding">Keyword</label> 
                            </div>
                        </div>
                        <div class="box col-lg-6">
                            <div class="fieldStyle input-box">
                                <select class="form-select font_weight" name="filterStatus" id="filterStatus">
                                    <option selected value="all">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <label for="filterStatus" class="input-padding">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box col-lg-6">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterSiteName" id="filterSiteName">
                                    </select> 
                                <label for="filterSiteName" class="input-padding">Site Name</label>
                            </div>
                        </div>
                        <div class="box col-lg-6">
                            <div class="fieldStyle input-box">
                                <select class="form-select font_weight" name="filterLastUpdatedBy" id="filterLastUpdatedBy"></select>
                                <label for="filterLastUpdatedBy" class="input-padding">Last Updated by</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box" style="padding-right:0;">
                            <div class="input-box fieldStyle" >
                                <select class="form-select font_weight" name="filterMachineRateHourR" id="filterMachineRateHourR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterMachineRateHourR" class="input-padding">Machine Rate Hour</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box" style="padding-left:0.5rem;">
                            <div class="fieldStyle input-box">
                                <input type="text" class="form-control font_weight" id="filterMachineRateHourOp" name="filterMachineRateHourOp">
                                <label for="filterMachineRateHourOp" class="input-padding"></label>
                            </div>
                        </div>
                        <div class="col-lg-3 box" style="padding-right:0;">
                            <div class=" fieldStyle input-box">
                                <select class="form-select font_weight" name="filterMachineOffRateR" id="filterMachineOffRateR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterMachineOffRateR" class="input-padding">Machine OFF Rate Hour</label>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding-left:0.5rem;">
                            <div class="fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterMachineOffRateOp" name="filterMachineOffRateOp">
                                <!-- <label for="filterMachineOffRateOp" class="input-padding"></label> -->
                            </div>
                        </div>
                    </div>              
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="Add_Filter btn fo bn saveBtnStyle" name="" value="Apply">Apply</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>


<script src="<?php echo base_url()?>/assets/js/settings_machine.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/common1.js"></script>

<script type="text/javascript">
 var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
 var UserRoleRef ="<?php echo($this->data['user_details'][0]['role'])?>";

// add machine button click open modal reset function
$(document).on('click','#add_machine_button',function(){
    $('#AddMachineFormSub')[0].reset();
    $('#AddMachineModal').modal('show');
});
    //$('.Add_Machine_Data').on('click',function(e){
    $(".Add_Machine_Data").click(function(){
        $("#AddMachineFormSub").submit(false);
        var e = inputMachineOffRateHour($("#inputMachineOffRateHour").val());
        var f = inputMachineRateHour($("#inputMachineRateHour").val());
        var g = inputMachineName($("#inputMachineName").val());
        var a = inputTonnage($("#inputTonnage").val());
        var b = inputMachineBrand($("#inputMachineBrand").val());
        var c = inputNewSiteName($("#inputNewSiteName").val());
        var d = inputNewSiteLocation($("#inputNewSiteLocation").val());

        var site = $("#inputSiteNameAdd").val();
        if (site == "new") {
            if (a != "" || b!="" || c!="" || d!="" || e!="" || f!="" || g!="") {
                $("#inputMachineOffRateHourErr").html(e);
                $("#inputMachineRateHourErr").html(f);            
                $("#inputMachineNameErr").html(g);
                $("#inputTonnageErr").html(a);        
                $("#inputMachineBrandErr").html(b);            
                $("#inputNewSiteNameErr").html(c);
                $("#inputNewSiteLocationErr").html(d);
            }
            else{
                document.getElementById("AddMachineFormSub").submit();
            }    
        }
        else{
            if (a != "" || b!="" || e!="" || f!="" || g!="") {
                $("#inputMachineOffRateHourErr").html(e);
                $("#inputMachineRateHourErr").html(f);            
                $("#inputMachineNameErr").html(g);
                $("#inputTonnageErr").html(a);        
                $("#inputMachineBrandErr").html(b);            
            }
            else{
                document.getElementById("AddMachineFormSub").submit();
                //alert("Validation Success!!");
            }
        }
    });


     $(document).ready(function(){
        var currentdate = new Date(); 
        var datetime = currentdate.getDate() + " "
                + currentdate.toLocaleString('en-us', { month: 'long' })  + " " 
                + currentdate.getFullYear() + ", "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes()
        $('#date-time').html(datetime);
        $('.undo').click(function(){
            location.reload();
        });

         var acsCon = <?php  echo $this->data['access'][0]['settings_machine']; ?>;
            //var acsCon = 3
        if(acsCon < 2){
            $('.edit-machine').css("display","none");
            $('.activate-machine').css("display","none");
            $('.deactivate-machine').css("display","none");
            // $('.info-machine').css("display","block");
            $('.info-machine1').css("display","block");
        }
        else{
            $('.edit-machine').css("display","block");
            $('.activate-machine').css("display","block");
            $('.deactivate-machine').css("display","block");
            // $('.info-machine').css("display","none");
            $('.info-machine1').css("display","none");
        }

        $(document).on("click", ".edit", function(event){
        //$(".edit").click(function(){
            event.preventDefault();
            if($(this).parent().siblings(".edit-subMenu").css('display').toLowerCase() == 'none'){
                // $(".edit-subMenu").css("display","block");
                $(this).parent().siblings(".edit-subMenu").css("display","block");
            }
            else{
                $(this).parent().siblings(".edit-subMenu").css("display","none");
            }
            $(document).mouseup(function(e) 
            { 
                var container = $(".edit-subMenu");
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    container.hide();
                }
            });
        });
        $(document).on("click", ".deactivate-machine", function(){
        //$(".deactivate-machine").click(function(){    
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('#DeactiveMachineModal').modal('show');
            $('.Status-Machine').click(function(){
                // $(".Status-Machine").val("Wait....");
                // $(".Status-Machine").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/deactivateMachine'); ?>",
                    type: "POST",
                    data: {
                        MachineId : id,
                        Status_Machine: status,
                        // UserNameRef:UserNameRef
                    },
                    dataType: "json",
                    success:function(res){
                        //alert("Status successfully Updated!!");
                        location.reload();
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!!");
                    }
                });
            }); 
        });

        $(document).on("click", ".activate-machine", function(){   
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('#ActiveMachineModal').modal('show');
            $('.Status-Machine').click(function(){
                // $(".Status-Machine").val("Wait....");
                // $(".Status-Machine").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/deactivateMachine'); ?>",
                    type: "POST",
                    data: {
                        MachineId : id,
                        Status_Machine: status,
                        // UserNameRef:UserNameRef
                    },
                    dataType: "json",
                    success:function(res){
                        //alert("Status successfully Updated!!");
                        location.reload();
                        // $(".Status-Machine").val("Save");
                        // $(".Status-Machine").removeAttr("disabled");
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!!");
                    }
                });
            }); 
        });  

        $(document).on("click", ".info-machine", function(){
            var id = $(this).attr("lvalue");
            //alert(id);
            //var status = $(this).attr("svalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getMachineData'); ?>",
                type: "POST",
                data: {
                    MachineId : id
                },
                dataType: "JSON",
                success:function(res_csp){
                   console.log(res_csp);
                    var date_time = getdate_time( res_csp['machine'][0].last_updated_on);
                    $('#MId').html(
                        res_csp['machine'][0].machine_id
                    );
                    if (res_csp['machine'][0].status == 1) {
                        $('#MStatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#MStatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                    }
                    $('#MName').html(
                        res_csp['machine'][0].machine_name
                    );
                    $('#MBrand').html(
                        res_csp['machine'][0].machine_brand
                    );
                    $('#MRateHour').html(
                        (Math.round(res_csp['machine'][0].rate_per_hour * 100) / 100).toFixed(2)
                    );
                    $('#MOffRate').html(
                        (Math.round(res_csp['machine'][0].machine_offrate_per_hour * 100) / 100).toFixed(2)
                    );
                    $('#MTonnage').html(
                        res_csp['machine'][0].tonnage
                    );
                    $('#MSerialNumber').html(
                        res_csp['machine'][0].machine_serial_number
                    );
                    
                    // $('#MSiteName').html(
                    //     res_csp[0].Site_Name
                    // );
                    // $('#MSiteId').html(
                    //     res_csp[0].Site_ID
                    // );
                    // $('#MSiteLocation').html(
                    //     res_csp[0].Site_Location
                    // );
                    $('#last_updated_by1').html(
                        res_csp['last_updated_by'][0].first_name + " "
                   + res_csp['last_updated_by'][0].last_name);
                    $('#last_updated_on1').html(date_time);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#InfoMachineModal').modal('show');
        });

        // active machine info
         $(document).on("click", ".info-machine1", function(){
            var id = $(this).attr("lvalue");
            //alert(id);
            //var status = $(this).attr("svalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getMachineData'); ?>",
                type: "POST",
                data: {
                    MachineId : id
                },
                dataType: "JSON",
                success:function(res_csp){
                   // console.log(res_csp);
                    var date_time = getdate_time( res_csp['machine'][0].last_updated_on);
                    $('#MId').html(
                        res_csp['machine'][0].machine_id
                    );
                    if (res_csp['machine'][0].status == 1) {
                        $('#MStatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#MStatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                    }
                    $('#MName').html(
                        res_csp['machine'][0].machine_name
                    );
                    $('#MBrand').html(
                        res_csp['machine'][0].machine_brand
                    );
                    $('#MRateHour').html(
                        res_csp['machine'][0].rate_per_hour
                    );
                    $('#MOffRate').html(
                        res_csp['machine'][0].machine_offrate_per_hour
                    );
                    $('#MTonnage').html(
                        res_csp['machine'][0].tonnage
                    );
                    $('#MSerialNumber').html(
                        res_csp['machine'][0].machine_serial_number
                    );
                    
                    // $('#MSiteName').html(
                    //     res_csp[0].Site_Name
                    // );
                    // $('#MSiteId').html(
                    //     res_csp[0].Site_ID
                    // );
                    // $('#MSiteLocation').html(
                    //     res_csp[0].Site_Location
                    // );
                    $('#last_updated_by1').html(
                        res_csp['last_updated_by'][0].first_name + " "
                   + res_csp['last_updated_by'][0].last_name);
                    $('#last_updated_on1').html(date_time);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#InfoMachineModal').modal('show');
        });


        $(document).on("click", ".edit-machine", function(){
        //$(".edit-machine").click(function(){    
            var id = $(this).attr("lvalue");
            //var status = $(this).attr("svalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getMachineData'); ?>",
                type: "POST",
                data: {
                    MachineId : id
                },
                dataType: "json",
                success:function(res_csp){
                    $('#machineid').html(
                        res_csp['machine'][0].machine_id
                    );
                    if (res_csp['machine'][0].status == 1) {
                        $('#machinestatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#machinestatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    var date_time  = getdate_time(res_csp['machine'][0].last_updated_on)
                    $('#editMachineName').val(res_csp['machine'][0].machine_name);
                    $('#editMachineRateHour').val(res_csp['machine'][0].rate_per_hour);
                    $('#editMachineOffRateHour').val(res_csp['machine'][0].machine_offrate_per_hour);
                    $('#editTonnage').val(res_csp['machine'][0].tonnage);
                    $('#editMachineBrand').val(res_csp['machine'][0].machine_brand);
                    $('#editMachineSerialNumber').val(res_csp['machine'][0].machine_serial_number);
                    $('#last_updated_by').html(res_csp['last_updated_by'][0].first_name + " " +res_csp['last_updated_by'][0].last_name);
                    $('#last_updated_on').html(date_time);
                    $('.EditMachine').attr("serial_data",res_csp['machine'][0].machine_serial_number);
                    
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#EditMachineModal').modal('show');
            $(document).on("click", ".EditMachine", function(){

                var e = editMachineOffRateHour($("#editMachineOffRateHour").val());
                var f = editMachineRateHour($("#editMachineRateHour").val());
                var g = editMachineName($("#editMachineName").val());
                var a = editTonnage($("#editTonnage").val());
                var b = editMachineBrand($("#editMachineBrand").val());
                if (a != "" || b!="" || e!="" || f!="" || g!="") {
                    $("#editMachineOffRateHourErr").html(e);
                    $("#editMachineRateHourErr").html(f);            
                    $("#editMachineNameErr").html(g);
                    $("#editTonnageErr").html(a);        
                    $("#editMachineBrandErr").html(b);            
                }
                else{
                    var  veditMachineName = $('#editMachineName').val();
                    var  veditMachineRateHour = $('#editMachineRateHour').val();
                    var  veditMachineOffRateHour = $('#editMachineOffRateHour').val();
                    var  veditTonnage = $('#editTonnage').val();
                    var  veditMachineBrand = $('#editMachineBrand').val();  
                    var machine_serial_id = $('#editMachineSerialNumber').val(); 
                    $.ajax({
                        url: "<?php echo base_url('Settings_controller/editMachineData'); ?>",
                        type: "POST",
                        data: {
                            MachineId : id,
                            MachineName: veditMachineName,
                            MachineRateHour : veditMachineRateHour,
                            MachineOffRateHour: veditMachineOffRateHour,
                            Tonnage : veditTonnage,
                            MachineBrand: veditMachineBrand,
                            machine_serial_id:machine_serial_id,
                        },
                        dataType: "json",
                        success:function(res){
                            //console.log(res);
                            location.reload();
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!!");
                        }
                    });
                }
            });
        }); 
        

    //Dropdown for Site(Add Machine)
        // $.ajax({
        //     url: "<?php echo base_url('Home/getSiteName'); ?>",
        //     type: "POST",
        //     dataType: "json",
        //     data:{
        //         UserNameRef:UserNameRef,
        //         UserRoleRef:UserRoleRef,
        //     },
        //     success:function(res_Site){
                
        //         var elements = $('<option value="new">Add New Site</option>');
        //         var elements1 = $('<option value="new">Add New Site</option>');
        //         res_Site.forEach(function(item){
        //             elements = elements.add('<option value="'+item.Site_ID+'">'+item.Site_Name+' -'+item.Site_ID+'</option>');
        //             elements1 = elements1.add('<option value="'+item.Site_ID+'">'+item.Site_Name+' -'+item.Site_Name+'</option>');
        //         });
        //         $('.inputSiteName').append(elements1);
        //         $('.inputSiteNameAdd').append(elements);
        //     },
        //     error:function(res){
        //         alert("Sorry!Try Agian!!");
        //     }
        // });
        // $('#filterSiteName').empty();
        //     $.ajax({
        //         url: "<?php echo base_url('Home/getSiteName'); ?>",
        //         type: "POST",
        //         dataType: "json",
        //         data:{
        //             UserNameRef:UserNameRef,
        //             UserRoleRef:UserRoleRef,
        //         },
        //         success:function(res_Site){
                    
        //             var elements = $('<option value="all">All</option>');
        //             res_Site.forEach(function(item){
        //                 elements = elements.add('<option value="'+item.Site_Name+'">'+item.Site_Name+'</option>');
        //             });
        //             $('#filterSiteName').append(elements);
        //         },
        //         error:function(res){
        //             alert("Sorry!Try Agian!!");
        //         }
        //     });
        // $('#filterMachineBrand').empty();
        //     $.ajax({
        //         url: "<?php echo base_url('Home/getBrandName'); ?>",
        //         type: "POST",
        //         dataType: "json",
        //         success:function(res_Site){
                    
        //             var elements = $('<option value="all">All</option>');
        //             res_Site.forEach(function(item){
        //                 elements = elements.add('<option value="'+item.Machine_Brand+'">'+item.Machine_Brand+'</option>');
        //             });
        //             $('#filterMachineBrand').append(elements);
        //         },
        //         error:function(res){
        //             alert("Sorry!Try Agian!!");
        //         }
        //     });
        // $('#filterLastUpdatedBy').empty();
        //     $.ajax({
        //         url: "<?php echo base_url('Home/getUserName'); ?>",
        //         type: "POST",
        //         dataType: "json",
        //         success:function(res_Site){
                    
        //             var elements = $('<option value="all">All</option>');
        //             res_Site.forEach(function(item){
        //                 elements = elements.add('<option value="'+item.Created_By+'">'+item.Created_By+'</option>');
        //             });
        //             $('#filterLastUpdatedBy').append(elements);
        //         },
        //         error:function(res){
        //             alert("Sorry!Try Agian!!");
        //         }
        //     });

        $("#filterMachineRateHourOp").attr("disabled", true);
        $('#filterMachineRateHourR').on('change', function() {
            if ($('#filterMachineRateHourR').val() == 'all') {
                $("#filterMachineRateHourOp").attr("disabled", true);
            }
            else{
                $("#filterMachineRateHourOp").removeAttr("disabled");
            }
        });
        $("#filterMachineOffRateOp").attr("disabled", true);
        $('#filterMachineOffRateR').on('change', function() {
            if ($('#filterMachineOffRateR').val() == 'all') {
                $("#filterMachineOffRateOp").attr("disabled", true);
            }
            else{
                $("#filterMachineOffRateOp").removeAttr("disabled");
            }
        });
            
        // $("#inputNewSiteName").attr("disabled", true);
        // $("#inputNewSiteLocation").attr("disabled", true);
        // $('.inputSiteNameAdd').on('change', function() {
        //     if( this.value == 'new'){
        //         $("#inputNewSiteName").removeAttr("disabled");
        //         $("#inputNewSiteLocation").removeAttr("disabled");
        //         $('#sid').empty();
        //         $('#slocation').empty();
        //     }
        //     else{
        //         $("#inputNewSiteName").attr("disabled", true);
        //         $("#inputNewSiteLocation").attr("disabled", true);
        //         $.ajax({
        //             url: "<?php echo base_url('Home/getSite'); ?>",
        //             type: "POST",
        //             dataType: "json",
        //             data: {
        //                 Sname : this.value
        //             },
        //             success:function(res_Site){
        //                 $('#sid').html(
        //                     res_Site[0].Site_ID
        //                 );
        //                 $('#slocation').html(
        //                     res_Site[0].Site_Location
        //                 );
        //             },
        //             error:function(res){
        //                 alert("Sorry!Try Agian!!");
        //             }
        //         });
        //     }
        // });
        // $("#editNewSiteNameEdit").attr("disabled", true);
        // $("#editNewSiteLocationEdit").attr("disabled", true);
        // $('.inputSiteName').on('change', function() {
        //     if( this.value == 'new'){
        //         //alert(this.value);
        //         $("#editNewSiteNameEdit").removeAttr("disabled");
        //         $("#editNewSiteLocationEdit").removeAttr("disabled");
        //         $('#machinesiteid').empty();
        //         $('#machinelocation').empty();
        //     }
        //     else{
        //         $("#editNewSiteNameEdit").attr("disabled", true);
        //         $("#editNewSiteLocationEdit").attr("disabled", true);
        //         $.ajax({
        //             url: "<?php echo base_url('Home/getSite'); ?>",
        //             type: "POST",
        //             dataType: "json",
        //             data: {
        //                 Sname : this.value
        //             },
        //             success:function(res_Site){
        //                 $('#machinesiteid').html(
        //                     res_Site[0].Site_ID
        //                 );
        //                 $('#machinelocation').html(
        //                     res_Site[0].Site_Location
        //                 );
        //             },
        //             error:function(res){
        //                 alert("Sorry!Try Agian!!");
        //             }
        //         });
        //     }
        // });
        $.ajax({
            url: "<?php echo base_url('Settings_controller/aIaMachine'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                // console.log(res);
                var len = res.InActive.toString().length;
                var len1 = res.Active.toString().length;
                if (parseInt(len) > 1) {
                     $('#Iactive').html(res.InActive);
                }else{
                    $('#Iactive').html('0'+res.InActive);
                }

                if (parseInt(len1) > 1) {
                     $('#Active').html(res.Active);
                }else{
                    $('#Active').html('0'+res.Active);
                }
                //$('#Iactive').html(res.InActive);
                //$('#Active').html(res.Active);
                
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });
        // $(document).on("click", "#filterData", function(){
            
            
        // });
        // $('.Add_Filter').click(function(){
        //     var  FromDate = $('#filterFrom').val();
        //     var  ToDate = $('#filterTo').val();
        //     var  Site = $('#filterSiteName').val();
        //     var  Brand = $('#filterMachineBrand').val();
        //     var  Status = $('#filterStatus').val();
        //     var  LastUpdatedBy = $('#filterLastUpdatedBy').val();
        //     var  filterMachineRateHourOp = $('#filterMachineRateHourOp').val();
        //     var  filterMachineRateHourR = $('#filterMachineRateHourR').val();
        //     var  filterMachineOffRateR = $('#filterMachineOffRateR').val();
        //     var  filterMachineOffRateOp = $('#filterMachineOffRateOp').val();
        //     $.ajax({
        //         url: "<?php echo base_url('Home/getFilterData'); ?>",
        //         type: "POST",
        //         dataType: "json",
        //         data:{
        //             FromDate : FromDate,
        //             ToDate : ToDate,
        //             Site : Site,
        //             Brand : Brand,
        //             Status : Status,
        //             LastUpdatedBy : LastUpdatedBy,
        //             filterMachineRateHourOp:filterMachineRateHourOp,
        //             filterMachineRateHourR:filterMachineRateHourR,
        //             filterMachineOffRateOp:filterMachineOffRateOp,
        //             filterMachineOffRateR:filterMachineOffRateR
        //         },
        //         success:function(res_filter){
        //            alert(res_filter);
        //             $('.contentMachine').empty();
        //             $('#FilterMachineModal').modal('hide');
        //             if (jQuery.isEmptyObject(res_filter)){
        //                 $('.contentMachine').html("<p>No Records Found!</p>");
        //             }
        //             var active = 0;
        //             var inactive = 0;
        //             //alert(res_filter);
        //                 res_filter.forEach(function(item){
                            
        //                     var elements = $();
        //                     if (item.Status == 1) {
        //                         active = active+1;
        //                         elements = elements.add('<div id="settings_div">'
        //                                 +'<div class="row paddingm">'
        //                                     +'<div class="col-sm-1 col marleft" ><p>'+item.Machine_Id+'</p></div>'
        //                                     +'<div class="col-sm-2 col marleft" ><p title='+item.Machine_Name+'>'+item.Machine_Name+'</p></div>'         
        //                                     +'<div class="col-sm-2 col marleft" >'
        //                                         +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_Rate_Hour+'.00</p>'
        //                                     +'</div>'
        //                                     +'<div class="col-sm-2 col marleft" >'
        //                                         +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_OFF_Rate_Hour+'.00</p>'
        //                                     +'</div>'
        //                                     +'<div class="col-sm-1 col marleft" ><p>'+item.Tonnage+'T</p></div>'
        //                                     +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Brand+'</p></div>'
        //                                     +'<div class="col-sm-1 col marleft settings_active" ><p style="color: #004795"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
        //                                     +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
        //                                         +'<ul class="edit-menu">'
        //                                             +'<li class="d-flex justify-content-center">'
        //                                                 +'<a href="#">'
        //                                                     +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
        //                                                 +'</a>'
        //                                                 +'<ul class="edit-subMenu">'
        //                                                     +'<li class="edit-opt info-machine1" lvalue="'+item.Machine_Id+'" style="display:none;"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
        //                                                     +'<li class="edit-opt edit-machine" lvalue="'+item.Machine_Id+'" ><a href="#"><i class="fa fa-pencil" style="margin-left:10px;"></i>EDIT</a></li>'
        //                                                     +'<li class="edit-opt deactivate-machine" lvalue="'+item.Machine_Id+'" svalue="'+item.Status+'"><a href="#"><i class="fa fa-trash" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
        //                                                 +'</ul>'
        //                                             +'</li>'
        //                                         +'</ul>'                
        //                                     +'</div>'
                                            
        //                                 +'</div>'
        //                             +'</div>');
        //                         $('.contentMachine').append(elements);
        //                     }
        //                     else{
        //                         inactive = inactive+1;
        //                        // echo "ok";
        //                         elements = elements.add('<div id="settings_div">'
        //                                 +'<div class="row paddingm">'
        //                                     +'<div class="col-sm-1 col marleft" ><p>'+item.Machine_Id+'</p></div>'
        //                                     +'<div class="col-sm-2 col marleft" ><p title='+item.Machine_Name+'>'+item.Machine_Name+'</p></div>'        
        //                                     +'<div class="col-sm-2 col marleft" >'
        //                                         +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_Rate_Hour+'.00</p>'
        //                                     +'</div>'
        //                                     +'<div class="col-sm-2 col marleft" >'
        //                                         +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_OFF_Rate_Hour+'.00</p>'
        //                                     +'</div>'
        //                                     +'<div class="col-sm-1 col marleft" ><p>'+item.Tonnage+'T</p></div>'
        //                                     +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Brand+'</p></div>'
        //                                     +'<div class="col-sm-1 col marleft settings_active" ><p style="color: #e2062c"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
        //                                     +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
        //                                         +'<ul class="edit-menu">'
        //                                             +'<li class="d-flex justify-content-center">'
        //                                                 +'<a href="#">'
        //                                                     +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
        //                                                 +'</a>'
        //                                                 +'<ul class="edit-subMenu">'
        //                                                     +'<li class="edit-opt info-machine" lvalue="'+item.Machine_Id+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>EDIT</a></li>'
        //                                                     +'<li class="edit-opt activate-machine" lvalue="'+item.Machine_Id+'" svalue="'+item.Status+'"><a href="#"><i class="fa fa-power-off" style=""margin-left:5px;font-size:15px;"></i>ACTIVATE</a></li>'
        //                                                 +'</ul>'
        //                                             +'</li>'
        //                                         +'</ul>'                
        //                                     +'</div>'
                                            
        //                                 +'</div>'
        //                             +'</div>');
        //                         $('.contentMachine').append(elements);
        //                     }
        //                 });
        //             $('#Iactive').empty();
        //             $('#Active').empty();
        //             $('#Iactive').html(inactive);
        //             $('#Active').html(active);
        //         },
        //         error:function(res){
        //             alert("Sorry!Try Agian!!");
        //         }
        //     });
        // });

    });
//   add machine   machine serial id
    
$(document).on('blur','#inputMachineSerialId',function(){

    var serial_id = $('#inputMachineSerialId').val();

    if (serial_id == "") {
        $('#inputMachineSerialId_err').html('Invalid***');
        $('.Add_Machine_Data').attr("disabled",true);

    }else{
        $.ajax({
            url:"<?php echo base_url('Settings_controller/check_serialid'); ?>",
            method:"post",
            data:{serial_id:serial_id},
            dataType:"json",
            success:function(data){
                if(data == true){

                    $('#inputMachineSerialId_err').html('Invalid***');
                    $('.Add_Machine_Data').attr("disabled",true);

                }else{
                     $('#inputMachineSerialId_err').html('');
                    $('.Add_Machine_Data').removeAttr("disabled");

                }
                //location.reload();
            },
            error:function(res){
                alert('sorry Try Again...');
            }
        });
    }
});

// edit machinne serial id
$(document).on('blur','#editMachineSerialNumber',function(){

    var serial_id = $('#editMachineSerialNumber').val();
    var old_val = $('.EditMachine').attr("serial_data");
    //var old_serial = old_val.getAttribute("serial_data");
    if (serial_id == "") {
        $('#editMachineSerialNumber_err').html('Invalid***');
        $('.Add_Machine_Data').attr("disabled",true);

    }else{
        $.ajax({
            url:"<?php echo base_url('Settings_controller/check_serialid'); ?>",
            method:"post",
            data:{serial_id:serial_id},
            dataType:"json",
            success:function(data){
                if (old_val == serial_id) {
                     $('#editMachineSerialNumber_err').html('');
                    $('.EditMachine').removeAttr("disabled");
                }else{
                     if(data == true){

                    $('#editMachineSerialNumber_err').html('Invalid***');
                    $('.EditMachine').attr("disabled",true);

                }else{

                     $('#editMachineSerialNumber_err').html('');
                    $('.EditMachine').removeAttr("disabled");

                }
                }
               
                //location.reload();
            },
            error:function(res){
                alert('sorry Try Again...');
            }
        });
    }
});

$(document).on('click','.active_click',function(){
    $('.inactive_click').css("display","none");
    $('#Iactive').html('00');
});
</script>
