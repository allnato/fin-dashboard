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

    <style media="screen">
    .navbar .dropdown-menu li a:hover{
      background-color: #2196F3 !important;
    }

    .badge{
      background-color: crimson !important;
    }
    </style>
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
              <li>
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
              <button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
            <!-- Navbar Title -->
						</button>
              <a class="navbar-brand nav-title" href="#">
                <i class="fa fa-list"></i> Activity List
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

                        if($this->session->userdata('acronym') == 'CSO'){
                          $notifID = $row['notifID'];
                          $typeID = $row['typeID'];
                          $orgInit = $row['orgID'];
                          $notifText = 'An created a new CA or DP';
                          $url = site_url("admin/activity-page/$orgInit/$typeID");
                          echo "<li id = '$notifID'><a href = '$url'><strong>$notifText</strong> - $timestamp $badge </a></li>";
                        }
                        elseif($this->session->userdata('acronym') == 'CSO-E'){
                          $notifID = $row['notifID'];
                          $typeID = $row['typeID'];
                          $orgInit = $row['orgID'];
                          $notifText = 'An activity has been approved';
                          $url = site_url("admin/activity-page/$orgInit/$typeID");
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
              <!-- Page toolbar (back, status) -->
              <div class="page-toolbar">
                <!-- Back Button -->
                <a href="javascript:history.back()" class="btn btn-white" data-toggle="tooltip" data-placement="right" title="Back to List">
                  <li class="fa fa-chevron-left"></li>
                </a>
                <!-- Status -->
                <h3 style="display: inline-block" class="pull-right">
                  <?php
                    $activityStatus = $remarksData['status'];
                    if($remarksData['status'] == "Pending" || $remarksData['status'] == "" || $remarksData['status'] == "null" ) {
                      $buttonType = "warning";
                      $remarksData['status'] = "Pending";
                    }
                    elseif($remarksData['status'] == "Declined") {
                      $buttonType = "danger";
                    }
                    elseif($remarksData['status'] == "Approved") {
                      $buttonType = "success";
                    }


                    echo <<< EOT

                    <label class="label label-$buttonType">
EOT;

                     ?>
                    <?= $remarksData['status'] ?>
                  </label>
                </h3>
              </div>
              <!-- Main page -->
              <div class="activity-page">
                <div class="card card-nav-tabs">

                  <div class="card-header" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                          <li class="active">
                            <a href="#details" data-toggle="tab">
                              <i class="fa fa-2x fa-file-text"></i>
                              Activity Details
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li>
                            <a href="#process" data-toggle="tab">
                              <i class="fa fa-2x fa-bank"></i>
                              Process
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li>
                            <a href="#remarks" data-toggle="tab" class="tabremark">
                              <i class="fa fa-2x fa-pencil"></i>
                              Remarks
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="card-content">
                    <div class="clearfix page-head">
                      <h3 class="pull-left">
                        <span class="org-name"><?= $activityData['acronym'] ?> - </span>
                        <span class="activity-title"><?= $activityData['title']?></span>
                      </h3>
                      <h3 class="pull-right">
                        <span class="activity-date">
                          <?php
                          $dos = date("M d, Y g:i A", strtotime($activityData['dateSubmitted']));
                          echo $dos;
                          ?>
                        </span>
                      </h3>
                    </div>
                    <div class="tab-content">

                      <div class="tab-pane active" id="details">
                        <?php $pageID = $activityData['activityID'];
                              $orgInitials = $activityData['acronym'];?>
                        <form id="editDetailsForm" action="<?php echo site_url("admin/edit-activity-details/". $orgInitials . "/". $pageID )?>" method="post">
                          <div class="activityDetails">
                            <!-- 1st Row -->
                            <div class="row">
                              <!-- Title -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-file-text"></i>
                                    </span>
                                    <label for="title" class="control-label">Title</label>
                                    <input disabled id="title" name="title" type="text" class="form-control" placeholder="Type the complete activity title according to your A-Form." value="<?= $activityData['title'] ?>"/>
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
                                    <input disabled value="<?= $activityData['submittedBy'] ?>" id="submittedBy" name="submittedBy" type="text" class="form-control" placeholder="Submitted By"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- 2nd Row -->
                            <div class="row">
                              <!-- Process -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-bank"></i>
                                    </span>
                                    <label for="processType" class="control-label">Process</label>
                                    <select class="form-control" name="processType" id="processType" disabled>
                                      <option disabled selected value="-1">Please select an option</option>
                                      <option value="CA" <?php if($activityData['processType'] == 'CA') echo 'selected' ?>>Cash Advance</option>
                                      <option value="DP" <?php if($activityData['processType'] == 'DP') echo 'selected' ?>>Direct Payment</option>
                                      <option value="RM" <?php if($activityData['processType'] == 'RM') echo 'selected' ?>>Reimbursement</option>
                                      <option value="BT" <?php if($activityData['processType'] == 'BT') echo 'selected' ?>>Book Transfer</option>
                                      <option value="LQ" <?php if($activityData['processType'] == 'LQ') echo 'selected' ?>>Liquidation</option>
                                      <option value="PCR" <?php if($activityData['processType'] == 'PCR') echo 'selected' ?>>Petty Cash Replenishment</option>
                                      <option value="NE" <?php if($activityData['processType'] == 'NE') echo 'selected' ?>>No Expense</option>
                                      <option value="FRA" <?php if($activityData['processType'] == 'FRA') echo 'selected' ?>>Fund Raising Activity Report</option>
                                      <option value="CP" <?php if($activityData['processType'] == 'CP') echo 'selected' ?>>Change of Payee</option>
                                      <option value="COC" <?php if($activityData['processType'] == 'COC') echo 'selected' ?>>Cancellation of Check</option>
                                      <option value="LEA" <?php if($activityData['processType'] == 'LEA') echo 'selected' ?>>List of Expenses alone</option>
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
                                    <select class="form-control" name="dateDesc" id="dateDesc" disabled>
                                      <option disabled selected value>Please select a date description</option>
                                      <option value="Specific" <?php if($activityData['dateDesc'] == 'Specific') echo 'selected' ?>>Specific Date/s</option>
                                      <option value="Term Long" <?php if($activityData['dateDesc'] == 'Term Long') echo 'selected' ?>>Term Long</option>
                                      <option value="Year Long" <?php if($activityData['dateDesc'] == 'Year Long') echo 'selected' ?>>Year Long</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- 3rd Row -->
                            <div class="row">
                              <!-- Start Date -->
                              <div class="col-sm-6">
                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-calendar-plus-o"></i>
                                    </span>
                                    <label class="control-label startDateLabel">Start Date: </label>
                                    <input disabled value="<?= $activityData['beginDate'] ?>" onkeydown="return false" class="form-control dateInput beginDate" name="beginDate" id="beginDate"/>
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
                                    <input disabled value="<?= $activityData['endDate'] ?>"  onkeydown="return false" class="form-control dateInput endDate" name="endDate" id="endDate"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- 4th Row -->
                            <div class="row">
                              <div class="col-sm-12">

                                <div class="form-group has-feedback">
                                  <div class="input-group has-feedback">
                                    <span class="input-group-addon">
                                      <i class="fa fa-2x fa-bookmark"></i>
                                    </span>

                                    <label for="description" class="control-label">Activity Description (Optional)</label>
                                    <input disabled value="<?= $activityData['description'] ?>" class="form-control" rows="2" id="description" name="description" placeholder="Enter Activity Description Here."></input>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <?php if($activityStatus != 'Approved'): ?>
                              <div class="card-footer">

                                <div class="clearfix" style="width: 100%">
                                  <div class="pull-left">
                                    <button type="button" class="btn btn-info editDetailBTN">Edit</button>
                                    <button type="button" class="btn btn-success saveDetailBTN" style="display: none">Save Changes</button>
                                  </div>
                                  <div class="pull-right">
                                    <button type="button" class="btn reviseBTN">Revise</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#declineModal">Decline</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmModal">Approve</button>
                                  </div>
                                </div>

                              </div>
                            <?php endif ?>

                          </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="process">
                        <form id="editProcessForm" action="<?= site_url('admin/edit-activity-process/' . $orgInitials . "/". $pageID) ?>" method="post">
                          <div class="activityProcess">
                            <?php
                            $process = $activityData['processType'];
                            if($process == 'CA' || $process == 'DP' || $process == 'RM' || $process == 'BT' || $process == 'CP' || $process == 'COC'):
                              ?>
                              <div class="row">
                                <div class="col-sm-12 PRSno">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-credit-card"></i>
                                      </span>
                                      <label for="PRSno" class="control-label">PRS Number</label>
                                      <input disabled readonly  id="PRSno" name="PRSno" type="number" class="form-control" value="<?= $activityData['PRSno'] ?>"
                                      placeholder="Enter PRS number here." />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-user-circle"></i>
                                      </span>
                                      <label for="payTo" class="control-label">Payable To:</label>
                                      <input disabled id="payTo" name="payTo" type="text" class="form-control" placeholder="Payable To:" value="<?= $activityData['payTo']?>" autofocus/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-rub fa-2x" aria-hidden="true"></i>
                                      </span>
                                      <label for="budget" class="control-label">Budget</label>
                                      <input disabled id="budget" name="budget" class="form-control" placeholder="Amount" value="<?=$activityData['budget'] ?>"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-cart-arrow-down"></i>
                                      </span>
                                      <label for="particular" class="control-label">Particulars</label>
                                      <input disabled id="particular" name="particular" type="text" class="form-control" placeholder="Enter the Particulars here."
                                      value="<?= $activityData['particular']?>"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php elseif($process == 'LQ'): ?>

                              <div class="row">
                                <div class="col-sm-12 PRSno">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-credit-card"></i>
                                      </span>
                                      <label for="PRSno" class="control-label">PRS Number</label>
                                      <input disabled readonly  id="PRSno" name="PRSno" type="number" class="form-control" value="<?= $activityData['PRSno'] ?>"
                                      placeholder="Enter PRS number here." />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 DORno" style="display: hidden">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-file-text"></i>
                                      </span>
                                      <label for="DORno" class="control-label">Deposit Official Receipt Number</label>
                                      <input disabled value="<?= $activityData['DORno']?>" id="DORno" name="DORno" type="number" step="any" class="form-control" placeholder="Deposit Official Receipt Number(Required for LQ)"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-rub fa-2x" aria-hidden="true"></i>
                                      </span>
                                      <label for="budget" class="control-label">Budget</label>
                                      <input disabled id="budget" name="budget" class="form-control" placeholder="Amount" value="<?=$activityData['budget'] ?>"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-cart-arrow-down"></i>
                                      </span>
                                      <label for="particular" class="control-label">Particulars</label>
                                      <input disabled id="particular" name="particular" type="text" class="form-control" placeholder="Enter the Particulars here."
                                      value="<?= $activityData['particular']?>"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php elseif($process == 'PCR'): ?>
                              <div class="row">
                                <div class="col-sm-12 PRSno">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-credit-card"></i>
                                      </span>
                                      <label for="PRSno" class="control-label">PRS Number</label>
                                      <input disabled readonly  id="PRSno" name="PRSno" type="number" class="form-control" value="<?= $activityData['PRSno'] ?>"
                                      placeholder="Enter PRS number here." />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12 PCVno" style="display: hidden">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-file-text"></i>
                                      </span>
                                      <label for="PCVno" class="control-label">Petty Cash Voucher Number</label>
                                      <input disabled value="<?= $activityData['PCVno']?>" id="PCVno" name="PCVno" type="number" step="any" class="form-control" placeholder="Petty Cash Voucher Number (Required for PCR)"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-user-circle"></i>
                                      </span>
                                      <label for="payTo" class="control-label">Payable To:</label>
                                      <input disabled id="payTo" name="payTo" type="text" class="form-control" placeholder="Payable To:" value="<?= $activityData['payTo']?>" autofocus/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-rub fa-2x" aria-hidden="true"></i>
                                      </span>
                                      <label for="budget" class="control-label">Budget</label>
                                      <input disabled id="budget" name="budget" class="form-control" placeholder="Amount" value="<?=$activityData['budget'] ?>"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-cart-arrow-down"></i>
                                      </span>
                                      <label for="particular" class="control-label">Particulars</label>
                                      <input disabled id="particular" name="particular" type="text" class="form-control" placeholder="Enter the Particulars here."
                                      value="<?= $activityData['particular']?>"/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php elseif($process == 'FRA'): ?>

                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-credit-card" aria-hidden="true"></i>
                                      </span>
                                      <label for="FRAno" class="control-label">FRA Number</label>
                                      <input disabled value="<?= $activityData['FRAno'] ?>" id="FRAno" name="FRAno" type="number" class="form-control" placeholder="FRA number"/>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Actual Revenue and Net Income/Loss -->

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-bar-chart"></i>
                                      </span>
                                      <label for="actualRevenue" class="control-label">Actual Revenue</label>
                                      <input disabled value="<?= $activityData['actualRevenue'] ?>" id="actualRevenue" name="actualRevenue" type="number" step="any" class="form-control" placeholder="Revenue"/>
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
                                      <input disabled value="<?= $activityData['netIncome']?>" id="netIncome" name="netIncome" type="number" step="any" class="form-control" placeholder="Income"/>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Expenses from revenue and Disbursement -->

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group has-feedback">
                                    <div class="input-group has-feedback">
                                      <span class="input-group-addon">
                                        <i class="fa fa-2x fa-usd"></i>
                                      </span>
                                      <label for="expRevenue" class="control-label">Expenses from Revenue</label>
                                      <input disabled value="<?= $activityData['expRevenue']?>" id="expRevenue" name="expRevenue" type="number" step="any" class="form-control" placeholder="Expenses"/>
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
                                      <input disabled value="<?= $activityData['expDisburse']?>"id="expDisburse" name="expDisburse" type="number" step="any" class="form-control" placeholder="Expenses"/>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            <?php else: ?>
                              <h1 class="text-center">N/A</h1>

                            <?php endif ?>
                            <?php if($activityStatus != 'Approved'): ?>
                              <div class="card-footer">

                                <div class="clearfix" style="width: 100%">
                                  <div class="pull-left">
                                    <button type="button" class="btn btn-info editProcessBTN">Edit</button>
                                    <button type="button" class="btn btn-success saveProcessBTN" style="display: none">Save Changes</button>
                                  </div>
                                  <div class="pull-right">
                                    <button type="button" class="btn reviseBTN">Revise</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#declineModal">Decline</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirmModal">Approve</button>
                                  </div>
                                </div>

                              </div>
                            <?php endif ?>
                          </div>
                        </form>

                      </div>
                      <div class="tab-pane" id="remarks">
                        <form id="remarksSubmit" method="post" action="<?= site_url('admin/remark-activity') ?>">
                        <ul class="nav nav-pills remarksTab" data-tabs="tabs">
                          <li class="active">
                            <a href="#remarksCSO" data-toggle="tab">
                              <i class="fa fa-file-text"></i>
                              CSO
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li>
                            <a href="#remarksSLIFE" data-toggle="tab">
                              <i class="fa fa-book"></i>
                              S.L.I.F.E
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                          <li>
                            <a href="#remarksACCT" data-toggle="tab">
                              <i class="fa fa-calculator"></i>
                              Accounting
                              <div class="ripple-container"></div>
                            </a>
                          </li>
                        </ul>

                        <div class="tab-content">
                          <div class="tab-pane active" id="remarksCSO">
                            <!-- CSO Panel -->
                            <div class="panel panel-success" id="CSOpanel">
                              <div class="panel-heading">
                                <h3 class="panel-title">CSO</h3>
                              </div>
                              <div class="panel-body">
                                <div class="row">

                                  <!-- Date Pended by CSO -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-2x fa-calendar"></i>
                                        </span>
                                        <label for="datePendedCSO" class="control-label">Date Pended by CSO</label>
                                        <input id="datePendedCSO" onkeydown="return false" class="form-control dateInput" name="datePendedCSO" value="<?= $remarksData['datePendedCSO'] ?>" type="text" placeholder="Date Pended by CSO Finance" />
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Revisions -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="revisions" class="control-label">Number of Revisions</label>
                                        <input id="revisions" name="revisions" type="number" min="0" value="<?= $remarksData['revisions'] ?>" class="form-control" placeholder="Revisions"/>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                                <!-- Audited(Date, by) -->
                                <div class="row">
                                  <!-- Date Audited -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="dateAudited" class="control-label">Date Audited</label>
                                        <input id="dateAudited" onkeydown="return false" class="form-control dateInput" name="dateAudited" value="<?= $remarksData['dateAudited'] ?>" type="text" placeholder=" Date Audited"/>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Audited By -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="auditedBy" class="control-label">Audited By</label>
                                        <input id="auditedBy" name="auditedBy" type="text" value="<?= $remarksData['auditedBy'] ?>" class="form-control" placeholder="Audited By"/>
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <!-- Encoded(Date,by) -->
                                <div class="row">

                                  <!-- Date Encoded -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="dateEncoded" class="control-label">Date Encoded</label>
                                        <input id="dateEncoded" onkeydown="return false" class="form-control dateInput" name="dateEncoded" value="<?= $remarksData['dateEncoded'] ?>" type="text" placeholder="Date Encoded" />

                                      </div>
                                    </div>
                                  </div>

                                  <!-- Encoded By -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="encodedBy" class="control-label">Encoded By</label>
                                        <input id="encodedBy" name="encodedBy" type="text" value="<?= $remarksData['encodedBy'] ?>" class="form-control" placeholder="Encoded By"/>
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <!-- CSO Remarks -->
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-bookmark fa-2x"></i>
                                        </span>

                                        <label for="CSOremarks" class="control-label">CSO Remarks</label>
                                        <textarea class="form-control" rows="4" id="CSOremarks" name="CSOremarks" placeholder="Enter Remarks here."><?= $remarksData['CSOremarks'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="remarksSLIFE">
                            <!-- SLIFE Panel -->
                            <div class="panel panel-warning" id="SLIFEpanel">
                              <div class="panel-heading">
                                <h3 class="panel-title">SLIFE</h3>
                              </div>
                              <div class="panel-body">
                                <!-- SLIFE Date -->
                                <div class="row">
                                  <!-- Date Recieved by SLIFE -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="dateReceivedSLIFE"  class="control-label">Date Received by SLIFE</label>
                                        <input id="dateReceivedSLIFE" onkeydown="return false" class="form-control dateInput" name="dateReceivedSLIFE" type="text" value="<?= $remarksData['dateReceivedSLIFE'] ?>" placeholder="Date Received by SLIFE" />
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Date Pended by SLIFE -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="datePendedSLIFE"  class="control-label">Date Pended by SLIFE</label>
                                        <input id="datePendedSLIFE" onkeydown="return false" class="form-control dateInput" name="datePendedSLIFE" value="<?= $remarksData['datePendedSLIFE'] ?>" type="text" placeholder="Date Pended by SLIFE" />
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <!-- SLIFE Remarks -->
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-bookmark fa-2x"></i>
                                        </span>

                                        <label for="SLIFEremarks" class="control-label">SLIFE Remarks</label>
                                        <textarea class="form-control" rows="4" id="SLIFEremarks" name="SLIFEremarks" placeholder="Enter Remarks here."><?= $remarksData['SLIFEremarks'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="remarksACCT">
                            <!-- Accounting Panel -->
                            <div class="panel panel-info" id="ACCTpanel">
                              <div class="panel-heading">
                                <h3 class="panel-title">Accounting Office</h3>
                              </div>
                              <div class="panel-body">
                                <!-- Accounting Office Dates -->
                                <div class="row">
                                  <!-- Date Recieved by Accounting Office -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="dateReceivedAcc" class="control-label">Date Received by Accounting Office</label>
                                        <input id="dateReceivedAcc" onkeydown="return false" class="form-control dateInput" name="dateReceivedAcc" value="<?= $remarksData['dateReceivedAcc'] ?>" type="text" placeholder="Date Received by Accounting Office" />
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Date Pended by Accounting Office -->
                                  <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
                                        </span>
                                        <label for="datePendedAcc" class="control-label">Date Pended by Accounting Office</label>
                                        <input id="datePendedAcc" onkeydown="return false" class="form-control dateInput" name="datePendedAcc" type="text" value="<?= $remarksData['datePendedAcc'] ?>"  placeholder="Date Pended by Accounting Office" />
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <!-- Accounting Office Remarks -->
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-bookmark fa-2x"></i>
                                        </span>
                                        <label for="Accremarks" class="control-label">Accounting Office Remarks</label>
                                        <textarea class="form-control" rows="4" id="Accremarks" name="AccRemarks" placeholder="Enter Remarks here."><?= $remarksData['AccRemarks'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Other Remarks -->
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                      <div class="input-group has-feedback">
                                        <span class="input-group-addon">
                                          <i class="fa fa-bookmark fa-2x"></i>
                                        </span>

                                        <label for="notes" class="control-label">SLIFE Resubmission/Notes</label>
                                        <textarea class="form-control" rows="4" id="notes" name="notes" placeholder="Enter Remarks here."><?= $remarksData['notes'] ?></textarea>
                                        <input type="hidden" name="activityID" value="<?= $activityData['activityID'] ?>" />
                                      </div>
                                    </div>
                                  </div>
                                </div>


                              </div>
                            </div>
                          </div>
                          <?php if($activityStatus != 'Approved'): ?>

                            <div class="card-footer text-center">
                              <div class="row">
                                <div class="text-center">
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#remarkModal">Submit Remark</button>
                                </div>
                              </div>
                            </div>
                          <?php endif ?>


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

    <!-- Approve modal -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ConfirmModal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h3 class="modal-title text-center" id="myModalLabel">Approve Activity</h3>
		      </div>
		      <div class="modal-body">
		        <h4 class="text-center">
							You are about to approve <br>
               <span style="font-weight: bold">
                 <?= $activityData['acronym'] ?> - <?= $activityData['title'] ?>
               </span>
						</h4>
						<div class="modalButtons text-center">
              <form method="post" action="<?= site_url('admin/approve') ?>">
							<button type="button" class="btn btn-info btn-lg" id="contEdit">Continue Editing</button>
                <input type="hidden" name="activityID" value="<?= $activityData['activityID'] ?>" />
                <input type="hidden" name="status" value="Approved" />
                <input type="hidden" name="acronym" value="<?= $orgInitials ?>" />
							  <button type="submit" class="btn btn-success btn-lg">Approve Activity</button>
              </form>
						</div>

		      </div>
		    </div>
		  </div>
		</div>
    <!-- Decline modal -->
		<div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="DeclineModal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h3 class="modal-title text-center" id="myModalLabel">Decline Activity</h3>
		      </div>
		      <div class="modal-body">
		        <h4 class="text-center">
							You are about to Decline <br>
               <span style="font-weight: bold">
                 <?= $activityData['acronym'] ?> - <?= $activityData['title'] ?>
               </span>
						</h4>
						<div class="modalButtons text-center">
              <form method="post" action="<?= site_url('admin/decline') ?>">
							<button class="btn btn-info btn-lg" id="contEdit">Continue Editing</button>
                <input type="hidden" name="activityID" value="<?= $activityData['activityID'] ?>" />
                <input type="hidden" name="acronym" value="<?= $activityData['acronym'] ?>" />
                <input type="hidden" name="status" value="Declined" />
							  <button type="submit" class="btn btn-danger btn-lg">Decline Activity</button>
              </form>
						</div>

		      </div>
		    </div>
		  </div>
		</div>
    <!-- Remark modal -->
		<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="DeclineModal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h3 class="modal-title text-center" id="myModalLabel">Remark Activity</h3>
		      </div>
		      <div class="modal-body">
		        <h4 class="text-center">
							You are about to submit a remark <br>
               <span style="font-weight: bold">
                 <?= $activityData['acronym'] ?> - <?= $activityData['title'] ?>
               </span>
						</h4>
						<div class="modalButtons text-center">
							<button class="btn btn-info btn-lg" data-dismiss="modal" id="contEdit">Continue Editing</button>
							<button type="button" class="btn btn-success btn-lg" id="submitBTN">Remark Activity</button>
						</div>

		      </div>
		    </div>
		  </div>
		</div>


    <!-- Save Details Modal -->
    <div class="modal fade" id="saveDetailsModal" tabindex="-1" role="dialog" aria-labelledby="Save Modal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h3 class="modal-title text-center" id="myModalLabel">Save Changes</h3>
		      </div>
		      <div class="modal-body">
		        <h4 class="text-center">
              <span style="font-weight: bold">
                <?= $activityData['acronym'] ?> - <?= $activityData['title'] ?>
              </span>
              <br>
							All fields in the activity details will be saved.<br>
              Do you want to Continue?<br>
						</h4>
						<div class="modalButtons text-center">
							<button class="btn btn-info btn-lg" data-dismiss="modal" id="contEdit">Continue Editing</button>
							<button type="button" class="btn btn-success btn-lg" id="saveDetailsModalBtn">Save Changes</button>
						</div>

		      </div>
		    </div>
		  </div>
		</div>

    <!-- Save Process modal -->
    <div class="modal fade" id="saveProcessModal" tabindex="-1" role="dialog" aria-labelledby="Save Modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title text-center" id="myModalLabel">Save Changes</h3>
          </div>
          <div class="modal-body">
		        <h4 class="text-center">
              <span style="font-weight: bold">
                <?= $activityData['acronym'] ?> - <?= $activityData['title'] ?>
              </span>
              <br>
							All fields in the activity process will be saved.<br>
              Do you want to Continue?<br>
						</h4>
						<div class="modalButtons text-center">
							<button class="btn btn-info btn-lg" data-dismiss="modal" id="contEdit">Continue Editing</button>
							<button type="button" class="btn btn-success btn-lg" id="saveProcessModalBtn">Save Changes</button>
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
  <script src="<?php echo base_url();?>assets/js/activitypage.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      initDatePicker();
      convertDatetoReadable();
      clearInvalid();
    });
  </script>


  <script type="text/javascript">

    <?php if($activityStatus == 'Approved'): ?>
      disableAllFields();
    <?php endif ?>

  </script>

  <script type="text/javascript">
  <?php
    $flash = $this->session->flashdata('editActivity');
    if($flash == 'true'):
  ?>
  $.notify({
    icon: "check",
    message: "Edit Activity - Successfully Edited an Activity",
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
    message: "Create Activity - Error in Editing an activity",
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
