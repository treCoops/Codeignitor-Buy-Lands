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
        <h2 class="breadcrumb_title">Manage Floor Plans</h2>
        <p>Update and delete floor plans</p>
    </div>
</div>
<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-lg-12">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Select house</label>
                    <select class="selectpicker" id="cmbHouse" name="cmbHouse" data-live-search="true" data-width="100%">
                        <?php foreach ($houses as $data){ ?>
                            <option value="<?php echo $data->house_id ?>"><?php echo $data->house_title ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <hr/>
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="tblFloorPlans" class="table">
                    <thead class="thead-light">
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <br/>
    <div class="my_dashboard_review">
        <form id="formUpdateHousePlan" enctype="multipart/form-data" name="formUpdateHousePlan" role="form" method="POST">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Update Floor Plan</h4>
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Select house</label>
                        <select class="selectpicker" id="cmbHouseUpdate" name="cmbHouseUpdate"  data-live-search="true" data-width="100%">
                            <?php foreach ($houses as $data){ ?>
                                <option value="<?php echo $data->house_id ?>"><?php echo $data->house_title ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="txtPlanID" id="txtPlanID">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_profile_setting_textarea">
                        <label for="txtPlanDescription">Floor Plan Description</label>
                        <textarea class="form-control" id="txtPlanDescription" name="txtPlanDescription" rows="7"></textarea>
                    </div>
                </div>
            </div>
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
        </form>
    </div>
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
                url: "<?php echo base_url(''); ?>/BHouse/cRemoveImages",
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
            title: 'Delete House Floor Plan',
            content: 'Do you want to delete this house floor plan?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){

                        $.ajax({
                            url: "<?php echo base_url(''); ?>/BHouse/cDeleteHouseFloorPlan",
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
                                        content: 'House floor plan has deleted',
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
            url: "<?php echo base_url(''); ?>/BHouse/cGetHouseFloorPlan",
            data: {ID : id},
            method: "post",
            dataType: "json",
            error: function(error){
                console.log(error);
                $.notify("Internal server error", "error");

            },
            success: function(r){

                $('#txtPlanDescription').text(r.data[0].plan_description);
                $("#cmbHouseUpdate").val(r.data[0].house_master_id);
                $('#cmbHouseUpdate').selectpicker('refresh');
                $('#txtPlanID').val(r.data[0].house_plan_id);

                for(let a = 0; a < r.data.images.length; a++){
                    images[a] = '../assets/images/admin/uploads/'+r.data.images[a].img_url
                }
                secondUpload.clearPreviewPanel()
                secondUpload.addImagesFromPath(images)
            }
        });
    }

    function feedTable(id){
        return $('#tblFloorPlans').DataTable({
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
                {"data": "house_plan_id", "name": "Plan ID", "title": "Plan ID"},
                {"data": "plan_description", "name": "Description", "title": "Plan Description"},
                {"data": "house_title", "name": "House Title", "title": "House Title"},
                {"data": "house_plan_id", "name": "Action", "title": "Action",
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
                "url": '<?php echo base_url(''); ?>/BHouse/cGetHousePlansForTable',
                "dataType": "json",
                "data": {ID: id}
            }
        })
    }

    $(document).ready(function() {
        secondUpload = new FileUploadWithPreview('mySecondImage');

        dtable = feedTable($('#cmbHouse option:selected').val());

        $('#cmbHouse').change(function(){
            dtable = feedTable($(this).val());
            $('#txtPlanDescription').text('');
            $("#cmbHouseUpdate")[0].selectedIndex = 0;
            $('#cmbHouseUpdate').selectpicker('refresh');
            $('#txtPlanID').val('');
            secondUpload.clearPreviewPanel();
        });

        $("#formUpdateHousePlan").validate({
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
                $('#loader').show();
                selectImages();

                $.ajax({
                    url: '<?php echo base_url('BHouse/updateHouseFloorPlan'); ?>',
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
                        $('#txtPlanDescription').text('');
                        $("#cmbHouseUpdate")[0].selectedIndex = 0;
                        $('#cmbHouseUpdate').selectpicker('refresh');
                        $('#txtPlanID').val('');
                        secondUpload.clearPreviewPanel();
                    }
                });
            }
        });

    });


</script>