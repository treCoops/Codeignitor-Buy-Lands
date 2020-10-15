<section class="home-three bg-img3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="home3_home_content">
                    <h1>Your Selection is Our Priority.</h1>
                    <h4>Find the Best Propeties with Genuine Prices</h4>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="home_adv_srch_opt home3">
                    <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="home1-advnc-search home3">
                                <form method="post" action="<?php echo base_url('Property/search') ?>" >
                                <ul class="h1ads_1st_list mb0">
                                    <li class="list-inline-item">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="txtKeyword" required name="txtKeyword" placeholder="Enter keyword...">
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
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
                                    <li class="list-inline-item">
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
                                    <li class="list-inline-item">
                                        <div class="search_option_two">
                                            <div class="candidate_revew_select">
                                                <select class="selectpicker w100 show-tick" id="cmbDistrict" name="cmbDistrict">
                                                    <option value="-1">District</option>
                                                </select>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="small_dropdown2 home3">
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
                                    <li class="list-inline-item">
                                        <div class="search_option_button">
                                            <button type="submit" class="btn btn-thm3">Search</button>
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
    </div>
</section>

<!-- House Properties -->
<section id="feature-property" class="feature-property mt80 pb50">
    <div class="container-fluid ovh">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb40">
                    <h2>Houses</h2>
                    <p>Handpicked houses by our team. <a class="float-right" href="<?php echo base_url('Property/all') ?>?type=house">View All <span class="flaticon-next"></span></a></p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_home3_slider">
                    <?php foreach ($houses as $val) { ?>
                        <div class="item">
                            <div class="feat_property home3">
                                <div class="thumb">
                                    <img class="img-whp" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $val['house_image']; ?>" alt="fp1.jpg">
                                    <div class="thmb_cntnt">
                                        <a class="fp_price" href="<?php echo base_url('House')  ?>?hid=<?php echo $val['house_id'] ?>">Rs. <?php echo number_format($val['house_price'], 0, '', ' '); ?><small></small></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content"><a href="<?php echo base_url('House')  ?>?hid=<?php echo $val['house_id'] ?>">
                                        <h4><?php echo $val['house_title']; ?></h4>
                                        <p class="text-thm"><?php echo $val['house_type']; ?></p>
                                        <p><span class="flaticon-placeholder"></span><?php echo $val['house_address']; ?>, <?php echo $val['house_city']; ?></p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="<?php echo base_url('House')  ?>?hid=<?php echo $val['house_id'] ?>">Beds: <?php echo $val['house_bedrooms']; ?></a></li>
                                            <li class="list-inline-item"><a href="<?php echo base_url('House')  ?>?hid=<?php echo $val['house_id'] ?>">Baths: <?php echo $val['house_bathrooms']; ?></a></li>
                                            <li class="list-inline-item"><a href="<?php echo base_url('House')  ?>?hid=<?php echo $val['house_id'] ?>"><?php echo $val['house_area_size']; ?></a></li>
                                        </ul>
                                    </a></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- Property Search -->
<section id="property-search" class="property-search bg-img4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="search_smart_property text-center">
                    <h2>Search Smarter, From Anywhere</h2>
                    <p>Power your search with our real estate platform service, for timely listings and a seamless experience.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Property Cities -->
<section id="feature-property" class="feature-property mt80 pb50">
    <div class="container-fluid ovh">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-title mb40">
                    <h2>Lands</h2>
                    <p>Handpicked land properties by our team. <a class="float-right" href="<?php echo base_url('Property/all') ?>?type=land">View All <span class="flaticon-next"></span></a></p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="feature_property_home3_slider">
                    <?php foreach ($lands as $val){ ?>
                        <div class="item">
                            <div class="feat_property home3">
                                <div class="thumb">
                                    <img class="img-whp" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $val['land_image'] ?>" alt="fp1.jpg">
                                    <div class="thmb_cntnt">
                                        <a class="fp_price" href="<?php echo base_url('Land')  ?>?lid=<?php echo $val['land_id'] ?>">Rs. <?php echo number_format($val['land_price'], 0, '', ' '); ?><small></small></a>
                                    </div>
                                </div>

                                <div class="details">
                                    <div class="tc_content"><a href="<?php echo base_url('Land')  ?>?lid=<?php echo $val['land_id'] ?>">
                                        <a href="<?php echo base_url('Land')  ?>?lid=<?php echo $val['land_id'] ?>"><h4><?php echo $val['land_title'] ?></h4></a>
                                        <a href="<?php echo base_url('Land')  ?>?lid=<?php echo $val['land_id'] ?>"><p><span class="flaticon-placeholder"></span> <?php echo $val['land_address'] ?>, <?php echo $val['land_city'] ?></p></a>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="<?php echo base_url('Land')  ?>?lid=<?php echo $val['land_id'] ?>"><?php echo $val['land_area'] ?></a></li>
                                        </ul>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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