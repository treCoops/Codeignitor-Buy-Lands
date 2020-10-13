<?php

    $User_Session = $this->session->userdata('User_Session');
    if ($User_Session == null) {
        redirect(base_url('BLogin/notLoggedIn'));
    }

?>

<header class="header-nav menu_style_home_one style2 menu-fixed main-menu">
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
                <span>BuyLands.lk</span>
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">

                <li class="user_setting">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" style="width: 68px;" src="<?php echo base_url('assets') ?>/images/profile/<?php echo $User_Session['Profile_Pic'] ?>" alt="e1.png"> <span class="dn-1199"><?php echo $User_Session['Full_Name'] ?></span></a>
                        <div class="dropdown-menu">
                            <div class="user_set_header">
                                <img class="float-left rounded-circle" style="width: 65px;" src="<?php echo base_url('assets') ?>/images/profile/<?php echo $User_Session['Profile_Pic'] ?>" alt="e1.png">
                                <p><?php echo $User_Session['Full_Name'] ?></p>
                            </div>
                            <div class="user_setting_content">
                                <a class="dropdown-item active" href="<?php echo base_url('BProfile/viewManageProfile') ?>">My Profile</a>
                                <a class="dropdown-item" href="<?php echo base_url('BLogin/logOut')?>">Log out</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>