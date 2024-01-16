<?php
session_start();
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
    <link href='./css/boxicons.min.css' rel='stylesheet'>

    <!-- Plugin -->
    <link rel="stylesheet" href="./libs/owl.carousel/assets/owl.carousel.min.css">

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <!-- ... -->
</head>

<?php
$pagetitle = "Welcome to ProZZila";
include 'header.php';

?>

<!-- MAIN CONTENT -->

<div class="main">


    <div class="main-content dashboard">

        <div class="row">




            <div class="col-6 col-xl-12 col-sm-12">
                <div class="box">
                    <div class="box-body d-flex pb-0">
                        <div class="me-auto">
                            <h5 class="box-title">Total projects</h5>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-0 font-wb fs-30 mt-23"><?php $sql4 = "SELECT * FROM `projects`";
                                    $result4 = $conn->query($sql4);
                                    $total = 0;
                                    if ($result4->num_rows > 0) {
                                        while ($row4 = $result4->fetch_assoc()) {
                                            $total = $total + 1;
                                        }
                                        echo $total;
                                        $total3 = $total;
                                    }
                                    ?></h4>
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
                                <?php $sql5 = "SELECT * FROM projects
WHERE work_status = 'Completed';";
                                $result5 = $conn->query($sql5);
                                $total5 = 0;
                                if ($result5->num_rows > 0) {
                                    while ($row5 = $result5->fetch_assoc()) {
                                        $total5 = $total5 + 1;
                                    }
                                    $total4=$total5;

                                }$totalper=($total4/$total3)*100;
                                $totalper2=$total3-$total4;
                                ?>
                                <div class="progress-bar bg-primary progress-animated"
                                     style="width: <?php
                                     echo $totalper;
                                     ?>%; height:10px;" role="progressbar">
                                    <span class="sr-only"> <?php
                                        echo $totalper;
                                        ?> Complete</span>
                                </div>
                            </div>
                            <p class="fs-16 mb-0 mt-2"><span class="text-primary"><?php echo $totalper2; ?> </span>left from target</p>
                        </div>
                        <h4 class="numb font-wb fs-30"><?php echo $total4; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-12 col-sm-12">
                <div class="box">
                    <div class="box-body d-flex pb-0">
                        <div class="me-auto">
                            <h4 class="numb fs-30 font-wb"><?php $sql4 = "SELECT * FROM `client`";
                                $result4 = $conn->query($sql4);
                                $total = 0;
                                if ($result4->num_rows > 0) {
                                while ($row4 = $result4->fetch_assoc()) {
                                $total = $total + 1;
                                }
                                echo $total;
                                $total3 = $total;
                                }
                                ?></h4>
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

<?php
// Count completed projects for each month
$sql_completed = "SELECT MONTH(`start_date`) AS month, COUNT(*) AS count_completed 
                  FROM `projects` 
                  WHERE `work_status` = 'Completed' 
                  GROUP BY month";

$result_completed = $conn->query($sql_completed);
$completed_data = array();

if ($result_completed->num_rows > 0) {
    while ($row = $result_completed->fetch_assoc()) {
        $completed_data[] = intval($row['count_completed']); // Cast to integer
    }
}

// Count projects in progress for each month
$sql_in_progress = "SELECT MONTH(`start_date`) AS month, COUNT(*) AS count_in_progress 
                    FROM `projects` 
                    WHERE `work_status` = 'On Progress' 
                    GROUP BY month";

$result_in_progress = $conn->query($sql_in_progress);
$in_progress_data = array();

if ($result_in_progress->num_rows > 0) {
    while ($row = $result_in_progress->fetch_assoc()) {
        $in_progress_data[] = intval($row['count_in_progress']); // Cast to integer
    }
}

// Combine the data and return as JSON
$data_to_save = json_encode(array("completed" => $completed_data, "in_progress" => $in_progress_data));
file_put_contents('./js/pages/data.json', $data_to_save);

?>

<!-- SCRIPT -->
<!-- APEX CHART -->
<?php
include 'copyright.php';
?>
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