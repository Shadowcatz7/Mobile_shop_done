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


<div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="blog-details-desc">
                        <div class="post-thumb">
                            <img src="admin/<?php echo $post->anh_tieu_de ?>" alt="blog-details">
                        </div>
                        <h4><?php echo $post->tieu_de ?></h4>
                        <div class="post-meta">
                            <ul>
                                <li><i class='bx bx-calendar'></i> <?php echo $post->ngay_tao ?></li>
                            </ul>
                        </div>
                        <?php echo $post->noi_dung ?>
                    </div>
                    <!-- <div class="comments-area">
                        <h3 class="comments-title">2 Comments:</h3>
                        <ol class="comment-list">
                            <li class="comment">
                                <div class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="assets/img/user/user1.jpg" class="avatar" alt="user">
                                            <b class="fn">John Jones</b>
                                        </div>
                                        <div class="comment-metadata">
                                            <span>January 01, 2021 at 10:59 am</span>
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen.</p>
                                    </div>
                                    <div class="reply">
                                        <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                    </div>
                                </div>
                                <ol class="children">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/img/user/user2.jpg" class="avatar" alt="user">
                                                    <b class="fn">Steven Smith</b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <span>January 02, 2021 at 21:59 am</span>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since
                                                    the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen.</p>
                                            </div>
                                            <div class="reply">
                                                <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                            </div>
                                        </div>
                                        <ol class="children">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <footer class="comment-meta">
                                                        <div class="comment-author vcard">
                                                            <img src="assets/img/user/user3.jpg" class="avatar"
                                                                alt="user">
                                                            <b class="fn">Sarah Taylor</b>
                                                        </div>
                                                        <div class="comment-metadata">
                                                            <span>January 03, 2021 at 05:59 am</span>
                                                        </div>
                                                    </footer>
                                                    <div class="comment-content">
                                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever
                                                            since the 1500s, when an unknown printer took a galley of
                                                            type and scrambled it to make a type specimen.</p>
                                                    </div>
                                                    <div class="reply">
                                                        <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                            <li class="comment">
                                <div class="comment-body">
                                    <footer class="comment-meta">
                                        <div class="comment-author vcard">
                                            <img src="assets/img/user/user4.jpg" class="avatar" alt="user">
                                            <b class="fn">John Doe</b>
                                        </div>
                                        <div class="comment-metadata">
                                            <span>January 04, 2021 at 05:59 am</span>
                                        </div>
                                    </footer>
                                    <div class="comment-content">
                                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled it to make a
                                            type specimen.</p>
                                    </div>
                                    <div class="reply">
                                        <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                    </div>
                                </div>
                                <ol class="children">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img src="assets/img/user/user1.jpg" class="avatar" alt="user">
                                                    <b class="fn">James Anderson</b>
                                                </div>
                                                <div class="comment-metadata">
                                                    <span>January 05, 2021 at 04:59 am</span>
                                                </div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>Lorem Ipsum has been the industry’s standard dummy text ever since
                                                    the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it to make a type specimen.</p>
                                            </div>
                                            <div class="reply">
                                                <a href="blog-details.html" class="comment-reply-link">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave A Reply</h3>
                            <form class="comment-form">
                                <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span>
                                    Required fields are marked <span class="required">*</span>
                                </p>
                                <p class="comment-form-author">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" id="author" placeholder="Your Name*" name="author"
                                        required="required">
                                </p>
                                <p class="comment-form-email">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" id="email" placeholder="Your Email*" name="email"
                                        required="required">
                                </p>
                                <p class="comment-form-url">
                                    <label>Website</label>
                                    <input type="url" id="url" placeholder="Website" name="url">
                                </p>
                                <p class="comment-form-comment">
                                    <label>Comment</label>
                                    <textarea name="comment" id="comment" cols="45" placeholder="Your Comment..."
                                        rows="5" maxlength="65525" required="required"></textarea>
                                </p>
                                <p class="comment-form-cookies-consent">
                                    <input type="checkbox" value="yes" name="wp-comment-cookies-consent"
                                        id="wp-comment-cookies-consent">
                                    <label for="wp-comment-cookies-consent">Save my name, email, and website in this
                                        browser for the next time I comment.</label>
                                </p>
                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit"
                                        value="Post A Comment">
                                </p>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>