<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cake Shop</title>
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
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .btn-addtocart {
            background: none;
            border: none;
            outline: none;
        }

        .btn-addtocart:hover {
            background: none;
            border: none;
            outline: none;
            color: #D19C97;
        }
    </style>
</head>

<body>
    <?php
    include "models/pdo.php";
    include "models/loaiHang.php";
    include "models/sanPham.php";
    include "models/nguoiDung.php";
    include "models/hoaDon.php";
    include "models/binhLuan.php";

    if (!isset($_SESSION["vuaMoiXem"])) {
        $_SESSION["vuaMoiXem"] = [];
    }

    if (!isset($_SESSION["gioHang"])) {
        $_SESSION["gioHang"] = [];
    }

    include "views/topbar.php";

    $dsLH = loaiHang_loadLimit(10);
    include "views/sidebar.php";

    $act = "trangChu";
    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    }

    switch ($act) {
        case "trangChu": {
                $dsLH = loaiHang_loadLimit(6);
                $spThinhHanh = sanPham_loadThinhHanh(8);

                include "views/home.php";

                break;
            }
        case "sanPham": {
                if (isset($_POST['records-limit'])) {
                    $_SESSION['records-limit'] = $_POST['records-limit'];
                }

                if (isset($_GET["idLH"])) {
                    $idLH = (int) $_GET["idLH"];
                } else {
                    $idLH = null;
                }

                if (isset($_POST["filter"]) || (isset($_SESSION["kw"]) && $_SESSION["kw"] !== "")) {
                    if (isset($_POST["filter"])) {
                        $_SESSION['kw'] = $_POST['kw'];
                    }

                    $kw = $_SESSION["kw"];
                } else {
                    $kw = null;
                }

                if (isset($_POST['sort-by'])) {
                    $_SESSION['sort-by'] = $_POST['sort-by'];
                }

                $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 8;
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
                $paginationStart = ($page - 1) * $limit;

                $sortBy = isset($_SESSION['sort-by']) ? $_SESSION['sort-by'] : null;

                $sql1 = "SELECT * FROM sanpham";
                $sql1 .= " where 1=1";

                if (isset($idLH)) {
                    $sql1 .= " and idLoaiHang=$idLH";
                }

                if (isset($kw)) {
                    $sql1 .= " and tenSanPham like '%$kw%'";
                }

                if (isset($sortBy)) {
                    if ($sortBy == 0) {
                        $sql1 .= " order by id desc";
                    }
                }

                $sql1 .= " LIMIT $paginationStart, $limit";

                $sql2 = "SELECT count(id) AS id FROM sanpham";
                $sql2 .= " where 1=1";

                if (isset($idLH)) {
                    $sql2 .= " and idLoaiHang=$idLH";
                }

                if (isset($kw)) {
                    $sql2 .= " and tenSanPham like '%$kw%'";
                }

                $listSP = pdo_query($sql1);
                $sql = pdo_query($sql2);

                if (isset($sortBy)) {
                    if ($sortBy == 1) {
                        foreach ($listSP as &$sp) {
                            $sp["tongSoBL"] = binhLuan_tongSoBL($sp["id"]);
                        }

                        //var_dump($listSP);

                        usort($listSP, function ($a, $b) { return $b['tongSoBL'] <=> $a['tongSoBL']; });
                    }
                }

                $allRecrods = $sql[0]['id'];
                $totoalPages = ceil($allRecrods / $limit);

                $prev = $page - 1;
                $next = $page + 1;

                include "views/product.php";

                break;
            }
        case "chiTietSP": {
                $idSP = $_GET["idSP"];

                sanPham_tangLuotXem($idSP);

                $currSP = sanPham_loadOne($idSP);
                $spThinhHanh = sanPham_loadLienQuan($currSP["idLoaiHang"], 5);

                $tongSoBL = binhLuan_tongSoBL($idSP);
                $listBL = binhLuan_loadLimit($idSP);

                include "views/detail.php";

                break;
            }
        case "themBinhLuan": {
            if (isset($_POST["themBinhLuan"])) {
                    $idSanPham = $_POST["idSanPham"];
                    $idNguoiDung = $_POST["idNguoiDung"];
                    $noiDung = $_POST["noiDung"];
                    $ngayBinhLuan = date("d-m-Y");

                    binhLuan_addOne($idNguoiDung, $idSanPham, $ngayBinhLuan, $noiDung);

                    echo ("<script>location.href = 'index.php?act=chiTietSP&idSP=$idSanPham';</script>");
            }

                break;
        }
        case "gioHang": {
                if (!isset($_SESSION["user"])) {
                    $thongBao = "Vui lòng đăng nhập để mua hàng";
                } else if (empty($_SESSION["gioHang"])) {
                    $thongBao = "Giỏ hàng đang rỗng";
                } else {
                    $thongBao = null;
                }
    
                include "views/cart.php";

                break;
            }
        case "themGioHang": {
                if (isset($_POST["themGioHang"])) {
                    $id = $_POST["id"];
                    $tenSP = $_POST["tenSP"];
                    $hinh = $_POST["hinh"];
                    $gia = (int) $_POST["gia"];
                    $soLuong = (int) $_POST["soLuong"];
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
                    } else {
                        $cart = $_SESSION["gioHang"][$i];
                        $currSL = (int) $cart["soLuong"];
                        $currSL += $soLuong;
                        $_SESSION["gioHang"][$i]["soLuong"] = $currSL;

                        $gia = (int) $cart["gia"];
                        $tongTien = $currSL * $gia;
                        $_SESSION["gioHang"][$i]["tongTien"] = $tongTien;
                    }
                }

                echo ("<script>location.href = 'index.php?act=gioHang';</script>");
                break;
            }
        case "xoaGioHang": {
                if (isset($_GET["offset"])) {
                    array_splice($_SESSION["gioHang"], $_GET["offset"], 1);
                }

                echo ("<script>location.href = 'index.php?act=gioHang';</script>");
                break;
            }
        case "hoaDon": {
                if (!isset($_SESSION["user"])) {
                    echo ("<script>location.href = 'login.php';</script>");
                }

                if (isset($_POST['records-limit'])) {
                    $_SESSION['records-limit'] = $_POST['records-limit'];
                }

                $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 8;
                $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
                $paginationStart = ($page - 1) * $limit;

                $idND = $_SESSION["user"]["id"];
                $listHD = pdo_query("SELECT * FROM hoadon where idNguoiDung='$idND' LIMIT $paginationStart, $limit");
                $sql = pdo_query("SELECT count(id) AS id FROM hoadon where idNguoiDung='$idND'");

                $allRecrods = $sql[0]['id'];

                $totoalPages = ceil($allRecrods / $limit);

                $prev = $page - 1;
                $next = $page + 1;

                include "views/bill.php";

                break;
            }
        case "thanhToan": {
                if (!isset($_SESSION["user"]) || empty($_SESSION["gioHang"])) {
                    echo ("<script>location.href = 'index.php?act=gioHang';</script>");
                }

                include "views/checkout.php";

                break;
            }
        case "xuatHoaDon": {
                if (isset($_POST["thanhToan"])) {
                    $hoTen = $_POST["hoTen"];
                    $email = $_POST["email"];
                    $soDT = $_POST["soDT"];
                    $diaChi = $_POST["diaChi"];
                    $pttt = $_POST["pttt"];
                    $idND = $_SESSION["user"]["id"];
                    $ngayDatHang = date("d-m-Y");

                    $idHD = hoaDon_addOne($hoTen, $email, $soDT, $diaChi, $idND, $pttt, $ngayDatHang);

                    foreach ($_SESSION["gioHang"] as $cart) {
                        hoaDonCT_addOne($cart["id"], $idHD, $cart["soLuong"], $cart["tenSP"], $cart["hinh"], $cart["gia"]);
                    }

                    unset($_SESSION['gioHang']);

                    echo ("<script>location.href = 'index.php?act=chiTietHD&idHD=$idHD';</script>");
                }

                break;
            }
        case "chiTietHD": {
                $idHD = $_GET["idHD"];
                $currHD = hoaDon_loadOne($idHD);
                $listCT = hoadDonCT_loadById($idHD);

                include "views/billct.php";

                break;
            }
        case "dangXuat": {
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                }

                echo ("<script>location.href = 'index.php?act=trangChu';</script>");
                break;
            }
        default: {
                $dsLH = loaiHang_loadLimit(6);
                $spThinhHanh = sanPham_loadThinhHanh(8);

                include "views/home.php";

                break;
            }
    }

    include "views/footer.php";

    ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>