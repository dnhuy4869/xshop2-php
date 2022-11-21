<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm sản phẩm</h4>
                        <form class="forms-sample" action="index.php?tab=2&act=addSP" method="post"
                            enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="">Loại hàng</label>
                                <select class="form-control" name="idLoaiHang">
                                    <?php
                                    $listLH = loaiHang_loadAll();

                                    foreach ($listLH as $loaiHang) {
                                        echo '<option class="form-control" value="' . $loaiHang['id'] . '">' . $loaiHang['tenLoaiHang'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tenSP" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="hinh" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" class="form-control" name="gia" placeholder="Giá">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea cols="30" rows="5" type="text" class="form-control" name="moTa"
                                    placeholder="Mô tả"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" name="addSP" value="Submit"></button>
                            <a href="index.php?tab=2&act=listSP" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>