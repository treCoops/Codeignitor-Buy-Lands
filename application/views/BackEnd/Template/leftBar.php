<div class="dashboard_sidebar_menu dn-992">
    <ul class="sidebar-menu">
        <li class="header"><img src="<?php echo base_url('assets') ?>/images/buyland.png" alt="header-logo2.png">
            BuyLand
        </li>
        <li class="title"><span>Main</span></li>
        <li class="treeview"><a href="<?php echo base_url('BDashBoard') ?>"><i class="flaticon-layers"></i><span> Dashboard</span></a>
        </li>
        <li class="treeview"><a href="page-message.html"><i class="flaticon-envelope"></i><span> Message</span></a></li>
        <li class="title"><span>Manage Properties</span></li>
        <li class="treeview">
            <a href="page-my-properties.html"><i class="flaticon-house-2"></i> <span>Lands</span><i
                        class="fa fa-angle-down pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('BLand/viewAddLand') ?>"><i class="fa fa-circle"></i> Add Land</a></li>
                <li><a href="<?php echo base_url('BLand/viewManageLands') ?>"><i class="fa fa-circle"></i> Manage Lands</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="page-my-properties.html"><i class="flaticon-home"></i> <span>Houses</span><i
                        class="fa fa-angle-down pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url('BHouse/viewAddHouse') ?>"><i class="fa fa-circle"></i> Add House</a></li>
                <li><a href="<?php echo base_url('BHouse/viewManageHouses') ?>"><i class="fa fa-circle"></i> Manage Houses</a></li>
                <li><a href="<?php echo base_url('BHouse/viewAddFloorPlan') ?>"><i class="fa fa-circle"></i> Add Floor Plan</a></li>
                <li><a href="<?php echo base_url('BHouse/viewManageFloorPlans') ?>"><i class="fa fa-circle"></i> Manage Floor Plans</a></li>
            </ul>
        </li>

        <li class="title"><span>Manage Account</span></li>
        <li><a href="page-my-profile.html"><i class="flaticon-user"></i> <span>My Profile</span></a></li>
        <li><a href="<?php echo base_url('BLogin/logOut')?>"><i class="flaticon-logout"></i> <span>Logout</span></a></li>
    </ul>
</div>
