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
    /*  PHP for Employee ID*/

    $employeeName = $loguser;
    $sql23 = "SELECT id FROM employees where username = '$employeeName'";
    $result23 = $conn->query($sql23);

    // Check if a row is found
    if ($result23->num_rows > 0) {
        // Fetch the first row and get the 'id' value
        $row = $result23->fetch_assoc();
        $employee_id = $row['id'];
        $employee_id_json = json_encode($employee_id);
    } else {
        // Handle the case where no employee is found
        $error = "Employee not found";
        include 'alert.php';
    }

?>
<!-- MAIN CONTENT -->
<div class="main">


    <div class="main-content board">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Kanban Board</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="kanban-board card mb-0 pd-0">
                    <div class="box-body pd-0">
                        <div class="kanban-cont">

                            <!--To-Do List-->
                            <div class="kanban-list kanban-list-to-do">
                                <div class="kanban-header">
                                    <h6 class="card-title">To-Do List</h6>

                                </div>
                                <?php
                                    // Fetch data from the "cards" table

                                    $sql = "SELECT * FROM cards where status = 'todo'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo '<div class="kanban-wrap ui-sortable">';
                                        while ($row = $result->fetch_assoc()) {
                                            $cardid = $row['id'];

                                            // Fetch tasks for the current card
                                            $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid";
                                            $tasksResult = $conn->query($tasksSql);

                                            ?>
                                            <div class="panel">
                                                <div class="kanban-box item-box ui-sortable-handle"
                                                     data-card-id="<?= $cardid ?>" data-card-status="To-Do">


                                                    <div class="content-box">
                                                        <h6 class="title fs-16"><?= $row['title'] ?></h6>
                                                        <p class="description"><?= $row['description'] ?></p>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <p class="mb-2">
                                                            <i class="bx bx-calendar align-middle pr-4"></i>
                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                        </p>

                                                        <div class="divider d-flex align-items-center my-3"></div>


                                                        <?php

                                                            // SQL query for incomplete tasks count
                                                            $sqlIncomplete = "SELECT COUNT(*) AS incomplete_task_count 
                                                                                      FROM tasks 
                                                                                      WHERE status != 'complete'";

                                                            $resultIncomplete = $conn->query($sqlIncomplete);

                                                            // Check if the query was successful
                                                            if ($resultIncomplete) {
                                                                // Fetch the result as an associative array
                                                                $rowIncomplete = $resultIncomplete->fetch_assoc();

                                                                // Total count query
                                                                $sqlTotal = "SELECT COUNT(*) AS total_task_count FROM tasks where card_id = $cardid";
                                                                $resultTotal = $conn->query($sqlTotal);

                                                                // Check if the query was successful
                                                                if ($resultTotal) {
                                                                    // Fetch the total count
                                                                    $rowTotal = $resultTotal->fetch_assoc();
                                                                    ?>
                                                                    <p class="mb-2">
                                                                        <i class="bx bx-list-check align-middle"
                                                                           style=" font-size: 30px;"></i>
                                                                        <span> <?php echo $rowIncomplete["incomplete_task_count"]; ?>/<?php echo $rowTotal["total_task_count"]; ?></span>
                                                                    </p>
                                                                    <?php

                                                                } else {
                                                                    // Output an error message if the total count query fails
                                                                    echo "Error: " . $conn->error;
                                                                }
                                                            } else {
                                                                // Output an error message if the incomplete count query fails
                                                                echo "Error: " . $conn->error;
                                                            }

                                                            // Close the connection


                                                        ?>

                                                        <div class="progress skill-progress mt-5 mb-15"
                                                             style="height:7px;">
                                                            <div class="progress-bar progress-animated"
                                                                 style="width: 78%; height:7px;" role="progressbar">
                                                                <span class="sr-only">78% Complete</span>
                                                            </div>
                                                        </div>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <div class="d-flex justify-content-between">
                                                            <button
                                                                    class="btn btn-success" data-toggle="modal"
                                                                    data-target="#view_card_modal<?= $cardid ?>"
                                                                    style="">
                                                                View
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Assign Task Modal -->
                                            <div id="add_task_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="cardassign.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Card ID</label>
                                                                            <select name="cardid"
                                                                                    class="select form-control">
                                                                                <option><?= $cardid ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group"><label
                                                                                    class="form-label">Task
                                                                                Name</label>
                                                                            <input placeholder="Type to search"
                                                                                   type="text"
                                                                                   class="form-control typeahead"
                                                                                   id="taskname" name="taskname"
                                                                                   autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="submit-section">
                                                                    <button class="btn btn-primary submit-btn">Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                            <!-- View Card Modal -->
                                            <div id="view_card_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <span class="h2 me-2"><?= $row['title'] ?></span>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="box rounded-3">
                                                                    <div class="card-body p-4">

                                                                        <!-- Description Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-notepad align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Description</p>
                                                                        <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Priority Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-list-ol align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Priority
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <?php
                                                                                $badge = ""; // Initialize $badge variable
                                                                                if ($row["priority"] == "High") {
                                                                                    $badge = "badge-danger-light";
                                                                                } elseif ($row["priority"] == "Medium") {
                                                                                    $badge = "badge-warning-light";
                                                                                } else {
                                                                                    $badge = "badge-success-light";
                                                                                }
                                                                            ?>
                                                                            <span class="ml-4 badge <?= $badge ?>"><?= $row['priority'] ?></span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Timeline Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-calendar align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Timeline
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Tasks Section -->
                                                                        <?php

                                                                            // Fetch data from the "cards" table
                                                                            $tasksSql2 = "SELECT task_id FROM assignment WHERE employee_id = $employee_id";
                                                                            $tasksResult2 = $conn->query($tasksSql2);
                                                                            while ($task2 = $tasksResult2->fetch_assoc()) :
                                                                                // Fetch tasks for the current card
                                                                                $task3 = $task2['task_id'];
                                                                                $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid and id = $task3 ";
                                                                                $tasksResult = $conn->query($tasksSql);

                                                                                while ($task = $tasksResult->fetch_assoc()) : ?>
                                                                                    <input type="checkbox"
                                                                                           id="task_<?= $task['id'] ?>"
                                                                                           class="task-checkbox"
                                                                                           data-card-id="<?= $row['id'] ?>"
                                                                                           name="tasks[]"
                                                                                           value="<?= $task['id'] ?>">
                                                                                    <a
                                                                                       for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a>

                                                                                    <?php
                                                                                    $badge2 = ""; // Initialize $badge2 variable
                                                                                    if ($task['priority'] == "High") {
                                                                                        $badge2 = "badge-danger-light";
                                                                                    } elseif ($task["priority"] == "Medium") {
                                                                                        $badge2 = "badge-warning-light";
                                                                                    } else {
                                                                                        $badge2 = "badge-success-light";
                                                                                    }
                                                                                    ?>


                                                                                    <span class="ml-4 badge <?= $badge2 ?>"><?= $task['priority'] ?></span><a style="margin-left: 10px;" href="project-detailstask.php?data=<?= $task['project_name'] ?>"
                                                                                                                                                              class="pl-15 pr-15 btn btn-primary btn-tableview"><span class="pr-4 bx bxs-cloud-upload"></span>Upload Files</a>
                                                                                    <br>

                                                                                <?php endwhile;
                                                                            endwhile; ?>


                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Save Button Section -->

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- View Card end Modal -->

                                            <?php
                                        }
                                        echo ' </div> ';

                                    } else {
                                        echo "0 results";
                                    }
                                    // Close the MySQL connection
                                ?>
                                <!-- JavaScript for Task Completion -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Attach a change event listener to all task checkboxes
                                        var checkboxes = document.querySelectorAll('.task-checkbox');
                                        checkboxes.forEach(function (checkbox) {
                                            checkbox.addEventListener('change', function () {
                                                if (this.checked) {
                                                    // If checkbox is checked, send an AJAX request
                                                    var taskId = this.value;
                                                    var cardId = this.getAttribute('data-card-id');
                                                    var userId = <?php echo $employee_id_json; ?>;

                                                    // AJAX request to handle task completion
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', 'handle_task_completion.php', true);
                                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                    xhr.onreadystatechange = function () {
                                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                                            var successMessage = xhr.responseText;
                                                            showBootstrapWarning(successMessage);
                                                            console.log(xhr.responseText);
                                                        }
                                                    };
                                                    xhr.send('user_id=' + userId + '&card_id=' + cardId + '&task_id=' + taskId);
                                                }
                                            });
                                        });

                                        function showBootstrapWarning(successMessage) {
                                            // Create a new div element for the Bootstrap warning
                                            var alertContainer = document.createElement('div');
                                            alertContainer.className = 'alert alert-warning alert-dismissible fade show';
                                            alertContainer.setAttribute('role', 'alert');

                                            // Add close button
                                            alertContainer.innerHTML = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

                                            // Add success message
                                            alertContainer.innerHTML += successMessage;

                                            // Append the alert to the document body
                                            document.body.appendChild(alertContainer);

                                            // Optional: Remove the alert after a delay
                                            setTimeout(function () {
                                                document.body.removeChild(alertContainer);
                                            }, 5000); // Adjust the delay (in milliseconds) as needed
                                        }
                                    });
                                </script>

                            </div>
                            <!--To-Do List End-->
                            <!--Progress-->
                            <div class="kanban-list kanban-list-to-do">
                                <div class="kanban-header">
                                    <h6 class="card-title">Progress</h6>

                                </div>
                                <?php
                                    // Fetch data from the "cards" table

                                    $sql = "SELECT * FROM cards where status = 'progress'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo '<div class="kanban-wrap ui-sortable">';
                                        while ($row = $result->fetch_assoc()) {
                                            $cardid = $row['id'];

                                            // Fetch tasks for the current card
                                            $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid";
                                            $tasksResult = $conn->query($tasksSql);

                                            ?>
                                            <div class="panel">
                                                <div class="kanban-box item-box ui-sortable-handle"
                                                     data-card-id="<?= $cardid ?>" data-card-status="To-Do">


                                                    <div class="content-box">
                                                        <h6 class="title fs-16"><?= $row['title'] ?></h6>
                                                        <p class="description"><?= $row['description'] ?></p>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <p class="mb-2">
                                                            <i class="bx bx-calendar align-middle pr-4"></i>
                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                        </p>

                                                        <div class="divider d-flex align-items-center my-3"></div>


                                                        <?php

                                                            // SQL query for incomplete tasks count
                                                            $sqlIncomplete = "SELECT COUNT(*) AS incomplete_task_count 
                                                                                      FROM tasks 
                                                                                      WHERE status != 'complete'";

                                                            $resultIncomplete = $conn->query($sqlIncomplete);

                                                            // Check if the query was successful
                                                            if ($resultIncomplete) {
                                                                // Fetch the result as an associative array
                                                                $rowIncomplete = $resultIncomplete->fetch_assoc();

                                                                // Total count query
                                                                $sqlTotal = "SELECT COUNT(*) AS total_task_count FROM tasks where card_id = $cardid";
                                                                $resultTotal = $conn->query($sqlTotal);

                                                                // Check if the query was successful
                                                                if ($resultTotal) {
                                                                    // Fetch the total count
                                                                    $rowTotal = $resultTotal->fetch_assoc();
                                                                    ?>
                                                                    <p class="mb-2">
                                                                        <i class="bx bx-list-check align-middle"
                                                                           style=" font-size: 30px;"></i>
                                                                        <span> <?php echo $rowIncomplete["incomplete_task_count"]; ?>/<?php echo $rowTotal["total_task_count"]; ?></span>
                                                                    </p>
                                                                    <?php

                                                                } else {
                                                                    // Output an error message if the total count query fails
                                                                    echo "Error: " . $conn->error;
                                                                }
                                                            } else {
                                                                // Output an error message if the incomplete count query fails
                                                                echo "Error: " . $conn->error;
                                                            }

                                                            // Close the connection


                                                        ?>

                                                        <div class="progress skill-progress mt-5 mb-15"
                                                             style="height:7px;">
                                                            <div class="progress-bar progress-animated"
                                                                 style="width: 78%; height:7px;" role="progressbar">
                                                                <span class="sr-only">78% Complete</span>
                                                            </div>
                                                        </div>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <div class="d-flex justify-content-between">
                                                            <button
                                                                    class="btn btn-success" data-toggle="modal"
                                                                    data-target="#view_card_modal<?= $cardid ?>"
                                                                    style="">
                                                                View
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Assign Task Modal -->
                                            <div id="add_task_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="cardassign.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Card ID</label>
                                                                            <select name="cardid"
                                                                                    class="select form-control">
                                                                                <option><?= $cardid ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group"><label
                                                                                    class="form-label">Task
                                                                                Name</label>
                                                                            <input placeholder="Type to search"
                                                                                   type="text"
                                                                                   class="form-control typeahead"
                                                                                   id="taskname" name="taskname"
                                                                                   autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="submit-section">
                                                                    <button class="btn btn-primary submit-btn">Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                            <!-- View Card Modal -->
                                            <div id="view_card_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <span class="h2 me-2"><?= $row['title'] ?></span>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="box rounded-3">
                                                                    <div class="card-body p-4">

                                                                        <!-- Description Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-notepad align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Description</p>
                                                                        <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Priority Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-list-ol align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Priority
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <?php
                                                                                $badge = ""; // Initialize $badge variable
                                                                                if ($row["priority"] == "High") {
                                                                                    $badge = "badge-danger-light";
                                                                                } elseif ($row["priority"] == "Medium") {
                                                                                    $badge = "badge-warning-light";
                                                                                } else {
                                                                                    $badge = "badge-success-light";
                                                                                }
                                                                            ?>
                                                                            <span class="ml-4 badge <?= $badge ?>"><?= $row['priority'] ?></span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Timeline Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-calendar align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Timeline
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Tasks Section -->
                                                                        <?php

                                                                            // Fetch data from the "cards" table
                                                                            $tasksSql2 = "SELECT task_id FROM assignment WHERE employee_id = $employee_id";
                                                                            $tasksResult2 = $conn->query($tasksSql2);
                                                                            while ($task2 = $tasksResult2->fetch_assoc()) :
                                                                                // Fetch tasks for the current card
                                                                                $task3 = $task2['task_id'];
                                                                                $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid and id = $task3 ";
                                                                                $tasksResult = $conn->query($tasksSql);

                                                                                while ($task = $tasksResult->fetch_assoc()) : ?>
                                                                                    <input type="checkbox"
                                                                                           id="task_<?= $task['id'] ?>"
                                                                                           class="task-checkbox"
                                                                                           data-card-id="<?= $row['id'] ?>"
                                                                                           name="tasks[]"
                                                                                           value="<?= $task['id'] ?>">
                                                                                    <a
                                                                                       for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a>

                                                                                    <?php
                                                                                    $badge2 = ""; // Initialize $badge2 variable
                                                                                    if ($task['priority'] == "High") {
                                                                                        $badge2 = "badge-danger-light";
                                                                                    } elseif ($task["priority"] == "Medium") {
                                                                                        $badge2 = "badge-warning-light";
                                                                                    } else {
                                                                                        $badge2 = "badge-success-light";
                                                                                    }
                                                                                    ?>

                                                                                    <span class="ml-4 badge <?= $badge2 ?>"><?= $task['priority'] ?></span><a style="margin-left: 10px;" href="project-detailstask.php?data=<?= $task['project_name'] ?>"
                                                                                                                                                              class="pl-15 pr-15 btn btn-primary btn-tableview"><span class="pr-4 bx bxs-cloud-upload"></span>Upload Files</a>
                                                                                    <br>
                                                                                <?php endwhile;
                                                                            endwhile; ?>


                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Save Button Section -->

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- View Card end Modal -->

                                            <?php
                                        }
                                        echo ' </div> ';

                                    } else {
                                        echo "0 results";
                                    }
                                    // Close the MySQL connection
                                ?>
                                <!-- JavaScript for Task Completion -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Attach a change event listener to all task checkboxes
                                        var checkboxes = document.querySelectorAll('.task-checkbox');
                                        checkboxes.forEach(function (checkbox) {
                                            checkbox.addEventListener('change', function () {
                                                if (this.checked) {
                                                    // If checkbox is checked, send an AJAX request
                                                    var taskId = this.value;
                                                    var cardId = this.getAttribute('data-card-id');
                                                    var userId = <?php echo $employee_id_json; ?>;

                                                    // AJAX request to handle task completion
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', 'handle_task_completion.php', true);
                                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                    xhr.onreadystatechange = function () {
                                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                                            var successMessage = xhr.responseText;
                                                            showBootstrapWarning(successMessage);
                                                            console.log(xhr.responseText);
                                                        }
                                                    };
                                                    xhr.send('user_id=' + userId + '&card_id=' + cardId + '&task_id=' + taskId);
                                                }
                                            });
                                        });

                                        function showBootstrapWarning(successMessage) {
                                            // Create a new div element for the Bootstrap warning
                                            var alertContainer = document.createElement('div');
                                            alertContainer.className = 'alert alert-warning alert-dismissible fade show';
                                            alertContainer.setAttribute('role', 'alert');

                                            // Add close button
                                            alertContainer.innerHTML = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

                                            // Add success message
                                            alertContainer.innerHTML += successMessage;

                                            // Append the alert to the document body
                                            document.body.appendChild(alertContainer);

                                            // Optional: Remove the alert after a delay
                                            setTimeout(function () {
                                                document.body.removeChild(alertContainer);
                                            }, 5000); // Adjust the delay (in milliseconds) as needed
                                        }
                                    });
                                </script>

                            </div>
                            <!--Progress End-->
                            <!--Review-->
                            <div class="kanban-list kanban-list-to-do">
                                <div class="kanban-header">
                                    <h6 class="card-title">Review</h6>

                                </div>
                                <?php
                                    // Fetch data from the "cards" table

                                    $sql = "SELECT * FROM cards where status = 'review'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo '<div class="kanban-wrap ui-sortable">';
                                        while ($row = $result->fetch_assoc()) {
                                            $cardid = $row['id'];

                                            // Fetch tasks for the current card
                                            $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid";
                                            $tasksResult = $conn->query($tasksSql);

                                            ?>
                                            <div class="panel">
                                                <div class="kanban-box item-box ui-sortable-handle"
                                                     data-card-id="<?= $cardid ?>" data-card-status="To-Do">


                                                    <div class="content-box">
                                                        <h6 class="title fs-16"><?= $row['title'] ?></h6>
                                                        <p class="description"><?= $row['description'] ?></p>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <p class="mb-2">
                                                            <i class="bx bx-calendar align-middle pr-4"></i>
                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                        </p>

                                                        <div class="divider d-flex align-items-center my-3"></div>


                                                        <?php

                                                            // SQL query for incomplete tasks count
                                                            $sqlIncomplete = "SELECT COUNT(*) AS incomplete_task_count 
                                                                                      FROM tasks 
                                                                                      WHERE status != 'complete'";

                                                            $resultIncomplete = $conn->query($sqlIncomplete);

                                                            // Check if the query was successful
                                                            if ($resultIncomplete) {
                                                                // Fetch the result as an associative array
                                                                $rowIncomplete = $resultIncomplete->fetch_assoc();

                                                                // Total count query
                                                                $sqlTotal = "SELECT COUNT(*) AS total_task_count FROM tasks where card_id = $cardid";
                                                                $resultTotal = $conn->query($sqlTotal);

                                                                // Check if the query was successful
                                                                if ($resultTotal) {
                                                                    // Fetch the total count
                                                                    $rowTotal = $resultTotal->fetch_assoc();
                                                                    ?>
                                                                    <p class="mb-2">
                                                                        <i class="bx bx-list-check align-middle"
                                                                           style=" font-size: 30px;"></i>
                                                                        <span> <?php echo $rowIncomplete["incomplete_task_count"]; ?>/<?php echo $rowTotal["total_task_count"]; ?></span>
                                                                    </p>
                                                                    <?php

                                                                } else {
                                                                    // Output an error message if the total count query fails
                                                                    echo "Error: " . $conn->error;
                                                                }
                                                            } else {
                                                                // Output an error message if the incomplete count query fails
                                                                echo "Error: " . $conn->error;
                                                            }

                                                            // Close the connection


                                                        ?>

                                                        <div class="progress skill-progress mt-5 mb-15"
                                                             style="height:7px;">
                                                            <div class="progress-bar progress-animated"
                                                                 style="width: 78%; height:7px;" role="progressbar">
                                                                <span class="sr-only">78% Complete</span>
                                                            </div>
                                                        </div>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <div class="d-flex justify-content-between">
                                                            <button
                                                                    class="btn btn-success" data-toggle="modal"
                                                                    data-target="#view_card_modal<?= $cardid ?>"
                                                                    style="">
                                                                View
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Assign Task Modal -->
                                            <div id="add_task_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="cardassign.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Card ID</label>
                                                                            <select name="cardid"
                                                                                    class="select form-control">
                                                                                <option><?= $cardid ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group"><label
                                                                                    class="form-label">Task
                                                                                Name</label>
                                                                            <input placeholder="Type to search"
                                                                                   type="text"
                                                                                   class="form-control typeahead"
                                                                                   id="taskname" name="taskname"
                                                                                   autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="submit-section">
                                                                    <button class="btn btn-primary submit-btn">Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                            <!-- View Card Modal -->
                                            <div id="view_card_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <span class="h2 me-2"><?= $row['title'] ?></span>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="box rounded-3">
                                                                    <div class="card-body p-4">

                                                                        <!-- Description Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-notepad align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Description</p>
                                                                        <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Priority Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-list-ol align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Priority
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <?php
                                                                                $badge = ""; // Initialize $badge variable
                                                                                if ($row["priority"] == "High") {
                                                                                    $badge = "badge-danger-light";
                                                                                } elseif ($row["priority"] == "Medium") {
                                                                                    $badge = "badge-warning-light";
                                                                                } else {
                                                                                    $badge = "badge-success-light";
                                                                                }
                                                                            ?>
                                                                            <span class="ml-4 badge <?= $badge ?>"><?= $row['priority'] ?></span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Timeline Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-calendar align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Timeline
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Tasks Section -->
                                                                        <?php

                                                                            // Fetch data from the "cards" table
                                                                            $tasksSql2 = "SELECT task_id FROM assignment WHERE employee_id = $employee_id";
                                                                            $tasksResult2 = $conn->query($tasksSql2);
                                                                            while ($task2 = $tasksResult2->fetch_assoc()) :
                                                                                // Fetch tasks for the current card
                                                                                $task3 = $task2['task_id'];
                                                                                $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid and id = $task3 ";
                                                                                $tasksResult = $conn->query($tasksSql);

                                                                                while ($task = $tasksResult->fetch_assoc()) : ?>
                                                                                    <input type="checkbox"
                                                                                           id="task_<?= $task['id'] ?>"
                                                                                           class="task-checkbox"
                                                                                           data-card-id="<?= $row['id'] ?>"
                                                                                           name="tasks[]"
                                                                                           value="<?= $task['id'] ?>">
                                                                                    <a
                                                                                       for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a>

                                                                                    <?php
                                                                                    $badge2 = ""; // Initialize $badge2 variable
                                                                                    if ($task['priority'] == "High") {
                                                                                        $badge2 = "badge-danger-light";
                                                                                    } elseif ($task["priority"] == "Medium") {
                                                                                        $badge2 = "badge-warning-light";
                                                                                    } else {
                                                                                        $badge2 = "badge-success-light";
                                                                                    }
                                                                                    ?>

                                                                                    <span class="ml-4 badge <?= $badge2 ?>"><?= $task['priority'] ?></span><a style="margin-left: 10px;" href="project-detailstask.php?data=<?= $task['project_name'] ?>"
                                                                                                                                                              class="pl-15 pr-15 btn btn-primary btn-tableview"><span class="pr-4 bx bxs-cloud-upload"></span>Upload Files</a>
                                                                                    <br>
                                                                                <?php endwhile;
                                                                            endwhile; ?>


                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Save Button Section -->


                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- View Card end Modal -->

                                            <?php
                                        }
                                        echo ' </div> ';

                                    } else {
                                        echo "0 results";
                                    }
                                    // Close the MySQL connection
                                ?>
                                <!-- JavaScript for Task Completion -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Attach a change event listener to all task checkboxes
                                        var checkboxes = document.querySelectorAll('.task-checkbox');
                                        checkboxes.forEach(function (checkbox) {
                                            checkbox.addEventListener('change', function () {
                                                if (this.checked) {
                                                    // If checkbox is checked, send an AJAX request
                                                    var taskId = this.value;
                                                    var cardId = this.getAttribute('data-card-id');
                                                    var userId = <?php echo $employee_id_json; ?>;

                                                    // AJAX request to handle task completion
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', 'handle_task_completion.php', true);
                                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                    xhr.onreadystatechange = function () {
                                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                                            var successMessage = xhr.responseText;
                                                            showBootstrapWarning(successMessage);
                                                            console.log(xhr.responseText);
                                                        }
                                                    };
                                                    xhr.send('user_id=' + userId + '&card_id=' + cardId + '&task_id=' + taskId);
                                                }
                                            });
                                        });

                                        function showBootstrapWarning(successMessage) {
                                            // Create a new div element for the Bootstrap warning
                                            var alertContainer = document.createElement('div');
                                            alertContainer.className = 'alert alert-warning alert-dismissible fade show';
                                            alertContainer.setAttribute('role', 'alert');

                                            // Add close button
                                            alertContainer.innerHTML = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

                                            // Add success message
                                            alertContainer.innerHTML += successMessage;

                                            // Append the alert to the document body
                                            document.body.appendChild(alertContainer);

                                            // Optional: Remove the alert after a delay
                                            setTimeout(function () {
                                                document.body.removeChild(alertContainer);
                                            }, 5000); // Adjust the delay (in milliseconds) as needed
                                        }
                                    });
                                </script>

                            </div>
                            <!--Review End-->
                            <!--Approved-->
                            <div class="kanban-list kanban-list-to-do">
                                <div class="kanban-header">
                                    <h6 class="card-title">Approved</h6>

                                </div>
                                <?php
                                    // Fetch data from the "cards" table

                                    $sql = "SELECT * FROM cards where status = 'approved'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo '<div class="kanban-wrap ui-sortable">';
                                        while ($row = $result->fetch_assoc()) {
                                            $cardid = $row['id'];

                                            // Fetch tasks for the current card
                                            $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid";
                                            $tasksResult = $conn->query($tasksSql);

                                            ?>
                                            <div class="panel">
                                                <div class="kanban-box item-box ui-sortable-handle"
                                                     data-card-id="<?= $cardid ?>" data-card-status="To-Do">


                                                    <div class="content-box">
                                                        <h6 class="title fs-16"><?= $row['title'] ?></h6>
                                                        <p class="description"><?= $row['description'] ?></p>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <p class="mb-2">
                                                            <i class="bx bx-calendar align-middle pr-4"></i>
                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                        </p>

                                                        <div class="divider d-flex align-items-center my-3"></div>


                                                        <?php

                                                            // SQL query for incomplete tasks count
                                                            $sqlIncomplete = "SELECT COUNT(*) AS incomplete_task_count 
                                                                                      FROM tasks 
                                                                                      WHERE status != 'complete'";

                                                            $resultIncomplete = $conn->query($sqlIncomplete);

                                                            // Check if the query was successful
                                                            if ($resultIncomplete) {
                                                                // Fetch the result as an associative array
                                                                $rowIncomplete = $resultIncomplete->fetch_assoc();

                                                                // Total count query
                                                                $sqlTotal = "SELECT COUNT(*) AS total_task_count FROM tasks where card_id = $cardid";
                                                                $resultTotal = $conn->query($sqlTotal);

                                                                // Check if the query was successful
                                                                if ($resultTotal) {
                                                                    // Fetch the total count
                                                                    $rowTotal = $resultTotal->fetch_assoc();
                                                                    ?>
                                                                    <p class="mb-2">
                                                                        <i class="bx bx-list-check align-middle"
                                                                           style=" font-size: 30px;"></i>
                                                                        <span> <?php echo $rowIncomplete["incomplete_task_count"]; ?>/<?php echo $rowTotal["total_task_count"]; ?></span>
                                                                    </p>
                                                                    <?php

                                                                } else {
                                                                    // Output an error message if the total count query fails
                                                                    echo "Error: " . $conn->error;
                                                                }
                                                            } else {
                                                                // Output an error message if the incomplete count query fails
                                                                echo "Error: " . $conn->error;
                                                            }

                                                            // Close the connection


                                                        ?>

                                                        <div class="progress skill-progress mt-5 mb-15"
                                                             style="height:7px;">
                                                            <div class="progress-bar progress-animated"
                                                                 style="width: 78%; height:7px;" role="progressbar">
                                                                <span class="sr-only">78% Complete</span>
                                                            </div>
                                                        </div>

                                                        <div class="divider d-flex align-items-center my-3"></div>

                                                        <div class="d-flex justify-content-between">
                                                            <button
                                                                    class="btn btn-success" data-toggle="modal"
                                                                    data-target="#view_card_modal<?= $cardid ?>"
                                                                    style="">
                                                                View
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Assign Task Modal -->
                                            <div id="add_task_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Assign Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="cardassign.php" method="post">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Card ID</label>
                                                                            <select name="cardid"
                                                                                    class="select form-control">
                                                                                <option><?= $cardid ?></option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group"><label
                                                                                    class="form-label">Task
                                                                                Name</label>
                                                                            <input placeholder="Type to search"
                                                                                   type="text"
                                                                                   class="form-control typeahead"
                                                                                   id="taskname" name="taskname"
                                                                                   autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="submit-section">
                                                                    <button class="btn btn-primary submit-btn">Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            ?>
                                            <!-- View Card Modal -->
                                            <div id="view_card_modal<?= $cardid ?>" class="modal custom-modal fade"
                                                 style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                     role="document">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <span class="h2 me-2"><?= $row['title'] ?></span>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="box rounded-3">
                                                                    <div class="card-body p-4">

                                                                        <!-- Description Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-notepad align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Description</p>
                                                                        <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Priority Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-list-ol align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Priority
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <?php
                                                                                $badge = ""; // Initialize $badge variable
                                                                                if ($row["priority"] == "High") {
                                                                                    $badge = "badge-danger-light";
                                                                                } elseif ($row["priority"] == "Medium") {
                                                                                    $badge = "badge-warning-light";
                                                                                } else {
                                                                                    $badge = "badge-success-light";
                                                                                }
                                                                            ?>
                                                                            <span class="ml-4 badge <?= $badge ?>"><?= $row['priority'] ?></span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Timeline Section -->
                                                                        <p class="h5"><i
                                                                                    class="bx bx-calendar align-middle text-muted"
                                                                                    style="font-size: 130%;"></i>
                                                                            Timeline
                                                                        </p>
                                                                        <p class="px-3 mb-2">
                                                                            <span class="badge badge-warning-light"><?= $row['start'] ?></span>
                                                                            <i class="bx bx-move-horizontal align-middle"></i>
                                                                            <span class="badge badge-warning-light"><?= $row['due_date'] ?> </span>
                                                                        </p>

                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Tasks Section -->
                                                                        <?php

                                                                            // Fetch data from the "cards" table
                                                                            $tasksSql2 = "SELECT task_id FROM assignment WHERE employee_id = $employee_id";
                                                                            $tasksResult2 = $conn->query($tasksSql2);
                                                                            while ($task2 = $tasksResult2->fetch_assoc()) :
                                                                                // Fetch tasks for the current card
                                                                                $task3 = $task2['task_id'];
                                                                                $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid and id = $task3 ";
                                                                                $tasksResult = $conn->query($tasksSql);

                                                                                while ($task = $tasksResult->fetch_assoc()) : ?>
                                                                                    <input type="checkbox"
                                                                                           id="task_<?= $task['id'] ?>"
                                                                                           class="task-checkbox"
                                                                                           data-card-id="<?= $row['id'] ?>"
                                                                                           name="tasks[]"
                                                                                           value="<?= $task['id'] ?>">
                                                                                    <a
                                                                                       for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a>

                                                                                    <?php
                                                                                    $badge2 = ""; // Initialize $badge2 variable
                                                                                    if ($task['priority'] == "High") {
                                                                                        $badge2 = "badge-danger-light";
                                                                                    } elseif ($task["priority"] == "Medium") {
                                                                                        $badge2 = "badge-warning-light";
                                                                                    } else {
                                                                                        $badge2 = "badge-success-light";
                                                                                    }
                                                                                    ?>

                                                                                    <span class="ml-4 badge <?= $badge2 ?>"><?= $task['priority'] ?></span><a style="margin-left: 10px;" href="project-detailstask.php?data=<?= $task['project_name'] ?>"
                                                                                                                                                              class="pl-15 pr-15 btn btn-primary btn-tableview"><span class="pr-4 bx bxs-cloud-upload"></span>Upload Files</a>
                                                                                    <br>
                                                                                <?php endwhile;
                                                                            endwhile; ?>


                                                                        <div class="divider d-flex align-items-center my-4"></div>

                                                                        <!-- Save Button Section -->


                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- View Card end Modal -->

                                            <?php
                                        }
                                        echo ' </div> ';

                                    } else {
                                        echo "0 results";
                                    }
                                    // Close the MySQL connection
                                ?>
                                <!-- JavaScript for Task Completion -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        // Attach a change event listener to all task checkboxes
                                        var checkboxes = document.querySelectorAll('.task-checkbox');
                                        checkboxes.forEach(function (checkbox) {
                                            checkbox.addEventListener('change', function () {
                                                if (this.checked) {
                                                    // If checkbox is checked, send an AJAX request
                                                    var taskId = this.value;
                                                    var cardId = this.getAttribute('data-card-id');
                                                    var userId = <?php echo $employee_id_json; ?>;

                                                    // AJAX request to handle task completion
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open('POST', 'handle_task_completion.php', true);
                                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                                    xhr.onreadystatechange = function () {
                                                        if (xhr.readyState === 4 && xhr.status === 200) {
                                                            var successMessage = xhr.responseText;
                                                            showBootstrapWarning(successMessage);
                                                            console.log(xhr.responseText);
                                                        }
                                                    };
                                                    xhr.send('user_id=' + userId + '&card_id=' + cardId + '&task_id=' + taskId);
                                                }
                                            });
                                        });

                                        function showBootstrapWarning(successMessage) {
                                            // Create a new div element for the Bootstrap warning
                                            var alertContainer = document.createElement('div');
                                            alertContainer.className = 'alert alert-warning alert-dismissible fade show';
                                            alertContainer.setAttribute('role', 'alert');

                                            // Add close button
                                            alertContainer.innerHTML = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

                                            // Add success message
                                            alertContainer.innerHTML += successMessage;

                                            // Append the alert to the document body
                                            document.body.appendChild(alertContainer);

                                            // Optional: Remove the alert after a delay
                                            setTimeout(function () {
                                                document.body.removeChild(alertContainer);
                                            }, 5000); // Adjust the delay (in milliseconds) as needed
                                        }
                                    });
                                </script>

                            </div>
                            <!--To-Do List End-->

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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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


        <!-- Add Card Modal -->
        <div id="add_card_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Card</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="prboard.php">
                            <!-- Replace "your_php_script.php" with the actual filename of your PHP script -->

                            <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" class="form-control" name="cardTitle">
                            </div>
                            <div class="form-group">
                                <label>Due Date</label>
                                <div class="cal-icon">
                                    <input class="form-control" type="date" name="dueDate">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control" name="description"> </textarea>
                            </div>
                            <div class="submit-section text-center">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
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
    // Fetch task names for assignments
    $sqlAssignment = "SELECT a.id, a.task_id, t.task_name 
                  FROM assignment a 
                  JOIN tasks t ON a.task_id = t.id";
    $resultAssignment = $conn->query($sqlAssignment);
    $assignmentData = array();

    if ($resultAssignment->num_rows > 0) {
        while ($row = $resultAssignment->fetch_assoc()) {
            $assignmentData[] = array(
                'id' => $row['id'],
                'task_id' => $row['task_id'],
                'task_name' => $row['task_name']
            );
        }
    }


    // Close the database connection after fetching data

?>


<!-- Bootstrap Typeahead JS -->
<script src="js/typeahead.js"></script>
<script>
    $(document).ready(function () {
        <?php
        // Extract task names from $assignmentData
        $taskNames = array_column($assignmentData, 'task_name');
        ?>
        var taskname = <?php echo json_encode($taskNames); ?>;
        $('.typeahead[name="taskname"]').typeahead({
            source: taskname
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Attach a sortupdate event listener to the Kanban board
        $('.kanban-wrap').on('sortupdate', function (event, ui) {
            // Get the card ID and new status
            var cardId = ui.item.data('data-card-id');
            var newStatus = ui.item.parent().prev('.kanban-header').find('.card-title').text().trim();

            // AJAX request to update the card status in the database
            $.ajax({
                type: 'POST',
                url: 'update_card_status.php', // replace with your PHP script
                data: {cardId: cardId, newStatus: newStatus},
                success: function (response) {
                    console.log(response); // Log the response from the server
                }
            });
        });
    });
</script>


</body>
</html>