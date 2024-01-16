<?php
include 'auth.php';
include 'database.php';
// Query to fetch project details
$sql = "SELECT * FROM `departments`";
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/icons.min.css">

    <!-- Plugin -->
    <link rel="stylesheet" href="./libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="./libs/date-picker/datepicker.css">
    <link rel="stylesheet" href="./libs/datatable/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="./libs/rating/css/rating-themes.css">
    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<?php
$pagetitle = "Departments";
include 'header.php';
?>

<!-- MAIN CONTENT -->
<div class="main">
    <div class="main-content user">
        <div class="row">
            <div class="col-12">
                <div class="box project">
                    <div class="box-header">
                        <h4 class="box-title">Complete list:</h4>
                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#add_card_modal"><i class="fas fa-plus mr-5"></i>Add
                        </a>
                    </div>
                </div>
            </div>
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
                                                <th class="border-bottom-0 text-center sorting fs-14 font-w500"
                                                    tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1"
                                                    style="width: 26.6562px;">No
                                                </th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                    aria-controls="task-profile" rowspan="1" colspan="1"
                                                    style="width: 222.312px;">Name
                                                </th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                    aria-controls="task-profile" rowspan="1" colspan="1"
                                                    style="width: 84.8281px;">Location
                                                </th>
                                                <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0"
                                                    aria-controls="task-profile" rowspan="1" colspan="1"
                                                    style="width: 84.8281px;">Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {



                                            ?>
                                            <tr class="odd">
                                                <td class="text-center"><?php echo $row["department_id"] ?></td>
                                                <td>
                                                    <a class="d-flex "> <span><?php echo $row["department_name"] ?></span> </a>
                                                </td>

                                                <td><?php echo $row["location"] ?></td>
                                                </td>
                                                <td><a href="deletedpt.php?data=<?php echo urlencode($row["department_id"]); ?>" class="btn btn-danger submit-btn">Delete</a></td>
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


    </div>
</div>
<!-- END MAIN CONTENT -->

<div class="overlay"></div>

<div id="add_card_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="adddpt.php" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Manager Name</label>
                                    <input placeholder="Type to search" type="text" class="form-control typeahead" id="username" name="username" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Dept. Code</label>
                                    <input class="form-control" name="deptCode" value="" type="text">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department Name</label>
                                <input class="form-control" name="deptName" value="" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Location</label>
                                <input class="form-control" name="location" value="" type="text">
                            </div>
                        </div></div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea rows="4" class="form-control" name="description" placeholder="Enter your message here"></textarea>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>



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

    // Close the database connection after fetching data

    ?>



        <!-- Bootstrap Typeahead JS -->
<script src="js/typeahead.js"></script>
<script>
    $(document).ready(function(){
        var usernames = <?php echo json_encode($usernames); ?>;
        $('.typeahead[name="username"]').typeahead({
            source: usernames
        });
    });
</script>

<!-- SCRIPT -->

