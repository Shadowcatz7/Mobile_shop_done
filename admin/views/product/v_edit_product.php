<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
                        <fieldset>
                            <div class="card-body">
                                <h4 class="card-title">Sửa Sản Phẩm có ID : <?php echo $_GET['ma_sp']; ?></h4>
                                <?php if (isset($_COOKIE['error'])) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_COOKIE['error']; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($_COOKIE['success'])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $_COOKIE['success']; ?>
                                    </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Mã sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ma_sp" name="ma_sp" required value="<?php echo $edit_product->ma_sp; ?>" placeholder="ma san pham">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Loại sản phẩm</label>
                                    <div class="col-md-9">
                                        <select name="ma_loai_sp" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option>---Chọn---</option>
                                            <?php foreach ($arr as $key => $value) :  ?>
                                                <option value="<?php echo $value->ma_loai; ?>" <?php if ($value->ma_loai == $edit_product->ma_loai_sp) {
                                                                                                    echo "selected";
                                                                                                } else {
                                                                                                    echo " ";
                                                                                                } ?>><?php echo $value->ten_loai_sp; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên sản phẩm</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten_sp" name="ten_sp" required value="<?php echo $edit_product->ten_sp; ?>">
                                    </div>
                                </div>
                                <div class="form-group row" style="height: 200px;">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                    <div class="col-sm-9">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-inputs" name="f_hinh_anh" id="validatedCustomFile">
                                            <div class="col-xs-6  bg-white" id="image-holder3">
                                                <img src="public/imageproduct/<?php echo $edit_product->hinh_anh; ?>" style="width: 100px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Số Lượng</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="so_luong" name="so_luong" required value="<?php echo $edit_product->so_luong; ?>" placeholder="so luong">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giá Bán</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="gia_ban" name="gia_ban" required value="<?php echo $edit_product->gia_ban; ?>" placeholder="gia bán">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Thông tin</label>
                                    <div class="col-sm-9">
                                        <textarea name="thong_tin" id="thong_tin" class="form-control"><?php echo $edit_product->thong_tin_them; ?></textarea>
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