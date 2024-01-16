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

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer" id="task-profile" role="grid">
                                                <thead>
                                                    <tr class="top">
                                                        <th class="border-bottom-0 text-center sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 26.6562px;">No</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 222.312px;">Task</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 84.8281px;">Priority</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Start Date</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Deadline</th>
                                                        <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 110.719px;">Work Status</th>
                                                        <th class="border-bottom-0 sorting_disabled fs-14 font-w500" rowspan="1" colspan="1" style="width: 145.391px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql2 = "SELECT * FROM tasks";
                                                $result2 = $conn->query($sql2);
                                                if ($result2->num_rows > 0) {
                                                while ($row = $result2->fetch_assoc()) {



                                                ?>
                                                    <tr class="odd">
                                                        <td class="text-center"><?php echo $row["id"]; ?></td>
                                                        <td>
                                                            <a href="#" class="d-flex "> <span><?php echo $row["task_name"]; ?></span> </a>
                                                        </td>
                                                        <td><span class="badge badge-danger-light"><?php echo $row["priority"]; ?></span></td>
                                                        <td><?php echo $row["start_date"]; ?></td>
                                                        <td><?php echo $row["due_date"]; ?></td>

                                                        <td><span class="badge badge-warning"><?php echo $row["status"]; ?></span></td>
                                                        <td><a href="deleteclient.php?data=<?php echo urlencode($row["id"]); ?>" class="btn btn-danger submit-btn">Delete</a></td>

                                                    </tr>
                                                    <?php
                                                }
                                                } else {
                                                    echo "No projects found";
                                                }


                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="task-profile_info" role="status" aria-live="polite">Showing 1 to 8 of 8 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="task-profile_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled" id="task-profile_previous"><a href="#" aria-controls="task-profile" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="task-profile" data-dt-idx="1" tabindex="0" class="page-link">01</a></li>
                                                    <li class="paginate_button page-item active"><a href="#" aria-controls="task-profile" data-dt-idx="1" tabindex="0" class="page-link">02</a></li>
                                                    <li class="paginate_button page-item "><a href="#" aria-controls="task-profile" data-dt-idx="1" tabindex="0" class="page-link">03</a></li>
                                                    <li class="paginate_button page-item next disabled" id="task-profile_next"><a href="#" aria-controls="task-profile" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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