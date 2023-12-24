/////////////////Add rule in db from form and out on page

$(document).ready(function() 
{
/////////////////Delete rule
	
	$("body").on("click", "#clearDB", function () {
		$rule = $(this);
		var id = $rule.parent().parent().attr('id');
		
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'clearDB'},
			dataType: "json",
			success: function(result) {
				if(result = "deleted"){
					
				}				
			}					
		});	
		return false;
	});
	
/////////////////	
	
	$("body").on("click", "#dublCheckbox", function () {
		var rule = this		
		var check = rule.checked;
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'dublicate', check:check},
			dataType: "json",
			success: function(){
				if (check){
					rule.checked = true
				}else{
					rule.checked = false
				}
			}
		});
    return false;
	});

/////////////////	
	
	$("body").on("click", "#botCheckbox", function () {
		var rule = this		
		var check = rule.checked;
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'bot', check:check},
			dataType: "json",
			success: function(){
				if (check){
					rule.checked = true
				}else{
					rule.checked = false
				}
			}
		});
    return false;
	});	
	
/////////////////	
	
	$("body").on("click", ".grabCheckbox", function () {
		var rule = this;
		var check = rule.checked;
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'grabparams', check:check, param:rule.id},
			dataType: "json",
			success: function(){
				if (check){
					rule.checked = true
				}else{
					rule.checked = false
				}
			}
		});
    return false;
	});
	
/////////////////	
	
	$("body").on("click", ".logsCheckbox", function () {
		var rule = this;
		var check = rule.checked;
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'logsparams', check:check, param:rule.id},
			dataType: "json",
			success: function(){
				if (check){
					rule.checked = true
				}else{
					rule.checked = false
				}
			}
		});
    return false;
	});
	
/////////////////On click button save token

	$("body").on("click", ".btn_saveToken", function () {
		var token = $(this).parent().parent().children('textarea').val();
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'savetoken', token:token},
			dataType: "json"
		});
	});
	
/////////////////On click button save token

	$("body").on("click", ".btn_saveChatid", function () {
		var chatid = $(this).parent().parent().children('textarea').val();
		$.ajax({
			url: "includes/settingsactions.php",
			type: "POST",
			data:{func:'savechatid', chatid:chatid},
			dataType: "json"
		});
	});

});

										