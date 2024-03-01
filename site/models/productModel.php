<?php
    include_once '../system/Database.php';
    // function product_all(){
    //     $sql = 'SELECT p.*, img.image as imglist, c.name as cname, b.name as bname 
    //             FROM db_product as p
    //             JOIN db_product_img as img ON p.id = img.product_id
    //             JOIN db_category as c ON p.category_id = c.id
    //             JOIN db_brand as b ON p.brand_id = b.id
    //             WHERE p.status != 0';
    //     return pdo_query_all($sql);
    // }

    // function product_all($page){
    //     if ($page == 'index') {
    //         $sql = 'SELECT p.*, c.name as categoryName, b.name as brandName, img.image as imglist
    //                 FROM db_product as p
    //                 JOIN db_product_img as img ON p.id = img.product_id
    //                 JOIN db_category as c ON p.category_id = c.id
    //                 JOIN db_brand as b ON p.brand_id = b.id
    //                 WHERE p.status != 0 ORDER BY p.id ASC';
           
    //     }else{
    //         $sql = 'SELECT p.*, c.name as categoryName, b.name as brandName, img.image as imglist
    //                 FROM db_product as p
    //                 JOIN db_product_img as img ON p.id = img.product_id
    //                 JOIN db_category as c ON p.category_id = c.id
    //                 JOIN db_brand as b ON p.brand_id = b.id
    //                 WHERE p.status = 0 ORDER BY p.id ASC';
    //     }
    //     return pdo_query_all($sql);
    // }

    function product_list_home($option = null)
{
    if ($option == 'newest') {
        $sql = "SELECT p.*, i.img_id, i.product_id, i.img
        FROM db_product p
        INNER JOIN (
            SELECT MIN(id) AS img_id, product_id, MIN(image) AS img
            FROM db_product_img
            GROUP BY product_id
        ) i ON p.id = i.product_id
        WHERE p.status = 1
        ORDER BY p.id DESC
        LIMIT 8";
    } else if ($option == 'topview') {
        $sql = "SELECT p.*, i.img_id, i.product_id, i.img
        FROM db_product p
        INNER JOIN (
            SELECT MIN(id) AS img_id, product_id, MIN(image) AS img
            FROM db_product_img
            GROUP BY product_id
        ) i ON p.id = i.product_id
        WHERE p.status = 1
        ORDER BY p.view DESC
        LIMIT 8";
    }
    return pdo_query_all($sql);
    }
    function product_detail($slug){
        $sql = 'SELECT p.*, i.image as product_img, z.name as zname
        FROM db_product as p 
        LEFT JOIN db_product_img as i ON p.id = i.product_id
        LEFT JOIN db_size as z ON p.size_id = z.id
        WHERE p.slug=?';
        $product = pdo_query_one($sql, $slug);
        // lấy tất cả hình ảnh có cùng product_id của bảng db_product_img
        $sqlImg = 'SELECT image FROM db_product_img WHERE product_id = ?';
        $productImage = pdo_query_all($sqlImg, $product['id']);
        // tạo một mảng chứa đường dẫn đến hình ảnh
        $imgPath = array();
        foreach ($productImage as $img ) {
            $imgPath[] = $img['image'];
        }
        // THêm hình ảnh vào kết quả trả về 
        $product['more_images'] = $imgPath;
        return $product;
    }
   
    function product_size(){
        $sql = 'SELECT * FROM db_size';
        return pdo_query_all($sql);
    }

    function product_rate_with_size($size = null) {
        $sql = 'SELECT rate FROM db_size';
        if($size!== null) {
            $sql.=" WHERE name=$size";
        }
        else{
            $sql.=" LIMIT 1";
        }
        return pdo_query_all($sql);
    }
    
?>