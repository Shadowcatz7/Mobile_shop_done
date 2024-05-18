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
        <form>
            <div class="patoi-grid-sorting row align-items-center">
                <div class="col-lg-6 col-md-6 result-count">
                    <div class="d-flex align-items-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#productsFilterModal" class="sidebar-filter"><i class='bx bx-filter-alt'></i> Bộ lọc</a>
                        <p>Tinfm thấy <span class="count"><?php echo $item_per_page_new; ?></span> sản phẩm</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 ordering">
                    <div class="select-box">
                        <label>Sắp xếp theo:</label>
                        <select name="xap_xep">
                            <option value="high">Giá từ thấp đến cao</option>
                            <option value="low">Giá từ cao đến thấp</option>
                            <option value="hot">Bán chạy nhất</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="patoi-grid-sorting row align-items-center">
            <?php if ($search != NULL) { ?>
                <div class="row justify-content-center">
                    <?php
                    //            var_dump($search);
                    foreach ($search as $key => $value) : ?>

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
                    <?php endforeach; ?>
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            <div class="nav-links">
                                <a href="search.php?page=<?php echo 1; ?>" class="previous page-numbers" title="Next Page"><i class='bx bx-chevrons-left'></i></a>
                                <?php for ($i = 0; $i < $max_page; $i++) : ?>
                                    <a href="search.php?page=<?php echo ($i + 1); ?>" class="page-numbers"><?php echo ($i + 1); ?></a>
                                <?php endfor; ?>
                                <a href="search.php?page=<?php echo $max_page; ?>" class="next page-numbers" title="Next Page"><i class='bx bx-chevrons-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {  ?>
                <h3>No product!!</h3>
            <?php } ?>
        </div>
    </div>