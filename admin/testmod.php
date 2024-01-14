<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Nested Modals</title>
</head>
<body>
<div class="row">
    <div class="col-12">
        <div class="box card-box">
            <!--Assign Task-->
            <div class="icon-box bg-color-4">
                <a class="create d-flex" href="#" data-toggle="modal" data-target="#assign">
                    <div class="icon bg-white">
                        <i class="bx bx-plus"></i>
                    </div>
                    <div class="content d-flex align-items-center">
                        <h5 class="color-white">Assign New Task</h5>
                    </div>
                </a>
            </div>

            ?>
            <div class="icon-box bg-color-4">
                <a class="create d-flex" href="#" data-toggle="modal" data-target="#mainModal">
                    <div class="icon bg-white">
                        <i class="bx bx-plus"></i>
                    </div>
                    <div class="content d-flex align-items-center">
                        <h5 class="color-white">Create New Task</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
