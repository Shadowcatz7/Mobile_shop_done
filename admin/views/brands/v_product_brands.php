<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thương hiệu sản phẩm</li>
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
                        <h5 class="card-title">Thương hiệu Sản Phẩm</h5>
                        <?php if (isset($_COOKIE['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_COOKIE['success']; ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_COOKIE['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_COOKIE['error']; ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">

                            <div class="border-top" style="display: flex;">
                                <div class="card-body" style="flex: 0;">
                                    <button type="button" class="btn btn-success btn-lg" onclick="window.location.href='add_product_brands.php'">Thêm thương hiệu</button>
                                </div>
                            </div>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã thương hiệu</th>
                                        <th>Tên thương hiệu</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($show_type as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $value->ma_loai; ?></td>
                                            <td><?php echo $value->ten_loai_sp; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='edit_product_brands.php?ma_loai=<?php echo $value->ma_loai; ?>'">Sửa</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='delete_product_brands.php?ma_loai=<?php echo $value->ma_loai; ?>'">Xóa</button>
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