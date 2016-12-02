<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $this->session->userdata('acronym') ?> | Profile</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/org_profile.css">
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap-Table CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-table.min.css">

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url();?>assets/css/material-dashboard.css" rel="stylesheet" />

    <!-- Chartist CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chartist.min.css"/>

    <!-- Font Awesome :-) -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_table.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cso_page.css">
    <style media="screen">
			.dos, .datePended{
				font-weight: bold;
				font-style: normal;
			}
			.list-process{
				font-weight: bold;
			}
			#sortFieldTxt{
				width: auto !important;
			}
      .card .card-header h2{
        font-weight: bold !important;
      }
		</style>

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
            <li>
              <a href="">
                <i class="fa fa-bar-chart"></i>
                <p>Statistics</p>
              </a>
            </li>
            <li class="active">
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
                <i class="fa fa-list"></i> Organization Profile
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
            <!-- Org Title Card -->
            <div class="profile-toolbar text-right">
              <!-- <button type="button" class="btn" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-user-times"></i> Delete Org</button> -->
            </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <div class="card orgCard">
                  <div class="card-content text-center">
                    <h3 class="initials"><?= $orgData['acronym'] ?></h3>
                    <h2 class="orgName"><?= $orgData['name'] ?></h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Org Money -->
            <div class="row">
              <!-- Money Tracking 1 -->
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-header text-center"  data-background-color="blue">
                    <h2>PhP <?php echo $orgFundData['0']['initBalance'] ?></h2>
                  </div>
                  <div class="card-content text-center">
                    <h3>
                      <span style="font-weight: bold">Beginning Balance</span>
                      <br>
                      (as of August 24, 2015, start of the AY)
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Money Tracking 2 -->
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-header text-center" data-background-color="green">
                    <h2>PhP <?php echo $orgFundData['0']['currBalance'] ?></h2>
                  </div>
                  <div class="card-content text-center">
                    <h3>
                      <span style="font-weight: bold">Current Balance</span>
                      <br>
                      (as of Today)

                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-header text-center" data-background-color="red">
                    <h2>PhP <?php echo $orgFundData['0']['netChange'] ?></h2>
                  </div>
                  <div class="card-content text-center">
                    <h3>

                      <span style="font-weight: bold">Net Change in Fund Balance</span>
                      <br>
                      (as of Today)
                    </h3>
                  </div>
                </div>
              </div>
              <!-- Money Tracking 3 -->
            </div>

            <hr>

            <div class="row">
              <!-- Table Actions -->
              <div class="table-toolbar pull-right">
                <!-- Sort Dropdown -->
                <div class="dropdown" data-toggle="tooltip" data-placement="top" title="Sort by Field">
                  <a href="#" class="btn btn-white dropdown-toggle sort-toggle" data-toggle="dropdown" id="sortFieldTxt">
                    Title
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="#" class="sortFieldBtn" data-field="list-title">Title</a></li>
                    <li><a href="#" class="sortFieldBtn" data-field="list-process">Process</a></li>
                    <li><a href="#" class="sortFieldBtn" data-field="list-dos">Date Submitted</a></li>
                    <li><a href="#" class="sortFieldBtn" data-field="list-datePended">Date Pended</a></li>
  									<li><a href="#" class="sortFieldBtn" data-field="list-status">Status</a></li>
                  </ul>
                </div>
  							<!-- Sort Asc/Des -->
                <div class="sortAsc" data-toggle="tooltip" data-placement="top" title="Sort Up/Down">
                  <button class="btn btn-white" id="sortOrderBtn">
                    <i class="fa fa-long-arrow-down" id="sortOrderIcon"></i>
                  </button>
                </div>
              </div>
              <!-- Main Table -->
              <table class="table table-hover table-responsive"
              id="activityTable"
              data-toggle="table"
  						data-show-header="false">
                <thead>
                  <tr>
                    <th data-field="list-title" data-align="left" data-sortable="true">Title</th>
  									<th data-field="list-process" data-align="left" data-sortable="true">Process</th>
                    <th data-field="list-dos" data-align="right" data-sortable="true">Date Submmited</th>
                    <th data-field="list-datePended" data-align="right" data-sortable="true">Date Pended</th>
                    <th data-field="list-status" data-align="center" data-sortable="true">Status</th>
                  </tr>
                </thead>
                <tbody>

                  <?php # This block uses HEREDOC to print out, check PHP's HEREDOC documentation.
                  foreach($orgActivities as $row) {
                    if($row['status'] == "Pending") {
                      $buttonType = "warning";
                    }
                    elseif($row['status'] == "Declined") {
                      $buttonType = "danger";
                    }
                    elseif($row['status'] == "Approved") {
                      $buttonType = "success";
                    }
                  $dos = date("M d, Y g:i A", strtotime($row['dateSubmitted']));
                  echo <<< EOT
                  <tr id={$row['activityID']}>
                    <td class="">
                      <span class="list-title">{$row['title']}</span>
                      <span class="list-desc">{$row['description']}</span>
                    </td>
                    <td class="list-process">{$row['processType']}</td>
                    <td class="list-dos">
                      Date Submitted:
                      <span class="dos">{$dos}</span>
                    </td>
                    <td class="list-datePended">
                      Date Pended:
                      <span class="datePended">{$row['datePendedCSO']}</span>
                    </td>
                    <td class="list-status">
                      <span class="label label-$buttonType">{$row['status']}</span>
                    </td>
                  </tr>

EOT;
};
                  ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Delete Organization -->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="DeclineModal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h3 class="modal-title text-center" id="myModalLabel">Delete Org</h3>
		      </div>
		      <div class="modal-body">
		        <h4 class="text-center">
							You are about to delete <br>
               <span style="font-weight: bold">
                 <?= $orgData['acronym'] ?> <br> <?= $orgData['name'] ?>
               </span>
						</h4>
						<div class="modalButtons text-center">
              <form method="post" action="<?= site_url('admin/delete') ?>">
							<button class="btn btn-info btn-lg" id="contEdit">Cancel</button>
                <input type="hidden" name="orgID" value="<?= $orgData['orgID'] ?>" />
							  <button type="submit" class="btn btn-danger btn-lg">Delete <?= $orgData['acronym'] ?></button>
              </form>
						</div>

		      </div>
		    </div>
		  </div>
		</div>
    <!-- Sort Inputs -->
    <input type="text" value="desc" id="sortOrder" style="display: none">
    <input type="text" value="list-dos" id="sortField" style="display: none">
  </body>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/js/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
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

  <script type="text/javascript">
  var $table = $('#activityTable');
  $table.bootstrapTable({
    pagination: true,
    onlyInfoPagination: false,
    search: true,
    toolbar: '.table-toolbar',
    toolbarAlign: 'right',
    pageSize: 5,
    formatShowingRows: function(pageFrom, pageTo, totalRows) {

    },
    formatRecordsPerPage: function(pageNumber) {

    },
    formatDetailPagination: function(totalRows) {
      return ;
    },
    onClickRow: function(row, $element){
    }
  });

  </script>

  <script type="text/javascript">
		var pageID = '';
    var initials = "<?= $orgData['acronym']?>";
		$('#activityTable').on('click-row.bs.table', function (row, $element, field) {
			pageID = $(field).attr('id');

			window.location.href = "<?= site_url('admin/activity-page/')  ?>" + initials + "/" + pageID;
		});
	</script>

</html>
