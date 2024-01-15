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
                <div class="box card-box">
                    <div class="icon-box bg-color-1">
                        <div class="icon bg-icon-1">
                            <i class="bx bxs-bell bx-tada"></i>
                        </div>
                        <div class="content">
                            <h5 class="title-box">Notification</h5>
                            <p class="color-1 mb-0 pt-4">5 Unread notification</p>
                        </div>
                    </div>
                    <div class="icon-box bg-color-2">
                        <div class="icon bg-icon-2">
                            <i class='bx bxs-message-rounded'></i>
                        </div>
                        <div class="content click-c">
                            <h5 class="title-box">Message</h5>
                            <p class="color-2 mb-0 pt-4">5 Unread notification</p>
                        </div>
                        <div class="notification-list card">
                            <div class="top box-header">
                                <h5>Notification</h5>

                            </div>
                            <div class="pd-1r">
                                <div class="divider"></div>
                            </div>

                            <div class="box-body">
                                <ul class="list">
                                    <li class="d-flex no-seen">
                                        <div class="img-mess"><img class="mr-14" src="./images/avatar/avt-1.png"
                                                                   alt="avt"></div>
                                        <div class="info">
                                            <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>
                                            <p class="pb-0 mb-0 line-h14 mt-6">Proin ac quam et lectus vestibulum</p>
                                        </div>
                                    </li>

                                    <li class="d-flex">
                                        <div class="img-mess"><img class="mr-14" src="./images/avatar/avt-1.png"
                                                                   alt="avt"></div>
                                        <div class="info">
                                            <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>
                                            <p class="pb-0 mb-0 line-h14 mt-6">Proin ac quam et lectus vestibulum</p>
                                        </div>
                                    </li>

                                </ul>
                                <div class="btn-view">
                                    <a class="font-w600 h5" href="message.html">View All</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="icon-box bg-color-3">
                        <a class="create d-flex" href="calendar.html">
                            <div class="icon bg-icon-3">
                                <i class="bx bx-calendar"></i>
                            </div>
                            <div class="content">
                                <h5 class="title-box">Calendar</h5>
                                <p class="color-3 mb-0 pt-4">5 Unread notification</p>
                            </div>
                        </a>
                    </div>
                    <div class="icon-box bg-color-4">
                        <a class="create d-flex" href="#" data-toggle="modal" data-target="#add_project">
                            <div class="icon bg-white">
                                <i class="bx bx-plus"></i>
                            </div>
                            <div class="content d-flex align-items-center">
                                <h5 class="color-white">Create New Project</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title">Here will be full project name</h4>
                        <div class="box-right d-flex">
                            <a class="btn" href="project-details.html">Project Details</a>
                            <div class="icon-ratting">
                                <i class='bx bxs-star'></i>
                            </div>
                            <div class="dropdown ml-14">
                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class='bx bx-dots-vertical-rounded fs-22'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i
                                                class="bx bx-trash"></i> Delete</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-edit mr-5"></i>Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="box-body d-flex justify-content-between pb-0">
                        <div class="team-name">
                            <a href="#" class="team">
                                <div class="icon"><i class="fas fa-tags"></i></div>
                                <h5>Team Name</h5>
                            </a>
                        </div>
                        <div class="action">
                            <a href="#" class="comment">32 Comments</a>
                            <a href="#" class="edit">Edit</a>
                            <a href="#" class="invite"><i class="fas fa-user-plus mr-5"></i>Invite People</a>
                            <a href="#" class="add">New<i class="fas fa-caret-down pl-12"></i></a>
                        </div>
                        <ul class="user-list s2">
                            <li><img src="./images/avatar/team-1.png" alt="user"></li>
                            <li><img src="./images/avatar/team-2.png" alt="user"></li>
                            <li><img src="./images/avatar/team-3.png" alt="user"></li>
                            <li><img src="./images/avatar/team-4.png" alt="user"></li>
                            <li><img src="./images/avatar/team-5.png" alt="user"></li>
                            <li class="total"><span>+4</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="kanban-board card mb-0 pd-0">
                    <div class="box-body pd-0">
                        <div class="kanban-cont">
                            <div class="kanban-list kanban-list-to-do">
                                <div class="kanban-header">
                                    <h6 class="card-title">To-Do List</h6>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                               data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // Fetch data from the "cards" table
                                $sql = "SELECT * FROM cards";
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
                                    <div class="kanban-box item-box ui-sortable-handle">
                                        <!-- Existing code... -->
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

                                            <p class="mb-2">
                                                <i class="bx bx-list-check align-middle" style=" font-size: 30px;"></i>
                                                <span>1/4</span>
                                            </p>
                                            <div class="progress skill-progress mt-5 mb-15" style="height:7px;">
                                                <div class="progress-bar progress-animated"
                                                     style="width: 78%; height:7px;" role="progressbar">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>

                                            <div class="divider d-flex align-items-center my-3"></div>

                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex justify-content-between text-primary"
                                                     data-toggle="modal" data-target="#add_task_modal<?= $cardid ?>">
                                                    <i class="bx bxs-plus-circle" style="font-size: 40px;"></i>
                                                </div>
                                                <button
                                                   class="btn btn-success" data-toggle="modal"
                                                   data-target="#view_card_modal<?= $cardid ?>" style="">View</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- Assign Task Modal -->
                                    <div id="add_task_modal<?= $cardid ?>" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Assign Task</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="cardassign.php" method="post">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Card ID</label>
                                                                    <select name="cardid" class="select">
                                                                        <option><?= $cardid ?></option>
                                                                    </select>
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
                                <?php
                                ?>
                                    <!-- View Card Modal -->
                                    <div id="view_card_modal<?= $cardid ?>" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <?php
                                            // Fetch data from the "cards" table

                                            // Fetch tasks for the current card
                                            $tasksSql = "SELECT * FROM tasks WHERE card_id = $cardid";
                                            $tasksResult = $conn->query($tasksSql);
                                            ?>
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <span class="h2 me-2"><?= $row['title'] ?></span>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="box rounded-3">
                                                            <div class="card-body p-4">

                                                                <!-- Description Section -->
                                                                <p class="h5"><i class="bx bx-notepad align-middle text-muted" style="font-size: 130%;"></i> Description</p>
                                                                <p class="px-3 mb-2 text"><?= $row['description'] ?></p>
                                                                <div class="divider d-flex align-items-center my-4"></div>

                                                                <!-- Priority Section -->
                                                                <p class="h5"><i class="bx bx-list-ol align-middle text-muted" style="font-size: 130%;"></i> Priority</p>
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
                                                                <p class="h5"><i class="bx bx-calendar align-middle text-muted" style="font-size: 130%;"></i> Timeline</p>
                                                                <p class="px-3 mb-2">
                                                                    <span class="badge badge-warning-light">04/01/2020</span>
                                                                    <i class="bx bx-move-horizontal align-middle"></i>
                                                                    <span class="badge badge-warning-light">04/01/2020 </span>
                                                                </p>

                                                                <div class="divider d-flex align-items-center my-4"></div>

                                                                <!-- Tasks Section -->
                                                                <?php while ($task = $tasksResult->fetch_assoc()) : ?>
                                                                    <input type="checkbox" id="task_<?= $task['id'] ?>" class="task-checkbox" data-card-id="<?= $row['id'] ?>" name="tasks[]" value="<?= $task['id'] ?>">
                                                                    <a href="testtask.php?<?= $task['id'] ?>" for="task_<?= $task['id'] ?>"><?= $task['task_name'] ?></a>

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

                                                                    <span class="ml-4 badge <?= $badge2 ?>"><?= $task['priority'] ?></span>
                                                                    <br>
                                                                <?php endwhile; ?>

                                                                <!-- Shared With Section -->
                                                                <div class="divider d-flex align-items-center my-4"></div>
                                                                <p class="text-center mx-3 mb-0 text-muted">Shared with</p>
                                                                <div class="divider d-flex align-items-center my-4"></div>

                                                                <ul class="list-group rounded-0 list-group-horizontal justify-content-center pb-2">
                                                                <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp"
                                                                         alt="avatar" class="rounded-circle me-n2"
                                                                         width="45">
                                                                </li>
                                                                <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp"
                                                                         alt="avatar" class="rounded-circle me-n2"
                                                                         width="45">
                                                                </li>
                                                                <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp"
                                                                         alt="avatar" class="rounded-circle me-n2"
                                                                         width="45">
                                                                </li>
                                                                <li class="list-group-item border-0 d-flex align-items-center p-0">
                                                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                                         alt="avatar" class="rounded-circle me-n2"
                                                                         width="45">
                                                                </li>
                                                                </ul>

                                                                <div class="divider d-flex align-items-center my-4"></div>

                                                                <!-- Save Button Section -->
                                                                <div class="col">
                                                                    <div class="submit-section justify-content-center">
                                                                        <button class="btn btn-primary submit-btn">Save</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </form>

                                                    <!-- PHP for Employee ID -->
                                                    <?php
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


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- View Card end Modal -->

                                    <?php
                                }
                                echo '
                            </div>
                            ';

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
                                                            // Handle the response if needed
                                                            console.log(xhr.responseText);
                                                        }
                                                    };
                                                    xhr.send('user_id=' + userId + '&card_id=' + cardId + '&task_id=' + taskId);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            <div class="btn-add-card">
                                <a class="dropdown-item font-w500 fs-16" href="#" data-toggle="modal"
                                   data-target="#add_card_modal"><i class="fas fa-plus mr-14"></i>Add a card</a>
                            </div>
                        </div>
                        <div class="kanban-list kanban-progress">
                            <div class="kanban-header">
                                <h6 class="card-title">In Progress</h6>
                            </div>
                            <div class="kanban-wrap">
                                <div class="panel">
                                    <div class="kanban-box item-box">
                                        <div class="dropdown edit">
                                            <a href="#" class="btn-link" data-bs-toggle="dropdown"
                                               aria-expanded="false">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#edit_card_modal"><i
                                                            class="bx bx-edit mr-5"></i>Edit</a>
                                            </div>
                                        </div>
                                        <div class="img-box">
                                            <img src="./images/to-do-list/project-2.png" alt="">
                                        </div>
                                        <div class="content-box">
                                            <h6 class="title fs-16">Food Website hero area</h6>
                                            <div class="progress skill-progress mt-15 mb-15" style="height:7px;">
                                                <div class="progress-bar progress-animated"
                                                     style="width: 78%; height:7px;" role="progressbar">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="link"><a href="#"><i class="fas fa-paperclip"></i></a>
                                                </div>
                                                <div class="time">
                                                    <p class="font-main mb-0"><i class="far fa-clock"></i>Due in 5
                                                        days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="kanban-box item-box">
                                        <div class="dropdown edit">
                                            <a href="#" class="btn-link" data-bs-toggle="dropdown"
                                               aria-expanded="false">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#edit_card_modal"><i
                                                            class="bx bx-edit mr-5"></i>Edit</a>
                                            </div>
                                        </div>
                                        <div class="img-box">
                                            <img src="./images/to-do-list/project-3.png" alt="">
                                        </div>
                                        <div class="content-box">
                                            <h6 class="title fs-16">Food Website hero area</h6>
                                            <div class="progress skill-progress mt-15 mb-15" style="height:7px;">
                                                <div class="progress-bar progress-animated"
                                                     style="width: 78%; height:7px;" role="progressbar">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="link"><a href="#"><i class="fas fa-paperclip"></i></a>
                                                </div>
                                                <div class="time">
                                                    <p class="font-main mb-0"><i class="far fa-clock"></i>Due in 5
                                                        days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-add-card">
                                <a class="dropdown-item font-w500 fs-16" href="#" data-toggle="modal"
                                   data-target="#add_card_modal"><i class="fas fa-plus mr-14"></i>Add a card</a>
                            </div>
                        </div>
                        <div class="kanban-list kanban-review">
                            <div class="kanban-header">
                                <h6 class="card-title">In Review</h6>
                            </div>
                            <div class="kanban-wrap">
                                <div class="panel">
                                    <div class="kanban-box item-box">
                                        <div class="dropdown edit">
                                            <a href="#" class="btn-link" data-bs-toggle="dropdown"
                                               aria-expanded="false">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#edit_card_modal"><i
                                                            class="bx bx-edit mr-5"></i>Edit</a>
                                            </div>
                                        </div>
                                        <div class="img-box">
                                            <img src="./images/to-do-list/project-4.png" alt="">
                                        </div>
                                        <div class="content-box">
                                            <h6 class="title fs-16">Food Website hero area</h6>
                                            <div class="progress skill-progress mt-15 mb-15" style="height:7px;">
                                                <div class="progress-bar progress-animated"
                                                     style="width: 78%; height:7px;" role="progressbar">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="link"><a href="#"><i class="fas fa-paperclip"></i></a>
                                                </div>
                                                <div class="time">
                                                    <p class="font-main mb-0"><i class="far fa-clock"></i>Due in 5
                                                        days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-add-card">
                                <a class="dropdown-item font-w500 fs-16" href="#" data-toggle="modal"
                                   data-target="#add_card_modal"><i class="fas fa-plus mr-14"></i>Add a card</a>
                            </div>
                        </div>
                        <div class="kanban-list kanban-approved">
                            <div class="kanban-header">
                                <h6 class="card-title">Approved</h6>
                            </div>
                            <div class="kanban-wrap">
                                <div class="panel">
                                    <div class="kanban-box item-box">
                                        <div class="dropdown edit">
                                            <a href="#" class="btn-link" data-bs-toggle="dropdown"
                                               aria-expanded="false">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#edit_card_modal"><i
                                                            class="bx bx-edit mr-5"></i>Edit</a>
                                            </div>
                                        </div>
                                        <div class="img-box">
                                            <img src="./images/to-do-list/project-4.png" alt="">
                                        </div>
                                        <div class="content-box">
                                            <h6 class="title fs-16">Food Website hero area</h6>
                                            <div class="progress skill-progress mt-15 mb-15" style="height:7px;">
                                                <div class="progress-bar progress-animated"
                                                     style="width: 78%; height:7px;" role="progressbar">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="link"><a href="#"><i class="fas fa-paperclip"></i></a>
                                                </div>
                                                <div class="time">
                                                    <p class="font-main mb-0"><i class="far fa-clock"></i>Due in 5
                                                        days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-add-card">
                                <a class="dropdown-item font-w500 fs-16" href="#" data-toggle="modal"
                                   data-target="#add_card_modal"><i class="fas fa-plus mr-14"></i>Add a card</a>
                            </div>
                        </div>

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





</body>
</html>