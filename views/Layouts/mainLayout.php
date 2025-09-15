<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../../img/icon/pet.png">
    <link rel="stylesheet" href="./Css/App.css">
    <script src="./Js/App.js"></script>
    <script src="./Js/CheckInput.js"></script>
    <script src="./Js/Message.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column ">
    <div class="d-flex flex-column justify-content-center align-self-center w-100">
        <?php include('./views/Layouts/header.php'); ?>
        <div class="d-flex flex-column justify-content-center align-self-center w-75">
            <?= @$content; ?>
        </div>
        <?php include('./views/Layouts/footer.php'); ?>
    </div>
</body>
<div class="modal fade" id="myDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="bodyPopup">

            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

</html>