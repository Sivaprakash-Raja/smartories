
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
         if ((green > yellow) && (green > 85)) {
             if (green < 100) {
                 err_msg = " ";
                  $(".btn_current_shift").show();
                // $(".btn_current_shift").attr("disabled",false);
             }else{
                 err_msg = "Lesser than 100";
                  $(".btn_current_shift").hide();
                 //$(".btn_current_shift").attr("disabled",true);
                //document.getElementById("btn_current_shift").disabled = true;
             }
         }else{
             err_msg = "Greater 85 then Lesser 100";
             //$(".btn_current_shift").attr("disabled",true);
              $(".btn_current_shift").hide();
             //document.getElementById("btn_current_shift").disabled = true;
         }
     }else{
         err_msg = "Invalid Data**";
        // $(".btn_current_shift").attr("disabled",true);
         $(".btn_current_shift").hide();
         //document.getElementById("btn_current_shift").disabled = true;
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
         if ((yellow < 80) && (yellow > 65) && (yellow <green)) {
             if (yellow < 100) {

                 err_msg = " ";
                 $(".btn_current_shift").attr("disabled",false);
                // $(".btn_current_shift").show();
             }else{
                 err_msg = "Lesser than 100";
                 $(".btn_current_shift").hide();
             }
         }else{
             err_msg = "Lesser 80 and greater 65";
             $(".btn_current_shift").hide();
         }
            
     } else{
         err_msg = "Invalid data***";
         $(".btn_current_shift").hide();
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
         if (target < 100) {
             err_msg = " ";
            // $(".btn_current_shift").attr("disabled",false);
             $(".btn_current_shift").show();
         }else{
             err_msg = "Lesser than 100";
            // $(".btn_current_shift").attr("disabled",true);
              $(".btn_current_shift").hide();
         }
     } else{
         err_msg = "Invalid data***";
         //$(".btn_current_shift").attr("disabled",true);
          $(".btn_current_shift").hide();
     }
     $('.add_target_data').html(err_msg); 
});