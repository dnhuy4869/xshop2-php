<?php
include "../models/pdo.php";
include "../models/nguoiDung.php";

session_start();

if (isset($_POST["register"])) {
    $tenTK = $_POST["tenTK"];
    $matKhau = $_POST["matKhau"];
    $filename = $_FILES["hinh"]["name"];
    $target_dir = "../images/nguoiDung/";
    $target_file = $target_dir . $filename;
    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

    if (nguoiDung_isExist($tenTK)) {
        $isSuccess = false;
        $thongBao = "Tên tài khoản đã tồn tại.";
    } else {
        nguoiDung_addOne($tenTK, $matKhau, "", "", 0, $filename);
        $isSuccess = true;
        $thongBao = "Đăng ký thành công.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Đăng ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-7 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center mb-2">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Đăng ký</h3>
                        <form action="register.php" class="login-form" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="tenTK"
                                    placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control rounded-left" name="matKhau"
                                    placeholder="Mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="hinh" class="file-upload-default">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="register"
                                    class="form-control btn btn-primary rounded submit px-3" value="Register"></input>
                            </div>
                            <?php
                            if (isset($thongBao)) {
                                $class = "alert alert-danger";
                                if ($isSuccess)
                                {
                                    $class = "alert alert-success";
                                }

                                echo '<div class="'.$class.'" role="alert">
                                '.$thongBao.'
                              </div>';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>