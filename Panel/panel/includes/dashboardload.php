<?php

require '../../db.php';

switch (trim($_POST['func'])) {
	case "widgetprogressload":
		widgetprogressload();
		break;
	case "widgetcountriesload":
		widgetcountriesload();
		break;	
}

function widgetprogressload()
{
	
	$count_all = R::count('log');
	
	$currentDate = new DateTime(date("Y-m-d"));
	$endDate = new DateTime(date("Y-m-d"));
	$_endDate = new DateTime(date("Y-m-d"));
	$endDate->modify('-3 month');
	$_endDate->modify('-3 month');
	$i = 0;
	$months = array();
	
	while($currentDate >= $endDate) {
		$_endDate -> modify('+7 day');
		$months[date_format($endDate, "Y-m-d")] = R::count('log', 'add_date BETWEEN ? AND ?', [date_format($endDate,'Y-m-d'), date_format($_endDate,'Y-m-d')]);
		$endDate -> modify('+7 day');	
		
	}

	echo json_encode($months);
		
}


function widgetcountriesload()
{
	$zones 	= R::findAll('statistics_countries');
	$result = array();
	foreach ($zones as $zone)
	{
		if (isset($result[$zone["zone"]]))
		{
			$result[$zone["zone"]] = intval($result[$zone["zone"]])+intval($zone["count_c"]);
		}
		else
		{
			$result[$zone["zone"]] = intval($zone["count_c"]);
		}
	}
	echo json_encode($result);		
}


?>