<div class="main-banner-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="main-banner-content">
                    <span class="sub-title">Chào mừng đến với cửa hàng di động số 1 tại Việt Nam</span>
                    <h1>Chúng tôi cung cấp các sản phẩm tốt nhất</h1>
                    <p>Giảm giá 100% cho đơn hàng đầu tiên của bạn</p>
                    <a href="shop.php?shop" class="default-btn"><span>Xem ngay</span></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="main-banner-image">
                    <img src="public/img/banner/banner1.png" alt="banner-image">
                    <img src="public/img/banner/banner2.png" alt="banner-image" width="300px">
                    <!-- <img src="public/img/banner/banner3.png" alt="banner-image"> -->
                </div>
            </div>
        </div>
    </div>
</div>


<div class="offer-area pt-100 pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="single-offer-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/offer/offer1.jpg" alt="offer-image">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-offer-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/offer/offer2.jpg" alt="offer-image" width="100%">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-offer-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/offer/offer3.jpg" alt="offer-image" width="100%">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="brands-area pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Ưu đãi khi thanh toán</h2>
        </div>
        <div class="brands-slides owl-carousel owl-theme">
            <div class="single-brands-box">
                <a href="shop.php?shop" class="d-block">
                    <img src="public/img/brands/brands1.jpg" alt="brands-image">
                     
                </a>
            </div>
            <div class="single-brands-box">
                <a href="shop.php?shop" class="d-block">
                    <img src="public/img/brands/brands2.jpg" alt="brands-image">
                   
                </a>
            </div>
            <div class="single-brands-box">
                <a href="shop.php?shop" class="d-block">
                    <img src="public/img/brands/brands3.jpg" alt="brands-image">
                    
                </a>
            </div>
            <div class="single-brands-box">
                <a href="shop.php?shop" class="d-block">
                    <img src="public/img/brands/brands4.jpg" alt="brands-image">
                    
                </a>
            </div>
            <div class="single-brands-box">
                <a href="shop.php?shop" class="d-block">
                    <img src="public/img/brands/brands5.jpg" alt="brands-image">
                    
                </a>
            </div>
            <div class="single-brands-box">
                <a href="shop.php?shop" class="d-block">
                    <img src="public/img/brands/brands6.jpg" alt="brands-image">
                    
                </a>
            </div>
        </div>
    </div>
</div>

<div class="products-area pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Sản Phẩm</h2>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($product as $key => $value) :
                if ($key < 8) :
            ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-products-box">
                            <div class="image">
                                <a   onclick="window.location.href='products_details.php?action=add1&&ma_sp=<?php echo $value->ma_sp; ?>'" class="d-block">
                                    <img   src="admin/public/imageproduct/<?php echo $value->hinh_anh ?>" alt="products-image">
                                </a>
                                <?php
                                if ($value->so_luong == 0) {
                                    $css = "sold";
                                    $tt = "Sold!";
                                } else {
                                    if ($value->trang_thai_sp == 0) {
                                        $css = "sold";
                                        $tt = "Sold!";
                                    } else {
                                        $css = "";
                                        $tt = "";
                                    }
                                }
                                ?>
                                <span class="<?php echo $css; ?>"><?php echo $tt; ?></span>
                                <ul class="products-button">
                                    <li><a onclick="window.location.href='cart.php?ma_sp=<?php echo $value->ma_sp; ?>'"><i class='bx bx-cart-alt'></i></a></li>
                                    <!--                            <li><a href="wishlist.php"><i class='bx bx-heart'></i></a></li>-->
                                    <!--                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class='bx bx-show'></i></a></li>-->
                                    <li><a onclick="window.location.href='products_details.php?ma_sp=<?php echo $value->ma_sp; ?>'"><i class='bx bx-link-alt'></i></a></li>
                                </ul>
                            </div>
                            <div class="content">
                                <h3><a onclick="window.location.href='products_details.php?ma_sp=<?php echo $value->ma_sp; ?>'"><?php echo $value->ten_sp ?></a></h3>
                                <div class="price">
                                    <span class="new-price"><?php echo number_format($value->gia_ban) ?> VND</span>
                                </div>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php else : echo "  ";
                endif;
            endforeach; ?>
        </div>
    </div>
</div>


<div class="offer-area pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="single-offer-box">
                    <a href="shop.php" class="d-block">
                        <img src="public/img/offer/offer4.jpg" alt="offer-image">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="single-offer-box">
                    <a href="shop.php" class="d-block">
                        <img src="public/img/offer/offer5.jpg" alt="offer-image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="products-area pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Sản phẩm mới</h2>
        </div>
        <div class="products-slides owl-carousel owl-theme">
            <?php foreach ($product as $key => $value) :
                if ($key < 6) :
            ?>
                    <div class="single-products-box">
                        <div class="image">
                            <a   onclick="window.location.href='products_details.php?action=add1&&ma_sp=<?php echo $value->ma_sp; ?>'" class="d-block">
                                <img   src="admin/public/imageproduct/<?php echo $value->hinh_anh ?>" alt="products-image">
                            </a>
                            <?php
                            if ($value->so_luong == 0) {
                                $css = "sold";
                                $tt = "Sold!";
                            } else {
                                if ($value->trang_thai_sp == 0) {
                                    $css = "sold";
                                    $tt = "Sold!";
                                } else {
                                    $css = "";
                                    $tt = "";
                                }
                            }
                            ?>
                            <span class="<?php echo $css; ?>"><?php echo $tt; ?></span>
                            <ul class="products-button">
                                <li><a onclick="window.location.href='cart.php?ma_sp=<?php echo $value->ma_sp; ?>'"><i class='bx bx-cart-alt'></i></a></li>
                                <!--                            <li><a href="wishlist.php"><i class='bx bx-heart'></i></a></li>-->
                                <!--                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#productsQuickView"><i class='bx bx-show'></i></a></li>-->
                                <li><a onclick="window.location.href='products_details.php?ma_sp=<?php echo $value->ma_sp; ?>'"><i class='bx bx-link-alt'></i></a></li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3><a onclick="window.location.href='products_details.php?ma_sp=<?php echo $value->ma_sp; ?>'"><?php echo $value->ten_sp ?></a></h3>
                            <div class="price">
                                <span class="new-price"><?php echo number_format($value->gia_ban) ?> VND</span>
                            </div>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                        </div>
                    </div>
            <?php else : echo "  ";
                endif;
            endforeach; ?>
        </div>
    </div>
</div>


<div class="offer-area pb-75">
    <div class="container">
        <div class="single-offer-box">
            <a href="shop.php" class="d-block">
                <img src="public/img/offer/offer6.jpg" alt="offer-image">
            </a>
        </div>
    </div>
</div>


<div class="brands-area pb-75">
    <div class="container">
        <div class="section-title">
            <h2>Thương Hiệu Hàng Đầu</h2>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="single-brands-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/brands/brands1.png" alt="brands">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="single-brands-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/brands/brands2.png" alt="brands">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="single-brands-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/brands/brands3.png" alt="brands">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="single-brands-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/brands/brands4.png" alt="brands">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="single-brands-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/brands/brands5.png" alt="brands">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-4">
                <div class="single-brands-box">
                    <a href="shop.php?shop" class="d-block">
                        <img src="public/img/brands/brands6.png" alt="brands">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="facility-area pb-75">
    <div class="container">
        <div class="facility-inner">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="public/img/icon/icon1.png" alt="icon">
                        <h3>Sản phẩm chất lượng </h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="public/img/icon/icon2.png" alt="icon">
                        <h3>Giao hàng nhanh </h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="public/img/icon/icon3.png" alt="icon">
                        <h3>Hỗ trợ 24/7</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-facility-box">
                        <img src="public/img/icon/icon4.png" alt="icon">
                        <h3>Thanh toán an toàn </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>