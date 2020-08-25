<!DOCTYPE html>
<html dir="ltr" lang="en">

<!-- Mirrored from grandetest.com/theme/findhouse-html/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Aug 2020 04:46:13 GMT -->
<head>
    <?php $this->load->view('Frontend/Template/header'); ?>
</head>

<body >

<div class="wrapper">

    <div class="preloader"></div>

    <!-- Main Header Nav -->
    <?php $this->load->view('Frontend/Template/nav_bar'); ?>
    <!-- Main Header Nav For Mobile -->


    <!-- Home Design -->
    <?php $this->load->view($content); ?>


    <?php $this->load->view('Frontend/Template/footer'); ?>
    <!-- Our Footer -->

</div>
<!-- Wrapper End -->
<?php $this->load->view('Frontend/Template/scripts'); ?>
</body>

</html>