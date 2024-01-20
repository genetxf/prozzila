<?php
include 'auth.php';
include 'database.php';
// Query to fetch project details
    $clienttid = $_GET['data'];
    $sql = "SELECT * FROM `client`where id = '$clienttid'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $clientname = $row["name"];
            $email = $row["email_id"];
            $cont = $row["contact_no"];
            $country = $row["country"];
            $add = $row["address"];
            $clientstatus = $row["status"];
            $about = $row["about"];
            $web = $row["website"];
            $logo = $row["image"];
        }}
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
$pagetitle = "Client Details";
include 'header.php';

?>

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-content client project">
            <div class="row">
                <div class="col-12">
                    <div class="box card-box">
                        <div class="icon-box bg-color-6 d-block">

                            <div class="content text-center color-6">
                                <h5 class="title-box fs-17 font-w500">Total Project</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                    <span class="number" data-from="0" data-to="309" data-speed="2500"
                                          data-inviewport="yes"><?php $sql4 = "SELECT * FROM `projects` where client = '$clientname'";
                                            $result4 = $conn->query($sql4);
                                            $total = 0;
                                            if ($result4->num_rows > 0) {
                                                while ($row4 = $result4->fetch_assoc()) {
                                                    $total = $total + 1;
                                                }
                                                echo $total;

                                            }
                                            else
                                                echo $total;
                                        ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box bg-color-9 d-block">

                            <div class="content text-center color-9">
                                <h5 class="title-box fs-17 font-w500">Pending Project</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                <span class="number" data-from="0" data-to="309" data-speed="2500"
                                      data-inviewport="yes"><?php $sql4 = "SELECT * FROM projects WHERE work_status = 'Pending' and client = '$clientname'";
                                        $result4 = $conn->query($sql4);
                                        $total = 0;
                                        if ($result4->num_rows > 0) {
                                            while ($row4 = $result4->fetch_assoc()) {
                                                $total = $total + 1;
                                            }
                                            echo $total;

                                        }
                                        else
                                            echo $total;
                                    ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box bg-color-7 d-block">

                            <div class="content text-center color-7">
                                <h5 class="title-box fs-17 font-w500">On Going project</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                <span class="number" data-from="0" data-to="309" data-speed="2500"
                                      data-inviewport="yes"><?php $sql4 = "SELECT * FROM projects
WHERE work_status = 'On Progress' and client = '$clientname'";
                                        $result4 = $conn->query($sql4);
                                        $total = 0;
                                        if ($result4->num_rows > 0) {
                                            while ($row4 = $result4->fetch_assoc()) {
                                                $total = $total + 1;
                                            }
                                            echo $total;

                                        }
                                        else
                                            echo $total;
                                    ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box bg-color-8 d-block">

                            <div class="content text-center color-8">
                                <h5 class="title-box fs-17 font-w500">Complete Project</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                <span class="number" data-from="0" data-to="309" data-speed="2500"
                                      data-inviewport="yes"><?php $sql4 = "SELECT * FROM projects
WHERE work_status = 'Completed' and client = '$clientname'";
                                        $result4 = $conn->query($sql4);
                                        $total = 0;
                                        if ($result4->num_rows > 0) {
                                            while ($row4 = $result4->fetch_assoc()) {
                                                $total = $total + 1;
                                            }
                                            echo $total;

                                        }
                                        else
                                            echo $total;
                                    ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-4 col-xl-12">
                    <div class="box user-pro-list overflow-hidden mb-30">
                        <div class="box-body">
                            <div class="user-pic text-center">
                                <div class="align-items-center">

                                    <div class="dropdown d-inline-block mt-12">
                                        <button type="" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img class="rounded-circle header-profile-user" src="../images/client/<?php echo $logo ?>" alt="Header Avatar">

                                            <?php
                                                if ($clientstatus != "Active") {
                                                    $workbg= "bg-danger";
                                                }

                                            ?>
                                            <span class="pulse-css <?php echo $workbg ?>"></span>
                                        </button>

                                    </div>
                                </div>

                                <div class="pro-user mt-3">
                                    <h2 class="pro-user-username text-dark color-span"><?php echo $clientname; ?></h2>
                                    <span class="badge badge-success"><?php echo $clientstatus; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box pd-0 mb-30">
                        <div class="tab-menu-heading hremp-tabs p-0 ">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs w-100 d-flex">
                                    <li class=""><a href="#tab1" class="active" data-bs-toggle="tab">Overview</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab" class="">Projects</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body tabs-menu-body hremp-tabs1 p-0">

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="box-body pl-15 pr-15 pb-20 pr-0">
                                        <h5 class="mb-10 mt-32 font-w600 fs-18 line-h18">About</h5>
                                        <p class="fs-15 line-h18 mb-22"><?php echo $about; ?></p>

                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="box-body pl-15 pr-15 pb-20 table-responsive activity mt-10">
                                        <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer mw-100" id="task-profile" role="grid">
                                            <thead>
                                            <tr class="top">
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 222.312px;">ID</th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 222.312px;">Project</th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Start</th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Deadline</th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 110.719px;">Work Status</th>
                                                <th class="border-bottom-0 sorting_disabled fs-14 font-w500" rowspan="1" colspan="1" style="width: 145.391px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                                $sql2 = "SELECT * FROM `projects`where client = '$clientname'";
                                                $result2 = $conn->query($sql2);
                                                if ($result2->num_rows > 0) {
                                                    while ($row2 = $result2->fetch_assoc()) {



                                                        ?>
                                                        <tr class="odd">
                                                            <td>
                                                                <a href="#" class="d-flex "> <span><?php echo $row2["project_id"] ?></span> </a>
                                                            </td>
                                                            <td>
                                                                <a href="project-details.php?data=<?php echo urlencode($row2["id"]); ?>" class="d-flex "> <span><?php echo $row2["project_title"] ?></span> </a>
                                                            </td>
                                                            <td><?php echo $row2["start_date"] ?></td>
                                                            <td><?php echo $row2["end_date"] ?></td>
                                                            <td><?php
                                                                    if ($row2["work_status"] == "Pending") {
                                                                        $workbadge = "badge-danger";
                                                                    } elseif ($row2["work_status"] == "On Progress") {
                                                                        $workbadge = "badge-warning";
                                                                    } else
                                                                        $workbadge = "badge-success";

                                                                ?><span class="badge <?php echo $workbadge ?>"><?php echo $row2["work_status"] ?></span></td>
                                                            <td><a href="deleteproject.php?data=<?php echo urlencode($row2["project_id"]); ?>" class="btn btn-danger submit-btn">Delete</a></td>
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
                            </div>
                        </div>
                    </div>
                    <div class="box left-dot mb-30">
                        <div class="box-header  border-0 pd-0">
                            <div class="box-title fs-20 font-w600">Company Info</div>
                        </div>
                        <div class="box-body pt-20 user-profile">
                            <div class="table-responsive">
                                <table class="table mb-0 mw-100 color-span">
                                    <tbody>
                                    <tr>
                                        <td class="py-2 px-0"> <span class="w-50">Email ID</span> </td>
                                        <td>:</td>
                                        <td class="py-2 px-0"> <span class=""><?php echo $email; ?></span> </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-0"> <span class="w-50">Contact no</span> </td>
                                        <td>:</td>
                                        <td class="py-2 px-0"> <span class=""><?php echo $cont; ?></span> </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-0"> <span class="w-50">Country</span> </td>
                                        <td>:</td>
                                        <td class="py-2 px-0"> <span class=""><?php echo $country; ?></span> </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-0"> <span class="w-50">Address</span> </td>
                                        <td>:</td>
                                        <td class="py-2 px-0"> <span class=""><?php echo $add; ?></span> </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-0"> <span class="w-50">Website</span> </td>
                                        <td>:</td>
                                        <td class="py-2 px-0"> <span class=""><?php echo $web; ?></span> </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 px-0"> <span class="w-50">Status</span> </td>
                                        <td>:</td>
                                        <td class="py-2 px-0"> <span class="badge badge-success"><?php echo $clientstatus; ?></span> </td>
                                    </tr>
                                    </tbody>
                                </table>
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


</body>

</html>