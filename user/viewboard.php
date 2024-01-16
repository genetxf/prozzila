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
        prozzila - Project Management System
    </title>
    <link rel="shortcut icon" href="./images/favicon.svg" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<?php
$pagetitle = "Board";
include 'header.php';

?>
<!-- MAIN CONTENT -->
<div class="main">


    <div class="main-content board">

        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="divider"></div>
                    <div  class="modal custom-modal fade"">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <?php
                            // Fetch data from the "cards" table
                            $projectid = $_GET['data'];

                            // Fetch tasks for the current card
                            $tasksSql = "SELECT * FROM tasks WHERE card_id = $projectid";
                            $tasksResult = $conn->query($tasksSql);

                            ?><div class="modal-content">
                                <div class="modal-header">
                                    <span class="h2 me-2"><?= $row['title'] ?></span>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="cardassign.php" method="post">
                                        <div class="box rounded-3">
                                            <div class="card-body p-4">

                                                <p class="h5"><i class="bx bx-notepad align-middle text-muted" style=" font-size: 130%;"></i> Description</p>
                                                <p class="px-3 mb-2">
                                                <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                                </p><p class="h5"><i class="bx bx-list-ol align-middle text-muted" style=" font-size: 130%;"></i> Priority</p>

                                                <p class="px-3 mb-2">
                                                    <span class="badge bg-danger">checklist</span>
                                                </p><div class="divider d-flex align-items-center my-4"></div>

                                                <p class="h5"><i class="bx bx-calendar align-middle text-muted" style="font-size: 130%;"></i> Timeline</p>
                                                <p class="px-3 mb-2">
                                                    <span class="badge badge-warning-light">04/01/2020</span>
                                                    <i class="bx bx-move-horizontal align-middle"></i>
                                                    <span class="badge badge-warning-light">04/01/2020 </span>
                                                </p>

                                                <div class="divider d-flex align-items-center my-4"></div>
                                                <?php while ($task = $tasksResult->fetch_assoc()) : ?>
                                                    <input type="checkbox" id="task_<?= $task['id'] ?>" name="tasks[]" value="<?= $task['id'] ?>">
                                                    <a href="testtask.php?<?= $task['id'] ?>" for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a><br>
                                                <?php endwhile; ?>
                                                <!--<div>
                                                    <ul class="list-group rounded-0">
                                                        <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="..." checked="">
                                                            <s>Task list and assignments</s>
                                                        </li>
                                                        <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                            Set due date and assignments
                                                        </li>
                                                        <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                            Remove duplicate tasks and stories
                                                        </li>
                                                        <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                            Update the userflow and stories
                                                        </li>
                                                        <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                            Adjust the components
                                                        </li>
                                                    </ul>
                                                </div>-->

                                                <div class="divider d-flex align-items-center my-4">

                                                </div><p class="text-center mx-3 mb-0 text-muted">Shared with</p>

                                                <div class="divider d-flex align-items-center my-4">

                                                </div><ul class="list-group rounded-0 list-group-horizontal justify-content-center pb-2">
                                                    <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                                    </li>
                                                    <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                                    </li>
                                                    <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                                    </li>
                                                    <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                                    </li>
                                                </ul>

                                                <div class="divider d-flex align-items-center my-4">

                                                </div><div class="col">
                                                    <div class="submit-section justify-content-center">
                                                        <button class="btn btn-primary submit-btn">Save</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- View Card end Modal -->
                </div>
            </div>

        </div>


        <!-- View Card Modal -->

        <div id="view_card_modal" class="modal custom-modal fade">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <?php
                // Fetch data from the "cards" table
                $projectid = $_GET['data'];

                // Fetch tasks for the current card
                $tasksSql = "SELECT * FROM tasks WHERE card_id = $projectid";
                $tasksResult = $conn->query($tasksSql);

                ?><div class="modal-content">
                    <div class="modal-header">
                        <span class="h2 me-2"><?= $row['title'] ?></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="cardassign.php" method="post">
                            <div class="box rounded-3">
                                <div class="card-body p-4">

                                    <p class="h5"><i class="bx bx-notepad align-middle text-muted" style=" font-size: 130%;"></i> Description</p>
                                    <p class="px-3 mb-2">
                                    <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                    </p><p class="h5"><i class="bx bx-list-ol align-middle text-muted" style=" font-size: 130%;"></i> Priority</p>

                                    <p class="px-3 mb-2">
                                        <span class="badge bg-danger">checklist</span>
                                    </p><div class="divider d-flex align-items-center my-4"></div>

                                    <p class="h5"><i class="bx bx-calendar align-middle text-muted" style="font-size: 130%;"></i> Timeline</p>
                                    <p class="px-3 mb-2">
                                        <span class="badge badge-warning-light">04/01/2020</span>
                                        <i class="bx bx-move-horizontal align-middle"></i>
                                        <span class="badge badge-warning-light">04/01/2020 </span>
                                    </p>

                                    <div class="divider d-flex align-items-center my-4"></div>
                                    <?php while ($task = $tasksResult->fetch_assoc()) : ?>
                                        <input type="checkbox" id="task_<?= $task['id'] ?>" name="tasks[]" value="<?= $task['id'] ?>">
                                        <a href="testtask.php?<?= $task['id'] ?>" for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a><br>
                                    <?php endwhile; ?>
                                    <!--<div>
                                        <ul class="list-group rounded-0">
                                            <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="..." checked="">
                                                <s>Task list and assignments</s>
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                Set due date and assignments
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                Remove duplicate tasks and stories
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                Update the userflow and stories
                                            </li>
                                            <li class="list-group-item border-0 d-flex align-items-center ps-0">
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                                Adjust the components
                                            </li>
                                        </ul>
                                    </div>-->

                                    <div class="divider d-flex align-items-center my-4">

                                    </div><p class="text-center mx-3 mb-0 text-muted">Shared with</p>

                                    <div class="divider d-flex align-items-center my-4">

                                    </div><ul class="list-group rounded-0 list-group-horizontal justify-content-center pb-2">
                                        <li class="list-group-item border-0 d-flex align-items-center p-0">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center p-0">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center p-0">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                        </li>
                                        <li class="list-group-item border-0 d-flex align-items-center p-0">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar" class="rounded-circle me-n2" width="45">
                                        </li>
                                    </ul>

                                    <div class="divider d-flex align-items-center my-4">

                                    </div><div class="col">
                                        <div class="submit-section justify-content-center">
                                            <button class="btn btn-primary submit-btn">Save</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- View Card end Modal -->



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
<script src="./libs/simplebar/simplebar.min.js"></script>

<!-- APP JS -->
<script src="./js/main.js"></script>
<script src="./js/shortcode.js"></script>
<script src="./js/script.js"></script>


<?php include 'database.php';
// Fetch usernames
$sql23 = "SELECT task_name FROM tasks";
$result23 = $conn->query($sql23);
$task_name = array();
if ($result23->num_rows > 0) {
    while ($row = $result23->fetch_assoc()) {
        $task_name[] = $row['task_name'];
    }
}

// Close the database connection after fetching data

?>



<!-- Bootstrap Typeahead JS -->
<script src="js/typeahead.js"></script>
<script>
    $(document).ready(function(){
        var taskname = <?php echo json_encode($task_name); ?>;
        $('.typeahead[name="taskname"]').typeahead({
            source: taskname
        });
    });
</script>


</body>
</html>