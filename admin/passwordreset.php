<?php
    $pagetitle = "Reset User Password";
    include 'auth.php';
    include 'head.php';
    include 'header.php';

?>

<!-- MAIN CONTENT -->
<div class="main">

    <div class="main-content project">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <form method="post" action="resetpass.php" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-12 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Username</label> <input placeholder="Type to search" type="text" class="form-control typeahead"
                                        id="username" name="username" autocomplete="off">
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">

                                    <div class="form-group"><label class="form-label">Password</label> <input
                                                required="" type="password" name="password" class="form-control"
                                                placeholder="Enter Password">
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">

                                    <div class="form-group"><label class="form-label">Repeat Password</label> <input
                                                required="" type="password" name="password2" class="form-control"
                                                placeholder="Enter Password">
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Confirm Admin Password</label> <input required=""
                                                                                                             type="password"
                                                                                                             name="adpass"
                                                                                                             class="form-control"
                                                                                                             placeholder="Enter Admin Password">
                                    </div>

                                </div>


                            </div><!-- About -->
                            <div class="gr-btn mt-15">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg fs-16"
                                       onclick="not1()">

                            </div>

                        </form>
                    </div>

                </div>

            </div>


        </div>
    </div>
    <!-- END MAIN CONTENT -->
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

