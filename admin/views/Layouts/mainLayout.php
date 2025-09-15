<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../../../img/icon/icon.png">
    <link rel="stylesheet" href="../../../Css/App.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../../Js/Message.js"></script>
    <script src="../../../Js/CheckInput.js"></script>
</head>

<body class="d-flex flex-column ">
    <?php if (isset($_SESSION['user'])) {
        $currentTime = time();
        if ($currentTime < $_SESSION['expire']) {
    ?>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./?act=home"><img src="../../../img/logo.png"></a>
                    <!-- Hiển thị tên người dùng quản lý -->
                    <div class="d-flex align-items-center">
                        <span class="text-white me-3">
                            <?php if ($_SESSION['user']['hinh_anh']) { ?>
                                <img class="avatar rounded-circle" src="<?= $_SESSION['user']['hinh_anh'] ?>">
                            <?php } else { ?>
                                <i class="fa fa-user-circle me-1"></i>
                            <?php } ?>
                            <?php echo $_SESSION['user']['ten']; ?>
                        </span>
                        <a href="./?act=dangxuat" class="btn btn-light">Đăng Xuất</a>
                    </div>
                </div>
            </nav>
            <?php include("./views/Layouts/menu.php"); ?>
            <div class="main-content p-0">
                <div class="d-flex flex-column justify-content-center align-self-center w-100 mb-3 pt-5 mt-5">
                    <?= @$content; ?>
                </div>
            </div>
        <?php    } else { ?>
            <div class="d-flex flex-column justify-content-center align-self-center w-100 mb-3">
                <?= @$content; ?>
            </div>
        <?php }
    } else { ?>
        <div class="d-flex flex-column justify-content-center align-self-center w-100 mb-3">
            <?= @$content; ?>
        </div>
    <?php }
    ?>
</body>

</html>