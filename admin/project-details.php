<?php
include 'auth.php';
include 'head.php';
include 'header.php';
include 'database.php';
$projectid = $_GET['data'];
// Replace with the desired project ID

// Query to fetch project details
$sql = "SELECT * FROM `projects`where id = '$projectid'";
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
                                <div class="icon-ratting">
                                    <i class='bx bxs-star'></i>
                                </div>
                                <div class="dropdown ml-14">
                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class='bx bx-dots-vertical-rounded fs-22'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                           data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
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
                                    <h5><?php echo $teamname; ?></h5>
                                </a>
                            </div>


                        </div>
                        <div class="divider"></div>
                        <div class="box-body content">
                            <h4 class="title">Project Description</h4>
                            <p class="fs-18 font-w400 font-main mt-27 mb-29"><?php echo $description; ?>.</p>
                            <ul class="list-img">
                                <li>
                                    <div class="img-dv"><img style=" width: 320px;" src="./images/product/project1.jpg" alt=""></div>

                                </li>
                                <li>
                                    <div class="img-dv"><img style=" width: 320px;" src="./images/product/project2.jpg" alt=""></div>

                                </li>
                                <li>
                                    <div class="img-dv"><img style=" width: 320px;" src="./images/product/project3.jpg" alt=""></div>

                                </li>
                                <li>
                                    <div class="img-dv">
                                        <img style=" width: 320px;"  src="./images/product/project4.jpg" alt="">

                                    </div>


                                </li>
                            </ul>
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
    <!-- END MAIN CONTENT -->

<?php include 'footer.php'; ?>