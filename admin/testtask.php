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
    <link href='css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<?php
    $pagetitle = "Task";
    include 'header.php';

?>
<!-- MAIN CONTENT -->
<div class="main">


    <div class="main-content board">
        <div class="row">
            <div class="col-12">
                <div class="box card-box">
                    <!--Assign Task-->
                    <div class="icon-box bg-color-4">
                        <a class="create d-flex" href="#" data-toggle="modal" data-target="#assign">
                            <div class="icon bg-white">
                                <i class="bx bx-plus"></i>
                            </div>
                            <div class="content d-flex align-items-center">
                                <h5 class="color-white">Assign New Task</h5>
                            </div>
                        </a>
                    </div>
                    <!--Add New Task-->
                    <?php
                        // Include your database connection file

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Process form data
                            $task_name = $_POST['task_name'];
                            $project_name = $_POST['project_name'];
                            $description = $_POST['description'];
                            $priority = $_POST['priority'];
                            $start_date = $_POST['start_date'];
                            $due_date = $_POST['due_date'];

                            // Insert data into the 'tasks' table
                            if (empty($task_name) || empty($project_name)) {
                                $error = "Error: Task and attachment cannot be empty.";
                                include 'alert.php';
                            } else {
                                $sql = "INSERT INTO tasks (task_name, project_name, description, priority, start_date, due_date) 
                                            VALUES ('$task_name', '$project_name', '$description', '$priority', '$start_date', '$due_date')";


                                if ($conn->query($sql) === TRUE) {
                                    // Now update the work_status in the projects table
                                    $updateSql = "UPDATE projects SET work_status = 'Pending' WHERE project_name = '$project_name'";

                                    if ($conn->query($updateSql) === TRUE) {
                                        // Work_status updated successfully
                                        $success1 = " Project Status Update Successfully!";
                                    } else {
                                        // Error updating work_status
                                        $success1 = " Project Status Cant Updated!!!";
                                    }
                                    $success = " '$success1' and '$task_name' Added Successfully!";
                                    include 'success.php';
                                } else {
                                    $error = " '$error1' and '$task_name' Can't Added!";
                                    include 'alert.php';
                                }
                            }
                        }

                        // Close the database connection

                    ?>
                    <div class="icon-box bg-color-4">
                        <a class="create d-flex" href="#" data-toggle="modal" data-target="#add_project">
                            <div class="icon bg-white">
                                <i class="bx bx-plus"></i>
                            </div>
                            <div class="content d-flex align-items-center">
                                <h5 class="color-white">Create New Task</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--Add New Task Modal-->
        <div id="add_project" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Task Name</label>
                                        <input class="form-control" name="task_name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Project Name</label>
                                        <input placeholder="Type to search for project" type="text"
                                               class="form-control typeahead" id="project_name" name="project_name"
                                               autocomplete="off">

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Priority</label>
                                        <select class="form-control form-select" name="priority" required>
                                            <option selected="selected">High</option>
                                            <option>Medium</option>
                                            <option>Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control" name="start_date" type="date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Due Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control" name="due_date" type="date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea rows="4" class="form-control" name="description"
                                          placeholder="Enter your message here" required></textarea>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Assign Task Modal-->
        <div id="assign" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="taskassign.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label class="form-label">Employee Name</label>
                                        <input placeholder="Type to search" type="text" class="form-control typeahead"
                                               id="username" name="username" autocomplete="off">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label class="form-label">Task Name</label>
                                        <input placeholder="Type to search" type="text" class="form-control typeahead"
                                               id="taskname" name="taskname" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function addTask() {
                var tasksContainer = document.getElementById('tasksContainer');
                var taskInput = document.createElement('input');
                taskInput.type = 'text';
                taskInput.name = 'tasks[]';
                taskInput.placeholder = 'Task';
                taskInput.className = 'form-control mb-2';
                tasksContainer.appendChild(taskInput);
            }
        </script>

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
</body>

</html>

<!-- END MAIN CONTENT -->
<<!-- END MAIN CONTENT -->
<?php include 'footer.php';
    include 'database.php';

    // Fetch usernames
    $sql22 = "SELECT username FROM employees";
    $result22 = $conn->query($sql22);
    $usernames = array();
    if ($result22->num_rows > 0) {
        while ($row = $result22->fetch_assoc()) {
            $usernames[] = $row['username'];
        }
    }

    // Fetch Task
    $sql23 = "SELECT task_name FROM tasks";
    $result23 = $conn->query($sql23);
    $task_name = array();
    if ($result23->num_rows > 0) {
        while ($row = $result23->fetch_assoc()) {
            $task_name[] = $row['task_name'];
        }
    }

    // Fetch Project
    $sql27 = "SELECT project_title FROM projects";
    $result27 = $conn->query($sql27);
    $project_name = array();
    if ($result27->num_rows > 0) {
        while ($row = $result27->fetch_assoc()) {
            $project_name[] = $row['project_title'];
        }
    }


?>


<!-- Bootstrap Typeahead JS -->
<script src="js/typeahead.js"></script>
<script>
    $(document).ready(function () {
        var usernames = <?php echo json_encode($usernames); ?>;
        $('.typeahead[name="username"]').typeahead({
            source: usernames
        });
        var taskname = <?php echo json_encode($task_name); ?>;
        $('.typeahead[name="taskname"]').typeahead({
            source: taskname
        });
        var project_name = <?php echo json_encode($project_name); ?>;
        $('.typeahead[name="project_name"]').typeahead({
            source: project_name
        });
    });
</script>
