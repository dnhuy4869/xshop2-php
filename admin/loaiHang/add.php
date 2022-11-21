<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm loại hàng</h4>

                        <form class="forms-sample" action="index.php?tab=1&act=addLH" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail3">Tên loại hàng</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="tenLH" placeholder="Tên loại hàng"
                                >
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