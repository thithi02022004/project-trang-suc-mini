<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Đăng nhập tài khoản</h2>
            </div>
            <fieldset>
                <div class="registered-users">
                    <!-- <strong>Registered Customers</strong> -->
                    <div class="content">
                        <p>Nếu bạn chưa có tài khoản hãy đăng ký!</p>
                        <form action="index.php?option=user&act=login" method="post" enctype="multipart/form-data">
                            <ul class="form-list">
                                <li>
                                    <label for="email">Tên tài khoản <span class="required">*</span></label>
                                    <input type="text" title="email" class="input-text required-entry" id="email" value="" name="email" />
                                </li>
                                <li>
                                    <label for="password">Mật Khẩu <span class="required">*</span></label>
                                    <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password" />
                                </li>
                            </ul>
                            <!-- <p class="required">* Required Fields</p> -->
                            <div class="buttons-set">
                                <button type="submit" name="DANGNHAP" class="btn btn-success">Đăng nhập</button>
                                <a class="forgot-word" href="forgot-password.html">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
    </div>
</section>