<?php
require '../db.php';
if (!isset($_SESSION['logged_user'])) {
	header("location: login.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
    <?php
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/marker.php") {
			echo "Marker";
		}
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/dashboard.php") {
			echo "Dashboard";
											}
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/logs.php") {
			echo "Logs";
		}
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/grab.php") {
			echo "Grab";
		}
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/loader.php") {
			echo "Loader";
		}
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/login.php") {
			echo "MARS";
		}
		if ($_SERVER['REQUEST_URI'] == "/".$GLOBALS['panel_folder']."/settings.php") {
			echo "Settings";
		}
	?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="icon.ico">

    <!-- App css -->
    <link href="assets/css/bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/dropify.min.css" rel="stylesheet">

</head>

<body class="dark-sidenav">
    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
            <a href="dashboard.php" class="logo" style="color:#EDEDED ; font-size: 16pt;">
                MARS
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Main</li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i data-feather="home" class="align-self-center menu-icon"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logs.php">
                        <i data-feather="align-left" class="align-self-center menu-icon"></i>
                        Logs
                    </a>
                </li>

                <hr class="hr-dashed hr-menu">
                <li class="menu-label my-2">Components & Extra</li>


                <li class="nav-item">
                    <a class="nav-link" href="marker.php">
                        <i data-feather="edit" class="align-self-center menu-icon"></i>
                        Marker Rules
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="grab.php">
                        <i data-feather="file-text" class="align-self-center menu-icon"></i>
                        Grab Rules
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="loader.php">
                        <i data-feather="check-circle" class="align-self-center menu-icon"></i>
                        Loader Rules
                    </a>
                </li>
				
				<hr class="hr-dashed hr-menu">
                <li class="menu-label my-2">Account</li>
				
				<li class="nav-item">
                    <a class="nav-link" href="settings.php">
                        <i data-feather="settings" class="align-self-center menu-icon"></i>
                        Settings
                    </a>
                </li>
				
                <li class="nav-item">
                    <a class="nav-link" href="./includes/logout.php">
                        <i data-feather="log-out" class="align-self-center menu-icon"></i>
                        Exit
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">

                <!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile">
                            <i data-feather="menu" class="align-self-center topbar-icon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->