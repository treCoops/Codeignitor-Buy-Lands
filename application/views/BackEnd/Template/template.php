<?php

$User_Session = $this->session->userdata('User_Session');
if ($User_Session == null) {
    redirect(base_url('Login/notLoggedIn'));
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php $this->load->view('BackEnd/Template/header'); ?>
</head>
<body>
<div class="wrapper">
    <div class="preloader"></div>

    <!-- Main Header Nav -->
    <?php $this->load->view('BackEnd/Template/topBar'); ?>

    <?php $this->load->view('BackEnd/Template/leftBar'); ?>

    <?php $this->load->view('BackEnd/Template/mobileNav'); ?>


    <!-- Our Dashbord -->
    <section class="our-dashbord dashbord bgc-f7 pb50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
                <div class="col-lg-9 col-xl-10 maxw100flex-992">
                    <div class="row">
<!--                        <div class="col-lg-12">-->
<!--                            <div class="dashboard_navigationbar dn db-992">-->
<!--                                <div class="dropdown">-->
<!--                                   -->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <?php $this->load->view($content) ?>
                        <div class="row mt50">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="copyright-widget text-center">
                                    <p>©
                                        <script>
                                            var dt = new Date();
                                            document.write(dt.getFullYear());
                                        </script>
                                        BuyLand.lk. Made with love.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<!-- Wrapper End -->
<?php $this->load->view('BackEnd/Template/footer'); ?>
</body>
</html>