<?php
include("models/m_product.php");
class c_shop
{

    // Cửa hàng
    public function shop()
    {
        // Lấy dữ liệu từ database
        $m_product = new m_product();
        if (isset($_GET['type'])) {
            $type_id = $_GET['type'];
            $product_add = $m_product->read_product_by_type_id($type_id);
        } elseif(isset($_POST['tim_kiem'])){
            $tu_khoa = $_POST['tu_khoa'];
            $product_add = $m_product->read_product_by_name($tu_khoa);
        } else {
            $product_add = $m_product->read_product();
        }
        $type = $m_product->read_type_product();

        // Phân trang
        $item_per_page = 8;
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $max_page = ceil(sizeof($product_add) / $item_per_page);
        if (isset($_GET['type'])) {
            $type_id = $_GET['type'];
            $product = $m_product->read_product_type_by_page($type_id, $item_per_page, $offset);
        }elseif(isset($_POST['tim_kiem'])){
            $tu_khoa = $_POST['tu_khoa'];
            $product = $m_product->read_product_search_by_page($tu_khoa, $item_per_page, $offset);
        } else {
            $product = $m_product->read_product_by_page($item_per_page, $offset);
        }
        
        $item_per_page_new = sizeof($product) < $item_per_page ? sizeof($product) : $item_per_page;

        // đổ dữ liệu vào trang shop
        $view = "views/shop/v_shop.php";
        include("templates/layout.php");
    }
}
