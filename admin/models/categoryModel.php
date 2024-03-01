
<?php
    include_once '../system/Database.php';

//Lấy danh sách thương hiệu cho 2 trang là index, trash.
//Có thể kết hợp những trang khác như insert,update
    function category_insert($name, $slug, $parentid, $orders, $status){
        $sql = 'INSERT INTO db_category (name,slug,parent_id,orders,status) VALUES(?,?,?,?,?)';
        return pdo_execute($sql, $name, $slug, $parentid, $orders, $status);
    }
    function category_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_category WHERE status != 0 ORDER BY orders ASC';
            return pdo_query_all($sql);
        }else{
            $sql = 'SELECT * FROM db_category WHERE status = 0 ORDER BY orders ASC';
            return pdo_query_all($sql);
        }
    }
    //Lấy ra thông tin thương hiệu dựa theo id hoặc slug
    function category_rowid($id){
        $sql = 'SELECT * FROM db_category WHERE id=?';
        return pdo_query_one($sql, $id);
    }
    function category_update($name, $slug, $parentid, $orders, $status,$id){
        $sql = 'UPDATE db_category SET name=?,slug=?,parent_id=?,orders=?,status=? WHERE id=?';
        return pdo_execute($sql, $name, $slug, $parentid, $orders, $status, $id);
    }
    //Kiểm tra xem tên category có tồn tại hay chưa dựa trên slug
    function category_slug_exists($slug, $id = null){
        if ($id == null) {
            $sql = 'SELECT * FROM db_category WHERE slug =?';
            return pdo_query_one($sql, $slug);
        }else{
            $sql = 'SELECT * FROM db_category WHERE slug = ? AND id != ?';
            return pdo_query_one($sql, $slug, $id);
        }
    }
    //Kiểm tra xem category có tồn tại sản phẩm không dựa theo category_id của bảng product
    function category_has_children($id){
    // Thực hiện truy vấn kiểm tra xem có danh mục con nào có parentid = $id hay không
    $sql = "SELECT COUNT(*) FROM db_category WHERE parent_id = ?";
    $count = pdo_query_value($sql, $id);
    return $count > 0;
    }
    function category_has_products($id){
        $sql = 'SELECT COUNT(*) FROM db_product WHERE category_id = ?';
        return pdo_query_value($sql, $id) > 0; 
    }
    // Thực hiện đưa danh mục vào lưu trữ và đổi status về 0
    function category_deltrash($status,$id){
        $sql = 'UPDATE db_category SET status = ? WHERE id=?';
        return pdo_execute($sql, $status, $id);
    }
    // Thực hiện khôi phục danh mục và đổi status về 1
    function category_retrash($status,$id){
        $sql = 'UPDATE db_category SET status = ? WHERE id=?';
        return pdo_execute($sql, $status, $id);
    }
    // thực hiện xóa danh muc trong kho luu tru
    function category_delete($id){
        $sql = 'DELETE FROM db_category WHERE id=?';
        return pdo_execute($sql, $id);
    }
    // thực hiện thay đổi trạng hái trong index
    function category_status($status, $id){
        // $status == 1 ? $status = 2 : $status = 1;
        $sql = 'UPDATE db_category SET status = ? WHERE id=?';
        return pdo_execute($sql, $status, $id);
    }
?>