<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
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
                        <h5 class="card-title">Thống kê doanh thu</h5>
                        <div class="table-responsive">
                            <div class="border-top">
                                <div class="card-body">
                                    <form action="" method="GET">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="">Chọn kiểu lọc</label>
                                                <select name="type_fillter" onchange="changeData()" id="typefilter" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="1" <?php if (isset($_GET['type_fillter']) && $_GET['type_fillter'] == 1) echo "selected"; ?>>Khoảng thời gian</option>
                                                    <option value="2" <?php if (isset($_GET['type_fillter']) && $_GET['type_fillter'] == 2) echo "selected"; ?>>Quý</option>
                                                    <option value="3" <?php if (isset($_GET['type_fillter']) && $_GET['type_fillter'] == 3) echo "selected"; ?>>Năm</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 d-none" id="from_date" <?php if (isset($_GET['type_fillter']) && $_GET['type_fillter'] == 1) echo "style='display:block'"; ?>>
                                                <label for="">Từ ngày</label>
                                                <input type="date" class="form-control" name="from-date" value="<?php echo isset($_GET['from-date']) ? $_GET['from-date'] : ''; ?>">
                                            </div>
                                            <div class="col-md-3 d-none" id="to_date" <?php if (isset($_GET['type_fillter']) && $_GET['type_fillter'] == 1) echo "style='display:block'"; ?>>
                                                <label for="">Đến ngày</label>
                                                <input type="date" class="form-control" name="to-date" value="<?php echo isset($_GET['to-date']) ? $_GET['to-date'] : ''; ?>">
                                            </div>
                                            <div class="col-md-3 d-none" id="quarter" <?php if (isset($_GET['type_fillter']) && $_GET['type_fillter'] == 2) echo "style='display:block'"; ?>>
                                                <label for="">Quý</label>
                                                <select name="quarter" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="1" <?php if (isset($_GET['quarter']) && $_GET['quarter'] == 1) echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if (isset($_GET['quarter']) && $_GET['quarter'] == 2) echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if (isset($_GET['quarter']) && $_GET['quarter'] == 3) echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if (isset($_GET['quarter']) && $_GET['quarter'] == 4) echo "selected"; ?>>4</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 d-none" id="year" <?php if (isset($_GET['type_fillter']) && ($_GET['type_fillter'] == 1 || $_GET['type_fillter'] == 2)) echo "style='display:block'"; ?>>
                                                <label for="">Năm</label>
                                                <select name="year" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <?php
                                                    $current_year = date("Y");
                                                    for ($i =  $current_year; $i > 2015; $i--) {
                                                        echo "<option value='$i' ";
                                                        if (isset($_GET['year']) && $_GET['year'] == $i) echo "selected";
                                                        echo ">$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <button type="submit" class="btn btn-success mt-4" name="report"> Lọc </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ngày</th>
                                        <th>Số lượng đơn hàng</th>
                                        <th>Tổng tiền</th>
                                        <th> Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($orders) && count($orders) > 0) {
                                        foreach ($orders as $index => $value) { ?>
                                            <tr>
                                                <td><?php echo ++$index ?></td>
                                                <td><?php echo $value->ngay ?></td>
                                                <td><?php echo $value->so_luong_don_hang ?></td>
                                                <td><?php echo $value->tong_tien_don_hang ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='dentail_report.php?ngay=<?php echo $value->ngay; ?>'">Chi tiết</button>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="99">Không có đơn hàng nào được mua trong khoảng thời gian này.</td>
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

<script>
    function changeData() {
        var selectedValue = document.getElementById('typefilter').value;
        console.log(selectedValue);
        var fromDate = document.getElementById('from_date');
        var toDate = document.getElementById('to_date');
        var quarterDiv = document.getElementById('quarter');
        var yearDiv = document.getElementById('year');

        if (selectedValue == 1) {
            fromDate.classList.remove('d-none');
            toDate.classList.remove('d-none');
            quarterDiv.classList.add('d-none');
            yearDiv.classList.add('d-none');
        }
        if (selectedValue == 2) {
            fromDate.classList.add('d-none');
            toDate.classList.add('d-none');
            quarterDiv.classList.remove('d-none');
            yearDiv.classList.remove('d-none');
        }
        if (selectedValue == 3) {
            fromDate.classList.add('d-none');
            toDate.classList.add('d-none');
            quarterDiv.classList.add('d-none');
            yearDiv.classList.remove('d-none');
        }
    }
    changeData()
</script>