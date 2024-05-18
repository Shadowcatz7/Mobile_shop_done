<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
include("models/m_product.php");
class c_products_details
{
    public function product_details()
    {
        // Lấy mã sp từ url rồi truy vấn đến db
        $product = new m_product();
        if (isset($_GET['ma_sp'])) {
            $ma_sp = $_GET['ma_sp'];
            $review = $product->select_product_by_id_product($ma_sp);
            $categories_product = $product->read_type_product_by_id($ma_sp);
            $comments = $product->get_all_comment_by_product_id($ma_sp);

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment']) && isset($_POST['name'])) {
                header('Content-Type: application/json');
                $ma_bv = NULL;
                $noi_dung = $_POST['comment'];
                $nguoi_tao = $_POST['name'];
                $ngay_tao = date('Y-m-d H:i:s');

                if ($nguoi_tao === null) {
                    echo json_encode(['success' => false, 'error' => 'Chưa đăng nhập.']);
                    return;
                }

                $comment = $product->insert_comment($ma_sp, $ma_bv, $noi_dung, $nguoi_tao, $ngay_tao);

                if ($comment) {
                    $response['success'] = true;
                    $response['comment'] = [
                        'ho_ten' => $nguoi_tao,
                        'noi_dung' => htmlspecialchars($noi_dung)
                    ];
                } else {
                    $response['success'] = false;
                    $response['error'] = 'Failed to insert comment.';
                }

                echo json_encode($response);
                return;
            }
        }
        $view = "views/products_details/v_products_details.php";
        include("templates/layout.php");
    }
}
