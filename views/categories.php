<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <?php
            $listLH = loaiHang_loadLimit(6);

            foreach ($listLH as $lh) {
                $count = loaiHang_count($lh["id"]);
                $imgPath = "images/".$lh["hinh"];

                echo '<div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">'.$count.' Products</p>
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="'.$imgPath.'" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">'.$lh["tenLoaiHang"].'</h5>
                    </div>
                    </div>';
            }
            ?>
    </div>
</div>
<!-- Categories End -->