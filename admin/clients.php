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
                                <a class="bg-btn-pri color-white" href="message.php">Message</a>
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
                        <!-- Search -->
                        <div class="box-body pb-30">
                            <div class="row">
                                <div class="col-md-12 col-xl-10 mb-0">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-4 mb-0">
                                            <div class="form-group"><label class="form-label">From:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class='bx bx-calendar'></i></div>
                                                    </div>
                                                    <input class="form-control fc-datepicker" placeholder="DD-MM-YYYY"
                                                           type="text"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-4 mb-0">
                                            <div class="form-group"><label class="form-label">To:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class='bx bx-calendar'></i></div>
                                                    </div>
                                                    <input class="form-control fc-datepicker" placeholder="DD-MM-YYYY"
                                                           type="text"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-4 mb-0">
                                            <div class="form-group"><label class="form-label">Select Priority:</label>
                                                <select name="attendance"
                                                        class="form-control custom-select select2 select2-hidden-accessible"
                                                        data-placeholder="Select Priority" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="select2-data-16-akyu">
                                                    <option label="Select Priority"
                                                            data-select2-id="select2-data-18-ezae"></option>
                                                    <option value="1">High</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">Low</option>
                                                </select>
                                                <span class="select2 select2-container select2-container--default" dir="ltr"
                                                      data-select2-id="select2-data-17-6y8j" style="width: 100%;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true" aria-expanded="false"
                                                                tabindex="0" aria-disabled="false"
                                                                aria-labelledby="select2-attendance-ws-container"
                                                                aria-controls="select2-attendance-ws-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-attendance-ws-container" role="textbox"
                                                                    aria-readonly="true" title="Select Priority"></span>
                                                <span class="select2-selection__arrow" role="presentation"><b
                                                            role="presentation"></b></span>
                                                </span>
                                                </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-2 mb-0">
                                    <div class="form-group mt-32"><a href="#" class="btn bg-primary btn-block color-white">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <div id="task-profile_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <!-- Table Row Show
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="task-profile_length"><label>Show <select name="task-profile_length" aria-controls="task-profile" class="form-select form-select-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="task-profile_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="task-profile"></label></div>
                                        </div>
                                    </div>
                                    -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer"
                                                   id="task-profile" role="grid">
                                                <thead>
                                                <tr class="top">
                                                    <th class="border-bottom-0 text-center sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1" style="width: 26.6562px;">No</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Client ID</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Name</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Email ID</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Contact No</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Country</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Address</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Status</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Company Name</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Company Country</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Company Address</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Company Contact No</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Company Website</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">About</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="client-profile" rowspan="1" colspan="1">Image</th>
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
                                                            <td><?php echo $row["company_name"]; ?></td>
                                                            <td><?php echo $row["company_country"]; ?></td>
                                                            <td><?php echo $row["company_address"]; ?></td>
                                                            <td><?php echo $row["company_contact_no"]; ?></td>
                                                            <td><?php echo $row["company_website"]; ?></td>
                                                            <td><?php echo $row["about"]; ?></td>
                                                            <td><?php echo $row["image"]; ?></td>

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
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="task-profile_info" role="status"
                                                 aria-live="polite">Showing 1 to 8 of 8 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers"
                                                 id="task-profile_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="task-profile_previous"><a href="#" aria-controls="task-profile"
                                                                                      data-dt-idx="0" tabindex="0"
                                                                                      class="page-link">Previous</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="task-profile"
                                                                                              data-dt-idx="1" tabindex="0"
                                                                                              class="page-link">01</a></li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                                                                    aria-controls="task-profile"
                                                                                                    data-dt-idx="1"
                                                                                                    tabindex="0"
                                                                                                    class="page-link">02</a>
                                                    </li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                                                              aria-controls="task-profile"
                                                                                              data-dt-idx="1" tabindex="0"
                                                                                              class="page-link">03</a></li>
                                                    <li class="paginate_button page-item next disabled"
                                                        id="task-profile_next"><a href="#" aria-controls="task-profile"
                                                                                  data-dt-idx="2" tabindex="0"
                                                                                  class="page-link">Next</a></li>
                                                </ul>
                                            </div>
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