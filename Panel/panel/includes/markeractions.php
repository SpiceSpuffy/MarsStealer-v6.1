<?php 

require_once '../../db.php';


switch (trim($_POST['func'])) {
	case "markeradd":
		markeradd();
		break;
	case "markerdelete":
		markerdelete();
		break;
	case "markeractive":
		markeractive();
		break;
}

//////////////////////

function markeradd(){
if ($name = R::findOne('markerrule', 'name = ?', [trim($_POST['name'])])){
	echo $result = json_encode("name already exists");
}
else{

$markerRule = R::dispense('markerrule');

$markerRule->name = trim($_POST['name']);
$markerRule->marker = trim($_POST['marker']);
$markerRule->color = trim($_POST['color']);
$markerRule->is_active = true;
$markerRule->id_user = $_SESSION['logged_user']->id;

R::store($markerRule);

echo $result = json_encode(R::findLast('markerrule'));}
};

//////////////////////

function markerdelete(){
	$markerRule = R::load('markerrule',$_POST['id']);
	R::trash($markerRule);
	echo $result = json_encode('deleted');
};

//////////////////////

function markeractive(){
	$markerRule = R::load('markerrule',$_POST['id']);
	$markerRule->is_active = (boolean)json_decode(strtolower($_POST['check'])); 
	R::store($markerRule);
	echo $result = json_encode($markerRule->is_active);	
}



?>
											