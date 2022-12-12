<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Chất lượng</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Miễn phí ship</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14 ngày đổi trả</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <?php
        foreach ($dsLH as $lh) {
            $count = loaiHang_count($lh["id"]);
            $imgPath = "images/loaiHang/" . $lh["hinh"];
            $href = "index.php?act=sanPham&idLH=" . $lh["id"];

            echo '<div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding-bottom: 16px;">
                        <a href="'. $href.'" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid w-100" style="height: 340px;" src="' . $imgPath . '" alt="">
                        </a>
                       <div class="d-flex align-items-center justify-content-between px-2">
                        <h5 class="font-weight-semi-bold m-0">' . $lh["tenLoaiHang"] . '</h5>
                        <p class="mb-0">' . $count . ' Sản phẩm</p> 
                       </div>
                    </div>
                    </div>';
        }
        ?>
    </div>
</div>
<!-- Categories End -->


<!-- Offer Start -->
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                <img src="images/sanPham/bánh ngọt chery.jpg" alt="" class="h-100">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">Giảm giá 20%</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Bánh Ngọt</h1>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 pb-4">
            <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                <img src="images/sanPham/bánh ngọt vị dâu.jpg" alt="" class="h-100">
                <div class="position-relative" style="z-index: 1;">
                    <h5 class="text-uppercase text-primary mb-3">Giảm giá 20%</h5>
                    <h1 class="mb-4 font-weight-semi-bold">Bánh Kem</h1>
                    <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản Phẩm Phổ Biến</span></h2>
    </div>

    <div class="row px-xl-5 pb-3">
        <?php
        foreach ($spThinhHanh as $sp) {
            $img = "images/sanPham/" . $sp["hinh"];
            $chiTietSP = "index.php?act=chiTietSP&idSP=" . $sp['id'];
            echo ' <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <a href="'.$chiTietSP.'" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" style="height: 300px;" src="' . $img . '" alt="">
                    </a>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-2">
                        <h6 class="text-truncate mb-3 px-2">' . $sp["tenSanPham"] . '</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$' . $sp["gia"] . '</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="'.$chiTietSP.'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                    <form action="index.php?act=themGioHang" class="btn btn-sm text-dark p-0" method="post">
                                    <input type="hidden" name="id" value="' . $sp["id"] . '">
                                    <input type="hidden" name="tenSP" value="' . $sp["tenSanPham"] . '">
                                    <input type="hidden" name="hinh" value="' . $sp["hinh"] . '">
                                    <input type="hidden" name="gia" value="' . $sp["gia"] . '">
                                    <input type="hidden" name="soLuong" value="1">
                                    <button type="submit" name="themGioHang" class="btn-addtocart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                </div>
            </div>';
        }
        ?>
    </div>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-4 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Cập Nhật Tin Tức</span></h2>
                    <p>Cập nhật tin tức về sản phẩm mới của chúng tôi qua email.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email của bạn">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Đăng Ký</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Vừa Mới Xem</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        <?php
        $i = 0;
        foreach ($_SESSION["vuaXem"] as $sp) {
            $i++;
            if ($i > 8) {
                break;
            }

            $img = "images/sanPham/" . $sp["hinh"];
            $chiTietSP = "index.php?act=chiTietSP&idSP=" . $sp['id'];
            echo ' <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <a href="'.$chiTietSP.'" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" style="height: 300px;" src="' . $img . '" alt="">
                    </a>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-2">
                        <h6 class="text-truncate mb-3 px-2">' . $sp["tenSanPham"] . '</h6>
                        <div class="d-flex justify-content-center">
                            <h6>$' . $sp["gia"] . '</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="'.$chiTietSP.'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                    <form action="index.php?act=themGioHang" class="btn btn-sm text-dark p-0" method="post">
                                    <input type="hidden" name="id" value="' . $sp["id"] . '">
                                    <input type="hidden" name="tenSP" value="' . $sp["tenSanPham"] . '">
                                    <input type="hidden" name="hinh" value="' . $sp["hinh"] . '">
                                    <input type="hidden" name="gia" value="' . $sp["gia"] . '">
                                    <input type="hidden" name="soLuong" value="1">
                                    <button type="submit" name="themGioHang" class="btn-addtocart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                </div>
            </div>';
        }
        ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->