<?php
if (isset($_GET["act"])) {
    $act = $_GET["act"];

    if ($act === "dangXuat") {
        unset($_SESSION['user']);
    }
}

$tab = 1;

if (isset($_GET["tab"])) {
    $tab = (int) $_GET["tab"];
}
else {
    if (__FILE__ != "home.php") {
        $tab = 0;
    }
}

$isShow = "show";
if ($tab !== 1) {
    $isShow = "position-absolute";
}

$isMb = "mb-5";
if ($tab !== 1) {
    $isMb = "";
}

$navStype = "";
if ($tab !== 1) {
    $navStype = "width: calc(100% - 30px); z-index: 1;";
}

$listLH = loaiHang_loadLimit(10);
?>

<div class="container-fluid <?php echo $isMb; ?>">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Loại Hàng</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse <?php echo $isShow; ?> navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical" style="<?php echo $navStype; ?>">
                <div class="bg-white navbar-nav w-100 overflow-hidden">
                    <?php
                    foreach ($listLH as $lh) {
                        echo '<a href="shop.php?tab=2&idLH=' . $lh["id"] . '" class="nav-item nav-link">' . $lh["tenLoaiHang"] . '</a>';
                    }
                    ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <?php
                        $navItems = [
                            (object) [
                                'tab' => 1,
                                'displayName' => 'Trang chủ',
                                'href' => "home.php?tab=1",
                            ],
                            (object) [
                                'tab' => 2,
                                'displayName' => 'Sản phẩm',
                                'href' => "shop.php?tab=2",
                            ],
                            // (object) [
                            //     'tab' => 3,
                            //     'displayName' => 'Chi tiết',
                            //     'href' => "detail.php?tab=3",
                            // ],
                            (object) [
                                'tab' => 4,
                                'displayName' => 'Giỏ hàng',
                                'href' => "cart.php?tab=4",
                            ],
                            (object) [
                                'tab' => 5,
                                'displayName' => 'Hóa đơn',
                                'href' => "bill.php?tab=5",
                            ],
                        ];

                        if (isset($_GET["tab"])) {
                            $tab = (int) $_GET["tab"];
                        }

                        foreach ($navItems as $nav) {
                            $className = "nav-item nav-link";
                            if ($tab == $nav->tab) {
                                $className .= " active";
                            }

                            echo ' <a href="' . $nav->href . '" class="' . $className . '">' . $nav->displayName . '</a>';
                        }
                        ?>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-flex align-items-center">
                        <?php
                        if (isset($_SESSION["user"])) {
                            echo '<a href="#" class="nav-item nav-link">' . $_SESSION["user"]["tenTaiKhoan"] . '</a>';
                            echo '<span>|</span>';
                            echo '<a href="home.php?act=dangXuat" class="nav-item nav-link">Đăng xuất</a>';
                        } else {

                        ?>
                        <a href="login.php" class="nav-item nav-link">Đăng nhập</a>
                        <span>|</span>
                        <a href="register.php" class="nav-item nav-link">Đăng ký</a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
            <?php
            if ($tab == 1) {
            ?>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="../img/carousel-3.jpg" alt="">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm giá 10% đơn hàng đầu
                                    tiên
                                </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Ngon, Bổ, Rẻ</h3>
                                <a href="" class="btn btn-light py-2 px-3">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px;">
                        <img class="img-fluid" src="../img/carousel-4.jpg" alt="">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">Giảm giá 10% đơn hàng đầu
                                    tiên
                                </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Giá Cả Hợp Lý</h3>
                                <a href="" class="btn btn-light py-2 px-3">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>