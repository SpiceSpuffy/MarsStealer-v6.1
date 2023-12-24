/////////////////Add rule in db from form and out on page

$(document).ready(function() 
{
/////////////////Delete rule
	
	$("body").on("click", ".btn_deleteRules", function () {
		$rule = $(this);
		var id = $rule.parent().parent().attr('id');
		
		$.ajax({
			url: "includes/grabactions.php",
			type: "POST",
			data:{func:'grabdelete', id:id},
			dataType: "json",
			success: function(result) {
				if(result = "deleted"){
					$rule.parent().parent().remove();
					// begin::Alert
					setTimeout(function() {
						toastr.warning('Grab rules delete!');
					}, 100);
					//end::Alert
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
			url: "includes/grabactions.php",
			type: "POST",
			data:{func:'grabactive', id:id, check:check},
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

										