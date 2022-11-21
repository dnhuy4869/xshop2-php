<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chỉnh sửa loại hàng</h4>

                        <?php 
                            if (isset($_GET["id"])) {
                                $idLH = $_GET["id"];

                                $currentLH = loaiHang_loadOne($idLH);
                            }
                        ?>

                        <form class="forms-sample" action="index.php?tab=1&act=editLH" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control" placeholder="ID" disabled
                                    value="<?php echo $currentLH["id"]; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Tên loại hàng</label>
                                <input type="text" class="form-control" name="tenLH" placeholder="Tên loại hàng"
                                    value="<?php echo $currentLH["tenLoaiHang"]; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Hình</label>
                                <input type="file" name="hinh" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="<?php if (isset($currentLH["hinh"]) && $currentLH["hinh"] != "") echo $currentLH["hinh"]; else echo "Upload image"; ?>">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?=$currentLH["id"]?>">
                            <input type="submit" class="btn btn-primary mr-2" name="editLH" value="Submit"></button>
                            <a href="index.php?tab=1?act=listLH" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>