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
        <h2 class="breadcrumb_title">Manage Houses</h2>
        <p>Update and delete houses</p>
    </div>
</div>

<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="tblHouses" class="table">
                    <thead class="thead-light">
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <br/>
    <form id="formUpdateHouse" enctype="multipart/form-data" name="formUpdateHouse" role="form" method="POST">
        <div class="my_dashboard_review">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Create New House</h4>
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseTitle">House Title</label>
                        <input type="text" class="form-control" name="txtHouseTitle" id="txtHouseTitle">
                        <input type="hidden" class="form-control" name="txtHouseID" id="txtHouseID">
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
                            <option value="House">House</option>
                            <option value="Condo">Condo</option>
                            <option value="Bungalow">Bungalow</option>
                            <option value="Apartment">Apartment</option>
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
                        <input type="text" class="form-control" name="txtHouseAddress" id="txtHouseAddress">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseCity">City</label>
                        <input type="text" class="form-control" name="txtHouseCity" id="txtHouseCity">
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Province</label>
                        <select class="selectpicker" id="cmbHouseProvince" name="cmbHouseProvince" data-live-search="true" data-width="100%">
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
                        <label for="txtHouseLandSize">Land Size</label>
                        <input type="text" class="form-control" id="txtHouseLandSize" name="txtHouseLandSize">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseAreaSize">Area Size</label>
                        <input type="text" class="form-control" name="txtHouseAreaSize" id="txtHouseAreaSize">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseBuiltYear">Year Built</label>
                        <input type="text" class="form-control" name="txtHouseBuiltYear" id="txtHouseBuiltYear">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseBedrooms">Bedrooms</label>
                        <input type="text" class="form-control" id="txtHouseBedrooms" name="txtHouseBedrooms">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseBathrooms">Bathrooms</label>
                        <input type="text" class="form-control" id="txtHouseBathrooms" name="txtHouseBathrooms">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseGarages">Garages</label>
                        <input type="text" class="form-control" id="txtHouseGarages" name="txtHouseGarages">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="txtHouseGarageSize">Garages Size</label>
                        <input type="text" class="form-control" id="txtHouseGarageSize" name="txtHouseGarageSize">
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
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <label>Upload house images <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">✘</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file" id="txtImages" name="txtImages[]" accept="image/*" class="custom-file-container__custom-file__custom-file-input" multiple>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>
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
    </form>
</div>
</div>

<script>

    let dtable;
    let secondUpload;
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
                url: "<?php echo base_url(''); ?>/BHouse/cRemoveHouseImages",
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

    function del(id){
        $.confirm({
            icon: 'fa fa-trash',
            title: 'Delete Land',
            content: 'Do you want to delete this house?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){

                        $.ajax({
                            url: "<?php echo base_url(''); ?>/BHouse/cDeleteHouse",
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
                                        content: 'House has deleted',
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
            url: "<?php echo base_url(''); ?>/BHouse/cGetHouse",
            data: {ID : id},
            method: "post",
            dataType: "json",
            error: function(error){
                console.log(error);
                $.notify("Internal server error", "error");

            },
            success: function(r){

                $('#txtHouseTitle').val(r.data[0].house_title);
                $('#txtHouseDescription').text(r.data[0].house_description);
                $('#txtHousePrice').val(r.data[0].house_price);

                $("#cmbHouseType").val(r.data[0].house_type);
                $('#cmbHouseType').selectpicker('refresh');

                $("#cmbHouseStatus").val(r.data[0].house_status);
                $('#cmbHouseStatus').selectpicker('refresh');

                $('#txtHouseAddress').val(r.data[0].house_address);
                $('#txtHouseCity').val(r.data[0].house_city);

                $("#cmbHouseProvince").val(r.data[0].house_province);
                $('#cmbHouseProvince').selectpicker('refresh');

                populateCMBDistrict(r.data[0].house_province, r.data[0].house_district);

                $('#txtHouseLandSize').val(r.data[0].house_land_size);
                $('#txtHouseAreaSize').val(r.data[0].house_area_size);
                $('#txtHouseBuiltYear').val(r.data[0].house_built_year);
                $('#txtHouseBedrooms').val(r.data[0].house_bedrooms);
                $('#txtHouseBathrooms').val(r.data[0].house_bathrooms);
                $('#txtHouseGarages').val(r.data[0].house_garages);
                $('#txtHouseGarageSize').val(r.data[0].house_garage_size);



                $('#txtYoutubeLink').val(r.data[0].house_youtube_url);
                $('#txtHouseID').val(r.data[0].house_id);

                for(let a = 0; a < r.data.images.length; a++){
                    images[a] = '../assets/images/admin/uploads/'+r.data.images[a].img_url
                }
                secondUpload.clearPreviewPanel()
                secondUpload.addImagesFromPath(images)
            }
        });
    }

    function populateCMBDistrict(id, val){
        $("#cmbHouseDistrict").empty();

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
                    $("#cmbHouseDistrict").append('<option value="'+obj.district_id+'">'+obj.district_name+'</option>');
                    $("#cmbHouseDistrict").selectpicker("refresh");
                })

                if(val !== -1)
                    $("#cmbHouseDistrict").val(val);
                $('#cmbHouseDistrict').selectpicker('refresh');
            }
        });
    }

    function feedTable(id){
        return $('#tblHouses').DataTable({
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
                {"data": "house_id", "name": "House ID", "title": "House ID"},
                {"data": "house_title", "name": "Title", "title": "House Title"},
                {"data": "house_type", "name": "Type", "title": "House Type"},
                {"data": "house_price", "name": "Price", "title": "House Price"},
                {"data": "house_city", "name": "City", "title": "City"},
                {"data": "district_name", "name": "District", "title": "District"},
                {"data": "province_name", "name": "Province", "title": "Province"},
                {"data": "house_id", "name": "Action", "title": "Action",
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
                "url": '<?php echo base_url(''); ?>/BHouse/cGetHousesTable',
                "dataType": "json",
            }
        })
    }

    $(document).ready(function() {
        secondUpload = new FileUploadWithPreview('mySecondImage');
        dtable = feedTable();

        $('#cmbHouseProvince').change(function () {
            populateCMBDistrict($(this).val(), -1);
        });

        $("#formUpdateHouse").validate({
            ignore: [],
            rules: {
                txtHouseTitle: {
                    required: true
                },
                txtHouseDescription: {
                    required: true
                },
                txtHousePrice: {
                    required: true,
                    digits: true
                },
                txtHouseAddress: {
                    required: true
                },
                txtHouseCity: {
                    required: true
                },
                txtHouseLandSize: {
                    required: true
                },
                txtHouseAreaSize: {
                    required: true
                },
                txtHouseBuiltYear: {
                    required: true,
                    digits: true,
                    maxlength: 4,
                    minlength: 4
                },
                txtHouseBedrooms: {
                    required: true,
                    digits: true,
                    maxlength: 2
                },
                txtHouseBathrooms: {
                    required: true,
                    digits: true,
                    maxlength: 2
                },
                txtHouseGarages: {
                    required: true,
                    digits: true,
                    maxlength: 2
                },
                txtHouseGarageSize: {
                    required: true
                },
                txtImages: {
                    required: true
                }
            },
            messages: {
                txtHouseTitle: {
                    required: 'House title required!'
                },
                txtHouseDescription: {
                    required: 'House description required!'
                },
                txtHousePrice: {
                    required: 'House price required!',
                    digits: 'House price must have digits only!'
                },
                txtHouseAddress: {
                    required: 'House located address required!'
                },
                txtHouseCity: {
                    required: 'House located city required!'
                },
                txtHouseLandSize: {
                    required: 'House land size required!'
                },
                txtHouseAreaSize: {
                    required: 'House area size required!'
                },
                txtHouseBuiltYear: {
                    required: 'House built year required!',
                    digits: 'House built year must have digits only!',
                    maxlength: 'Valid year can have 4 digits only!',
                    minlength: 'Valid year can have 4 digits only!'
                },
                txtHouseBedrooms: {
                    required: 'House bedroom count required!',
                    digits: 'Bedroom count must have digits only!',
                    maxlength: 'Bedroom count can have 2 digits only!'
                },
                txtHouseBathrooms: {
                    required: 'House bathroom count required!',
                    digits: 'bathroom count must have digits only!',
                    maxlength: 'bathroom count can have 2 digits only!'
                },
                txtHouseGarages: {
                    required: 'House garage count required!',
                    digits: 'Garage count must have digits only!',
                    maxlength: 'Garage count can have 2 digits only!'
                },
                txtHouseGarageSize: {
                    required: 'House garage size required!'
                },
                txtImages: {
                    required: 'House images required!'
                }
            },
            submitHandler: function (form) {

                let formData = new FormData(form);
                $('#loader').show()

                selectImages();

                $.ajax({
                    url: '<?php echo base_url('BHouse/cUpdateHouse'); ?>',
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
