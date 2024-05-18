<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h1>Sản Phẩm</h1>
            <ul>
                <li><a href="index.php">Trang Chủ</a></li>
                <li>Sản Phẩm</li>
            </ul>
        </div>
    </div>
</div>


<div class="products-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <aside class="widget-area">
                    <div class="widget widget_brands">
                        <h3 class="widget-title"><span>Thương hiệu Sản Phẩm</span></h3>
                        <ul style="list-style-type: none;">
                            <?php for($i=0; $i < count($type);$i++){ ?>
                            <li><a href="shop.php?shop&type=<?php echo $type[$i]->ma_loai ?>"><?php echo $type[$i]->ten_loai_sp ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="patoi-grid-sorting row align-items-center">
                    <div class="col-lg-6 col-md-6 result-count">
                        <div class="d-flex align-items-center">
                            <p>Có <span class="count"><?php echo $item_per_page_new; ?></span> sản phẩm</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <?php foreach ($product as $key => $value) : ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-products-box">
                                <div class="image">
                                    <a onclick="window.location.href='products_details.php?action=add1&&ma_sp=<?php echo $value->ma_sp; ?>'">
                                        <img src="admin/public/imageproduct/<?php echo $value->hinh_anh ?>" alt="products-image">
                                    </a>
                                    <?php
                                    if ($value->so_luong == 0) {
                                        $css = "sold";
                                        $tt = "Sold!";
                                    } else {
                                        $css = "";
                                        $tt = "";
                                    }
                                    ?>
                                    <span class="<?php echo $css; ?>"><?php echo $tt; ?></span>
                                    <ul class="products-button">
                                        <li><a onclick="window.location.href='cart.php?ma_sp=<?php echo $value->ma_sp; ?>'"><i class='bx bx-cart-alt'></i></a></li>
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
                    <?php endforeach; ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            <div class="nav-links">
                                <a href="shop.php?page=<?php echo 1; ?>" class="previous page-numbers" title="Next Page"><i class='bx bx-chevrons-left'></i></a>
                                <?php for ($i = 0; $i < $max_page; $i++) : ?>
                                    <a href="shop.php?page=<?php echo ($i + 1); ?>" class="page-numbers"><?php echo ($i + 1); ?></a>
                                <?php endfor; ?>
                                <a href="shop.php?page=<?php echo $max_page; ?>" class="next page-numbers" title="Next Page"><i class='bx bx-chevrons-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>