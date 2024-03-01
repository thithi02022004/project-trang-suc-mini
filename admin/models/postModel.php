
<?php
    include_once '../system/Database.php';

    function post_insert($title,$slug,$detail,$topid,$img,$type,$status){
        $sql = 'INSERT INTO db_post (title,slug,detail,topic_id,img,type,status) VALUES(?,?,?,?,?,?,?)';
        return pdo_execute($sql,$title,$slug,$detail,$topid,$img,$type,$status);
    }
    function topic_all($page){
        if ($page == 'index') {
            $sql = 'SELECT * FROM db_topic WHERE status != 0';
            return pdo_query_all($sql);
        }else {
            $sql = 'SELECT * FROM db_topic WHERE status = 0';
            return pdo_query_all($sql);
        }
    }
    function post_all($page){
        if ($page == 'index') {
            $sql = 'SELECT post.*,  topic.name as topname
            FROM db_post as post
            JOIN db_topic as topic ON post.topic_id = topic.id
            WHERE post.status != 0 ORDER BY post.id ASC';
            return pdo_query_all($sql);
        }else {
            $sql = 'SELECT post.*,  topic.name as topname
            FROM db_post as post
            JOIN db_topic as topic ON post.topic_id = topic.id
            WHERE post.status = 0 ORDER BY post.id ASC';
            return pdo_query_all($sql);
        }
    }
    function post_rowid($id){
        $sql = 'SELECT * FROM db_post WHERE id=?';
        return pdo_query_one($sql,$id);
    }
    function post_update($title,$slug,$detail,$topid,$img,$status,$id){
        $sql = 'UPDATE db_post SET title=?,slug=?,detail=?,topic_id=?,img=?,status=? WHERE id =?';
        return pdo_execute($sql,$title,$slug,$detail,$topid,$img,$status,$id);
    }
    function post_update_info($title,$slug,$detail,$topid,$status,$id){
        $sql = 'UPDATE db_post SET title=?,slug=?,detail=?,topic_id=?,status=? WHERE id =?';
        return pdo_execute($sql,$title,$slug,$detail,$topid,$status,$id);
    }
    function post_update_status($status, $id){
        $sql = 'UPDATE db_post SET status=? WHERE id=?';
        return pdo_execute($sql, $status, $id);
    }
    function post_delete($id){
        $sql = 'DELETE FROM db_post WHERE id=?';
        return pdo_execute($sql, $id);
    }
?>