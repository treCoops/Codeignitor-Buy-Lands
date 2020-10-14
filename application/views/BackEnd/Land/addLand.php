<?php

$User_Session = $this->session->userdata('User_Session');
if ($User_Session == null) {
    redirect(base_url('BLogin/notLoggedIn'));
}
?>


<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Add New Land</h2>
        <p>Please fill up required fields!</p>
    </div>
</div>
<div class="col-lg-12">
    <form id="formAddLand" enctype="multipart/form-data" name="formAddLand" role="form" method="POST">
        <div class="my_dashboard_review">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Create New Land</h4>
                    <div class="my_profile_setting_input form-group">
                        <label for="txtLandTitle">Land Title</label>
                        <input type="text" class="form-control" name="txtLandTitle" id="txtLandTitle">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_profile_setting_textarea">
                        <label for="txtLandDescription">Land Description</label>
                        <textarea class="form-control" id="txtLandDescription" name="txtLandDescription" rows="7"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtLandPrice">Price</label>
                        <input type="text" class="form-control" name="txtLandPrice" id="txtLandPrice">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtLandArea">Area</label>
                        <input type="text" class="form-control" name="txtLandArea" id="txtLandArea">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Status</label>
                        <select class="selectpicker" id="cmbLandStatus" name="cmbLandStatus" data-live-search="true" data-width="100%">
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Location</h4>
                    <div class="my_profile_setting_input form-group">
                        <label for="txtLandAddress">Address</label>
                        <input type="text" class="form-control" name="txtLandAddress" id="txtLandAddress">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtLandCity">City</label>
                        <input type="text" class="form-control" name="txtLandCity" id="txtLandCity">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Province</label>
                        <select class="selectpicker" id="cmbLandProvince" name="cmbLandProvince" data-live-search="true" data-width="100%">
                            <?php foreach ($province as $data){ ?>
                                <option value="<?php echo $data->province_id ?>"><?php echo $data->province_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>District</label>
                        <select class="selectpicker" id="cmbLandDistrict" name="cmbLandDistrict" data-live-search="true" data-width="100%">
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Land media</h4>
                </div>
                <div class="col-lg-12">
                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>Upload land images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">✘</a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" id="txtImages" name="txtImages[]" accept="image/*" class="custom-file-container__custom-file__custom-file-input" multiple>
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="mb30">Land Plan</h4>
                </div>
                <div class="col-lg-12">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload land plan image <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">✘</a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" id="txtPlanImage" name="txtPlanImage" accept="image/*" class="custom-file-container__custom-file__custom-file-input">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtYoutubeLink">Youtube URL</label>
                        <input type="text" class="form-control" name="txtYoutubeLink" id="txtYoutubeLink">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="my_profile_setting_input">
                        <button type="reset" class="btn btn1 float-left">Clear</button>
                        <button type="submit" class="btn btn2 float-right">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<script>

    function populateCMBDistrict(id){
        $("#cmbLandDistrict").empty();

        $.ajax({
            url: "<?php echo base_url(''); ?>/BLand/cGetRelatedDistrict",
            data: {ID : id},
            method: "post",
            dataType: "json",
            error: function(error){
                console.log(error);
            },
            success: function(r){
                r.data.forEach(function(obj) {
                    $("#cmbLandDistrict").append('<option value="'+obj.district_id+'">'+obj.district_name+'</option>');
                    $("#cmbLandDistrict").selectpicker("refresh");
                })
            }
        });
    }

    $(document).ready(function() {
        let secondUpload = new FileUploadWithPreview('mySecondImage');
        let firstUpload = new FileUploadWithPreview('myFirstImage');
        populateCMBDistrict($('#cmbLandProvince option:selected').val())

        $('#cmbLandProvince').change(function(){
            populateCMBDistrict($(this).val());
        });


        $("#formAddLand").validate({
            ignore: [],
            rules: {
                txtLandTitle: {
                    required: true
                },
                txtLandDescription: {
                    required: true
                },
                txtLandPrice: {
                    required: true,
                    digits: true
                },
                txtLandArea: {
                    required: true
                },
                txtLandAddress: {
                    required: true
                },
                txtLandCity: {
                    required: true
                },
                cmbLandProvince: {
                    required: true
                },
                cmbLandDistrict: {
                    required: true
                },
                txtImages: {
                    required: true
                }
            },
            messages: {
                txtLandTitle: {
                    required: 'Land title required!'
                },
                txtLandDescription: {
                    required: 'Land description required!'
                },
                txtLandPrice: {
                    required: 'Land price required!',
                    digits: 'Land price must have digits only!'
                },
                txtLandArea: {
                    required: 'Land area required!'
                },
                txtLandAddress: {
                    required: 'Land located address required!'
                },
                txtLandCity: {
                    required: 'Land located city required!'
                },
                txtImages: {
                    required: 'Land images required!'
                }
            },
            submitHandler: function (form) {

                let formData = new FormData(form);
                $('#loader').show()

                $.ajax({
                    url: '<?php echo base_url('BLand/addLand'); ?>',
                    data: formData,
                    dataType: 'json',
                    method: 'post',
                    processData: false,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    cache: false,
                    error: function (error) {
                        $('#loader').hide()
                        $.notify("Internal server error", "error");
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


