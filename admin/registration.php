<?php
include 'head.php';
include_once 'dbconnect.php';
include_once 'database.php';

if (isset($_POST['signup'])) {
    $uname = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = $_POST['password'];
    // Hash the password using SHA-256
    $upass = hash('sha256', $password);
    $checkUserQuery = "SELECT * FROM admins WHERE username = '$uname' OR email = '$email'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        // If the user exists
        $error="User exist!!! Try another name.";
        include 'alert.php';
    } else {
        // If the user doesn't exist, insert new
        $insertQuery = "INSERT INTO `admins` (`username`, `email`, `password`) VALUES('$uname','$email','$upass')";
        if (mysql_query("INSERT INTO `admins` (`username`, `email`, `password`) VALUES('$uname','$email','$upass')")) {
            $success ="Registration for Username '$uname' updated successfully!";
            include 'success.php';
        } else {
            include 'alert.php';
        }
        $insertQuery = "INSERT INTO `prozzila`.employees (`username`, `email`) VALUES('$uname','$email')";
        if (mysql_query("INSERT INTO `prozzila`.employees (`username`, `email`) VALUES('$uname','$email')")) {
            $success ="Registration for Username '$uname' updated successfully!";
            include 'success.php';
        } else {
            include 'alert.php';
        }
    }

}

?>
    <!-- MAIN CONTENT -->
    <div style="bottom: 75px">
        <div class="loginpd">

            <div class="main-content">
                <section class="login singup">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header d-flex justify-content-between">
                                    <a href="index.php">
                                        <img class="logosvg" src="./images/logo.svg" alt="">
                                    </a>

                                    <div class="action-reg">
                                        <h4 class="fs-30">Register</h4>
                                        <a>Create new account</a>
                                    </div>

                                </div>
                                <div class="line"></div>
                                <div class="box-body">
                                    <div class="auth-content my-auto">

                                        <form class="mt-6 pt-2" action="" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label mb-14">Username</label>
                                                <input required type="text" class="form-control" id="username"
                                                       name="username"
                                                       placeholder="Your Name">
                                            </div>
                                            <div class="mb-3 mt-24">
                                                <label for="useremail" class="form-label mb-14">E-Mail</label>
                                                <input required type="email" class="form-control" id="useremail"
                                                       name="email"
                                                       placeholder="Your Email" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                            </div>
                                            <div class="mb-3 mt-24">
                                                <div class="d-flex align-items-start">
                                                    <div class="flex-grow-1">
                                                        <label class="form-label mb-14">Password</label>
                                                    </div>
                                                </div>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input required="" type="password" class="form-control"
                                                           id="passwordInput" placeholder="Enter password"
                                                           aria-label="Password" name="password">
                                                    <button class="btn shadow-none ms-0" type="button"
                                                            id="togglePassword"><i class="far fa-eye-slash"></i>
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input required class="form-check-input" type="checkbox"
                                                               id="remember-check">
                                                        <label class="form-check-label" for="remember-check">
                                                            I agree to the <a href="#" class="text-primary"> Terms of
                                                                services</a> & <a href="#" class="text-primary"> Privacy
                                                                policy</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 mt-29">
                                                <button name="signup"
                                                        class="btn bg-primary color-white w-100 waves-effect waves-light fs-18 font-w500"
                                                        type="submit">Create Account
                                                </button>
                                            </div>
                                        </form>


                                        <div class="mt-59 text-center">
                                            <p class="text-muted mb-0 fs-14">Already have an account ? <a
                                                        href="userlogin.php" class="text-primary fw-semibold"> Sign
                                                    in </a></p>
                                        </div>

                                        <div class="mt-37 text-center">

                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item text-white">
                                                        <i class='bx bxl-facebook-square'></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item text-white">
                                                        <i class='bx bxl-twitter'></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item  text-white">
                                                        <i class='bx bxl-linkedin-square'></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void()" class="social-list-item  text-white">
                                                        <i class='bx bxl-google-plus'></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <script>document.getElementById("togglePassword").addEventListener("click", function () {
            var passwordInput = document.getElementById("passwordInput");
            var toggleBtnIcon = this.querySelector("i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleBtnIcon.classList.remove("fa-eye-slash");
                toggleBtnIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                toggleBtnIcon.classList.remove("fa-eye");
                toggleBtnIcon.classList.add("fa-eye-slash");
            }
        });
    </script>
<?php include 'footer.php'; ?>