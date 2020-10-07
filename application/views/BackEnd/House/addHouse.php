<?php

$User_Session = $this->session->userdata('User_Session');
if ($User_Session == null) {
    redirect(base_url('BLogin/notLoggedIn'));
}
?>


<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Add New House</h2>
        <p>Please fill up required fields!</p>
    </div>
</div>
<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Create New House</h4>
                <div class="my_profile_setting_input form-group">
                    <label for="txtHouseTitle">House Title</label>
                    <input type="text" class="form-control" name="txtHouseTitle" id="txtHouseTitle">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_profile_setting_textarea">
                    <label for="txtHouseDescription">House Description</label>
                    <textarea class="form-control" id="txtHouseDescription" name="txtHouseDescription" rows="7"></textarea>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="txtHousePrice">Price</label>
                    <input type="text" class="form-control" name="txtHousePrice" id="txtHousePrice">
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Type</label>
                    <select class="selectpicker" id="cmbHouseType" name="cmbHouseType" data-live-search="true" data-width="100%">
                        <option value="">Select a house type</option>
                        <option value="Status1">House</option>
                        <option value="Status2">Condo</option>
                        <option value="Status3">Bungalow</option>
                        <option value="Status4">Apartment</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Status</label>
                    <select class="selectpicker" id="cmbHouseStatus" name="cmbHouseStatus" data-live-search="true" data-width="100%">
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
                    <label for="txtHouseAddress">Address</label>
                    <input type="text" class="form-control" name="txtLandAddress" id="txtLandAddress">
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="txtHouseCity">City</label>
                    <input type="text" class="form-control" name="txtLandCity" id="txtLandCity">
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Province</label>
                    <select class="selectpicker" id="cmbHouseProvince" name="cmbHouseProvince" data-live-search="true" data-width="100%">
                        <option data-tokens="">Select a province</option>
                        <?php foreach ($province as $data){ ?>
                            <option value="<?php echo $data->province_id ?>"><?php echo $data->province_name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>District</label>
                    <select class="selectpicker" id="cmbHouseDistrict" name="cmbHouseDistrict" data-live-search="true" data-width="100%">
                        <option value="">Select a district</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Detailed Information</h4>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Land Size</label>
                    <input type="text" class="form-control" id="propertyId">
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyASize">Area Size</label>
                    <input type="text" class="form-control" id="propertyASize">
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="sizePrefix">Year Built</label>
                    <input type="text" class="form-control" id="sizePrefix">
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="landArea">Bedrooms</label>
                    <input type="text" class="form-control" id="landArea">
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="LASPostfix">Bathrooms</label>
                    <input type="text" class="form-control" id="LASPostfix">
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="bedRooms">Garages</label>
                    <input type="text" class="form-control" id="bedRooms">
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="garagesSize">Garages Size</label>
                    <input type="text" class="form-control" id="garagesSize">
                </div>
            </div>
        </div>
    </div>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">House media</h4>
            </div>
            <div class="col-lg-12">
                <div class="custom-file-container" data-upload-id="mySecondImage">
                    <label>Upload land images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">✘</a></label>
                    <label class="custom-file-container__custom-file" >
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="my_profile_setting_input form-group">
                    <label for="txtLandAddress">Youtube URL</label>
                    <input type="text" class="form-control" name="txtLandAddress" id="txtLandAddress">
                </div>
            </div>
            <div class="col-xl-12">
                <div class="my_profile_setting_input">
                    <button class="btn btn1 float-left">Clear</button>
                    <button class="btn btn2 float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<script>
    $(document).ready(function() {

        let secondUpload = new FileUploadWithPreview('mySecondImage')

        $('#cmbHouseProvince').change(function(){

            let selected = $(this).val();
            $("#cmbHouseDistrict").empty();
            $("#cmbHouseDistrict").append('<option value="">Select a district</option>');
            $("#cmbHouseDistrict").selectpicker("refresh");

            $.ajax({
                url: "<?php echo base_url(''); ?>/BLand/cGetRelatedDistrict",
                data: {ID : selected},
                method: "post",
                dataType: "json",
                error: function(error){
                    console.log(error);
                },
                success: function(r){
                    r.data.forEach(function(obj) {
                        $("#cmbHouseDistrict").append('<option value="'+obj.district_id+'">'+obj.district_name+'</option>');
                        $("#cmbHouseDistrict").selectpicker("refresh");
                    })
                }
            });

        });
    });

</script>


