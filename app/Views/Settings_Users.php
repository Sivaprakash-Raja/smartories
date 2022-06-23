<style type="text/css">
    .fieldStyleInfo{
    height: 3.5rem;
}
.fieldStyleSubInfo{
    margin-left: 1rem;
}
.LastNameMarg{
    margin-left: 0.2rem;
}
.marleftDot{
    margin-left: 1rem;
}
.cen-align{
    display: flex;
    align-items: center;
    height: 3rem
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

    /*user info access control*/
.dotAccess_userinfo{
    height: 2.2rem;
    width: 2.2rem;
    border-radius: 50%;
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;
}
.info-mar{
    margin-left: 0.5rem;
}
</style>


<div style="margin-left: 4.5rem;">
 <!---topbar navigation settings----->
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start p3" id="logo">User Settings</p>
              <div class="d-flex">
                    <p class="float-end stcode active_click" style="color: #005CBC;">
                        <span  id="Active" class=""></span>Active
                    </p>
                    <p class="float-end stcode inactive_click" style="color: #C00000;">
                        <span  id="Iactive"></span>Inactive
                    </p>
              </div>
          </div>
        </nav>
 <!---topbar navigation settings ending----->
 <!---filter and add user navigation starting-->
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav" style="margin-top: 4.3rem;">
          <div class="container-fluid paddingm ">
            <p class="float-start"></p>
              <div class="d-flex innerNav">
                <!-- dropdown site -->
<!--                 <div class="box">
                    <div class="input-box fieldStyle">
                       <select class="selectdbsite form-select font_weight" name="selectdbsite" id="selectdbsite">
                                </select>
                       <label for="selectdbsite" class="input-padding">Site Name</label>
                       <span class="paddingm float-start validate" style="display: none;" id="">Select Site**</span> 
                    </div>
                </div> -->
                <!-- dropdown select site -->
                  <!----filter option---->
                      <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="fa fa-redo float-end  undo" style="width:20px;height:20px;color: #b5b8bc;cursor: pointer;">
                
                    <a style="background: #cde4ff;color: #005abc; width: 8rem;justify-content: center; text-align: center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#FilterUserModal" id="filterData" >FILTER</a>

                    <?php if($this->data['access'][0]['settings_user_management'] == 3){ ?>
                        <!----add user option----->
                       <!--  <a style="background: #005abc;color: white;width:8rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end " data-bs-toggle="modal" data-bs-target="#AddUserModal">
                            <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD USER
                        </a>   -->
                        <a style="background: #005abc;color: white;width:8rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end " id="add_user_model">
                            <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD USER
                        </a> 

                    <?php }?>
              </div>
          </div>
        </nav>
        <!---filter and add user navigation ending-->

        <?php 
           // echo "<pre>";
           //  print_r($this->data['access'][0]);
           //  echo($this->data['access'][0]['oee_financial_drill_down']);
           //  echo "<br>";
           //  echo($this->data['access'][0]['opportunity_insights']);
           //  echo "<br>";
           //  echo($this->data['access'][0]['operator_user_interface']);
           //  echo "<br>";
           //  echo($this->data['access'][0]['production_data_management']);
           //  echo "<br>";

        ?>
        <!-----main function of table starts------->
            <div class="tableContent">
                <div class="settings_machine_header sticky-top fixtabletitle">
                    <div class="row paddingm">
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">USER ID</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">SITE NAME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">DESIGNATION</p>
                        </div>
                        <div class="col-sm-2 p3  paddingm">
                          <p class="basic_header">REGISTERED ON</p>
                        </div>
                        <div class="col-sm-2  p3 paddingm " style="text-align:center;padding-left:1.4rem;">
                          <p class="basic_header">ROLE</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm">
                          <p class="basic_header">STATUS</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm" style="justify-content: center;">
                          <p class="basic_header">ACTION</p>
                        </div>
                    </div>
                </div>
                <div class="contentUser paddingm" style="margin-top:1rem;">
                   
                </div>
        </div>
</div>

<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="AddUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model " id="AddUserModal1" style="">ADD USER</p>
            </div>
              <form method="post" id="form_add_user">
                <div class="modal-body">
                    <div class="row paddingm">
                        <div class="col-sm-6 box">
                            <div class="input-box fieldStyle">     
                                <select class="form-select font_weight" name="inputRoleAdd" id="inputRoleAdd">
                                    <option value=" " selected="true" disabled>Select Role</option>
                                <?php if($this->data['user_details'][0]['role']=="Smart Admin") { ?>
                                    <option value="Smart Users">Smart Users</option>
                                <?php }?>
                                <?php if($this->data['user_details'][0]['role'] !="Site Admin") { ?>
                                    <option value="Site Admin">Site Admin</option>
                                <?php }?>
                                    <option value="Site Users">Site User</option>
                                    <option value="Operator">Operator</option>
                                </select>
                                <label for="input" class="input-padding">Role</label> 
                                <span class="paddingm float-start validate" id="validate_role"></span> 
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <select class="inputSiteNameAdd form-select font_weight" name="inputUserSiteName" id="inputUserSiteName">
                                </select>
                                <label for="input" class="input-padding">Site Name</label>
                                <span class="paddingm float-start validate" style="display: none;" id="sitename_error">Select Site**</span> 
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                                <div class="input-box fieldStyle font_weight">
                                    <label for="" class="col-form-label paddingm headTitle">Site ID</label>
                                    <p class="fieldStyleSub" style="position: absolute;"><span id="SiteID"></span></p>
                                </div>
                        </div>
                    </div>
                    <div class="row paddingm">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle" id="ExceptOp">
                                    <input type="text" class="form-control input font_weight" id="inputUserEMail" name="inputUserEMail">
                                    <label for="input" class="input-padding">User ID</label>
                                    <span class="paddingm float-start validate" id="inputUserEMailErr"></span> 
                                </div>
                                <div class="input-box fieldStyle" id="OperatorCredential" style="display: none;">
                                    <input type="text" class="form-control input font_weight" id="inputOpUserID" name="inputOpUserID">
                                    <label for="input" class="input-padding">User ID</label>
                                    <span class="paddingm float-start validate" id="inputOpUserIDErr"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle ">Site Location</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="SiteLocation" class="font_weight"></span></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row paddingm">
                        <div class="col-sm-3 box fieldStyle">
                            <div class="input-box">
                                <input type="text" class="form-control font_weight" id="inputUserFirstName" name="inputUserFirstName">
                                <label for="inputMachineRateHour" class="input-padding">First Name</label>
                                <span class="paddingm float-start validate" id="inputUserFirstNameErr"></span> 
                                <span class="float-end charCount" id="inputUserFirstNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight" id="inputUserLastName" name="inputUserLastName">
                                <label for="inputMachineOffRateHour" class="input-padding">Last Name</label>
                                <span class="paddingm float-start validate" id="inputUserLastNameErr"></span> 
                                <span class="float-end charCount" id="inputUserLastNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 visible_site">
                            <div class="row new_site_box">
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="text" class="form-control input font_weight" id="new_site_name" name="new_site_name">
                                            <label for="input" class="input-padding">Site Name</label>
                                            <span class="paddingm float-start validate" id="inputUsernew_site_err"></span><span class="float-end charCount" id="inputUsernew_site_err_count"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="text" class="form-control input font_weight" id="location_name" name="location_name">
                                            <label for="input" class="input-padding">Location</label>
                                            <span class="paddingm float-start validate" id="location_name_err"></span><span class="float-end charCount" id="location_name_count"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row paddingm" style="padding-left:1rem;">
                        <div class="col-sm-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control input font_weight" id="inputUserPhone" name="inputUserPhone">
                                    <label for="input" class="input-padding">Phone</label>
                                    <span class="paddingm float-start validate" id="inputUserPhoneErr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="" id="ACControl">
                                <div class="flex-container textCenter float-start">
                                    <label for="input" class="float-start">Access Control</label>
                                    <div class="dotAccess dot-css acsControl marleftDot">
                                        <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont" style="font-size:1.8rem; margin-left:0.5rem;">
                                    </div>
                                </div>
                            </div>
                            <div id="pass_op_visible">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="password" class="form-control input font_weight" id="pass_op" name="pass_op">
                                            <label for="pass_op" class="input-padding">Password</label>
                                            <span class="paddingm float-start validate" id="pass_op_err"></span><span class="float-end charCount" id="pass_op_count"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="password" class="form-control input font_weight" id="re_pass_op" name="re_pass_op">
                                            <label for="re_pass_op" class="input-padding">Re-Type Password</label>
                                            <span class="paddingm float-start validate" id="re_pass_op_err"></span><span class="float-end charCount" id="re_pass_op_count"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row paddingm" style="padding-left:1rem;">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control input font_weight" id="inputUserDesignation" name="inputUserDesignation">
                                    <label for="input" class="input-padding">Designation</label>
                                    <span class="paddingm float-start validate" id="inputUserDesignationErr"></span><span class="float-end charCount" id="inputUserDesignationCunt"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                    <div class="input-box fieldStyle">
                                        <select class="inputDepartmentAdd form-select font_weight" name="inputUserSiteDepartment" id="inputUserSiteDepartment">
                                           
                                        </select>
                                        <label for="input" class="input-padding">Department</label>
                                        <span class="paddingm float-start validate d-none" id="dept_err"></span> 
                                    </div>
                            </div>
                            
                    </div>
                    <!-- <div class="row paddingm">
                        <div class="col-lg-6">
                               
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer" style="border:none;">
                    <button class="CreateUser btn fo bn" name="" value="Save" style="color: white;background: #005abc;">Save</button>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="AccessControlModal" tabindex="-1" aria-labelledby="AccessControlModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none;margin-bottom: none;">
                <p class="modal-title settings-machineAdd-model " id="AccessControlModal1" style="">ACCESS CONTROL</p>
            </div>
                <div class="modal-body">
                    <div class="dot dot-css" data-bs-dismiss="modal" aria-label="Close"><img src="<?php echo base_url('assets/img/back.png') ?>" class="img_font_wh dot-cont" style="width: 4rem;height: 2rem;margin: auto;"></div>
                    <div class="accessControlPaddinghead">
                            <div class="row paddingm textCenter fntTitle">
                                <div class="col-sm-4 fn paddingm">
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>No Access</p>
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>View</p>
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>Edit</p>
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>Create/ Delete</p>
                                </div>
                            </div>
                    </div>
                    <div class="accessControlPaddinghead">
                            <div class="row paddingm mb-2">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                    <p style="margin-left: 0.5rem;">Financial Metrics</p>
                                </div>
                            </div>
                    </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm" id="OEE_Financial_Drill_Down">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">OEE Financial Drill Down</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] != 1 or 2 or 3 ){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] >= 1){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] >= 2){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] == 3){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">Opportunity Insights</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] >= 1){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] >= 2){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] == 3){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div> 
                    <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fntTitle fn paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">OEE Drill Down</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] >= 1){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] >= 2){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] == 3){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Operator User Interface</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="oui" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] >= 1){ ?>
                                        <input type="radio" id="html" name="oui" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] >= 2){ ?>
                                        <input type="radio" id="html" name="oui" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] == 3){ ?>
                                        <input type="radio" id="html" name="oui" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Production Data Management</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="pdm" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] >= 1){ ?>
                                        <input type="radio" id="html" name="pdm" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] >= 2){ ?>
                                        <input type="radio" id="html" name="pdm" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] == 3){ ?>
                                        <input type="radio" id="html" name="pdm" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPaddinghead mb-2">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm">
                                    <p style="margin-left: 0.5rem;" class="paddingm">Settings</p>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">Machine</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] != 1 or 2 or 3 ){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] == 3){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">Parts</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="settings_part" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_part" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_part" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] == 3){ ?>
                                        <input type="radio" id="html" name="settings_part" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">General</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="settings_general" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_general" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_general" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] == 3){ ?>
                                        <input type="radio" id="html" name="settings_general" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">User Account</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_user_management'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="settings_user" value="0">
                                    <?php }?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_user_management'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_user" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_user_management'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_user" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_user_management'] == 3){ ?>
                                        <input type="radio" id="html" name="settings_user" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>     
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn access-save" name="" data-bs-dismiss="modal" aria-label="Close" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>


<div class="modal fade" id="DeactiveToolModal" tabindex="-1" aria-labelledby="DeactiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="DeactiveToolModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to Delete this Part record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-User" name="" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ActiveToolModal" tabindex="-1" aria-labelledby="ActiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="ActiveToolModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
            <!-- <form method="post" class="addMachineForm" action="" > -->
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to activate this user record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-User" name="" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<!---- edit user details----->
<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditUserModal1" style="">EDIT USER DETAILS</p>
            </div>
            <form method="" class="addMachineForm" action="" >
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="input-box fieldStyle">     
                                <select class="form-select font_weight" name="input" id="EditUserRole" disabled>
                                </select>
                                <label for="input" class="input-padding">Role</label> 
                                <span class="paddingm float-start validate" id="site_error_edit"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Status</label>
                                <p class="fieldStyleSub p1" style="position: absolute;opacity:1;"><span id="EditUserStatus" ></span></p>
                            </div>  
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Registered on</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserRegisteredOn" class="font_weight"></span></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 fieldStyle">
                            <div class="box">
                                <div class="input-box fieldStyle" id="ExceptOpEdit">
                                    <input type="text" class="form-control input font_weight" id="EditUserEmail" name="EditUserEmail" disabled="disabled">
                                    <label for="input" class="input-padding">User Email</label>
                                    <span class="paddingm float-start validate" id="email_err"></span> 
                                </div>
                                <div class="input-box fieldStyle" id="OperatorCredentialEdit" style="display: none;">
                                    <input type="text" class="form-control input font_weight" id="EditOpUserID" name="EditOpUserID" disabled="disabled">
                                    <label for="input" class="input-padding">User ID</label>
                                    <span class="paddingm float-start validate" id="email_err"></span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <select class="inputSiteNameAdd form-select font_weight" name="EditUserSiteName" id="EditUserSiteName">
                                </select>
                                <label for="input" class="input-padding">Site Name</label>
                                <span class="paddingm float-start validate" id="sitename_error_edit"></span> 
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Site ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserSiteId" class="font_weight"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EditUserFName" name="EditUserFName">
                                <label for="inputMachineRateHour" class="input-padding">First Name</label>
                                <span class="paddingm float-start validate" id="EditUserFNameErr"></span> 
                                <span class="float-end charCount" id="EditUserFNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight" id="EditUserLName" name="EditUserLName">
                                <label for="inputMachineOffRateHour" class="input-padding">Last Name</label>
                                <span class="paddingm float-start validate" id="EditUserLNameErr"></span> 
                                <span class="float-end charCount" id="EditUserLNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Site Location</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserLocation" class="font_weight">Sample</span></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight" id="EditUserPhone" name="EditUserPhone">
                                <label for="inputMachineOffRateHour" class="input-padding">Phone</label>
                                <span class="paddingm float-start validate" id="EditUserPhoneErr"></span> 
                                <span class="float-end charCount">Character Count</span>
                            </div>
                        </div>
                        <div class="col-sm-6 box">
                            <div id="visible_creation_edit">
                            <div class="row" id="">
                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="text" class="form-control input font_weight" id="EditUser_newsite" name="EditUser_newsite">
                                            <label for="input" class="input-padding">Site Name</label>
                                            <span class="paddingm float-start validate" id="EditUser_newsite_err"></span>
                                            <span class="float-end charCount" id="EditUser_newsite_count"></span>
                                        </div>
                                    </div> 
                                </div>

                                <div class="col-sm-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="text" class="form-control input font_weight" id="EditUser_location" name="EditUser_location">
                                            <label for="input" class="input-padding">Location</label>
                                            <span class="paddingm float-start validate" id="EditUser_location_err"></span>
                                            <span class="float-end charCount" id="EditUser_newsite_count"></span>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control input font_weight" id="EditUserDesignation" name="EditUserDesignation">
                                    <label for="input" class="input-padding">Designation</label>
                                    <span class="paddingm float-start validate" id="EditUserDesignationErr"></span>
                                    <span class="float-end charCount" id="EditUserDesignationCunt"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box fieldStyle" >
                                <div class="flex-container textCenter float-start ACControl" id="ACControl" style="display: none;">
                                    <label for="input" class="float-start" style="margin-right:1rem;">Access Control</label>
                                    <div class="dotAccess dot-css acsControl" style="margin-left: 2rem;font-size:2rem;"><img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class=" dot-cont" style="height: 1.5rem;width: 1.5rem;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 box">
                                    <div class="input-box fieldStyle">
                                        <label for="" class="col-form-label paddingm headTitle">Last Updated By</label>
                                        <p class="fieldStyleSub" style="position: absolute;word-wrap: break-word;"><span id="EditUserUpdatedBy" class="font_weight"></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 box">
                                    <div class="input-box fieldStyle">
                                        <label for="" class="col-form-label paddingm headTitle">Last Updated On</label>
                                        <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserUpdatedOn" class="font_weight"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                <select class="inputDepartmentAdd form-select font_weight" name="EditUserDepartment" id="EditUserDepartment">
                                </select>
                                <label for="input" class="input-padding">Department</label>
                                <span class="paddingm float-start validate d-none" id="dept_err"></span> <span class="float-end charCount">Character Count</span>
                            </div>
                             
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditUserData btn fo bn" name="" value="Save" data_val="" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!----user info loop---->
<div class="modal fade" id="InfoUserModal" tabindex="-1" aria-labelledby="InfoUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="InfoUserModal1" style="">USER INFO</p>
            </div>
                <div class="modal-body">
                    <!-- user info strategy changed in fieldStyleSubInfo removing this class name for p tag -->
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Role</label>
                                <p class="" ><span id="UserRole" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Status</label>
                                <p class="info-mar"><span id="UserStatus" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Registered on</label>
                                <p class=""><span id="UserRegisteredOn" class="font_weight "></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">User ID</label>
                                <p class=""><span id="UserId" class="font_weight"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Site Name</label>
                                <p class=""><span id="UserSiteName" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Site ID</label>
                                <p class=""><span id="UserSiteId" class="font_weight "></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">First Name</label>
                                <p class=""><span id="UserFirstName" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Last Name</label>
                                <p class=""><span id="UserLastName" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-sm-6 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Site Location</label>
                                <p class=""><span id="UserSiteLocation" class="font_weight "></span></p>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Phone</label>
                                <p class=""><span id="UserPhone" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-sm-6 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Department</label>
                                <p class=""><span id="UserDepartment" class="font_weight "></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Designation</label>
                                <p class=""><span id="UserDesignation" class="font_weight "></span></p>
                            </div>
                        </div>
                         <div class="col-sm-6 center-align">
                            <div class="ACControl cen-align" style="display: flex;">
                                <label for="input" class="float-start">Access Control</label>
                                <div style="margin-left: 1.3rem;" class="marleftDot float-start dotAccess_userinfo dot-css acsControl"><img src="<?php echo base_url('assets/img/oui_arrow.png') ?>" class="img_font_wh dot-cont" style="justify-content: center;"></div>
                            </div>
                            <!-- <div class="flex-container fieldStyleInfo ACControl">
                                <label for="input" class="">Access Control</label>
                                <div class="dotAccess dot-css acsControl" style="margin-left: 10px;"><i class="fa fa-arrow-right dot-cont"></i></div>
                            </div> -->
                            <!-- <div style="display:flex;flex-wrap:wrap;flex-direction:row;">
                                    <div style="width:50%;float:right;text-align:right;justify-content:center;"> <p style="justify-content:center;right:0rem;margin:auto;margin-top:0.5rem;width:max-content;font-family:'Roboto', sans-serif;color:#8c8c8c;">Access Control</p></div>
                                    <div style="width:20%;"><p class="dotAccess dot-css acsControl"><i class="fa fa-arrow-right dot-cont"></i></p></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Last updated by</label>
                                <p class=""><span id="UserLastUpdatedBy" class="font_weight "></span></p>
                            </div>
                        </div>
                        <div class="col-lg-4 box">
                            <div class="fieldStyleInfo">
                                <label for="" class="col-form-label headTitle">Last updated on</label>
                                <p class=""><span id="UserLastUpdatedOn" class="font_weight "></span></p>
                            </div>
                        </div>
                    </div> 
                        
                                       
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="FilterUserModal" tabindex="-1" aria-labelledby="FilterUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="FilterUserModal1" style="">FILTER USERS</h5>
            </div>
            <form method="" class="addMachineForm" action="">
                <div class="modal-body">
                    <div class="d-flex">
                        <p style="font-family:'Roboto', sans-serif;color:#8c8c8c;font-size:0.9rem;">Registered on</p>
                    </div>
                            <div class="row">
                                <div class="col-lg-3 fieldStyle box">
                                    <div class="input-box paddingm">
                                        <input type="datetime-local" class="form-control" id="filterFrom" name="filterFrom" >
                                        <label for="filterFrom" class="input-padding">From Date</label>
                                    </div>
                                </div> 
                                <div class="col-lg-3 fieldStyle box">
                                    <div class="input-box paddingm">
                                        <input type="datetime-local" class="form-control" id="filterTo" name="filterTo">
                                        <label for="filterTo" class="input-padding">To Date</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 box">
                                        <div class="input-box fieldStyle">
                                            <select class="form-select" name="filterStatus" id="filterStatus">
                                                <option selected value="all">All</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            <label for="filterStatus" class="input-padding">Status</label>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="row"> 
                                <div class="col-lg-6 box">
                                    <div class=" input-box fieldStyle">
                                        <input type="text" class="form-control" id="filterkey" name="filterkey" placeholder="Type Keyword"> 
                                        <label for="filterkey" class="input-padding">Keyword</label> 
                                    </div>
                                </div>
                                <div class="col-lg-6 box">
                                    <div class=" input-box fieldStyle">
                                        <select class="form-select" name="filterSiteName" id="filterSiteName">
                                        </select> 
                                        <label for="filterSiteName" class="input-padding">Site Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">   
                                <div class="box col-lg-6">
                                    <div class="input-box fieldStyle">
                                        <select class="form-select" name="filterRole" id="filterRole"></select>
                                        <label for="filterRole" class="input-padding">Roles</label>
                                    </div>
                                </div>
                                    <div class="col-lg-6 box">
                                        <div class="input-box fieldStyle">
                                            <select class="form-select" name="filterLastUpdatedBy" id="filterLastUpdatedBy">
                                            </select>
                                            <label for="filterLastUpdatedBy" class="input-padding">Last Updated by</label>
                                        </div>
                                    </div>
                            </div>
             
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="Add_Filter btn fo bn" name="" value="Apply" style="color: white;background: #005abc;">Apply</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<!-- modal for forgot password in strategy -->
<div class="modal fade" id="forgot-modal" tabindex="-1" aria-labelledby="ActiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss container">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="ActiveToolModal1" style="">CHANGE PASSWORD</h5>
            </div>
            <!-- <form method="post" class="addMachineForm" action="" > -->
                <div class="modal-body">
                    <div class="p-1">
                        <form method="post" action="<?= base_url('Operator/');?>" >
                            <div class="box mb-4">
                                <div class="input-box">
                                    <input type="password" class="form-control input" id="forgot_pass" lvalue=" " name="sitepass">
                                    <label for="input" class="input-padding">New Password</label>
                                </div>
                            </div>
                            <div class="box">
                                <div class="input-box">
                                    <input type="password" class="form-control input" id="forgot_confirm_pass" name="sitepass1">
                                    <label for="input" class="input-padding">Confirm Password</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn forgot_pass_siteadmin" name="" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>/assets/js/user_account.js"></script>
<script type="text/javascript">

   
    var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
    var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";

    var example = new Array();

     // var UserNameRef = "admin@gmail.com";
     // var UserRoleRef = "SmartAdmin";
    //    var UserRoleRef = "Site Admin";
    //     if (UserRoleRef == "Site Admin") {
    //         $('.forgotwork').css("display","block");
    //     }
        var UserIdRef ="<?php echo($this->data['user_details'][0]['user_id'])?>";
        var SiteIdRef = "<?php echo($this->data['user_details'][0]['site_id'])?>";

// add user model open close event for input fields reset
        $(document).on('click','#add_user_model',function(){
            $('#form_add_user')[0].reset();
            $('.access-save').css("display","inline");
            $('#AddUserModal').modal('show');
        });

    $('.CreateUser').on('click',function(){
        //var a = inputUserEMail();
        var b = inputUserFirstName();
        var c = inputUserLastName();
        var d = inputUserPhone();
        var e = inputUserDesignation();
        var f = inputOpUserID();
     
        if (($('#inputUserSiteName').val() == "all")||($('#inputRoleAdd').val() == "null")) {
            if ($('#inputUserSiteName').val() == "all") {
                $("#sitename_error").css("display","block");
                 $(".CreateUser").attr("disabled", true);
            }
            if ($('#inputRoleAdd').val() == "null") {
                $("#validate_role").css("display","block");
                $('#validate_role').html("Site Name*");
                 $(".CreateUser").attr("disabled", true);

            }
        }
        else{

            $("#sitename_error").css("display","none");
            $("#validate_role").css("display","none");

            if ( b!="" || c!="" || d!="" || e!="") {
                $("#inputUserEMailErr").html(a);
                $("#inputUserFirstNameErr").html(b);
                $("#inputUserLastNameErr").html(c);
                $("#inputUserPhoneErr").html(d);
                $("#inputUserDesignationErr").html(e);
                 $(".CreateUser").attr("disabled", true);
            }
            else{
                var site_name = $('#inputUserSiteName').val();
                if (site_name == " ") {
                      $(".CreateUser").attr("disabled", true);
                  }

                  var new_site_name = $('#new_site_name').val();
                  var new_site_location = $('#location_name').val();
                  // alert('click');
                  var role = $('#inputRoleAdd').val();

                //alert(role);
                if (role != "Operator") {
                    var User_Email = $('#inputUserEMail').val();
                    var User_First_Name = $('#inputUserFirstName').val();
                    var User_Last_Name = $('#inputUserLastName').val();
                    var User_Phone = $('#inputUserPhone').val();
                    var User_Designation = $('#inputUserDesignation').val();
                    var User_Site_Name = $('#inputUserSiteName').val();
                    var User_Department = $('#inputUserSiteDepartment').val();
                    var FDrillDown = $('input[name="ooe_f_drill_down"]:checked').val();
                    var Opportunityinsights = $('input[name="opportunity_insights"]:checked').val();
                    var OEEDrillDown = $('input[name="ooe_drill_down"]:checked').val();
                    var OUI = $('input[name="oui"]:checked').val();
                    var PDM = $('input[name="pdm"]:checked').val();
                    var SMachine = $('input[name="settings_macine"]:checked').val();
                    var SPart = $('input[name="settings_part"]:checked').val();
                    var SGeneral = $('input[name="settings_general"]:checked').val();
                    var SUser = $('input[name="settings_user"]:checked').val();

                    User_First_Name = User_First_Name.trim();
                    User_Last_Name = User_Last_Name.trim();
                    $.ajax({
                        url: "<?php echo base_url('User_controller/createNewUser'); ?>",
                        type: "POST",
                        //dataType: "json",
                        data:{
                            User_Email:User_Email,
                            User_First_Name:User_First_Name,
                            User_Last_Name:User_Last_Name,
                            User_Phone:User_Phone,
                            User_Designation:User_Designation,
                            Role:role,
                            User_Site_Name:User_Site_Name,
                            User_Department:User_Department,
                            User_Ref:UserNameRef,
                            FDrillDown:FDrillDown,
                            Opportunityinsights:Opportunityinsights,
                            OEEDrillDown:OEEDrillDown,
                            OUI:OUI,
                            PDM:PDM,
                            SMachine:SMachine,
                            SPart:SPart,
                            SGeneral:SGeneral,
                            SUser:SUser,
                            new_site_name:new_site_name,
                            new_site_location:new_site_location
                        },
                        success:function(res){
                            //alert(res+"nk");
                            //console.log(res);
                           //alert('User Created Successfully');
                            location.reload();
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!!");
                        }
                    });
                }
                else{
                    // if (f != ""){

                        var User_First_Name = $('#inputUserFirstName').val();
                        var User_Last_Name = $('#inputUserLastName').val();
                        var User_Phone = $('#inputUserPhone').val();
                        var User_Site_ID = $('#inputUserSiteName').val();
                        var User_ID = $('#inputOpUserID').val();
                        var User_Site_Name = $('#inputUserSiteName').val();
                        var User_Department = $('#inputUserSiteDepartment').val();
                        var User_Designation = $('#inputUserDesignation').val();
                         var new_site_name = $('#new_site_name').val();
                         var new_site_location = $('#location_name').val();
                         var pass = $('#pass_op').val();
                         var repass = $('#re_pass_op').val();

                        //alert(UserNameRef);
                        //  User_First_Name = User_First_Name.trim();
                        // User_Last_Name = User_Last_Name.trim();
                       if (pass.localeCompare(repass)== 0) {
                         $.ajax({
                            url: "<?php echo base_url('User_controller/createNewUser_op'); ?>",
                            type: "POST",
                            data:{
                                User_First_Name:User_First_Name,
                                userName:User_ID,
                                User_Last_Name:User_Last_Name,
                                User_Phone:User_Phone,
                                Role:role,
                                User_Site_Name:User_Site_Name,
                                User_Site_ID:User_Site_ID,
                                User_Department:User_Department,
                                User_Designation:User_Designation,
                                user_id:UserNameRef,
                                pass:pass,
                            },
                            dataType: "json",
                            success:function(res){
                                //alert(res+"kn");
                                //console.log(res);
                                location.reload();

                            },
                            error:function(res){
                                alert("Sorry!Try Agiankkkkk!!");
                            }
                        });
                       }else{
                        $('#pass_op_err').html("Password Not Match");
                        $('#re_pass_op_err').html('Password Not Match');
                       }
                       
                    //}
                    // else{
                    //     alert('err');
                    //     $("#inputOpUserIDErr").html(f);
                    // }
                }
            }
        }   
    });


// var user = " ";

     $(document).ready(function(){
        $("#new_site_name").attr("disabled",true);
        $("#location_name").attr("disabled",true);
        $('#pass_op_visible').css("display","none");
       // $('.new_site_box').css("display","none");
        // get last_updated_by name
        //getlast_updated_username();
        /*
       function getlast_updated_username(user_id){
               var username4 = new Array();
               var user = " ";
               var user1 = " ";
               

               // alert(user_id);
                if (user_id == " ") {
                     username4.push("Empty");
                     user = "empty";
                }else{
                       //var user_demo = null;
                    $.ajax({
                        url : "<?php echo base_url('User_Controller/getlast_updated_username');?>",
                        method:"POST",
                        data:{user_id:user_id},
                       dataType:"JSON",
                        success:function(res){
                            example.push(res[0].first_name);
                            // alert(example);

                            //alert(example);

                        },
                        error:function(err){
                            alert("err");
                            // console.log(err);
                        }

                    });  
                    //return user_demo;     
                }
                  //window.setTimeout( getlast_updated_username, 5000 ); // 5 seconds
                setTimeout(function(){
                    return;
                },2000);
             // alert("function"+example);
             
            
        }*/

        

function getdate(date){

        var currentdate = new Date(date);

        var date_only = currentdate.getFullYear() + "-"
                        +currentdate.toLocaleString('en-us',{month:'long'})+"-"
                        +currentdate.toLocaleString('en-us',{day:'2-digit'})

                return date_only;
}

// var date = getdate('2022-05-02');
// alert(date);
       // $('#inputUserSiteName').empty();
        // /get site details for dropdown
        // alert(UserNameRef);
        // alert(UserRoleRef);
        $.ajax({
                url: "<?php echo base_url('User_controller/getSiteName'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    UserNameRef:UserNameRef,
                    UserRoleRef:UserRoleRef,
                },
                success:function(res_Site){
                    //alert(res_Site+'ok');
                    //console.log(res_Site);
                    
                    var elements = $('<option value="new_site" id="new_site_visible" selected="true">Add Site</option>');
                    res_Site.forEach(function(item){ 
                        elements = elements.add('<option value="'+item.site_id+'">'+item.site_name+' -'+item.site_id+'</option>');
                        $('#inputUserSiteName').append(elements);
                    });              
                },
                error:function(res){
                    alert("Sorry!Try Agian SiteName!!");
                }
        });

        // get department details for dropdown
        $('#inputUserSiteDepartment').empty();
        $.ajax({
            url : "<?php echo base_url('User_controller/getdept'); ?>",
            method: "post",
            dataType: "json",
            success:function(res){
                //alert(res);
                //console.log(res);
                 var elements = $('<option value=" " selected="true" disabled>Select Department</option>');
                    res.forEach(function(item){ 
                        elements = elements.add('<option value="'+item.dept_id+'">'+item.department+'</option>');
                        $('#inputUserSiteDepartment').append(elements);
                    });

            },
            error:function(res_err){
                alert("Sorry Try Again");
            }
        });

        // retrive all users
         var SiteUserRef = "<?php echo($this->data['user_details'][0]['user_id']); ?>";
         var role = "<?php echo($this->data['user_details'][0]['role']); ?>";
         var sitename = "<?php echo($this->data['user_details'][0]['site_id']);  ?>";

         // alert(SiteUserRef);
         // alert(role);
         $.ajax({
            url: "<?php echo base_url('User_controller/getSiteUser'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                SiteUserRef:SiteUserRef,
                role:role,
                sitename:sitename,
            },
            success:function(res_Site){
                console.log(res_Site);
                
                //alert(res_Site);
                
                $('.contentUser').empty();
                    //$('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_Site)){
                        $('.contentUser').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                    var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    
                    res_Site.forEach(function(item){
                        //alert();
                        var randomColor = color[Math.floor(Math.random()*color.length)];
                        var elements = $();

                        if (item.role == "Smart Admin"){
                            var forgot = "none";
                            var colorRole = "#853e2c";
                            var colorBorder = "#ffdad0";
                        }
                        else if(item.role == "Smart Users"){
                            var forgot = "none";
                            var colorRole = "#a2723f";
                            var colorBorder = "#ffe4c4";
                        }
                        else if(item.role == "Site Admin"){
                            var forgot = "block";
                            var colorRole = "#005fc8";
                            var colorBorder = "#c1eaff";
                        }
                        else if(item.role == "Site Users"){
                            var forgot = "none";
                            var colorRole = "#56b8c2";
                            var colorBorder = "#60ebee";
                        }
                        else{
                            var forgot = "none";
                            var colorRole = "#7030a0";
                            var colorBorder = "#dfcaee";
                        }
                        
                        //alert(item.User_Name);
                        if (item.status == 1) {
                            active = active+1;
                        
                            elements = elements.add('<div id="settings_div">'
                                    +'<div class="row paddingm">'
                                    +'<div class="col-sm-2 col" style="display: flex;">'
                                        +'<div style="width: 30%">'
                                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                        +'</div>'
                                        +'<div style="width: 70%">'
                                            +'<p title="'+item.username+'">'+item.username+'</p>'
                                            +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                            
                                        +'</div>'                
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ><p title="'+sitename+'">'+sitename+'</p></div>'        
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.designation+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.created_on+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft">'
                                        +'<div class="userRole textCenter marleft" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                            +'<p style="color:'+colorRole+'" class="userRole_get  marleft">'+item.role+'</p>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col settings_active marleft" ><p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu">'
                                                    // +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                    +'<li class="edit-opt edit-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>'
                                                    +'<li class="edit-opt deactivate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'"><a href="#"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                     +'<li class="edit-opt forgot-password forgotwork " style="display:'+forgot+';" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><i class="fa fa-key" style="margin-left:10px;"></i>RESET PAASWORD</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                                +'</div>');
                            $('.contentUser').append(elements);
                        }
                        else{
                            inactive = inactive+1;
                            elements = elements.add('<div id="settings_div">'
                                +'<div class="row paddingm">'
                                    +'<div class="col-sm-2 col" style="display: flex;">'
                                        +'<div style="width: 30%">'
                                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                        +'</div>'
                                        +'<div style="width: 70%">'
                                            +'<p title="'+item.username+'">'+item.username+'</p>'
                                            +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                            
                                        +'</div>'                
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ><p title="'+item.site_id+'">'+sitename+'</p></div>'        
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.designation+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.created_on+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col ">'
                                        +'<div class="userRole siteAdmin textCenter" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                            +'<p style="color:'+colorRole+'" class="user_get_role">'+item.role+'</p>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col settings_active marleft" ><p style="color:#C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu">'
                                                    +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="img_font_wh2" style="margin-left:10px;"></i>INFO</a></li>'
                                                    +'<li class="edit-opt activate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" ><a href="#"><img src="<?php echo base_url('assets/img/activate.png'); ?>" class="img_font_wh2" style="margin-left:10px;"></i>ACTIVATE</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                        +'</div>');
                            $('.contentUser').append(elements);
                            // var text_val = $('.userRole').children('p').text();
                            // alert(text_val);
                        }
                    });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    //  var len = res.InActive.toString().length;
                    // var len1 = res.Active.toString().length;
                    inactive_len = inactive.toString().length;
                    active_len = active.toString().length;
                    if (parseInt(inactive_len) > 1) {
                         $('#Iactive').html(inactive);
                    }else{
                        $('#Iactive').html('0'+inactive);
                    }

                    if (parseInt(active_len) > 1) {
                         $('#Active').html(active);
                    }else{
                        $('#Active').html('0'+active);
                    }
                    // $('#Iactive').html(inactive);
                    // $('#Active').html(active);
                           
            },
            error:function(res){
               // console.log(res);
                alert("Sorry!Try Agian!!");
            }
        });
      
       
        //alert(SiteUserRef);
        //$('.contentUser').empty();
        // $.ajax({
        //     url : '<?php echo base_url('Home/getSiteUser'); ?>',
        //     method:'post',
        //     dataType:'json',
        //     data:{
        //         SiteUserRef:SiteUserRef,
        //     },
        //     success:function(res){
        //         //alert(res[0].User_Name);
        //       // alert(res[0][UserName]);     
        //       res.forEach(function(item){
        //         alert(item.User_Name);
        //         //alert(item);
        //       }); 
        //     }
        // });
        
        // retrive user account data

       

        //Access Control Options
        var acsCon = <?php echo $this->data['access'][0]['settings_user_management']; ?>;
        if(acsCon < 2){
            $('.edit-user').css("display","none");
            $('.activate-user').css("display","none");
            $('.deactivate-user').css("display","none"); 
            $('.info-user').css("display","block");
        }
        else{
            $('.edit-user').css("display","block");
            $('.activate-user').css("display","block");
            $('.deactivate-user').css("display","block");
            $('.info-user').css("display","none");
        }


        
        
        $('#inputUserSiteName').on('change', function() {
            if( this.value == 'new_site'){
                $('.visible_site').css("display","inline");
                $('#location_name').removeAttr("disabled");
                $('#new_site_name').removeAttr("disabled");
                $('#SiteID').empty();
                $('#SiteLocation').empty();
            }
            else{
                var role = $('#inputRoleAdd').val();
                $.ajax({
                    url: "<?php echo base_url('User_controller/getSite'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        Sname : this.value
                    },
                    success:function(res_Site){
                        //alert(res_Site);
                         $('#SiteID').html(
                                res_Site['site'][0].site_id
                            );
                            $('#SiteLocation').html(
                                res_Site['location'][0].location
                            );  
                            $('#location_name').attr("disabled",true);
                            $('#new_site_name').attr("disabled",true);
                             $('.visible_site').css("display","none");

                        /*
                        console.log(res_Site);
                        if (res_Site[0].IsAdmin == 0 && role != 'SiteAdmin') {
                            alert("Admin Didn't Created to this Site!!");
                            $(".CreateUser").attr("disabled", true);
                        }
                        else if(res_Site[0].IsAdmin == 1 && role == 'SiteAdmin'){
                            alert("Admin Already Created to this Site!!");  
                            $(".CreateUser").attr("disabled", true);
                        }
                        else{
                            $(".CreateUser").removeAttr("disabled"); 
                            $('#SiteID').html(
                                res_Site[0].Site_ID
                            );
                            $('#SiteLocation').html(
                                res_Site[0].Site_Location
                            );    
                        }*/
                       
                    },
                    error:function(res){
                        alert("Sorry!@#Try Agian!!");
                    }
                });
            }
        });


        $(document).on("click", ".acsControl", function(){
            $('#AccessControlModal').modal('show');
        });
        $(document).on("change", "#inputRoleAdd", function(){
            var user = $('#inputRoleAdd').val();
            $('.CreateUser').removeAttr("disabled");
           // $('#inputUserSiteName').val("new");
            // $('#SiteID').empty();
            // $('#SiteLocation').empty();
            //alert(user);
            if (user == "Smart Users") {
                 $('#pass_op_visible').css("display","none");

                $('#inputUserSiteDepartment').val(4);
                $('#inputUserSiteDepartment').attr("disabled",true);
                $('.visible_site').css("display","none");
               // $('#new_site_location').css('display','none');
                $('#SiteID').css("display","none");
                $('#SiteLocation').css("display","none");
                 $('#inputUserSiteName option[value="smartories"]').add();
                $('#inputUserSiteName').val('smartories');
                $('#inputUserSiteName').attr("disabled",true);

            }
            else if(user == "Site Admin"){
                 $('#pass_op_visible').css("display","none");
                $('#new_site_visible').css("display","inline");
                 $('#inputUserSiteDepartment').val(4);
                $('#inputUserSiteDepartment').attr("disabled",true);
                $('#inputUserSiteName').removeAttr("disabled");
                  $('#SiteID').css("display","inline");
                $('#SiteLocation').css("display","inline");
                 $('#inputUserSiteName option[value="smartories"]').remove();
                $('#SiteID').empty();
                $('#SiteLocation').empty();
            }
            else if(user == "Operator"){
                 $('#inputUserSiteName option[value="smartories"]').remove();
                  $('#SiteID').css("display","inline");
                $('#SiteLocation').css("display","inline");
                $('#pass_op_visible').css("display","inline");
                 $('#new_site_visible').css("display","none");
                $('#inputUserSiteDepartment').val(1);
                $('#inputUserSiteDepartment').attr("disabled",true);
                $('#SiteID').empty();
                $('#SiteLocation').empty();
            }else{
                 $('#inputUserSiteName option[value="smartories"]').remove();
                  $('#SiteID').css("display","inline");
                $('#SiteLocation').css("display","inline");
                 $('#pass_op_visible').css("display","none");
                $('#new_site_visible').css("display","none");
                 $('#inputUserSiteDepartment').val(4);
                $('#inputUserSiteDepartment').removeAttr("disabled");
               // $('#inputUserSiteDepartment').removeAttr("disabled");
                $('#SiteID').empty();
                $('#SiteLocation').empty();
            }
            if( user != 'Operator'){
                $('#ACControl').css("display","block");
                $('#ExceptOp').css("display","block");
                $('#OperatorCredential').css("display","none");
                //$('#inputUserSiteName').removeAttr("disabled");

                
                //$(".CreateUser").removeAttr("disabled");
                // if (user != 'Smart User') {
                //     $('#inputUserSiteName').css("display","block");
                // } 
                // else{
                //     $('#inputUserSiteName').css("display","none");
                // }           
                $.ajax({
                        url: "<?php echo base_url('User_controller/getUserRole'); ?>",
                        type: "POST",
                        dataType: "json",
                        data:{
                            userRole:user,
                        },
                        success:function(res_role){
                            // alert(res_role);
                            // console.log(res_role);
                            console.log(res_role);
                            $("input[name=ooe_f_drill_down][value='"+res_role.Financial_Drill_Down+"']").prop("checked",true);
                            $("input[name=opportunity_insights][value='"+res_role.Financial_Opportunity_Insights+"']").prop("checked",true);
                            $("input[name=ooe_drill_down][value='"+res_role.OEE_Drill_Down+"']").prop("checked",true);
                            $("input[name=oui][value='"+res_role.Operator_User_Interface+"']").prop("checked",true);
                            $("input[name=pdm][value='"+res_role.Production_Data_Management+"']").prop("checked",true);
                            $("input[name=settings_macine][value='"+res_role.Settings_Machine+"']").prop("checked",true);
                            $("input[name=settings_part][value='"+res_role.Settings_Parts+"']").prop("checked",true);
                            $("input[name=settings_general][value='"+res_role.Settings_General+"']").prop("checked",true);
                            $("input[name=settings_user][value='"+res_role.Settings_User_Management+"']").prop("checked",true);
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!0!");
                        }
                });
            }
            else{
                $('#ACControl').css("display","none");
                $('#OperatorCredential').css("display","block");

                // $.ajax({
                //     url: "<?php echo base_url('User_controller/getUserSiteData'); ?>",
                //     type: "POST",
                //     dataType: "json",
                //     success:function(res){
                //         $('#SiteLocation').html(res[0].Site_Location);
                //         $('#SiteID').html(res[0].Site_ID);
                //         //$("#inputUserSiteName").attr("disabled", true);
                        
                //     },
                //     error:function(res){
                //         alert("Sorry!Try Agian!!");
                //     }
                // });
                $('#ExceptOp').css("display","none");
            }


        });
                     
        $(document).on("click", ".edit", function(event){
        //$(".edit").click(function(){
            // var ulen = $('.userRole_get').length;
            // alert(ulen);
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


// deactivate ajax function
        $(document).on("click", ".deactivate-user", function(){
        //$(".deactivate-user").click(function(){    
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            var role = $(this).attr("rvalue");
            $('#DeactiveToolModal').modal('show');
            $('.Status-User').click(function(){
                $.ajax({
                    url: "<?php echo base_url('User_controller/deactivateUser'); ?>",
                    type: "POST",
                    data: {
                        User_Id : id,
                        Status_User: status,
                        Updated_By:UserNameRef,
                        Role:role
                    },
                    dataType: "json",
                    success:function(res){
                        //alert(res);
                        location.reload();
                        //alert("Status successfully Updated!!");
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!!");
                    }
                });
            }); 
        });

// activate ajax function
        $(document).on("click", ".activate-user", function(){  
            var id = $(this).attr("lvalue");
            //alert(id);
            var status = $(this).attr("svalue");
            var role = $(this).attr("rvalue");
            $('#ActiveToolModal').modal('show');
            $('.Status-User').click(function(){
                $.ajax({
                    url: "<?php echo base_url('User_controller/deactivateUser'); ?>",
                    type: "POST",
                    data: {
                        User_Id : id,
                        Status_User: status,
                        Updated_By:UserNameRef,
                        Role:role
                    },
                    dataType: "json",
                    success:function(res){
                        //alert(res);
                        //console.log(res);
                        location.reload();
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!!");
                    }
                });
            }); 
        });  

// user info details ajax modal
        $(document).on("click", ".info-user", function(){
            var id = $(this).attr("lvalue");
            var role = $(this).attr("rvalue");
            var created_on = $(this).attr('con');
            var site = $(this).attr('site');
            // alert(id);
            // alert(role);
            $.ajax({
                url: "<?php echo base_url('User_controller/getUserData'); ?>",
                type: "POST",
                data: {
                    UserId : id,
                    Role:role,
                    Site_id:site,
                },
                dataType: "json",
                success:function(res_csp){
                    //alert(res_csp);
                    console.log(res_csp);
                   
                    if (res_csp['user_data'][0].status == 1) {
                        $('#UserStatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#UserStatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                    }

                    if (res_csp['user_data'][0].role != "Operator") {
                        $('.ACControl').css("display","block");
                    }
                    else{
                        $('.ACControl').css("display","none");
                    }

                    $('#UserRole').html(
                        res_csp['user_data'][0].role
                    );
                    $('#UserRegisteredOn').html(
                        created_on
                    );
                    $('#UserId').html(
                        res_csp['user_data'][0].user_id
                    );
                    $('#UserFirstName').html(
                        res_csp['user_data'][0].first_name
                    );
                    $('#UserSiteId').html(
                        res_csp['user_data'][0].site_id
                    );
                     $('#UserSiteName').html(
                        res_csp['site_name']
                    );
                    $('#UserLastName').html(
                        res_csp['user_data'][0].last_name
                    );
                    $('#UserSiteLocation').html(
                        res_csp['location']
                    );
                    $('#UserPhone').html(
                        res_csp['user_data'][0].phone
                    );
                    $('#UserDepartment').html(
                        res_csp['department']
                    );
                    $('#UserDesignation').html(
                        res_csp['user_data'][0].designation
                    );
                    // var last_updated_by_username = res_csp['user_data'][0].last_updated_by;
                    // var passing = getlast_updated_username(last_updated_by_username);

                    $('#UserLastUpdatedBy').html(res_csp['last_updated_by'][0].first_name+" " + res_csp['last_updated_by'][0].last_name);
                     var datetime = getdate_time( res_csp['user_data'][0].last_updated_on);
                    $('#UserLastUpdatedOn').html(datetime);


                    if(res_csp['user_data'][0].role != "Operator"){
                        $.ajax({
                            url: "<?php echo base_url('User_controller/EditUserRoleMaster'); ?>",
                            type: "POST",
                            dataType: "json",
                            data:{
                                userName:res_csp['user_data'][0].user_id,
                            },
                            success:function(res_role){
                                //alert("ok"+res_role);
                                //console.log("access control"+res_role);
                                
                                //alert(res_role[0].Financial_Drill_Down);
                                $("input[name=ooe_f_drill_down][value='"+res_role[0].oee_financial_drill_down+"']").prop("checked",true);
                                $("input[name=opportunity_insights][value='"+res_role[0].opportunity_insights+"']").prop("checked",true);
                                $("input[name=ooe_drill_down][value='"+res_role[0].oee_drill_down+"']").prop("checked",true);
                                $("input[name=oui][value='"+res_role[0].operator_user_interface+"']").prop("checked",true);
                                $("input[name=pdm][value='"+res_role[0].production_data_management+"']").prop("checked",true);
                                $("input[name=settings_macine][value='"+res_role[0].settings_machine+"']").prop("checked",true);
                                $("input[name=settings_part][value='"+res_role[0].settings_part+"']").prop("checked",true);
                                $("input[name=settings_general][value='"+res_role[0].settings_general+"']").prop("checked",true);
                                $("input[name=settings_user][value='"+res_role[0].settings_user_management+"']").prop("checked",true);
                                
                            },
                            error:function(res){
                                alert("Sorry!ifTry Agian!!");
                            }
                        });
                    }
                    $("#AccessControlModal :input").attr("disabled", true);
                    $(".CreateUser").attr("disabled", true);

                    //$('#AccessControlModal' + div).find('*').prop('disabled', true);

                    
                },
                error:function(res){
                    alert("Sorry!Try Agian!! user info");
                }
            });
            $('.access-save').css("display","none");
            $('#InfoUserModal').modal('show');
        });

// edit modal for ajax function
        $(document).on("click", ".edit-user", function(){
        //$(".edit-machine").click(function(){    
            var id = $(this).attr("lvalue");
            var role = $(this).attr("rvalue");
            var status = $(this).attr("svalue");
            var sitename = $(this).attr('site');
            var created_on = $(this).attr('con');
            //alert(created_on);
            $.ajax({
                url: "<?php echo base_url('User_controller/getUserData'); ?>",
                type: "POST",
                data: {
                    UserId : id,
                    Role:role,
                    Site_id:sitename,

                },
                dataType: "json",
                success:function(res_csp){
                    //alert(res_csp);
                    console.log(res_csp);
                    if (res_csp['user_data'][0].status == 1) {
                        $('#EditUserStatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#EditUserStatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#EditUserRegisteredOn').html(created_on);

                    $('#ExceptOpEdit').css("display","none");
                    $('#OperatorCredentialEdit').css("display","none");
                    $('.ACControl').css("display","none");

                    if(res_csp['user_data'][0].role != "Operator"){
                        $('#EditUserEmail').val(res_csp['user_data'][0].username);
                        $("#EditUserEmail").attr("disabled", true);
                        $('#ExceptOpEdit').css("display","block");
                        $('#OperatorCredentialEdit').css("display","none");
                        $('.ACControl').css("display","block");
                    }
                    else{
                        $('#EditOpUserID').val(res_csp['user_data'][0].username);
                        $("#EditOpUserID").attr("disabled", true);
                        $('#ExceptOpEdit').css("display","none");
                        $('#OperatorCredentialEdit').css("display","block");
                        $('.ACControl').css("display","none");
                    }
                    
                    //$('#EditUserSiteName').html(res_csp[0].Site_Name);
                    
                    $('#EditUserSiteName').empty();
                    $.ajax({
                        url: "<?php echo base_url('User_controller/getSiteName'); ?>",
                        type: "POST",
                        dataType: "json",
                        data:{
                            UserNameRef:UserNameRef,
                            UserRoleRef:UserRoleRef,
                        },
                        success:function(res_Site){
                            //alert(res_Site[0].site_id);
                            console.log(res_Site);
                            var elements = $('<option value="new_site-test" id="display_edit_add">Add Site</option>');
                            res_Site.forEach(function(item){
                                if (item.site_id == res_csp['user_data'][0].site_id) {
                                    
                                    elements = elements.add('<option value="'+item.site_id+'" selected>'+item.site_name+' -'+item.site_id+'</option>');
                                }
                                else{
                                    //alert(item.Site_ID);
                                    elements = elements.add('<option value="'+item.site_id+'-'+item.site_name+'">'+item.site_name+' -'+item.site_id+'</option>');
                                }
                                
                                $('#EditUserSiteName').append(elements);
                            });
                            //alert(elements);                
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!!");
                        }
                    });




                    // department

                    $('#EditUserDepartment').empty();
                    $.ajax({
                        url: "<?php echo base_url('User_controller/getdept'); ?>",
                        type: "POST",
                        dataType: "json",
                        success:function(res_Site){
                            //alert(res_Site);
                            //console.log(res_Site);
                            var datetime = getdate_time(res_csp['user_data'][0].last_updated_on);
                            var elements = $('<option value="all" >Select deparment</option>');
                            res_Site.forEach(function(item){
                                if (item.department == res_csp['department']) {
                                    
                                    elements = elements.add('<option value="'+item.dept_id+'" selected="true">'+item.department+'</option>');
                                }
                                else{
                                    //alert(item.Site_ID);
                                    elements = elements.add('<option value="'+item.dept_id+'">'+item.department+'</option>');
                                }
                                
                                $('#EditUserDepartment').append(elements);
                            });
                            //alert(elements);                
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!!");
                        }
                    });


                    $('#EditUserSiteId').html(res_csp['user_data'][0].site_id);
                    $('#EditUserFName').val(res_csp['user_data'][0].first_name);
                    $('#EditUserLName').val(
                        res_csp['user_data'][0].last_name
                    );
                    $('#EditUserLocation').html(
                        res_csp['location']
                    );
                    $('#EditUserPhone').val(res_csp['user_data'][0].phone);
                    $('#EditUserDesignation').val(res_csp['user_data'][0].designation);
                    $('#EditUserDepartment').val(res_csp['department']);
                    $('#EditUserUpdatedBy').html(res_csp['last_updated_by'][0].first_name + " " +res_csp['last_updated_by'][0].last_name);
                    $('#EditUserUpdatedOn').html(getdate_time(res_csp['user_data'][0].last_updated_on));

                    $('#EditUserRole').empty();
                    var elements = $('<option value="null">Select Role</option>');
                    if (res_csp['user_data'][0].role == "Smart Users" && UserRoleRef == "Smart Users") {
                         $('#EditUserSiteName option[value="new_site-test"]').remove();
                        $('#visible_creation_edit').css('display',"none");
                        $('#display_edit_add').css("display","none");
                        $('#EditUserDepartment').val(4);
                         $('#EditUserDepartment').attr("disabled",true);

                        elements = elements.add('<option value="Smart Users" selected>Smart Users</option>');
                        elements = elements.add('<option value="Site Admin">Site Admin</option>');
                        elements = elements.add('<option value="Site Users">Site Users</option>');
                        elements = elements.add('<option value="Operator">Operator</option>');

                    }
                    else if(res_csp['user_data'][0].role == "Site Admin"){
                        $('#visible_creation_edit').css('display',"inline");
                        $('#display_edit_add').css("display","inline");
                         $('#EditUserDepartment').val(4);
                          $('#EditUserDepartment').attr("disabled",true);

                            elements = elements.add('<option value="Site Admin" selected>Site Admin</option>');
                            elements = elements.add('<option value="Site Users">Site Users</option>');
                            elements = elements.add('<option value="Operator">Operator</option>');
                        
                    }
                    else if(res_csp['user_data'][0].role == "Site Users"){
                          $('#EditUserSiteName option[value="new_site-test"]').remove();
                        if (UserRoleRef == "Smart Users" || UserRoleRef == "Smart Admin") {
                            $('#display_edit_add').css("display","none");
                            elements = elements.add('<option value="Site Admin">Site Admin</option>');
                            elements = elements.add('<option value="Site Users" selected>Site Users</option>');
                            elements = elements.add('<option value="Operator">Operator</option>');
                        }
                        else{
                        $('#visible_creation_edit').css('display',"none");
                       // $('.drp_new_site_edit').css("display","none");
                         $('#EditUserDepartment').removeAttr("disabled");


                            elements = elements.add('<option value="Site Users" selected>Site Users</option>');
                            elements = elements.add('<option value="Operator">Operator</option>');
                        }
                    }
                    else if(res_csp['user_data'][0].role == "Operator"){
                          $('#EditUserSiteName option[value="new_site-test"]').remove();
                        $('#visible_creation_edit').css('display',"none");
                        $('#display_edit_add').css("display","none");
                         $('#EditUserDepartment').val(1);
                          $('#EditUserDepartment').attr("disabled",true);




                        elements = elements.add('<option value="Operator" selected>Operator</option>');
                    }
                    else{
                        elements = elements.add('<option value="Smart Admin" selected>Smart Admin</option>');
                    }
                    
                    $('.access-save').css("display","inline");
                    $('#EditUserRole').append(elements);
                    if(res_csp['user_data'][0].role != "Operator"){
                        $.ajax({
                            url: "<?php echo base_url('User_controller/EditUserRoleMaster'); ?>",
                            type: "POST",
                            dataType: "json",
                            data:{
                                userName:res_csp['user_data'][0].user_id,
                            },
                            success:function(res_role){
                                //alert(res_role[0].Financial_Drill_Down);
                                $("input[name=ooe_f_drill_down][value='"+res_role[0].oee_financial_drill_down+"']").prop("checked",true);
                                $("input[name=opportunity_insights][value='"+res_role[0].opportunity_insights+"']").prop("checked",true);
                                $("input[name=ooe_drill_down][value='"+res_role[0].oee_drill_down+"']").prop("checked",true);
                                $("input[name=oui][value='"+res_role[0].operator_user_interface+"']").prop("checked",true);
                                $("input[name=pdm][value='"+res_role[0].production_data_management+"']").prop("checked",true);
                                $("input[name=settings_macine][value='"+res_role[0].settings_machine+"']").prop("checked",true);
                                $("input[name=settings_part][value='"+res_role[0].settings_part+"']").prop("checked",true);
                                $("input[name=settings_general][value='"+res_role[0].settings_general+"']").prop("checked",true);
                                $("input[name=settings_user][value='"+res_role[0].settings_user_management+"']").prop("checked",true);
                            },
                            error:function(res){
                                alert("Sorry!Try Agian!!");
                            }
                        });
                    }
                    // temporary hide for strategy

                    $('#EditUserSiteName').on('change', function() {
                        const mydemo = $('#EditUserSiteName').val();
                        const myarr1 = mydemo.split('-');
                        if( myarr1[0] == 'new_site'){
                            $('#EditUserSiteId').empty();
                            $('#EditUserLocation').empty();
                            $('#EditUser_newsite').removeAttr("disabled");
                            $('#EditUser_location').removeAttr('disabled');
                        }
                        else{
                            var site_select = $('#EditUserSiteName').val();
                            const myarr = site_select.split("-");
                            var site_id = myarr[0];
                            var location = myarr[1];
                             $('#EditUserSiteId').html(site_id);
                            $('#EditUserLocation').html(location);
                            $('#EditUser_newsite').attr("disabled",true);
                            $('#EditUser_location').attr('disabled',true);

                            //var role = $('#EditUserRole').val();

                            //alert(role);
                        }
                    });
                            /*
                            $.ajax({
                                url: "<?php echo base_url('User_controller/getSite'); ?>",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    Sname : this.value
                                },
                                success:function(res_Site){
                                    alert(res_Site);
                                    console.log(res_Site);
                                    // if (res_Site[0].IsAdmin == 0 && role != 'Site Admin') {
                                    //     alert("Admin Didn't Created to this Site!!");
                                    //      $(".EditUserData").attr("disabled", true);
                                    // }
                                    // else if(res_Site[0].IsAdmin == 1 && role == 'Site Admin' && res_Site[0].Site_ID != res_csp[0].Site_ID){
                                    //     alert("Admin Already Created to this Site!!");  
                                    //      $(".EditUserData").attr("disabled", true);
                                    // }
                                    // else{
                                    //     $(".EditUserData").removeAttr("disabled"); 
                                    //     $('#EditUserSiteId').html(
                                    //         res_Site[0].Site_ID
                                    //     );
                                    //     $('#EditUserLocation').html(
                                    //         res_Site[0].Site_Location
                                    //     );    
                                    // }
                                    
                                },
                                error:function(res){
                                    alert("Sorry!Try Agian!!");
                                }
                            });
                            
                        }
                        $.ajax({
                                url: "<?php echo base_url('User_controller/getSiteName'); ?>",
                                type: "POST",
                                dataType: "json",
                                data:{
                                    UserNameRef:UserNameRef,
                                    UserRoleRef:UserRoleRef,
                                },
                                success:function(res_Site){
                                    alert(res_Site+'ok');
                                    var elements = $('<option value=" " selected="true">Select Site</option>');
                                    res_Site.forEach(function(item){ 
                                        elements = elements.add('<option value="'+item.site_id+'">'+item.site_name+' -'+item.site_id+'</option>');
                                        $('#inputUserSiteName').append(elements);
                                    });              
                                },
                                error:function(res){
                                    alert("Sorry!Try Agian SiteName!!");
                                }
                        });

                    });
*/

                    $('.EditUserData').attr("data_val",id);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#EditUserModal').modal('show');
            $(document).on("click", ".EditUserData", function(){
                
                var a = EditUserFName();
                var b = EditUserLName();
                var c = EditUserPhone();
                var d = EditUserDesignation();
                if (($('#EditUserSiteName').val() == "all")||($('#EditUserRole').val() == "null")) {
                    if ($('#EditUserSiteName').val() == "all") {
                        $("#sitename_error_edit").css("display","block");
                    }
                    if ($('#EditUserRole').val() == "null") {
                        $("#site_error_edit").css("display","block");
                        $('#site_error_edit').html("Site Name*");
                    }
                    $('.EditUserData').attr("disabled",true);
                }
                else{
                    $("#site_error_edit").css("display","none");
                    $("#EditUserSiteName").css("display","none");

                    var user_id = $('.EditUserData').attr('data_val');
                    var User_Role = $('#EditUserRole').val();
                    var User_Email = $('#EditUserEmail').val();
                    var User_First_Name = $('#EditUserFName').val();
                    var User_Last_Name = $('#EditUserLName').val();
                    var User_Phone = $('#EditUserPhone').val();
                    var User_Designation = $('#EditUserDesignation').val();
                    var User_Site_Name = $('#EditUserSiteName').val();

                    var User_Department = $('#EditUserDepartment').val();

                    if (User_Role != "Operator"){
                        var FDrillDown = $('input[name="ooe_f_drill_down"]:checked').val();
                        var Opportunityinsights = $('input[name="opportunity_insights"]:checked').val();
                        var OEEDrillDown = $('input[name="ooe_drill_down"]:checked').val();
                        var OUI = $('input[name="oui"]:checked').val();
                        var PDM = $('input[name="pdm"]:checked').val();
                        var SMachine = $('input[name="settings_macine"]:checked').val();
                        var SPart = $('input[name="settings_part"]:checked').val();
                        var SGeneral = $('input[name="settings_general"]:checked').val();
                        var SUser = $('input[name="settings_user"]:checked').val();
                    }
                    else{
                        var FDrillDown = "";
                        var Opportunityinsights = "";
                        var OEEDrillDown = "";
                        var OUI = "";
                        var PDM = "";
                        var SMachine = "";
                        var SPart = "";
                        var SGeneral = "";
                        var SUser = "";
                    }
                    var role = $('#EditUserRole').val();
                    var department = $('#EditUserDepartment').val();
                   var sitename = $('#EditUserSiteName').val();
                   const myarr = sitename.split("-");
                   old_site_id = myarr[0];

                    if ( (role == " ") && (department == " ") && (sitename == " ")) {
                        alert('please select value');
                    }
                    else{
                        //alert(user_id);
                        var new_site_id = $('#EditUser_newsite').val();
                        var new_location = $('#EditUser_location').val();
                            // var user_email = $('#EditUserEmail').val();
                            var user_id_op = $('#EditOpUserID').val();
                            //alert(user_id_op);
                            if (role == "Operator") {
                               // alert('Operator');
                                $.ajax({
                                    url: "<?php echo base_url('User_controller/updateUserData_op'); ?>",
                                    type: "POST",
                                    dataType: "json",
                                    data:{
                                        user_id:user_id,
                                        user_id_op:user_id_op,
                                        User_First_Name:User_First_Name,
                                        User_Last_Name:User_Last_Name,
                                        User_Phone:User_Phone,
                                        User_Designation:User_Designation,
                                        Role:User_Role,
                                        User_Site_Name:old_site_id,
                                        User_Department:User_Department,
                                        Updated_By:UserNameRef,
                                        new_site_id:new_site_id,
                                        new_location:new_location
                                       
                                    },
                                    success:function(res){
                                        //alert(res);
                                       // console.log(res);
                                       location.reload();
                                       // alert(res);
                                        //$('#AccessControlModal').modal('hide');
                                    },
                                    error:function(res){
                                        alert("Sorry!Try Agian!!");
                                    }
                                });

                            }else{
                                $.ajax({
                                    url: "<?php echo base_url('User_controller/updateUserData'); ?>",
                                    type: "POST",
                                    dataType: "json",
                                    data:{
                                        user_id:user_id,
                                        User_Email:User_Email,
                                        User_First_Name:User_First_Name,
                                        User_Last_Name:User_Last_Name,
                                        User_Phone:User_Phone,
                                        User_Designation:User_Designation,
                                        Role:User_Role,
                                        User_Site_Name:old_site_id,
                                        User_Department:User_Department,
                                        Updated_By:UserNameRef,
                                        FDrillDown:FDrillDown,
                                        Opportunityinsights:Opportunityinsights,
                                        OEEDrillDown:OEEDrillDown,
                                        OUI:OUI,
                                        PDM:PDM,
                                        SMachine:SMachine,
                                        SPart:SPart,
                                        SGeneral:SGeneral,
                                        SUser:SUser,
                                        new_site_id:new_site_id,
                                        new_location:new_location
                                       

                                    },
                                    success:function(res){
                                        //alert(res);
                                        //console.log(res);
                                       location.reload();
                                       // alert(res);
                                        //$('#AccessControlModal').modal('hide');
                                    },
                                    error:function(res){
                                        alert("Sorry!Try Agian!!");
                                    }
                                });
                            }
                            //alert(unique_value);
                            /*
                            $.ajax({
                                url: "<?php echo base_url('User_controller/updateUserData'); ?>",
                                type: "POST",
                                dataType: "json",
                                data:{
                                    user_id:user_id,
                                    User_Email:User_Email,
                                    User_First_Name:User_First_Name,
                                    User_Last_Name:User_Last_Name,
                                    User_Phone:User_Phone,
                                    User_Designation:User_Designation,
                                    Role:User_Role,
                                    User_Site_Name:User_Site_Name,
                                    User_Department:User_Department,
                                    Updated_By:UserNameRef,
                                    FDrillDown:FDrillDown,
                                    Opportunityinsights:Opportunityinsights,
                                    OEEDrillDown:OEEDrillDown,
                                    OUI:OUI,
                                    PDM:PDM,
                                    SMachine:SMachine,
                                    SPart:SPart,
                                    SGeneral:SGeneral,
                                    SUser:SUser
                                },
                                success:function(res){
                                    alert('User Created Successfully');
                                    console.log(res);
                                   // location.reload();
                                   // alert(res);
                                    //$('#AccessControlModal').modal('hide');
                                },
                                error:function(res){
                                    alert("Sorry!Try Agian!!");
                                }
                            });
                            */
                        
                    }
                   
                }

                
                
            });
        }); 



// forgot password in startegy
$(document).on('click','.forgot-password',function(){
    var user_id = $(this).attr('lvalue');
    //alert(user_id);
    $('#forgot_pass').attr('lvalue',user_id);
    $('#forgot-modal').modal('show');
});
// forgot password for site admin in strategy code
$(document).on('click','.forgot_pass_siteadmin',function(){
    uid = $('#forgot_pass').attr('lvalue');
    pass = document.getElementById("forgot_pass").value;
    repass = document.getElementById("forgot_confirm_pass").value;
    //alert(repass);
    pass = pass.toLocaleLowerCase();
    repass = repass.toLocaleLowerCase();
    if (pass == repass) {
        //alert("string matching");
        $.ajax({
            url : "<?php echo base_url('User_controller/forgot_siteadmin_pass'); ?>",
            method : "post",
            data:{pass:pass,
                uid:uid,
                ref_id:UserNameRef
            },
            // dataType : "json",
            success:function(data){
                //alert(data);
                location.reload();
            }
        });
    }else{
        alert("string not matching");
    }
});
        
    //     $.ajax({
    //         url: "<?php echo base_url('Home/getSiteName'); ?>",
    //         type: "POST",
    //         dataType: "json",
    //         success:function(res_Site){
                
    //             var elements = $('<option value="new">Add New Site</option>');
    //             var elements1 = $('<option value="new">Add New Site</option>');
    //             res_Site.forEach(function(item){
    //                 elements = elements.add('<option value="'+item.Site_Name+'">'+item.Site_Name+'</option>');
    //                 elements1 = elements1.add('<option value="'+item.Site_Name+'">'+item.Site_Name+'</option>');
    //             });
    //             $('.inputSiteName').append(elements1);
    //             $('.inputSiteNameAdd').append(elements);
    //         },
    //         error:function(res){
    //             alert("Sorry!Try Agian!!");
    //         }
    //     });
    //     $('#filterSiteName').empty();
    //         $.ajax({
    //             url: "<?php echo base_url('Home/getSiteName'); ?>",
    //             type: "POST",
    //             dataType: "json",
    //             success:function(res_Site){
                    
    //                 var elements = $('<option value="all">All</option>');
    //                 res_Site.forEach(function(item){
    //                     elements = elements.add('<option value="'+item.Site_Name+'">'+item.Site_Name+'</option>');
    //                 });
    //                 $('#filterSiteName').append(elements);
    //             },
    //             error:function(res){
    //                 alert("Sorry!Try Agian!!");
    //             }
    //         });
    //     $('#filterMachineBrand').empty();
    //         $.ajax({
    //             url: "<?php echo base_url('Home/getBrandName'); ?>",
    //             type: "POST",
    //             dataType: "json",
    //             success:function(res_Site){
                    
    //                 var elements = $('<option value="all">All</option>');
    //                 res_Site.forEach(function(item){
    //                     elements = elements.add('<option value="'+item.Machine_Brand+'">'+item.Machine_Brand+'</option>');
    //                 });
    //                 $('#filterMachineBrand').append(elements);
    //             },
    //             error:function(res){
    //                 alert("Sorry!Try Agian!!");
    //             }
    //         });
    //     $('#filterLastUpdatedBy').empty();
    //         $.ajax({
    //             url: "<?php echo base_url('Home/getUserName'); ?>",
    //             type: "POST",
    //             dataType: "json",
    //             success:function(res_Site){
                    
    //                 var elements = $('<option value="all">All</option>');
    //                 res_Site.forEach(function(item){
    //                     elements = elements.add('<option value="'+item.Created_By+'">'+item.Created_By+'</option>');
    //                 });
    //                 $('#filterLastUpdatedBy').append(elements);
    //             },
    //             error:function(res){
    //                 alert("Sorry!Try Agian!!");
    //             }
    //         });
    //     // $("#inputNewSiteName").attr("disabled", true);
    //     // $("#inputNewSiteLocation").attr("disabled", true);
    //     $('.inputSiteNameAdd').on('change', function() {
    //         if( this.value == 'new'){
    //             $("#inputNewSiteName").removeAttr("disabled");
    //             $("#inputNewSiteLocation").removeAttr("disabled");
    //             $('#sid').empty();
    //             $('#slocation').empty();
    //         }
    //         else{
    //             $("#inputNewSiteName").attr("disabled", true);
    //             $("#inputNewSiteLocation").attr("disabled", true);
    //             $.ajax({
    //                 url: "<?php echo base_url('Home/getSite'); ?>",
    //                 type: "POST",
    //                 dataType: "json",
    //                 data: {
    //                     Sname : this.value
    //                 },
    //                 success:function(res_Site){
    //                     $('#sid').html(
    //                         res_Site[0].Site_ID
    //                     );
    //                     $('#slocation').html(
    //                         res_Site[0].Site_Location
    //                     );
    //                 },
    //                 error:function(res){
    //                     alert("Sorry!Try Agian!!");
    //                 }
    //             });
    //         }
    //     });
    //     $("#editNewSiteNameEdit").attr("disabled", true);
    //     $("#editNewSiteLocationEdit").attr("disabled", true);
    //     $('.inputSiteName').on('change', function() {
    //         if( this.value == 'new'){
    //             //alert(this.value);
    //             $("#editNewSiteNameEdit").removeAttr("disabled");
    //             $("#editNewSiteLocationEdit").removeAttr("disabled");
    //             $('#machinesiteid').empty();
    //             $('#machinelocation').empty();
    //         }
    //         else{
    //             $("#editNewSiteNameEdit").attr("disabled", true);
    //             $("#editNewSiteLocationEdit").attr("disabled", true);
    //             $.ajax({
    //                 url: "<?php echo base_url('Home/getSite'); ?>",
    //                 type: "POST",
    //                 dataType: "json",
    //                 data: {
    //                     Sname : this.value
    //                 },
    //                 success:function(res_Site){
    //                     $('#machinesiteid').html(
    //                         res_Site[0].Site_ID
    //                     );
    //                     $('#machinelocation').html(
    //                         res_Site[0].Site_Location
    //                     );
    //                 },
    //                 error:function(res){
    //                     alert("Sorry!Try Agian!!");
    //                 }
    //             });
    //         }
    //     });
    //     $.ajax({
    //         url: "<?php echo base_url('Home/aIaMachine'); ?>",
    //         type: "POST",
    //         dataType: "json",
    //         success:function(res){
    //             $('#Iactive').html(res.InActive);
    //             $('#Active').html(res.Active);
                
    //         },
    //         error:function(res){
    //             alert("Sorry!Try Agian!!");
    //         }
    //     });
    //     // $(document).on("click", "#filterData", function(){
            
            
    //     // });
    /*
        $('.Add_Filter').click(function(){
            // alert("filter event");
            var  FromDate = $('#filterFrom').val();
            var  ToDate = $('#filterTo').val();
            var  Site = $('#filterSiteName').val();
            var  Brand = $('#filterRole').val();
            var  Status = $('#filterStatus').val();
            var  LastUpdatedBy = $('#filterLastUpdatedBy').val();
            var  filterMachineRateHourOp = $('#filterMachineRateHourOp').val();
            var  filterMachineRateHourR = $('#filterMachineRateHourR').val();
            var  filterMachineOffRateR = $('#filterMachineOffRateR').val();
            var  filterMachineOffRateOp = $('#filterMachineOffRateOp').val();
            /*
            $.ajax({
                url: "<?php echo base_url('Home/getuserFilterData'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    FromDate : FromDate,
                    ToDate : ToDate,
                    Site : Site,
                    Brand : Brand,
                    Status : Status,
                    LastUpdatedBy : LastUpdatedBy,
                    filterMachineRateHourOp:filterMachineRateHourOp,
                    filterMachineRateHourR:filterMachineRateHourR,
                    filterMachineOffRateOp:filterMachineOffRateOp,
                    filterMachineOffRateR:filterMachineOffRateR
                },
                success:function(res_filter){
                    $('.contentMachine').empty();
                    $('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_filter)){
                        $('.contentMachine').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                        res_filter.forEach(function(item){
                            var elements = $();
                            if (item.Status == 1) {
                                active = active+1;
                                elements = elements.add('<div id="settings_div">'
                                        +'<div class="row paddingm">'
                                            +'<div class="col-sm-1 col marleft" ><p>'+item.Machine_Id+'</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Name+'</p></div>'         
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_OFF_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-1 col marright" ><p>'+item.Tonnage+'T</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Brand+'</p></div>'
                                            +'<div class="col-sm-1 col marleft settings_active" ><p style="color: #004795"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                                +'<ul class="edit-menu">'
                                                    +'<li class="d-flex justify-content-center">'
                                                        +'<a href="#">'
                                                            +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
                                                        +'</a>'
                                                        +'<ul class="edit-subMenu">'
                                                            +'<li class="edit-opt edit-user" lvalue="'+item.R_NO+'" ><a href="#"><i class="fa fa-pencil" style="margin-left:10px;"></i>EDIT</a></li>'
                                                            +'<li class="edit-opt deactivate-machine" lvalue="'+item.R_NO+'" svalue="'+item.Status+'"><a href="#"><i class="fa fa-trash" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                        +'</ul>'
                                                    +'</li>'
                                                +'</ul>'                
                                            +'</div>'
                                            
                                        +'</div>'
                                    +'</div>');
                                $('.contentMachine').append(elements);
                            }
                            else{
                                inactive = inactive+1;
                                elements = elements.add('<div id="settings_div">'
                                        +'<div class="row paddingm">'
                                            +'<div class="col-sm-1 col marleft" ><p>'+item.Machine_Id+'</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Name+'</p></div>'        
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_OFF_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-1 col marright" ><p>'+item.Tonnage+'T</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Brand+'</p></div>'
                                            +'<div class="col-sm-1 col marleft settings_active" ><p style="color: #e2062c"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
                                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                                +'<ul class="edit-menu">'
                                                    +'<li class="d-flex justify-content-center">'
                                                        +'<a href="#">'
                                                            +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
                                                        +'</a>'
                                                        +'<ul class="edit-subMenu">'
                                                            +'<li class="edit-opt info-machine" lvalue="'+item.R_NO+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>EDIT</a></li>'
                                                            +'<li class="edit-opt activate-machine" lvalue="'+item.R_NO+'" svalue="'+item.Status+'"><a href="#"><i class="fa fa-power-off" style="margin-left:10px;"></i>ACTIVATE</a></li>'
                                                        +'</ul>'
                                                    +'</li>'
                                                +'</ul>'                
                                            +'</div>'
                                            
                                        +'</div>'
                                    +'</div>');
                                $('.contentMachine').append(elements);
                            }
                        });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    active_len = active.toString().length;
                    if (parseInt(inactive_len) > 1) {
                         $('#Iactive').html(inactive);
                    }else{
                        $('#Iactive').html('0'+inactive);
                    }

                    if (parseInt(active_len) > 1) {
                         $('#Active').html(active);
                    }else{
                        $('#Active').html('0'+active);
                    }
//                     $('#Iactive').html(inactive);
//                     $('#Active').html(active);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });*/

     });


  function inputUserEMail(){
            var val = $("#inputUserEMail").val();
            if (!val) {
                $(".CreateUser").attr("disabled", true);
                return "User Email**";
            }
            else{
                var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                val = val.trim();
                val = val.toLowerCase();
                if (letters.test(val)) {
                    $(".CreateUser").attr("disabled", true);
                    var user = $('#inputUserEMail').val();
                    //alert(user);
                    $.ajax({
                        url: "<?php echo base_url('User_controller/checkUser'); ?>",
                        type: "POST",
                        dataType:"json",
                        data:{
                            user_name:user,
                        },
                        success:function(res){
                           // alert(res);
                            //console.log(res);
                               if (res) {
                                      alert('User Email Already Exists');
                                    $(".CreateUser").attr("disabled", true);
                                    $('#inputUserFirstName').attr("disabled",true);
                                    $('#inputUserLastName').attr("disabled",true);
                                    $('#inputUserPhone').attr("disabled",true);
                                    $('#inputUserDesignation').attr("disabled",true);
                                    $("#inputUserFirstName").val(" ");
                                    $("#inputUserLastName").val(" ");
                                    $("#inputUserPhone").val(" ");
                                    $("#inputUserDesignation").val(" ");
                               }else{

                                    $(".CreateUser").removeAttr("disabled");
                                    $("#inputUserFirstName").removeAttr("disabled");
                                    $("#inputUserLastName").removeAttr("disabled");
                                    $("#inputUserPhone").removeAttr("disabled");
                                    $("#inputUserDesignation").removeAttr("disabled");
                               }

                            // if (res != 0) {
                            //     alert('User Email Already Exists');
                            //     $(".CreateUser").attr("disabled", true);
                            //     $('#inputUserFirstName').val("");
                            //     $('#inputUserLastName').val("");
                            //     $('#inputUserPhone').val("");
                            //     $('#inputUserDesignation').val("");
                            //     $("#inputUserFirstName").attr("disabled", true);
                            //     $("#inputUserLastName").attr("disabled", true);
                            //     $("#inputUserPhone").attr("disabled", true);
                            //     $("#inputUserDesignation").attr("disabled", true);
                            // }
                            // else{
                            //     $(".CreateUser").removeAttr("disabled");
                            //     $("#inputUserFirstName").removeAttr("disabled");
                            //     $("#inputUserLastName").removeAttr("disabled");
                            //     $("#inputUserPhone").removeAttr("disabled");
                            //     $("#inputUserDesignation").removeAttr("disabled");
                            // }
                        },
                        error:function(res){
                            //alert(res);
                            alert("Sorry!Try Agian!!");
                        }
                    });
                    return "";
                }
                else{
                    $(".CreateUser").attr("disabled", true);
                    //$("#inputNewToolNameCunt").css("display","none");
                    return "Invalid Email**";
                }
            }
        }


        // operator on change

        function inputOpUserID(){
            var val = $("#inputOpUserID").val();
            if (!val) {
                $(".CreateUser").attr("disabled", true);
                return "User ID**";
            }
            else{
                var num = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                if (num.test(val)) {
                    $(".CreateUser").removeAttr("disabled");
                    var id = $('#inputOpUserID').val();
                    $.ajax({
                        url: "<?php echo base_url('User_controller/checkOperator'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            User_ID : id
                        },
                        success:function(res){
                           // alert(res);
                            if (res == true) {
                                alert("User Exist, Try another User ID!");
                                $(".CreateUser").attr("disabled", true);
                                $('#inputUserFirstName').attr("disabled",true);
                                $('#inputUserLastName').attr("disabled",true);
                                $('#inputUserPhone').attr("disabled",true);
                                $('#inputUserDesignation').attr("disabled",true);

                                $('#inputUserFirstName').val(" ");
                                $('#inputUserLastName').val(" ");
                                $('#inputUserPhone').val(" ");
                                $('#inputUserDesignation').val(" ");

                            }
                            else{
                                 $(".CreateUser").removeAttr("disabled");
                                 $("#inputUserFirstName").removeAttr("disabled");
                                 $("#inputUserLastName").removeAttr("disabled");
                                 $("#inputUserPhone").removeAttr("disabled");
                                 $("#inputUserDesignation").removeAttr("disabled");
                               

                            }
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!!");
                        }
                    });
                    return "";
                }
                else{
                    $(".CreateUser").attr("disabled", true);
                    return "Invalid**";
                }
            }
        }

        // undo funciton load the page
        $(document).on('click','.undo',function(){
             location.reload();
        })


        // $(document).on('change','#inputUserSiteName',function(){

        //     var site_data = $('#inputUserSiteName').val();

        //     if (site_data == 'new_site') {
        //         $('#').css('display','inline');
        //         $('#').css('display','inline');
        //     }else{
        //         $('#').css('display','none');
        //         $('#').css('display','none');
        //     }


        // });

//  operator password validation function
$(document).on('blur','#pass_op',function(){
    var pass = $('#pass_op').val();
    var msg = " ";
    var pattern =  /^[a-z][a-z0-9\s]*$/;

    if (pattern == "") {
        msg = "Empty";
    }else if (pattern.test(pass)) {
        msg = " ";

    }else{
        msg = "Invalid**";
        $('.CreateUser').attr("disabled",true);
    }

    document.getElementById('pass_op_err').textContent = msg;


});

// retype password
$(document).on('blur','#re_pass_op',function(){
    var pass = $('#re_pass_op').val();
    var msg = " ";
    var pattern =  /^[a-z][a-z0-9\s]*$/;

    if (pattern == "") {
        msg = "Empty";
    }else if (pattern.test(pass)) {
        msg = " ";

    }else{
        msg = "Invalid**";
        $('.CreateUser').attr("disabled",true);
    }

    document.getElementById('re_pass_op_err').textContent = msg;


});

// filter active
/*
$(document).on('click','.active_click',function(){
   // alert();

  // retrive all users
         var SiteUserRef = "<?php echo($this->data['user_details'][0]['user_id']); ?>";
         var role = "<?php echo($this->data['user_details'][0]['role']); ?>";
         var sitename = "<?php echo($this->data['user_details'][0]['site_id']);  ?>";

         // alert(SiteUserRef);
         // alert(role);
         $.ajax({
            url: "<?php echo base_url('User_controller/getSiteUser'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                SiteUserRef : SiteUserRef,
                role:role,
                sitename:sitename,
            },
            success:function(res_Site){
               // console.log(res_Site);
                
                //alert(res_Site);
                
                $('.contentUser').empty();
                    //$('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_Site)){
                        $('.contentUser').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                    var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    
                    res_Site.forEach(function(item){
                        //alert();
                        var randomColor = color[Math.floor(Math.random()*color.length)];
                        var elements = $();

                        if (item.role == "Smart Admin"){
                            var forgot = "none";
                            var colorRole = "#853e2c";
                            var colorBorder = "#ffdad0";
                        }
                        else if(item.role == "Smart Users"){
                            var forgot = "none";
                            var colorRole = "#a2723f";
                            var colorBorder = "#ffe4c4";
                        }
                        else if(item.role == "Site Admin"){
                            var forgot = "block";
                            var colorRole = "#005fc8";
                            var colorBorder = "#c1eaff";
                        }
                        else if(item.role == "Site Users"){
                            var forgot = "none";
                            var colorRole = "#56b8c2";
                            var colorBorder = "#60ebee";
                        }
                        else{
                            var forgot = "none";
                            var colorRole = "#7030a0";
                            var colorBorder = "#dfcaee";
                        }
                        
                        //alert(item.User_Name);
                        if (item.status == 1) {
                            active = active+1;
                        
                            elements = elements.add('<div id="settings_div">'
                                    +'<div class="row paddingm">'
                                    +'<div class="col-sm-2 col" style="display: flex;">'
                                        +'<div style="width: 30%">'
                                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                        +'</div>'
                                        +'<div style="width: 70%">'
                                            +'<p title="'+item.username+'">'+item.username+'</p>'
                                            +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                            
                                        +'</div>'                
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ><p title="'+sitename+'">'+sitename+'</p></div>'        
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.designation+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.created_on+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft">'
                                        +'<div class="userRole textCenter marleft" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                            +'<p style="color:'+colorRole+'" class="userRole_get  marleft">'+item.role+'</p>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col settings_active marleft" ><p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu">'
                                                    // +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                    +'<li class="edit-opt edit-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>'
                                                    +'<li class="edit-opt deactivate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'"><a href="#"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                     +'<li class="edit-opt forgot-password forgotwork " style="display:'+forgot+';" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><i class="fa fa-key" style="margin-left:10px;"></i>RESET PAASWORD</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                                +'</div>');
                            $('.contentUser').append(elements);
                        }
                    });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    //  var len = res.InActive.toString().length;
                    // var len1 = res.Active.toString().length;
                    inactive_len = inactive.toString().length;
                    active_len = active.toString().length;
                    // if (parseInt(inactive_len) > 1) {
                    //      $('#Iactive').html(inactive);
                    // }else{
                    //     $('#Iactive').html('0'+inactive);
                    // }

                    $('#Iactive').html('00');
                    if (parseInt(active_len) > 1) {
                         $('#Active').html(active);
                    }else{
                        $('#Active').html('0'+active);
                    }
                    // $('#Iactive').html(inactive);
                    // $('#Active').html(active);
                           
            },
            error:function(res){
               // console.log(res);
                alert("Sorry!Try Agian!!");
            }
        });

    
});
*/

// filter inactive
/*
$(document).on('click','.inactive_click',function(){
    //alert();

  // retrive all users
         var SiteUserRef = "<?php echo($this->data['user_details'][0]['user_id']); ?>";
         var role = "<?php echo($this->data['user_details'][0]['role']); ?>";
         var sitename = "<?php echo($this->data['user_details'][0]['site_id']);  ?>";

         // alert(SiteUserRef);
         // alert(role);
         $.ajax({
            url: "<?php echo base_url('User_controller/getSiteUser'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                SiteUserRef : SiteUserRef,
                role:role,
                sitename:sitename,
            },
            success:function(res_Site){
               // console.log(res_Site);
                
                //alert(res_Site);
                
                $('.contentUser').empty();
                    //$('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_Site)){
                        $('.contentUser').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                    var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    
                    res_Site.forEach(function(item){
                        //alert();
                        var randomColor = color[Math.floor(Math.random()*color.length)];
                        var elements = $();

                        if (item.role == "Smart Admin"){
                            var forgot = "none";
                            var colorRole = "#853e2c";
                            var colorBorder = "#ffdad0";
                        }
                        else if(item.role == "Smart Users"){
                            var forgot = "none";
                            var colorRole = "#a2723f";
                            var colorBorder = "#ffe4c4";
                        }
                        else if(item.role == "Site Admin"){
                            var forgot = "block";
                            var colorRole = "#005fc8";
                            var colorBorder = "#c1eaff";
                        }
                        else if(item.role == "Site Users"){
                            var forgot = "none";
                            var colorRole = "#56b8c2";
                            var colorBorder = "#60ebee";
                        }
                        else{
                            var forgot = "none";
                            var colorRole = "#7030a0";
                            var colorBorder = "#dfcaee";
                        }
                        
                        //alert(item.User_Name);
                        if (item.status == 0) {
                            active = active+1;
                        
                            elements = elements.add('<div id="settings_div">'
                                    +'<div class="row paddingm">'
                                    +'<div class="col-sm-2 col" style="display: flex;">'
                                        +'<div style="width: 30%">'
                                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                        +'</div>'
                                        +'<div style="width: 70%">'
                                            +'<p title="'+item.username+'">'+item.username+'</p>'
                                            +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                            
                                        +'</div>'                
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ><p title="'+sitename+'">'+sitename+'</p></div>'        
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.designation+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.created_on+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft">'
                                        +'<div class="userRole textCenter marleft" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                            +'<p style="color:'+colorRole+'" class="userRole_get  marleft">'+item.role+'</p>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col settings_active marleft" ><p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>InActive</p></div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu">'
                                                    // +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                    +'<li class="edit-opt edit-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>'
                                                    +'<li class="edit-opt deactivate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'"><a href="#"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                     +'<li class="edit-opt forgot-password forgotwork " style="display:'+forgot+';" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><i class="fa fa-key" style="margin-left:10px;"></i>RESET PAASWORD</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                                +'</div>');
                            $('.contentUser').append(elements);
                        }
                    });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    //  var len = res.InActive.toString().length;
                    // var len1 = res.Active.toString().length;
                    inactive_len = inactive.toString().length;
                    active_len = active.toString().length;
                    // if (parseInt(inactive_len) > 1) {
                    //      $('#Iactive').html(inactive);
                    // }else{
                    //     $('#Iactive').html('0'+inactive);
                    // }

                    $('#Active').html('00');
                    if (parseInt(active_len) > 1) {
                         $('#Iactive').html(active);
                    }else{
                        $('#Iactive').html('0'+active);
                    }
                    // $('#Iactive').html(inactive);
                    // $('#Active').html(active);
                           
            },
            error:function(res){
               // console.log(res);
                alert("Sorry!Try Agian!!");
            }
        });

    
});
*/




</script>
