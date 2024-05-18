<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card ">
                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
                        <fieldset>
                            <div class="card-body">
                                <h4 class="card-title">Sửa Thương hiệu có ID : <?php echo $_GET['ma_loai']; ?></h4>
                                <?php if (isset($_COOKIE['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_COOKIE['error']; ?>
                                    </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mã thương hiệu</label>
                                    <div class="col-sm-9">
                                        <input type="text" disabled class="form-control" id="ma_loai" required name="ma_loai" value="<?php echo $edit_typeproduct->ma_loai; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên thương hiệu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten_loai_sp" required name="ten_loai_sp" value="<?php echo $edit_typeproduct->ten_loai_sp; ?>">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" name="btn-submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>