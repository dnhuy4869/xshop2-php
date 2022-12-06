<?php

session_start();

if (!isset($_SESSION["user"])) {
    $thongBao = "Vui lòng đăng nhập để mua hàng";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Giỏ hàng</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="admin/assets/images/favicon.png" rel="shortcut icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <?php
    include "../models/pdo.php";
    include "../models/loaiHang.php";
    include "../models/sanPham.php";
    include "../models/hoaDon.php";

    include "topbar.php";
    include "sidebar.php";
    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cake Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi tiết hóa đơn</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <?php 
                $idHD = $_GET["idHD"];
                $currHD = hoaDon_loadOne($idHD);

            ?>
            <div class="col-lg-6">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin đặt hàng</h4>
                    <div class="form-group">
                        <b>Họ và tên</b>
                        <p><?=$currHD["hoTen"]?></p>
                    </div>
                    <div class="form-group">
                        <b>Email</b>
                        <p><?=$currHD["email"]?></p>
                    </div>
                    <div class="form-group">
                        <b>Số điện thoại</b>
                        <p><?=$currHD["soDT"]?></p>
                    </div>
                    <div class="form-group">
                        <b>Địa chỉ</b>
                        <p><?=$currHD["diaChi"]?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thông tin hóa đơn</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        <?php
                        $listCT = hoadDonCT_loadById($idHD);
                        $tongSP = 0;
                        $tongTien = 0;

                        foreach ($listCT as $ct) {
                            $tongSP += (int) $ct["soLuong"];
                            $tongTienSP = (int)$ct["gia"] * (int)$ct["soLuong"];
                            $tongTien += $tongTienSP;

                            echo '<div class="d-flex justify-content-between">
                                        <p>' . $ct["tenSanPham"] . '</p>
                                        <p>$' . $tongTienSP . '</p>
                                    </div>';
                        }
                        ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng số sản phẩm</h6>
                            <h6 class="font-weight-medium">
                                <?= $tongSP ?>
                            </h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <h5 class="font-weight-bold">$<?= $tongTien ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                    </div>
                    <div class="card-body">
                        
                        <?php 
                            if ((int)$currHD["pttt"] == 0) {
                            echo '<label class="" for="paypal">Chuyển khoản ngân hàng</label>';
                            }
                            else {
                                echo '<label class="" for="paypal">Thanh toán khi nhận hàng</label>';
                            }
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php
    include "footer.php";
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <script src="../mail/jqBootstrapValidation.min.js"></script>
    <script src="../mail/contact.js"></script>

    <script src="../js/main.js"></script>
</body>

</html>