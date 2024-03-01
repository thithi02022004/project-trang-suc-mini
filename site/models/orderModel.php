
<?php
    include_once '../system/Database.php';
    function order_all($user_id){
        $sql = 'SELECT * FROM db_order WHERE user_id = ?';
        return pdo_query_all($sql, $user_id);
    }
    function order_rowid($id){
        $sql = 'SELECT * FROM db_order WHERE id=?';
        return pdo_query_one($sql, $id);
    }
    function order_cancel($stage, $id){
        $sql = 'UPDATE db_order SET stage=? WHERE id=?';
        return pdo_execute($sql, $stage, $id);
    }
    function user_rowid(){
        $sql = 'SELECT * FROM db_user';
        return pdo_query_all($sql);
    }
    function view_order($order_id){
        $sql = 'SELECT * FROM db_orderdetail WHERE order_id = ?';
        return pdo_query_all($sql, $order_id);
    }
?>