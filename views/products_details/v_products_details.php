<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Chi Tiết Sản Phẩm</h1>
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li>Chi Tiết Sản Phẩm</li>
            </ul>
        </div>
    </div>
</div>


<div class="products-details-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-12">
                <div class="products-details-thumbs-image">
                    <ul class="products-details-thumbs-image-slides">
                        <li><img src="admin/public/imageproduct/<?php echo $review->hinh_anh; ?>" alt="image"></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="products-details-desc">
                    <h3><?php echo $review->ten_sp ?></h3>
                    <div class="price">
                        <span class="new-price"><?php echo number_format($review->gia_ban); ?> VNĐ</span>
                        <span class="old-price"><?php echo number_format($review->gia_ban + 100000); ?> VNĐ</span>
                    </div>
                    <div class="rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <form action="cart.php?action=add2&ma_sp=<?php echo $review->ma_sp; ?>" method="POST">
                        <div class="products-add-to-cart">
                            <div class="input-counter">
                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                <input type="text" value="1" name="so_luong" min="1" max="<?php echo $review->so_luong; ?>">
                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                            </div>
                            <button type="submit" class="default-btn" name="add_cart"><span>Thêm vào giỏ hàng</span></button>
                        </div>
                    </form>
                    <a href="#" class="add-to-wishlist"><i class='bx bx-heart'></i> Thêm vào danh sách yêu thích</a>
                    <ul class="products-info">
                        <li><span>Mã:</span> <?php echo $review->ma_sp; ?>.</li>
                        <li><span>Danh mục:</span> <?php echo $categories_product->ten_loai_sp; ?>.</li>
                        <li><span>Tồn kho:</span> <?php echo $review->so_luong ?> sản phẩm.</li>
                    </ul>
                    <div class="products-share">
                        <ul class="social">
                            <li><span>Chia sẻ:</span></li>
                            <li><a href="#" class="facebook" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="#" class="twitter" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                            <li><a href="#" class="linkedin" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            <li><a href="#" class="instagram" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="products-details-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false">Mô tả</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Bình luận</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <?php echo $review->thong_tin_them; ?>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="products-review-comments" id="comments-list">
                                <?php if (isset($comments) && !empty($comments)) :
                                    foreach ($comments as $index => $value) : ?>
                                        <div class="user-review">
                                            <span class="d-block sub-name"><?php echo $value->nguoi_tao ?></span>
                                            <p><?php echo $value->noi_dung ?></p>
                                        </div>
                                    <?php endforeach;
                                else : ?>
                                    <h2 id="no-comments" >Chưa có bình luận nào</h2>
                                <?php endif; ?>

                            </div>
                            <div class="review-form-wrapper">
                                <h3>Bình luận</h3>
                                <?php if (!isset($_SESSION['login'])) { ?>
                                    <p class="comment-notes">Hãy đăng nhập để bình luận <span>*</span></p>
                                <?php }else{ ?>
                                    <form action="" method="post" id="comment-form">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" value="<?php echo isset($_SESSION['login']) ? $_SESSION['login']->ho_ten: "" ?>" placeholder="Họ và tên *">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Nhập bình luận của bạn" name="comment" class="form-control" cols="30" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <button type="submit">Bình luận</button>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>