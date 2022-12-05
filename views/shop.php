<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sản phẩm</title>
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

    if (isset($_POST['records-limit'])) {
        $_SESSION['records-limit'] = $_POST['records-limit'];
    }

    if (isset($_POST["filter"]) || (isset($_SESSION["kw"]) && $_SESSION["kw"] !== "")) {
        if (isset($_POST["filter"])) {
            $_SESSION['kw'] = $_POST['kw'];
        }
       
        $kw = $_SESSION["kw"];
    } else {
        $kw = "";
    }

    $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 8;
    $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $paginationStart = ($page - 1) * $limit;

    if (isset($_GET["idLH"])) {
        $idLH = (int)$_GET["idLH"];

        if ($kw !== "") {
            $listSP = pdo_query("SELECT * FROM sanpham where tenSanPham like '%$kw%' and idLoaiHang='$idLH' LIMIT $paginationStart, $limit");
            $sql = pdo_query("SELECT count(id) AS id FROM sanpham where tenSanPham like '%$kw%' and idLoaiHang='$idLH'");
        } else {
            $listSP = pdo_query("SELECT * FROM sanpham where idLoaiHang='$idLH' LIMIT $paginationStart, $limit");
            $sql = pdo_query("SELECT count(id) AS id FROM sanpham where idLoaiHang='$idLH'");
        }
    } else {
        if ($kw !== "") {
            $listSP = pdo_query("SELECT * FROM sanpham where tenSanPham like '%$kw%' LIMIT $paginationStart, $limit");
            $sql = pdo_query("SELECT count(id) AS id FROM sanpham where tenSanPham like '%$kw%'");
        } else {
            $listSP = pdo_query("SELECT * FROM sanpham LIMIT $paginationStart, $limit");
            $sql = pdo_query("SELECT count(id) AS id FROM sanpham");
        }
    }

    $allRecrods = $sql[0]['id'];

    // Calculate total pages
    $totoalPages = ceil($allRecrods / $limit);

    // Prev + Next
    $prev = $page - 1;
    $next = $page + 1;

    ?>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Sản phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->

            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center">
                                <form action="shop.php?tab=2" id="filter-form" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="kw" placeholder="Tìm theo tên" <?php if (isset($_SESSION["kw"]) && $_SESSION["kw"] !== "") echo 'value="'.$kw.'"'; ?>>
                                        <input type="hidden" name="filter">
                                        <div class="input-group-append"
                                            onclick="document.forms['filter-form'].submit();">
                                            <span class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <div class="dropdown ml-4">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sắp xếp
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">Mới nhất</a>
                                        <a class="dropdown-item" href="#">Phổ biến</a>
                                        <a class="dropdown-item" href="#">Nhiều đánh giá</a>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse bd-highlight ">
                                <form action="shop.php?tab=2" id="form-records-limit" method="post">
                                    <select name="records-limit" id="records-limit" class="custom-select" onchange="document.forms['form-records-limit'].submit();">
                                        <option disabled selected>Records Limit</option>
                                        <?php foreach ([8, 12, 16, 20] as $limit): ?>
                                        <option <?php if (
                                                isset($_SESSION['records-limit']) &&
                                                $_SESSION['records-limit'] == $limit
                                            ) echo 'selected'; ?>
                                            value="<?= $limit; ?>">
                                                <?= $limit; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    //$listSP = sanPham_loadAll();
                    foreach ($listSP as $sp) {
                        $img = "../images/sanPham/" . $sp["hinh"];
                        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <a href="detail.php?tab=3&idSP=' . $sp["id"] . '" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" style="height: 300px;" src="' . $img . '" alt="">
                                </a>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3 px-1">' . $sp["tenSanPham"] . '</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>$' . $sp["gia"] . '</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="detail.php?tab=3&idSP=' . $sp["id"] . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                    <form action="cart.php?tab=4&act=themSP" class="btn btn-sm text-dark p-0" method="post">
                                    <input type="hidden" name="id" value="'.$sp["id"].'">
                                    <input type="hidden" name="tenSP" value="'.$sp["tenSanPham"].'">
                                    <input type="hidden" name="hinh" value="'.$sp["hinh"].'">
                                    <input type="hidden" name="gia" value="'.$sp["gia"].'">
                                    <input type="hidden" name="soLuong" value="1">
                                    <button type="submit" name="themSP" class="btn-addtocart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                    <div class="col-12 pb-1">
                        <nav class="">
                            <ul class="pagination justify-content-center">
                                <?php
                                $href = "?tab=2&page=";
                                if (isset($_GET["idLH"])) {
                                    $href = "?tab=2&idLH=" . $_GET["idLH"] . "&page=";
                                }
                                ?>
                                <li class="page-item text-center <?php if ($page <= 1) {
                                    echo 'disabled';
                                } ?>">
                                    <a class="page-link" href="<?php if ($page <= 1) {
                                            echo '#';
                                        } else {
                                            echo $href . $prev;
                                        } ?>">
                                        <<</a>
                                </li>

                                <?php for ($i = 1; $i <= $totoalPages; $i++): ?>
                                <li class="page-item <?php if ($page == $i) {
                                        echo 'active';
                                    } ?>">
                                    <a class="page-link" href="<?php echo "shop.php" . $href . $i; ?>">
                                        <?= $i; ?>
                                    </a>
                                </li>
                                <?php endfor; ?>

                                <li class="page-item text-center <?php if ($page >= $totoalPages) {
                                        echo 'disabled';
                                    } ?>">
                                    <a class="page-link" href="<?php if ($page >= $totoalPages) {
                                            echo '#';
                                        } else {
                                            echo $href . $next;
                                        } ?>">>></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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