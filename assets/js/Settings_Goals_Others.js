
/* temporary hidding for strategy
function EOTEEP(){
	var val = $("#EOTEEP").val();
	//sreturn val;
	val = parseInt(val);

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return "Overall TEEP **";
	}
	else{
		var num = /^[1-9][0-9]*$/;
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
	
}
function EOOOE(){
	var val = $("#EOOOE").val();
	val = parseInt(val);

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
}
function EOOEE(){
	var val = $("#EOOEE").val();
	val = parseInt(val);

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
}
function EAvailability(){
	var val = $("#EAvailability").val();
	val = parseInt(val);

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
}
function EPerformance(){
	var val = $("#EPerformance").val();
	val = parseInt(val);

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
}
function EQuality(){
	var val = $("#EQuality").val();
	val = parseInt(val);

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
}
function EOEE(){
	var val = $("#EOEE").val();
	val = parseInt(val);
	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return "OEE **";
	}
	else{
		var num = /^([1-9]{1,2}|100)$/;
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

*/

function Update_DThreshold(){
	var val = $("#Update_DThreshold").val();
	if (!val) {
		$(".Update_DT").attr("disabled", true);
		return "Downtime Threshold**";
	}
	else{
		var num = /^[1-9][0-9]*$/;
		if (num.test(val)) {
			$(".Update_DT").removeAttr("disabled");
			return "";
		}
		else{
			$(".Update_DT").attr("disabled", true);
			return "Invalid**";
		}
	}
}

$('#Update_DThreshold').on('blur',function(){
    var x =Update_DThreshold();
   $("#Update_DThresholdErr").html(x);
});



function DTName(){
	var val = $("#DTName").val();;
	if (!val) {
		$(".submit_downtime_reason").attr("disabled", true);
		return "Reason Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".submit_downtime_reason").attr("disabled", true);
			$("#DTNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".submit_downtime_reason").removeAttr("disabled");
			$("#DTNameCunt").css("display","block");
			return "";
		}
		else{
			$(".submit_downtime_reason").attr("disabled", true);
			$("#DTNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#DTName').on('blur',function(){
    var x = DTName();
   $("#DTNameErr").html(x);
});

// Charecter Count
var text_max1 = 50;
$('#DTNameCunt').html('0 / ' + text_max1+"  "+'char left');
$('#DTName').keyup(function() {
	var text_max12 = 50;
  var text_length = $('#DTName').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#DTNameCunt').html(text_remaining + ' / ' + text_max12);
	}
	else{
		$('#DTName').val($('#DTName').val().substring(0,50));
	}
});


function UDTName(){
	var val = $("#UDTName").val();;
	if (!val) {
		$(".Update_Downtime_Reason").attr("disabled", true);
		return "Reason Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".Update_Downtime_Reason").attr("disabled", true);
			$("#UDTNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".Update_Downtime_Reason").removeAttr("disabled");
			$("#UDTNameCunt").css("display","block");
			return "";
		}
		else{
			$(".Update_Downtime_Reason").attr("disabled", true);
			$("#UDTNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#UDTName').on('blur',function(){
    var x =UDTName();
   $("#UDTNameErr").html(x);
});

// Charecter Count
var text_max = 50;
$('#UDTNameCunt').html('0 / ' + text_max+"  "+'char left');
$('#UDTName').keyup(function() {
  var text_length = $('#UDTName').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#UDTNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#UDTName').val($('#UDTName').val().substring(0,50));
	}
});


function QReasonName(){
	var val = $("#QReasonName").val();;
	if (!val) {
		$(".submit_downtime_reason").attr("disabled", true);
		return "Reason Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".submit_quality_reason").attr("disabled", true);
			$("#QReasonNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".submit_quality_reason").removeAttr("disabled");
			$("#QReasonNameCunt").css("display","block");
			return "";
		}
		else{
			$(".submit_quality_reason").attr("disabled", true);
			$("#QReasonNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#QReasonName').on('blur',function(){
    var x =QReasonName();
   $("#QReasonNameErr").html(x);
});

// Charecter Count
var text_max = 50;
$('#QReasonNameCunt').html('0 / ' + text_max+" "+"char left");
$('#QReasonName').keyup(function() {
  var text_length = $('#QReasonName').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#QReasonNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#QReasonName').val($('#QReasonName').val().substring(0,50));
	}
});



function UQReasonName(){
	var val = $("#UQReasonName").val();;
	if (!val) {
		$(".submit_downtime_reason").attr("disabled", true);
		return "Reason Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".submit_qualityup_reason").attr("disabled", true);
			$("#UQReasonNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".submit_qualityup_reason").removeAttr("disabled");
			$("#UQReasonNameCunt").css("display","block");
			return "";
		}
		else{
			$(".submit_qualityup_reason").attr("disabled", true);
			$("#UQReasonNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#UQReasonName').on('blur',function(){
    var x =UQReasonName();
   $("#UQReasonNameErr").html(x);
});

// Charecter Count
var text_max = 50;
$('#UQReasonNameCunt').html('0 / ' + text_max+" "+"char left");
$('#UQReasonName').keyup(function() {
  var text_length = $('#UQReasonName').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#UQReasonNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#UQReasonName').val($('#UQReasonName').val().substring(0,50));
	}
});
