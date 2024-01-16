<?php include 'head.php';
?>
    <!-- MAIN CONTENT -->
    <div class="loginpd">

        <div class="main-content">
            <section class="login">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="col">
                                <div class="py-5 text-center">
                                    <img class="d-block mx-auto mb-4" src="images/logo.svg" alt="" width="100%" height="100%">
                                    <h2>Weelcome To Prozzila</h2><p style="
">
                                        <a href="user/" class="btn btn-secondary my-2">Employee</a>
                                        <a href="admin" class="btn btn-secondary my-2">Admin</a>
                                    </p>

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
<?php include 'footer.php'; ?>