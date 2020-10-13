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
        <h2 class="breadcrumb_title">Manage Messages</h2>
        <p>View messages</p>
    </div>
</div>

<div class="col-lg-12">

    <div class="my_dashboard_review">
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="tblMessage" class="table">
                    <thead class="thead-light">
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <br/>
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">View Message</h4>
                <div class="my_profile_setting_input form-group">
                    <label for="txtSubject">Message Subject</label>
                    <input type="text" class="form-control" name="txtSubject" id="txtSubject">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="my_profile_setting_textarea">
                    <label for="txtBody">Message</label>
                    <textarea class="form-control" id="txtBody" name="txtBody" rows="7"></textarea>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<script>

    let dtable;

    function view(id){

        $.ajax({
            url: "<?php echo base_url(''); ?>/BMessage/cGetMessage",
            data: {ID : id},
            method: "post",
            dataType: "json",
            error: function(error){
                console.log(error);
                $.notify("Internal server error", "error");

            },
            success: function(r){

                dtable.ajax.reload();
                dtable.draw();

                $('#txtBody').text(r.data[0].sender_message);
                $('#txtSubject').val(r.data[0].sender_message_subject);


            }
        });
    }

    function del(id){

        $.confirm({
            icon: 'fa fa-trash',
            title: 'Delete Message',
            content: 'Do you want to delete this message?',
            type: 'red',
            typeAnimated: true,
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action: function(){

                        $.ajax({
                            url: "<?php echo base_url(''); ?>/BMessage/cDeleteMessage",
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
                                        content: 'Message has deleted',
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

    function feedTable(){
        return $('#tblMessage').DataTable({
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
                {"data": "message_id", "name": "Message ID", "title": "Message ID"},
                {"data": "sender_name", "name": "Sender Name", "title": "Sender Name"},
                {"data": "sender_email", "name": "Sender Email", "title": "Sender Email"},
                {"data": "sender_phone", "name": "Sender Phone", "title": "Sender Phone"},
                {"data": "message_status", "name": "Status", "title": "Status",
                    mRender: function (status) {
                    console.log(status)
                        if(status === 'NEW')
                            return '<span class="status_tag badge2">NEW</span>'
                        if(status === 'READ')
                            return '<span class="status_tag badge">READ</span>'
                    }

                },
                {"data": "message_id", "name": "Action", "title": "Action",
                    mRender: function (id) {
                        return '<ul class="view_edit_delete_list mb0">\n' +
                            '<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="View"><button onclick="view(\''+id+'\')" class="btn btn-outline-info" ><span class="flaticon-view"></span></button></li>\n' +
                            '<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><button onclick="del(\''+id+'\')" class="btn btn-outline-danger"><span class="flaticon-garbage"></span></button></li>\n' +
                            '</ul>'
                    }
                },
            ],
            "language": {
                "emptyTable": "No subjects to show..."
            },
            "ajax": {
                "url": '<?php echo base_url(''); ?>/BMessage/cGetMessagesForTable',
                "dataType": "json",
            }
        })
    }

    $(document).ready(function() {
        dtable = feedTable();
    });


</script>
