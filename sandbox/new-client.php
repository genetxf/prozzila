<?php
$pagetitle = "Add New Client";
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
                        <form method="post" action="client_process.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Client ID</label> <input required
                                                                                                                type="number"
                                                                                                                name="client_id"
                                                                                                                class="form-control"
                                                                                                                placeholder="2569852">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Email</label> <input required
                                                                                                           type="email"
                                                                                                           name="client_id"
                                                                                                           class="form-control"
                                                                                                           placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Contact No</label> <input required
                                                                                                                type="text"
                                                                                                                name="contact_no"
                                                                                                                class="form-control"
                                                                                                                placeholder="Enter Contact No">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Gender</label> <select
                                                required name="Gender"
                                                class="form-control custom-select select2 select2-hidden-accessible"
                                                data-placeholder="Select Gender" tabindex="-1" aria-hidden="true"
                                                data-select2-id="select2-data-22-9i9m">
                                            <option label="Select Gender"
                                                    data-select2-id="select2-data-24-ktnv"></option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        <span class="select2 select2-container select2-container--default" dir="ltr"
                                              data-select2-id="select2-data-23-72at" style="width: 100%;"><span
                                                    class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-attendance-92-container"
                                                        aria-controls="select2-attendance-92-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-attendance-92-container" role="textbox"
                                                            aria-readonly="true" title="Select Gender"></span>
                                        <span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span>
                                        </span>
                                        </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Country</label> <input required
                                                                                                               type="text"
                                                                                                               name="country"
                                                                                                               class="form-control"
                                                                                                               placeholder="Enter Country">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Address</label> <input required
                                                                                                             type="text"
                                                                                                             name="address"
                                                                                                             class="form-control"
                                                                                                             placeholder="Enter Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Status -->
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group"><label class="form-label">Status</label> <select
                                                required name="Gender"
                                                class="form-control custom-select select2 select2-hidden-accessible"
                                                data-placeholder="Select Status" tabindex="-1" aria-hidden="true"
                                                data-select2-id="select2-data-22-9i9m">
                                            <option label="Select Status"
                                                    data-select2-id="select2-data-24-ktnv"></option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                        <span class="select2 select2-container select2-container--default" dir="ltr"
                                              data-select2-id="select2-data-23-72at" style="width: 100%;"><span
                                                    class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-attendance-92-container"
                                                        aria-controls="select2-attendance-92-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-attendance-92-container" role="textbox"
                                                            aria-readonly="true" title="Select Status"></span>
                                        <span class="select2-selection__arrow" role="presentation"><b
                                                    role="presentation"></b></span>
                                        </span>
                                        </span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>

                                <!-- Company Name -->
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group">
                                        <label class="form-label">Company Name</label>
                                        <input required type="text" name="company_name" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>

                                <!-- Company Country -->
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group">
                                        <label class="form-label">Company Country</label>
                                        <input required type="text" name="company_country" class="form-control" placeholder="Company Country">
                                    </div>
                                </div>

                                <!-- Company Address -->
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group">
                                        <label class="form-label">Company Address</label>
                                        <input required type="text" name="company_address" class="form-control" placeholder="Company Address">
                                    </div>
                                </div>

                                <!-- Company Contact Number -->
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group">
                                        <label class="form-label">Company Contact Number</label>
                                        <input required type="text" name="company_contact_no" class="form-control"
                                               placeholder="Company Contact Number">
                                    </div>
                                </div>

                                <!-- Company Website -->
                                <div class="col-md-6 col-sm-12 mb-24">
                                    <div class="form-group">
                                        <label class="form-label">Company Website</label>
                                        <input required type="text" name="company_website" class="form-control" placeholder="Company Website">
                                    </div>
                                </div>


                            </div>

                            <!-- About -->
                            <div class="form-group mb-24"><label class="form-label">About</label>
                                <textarea type="text" required name="description" class="form-control" cols="30"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Attachment:</label>
                                <span>
                                                <input name="attachment_file" type="file" class="form-control">
                                            </span>
                            </div>
                    </div>
                    <div class="gr-btn mt-15">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg fs-16"
                               onclick="not1()">
                        </form>
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
                                    <textarea rows="4" class="form-control"
                                              placeholder="Enter your message here"></textarea>
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


        </div>
    </div>
    <!-- END MAIN CONTENT -->
    <?php include 'footer.php'; ?>

