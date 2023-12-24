
$(document).ready(function() 
{

/////////////////Delete rule
	
	$("body").on("click", ".btn_deleteRules", function () {
		$rule = $(this);
		var id = $rule.parent().parent().attr('id');
		
		$.ajax({
			url: "includes/loaderactions.php",
			type: "POST",
			data:{func:'loaderdelete', id:id},
			dataType: "json",
			success: function(result) {
				if(result = "deleted"){
					$rule.parent().parent().remove();
					// begin::Alert
				}				
			}					
		});	
		return false;
	});
	
/////////////////	
	
	$("body").on("click", ".checkbox_isActive", function () {	
		var rule = this
		var id = $(this).parent().parent().parent().attr('id');
		var check = rule.checked;
		
		$.ajax({
			url: "includes/loaderactions.php",
			type: "POST",
			data:{func:'loaderactive', id:id, check:check},
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


});
