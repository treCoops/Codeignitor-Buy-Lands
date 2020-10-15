<?php
?>

<section class="listing-title-area">
    <div class="container">
        <div class="row mb30">
            <div class="col-lg-7 col-xl-8">
                <div class="single_property_title mt30-767">
                    <h2><?php echo $land[0]['land_title'] ?></h2>
                    <p><?php echo $land[0]['land_address'] ?>, <?php echo $land[0]['land_city'] ?></p>
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
                        <h2>Rs. <?php echo number_format($land[0]['land_price'], 0, '', ' '); ?></h2>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="spls_style_two mb30-520">
                            <a class="popup-img" href="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $land[0]['land_image'][0]->img_url; ?>"><img class="img-fluid w100" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $land[0]['land_image'][0]->img_url; ?>" alt="1.jpg"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-4">
                <div class="row">

                    <?php for($a=1; $a<count($land[0]['land_image']); $a++ ){ ?>

                    <div class="col-sm-6 col-lg-6">
                        <div class="spls_style_two mb30">
                            <a class="popup-img" href="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $land[0]['land_image'][$a]->img_url; ?>"><img class="img-fluid w100" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $land[0]['land_image'][$a]->img_url; ?>" alt="2.jpg"></a>
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
                            <p class="mb25"><?php echo $land[0]['land_description'] ?></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">Property Details</h4>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <ul class="list-inline-item">
                                        <li><p>Land Area :</p></a></li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li><p><span><?php echo $land[0]['land_area'] ?></span></p></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="additional_details">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="mb15">Land Location</h4>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <ul class="list-inline-item">
                                        <li><p>Land Address :</p></a></li>
                                        <li><p>Land City :</p></a></li>
                                        <li><p>Land District :</p></a></li>
                                        <li><p>Land Province :</p></a></li>
                                    </ul>
                                    <ul class="list-inline-item">
                                        <li><p><span><?php echo $land[0]['land_address'] ?></span></p></a></li>
                                        <li><p><span><?php echo $land[0]['land_city'] ?></span></p></a></li>
                                        <li><p><span><?php echo $land[0]['land_district'] ?></span></p></a></li>
                                        <li><p><span><?php echo $land[0]['land_province'] ?></span></p></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($land[0]['land_plan_image'] != null){ ?>
                        <div class="col-lg-12">
                            <div class="additional_details">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="mb15">Land Plan Image</h4>
                                        <img class="img-whp" src="<?php echo base_url('assets') ?>/images/admin/uploads/<?php echo $land[0]['land_plan_image']; ?>" alt="fp1.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if($land[0]['land_youtube_url'] != null){ ?>
                        <div class="col-lg-12">
                            <div class="additional_details">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <div class="col-lg-12">
                                        <h4 class="mb15">Land Video</h4>
                                    </div>
                                </ul>
                                <iframe width="420" height="345" src="<?php echo $land[0]['land_youtube_url'] ?>"></iframe>
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