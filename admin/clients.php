<?php
include 'auth.php';
include 'database.php';
// Query to fetch project details
$sql = "SELECT * FROM `client`";
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<?php
$pagetitle = "Clients";
include 'header.php';

?>


    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-content client">

            <div class="row">
                <div class="col-12">
                    <div class="box project">
                        <div class="box-header">
                            <h4 class="box-title">Complete list:</h4>
                            <a class="btn btn-primary" href="new-client.php"><i class="fas fa-plus mr-5"></i>Add
                            </a>
                        </div>
                    </div>
                </div>

                <?php
                $sql2 = "SELECT * FROM `client` LIMIT 8";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {

                ?>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/1.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.php"><h5 class="mt-17"><?php echo $row2["name"]; ?></h5></a>
                            
                            <p class="fs-14 font-w400 font-main"><span class="text-clo-primary font-w500 pl-4"><?php echo $row2["status"]; ?></span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i><?php echo $row2["contact_no"]; ?></li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i><?php echo $row2["email_id"]; ?></li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="mailto:<?php echo $row2["email_id"]; ?>">Send Email</a>
                                <a class="bg-btn-sec color-main" href="client-details.php">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                    <?php
                }
                } else {
                    echo "No projects found";
                }

                $conn->close();
                ?>

            </div>
            <!-- List -->
            <div class="row">
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
                                                    <th class="border-bottom-0 text-center sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1" style="width: 26.6562px;">No</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Client ID</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Name</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Email</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Contact</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Country</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Status</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Address</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Website</th>
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
                                                            <td class="text-center"><?php echo $row["id"]; ?></td>
                                                            <td class="text-center"><?php echo $row["client_id"]; ?></td>
                                                            <td><?php echo $row["name"]; ?></td>
                                                            <td><?php echo $row["email_id"]; ?></td>
                                                            <td><?php echo $row["contact_no"]; ?></td>
                                                            <td><?php echo $row["country"]; ?></td>
                                                            <td><?php echo $row["address"]; ?></td>
                                                            <td><?php echo $row["status"]; ?></td>
                                                            <td><?php echo $row["website"]; ?></td>
                                                            <td><a href="deleteclient.php?data=<?php echo urlencode($row["id"]); ?>" class="btn btn-danger submit-btn">Delete</a></td>

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
            <div id="add_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Client</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Upload Avata</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Client Company</label>
                                    <select class="form-control select">
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client Phone</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Client Email</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="submit-section text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Client</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6 mb-0">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6 mb-0">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Client</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" value="Tom Schneider">
                                </div>
                                <div class="form-group">
                                    <label>Client Company</label>
                                    <select class="form-control select">
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client Phone</label>
                                    <input type="text" class="form-control" value="(589)505-4521">
                                </div>
                                <div class="form-group">
                                    <label>Client Email</label>
                                    <input type="text" class="form-control" value="tom.name@mail.com">
                                </div>
                                <div class="form-group">
                                    <label>Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="submit-section text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
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
<?php
include 'copyright.php';
?>
    <!-- SCRIPT -->

    <!-- Plugin -->

    <script src="./libs/jquery/jquery.min.js"></script>
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
    <script src="./js/pages/clients.js"></script>
</body>

</html>