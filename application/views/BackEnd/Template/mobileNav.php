
<div id="page" class="stylehome1 h0">
    <div class="mobile-menu">
        <div class="header stylehome1">
            <div class="main_logo_home2 text-center">
                <img class="nav_logo_img img-fluid mt20" src="<?php echo base_url('assets') ?>/images/buyland.png" alt="header-logo2.png">
                <span class="mt20">BuyLands.lk</span>
            </div>
            <ul class="menu_bar_home2">
                <li class="list-inline-item list_s"><a href="#"><span class="flaticon-user"></span></a></li>
                <li class="list-inline-item"><a href="#menu"><span></span></a></li>
            </ul>
        </div>
    </div>
    <nav id="menu" class="stylehome1">
        <ul>
            <li><span>Main</span>
                <ul>
                    <li><a href="<?php echo base_url('BDashboard') ?>">Dashboard</a></li>
                    <li><a href="<?php echo base_url('BMessage/viewMessage') ?>">Message</a></li>
                </ul>
            </li>

            <li><span>Lands</span>
                <ul>
                    <li><a href="<?php echo base_url('BLand/viewAddLand') ?>">Add Land</a></li>
                    <li><a href="<?php echo base_url('BLand/viewManageLands') ?>">Manage Lands</a></li>
                </ul>
            </li>

            <li><span>Houses</span>
                <ul>
                    <li><a href="<?php echo base_url('BHouse/viewAddHouse') ?>">Add House</a></li>
                    <li><a href="<?php echo base_url('BHouse/viewManageHouses') ?>">Manage Houses</a></li>
                    <li><a href="<?php echo base_url('BHouse/viewAddFloorPlan') ?>">Add Floor Plan</a></li>
                    <li><a href="<?php echo base_url('BHouse/viewManageFloorPlans') ?>">Manage Floor Plans</a></li>
                </ul>
            </li>

            <li><a href="<?php echo base_url('BProfile/viewManageProfile') ?>"><span class="flaticon-user"></span> My Profile</a></li>
            <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="<?php echo base_url('BLogin/logOut')?>"><span class="flaticon-logout"></span> Logout</a></li>
        </ul>
    </nav>
</div>