<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm loại hàng</h4>

                        <form class="forms-sample" action="index.php?tab=1&act=addLH" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tên loại hàng</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="tenLH" placeholder="Tên loại hàng"
                                >
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
                            <input type="submit" class="btn btn-primary mr-2" name="addLH" value="Submit"></button>
                            <a href="index.php?tab=1&act=listLH" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>