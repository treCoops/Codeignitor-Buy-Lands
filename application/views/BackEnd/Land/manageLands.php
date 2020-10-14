<?php

$User_Session = $this->session->userdata('User_Session');
if ($User_Session == null) {
    redirect(base_url('BLogin/notLoggedIn'));
}

?>

<style>
    .property_table select{width: inherit!important; height: 40px !important; display: inline-block !important;}
    .property_table input{width: inherit!important; height: 40px !important; display: inline-block !important;}
    .dataTables_filter label{float: right!important;}
</style>

<div class="col-lg-4 col-xl-4 mb10">
    <div class="breadcrumb_content style2 mb30-991">
        <h2 class="breadcrumb_title">Manage Lands</h2>
        <p>Update and delete lands</p>
    </div>
</div>

<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="tblLands" class="table">
                    <thead class="thead-light">
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <br/>
    <form id="formUpdateLand" enctype="multipart/form-data" name="formAddLand" role="form" method="POST">
        <div class="my_dashboard_review">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Create New Land</h4>
                    <div class="my_profile_setting_input form-group">
                        <label for="txtLandTitle">Land Title</label>
                        <input type="text" class="form-control" name="txtLandTitle" id="txtLandTitle">
                        <input type="hidden" class="form-control" name="txtLandID" id="txtLandID">
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
                        <input type="hidden" class="form-control" name="txtCurrentPlanImage" id="txtCurrentPlanImage">
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
</div>

<script>

    let dtable;
    let secondUpload;
    let firstUpload;
    let images = [];

    function selectImages() {
        let updated = secondUpload.cachedFileArray;
        let filtered = []
        let removed = []

        for(let a=0; a<updated.length; a++){
            if (!updated[a].lastModified) {
                filtered.push(updated[a].name)
            }
        }

        for(let a=0; a<images.length; a++){
            for(let i=0; i<filtered.length; i++){
                if(!filtered.includes(images[a].substring(31))){
                    removed.push(images[a].substring(31))
                }
            }
        }

        updateImages(removed);

    }

    function updateImages(removed){
        if(Array.isArray(removed) && removed.length){

            $.ajax({
                url: "<?php echo base_url(''); ?>/BLand/cRemoveImages",
                data: {
                    images: removed
                },
                method: 'post',
                dataType: 'json',
                error: function(error){
                    console.log(error)
                },
                success: function(r){
                    console.log(r)
                }
            });

        }
    }

    function populateCMBDistrict(id, val){
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

                if(val !== -1)
                $("#cmbLandDistrict").val(val);
                $('#cmbLandDistrict').selectpicker('refresh');
            }
        });
    }

    function del(id){
        $.confirm({
            icon: 'fa fa-trash',
            title: 'Delete Land',
            content: 'Do you want to delete this land?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){

                        $.ajax({
                            url: "<?php echo base_url(''); ?>/BLand/cDeleteLand",
                            data: {ID : id},
                            method: "post",
                            dataType: "json",
                            error: function(error){
                                console.log(error);
                                dtable.ajax.reload();
                                dtable.draw();
                                $.notify("Internal server error", "error");

                            },
                            success: function(r){
                                dtable.ajax.reload();
                                dtable.draw();

                                if(r.result){
                                    $.alert({
                                        icon: 'fa fa-check',
                                        title: 'Success',
                                        content: 'Land has deleted',
                                        type: 'green',
                                        btnClass: 'btn-green'
                                    });
                                }else{
                                    $.alert({
                                        icon: 'fa fa-times',
                                        title: 'Error',
                                        content: 'Operation failed',
                                        type: 'red',
                                        btnClass: 'btn-red'
                                    });
                                }
                            }
                        });


                    }
                },
                close: function () {

                }
            }
        });
    }

    function edit(id){

        while (images.length) {
            images.pop();
        }

        $.ajax({
            url: "<?php echo base_url(''); ?>/BLand/cGetLand",
            data: {ID : id},
            method: "post",
            dataType: "json",
            error: function(error){
                console.log(error);
                $.notify("Internal server error", "error");

            },
            success: function(r){

                $('#txtLandTitle').val(r.data[0].land_title);
                $('#txtLandDescription').text(r.data[0].land_description);

                $('#txtLandPrice').val(r.data[0].land_price);
                $('#txtLandArea').val(r.data[0].land_area);

                $("#cmbLandStatus").val(r.data[0].land_status);
                $('#cmbLandStatus').selectpicker('refresh');

                $('#txtLandAddress').val(r.data[0].land_address);
                $('#txtLandCity').val(r.data[0].land_city);

                $("#cmbLandProvince").val(r.data[0].land_province);
                $('#cmbLandProvince').selectpicker('refresh');

                populateCMBDistrict(r.data[0].land_province, r.data[0].land_district);

                $('#txtYoutubeLink').val(r.data[0].land_youtube_url);
                $('#txtCurrentPlanImage').val(r.data[0].land_plan_image);
                $('#txtLandID').val(r.data[0].land_id);

                for(let a = 0; a < r.data.images.length; a++){
                    images[a] = '../assets/images/admin/uploads/'+r.data.images[a].img_url
                }
                secondUpload.clearPreviewPanel()
                secondUpload.addImagesFromPath(images)

                let defaultPlanImage = [];
                defaultPlanImage[0] = '../assets/images/admin/uploads/'+r.data[0].land_plan_image;
                firstUpload.clearPreviewPanel()
                firstUpload.addImagesFromPath(defaultPlanImage);
            }
        });
    }

    function feedTable(id){
        return $('#tblLands').DataTable({
            "processing": true,

            "initComplete": function (settings, json) {
                $("#myTable").show();
            },
            "serverSide": true,
            "select": true,
            "searching": true,
            "bDestroy": true,
            "dataSrc": "tableData",
            "columns": [
                {"data": "land_id", "name": "Land ID", "title": "Land ID"},
                {"data": "land_title", "name": "Title", "title": "Land Title"},
                {"data": "land_price", "name": "Price", "title": "Land Price"},
                {"data": "land_city", "name": "City", "title": "City"},
                {"data": "district_name", "name": "District", "title": "District"},
                {"data": "province_name", "name": "Province", "title": "Province"},
                {"data": "land_id", "name": "Action", "title": "Action",
                    mRender: function (id) {
                        return '<ul class="view_edit_delete_list mb0">\n' +
                            '<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><button onclick="edit(\''+id+'\')" class="btn btn-outline-info" ><span class="flaticon-edit"></span></button></li>\n' +
                            '<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><button onclick="del(\''+id+'\')" class="btn btn-outline-danger"><span class="flaticon-garbage"></span></button></li>\n' +
                            '</ul>'
                    }
                },
            ],
            "language": {
                "emptyTable": "No subjects to show..."
            },
            "ajax": {
                "url": '<?php echo base_url(''); ?>/BLand/cGetLandsTable',
                "dataType": "json",
            }
        })
    }

    $(document).ready(function() {
        secondUpload = new FileUploadWithPreview('mySecondImage');
        firstUpload = new FileUploadWithPreview('myFirstImage');
        dtable = feedTable();

        $('#cmbLandProvince').change(function(){
            populateCMBDistrict($(this).val(), -1);
        });

        $("#formUpdateLand").validate({
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
                $('#loader').show();
                selectImages();

                $.ajax({
                    url: '<?php echo base_url('BLand/cUpdateLand'); ?>',
                    data:  formData,
                    dataType: 'json',
                    method: 'post',
                    processData: false,
                    enctype: 'multipart/form-data',
                    contentType: false,
                    cache: false,
                    error: function (error) {
                        $('#loader').hide()
                        dtable.ajax.reload();
                        dtable.draw();
                        console.log(error.message);
                        $.notify("Internal server error", "error");
                    },
                    success: function (r) {
                        $('#loader').hide()

                        dtable.ajax.reload();
                        dtable.draw();

                        $.notify(r.message, "success");
                        $('#txtLandTitle').val('');
                        $('#txtLandDescription').text('');

                        $('#txtLandPrice').val('');
                        $('#txtLandArea').val('');

                        $("#cmbLandStatus")[0].selectedIndex = 0;
                        $('#cmbLandStatus').selectpicker('refresh');

                        $('#txtLandAddress').val('');
                        $('#txtLandCity').val('');

                        $("#cmbLandProvince")[0].selectedIndex = 0;
                        $('#cmbLandProvince').selectpicker('refresh');

                        $("#cmbLandDistrict")[0].selectedIndex = 0;
                        $('#cmbLandDistrict').selectpicker('refresh');


                        $('#txtYoutubeLink').val('');
                        $('#txtCurrentPlanImage').val('');
                        $('#txtLandID').val('');

                        secondUpload.clearPreviewPanel()
                        firstUpload.clearPreviewPanel()
                    }
                });
            }
        });

    });
</script>
