<?php
require_once "../models/database.php";
class m_product extends database
{

    //    thêm sản phẩm
    public function insert_product($ma_sp, $ma_loai_sp, $ten_sp, $hinh_anh, $so_luong, $gia_ban, $thong_tin_them, $trang_thai)
    {
        $sql = "insert into san_pham values (?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($ma_sp, $ma_loai_sp, $ten_sp, $hinh_anh, $so_luong, $gia_ban, $thong_tin_them, $trang_thai));
    }
    
    //    lấy thông tin của 2 bảng sản phẩm và loại sp
    public function select_product()
    {
        $sql = "select *
                from san_pham 
                inner join loai_sp 
                on san_pham.ma_loai_sp = loai_sp.ma_loai where san_pham.trang_thai_sp = 1";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    //    lấy thông tin theo mã sp
    public function select_product_by_id_product($ma_sp)
    {
        $sql = "SELECT * FROM san_pham where ma_sp = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_sp));
    }

   
    //    sửa sản phẩm
    public function edit_product($ma_sp, $ma_loai_sp, $ten_sp, $hinh_anh, $so_luong, $gia_ban, $thong_tin_them)
    {
        $sql = "update  san_pham set ma_loai_sp = ?, ten_sp = ? , hinh_anh = ?, so_luong = ?, gia_ban = ?, thong_tin_them = ?
                where ma_sp = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_loai_sp, $ten_sp, $hinh_anh, $so_luong, $gia_ban, $thong_tin_them, $ma_sp));
    }

    //    xóa sản phẩm
    public function delete_product($ma_sp)
    {
        $sql = "update san_pham set trang_thai_sp = 0 where ma_sp = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_sp));
    }

    //    lấy thương hiệu sản phẩm
    public function select_product_brands()
    {
        $sql = "SELECT * FROM loai_sp";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    //    them loại sản phẩm
    public function add_product_brands($ma_loai, $ten_loai_sp)
    {
        $sql = "insert into loai_sp values (?,?)";
        $this->setQuery($sql);
        return $this->execute(array($ma_loai, $ten_loai_sp));
    }

    //    xóa loại sp
    public function delete_product_brands($ma_loai)
    {
        $sql = "delete from loai_sp where ma_loai = ?";
        $this->setQuery($sql);
        return $this->execute(array($ma_loai));
    }

    //    lấy loại sản phẩm theo mã
    public function select_product_brands_by_id($ma_loai)
    {
        $sql = "SELECT * FROM loai_sp where ma_loai = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($ma_loai));
    }

    //    sửa loại sp theo mã
    public function edit_product_brands($ma_loai, $ten_loai_sp)
    {
        $sql = "update loai_sp set ten_loai_sp = ? where ma_loai = ? ";
        $this->setQuery($sql);
        return $this->execute(array($ten_loai_sp, $ma_loai));
    }

    // tìm sản phẩm theo mã loại
    public function find_product_by_category($ma_loai)
    {
        $sql = "SELECT * FROM san_pham where ma_loai_sp = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($ma_loai));
    }
}
