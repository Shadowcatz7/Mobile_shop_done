<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bài viết</h5>
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
                        <div class="table-responsive">
                            <div class="border-top" style="display: flex;">
                                <div class="card-body" style="flex: 0;">
                                    <button type="button" class="btn btn-success btn-lg" onclick="window.location.href='add_post.php'">Thêm bài viết</button>
                                </div>
                            </div>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã bài viết</th>
                                        <th>Tiêu đề</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($post as $key => $value) {

                                        if ($value->trang_thai == 0) {
                                            $css_trang_thai =   "badge-danger";
                                            $text_trang_thai =  "Lưu nháp";
                                        } else {
                                            $css_trang_thai = "badge-info";
                                            $text_trang_thai = "Hoạt động";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $value->ma_bv; ?></td>
                                            <td><?php echo $value->tieu_de; ?></td>
                                            <td><?php echo $value->ngay_tao; ?></td>
                                            <td> <span class="badge badge-pill <?php echo $css_trang_thai; ?>"><?php echo $text_trang_thai; ?> </span></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='edit_post.php?edit&ma_bv=<?php echo $value->ma_bv; ?>'">Sửa</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='list_post.php?delete&ma_bv=<?php echo $value->ma_bv; ?>'">Xóa</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>