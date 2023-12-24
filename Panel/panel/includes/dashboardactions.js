$(document).ready(function() 
{

/////////////////On click button save note

	$("body").on("click", ".btn_saveNote", function () {
		var id = $(this).attr('id');
		var note = $(this).parent().parent().children('.field').children('textarea').val();
		$.ajax({
			url: "includes/dashboardactions.php",
			type: "POST",
			data:{func:'savenote', id:id, note:note},
			dataType: "json"
		});
	});
	


});

