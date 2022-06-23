
function inputMachineOffRateHour(data){
	var val = data;
	if (!val) {
		//$('.Add_Machine_Data').attr()
		$(".Add_Machine_Data").attr("disabled", true);
		return "Machine OFF Rate**";
	}
	else{
		var num = /(?:\d*\.\d{1,2}|\d+)$/;
		if (parseInt(val) > 0) {
			if (num.test(val)) {
			
				$(".Add_Machine_Data").removeAttr("disabled");
				$("#inputMachineOffRateHour").val(parseFloat($("#inputMachineOffRateHour").val()).toFixed(2));
				return "";
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return "Invalid**";
	
			}	
		}else{
			$(".Add_Machine_Data").attr("disabled", true);
				return "Positive**";
		}
	
	}
}

function inputMachineName(data){
	var val = data;
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return "Machine Name**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			return "Invalid length**";
		}
		else if (val.length<=50) {
			$(".Add_Machine_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputMachineBrand(data){
	var val = data;
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return "Machine Brand**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputMachineBrandCunt").css("display","none");
			return "Invalid length**";
		}
		else if (val.length<=50) {
			$(".Add_Machine_Data").removeAttr("disabled");
			$("#inputMachineBrandCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputMachineBrandCunt").css("display","none");
			return "Invalid**";
		}
	}
}

function inputMachineRateHour(data){
	var val = data;
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return "Machine Rate**";
	}
	else{
		if (parseInt(val) > 0) {
			//var num = /^[0-9]*$/;
			var num = /(?:\d*\.\d{1,2}|\d+)$/;
			if (num.test(val)) {
				$(".Add_Machine_Data").removeAttr("disabled");
				$("#inputMachineRateHour").val(parseFloat($("#inputMachineRateHour").val()).toFixed(2));
				return "";
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return "Invalid**";
			}
		}else{
			$(".Add_Machine_Data").attr("disabled", true);
				return "Positive**";
		}
		
	}
}

function inputTonnage(data){
	var val = data;
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return "Machine Tonnage**";
	}
	else{
		var num = /^[0-9]*$/;
		if (num.test(val)) {
			$(".Add_Machine_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputNewSiteName(data){
	var val = data;
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return "Site Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputNewSiteNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".Add_Machine_Data").removeAttr("disabled");
			$("#inputNewSiteNameCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputNewSiteNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

function inputNewSiteLocation(data){
	var val = data;
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return "Site Location**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputNewSiteLocationCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".Add_Machine_Data").removeAttr("disabled");
			$("#inputNewSiteLocationCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputNewSiteLocationCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#inputMachineName').on('blur',function(){
    var x =inputMachineName($("#inputMachineName").val());
   $("#inputMachineNameErr").html(x);
});
$('#inputMachineRateHour').on('blur',function(){
	var x =inputMachineRateHour($("#inputMachineRateHour").val());
	$("#inputMachineRateHourErr").html(x);	
});

$('#inputMachineOffRateHour').on('blur',function(){
   var x =inputMachineOffRateHour($("#inputMachineOffRateHour").val());
   $("#inputMachineOffRateHourErr").html(x);
});

$('#inputTonnage').on('blur',function(){
	var x =inputTonnage($("#inputTonnage").val());
	$("#inputTonnageErr").html(x);
});

$('#inputMachineBrand').on('blur',function(){
	var x =inputMachineBrand($("#inputMachineBrand").val());
	$("#inputMachineBrandErr").html(x);
});

$('#inputNewSiteName').on('blur',function(){
	var x =inputNewSiteName($("#inputNewSiteName").val());
	$("#inputNewSiteNameErr").html(x);
});

$('#inputNewSiteLocation').on('blur',function(){
	var x =inputNewSiteLocation($("#inputNewSiteLocation").val());
	$("#inputNewSiteLocationErr").html(x);
});


// Charecter Count
var text_max = 50;
$('#inputMachineNameCunt').html('0 / ' + text_max);
$('#inputMachineName').keyup(function() {
  var text_length = $('#inputMachineName').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#inputMachineNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMachineName').val($('#inputMachineName').val().substring(0,50));
	}
});

$('#inputMachineBrandCunt').html('0 / ' + text_max);
$('#inputMachineBrand').keyup(function() {
  var text_length = $('#inputMachineBrand').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputMachineBrandCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMachineBrand').val($('#inputMachineBrand').val().substring(0,25));
	}
});

$('#inputNewSiteNameCunt').html('0 / ' + text_max);
$('#inputNewSiteName').keyup(function() {
  var text_length = $('#inputNewSiteName').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputNewSiteNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputNewSiteName').val($('#inputNewSiteName').val().substring(0,25));
	}
});

$('#inputNewSiteLocationCunt').html('0 / ' + text_max);
$('#inputNewSiteLocation').keyup(function() {
  var text_length = $('#inputNewSiteLocation').val().length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputNewSiteLocationCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputNewSiteLocation').val($('#inputNewSiteLocation').val().substring(0,25));
	}
});




//Edit Operations

function editMachineOffRateHour(data){
	var val = data;
	if (!val) {
		//$('.Add_Machine_Data').attr()
		$(".EditMachine").attr("disabled", true);
		return "Machine OFF Rate**";
	}
	else{
		var num = /(?:\d*\.\d{1,2}|\d+)$/;
		if (num.test(val)) {
			$(".EditMachine").removeAttr("disabled");
			$("#editMachineOffRateHour").val(parseFloat($("#editMachineOffRateHour").val()).toFixed(2));
			return "";

		}
		else{
			$(".EditMachine").attr("disabled", true);
			return "Invalid**";

		}
	}
}

function editMachineName(data){
	var val = data;
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return "Machine Name**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			return "Invalid length**";
		}
		else if (val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			return "";
		}
		else{
			$(".EditMachine").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function editMachineBrand(data){
	var val = data;
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return "Machine Brand**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			$("#editMachineBrandCunt").css("display","none");
			return "Invalid length**";
		}
		else if (val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			$("#editMachineBrandCunt").css("display","block");
			return "";
		}
		else{
			$(".EditMachine").attr("disabled", true);
			$("#editMachineBrandCunt").css("display","none");
			return "Invalid**";
		}
	}
}

function editMachineRateHour(data){
	var val = data;
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return "Machine Rate**";
	}
	else{
		var num = /(?:\d*\.\d{1,2}|\d+)$/;
		if (num.test(val)) {
			$(".EditMachine").removeAttr("disabled");
			$("#editMachineRateHour").val(parseFloat($("#editMachineRateHour").val()).toFixed(2));
			return "";
		}
		else{
			$(".EditMachine").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function editTonnage(data){
	var val = data;
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return "Machine Tonnage**";
	}
	else{
		var num = /^[0-9]*$/;
		if (num.test(val)) {
			$(".EditMachine").removeAttr("disabled");
			return "";
		}
		else{
			$(".EditMachine").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function editNewSiteNameEdit(data){
	var val = data;
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return "Site Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			$("#editNewSiteNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			$("#editNewSiteNameCunt").css("display","block");
			return "";
		}
		else{
			$(".EditMachine").attr("disabled", true);
			$("#editNewSiteNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

function editNewSiteLocationEdit(data){
	var val = data;
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return "Site Location**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			$("#editNewSiteLocationCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			$("#editNewSiteLocationCunt").css("display","block");
			return "";
		}
		else{
			$(".EditMachine").attr("disabled", true);
			$("#editNewSiteLocationCunt").css("display","none");
			return "Invalid**";
		}
	}
}


$('#editMachineName').on('blur',function(){
    var x =editMachineName($("#editMachineName").val());
   $("#editMachineNameErr").html(x);
});
$('#editMachineRateHour').on('blur',function(){
	var x =editMachineRateHour($("#editMachineRateHour").val());
	$("#editMachineRateHourErr").html(x);
});

$('#editMachineOffRateHour').on('blur',function(){
   var x =editMachineOffRateHour($("#editMachineOffRateHour").val());
   $("#editMachineOffRateHourErr").html(x);
});

$('#editTonnage').on('blur',function(){
	var x =editTonnage($("#editTonnage").val());
	$("#editTonnageErr").html(x);
});

$('#editMachineBrand').on('blur',function(){
	var x =editMachineBrand($("#editMachineBrand").val());
	$("#editMachineBrandErr").html(x);
});

$('#editNewSiteNameEdit').on('blur',function(){
	var x =editNewSiteNameEdit($("#editNewSiteNameEdit").val());
	$("#editNewSiteNameEditErr").html(x);
});

$('#editNewSiteLocationEdit').on('blur',function(){
	var x =editNewSiteLocationEdit($("#editNewSiteLocationEdit").val());
	$("#editNewSiteLocationEditErr").html(x);
});

//setInterval(function () {alert(x);}, 5000);

