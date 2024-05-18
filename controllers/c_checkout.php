<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "models/m_checkout.php";
@session_start();
class c_checkout
{

    public function checkout()
    {
        $ma_kh = $_SESSION['login']->id;
        $m_checkout = new m_checkout();
        $check_out = $m_checkout->select_infomation_user($ma_kh);
        $check_info = false;
        if (!empty($check_out->ho_ten)) {
            if (!empty($check_out->ngay_sinh)) {
                if (!empty($check_out->dia_chi)) {
                    if (!empty($check_out->so_dien_thoai)) {
                        $check_info = true;
                    }
                }
            }
        }
        if (isset($_POST['btn_order'])) {
            $thanhtien = 0;
            $tong_tien = 0;
            foreach ($_SESSION['cart'] as $key => $value) :
                $thanhtien += $value['so_luong'] * $value['gia_ban'];
                $tong_tien += $thanhtien;
            endforeach;

            $vnp_TmnCode = "VC2GYY5E"; //Mã định danh merchant kết nối (Terminal Id)
            $vnp_HashSecret = "IAJPRJLMWZKPERNSGHULANJYQGGXNZBY"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = HOST."check_out.php";
            //Config input format
            //Expire
            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

            $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $tong_tien; // Số tiền thanh toán
            $vnp_Locale = "vn"; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = "VNBANK"; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount * 100,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            if (isset($_POST['radio-group'])) {
                if ($_POST['radio-group'] == 1) {
                    header('Location:' . $vnp_Url);
                    die();
                } else {
                    $phuong_thuc_thanh_toan = "Tiền mặt";
                    $ngay_thanh_toan = date("Y-m-d");
                    $trang_thai = 0;
                    $m_order = new m_checkout();
                    $last_id = $m_order->insert_order(null, $ma_kh, $tong_tien, $phuong_thuc_thanh_toan, $ngay_thanh_toan, $trang_thai);
                    if ($last_id) {
                        //            lấy thông tin chi tiết đơn hàng đẩy lên databases
                        foreach ($_SESSION['cart'] as $key => $value) :

                            $ma_sp = $value['id'];
                            $so_luong = $value['so_luong'];

                            $m_order_details = new m_checkout();
                            $details = $m_order_details->insert_order_details($last_id, $ma_sp, $so_luong);
                        endforeach;
                    }

                    echo "<script>window.location.href='order_history.php'</script>";
                    unset($_SESSION['cart']);
                }
            }
        }
        if (isset($_GET['vnp_ResponseCode'])) {
            $ma_dh = $_GET['vnp_TxnRef'];
            $ma_kh = $_SESSION['login']->id;
            $thanhtien = 0;
            $tong_tien = 0;
            foreach ($_SESSION['cart'] as $key => $value) :
                $thanhtien += $value['so_luong'] * $value['gia_ban'];
                $tong_tien += $thanhtien;
            endforeach;
            $phuong_thuc_thanh_toan = "Chuyển khoản";
            $ngay_thanh_toan = date("Y-m-d");
            $trang_thai = 1;
            if ($_GET['vnp_ResponseCode'] == '00') {
                $m_order = new m_checkout();
                $last_id = $m_order->insert_order($ma_dh, $ma_kh, $tong_tien, $phuong_thuc_thanh_toan, $ngay_thanh_toan, $trang_thai);
                if ($last_id) {
                    //            lấy thông tin chi tiết đơn hàng đẩy lên databases
                    foreach ($_SESSION['cart'] as $key => $value) :

                        $ma_sp = $value['id'];
                        $so_luong = $value['so_luong'];

                        $m_order_details = new m_checkout();
                        $details = $m_order_details->insert_order_details($last_id, $ma_sp, $so_luong);
                    endforeach;
                }

                echo "<script>window.location.href='order_history.php'</script>";
                unset($_SESSION['cart']);
            }
        }
        $view = "views/checkout/v_checkout.php";
        include_once("templates/layout.php");
    }
}
