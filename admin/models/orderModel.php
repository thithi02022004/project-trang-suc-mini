
<?php
    include_once '../system/Database.php';
    function order_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_order WHERE stage = 1 || stage = 2 || stage = 3 || stage = 5';
        }else {
            $sql = 'SELECT * FROM db_order WHERE stage = 4 || stage = 6';
        }
        return pdo_query_all($sql);
    }
    function order_rowid_detail($order_id){
        $sql = 'SELECT * FROM db_orderdetail WHERE order_id = ?';
        return pdo_query_all($sql, $order_id);
    }
    function order_rowid($id){
        $sql = 'SELECT * FROM db_order WHERE id=?';
        return pdo_query_one($sql, $id);
    }
    function order_confirm($stage, $id){
        $sql = 'UPDATE db_order SET stage=? WHERE id=?';
        return pdo_execute($sql, $stage, $id);
    }
    
?>