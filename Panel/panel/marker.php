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
                            <h4 class="page-title">Marker</h4>
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
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <div class="form-group row">
                                    <label for="example-color-input" class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nameField" required="" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <label for="example-color-input" class="col-sm-3 col-form-label">Marker:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="1" id="markerField" placeholder="example.com,example2.com"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group row">
                                    <label for="example-color-input" class="col-sm-4 col-form-label">Color:</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="color" value="#a4b4d5" id="example-color-input">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-right">

                                <button type="submit" class="btn btn-addRules btn-outline-success btn-md">Add rules</button>

                            </div>

                        </div>
                        <table class="table dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 180px;">Name</th>
                                    <th>Marker</th>
                                    <th style="width: 120px;" class="text-center">Actions</th>
                                    <th style="width: 80px;">Is active</th>
                                </tr>
                            </thead>


                            <tbody id="rows">
                                <?php
                                require_once 'includes/markerload.php';
                                markerload();
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
<script src="includes/markeractions.js"></script>

</body>


</html>