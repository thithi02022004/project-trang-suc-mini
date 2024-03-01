<?php

extract($_REQUEST);
include_once 'models/loginModel.php';
include_once 'models/productModel.php';
include_once 'models/cartModel.php';
include_once 'models/orderModel.php';
include_once 'models/pageModel.php';
if (isset($act)) {
    switch ($act) {
        case 'register':
            //Xử lý luồng dữ liệu cho trang đăng ký thành viên
            
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/register.php';
            require_once 'views/footer.php';
            break;
        case 'info':
            //Xử lý luồng dữ liệu cho trang đăng ký thành viên
            $row = user_id();
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/info.php';
            require_once 'views/footer.php';
            break;
        case 'product':
            //Xử lý luồng dữ liệu cho trang sản phẩm

            //Gọi view
            require_once 'views/header.php';
            require_once 'views/product.php';
            require_once 'views/footer.php';
            break;
        case 'detail':
            $size = isset($size) ? $size : null;
            $row = product_detail($slug, $size);
            $size_list = product_size();
            $rate = product_rate_with_size($size);
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/product-detail.php';
            require_once 'views/footer.php';
            break;
        
        case 'home':
            $row = user_id();
            $product_list_newest = product_list_home('newest');
            $product_list_topview = product_list_home('topview');
            $brand_home = brand_home();
            require_once 'views/header.php';
            require_once 'views/home.php';
            require_once 'views/footer.php';
            break;
    }
} else {
   
    $product_list_newest = product_list_home('newest');
    $product_list_topview = product_list_home('topview');
    require_once 'views/header.php';
    require_once 'views/home.php';
    require_once 'views/footer.php';
}
