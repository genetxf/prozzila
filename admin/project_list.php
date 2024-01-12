<?php
include 'auth.php';
include 'database.php';
// Query to fetch project details
$sql = "SELECT * FROM `projects`";
$result = $conn->query($sql);

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
$pagetitle = "Project List";
include 'header.php';
?>

<!-- MAIN CONTENT -->
<div class="main">
    <div class="main-content user">
        <div class="row">
            <div class="col-9 col-xl-12">
                <div class="box">
                    <!-- Search -->
                    <div class="box-body pb-30">
                        <div class="row">
                            <div class="col-md-12 col-xl-10 mb-0">
                                <div class="row">
                                    <div class="col-md-12 col-xl-4 mb-0">
                                        <div class="form-group"><label class="form-label">From:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class='bx bx-calendar'></i></div>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="DD-MM-YYYY"
                                                       type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-4 mb-0">
                                        <div class="form-group"><label class="form-label">To:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class='bx bx-calendar'></i></div>
                                                </div>
                                                <input class="form-control fc-datepicker" placeholder="DD-MM-YYYY"
                                                       type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-4 mb-0">
                                        <div class="form-group"><label class="form-label">Select Priority:</label>
                                            <select name="attendance"
                                                    class="form-control custom-select select2 select2-hidden-accessible"
                                                    data-placeholder="Select Priority" tabindex="-1" aria-hidden="true"
                                                    data-select2-id="select2-data-16-akyu">
                                                <option label="Select Priority"
                                                        data-select2-id="select2-data-18-ezae"></option>
                                                <option value="1">High</option>
                                                <option value="2">Medium</option>
                                                <option value="3">Low</option>
                                            </select>
                                            <span class="select2 select2-container select2-container--default" dir="ltr"
                                                  data-select2-id="select2-data-17-6y8j" style="width: 100%;"><span
                                                        class="selection"><span
                                                            class="select2-selection select2-selection--single"
                                                            role="combobox" aria-haspopup="true" aria-expanded="false"
                                                            tabindex="0" aria-disabled="false"
                                                            aria-labelledby="select2-attendance-ws-container"
                                                            aria-controls="select2-attendance-ws-container"><span
                                                                class="select2-selection__rendered"
                                                                id="select2-attendance-ws-container" role="textbox"
                                                                aria-readonly="true" title="Select Priority"></span>
                                                <span class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span>
                                                </span>
                                                </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-2 mb-0">
                                <div class="form-group mt-32"><a href="#" class="btn bg-primary btn-block color-white">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div id="task-profile_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <!-- Table Row Show
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="task-profile_length"><label>Show <select name="task-profile_length" aria-controls="task-profile" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="task-profile_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="task-profile"></label></div>
                                    </div>
                                </div>
                                -->
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
                                            if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {



                                            ?>
                                            <tr class="odd">
                                                <td class="text-center"><?php echo $row["project_id"] ?></td>
                                                <td>
                                                    <a href="project-details.php?data=<?php echo urlencode($row["id"]); ?>" class="d-flex "> <span><?php echo $row["project_title"] ?></span> </a>
                                                </td>
                                                <td><?php
                                                    if ($row["priority"] == "High") {
                                                        $badge = "badge-danger-light";
                                                    } elseif ($row["priority"] == "Medium") {
                                                        $badge = "badge-warning-light";
                                                    } else
                                                        $badge = "badge-success-light";

                                                    ?>
                                                    <span class="badge <?php echo $badge ?>"><?php echo $row["priority"] ?></span>
                                                </td>
                                                <td><?php echo $row["start_date"] ?></td>
                                                <td><?php echo $row["end_date"] ?></td>
                                                <td>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-primary w-30"></div>
                                                    </div>
                                                </td>
                                                <td><?php
                                                    if ($row["work_status"] == "Pending") {
                                                        $workbadge = "badge-danger";
                                                    } elseif ($row["work_status"] == "On Progress") {
                                                        $workbadge = "badge-warning";
                                                    } else
                                                        $workbadge = "badge-success";

                                                    ?><span class="badge <?php echo $workbadge ?>"><?php echo $row["work_status"] ?></span></td>
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="task-profile_info" role="status"
                                             aria-live="polite">Showing 1 to 8 of 8 entries
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="task-profile_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="task-profile_previous"><a href="#" aria-controls="task-profile"
                                                                                  data-dt-idx="0" tabindex="0"
                                                                                  class="page-link">Previous</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                                                          aria-controls="task-profile"
                                                                                          data-dt-idx="1" tabindex="0"
                                                                                          class="page-link">01</a></li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                                                                aria-controls="task-profile"
                                                                                                data-dt-idx="1"
                                                                                                tabindex="0"
                                                                                                class="page-link">02</a>
                                                </li>
                                                <li class="paginate_button page-item "><a href="#"
                                                                                          aria-controls="task-profile"
                                                                                          data-dt-idx="1" tabindex="0"
                                                                                          class="page-link">03</a></li>
                                                <li class="paginate_button page-item next disabled"
                                                    id="task-profile_next"><a href="#" aria-controls="task-profile"
                                                                              data-dt-idx="2" tabindex="0"
                                                                              class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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