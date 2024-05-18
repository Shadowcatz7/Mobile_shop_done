
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Khách hàng</li>
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
                        <h5 class="card-title">Thông Tin Khách Hàng</h5>
                        <?php if(isset($_SESSION['alert_delete_customer'])) :?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION['alert_delete_customer'];?>
                        </div>
                        <?php endif; unset($_SESSION['alert_delete_customer']);?>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã khách hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($list_account as $key=>$value) {?>
                                    <tr>
                                        <td><?php echo $key+1 ; ?></td>
                                        <td><?php echo $value->ma_kh; ?></td>
                                        <td><?php echo $value->ho_ten ; ?></td>
                                        <td><?php echo $value->ngay_sinh ; ?></td>
                                        <td><?php echo $value->dia_chi ; ?></td>
                                        <td><?php echo $value->so_dien_thoai ; ?></td>
                                        <td><?php echo $value->email ; ?></td>

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