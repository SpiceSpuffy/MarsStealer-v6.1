<?php
function markerload(){


$rows_rules = R::findAll('markerrule');
foreach ($rows_rules as $rule){
	$check = '';
	if ($rule["is_active"]== "1"){
		$check = 'checked="checked"';
	}
	echo ('<tr id='.$rule["id"].'>'.
                                    '<td>'.$rule["name"].'</td>'.
                                    '<td style="color: ' .$rule["color"]. '; max-width:6rem;">'.$rule["marker"].'</td>'.
                                    '<td><button type="submit" class="btn btn_deleteRules btn-sm btn-block btn-outline-info">Delete</button></td>'.
                                    '<td>'.
                                        '<div class="custom-control custom-checkbox">'.
                                            '<input type="checkbox" class="checkbox_isActive custom-control-input" id="customCheck'.$rule["id"].'" '.$check.' data-parsley-multiple="groups" data-parsley-mincheck="2">'.
                                            '<label class="custom-control-label" for="customCheck'.$rule["id"].'"></label>'.
                                        '</div>'.
                                    '</td>'.
								'</tr>');
}
}


?>

