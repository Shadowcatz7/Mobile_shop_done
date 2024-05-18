<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
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
                        <h5 class="card-title">Sản Phẩm</h5>
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
                                    <button type="button" class="btn btn-success btn-lg" onclick="window.location.href='add_product.php'">Thêm sản phẩm</button>
                                </div>
                            </div>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                        <th>Thông tin</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($product as $key => $value) {

                                        if ($value->so_luong == 0) {
                                            $css_trang_thai =   "badge-danger";
                                            $text_trang_thai =  "Hết hàng";
                                        } else {
                                            $css_trang_thai = "badge-info";
                                            $text_trang_thai = "Còn hàng";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $value->ma_sp; ?></td>
                                            <td><?php echo $value->ten_loai_sp; ?></td>
                                            <td><?php echo $value->ten_sp; ?></td>
                                            <td> <img style="width: 150px;" src='public/imageproduct/<?php echo $value->hinh_anh; ?>'></td>
                                            <td><?php echo $value->so_luong; ?></td>
                                            <td><?php echo $value->gia_ban; ?></td>
                                            <td><?php echo $value->thong_tin_them; ?></td>
                                            <td> <span class="badge badge-pill <?php echo $css_trang_thai; ?>"><?php echo $text_trang_thai; ?> </span></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='edit_product.php?ma_sp=<?php echo $value->ma_sp; ?>'">Sửa</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='delete_product.php?ma_sp=<?php echo $value->ma_sp; ?>'">Xóa</button>
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