<?php
?>

<section class="listing-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="listing_sidebar dn db-991">
                    <div class="sidebar_content_details style3">
                        <!--search side bar-->
                        <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                            <div class="sidebar_advanced_search_widget">
                                <h4 class="mb25">Advanced Search <a class="filter_closed_btn float-right" href="#"><small>Hide Filter</small> <span class="flaticon-close"></span></a></h4>
                                <form method="post" action="<?php echo base_url('Property/search') ?>" >
                                    <ul class="sasw_list style2 mb0">
                                        <li class="search_area">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtKeyword" required name="txtKeyword" placeholder="Enter keyword...">
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
        <div class="row mb30">
            <div class="col-lg-7 col-xl-8">
                <div class="single_property_title mt30-767">
                    <h2><?php echo $house[0]['house_title'] ?></h2>
                    <p><?php echo $house[0]['house_address'] ?>, <?php echo $house[0]['house_city'] ?></p>
                </div>
                <div class="dn db-991">
                    <div id="main2">
                        <span id="open2" class="flaticon-filter-results-button filter_open_btn style3"> Show Filter</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="single_property_social_share">
                    <div class="price float-left fn-400">
                        <h2>Rs. <?php echo number_format($house[0]['house_price'], 0, '', ' '); ?></h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="spls_style_two mb30-520">
                            <a class="popup-img" href="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $house[0]['house_image'][0]->img_url; ?>"><img class="img-fluid w100" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $house[0]['house_image'][0]->img_url; ?>" alt="1.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-4">
                <div class="row">

                    <?php for($a=1; $a<count($house[0]['house_image']); $a++ ){ ?>

                        <div class="col-sm-6 col-lg-6">
                            <div class="spls_style_two mb30">
                                <a class="popup-img" href="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $house[0]['house_image'][$a]->img_url; ?>"><img class="img-fluid w100" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $house[0]['house_image'][$a]->img_url; ?>" alt="2.jpg"></a>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Agent Single Grid View -->
<section class="our-agent-single bgc-f7 pb30-991">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="listing_single_description">
                            <h4 class="mb30">Description</h4>
                            <p class="mb25"><?php echo $house[0]['house_description'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">Property Details</h4>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-12">
                                    <ul class="list-inline-item">
                                        <li><p>Property Area Size :</p></li>
                                        <li><p>Property Land Size :</p></li>
                                        <li><p>Year Built :</p></li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li><p><span><?php echo $house[0]['house_area_size'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_land_size'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_built_year'] ?></span></p></li>
                                    </ul>
                                </div>
                                <div class="col-lg-12">
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <ul class="list-inline-item">
                                        <li><p>Bedrooms :</p></li>
                                        <li><p>Bathrooms :</p></li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li><p><span><?php echo $house[0]['house_bedrooms'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_bathrooms'] ?></span></p></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <ul class="list-inline-item">
                                        <li><p>Garage :</p></li>
                                        <li><p>Garage Size :</p></li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li><p><span><?php echo $house[0]['house_garages'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_garage_size'] ?></span></p></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">House Location</h4>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-12">
                                    <ul class="list-inline-item">
                                        <li><p>Land Address :</p></li>
                                        <li><p>Land City :</p></li>
                                        <li><p>Land District :</p></li>
                                        <li><p>Land Province :</p></li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li><p><span><?php echo $house[0]['house_address'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_city'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_district'] ?></span></p></li>
                                        <li><p><span><?php echo $house[0]['house_province'] ?></span></p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($house[0]['house_floor_plan'] != null){ ?>
                        <div class="col-lg-12">
                            <div class="additional_details">
                                <h4 class="mb30">Floor plans</h4>
                                <div class="faq_according style2">
                                    <div class="accordion" id="accordionExample">
                                        <?php $count = 0; foreach ($house[0]['house_floor_plan'] as $plan) { ?>
                                            <div class="card floor_plan">
                                                <div class="card-header" id="heading<?php echo $count; ?>">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>">
                                                            <ul class="mb0">
                                                                <li class="list-inline-item">Floor Plan <?php echo $count+1;?></li>
                                                            </ul>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapse<?php echo $count; ?>" class="collapse" aria-labelledby="heading<?php echo $count; ?>" data-parent="#accordionExample" style="">
                                                    <div class="card-body text-center">
                                                        <img class="img-whp" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $plan['plan_images'][0]->img_url; ?>" alt="fp1.jpg">
                                                        <p><?php echo $plan['plan_description'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $count++; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($house[0]['house_youtube_url'] != null){ ?>
                        <div class="col-lg-12">
                            <div class="additional_details">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <div class="col-lg-12">
                                        <h4 class="mb15">House Video</h4>
                                    </div>
                                </ul>
                                <iframe width="420" height="345" src="<?php echo $house[0]['house_youtube_url'] ?>"></iframe>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <!-- search kit-->
                <div class="sidebar_listing_list">
                    <div class="sidebar_advanced_search_widget">
                        <form method="post" action="<?php echo base_url('Property/search') ?>" >
                            <ul class="sasw_list mb0">
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="txtKeyword" required name="txtKeyword" placeholder="Enter keyword...">
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