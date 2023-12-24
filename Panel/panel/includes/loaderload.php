<?php
function loaderload(){

$rows_rules = R::findAll('loader');
foreach ($rows_rules as $loader){
	$check = '';
	if ($loader["is_active"] == "1"){
		$check = 'checked="checked"';
	}
	$wallets = 'OFF';
	if ($loader["cold_wallets"] == "1"){
		$wallets = 'ON';
	} 
	echo '<tr id="'.$loader["id"].'">
                                        <th scope="row">'.$loader["name"].'</th>
                                        <td>'.$loader["load_to"].'</td>
                                        <td>'.$loader["startup_param"].'</td>
                                        <td>'.$loader["file_path"].'</td>
                                        <td>'.$loader["pwds"].'</td>                                    
                                        <td>'.$wallets.'</td> 
										<td><button type="submit" class="btn btn_deleteRules btn-delete btn-sm btn-block btn-outline-info">Delete</button></td>			
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="checkbox_isActive custom-control-input" '.$check.' id="wallet'.$loader["name"].'" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="wallet'.$loader["name"].'"></label>
                                            </div>

                                        </td>
										

                                    </tr>';
}
}


?>
