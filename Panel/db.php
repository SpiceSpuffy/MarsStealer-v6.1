<?php

$dbname = "mars"; 							//Database name
$dbuser = "mars";							//Database login
$dbpwd 	= "password";							//Database password
$GLOBALS['logspath'] = "logs";				//Logs folder
$GLOBALS['domain'] = "example.com";			//Domain name for loader
$GLOBALS['panel_folder'] = "panel";			//Panel folder
$GLOBALS['password'] = '$2y$10$pPM65LEeveklYZ.h5nsGlu.7SesAtV0FmPFpSv0tuW/Bmgxgtwgd.';	//Password for login. Now: NaOLpEYru1



//Database connect
require_once $GLOBALS['panel_folder'].'/includes/rb.php';
R::setup( 'mysql:host=localhost;dbname='.$dbname, $dbuser, $dbpwd );
session_start();

?>