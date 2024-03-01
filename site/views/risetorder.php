<?php if ($list != NULL) : ?>
<section class="main-container col1-layout">
<form method="POST" action="index.php?option=cart&act=checkout">
    <div class="main container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="product-area">
                                <div role="tabpanel" class="tab-pane  fade in " id="checkout">
                                    <!-- Checkout are start-->
                                    <div class="checkout-area">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-7 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xs-12">
                                                            <div class="billing-details">
                                                                <div class="contact-text right-side">
                                                                    <h2>Địa chỉ nhận hàng</h2>
                                                                    
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="input-box">
                                                                                    <label>Họ và tên <em>*</em></label>
                                                                                    <input type="text" name="fullname" value="<?= $_SESSION['user']['fullname']; ?>" class="info">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="input-box">
                                                                                    <label>Email<em>*</em></label>
                                                                                    <input type="email" name="email" value="<?= $_SESSION['user']['email']; ?>" class="info" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="input-box">
                                                                                    <label>Số điện thoại<em>*</em></label>
                                                                                    <input type="text" name="phone" value="<?= $_SESSION['user']['phone']; ?>" class="info" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="input-box">
                                                                                    <label>Địa Chỉ nhận <em>*</em></label>
                                                                                    <input type="text" name="Address" value="<?= $_SESSION['user']['address']; ?>" class="info mb-10" >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                            <div>
                                                                <div class="panel-heading" role="tab" id="headingThree">
                                                                    <h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Chọn địa chỉ nhận khác </a> </h4>
                                                                </div>
                                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                <div class="col-md-12 col-xs-12">
                                                                    <div class="billing-details">
                                                                        <div class="contact-text right-side">
                                                                                <div class="row">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                        <div class="input-box">
                                                                                            <label>Họ và tên <em>*</em></label>
                                                                                            <input type="text" name="newfullname" class="info" placeholder="Họ và tên">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                        <div class="input-box">
                                                                                            <label>Email<em>*</em></label>
                                                                                            <input type="email" name="newemail" class="info" placeholder="Email của bạn">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                        <div class="input-box">
                                                                                            <label>Số điện thoại<em>*</em></label>
                                                                                            <input type="text" name="newphone" class="info" placeholder="Số điện thoại">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <div class="input-box">
                                                                                            <label>Địa Chỉ nhận <em>*</em></label>
                                                                                            <input type="text" name="newaddress" class="info mb-10" placeholder="Nhập địa chỉ">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                <div class="col-md-5 col-sm-12 col-xs-12">
                                                    <div class="checkout-payment-area">
                                                        <div class="checkout-total">
                                                            <h3>Đơn hàng của bạn</h3>
                                                                <div class="table-responsive">
                                                                    <table class="checkout-area table">
                                                                        <thead>
                                                                            <tr class="cart_item check-heading">
                                                                                <td class="ctg-type"> Sản Phẩm</td>
                                                                                <td class="cgt-des"> Thành Tiền</td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($list as $item_cart) : ?>
                                                                                <?php
                                                                                $total_checkout = 0;
                                                                                $total_checkout = $item_cart['qty'] * intval(str_replace(',', '', $item_cart['price'])) 
                                                                                
                                                                                ?>
                                                                                <?php
                                                                                
                                                                                ?>
                                                                                <tr class="cart_item check-item prd-name">
                                                                                    <td class="ctg-type"> <?= $item_cart['name'] ?> × <span><?= $item_cart['qty'] ?></span></td>
                                                                                    <td class="cgt-des"> <?= number_format($total_checkout) ?>  VNĐ </td>
                                                                                </tr>
                                                                            <?php endforeach; ?>
                                                                          
                                                                            <tr class="cart_item">
                                                                                <td class="ctg-type crt-total"> Tổng</td>
                                                                                <td class="cgt-des prc-total"> <?php echo number_format($total_price); ?> Vnđ </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="payment-section">
                                                                <div class="pay-toggle">
                                                                    <button type="submit" name="THANHTOAN" class="btn-def btn2">Thanh Toán</button>
                                                            </div>
                                                        </div>
                                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Checkout are end-->
                                </div>
                            <?php endif; ?>
                            </div>
            </div>
        </div>
    </div>
</form>
</section>