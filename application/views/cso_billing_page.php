<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $this->session->userdata('acronym') ?> | Activity Page</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Datepicker CSS -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />


    <!-- Font Awesome :-) -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_table.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_page.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/activitypage.css">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/icon/favicon-96x96.png">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css">
  </head>

  <body>
    <div class="wrapper">
      <!-- The Sidebar  -->
      <div class="sidebar" data-color="green" data-image="">

        <!-- LOGO Image and Name -->
        <div class="logo text-center">
          <img src="<?php echo base_url(); ?>assets/img/cso_logo.png" alt="" width="150px" class=" text-center">
          <a href="#" class="simple-text logo-name">
  					CSO
  				</a>
        </div>
        <!-- Sidebar Navigation! -->
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="<?php echo site_url('admin/create-activity'); ?>">
                <i class="fa fa-file-text"></i>
                <p>New Activity</p>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/activity-list'); ?>">
                <i class="fa fa-list"></i>
                <p>CSO Activities</p>
              </a>
            </li>
            <?php if($this->session->userdata('acronym') == 'CSO-E'): ?>
              <li class="divider"></li>
              <li>
                <a href="<?php echo site_url('admin/new-billing'); ?>">
                  <i class="fa fa-file-text"></i>
                  <p>New Billing Statement</p>
                </a>
              </li>
              <li class="active">
                <a href="<?php echo site_url('admin/billing-list'); ?>">
                  <i class="fa fa-list"></i>
                  <p>All Billing Statements</p>
                </a>
              </li>
            <?php endif ?>
            <li class="divider"></li>
            <li>
              <a href="<?php echo site_url('admin/org-activity-list'); ?>">
                <i class="fa fa-list"></i>
                <p>ORG Activities</p>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('admin/archive-list'); ?>">
                <i class="fa fa-archive"></i>
                <p>Approved</p>
              </a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo site_url('admin/org-list'); ?>">
                <i class="fa fa-users"></i>
                <p>Organizations</p>
              </a>
            </li>
          </ul>
        </div>

      </div>

      <!-- The Main Panel -->
      <div class="main-panel">
        <!-- Main Navigation (Notification & Logout) -->
        <nav class="navbar navbar-transparent navbar-absolute">
          <div class="container-fluid">
            <!-- Navbar UX -->
            <div class="navbar-header">
            <!-- Navbar Title -->
              <p class="navbar-brand nav-title">
                <i class="fa fa-list"></i> Billing Statement
              </p>
            </div>

            <div class="collapse navbar-collapse">
              <!-- Navbar Items (Right) -->
              <ul class="nav navbar-nav navbar-right">

                <!-- Notification -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle btn btn-white" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="notification">2</span>
                    <p class="hidden-lg hidden-md">Notifications</p>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Revision Issue at Activity.</a></li>
                    <li><a href="#">Your Activity has been approved!</a></li>
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
              <!-- Page toolbar (back, status) -->
              <div class="page-toolbar">
                <!-- Back Button -->
                <a href="javascript:history.back()" class="btn btn-white" data-toggle="tooltip" data-placement="right" title="Back to List">
                  <li class="fa fa-chevron-left"></li>
                </a>
                <!-- Status -->
                <h3 style="display: inline-block" class="pull-right">
                  <?php
                    $billingStatus = $billingData['status'];
                    $buttonType = "warning";
                    if($billingStatus == 'Settled'){
                      $buttonType = "success";
                    }


                    echo <<< EOT

                    <label class="label label-$buttonType">
EOT;

                     ?>
                    <?= $billingStatus ?>
                  </label>
                </h3>
              </div>
              <!-- Main page -->
              <div class="activity-page">
                <div class="card card-nav-tabs">
                  <?php $billingID = $billingData['billingID'];
                        $orgInitials = $billingData['orgAcronym'];?>

                  <div class="card-content">
                    <div class="clearfix page-head">
                      <h3 class="pull-left">
                        <span class="org-name"><?= $orgInitials ?> - </span>
                        <span class="activity-title"><?= $billingData['activityTitle']?></span>
                      </h3>
                      <h3 class="pull-right">
                        <span class="activity-date">
                          <?php
                          $dos = date("M d, Y g:i A", strtotime($billingData['dateSubmitted']));
                          echo $dos;
                          ?>
                        </span>
                      </h3>
                    </div>
                    <div class="tab-content">

                      <div class="tab-pane active" id="details">
                        <form id="billingForm" action="<?= site_url("admin/edit-billing/". $orgInitials . "/". $billingID ) ?>" method="post">
                          <div class="billingDetails">
                            <!-- 1st Row -->
                            <div class="row">
                              <!-- Title -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-file-text"></i>
                                    </span>
                                    <label for="activityTitle" class="control-label">Activity Title</label>
                                    <input value="<?= $billingData['activityTitle'] ?>" disabled id="activityTitle" name="activityTitle" type="text" class="form-control" placeholder="Type the complete activity title according to your A-Form."/>
                                  </div>
                                </div>
                              </div>
                              <!-- Activity Date -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-calendar-plus-o"></i>
                                    </span>
                                    <label for="activityDate" class="control-label startDateLabel">Activity Date: </label>
                                    <input value="<?= $billingData['activityDate'] ?>" disabled onkeydown="return false" class="form-control dateInput activityDate" name="activityDate" id="activityDate"/>
                                  </div>
                                </div>
                              </div>

                            </div>
                            <!-- 2nd Row -->
                            <div class="row">
                              <!-- Status  -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-cube"></i>
                                    </span>
                                    <label for="status" class="control-label">Status</label>
                                    <select disabled class="form-control" name="status" id="status" >
                                      <option disabled selected value="-1">Please select an option</option>
                                      <option <?php if($billingData['status'] == 'Settled') echo 'selected' ?> value="Settled">Settled</option>
                                      <option <?php if($billingData['status'] == 'Unsettled') echo 'selected' ?> value="Unsettled">Unsettled</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <!-- Payable To -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-user-circle"></i>
                                    </span>
                                    <label for="payableTo" class="control-label">Payable To</label>
                                    <input value="<?= $billingData['payableTo'] ?>" disabled class="form-control" name="payableTo" id="payableTo"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- 3rd Row -->
                            <div class="row">
                              <!-- Amount -->
                              <div class="col-sm-4 col-sm-offset-4">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-rub"></i>
                                    </span>
                                    <label for="amount" class="control-label">Amount: </label>
                                    <input value="<?= $billingData['amount'] ?>" disabled class="form-control " name="amount" id="amount" type="number" min="0"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="card-footer clearfix" style="margin-top: 3em">

                            <button type="button" class="btn btn-info btn-lg pull-left" id="editBTN">Edit</button>
                            <button type="button" class="btn btn-success btn-lg pull-right" id="saveBTN" style="display: none">Save Changes</button>

                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Save Process modal -->
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="Save Modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Save Changes</h3>
          </div>
          <div class="modal-body">
		        <h4 class="text-center">
              <span style="font-weight: bold">
                <?= $orgInitials   ?> - <?= $billingData['activityTitle'] ?>
              </span>
              <br>
							All fields in the activity process will be saved.<br>
              Do you want to Continue?<br>
						</h4>
						<div class="modalButtons text-center">
							<button class="btn btn-info btn-lg" data-dismiss="modal" id="contEdit">Continue Editing</button>
							<button type="button" class="btn btn-success btn-lg" id="saveModalBTN">Save Changes</button>
						</div>

		      </div>
        </div>
      </div>
    </div>

  </body>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/js/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap-table.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/material.min.js" type="text/javascript"></script>

  <!--  Charts Plugin -->
  <script src="<?php echo base_url();?>assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url();?>assets/js/bootstrap-notify.js"></script>

  <!-- Material Dashboard javascript methods -->
  <script src="<?php echo base_url();?>assets/js/material-dashboard.js"></script>

  <!-- Moment JS -->
  <script src="<?php echo base_url();?>assets/js/moment.js"></script>


  <script src="<?php echo base_url();?>assets/js/cso_table.js"></script>
  <script src="<?php echo base_url();?>assets/js/billingpage.js"></script>

  <script type="text/javascript">
    initDatePicker();
    clearInvalid();
  </script>

  <script type="text/javascript">
  <?php
    $flash = $this->session->flashdata('editBilling');
    if($flash == 'true'):
  ?>
  $.notify({
    icon: "check",
    message: "Edit Activity - Successfully Edited a billing statement",
  },{
      type: 'success',
      timer: 1000,
      placement: {
          from: 'top',
          align: 'center'
      },
      allow_dismiss: true,
      newest_on_top: true,
      mouse_over: 'pause'
  });
  <?php elseif($flash == 'false'): ?>
  $.notify({
    icon: "warning",
    message: "Create Activity - Error in Editing a billing statement",
  },{
      type: 'danger',
      timer: 1000,
      placement: {
          from: 'top',
          align: 'center'
      },
      allow_dismiss: true,
      newest_on_top: true,
      mouse_over: 'pause'
  });
  <?php endif; ?>
  </script>


</html>
