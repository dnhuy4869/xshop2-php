<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cake Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Chi tiết sản phẩm</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <?php

        $imgPath = "images/sanPham/" . $currSP["hinh"];

        ?>

        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-6 pb-5" style="height: 600px;">
                    <img class="img-fluid w-100 h-100" src="<?php echo $imgPath; ?>" alt="Image">
                </div>

                <div class="col-lg-6 pb-5">
                    <h3 class="font-weight-semi-bold">
                        <?php echo $currSP["tenSanPham"]; ?>
                    </h3>
                    <div class="d-flex mb-3">
                        <small class="pt-1">(50 Đánh giá)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">$
                        <?php echo $currSP["gia"]; ?>
                    </h3>
                    <?php
                    $string = $currSP["moTa"];
                    if (strlen($string) > 500) {

                        // truncate string
                        $stringCut = substr($string, 0, 500);
                        $endPoint = strrpos($stringCut, ' ');

                        //if the string doesn't contain any space then it will cut without word basis.
                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                        $string .= '...';
                    }
                    echo '<p class="mb-4">' . $string . '</p>';
                    ?>
                    <form class="d-flex align-items-center mb-4 pt-2" action="index.php?act=themGioHang" method="post">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <input type="number" name="soLuong" min="1" class="form-control bg-secondary text-center"
                                value="1">
                        </div>

                        <input type="hidden" name="id" value="<?= $idSP ?>">
                        <input type="hidden" name="tenSP" value="<?= $currSP["tenSanPham"] ?>">
                        <input type="hidden" name="hinh" value="<?= $currSP["hinh"] ?>">
                        <input type="hidden" name="gia" value="<?= $currSP["gia"] ?>">
                        <button type="submit" name="themGioHang" class="btn btn-primary px-3"><i
                                class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng </button>

                    </form>
                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                        <div class="d-inline-flex">
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
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Mô tả</h4>
                            <p>
                                <?php echo $currSP["moTa"]; ?>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "
                                        <?php echo $currSP["tenSanPham"]; ?>"
                                    </h4>
                                    <div class="media mb-4">
                                        <img src="../img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
                                            style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam
                                                ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod
                                                ipsum.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked
                                        *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop End -->

<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Có Thể Bạn Cũng Thích</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <?php

                foreach ($spThinhHanh as $sp) {
                    $img = "images/sanPham/" . $sp["hinh"];
                    echo '<div class="card product-item border-0">
                <a href="detail.php?idSP=' . $sp["id"] . '" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" style="height: 300px;" src="' . $img . '" alt="">
                </a>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">' . $sp["tenSanPham"] . '</h6>
                    <div class="d-flex justify-content-center">
                        <h6>$' . $sp["gia"] . '</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="detail.php?tab=3&idSP=' . $sp["id"] . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                <form action="cart.php?tab=4&act=themSP" class="btn btn-sm text-dark p-0" method="post">
                                <input type="hidden" name="id" value="' . $sp["id"] . '">
                                <input type="hidden" name="tenSP" value="' . $sp["tenSanPham"] . '">
                                <input type="hidden" name="hinh" value="' . $sp["hinh"] . '">
                                <input type="hidden" name="gia" value="' . $sp["gia"] . '">
                                <input type="hidden" name="soLuong" value="1">
                                <button type="submit" name="themSP" class="btn-addtocart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</button>
                                </form>
                            </div>
            </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Products End -->