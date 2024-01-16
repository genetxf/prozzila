<?php include 'head.php'; ?>
    <!-- MAIN CONTENT -->
    <div class="loginpd">

        <div class="main-content">
            <section class="login">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header d-flex justify-content-between">
                                <a href="../index.php">
                                    <img src="./images/logo.svg" alt="">
                                </a>
                                
                                <div class="action-reg">
                                    <h4 class="fs-30">Login</h4>
                                    <a href="userlogin.php">Sign in to your account</a>
                                </div>
    
                            </div>
                            <div class="line"></div>
                            <div class="box-body">
                                <div class="auth-content my-auto">
    
                                    <form class="mt-5 pt-2" action="index.php">
                                        <div class="mb-24">
                                            <label class="form-label mb-14">Mail or User Name</label>
                                            <input type="text" class="form-control" id="username" placeholder="Your text">
                                        </div>
                                        <div class="mb-16">
                                            <div class="d-flex align-items-start">
                                                <div class="flex-grow-1">
                                                    <label class="form-label mb-14">Password</label>
                                                </div>
                                            </div>
    
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn shadow-none ms-0" type="button" id="password-addon"><i class="far fa-eye-slash"></i></button>
                                            </div>
                                        </div>
                                        <div class="row mb-29">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label fs-14" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
    
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn bg-primary color-white w-100 waves-effect waves-light fs-18 font-w500" type="submit">Sign in</button>
                                        </div>
                                    </form>

    
                                    <div class="mt-37 text-center">
                                        <p class="text-muted mb-0 fs-14">Don't have an account ? <a href="registration.php" class="text-primary fw-semibold">  Create Account </a> </p>
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
    <!-- END MAIN CONTENT -->

<script src="./libs/password/pass-addon.init.js"></script>
<?php include 'footer.php'; ?>