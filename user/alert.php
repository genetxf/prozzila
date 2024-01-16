<?php
include 'config.php';
?>
<div class="alert text-danger alert-dismissible modal custom-modal fade show" style="display: block; padding-left: 0px;" aria-modal="true" role="alert" tabindex="-1" aria-hidden="true">
    <div class="main-content board  modal-dialog" role="document">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="box col-12 modal-content">
                <button class="close btn bg-danger" href="#" data-dismiss="alert" onclick="history.back()"><i class="fas fa-times"></i></button>
                <div class="box page-body">
                    <div class="head text-center">
                        <h1>SORRY</h1>
                        <?php echo "<p class='alert text-danger'>Error: $error" . $conn->error . "</p>";?>
                    </div>

                    <div class="text-center">
                        <div class="checkmark-circle">
                            <div class="background"></div>
                            <div class="checkmark draw"><i class="bx bxs-x-circle" style="font-size: 100px;"></i></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

