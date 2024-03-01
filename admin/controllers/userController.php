<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/user/';
include_once 'models/userModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            if (isset($THEMUSER)) {
                var_dump($_REQUEST);
                if (user_exists($username) == FALSE) {
                        
                        $rank_id = 4;
                        user_insert($fullname, $username, $password, $email, $address, $gender, $phone, $_FILES['img']['name'], $role, $rank_id, $status);
                        $path = '../public/images/user/';
                        $fileName = $_FILES['img']['name'];
                        $file_tmp_name = $_FILES['img']['tmp_name'];
                        move_uploaded_file($file_tmp_name, $path . $fileName);
                        set_flash('message', ['type' => 'success', 'msg' => 'Thêm user thành công!']);
                        redirect('index.php?option=user&act=insert');
                   
                }else {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Tài khoản đã tồn tại!']);
                    redirect('index.php?option=user&act=insert');
                }
            }
            require_once $path . 'insert.php';
            break;
        case 'update':
            $user_list = user_all('index');
            $row = user_id($id);
            if (isset($CAPNHATUSER)) {
                $fileName = $_FILES['img']['name'];
                $path = '../public/images/user/';
                $file_tmp_name = $_FILES['img']['tmp_name'];
                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
                    if (file_exists('../public/images/user/' . $row['img'])) {
                        unlink('../public/images/user/' . $row['img']);
                    }
                    user_update($fullname, $username, $password, $email, $address, $gender, $phone, $_FILES['img']['name'], $role, $rank_id, $status, $id);
                    move_uploaded_file($file_tmp_name, $path . $fileName);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thành công!']);
                    redirect('index.php?option=user');
                }else {
                    user_update_info($fullname, $username, $password, $email, $address, $gender, $phone, $role, $rank_id, $status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'cập nhật thành công!']);
                    redirect('index.php?option=user');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = user_id($id);
            if ($row['status'] == 2) {
             $sta = ($row['status'] == 2) ? 0 : 2; 
             if ($row == null) {
                 //Tránh trường hợp người quản trị viết id trực tiếp trên url
                 set_flash('message', ['type' => 'warning', 'msg' => 'User này không tồn tại!']);
                 redirect('index.php?option=user');
             }else{
                 $status = $sta;
                 user_status($status, $id);
                 set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ User thành công!']);
                 redirect('index.php?option=user');
             }
            }else {
             $row['status'] == 1;
             $sta = ($row['status'] == 1) ? 0 : 1; 
             if ($row == null) {
                 //Tránh trường hợp người quản trị viết id trực tiếp trên url
                 set_flash('message', ['type' => 'warning', 'msg' => 'User này không tồn tại!']);
                 redirect('index.php?option=user');
             }else{
                 $status = $sta;
                 user_status($status, $id);
                 set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ User thành công!']);
                 redirect('index.php?option=user');
             }
            }
            break;
        case 'retrash':
            $row = user_id($id);
            if ($row['status'] == 0) {
             $sta = ($row['status'] == 0) ? 1 : 0; 
             if ($row == null) {
                 //Tránh trường hợp người quản trị viết id trực tiếp trên url
                 set_flash('message', ['type' => 'warning', 'msg' => 'User này không tồn tại!']);
                 redirect('index.php?option=user');
             }else{
                 $status = $sta;
                 user_status($status, $id);
                 set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục User thành công!']);
                 redirect('index.php?option=user');
             }
            }
            break;
        case 'status':
            $row = user_id($id);
            if ($row['status'] == 1) {
             $sta = ($row['status'] == 1) ? 2 : 1; 
             if ($row == null) {
                 //Tránh trường hợp người quản trị viết id trực tiếp trên url
                 set_flash('message', ['type' => 'warning', 'msg' => 'User này không tồn tại!']);
                 redirect('index.php?option=user');
             }else{
                 $status = $sta;
                 user_status($status, $id);
                 set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái User thành công!']);
                 redirect('index.php?option=user');
             }
            }else {
             $row['status'] == 2;
             $sta = ($row['status'] == 2) ? 1 : 2; 
             if ($row == null) {
                 //Tránh trường hợp người quản trị viết id trực tiếp trên url
                 set_flash('message', ['type' => 'warning', 'msg' => 'User này không tồn tại!']);
                 redirect('index.php?option=user');
             }else{
                 $status = $sta;
                 user_status($status, $id);
                 set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái User thành công!']);
                 redirect('index.php?option=user');
             }
            }
          
            break;
        case 'trash':
            $user_list = user_all('trash');
            require_once $path . 'trash.php';
            break;
        case 'delete':
            user_delete($id);
            set_flash('message', ['type' => 'success', 'msg' => 'Xóa user thành công!']);
            redirect('index.php?option=user&act=trash');
            break;
        default:
            $user_list = user_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $user_list = user_all('index');
    require_once $path . 'index.php';
}
