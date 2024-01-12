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
    $teamname = $projectData["department"];
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

$conn->close(); // Close the database connection
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
                                <div class="icon-ratting">
                                    <i class='bx bxs-star'></i>
                                </div>
                                <div class="dropdown ml-14">
                                    <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bx bx-dots-vertical-rounded fs-22'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="bx bx-trash"></i> Delete</a>
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
                            <div class="action">
                                <a href="#" class="comment">32 Comments</a>
                                <a href="#" class="edit">Edit</a>
                                <a href="#" class="invite"><i class="fas fa-user-plus mr-5"></i>Invite People</a>
                            </div>
                            <ul class="user-list s2">
                                <li class="total"><span>+4</span></li>
                            </ul>
                        </div>
                        <div class="divider"></div>
                        <div class="box-body content">
                            <h4 class="title">Project Description</h4>
                            <p class="fs-18 font-w400 font-main mt-27 mb-29"><?php echo $description; ?>.</p>

                            <div class="form-chat">
                                <form action="#" method="get" accept-charset="utf-8">
                                    <div class="message-form-chat">
                                        <!-- /.pin -->
                                        <span class="message-text">
                                            <textarea name="message" placeholder="Type comment here" required="required"></textarea>
                                        </span>
                                        <!-- /.message-text -->
                                        <span class="camera">
                                            <a href="#" title="">
                                                <i class="fas fa-smile"></i>
                                            </a>
                                        </span>
                                        <!-- /.camera -->
                                        <span class="icon-message">
                                            <a href="#" title="">
                                                <i class="fas fa-paperclip"></i>
                                            </a>
                                        </span>
                                        <!-- /.icon-right -->
                                        <!-- <div class="icon-mobile">
                                            <ul>
                                                <li>
                                                    <a href="#" title=""><i class="fas fa-smile"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title=""><i class="fas fa-paperclip"></i></a>
                                                </li>
                                            </ul>
                                        </div> -->
                                        <!-- /.icon-right -->
                                        <span class="btn-send">
                                            <button class="waves-effect" type="submit">Send <i class="fas fa-paper-plane"></i></button>
                                        </span>
                                        <!-- /.btn-send -->

                                    </div>
                                    <!-- /.message-form-chat -->
                                    <div class="clearfix"></div>
                                </form>
                                <!-- /form -->
                            </div>

                            <div class="project-description mt-10">
                                <h4>Project Description</h4>
                                <div class="comment-box">
                                    <div class="comment d-flex">
                                        <div class="left d-flex">
                                            <div class="comment-pic">
                                                <img src="./images/avatar/cmt-01.png" alt="">
                                            </div>
                                            <div class="comment-body">
                                                <div class="name">
                                                    <h5 class="font-w600 fs-18">Elizabeth Holland</h5>
                                                    <p class="text mb-0 fs-18">Duis pretium gravida enim, vel maximus ligula fermentum a. Sed rhoncus eget ex id egestas. Nam nec nisl placerat, tempus erat a, condimentum metus.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group-action mt-10">
                                                <a href="#" class="like active"><i class="fas fa-thumbs-up"></i>34 Like</a>
                                                <a href="#" class="reply"><i class="fas fa-reply-all"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="comment d-flex">
                                        <div class="left d-flex">
                                            <div class="comment-pic">
                                                <img src="./images/avatar/cmt-02.png" alt="">
                                            </div>
                                            <div class="comment-body">
                                                <div class="name">
                                                    <h5 class="font-w600 fs-18">Mike Palmer</h5>
                                                    <p class="text mb-0 fs-18">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo, quis tempor ligula. Quisque quis pharetra felis. Ut quis consequat orci, at consequat felis. Suspendisse auctor laoreet placerat.
                                                        Nam et risus non lacus dignissim lacinia sit amet nec eros.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group-action mt-10">
                                                <a href="#" class="like"><i class="fas fa-thumbs-up"></i>34 Like</a>
                                                <a href="#" class="reply"><i class="fas fa-reply-all"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="comment rep d-flex">
                                        <div class="left d-flex">
                                            <div class="comment-pic">
                                                <img src="./images/avatar/cmt-03.png" alt="">
                                            </div>
                                            <div class="comment-body">
                                                <div class="name">
                                                    <h5 class="font-w600 fs-18">Beatrice Collins</h5>
                                                    <p class="text mb-0 fs-18">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo, quis tempor ligula. Quisque quis pharetra felis. Ut quis consequat orci.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group-action mt-10">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="comment rep d-flex">
                                        <div class="left d-flex">
                                            <div class="comment-pic">
                                                <img src="./images/avatar/cmt-04.png" alt="">
                                            </div>
                                            <div class="comment-body">
                                                <div class="name">
                                                    <h5 class="font-w600 fs-18">Roger Meyer</h5>
                                                    <p class="text mb-0 fs-18">Donec dapibus mauris id odio ornare tempus. Duis sit amet accumsan justo, quis tempor ligula. Quisque quis pharetra felis. Ut quis consequat orci.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <div class="group-action mt-10">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider mb-0"></div>
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
                                    <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
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