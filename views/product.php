<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center py-5">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cake Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
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
                            <?php
                            $href = "index.php?act=sanPham";
                            if (isset($idLH)) {
                                $href .= ("&idLH=" . $idLH);
                            }
                            ?>
                            <form action="<?= $href ?>" id="filter-form" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kw" placeholder="Tìm theo tên" 
                                    <?php
                                        if (isset($_SESSION["kw"]) && $_SESSION["kw"] !== "") {
                                            echo 'value="' . $_SESSION["kw"] . '"';
                                        }
                                    ?>>
                                    <input type="hidden" name="filter">
                                    <button class="input-group-append d-flex align-items-center" style="background: none; outline: none; border: solid 1px #ddd;" onclick="document.forms['filter-form'].submit();">
                                        <span class="input-group-text bg-transparent text-primary" style="background: none; outline: none; border: none;">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                            <div class="d-flex flex-row-reverse bd-highlight ml-4">
                                <form action="<?= $href ?>" id="form-sort-by" method="post">
                                    <select name="sort-by" id="sort-by" class="custom-select"
                                        onchange="document.forms['form-sort-by'].submit();">
                                        <option disabled selected>Sắp xếp</option>
                                        
                                        <option <?php
                                            if ( isset($_SESSION['sort-by']) &&
                                            $_SESSION['sort-by']==0 ) {
                                            echo "selected";
                                            }
                                        ?> value="0">Mới nhất</option>
                                        <option <?php
                                            if ( isset($_SESSION['sort-by']) &&
                                            $_SESSION['sort-by']==1 ) {
                                            echo "selected";
                                            }
                                        ?> value="1">Nhiều đánh giá</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bd-highlight ">
                            <form action="<?= $href ?>" id="form-records-limit" method="post">
                                <select name="records-limit" id="records-limit" class="custom-select"
                                    onchange="document.forms['form-records-limit'].submit();">
                                    <option disabled selected>Giới hạn số lượng</option>
                                    <?php foreach ([8, 12, 16, 20] as $limit): ?>
                                    <option <?php if ( isset($_SESSION['records-limit']) &&
                                        $_SESSION['records-limit']==$limit )
                                                echo 'selected'; ?>
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
                        $img = "images/sanPham/" . $sp["hinh"];
                        $hrefCT = 'index.php?act=chiTietSP&idSP=' . $sp["id"] . '';
                        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <a href="' . $hrefCT . '" class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid w-100" style="height: 300px;" src="' . $img . '" alt="">
                                </a>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3 px-2">
                                    <h6 class="text-truncate mb-3 px-1">' . $sp["tenSanPham"] . '</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>$' . $sp["gia"] . '</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="' . $hrefCT . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
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
                <div class="col-12 pb-1">
                    <nav class="">
                        <ul class="pagination justify-content-center">
                            <?php
                                $href = "index.php?act=sanPham";
                                if (isset($idLH)) {
                                    $href .= ("&idLH=" . $idLH);
                                }

                                $href .= "&page=";
                                ?>
                            <li class="page-item text-center <?php if ($page <= 1) {
                                    echo 'disabled';
                                } ?>">
                                <a class="page-link" href="<?php if ($page <= 1) {
                                        echo '#';
                                    } else {
                                        echo $href . $prev;
                                    } ?>">
                                << 
                                </a>
                            </li>

                            <?php for ($i = 1; $i <= $totoalPages; $i++): ?>
                            <li class="page-item <?php if ($page == $i) {
                                        echo 'active';
                                    } ?>">
                                <a class="page-link" href="<?php echo $href . $i; ?>">
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
                                    } ?>">
                                    >>
                                </a>
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