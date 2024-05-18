<?php
require_once ("database.php");
class m_product extends database {
    // lấy thông tin sp trên database
    public function read_product() {
        $sql = "SELECT * FROM san_pham where trang_thai_sp = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function read_product_by_type_id($type_id){
        $sql = "SELECT * FROM san_pham WHERE trang_thai_sp = 1 and ma_loai_sp = '$type_id'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function read_product_by_name($tu_khoa) {
        $sql = "SELECT * FROM san_pham where trang_thai_sp = 1 and ten_sp like '%$tu_khoa%'";
        $this->setQuery($sql);
        return $this->LoadAllRows();
    }

    public function read_product_search_by_page($tu_khoa,$item_per_page,$offset) {
        $sql = "SELECT * FROM san_pham where trang_thai_sp = 1 and ten_sp like '%$tu_khoa%' limit $item_per_page offset $offset";
        $this->setQuery($sql);
        return $this->LoadAllRows();
    }

    // phân trang
    public  function read_product_by_page($item_per_page,$offset) {
        $sql = "SELECT * FROM san_pham where trang_thai_sp = 1 LIMIT $item_per_page OFFSET $offset";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public  function read_product_type_by_page($type_id,$item_per_page,$offset) {
        $sql = "SELECT * FROM san_pham WHERE trang_thai_sp = 1 and ma_loai_sp = '$type_id' LIMIT $item_per_page OFFSET $offset ";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // lấy thông tin thương hiệu sp trên database
    public function read_type_product() {
        $sql = "SELECT * FROM loai_sp";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // lấy thông tin sp trên db
    public function select_product_by_id_product($ma_sp) {
        $sql = "SELECT * FROM san_pham where ma_sp = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_sp));
    }

     // lấy thông tin thương hiệu sp voi id san pham
     public function read_type_product_by_id($ma_sp) {
        $sql = "select loai_sp.ten_loai_sp from san_pham inner join loai_sp on san_pham.ma_loai_sp = loai_sp.ma_loai where ma_sp = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_sp));
    }

    // Thêm bình luận
    public function insert_comment($ma_sp, $ma_bv, $noi_dung, $nguoi_tao, $ngay_tao)
    {
        $sql = "INSERT INTO `binh_luan`(`ma_sp`, `ma_bv`, `noi_dung`, `nguoi_tao`, `ngay_tao`) VALUES (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($ma_sp, $ma_bv, $noi_dung, $nguoi_tao, $ngay_tao));
    }

    // lấy bình luận
    public function get_all_comment_by_product_id($ma_sp)
    {
        $sql = "SELECT *
        FROM binh_luan 
        WHERE ma_sp = ?
        ORDER BY ngay_tao DESC;
        ";
        $this->setQuery($sql);
        return $this->loadAllRows(array($ma_sp));
    }
}
?>