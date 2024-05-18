<?php

include("models/m_product.php");
@session_start();
class c_product
{



    public function addproduct()
    {

        $loai_sp = new m_product();
        $arr = $loai_sp->select_product_brands();


        if (isset($_POST['btn-submit'])) {
            $ma_sp = $_POST['ma_sp'];
            $m_banner = new m_product();

            $ma = $m_banner->select_product_by_id_product($ma_sp);

            if ($ma) {
                setcookie("error", "Mã đã tồn tại!!", time() + 1);
                header("location:add_product.php");
            } else {
                $ma_loai_sp = $_POST['ma_loai_sp'];

                $ten_sp = $_POST['ten_sp'];

                //lấy hình ảnh
                $hinh_sp = ($_FILES['f_hinh_anh']['error'] == 0) ? $_FILES['f_hinh_anh']['name'] : "";

                $so_luong = $_POST['so_luong'];
                $gia_ban = $_POST['gia_ban'];
                $thong_tin_them = $_POST['thong_tin'];
                $trang_thai = 1;

                $result = $m_banner->insert_product($ma_sp, $ma_loai_sp, $ten_sp, $hinh_sp, $so_luong, $gia_ban, $thong_tin_them, $trang_thai);

                if ($result) {
                    if ($hinh_sp != "") {

                        // kiểm tra xem đã có forder imageproduct chưa
                        $filename = "public/imageproduct";

                        if (!file_exists($filename)) {
                            //nếu chưa thì tạo forder mới
                            mkdir($filename,  0777,  TRUE);
                            move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], "public/imageproduct/" . $hinh_sp);
                        } else {
                            //di chuyển hình vào thư mục source
                            move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], "public/imageproduct/" . $hinh_sp);
                        }
                    }

                    setcookie("success", "Thêm mới thành công!!", time() + 1);
                    header("location:add_product.php");
                }
            }
        }
        $view = "views/product/v_add_product.php";
        include("templates/layout.php");
    }

    public function product()
    {
        $banner = new m_product();
        $product = $banner->select_product();

        $view = "views/product/v_product.php";
        include("templates/layout.php");
    }


    public function editproduct()
    {

        if (isset($_GET['ma_sp'])) {
            $ma_sp = $_GET['ma_sp'];
            $m_product = new m_product();
            $edit_product = $m_product->select_product_by_id_product($ma_sp);
            $loai_sp = new m_product();
            $arr = $loai_sp->select_product_brands();
            if (isset($_POST['btn-submit'])) {
                $ma_loai_sp = $_POST['ma_loai_sp'];
                $ten_sp     = $_POST['ten_sp'];
                $hinh_sp = $_FILES['f_hinh_anh']['error'] == 0 ? $_FILES['f_hinh_anh']['name'] : $edit_product->hinh_anh;
                $so_luong   = $_POST['so_luong'];
                $gia_ban    = $_POST['gia_ban'];
                $thong_tin_them = $_POST['thong_tin'];

                $m_product = new m_product();
                $result = $m_product->edit_product($ma_sp, $ma_loai_sp, $ten_sp, $hinh_sp, $so_luong, $gia_ban, $thong_tin_them);

                if ($result) {
                    if ($_FILES['f_hinh_anh']['error'] == 0) {
                        // kiểm tra xem đã có ảnh đấy trong file chưa
                        if (file_exists($_FILES['f_hinh_anh']['name'])) {
                            // nếu có thì xóa ảnh rồi thêm ảnh vào
                            unlink("public/imageproduct/" . $_FILES['f_hinh_anh']['name']);
                            move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], "public/imageproduct/" . $hinh_sp);
                        } else {
                            //di chuyển hình vào thư mục source
                            move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], "public/imageproduct/" . $hinh_sp);
                        }
                    }

                    setcookie("success", "Cập nhật thành công!!", time() + 1);
                } else {
                    setcookie("error", "Cập nhật bị lỗi!!", time() + 1);
                }
                header("location:list_product.php");
            }
        }

        $view = "views/product/v_edit_product.php";
        include("templates/layout.php");
    }

    public function deleteproduct()
    {
        if (isset($_GET['ma_sp'])) {
            $ma_sp = $_GET['ma_sp'];

            $m_product = new m_product();
            $product = $m_product->select_product_by_id_product($ma_sp);
            if ($product) {
                $m_product->delete_product($ma_sp);
                if(isset($_SESSION['cart'][$ma_sp])){
                    unset($_SESSION['cart'][$ma_sp]);
                    setcookie("reload", true, time()+1, "/");
                }
                setcookie("success", "Xóa sản phẩm thành công!!", time() + 1);
            } else {
                setcookie("success", "Xóa sản phẩm bị lỗi!!", time() + 1);
            }
            header("location:list_product.php");
        }
    }




    // LOẠI SẢN PHẨM
    public function add_product_brands()
    {
        if (isset($_POST['btn-submit'])) {
            $ma_loai = $_POST['ma_loai'];
            $ten_loai_sp = $_POST['ten_loai_sp'];
            $m_type = new m_product();
            if ($m_type->select_product_brands_by_id($ma_loai)) {
                setcookie("error", "Mã đã tồn tại!!", time() + 2);
                header("location:add_product_brands.php");
            } else {
                $m_type->add_product_brands($ma_loai, $ten_loai_sp);
                setcookie("success", "Thêm mới thành công!!", time() + 1);
                header("location:product_brands.php");
            }
        }

        $view = "views/brands/v_add_product_brands.php";
        include("templates/layout.php");
    }

    public function show_product_brands()
    {

        $show = new m_product();
        $show_type = $show->select_product_brands();

        $view = "views/brands/v_product_brands.php";
        include("templates/layout.php");
    }
    // Xóa thương hiệu sản phẩm
    public function delete_product_brands()
    {
        // Kiểm tra mã thương hiệu có không
        if (isset($_GET['ma_loai'])) {
            $ma_loai = $_GET['ma_loai'];
            $m_product = new m_product();
            // Kiểm tra mã thương hiệu không liên kết với sản phẩm nào thì xóa còn ngược lại thì báo lỗi
            if (count($m_product->find_product_by_category($ma_loai)) > 0) {
                setcookie("error", "Thương hiệu này đang được sử dụng!!", time() + 1);
            } else {
                $m_product->delete_product_brands($ma_loai);
                setcookie("success", "Xóa sản thành công!!", time() + 1);
            }
            header("location:product_brands.php");
        }
    }
    // Sửa thông tin thương hiệu sản phẩm
    public function edit_product_brands()
    {

        if (isset($_GET['ma_loai'])) {
            $ma_loai = $_GET['ma_loai'];
            $m_product = new m_product();
            $edit_typeproduct = $m_product->select_product_brands_by_id($ma_loai);

            if (isset($_POST['btn-submit'])) {
                $ten_loai_sp = $_POST['ten_loai_sp'];

                $insert = new m_product();
                $insert->edit_product_brands($ma_loai, $ten_loai_sp);
                setcookie("success", "Cập thương hiệu thành công!!", time() + 1);
                header("location:product_brands.php");
            }
        }
        $view = "views/brands/v_edit_product_brands.php";
        include("templates/layout.php");
    }
}
