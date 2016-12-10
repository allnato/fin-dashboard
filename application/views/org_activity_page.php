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

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />


    <!-- Font Awesome :-) -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_table.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_page.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/activitypage.css">


    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css">
  </head>

  <body>
    <div class="wrapper">
      <!-- The Sidebar  -->
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
						<li>
							<a href="<?= site_url('org/new-activity')?>">
								<i class="fa fa-file-text"></i>
								<p>New Activity</p>
							</a>
						</li>
						<li class="active">
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
                <a href="<?= site_url('org/activity-list') ?>" class="btn btn-white" data-toggle="tooltip" data-placement="right" title="Back to List">
                  <li class="fa fa-chevron-left"></li>
                </a>
                <!-- Status -->
                <h3 style="display: inline-block" class="pull-right">
                  <label class="label label-warning">
                    Pending
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
                            <a href="#remarks" data-toggle="tab">
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
                        <span class="org-name"><?= $this->session->userdata('acronym') ?> - </span>
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
                                  <input disabled value="<?= $activityData['beginDate'] ?>" class="beginDate form-control"  name="beginDate" id="beginDate"/>
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
                                  <input disabled value="<?= $activityData['endDate'] ?>" class="endDate form-control"  name="endDate" id="endDate"/>
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
                                  <textarea disabled class="form-control" rows="2" id="description" name="description" placeholder="Enter Activity Description Here."><?= $activityData['description'] ?></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="process">
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

                        </div>

                      </div>
                      <div class="tab-pane" id="remarks">

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
                            <div class="panel panel-success">
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
                                        <input id="datePendedCSO" disabled value="<?= $activityRemarks['datePendedCSO'] ?>" name="datePendedCSO" type="text" class="form-control" placeholder="Date Pended by CSO Finance" />
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
                                        <label for="revisionsCSO" class="control-label">Number of Revisions</label>
                                        <input id="revisionsCSO" disabled value="<?= $activityRemarks['revisions'] ?>" name="revisions" type="number" class="form-control" placeholder="Revisions" step="any" min="0"/>
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
                                        <input id="dateAudited" disabled value="<?= $activityRemarks['dateAudited'] ?>"  name="dateAudited" type="text" class="form-control" placeholder=" Date Audited"/>
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
                                        <input id="auditedBy" disabled value="<?= $activityRemarks['auditedBy'] ?>" name="auditedBy" type="text" class="form-control" placeholder="Audited By"/>
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
                                        <input id="dateEncoded" disabled value="<?= $activityRemarks['dateEncoded'] ?>"  name="dateEncoded" type="text" class="form-control" placeholder="Date Encoded"/>
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
                                        <input id="encodedBy" disabled value="<?= $activityRemarks['encodedBy'] ?>" name="encodedBy" type="text" class="form-control" placeholder="Encoded By"/>
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
                                        <textarea class="form-control" disabled rows="4" id="CSOremarks" name="CSOremarks" placeholder="Enter Remarks here."><?= $activityRemarks['CSOremarks'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="remarksSLIFE">
                            <!-- SLIFE Panel -->
                            <div class="panel panel-warning">
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
                                        <input id="dateReceivedSLIFE" disabled value="<?= $activityRemarks['dateReceivedSLIFE'] ?>"  name="dateReceivedSLIFE" type="text" class="form-control" placeholder="Date Received by SLIFE"/>
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
                                        <input id="datePendedSLIFE" disabled value="<?= $activityRemarks['datePendedSLIFE'] ?>"  name="datePendedSLIFE" type="text" class="form-control" placeholder="Date Pended by SLIFE"/>
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
                                        <textarea class="form-control"disabled rows="4" id="SLIFEremarks" name="SLIFEremarks" placeholder="Enter Remarks here."><?= $activityRemarks['SLIFEremarks'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="remarksACCT">
                            <!-- Accounting Panel -->
                            <div class="panel panel-info">
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
                                        <input id="dateReceivedAcc" value="<?= $activityRemarks['dateReceivedAcc'] ?>" name="dateReceivedAcc" disabled type="text" class="form-control" placeholder="Date Received by Accounting Office"/>
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
                                        <input id="datePendedAcc" value="<?= $activityRemarks['datePendedAcc'] ?>" disabled name="datePendedAcc" type="text" class="form-control" placeholder="Date Pended by Accounting Office"/>
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
                                        <textarea class="form-control" rows="4" id="Accremarks" name="Accremarks" disabled placeholder="Enter Remarks here."><?= $activityRemarks['AccRemarks'] ?></textarea>
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
                                        <textarea class="form-control" disabled rows="4" id="notes" name="notes" placeholder="Enter Remarks here."><?= $activityRemarks['notes'] ?></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/js/jquery.js" type="text/javascript"></script>
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
    convertDatetoReadable();
    clearInvalid();
  });
  </script>
</html>
