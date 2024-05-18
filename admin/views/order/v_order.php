<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
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
                        <h5 class="card-title">Đơn Hàng</h5>
                        <div class="table-responsive">
                            <?php if (isset($_SESSION['alert_delete_order'])) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_SESSION['alert_delete_order']; ?>
                                </div>
                            <?php endif;
                            unset($_SESSION['alert_delete_order']); ?>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($list_order as $key => $value) {


                                        $trang_thai = "Chưa thanh toán";
                                        if ($value->trang_thai == 1) {
                                            $trang_thai = "Đã thanh toán";
                                        }
                                        if($value->trang_thai == 2){
                                            $trang_thai = "Đã hủy";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $key; ?></td>
                                            <td><?php echo $value->ma_dh; ?></td>
                                            <td><?php echo $value->ho_ten; ?></td>
                                            <td><?php echo $value->tong_tien; ?></td>
                                            <td><?php echo $value->phuong_thuc_thanh_toan; ?></td>
                                            <td>
                                                <?php echo $trang_thai; ?>
                                            </td>
                                            <td>
                                                <?php if($value->trang_thai !== 2){ ?> 
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="window.location.href='order.php?ma_dh=<?php echo $value->ma_dh; ?>&&action=delete'">Hủy đơn</button>
                                                <?php } ?>
                                                <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='order_details.php?ma_dh=<?php echo $value->ma_dh; ?>'">Chi tiết</button>
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