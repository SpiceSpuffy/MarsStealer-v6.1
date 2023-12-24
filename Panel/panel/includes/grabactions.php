<?php 

require_once '../../db.php';

if(isset($_POST['func']))
{
	switch (trim($_POST['func'])) {
	case "grabdelete":
		grabdelete();
		break;
	case "grabactive":
		grabactive();
		break;
	}
}

//////////////////////
if(isset($_POST['nameField']))
{
	grabadd();
}

function grabadd(){
if ($name = R::findOne('grabrule', 'name = ?', [trim($_POST['nameField'])])){
	echo $result = json_encode("name already exists");
}
else{

$grabRule = R::dispense('grabrule');

$grabRule->name = trim($_POST['nameField']);
$grabRule->max_size = intval($_POST['maxSizeField']);
$grabRule->path = trim($_POST['pathField']);
$grabRule->formats = trim($_POST['formatsField']);

if ($_POST['blacklistField'] == "")
{
	$grabRule->blacklist = "0";
}
else $grabRule->blacklist = trim($_POST['blacklistField']);
if ($_POST['compressCheck'] == "on")
{
	$grabRule->compress = 1;
}

if ($_POST['recursivelyCheck'] == "on")
{
	$grabRule->recursively = 1;
}
else $grabRule->recursively = 0;
if ($_POST['compressCheck'] == "on")
{
	$grabRule->compress = 1;
}
else $grabRule->compress = 0;
$grabRule->is_active = true;
$grabRule->id_user = $_SESSION['logged_user']->id;

R::store($grabRule);

header("Location: /".$GLOBALS['panel_folder']."/grab.php");
exit(0);
}
};

//////////////////////

function grabdelete(){
	$grabRule = R::load('grabrule',$_POST['id']);
	R::trash($grabRule);
	echo $result = json_encode('deleted');
};

//////////////////////

function grabactive(){
	$grabRule = R::load('grabrule',$_POST['id']);
	$grabRule->is_active = (boolean)json_decode(strtolower($_POST['check'])); 
	R::store($grabRule);
	echo $result = json_encode($grabRule->is_active);	
}


?>
											