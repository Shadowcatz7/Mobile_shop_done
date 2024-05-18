<?php 
// kiểm tra nếu chưa chạy session_start() thì sẽ chạy session_start()
if ((function_exists('session_status') && session_status() !== PHP_SESSION_ACTIVE) || !session_id()) {
session_start();
}
?>
<body>

    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <p>Miễn phí giao hàng  với đơn hàng đầu tiên</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="search-box">
                        <form action="shop.php" method="POST">
                            <input type="text" class="input-search" id="tk" placeholder="Nhập tên sản phẩm..." name="tu_khoa">
                            <button type="submit" id="search" name="tim_kiem"><i class='bx bx-search'></i></button>
                        </form>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <ul>
                        <li><a href="https://www.facebook.com/shadowcatz77/" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                        <li><a href="#" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="patoi-responsive-nav">
            <div class="container">
                <div class="patoi-responsive-menu">
                    <div class="logo">
                        <a href="index.php"><img src="public/img/logo.png" alt="logo"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="patoi-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.php"><img src="public/img/logo.png" alt="logo" width="260"></a>
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="index.php?index" class=" nav-link <?php echo isset($_GET['index']) ? "active" : " "; ?>">TRANG CHỦ</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="shop.php?shop" class=" nav-link <?php echo isset($_GET['shop']) ? "active" : " "; ?>">SẢN PHẨM</a>
                            </li>

                            <li class="nav-item">
                                <a href="about_us.php?about_us" class="nav-link <?php echo isset($_GET['about_us']) ? "active" : " "; ?>">GIỚI THIỆU</a>
                            </li>

                            <li class="nav-item">
                                <a href="post.php?post" class="nav-link <?php echo isset($_GET['post']) ? "active" : " "; ?>">TIN TỨC</a>
                            </li>

                            <li class="nav-item"><a href="contact.php?contact" class="nav-link <?php echo isset($_GET['contact']) ? "active" : " "; ?>">LIÊN HỆ</a></li>
                        </ul>
                        <div class="others-option">
                            <div class="d-flex align-items-center">
                                <ul>
                                    <li><a href="user.php?user"><i class='bx bx-user-circle'></i></a></li>
                                    <?php if(!empty($_SESSION['cart'])) :
                                        $so = sizeof($_SESSION['cart']);
                                        $css = " ";
                                    else:
                                    $so = 0;
                                    $css = "display: none;";
                                    endif;?>
                                    <li><a href="cart.php"><i class='bx bx-cart'></i><span style="<?php echo $css;?> padding: 2px 6px; font-weight: 500; font-size: 14px; background-color: #f87171; border-radius: 50%;"><?php echo $so;?></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-option">
                            <ul>
                                <li><a href="profile-authentication.php"><i class='bx bx-user-circle'></i></a></li>
                                <li><a href="cart.php"><i class='bx bx-cart'></i><span style=" padding: 2px 6px; font-weight: 500; font-size: 14px; background-color: red; border-radius: 50%;">1</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>