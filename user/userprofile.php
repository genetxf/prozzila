<?php
include 'auth.php';
include 'database.php';
$sql = "SELECT * FROM profiles";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Protend - Project Management Admin Dashboard HTML Template
    </title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- Plugin -->
    <link rel="stylesheet" href="./libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./libs/date-picker/datepicker.css">
    <link rel="stylesheet" href="./libs/datatable/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./libs/rating/css/rating-themes.css">
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<?php
$pagetitle = "User Profile";
include 'header.php';

?>

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-content user">
            <div class="row">
                <div class="col-9 col-xl-12">
                    <div class="box">

                        <div class="box-body">
                            <div class="table-responsive">
                                <div id="task-profile_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-12">
                    <div class="box user-pro-list overflow-hidden mb-30">
                        <div class="box-body">
                            <div class="user-pic text-center">
                                <div class="avatar ">
                                    <img style=" width: 100px; border-radius: 10%;" src="./images/profile/<?php echo $logpicture;?>" alt="">
                                    <div class="pulse-css"></div>
                                </div>
                                <div class="pro-user mt-40">
                                    <h5 class="pro-user-username text-dark mb-1 fs-15"><?php echo $loguser; ?></h5>
                                    <h6 class="pro-user-desc text-muted fs-14"><?php echo $logemail; ?></h6>
                                    <div class="star-ratings start-ratings-main mb-10 clearfix">
                                        <div class="stars stars-example-fontawesome star-sm">
                                            <div class="br-wrapper br-theme-fontawesome-stars">
                                                <select id="example-fontawesome" name="rating" style="display: none;"><option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4" selected="">4</option> <option value="5">5</option> </select>
                                                <!-- <div class="br-widget">
                                                    <a href="#" data-rating-value="1" data-rating-text="1" class="br-selected"></a>
                                                    <a href="#" data-rating-value="2" data-rating-text="2" class="br-selected"></a>
                                                    <a href="#" data-rating-value="3" data-rating-text="3" class="br-selected"></a>
                                                    <a href="#" data-rating-value="4" data-rating-text="4" class="br-selected br-current"></a>
                                                    <a href="#" data-rating-value="5" data-rating-text="5"></a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="box-footer pt-38">
                            <div class="btn-list text-center">
                                <a href="#" class="btn btn-light"><i class='bx bxs-envelope' ></i> </a>
                                <a href="#" class="btn btn-light"> <i class='bx bxs-phone-call'></i> </a>
                                <a href="#" class="btn btn-light"><i class='bx bxs-error-circle' ></i></a>
                                <a href="#" class="btn btn-light"> <i class='bx bxs-message-alt-edit'></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="box left-dot pt-39 mb-30">
                        <div class="box-header  border-0 ">
                            <div class="box-title fs-20 font-w600">Basic Info</div>
                        </div>
                        <div class="box-body pt-16 user-profile">
                            <div class="table-responsive">
                                <table class="table mb-0 mw-100 color-span">
                                    <tbody>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Employee ID</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">#365900</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Designation</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Sr. Designer</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Department</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Development</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Join Date</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">25 - 12 - 2022</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Phone Number</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">+11 05986 2359 03</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Status</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="badge badge-success">Active</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box left-dot">
                        <div class="box-header  border-0 ">
                            <div class="box-title fs-20 font-w600">Statistics</div>
                        </div>
                        <div class="box-body pt-10 ">
                            <div class="d-flex justify-content-between mt-10">
                                <div class="progress-cicle">
                                    <div class="chart-circle chart-circle-xl" data-value="0.75" data-thickness="5" data-color="#E6154E"><canvas width="80" height="80"></canvas><canvas width="80" height="80"></canvas>
                                        <div class="chart-circle-value">45%</div>
                                    </div>
                                    <div class="title-progress fs-15 font-w600 mt-10">Task</div>
                                </div>
                                <div class="progress-cicle">
                                    <div class="chart-circle chart-circle-xl" data-value="0.75" data-thickness="5" data-color="#3C21F7"><canvas width="80" height="80"></canvas><canvas width="80" height="80"></canvas>
                                        <div class="chart-circle-value">55%</div>
                                    </div>
                                    <div class="title-progress fs-15 font-w600 mt-10">Projects</div>
                                </div>
                                <div class="progress-cicle">
                                    <div class="chart-circle chart-circle-xl" data-value="0.75" data-thickness="5" data-color="#E58911"><canvas width="80" height="80"></canvas><canvas width="80" height="80"></canvas>
                                        <div class="chart-circle-value">75%</div>
                                    </div>
                                    <div class="title-progress fs-15 font-w600 mt-10">Performanance</div>
                                </div>
                            </div>

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
    <script src="./libs/jquery/jquery-ui.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/apexcharts/apexcharts.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/peity/jquery.peity.min.js"></script>
    <script src="./libs/chart.js/Chart.bundle.min.js"></script>
    <script src="./libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="./js/countto.js"></script>
    <script src="./libs/date-picker/datepicker.js"></script>
    <script src="./libs/rating/js/custom-ratings.js"></script>
    <script src="./libs/rating/js/jquery.barrating.js"></script>
    <script src="./libs/circle-progress/circle-progress.min.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>


    <!-- APP JS -->
    <script src="./js/main.js"></script>
    <script src="./js/shortcode.js"></script>
    <script src="./js/pages/datepicker.js"></script>
    <script src="./js/pages/chart-circle.js"></script>


</body>

</html>