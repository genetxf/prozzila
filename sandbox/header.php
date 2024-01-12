<?php
$loguser = $_SESSION['user'];
$logemail = $_SESSION['email'];
$logpicture  = $_SESSION['picture'];
?>
<body class="sidebar-expand light active">

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-logo">
        <a href="index.php">
            <img src="./images/logo.svg" alt="ProZZila logo">
        </a>
        <div class="sidebar-close" id="sidebar-close">
            <i class='bx bx-left-arrow-alt'></i>
        </div>
    </div>
    <!-- SIDEBAR MENU -->
    <div class="simlebar-sc" data-simplebar>
        <ul class="sidebar-menu tf">
            <li class="sidebar-submenu">
                <a href="index.php" class="sidebar-menu-dropdown">
                    <i class='bx bxs-home'></i>
                    <span>Dashboard</span>
                    <div class="dropdown-icon">
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="index.php">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="userprofile.php">
                            User Profile
                        </a>
                    </li>
                    <li>
                        <a href="userlogin.php">
                            User Login
                        </a>
                    </li>
                    <li>
                        <a href="registration.php">
                            New Account
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="project.php" class="sidebar-menu-dropdown">
                    <i class='bx bxs-bolt'></i>
                    <span>Project</span>
                    <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="project.php">
                            Overview
                        </a>
                    </li>
                    <li>
                        <a href="project_list.php">
                            Project List
                        </a>
                    </li>
                    <li>
                        <a href="new-project.php">
                            New Project
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-submenu">
                <a href="clients.php" class="sidebar-menu-dropdown">
                    <i class='bx bxs-user'></i>
                    <span>Client</span>
                    <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="clients.php">
                            Client List
                        </a>
                    </li>
                    <li>
                        <a href="client-details.php">
                            Client Details
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="board.php">
                    <i class='bx bxs-dashboard'></i>
                    <span>Board</span>
                </a>
            </li>
            <li>
                <a href="calendar.php">
                    <i class='bx bx-calendar'></i>
                    <span>Calendar</span>
                </a>
            </li>

            <li>
                <a href="message.php">
                    <i class='bx bxs-message-rounded-detail'></i>
                    <span>Message</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="chart-apex.php" class="sidebar-menu-dropdown">
                    <i class='bx bxs-component'></i>
                    <span>Components</span>
                    <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="chart-apex.php">
                            Apex Charts
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a class="darkmode-toggle" id="darkmode-toggle" onclick="switchTheme()">
                    <div>
                        <i class='bx bx-cog mr-10'></i>
                        <span>darkmode</span>
                    </div>

                    <span class="darkmode-switch"></span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
<!-- Main Header -->
<div class="main-header">
    <div class="d-flex">
        <div class="mobile-toggle" id="mobile-toggle">
            <i class='bx bx-menu'></i>
        </div>
        <div class="main-title">
            <?php
            echo $pagetitle;
            ?>
        </div>
    </div>

    <div class="d-flex align-items-center">

        <div class="dropdown d-inline-block mt-12">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="./images/profile/<?php echo $logpicture;?>"
                     alt="Header Avatar">
                <span class="pulse-css"></span>
                <span class="info d-xl-inline-block  color-span">
                                <span class="d-block fs-20 font-w600"><?php echo $loguser; ?></span>
                                <span class="d-block mt-7"><?php echo $logemail; ?></span>
                            </span>

                <i class='bx bx-chevron-down'></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span>Profile</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="logout.php"><i
                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>
<!-- End Main Header -->
