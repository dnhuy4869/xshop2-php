<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chỉnh sửa sản phẩm</h4>

                        <?php 
                            if (isset($_GET["id"])) {
                                $idND = $_GET["id"];

                                $currND = nguoiDung_loadOne($idND);
                            }
                        ?>

                        <form class="forms-sample" action="index.php?tab=3&act=editND" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control" placeholder="ID" disabled
                                    value="<?php echo $currND["id"]; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Tên tài khoản</label>
                                <input type="text" class="form-control" name="tenTK" placeholder="Tên tài khoản" value="<?php echo $currND["tenTaiKhoan"];?>">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="text" class="form-control" name="matKhau" placeholder="Mật khẩu" value="<?php echo $currND["matKhau"];?>">
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="hinh" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="<?php if (isset($currND["hinh"]) && $currND["hinh"] != "") echo $currND["hinh"]; else echo "Upload image"; ?>">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $currND["email"];?>">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="soDT" placeholder="Số điện thoại" value="<?php echo $currND["soDienThoai"];?>">
                            </div>
                            <div class="form-group">
                                <label for="">Vai trò</label>
                                <select class="form-control" name="vaiTro">
                                    <option class="form-control" value="0">Khách</option>
                                    <option class="form-control" value="1" <?php if ($currND["vaiTro"] == true) echo "selected"; ?>>Quản trị viên</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?=$currND["id"]?>">
                            <input type="submit" class="btn btn-primary mr-2" name="editND" value="Submit"></button>
                            <a href="index.php?tab=3&act=listND" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>