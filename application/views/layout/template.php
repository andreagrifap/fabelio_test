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
  <link rel="icon" href="<?=base_url();?>assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url();?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?=base_url();?>assets/css/argon.css?v=1.2.0" type="text/css">
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
              <a class="nav-link <?php if(isset($module) && $module == "link_submission"){ echo 'active';} ?>" href="<?=base_url('main/link_submission');?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Link Submission</span>
              </a>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if(isset($module) && $module == "link_list"){ echo 'active';} ?>" href="<?=base_url('main/link_list');?>">
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
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->

    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Link Submission</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Price Monitor</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php if(!empty($page)){echo $page;}else{echo "default";} ?></li>
                </ol>
              </nav>
            </div>

            <?php if($module!="link_list"){ ?>
                <div class="col-lg-6 col-5 text-right">
                    <a href="<?=base_url('main/link_list');?>" class="btn btn btn-neutral">All Links <i class="fa fa-chevron-right"></i></a>
                </div>
            <?php }else{ ?>
                <div class="col-lg-6 col-5 text-right">
                    <a href="<?=base_url('main/link_submission');?>" class="btn btn btn-neutral"><i class="fa fa-plus fa-fw"></i> Add New Product Link</a>
                </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">

        <?php $this->load->view($content); ?>
    
      <!-- Footer -->
      <footer class="footer pt-0 mt-6">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Andre Agrifa Pandiangan</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://github.com/andreagrifap/fabelio_test" class="nav-link" target="_blank">Documentation</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?=base_url();?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url();?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=base_url();?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=base_url();?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=base_url();?>assets/js/argon.js?v=1.2.0"></script>
</body>

</html>