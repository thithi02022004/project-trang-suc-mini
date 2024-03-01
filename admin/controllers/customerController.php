<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/customer/';
include_once 'models/customerModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
        //    người dùng thêm ở trang đăng ký site
            require_once $path . 'insert.php';
            break;
        case 'update':
        //    người dùng thêm ở trang đăng ký site
            require_once $path . 'update.php';
            break;
        case 'deltrash':
           
            break;
        case 'retrash':
          
            break;
        case 'status':
          
            break;
        case 'trash':
          
            require_once $path . 'trash.php';
            
            break;
        case 'delete':
           
            break;
        default:
            $customer_list = customer_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $customer_list = customer_all('index');
    require_once $path . 'index.php';
}
