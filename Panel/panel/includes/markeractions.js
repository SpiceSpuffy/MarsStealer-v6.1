$(document).ready(function () {
	$("body").on("click", ".btn-addRules", function () {
		var name = $('#nameField').val();
		var marker = $('#markerField').val();
		var color = $('#example-color-input').val();
		$.ajax({
			url: "includes/markeractions.php",
			type: "POST",
			data: { func: 'markeradd', name: name, marker: marker, color: color },
			dataType: "json",
			success: function (result) {
				if (result) {
					$('#rows').append('<tr id='+result.id+'>'+
                                    '<td>'+result.name+'</td>'+
                                    '<td style="color: ' + result.color + ' ; max-width:6rem;">'+ result.marker +'</td>'+
                                    '<td><button type="submit" class="btn btn_deleteRules btn-sm btn-block btn-outline-info">Delete</button></td>'+
                                    '<td>'+
                                        '<div class="custom-control custom-checkbox">'+
                                            '<input type="checkbox" class="custom-control-input checkbox_isActive" id="customCheck'+result.id+'" checked="checked" data-parsley-multiple="groups" data-parsley-mincheck="2">'+
                                            '<label class="custom-control-label" for="customCheck'+result.id+'"></label>'+
                                        '</div>'+
                                    '</td>'+
								'</tr>');		
				}
			}
		});
		return false;
	});

	/////////////////

	$("body").on("click", ".btn_deleteRules", function () {
		$rule = $(this)
		var id = $rule.parent().parent().attr('id');
		$.ajax({
			url: "includes/markeractions.php",
			type: "POST",
			data: { func: 'markerdelete', id: id },
			dataType: "json",
			success: function (result) {
				if (result = "deleted") {
					$rule.parent().parent().remove();
					// begin::Alert
					setTimeout(function () {
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
			url: "includes/markeractions.php",
			type: "POST",
			data: { func: 'markeractive', id: id, check: check },
			dataType: "json",
			success: function () {
				if (check) {
					rule.checked = true
				} else {
					rule.checked = false
				}
			}
		});
		return false;
	});



});