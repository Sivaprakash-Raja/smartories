<div style="margin-left: 4.5rem;">
    <nav class="navbar navbar-expand-lg settings_nav sticky-top fixsubnav">
      <div class="container-fluid paddingm">
        <p class="float-start" id="logo">General Settings</p>
      </div>
    </nav>
    <div>
        <div class="contentGeneralSettings">
            <div style="margin:1.1rem;">
                    <div class="card" style="border-radius: 10px 10px 10px 10px;">
                        <p class="fieldTitle input-padding">GOALS</p>
                        <div class="content-container">
                            <div class="row paddingm"> 
                                <div class="col paddingm">
                                    <p class="card-subtitle float-start title">FINANCIAL METRICS</p>
                                    <i class="fa fa-pencil float-end edit-pen" style="margin-top: 20px;" data-bs-toggle="modal" data-bs-target="#EditFMModal"></i>
                                </div>
                            </div>
                        </div>     
                        <div class="container genmtop">
                            <div class="row paddingm">
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall TEEP % Target</label>
                                        <p class="paddingm"><span id="OTEEP"></span></p>
                                </div>
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall OOE % Target</label>
                                        <p class="paddingm"><span id="OOOE"></span></p>
                                </div>
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall OEE % Target</label>
                                        <p class="paddingm"><span id="OOEE"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="container genmtop">
                            <div class="row paddingm">
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Availability % Target</label>
                                        <p class="paddingm"><span id="Availability"></span></p>
                                </div>
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Performance % Target</label>
                                        <p class="paddingm"><span id="Performance"></span></p>
                                </div>
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Quality % Target</label>
                                        <p class="paddingm"><span id="Quality"></span></p>
                                </div>
                                <div class="float-start col-lg-3 paddingm ">
                                        <label class="headTitle">OEE % Target</label>
                                        <p class="paddingm"><span id="OEE"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid" style="margin-bottom: 0px;"><hr></div>
                        <div class="content-container">
                            <div class="row paddingm">
                                <div class="paddingm">
                                    <p class="card-subtitle float-start title">OPERATOR USER INTERFACE (OUI)</p>
                                </div>
                            </div>
                            <div class="genmtop">
                                <div class="flex-container paddingm">
                                    <div class="" style="width: 97%;">
                                        <div class="container">
                                            <label class="headTitle" style="margin-left: 18px;">Downtime Threshold<span id="range"></span></label>
                                            <p class="paddingm" style="margin-left: 18px;"><span id="ODT"></span></p>
                                        </div>
                                    </div>
                                    <div style="width: 3%;">
                                        <i class="fa fa-pencil float-end edit-pen" data-bs-toggle="modal" data-bs-target="#EditDTModal"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="genmtop">
                                <div class="subtitlecss">
                                    <div class="flex-container paddingm">
                                        <div class="paddingm dividercss" style="width: 15%;">
                                            <p class="font alignmargin float-end">Downtime Reasons</p>  
                                        </div>
                                        <div class="float-start dividercss" style="width: 85%;">
                                            <hr class="paddingm" style="width: 100%;">
                                        </div>
                                        <!---add of downtime threshold---->
                                        <div class="paddingm dividercss " style="width: 5%;">
                                            <div class="dot dot-css"><i class="fa fa-plus dot-cont"  data-bs-toggle="modal" data-bs-target="#EditDRModal"></i></div>
                                           <!--  <i class="fa fa-pencil paddingm edit-pen" style="margin-left: 1rem;"></i> -->
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
                                            <p class="font alignmargin ">Quality Reasons</p>  
                                        </div>
                                        <div class="float-start dividercss" style="width: 85%;">
                                            <hr class="paddingm" style="width: 100%;">
                                        </div>
                                        <div class="paddingm dividercss" style="width: 5%;">
                                            <div class="dot dot-css"><i class="fa fa-plus dot-cont"  data-bs-toggle="modal" data-bs-target="#EditQRModal"></i></div>
                                            <!-- <i class="fa fa-pencil edit-pen" style="margin-left: 1rem;" data-bs-toggle="modal" data-bs-target="#EditQRModal"></i> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="container genmtop" style="margin-bottom: 20px;">
                                        <div class="row paddingm" id="QReasonContent">
                                            <!-- Quality Reasons -->
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card genmtop" style="border-radius: 10px 10px 10px 10px;">
                        <p class="fieldTitle input-padding">WORK SHIFT MANAGEMENT</p>   
                        <div class="container genmtop" style="margin-bottom: 20px;margin-top: 20px;">
                            <div class="flex-container paddingm">
                                <div class="float-start col-lg-3">
                                    <div>
                                        <label class="headTitle">No.of Hours/ Shift</label>
                                        <p class="paddingm"><span id="NoOfHourShift"></span></p>
                                    </div>
                                </div>
                                <div class="float-start col-lg-3">
                                    <div>
                                        <label class="headTitle">1<sup>st</sup> Shift Start Time</label>
                                        <p class="paddingm"><span id="ShiftStart"></span></p>                                    
                                    </div>
                                </div>
                                <div class="float-start col-lg-5">
                                    <div>
                                        <label class="headTitle">Shift Timings</label>
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
                                    <i class="fa fa-pencil float-end edit-pen" data-bs-toggle="modal" data-bs-target="#EditWSM"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
<!--------financial Metrices edit option---->
<div class="modal fade" id="EditFMModal" tabindex="-1" aria-labelledby="EditFMModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditFMModal1" style="">FINANCIAL METRICS</h5>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control" id="EOTEEP" value="" required="">
                                <label class="input-padding">Overall TEEP % Target</label>
                                <span class="paddingm float-start validate" id="EOTEEPErr"></span>
                            </div>
                        </div>
                        <div class="box float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control" id="EOOOE" value="" required="">
                                <label class="input-padding">Overall OOE % Target</label>
                                <span class="paddingm float-start validate" id="EOOOEErr"></span>
                            </div>
                        </div>
                        <div class="box float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control" id="EOOEE" value="" required="">
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
                                    <input type="text" class="form-control" id="EAvailability" value="" required="">
                                    <label class="input-padding">Availability % Target</label>
                                    <span class="paddingm float-start validate" id="EAvailabilityErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3 ">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control" id="EPerformance" value="" required="">
                                    <label class="input-padding">Performance % Target</label>
                                    <span class="paddingm float-start validate" id="EPerformanceErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control" id="EQuality" value="" required="">
                                    <label class="input-padding">Quality % Target</label>
                                    <span class="paddingm float-start validate" id="EQualityErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control" id="EOEE" value="" required="">
                                    <label class="input-padding">OEE % Target</label>
                                    <span class="paddingm float-start validate" id="EOEEErr"></span>
                                </div>
                            </div>
                        </div>             
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_GFM" name="Update_GFM" value="SAVE" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>
<!------Downtime threshold edit option----->
<div class="modal fade bodercss" id="EditDTModal" tabindex="-1" aria-labelledby="EditDTModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditDTModal1" style="">DOWNTIME THRESHOLD</h5>
            </div>
            <form method="post" class="addMachineForm" action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="box float-start col-lg-3">
                            <div class="input-box">
                                <input type="text" class="form-control" name="Update_DThreshold" id="Update_DThreshold" required="">
                                <label class="input-padding">Downtime Threshold</label>
                                <span class="unit">min</span>
                                <!-- <span class="pull-right label label-default" id="count_message">h</span> -->
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_DT" name="" value="SAVE" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<div class="modal fade" id="EditDRModal" tabindex="-1" aria-labelledby="EditDRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditDRModal1" style="">DOWNTIME REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" class="addMachineForm" action="<?= base_url('Home/UploadDowntime/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="">
                    <div class="row">
                        <div class="col">
                            <div class="dot float-end DRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                </div>
                <div class="modal-body DRModal" style="max-height: 400px;overflow: auto;">
                    
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <input type="text" class="form-control" name="DTName" required="">
                                    <label class="input-padding">Reason Name</label>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <select class="form-select" name="DTRCategory" id="DTRCategory">
                                        <option value="Planned">Planned</option>
                                        <option value="Unplanned">Unplanned</option>
                                    </select>
                                    <label class="input-padding">Downtime Category</label>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <!-- <input type="text" class="form-control" name="" value="" id="DTReason" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="attach_file" name="DTReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip DTI " style="font-size: 20px;" aria-hidden="true"></i></span> -->
                                    <input type="file" id="attach_file" class="downtime_img form-control form-control-md" name="DTReasonimg[]" required="true" multipart="multipart">
                                    <span class="unit"><i class="fa fa-paperclip clip DTI " style="font-size: 20px;" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn" name="Upload_Downtime_Reason" value="SAVE" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="updateDRModal" tabindex="-1" aria-labelledby="updateDRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="updateDRModal1" style="">DOWNTIME REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" class="addMachineForm" action="<?= base_url('Home/UpdateDowntime/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="modal-body DRModal" style="max-height: 400px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <input type="text" class="form-control" name="UDTName" id="UDTName" value="" required="">
                                    <label class="input-padding">Reason Name</label>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <select class="form-select" name="UDTRCategory" id="UDTRCategory">
                                        <!-- <option value="Planned">Planned</option>
                                        <option value="Unplanned">Unplanned</option> -->
                                    </select>
                                    <label class="input-padding">Downtime Category</label>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <!-- <input type="text" class="form-control" name="" value="" id="UDTReason" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="update_attach_file" name="UDTReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip UDTI " style="font-size: 20px;" aria-hidden="true"></i></span> -->
                                    <input type="file" id="attach_file" class="downtime_img form-control form-control-md" name="DTReasonimg[]" required="true" multipart="multipart">
                                    <span class="unit"><i class="fa fa-paperclip clip DTI " style="font-size: 20px;" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="UDTRRecord" id="UDTRRecord" value="" style="display: none;">
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn" name="Update_Downtime_Reason" value="SAVE" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="EditQRModal" tabindex="-1" aria-labelledby="EditQRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditQRModal1" style="">QUALITY REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" class="addMachineForm" action="<?= base_url('Home/UploadQuality/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
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
                                <div class="input-box">
                                    <input type="text" class="form-control" name="QReasonName" required="">
                                    <label class="input-padding">Reason Name</label>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <input type="text" class="form-control" name="" id="Qreason" value="" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="attach_file_Quality" name="QReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip QRI" style="font-size: 20px;" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn" name="" value="SAVE" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<div class="modal fade" id="updateQRModal" tabindex="-1" aria-labelledby="UpdateQRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="UpdateQRModal1" style="">QUALITY REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" class="addMachineForm" action="<?= base_url('Home/UpdateQuality/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
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
                                <div class="input-box">
                                    <input type="text" class="form-control" name="UQReasonName" value id="UQReasonName" required="">
                                    <label class="input-padding">Reason Name</label>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <input type="text" class="form-control" name="" id="UQReasonImg" value="" required="">
                                    <label class="input-padding">Reason Image</label>
                                    <input type="file" style="display: none;" id="update_file_Quality" name="UQReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip UQRI" style="font-size: 20px;" aria-hidden="true"></i></span>
                                </div>
                                <div>
                                    <input type="text" name="UQRRecord" id="UQRRecord" value="" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn" name="" value="SAVE" style="color: white;background: #005abc;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<div class="modal fade" id="EditWSM" tabindex="-1" aria-labelledby="EditWSM1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditWSM1" style="">WORK SHIFT MANAGEMENT</h5>
            </div>
            <form method="post" class="addMachineForm" action="" >
                <div class="modal-body">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <input type="time" class="form-control" id="NoOfHour" required="">
                                    <label class="input-padding">No.of Hours/ Shift</label>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box">
                                    <input type="time" class="form-control" id="SSTime" required="">
                                    <label class="input-padding">1<sup>st</sup> Shift Start Time</label>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn updateSST" name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>


<div class="modal fade" id="DeactiveReasonModal" tabindex="-1" aria-labelledby="DeactiveReasonModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveReasonModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this reason record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Update_RReason" name="Edit_Machine" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveQReasonModal" tabindex="-1" aria-labelledby="DeactiveQReasonModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveQReasonModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this reason record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Update_QReason" name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>/assets/js/Settings_Goals_Others.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click", ".DRAdd", function(){
            //var count = $(".DRModel .container").length;
            //alert(count);
            $('.DRModal').append('<div class="">'
                        +'<div class="row"><div><i class="rmDR fa fa-trash-o float-end" style="font-size:25px;cursor:pointer;"></i></div></div>'
                        +'<div class="row">'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box">'
                                    +'<input type="text" class="form-control" name="" required="">'
                                    +'<label class="input-padding">Reason Name</label>'
                                +'</div>'
                            +'</div>'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box">'
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
                                +'<div class="input-box">'
                                    +'<input type="text" class="form-control" name="" required="">'
                                    +'<label class="input-padding">Reason Image</label>'
                                    +'<input type="file" style="display: none;" id="attach_file" name="DTReasonImg">'
                                    +'<span class="unit"><i class="fa fa-paperclip clip DTI " style="font-size: 20px;" aria-hidden="true"></i></span>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div>');
        });
        $(document).on("click", ".rmDR", function(){
            $('.DRModal').children().last().remove()
        });
                    
        $(document).on("click", ".QRAdd", function(){
            $('.QRModal').append('<div class="">'
                        +'<div class="row"><div><i class="rmQR fa fa-trash-o float-end" style="font-size:25px;cursor:pointer;"></i></div></div>'
                        +'<div class="row">'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box">'
                                    +'<input type="text" class="form-control" name="" required="">'
                                    +'<label class="input-padding">Reason Name</label>'
                                +'</div>'
                            +'</div>'
                            +'<div class="box float-start col-lg-6">'
                                +'<div class="input-box">'
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
            $('.QRModal').children().last().remove()
        });
    


    var text_max = 10;
    $('#count_message').html('0 / ' + text_max +' char left' );

    $('#text').keyup(function() {
      var text_length = $('#text').val().length;
      var text_remaining = text_max - text_length;
      
      $('#count_message').html(text_remaining + ' / ' + text_max + ' char left');
    });


    $.ajax({
        url: "<?php echo base_url('Home/getGoalsFinancialData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#OTEEP').html(
                        res[0].Overall_TEEP_Target
            );
            $('#OOOE').html(
                        res[0].Overall_OOE_Target
            );
            $('#OOEE').html(
                        res[0].Overall_OEE_Target
            );
            $('#Performance').html(
                        res[0].Performance_Target
            );
            $('#Quality').html(
                        res[0].Quality_Target
            );
            $('#Availability').html(
                        res[0].Availability_Target
            );
            $('#OEE').html(
                        res[0].OEE_Target
            );

            $('#EOTEEP').val(res[0].Overall_TEEP_Target);
            $('#EOOOE').val(res[0].Overall_OOE_Target);
            $('#EOOEE').val(res[0].Overall_OEE_Target);
            $('#EPerformance').val(res[0].Performance_Target);
            $('#EQuality').val(res[0].Quality_Target);
            $('#EAvailability').val(res[0].Availability_Target);
            $('#EOEE').val(res[0].OEE_Target);
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    $(document).on("click", ".DTI", function(){
        $("#attach_file").click();
        $('#attach_file').on('change', function() {
            $('#DTReason').val(this.files[0].name);
        });
    }); 
    $(document).on("click", ".QRI", function(){
        $("#attach_file_Quality").click();
        $('#attach_file_Quality').on('change', function() {
            $('#Qreason').val(this.files[0].name);
        });
    });
    $(document).on("click", ".UDTI", function(){
        $("#update_attach_file").click();
        $('#update_attach_file').on('change', function() {
            $('#UDTReason').val(this.files[0].name);
        });
    });
    $(document).on("click", ".UQRI", function(){
        $("#update_file_Quality").click();
        $('#update_file_Quality').on('change', function() {
            $('#UQReasonImg').val(this.files[0].name);
        });

    });

     $(document).on("click", ".updateSST", function(){
        var hours = $('#NoOfHour').val();
        var staringTime = $('#SSTime').val();
        //alert(hours+" "+staringTime);

        $.ajax({
            url: "<?php echo base_url('Home/updateShift'); ?>",
            type: "POST",
            data: {
                hours : hours,
                staringTime: staringTime,
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

     });
     $.ajax({
            url: "<?php echo base_url('Home/getShiftData'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){

            $('#NoOfHour').val(res[0].Number_Of_Hours);
            $('#SSTime').val(res[0].Start_Time);
            
            //alert(res[0].Number_Of_Hours);
            var NoH =res[0].Number_Of_Hours;
            var ShiftStart = res[0].Start_Time;
            
            // $('#NoOfHourShift').empty();
            // $('#ShiftStart').empty();
                    
            $('#NoOfHourShift').html(
                    NoH
            );
            $('#ShiftStart').html(
                ShiftStart
            );
            

            var time = ShiftStart.split(':');
            var shours = NoH.split(':');
            // Total No of hours/Shift
            var hours = time[0];
            var mins = time[1];
            var noon = time[2];

            //parseInt($('#a').val(), 10)
            // Starting Hour for shift
            var sh = shours[0];
            var sm = shours[1];
            var smin = (parseInt(sh*60)+parseInt(sm));

            var TMin = 1440;
            if(smin > TMin){
                alert("Invalid Shift Working Hours!!");
            }
            else{
                    var noon = "AM";
                    var stnoon = noon;
                    var noonhour = 720; // 12bhours
                    var next;
                    var firsthr;
                    var firstmin;
                    var nxthr = hours; 
                    var nxtmin = mins;
                    var TotalShift = TMin / smin ;
                    var shiftCount = 1;
                    // Starting Shift Time
                    var ShiftStartTime =  (parseInt(hours*60)+parseInt(mins));
                    $('#shift').empty();
                    // for(var i=1 ; i<= TotalShift ; i++){
                    while(TMin>0){
                        var elements = $();
                        // temp(start+shift hour/shift) for calculate noon
                        var temp = ShiftStartTime+smin;
                        if( temp > noonhour){
                            if(TMin >= smin){
                                next = temp - noonhour ;
                                firsthr = Math.floor(next/60);
                                firstmin = next % 60;
                                if (noon == "AM" && temp < noonhour) {
                                    noon = "AM";
                                }
                                else if(noon == "PM" && temp > noonhour){
                                    noon = "AM";
                                }
                                else{
                                    noon = "PM";
                                }
                                var nxthrp = nxthr;
                                var nxtminp = nxtmin;
                                var firsthrp = firsthr;
                                var firstminp = firstmin;
                                if (nxthr < 10) nxthrp = "0" + nxthr;
                                if (nxtmin < 10) nxtminp = "0" + nxtmin;
                                if (firsthr < 10) firsthrp = "0" + firsthr;
                                if (firstmin < 10) firstminp = "0" + firstmin;
                                //if (nxthr < 10) {}
                                elements = elements.add('<tr>'
                                                  +'<td>'+'Shift '+shiftCount+'</td>'
                                                  +'<td>'+nxthr+':'+nxtmin+' '+stnoon+'</td>'
                                                  +'<td>'+firsthrp+':'+firstminp+' '+noon+'</td>'
                                                +'</tr>');
                                $('#shift').append(elements);
                                ShiftStartTime = ((firsthr*60)+firstmin); 
                                nxthr = firsthr;
                                nxtmin = firstmin;
                                stnoon = noon;
                                shiftCount = shiftCount+1;
                                TMin = TMin - smin;
                            }
                            else{
                                var nxthrp = nxthr;
                                var nxtminp = nxtmin;
                                // var firsthrp = firsthr;
                                // var firstminp = firstmin;
                                if (nxthr < 10) nxthrp = "0" + nxthr;
                                if (nxtmin < 10) nxtminp = "0" + nxtmin;
                                if (hours < 10) hoursp = "0" + hours;
                                if (mins < 10) minsp = "0" + mins;
                                elements = elements.add('<tr>'
                                                  +'<td>'+'Shift '+shiftCount+'</td>'
                                                  +'<td>'+nxthrp+':'+nxtminp+' '+stnoon+'</td>'
                                                  +'<td>'+hoursp+':'+minsp+' '+noon+'</td>'
                                                +'</tr>');
                                 $('#shift').append(elements);
                                TMin = TMin - smin;
                            }
                        }
                        else
                        {
                             if(TMin >= smin){
                                next = temp;
                                firsthr = Math.floor(next/60);
                                firstmin = next % 60;
                                if (noon == "PM" && temp < noonhour) {
                                    noon = "PM";
                                }
                                else if(noon == "PM" && temp > noonhour){
                                    noon = "AM";
                                }
                                else{
                                    noon = "AM";
                                }
                                var nxthrp = nxthr;
                                var nxtminp = nxtmin;
                                var firsthrp = firsthr;
                                var firstminp = firstmin;
                                if (nxthr < 10) nxthrp = "0" + nxthr;
                                if (nxtmin < 10) nxtminp = "0" + nxtmin;
                                if (firsthr < 10) firsthrp = "0" + firsthr;
                                if (firstmin < 10) firstminp = "0" + firstmin;
                                elements = elements.add('<tr>'
                                                  +'<td>'+'Shift '+shiftCount+'</td>'
                                                  +'<td>'+nxthrp+':'+nxtminp+' '+stnoon+'</td>'
                                                  +'<td>'+firsthr+':'+firstmin+' '+noon+'</td>'
                                                +'</tr>');
                                 $('#shift').append(elements);
                                ShiftStartTime = ((firsthr*60)+firstmin); 
                                nxthr = firsthr;
                                nxtmin = firstmin;
                                stnoon = noon;
                                shiftCount = shiftCount+1;
                                TMin = TMin - smin;
                            }
                            else{
                                var nxthrp = nxthr;
                                var nxtminp = nxtmin;
                                // var firsthrp = firsthr;
                                // var firstminp = firstmin;
                                if (nxthr < 10) nxthrp = "0" + nxthr;
                                if (nxtmin < 10) nxtminp = "0" + nxtmin;
                                if (hours < 10) hoursp = "0" + hours;
                                if (mins < 10) minsp = "0" + mins;
                                elements = elements.add('<tr>'
                                                  +'<td>'+'Shift '+shiftCount+'</td>'
                                                  +'<td>'+nxthrp+':'+nxtminp+' '+stnoon+'</td>'
                                                  +'<td>'+hoursp+':'+minsp+' '+noon+'</td>'
                                                +'</tr>');
                                 $('#shift').append(elements);
                                TMin = TMin - smin;

                            }
                        }

                    }
                    $('#EditWSM').modal('hide');
            } 
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });    
    
    //$(document).on("click", ".Update_GFM", function(){}
    $('.Update_GFM').on('click',function(){
        
        var a = EOTEEP();
        var b = EOOOE();
        var c = EOOEE();
        var d = EAvailability();
        var e = EPerformance();
        var f = EQuality();
        var g = EOEE();

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
            ///alert(VEOEE);
            $.ajax({
                url: "<?php echo base_url('Home/editGFMData'); ?>",
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
                    alert("Data has been updated successfully!");
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        }
    });

        $(document).on("click", ".Update_DT", function(){
        var  DT = $('#Update_DThreshold').val();
        $.ajax({
            url: "<?php echo base_url('Home/editDTData'); ?>",
            type: "POST",
            data: {
                DT : DT
            },
            dataType: "json",
            success:function(res){
                location.reload();
                alert("Data has been updated successfully!");
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });
    });

    $.ajax({
        url: "<?php echo base_url('Home/getDowntimeTData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#ODT').html(res[0].Downtime_Threshold+" "+"min");
            $('#Update_DThreshold').val(res[0].Downtime_Threshold);
                $('#range').html('-RED');
                $("#range").css("color","red");
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    $.ajax({
        url: "<?php echo base_url('Home/getDowntimeRData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#DTReasonContent').empty();
            var elements = $();
            res.forEach(function(item){
                    if (item.Downtime_Category == "Planned") {
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Downtime_Reason/Planned/'+item.Uploaded_File_Name+'.png" alt="Girl in a jacket" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight"><p class="alignCenter">'+item.Downtime_Reason+'</p></div>'
                        +'<div class="dotHover dclick" rvalue="'+item.R_NO+'"><i class="fa fa-pencil reason-pen"></i></div>'
                        +'<div class="dotHover1 drclick" rvalue="'+item.R_NO+'"><i class="fa fa-trash-o reason-pen" ></i></div>'
                        +'</div>');
                    } 
                    else{
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Downtime_Reason/Unplanned/'+item.Uploaded_File_Name+'.png" alt="Girl in a jacket" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight"><p class="alignCenter">'+item.Downtime_Reason+'</p></div>'
                        +'<div class="dotHover dclick" rvalue="'+item.R_NO+'"><i class="fa fa-pencil reason-pen"></i></div>'
                        +'<div class="dotHover1 drclick" rvalue="'+item.R_NO+'"><i class="fa fa-trash-o reason-pen" ></i></div>'
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
        url: "<?php echo base_url('Home/getQualityData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#QReasonContent').empty();
            var elements = $();
            res.forEach(function(item){      
                    if (item.Downtime_Category == "Planned") {
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Quality_Reason/'+item.Uploaded_File_Name+'.png" alt="Girl in a jacket" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight"><p class="alignCenter">'+item.Quality_Reason+'</p></div>'
                        +'<div class="dotHover qclick" rvalue="'+item.R_NO+'"><i class="fa fa-pencil reason-pen"></i></div>'
                        +'<div class="dotHover1 qrclick" rvalue="'+item.R_NO+'"><i class="fa fa-trash-o reason-pen"></i></div>'
                        +'</div>');
                    } 
                    else{
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="<?php echo base_url()?>/public/uploads/Quality_Reason/'+item.Uploaded_File_Name+'.png" alt="Girl in a jacket" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight"><p class="alignCenter">'+item.Quality_Reason+'</p></div>'
                        +'<div class="dotHover qclick" rvalue="'+item.R_NO+'"><i class="fa fa-pencil reason-pen"></i></div>'
                        +'<div class="dotHover1 qrclick" rvalue="'+item.R_NO+'"><i class="fa fa-trash-o reason-pen"></i></div>'
                        +'</div>');
                    }      
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
                url: "<?php echo base_url('Home/deleteDownReason'); ?>",
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
            var id = $(this).attr("rvalue")
            $.ajax({
                url: "<?php echo base_url('Home/getDownReason'); ?>",
                type: "POST",
                data: {
                    Record_No :id ,
                },
                dataType: "json",
                success:function(res){
                    //location.reload();
                    $('#UDTName').val(res[0].Downtime_Reason);
                    var elements = $();
                    if (res[0].Downtime_Category == "Planned") {
                        elements = elements.add('<option value="'+res[0].Downtime_Category+'" selected>'+res[0].Downtime_Category+'</option>'
                            +'<option value="Unplanned">Unplanned</option>');         
                    }
                    else{
                        elements = elements.add('<option value="'+res[0].Downtime_Category+'" selected>'+res[0].Downtime_Category+'</option>'
                            +'<option value="Planned">Planned</option>');
                    }            
                    $('#UDTRCategory').append(elements);
                    $('#UDTReason').val(res[0].Uploaded_File_Name+'.'+res[0].Uploaded_File_Extension);  
                    $('#UDTRRecord').val(res[0].R_NO);           
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
                url: "<?php echo base_url('Home/getQualiyReason'); ?>",
                type: "POST",
                data: {
                    Record_No : id,
                },
                dataType: "json",
                success:function(res){
                     $('#UQReasonName').val(res[0].Quality_Reason);
                     $('#UQReasonImg').val(res[0].Uploaded_File_Name+'.'+res[0].Uploaded_File_Extension);  
                     $('#UQRRecord').val(res[0].R_NO);           
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
        alert(id);
        $(document).on("click", ".Update_QReason", function(){
            $.ajax({
                url: "<?php echo base_url('Home/deleteQualityReason'); ?>",
                type: "POST",
                data: {
                    Record_No : id,
                },
                dataType: "json",
                success:function(res){
                    alert(res);
                    //location.reload();
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });
    });

});
</script>