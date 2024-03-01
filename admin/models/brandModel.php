<?php
    include_once '../system/Database.php';

    function brand_insert($name,$slug,$img,$orders,$status){
        $sql = 'INSERT INTO db_brand (name,slug,img,orders,status) VALUES(?,?,?,?,?)';
        return pdo_execute($sql,$name,$slug,$img,$orders,$status);
    }
    function brand_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_brand WHERE status != 0 ORDER BY orders ASC';
            return pdo_query_all($sql);
        }else {
            $sql = 'SELECT * FROM db_brand WHERE status = 0 ORDER BY orders ASC';
            return pdo_query_all($sql);
        }
    }
    function brand_rowid($id){
        $sql = 'SELECT * FROM db_brand WHERE id =?';
        return pdo_query_one($sql, $id);
    }
    function brand_update($name,$slug,$img,$orders,$status,$id){
        $sql = 'UPDATE db_brand SET name=?, slug=?, img=?, orders=?, status=? WHERE id=?';
        return pdo_execute($sql,$name,$slug,$img,$orders,$status,$id);
    }
    function brand_update_info($name,$slug,$orders,$status,$id){
        $sql = 'UPDATE db_brand SET name=?, slug=?, orders=?, status=? WHERE id=?';
        return pdo_execute($sql,$name,$slug,$orders,$status,$id);
    }
    function product_update_status($status, $id){
        $sql = 'UPDATE db_brand SET status = ? WHERE id =?';
    return pdo_execute($sql, $status, $id);
    }
    function brand_delete($id){
        $sql = 'DELETE FROM db_brand WHERE id=?';
        return pdo_execute($sql, $id);
    }
    
?>