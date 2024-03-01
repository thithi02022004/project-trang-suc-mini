<?php
    include_once '../system/Database.php';
    function register_insert($fullname, $username, $password, $phone, $email, $address, $img){
        $sql = 'INSERT INTO db_user (fullname, username, password, phone, email, address, img) VALUES (?,?,?,?,?,?,?)';
        return pdo_execute($sql, $fullname, $username, $password, $phone, $email, $address, $img);
    }
    function check_login($email, $password){
        $sql = 'SELECT * FROM db_user WHERE email=? AND password=?';
        return pdo_query_one($sql, $email, $password);
    }
    function user_id(){
        $sql = 'SELECT * FROM db_user';
        return pdo_query_one($sql);
    }
    function user_whislist($product_id, $customer_id){
        $sql = 'INSERT INTO db_whislist (product_id, customer_id) VALUES(?,?)';
        return pdo_execute($sql, $product_id, $customer_id);
    }
    function show_whislist($customer_id){
        $sql = "SELECT * FROM db_whislist WHERE customer_id=?";
        return pdo_query_all($sql, $customer_id);
    }
    function product_rowid($id){
        $sql = 'SELECT p.*, i.image as image_list, c.name as cname, b.name as bname , z.name as zname
                FROM db_product as p
                JOIN db_product_img as i ON i.product_id = p.id
                JOIN db_category as c ON c.id = p.category_id
                JOIN db_brand as b ON b.id = p.brand_id 
                JOIN db_size as z ON z.id = p.size_id 
                WHERE p.id = ?';
        return pdo_query_one($sql, $id);
    }
    // function product_size_wish($id){
    //     $sql = 'SELECT z.*, z.name as zname 
    //     FROM db_size z
    //     JOIN db_product p ON p.size_id = z.id
    //     WHERE p.id = ?';
    //     return pdo_query_all($sql, $id);
    // }
    
   
    
?>