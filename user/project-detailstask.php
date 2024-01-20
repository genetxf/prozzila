<?php
include 'auth.php';
include 'head.php';
include 'header.php';
include 'database.php';
$projectid = $_GET['data'];
// Replace with the desired project ID

// Query to fetch project details
$sql = "SELECT * FROM `projects`where project_title = '$projectid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $projectData = $result->fetch_assoc();
    $projectTitle = $projectData["project_title"];
    $department = $projectData["department"];
    $teamname = $projectData["assign_team"];
    $priority = $projectData["priority"];
    $client = $projectData["client"];
    $price = $projectData["price"];
    $startDate = $projectData["start_date"];
    $endDate = $projectData["end_date"];
    $description = $projectData["description"];
    $attachment = $projectData["attachment"];
    $workStatus = $projectData["work_status"];
    $createdAt = $projectData["created_at"];
}
// Close the database connection
?>

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="main-content">

            <div class="row">
                <div class="col-12">
                    <div class="box project">
                        <div class="box-header">
                            <h4 class="box-title"><?php echo $projectTitle; ?></h4>
                            <div class="box-right d-flex">
                                <button class="btn btn-primary"><?php echo $department; ?></button>

                            </div>
                        </div>

                        <div class="divider"></div>
                        <div class="box-body content">
                            <h4 class="title">Project Description</h4>
                            <p class="fs-18 font-w400 font-main mt-27 mb-29"><?php echo $description; ?>.</p>
                            <ul class="list-img">
                                <li>
                                    <div class="img-dv"><img style=" width: 320px;" src="./images/product/<?php echo $department; ?>1.jpg" alt=""></div>

                                </li>
                                <li>
                                    <div class="img-dv"><img style=" width: 320px;" src="./images/product/<?php echo $department; ?>2.jpg" alt=""></div>

                                </li>
                                <li>
                                    <div class="img-dv"><img style=" width: 320px;" src="./images/product/<?php echo $department; ?>3.jpg" alt=""></div>

                                </li>
                                <li>
                                    <div class="img-dv">
                                        <img style=" width: 320px;"  src="./images/product/<?php echo $department; ?>4.jpg" alt="">

                                    </div>


                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row  client project">
                <div class="col-8 col-xl-12">
                    <div class="box pd-0">
                        <div class="tab-menu-heading hremp-tabs p-0 ">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs w-100 d-flex">
                                    <li class=""><a href="#tab1" class="active" data-bs-toggle="tab">Task</a></li>
                                    <li><a href="#tab2" data-bs-toggle="tab">Files</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body tabs-menu-body hremp-tabs1 p-0">

                            <div class="tab-content">

                                <div class="tab-pane active" id="tab1">
                                    <div class="box-body pl-15 pr-15 pb-20 table-responsive activity mt-10">
                                        <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer"
                                               id="task-profile" role="grid">
                                            <thead>
                                            <tr class="top">
                                                <th class="border-bottom-0 text-center sorting fs-14 font-w500" tabindex="0"
                                                    aria-controls="task-profile" rowspan="1" colspan="1"
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
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $sql2 = "SELECT * FROM tasks where project_name = '$projectTitle' ";
                                                $result2 = $conn->query($sql2);
                                                $up = 0;
                                                if ($result2->num_rows > 0) {
                                                    while ($row = $result2->fetch_assoc()) {
                                                        $up = $up + 1;

                                                        ?>
                                                        <tr class="odd">
                                                            <td class="text-center"><?php echo $row["id"]; ?></td>
                                                            <td>
                                                                <a href="#" class="d-flex ">
                                                                    <span><?php echo $row["task_name"]; ?></span> </a>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-danger-light"><?php echo $row["priority"]; ?></span>
                                                            </td>
                                                            <td><?php echo $row["start_date"]; ?></td>
                                                            <td><?php echo $row["due_date"]; ?></td>

                                                            <td>
                                                                <span class="badge badge-warning"><?php echo $row["status"]; ?></span>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                    }
                                                } else {
                                                    echo "No Task found";
                                                }


                                            ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <div class="box-body pl-15 pr-15 pb-20 table-responsive activity mt-10">
                                        <div class="table-responsive">
                                            <?php
                                                if ($up != 0) {
                                                    ?>
                                                    <a href="#" data-toggle="modal" data-target="#assign"
                                                       class="pl-15 pr-15 btn btn-primary btn-tableview">Upload Files</a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo "Task not added yet!!!";
                                                }
                                            ?>


                                            <!--Upload Content Task-->
                                            <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer mw-100"
                                                   id="task-profile" role="grid">
                                                <thead>
                                                <tr class="top">
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                        style="width: 222.312px;">No
                                                    </th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                        style="width: 222.312px;">File Name
                                                    </th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                        style="width: 84.8281px;">Task Name
                                                    </th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                        aria-controls="task-profile" rowspan="1" colspan="1"
                                                        style="width: 87.9844px;">Upload Date
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sql2 = "SELECT * FROM tasks where project_name = '$projectTitle' ";
                                                    $result2 = $conn->query($sql2);
                                                    if ($result2->num_rows > 0) {
                                                        while ($row = $result2->fetch_assoc()) {
                                                            $taskconid = $row["task_name"];

                                                            $sqlcon = "SELECT * FROM content where task = '$taskconid'";
                                                            $resultcon = $conn->query($sqlcon);
                                                            $con_name = array();
                                                            if ($resultcon->num_rows > 0) {
                                                                while ($row = $resultcon->fetch_assoc()) {


                                                                    ?>
                                                                    <tr class="odd">
                                                                        <td>
                                                                            <a href="#" class="d-flex ">
                                                                                <span><?php echo $row["id"]; ?></span> </a>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $row["attachment"]; ?>
                                                                        </td>
                                                                        <td><?php echo $row["task"]; ?></td>
                                                                        <td><?php echo $row["date"]; ?></td>

                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                echo "No file found";
                                                            }
                                                        }
                                                    }


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
        </div>
    </div>

    <!--Upload file Task Modal-->
    <div id="assign" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Task Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="taskcontent.php?data=<?php echo urlencode($projectTitle); ?>" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-0">
                                <div class="form-group">
                                    <label class="form-label">Attachment:</label>
                                    <span>
                                                <input name="attachment_file" type="file" class="form-control">
                                            </span>
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
                            <button type="submit" class="btn btn-primary submit-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

<?php include 'footer.php'; ?>

<?php include 'footer.php';
    include 'database.php';


    // Fetch Task
    $sql23 = "SELECT task_name FROM tasks where project_name = '$projectTitle'";
    $result23 = $conn->query($sql23);
    $task_name = array();
    if ($result23->num_rows > 0) {
        while ($row = $result23->fetch_assoc()) {
            $task_name[] = $row['task_name'];
        }
    }


?>

<!-- Bootstrap Typeahead JS -->
<script src="js/typeahead.js"></script>
<script>
    $(document).ready(function () {

        var taskname = <?php echo json_encode($task_name); ?>;
        $('.typeahead[name="taskname"]').typeahead({
            source: taskname
        });

    });
</script>
