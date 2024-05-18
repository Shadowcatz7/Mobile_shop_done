<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Tin tức</h1>
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li>Tin tức</li>
            </ul>
        </div>
    </div>
</div>


<div class="blog-area ptb-100">
    <div class="container">
        <div class="row">
            <?php if (isset($posts) && count($posts) > 0) :
                foreach ($posts as $index => $value) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="image" style="height: 230px;">
                                <a href="post_detail.php?ma_bv=<?php echo $value->ma_bv ?>" class="d-block">
                                    <img src="admin/<?php echo $value->anh_tieu_de ?>" alt="blog-image">
                                </a>
                            </div>
                            <div class="content">
                                <span class="date">
                                    <span><?php echo $value->ngay_tao ?></span>
                                </span>
                                <a href="#" class="category">Admin</a>
                                <h3><a href="post_detail.php?ma_bv=<?php echo $value->ma_bv ?>"><?php echo $value->tieu_de ?></a></h3>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
            else : ?>
                <h2>Chưa có bài viết nào.</h2>
            <?php
            endif; ?>

        </div>
    </div>
</div>