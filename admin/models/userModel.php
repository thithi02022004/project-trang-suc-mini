<?php
    include_once '../system/Database.php';
function user_insert($fullname, $username, $password, $email, $address, $gender, $phone, $img, $role, $rank_id, $status){
    $sql = 'INSERT INTO db_user (fullname,username,password,email,address,gender,phone,img,role,rank_id,status) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
    return pdo_execute($sql, $fullname, $username, $password, $email, $address, $gender, $phone, $img, $role, $rank_id, $status);
}
function user_exists($username, $id = null){
    if ($id == null) {
        $sql = "SELECT count(*) FROM db_user WHERE username=?";
        return pdo_query_value($sql, $username) > 0;
    } else {
        $sql = "SELECT count(*) FROM db_user WHERE username=? AND id!=?";
        return pdo_query_value($sql, $username, $id) > 0;
    }
}
function user_all($page){
    if ($page == 'index') {
        $sql = 'SELECT us.*, mb.rank_type as bmrank   
        FROM db_user as us
        JOIN db_member_card as mb ON us.rank_id = mb.id
        WHERE status != 0';
        return pdo_query_all($sql);
    }else {
        $sql = 'SELECT us.*, mb.rank_type as bmrank 
        FROM db_user as us
        JOIN db_member_card as mb ON us.rank_id = mb.id
        WHERE status = 0';
        return pdo_query_all($sql);
    }
}
function user_id($id){
    $sql = 'SELECT * FROM db_user WHERE id = ?';
    return pdo_query_one($sql, $id);
}
function user_update($fullname, $username, $password, $email, $address, $gender, $phone, $img, $role, $rank_id, $status, $id){
    $sql = 'UPDATE db_user SET fullname =?, username=?, password=?, email=?, address =?, gender=?, phone=?, img=?, role=?, rank_id=?, status=? WHERE id=?';
    return pdo_execute($sql, $fullname, $username, $password, $email, $address, $gender, $phone, $img, $role, $rank_id, $status, $id);
}
function user_update_info($fullname, $username, $password, $email, $address, $gender, $phone, $role, $rank_id, $status, $id){
    $sql = 'UPDATE db_user SET fullname =?, username=?, password=?, email=?, address =?, gender=?, phone=?, role=?, rank_id=?, status=? WHERE id=?';
    return pdo_execute($sql, $fullname, $username, $password, $email, $address, $gender, $phone, $role, $rank_id, $status, $id);
}
function user_status($status, $id){
    $sql = 'UPDATE db_user SET status = ? WHERE id =?';
    return pdo_execute($sql, $status, $id);
}
function user_delete($id){
    $sql = 'DELETE FROM db_user WHERE id =?';
    return pdo_execute($sql, $id);
}

?>