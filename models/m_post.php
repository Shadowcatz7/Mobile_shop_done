<?php
include "database.php";
class m_postC extends database {

    public function getAllPost() {
        $sql = "SELECT * FROM bai_viet where trang_thai = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function getPostById($ma_bv){
        $sql = "SELECT * FROM bai_viet where ma_bv = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_bv));
    }

}
?>