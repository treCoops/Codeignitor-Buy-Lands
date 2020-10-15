<header class="header-nav menu_style_home_one style2 home3 navbar-scrolltofixed stricky main-menu">
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
            <a href="<?php echo base_url('Home'); ?>" class="navbar_brand float-left dn-smd">
                <img class="logo1 img-fluid" src="<?php echo base_url('assets') ?>/images/buyland.png" alt="header-logo.png">
                <img class="logo2 img-fluid" src="<?php echo base_url('assets') ?>/images/buyland.png" alt="header-logo2.png">
                <span>BuyLands.lk</span>
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <li>
                    <a href="<?php echo base_url('Home'); ?>" class="title">Home</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Property/all') ?>?type=land" class="title">All Lands</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Property/all') ?>?type=house" class="title">All Houses</a>
                </li>
                <li class="last">
                    <a href="<?php echo base_url('Contact'); ?>"><span class="title">Contact</span></a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2 text-center">
                <img class="nav_logo_img img-fluid mt20" src="<?php echo base_url('assets') ?>/images/buyland.png" alt="header-logo2.png">
                <span class="mt20">BuyLands.lk</span>
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item list_s"><a href=""><span class="flaticon-user"></span></a></li>
                <li class="list-inline-item"><a href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div><!-- /.mobile-menu -->
    <nav id="menu" class="stylehome1">
        <ul>
            <li><a href="<?php echo base_url('Home'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('Property/allLands') ?>?type=land">All Lands</a></li>
            <li><a href="<?php echo base_url('Property/allHouses') ?>?type=house">All Houses</a></li>
            <li><a href="<?php echo base_url('Contact'); ?>">Contact</a></li>
        </ul>
    </nav>
</div>