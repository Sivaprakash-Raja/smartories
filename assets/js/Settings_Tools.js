function inputPartName(){
	var val = $("#inputPartName").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Part Name**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid length**";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}
function inputNICT(){
	var val = $("#inputNICT").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "NICT**";
	}
	else{
		var num = /^[0-9]*$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputNoOfPartsPerCycle(){
	var val = $("#inputNoOfPartsPerCycle").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Parts Per Cycle**";
	}
	else{
		var num = /^[1-9][0-9]*$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputPartPrice(){
	var val = $("#inputPartPrice").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Part Price**";
	}
	else{
		//var num = /(?:\d*\.\d{1,2}|\d+)$/;
		var num = /^\d+(?:\.\d{1,2})?$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputPartPrice").val(parseFloat($("#inputPartPrice").val()).toFixed(2));
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputPartWeight(){
	var val = $("#inputPartWeight").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Part Weight**";
	}
	else{
		var num = /^[0-9]*$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}


function inputMaterialPrice(){
	var val = $("#inputMaterialPrice").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Material Price**";
	}
	else{
		// var num = /(?:\d*\.\d{1,2}|\d+)$/;
		var num = /^\d+(?:\.\d{1,2})?$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputMaterialPrice").val(parseFloat($("#inputMaterialPrice").val()).toFixed(2));
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputMaterialName(){
	var val = $("#inputMaterialName").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Material Name**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			$("#inputNewToolNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputNewToolNameCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function inputNewToolName(){
	var val = $("#inputNewToolName").val();
	var tool_select = $('#inputToolName').val();
	if (!val) {
		if (tool_select != " ") {
			$(".Add_Tool_Data").attr("disabled", true);
		return "Tool Name**";
		}else{
			$(".Add_Tool_Data").attr("disabled", false);
		return " ";
		}
		
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			$("#inputNewToolNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputNewToolNameCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			$("#inputNewToolNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#inputPartName').on('blur',function(){
    var x =inputPartName();
   $("#inputPartNameErr").html(x);
});

$('#inputNICT').on('blur',function(){
    var x =inputNICT();
   $("#inputNICTErr").html(x);
});

$('#inputNoOfPartsPerCycle').on('blur',function(){
    var x =inputNoOfPartsPerCycle();
   $("#inputNoOfPartsPerCycleErr").html(x);
});

$('#inputPartPrice').on('blur',function(){
    var x =inputPartPrice();
   $("#inputPartPriceErr").html(x);
});
$('#inputPartWeight').on('blur',function(){
    var x =inputPartWeight();
   $("#inputPartWeightErr").html(x);
});

$('#inputMaterialPrice').on('blur',function(){
    var x =inputMaterialPrice();
   $("#inputMaterialPriceErr").html(x);
});

$('#inputMaterialName').on('blur',function(){
    var x =inputMaterialName();
   $("#inputMaterialNameErr").html(x);
});

$('#inputNewToolName').on('blur',function(){
    var x =inputNewToolName();
   $("#inputNewToolNameErr").html(x);
});


// Charecter Count
var text_max = 100;
$('#inputPartNameCunt').html('0 / ' + text_max);
$('#inputPartName').keyup(function() {
  var text_length = $('#inputPartName').val().length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputPartNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputPartName').val($('#inputPartName').val().substring(0,100));
	}
});

$('#inputNewToolNameCunt').html('0 / ' + text_max);
$('#inputNewToolName').keypress(function() {
  var text_length = $('#inputNewToolName').val().length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputNewToolNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputNewToolName').val($('#inputNewToolName').val().substring(0,100));
	}
});

$('#inputMaterialNameCunt').html('0 / ' + text_max);
$('#inputMaterialName').keyup(function() {
  var text_length = $('#inputMaterialName').val().length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputMaterialNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMaterialName').val($('#inputMaterialName').val().substring(0,100));
	}
});



function EditPartName(){
	var val = $("#EditPartName").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Part Name**";
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			$("#EditPartNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (letters.test(val) && val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#EditPartNameCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			$("#EditPartNameCunt").css("display","none");
			return "Invalid**";
		}
	}
}
function EditNICT(){
	var val = $("#EditNICT").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "NICT**";
	}
	else{
		var num = /^[0-9]*$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function EditNoOfPartsPerCycle(){
	var val = $("#EditNoOfPartsPerCycle").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Parts Per Cycle**";
	}
	else{
		var num = /^[1-9][0-9]*$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function EditPartPrice(){
	var val = $("#EditPartPrice").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Part Price**";
	}
	else{
		// var num = /^[0-9]*$/;
		var num = /^\d+(?:\.\d{1,2})?$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#EditPartPrice").val(parseFloat($("#EditPartPrice").val()).toFixed(2));
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function EditPartWeight(){
	var val = $("#EditPartWeight").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Part Weight**";
	}
	else{
		var num = /^[0-9]*$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}


function EditMaterialPrice(){
	var val = $("#EditMaterialPrice").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Material Price**";
	}
	else{
		// var num = /^[0-9]*$/;
		var num = /^\d+(?:\.\d{1,2})?$/;
		if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#EditMaterialPrice").val(parseFloat($("#EditMaterialPrice").val()).toFixed(2));
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid**";
		}
	}
}

function EditMaterialName(){
	var val = $("#EditMaterialName").val();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return "Material Name**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			$("#EditMaterialNameCunt").css("display","none");
			return "Invalid length**";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#EditMaterialNameCunt").css("display","block");
			return "";
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			$("#EditMaterialNameCunt").css("display","block");
			return "Invalid**";
			
		}
	}
}

function inputNewToolNameEdit(){
	var val = $("#inputNewToolNameEdit").val();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		
		return "Tool Name**";
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".EditTool").attr("disabled", true);
			$("#inputNewToolNameEditCunt").css("display","none");
			return "Invalid length**";
		}
		else if (val.length<=100) {
			$(".EditTool").removeAttr("disabled");
			$("#inputNewToolNameEditCunt").css("display","block");
			return "";
		}
		else{
			$(".EditTool").attr("disabled", true);
			$("#inputNewToolNameEditCunt").css("display","none");
			return "Invalid**";
		}
	}
}




$('#EditPartName').on('blur',function(){
    var x =EditPartName();
   	$(".EditPartNameErr").html(x);
});

$('#EditNICT').on('blur',function(){
    var x =EditNICT();
   	$(".EditNICTErr").html(x);
});

$('#EditNoOfPartsPerCycle').on('blur',function(){
    var x =EditNoOfPartsPerCycle();
   	$(".EditNoOfPartsPerCycleErr").html(x);
});

$('#EditPartPrice').on('blur',function(){
    var x =EditPartPrice();
   	$(".EditPartPriceErr").html(x);
});
$('#EditPartWeight').on('blur',function(){
    var x =EditPartWeight();
   	$(".EditPartWeightErr").html(x);
});

$('#EditMaterialPrice').on('blur',function(){
    var x =EditMaterialPrice();
   	$(".EditMaterialPriceErr").html(x);
});

$('#EditMaterialName').on('blur',function(){
    var x =EditMaterialName();
   	$(".EditMaterialNameErr").html(x);
});

$('#inputNewToolNameEdit').on('blur',function(){
    var x =inputNewToolNameEdit();
 	$("#inputNewToolNameEditErr").html(x);
});


var text_max_edit = 100;
$('#EditMaterialNameCunt').html('0 / ' + text_max_edit);
$('#EditMaterialName').keyup(function() {
  var text_length = $('#EditMaterialName').val().length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#EditMaterialNameCunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#EditMaterialName').val($('#EditMaterialName').val().substring(0,100));
	}
});

$('#EditPartNameCunt').html('0 / ' + text_max_edit);
$('#EditPartName').keyup(function() {
  var text_length = $('#EditPartName').val().length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#EditPartNameCunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#EditPartName').val($('#EditPartName').val().substring(0,100));
	}
});

$('#inputNewToolNameEditCunt').html('0 / ' + text_max_edit);
$('#inputNewToolNameEdit').keyup(function() {
  var text_length = $('#inputNewToolNameEdit').val().length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputNewToolNameEditCunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#inputNewToolNameEdit').val($('#inputNewToolNameEdit').val().substring(0,100));
	}
});



