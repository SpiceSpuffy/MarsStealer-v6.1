<?php
function grabload(){

$rows_rules = R::findAll('grabrule');
foreach ($rows_rules as $rule){
	$check = '';
	$recurs = "FALSE";
	$compress = "FALSE";
	if ($rule["is_active"]== "1"){
		$check = 'checked="checked"';
	}
	if ($rule["recursively"] == "1")
	{
		$recurs = "TRUE";
	}
	if ($rule["compress"] == "1")
	{
		$compress = "TRUE";
	}
	echo '<tr id = '.$rule["id"].'>'.
                                    '<td>'.$rule["name"].'</td>'.
                                    '<td>'.$rule["max_size"].'</td>'.
                                    '<td>'.$rule["path"].'</td>'.
                                    '<td>'.$rule["formats"].'</td>'.
									'<td>'.$rule["blacklist"].'</td>'.
                                    '<td>'.$recurs.'</td>'.
									'<td>'.$compress.'</td>'.
                                    '<td><button type="submit" class="btn btn_deleteRules btn-sm btn-block btn-outline-info">Delete</button></td>'.
                                    '<td>'.
                                        '<div class="custom-control custom-checkbox">'.
                                            '<input type="checkbox" class="checkbox_isActive custom-control-input" id="customCheck'.$rule["id"].'" '.$check.' data-parsley-multiple="groups" data-parsley-mincheck="2">'.
                                            '<label class="custom-control-label" for="customCheck'.$rule["id"].'"></label>'.
                                        '</div>'.
                                    '</td>'.
								'</tr>'
	
	
	;
}
}


?>

