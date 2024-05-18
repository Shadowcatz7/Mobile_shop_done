<?php
require_once "../models/database.php";
class m_customer extends database {
//    lấy thông tin tài khoản
    public function select_account() {
        $sql = "SELECT * FROM  nguoi_dung where role = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
// lấy thong tin khách hang
    public function select_information($ma_kh) {
        $sql = "SELECT * FROM nguoi_dung where id = ? ";
        $this->setQuery($sql);
        return $this->loadAllRows(array($ma_kh));
    }

//    khóa mở tài khoản
    public function unlock_account($ma_kh,$trang_thai) {
        $sql = "UPDATE nguoi_dung SET trang_thai = ? WHERE nguoi_dung.id = ?";
        $this->setQuery($sql);
        return $this->execute(array($trang_thai,$ma_kh));
    }
// xóa thông tin kh
    public function delete_customer_by_id($ma_kh) {
        $sql = "delete from nguoi_dung where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_kh));
    }
    // xóa tk
    public function delete_tk_by_id($ma_kh) {
        $sql = "delete from nguoi_dung where id = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_kh));
    }
}
?>