<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from grandetest.com/theme/findhouse-html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 04:48:39 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/style.css">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="<?php echo base_url('assets') ?>/css/responsive.css">
<!-- Title -->
<title><?php echo $title ?></title>
<!-- Favicon -->
<link href="<?php echo base_url('assets') ?>/images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="<?php echo base_url('assets') ?>/images/favicon.ico" sizes="128x128" rel="shortcut icon" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper">
    <div class="preloader"></div>

    <!-- Main Header Nav -->
    <header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
        <div class="container-fluid p0">
            <!-- Ace Responsive Menu -->
            <nav>
                <!-- Menu Toggle btn-->
                <div class="menu-toggle">
                    <img class="nav_logo_img img-fluid" src="<?php echo base_url('assets') ?>/images/header-logo.png" alt="header-logo.png">
                    <button type="button" id="menu-btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <a href="#" class="navbar_brand float-left dn-smd">
                    <img class="logo1 img-fluid" src="<?php echo base_url('assets') ?>/images/header-logo2.png" alt="header-logo.png">
                    <img class="logo2 img-fluid" src="<?php echo base_url('assets') ?>/images/header-logo2.png" alt="header-logo2.png">
                    <span>FindHouse</span>
                </a>
                <!-- Responsive Menu Structure-->
                <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                    <li>
                        <a href="#"><span class="title"></span></a>
                        <!-- Level Two-->

                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Header Nav For Mobile -->
    <div id="page" class="stylehome1 h0">
        <div class="mobile-menu">
            <div class="header stylehome1">
                <div class="main_logo_home2 text-center">
                    <img class="nav_logo_img img-fluid mt20" src="<?php echo base_url('assets') ?>/images/header-logo2.png" alt="header-logo2.png">
                    <span class="mt20">FindHouse</span>
                </div>
            </div>
        </div><!-- /.mobile-menu -->
    </div>

    <!-- Inner Page Breadcrumb -->
    <section class="inner_page_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">

                </div>
            </div>
        </div>
    </section>

    <!-- Our LogIn Register -->
    <section class="our-log bgc-fa">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 offset-lg-3">
                    <div class="login_form inner_page">
                        <form method="POST" action="<?php echo base_url('BLogin/signIn') ?>">
                            <div class="heading">
                                <h3 class="text-center">Login to your account</h3>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txt_username" name="txt_username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-log btn-block btn-thm2">Login</button>
                            <br/><br/><br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Footer Bottom Area -->
    <section class="footer_middle_area pt40 pb40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="footer_menu_widget">

                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="copyright-widget text-right">
                        <p>© <script>
                                var dt = new Date();
                                document.write(dt.getFullYear());
                            </script> BuyLand.lk. Made with love.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Wrapper End -->
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/snackbar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/simplebar.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/scrollto.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/jquery.counterup.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/progressbar.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/slider.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/wow.min.js"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="<?php echo base_url('assets') ?>/js/script.js"></script>
</body>
</html>