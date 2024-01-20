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
                                                <div class="mt-0 text-start"><a
                                                            href="project-details.php?data=<?php echo urlencode($row3["id"]); ?>"
                                                            class="box-title mb-0 mt-1 mb-3 font-w600 fs-18"><?php echo $row3["project_title"]; ?></a>
                                                    <p class="fs-14 font-w500 text-muted mb-6"><?php echo $row3["department"]; ?></p>
                                                    <span class="fs-13  mt-2 text-muted"><?php echo $row3["description"]; ?></span>
                                                </div>
                                                <img src="./images/icon/<?php echo $row3["department"]; ?>.svg"
                                                     alt="img" class="img-box">
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
            <div class="col-12 col-md-12">
                <div class="box ">
                    <div class="box project">
                        <div class="box-header">
                            <h4 class="box-title">Recent Project List</h4>
                            <a class="btn btn-success" href="project_list.php"></i>View All</a>
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
<?php
include 'copyright.php';
?>
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