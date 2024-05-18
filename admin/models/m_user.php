<?php
require_once "../models/database.php";
class m_user extends database
{
    public function read_user_by_id_pass($username,$password) {
        $sql = "SELECT * FROM nguoi_dung where ten_dang_nhap = ? and mat_khau = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($username,md5($password)));
    }
}
?>