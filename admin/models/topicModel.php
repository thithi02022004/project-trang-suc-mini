
<?php
    include_once '../system/Database.php';

   function topic_insert($name, $slug, $parentid, $orders, $status){
    $sql = 'INSERT INTO db_topic (name,slug,parent_id,orders,status) VALUES(?,?,?,?,?)';
    return pdo_execute($sql, $name, $slug, $parentid, $orders, $status);
   }
   function topic_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_topic WHERE status != 0 ORDER BY orders ASC';
            return pdo_query_all($sql);
        }else{
            $sql = 'SELECT * FROM db_topic WHERE status = 0 ORDER BY orders ASC';
            return pdo_query_all($sql);
        }
   }
   function topic_update($name, $slug, $parentid, $orders, $status, $id){
    $sql = 'UPDATE db_topic SET name=?, slug=?, parent_id=?, orders=?, status=? WHERE id=?';
    return pdo_execute($sql, $name, $slug, $parentid, $orders, $status, $id);
   }
   function topic_rowid($id){
    $sql = 'SELECT * FROM db_topic WHERE id=?';
    return pdo_query_one($sql, $id);
   }
   function topic_status_update($status, $id){
    $sql = 'UPDATE db_topic SET status = ? WHERE id=?';
    return pdo_execute($sql, $status, $id);
   }
   function topic_delete($id){
    $sql = 'DELETE FROM db_topic WHERE id=?';
    return pdo_execute($sql, $id);
   }





?>