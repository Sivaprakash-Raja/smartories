        // Fields Validation for Add User Model
        //Select role;
        $('#inputRoleAdd').on('blur',function(){
            var sname = $('#inputRoleAdd').val();
            if (sname == "null") {
                $("#validate_role").css("display","block");
                $('#validate_role').html("Site Name*");
                
            }
            else{
                $('#validate_role').html("");
            }
         });
        
        //Email Validation
        /*
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
		                // dataType:"json",
		                data:{
		                    user_name:user,
		                },
		                success:function(res){
		                	alert(res);
		                	console.log(res);

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
		*/
		function inputOpUserID(){
			var val = $("#inputOpUserID").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "User ID**";
			}
			else{
				var num = /^[1-9][0-9]*$/;
				if (num.test(val)) {
					$(".CreateUser").removeAttr("disabled");
					var id = $('#inputOpUserID').val();
		            $.ajax({
		                url: "<?php echo base_url('Home/checkOperator'); ?>",
		                type: "POST",
		                dataType: "json",
		                data: {
		                    User_ID : id
		                },
		                success:function(res){
		                    if (!res.length) {
		                        $(".CreateUser").removeAttr("disabled");
		                    }
		                    else{
		                        alert("User Exist, Try another User ID!");
		                        $(".CreateUser").attr("disabled", true);

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

		function inputUserFirstName(){
			var val = $("#inputUserFirstName").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "First Name**";
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".CreateUser").attr("disabled", true);
					$("#inputUserFirstNameCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".CreateUser").removeAttr("disabled");
					$("#inputUserFirstNameCunt").css("display","block");
					return "";
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid First Name**";
				}
			}
		}


		function inputUserLastName(){
			var val = $("#inputUserLastName").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "Last Name**";
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".CreateUser").attr("disabled", true);
					$("#inputUserLastNameCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".CreateUser").removeAttr("disabled");
					$("#inputUserLastNameCunt").css("display","block");
					return "";
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid Last Name**";
				}
			}
		}

		function inputUserPhone(){
			var val = $("#inputUserPhone").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "Phone Number**";
			}
			else{
				var letters = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val)) {
					$(".CreateUser").removeAttr("disabled");
					//$("#inputNewToolNameCunt").css("display","none");
					return "";
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid Phone Number**";
				}
			}
		}

		function inputUserDesignation(){
			var val = $("#inputUserDesignation").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "Designation**";
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 50) {
					$(".CreateUser").attr("disabled", true);
					$("#inputUserDesignationCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=50) {
					$(".CreateUser").removeAttr("disabled");
					$("#inputUserDesignationCunt").css("display","block");
					return "";
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid**";
				}
			}
		}
$('#inputUserEMail').on('blur',function(){
    var x =inputUserEMail();
   $("#inputUserEMailErr").html(x);
});

$('#inputUserFirstName').on('blur',function(){
    var x =inputUserFirstName();
   $("#inputUserFirstNameErr").html(x);
});

$('#inputUserLastName').on('blur',function(){
    var x =inputUserLastName();
   $("#inputUserLastNameErr").html(x);
});

$('#inputUserPhone').on('blur',function(){
    var x =inputUserPhone();
   $("#inputUserPhoneErr").html(x);
});
$('#inputUserDesignation').on('blur',function(){
    var x =inputUserDesignation();
   $("#inputUserDesignationErr").html(x);
});
$('#inputOpUserID').on('blur',function(){
    var x =inputOpUserID();
   $("#inputOpUserIDErr").html(x);
});

// Charecter Count
var text_max = 25;
$('#inputUserFirstNameCunt').html('0 / ' + text_max);
$('#inputUserFirstName').keyup(function() {
  var text_length = $('#inputUserFirstName').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputUserFirstNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputUserFirstName').val($('#inputUserFirstName').val().substring(0,25));
	}
});

$('#inputUserLastNameCunt').html('0 / ' + text_max);
$('#inputUserLastName').keyup(function() {
  var text_length = $('#inputUserLastName').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputUserLastNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputUserLastName').val($('#inputUserLastName').val().substring(0,25));
	}
});

var text_max_val = 50;
$('#inputUserDesignationCunt').html('0 / ' + text_max_val);
$('#inputUserDesignation').keyup(function() {
  var text_length = $('#inputUserDesignation').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#inputUserDesignationCunt').html(text_remaining + ' / ' + text_max_val);
	}
	else{
		$('#inputUserDesignation').val($('#inputUserDesignation').val().substring(0,50));
	}
});



$('#EditUserFName').on('blur',function(){
    var x =EditUserFName();
   $("#EditUserFNameErr").html(x);
});

$('#EditUserLName').on('blur',function(){
    var x =EditUserLName();
   $("#EditUserLNameErr").html(x);
});

$('#EditUserPhone').on('blur',function(){
    var x =EditUserPhone();
   $("#EditUserPhoneErr").html(x);
});
$('#EditUserDesignation').on('blur',function(){
    var x =EditUserDesignation();
   $("#EditUserDesignationErr").html(x);
});


function EditUserFName(){
			var val = $("#EditUserFName").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "First Name**";
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".EditUserData").attr("disabled", true);
					$("#inputUserFirstNameCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".EditUserData").removeAttr("disabled");
					$("#inputUserFirstNameCunt").css("display","block");
					return "";
				}
				else{
					$(".EditUserData").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid First Name**";
				}
			}
		}

		function EditUserLName(){
			var val = $("#EditUserLName").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "Last Name**";
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".EditUserData").attr("disabled", true);
					$("#inputUserLastNameCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".EditUserData").removeAttr("disabled");
					$("#inputUserLastNameCunt").css("display","block");
					return "";
				}
				else{
					$(".EditUserData").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid Last Name**";
				}
			}
		}

		function EditUserPhone(){
			var val = $("#EditUserPhone").val();
			if (!val) {
				$(".EditUserData").attr("disabled", true);
				return "Phone Number**";
			}
			else{
				var letters = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val)) {
					$(".EditUserData").removeAttr("disabled");
					//$("#inputNewToolNameCunt").css("display","none");
					return "";
				}
				else{
					$(".EditUserData").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid Phone Number**";
				}
			}
		}

		function EditUserDesignation(){
			var val = $("#EditUserDesignation").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "Designation**";
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 50) {
					$(".EditUserData").attr("disabled", true);
					$("#inputUserDesignationCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=50) {
					$(".EditUserData").removeAttr("disabled");
					$("#inputUserDesignationCunt").css("display","block");
					return "";
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid**";
				}
			}
		}


// Charecter Count
var text_max = 25;
$('#EditUserFNameCunt').html('0 / ' + text_max);
$('#EditUserFName').keyup(function() {
  var text_length = $('#EditUserFName').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#EditUserFNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#EditUserFName').val($('#EditUserFName').val().substring(0,25));
	}
});

$('#EditUserLNameCunt').html('0 / ' + text_max);
$('#EditUserLName').keyup(function() {
  var text_length = $('#EditUserLName').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#EditUserLNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#EditUserLName').val($('#EditUserLName').val().substring(0,25));
	}
});

var text_max_val = 50;
$('#EditUserDesignationCunt').html('0 / ' + text_max_val);
$('#EditUserDesignation').keyup(function() {
  var text_length = $('#EditUserDesignation').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#EditUserDesignationCunt').html(text_remaining + ' / ' + text_max_val);
	}
	else{
		$('#EditUserDesignation').val($('#EditUserDesignation').val().substring(0,50));
	}
});