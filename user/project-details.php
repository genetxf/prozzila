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

        </div>
    </div>
    <!-- END MAIN CONTENT -->

<?php include 'footer.php'; ?>