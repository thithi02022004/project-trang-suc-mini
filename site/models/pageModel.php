<?php
    include_once '../system/Database.php';
    function brand_home(){
        $sql = 'SELECT * FROM db_brand';
        return pdo_query_all($sql);
    }
    
?>