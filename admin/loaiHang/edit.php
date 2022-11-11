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

                        <form class="forms-sample" action="index.php?tab=1&act=editLH" method="post">
                            <div class="form-group">
                                <label for="exampleInputName1">ID</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="ID" disabled
                                    value="<?php echo $currentLH["id"]; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tên loại hàng</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="tenLH" placeholder="Tên loại hàng"
                                    value="<?php echo $currentLH["tenLoaiHang"]; ?>"
                                >
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