<?php
require_once "../models/database.php";

class m_order extends database {
    // hủy đơn hàng
    public function cancel_order($ma_dh){
        $sql = "UPDATE `don_hang` SET `trang_thai`= 2 WHERE `ma_dh`= ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_dh));
    }

//    lấy dữ liệu đơn hàng
    public function select_order() {
        $sql = "SELECT don_hang.*, nguoi_dung.ho_ten FROM don_hang 
                inner join nguoi_dung 
                on don_hang.ma_kh = nguoi_dung.id";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

//    xóa đơn hàng
    public function delete_order_by_id($ma_dh) {
        $sql = "delete from don_hang where ma_dh = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_dh));
    }
//    xóa chi tiết đơn hàng đơn hàng
    public function delete_order_details_by_id($ma_dh) {
        $sql = "delete from ct_don_hang where ma_dh = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_dh));
    }

    // lấy thông tin chi tiết hóa đơn
    public function select_order_details($ma_dh) {
        $sql = "select san_pham.ten_sp, san_pham.hinh_anh, ct_don_hang.so_luong, san_pham.gia_ban 
                from ct_don_hang 
                inner join san_pham 
                on ct_don_hang.ma_sp = san_pham.ma_sp 
                where ct_don_hang.ma_dh = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($ma_dh));
    }

    // lấy trạng thái theo  đơn hàng
    public function select_status($ma_dh) {
        $sql = "select trang_thai from don_hang where ma_dh = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_dh));
    }
   
}

?>