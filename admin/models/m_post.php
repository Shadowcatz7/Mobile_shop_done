<?php
require_once "../models/database.php";
class m_post extends database
{

    public function getAllPost(){
        $sql = "SELECT * FROM bai_viet";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function insertPost( $tieu_de,$anh_tieu_de, $noi_dung, $ngay_tao, $trang_thai)
    {
        $sql = "INSERT INTO `bai_viet`( `tieu_de`, `anh_tieu_de`, `noi_dung`, `trang_thai`, `ngay_tao`) values (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute1(array($tieu_de,$anh_tieu_de, $noi_dung, $trang_thai, $ngay_tao));
    }

    public function getPostById($ma_bv){
        $sql = "SELECT * FROM bai_viet where ma_bv = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_bv));
    }

    public function deletePost($ma_sp)
    {
        $sql = "DELETE FROM bai_viet WHERE ma_bv = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_sp));
    }

    public function editPost($ma_bv, $tieu_de, $anh_tieu_de, $noi_dung, $trang_thai)
    {
        $sql = "UPDATE `bai_viet` SET `tieu_de` = ? ,`anh_tieu_de` = ?,  `noi_dung` = ? ,`trang_thai` = ?  WHERE `ma_bv` = ?";
        $this->setQuery($sql);
        return $this->execute1(array($tieu_de, $anh_tieu_de, $noi_dung, $trang_thai, $ma_bv));
    }
}