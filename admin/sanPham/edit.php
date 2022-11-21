<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chỉnh sửa loại hàng</h4>

                        <?php 
                            if (isset($_GET["id"])) {
                                $idSP = $_GET["id"];

                                $currentSP = sanPham_loadOne($idSP);
                            }
                        ?>

                        <form class="forms-sample" action="index.php?tab=2&act=editSP" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control" placeholder="ID" disabled
                                    value="<?php echo $currentSP["id"]; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label for="">Loại hàng</label>
                                <select class="form-control" name="idLoaiHang">
                                    <?php
                                    $listLH = loaiHang_loadAll();

                                    foreach ($listLH as $loaiHang) {
                                        if ($loaiHang["id"] == $currentSP["idLoaiHang"]) {
                                            echo '<option selected class="form-control" value="' . $loaiHang['id'] . '">' . $loaiHang['tenLoaiHang'] . '</option>';
                                        }
                                        else {
                                            echo '<option class="form-control" value="' . $loaiHang['id'] . '">' . $loaiHang['tenLoaiHang'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tenSP" placeholder="Tên sản phẩm" value="<?php echo $currentSP["tenSanPham"];?>">
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="hinh" class="file-upload-default" value="<?php echo $currentSP["hinh"];?>">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="<?php if (isset($currentSP["hinh"]) && $currentSP["hinh"] != "") echo $currentSP["hinh"]; else echo "Upload image"; ?>">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" name="gia" placeholder="Giá" value="<?php echo $currentSP["gia"];?>">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea cols="30" rows="5" type="text" class="form-control" name="moTa"
                                    placeholder="Mô tả"><?php echo $currentSP["moTa"];?></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?=$currentSP["id"]?>">
                            <input type="submit" class="btn btn-primary mr-2" name="editSP" value="Submit"></button>
                            <a href="index.php?tab=2&act=listSP" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>