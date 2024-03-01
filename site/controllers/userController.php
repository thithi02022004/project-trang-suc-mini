<?php
extract($_REQUEST);
include_once 'models/loginModel.php';
include_once 'models/orderModel.php';
include_once 'models/productModel.php';
if (isset($act)) {
    switch ($act) {
        case 'register':
            //Xử lý luồng dữ liệu cho trang đăng ký thành viên
            if (isset($DANGKY)) {
                register_insert($fullname, $username, $password, $phone, $email, $address, $_FILES['img']['name']);
                $path = '../public/images/user/';
                $fileName = $_FILES['img']['name'];
                $file_tmp_name = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp_name, $path.$fileName);
                header('location: index.php?option=user&act=login');
            }
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/register.php';
            require_once 'views/footer.php';
            break;
        case 'login':
            //Trang đăng nhập
           if (isset($DANGNHAP)) {
            $user=check_login($email,$password);
            if (isset($user)) {
                $_SESSION['user']=$user;
                header('location: index.php?option=page&act=home');
            }else{
                $user = 'Email hoặc mật khẩu không đúng';
            }
           }
            require_once 'views/header.php';
            require_once 'views/login.php';
            require_once 'views/footer.php';
            break;
        case 'cancel':
            $row = order_rowid($id);
            // var_dump($row); die();
            if ($row['stage'] == 1) {
                $stag = ($row['stage'] == 1) ? 4 : 1;
                $stage = $stag;
                order_cancel($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => ' Đơn hủy thành công']);
                redirect('index.php?option=user&act=order');
            }
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/order.php';
            require_once 'views/footer.php';
            break;
        case 'received':
            $row = order_rowid($id);
            // var_dump($row); die();
            if ($row['stage'] == 5) {
                $stag = ($row['stage'] == 5) ? 6 : 5;
                $stage = $stag;
                order_cancel($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => ' Nhận đơn thành công thành công']);
                redirect('index.php?option=user&act=order');
            }
            require_once 'views/header.php';
            require_once 'views/order.php';
            require_once 'views/footer.php';
        case 'orderdetail':
            $created_at = date('Y-m-d H:i:s');
            $exported_at = date('Y-m-d H:i:s');
            $row = order_rowid($id);
            $view_order = view_order($row['id']);
            // var_dump($view_order); die();
            require_once 'views/header.php';
            require_once 'views/view_order.php';
            require_once 'views/footer.php';
        case 'info':
            //Trang thông tin tai khoản
            require_once 'views/header.php';
            require_once 'views/info.php';
            require_once 'views/footer.php';
        case 'account':
          
            //Trang tài khoản
            require_once 'views/header.php';
            require_once 'views/account.php';
            require_once 'views/footer.php';
            break;
        case 'order':
            $list_order = order_all($_SESSION['user']['id']);
            // var_dump($list_order); die();
            require_once 'views/header.php';
            require_once 'views/order.php';
            require_once 'views/footer.php';
            break;
        case 'add_whislist' :
            $product_id = $_REQUEST['id'];
            $customer_id = $_SESSION['user']['id'];
            user_whislist($product_id, $customer_id);
            header('location: index.php?option=user&act=whislist');
            require_once 'views/header.php';
            require_once 'views/whislist.php';
            require_once 'views/footer.php';
            break;
        case 'whislist':
            //Trang yêu thích
            $customer_id = $_SESSION['user']['id'];
            $wish_list = show_whislist($customer_id);
            foreach ($wish_list as &$item) {
                $item['product'] = product_rowid($item['product_id']);
                // $item['size'] = product_size_wish($item['product_id']);
            }
            // var_dump( $item['size']); die();
            require_once 'views/header.php';
            require_once 'views/whislist.php';
            require_once 'views/footer.php';
            break;
        case 'logout':
            //Trang đăng xuất
            session_unset();
            header("Location: index.php?option=page&act=home");
            break;
    }
} else {
    require_once 'views/header.php';
    require_once 'views/account.php';
    require_once 'views/footer.php';
}
