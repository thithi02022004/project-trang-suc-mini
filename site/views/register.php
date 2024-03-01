<section class="main-container col1-layout">
    <div class="main container">
        <div class="account-login">
            <div class="page-title">
                <h2>Tạo tài khoản mới</h2>
            </div>
            <fieldset class="col2-set">
                <!-- <div class="col-1 new-users"><strong>New Customers</strong>
                    <div class="content">
                        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                        <div class="buttons-set">
                            <button class="button create-account" type="button"><span>Create an Account</span></button>
                        </div>
                    </div>
                </div> -->
                <div class="col-2 registered-users">
                    <div class="content">
                        <p>Nếu bạn đã có tài khoản hãy đăng nhập!</p>
                        <form action="index.php?option=user&act=register" method="post" enctype="multipart/form-data">
                        <ul class="form-list">
                            <li>
                                <label for="fullname">Họ và tên <span class="required">*</span></label>
                                <input type="text" title="fullname" class="input-text required-entry" id="fullname" value="" name="fullname">
                            </li>
                            <!-- <li>
                                <label for="user">Tên đăng nhập <span class="required">*</span></label>
                                <input type="text" title="username" class="input-text required-entry" id="username" value="" name="username">
                            </li> -->
                            <li>
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="text" title="email" class="input-text required-entry" id="email" value="" name="email">
                            </li>
                            <li>
                                <label for="pass">Mật khẩu <span class="required">*</span></label>
                                <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password">
                            </li>
                            <li>
                                <label for="phone">Số điện thoại <span class="required">*</span></label>
                                <input type="text" title="phone" class="input-text required-entry" id="phone" value="" name="phone">
                            </li>
                            <li>
                                <label for="address">Địa chỉ <span class="required">*</span></label>
                                <input type="text" title="address" class="input-text required-entry" id="address" value="" name="address">
                            </li>
                            <li>
                                <label for="img">Ảnh đại diện <span class="required">*</span></label>
                                <input type="file" title="img" class="input-text required-entry" id="img" value="" name="img">
                            </li>
                        </ul>
                        <!-- <p class="required">* Required Fields</p> -->
                        <div class="buttons-set">
                            <button type="submit" name="DANGKY" class="btn btn-success">Đăng ký</button>
                            <a class="forgot-word" href="forgot-password.html">Quên mật khẩu?</a>
                        </div>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</section>