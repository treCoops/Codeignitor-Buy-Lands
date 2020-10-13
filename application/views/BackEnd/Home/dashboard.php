<?php

$User_Session = $this->session->userdata('User_Session');
if ($User_Session == null) {
    redirect(base_url('BLogin/notLoggedIn'));
}

?>
<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Howdy, <?php echo $User_Session['Full_Name'] ?>!</h2>
        <p>We are glad to see you again!</p>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
    <div class="ff_one">
        <div class="icon"><span class="flaticon-home"></span></div>
        <div class="detais">
            <div class="timer"><?php echo $houseCount ?></div>
            <p>All Houses</p>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
    <div class="ff_one style2">
        <div class="icon"><span class="flaticon-maps-and-flags"></span></div>
        <div class="detais">
            <div class="timer"><?php echo $landCount ?></div>
            <p>All Lands</p>
        </div>
    </div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
    <div class="ff_one style3">
        <div class="icon"><span class="flaticon-envelope"></span></div>
        <div class="detais">
            <div class="timer"><?php echo $messageCount ?></div>
            <p>New Messages</p>
        </div>
    </div>
</div>
<!--<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">-->
<!--    <div class="ff_one style4">-->
<!--        <div class="icon"><span class="flaticon-heart"></span></div>-->
<!--        <div class="detais">-->
<!--            <div class="timer">18</div>-->
<!--            <p>Total Favorites</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-xl-7">-->
<!--    <div class="application_statics">-->
<!--        <h4>View Statistics</h4>-->
<!--        <div class="c_container"></div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="col-xl-5">-->
<!--    <div class="recent_job_activity">-->
<!--        <h4 class="title">Recent Activities</h4>-->
<!--        <div class="grid">-->
<!--            <ul>-->
<!--                <li class="list-inline-item">-->
<!--                    <div class="icon"><span class="flaticon-home"></span></div>-->
<!--                </li>-->
<!--                <li class="list-inline-item"><p>Your listing <strong>Luxury Family Home</strong> has been approved!.</p>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="grid">-->
<!--            <ul>-->
<!--                <li class="list-inline-item">-->
<!--                    <div class="icon"><span class="flaticon-chat"></span></div>-->
<!--                </li>-->
<!--                <li class="list-inline-item"><p>Kathy Brown left a review on <strong>Renovated Apartment</strong></p>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="grid">-->
<!--            <ul>-->
<!--                <li class="list-inline-item">-->
<!--                    <div class="icon"><span class="flaticon-heart"></span></div>-->
<!--                </li>-->
<!--                <li class="list-inline-item"><p>Someone favorites your <strong>Gorgeous Villa Bay View</strong> listing!-->
<!--                    </p></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="grid">-->
<!--            <ul>-->
<!--                <li class="list-inline-item">-->
<!--                    <div class="icon"><span class="flaticon-home"></span></div>-->
<!--                </li>-->
<!--                <li class="list-inline-item"><p>Your listing <strong>Luxury Family Home</strong> has been approved!</p>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="grid">-->
<!--            <ul>-->
<!--                <li class="list-inline-item">-->
<!--                    <div class="icon"><span class="flaticon-chat"></span></div>-->
<!--                </li>-->
<!--                <li class="list-inline-item"><p>Kathy Brown left a review on <strong>Renovated Apartment</strong></p>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <div class="grid mb0">-->
<!--            <ul class="pb0 mb0 bb_none">-->
<!--                <li class="list-inline-item">-->
<!--                    <div class="icon"><span class="flaticon-heart"></span></div>-->
<!--                </li>-->
<!--                <li class="list-inline-item"><p>Someone favorites your <strong>Gorgeous Villa Bay</strong> View listing!-->
<!--                    </p></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</div>

<script>
    // function createConfig() {
    //     return {
    //         type: 'line',
    //         data: {
    //             labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //             datasets: [{
    //                 label: 'Dataset',
    //                 borderColor: window.chartColors.red,
    //                 backgroundColor: window.chartColors.red,
    //                 data: [10, 30, 46, 2, 8, 50, 0],
    //                 fill: false,
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             title: {
    //                 display: true,
    //                 text: 'Sample tooltip with border'
    //             },
    //             tooltips: {
    //                 position: 'nearest',
    //                 mode: 'index',
    //                 intersect: false,
    //                 yPadding: 10,
    //                 xPadding: 10,
    //                 caretSize: 8,
    //                 backgroundColor: 'rgba(72, 241, 12, 1)',
    //                 titleFontColor: window.chartColors.black,
    //                 bodyFontColor: window.chartColors.black,
    //                 borderColor: 'rgba(0,0,0,1)',
    //                 borderWidth: 4
    //             },
    //         }
    //     };
    // }
    //
    // $(document).ready(function() {
    //     let c_container = document.querySelector('.c_container');
    //     let div = document.createElement('div');
    //     div.classList.add('chart-container');
    //
    //     let canvas = document.createElement('canvas');
    //     div.appendChild(canvas);
    //     c_container.appendChild(div);
    //
    //     let ctx = canvas.getContext('2d');
    //     let config = createConfig();
    //     new Chart(ctx, config);
    // });

</script>