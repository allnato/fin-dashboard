<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $this->session->userdata('acronym')?> | Activity Page</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap-Table CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-table.min.css">

    <!-- Hover CSS -->
    <link href="<?php echo base_url(); ?>assets/css/hover.css" rel="stylesheet" media="all">

    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.css" rel="stylesheet" />


    <!-- Font Awesome :-) -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cso_table.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cso_page.css">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/icon/favicon-96x96.png">

    <style media="screen">
      p{
        margin: 0px;
        font-size: 1.1em;
      }
      .card-content i{
        opacity: .8
      }
      .card{
        margin: 15px 0;
        cursor: pointer;
        cursor: hand;
      }
      .card:hover{
        font-weight: bold;
      }
      .toolbar{
        padding: 0px 15px;
      }
      .addOrgText{
        padding-right: 15px;
      }
      .search{
        display: inline-block;
        margin-left: 40px;
      }
      .search .form-group{
        display: inline-block;
      }
      .search .input-group-addon{
        display: inline;
      }
      /*#sortOrderBtn{
        background-color: #bdbdbd;
      }*/

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
              <a class="navbar-brand nav-title" href="">
                <i class="fa fa-users"></i> Organization List
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
            <!-- Toolbar -->
            <div class="toolbar clearfix">
              <div class="pull-right">
                <!-- Sort Asc/Des -->
                <button class="btn" id="sortOrderBtn" data-toggle="tooltip" data-placement="top" title="Sort">
                  <i class="fa fa-long-arrow-down" id="sortOrderIcon"></i>
                </button>
                <!-- Search -->
                <div class="input-group search">
                  <span class="input-group-addon"><i class="fa fa-search"></i></span>
                  <input type="text" placeholder="Search" class="form-control quicksearch">
                </div>
              </div>
              <!-- Add new org -->
              <div class="addOrganization pull-left">
                <button class="btn btn-success" id="addOrgBtn" data-toggle="modal" data-target="#addOrgModal">
                  <span class="addOrgText">Add New Organization</span>
                  <i class="fa fa-plus-square"></i>
                </button>
              </div>
            </div>
            <!-- Org list -->
            <div class="org-list">



              <?php # This block uses HEREDOC to print out, check PHP's HEREDOC documentation.
              foreach($initials as $name) {
              $trim = trim($name['acronym']);
              echo <<< EOT
              <div class="col-xs-3">
                <div class="card hvr-grow-shadow">
                  <div class="card-content">
                    <p class="text-center"><i class="fa fa-users pull-left"></i><span class="org-name">{$trim}</span></p>
                  </div>
                </div>
              </div>

EOT;
};
              ?>
            </div>


          </div>
        </div>
      </div>

    </div>

    <!-- Create Org Modal -->
    <div class="modal fade" id="addOrgModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add New Organization</h4>
          </div>
          <div class="modal-body">
            <form action="<?= site_url('admin/newOrg') ?>" method="post">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-id-card fa-lg"></i>
                </span>
                <input type="text" class="form-control" placeholder="Organization Name" name="name">
              </div>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-trash fa-lg"></i>
                </span>
                <input type="text" class="form-control" placeholder="Org Initials (e.g. ACCESS, LSCS, MaFia)" name="acronym">
              </div>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-address-book"></i>
                </span>
                <input type="text" class="form-control" placeholder="DLSU email of the organization" name="email">
              </div>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-unlock-alt fa-lg"></i>
                </span>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-lock fa-lg"></i>
                </span>
                <input type="password" class="form-control" placeholder="Retype Password">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
            <button type="submit" href="#" class="btn btn-success">Create</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Sort Inputs -->
    <input type="text" value="desc" id="sortOrder" style="display: none">
  </body>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/isotope.pkgd.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/randomColor.js" type="text/javascript"></script>
  <!--  Charts Plugin -->
  <script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

  <!-- Material Dashboard javascript methods -->
  <script src="<?php echo base_url(); ?>assets/js/material-dashboard.js"></script>

  <!-- Moment JS -->
  <script src="<?php echo base_url(); ?>assets/js/moment.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/cso_org_list.js"></script>


  <script type="text/javascript">

		<?php
			$flash = $this->session->flashdata('addOrganization');
			if($flash == 'true'):
		?>
		$.notify({
			icon: "check",
			message: "Add Organization - Successfully added a new Organization",
		},{
				type: 'success',
				timer: 4000,
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
			message: "Add Organization - Error in creating a new activity. Fields already exists",
		},{
				type: 'danger',
				timer: 4000,
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
    $('.card').click(function(event) {
      console.log($(this).find('.org-name').text());
      window.location.href = "<?= site_url('admin/org/')  ?>" + $(this).find('.org-name').text().trim();
    });
  </script>
</html>
