<?php

$User_Session = $this->session->userdata('User_Session');
if ($User_Session == null) {
    redirect(base_url('BLogin/notLoggedIn'));
}

?>

<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Add New Floor Plan</h2>
        <p>Please fill up required fields!</p>
    </div>
</div>
<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Create New Floor Plan</h4>
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Select house</label>
                    <select class="selectpicker" id="cmbHouse" name="cmbHouse" data-live-search="true" data-width="100%">
                        <option value="Status1">1</option>
                        <option value="Status2">2</option>
                        <option value="Status3">3</option>
                        <option value="Status4">4</option>
                        <option value="Status5">5</option>
                        <option value="Status6">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_profile_setting_textarea">
                    <label for="txtHouseDescription">Floor Plan Description</label>
                    <textarea class="form-control" id="txtHouseDescription" name="txtHouseDescription" rows="7"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Floor Pan media</h4>
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


