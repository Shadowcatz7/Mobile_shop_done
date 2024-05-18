<?php
include("models/m_post.php");
class c_postC
{

    public function index()
    {
        $model = new m_postC();
        $posts = $model->getAllPost();

        $view = "views/post/v_post.php";
        include("templates/layout.php");
    }

    public function show()
    {
        if(isset($_GET['ma_bv'])){
            $model = new m_postC();
            $post = $model->getPostById($_GET['ma_bv']);
        }else{
            header("location:post.php");
        }

        $view = "views/post/v_post_detail.php";
        include("templates/layout.php");
    }
}