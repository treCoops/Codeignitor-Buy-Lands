<?php
    $User_Session = $this->session->userdata('User_Session');
    if ($User_Session == null) {
        redirect(base_url('BLogin/notLoggedIn'));
    }
?>


<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">My Profile</h2>
        <p>Update profile and change password!</p>
    </div>
</div>

<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-xl-2">
                <h4>Profile Information</h4>
            </div>
            <div class="col-xl-10">
                <form id="formUpdateProfile" enctype="multipart/form-data" name="formUpdateProfile" role="form" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label>Upload land images <a href="javascript:void(0)"
                                                             class="custom-file-container__image-clear" title="Clear Image">✘</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" id="txtImages" name="txtImages" accept="image/*"
                                           class="custom-file-container__custom-file__custom-file-input">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        <p>*minimum 260px x 260px</p>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="txtUsername">Username</label>
                            <input type="text" class="form-control" id="txtUsername"
                                   value="<?php echo $User_Session['Username']; ?>" name="txtUsername">
                            <input type="hidden" class="form-control" id="txtCurrentImage"
                                   value="<?php echo $User_Session['Profile_Pic']; ?>" name="txtCurrentImage">
                            <input type="hidden" class="form-control" id="txtUserId"
                                   value="<?php echo $User_Session['ID']; ?>" name="txtUserId">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="txtFullName">Fullname</label>
                            <input type="txt" class="form-control" id="txtFullName"
                                   value="<?php echo $User_Session['Full_Name']; ?>" name="txtFullName">
                        </div>
                    </div>
                    <div class="col-xl-12 text-right">
                        <div class="my_profile_setting_input">
                            <button class="btn btn2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-xl-2">
                <h4>Change password</h4>
            </div>
            <div class="col-xl-10">
                <form id="formPassword" name="formPassword" role="form" method="POST">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="txtOldPassword">Old Password</label>
                                <input type="password" class="form-control" id="txtOldPassword" name="txtOldPassword">
                                <input type="hidden" class="form-control" id="txtUserId"
                                       value="<?php echo $User_Session['ID']; ?>" name="txtUserId">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="txtNewPassword">New Password</label>
                                <input type="password" class="form-control" id="txtNewPassword" name="txtNewPassword">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="txtConfirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="txtConfirmPassword" name="txtConfirmPassword">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="my_profile_setting_input float-right fn-520">
                                <button class="btn btn2">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



<script>

    $(document).ready(function() {
        let firstUpload = new FileUploadWithPreview('myFirstImage');
        let defaultImage = [];
        defaultImage[0] = '../assets/images/profile/'+$('#txtCurrentImage').val();
        firstUpload.addImagesFromPath(defaultImage);

        $("#formUpdateProfile").validate({
            ignore: [],
            rules: {
                txtUsername: {
                    required: true
                },
                txtFullName: {
                    required: true
                }
            },
            messages: {
                txtUsername: {
                    required: 'Username required!'
                },
                txtFullName: {
                    required: 'Fullname required!'
                }
            },
            submitHandler: function (form) {

                let formData = new FormData(form);
                $('#loader').show();

                $.ajax({
                    url: '<?php echo base_url('BProfile/updateProfile'); ?>',
                    data:  formData,
                    dataType: 'json',
                    method: 'post',
                    processData: false,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    cache: false,
                    error: function (error) {
                        $('#loader').hide()
                        console.log(error.message);
                        $.notify("Internal server error", "error");
                    },
                    success: function (r) {
                        console.log(r);
                        $('#loader').hide()
                        $.notify(r.message, "success");

                        $.confirm({
                            icon: 'fa fa-sign-out',
                            title: 'Logout needed',
                            content: 'Press logout and login again.',
                            type: 'orange',
                            typeAnimated: true,
                            buttons: {
                                confirm: {
                                    text: 'Logout',
                                    btnClass: 'btn-yellow',
                                    action: function(){
                                        location.href ='<?php echo base_url('BLogin/logOut')?>';
                                    }
                                },
                            }
                        });
                }
                });
            }
        });


        $("#formPassword").validate({
            ignore: [],
            rules: {
                txtOldPassword: {
                    required: true
                },
                txtNewPassword: {
                    required: true,
                    equalTo: '#txtConfirmPassword'
                },
                txtConfirmPassword: {
                    required: true,
                    equalTo: '#txtNewPassword'
                }
            },
            messages: {
                txtOldPassword: {
                    required: 'Current password required!'
                },
                txtNewPassword: {
                    required: 'New password required!',
                    equalTo: "Password and confirm password is not matching!."
                },
                txtConfirmPassword: {
                    required: 'Confirm password required!',
                    equalTo: "Password and confirm password is not matching!."
                }
            },
            submitHandler: function (form) {

                let formData = new FormData(form);
                $('#loader').show();

                $.ajax({
                    url: '<?php echo base_url('BProfile/updatePassword'); ?>',
                    data: $('#formPassword').serializeArray(),
                    dataType: 'json',
                    method: 'post',
                    error: function (error) {
                        $('#loader').hide()
                        console.log(error.message);
                        $.notify("Internal server error", "error");
                    },
                    success: function (r) {
                        console.log(r);
                        $('#loader').hide()
                        if(r.status === 200){
                            $.notify(r.message, "success");

                            $.confirm({
                                icon: 'fa fa-sign-out',
                                title: 'Logout needed',
                                content: 'Press logout and login again.',
                                type: 'orange',
                                typeAnimated: true,
                                buttons: {
                                    confirm: {
                                        text: 'Logout',
                                        btnClass: 'btn-yellow',
                                        action: function(){
                                            location.href ='<?php echo base_url('BLogin/logOut')?>';
                                        }
                                    },
                                }
                            });
                        }

                        if(r.status === 500){
                            $.notify(r.message, "error");
                        }

                    }
                });
            }
        });

    });





</script>