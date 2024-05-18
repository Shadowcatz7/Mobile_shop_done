<?php
include_once ("../admin/models/m_order.php");
@session_start();
class c_order {

    public function order() {

        $m_order = new m_order();
        $list_order = $m_order->select_order();

        $view = "views/order/v_order.php";
        include_once "templates/layout.php";
    }

    public function delete_order() {
        if(isset($_GET['ma_dh'])) {
            $ma_dh = $_GET['ma_dh'];

            $m_order = new m_order();
            $delete = $m_order->delete_order_by_id($ma_dh);

            $delete_details = $m_order->delete_order_details_by_id($ma_dh);
            if($delete && $delete_details) {
                $_SESSION['alert_delete_order'] = "Xóa thành công đơn hàng số ".$ma_dh;
                echo "<script> window.location.href='order.php'</script>";
            }
        }
    }

    public function order_details() {
        if(isset($_GET['ma_dh'])) {
            $ma_dh = $_GET['ma_dh'];

            $m_order = new m_order();
            $details  = $m_order->select_order_details($ma_dh);

            $view = "views/order/v_order_details.php";
            include_once "templates/layout.php";
        }
    }


    public function cancel_order(){
        if(isset($_GET['ma_dh'])) {
            if(isset($_GET['action'])) {
                if($_GET['action'] == "delete") {
                    
                    $ma_dh = $_GET['ma_dh'];
                    $m_order = new m_order();
                    $cancel = $m_order->cancel_order($ma_dh);
                    if($cancel) {
                        $_SESSION['alert_delete_order'] = "Hủy thành công đơn hàng số ".$ma_dh;
                        echo "<script> window.location.href='order.php'</script>";
                    }
                }
            }


        }
    }

}
?>