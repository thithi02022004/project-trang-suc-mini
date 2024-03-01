<?php
    include_once '../system/Database.php';

    //show sản phẩm
    function product_all($page){
        if ($page == 'index') {
            $sql = 'SELECT p.*, c.name as categoryName, b.name as brandName, z.name as sizename
                    FROM db_product as p
                    JOIN db_category as c ON p.category_id = c.id
                    JOIN db_brand as b ON p.brand_id = b.id
                    JOIN db_size as z ON p.size_id = z.id
                    WHERE p.status != 0 ORDER BY p.id ASC';
           
        }else{
            $sql = 'SELECT p.*, c.name as categoryName, b.name as brandName, z.name as sizename
                    FROM db_product as p
                    JOIN db_category as c ON p.category_id = c.id
                    JOIN db_brand as b ON p.brand_id = b.id
                    JOIN db_size as z ON p.size_id = z.id
                    WHERE p.status = 0 ORDER BY p.id ASC';
        }
        return pdo_query_all($sql);
    }
     //Kiểm tra xem tên category có tồn tại hay chưa dựa trên slug
     function category_slug_exists($slug, $id = null){
        if ($id == null) {
            $sql = 'SELECT * FROM db_category WHERE slug = ?';
            return pdo_query_one($sql, $slug);
        }else{
            $sql = 'SELECT * FROM db_category WHERE slug = ? AND id != ?';
            return pdo_query_one($sql, $slug, $id);
        }
    }
    // thêm sản phẩm
    function product_insert($category_id, $brand_id, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status){
    $sql = "INSERT INTO db_product (category_id,brand_id,name,slug,smdetail,detail,material,size_id,quantity,price,promotion,status) VALUE (?,?,?,?,?,?,?,?,?,?,?,?)";
    return pdo_execute($sql, $category_id, $brand_id, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status);
    }
    // lấy dữ liệu danh mục
    function category_all(){
        $sql = 'SELECT * FROM db_category';
        return pdo_query_all($sql);
    }
    function brand_all(){
        $sql = 'SELECT * FROM db_brand';
        return pdo_query_all($sql);
    }
            // function product_getid(){
            //     $sql = 'SELECT * FROM db_product ORDER BY id DESC LIMIT 1';
            //     $result = pdo_query_one($sql);
            //     return($result['id']);
            // }

            // Trường hợp sản phẩm rỗng 
    function product_getid(){
        $sql = 'SELECT * FROM db_product ORDER BY id DESC LIMIT 1';
        $result = pdo_query_one($sql);
    
        if ($result !== false && isset($result['id'])) {
            return $result['id'];
        } else {
            // Xử lý trường hợp khi không tìm thấy hoặc có lỗi trong truy vấn
            return null;
        }
    }
    function product_rowid($id){
        $sql = 'SELECT p.*, i.image as image_list, c.name as cname, b.name as bname 
                FROM db_product as p
                JOIN db_product_img as i ON i.product_id = p.id
                JOIN db_category as c ON c.id = p.category_id
                JOIN db_brand as b ON b.id = p.brand_id 
                WHERE p.id = ?';
        return pdo_query_one($sql, $id);
    }
    
    function product_img($product_id, $image){
        $sql = 'INSERT INTO db_product_img (product_id, image) VALUES(?,?)';
        return pdo_execute($sql,$product_id,$image);
    }
    function product_imglist(){
        $sql = 'SELECT * FROM db_product_img';
        return pdo_query_all($sql);
    }
    function product_get_product_id($product_id){
        $sql = 'SELECT * FROM db_product_img WHERE product_id =?';
        return pdo_query_all($sql, $product_id);
    }
    function product_imglist_folder_delete($product_id){
        $imglist = product_get_product_id($product_id);
        foreach ($imglist as $item) {
            $name = $item["image"];
            if (file_exists('../public/images/product/' . $name)) {
                unlink('../public/images/product/' . $name);
            }
        }
    }
    function product_img_delete($product_id){
        $sql = 'DELETE FROM db_product_img WHERE product_id = ?';
        return pdo_execute($sql, $product_id);
    }
    // Cập nhật thông tin sản phẩm
    function product_update($category_id, $brand_id, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status, $id){
    $sql = "UPDATE db_product SET category_id=?,brand_id=?,name=?,slug=?,smdetail=?,detail=?,material=?,size=?,quantity=?,price=?,promotion=?,status=? WHERE id=?";
    return pdo_execute($sql, $category_id, $brand_id, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status, $id);
    }
    function product_deltrash_retrash($status, $id){
    $sql = 'UPDATE db_product SET status = ? WHERE id =?';
    return pdo_execute($sql, $status, $id);
    }
    function product_delete($id){
        $sql = 'DELETE FROM db_product WHERE id=?';
        return pdo_execute($sql, $id);

    }
    function product_size(){
        $sql = 'SELECT * FROM db_size';
        return pdo_query_all($sql);
    }
?>