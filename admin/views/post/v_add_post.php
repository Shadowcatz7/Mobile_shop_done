<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="width: 50%;">
                <div class="card">
                    <form class="form-horizontal" action="" enctype="multipart/form-data" method="POST">
                        <div class="card-body">
                            <h4 class="card-title">Thêm Sản Phẩm</h4>
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
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tiêu đề bài viết</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="title" required placeholder="Tiêu đề">
                                </div>
                            </div>
                            <div class="form-group row" style="height: 200px;">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Hình ảnh</label>
                                <div class="col-sm-9">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-inputs" name="f_hinh_anh" id="validatedCustomFile">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nội dung</label>
                                <div class="col-sm-9">
                                    <div style="height:300px;width:100%" id="editor"> </div>
                                    <input type="hidden" name="content" id="input_editor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Trạng thái</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" name="status" style="width: 100%; height:36px;">
                                        <option>---Chọn---</option>
                                        <option value="0">Lưu nháp</option>
                                        <option value="1">Hoạt động</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" name="btn-submit" id="subformpost" class="btn btn-primary">Thêm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>