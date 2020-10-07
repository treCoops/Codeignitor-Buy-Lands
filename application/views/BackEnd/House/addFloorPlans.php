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
    <form id="formAddHousePlan" enctype="multipart/form-data" name="formAddHousePlan" role="form" method="POST">
        <div class="my_dashboard_review">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Create New Floor Plan</h4>
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Select house</label>
                        <select class="selectpicker" id="cmbHouse" name="cmbHouse" data-live-search="true" data-width="100%">
                            <?php foreach ($houses as $data){ ?>
                                <option value="<?php echo $data->house_id ?>"><?php echo $data->house_title ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_profile_setting_textarea">
                        <label for="txtPlanDescription">Floor Plan Description</label>
                        <textarea class="form-control" id="txtPlanDescription" name="txtPlanDescription" rows="7"></textarea>
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
                            <input type="file" id="txtImages" name="txtImages[]" accept="image/*" class="custom-file-container__custom-file__custom-file-input" multiple>
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
    </form>
</div>

<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<script>
    $(document).ready(function() {

        let secondUpload = new FileUploadWithPreview('mySecondImage')

        $("#formAddHousePlan").validate({
            ignore: [],
            rules: {
                txtPlanDescription: {
                    required: true
                },
                txtImages: {
                    required: true
                }
            },
            messages: {
                txtPlanDescription: {
                    required: 'Floor plan description required!'
                },
                txtImages: {
                    required: 'Floor plan images required!'
                }
            },
            submitHandler: function (form) {

                let formData = new FormData(form);
                $('#loader').show()

                $.ajax({
                    url: '<?php echo base_url('BHouse/addHouseFloorPlan'); ?>',
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


