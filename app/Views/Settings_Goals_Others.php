
<style type="text/css">
    .hrColor{
        color:#848484;
    }
    .img_validate{
        color:red;
        font-size:0.9rem;
    }
    .grey_label{
        color:#848484;
        font-size:0.7rem;
        
    }
    .img_font_wh{
        width: 1.2rem;
        height: 1.2rem;
    }
    /*downtime reasons font weight color*/
    .dm-font{
        font-weight: 498;
        color: #595959;
    }
    .general_header{
        font-size: 0.9rem;
        font-weight: 400;
        color: #A6A6A6;
        font-family: 'Roboto' sans-serif;
       /* opacity: 10%;*/
    }
    .general_header_model{
        font-size: 1rem;
        font-weight: 400;
        color: #A6A6A6;
        font-family: 'Roboto' sans-serif;
        opacity: 50%;
    }
</style>

<div style="margin-left: 4.5rem;">
    <nav class="navbar navbar-expand-lg settings_nav sticky-top fixsubnav">
      <div class="container-fluid paddingm">
        <p class="float-start p3 " id="logo" style="">General Settings</p>
      </div> <!-----top left side------>
    </nav>
    <div>
        <div class="contentGeneralSettings" style="margin-top:7rem;">
            <div style="margin:2.5rem;">
                    <div class="card bodercss">
                        <p class="fieldTitle input-padding">GOALS</p>
                        <div class="content-container">
                            <div class="row paddingm"> 
                                <div class="col paddingm">
                                    <!-----financial metrics starting point------>
                                    <p class="card-subtitle float-start title  general_header">FINANCIAL METRICS</p>
                                    <!----edit option for financial metrices----->
                                    <?php
                                        $control = $this->data['access'][0]['settings_general'];
                                     if($control >= 2){ ?>
                                    <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen" style="margin-top: 20px;" data-bs-toggle="modal" data-bs-target="#EditFMModal">
                                <?php } ?>
                                </div>
                            </div>
                        </div>     
                        <div class="container genmtop">
                            <div class="row paddingm">
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall TEEP % Target</label>
                                        <!----over all TEEP id is OTEEP------->
                                        <p class="paddingm"><span id="OTEEP" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall OOE % Target</label>
                                        <!----over all TEEP id is OOOE------->
                                        <p class="paddingm"><span id="OOOE" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall OEE % Target</label>
                                        <!----over all TEEP id is OOEE------->
                                        <p class="paddingm"><span id="OOEE" class="font_weight"></span>%</p>
                                </div>
                            </div>
                        </div>
                        <div class="container genmtop">
                            <div class="row paddingm">
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Availability % Target</label>
                                        <!-------Availability--------->
                                        <p class="paddingm"><span id="Availability" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Performance % Target</label>
                                           <!-------------Performance----------->
                                        <p class="paddingm"><span id="Performance" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Quality % Target</label>
                                          <!-----Quality------>
                                        <p class="paddingm"><span id="Quality" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm ">
                                        <label class="headTitle">OEE % Target</label>
                                        <!----OEE------>
                                        <p class="paddingm"><span id="OEE" class="font_weight"></span>%</p>
                                </div>
                            </div>
                        </div><!----financial metrics ending-------->
                        <!---------Operator User Interface------>
                        <div class="container-fluid" style="margin-bottom:1px;"><hr class="hrColor"></div>
                        <div class="content-container">
                            <div class="row paddingm">
                                <div class="paddingm">
                                    <p class="card-subtitle float-start title general_header">OPERATOR USER INTERFACE (OUI)</p>
                                </div>
                            </div>
                            <div class="genmtop">
                                <div class="flex-container paddingm">
                                    <div class="" style="width: 97%;">
                                        <div class="container">
                                            <label class="headTitle" style="margin-left: 18px;">Downtime Threshold<span id="range" style="color:#C00000;"></span></label>
                                            <p class="paddingm" style="margin-left: 18px;"><span id="ODT" class="font_weight"></span></p>
                                        </div>
                                    </div>
                                    <div style="width: 3%;">
                                        <?php $control_oui = $this->data['access'][0]['settings_general'];
                                        if($control_oui >= 2){ ?>
                                        <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen" data-bs-toggle="modal" data-bs-target="#EditDTModal">
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="genmtop">
                                <div class="subtitlecss">
                                    <div class="flex-container paddingm">
                                        <div class="paddingm dividercss" style="width: 15%;">
                                            <p class="font alignmargin float-end p3 dm-font" >Downtime Reasons</p>  
                                        </div>
                                        <div class="float-start dividercss" style="width: 85%;">
                                            <hr class="paddingm" style="width: 100%;color: #848484;">
                                        </div>
                                        <div class="paddingm dividercss " style="width: 5%;">
                                            <!-- <div class="dot dot-css"><i class="fa fa-plus dot-cont fa-2x"  data-bs-toggle="modal" data-bs-target="#EditDRModal"></i></div> -->
                                           <!--  <i class="fa fa-pencil paddingm edit-pen" style="margin-left: 1rem;"></i> -->
                                           <?php $control_dreason = $this->data['access'][0]['settings_general'];
                                           if ($control_dreason >= 2) { ?>
                                            <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" style="width:4rem;height:3rem; padding-left:1rem;" alt="" srcset="" data-bs-toggle="modal" data-bs-target="#EditDRModal">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container genmtop">
                                        <div class="row paddingm" id="DTReasonContent">
                                            <!-- Reasons -->
                                        </div>
                                </div>
                                <div class="genmtop">
                                    <div class="flex-container">
                                        <div class="paddingm dividercss" style="width: 15%;">
                                            <p class="font alignmargin p3 dm-font">Quality Reasons</p>  
                                        </div>
                                        <div class="float-start dividercss" style="width: 85%;">
                                            <hr class="paddingm" style="width: 100%;color: #848484;">
                                        </div>
                                        <div class="paddingm dividercss" style="width: 5%;">
                                            <!-- <div class="dot dot-css"><i class="fa fa-plus dot-cont fa-2x"  data-bs-toggle="modal" data-bs-target="#EditQRModal"></i></div> -->
                                            <!-- <i class="fa fa-pencil edit-pen" style="margin-left: 1rem;" data-bs-toggle="modal" data-bs-target="#EditQRModal"></i> -->
                                            <?php $control_qreason = $this->data['access'][0]['settings_general'];
                                           if ($control_qreason >= 2) { ?>
                                            <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" style="width:4rem;height:3rem; padding-left:1rem;"  alt="" srcset=""  data-bs-toggle="modal" data-bs-target="#EditQRModal">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container genmtop" style="margin-bottom: 20px;">
                                        <div class="row paddingm" id="QReasonContent">
                                            <!-- Quality Reasons -->
                                        </div>
                                </div>
                                <!-- strategy code  -->
                                  <div class="mb-4">
                                    <div class="genmtop">
                                        <div class="flex-container">
                                        <div class="float-start dividercss" style="width: 98%;">
                                            <hr class="paddingm" style="width: 100%;color: #848484;">
                                        </div>
                                            <div class="paddingm dividercss" style="width:2%;">
                                                <?php $control_dreason = $this->data['access'][0]['settings_general'];
                                           if ($control_dreason >= 2) { ?>
                                                <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen fa-1x" style="margin-top: 0px;" data-bs-toggle="modal" data-bs-target="#current_shit_performance">
                                            <?php } ?>
                                            </div>
                                        </div><!-----------operator user interface ending-------->
                                        <!----current shift performance------>
                                        <div class="flex-container">
                                            <div class="paddingm dividercss" style="width:40%;">
                                                <p class="modal-title settings-machineAdd-model general_header" style="" >CURRENT SHIFT PERFORMANCE</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="genmtop" >
                                        <div class="flex-container" style="padding:0.4rem;justify-content:space-around;align-item:center;">
                                            <!-- <div class="paddingm dividercss" style="width:20%;font-weight:bold;justify-content:center;text-align:Center;overflow-wrap: break-word;height:3rem;"> -->
                                            <div class="float-start paddingm FMalign" style="width:20%;">
                                                <label class="headTitle">OEE%Target</label>
                                                <p class="paddingm"><span class="target_val font_weight"></span></p>
                                            </div>    
                                            <!-- <p class="" style="overflow-wrap: break-word;color:grey;">OEE%Target</p>
                                                <p style="font-weight:normal;overflow-wrap: break-word;" class=""><span class="target_val "></span></p> -->
                                            <!-- </div> -->
                                            <div class="reason-box-cf" >
                                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                                    <div class="" style="color: #00B050;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Green</p></div>
                                                    <div class="" style="color: #00B050;width:20%;">
                                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                                    </div>
                                                    <div class="" style="color:grey;width:20%;">
                                                        <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                                    </div>
                                                    <div class="" style="width:20%;">
                                                        <p style="text-align:center;justify-content:center;margin:auto;" class="green_val font_weight"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reason-box-cf" >
                                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                                    <div class="" style="color:#FFC000;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Yellow</p></div>
                                                    <div class="" style="color:#FFC000;width:20%;">
                                                        <i class="fa fa-circle" style="font-size:1.5rem;"></i>
                                                    </div>
                                                    <div class="" style="color:grey;width:20%;">
                                                    <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                                    </div>
                                                    <div class="" style="width:20%;">
                                                        <p style="text-align:center;justify-content:center;margin:auto;" class="yellow_val font_weight"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reason-box-cf" >
                                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                                    <div class="" style="color:#D60800;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Red</p></div>
                                                    <div class="" style="color:#D60800;width:30%;">
                                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                                    </div>
                                                    <div class="" style="font-size:0.8rem;color:grey;font-weight:bold;">
                                                        <p style="text-align:center;justify-content:center;margin:auto;">any other values</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- strategy code -->
                            </div>
                        </div>
                    </div><!----current shift performance ending------>
                     <!----work shift performance starting------>
                    <div class="card genmtop bodercss">
                        <p class="fieldTitle input-padding">WORK SHIFT MANAGEMENT</p>   
                        <div class="container genmtop" style="margin-bottom: 20px;margin-top: 20px;">
                            <div class="flex-container paddingm">
                                <div class="float-start col-lg-3">
                                    <div>
                                        <label class="headTitle">No.of Hours / shift</label>
                                        <p class="paddingm"><span id="NoOfHourShift" class="font_weight"></span></p>
                                    </div>
                                </div>
                                <div class="float-start col-lg-3">
                                    <div>
                                        <label class="headTitle">1<sup>st</sup> Shift Start Time</label>
                                        <p class="paddingm"><span id="ShiftStart" class="font_weight"></span></p>                                    
                                    </div>
                                </div>
                                <div class="float-start col-lg-5">
                                    <div>
                                        <label class="headTitle" style="line-height:45px;">Shift Timings :</label>
                                        <br>
                                    
                                        <table class="table table-bordered">
                                            <thead>    
                                                <tr class="table-secondary" >
                                                  <th>Shift Name</th>
                                                  <th>Start</th>
                                                  <th>End</th>
                                                </tr>
                                            </thead>
                                          <tbody id="shift">
                                            <!-- <tr>
                                              <td>Shift A</td>
                                              <td>06.30AM</td>
                                              <td>02.30PM</td>
                                            </tr> -->
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-1 paddingm">
                                    <?php $control_dreason = $this->data['access'][0]['settings_general'];
                                           if ($control_dreason >= 2) { ?>
                                    <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen" data-bs-toggle="modal" data-bs-target="#EditWSM">
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
<!-----work shift management ending-------->
<div class="modal fade" id="EditFMModal" tabindex="-1" aria-labelledby="EditFMModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="EditFMModal1" style="">FINANCIAL METRICS</p>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EOTEEP" value="" required="">
                                <label class="input-padding">Overall TEEP % Target</label>
                                <span class="paddingm float-start validate" id="EOTEEPErr"></span>
                            </div>
                        </div>
                        <div class="box float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EOOOE" value="" required="">
                                <label class="input-padding">Overall OOE % Target</label>
                                <span class="paddingm float-start validate" id="EOOOEErr"></span>
                            </div>
                        </div>
                        <div class="box float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EOOEE" value="" required="">
                                <label class="input-padding">Overall OEE % Target</label>
                                <span class="paddingm float-start validate" id="EOOEEErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                                
                         </div>
                    </div>
                    <div class="row">
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EAvailability" value="" required="">
                                    <label class="input-padding">Performance % Target</label>
                                    <span class="paddingm float-start validate" id="EAvailabilityErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3 ">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EPerformance" value="" required="">
                                    <label class="input-padding">Quality % Target</label>
                                    <span class="paddingm float-start validate" id="EPerformanceErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EQuality" value="" required="">
                                    <label class="input-padding">Availability % Target </label>
                                    <span class="paddingm float-start validate" id="EQualityErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EOEE" value="" required="">
                                    <label class="input-padding">OEE % Target</label>
                                    <span class="paddingm float-start validate" id="EOEEErr"></span>
                                </div>
                            </div>
                        </div>             
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_GFM" name="Update_GFM" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditDTModal" tabindex="-1" aria-labelledby="EditDTModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="EditDTModal1" style="">DOWNTIME THRESHOLD</p>
            </div>
            <form method="post" class="addMachineForm" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="box float-start col-lg-3">
                            <div class="input-box">
                                <input type="text" class="form-control font_weight" name="Update_DThreshold" id="Update_DThreshold" required="">
                                <label class="input-padding">Downtime Threshold</label>
                                <span class="unit clip">min</span>
                                <span class="paddingm float-start validate" id="Update_DThresholdErr"></span>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_DT" name="" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- Add downtime reasons -->
<div class="modal fade" id="EditDRModal" tabindex="-1" aria-labelledby="EditDRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="EditDRModal1" style="">DOWNTIME REASONS</p>
            </div>
            <form method="post" enctype="multipart/form-data"  id="EditDRModalSubmit" class="addMachineForm" action="<?= base_url('Settings_controller/UploadDowntime/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
            <!-- temporary hidding for strategy -->  
            <!-- <div class="">
                    <div class="row">
                        <div class="col">
                            <div class="dot float-end DRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-body DRModal" style="max-height: 400px;overflow: auto;">
                    
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="DTName" id="DTName" required="">
                                    <label class="input-padding">Reason Name</label>
                                    <span class="paddingm float-start validate" id="DTNameErr"></span>
                                    <span class="float-end charCount" id="DTNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <select class="form-select font_weight" name="DTRCategory" id="DTRCategory">
                                    <option value="">Select</option>
                                        <option value="Planned">Planned</option>
                                        <option value="Unplanned">Unplanned</option>
                                    </select>
                                    <label class="input-padding">Downtime Category</label>
                                </div>
                            </div>
                            <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="DTReasonVal" name="" value="" class="DTReason" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" class="downtime_img form-control form-control-md" id="attach_file" name="DTReasonimg[]" required="true" multipart="multipart">
                                    <span class="unit"><i class="fa fa-paperclip clip DTI " style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="add_img_err img_validate float-end"></span> -->
                                </div>
                            </div>
                        </div>
                        </div> 
                        
                    </div>          
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn submit_downtime_reason" id="submit_downtime_reason" name="Upload_Downtime_Reason" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- downtime reasons add modal end -->

<!-- downtime reasons edit modal -->
<div class="modal fade" id="updateDRModal" tabindex="-1" aria-labelledby="updateDRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="updateDRModal1" style="">Edit DOWNTIME REASONS</p>
            </div>
            <form method="post" enctype="multipart/form-data" id="updateDRModalForm" class="addMachineForm" action="<?= base_url('Settings_controller/UpdateDowntime/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="modal-body DRModal" style="max-height: 400px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="UDTName" id="UDTName" value="" required="">
                                    <label class="input-padding">Reason Name</label>
                                    <span class="paddingm float-start validate" id="UDTNameErr"></span>
                                    <span class="float-end charCount" id="UDTNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <select class="form-select font_weight" name="UDTRCategory" id="UDTRCategory" >
                                        <!-- <option value="Planned">Planned</option>
                                        <option value="Unplanned">Unplanned</option> -->
                                    </select>
                                    <label class="input-padding">Downtime Category</label>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control UDTReason font_weight" name="" value="" id="UDTReason" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="update_attach_file" name="UDTReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip UDTI " style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="edit_img_err float-end img_validate"></span> -->
                                </div>
                            </div>
                            <div>
                                <input type="text" name="UDTRRecord" id="UDTRRecord" value="" style="display: none;">
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_Downtime_Reason" id="" name="Update_Downtime_Reason" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- downtime reasons edit modal end -->
<!-- quality reasons ADD -->
<div class="modal fade" id="EditQRModal" tabindex="-1" aria-labelledby="EditQRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:100; ">
                <p class="modal-title general_header_model" id="EditQRModal1" style="">QUALITY REASONS</p>
            </div>
            <form method="post" enctype="multipart/form-data" id="EditQRModalForm" class="addMachineForm" action="<?= base_url('Settings_controller/UploadQuality/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <!-- temporary hidding for strategy -->
            <!-- <div class="">
                    <div class="row">
                        <div class="col">
                            <div class="dot float-end QRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-body QRModal" style="max-height: 200px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="QReasonName" id="QReasonName" required="">
                                    <label class="input-padding">Reason Name</label>
                                    <span class="paddingm float-start validate" id="QReasonNameErr"></span>
                                    <span class="float-end charCount" id="QReasonNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="" id="Qreason" value="" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="attach_file_Quality" name="QReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip QRI" style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="qr_img_err float-end  img_validate"></span> -->
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn submit_quality_reason" name="" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- quality reasons add end -->
<!-- quality reasons edit modal -->
<div class="modal fade" id="updateQRModal" tabindex="-1" aria-labelledby="UpdateQRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="UpdateQRModal1" style="">QUALITY REASONS</p>
            </div>
            <form method="post" enctype="multipart/form-data" id="updateQRModalForm" class="addMachineForm" action="<?= base_url('Settings_controller/UpdateQuality/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="">
                    <div class="row">
                        <div class="col">
                            <div class="dot float-end QRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                </div>
                <div class="modal-body QRModal" style="max-height: 200px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="UQReasonName" value id="UQReasonName" required="">
                                    <label class="input-padding">Reason Name</label>
                                    <span class="paddingm float-start validate" id="UQReasonNameErr"></span>
                                    <span class="float-end charCount" id="UQReasonNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="" id="UQReasonImg" value="" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="update_file_Quality" name="UQReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip UQRI" style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="edit_qr_img img_validate float-end"></span> -->
                                </div>
                                <div>
                                    <input type="text" name="UQRRecord" id="UQRRecord" value="" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn submit_qualityup_reason" name="" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- quality reasons edit modal end -->
<div class="modal fade" id="EditWSM" tabindex="-1" aria-labelledby="EditWSM1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="EditWSM1" style="">WORK SHIFT MANAGEMENT</p>
            </div>
            <form method="post" class="addMachineForm" action="" >
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="time" class="form-control font_weight" id="NoOfHour" required="">
                                    <label class="input-padding">No.of Hours/ Shift</label>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="time" class="form-control font_weight" id="SSTime" required="">
                                    <label class="input-padding">1<sup>st</sup> Shift Start Time</label>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn updateSST" name="" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>


<div class="modal fade" id="DeactiveReasonModal" tabindex="-1" aria-labelledby="DeactiveReasonModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveReasonModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this reason record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Update_RReason" name="Edit_Machine" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveQReasonModal" tabindex="-1" aria-labelledby="DeactiveQReasonModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveQReasonModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this reason record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Update_QReason" name="" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<!-- strategy model for current_shift_performance -->
<div class="modal fade" id="current_shit_performance" tabindex="-1" aria-labelledby="current_shit_performance" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title general_header_model" id="current_shit_performance" style="">CURRENT SHIFT PERFORMANCE</p>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box ">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control form-control-lg target_value_edit font_weight" style="font-size:0.9rem;" name="targetvalue" id="targetvalue" value="" required="">
                                    <label class="input-padding">OEE% Target</label>
                                    <span class="add_target_data" style="color:red;font-size:0.8rem;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="reason-box-cf1" >
                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem; height:3rem;">
                                    <div class="" style="color:#00B050;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Green</p></div>
                                    <div class="" style="color:#00B050;width:20%;">
                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                    </div>
                                    <div class="" style="color:grey;width:20%;">
                                       <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                    </div>
                                    <div class="" style="width:30%;">
                                        <!-- <p style="text-align:center;justify-content:center;margin:auto;">85%</p> -->
                                        <input type="text" class="form-control form-control-md green_value_edit font_weight" value="" name="green" id="green">
                                    </div>
                                </div>
                            </div>
                            <span class="add_green_data" style="color:red;font-size:0.8rem;"></span>
                        </div>
                        <div class="col-lg-4">
                            <div class="reason-box-cf1" >
                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center; height:3rem;">
                                    <div class="" style="color:#ffc000;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Yellow</p></div>
                                    <div class="" style="color:#ffc000;width:15%;">
                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                    </div>
                                    <div class="" style="color:grey;width:20%;">
                                    <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                    </div>
                                    <div class="" style="width:30%;">
                                        <!-- <p style="text-align:center;justify-content:center;margin:auto;">85%</p> -->
                                        <input type="text" class="form-control form-control-md yellow_value_edit font_weight" id="yellow" name="yellow" value="">
                                    </div>
                                </div>
                            </div>
                            <span class="add_yellow_data" style="color:red;font-size:0.8rem;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="reason-box-cf1" >
                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                    <div class="" style="color:#d60800;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Red</p></div>
                                    <div class="" style="color:#d60800;width:20%;">
                                        <i class="fa fa-circle" style="font-size:1.5rem;"></i>
                                    </div>
                                   
                                    <div class="" style="color:grey;font-size:0.8rem; width:50%;">
                                        <p style="text-align:center;justify-content:center;margin:auto;font-weight:bold;">any other values</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn btn_current_shift" name="" id="btn_current_shift" value="Save" style="color: white;background: #005abc;">Save</a>
                <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
            </div>
        </div>
    </div>
</div>
<!-- current_shift_performance end -->

<!-----add of operator user interface script function-----> 
<script src="<?php echo base_url(); ?>/assets/js/Settings_Goals_Others.js"></script>
<!-- <script src="<?php echo base_url(); ?>/assets/js/settings_goals_current_shift.js"></script>
 --><script type="text/javascript">
    $(document).on('click','#submit_downtime_reason',function(){
        $("#EditDRModalSubmit").submit(false);
        var a = DTName();
        // alert(a);
        
        if (a != ""){
            $("#DTNameErr").html(a);
        }
        else{
            var file = document.getElementsByClassName("downtime_img");
            document.getElementById("EditDRModalSubmit").submit();
        }
    });

    $(document).on('click','.Update_Downtime_Reason',function(){
       // alert('update Downtime');
        $("#updateDRModalForm").submit(false);
        var a = UDTName();
        //alert(a);
        if (a != ""){
            $("#UDTNameErr").html(a);
        }
        else{
            document.getElementById("updateDRModalForm").submit();
        }
    });

    $(document).on('click','.submit_quality_reason',function(){
        $("#EditQRModalForm").submit(false);
        var a = QReasonName();
        if (a != ""){
            $("#QReasonNameErr").html(a);
        }
        else{
            document.getElementById("EditQRModalForm").submit();
        }
    });

$(document).on('click','.submit_qualityup_reason',function(){
        $("#updateQRModalForm").submit(false);
        var a = UQReasonName();
        if (a != ""){
            $("#UQReasonNameErr").html(a);
        }
        else{
            document.getElementById("updateQRModalForm").submit();
        }
    });
    

    $(document).on('change','#attach_fie',function(){
        // var f = $('#attach_file').$(this).val();
        // console.log(f);
        //alert('ok');
    });


    function demo123() {
      var titles = $('input[name^=DTReasonImg]').map(function(idx, elem) {
        return $(elem).val();
      }).get();

      //console.log(titles);
      event.preventDefault();
    }
    //$(document).ready(function(){      
        $(document).on("click", ".DRAdd", function(){
            //var count = $(".DRModel .container").length;
            //alert(count);
            $('.DRModal').append('<div class="DownreasonDiv">'
                        +'<div class="row"><div><i class="rmDR fa fa-trash-o float-end" style="font-size:25px;cursor:pointer;"></i></div></div>'
                        +'<div class="row">'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box fieldStyle">'
                                    +'<input type="text" class="form-control" name="" required="">'
                                    +'<label class="input-padding">Reason Name</label>'
                                    +'<span class="paddingm float-start validate" id="DTNameErr"></span>'
                                    +'<span class="float-end charCount" id="DTNameCunt"></span>'
                                +'</div>'
                            +'</div>'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box fieldStyle">'
                                    +'<select class="form-select" name="DTRCategory" id="DTRCategory">'
                                        +'<option value="Planned">Planned</option>'
                                        +'<option value="Unplanned">Unplanned</option>'
                                    +'</select>'
                                    +'<label class="input-padding">Downtime Category</label>'
                                +'</div>'
                            +'</div>'
                        +'</div>' 
                        +'<div class="row" class="input-box">'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box fieldStyle">'
                                    +'<input type="file" class="form-control form-control-md" name="DTReasonimg[]" id="attache_file" required="true" multipart="true">'
                                    +'<span class="unit"><i class="fa fa-paperclip clip QRI" style="font-size: 20px;" aria-hidden="true"></i></span>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div>');
        });
// });
        $(document).on("click", ".rmDR", function(){
            //$('.DRModal').children().last().remove()
            $(this).closest('.DownreasonDiv').remove();
        });
                    
        $(document).on("click", ".QRAdd", function(){
            $('.QRModal').append('<div class="QultreasonDiv">'
                        +'<div class="row"><div><i class="rmQR fa fa-trash-o float-end" style="font-size:25px;cursor:pointer;"></i></div></div>'
                        +'<div class="row">'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box fieldStyle">'
                                    +'<input type="text" class="form-control" name="" required="">'
                                    +'<label class="input-padding">Reason Name</label>'
                                    +'<span class="paddingm float-start validate" id="QReasonNameErr"></span>'
                                    +'<span class="float-end charCount" id="QReasonNameCunt"></span>'
                                +'</div>'
                            +'</div>'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box fieldStyle">'
                                    +'<input type="text" class="form-control" name="" id="Qreason" value="" required="">'
                                    +'<label class="input-padding">Reason Image</label>'
                                    +'<input type="file" style="display: none;" id="attach_file_Quality" name="QReasonImg">'
                                    +'<span class="unit"><i class="fa fa-paperclip clip QRI" style="font-size: 20px;" aria-hidden="true"></i></span>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div>');
        });
        $(document).on("click", ".rmQR", function(){
            $(this).closest('.QultreasonDiv').remove()
        });
    
        // temporary hidding nk
    // var text_max = 10;
    // $('#count_message').html('0 / ' + text_max +' char left' );

    // $('#text').keyup(function() {
    //   var text_length = $('#text').val().length;
    //   var text_remaining = text_max - text_length;
      
    //   $('#count_message').html(text_remaining + ' / ' + text_max + ' char left');
    // });


//financial Metrics ajax part start//
    $.ajax({
        url: "<?php echo base_url('Settings_controller/getGoalsFinancialData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#OTEEP').html(
                        res[0].overall_teep
            );
            $('#OOOE').html(
                        res[0].overall_ooe
            );
            $('#OOEE').html(
                        res[0].overall_oee
            );
            $('#Performance').html(
                        res[0].availability
            );
            $('#Quality').html(
                        res[0].performance
            );
            $('#Availability').html(
                        res[0].quality
            );
            $('#OEE').html(
                        res[0].oee_target
            );

            $('#EOTEEP').val(res[0].overall_teep);
            $('#EOOOE').val(res[0].overall_ooe);
            $('#EOOEE').val(res[0].overall_oee);
            $('#EPerformance').val(res[0].performance);
            $('#EQuality').val(res[0].quality);
            $('#EAvailability').val(res[0].availability);
            $('#EOEE').val(res[0].oee_target);
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    // var myClass = document.getElementsByClassName('DTI');
    $(document).on("click", ".DTI", function(){
    //     var count = $(".DTI");
    //     var index_value = count.index($(this));
        $("#attach_file").click();
        $('#attach_file').on('change', function() {
            //alert(this.files[0].name);
            //alert('ok');
            var file_input = document.getElementById('attach_file').value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
            if (!allowedExtensions.exec(file_input)) {
                alert('Invalid File Extension....');
                $('.add_img_err').html('Valid Image jpg , jpeg , png , gif ,tif  ,webp.');
               // fileInput.value = '';
               // return false;
            }
            else
            {
                $('.add_img_err').html(' ');
                $('#DTReasonVal').val(this.files[0].name);
            }
            // $('.DTReason').siblings().val('');
        });
    }); 
    $(document).on("click", ".QRI", function(){
        $("#attach_file_Quality").click();
        $('#attach_file_Quality').on('change', function() {
            var input_file = document.getElementById('attach_file_Quality').value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
            if (!allowedExtensions.exec(input_file)) {
                alert('Invalid File Extension....');
                $('.qr_img_err').html('Valid Image jpg , jpeg , png , gif ,tif  ,webp.');
               // fileInput.value = '';
               // return false;
            }
            else
            {
                $('.qr_img_err').html(' ');
                $('#Qreason').val(this.files[0].name);
            }
        });
    });
    $(document).on("click", ".UDTI", function(){
        $("#update_attach_file").click();
        $('#update_attach_file').on('change', function() {
            var file_input = document.getElementById('update_attach_file').value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
            if (!allowedExtensions.exec(file_input)) {
                alert('Invalid File Extension.....');
                $('.edit_img_err').html('Valid Image jpg , jpeg , png , gif ,tif  ,webp.');
            }else{
                $('.edit_img_err').html(' ');
                $('.UDTReason').val(this.files[0].name);
            }
        });
    });
    // downtime Reasons Upload Image Validation
    $(document).on("click", ".UQRI", function(){
        $("#update_file_Quality").click();
        $('#update_file_Quality').on('change', function() {
            // edit_qr_img
            var file_input = document.getElementById('update_file_Quality').value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
            if (!allowedExtensions.exec(file_input)) {
                alert('Invalid File Extension.....');
                $('.edit_qr_img').html('Valid Image jpg , jpeg , png , gif ,tif  ,webp.'); 
            }else{
                $('.edit_qr_img').html(' '); 
                $('#UQReasonImg').val(this.files[0].name);
            }
          
        });

    });

    // update shift working on mani
     $(document).on("click", ".updateSST", function(){
        var hours = $('#NoOfHour').val();
        var staringTime = $('#SSTime').val();
        //alert(staringTime);
        $.ajax({
            url: "<?php echo base_url('Settings_controller/updateShift'); ?>",
            type: "POST",
            data: {
                hours : hours,
                startingTime: staringTime,
            },
            dataType: "json",
            success:function(res){
                //console.log(res);
                // alert(res);
                location.reload();
                //alert("Data has been updated successfully!");
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });

     });
     $.ajax({
            url: "<?php echo base_url('Settings_controller/getShiftData'); ?>",
            type: "GET",
            dataType: "json",
            success:function(res){
                // alert(res['shift']);
                res['shift'].forEach(function(item){
                    var elements = $();
                    var temp = item.shifts.split("");
                    elements = elements.add('<tr>'
                        +'<td>'+'Shift '+temp[0]+'</td>'
                        +'<td>'+item.start_time+'</td>'
                        +'<td>'+item.end_time+'</td>'
                    +'</tr>');
                    $('#shift').append(elements);
                });
                $('#NoOfHour').val(res['duration'][0]['duration']); 
                var tmp = res['shift'][0]['start_time'].split(":");   
                var x = tmp[0]+":"+tmp[1];     
                $('#SSTime').val(x);
                // // $('#NoOfHourShift').empty();
                // // $('#ShiftStart').empty();                    
                $('#NoOfHourShift').html(
                    res['duration'][0]['duration']
                );
                $('#ShiftStart').html(
                    res['shift'][0]['start_time']
                );
                        // $('#EditWSM').modal('hide');
                    // } 
            },
            error:function(res){
                alert("No current shift data*!!");
            }
        });    
    $('.Update_GFM').on('click',function(){
        var a = EOTEEP();
        var b = EOOOE();
        var c = EOOEE();
        var d = EAvailability();
        var e = EPerformance();
        var f = EQuality();
        var g = EOEE();
        // alert(a);
        if (a != "" || b!="" || c!="" || d!="" || e!="" || f!="" || g!=""){
            $("#EOTEEPErr").html(a);
            $("#EOOOEErr").html(b);            
            $("#EOOEEErr").html(c);
            $("#EAvailabilityErr").html(d);        
            $("#EPerformanceErr").html(e);            
            $("#EQualityErr").html(f);
            $("#EOEEErr").html(g);
        }
        else{
            
            var  VEOTEEP = $('#EOTEEP').val();
            var  VEOOOE = $('#EOOOE').val();
            var  VEOOEE = $('#EOOEE').val();
            var  VEPerformance = $('#EPerformance').val();
            var  VEQuality = $('#EQuality').val();
            var  VEAvailability = $('#EAvailability').val();
            var  VEOEE = $('#EOEE').val();
            //alert(VEOEE);
            $.ajax({
                url: "<?php echo base_url('Settings_controller/editGFMData'); ?>",
                type: "POST",
                data: {
                    EOTEEP : VEOTEEP,
                    EOOOE: VEOOOE,
                    EOOEE : VEOOEE,
                    EPerformance: VEPerformance,
                    EQuality : VEQuality,
                    EAvailability: VEAvailability,
                    EOEE : VEOEE,
                },
                dataType: "json",
                success:function(res){
                    
                    location.reload();
                    //alert("Data has been updated successfully!");
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        }
    });

    $(document).on("click", ".Update_DT", function(){
        var a = Update_DThreshold();
        if (a != ""){
            $("#Update_DThresholdErr").html(a);
        }
        else{
            var  DT = $('#Update_DThreshold').val();
            $.ajax({
                url: "<?php echo base_url('Settings_controller/editDTData'); ?>",
                type: "POST",
                data: {
                    DT : DT
                },
                dataType: "json",
                success:function(res){
                    location.reload();
                    //alert("Data has been updated successfully!");
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        }
    });

    $.ajax({
        url: "<?php echo base_url('Settings_controller/getDowntimeTData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#ODT').html(res[0].downtime_threshold+" "+"min");
            $('#Update_DThreshold').val(res[0].downtime_threshold);
                $('#range').html('-RED');
                $("#range").css("color","#C00000");
                $("#range").css("font-weight","1000");
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });

// access control for particular user
    var control_edit_display = <?php echo($this->data['access'][0]['settings_general']); ?>;
    var control_edit_display_dreason = " ";
    var control_edit_display_qreason = " ";
    if (control_edit_display < 2) {
        control_edit_display_dreason = "none";
        control_edit_display_qreason = "none";
    }else{
        control_edit_display_dreason = "inline";
        control_edit_display_qreason = "inline";
    }


    $.ajax({
        url: "<?php echo base_url('Settings_controller/getDowntimeRData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#DTReasonContent').empty();
            var elements = $();
            res.forEach(function(item){
                    if (item.downtime_category == "Planned") {
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Downtime_Reason/Planned/'+item.uploaded_file_name+'.png" alt="" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight fontbox"><p class="alignCenter font_weight">'+item.downtime_reason+'</p></div>'
                        +'<div class="dotHover dclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh  reason-pen" style="color:grey; "></i></div>'
                        +'<div class="dotHover1 drclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh reason-pen" ></i></div>'
                        +'</div>');
                    } 
                    else{
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Downtime_Reason/Unplanned/'+item.uploaded_file_name+'.png" alt="" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight fontbox"><p class="alignCenter font_weight">'+item.downtime_reason+'</p></div>'
                        +'<div class="dotHover dclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh reason-pen" style="color:grey;"></div>'
                        +'<div class="dotHover1 drclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh reason-pen"></i></div>'
                        +'</div>');
                    }            
                    
                    $('#DTReasonContent').append(elements);
            });
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    $.ajax({
        url: "<?php echo base_url('Settings_controller/getQualityData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            //console.log(res);
            $('#QReasonContent').empty();
            var elements = $();
            res.forEach(function(item){  

                elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Quality_Reason/'+item.uploaded_file_name+'.'+item.uploaded_file_extension+'" alt="" width="100%" height="100%"></div>'
                +'<div class="col.float-start down d-flex fontheight fontbox"><p class="alignCenter font_weight">'+item.quality_reason_name+'</p></div>'
                +'<div class="dotHover qclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_qreason+'"><img src="<?php echo base_url('assets/img/pencil.png') ?>" class="reason-pen img_font_wh"></i></div>'
                +'<div class="dotHover1 qrclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_qreason+'"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh reason-pen"></i></div>'
                +'</div>');      
                $('#QReasonContent').append(elements);
            });
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    $(document).on("click", ".drclick", function(){
        $('#DeactiveReasonModal').modal('show');
        var rvalue = $(this).attr("rvalue");
        $(document).on("click", ".Update_RReason", function(){
            $.ajax({
                url: "<?php echo base_url('Settings_controller/deleteDownReason'); ?>",
                type: "POST",
                data: {
                    Record_No : rvalue,
                },
                dataType: "json",
                success:function(res){
                    //alert(res);
                    location.reload();
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });
    });
    $(document).on("click", ".dclick", function(){
        //alert($(this).attr("rvalue"));
            var id = $(this).attr("rvalue");
            // alert(id);
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getDownReason'); ?>",
                type: "POST",
                data: {
                    Record_No :id ,
                },
                dataType: "json",
                success:function(res){
                    //location.reload();
                    $('#UDTName').val(res[0].downtime_reason);
                    $('#UDTRCategory').empty();

                    var elements = $();
                    if (res[0].downtime_category == "Planned") {
                        elements = elements.add('<option value="'+res[0].downtime_category+'" selected>'+res[0].downtime_category+'</option>'
                            +'<option value="Unplanned">Unplanned</option>');         
                    }
                    else{
                        elements = elements.add('<option value="'+res[0].downtime_category+'" selected>'+res[0].downtime_category+'</option>'
                            +'<option value="Planned">Planned</option>');
                    }            
                    $('#UDTRCategory').append(elements);
                    $('#UDTReason').val(res[0].original_file_name);  
                    $('#UDTRRecord').val(res[0].image_id);           
                    $('#updateDRModal').modal('show');
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
    });
    $(document).on("click", ".qclick", function(){
        var id = $(this).attr("rvalue");
        $.ajax({
                url: "<?php echo base_url('Settings_controller/getQualiyReason'); ?>",
                type: "POST",
                data: {
                    Record_No : id,
                },
                dataType: "json",
                success:function(res){
                     $('#UQReasonName').val(res[0].quality_reason_name);
                     $('#UQReasonImg').val(res[0].original_file_name);  
                     $('#UQRRecord').val(res[0].image_id);           
                     $('#updateQRModal').modal('show');
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
    });
    $(document).on("click", ".qrclick", function(){
        var id = $(this).attr("rvalue");
        $('#DeactiveQReasonModal').modal('show');
        $(document).on("click", ".Update_QReason", function(){
            $.ajax({
                url: "<?php echo base_url('Settings_controller/deleteQualityReason'); ?>",
                type: "POST",
                data: {
                    Record_No : id,
                },
                dataType: "json",
                success:function(res){
                    // alert(res);
                    location.reload();
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });
    });
// current shift performance
// strategy code
$(document).on('click','#btn_current_shift',function(){
    
    var green = document.getElementById("green").value;
    var yellow = document.getElementById("yellow").value;
    // var red = document.getElementById("").value;
    var target = document.getElementById("targetvalue").value;
    // var num = /^[0-9]*$/;
    if (parseInt(target) < 100) {
        if (parseInt(green) > parseInt(yellow)) {
            if (parseInt(yellow) < parseInt(green)) {

                 $.ajax({
                    url: '<?php echo base_url('Settings_controller/current_shift_performance'); ?>',
                    method:'post',
                    data:{green:green,yellow:yellow,target:target},
                    dataType: 'json',
                    success:function(data){
                        //console.log(data);
                        location.reload();
                    },
                    error:function(err){
                        alert("something went wrong");
                    }
                });
            }else{
                $('.add_yellow_data').html('yellow should be lesser than green');
                $('.btn_current_shift').attr("disabled",true);
            }
        }else{
                $('.add_green_data').html('yellow should be lesser than green');
                 $('.btn_current_shift').attr("disabled",true);
        }   
    }else{
    $('.add_target_data').html(' Valid Number');
     $('.btn_current_shift').attr("disabled",true);

    }
   
   
           
    
});

// retrive data in current_shift_perfreason-box-cfrmance
$(document).ready(function(){
   $.ajax({
       url : "<?php echo base_url('Settings_controller/current_shift_retrive') ?>",
       method:'post',
       dataType:'json',
       // data:{work:work},
       success:function(res){
        // alert(res[0].green);
           var green_val = res[0].green+"%";
           var yellow_val = res[0].yellow+"%";
           var oee_val = res[0].oee+"%";
            $('.green_val').html(green_val);
            $('.yellow_val').html(yellow_val);
            $('.target_val').html(oee_val);
            $('.target_value_edit').val(oee_val);
            $('.yellow_value_edit').val(yellow_val);
            $('.green_value_edit').val(green_val);
           // alert(res[0].green);
       },
       error:function(err){
        alert('something went wrong, try again !!');
       }
   });
});


// // strategy overall teep validation code
function EOTEEP(){
	var val = $("#EOTEEP").val();
	//sreturn val;
	val = parseInt(val);
    if(val < 100){
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "Overall TEEP **";
        }
        else{
            //([0-9]*[.])?[0-9]*;
            var num = /^([1-9][0-9]*)?$/;
            //var num = /^(?!0\d)\d*(\.\d+)?$/;
            // var num = /^[1-9][0-9]*([.][0-9]{1})$/;
            //var num =/(?:\d*\.\d{1}|\d+)$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EOTEEP").val(parseFloat($("#EOTEEP").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";		
         
         
            }
        }
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100 **";
    }
		
}
function EOOOE(){
	var val = $("#EOOOE").val();
	val = parseInt(val);
    if (val < 100) {
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "Overall OOE **";
        }
        else{
            var num = /^[1-9][0-9]*$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EOOOE").val(parseFloat($("#EOOOE").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";
            }
        }   
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100 **";
    }
	
}
function EOOEE(){
	var val = $("#EOOEE").val();
	val = parseInt(val);
    if (val < 100) {
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "Overall OEE **";
        }
        else{
            var num = /^[1-9][0-9]*$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EOOEE").val(parseFloat($("#EOOEE").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";
            }
        }   
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100 **";
    }
	
}
function EAvailability(){
	var val = $("#EAvailability").val();
	val = parseInt(val);
    if (val < 100) {
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "Availability **";
        }
        else{
            var num = /^[1-9][0-9]*$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EAvailability").val(parseFloat($("#EAvailability").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";
            }
        }  
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100 **"; 
    }
	
}
function EPerformance(){
	var val = $("#EPerformance").val();
	val = parseInt(val);
    if(val < 100){
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "Performance **";
        }
        else{
            var num = /^[1-9][0-9]*$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EPerformance").val(parseFloat($("#EPerformance").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";
            }
        }
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100 **";
    }
}
function EQuality(){
	var val = $("#EQuality").val();
	val = parseInt(val);

    if(val < 100){
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "Quality **";
        }
        else{
            var num = /^[1-9][0-9]*$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EQuality").val(parseFloat($("#EQuality").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";
            }
        }
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100 **";
    }
}
function EOEE(){
	var val = $("#EOEE").val();
	val = parseInt(val);
    if(val < 100){
        if (!val) {
            $(".Update_GFM").attr("disabled", true);
            return "OEE **";
        }
        else{
            //var num = /^([1-9]{1,2}|100)$/;
            var num = /^[1-9][0-9]*$/;
            if (num.test(val)) {
                $(".Update_GFM").removeAttr("disabled");
                $("#EOEE").val(parseFloat($("#EOEE").val()).toFixed(1));
                return "";
            }
            else{
                $(".Update_GFM").attr("disabled", true);
                return "Invalid**";
            }
        }
    }else{
        $(".Update_GFM").attr("disabled", true);
            return "Lesser 100**";
    }
}

$('#EOTEEP').on('blur',function(){
    var x =EOTEEP();
   $("#EOTEEPErr").html(x);
});
$('#EOOOE').on('blur',function(){
    var x =EOOOE();
   $("#EOOOEErr").html(x);
});
$('#EOOEE').on('blur',function(){
    var x =EOOEE();
   $("#EOOEEErr").html(x);
});
$('#EAvailability').on('blur',function(){
    var x =EAvailability();
   $("#EAvailabilityErr").html(x);
});
$('#EPerformance').on('blur',function(){
    var x =EPerformance();
   $("#EPerformanceErr").html(x);
});
$('#EQuality').on('blur',function(){
    var x =EQuality();
   $("#EQualityErr").html(x);
});
$('#EOEE').on('blur',function(){
    var x =EOEE();
   $("#EOEEErr").html(x);
});

// current_shift_performance strategy code validation
// current_shift_performance strategy code validation
$(document).on('blur','#green',function(){
    // alert('green');
     var num = /^[1-9][0-9]*$/;
     var green = document.getElementById("green").value;
     var yellow = document.getElementById("yellow").value;
     var err_msg = " ";
    green = green.replace("%", "");
    green = green.trim();
     if (num.test(green)) {
         if ((parseInt(green) > parseInt(yellow))) {
             if (parseInt(green) < 100) {
                 err_msg = " ";
            $(".btn_current_shift").removeAttr("disabled");
             }else{
                 err_msg = "Lesser than 100";
                $(".btn_current_shift").attr("disabled", true);
             }
         }else{
             err_msg = "green should be greater than yellow";
                $(".btn_current_shift").attr("disabled", true);
         }
     }else{
         err_msg = "Invalid Data**";
        $(".btn_current_shift").attr("disabled", true);

     } 
     $('.add_green_data').html(err_msg);
});
$(document).on('blur','#yellow',function(){
    // alert('green');
     var num =  /^[1-9][0-9]*$/;
     var yellow = document.getElementById("yellow").value;
     var green = document.getElementById('green').value;
    yellow = yellow.replace("%", "");
    yellow = yellow.trim();
    var err_msg = " ";
     if (num.test(yellow)) {
         if (parseInt(yellow) < parseInt(green)) {
             if (parseInt(yellow) < 100) {

                 err_msg = " ";
            $(".btn_current_shift").removeAttr("disabled");
                // $(".btn_current_shift").show();
             }else{
                 err_msg = "Lesser than 100";
                $(".btn_current_shift").attr("disabled", true);

             }
         }else{
             err_msg = "yellow should be lessser than  green";
           $(".btn_current_shift").attr("disabled", true);
         }
            
     } else{
         err_msg = "Invalid data***";
        $(".btn_current_shift").attr("disabled", true);
     } 
     $('.add_yellow_data').html(err_msg);
});


$(document).on('blur','#targetvalue',function(){
    // alert('green');
     var num = /^[1-9][0-9]*$/;
     var target = document.getElementById("targetvalue").value;
     var err_msg = " ";
    target = target.replace("%", "");
    target = target.trim();
     if (num.test(target)) {
         if (parseInt(target) < 100) {
             err_msg = " ";
             $(".btn_current_shift").removeAttr("disabled");
         }else{
             err_msg = "Lesser than 100";
              $(".btn_current_shift").attr("disabled",true);
         }
     } else{
         err_msg = "Invalid data***";
          $(".btn_current_shift").attr("disabled",true);
     }
     $('.add_target_data').html(err_msg); 
});

</script>
