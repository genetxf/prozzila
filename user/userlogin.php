<?php include 'head.php';
?>
    <!-- MAIN CONTENT -->
    <div class="loginpd">

        <div class="main-content">
            <section class="login">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header d-flex justify-content-between">
                                <a href="../index.php">
                                    <img class="logosvg" src="./images/logo.svg" alt="">
                                </a>

                                <div class="action-reg">
                                    <h4 class="fs-30">Employee Login</h4>
                                    <p style="float: right">Sign in to your account</p>
                                </div>

                            </div>
                            <div class="line"></div>
                            <div class="box-body">
                                <div class="auth-content my-auto">

                                    <form class="mt-5 pt-2" action="signin.php" method="POST">
                                        <div class="mb-24">
                                            <label class="form-label mb-14">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                   placeholder="Type your username">
                                        </div>
                                        <div class="mb-16">
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

                                        <div class="mb-3">
                                            <button class="btn bg-primary color-white w-100 waves-effect waves-light fs-18 font-w500"
                                                    type="submit">Sign in
                                            </button>
                                        </div>
                                    </form>

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
                                                    <i class='bx bxs-envelope'></i>
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
<!-- SCRIPT -->
<!-- APEX CHART -->

<script src="./libs/jquery/jquery.min.js"></script>
<script src="./libs/jquery/jquery-ui.min.js"></script>
<script src="./libs/moment/min/moment.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./libs/peity/jquery.peity.min.js"></script>
<script src="./libs/chart.js/Chart.bundle.min.js"></script>
<script src="./libs/owl.carousel/owl.carousel.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
<script src="./js/countto.js"></script>
<script src="./libs/date-picker/datepicker.js"></script>
<script src="./libs/simplebar/simplebar.min.js"></script>


<!-- APP JS -->
<script src="./js/main.js"></script>
<script src="./js/shortcode.js"></script>
<script src="./js/pages/datepicker.js"></script>

<script>
</script>
</body>

</html>