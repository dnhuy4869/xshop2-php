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
                                <form action="index.php?act=hoaDon" id="form-records-limit" method="post">
                                    <select name="records-limit" id="records-limit" class="custom-select" onchange="document.forms['form-records-limit'].submit();">
                                        <option disabled selected>Giới hạn số lượng</option>
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
                    foreach ($listHD as $hd) {
                        echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-1 mb-4">
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3 px-1">Mã hóa đơn: '.$hd["id"].'</h6>
                                <div class="d-flex justify-content-center">
                                <h6>' . $hd["ngayDatHang"] . '</h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center bg-light border">
                                <a href="index.php?act=chiTietHD&idHD='.$hd["id"].'" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                        </div>';

                    }                    
                    ?>

                    
                    
                    <div class="col-12 pb-1">
                        <nav class="">
                            <ul class="pagination justify-content-center">
                                <?php
                                $href = "index.php?act=hoaDon";
                                ?>
                            <li class="page-item text-center <?php if($page <= 1){ echo 'disabled'; } ?>">
                                    <a class="page-link"
                                        href="<?php if($page <= 1){ echo '#'; } else { echo $href. "&page=" . $prev; } ?>"><<</a>
                                </li>

                                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                                    <a class="page-link" href="<?php echo $href. "&page=" . $i; ?>"> <?= $i; ?> </a>
                                </li>
                                <?php endfor; ?>

                                <li class="page-item text-center <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                                    <a class="page-link"
                                        href="<?php if($page >= $totoalPages){ echo '#'; } else { echo $href. "&page=" . $next; } ?>">>></a>
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