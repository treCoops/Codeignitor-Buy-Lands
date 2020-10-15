<?php ?>

<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="breadcrumb_content">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Home')?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                    <h4 class="breadcrumb_title">Contact Us</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-contact pb0 bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="form_grid">
                    <h4 class="mb5">Send Us An Email</h4>
                    <p>Ask your question from us. We are ready to help you.</p>
                    <form class="contact_form" id="contact_form" name="contact_form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="txtName" name="txtName" class="form-control required" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="txtEmail" name="txtEmail" class="form-control required"  type="text" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="txtPhone" name="txtPhone" class="form-control required" type="text" placeholder="Phone (071...)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="txtSubject" name="txtSubject" class="form-control required" type="text" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea id="txtDescription" name="txtDescription" class="form-control required" rows="8" placeholder="Your Message"></textarea>
                                </div>
                                <div class="form-group mb0">
                                    <button type="submit" class="btn btn-lg btn-thm">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="contact_localtion">
                    <h4>Contact Us</h4>
                    <p>We’re reimagining how you buy, sell properties. It’s now easier to get into a place you love. So let’s do this, together.</p>
                    <div class="content_list">
                        <h5>Address</h5>
                        <p>No.320/B/5, Siri Nanda Jothikarama, <br>Thalawathugoda, Colombo</p>
                    </div>
                    <div class="content_list">
                        <h5>Phone</h5>
                        <p>+94 77-0565-532</p>
                    </div>
<!--                    <div class="content_list">-->
<!--                        <h5>Mail</h5>-->
<!--                        <p><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bdd4d3dbd2fddbd4d3d9d5d2c8ced893ded2d0">[email&#160;protected]</a></p>-->
<!--                    </div>-->
<!--                    <div class="content_list">-->
<!--                        <h5>Skype</h5>-->
<!--                        <p>findhouse.com</p>-->
<!--                    </div>-->
                    <h5>Follow Us</h5>
                    <ul class="contact_form_social_area">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p0 mt50">
        <div class="row">
            <div class="col-lg-12">
                <div class="h600" id="map-canvas"></div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {

        $("#contact_form").validate({
            ignore: [],
            rules: {
                txtName: {
                    required: true
                },
                txtEmail: {
                    required: true,
                    email: true
                },
                txtPhone: {
                    required: true,
                    digits: true,
                    maxlength: 10,
                    minlength: 10
                },
                txtSubject: {
                    required: true
                },
                txtDescription: {
                    required: true
                }
            },
            messages: {
                txtName: {
                    required: 'Please enter your name.'
                },
                txtEmail: {
                    required: 'Please enter your email address.',
                    email: 'Enter a valid email address.'
                },
                txtPhone: {
                    required: 'Please enter your contact number.',
                    digits: 'Enter a valid contact number',
                    maxlength: 'A valid contact number can have 10 digits only.',
                    minlength: 'A valid contact number can have 10 digits only.'
                },
                txtSubject: {
                    required: 'Please enter your message subject.'
                },
                txtDescription: {
                    required: 'Please enter your message.'
                }
            },
            submitHandler: function (form) {

                $('#loader').show()

                $.ajax({
                    url: '<?php echo base_url('BMessage/sendMessage'); ?>',
                    data: $('#contact_form').serializeArray(),
                    dataType: 'json',
                    method: 'post',
                    error: function (error) {
                        $('#loader').hide()
                        $.notify("Server error, Please try again later.", "error");
                    },
                    success: function (r) {
                        $('#loader').hide()

                        if (r.status === 200) {
                            $.notify(r.message, "success");
                        }

                        if (r.status === 500) {
                            $.notify(r.message, "error");
                        }
                    }
                });
            }
        });
    });

</script>