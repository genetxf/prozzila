<?php
include 'auth.php';
include 'database.php';
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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- Plugin -->

    <link rel="stylesheet" href="./libs/pg-calendar-master/pignose.calendar.css">
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<?php
$pagetitle = "Project Overview";
include 'header.php';

?>
<!-- MAIN CONTENT -->
<div class="main">

    <div class="main-content project">
        <div class="row">
            <div class="col-9 col-xl-7 col-md-8 col-sm-12">
                <div class="box card-box">
                    <div class="icon-box bg-color-6 d-block">

                        <div class="content text-center color-6">
                            <h5 class="title-box fs-17 font-w500">Total Project</h5>
                            <div class="themesflat-counter fs-18 font-wb">
                                    <span class="number" data-from="0" data-to="309" data-speed="2500"
                                          data-inviewport="yes"><?php $sql4 = "SELECT * FROM `projects`";
                                        $result4 = $conn->query($sql4);
                                        $total = 0;
                                        if ($result4->num_rows > 0) {
                                            while ($row4 = $result4->fetch_assoc()) {
                                                $total = $total + 1;
                                            }
                                            echo $total;

                                        }
                                        ?>+</span>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box bg-color-7 d-block">

                        <div class="content text-center color-7">
                            <h5 class="title-box fs-17 font-w500">Pending Project</h5>
                            <div class="themesflat-counter fs-18 font-wb">
                                <span class="number" data-from="0" data-to="309" data-speed="2500"
                                      data-inviewport="yes"><?php $sql4 = "SELECT * FROM projects
WHERE work_status = 'Pending';";
                                    $result4 = $conn->query($sql4);
                                    $total = 0;
                                    if ($result4->num_rows > 0) {
                                        while ($row4 = $result4->fetch_assoc()) {
                                            $total = $total + 1;
                                        }
                                        echo $total;

                                    }
                                    ?> +</span>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box bg-color-8 d-block">

                        <div class="content text-center color-8">
                            <h5 class="title-box fs-17 font-w500">On Going project</h5>
                            <div class="themesflat-counter fs-18 font-wb">
                                <span class="number" data-from="0" data-to="309" data-speed="2500"
                                      data-inviewport="yes"><?php $sql4 = "SELECT * FROM projects
WHERE work_status = 'On Progress';";
                                    $result4 = $conn->query($sql4);
                                    $total = 0;
                                    if ($result4->num_rows > 0) {
                                        while ($row4 = $result4->fetch_assoc()) {
                                            $total = $total + 1;
                                        }
                                        echo $total;

                                    }
                                    ?> +</span>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box bg-color-9 d-block">

                        <div class="content text-center color-9">
                            <h5 class="title-box fs-17 font-w500">Complete Project</h5>
                            <div class="themesflat-counter fs-18 font-wb">
                                <span class="number" data-from="0" data-to="309" data-speed="2500"
                                      data-inviewport="yes"><?php $sql4 = "SELECT * FROM projects
WHERE work_status = 'Completed';";
                                    $result4 = $conn->query($sql4);
                                    $total = 0;
                                    if ($result4->num_rows > 0) {
                                        while ($row4 = $result4->fetch_assoc()) {
                                            $total = $total + 1;
                                        }
                                        echo $total;

                                    }
                                    ?> +</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3 col-xl-5 col-md-4 col-sm-12">
                <div class="box h-100 d-flex align-items-center">
                    <a class="create d-flex bg-primary justify-content-center" href="new-project.php">
                        <div class="icon color-white pt-4 pr-8">
                            <i class='bx bx-plus-circle'></i>
                        </div>
                        <div class="content">
                            <h5 class="color-white">Create New Project</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="">
                <div class="box-header pt-0 pl-0 ms-0 mb-4 mt-4 border-bottom-0 responsive-header">
                    <h4 class="box-title fs-22">Recent Project Update</h4>
                    <div class="card-options">
                        <div class="btn-list d-flex">
                            <a href="project_list.php" class="btn btn-light d-flex align-items-center mr-5"><i
                                        class="fas fa-eye mr-5"></i>View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $sql3 = "SELECT * FROM `projects` WHERE id BETWEEN 1 AND 4;";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 0) {
                        while ($row3 = $result3->fetch_assoc()) {

                            ?>
                            <div class="col-3 col-xl-6 col-md-6 col-sm-12">
                                <div class="box left-dot">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-12 mb-10">
                                                <div class="mt-0 text-start"><a href="project-details.php?data=<?php echo urlencode($row3["id"]); ?>"
                                                                                class="box-title mb-0 mt-1 mb-3 font-w600 fs-18"><?php echo $row3["project_title"]; ?></a>
                                                    <p class="fs-14 font-w500 text-muted mb-6"><?php echo $row3["department"]; ?></p>
                                                    <span class="fs-13  mt-2 text-muted"><?php echo $row3["description"]; ?></span>
                                                </div>
                                                <img src="./images/icon/experience.png" alt="img" class="img-box">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex mb-3 mb-md-0">
                                                <div class="mr-10">
                                                    <div class="chart-circle chart-circle-xs" data-value="0.75"
                                                         data-thickness="3" data-color="#3C21F7">
                                                        <canvas width="40" height="40"></canvas>
                                                        <div class="chart-circle-value">75%</div>
                                                    </div>
                                                </div>
                                                <ul class="user-list mb-0">
                                                    <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                    <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                    <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                </ul>

                                            </div>
                                            <div class="ms-auto mt-3 mt-sm-0">
                                                <div class="d-flex">
                                                    <div class="task-btn bg-danger-1 text-danger btn-link fs-14"
                                                         data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                         data-bs-original-title="Project Priority">High
                                                    </div>
                                                    <a class="btn btn-outline-light  text-muted pd-0 fs-34" href="#"
                                                       data-bs-toggle="dropdown" aria-haspopup="true"
                                                       aria-expanded="false"><i class='bx bx-dots-vertical-rounded'></i></a>
                                                    <ul class="dropdown-menu " role="menu">
                                                        <li><a href="#"><i class="far fa-eye"></i>View</a></li>
                                                        <li><a href="#"><i class='bx bx-plus-circle'></i>Add</a></li>
                                                        <li><a href="#"><i class='bx bx-trash'></i>Remove</a></li>
                                                        <li><a href="#"><i class='bx bx-cog'></i>More</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "No projects found";
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-md-12">
                <!-- CUSTOMERS CHART -->
                <div class="box f-height">
                    <div class="box-header d-flex justify-content-between">
                        <h3 class="mt-9 fs-22">Project Statistics</h3>
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
            <div class="col-6 col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="me-auto">
                            <h4 class="card-title fs-22">Employee Category</h4>
                            <p class="fs-14 mt-4">Lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                    <div class="box-body pt-0">
                        <div class="row">
                            <div class="col-6 col-xl-12 col-md-6 col-sm-12 w-sm-100 mb-0">
                                <ul class="box-list mt-25 pr-60">
                                    <li><span class="bg-blue square"></span>Web Design<span>25%</span></li>
                                    <li><span class="bg-success square"></span>UX/UI Design<span>18%</span></li>
                                    <li><span class="bg-warning square"></span>Graphics Design<span>17%</span></li>
                                    <li><span class="bg-blue square"></span>Motion Design<span>12.50%</span></li>
                                    <li><span class="bg-success square"></span>Brand Identity<span>12.50%</span></li>
                                    <li><span class="bg-warning square"></span>Others<span>12.50%</span></li>
                                </ul>
                            </div>
                            <div class="col-6 col-xl-12 col-md-6 col-sm-12 w-sm-100 mb-23">
                                <!-- <canvas id="doughnut-chart" width="240" height="240"></canvas> -->
                                <div class="canvas-container" style=" margin: -289px auto;">
                                    <canvas id="chartjs-4" class="chartjs" width="100" height="100"></canvas>
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
            </div>
            <div class="col-6 col-md-12">
                <div class="box">
                    <div class="box-header  pt-0 align-items-start">
                        <div class="me-auto">
                            <h4 class="card-title mb-0 fs-22">Recent Task Activity</h4>
                            <p class="mt-6 fs-14 mb-14">September 4, 2021</p>
                        </div>
                        <div class="card-options pr-3">
                            <div class="dropdown"><a href="#" class="btn ripple btn-outline-light dropdown-toggle fs-12"
                                                     data-bs-toggle="dropdown" aria-expanded="false"> Select Date <i
                                            class="feather feather-chevron-down"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-end" role="menu" style="">
                                    <li><a href="#">Monthly</a></li>
                                    <li><a href="#">Yearly</a></li>
                                    <li><a href="#">Weekly</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body pb-0">
                        <ul class="message mb-2">
                            <li class="dlab-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="./images/avatar/message-01.png" class="rounded-circle user_img"
                                             alt=""/>
                                    </div>
                                    <div class="user_info">
                                        <a class="fs-15 font-w500 mt-5 mb-5" href="message.php">Lucinda Massey</a>
                                        <p class="fs-13 mb-0">2 Hour ago</p>
                                    </div>
                                </div>
                                <div class="card-options me-0 d-flex align-items-center">
                                    <a href="#" class="text-primary fs-14">Add New Task</a>
                                </div>
                            </li>
                            <li class="dlab-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont border-pink">
                                        <img src="./images/avatar/message-02.png" class="rounded-circle user_img"
                                             alt=""/>
                                    </div>
                                    <div class="user_info">
                                        <a class="fs-15 font-w500 mt-5 mb-5" href="message.php">Ryan Nolan</a>
                                        <p class="fs-13 mb-0">25 Min ago</p>
                                    </div>
                                </div>
                                <div class="card-options me-0 d-flex align-items-center">
                                    <a href="#" class="text-success fs-14">Review Completed</a>
                                </div>
                            </li>
                            <li class="dlab-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont border-green">
                                        <img src="./images/avatar/message-03.png" class="rounded-circle user_img"
                                             alt=""/>
                                    </div>
                                    <div class="user_info">
                                        <a class="fs-15 font-w500 mt-5 mb-5" href="message.php">Lucinda Massey</a>
                                        <p class="fs-13 mb-0">2 Hour ago</p>
                                    </div>
                                </div>
                                <div class="card-options me-0 d-flex align-items-center">
                                    <a href="#" class="text-completed fs-14">Task Completed</a>
                                </div>
                            </li>

                            <li class="dlab-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont border-pink">
                                        <img src="./images/avatar/message-02.png" class="rounded-circle user_img"
                                             alt=""/>
                                    </div>
                                    <div class="user_info">
                                        <a class="fs-15 font-w500 mt-5 mb-5" href="message.php">Ryan Nolan</a>
                                        <p class="fs-13 mb-0">25 Min ago</p>
                                    </div>
                                </div>
                                <div class="card-options me-0 d-flex align-items-center">
                                    <a href="#" class="text-success fs-14">Review Completed</a>
                                </div>
                            </li>
                            <li class="dlab-chat-user">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        <img src="./images/avatar/message-01.png" class="rounded-circle user_img"
                                             alt=""/>
                                    </div>
                                    <div class="user_info">
                                        <a class="fs-15 font-w500 mt-5 mb-5" href="message.php">Lucinda Massey</a>
                                        <p class="fs-13 mb-0">2 Hour ago</p>
                                    </div>
                                </div>
                                <div class="card-options me-0 d-flex align-items-center">
                                    <a href="#" class="text-primary fs-14">Add New Task</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <div class="box">
                    <div class="box-header  pt-0">
                        <div class="me-auto">
                            <h4 class="card-title mb-0 fs-22">In Progress Project</h4>

                        </div>
                        <div class="card-options pr-3">
                            <div class="dropdown"><a href="#" class="btn ripple btn-outline-light dropdown-toggle fs-12"
                                                     data-bs-toggle="dropdown" aria-expanded="false"> See All <i
                                            class="feather feather-chevron-down"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-end" role="menu" style="">
                                    <li><a href="#">Monthly</a></li>
                                    <li><a href="#">Yearly</a></li>
                                    <li><a href="#">Weekly</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box-body pb-0">
                        <div class="project-progress-content mt-21 mb-26">
                            <div class="list-group-item d-sm-flex  align-items-center border-0 pd-0">
                                <div class="d-flex w-10">
                                    <div class="task-img bg-primary-transparent"><img src="./images/icon/html-2.png"
                                                                                      alt="img" class=""></div>

                                </div>
                                <div class="w-90 mt-4 mt-md-0 pl-13">
                                    <p class="fs-16 font-w500 ms-auto mb-13">Software Architecture Design</p>
                                    <div class="progress progress-sm w-100">
                                        <div class="progress-bar bg-green-1 w-90"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-17">
                                        <div class="deadline fs-14 font-w500 me-auto d-flex align-items-center"><i
                                                    class='bx bxs-time-five fs-20 mr-9'></i>Deadline : in 3 days
                                        </div>
                                        <ul class="user-list mb-0">
                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-progress-content mt-0 mb-26">
                            <div class="list-group-item d-sm-flex  align-items-center border-0 pd-0">
                                <div class="d-flex w-10">
                                    <div class="task-img bg-primary-transparent"><img src="./images/icon/html-2.png"
                                                                                      alt="img" class=""></div>

                                </div>
                                <div class="w-90 mt-4 mt-md-0 pl-13">
                                    <p class="fs-16 font-w500 ms-auto mb-13">Web Development</p>
                                    <div class="progress progress-sm w-100">
                                        <div class="progress-bar bg-primary-1 w-90"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-17">
                                        <div class="deadline fs-14 font-w500 me-auto d-flex align-items-center"><i
                                                    class='bx bxs-time-five fs-20 mr-9'></i>Deadline : in 3 days
                                        </div>
                                        <ul class="user-list mb-0">
                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="project-progress-content mt-0">
                            <div class="list-group-item d-sm-flex  align-items-center border-0 pd-0">
                                <div class="d-flex w-10">
                                    <div class="task-img bg-primary-transparent"><img src="./images/icon/html-2.png"
                                                                                      alt="img" class=""></div>

                                </div>
                                <div class="w-90 mt-4 mt-md-0 pl-13">
                                    <p class="fs-16 font-w500 ms-auto mb-13">Mobile App Development</p>
                                    <div class="progress progress-sm w-100">
                                        <div class="progress-bar bg-danger w-90"></div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-17">
                                        <div class="deadline fs-14 font-w500 me-auto d-flex align-items-center"><i
                                                    class='bx bxs-time-five fs-20 mr-9'></i>Deadline : in 3 days
                                        </div>
                                        <ul class="user-list mb-0">
                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="box ">
                    <div class="box-header  pt-0">
                        <div class="me-auto">
                            <h4 class="card-title mb-0 fs-22">Recent Project Activity</h4>

                        </div>
                        <div class="card-options pr-3">
                            <div class="dropdown"><a href="#" class="btn ripple btn-outline-light dropdown-toggle fs-14"
                                                     data-bs-toggle="dropdown" aria-expanded="false"> See All <i
                                            class="feather feather-chevron-down"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-end" role="menu" style="">
                                    <li><a href="#">Monthly</a></li>
                                    <li><a href="#">Yearly</a></li>
                                    <li><a href="#">Weekly</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer"
                                   id="task-profile" role="grid">
                                <thead>
                                <tr class="top">
                                    <th class="border-bottom-0 text-center sorting fs-14 font-w500"
                                        tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 26.6562px;">No
                                    </th>
                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 222.312px;">Task
                                    </th>
                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 84.8281px;">Priority
                                    </th>
                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 87.9844px;">Start Date
                                    </th>
                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 87.9844px;">Deadline
                                    </th>
                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 71.875px;">Progress
                                    </th>
                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                        style="width: 110.719px;">Work Status
                                    </th>
                                    <th class="border-bottom-0 sorting_disabled fs-14 font-w500" rowspan="1"
                                        colspan="1" style="width: 145.391px;">Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql4 = "SELECT * FROM `projects` WHERE id BETWEEN 1 AND 10;";
                                $result4 = $conn->query($sql4);
                                if ($result4->num_rows > 0) {
                                    while ($row4 = $result4->fetch_assoc()) {


                                        ?>
                                        <tr class="odd">
                                            <td class="text-center"><?php echo $row4["project_id"] ?></td>
                                            <td>
                                                <a href="#" class="d-flex ">
                                                    <span><?php echo $row4["project_title"] ?></span> </a>
                                            </td>
                                            <td><?php
                                                if ($row4["priority"] == "High") {
                                                    $badge = "badge-danger-light";
                                                } elseif ($row4["priority"] == "Medium") {
                                                    $badge = "badge-warning-light";
                                                } else
                                                    $badge = "badge-success-light";

                                                ?>
                                                <span class="badge <?php echo $badge ?>"><?php echo $row4["priority"] ?></span>
                                            </td>
                                            <td><?php echo $row4["start_date"] ?></td>
                                            <td><?php echo $row4["end_date"] ?></td>
                                            <td>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-primary w-30"></div>
                                                </div>
                                            </td>
                                            <td><?php
                                                if ($row4["work_status"] == "Pending") {
                                                    $workbadge = "badge-danger";
                                                } elseif ($row4["work_status"] == "On Progress") {
                                                    $workbadge = "badge-warning";
                                                } else
                                                    $workbadge = "badge-success";

                                                ?>
                                                <span class="badge <?php echo $workbadge ?>"><?php echo $row4["work_status"] ?></span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn-link"
                                                       data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class='bx bx-dots-horizontal-rounded'></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#delete_client"><i class="bx bx-trash"></i>
                                                            Delete</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                                           data-target="#edit_client"><i
                                                                    class="bx bx-edit mr-5"></i>Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "No projects found";
                                }

                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="add_project" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input class="form-control" value="" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Client</label>
                                        <select class="select">
                                            <option>Client 1</option>
                                            <option>Client 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control " type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control " type="date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input placeholder="$50" class="form-control" value="" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <select class="select">
                                            <option>Hourly</option>
                                            <option selected>Fixed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="select">
                                            <option selected>High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" class="form-control"
                                          placeholder="Enter your message here"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Files</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="delete_project" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Card</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6 mb-0">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6 mb-0">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                       class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="edit_card_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Card</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Image Card</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" class="form-control" value="Food Website hero area">
                            </div>
                            <div class="form-group">
                                <label>Due Date</label>
                                <div class="cal-icon">
                                    <input class="form-control " type="date" value="">
                                </div>
                            </div>
                            <div class="submit-section text-center">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="add_card_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Card</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Image Card</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Due Date</label>
                                <div class="cal-icon">
                                    <input class="form-control " type="date" value="">
                                </div>
                            </div>
                            <div class="submit-section text-center">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
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
<script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./libs/peity/jquery.peity.min.js"></script>
<script src="./libs/chart.js/Chart.bundle.min.js"></script>
<script src="./libs/owl.carousel/owl.carousel.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
<script src="./js/countto.js"></script>
<script src="./libs/circle-progress/circle-progress.min.js"></script>
<script src="./libs/pg-calendar-master/pignose.calendar.full.min.js"></script>
<script src="./libs/apexcharts/apexcharts.js"></script>
<script src="./libs/simplebar/simplebar.min.js"></script>

<!-- APP JS -->
<script src="./js/pages/chart-circle.js"></script>
<script src="./js/main.js"></script>
<script src="./js/pages/project.js"></script>
<script src="./js/shortcode.js"></script>
<script src="./js/script.js"></script>
<script src="./js/pages/dashboard.js"></script>
</body>

</html>