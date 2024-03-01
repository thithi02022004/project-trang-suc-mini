<?php
    include_once '../system/Database.php';
    function slider_insert($name, $link, $position, $info1, $info2, $info3, $img, $orders, $status){
        $sql = 'INSERT INTO db_slider (name, link, position, info1, info2, info3, img, orders, status) VALUES(?,?,?,?,?,?,?,?,?)';
        return pdo_execute($sql, $name, $link, $position, $info1, $info2, $info3, $img, $orders, $status);
    }
    function slider_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_slider WHERE status != 0';
            return pdo_query_all($sql);
        }else {
            $sql = 'SELECT * FROM db_slider WHERE status = 0';
            return pdo_query_all($sql);
        }
    }
    function slider_rowid($id){
        $sql = 'SELECT * FROM db_slider WHERE id=?';
        return pdo_query_one($sql, $id);
    }
    function slider_update($name, $link, $position, $info1, $info2, $info3, $img, $orders, $status, $id){
        $sql = 'UPDATE db_slider SET name=?, link=?, position=?, info1=?, info2=?, info3=?, img=?, orders=?, status=? WHERE id=?'; 
        return pdo_execute($sql, $name, $link, $position, $info1, $info2, $info3, $img, $orders, $status, $id);
    }
    function slider_update_info($name, $link, $position, $info1, $info2, $info3, $orders, $status, $id){
        $sql = 'UPDATE db_slider SET name=?, link=?, position=?, info1=?, info2=?, info3=?, orders=?, status=? WHERE id=?'; 
        return pdo_execute($sql, $name, $link, $position, $info1, $info2, $info3, $orders, $status, $id);
    }
    function slider_status($status, $id){
        $sql = 'UPDATE db_slider SET status=? WHERE id=?';
        return pdo_execute($sql, $status, $id);
    }
    function slider_delete($id){
        $sql = 'DELETE FROM db_slider WHERE id=?';
        return pdo_execute($sql, $id);
    }
?>