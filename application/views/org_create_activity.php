<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>
			<?= $this->session->userdata('acronym') ?>
			| New Activity
		</title>

		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS     -->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

		<!--  Material Dashboard CSS    -->
		<link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />

		<!-- Datepicker CSS -->
		<link href="<?php echo base_url();?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />

		<!-- Font Awesome :-) -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/icon/favicon-96x96.png">

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/newactivity.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_table.css">
    <style>
      .nav.nav-pills{
        border-right: 4px dashed #2196F3;
        padding-right: 3em;
      }
      .nav-pills.nav-pills-info > li.active > a, .nav-pills.nav-pills-info > li.active > a:focus, .nav-pills.nav-pills-info > li.active > a:hover{
        background-color: #2196F3;
      }
      #detailContBtn{
        background-color: #dbdbdb;
        color: #444444;
      }
      input{
        font-size: 1.5em;
      }
      .datepicker table tr td.disabled, .datepicker table tr td.disabled:hover{
        background: #fff0f0;
        color: #777;
        cursor: not-allowed;
      }
      .datepicker table tr td.day:hover, .datepicker table tr td.focused{
        background: #e1e1e1;
      }
      .pager li a{
        padding: 15px 34px;
        font-size: 1em;
        border-radius: 5px;
      }
    </style>

		<style media="screen">
    .navbar .dropdown-menu li a:hover{
      background-color: #2196F3 !important;
    }

    .badge{
      background-color: crimson !important;
    }
    </style>

		<link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="wrapper">
			<div class="sidebar" data-color="green" data-image="">

				<div class="logo text-center">
					<!-- Logo image test -->
					<img src="<?php echo base_url();?>assets/img/logos/<?= $this->session->userdata('acronym') ?>.png" alt="" width="150px" class=" text-center">
					<a href="#" class="simple-text">
					<?= $this->session->userdata('acronym') ?>
					</a>
				</div>

				<div class="sidebar-wrapper">
					<ul class="nav">
						<li class="active">
							<a href="<?= site_url('org/new-activity')?>">
								<i class="fa fa-file-text"></i>
								<p>New Activity</p>
							</a>
						</li>
						<li>
							<a href="<?= site_url('org/activity-list')?>">
								<i class="fa fa-list"></i>
								<p>View Activities</p>
							</a>
						</li>
						<li>
							<a href="<?= site_url('org/profile')?>">
								<i class="fa fa-users"></i>
								<p>Org Profile</p>
							</a>
						</li>
						<li >
							<a href="<?= site_url('org/billing-list')?>">
								<i class="fa fa-list"></i>
								<p>Billing Statements</p>
							</a>
						</li>
					</ul>
				</div>

			</div>

			<div class="main-panel">
				<!-- Main Navigation (Notification & Logout) -->
        <nav class="navbar navbar-transparent navbar-absolute">
          <div class="container-fluid">
            <!-- Navbar UX -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
            <!-- Navbar Title -->
						</button>
              <a class="navbar-brand nav-title" href="#">
                <i class="fa fa-file-text"></i> Create New Activity
              </a>
            </div>

            <div class="collapse navbar-collapse">
              <!-- Navbar Items (Right) -->
              <ul class="nav navbar-nav navbar-right">

								<!-- Notification -->
                <li class="dropdown org">
                  <a href="#" class="dropdown-toggle btn btn-white" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
										<?php if($notifCount != 0): ?>
                        <span class='notification'><?= $notifCount ?></span>
										<?php endif; ?>
                    <p class="hidden-lg hidden-md">Notifications</p>
                  </a>
                  <ul class="dropdown-menu notifications">
                    <?php # This block uses HEREDOC to print out, check PHP's HEREDOC documentation.
										if(!empty($notifList)){
											foreach($notifList as $row) {
												$badge = "";
												if($row['status'] == 'unseen'){
													$badge = '<span class="badge">New</span>';
												}
												$timestamp = date("M d, Y g:i A", strtotime($row['timedate']));

												if($row['notifType'] == 'org-billing create'){
													$notifID = $row['notifID'];
													$typeID = $row['typeID'];
													$notifText = 'New Billing Statement';
													$url = site_url("org/billing-page/$typeID");
													echo "<li id = '$notifID'><a href = '$url'><strong>$notifText</strong> - $timestamp $badge </a></li>";
												}
												elseif($row['notifType'] == 'org-activity remark'){
													$notifID = $row['notifID'];
													$typeID = $row['typeID'];
													$notifText = 'An activity has been remarked';
													$url = site_url("org/activity-page/$typeID");
													echo "<li id = '$notifID'><a href = '$url'><strong>$notifText</strong> - $timestamp $badge </a></li>";
												}
												elseif($row['notifType'] == 'org-activity approve'){
													$notifID = $row['notifID'];
													$typeID = $row['typeID'];
													$notifText = 'An activity has been approved';
													$url = site_url("org/activity-page/$typeID");
													echo "<li id = '$notifID'><a href = '$url'><strong>$notifText</strong> - $timestamp $badge </a></li>";
												}
												elseif ($row['notifType'] == 'org-activity decline') {
													$notifID = $row['notifID'];
													$typeID = $row['typeID'];
													$notifText = 'An activity has been declined';
													$url = site_url("org/activity-page/$typeID");
													echo "<li id = '$notifID'><a href = '$url'><strong>$notifText</strong> - $timestamp $badge </a></li>";
												}
											}
										} else {
											echo "<li><a>Empty</a></li>";
										}
                		?>

                  </ul>
                </li>

                <!-- Logout -->
                <li>
                  <a href="<?php echo site_url('logout');?>" class="btn btn-white">
                    Logout
                    <i class="fa fa-sign-out"></i>
                  </a>
                </li>

              </ul>
            </div>

          </div>
        </nav>

				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="card theWizard">
								<form action="<?= site_url('org/submit') ?>" id="createForm" method="post">

									<div class="card-content">
										<div class="row">
											<!-- Navigation -->
											<div class="col-sm-2 form-navigation">
												<div class="nav-align-center">

													<ul class="nav nav-pills nav-pills-info nav-stacked" role="tablist" >
														<li class="active" >
															<a href="#details" role="tab" data-toggle="tab" id="detail-btn">
																<i class="fa fa-2x fa-info-circle"></i> Details
															</a>
														</li>
														<li class="" >
															<a href="#process" role="tab" data-toggle="tab" id="process-btn">
																<i class="fa fa-2x fa-bank"></i> Process
															</a>
														</li>
                            <li class="" >
															<a href="#finish" role="tab" data-toggle="tab" id="process-finish">
																<i class="fa fa-2x fa-check-square-o"></i> Finish
															</a>
														</li>
													</ul>

												</div>
											</div>
											<!-- Form -->
											<div class="col-sm-10 form-main">
												<div class="tab-content">
													<div class="tab-pane active" id="details">
                            <!-- 1st Row -->
														<div class="form-group">
															<div class="row">
                                <!-- Title -->
																<div class="col-sm-6">
																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-file-text"></i>
																			</span>
																			<label for="title" class="control-label">Title</label>
																			<input id="title" name="title" type="text" class="form-control" placeholder="Type the complete activity title according to your A-Form."/>
																		</div>
																	</div>
																</div>
                                <!-- Submitted By -->
																<div class="col-sm-6">
																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-user-circle"></i>
																			</span>
																			<label for="submittedBy" class="control-label">Submitted By</label>
																			<input id="submittedBy" name="submittedBy" type="text" class="form-control" placeholder="Submitted By"/>
																		</div>
																	</div>
																</div>
															</div>
														</div>
                            <!-- 2nd Row -->
                            <div class="form-group">
															<div class="row">
                                <!-- Process -->
																<div class="col-sm-6">
																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-bank"></i>
																			</span>
																			<label for="processType" class="control-label">Process</label>
                                      <select class="form-control" name="processType" id="processType" required>
                                        <option disabled selected value="-1">Please select an option</option>
                                        <option value="CA">Cash Advance</option>
                                        <option value="DP">Direct Payment</option>
                                        <option value="RM">Reimbursement</option>
                                        <option value="BT">Book Transfer</option>
                                        <option value="LQ">Liquidation</option>
                                        <option value="PCR">Petty Cash Replenishment</option>
                                        <option value="NE">No Expense</option>
                                        <option value="FRA">Fund Raising Activity Report</option>
                                        <option value="CP">Change of Payee</option>
                                        <option value="COC">Cancellation of Check</option>
                                        <option value="LEA">List of Expenses alone</option>
                                      </select>
																		</div>
																	</div>
																</div>
                                <!-- Activity Date Description -->
																<div class="col-sm-6">
																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-calendar"></i>
																			</span>
																			<label for="dateDesc" class="control-label">Activity Date Description</label>
                                      <select class="form-control" name="dateDesc" id="dateDesc">
                                        <option disabled selected value>Please select a date description</option>
                                        <option value="Specific">Specific Date/s</option>
                                        <option value="Term Long">Term Long</option>
                                        <option value="Year Long">Year Long</option>
                                      </select>
																		</div>
																	</div>
																</div>
															</div>
														</div>

                            <!-- 3rd Row -->
                            <div class="form-group">
															<div class="row">
                                <!-- Start Date -->
																<div class="col-sm-6">
																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-calendar-plus-o"></i>
																			</span>
                                      <label class="control-label startDateLabel">Start Date: </label>
          														<input class="beginDate form-control" onkeydown="return false" name="beginDate" id="beginDate"/>
																		</div>
																	</div>
																</div>
                                <!-- End Date -->
																<div class="col-sm-6">
																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-calendar-times-o"></i>
																			</span>
                                      <label class="control-label endDateLabel ">End Date: </label>
          														<input class="endDate form-control" onkeydown="return false" name="endDate" id="endDate"/>
																		</div>
																	</div>
																</div>
															</div>
														</div>

                            <!-- 4th Row -->
                            <div class="form-group">
															<div class="row">
																<div class="col-sm-12">

																	<div class="form-group has-feedback">
																		<div class="input-group has-feedback">
																			<span class="input-group-addon">
																				<i class="fa fa-2x fa-bookmark"></i>
																			</span>

																			<label for="description" class="control-label">Activity Description (Optional)</label>
																			<textarea class="form-control" rows="2" id="description" name="description" placeholder="Enter Activity Description Here."></textarea>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!-- Process -->
													<div class="tab-pane" id="process">
                            <div class="withPRS">

                              <div class="form-group">
                                <div class="row">
                                  <div class="col-sm-4 PRSno">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-2x fa-credit-card"></i>
                                        </span>
                                        <label for="PRSno" class="control-label">PRS Number</label>
                                        <input id="PRSno" name="PRSno" type="number" class="form-control"
                                        placeholder="Enter PRS number here." />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-4 PCVno" style="display: hidden">
  																	<div class="form-group has-feedback">
  																		<div class="input-group has-feedback">
  																			<span class="input-group-addon">
  																				<i class="fa fa-2x fa-file-text"></i>
  																			</span>
  																			<label for="PCVno" class="control-label">Petty Cash Voucher Number</label>
  																			<input id="PCVno" name="PCVno" type="number" step="any" class="form-control" placeholder="Petty Cash Voucher Number (Required for PCR)"/>
  																		</div>
  																	</div>
  																</div>
                                  <div class="col-sm-4 DORno" style="display: hidden">
  																	<div class="form-group has-feedback">
  																		<div class="input-group has-feedback">
  																			<span class="input-group-addon">
  																				<i class="fa fa-2x fa-file-text"></i>
  																			</span>
  																			<label for="DORno" class="control-label">Deposit Official Receipt Number</label>
  																			<input id="DORno" name="DORno" type="number" step="any" class="form-control" placeholder="Deposit Official Receipt Number(Required for LQ)"/>
  																		</div>
  																	</div>
  																</div>
                                </div>
                              </div>

                              <div class="form-group payTo">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-2x fa-user-circle"></i>
                                        </span>
                                        <label for="payTo" class="control-label">Payable To:</label>
                                        <input id="payTo" name="payTo" type="text" class="form-control" placeholder="Payable To:"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-rub fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="budget" class="control-label">Budget</label>
                                        <input id="budget" name="budget" class="form-control" placeholder="Amount" min="0"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-2x fa-cart-arrow-down"></i>
                                        </span>
                                        <label for="particular" class="control-label">Particulars</label>
                                        <input id="particular" name="particular" type="text" class="form-control" placeholder="Enter the Particulars here."/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="withFRA" style="display: hidden">
                              <div class="form-group">
  															<div class="row">
  																<div class="col-sm-12">
  		                              <div class="form-group has-feedback">
  		                                <div class="input-group has-feedback">
  		                                  <span class="input-group-addon">
  		                                    <i class="fa fa-2x fa-credit-card" aria-hidden="true"></i>
  		                                  </span>
  		                                  <label for="FRAno" class="control-label">FRA Number</label>
  		                                  <input id="FRAno" name="FRAno" type="number" class="form-control" placeholder="FRA number"/>
  		                                </div>
  		                              </div>
  		                            </div>
  															</div>
  														</div>
                              <!-- Actual Revenue and Net Income/Loss -->
  														<div class="form-group">
  															<div class="row">
  																<div class="col-sm-6">
  																	<div class="form-group has-feedback">
  																		<div class="input-group has-feedback">
  																			<span class="input-group-addon">
  																				<i class="fa fa-2x fa-bar-chart"></i>
  																			</span>
  																			<label for="actualRevenue" class="control-label">Actual Revenue</label>
  																			<input id="actualRevenue" name="actualRevenue" type="number" step="any" class="form-control" placeholder="Revenue"/>
  																		</div>
  																	</div>
  																</div>
  																<div class="col-sm-6">
  																	<div class="form-group has-feedback">
  																		<div class="input-group has-feedback">
  																			<span class="input-group-addon">
  																				<i class="fa fa-2x fa-bar-chart"></i>
  																			</span>
  																			<label for="netIncome" class="control-label">Net income</label>
  																			<input id="netIncome" name="netIncome" type="number" step="any" class="form-control" placeholder="Income"/>
  																		</div>
  																	</div>
  																</div>
  															</div>
  														</div>
                              <!-- Expenses from revenue and Disbursement -->
  														<div class="form-group">
  															<div class="row">
  																<div class="col-sm-6">
  																	<div class="form-group has-feedback">
  																		<div class="input-group has-feedback">
  																			<span class="input-group-addon">
  																				<i class="fa fa-2x fa-usd"></i>
  																			</span>
  																			<label for="expRevenue" class="control-label">Expenses from Revenue</label>
  																			<input id="expRevenue" name="expRevenue" type="number" step="any" class="form-control" placeholder="Expenses"/>
  																		</div>
  																	</div>
  																</div>
  																<div class="col-sm-6">
  																	<div class="form-group has-feedback">
  																		<div class="input-group has-feedback">
  																			<span class="input-group-addon">
  																				<i class="fa fa-2x fa-usd"></i>
  																			</span>
  																			<label for="expDisburse" class="control-label">Expenses from Disbursements</label>
  																			<input id="expDisburse" name="expDisburse" type="number" step="any" class="form-control" placeholder="Expenses"/>
  																		</div>
  																	</div>
  																</div>
  															</div>
  														</div>
                            </div>

													</div>
                          <div class="tab-pane" id="finish">
														<div class="finish-message">

															<h1 class="text-center raleway">You're good to go <i class="fa fa-check text-success"></i></h1>
															<p class="text-center text-success">Recheck or change the process by clicking the "previous" button.</p>

														</div>
                          </div>
												</div>
											</div>
										</div>
									</div>

									<div class="card-footer text-right ">
                    <ul class="pager wizard">
                			<li class="previous first" style="display:none;"><a href="#" class="btn btn-info">First</a></li>
                			<li class="previous"><a href="#" class="btn btn-info">Previous</a></li>
                			<li class="next last" style="display:none;"><a href="#" class="btn btn-info">Last</a></li>
                		  <li class="next"><a href="#" class="btn btn-info">Next</a></li>
                      <li class="finish"><button type="button" id="finishBTN" href="#" class="btn btn-success">Finish</button></li>
                		</ul>

									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- Confirmation modal -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ConfirmModal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h3 class="modal-title text-center" id="myModalLabel">Confirm Submission.</h3>
		      </div>
		      <div class="modal-body">
		        <h4 class="text-center">
							You are about to submit a new Activity.
						</h4>
						<div class="modalButtons text-center">
							<button class="btn btn-info btn-lg">Continue Editing</button>
							<button class="btn btn-success btn-lg">Submit Activity</button>
						</div>

		      </div>
		    </div>
		  </div>
		</div>
	</body>

	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url();?>assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="<?php echo base_url();?>assets/js/material-dashboard.js"></script>

	<!-- Moment JS -->
	<script src="<?php echo base_url();?>assets/js/moment.js"></script>

  <script src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/validateCreate.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/newactivity.js"></script>
  <script type="text/javascript">

  </script>

	<script type="text/javascript">
		var notifIDs = new Array();
		$('.dropdown.org').click(function(event) {
			notifIDs = new Array();
			getAllNotificationIDs();

			$.ajax({
				url: "<?= site_url('clearNotification') ?>",
				type: 'POST',
				dataType: 'json',
				data: {
					notifIDs: notifIDs}
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

			$('.notification').remove();

		});


		function getAllNotificationIDs(){
			var p = $('.notifications li').length;
			$('.notifications li').each(function(index, el) {
				notifIDs.push($(this).attr('id'));
			});
		}
	</script>
</html>
