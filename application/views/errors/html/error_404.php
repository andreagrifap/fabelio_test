<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Price Monitor</title>
  <!-- Favicon -->
  <link rel="icon" href="<?=config_item('base_url');?>/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=config_item('base_url');?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=config_item('base_url');?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?=config_item('base_url');?>/assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <h2>Price Monitor App</h2>
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link <?php if(isset($module) && $module == "link_submission"){ echo 'active';} ?>" href="<?=config_item('base_url').'/main/link_submission';?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Link Submission</span>
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($module) && $module == "link_list"){ echo 'active';} ?>" href="<?=config_item('base_url').'/main/link_list';?>">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Link List</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/andreagrifap/price_monitor_app" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Github</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  
  <!-- Main content -->
<div class="main-content" id="panel">

    <!-- Page content -->
    <div class="container-fluid mt--6">
		<div class="row">
		<div class="col-md-12" style="margin-top:200px">
			<center>
				<h1 style='font-size:40px'>404 Page Not Found</h1>
				<a href="<?=config_item('base_url');?>" class="btn btn-primary">Home</a>
			</center>
		</div>
		</div>
  	</div>
</div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?=config_item('base_url');?>/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=config_item('base_url');?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=config_item('base_url');?>/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=config_item('base_url');?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=config_item('base_url');?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=config_item('base_url');?>/assets/js/argon.js?v=1.2.0"></script>
</body>

</html>