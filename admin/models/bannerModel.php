
<?php
    include_once '../system/Database.php';

    function banner_insert($name, $link, $position, $info1, $info2, $info3, $orders,  $img, $status){
       $sql = 'INSERT INTO db_banner (name, link, position, info1, info2, info3, orders, img, status) VALUES(?,?,?,?,?,?,?,?,?)';
       return pdo_execute($sql, $name, $link, $position, $info1, $info2, $info3, $orders,  $img, $status); 
    }
    function banner_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_banner WHERE status != 0';
            return pdo_query_all($sql);
        }else {
            $sql = 'SELECT * FROM db_banner WHERE status = 0';
            return pdo_query_all($sql);
        }
    }
    function banner_rowid($id){
        $sql = 'SELECT * FROM db_banner WHERE id=?';
        return pdo_query_one($sql, $id);
    }
    function banner_update($name, $link, $position, $info1, $info2, $info3, $orders,  $img, $status, $id){
        $sql = 'UPDATE db_banner SET name=?, link=?, position=?, info1=?, info2=?, info3=?, orders=?, img=?, status=? WHERE id=?'; 
        return pdo_execute($sql, $name, $link, $position, $info1, $info2, $info3, $orders,  $img, $status, $id);
    }
    function banner_update_info($name, $link, $position, $info1, $info2, $info3, $orders, $status, $id){
        $sql = 'UPDATE db_banner SET name=?, link=?, position=?, info1=?, info2=?, info3=?, orders=?, status=? WHERE id=?'; 
        return pdo_execute($sql, $name, $link, $position, $info1, $info2, $info3, $orders, $status, $id);
    }
    function banner_status($status, $id){
        $sql = 'UPDATE db_banner SET status=? WHERE id=?';
        return pdo_execute($sql, $status, $id);
    }
    function banner_delete($id){
        $sql = 'DELETE FROM db_banner WHERE id=?';
        return pdo_execute($sql, $id);
    }
    
?>