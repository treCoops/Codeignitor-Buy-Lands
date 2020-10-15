<?php ?>

<section class="our-listing bgc-f7 pb30-991">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="listing_sidebar">
                    <div class="sidebar_content_details style3">
                        <div class="sidebar_listing_list style2 mb0">
                            <div class="sidebar_advanced_search_widget">
                                <h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
                                <form method="post" action="<?php echo base_url('Property/search') ?>" >
                                    <ul class="sasw_list style2 mb0">
                                        <li class="search_area">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtKeyword" required name="txtKeyword" placeholder="keyword">
                                                <label for="exampleInputEmail"><span class="flaticon-magnifying-glass"></span></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick" id="cmbType" required name="cmbType">
                                                        <option value="">Property Type</option>
                                                        <option value="House">House</option>
                                                        <option value="Land">Land</option>
                                                        <option value="Apartment">Apartment</option>
                                                        <option value="Bungalow">Bungalow</option>
                                                        <option value="Condo">Condo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick" id="cmbProvince" name="cmbProvince">
                                                        <option value="-1">Province</option>
                                                        <?php foreach ($provinces as $val){ ?>
                                                            <option value="<?php echo $val->province_id ?>"><?php echo $val->province_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick" id="cmbDistrict" name="cmbDistrict">
                                                        <option value="-1">District</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="small_dropdown2">
                                                <div id="prncgs" class="btn dd_btn">
                                                    <span>Price</span>
                                                    <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                                </div>
                                                <div class="dd_content2">
                                                    <div class="pricing_acontent">
                                                        <input type="text" class="amount" id="slideLow" name="slideLow" placeholder="Rs 1 000 000">
                                                        <input type="text" class="amount2" id="slideHigh" name="slideHigh" placeholder="Rs 5 billion">
                                                        <div class="slider-range"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-block btn-thm">Search</button>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="breadcrumb_content style2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Home')?>">Home</a></li>
                        <li class="breadcrumb-item active text-thm" aria-current="page">Search</li>
                    </ol>
                    <h2 class="breadcrumb_title">Search results</h2>
                </div>
            </div>
            <div class="col-md-4 col-lg-6">
                <div class="sidebar_switch text-right">
                    <div id="main2">
                        <span id="open2" class="flaticon-filter-results-button filter_open_btn"> Show Filter</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="grid_list_search_result style2">
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="left_area">
                                <p><?php echo count($properties); ?> Search results</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php if($type == 'land') { foreach ($properties as $data){ ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="feat_property home7 style4">
                                <div class="thumb">
                                    <div class="fp_single_item_slider">

                                        <?php foreach($data['land_image'] as $img) {  ?>
                                            <div class="item">
                                                <img class="img-whp" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $img->img_url ?>" alt="fp1.jpg">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="thmb_cntnt style3">
                                        <a class="fp_price" href="<?php echo base_url('Land')  ?>?lid=<?php echo $data['land_id'] ?>">Rs. <?php echo number_format($data['land_price'], 0, '', ' '); ?><small></small></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content"><a href="<?php echo base_url('Land')  ?>?lid=<?php echo $data['land_id'] ?>">
                                        <h4><?php echo $data['land_title'] ?></h4>
                                        <p><span class="flaticon-placeholder"></span> <?php echo $data['land_address'] ?>, <?php echo $data['land_city'] ?></p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a class="text-thm3" href="<?php echo base_url('Land')  ?>?lid=<?php echo $data['land_id'] ?>"><?php echo $data['land_area'] ?></a></li>
                                        </ul>
                                    </a></div>
                                </div>
                            </div>
                        </div>

                    <?php }} else { foreach ($properties as $data){ ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="feat_property home7 style4">
                                <div class="thumb">
                                    <div class="fp_single_item_slider">

                                        <?php foreach($data['house_image'] as $img) {  ?>
                                            <div class="item">
                                                <img class="img-whp" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $img->img_url ?>" alt="fp1.jpg">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="thmb_cntnt style3">
                                        <a class="fp_price" href="#">Rs. <?php echo number_format($data['house_price'], 0, '', ' '); ?><small></small></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <h4><?php echo $data['house_title'] ?></h4>
                                        <p><span class="flaticon-placeholder"></span> <?php echo $data['house_address'] ?>, <?php echo $data['house_city'] ?></p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a class="text-thm3" href="#">Beds: <?php echo $data['house_bedrooms'] ?></a></li>
                                            <li class="list-inline-item"><a class="text-thm3" href="#">Baths: <?php echo $data['house_bathrooms'] ?></a></li>
                                            <li class="list-inline-item"><a class="text-thm3" href="#"><?php echo $data['house_area_size'] ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php }} ?>

<!--                    <div class="col-lg-12 mt20">-->
<!--                        <div class="mbp_pagination">-->
<!--                            <ul class="page_navigation">-->
<!--                                <li class="page-item disabled">-->
<!--                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>-->
<!--                                </li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                                <li class="page-item active" aria-current="page">-->
<!--                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
<!--                                </li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">...</a></li>-->
<!--                                <li class="page-item"><a class="page-link" href="#">29</a></li>-->
<!--                                <li class="page-item">-->
<!--                                    <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function populateCMBDistrict(id){
        $("#cmbDistrict").empty();

        if(id !== '-1'){
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
                        $("#cmbDistrict").append('<option value="'+obj.district_id+'">'+obj.district_name+'</option>');
                        $("#cmbDistrict").selectpicker("refresh");
                    })
                }
            });
        }else{
            $("#cmbDistrict").append('<option value="-1">District</option>');
            $("#cmbDistrict").selectpicker("refresh");
        }
    }

    $(document).ready(function() {

        $('#cmbProvince').change(function(){
            populateCMBDistrict($(this).val());
        });

    });
</script>
