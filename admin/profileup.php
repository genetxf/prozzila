<?php
    $pagetitle = "Update Profile";
    include 'auth.php';
    include 'head.php';
    include 'header.php';
    include_once 'database.php';


?>


<!-- MAIN CONTENT -->
<div class="main">

    <div class="main-content project">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <?php

                            if (isset($_GET['user_id'])) {
                            $user_id = $_GET['user_id'];
                            $sql23 = "SELECT * FROM profiles where id = '$user_id'";
                            $result23 = $conn->query($sql23);

                            // Check if a row is found
                            if ($result23->num_rows > 0) {
                                // Fetch the first row and get the 'id' value
                                $row = $result23->fetch_assoc();

                                $email = $row['email'];
                                $first_name = $row['first_name'];
                                $last_name = $row['last_name'];
                                $contact_no = $row['phone_number'];
                                $address = $row['address'];
                                $about = $row['about'];

                                ?>
                        <form method="post" action="profileuppro.php" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">First Name</label> <input required=""
                                                                                                          type="text"
                                                                                                          name="name"
                                                                                                          class="form-control"
                                                                                                          placeholder="Enter First Name" value="<?php echo $first_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Last Name</label> <input required=""
                                                                                                               type="text"
                                                                                                               name="lname"
                                                                                                               class="form-control"
                                                                                                               placeholder="Enter Last Name" value="<?php echo $last_name; ?>">
                                    </div>
                                </div>




                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-24">

                                    <div class="form-group"><label class="form-label">Contact No</label> <input
                                                required="" type="text" name="contact_no" class="form-control"
                                                placeholder="Enter Contact No" value="<?php echo $contact_no; ?>">
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Address</label> <input required=""
                                                                                                             type="text"
                                                                                                             name="address"
                                                                                                             class="form-control"
                                                                                                             placeholder="Enter Address" value="<?php echo $address; ?>">
                                    </div>

                                </div>


                            </div><!-- About -->
                            <div class="form-group mb-24"><label class="form-label">About</label>
                                <textarea type="text" required="" name="about" class="form-control" cols="30"
                                          rows="10" data-value="value="<?php echo $first_name; ?>></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Profile Pic:</label>
                                <span>
                                                <input name="attachment_file" type="file" class="form-control">
                                            </span>
                            </div>
                            <div class="gr-btn mt-15">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg fs-16"
                                       onclick="not1()">

                            </div>
                        </form>
                        <?php

                            } else {
                            // Handle the case where no employee is found
                            $error = "Employee not found";
                            include 'alert.php';
                        }
                            }

                        ?>

                    </div>

                </div>

            </div>


        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <?php include 'footer.php'; ?>

