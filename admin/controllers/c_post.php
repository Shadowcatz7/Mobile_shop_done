<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include("models/m_post.php");
@session_start();
class c_post
{
    public function index(){
        $model = new m_post();
        $post = $model->getAllPost();

        if (isset($_GET['ma_bv']) && isset($_GET['delete'])) {
            $ma_bv = $_GET['ma_bv'];

            $model = new m_post();
            $post = $model->getPostById($ma_bv);
            if ($post) {
                $model->deletePost($ma_bv);
                setcookie("success", "Xóa thành công!!", time() + 2);
            } else {
                setcookie("error", "Sửa bị lỗi!!", time() + 2);
                header("location:list_post.php");
            }
            header("location:list_post.php");
        }

        $view = "views/post/v_post.php";
        include("templates/layout.php");
    }

    public function create(){
        if(isset($_POST['btn-submit'])){
            $title = isset($_POST['title']) ? $_POST['title']: "";
            $content = isset($_POST['content']) ? $_POST['content']: "";
            $status = isset($_POST['status']) ? $_POST['status']: 0;
            $create_date = date('Y-m-d H:i:s');
            $img = ($_FILES['f_hinh_anh']['error'] == 0) ? $_FILES['f_hinh_anh']['name'] : "";
            if ($img != "") {

                // kiểm tra xem đã có forder imageproduct chưa
                $filename = "public/posts";
                $path =  $filename . "/". $img;
                if (!file_exists($filename)) {
                    //nếu chưa thì tạo forder mới
                    mkdir($filename,  0777,  TRUE);
                    move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], $path);
                } else {
                    //di chuyển hình vào thư mục source
                    move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], $path);
                }
            }else{
                $path="";
            }
            if($title != "" && $content != ""){
                $model = new m_post();
                $result = $model->insertPost($title, $path, $content, $create_date, $status);
                if ($result) {
                    setcookie("success", "Thêm mới thành công!!", time() + 1);
                    header("location:add_post.php");
                }else{
                    setcookie("error", "Thêm không thành công", time() + 1);
                    // header("location:add_post.php");
                }
            }
        }

        $view = "views/post/v_add_post.php";
        include("templates/layout.php");
    }

    public function edit(){
        if (isset($_GET['ma_bv']) && isset($_GET['edit'])) {
            $ma_bv = $_GET['ma_bv'];

            $model = new m_post();
            $post = $model->getPostById($ma_bv);
            if (!$post)  {
                setcookie("error", "Sửa bị lỗi!!", time() + 2);
                header("location:list_post.php");
            }
        }
        if(isset($_POST['btn-submit'])){
            $id = isset($_POST['id']) ? $_POST['id']: $post->ma_bv;
            $title = isset($_POST['title']) ? $_POST['title']: $$post->tieu_de;
            $content = isset($_POST['content']) ? $_POST['content']: $post->noi_dung;
            $status = isset($_POST['status']) ? $_POST['status']: 0;
            $img = $_FILES['f_hinh_anh']['error'] == 0 ? $_FILES['f_hinh_anh']['name'] : "";
            if ($img != 0) {
                $filename = "public/posts";
                $path =  $filename . "/". $img;
                // kiểm tra xem đã có ảnh đấy trong file chưa
                if (file_exists($_FILES['f_hinh_anh']['name'])) {
                    // nếu có thì xóa ảnh rồi thêm ảnh vào
                    
                    unlink($filename . $_FILES['f_hinh_anh']['name']);
                    move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], $path);
                } else {
                    //di chuyển hình vào thư mục source
                    move_uploaded_file($_FILES['f_hinh_anh']['tmp_name'], $path);
                }
            }else{
                $path = $post->anh_tieu_de;
            }
            if($title != "" && $content != ""){
                $model = new m_post();
                $result = $model->editPost($id, $title,$path , $content, $status);
                if ($result) {
                    setcookie("success", "Thêm mới thành công!!", time() + 1);
                }else{
                    setcookie("error", "Thêm không thành công", time() + 1);
                }
                header("location:list_post.php");
            }
        }

        $view = "views/post/v_edit_post.php";
        include("templates/layout.php");
    }

}