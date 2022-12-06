<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hóa đơn</title>
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
    <!-- Navbar Start -->
    <?php
    include "../models/pdo.php";
    include "../models/loaiHang.php";
    include "../models/sanPham.php";
    include "../models/hoaDon.php";

    include "topbar.php";
    include "sidebar.php";

    if (isset($_POST['records-limit'])) {
        $_SESSION['records-limit'] = $_POST['records-limit'];
    }

    $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 8;
    $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $paginationStart = ($page - 1) * $limit;

    $idND = $_SESSION["user"]["id"];
    $listSP = pdo_query("SELECT * FROM hoadon where idNguoiDung='$idND' LIMIT $paginationStart, $limit");
    $sql = pdo_query("SELECT count(id) AS id FROM hoadon where idNguoiDung='$idND'");

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Cake Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Hóa đơn</p>
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
                    foreach ($listSP as $sp) {
                        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-1 mb-4">
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3 px-1">Mã hóa đơn: '.$sp["id"].'</h6>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="billct.php?idHD='.$sp["id"].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                        </div>';

                    }                    
                    ?>

                    
                    
                    <div class="col-12 pb-1">
                        <nav class="">
                            <ul class="pagination justify-content-center">
                            <li class="page-item text-center <?php if($page <= 1){ echo 'disabled'; } ?>">
                                    <a class="page-link"
                                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>"><<</a>
                                </li>

                                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                                    <a class="page-link" href="?page=<?= $i; ?>"> <?= $i; ?> </a>
                                </li>
                                <?php endfor; ?>

                                <li class="page-item text-center <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                                    <a class="page-link"
                                        href="<?php if($page >= $totoalPages){ echo '#'; } else {echo "?page=". $next; } ?>">>></a>
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