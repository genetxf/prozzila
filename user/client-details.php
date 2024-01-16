<?php
include 'auth.php';
include 'database.php';
// Query to fetch project details

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
$pagetitle = "Client Details";
include 'header.php';

?>

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-content client project">
            <div class="row">
                <div class="col-9 col-xl-7 col-md-8 col-sm-12 mb-20">
                    <div class="box card-box mb-20">
                        <div class="icon-box bg-color-10">
                            <div class="icon bg-icon-10">
                                <i class='bx bxs-briefcase'></i>
                            </div>
                            <div class="content color-10">
                                <h5 class="title-box fs-17 font-w400 mb-1">Total Project</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                    <span class="number" data-from="0" data-to="1225" data-speed="2500" data-inviewport="yes"><?php $sql4 = "SELECT * FROM `projects`";
                                        $result4 = $conn->query($sql4);
                                        $total = 0;
                                        if ($result4->num_rows > 0) {
                                            while ($row4 = $result4->fetch_assoc()) {
                                                $total = $total + 1;
                                            }
                                            echo $total;

                                        }
                                        ?> +</span>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box bg-color-11">
                            <div class="icon bg-icon-11">
                                <i class='bx bx-dollar'></i>
                            </div>
                            <div class="content click-c color-11">
                                <h5 class="title-box fs-17 font-w400 mb-1">Total Budget</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                    <span class="number" data-from="0" data-to="309" data-speed="2500" data-inviewport="yes">$2691</span>
                                </div>
                            </div>

                        </div>
                        <div class="icon-box bg-color-12">
                            <div class="icon bg-icon-12">
                                <i class='bx bx-task'></i>
                            </div>
                            <div class="content click-c color-12">
                                <h5 class="title-box fs-17 font-w400 mb-1">Unpaid Invoi</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                    <span class="number" data-from="0" data-to="309" data-speed="2500" data-inviewport="yes">75 +</span>
                                </div>
                            </div>

                        </div>
                        <div class="icon-box bg-color-13">
                            <div class="icon bg-icon-13">
                                <i class='bx bx-dollar color-white'></i>
                            </div>
                            <div class="content click-c color-13">
                                <h5 class="title-box fs-17 font-w400 mb-1">Total Earnings</h5>
                                <div class="themesflat-counter fs-18 font-wb">
                                    <span class="number" data-from="0" data-to="309" data-speed="2500" data-inviewport="yes">$26,589</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3 col-xl-5 col-md-4 col-sm-12 ">
                    <div class="box h-100 d-flex align-items-center">
                        <a class="create d-flex bg-primary justify-content-center" href="#">
                            <div class="icon color-white pt-4 pr-8">
                                <i class='bx bx-plus-circle'></i>
                            </div>
                            <div class="content">
                                <h5 class="color-white">ADD NEW CLIENTS</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8 col-xl-12">
                    <div class="box pd-0">
                        <div class="tab-menu-heading hremp-tabs p-0 ">
                            <div class="tabs-menu1">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs w-100 d-flex justify-content-between">
                                    <li class=""><a href="#tab5" class="active" data-bs-toggle="tab">Overview</a></li>
                                    <li><a href="#tab6" data-bs-toggle="tab" class="">Projects</a></li>
                                    <li><a href="#tab7" data-bs-toggle="tab">Task</a></li>
                                    <li><a href="#tab8" data-bs-toggle="tab">Invoices</a></li>
                                    <li><a href="#tab9" data-bs-toggle="tab">Payments</a></li>
                                    <li><a href="#tab10" data-bs-toggle="tab">Files</a></li>
                                    <li><a href="#tab11" data-bs-toggle="tab">Tickets</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body tabs-menu-body hremp-tabs1 p-0">

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab5">
                                    <div class="box-body pl-15 pr-15 pb-20 pr-0">
                                        <h5 class="mb-10 mt-32 font-w600 fs-18 line-h18">About</h5>
                                        <p class="fs-15 line-h18 mb-22">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are
                                            going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. There are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form.</p>
                                        <p class="fs-15 line-h18 mb-22">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                        <p class="fs-15 line-h18 mb-22">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are
                                            going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                        <p class="fs-15 line-h18 mb-22">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are
                                            going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. There are many variations of passages of Lorem Ipsum available, but the majority have
                                            suffered alteration in some form.</p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab6">
                                    <div class="box-body pl-15 pr-15 pb-20 table-responsive activity mt-10">
                                        <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer mw-100" id="task-profile" role="grid">
                                            <thead>
                                                <tr class="top">
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 222.312px;">Project</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 84.8281px;">Team</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Start</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 87.9844px;">Deadline</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 71.875px;">Progress</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile" rowspan="1" colspan="1" style="width: 110.719px;">Work Status</th>
                                                    <th class="border-bottom-0 sorting_disabled fs-14 font-w500" rowspan="1" colspan="1" style="width: 145.391px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td>
                                                        <a href="#" class="d-flex "> <span>Design Updated</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>12-02-2021</td>
                                                    <td>16-06-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-30"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-warning">On hold</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td>
                                                        <a href="#" class="d-flex "> <span>Website Develop</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>01-01-2021</td>
                                                    <td>22-04-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-yellow w-50"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex"> <span class="badge badge-danger">Dealy</span>
                                                            <div class="mt-1 ms-1"> <span class="feather feather-info text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Dealy by 99 days" ></span> </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">

                                                    <td>
                                                        <a href="#" class="d-flex "><span>Digital Marketing</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>11-04-2021</td>
                                                    <td>16-06-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-100"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-success">Completed</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">

                                                    <td>
                                                        <a href="#" class="d-flex "><span>Ad Analysis</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>11-03-2021</td>
                                                    <td>19-05-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-80"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-primary">On Progress</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">

                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>05-02-2021</td>
                                                    <td>21-04-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-70"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-primary">On Progress</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">

                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>21-01-2021</td>
                                                    <td>15-03-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-40"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex"> <span class="badge badge-danger">Dealy</span>
                                                            <div class="mt-1 ms-1"> <span class="feather feather-info text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Dealy by 30 days"></span> </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">

                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td>
                                                        <ul class="user-list mb-0">
                                                            <li><img src="./images/avatar/user-1.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-2.png" alt="user"></li>
                                                            <li><img src="./images/avatar/user-3.png" alt="user"></li>
                                                        </ul>
                                                    </td>
                                                    <td>23-01-2021</td>
                                                    <td>25-02-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-yellow w-40"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-primary">On Progress</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab7">
                                    <div class="box-body">
                                        <table class="table table-vcenter text-nowrap table-bordered dataTable no-footer" id="task-profile-1" role="grid">
                                            <thead>
                                                <tr class="top">
                                                    <th class="border-bottom-0 text-center sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 26.6562px;">No</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 222.312px;">Task</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 84.8281px;">Priority</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 87.9844px;">Start Date</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 87.9844px;">Deadline</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 71.875px;">Progress</th>
                                                    <th class="border-bottom-0 sorting fs-14 font-w500" tabindex="0" aria-controls="task-profile-1" rowspan="1" colspan="1" style="width: 110.719px;">Work Status</th>
                                                    <th class="border-bottom-0 sorting_disabled fs-14 font-w500" rowspan="1" colspan="1" style="width: 145.391px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td class="text-center">1</td>
                                                    <td>
                                                        <a href="#" class="d-flex "> <span>Design Updated</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-danger-light">High</span></td>
                                                    <td>12-02-2021</td>
                                                    <td>16-06-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-30"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-warning">On hold</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="text-center">2</td>
                                                    <td>
                                                        <a href="#" class="d-flex "> <span>Website Develop</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-success-light">Low</span></td>
                                                    <td>01-01-2021</td>
                                                    <td>22-04-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-yellow w-50"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex"> <span class="badge badge-danger">Dealy</span>
                                                            <div class="mt-1 ms-1"> <span class="feather feather-info text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Dealy by 99 days"></span> </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="text-center">3</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Digital Marketing</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-warning-light">Medium</span></td>
                                                    <td>11-04-2021</td>
                                                    <td>16-06-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-100"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-success">Completed</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="text-center">4</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Ad Analysis</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-danger-light">High</span></td>
                                                    <td>11-03-2021</td>
                                                    <td>19-05-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-80"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-primary">On Progress</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="text-center">5</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-danger-light">High</span></td>
                                                    <td>05-02-2021</td>
                                                    <td>21-04-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-70"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-primary">On Progress</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="text-center">6</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-danger-light">High</span></td>
                                                    <td>21-01-2021</td>
                                                    <td>15-03-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-40"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex"> <span class="badge badge-danger">Dealy</span>
                                                            <div class="mt-1 ms-1"> <span class="feather feather-info text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Dealy by 30 days"></span> </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="text-center">7</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-danger-light">High</span></td>
                                                    <td>23-01-2021</td>
                                                    <td>25-02-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-yellow w-40"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-primary">On Progress</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="text-center">8</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-danger-light">High</span></td>
                                                    <td>13-03-2021</td>
                                                    <td>05-05-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-100"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-success">Completed</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="text-center">9</td>
                                                    <td>
                                                        <a href="#" class="d-flex "> <span>Design update</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-success-light">Low</span></td>
                                                    <td>01-01-2021</td>
                                                    <td>22-04-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-yellow w-50"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex"> <span class="badge badge-danger">Dealy</span>
                                                            <div class="mt-1 ms-1"> <span class="feather feather-info text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Dealy by 99 days"></span> </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="odd">
                                                    <td class="text-center">10</td>
                                                    <td>
                                                        <a href="#" class="d-flex "><span>Design update</span> </a>
                                                    </td>
                                                    <td><span class="badge badge-warning-light">Medium</span></td>
                                                    <td>11-04-2021</td>
                                                    <td>16-06-2021</td>
                                                    <td>
                                                        <div class="progress progress-sm">
                                                            <div class="progress-bar bg-primary w-100"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-success">Completed</span> </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class='bx bx-dots-horizontal-rounded'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab8">
                                    <div class="box-body">
                                        <div class="table-responsive"> <a href="#" class="btn btn-primary btn-tableview">Add Invoice</a>
                                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="invoice-tables">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0">InvoiceID</th>
                                                        <th class="border-bottom-0">Amount</th>
                                                        <th class="border-bottom-0">Invoice Date</th>
                                                        <th class="border-bottom-0">Due Date</th>
                                                        <th class="border-bottom-0">Payment</th>
                                                        <th class="border-bottom-0">Status</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> <a href="#">#INV-0478</a> </td>
                                                        <td>$345.00</td>
                                                        <td>12-01-2021</td>
                                                        <td>14-02-2021</td>
                                                        <td> <span class="">$345.000</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-1245</a> </td>
                                                        <td>$834.00</td>
                                                        <td>12-01-2021</td>
                                                        <td>14-02-2021</td>
                                                        <td> <span class="">$834.000</span> </td>
                                                        <td><span class="badge badge-danger-light">UnPaid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-5280</a> </td>
                                                        <td>$16,753.00</td>
                                                        <td>21-01-2021</td>
                                                        <td>15-01-2021</td>
                                                        <td> <span class="">$16,753.000</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-2876</a> </td>
                                                        <td>$297.00</td>
                                                        <td>05-02-2021</td>
                                                        <td>21-02-2021</td>
                                                        <td> <span class="">$297.000</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-1986</a> </td>
                                                        <td>$12,897.00</td>
                                                        <td>01-01-2021</td>
                                                        <td>24-02-2021</td>
                                                        <td> <span class="">$12,897.00</span> </td>
                                                        <td><span class="badge badge-danger-light">UnPaid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-2689</a> </td>
                                                        <td>$29,652.00</td>
                                                        <td>01-01-2021</td>
                                                        <td>04-02-2021</td>
                                                        <td> <span class="">$29,652.00</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-0298</a> </td>
                                                        <td>$67,298.00</td>
                                                        <td>02-02-2021</td>
                                                        <td>24-02-2021</td>
                                                        <td> <span class="">$67,298.00</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-0298</a> </td>
                                                        <td>$87,287.00</td>
                                                        <td>12-01-2021</td>
                                                        <td>21-02-2021</td>
                                                        <td> <span class="">$87,287.00</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-7618</a> </td>
                                                        <td>$29,674.00</td>
                                                        <td>04-02-2021</td>
                                                        <td>14-03-2021</td>
                                                        <td> <span class="">$29,674.00</span> </td>
                                                        <td><span class="badge badge-danger-light">UnPaid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#INV-0287</a> </td>
                                                        <td>$25,186.00</td>
                                                        <td>02-01-2021</td>
                                                        <td>12-02-2021</td>
                                                        <td> <span class="">$25,186.00</span> </td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab9">
                                    <div class="box-body">
                                        <div class="table-responsive"> <a href="#" class="btn btn-primary btn-tableview">Add Payment</a>
                                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="payment-tables">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0">PaymentID</th>
                                                        <th class="border-bottom-0">($)Amount</th>
                                                        <th class="border-bottom-0">Payment Type</th>
                                                        <th class="border-bottom-0">Due Date</th>
                                                        <th class="border-bottom-0">Status</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> <a href="#">#PAY-0478</a> </td>
                                                        <td><span class="font-weight-semibold">$345.00</span></td>
                                                        <td>Cash</td>
                                                        <td>12-01-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-0329</a> </td>
                                                        <td><span class="font-weight-semibold">$897.00</span></td>
                                                        <td>Card</td>
                                                        <td>16-02-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-0298</a> </td>
                                                        <td><span class="font-weight-semibold">$298.00</span></td>
                                                        <td>Cash</td>
                                                        <td>05-03-2021</td>
                                                        <td><span class="badge badge-danger-light">UnPaid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-0560</a> </td>
                                                        <td><span class="font-weight-semibold">$839.00</span></td>
                                                        <td>Online Payment</td>
                                                        <td>12-04-2021</td>
                                                        <td><span class="badge badge-danger-light">UnPaid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-0927</a> </td>
                                                        <td><span class="font-weight-semibold">$9,238.00</span></td>
                                                        <td>Cash</td>
                                                        <td>05-02-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-2091</a> </td>
                                                        <td><span class="font-weight-semibold">$11,342.00</span></td>
                                                        <td>Online Payment</td>
                                                        <td>12-03-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-1342</a> </td>
                                                        <td><span class="font-weight-semibold">$82,341.00</span></td>
                                                        <td>Cash</td>
                                                        <td>13-02-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-1387</a> </td>
                                                        <td><span class="font-weight-semibold">$9,238.00</span></td>
                                                        <td>Card</td>
                                                        <td>12-02-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-3298</a> </td>
                                                        <td><span class="font-weight-semibold">$12,765.00</span></td>
                                                        <td>Cash</td>
                                                        <td>25-03-2021</td>
                                                        <td><span class="badge badge-danger-light">UnPaid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <a href="#">#PAY-2125</a> </td>
                                                        <td><span class="font-weight-semibold">$35,250.00</span></td>
                                                        <td>Online Payment</td>
                                                        <td>16-03-2021</td>
                                                        <td><span class="badge badge-success-light">Paid</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab10">
                                    <div class="box-body">
                                        <div class="table-responsive"> <a href="#" class="btn btn-primary btn-tableview">Upload Files</a>
                                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="files-tables">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0 text-center w-5">No</th>
                                                        <th class="border-bottom-0">File Name</th>
                                                        <th class="border-bottom-0">Upload By</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td> <a href="#" class="font-weight-semibold fs-14 mt-5">document.pdf<span class="text-muted ms-2">(23 KB)</span></a>
                                                            <div class="clearfix"></div> <small class="text-muted">2 hours ago</small> </td>
                                                        <td>Client</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">2</td>
                                                        <td> <a href="#" class="font-weight-semibold fs-14 mt-5">image.jpg<span class="text-muted ms-2">(2.67 KB)</span></a>
                                                            <div class="clearfix"></div> <small class="text-muted">1 day ago</small> </td>
                                                        <td>Admin</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">4</td>
                                                        <td> <a href="#" class="font-weight-semibold fs-14 mt-5">file.zip<span class="text-muted ms-2">(798.16MB)</span></a>
                                                            <div class="clearfix"></div> <small class="text-muted">2 days ago</small> </td>
                                                        <td>Admin</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">5</td>
                                                        <td> <a href="#" class="font-weight-semibold fs-14 mt-5">Project<span class="text-muted ms-2">(578.6MB)</span></a>
                                                            <div class="clearfix"></div> <small class="text-muted">1 day ago</small> </td>
                                                        <td>Team Lead</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">6</td>
                                                        <td> <a href="#" class="font-weight-semibold fs-14 mt-5">text.doc<span class="text-muted ms-2">(5.6MB)</span></a>
                                                            <div class="clearfix"></div> <small class="text-muted">3 days ago</small> </td>
                                                        <td>Team</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">7</td>
                                                        <td> <a href="#" class="font-weight-semibold fs-14 mt-5">custom.js<span class="text-muted ms-2">(15 KB)</span></a>
                                                            <div class="clearfix"></div> <small class="text-muted">1 week ago</small> </td>
                                                        <td>Team Lead</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab11">
                                    <div class="box-body"> <a href="#" class="btn btn-primary btn-tableview">Add Ticket</a>
                                        <div class="table-responsive">
                                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="ticket-tables">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0">TicketID</th>
                                                        <th class="border-bottom-0">Title</th>
                                                        <th class="border-bottom-0">Category</th>
                                                        <th class="border-bottom-0">Assigned To</th>
                                                        <th class="border-bottom-0">Status</th>
                                                        <th class="border-bottom-0">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#Ticket-01</td>
                                                        <td> <a href="#">Sed ut perspiciatis unde omnis iste natus</a> </td>
                                                        <td>Support</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/1.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Faith Harris</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-primary">New</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-02</td>
                                                        <td> <a href="#">Sed ut perspiciatis unde omnis iste natus</a> </td>
                                                        <td>Services</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/2.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Austin Bell</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-success">Closed</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-03</td>
                                                        <td> <a href="#">Sed ut perspiciatis unde omnis iste natus</a> </td>
                                                        <td>Customization</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/3.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Maria Bower</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-orange">Open</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-04</td>
                                                        <td> <a href="#">Excepteur sint occaecat cupidatat</a> </td>
                                                        <td>Support</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/4.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Peter Hill</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-success">Closed</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-05</td>
                                                        <td> <a href="#">Et harum quidem rerum facilis</a> </td>
                                                        <td>Services</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/5.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Victoria Lyman</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-success">Closed</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-06</td>
                                                        <td> <a href="#">Ut aut reiciendis voluptatibus</a> </td>
                                                        <td>Customization</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/6.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Adam Quinn</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-success">Closed</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-07</td>
                                                        <td> <a href="#">Maiores alias consequatur aut</a> </td>
                                                        <td>Support</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/7.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Melanie Coleman</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-primary">New</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-08</td>
                                                        <td> <a href="#">Quis autem vel eum iure</a> </td>
                                                        <td>Support</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/8.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Melanie Coleman</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-orange">Open</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#Ticket-09</td>
                                                        <td> <a href="#">Quis autem vel eum iure</a> </td>
                                                        <td>Support</td>
                                                        <td>
                                                            <div class="d-flex"> <span class="avatar avatar brround me-3" style="background-image: url(./images/client/9.png)"></span>
                                                                <div class="me-3 mt-0 mt-sm-2 d-block">
                                                                    <h6 class="mb-1 fs-14">Melanie Coleman</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><span class="badge badge-orange">Open</span></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-4 col-xl-12">
                    <div class="box user-pro-list overflow-hidden mb-30">
                        <div class="box-body">
                            <div class="user-pic text-center">
                                <div class="avatar ">
                                    <img style=" width: 100px; border-radius: 10%;" src="./images/profile/<?php echo $logpicture;?>" alt="">
                                    <div class="pulse-css"></div>
                                </div>
                                <div class="pro-user mt-3">
                                    <h5 class="pro-user-username text-dark mb-2 fs-15 mt-42 color-span"><?php echo $loguser; ?></h5>
                                    <h6 class="pro-user-desc text-muted fs-14">CEO</h6>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer pt-41">
                            <div class="btn-list text-center">
                                <a href="#" class="btn btn-light"><i class='bx bxs-envelope' ></i> </a>
                                <a href="#" class="btn btn-light"> <i class='bx bxs-phone-call'></i> </a>
                                <a href="#" class="btn btn-light"><i class='bx bxs-error-circle' ></i></a>
                                <a href="#" class="btn btn-light"> <i class='bx bxs-message-alt-edit'></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="box left-dot mb-30">
                        <div class="box-header  border-0 pd-0">
                            <div class="box-title fs-20 font-w600">Basic Info</div>
                        </div>
                        <div class="box-body pt-20 user-profile">
                            <div class="table-responsive">
                                <table class="table mb-0 mw-100 color-span">
                                    <tbody>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Client ID </span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">#365900</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Email ID</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">foyez@prozzila.com</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Contact no</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">+91 05697 2564 03</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Gender</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Male</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Country</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Bangladesh</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Address</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Dhanmondi, 10, Dhaka-1203</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Status</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="badge badge-success">Active</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="box left-dot">
                        <div class="box-header  border-0 pd-0">
                            <div class="box-title fs-20 font-w600">Company Details</div>
                        </div>
                        <div class="box-body pt-20 user-profile">
                            <div class="table-responsive">
                                <table class="table mb-0 mw-100 color-span">
                                    <tbody>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Company Name </span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">ProZZila Inc.</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Country</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Bangladesh</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Address</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">Dhanmondi, 10, Dhaka-1203</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Contact No</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">+880 1859 166002</span> </td>
                                        </tr>
                                        <tr>
                                            <td class="py-2 px-0"> <span class="w-50">Website</span> </td>
                                            <td>:</td>
                                            <td class="py-2 px-0"> <span class="">www.prozzila.com</span> </td>
                                        </tr>

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
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->

    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/jquery/jquery-ui.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/apexcharts/apexcharts.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/peity/jquery.peity.min.js"></script>
    <script src="./libs/chart.js/Chart.bundle.min.js"></script>
    <script src="./libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="./js/countto.js"></script>
    <script src="./libs/date-picker/datepicker.js"></script>
    <script src="./libs/rating/js/custom-ratings.js"></script>
    <script src="./libs/rating/js/jquery.barrating.js"></script>
    <script src="./libs/circle-progress/circle-progress.min.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>

    <!-- APP JS -->
    <script src="./js/main.js"></script>

    <script src="./js/shortcode.js"></script>


</body>

</html>