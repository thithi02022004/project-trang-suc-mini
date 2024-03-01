<?php
    include_once '../system/Database.php';

    function customer_all($page){
        if ($page == 'index') {
            $sql = 'SELECT us.*, mb.rank_type as bmrank   
            FROM db_user as us
            JOIN db_member_card as mb ON us.rank_id = mb.id
            WHERE status != 0 ';
            return pdo_query_all($sql);
        }else {
            $sql = 'SELECT us.*, mb.rank_type as bmrank 
            FROM db_user as us
            JOIN db_member_card as mb ON us.rank_id = mb.id
            WHERE status = 0 ';
            return pdo_query_all($sql);
        }
    }
?>