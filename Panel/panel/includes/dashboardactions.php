<?php

	require '../../db.php';
	//////////////////////Functions switcher

	switch (trim($_POST['func'])) {
		case "savenote":
			savenote();
			break;
	}
	
	
	function savenote()
	{
		$log = R::load('log', $_POST['id']);
		$log->note = trim($_POST['note']);
		R::store($log);
		echo 'note add';
	}
	
?>
