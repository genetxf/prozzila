<?php
session_start();
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ProZZila - Project Management System
    </title>
    <link rel="shortcut icon" href="./images/favicon.svg" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- BOXICONS -->
    <link href='./css/boxicons.min.css' rel='stylesheet'>

    <!-- Plugin -->
    <link rel="stylesheet" href="./libs/owl.carousel/assets/owl.carousel.min.css">

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<?php
$pagetitle = "Welcome to ProZZila";
include 'header.php';
?>
<!-- MAIN CONTENT -->

<div class="main">


    <div class="main-content dashboard">
        <div class="row">
            <div class="col-12">
                <div class="box card-box">
                    <div class="icon-box bg-color-1">
                        <div class="icon bg-icon-1">
                            <i class="bx bxs-bell bx-tada bx-tada"></i>
                        </div>
                        <div class="content">
                            <h5 class="title-box">Notification</h5>
                            <p class="color-1 mb-0 pt-4">5 Unread notification</p>
                        </div>
                    </div>
                    <div class="icon-box bg-color-2">
                        <div class="icon bg-icon-2">
                            <i class="bx bxs-message-rounded"></i>
                        </div>
                        <div class="content click-c">
                            <h5 class="title-box">Message</h5>
                            <p class="color-2 mb-0 pt-4">5 Unread notification</p>
                        </div>
                        <div class="notification-list card">
                            <div class="top box-header">
                                <h5>Notification</h5>

                            </div>
                            <div class="pd-1r">
                                <div class="divider"></div>
                            </div>

                            <div class="box-body">
                                <ul class="list">
                                    <li class="d-flex no-seen">
                                        <div class="img-mess"><img class="mr-14" src="./images/avatar/avt-1.png" alt="avt"></div>
                                        <div class="info">
                                            <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>
                                            <p class="pb-0 mb-0 line-h14 mt-6">Proin ac quam et lectus vestibulum</p>
                                        </div>
                                    </li>

                                    <li class="d-flex">
                                        <div class="img-mess"><img class="mr-14" src="./images/avatar/avt-1.png" alt="avt"></div>
                                        <div class="info">
                                            <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>
                                            <p class="pb-0 mb-0 line-h14 mt-6">Proin ac quam et lectus vestibulum</p>
                                        </div>
                                    </li>

                                </ul>
                                <div class="btn-view">
                                    <a class="font-w600 h5" href="message.html">View All</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title mb-22">Daily Task</h4>
                    </div>
                    <div class="box-body">
                        <div class="content-item mb-wrap">
                            <div class="left">
                                <h5 class="font-w500">10:00</h5>
                            </div>
                            <div class="right bg-orange">
                                <div class="content-box w-100">
                                    <h5 class="font-wb text-white fs-20">iOs Dev team meeting</h5>
                                    <h6 class="font-w400 text-w07">10:00 - 11:00</h6>
                                </div>
                            </div>
                        </div>
                        <div class="content-item mb-wrap mb-32">
                            <div class="left">
                                <h5 class="font-w500">11:00</h5>
                            </div>
                            <div class="right d-flex pd-0">
                                <div class="content-box bg-yellow">
                                    <h5 class="font-wb text-white fs-20">Design meeting</h5>
                                    <h6 class="font-w400 text-w07">11:00 - 11:30</h6>
                                </div>
                                <div class="content-box bg-blue">
                                    <h5 class="font-wb text-white fs-20">SEO meeting</h5>
                                    <h6 class="font-w400 text-w07">11:30 12:00</h6>
                                </div>
                            </div>
                        </div>
                        <div class="content-item mb-0 mb-wrap">
                            <div class="left">
                                <h5 class="font-w500">12:00</h5>
                            </div>
                            <div class="right bg-light">
                                <div class="content-box w-100">
                                    <h5 class="font-w500">Lunch Break</h5>
                                    <h6 class="font-w400 mt-10">12:00 - 1:00</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-sm-12 mb-0">

                <div class="row">
                    <div class="col-12">
                        <!-- CUSTOMERS CHART -->
                        <div class="box f-height">
                            <div class="box-header d-flex justify-content-between mb-wrap">
                                <h3 class="mt-9 ml-5">Project Statistics</h3>
                                <ul class="card-list mb-0">
                                    <li class="custom-label"><span></span>Complete</li>
                                    <li class="custom-label"><span></span>Progress</li>
                                </ul>
                            </div>
                            <div class="box-body pt-20">
                                <div id="customer-chart"></div>
                            </div>
                        </div>
                        <!-- END CUSTOMERS CHART -->
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <div class="me-auto">
                            <h4 class="card-title">Project Category</h4>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="box-body pt-0">
                        <div class="row">
                            <div class="col-6 col-xl-12 w-sm-100 mb-23">
                                <ul class="box-list mt-26 pr-67">
                                    <li><span class="bg-blue square"></span>Web Design<span>25%</span></li>
                                    <li><span class="bg-success square"></span>UX/UI Design<span>18%</span></li>
                                    <li><span class="bg-warning square"></span>Graphics Design<span>17%</span></li>
                                    <li><span class="bg-blue square"></span>Motion Design<span>12.50%</span></li>
                                    <li><span class="bg-success square"></span>Brand Identity<span>12.50%</span>
                                    </li>
                                    <li><span class="bg-warning square"></span>Others<span>12.50%</span></li>
                                </ul>
                            </div>
                            <!-- <canvas id="doughnut-chart" width="240" height="240"></canvas> -->
                            <div class="canvas-container" style=" margin: -289px auto;">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="chartjs-4" class="chartjs chartjs-render-monitor" width="482"
                                        height="602" style="display: block; height: 301px; width: 241px;"></canvas>
                                <div class="chart-data">
                                    <div data-percent="25" data-color="#3C21F7" data-label="Web Design"></div>
                                    <div data-percent="18" data-color="#00BC8B" data-label="UX/UI Design"></div>
                                    <div data-percent="17" data-color="#FFB800" data-label="Graphics Design"></div>
                                    <div data-percent="12.5" data-color="#00ECCC" data-label="Motion Design"></div>
                                    <div data-percent="12.5" data-color="#EF7F5A" data-label="Brand Identity"></div>
                                    <div data-percent="12.5" data-color="#5D45FB" data-label="Others"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-xl-12 col-sm-12">
                <div class="box">
                    <div class="box-body d-flex pb-0">
                        <div class="me-auto">
                            <h5 class="box-title">Total Clients</h5>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 font-wb fs-30 mt-23">78</h4>
                                <div class="text-primary transaction-caret">
                                    <i class="bx bxs-up-arrow"></i>
                                    <p class="mb-0 text-primary fs-18 font-w400 mt-14 ml-7">+0.5%</p>
                                </div>
                            </div>
                        </div>
                        <div class=" donut-chart-sale">
                                    <span class="donut-1"
                                          data-peity='{ "fill": ["#3C21F7", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
                            <small class="">76%</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-12 col-sm-12">
                <div class="box">
                    <div class="box-body d-flex pb-0">
                        <div class="me-auto">
                            <h5 class="box-title mb-36">Total Task Done</h5>
                            <div class="progress skill-progress mb-10" style="height:10px;">
                                <div class="progress-bar bg-primary progress-animated"
                                     style="width: 78%; height:10px;" role="progressbar">
                                    <span class="sr-only">78% Complete</span>
                                </div>
                            </div>
                            <p class="fs-16 mb-0 mt-2"><span class="text-primary">87 </span>left from target</p>
                        </div>
                        <h4 class="numb font-wb fs-30">34</h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-12 col-sm-12">
                <div class="box">
                    <div class="box-body d-flex pb-0">
                        <div class="me-auto">
                            <h4 class="numb fs-30 font-wb">565</h4>
                            <h5 class="card-title fs-18 font-w400">Total Clients</h5>
                            <p class="fs-14 mb-0 mt-11"><span class="text-primary">-3% </span>than last month
                            </p>
                        </div>
                        <div id="total-revenue-chart"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->

<div class="overlay"></div>

<!-- SCRIPT -->
<!-- APEX CHART -->

<script src="./libs/jquery/jquery.min.js"></script>
<script src="./libs/moment/min/moment.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./libs/peity/jquery.peity.min.js"></script>
<script src="./libs/chart.js/Chart.bundle.min.js"></script>
<script src="./libs/owl.carousel/owl.carousel.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
<script src="./libs/apexcharts/apexcharts.js"></script>
<script src="./libs/simplebar/simplebar.min.js"></script>

<!-- APP JS -->
<script src="./js/main.js"></script>
<script src="./js/dashboard.js"></script>
<script src="./js/shortcode.js"></script>
<script src="./js/pages/dashboard.js"></script>


</body>

</html>