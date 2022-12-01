<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm người dùng</h4>

                        <form class="forms-sample" action="index.php?tab=3&act=addND" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tên tài khoản</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="tenTK" placeholder="Tên tài khoản"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Mật khẩu</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="matKhau" placeholder="Mật khẩu"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="soDT" placeholder="Số điện thoại"
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
                            <div class="form-group">
                                <label for="">Vai trò</label>
                                <select class="form-control" name="vaiTro">
                                    <option class="form-control" value="0">Khách</option>
                                    <option class="form-control" value="1">Quản trị viên</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" name="addND" value="Submit"></button>
                            <a href="index.php?tab=3&act=listND" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>