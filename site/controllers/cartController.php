<?php

extract($_REQUEST);
include_once 'models/loginModel.php';
include_once 'models/productModel.php';
include_once 'models/cartModel.php';
if (isset($act)) {
    switch ($act) {
        case 'add_cart':
            //Xử lý luồng dữ liệu cho trang đăng ký thành viên
           if (isset($_SESSION['user'])) {
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // Nếu không có trang trước đó, quay lại trang chủ
            if (isset($act) && $act == 'add_cart') {
                $sp = product_detail($slug);
                $list_size = product_size();
                $qty = isset($_POST['qty']) ? $_POST['qty'] : 1;
                $selected_size = $_POST['SIZES'] ? $_POST['SIZES'] : $list_size[0]['name'];
                $calculated_price = number_format($_POST['PRICE']);
                // var_dump($selected_size); die();
                    $data = array(
                        'id' => $sp['id'],
                        'name' => $sp['name'],
                        'slug' => $sp['slug'],
                        'img' => $sp['product_img'],
                        'material' =>$sp['material'],
                        'size' => $selected_size,
                        'price' => $calculated_price,
                        'qty' => $qty
                    );    
                cart_insert($data);
                header("Location: $referer");
                exit();
            }
           }else {
            header('location: index.php?option=user&act=login');
           }
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/home.php';
            require_once 'views/footer.php';
            break;
        case 'cart_update':
            $current_url = $_SERVER['REQUEST_URI'];
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
            $list_pid = $_POST['pid']; // là id
            
            $list_qty = $_POST['qty']; // số lượng
            $list_size = $_POST['size'];
            $data = array();
            foreach ($list_pid as $key => $id) {
                $row = array(
                    'id' => $id,
                    'qty' => $list_qty[$key],
                    'size' => $list_size[$key]
                );
                $data[] = $row;
            }
            cart_update($data);
            header("Location: $referer");
            exit();
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/cart.php';
            require_once 'views/footer.php';
            break;
        case 'cart_delete':
            
            $current_url = $_SERVER['REQUEST_URI'];
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // Nếu không có trang trước đó, quay lại trang chủ
            $list_size = product_size();
            foreach ($list_size as $key => $value) {
                $names[] = $value['name'];
            }
            // var_dump($_REQUEST['size']); die();
            foreach ($names as $key => $name_size) {
                if (isset($_REQUEST['id']) && $_REQUEST['size'] == $name_size) {
                    cart_delete($name_size);
                    header("Location: $referer");
                    exit;
                }
            }
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/cart.php';
            require_once 'views/footer.php';
            break;
        case 'delete_all':
            $current_url = $_SERVER['REQUEST_URI'];
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // Nếu không có trang trước đó, quay lại trang chủ
            if (isset($_SESSION['cart'])) {
                delete_all();
            }
            header("location: $referer");
            exit();
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/cart.php';
            require_once 'views/footer.php';
            break;
        case 'cart_view':
               if (isset($_SESSION['user'])) {
                $list = cart_content();
                if (isset($_SESSION['cart'])) {
                    $total_product = total_cart();
                    $total_qty = total_cart_qty();
                    $total_price = total_price_cart();
                }
               }else {
                header('location: index.php?option=user&act=login');
               }
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/cart.php';
            require_once 'views/footer.php';
            break;
        case 'checkout':
            if (isset($THANHTOAN)) {
                if (!empty($_POST['newfullname'])) {
                    $fullname = $_POST['newfullname'];
                    $email = $_POST['newemail'];
                    $phone = $_POST['newphone'];
                    $address = $_POST['newaddress'];
                    $data = array(
                        'id' => $_SESSION['user']['id'],
                        'fullname' => $fullname,
                        'email' => $email,
                        'phone' => $phone,
                        'address' => $address,
                    );
                } else {
                    $fullname = $_SESSION['user']['fullname'];
                    $email = $_SESSION['user']['email'];
                    $phone = $_SESSION['user']['phone'];
                    $address = $_SESSION['user']['address'];
                    $data = array(
                        'id' => $_SESSION['user']['id'],
                        'fullname' => $fullname,
                        'email' => $email,
                        'phone' => $phone,
                        'address' => $address,
                    );
                }
                $total_price = total_price_cart();
                $list = cart_content();
                $data['product_name'] = array();
                $data['product_price'] = array();
                $data['product_qty'] = array();
                $data['product_material'] = array();
                $data['product_size'] = array();
                $data['product_img'] = array();
                foreach ($list as $key => $item) {
                    $product_id = $item['id'];
                    $name = $item['name'];
                    $price = $item['price'];
                    $qty = $item['qty'];
                    $material = $item['material'];
                    $size = $item['size'];
                    $img = $item['img'];
                    $data['product_id'][] = $product_id;
                    $data['product_name'][] = $name;
                    $data['product_price'][] = intval(str_replace(',', '', $price));
                    $data['product_qty'][] = $qty;
                    $data['product_material'][] = $material;
                    $data['product_size'][] = $size;
                    $data['total_all_price'][] = $total_price;
                    $data['product_img'][] = $img;
                }
                $created_at = date('Y-m-d H:i:s');
                $exported_at = date('Y-m-d H:i:s');
                // var_dump($item['qty']); die();
                insert_order($data, $total_price, $created_at, $exported_at);
                unset($_SESSION['cart']);
                header('location: index.php?option=page&act=home');
            }
            //Gọi view
            require_once 'views/header.php';
            require_once 'views/checkout.php';
            require_once 'views/footer.php';
            break;
        case 'reset':
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'; // Nếu không có trang trước đó, quay lại trang chủ
            if (isset($act) && $act == 'reset'){
                $htr_order = get_history_order($id);
                $htr = array(
                    'id' => $htr_order['id'],
                    'user_id' => $htr_order['user_id'],
                    'customer_name' => $htr_order['customer_name'],
                    'customer_email' => $htr_order['customer_email'],
                    'customer_phone' => $htr_order['customer_phone'],
                    'customer_address' => $htr_order['customer_address'],
                    'price_all' => $htr_order['price_all'],
                    'created_at' => $htr_order['created_at'],
                    'exported_at' => $htr_order['exported_at'],
                    'product_img' => $htr_order['product_img'],
                    'stage' => 1,
                    'status' => 1,
                    'order_id' => $htr_order['order_id'],
                    'product_id' => $htr_order['product_id'],
                    'product_name' => $htr_order['product_name'],
                    'size' => $htr_order['size'],
                    'material' => $htr_order['material'],
                    'price' => $htr_order['price'],
                    'quantity' => $htr_order['quantity'],
                );
                // echo '<pre>';
                // print_r($htr['stage']); die();
                // echo '</pre>';
                insert_htr_order($htr);
                header("Location: $referer");
                exit();
            }
            require_once 'views/header.php';
            require_once 'views/risetorder.php';
            require_once 'views/footer.php';
            break;
    }
} else {
    $list = cart_content();
    require_once 'views/header.php';
    require_once 'views/cart.php';
    require_once 'views/footer.php';
}
