<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cake Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
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
                            $imgPath = "images/sanPham/" . $cart["hinh"];

                            echo '<tr>
                            <td class="d-flex items-center">
                                <img src="' . $imgPath . '" alt="" style="width: 60px; margin-right: 12px;">
                                <p style="margin-bottom: 0;" class="text-left d-flex align-items-center">' . $cart["tenSP"] . '</p>
                            </td>
                            <td class="align-middle">$' . $cart["gia"] . '</td>
                            <td class="align-middle">' . $cart["soLuong"] . '</td>
                            <td class="align-middle">$' . $cart["tongTien"] . '</td>
                            <td class="align-middle"><a href="index.php?act=xoaGioHang&offset=' . $i . '" class="btn btn-sm btn-primary"><i
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
            <form class="card border-secondary mb-3" action="index.php?act=thanhToan" method="post">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thông tin giỏ hàng</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tổng số sản phẩm</h6>
                        <h6 class="font-weight-medium">
                            <?= $tongSP ?>
                        </h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold">$<?= $tongTien ?>
                        </h5>
                    </div>
                    <input type="hidden" name="tongSP" value="<?= $tongSP ?>">
                    <input type="hidden" name="tongTien" value="<?= $tongTien ?>">
                    <button type="submit" name="thanhToan" class="btn btn-block btn-primary my-3 py-3">Đặt hàng</button>
                </div>
            </form>
            <?php
                if (isset($thongBao)) {
                    echo '<div class="alert alert-danger" role="alert">
                        ' . $thongBao . '
                      </div>';
                }
                ?>
        </div>
    </div>
</div>
<!-- Cart End -->