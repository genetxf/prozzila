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
$pagetitle = "Projects";
include 'header.php';
?>

<!-- MAIN CONTENT -->
<div class="main">
    <div class="main-content user">
        <div class="row">
            <div class="col-12">
                <div class="box project">
                    <div class="box-header">
                        <h4 class="box-title">Complete list:</h4>
                        <a class="btn btn-primary" href="new-project.php"><i class="fas fa-plus mr-5"></i>Add
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-9 col-xl-12">
                <div class="box">

                    <!-- Table -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div id="task-profile_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
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
                                                <td><?php
                                                    if ($row["work_status"] == "Pending") {
                                                        $workbadge = "badge-danger";
                                                    } elseif ($row["work_status"] == "On Progress") {
                                                        $workbadge = "badge-warning";
                                                    } else
                                                        $workbadge = "badge-success";

                                                    ?><span class="badge <?php echo $workbadge ?>"><?php echo $row["work_status"] ?></span></td>
                                                <td><a href="deleteproject.php?data=<?php echo urlencode($row["project_id"]); ?>" class="btn btn-danger submit-btn">Delete</a></td>
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
                </div>
            </div>

        </div>


    </div>
</div>
<!-- END MAIN CONTENT -->
<?php
include 'copyright.php';
?>
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