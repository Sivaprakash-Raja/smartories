<style type="text/css">
    .contentContainer{
        margin-top: 4.5rem;
        overflow-anchor: none;
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
    .font_weight_editp{
        font-weight: 500;
        font-size: 0.9rem;

    }
    /* font css in edit add price */
    .left-align{
        
       padding-left:1.4rem;

    }
</style>
<div style="margin-left: 4.5rem;">
    <nav class="navbar navbar-expand-lg settings_nav sticky-top fixsubnav">
      <div class="container-fluid paddingm">
        <p class="float-start p3" id="logo">Parts Settings</p>
          <div class="d-flex">
                <p class="float-end stcode" style="color: #005CBC;">
                    <span  id="active"></span>Active
                </p>
                <p class="float-end stcode" style="color: #C00000;">
                    <span  id="IActive"></span>Inactive
                </p>
          </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
      <div class="container-fluid paddingm">
        <p class="float-start"></p>
          <div class="d-flex innerNav">
          
                <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="fa fa-redo float-end  undo" style="width:20px;height:20px;color: #b5b8bc;cursor: pointer;">
                
                <a style="background: #cde4ff;color: #005abc;width:7rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#filterPartModal" id="filterData">FILTER</a>

                <?php 
                     if($this->data['access'][0]['settings_part'] == 3){ 
                ?>

                   <!--  <a style="background: #005abc;color: white;width:8rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#AddPartModal">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD PART
                    </a>  -->

                     <a style="background: #005abc;color: white;width:8rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" id="add_part_modal">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD PART
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
                  <p class="basic_header">PART ID</p>
                </div>
                <div class="col-sm-2 p3 paddingm">
                  <p class="basic_header">PART NAME</p>
                </div>
                <div class="col-sm-2 p3 paddingm">
                  <p class="basic_header">TOOL NAME</p>
                </div>
                <div class="col-sm-2 p3 paddingm ">
                  <p class="basic_header">NET IDEAL CYCLE TIME (NICT)</p>
                </div>
                <div class="col-sm-2 p3 paddingm ">
                  <p class="basic_header">PARTS PRODUCED / CYCLE</p>
                </div>
                <div class="col-sm-1 p3 paddingm">
                  <p class="basic_right">PART PRICE</p>
                </div>
                <div class="col-sm-1 p3 paddingm">
                  <p class="basic_header">STATUS</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="justify-content: center;">
                  <p class="basic_header">ACTION</p>
                </div>
            </div>
        </div>
        <div class="contentTool contentContainer paddingm" >
        <?php

        // $control = $this->data['access'][0]['settings_part'];
        // $control_display = " ";
        // if ($control < 2) {
        //     $control_display = "none";
        //     // code...
        // }else{
        //     $control_display = "inline";
        // }
                    if($this->data['settings_tools'] != null)
                    {
                        foreach ($this->data['settings_tools'] as $row) {
                            // $datetime = explode(" ",$row['Last_Updated_By']);
                            // $date = $datetime[0];
                            $img = base_url('assets/img/pencil.png');
                            $imgdel = base_url('assets/img/delete.png');
                            $imginfo = base_url('assets/img/info.png');
                            $imgact = base_url('assets/img/activate.png');
                            if ($row->status == 1) {
                                echo('
                                    <div id="settings_div">
                                        <div class="row paddingm">
                                            <div class="col col-sm-1 marleft" ><p>'.$row->part_id.'</p></div>
                                            <div class="col col-sm-2 marleft " ><p title='.$row->part_name.'>'.$row->part_name.'</p></div>        
                                            <div class="col col-sm-2 marleft" >
                                                <p title="'.$row->tool_id.'">'.$row->tool_name.'</p>
                                            </div>
                                            <div class="col col-sm-2 marleft" >
                                                <p>'.$row->NICT.'s</p>
                                            </div>
                                            <div class="col col-sm-2 marleft" ><p>'.$row->part_produced_cycle.'</p></div>
                                            <div class="col col-sm-1 marright" >
                                                <p><i class="fa fa-inr" style="margin-right:5px;"></i>'.number_format((float)$row->part_price, 2, '.', '').'</p>
                                            </div>
                                            <div class="col col-sm-1 marleft settings_active" ><p style="color: #005CBC"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px; color:#005CBC;"></i>Active</p></div>
                                            <div class="col col-sm-1 d-flex justify-content-center fasdiv">
                                                <ul class="edit-menu">
                                                    <li class="d-flex justify-content-center">
                                                        <a href="javascript;;">
                                                            <i  class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>
                                                        </a>
                                                        <ul class="edit-subMenu">
                                                            <li class="edit-opt info-tool1" lvalue="'.$row->part_id.'"><a href="#"><img src="'.$imginfo.'" class="img_font_wh2" style="margin-left:10px;">INFO</a></li>
                                                            <li class="edit-opt edit-tool menu-font-change text-right" lvalue="'.$row->part_id.'"><a href="#"><img src="'.$img.'" class="img_font_wh" style="margin-left:10px;">EDIT</a></li>
                                                            <li class="deactivate-tool " lvalue="'.$row->part_id.'" svalue="'.$row->status.'" ><a href="#"><img  src="'.$imgdel.'" class="img_font_wh1" style="margin-left:10px;">DEACTIVATE</a></li>
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
                                    <div id="settings_div">
                                        <div class="row paddingm">
                                            <div class="col col-sm-1 marleft" ><p>'.$row->part_id.'</p></div>
                                            <div class="col col-sm-2 marleft" ><p title='.$row->part_name.'>'.$row->part_name.'</p></div>        
                                            <div class="col col-sm-2 marleft" >
                                                <p title="'.$row->tool_id.'">'.$row->tool_name.'</p>
                                            </div>
                                            <div class="col col-sm-2 marleft" >
                                                <p>'.$row->NICT.'s</p>
                                            </div> 
                                            <div class="col col-sm-2 marleft" ><p>'.$row->part_produced_cycle.'</p></div>
                                            <div class="col col-sm-1 marright" >
                                                <p><i class="fa fa-inr" style="margin-right:5px;"></i>'.number_format((float)$row->part_price, 2, '.', '').'</p>
                                            </div>
                                            <div class="col col-sm-1 marleft settings_active" style="color:#C00000;"><p style="color: #C00000"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>
                                            <div class="col col-sm-1 d-flex justify-content-center fasdiv">
                                                <ul class="edit-menu">
                                                    <li class="d-flex justify-content-center">
                                                        <a href="#">
                                                            <i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>
                                                        </a>
                                                        <ul class="edit-subMenu ">
                                                            <li class="edit-opt info-tool" lvalue="'.$row->part_id.'"><a href="#"><img src="'.$imginfo.'" class="img_font_wh2" style="margin-left:10px;">INFO</a></li>
                                                            <li class="activate-tool active_not" lvalue="'.$row->part_id.'" svalue="'.$row->status.'"><a href="#" ><img src="'.$imgact.'" class="img_font_wh2" style="margin-left:10px;"></i>ACTIVATE</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>                
                                            </div>
                                            
                                        </div>
                                    </div>
                                ');
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
<div>

<div class="modal fade rounded" id="AddPartModal" tabindex="-1" aria-labelledby="AddPartModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="AddPartModal1" style="">ADD PART DETAILS</p>
            </div>
            <form method="post" class="addToolForm" id="AddPartFormSub" action="<?= base_url('Settings_controller/addTool/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputPartName" name="inputPartName"><label for="inputPartName" class="input-padding">Part Name</label>
                                <span class="paddingm float-start validate" id="inputPartNameErr"></span> 
                                <span class="float-end charCount" id="inputPartNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight_modal" name="inputToolName" id="inputToolName">
                                </select>
                                <label for="inputToolName" class="input-padding">Tool Name</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNewToolName" name="inputNewToolName">
                                <label for="inputNewToolName" class="input-padding">New Tool Name</label>
                                <span class="paddingm float-start validate" id="inputNewToolNameErr"></span> 
                                <span class="float-end charCount" id="inputNewToolNameCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNICT" name="inputNICT">
                                <label for="inputNICT" class="input-padding">NICT (in seconds)</label>
                                <span class="paddingm float-start validate" id="inputNICTErr"></span> 
                                <span class="unit clip">S</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNoOfPartsPerCycle" name="inputNoOfPartsPerCycle">
                                <label for="inputNoOfPartsPerCycle" class="input-padding">No of Parts / Cycle</label>
                                <span class="paddingm float-start validate" id="inputNoOfPartsPerCycleErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Tool ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="tid" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control left-align font_weight_modal" id="inputPartPrice" name="inputPartPrice">
                                <label for="inputPartPrice" class="input-padding">Part Price</label>
                                <span class="paddingm float-start validate" id="inputPartPriceErr"></span> 
                                <span class="unit-input"><i class="fa fa-inr  clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputPartWeight" name="inputPartWeight">
                                <label for="inputPartWeight" class="input-padding">Part Weight (in grams)</label>
                                <span class="paddingm float-start validate" id="inputPartWeightErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control left-align font_weight_modal" id="inputMaterialPrice" name="inputMaterialPrice">
                                <label for="inputMaterialPrice" class="input-padding">Material Price (per kg)</label>
                                <span class="paddingm float-start validate" id="inputMaterialPriceErr"></span>
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputMaterialName" name="inputMaterialName">
                                <label for="inputMaterialName" class="input-padding">Material Name</label>
                                <span class="paddingm float-start validate" id="inputMaterialNameErr"></span> 
                                <span class="float-end charCount" id="inputMaterialNameCunt"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Add_Tool_Data" name="Add_Tool" value="Save" style="color: white;background: #005abc;">
                    <a class="btn fo bn " data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveToolModal" tabindex="-1" aria-labelledby="DeactiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="DeactiveToolModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
            <!-- <form method="post" class="addToolForm" action="" > -->
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this part record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-Tool" name="Edit_Tool" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>
<div class="modal fade" id="ActiveToolModal" tabindex="-1" aria-labelledby="ActiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="ActiveToolModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
            <!-- <form method="post" class="addToolForm" action="" > -->
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to activate this part record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-Tool" name="Edit_Tool" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>
<div class="modal fade" id="EditToolModal" tabindex="-1" aria-labelledby="EditToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditToolModal1" style="">EDIT PART DETAILS</p>
            </div>
            <form method="post" class="addToolForm EditMachine" action="" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label for="" class="col-form-label">Part ID</label>
                                        <p><span id="partid" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3 float-end">
                                        <label for="" class="col-form-label">Status</label>
                                        <p><span id="partstatus" style="font-weight:bold;" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="" class="form-control font_weight_modal" id="EditPartName" name="EditPartName">
                                <label for="EditPartName" class="input-padding ">Part Name</label>
                                <span class="paddingm float-start validate EditPartNameErr"></span> 
                                <span class="float-end charCount" id="EditPartNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight_modal" name="inputToolNameEdit" id="inputToolNameEdit">
                                        </select>
                                <label for="inputToolNameEdit" class="input-padding">Tool Name</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNewToolNameEdit" name="inputNewToolNameEdit">
                                <label for="inputNewToolNameEdit" class="input-padding">New Tool Name</label>
                                <span class="paddingm float-start validate" id="inputNewToolNameEditErr"></span> 
                                <span class="float-end charCount" id="inputNewToolNameEditCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="" class="form-control right-type font_weight_modal" id="EditNICT" name="EditNICT">
                                <label for="EditNICT" class="input-padding">NICT (in seconds)</label>
                                <span class="paddingm float-start validate EditNICTErr"></span> 
                                <span class="unit clip">S</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="" class="form-control right-type font_weight_modal" id="EditNoOfPartsPerCycle" name="EditNoOfPartsPerCycle">
                                <label for="EditNoOfPartsPerCycle" class="input-padding">No of Parts / Cycle</label>
                                <span class="paddingm float-start validate EditNoOfPartsPerCycleErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="fieldStyle input-box">
                                <label for="toolidedit" class="col-form-label paddingm headTitle ">Tool ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="toolidedit" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Part_Price+'" class="form-control left-align  font_weight_modal" id="EditPartPrice" name="EditPartPrice">
                                <label for="EditPartPrice" class="input-padding">Part Price</label>
                                <span class="paddingm float-start validate EditPartPriceErr"></span> 
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Part_Weight+'" class="form-control right-type font_weight_modal" id="EditPartWeight" name="EditPartWeight">
                                <label for="EditPartWeight" class="input-padding">Part Weight (in grams)</label>
                                <span class="paddingm float-start validate EditPartWeightErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Material_Price+'" class="form-control left-align font_weight_modal" id="EditMaterialPrice" name="EditMaterialPrice">
                                <label for="EditMaterialPrice" class="input-padding">Material Price (per kg)</label>
                                <span class="paddingm float-start validate EditMaterialPriceErr"></span> 
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Material_Name+'" class="form-control font_weight_modal" id="EditMaterialName" name="EditMaterialName">
                                <label for="EditMaterialName" class="input-padding">Material Name</label>
                                <span class="paddingm float-start validate EditMaterialNameErr"></span> 
                                <span class="float-end charCount" id="EditMaterialNameCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="fieldStyle input-box">
                                <label for="" class="col-form-label paddingm">Last updated by</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="last_updated_by" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-lg-4 box">
                            <div class="fieldStyle input-box">
                                <label for="" class="col-form-label paddingm">Last updated on</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id='date-time' class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditTool btn fo bn " name="EditTool" value="Save" style="color: white;background: #005abc;">Save</a>
                    <a class="btn fo bn " data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="InfoToolModal" tabindex="-1" aria-labelledby="InfoToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="InfoToolModal1" style="">INFO PART</p>
            </div>
            <form method="post" class="addToolForm EditMachine" action="" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipartid" class="col-form-label headTitle">Part ID</label>
                                <p><span id="Ipartid" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipartstatus" class="col-form-label headTitle">Status</label>
                                <p><span id="Ipartstatus" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipartname" class="col-form-label headTitle">Part Name</label>
                                <p><span id="Ipartname" class="font_weight_modal"></span></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Inict" class="col-form-label headTitle">NICT (in seconds)</label>
                                <p><span id="Inict" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Inop" class="col-form-label headTitle">No of Parts / Cycle</label>
                                <p><span id="Inop" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipp" class="col-form-label headTitle">Part Price</label>
                                <p><span id="Ipp" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipw" class="col-form-label headTitle">Part Weight (in grams)</label>
                                <p><span id="Ipw" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="ITN" class="col-form-label headTitle">Tool Name</label>
                                <p><span id="ITN" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Itoolid" class="col-form-label headTitle">Tool ID</label>
                                <p><span id="Itoolid" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Imname" class="col-form-label headTitle">Material Name  </label>
                                <p><span id="Imname" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Imp" class="col-form-label headTitle">Material Price (per kg)</label>
                                <p><span id="Imp" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="IUpdatedBy" class="col-form-label headTitle">Last updated by</label>
                                <p><span id="IUpdatedBy" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="IUpdatedOn" class="col-form-label headTitle">Last updated On  </label>
                                <p><span id="IUpdatedOn" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>               
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn " data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<div class="modal fade" id="filterPartModal" tabindex="-1" aria-labelledby="filterPartModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="filterPartModal1" style="">FILTER PARTS</p>
            </div>
            <form method="post" class="addToolForm" action="<?= base_url('Home/addMachine/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" >
                <div class="modal-body">
                    <div class="d-flex">
                        <p style="font-family:'Roboto', sans-serif;color:#8c8c8c;font-size:0.8rem;">Registered on</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterFrom" name="filterFrom">
                                <label for="filterFrom" class="input-padding">From Date</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterTo" name="filterTo">
                                <label for="filterTo" class="input-padding">To Date</label>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterToolName" id="filterToolName">
                                </select>
                                <label for="filterToolName" class="input-padding">Tool Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterkey" placeholder="Type Keyword" name="filterkey"> 
                                <label for="filterkey" class="input-padding">Keyword</label>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
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
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterPartPriceR" id="filterPartPriceR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterPartPriceR" class="input-padding">Part Price</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterPartPriceOp" name="filterPartPriceOp">
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterNICTR" id="filterNICTR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterNICTR" class="input-padding">NICT</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterNICTS" name="filterNICTS">
                                <label for="filterNICTS" class="input-padding">in seconds</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterMaterialPriceR" id="filterMaterialPriceR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterMaterialPriceR" class="input-padding">Material Price</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fieldStyle">
                            <div class="fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterMaterialPriceOp" name="filterMaterialPriceOp">
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterMaterialName" id="filterMaterialName"></select>
                                <label for="filterMaterialName" class="input-padding">Material Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterLastUpdatedBy" id="filterLastUpdatedBy"></select>
                                <label for="filterSiteName" class="input-padding">Last updated by</label>
                            </div>
                        </div>    
                    </div>                 
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="Add_FilterPart btn fo bn" name="" value="Apply" style="color: white;background: #005abc;">Apply</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url()?>/assets/js/settings_tool_work.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/common.js"></script>
 --><script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/common1.js"></script>
<script type="text/javascript">

     var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
     var UserRoleRef ="<?php echo($this->data['user_details'][0]['role'])?>";

    // var UserNameRef = "manikanmani2000@gmail.com";
    // var UserRoleRef = "Smart Admin";
    // add part modal for modal open then input fields empty after reclick
    $(document).on('click','#add_part_modal',function(){

        $('#AddPartFormSub')[0].reset();
        $('#AddPartModal').modal('show');

    });

    $('.Add_Tool_Data').on('click',function(){
        $("#AddPartFormSub").submit(false);
        var a = inputPartName();
        var b =inputNICT();
        var c =inputNoOfPartsPerCycle();
        var d = inputPartPrice();
        var e = inputPartWeight();
        var f = inputMaterialPrice(); 
        var g = inputMaterialName(); 
        var h = inputNewToolName();

        var tool = $("#inputToolName").val();
        if (tool != "new") {
            if (a != "" || b != "" || c != "" || d != "" || e != "" || f != "" || g != "") {
                $("#inputPartNameErr").html(a);
                $("#inputNICTErr").html(b);
                $("#inputNoOfPartsPerCycleErr").html(c);
                $("#inputPartPriceErr").html(d); 
                $("#inputPartWeightErr").html(e); 
                $("#inputMaterialPriceErr").html(f); 
                $("#inputMaterialNameErr").html(g);    
            }
            else{
                document.getElementById("AddPartFormSub").submit();
            }    
        }
        else{
            if (a != "" || b != "" || c != "" || d != "" || e != "" || f != "" || g != "" || h != "") {
                $("#inputPartNameErr").html(a);
                $("#inputNICTErr").html(b);
                $("#inputNoOfPartsPerCycleErr").html(c);
                $("#inputPartPriceErr").html(d);     
                $("#inputPartWeightErr").html(e);   
                $("#inputMaterialPriceErr").html(f);  
                $("#inputMaterialNameErr").html(g);
                $("#inputNewToolNameErr").html(h);              
            }
            else{
                document.getElementById("AddPartFormSub").submit();
            }
        }
        
    });


    $(document).ready(function() {
        // var currentdate = new Date(); 
        // var datetime = currentdate.getDate() + " "
        //         + currentdate.toLocaleString('en-us', { month: 'long' })  + " " 
        //         + currentdate.getFullYear() + ", "  
        //         + currentdate.getHours() + ":"  
        //         + currentdate.getMinutes()+":"
        //         +currentdate.getSeconds()

                //var curennt_date = "<?php //echo date('Y-m-d h:i:sa'); ?>";
                //var datetime = getcurrent_date_time();
        //$('#date-time').html(datetime);

        $('.undo').click(function(){
            location.reload();
        });

        //Display Edit/Activate/Deactivate Options

        var acsCon = "<?php echo $this->data['access'][0]['settings_part']; ?>";
        //alert(acsCon);
        var display_var = " ";
        if(parseInt(acsCon) < 2){
            $('.edit-tool').css("display","none");
            $('.activate-tool').css("display","none");
            $('.deactivate-tool').css("display","none");
            //$('.info-tool').css("display","block");
            $('.info-tool1').css("display","block");
            //display_var = "none";
        }
        else{
            //display_var = "inline";
            $('.edit-tool').css("display","block");
            $('.activate-tool').css("display","block");
            $('.deactivate-tool').css("display","block");
            //$('.info-tool').css("display","none");
            $('.info-tool1').css("display","none");
        }

        //$(".edit").click(function(){
        $(document).on("click", ".edit", function(event){
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
        $(document).on("click", ".deactivate-tool", function(){
        //$(".deactivate-tool").click(function(){    
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('#DeactiveToolModal').modal('show');
            //alert();
            $('.Status-Tool').click(function(){
                // $(".Status-Machine").val("Wait....");
                // $(".Status-Machine").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/deactivateTool'); ?>",
                    type: "POST",
                    data: {
                        Part_Id : id,
                        Status_Tool: status,
                        // UserNameRef:UserNameRef
                    },
                    dataType: "json",
                    success:function(res){
                        //alert();
                        location.reload();
                        //alert("Status successfully Updated!!");
                        // $(".Status-Machine").val("Save");
                        // $(".Status-Machine").removeAttr("disabled");
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!! deactivate function");
                    }
                });
            }); 
        });
        $(document).on("click", ".activate-tool", function(){
        //$(".activate-tool").click(function(){    
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('#ActiveToolModal').modal('show');
            $('.Status-Tool').click(function(){
                // $(".Status-Machine").val("Wait....");
                // $(".Status-Machine").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/deactivateTool'); ?>",
                    type: "POST",
                    data: {
                        Part_Id : id,
                        Status_Tool: status,
                        // UserNameRef:UserNameRef
                    },
                    dataType: "json",
                    success:function(res){
                        //alert(res);
                        location.reload();
                        //alert("Status successfully Updated!!");
                        // $(".Status-Machine").val("Save");
                        // $(".Status-Machine").removeAttr("disabled");
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!!");
                    }
                });
            }); 
        });
        // add model tool dropdown
      // $(document).on('click','#inputToolName',function(){
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolName'); ?>",
                type: "POST",
                dataType: "json",
                // data:{
                //     UserNameRef:UserNameRef,
                //     UserRoleRef:UserRoleRef,
                // },
                success:function(res_Site){  
                     $('#inputToolName').empty();
                   $('#inputToolNameEdit').empty();

                    var elements = $('<option value="new">Add New Tool</option>');
                  var elements1 = $('<option value="new">Add New Tool</option>');
                    res_Site.forEach(function(item){
                        elements = elements.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                        elements1 = elements1.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                    });
                    $('#inputToolName').append(elements);
                   $('#inputToolNameEdit').append(elements1);

                    if (res_Site == null) {
                        $("#inputNewToolName").removeAttr("disabled");
                    }
                    // else{
                    //     $("#inputNewToolName").attr("disabled", true);   
                    // }
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });  
     //   });


        // edit tool dropdown
        
         $(document).on('load','#inputToolNameEdit',function(){
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolName'); ?>",
                type: "POST",
                dataType: "json",
                // data:{
                //     UserNameRef:UserNameRef,
                //     UserRoleRef:UserRoleRef,
                // },
                success:function(res_Site){   
                     $('#inputToolNameEdit').empty();
                    //var elements = $('<option value="new">Add New Tool</option>');
                    var elements1 = $('<option value="new">Add New Tool</option>');
                    res_Site.forEach(function(item){
                        //elements = elements.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                        elements1 = elements1.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                    });
                   // $('#inputToolName').append(elements1);
                    $('#inputToolNameEdit').append(elements1);

                    if (res_Site == null) {
                        $("#inputNewToolName").removeAttr("disabled");
                    }
                    // else{
                    //     $("#inputNewToolName").attr("disabled", true);   
                    // }
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });  
        });


       
        // $('#filterLastUpdatedBy').empty();
        // $.ajax({
        //     url: "<?php echo base_url('Home/getUserName'); ?>",
        //     type: "POST",
        //     dataType: "json",
        //     success:function(res_Site){
                
        //         var elements = $('<option value="all">All</option>');
        //         res_Site.forEach(function(item){
        //             elements = elements.add('<option value="'+item.Created_By+'">'+item.Created_By+'</option>');
        //         });
        //         $('#filterLastUpdatedBy').append(elements);
        //     },
        //     error:function(res){
        //         alert("Sorry!Try Agian!!");
        //     }
        // });

        // $('#filterToolName').empty();
        // $.ajax({
        //     url: "<?php echo base_url('Home/getToolName'); ?>",
        //     type: "POST",
        //     dataType: "json",
        //     data:{
        //         UserNameRef:UserNameRef,
        //         UserRoleRef:UserRoleRef,
        //     },
        //     success:function(res_Site){
                
        //         var elements = $('<option value="all">All</option>');
        //         res_Site.forEach(function(item){
        //             elements = elements.add('<option value="'+item.Tool_Name+'">'+item.Tool_Name+'</option>');
        //         });
        //         $('#filterToolName').append(elements);
        //     },
        //     error:function(res){
        //         alert("Sorry!Try Agian!!");
        //     }
        // });

        // $('#filterMaterialName').empty();
        // $.ajax({
        //     url: "<?php echo base_url('Home/getMaterialName'); ?>",
        //     type: "POST",
        //     dataType: "json",
        //     success:function(res_Site){
                
        //         var elements = $('<option value="all">All</option>');
        //         res_Site.forEach(function(item){
        //             elements = elements.add('<option value="'+item.Material_Name+'">'+item.Material_Name+'</option>');
        //         });
        //         $('#filterMaterialName').append(elements);
        //     },
        //     error:function(res){
        //         alert("Sorry!Try Agian!!");
        //     }
        // });
        //$("#inputNewToolName").attr("disabled", true);
        $('#inputToolName').on('change', function() {
            
            if( this.value == 'new'){
                $("#inputNewToolName").removeAttr("disabled");
                $('#tid').empty();
            }
            else{
               // $('#inputNewToolName').attr('value','');
               document.getElementById('inputNewToolName').value = " ";
                $('#inputNewToolNameErr').html("");
                $('#inputNewToolNameCunt').html('0 /'+'100');
                $("#inputNewToolName").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/getTool'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        TId : this.value
                    },
                    success:function(res_Tool){
                        //alert(res_Tool[0].Tool_ID);
                        $('#tid').html(
                            res_Tool[0].tool_id
                        );
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!! this");
                    }
                });
            }
        });

        // activate tool
         $(document).on("click", ".info-tool1", function(){
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolData'); ?>",
                type: "POST",
                data: {
                    Pid : id
                },
                dataType: "json",
                success:function(res_csp){
                    console.log(res_csp);
                    var date_time = getdate_time(res_csp['tool'][0].last_updated_on);
                    $('#Ipartid').html(
                        res_csp['tool'][0].part_id
                    );
                    if (res_csp['tool'][0].status == 1) {
                        $('#Ipartstatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#Ipartstatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#Ipartname').html(
                        res_csp['tool'][0].part_name
                    );
                    $('#Inict').html(
                        res_csp['tool'][0].NICT
                    );
                    $('#Inop').html(
                        res_csp['tool'][0].part_produced_cycle
                    );
                    $('#Ipp').html(
                        (Math.round(res_csp['tool'][0].part_price * 100) / 100).toFixed(2)
                    );
                    $('#Ipw').html(
                        res_csp['tool'][0].part_weight
                    );
                    $('#ITN').html(
                        res_csp["tool"][0].tool_name
                    );
                    $('#Itoolid').html(
                        res_csp['tool'][0].tool_id
                    );
                    $('#Imname').html(
                        res_csp['tool'][0].material_name
                    );
                    $('#Imp').html(
                         (Math.round(res_csp['tool'][0].material_price * 100) / 100).toFixed(2)
                    );
                    $('#IUpdatedBy').html(
                        res_csp['last_updated_by'][0].first_name + " "+ res_csp['last_updated_by'][0].last_name   
                    );
                    $('#IUpdatedOn').html(date_time);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#InfoToolModal').modal('show');
        });


         // deactivate info tool
        $(document).on("click", ".info-tool", function(){
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolData'); ?>",
                type: "POST",
                data: {
                    Pid : id
                },
                dataType: "json",
                success:function(res_csp){
                    console.log(res_csp);
                    var date_time = getdate_time(res_csp['tool'][0].last_updated_on);
                    $('#Ipartid').html(
                        res_csp['tool'][0].part_id
                    );
                    if (res_csp['tool'][0].status == 1) {
                        $('#Ipartstatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#Ipartstatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#Ipartname').html(
                        res_csp['tool'][0].part_name
                    );
                    $('#Inict').html(
                        res_csp['tool'][0].NICT
                    );
                    $('#Inop').html(
                        res_csp['tool'][0].part_produced_cycle
                    );
                    $('#Ipp').html(
                        (Math.round(res_csp['tool'][0].part_price * 100) / 100).toFixed(2)
                    );
                    $('#Ipw').html(
                        res_csp['tool'][0].part_weight
                    );
                    $('#ITN').html(
                        res_csp["tool"][0].tool_name
                    );
                    $('#Itoolid').html(
                        res_csp['tool'][0].tool_id
                    );
                    $('#Imname').html(
                        res_csp['tool'][0].material_name
                    );
                    $('#Imp').html(
                        (Math.round(res_csp['tool'][0].material_price * 100) / 100).toFixed(2)
                    );
                    $('#IUpdatedBy').html(
                        res_csp['last_updated_by'][0].first_name + " "+ res_csp['last_updated_by'][0].last_name   
                    );
                    $('#IUpdatedOn').html(date_time);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#InfoToolModal').modal('show');
        });
        $(document).on("click", ".edit-tool", function(){
        //$(".edit-tool").click(function(){    
            var id = $(this).attr("lvalue");
            //var status = $(this).attr("svalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolData'); ?>",
                type: "POST",
                data: {
                    Pid : id
                },
                dataType: "json",
                success:function(res_csp){
                    //alert(res_csp);
                    $('#partid').html(
                        res_csp['tool'][0].part_id
                    );
                    if (res_csp['tool'][0].status == 1) {
                        $('#partstatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#partstatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#EditPartName').val(res_csp['tool'][0].part_name);
                    $('#EditNICT').val(res_csp['tool'][0].NICT);
                    $('#EditNoOfPartsPerCycle').val(res_csp['tool'][0].part_produced_cycle);
                    $('#EditPartPrice').val(res_csp['tool'][0].part_price);
                    $('#EditPartWeight').val(res_csp['tool'][0].part_weight);
                    $('#EditMaterialPrice').val(res_csp['tool'][0].material_price);
                    $('#EditMaterialName').val(res_csp['tool'][0].material_name);
                    $('#toolidedit').html(
                        res_csp['tool'][0].tool_id
                    );
                    var date_time_edit = getdate_time(res_csp['tool'][0].last_updated_on);
                    $('#date-time').html(date_time_edit);
                    $('#last_updated_by').html(res_csp['last_updated_by'][0].first_name+ " "+ res_csp['last_updated_by'][0].last_name);
                    $('#inputToolNameEdit').empty();
                    $.ajax({
                        url: "<?php echo base_url('Settings_controller/getToolName'); ?>",
                        type: "POST",
                        dataType: "json",
                        // data:{
                        //     UserNameRef:UserNameRef,
                        //     UserRoleRef:UserRoleRef,
                        // },
                        success:function(res_Tool){
                            var elements = $('<option value="new">Add New</option>');
                           // $('#inputToolNameEdit').append('<option selected="true" disabled>Select </option>');
                            res_Tool.forEach(function(item){
                                //console.log(item);
                                console.log();
                                if (res_csp['tool'][0].tool_id== item.tool_id) {
                                    elements = elements.add('<option value="'+item.tool_id+'" selected="true">'+item.tool_name+' -'+item.tool_id+'</option>');
                                }
                                else{
                                    elements = elements.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                                }
                            });
                            $('#inputToolNameEdit').append(elements);

                           // document.getElementById('inputToolNameEdit').value = ;
                        },
                        error:function(res){
                            alert("Sorry!Try Agian!!");
                        }
                    });



                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            $('#inputNewToolNameEdit').attr("disabled",true);
            $('#EditToolModal').modal('show');
            $(document).on("click", ".EditTool", function(){
                var a = EditPartName();
                var b =EditNICT();
                var c =EditNoOfPartsPerCycle();
                var d = EditPartPrice();
                var e = EditPartWeight();
                var f = EditMaterialPrice(); 
                var g = EditMaterialName(); 
                var h = inputNewToolNameEdit();

                var tool = $("#inputToolNameEdit").val();
                // alert(tool);
                if (tool != "new") {
                    if (a != "" || b != "" || c != "" || d != "" || e != "" || f !="" || g != "") {
                        $("#EditPartNameErr").html(a);
                        $("#EditNICTErr").html(b);
                        $("#EditNoOfPartsPerCycleErr").html(c);
                        $("#EditPartPriceErr").html(d); 
                        $("#EditPartWeightErr").html(e); 
                        $("#EditMaterialPriceErr").html(f); 
                        $("#EditMaterialNameErr").html(g);    
                    }
                    else{
                        //alert(a+b+c+d+e+g);
                        var  VEditPartName = $('#EditPartName').val();
                        var  VEditNICT = $('#EditNICT').val();
                        var  VEditNoOfPartsPerCycle = $('#EditNoOfPartsPerCycle').val();
                        var  VEditPartPrice = $('#EditPartPrice').val();
                        var  VEditPartWeight = $('#EditPartWeight').val();
                        var  VEditMaterialPrice = $('#EditMaterialPrice').val();
                        var  VEditMaterialName = $('#EditMaterialName').val();
                        var  VinputToolNameEdit = $('#inputToolNameEdit').val();
                        // var  VinputNewToolNameEdit = $('#inputNewToolNameEdit').val();
                        $.ajax({
                            url: "<?php echo base_url('Settings_controller/editToolData'); ?>",
                            type: "POST",
                            data: {
                                Part_Id : id,
                                EditPartName: VEditPartName,
                                EditNICT : VEditNICT,
                                EditNoOfPartsPerCycle: VEditNoOfPartsPerCycle,
                                EditPartPrice : VEditPartPrice,
                                EditPartWeight: VEditPartWeight,
                                EditMaterialPrice : VEditMaterialPrice,
                                EditMaterialName: VEditMaterialName,
                                inputToolNameEdit : VinputToolNameEdit,
                              // inputNewToolNameEdit : VinputNewToolNameEdit
                            },
                            dataType: "json",
                            success:function(res){
                                // alert(res);
                                 //console.log(res);
                                location.reload();
                                // alert("Data has been updated successfully!");
                            },
                            error:function(res){
                                // console.log(res.responseText);
                                alert("Sorry!Try Agian!!");
                            }
                        });
                    }    
                }
                else{
                    // alert();
                    if (a != "" || b != "" || c != "" || d != "" || e != "" || f != "" || g != "" || h !="") {
                        $("#EditPartNameErr").html(a);
                        $("#EditNICTErr").html(b);
                        $("#EditNoOfPartsPerCycleErr").html(c);
                        $("#EditPartPriceErr").html(d);     
                        $("#EditPartWeightErr").html(e);   
                        $("#EditMaterialPriceErr").html(f);  
                        $("#EditMaterialNameErr").html(g);
                        $("#inputNewToolNameEditErr").html(h);              
                    }
                    else{

                        var  VEditPartName = $('#EditPartName').val();
                        var  VEditNICT = $('#EditNICT').val();
                        var  VEditNoOfPartsPerCycle = $('#EditNoOfPartsPerCycle').val();
                        var  VEditPartPrice = $('#EditPartPrice').val();
                        var  VEditPartWeight = $('#EditPartWeight').val();
                        var  VEditMaterialPrice = $('#EditMaterialPrice').val();
                        var  VEditMaterialName = $('#EditMaterialName').val();
                        var  VinputToolNameEdit = $('#inputToolNameEdit').val();
                        var  VinputNewToolNameEdit = $('#inputNewToolNameEdit').val();

                        if (VinputNewToolNameEdit == "") {
                            $('.inputNewToolNameEditErr').html('Empty Tool');
                            $('.EditTool').attr("disabled",true);
                        }
                        else{
                            // alert("VinputToolNameEdit");
                            //alert(VinputNewToolNameEdit);
                            $.ajax({
                                url: "<?php echo base_url('Settings_controller/add_tool_edit_part'); ?>",
                                type: "POST",
                                data: {
                                    Part_Id : id,
                                    EditPartName: VEditPartName,
                                    EditNICT : VEditNICT,
                                    EditNoOfPartsPerCycle: VEditNoOfPartsPerCycle,
                                    EditPartPrice : VEditPartPrice,
                                    EditPartWeight: VEditPartWeight,
                                    EditMaterialPrice : VEditMaterialPrice,
                                    EditMaterialName: VEditMaterialName,
                                    inputToolNameEdit : VinputToolNameEdit,
                                    inputNewToolNameEdit : VinputNewToolNameEdit
                                },
                                dataType: "json",
                                success:function(res){
                                   //alert(res);
                                   location.reload();
                                    // alert("Data has been updated successfully!");
                                },
                                error:function(res){
                                    // console.log(res.responseText);
                                    alert("Sorry!Try Agianedit new part!!");
                                }
                            });
                            //document.getElementById("AddPartFormSub").submit();
                        }
                    }
                }

                
            }); 
        });
        $("#inputNewToolNameEdit").attr("disabled", true);

        $('#inputToolNameEdit').on('change', function() {

            if( this.value == 'new'){
                //alert(this.value);
              
                $("#inputNewToolNameEdit").removeAttr("disabled");
                $('#toolidedit').empty();
            }
            else{
                document.getElementById('inputNewToolNameEdit').value = " ";
                $('#inputNewToolNameEditErr').html("");
                $('#inputNewToolNameEditCunt').html('0 /'+'100');

                $("#inputNewToolNameEdit").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/getTool'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        TId : this.value
                    },
                    success:function(res_tool){
                        $('#toolidedit').html(
                            res_tool[0].tool_id
                        );
                    },
                    error:function(res){
                        alert("Sorry!Try Agian!!");
                    }
                });
            }
        });

        // $('#inputToolNameEdit').on('blur', function() {
        //     document.getElementById("inputNewToolNameEdit").setAttribute('value',' ');
        //         $('#inputNewToolNameEditErr').html();

        // });
        $.ajax({
            url: "<?php echo base_url('Settings_controller/aIaTool'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                var len = res.InActive.toString().length;
                var len1 = res.Active.toString().length;
                if (parseInt(len) > 1) {
                     $('#IActive').html(res.InActive);
                }else{
                    $('#IActive').html('0'+res.InActive);
                }

                if (parseInt(len1) > 1) {
                     $('#active').html(res.Active);
                }else{
                    $('#active').html('0'+res.Active);
                }
                // $('#IActive').html(res.InActive);
                // $('#active').html(res.Active);
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });
        /*
        temporary hide for filter function
        $(document).on("click", ".Add_FilterPart", function(){
        //$('.Add_FilterPart').click(function(){
            var  FromDate = $('#filterFrom').val();
            var  ToDate = $('#filterTo').val();
            var  FilterPartPriceR = $('#filterPartPriceR').val();
            var  FilterPartPriceOp = $('#filterPartPriceOp').val();
            var  FilterMaterialPriceR = $('#filterMaterialPriceR').val();
            var  FilterMaterialPriceOp = $('#filterMaterialPriceOp').val();
            var  Status = $('#filterStatus').val();
            var  LastUpdatedBy = $('#filterLastUpdatedBy').val();
            var  FilterToolName = $('#filterToolName').val();
            var  FilterNICTR = $('#filterNICTR').val();
            var  FilterNICTS = $('#filterNICTS').val();
            var  FilterMaterialName = $('#filterMaterialName').val();
            $.ajax({
                url: "<?php echo base_url('Home/getFilterDataPart'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    FromDate : FromDate,
                    ToDate : ToDate,
                    FilterPartPriceR : FilterPartPriceR,
                    FilterPartPriceOp : FilterPartPriceOp,
                    FilterMaterialPriceR : FilterMaterialPriceR,
                    FilterMaterialPriceOp : FilterMaterialPriceOp,
                    Status : Status,
                    LastUpdatedBy : LastUpdatedBy,
                    FilterToolName:FilterToolName,
                    FilterNICTR:FilterNICTR,
                    FilterNICTS:FilterNICTS,
                    FilterMaterialName:FilterMaterialName
                },
                success:function(res_filter){
                    //alert(res_filter);
                    $('.contentTool').empty();
                    $('#filterPartModal').modal('hide');
                    if (jQuery.isEmptyObject(res_filter)){
                        $('.contentTool').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                        res_filter.forEach(function(item){
                                var elements = $();
                            if (item.Status == 1) {
                                    active = active+1;
                                elements = elements.add('<div id="settings_div">'
                                        +'<div class="row paddingm">'
                                            +'<div class="col col-sm-1 marleft" ><p>'+item.Part_Id+'</p></div>'
                                            +'<div class="col col-sm-2 marleft" ><p>'+item.Part_Name+'</p></div>'        
                                            +'<div class="col col-sm-2 marleft" >'
                                                +'<p ></p>'
                                            +'</div>'
                                            +'<div class="col col-sm-2 marleft" >'
                                                +'<p>'+item.NICT+'s</p>'
                                            +'</div>'
                                            +'<div class="col col-sm-2 marleft" ><p>'+item.Part_Produced_Cycle+'</p></div>'
                                            +'<div class="col col-sm-1 marleft" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Part_Price+'</p>'
                                            +'</div>'
                                            +'<div class="col col-sm-1 marleft settings_active" style="color:#004795;"><p style="color: #004795"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                            +'<div class="col col-sm-1 d-flex justify-content-center fasdiv">'
                                                +'<ul class="edit-menu">'
                                                    +'<li class="d-flex justify-content-center">'
                                                        +'<a href="#">'
                                                            +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
                                                        +'</a>'
                                                        +'<ul class="edit-subMenu">'
                                                            +'<li class="edit-opt info-tool" lvalue="'+item.Part_Id+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                            +'<li class="edit-opt edit-tool" lvalue="'+item.Part_Id+'" style="display:'+display_var+'"><a href="#"><i class="fa fa-pencil" style="margin-left:10px;"></i>EDIT</a></li>'
                                                            +'<li class="deactivate-tool" lvalue="'+item.Part_Id+'" svalue="'+item.Status+'" style="display:'+display_var+'"><a href="#"><i class="fa fa-trash" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                        +'</ul>'
                                                    +'</li>'
                                                +'</ul>'                
                                            +'</div>'
                                        +'</div>'
                                    +'</div>');
                                $('.contentTool').append(elements);
                            }
                            else{
                                inactive = inactive+1;
                                //alert(item.Status);
                                elements = elements.add('<div id="settings_div">'
                                        +'<div class="row paddingm">'
                                            +'<div class="col col-sm-1 marleft" ><p>'+item.Part_Id+'</p></div>'
                                            +'<div class="col col-sm-2 marleft" ><p>'+item.Part_Name+'</p></div>'        
                                            +'<div class="col col-sm-2 marleft" >'
                                                +'<p>'+item.Tool_Name+'</p>'
                                            +'</div>'
                                            +'<div class="col col-sm-2 marleft" >'
                                                +'<p>'+item.NICT+'s</p>'
                                            +'</div>'
                                            +'<div class="col col-sm-2 marleft" ><p>'+item.Part_Produced_Cycle+'</p></div>'
                                            +'<div class="col col-sm-1 marleft" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Part_Price+'</p>'
                                            +'</div>'
                                            +'<div class="col col-sm-1 marleft settings_active" style="color:#0062BC;"><p style="color: #0062BC"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
                                            +'<div class="col col-sm-1 d-flex justify-content-center fasdiv">'
                                                +'<ul class="edit-menu">'
                                                    +'<li class="d-flex justify-content-center">'
                                                        +'<a href="#">'
                                                            +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
                                                        +'</a>'
                                                        +'<ul class="edit-subMenu ">'
                                                            +'<li class="edit-opt info-tool" lvalue="'+item.Part_Id+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                            +'<li class="activate-tool" lvalue="'+item.Part_Id+'" svalue="'+item.Status+'" style="display:'+display_var+'"><a href="#"><i class="fa fa-power-off" style="margin-left:10px;"></i>ACTIVATE</a></li>'
                                                        +'</ul>'
                                                    +'</li>'
                                                +'</ul>'                
                                            +'</div>'
                                        +'</div>'
                                    +'</div>');
                                $('.contentTool').append(elements);
                            }
                        });
                    $('#IActive').empty();
                    $('#active').empty();
                    $('#IActive').html(inactive);
                    $('#active').html(active);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });*/
    });
</script>
