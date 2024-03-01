<?php
    include_once '../system/Database.php';

    // function product_rowid($id){
    //     $sql = 'SELECT p.*, i.image as img
    //     FROM db_product as p
    //     JOIN db_product_img as i ON i.product_id = p.id
    //     WHERE p.id=?';
    //     return pdo_query_one($sql, $id);
    // }
    function cart_content(){
    if (isset($_SESSION['cart'])) {
        $cart = array_values($_SESSION['cart']); //Row cart là mảng 2 chiều
        return $cart;
    }
    return NULL;
}
function cart_insert($data){
    if (!isset($_SESSION['cart'])) {
        $rowcart[] = $data;
        $_SESSION['cart'] = $rowcart;
    } else {
        $cart = $_SESSION['cart'];
        $pro_key = null;
        // kiểm tra xem đã tồn tại sản phẩm hay chưa
        foreach ($cart as $key => $item_cart) {
            if ($item_cart['id'] == $data['id'] && $item_cart['size'] == $data['size']) {
                $pro_key = $key;
                break;
            }
        }
        
        if ($pro_key !== null) {
            $cart[$pro_key]['qty'] += $data['qty'];
        } else {
            $cart[] = $data;
        }
        $_SESSION['cart'] = $cart;
    }
}

    function cart_delete($name_size){
    $cart = cart_content();
    foreach ($cart as $key => $item) {
        if ($item['size'] == $name_size) {
            unset($cart[$key]);
        }
    }
    // Cập nhật giỏ hàng sau khi xóa
    $_SESSION['cart'] = $cart;
    }
    function cart_update($data){
    $cart = cart_content();
    foreach ($cart as $key => $item) {
        if ($item['id'] == $data[$key]['id'] && $item['size'] == $data[$key]['size']) {
            if ($data[$key]['qty'] == 0) {
                cart_delete($item['id']);
            } else {
                $cart[$key]['qty'] = $data[$key]['qty']; //Thay đổi số lượng sp 
            }
        }
    }
    $_SESSION['cart'] = array_values($cart);
    }
    function total_cart(){
        if (!isset($_SESSION['cart'])) {
            return 0;
        }else {
            $cart = $_SESSION['cart'];
            return count($cart);
        }
    }
    function total_cart_qty(){
        if (!isset($_SESSION['cart'])) {
            return 0;
        }else {
            $cart = $_SESSION['cart'];
            $number = 0;
            foreach ($cart as $item) {
                $number += $item['qty'];
            }
            return $number;
        }
    }
    function total_price_cart() {
        if (!isset($_SESSION['cart'])) {
            return 0;
        } else {
            $cart = $_SESSION['cart'];
            $total_price = 0;
    
            foreach ($cart as $item) {
                // Chuyển qty thành số nguyên
                $qty = intval($item['qty']);
    
                // Loại bỏ dấu phẩy và chuyển price thành số thực
                $priceString = str_replace(',', '', $item['price']);
                $price = floatval($priceString);
    
                // Kiểm tra xem qty và price có phải là số không
                if (is_numeric($qty) && is_numeric($price)) {
                    $total_price += $qty * $price;
                } else {
                    // Xử lý trường hợp nếu qty hoặc price không phải là số
                    // Ví dụ: có thể log hoặc thông báo lỗi
                }
            }
    
            return $total_price;
        }
    }
    function delete_all(){
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }
    // function insert_order($data){
    //     $sql = 'INSERT INTO db_order (user_id,customer_name, customer_email, customer_phone, customer_address, product_name, product_size, product_price, product_material, product_qty, product_img) VALUES(?,?,?,?,?,?,?,?,?,?,?)';
    //     foreach ($data['product_name'] as $key => $productName) {
    //         $phone = json_encode($data['phone']);
    //         $result = pdo_execute($sql, $data['id'], $data['fullname'], $data['email'], $phone, $data['address'], $productName, $data['product_size'][$key], $data['product_price'][$key], $data['product_material'][$key], $data['product_qty'][$key],  $data['product_img'][$key]);
    //     }
    //     return $result;
    // }

    function get_last_order_id(){
    $sql = "SELECT * FROM db_order ORDER BY id DESC LIMIT 1";
    $result = pdo_query_one($sql);
    return $result["id"];
    }
     function insert_order($data, $total_price, $created_at, $exported_at){
        $sql_order = 'INSERT INTO db_order (user_id,customer_name, customer_email, customer_phone, customer_address, price_all, created_at, exported_at) VALUES(?,?,?,?,?,?,?,?)';
        $phone = intval($data['phone']);
        pdo_execute($sql_order, $data['id'] ,$data['fullname'], $data['email'] , $phone, $data['address'], $total_price, $created_at, $exported_at);
        $last_order_id = get_last_order_id();
        foreach ($data['product_name'] as $key => $productName) {
            $sql_orderdetail = 'INSERT INTO db_orderdetail (order_id, product_id, product_name, size, material, price, quantity, product_img, created_at, exported_at) VALUES(?,?,?,?,?,?,?,?,?,?)';
            pdo_execute($sql_orderdetail, $last_order_id, $data['product_id'][$key],$data['product_name'][$key], $data['product_size'][$key], $data['product_material'][$key], $data['product_price'][$key], $data['product_qty'][$key], $data['product_img'][$key], $created_at, $exported_at);
        }
    }
    function get_history_order($id){
        $sql = 'SELECT * FROM db_order as o
        JOIN db_orderdetail as od ON o.id = od.order_id
        WHERE od.id = ?';
        return pdo_query_one($sql, $id);
    }
    function insert_htr_order($htr){
        $sql_htr = 'INSERT INTO db_order (user_id,customer_name, customer_email, customer_phone, customer_address, price_all, created_at, exported_at) VALUES(?,?,?,?,?,?,?,?)';
        pdo_execute($sql_htr, $htr['user_id'], $htr['customer_name'], $htr['customer_email'], $htr['customer_phone'], $htr['customer_address'], $htr['price_all'], $htr['created_at'], $htr['exported_at']);
        $last_order_id = get_last_order_id();
        $sql_orderdetail = 'INSERT INTO db_orderdetail (order_id, product_id, product_name, size, material, price, quantity, product_img, created_at, exported_at) VALUES(?,?,?,?,?,?,?,?,?,?)';
        pdo_execute($sql_orderdetail, $last_order_id, $htr['product_id'],$htr['product_name'], $htr['size'], $htr['material'], $htr['price'], $htr['quantity'], $htr['product_img'], $htr['created_at'], $htr['exported_at']);
    
    }
?>