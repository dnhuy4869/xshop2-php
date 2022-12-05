<?php

session_start();

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
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">C</span>Cake</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include "../models/pdo.php";
    include "../models/loaiHang.php";
    include "sidebar.php";
    include "../models/sanPham.php";

    if (!isset($_SESSION["gioHang"])) {
        $_SESSION["gioHang"] = [];
    }

    if (isset($_GET["act"])) {
        $act = $_GET["act"];

        switch($act) {
            case "themSP"; {
                if (isset($_POST["themSP"])) {
                    $id = $_POST["id"];
                    $tenSP = $_POST["tenSP"];
                    $hinh = $_POST["hinh"];
                    $gia = (int)$_POST["gia"];
                    $soLuong = (int)$_POST["soLuong"];
                    $tongTien = $soLuong * $gia;

                    $newSP = [ 
                        "id" => $id, 
                        "tenSP" => $tenSP,
                        "hinh" => $hinh,
                        "gia" => $gia, 
                        "soLuong" => $soLuong,
                        "tongTien" => $tongTien 
                    ];

                    $isExist = false;
                        $i = 0;

                    foreach ($_SESSION["gioHang"] as $cart) {
                        if ($cart["id"] == $id) {
                            $isExist = true;
                                break;
                        }

                        $i++;
                    }

                    if (!$isExist) {
                        array_push($_SESSION["gioHang"], $newSP); 
                    }
                    else {
                        $cart = $_SESSION["gioHang"][$i];
                        $currSL = (int)$cart["soLuong"];
                                $currSL += $soLuong;
                                $_SESSION["gioHang"][$i]["soLuong"] = $currSL;

                                $gia = (int)$cart["gia"];
                                $tongTien = $currSL * $gia;
                                $_SESSION["gioHang"][$i]["tongTien"] = $tongTien;
                    }
                }

                break;
            }
            case "xoaSP": {
                if (isset($_GET["offset"])) {
                    array_splice($_SESSION["gioHang"], $_GET["offset"], 1);
                }

                break;
            }
        }
    }

    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $i = 0;
                        foreach ($_SESSION["gioHang"] as $cart) {
                            $imgPath = "../images/sanPham/" . $cart["hinh"];

                            echo '<tr>
                            <td class="d-flex items-center">
                                <img src="'.$imgPath.'" alt="" style="width: 60px; margin-right: 12px;">
                                <p style="margin-bottom: 0;" class="text-left d-flex align-items-center">'.$cart["tenSP"].'</p>
                            </td>
                            <td class="align-middle">$'.$cart["gia"].'</td>
                            <td class="align-middle">'.$cart["soLuong"].'</td>
                            <td class="align-middle">$'.$cart["tongTien"].'</td>
                            <td class="align-middle"><a href="cart.php?tab=4&act=xoaSP&offset='.$i.'" class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></a></td>
                        </tr>';

                            $i++;
                        }
                                              
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <?php
                $tongSP = 0;
                $tongTien = 0;
                foreach ($_SESSION["gioHang"] as $cart) {
                    $tongSP += $cart["soLuong"];
                    $tongTien += $cart["tongTien"];
                }

                ?>
                <form class="card border-secondary mb-5" action="checkout.php?tab=5" method="post">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thông tin giỏ hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng số </h6>
                            <h6 class="font-weight-medium"><?=$tongSP?></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <h5 class="font-weight-bold">$<?=$tongTien?></h5>
                        </div>
                        <input type="hidden" name="tongSP" value="<?=$tongSP?>">
                        <input type="hidden" name="tongTien" value="<?=$tongTien?>">
                        <button type="submit" name="datHang" class="btn btn-block btn-primary my-3 py-3">Đặt hàng</button>
                    </div>
                </form>
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