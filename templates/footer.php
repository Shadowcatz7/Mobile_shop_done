<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <ul class="footer-contact-info">
                        <li><span>Hotline:</span> <a href="tel:(+84) 88913062">09888913062</a></li>
                        <li><span>Hỗ trợ kỹ thuật:</span> <a href="tel:(+84) 3242162">0908324213</a></li>
                        <li><span>Email:</span> <a href="mailto:shadowcatz@gmail.com">shadowcatz@gmail.com</span></a></li>
                        <li><span>Địa Chỉ:</span> Việt Nam</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget pl-4">
                    <h3>Thông tin</h3>
                    <ul class="custom-links">
                        <li><a href="about_us.php">Giới Thiệu</a></li>
                        <li><a href="index.php">Điều khoản & Điều kiện</a></li>
                        <li><a href="index.php">Chính sách bảo mật</a></li>
                        <li><a href="index.php">Chính sách hoàn tiền</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Dịch vụ khách hàng</h3>
                    <ul class="custom-links">
                        <li><a href="user.php">Tài khoản</a></li>
                        <li><a href="index.php">FAQ's</a></li>
                        <li><a href="order_history.php">Lịch sử mua hàng</a></li>
                        <li><a href="index.php">Danh sách yêu thích</a></li>
                        <li><a href="index.php">Thông tin giao hàng</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Đăng ký!</h3>
                    <p>Đăng ký danh sách gửi thư của chúng tôi để nhận tin tức và ưu đãi cập nhật mới nhất. </p>
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="input-newsletter" placeholder="Địa chỉ email của bạn..." name="EMAIL" required autocomplete="off">
                        <button type="submit"><i class='bx bx-paper-plane'></i></button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                    <div class="payment-types">
                        <div class="d-flex align-items-center">
                            <span>Chúng tôi nhận:</span>
                            <ul>
                                <li><img src="public/img/payment/visa.png" alt="visa"></li>
                                <li><img src="public/img/payment/mc.png" alt="master-card"></li>
                                <li><img src="public/img/payment/paypal.png" alt="paypal"></li>
                                <li><img src="public/img/payment/ae.png" alt="american-express"></li>
                                <li><img src="public/img/payment/discover.png" alt="discover"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <p>Thiết kế bởi <a href="#"> hoanghamobile </a></p>
        </div>
    </div>
</footer>

<div class="go-top"><i class='bx bx-upvote'></i></div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.bundle.min.js"></script>
<script src="public/js/magnific-popup.min.js"></script>
<script src="public/js/meanmenu.min.js"></script>
<script src="public/js/appear.min.js"></script>
<script src="public/js/countrySelect.min.js"></script>
<script src="public/js/odometer.min.js"></script>
<script src="public/js/loopcounter.js"></script>
<script src="public/js/owl.carousel.min.js"></script>
<script src="public/js/rangeSlider.min.js"></script>
<script src="public/js/slick.min.js"></script>
<script src="public/js/form-validator.min.js"></script>
<script src="public/js/contact-form-script.js"></script>
<script src="public/js/ajaxchimp.min.js"></script>
<script src="public/js/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const commentForm = document.getElementById('comment-form');
        if (commentForm) {
            commentForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const textarea = commentForm.querySelector('textarea[name="comment"]');
                const comment = textarea.value;

                const input = commentForm.querySelector('input[name="name"]');
                const name = input.value;

                if (!comment.trim()) {
                    alert('Vui lòng nhập bình luận.');
                    return;
                }

                if (!name.trim()) {
                    alert('Vui lòng nhập tên.');
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open('POST', window.location.href, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            try {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    const commentsList = document.getElementById('comments-list');

                                    // Nếu chưa có bình luận nào, xóa dòng thông báo
                                    const noComments = document.getElementById('no-comments');
                                    if (noComments) {
                                        noComments.remove();
                                    }

                                    // Tạo phần tử mới cho bình luận
                                    const newComment = document.createElement('div');
                                    newComment.className = 'user-review';
                                    newComment.innerHTML = `
                                    <span class="d-block sub-name">${response.comment.ho_ten}</span>
                                    <p>${response.comment.noi_dung}</p>
                                `;
                                    commentsList.appendChild(newComment);

                                    // Xóa nội dung trong textarea sau khi gửi bình luận
                                    textarea.value = '';
                                } else {
                                    alert('Có lỗi xảy ra khi gửi bình luận: ' + response.error);
                                }
                            } catch (e) {
                                console.error('Could not parse JSON response:', xhr.responseText);
                                alert('Có lỗi xảy ra khi gửi bình luận. Vui lòng thử lại.');
                            }
                        } else {
                            console.error('Request failed. Returned status of ' + xhr.status);
                            alert('Có lỗi xảy ra khi gửi bình luận. Vui lòng thử lại.');
                        }
                    }
                };

                xhr.send(`name=${encodeURIComponent(name)}&comment=${encodeURIComponent(comment)}`);
            });
        }
    });
</script>
</body>

</html>