<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
                        <div class="card-body" >
                            <h4 class="card-title">Thêm Thương hiệu</h4>
                            <?php if (isset($_COOKIE['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_COOKIE['error']; ?>
                                    </div>
                                <?php } ?>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mã thương hiệu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ma_loai" name="ma_loai" required placeholder="Mã thương hiệu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên thương hiệu</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ten_loai_sp" name="ten_loai_sp" required placeholder="Tên thương hiệu">
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" name="btn-submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>