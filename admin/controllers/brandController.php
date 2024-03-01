<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/brand/';
include_once 'models/brandModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            if (isset($THEMTHUONGHIEU)) {
                $slug = str_slug($_POST['name']);
                brand_insert($name,$slug,$_FILES['img']['name'],($_POST['orders'] + 1 ),$status);
                $path = '../public/images/brand/';
                $fileName = $_FILES['img']['name'];
                $file_tmp_name = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp_name, $path.$fileName);
                set_flash('message', ['type' => 'success', 'msg' => 'Thêm thương hiệu mới thành công!']);
                redirect('index.php?option=brand&act=insert');
            }
            require_once $path . 'insert.php';
            break;
        case 'update':
            $row = brand_rowid($id);
            if (isset($CAPNHATTHUONGHIEU)) {
                $slug = str_slug($_POST['name']);
                    $fileName = $_FILES['img']['name'];
                    $path = '../public/images/brand/';
                    $file_tmp_name = $_FILES['img']['tmp_name'];
                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
                    //Kiểm tra nếu có tồN tại hình cũ thì xoá hình cũ trong folder đi
                    if (file_exists('../public/images/brand/' . $row['img'])) {
                        unlink('../public/images/brand/' . $row['img']);
                    }
                    brand_update($name,$slug,$_FILES['img']['name'],($_POST['orders'] + 1),$status,$id);
                    move_uploaded_file($file_tmp_name, $path . $fileName);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thương hiệu thành công!']);
                    redirect('index.php?option=brand');
                }else {
                    brand_update_info($name,$slug,$orders,$status,$id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thương hiệu thành công!']);
                    redirect('index.php?option=brand');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = brand_rowid($id);
           if ($row['status'] == 2) {
            $sta = ($row['status'] == 2) ? 0 : 2; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'thương hiệu này không tồn tại!']);
                redirect('index.php?option=brand');
            }else{
                $status = $sta;
                product_update_status($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ thương hiệu thành công!']);
                redirect('index.php?option=brand');
            }
           }else {
            $row['status'] == 1;
            $sta = ($row['status'] == 1) ? 0 : 1; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'thương hiệu này không tồn tại!']);
                redirect('index.php?option=brand');
            }else{
                $status = $sta;
                product_update_status($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ thương hiệu thành công!']);
                redirect('index.php?option=brand');
            }
           }
            break;
        case 'retrash':
            $row = brand_rowid($id);
            if ($row['status'] == 0) {
             $sta = ($row['status'] == 0) ? 1 : 0; 
             if ($row == null) {
                 //Tránh trường hợp người quản trị viết id trực tiếp trên url
                 set_flash('message', ['type' => 'warning', 'msg' => 'thương hiệu này không tồn tại!']);
                 redirect('index.php?option=brand&act=trash');
             }else{
                 $status = $sta;
                 product_update_status($status, $id);
                 set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thương hiệu thành công!']);
                 redirect('index.php?option=brand&act=trash');
             }
            }
            break;
        case 'status':
            $row = brand_rowid($id);
            $sta = ($row['status'] == 1) ? 2 : 1; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'sản phẩm này không tồn tại!']);
                require_once $path . 'trash.php';
            }else{
                $status = $sta;
                product_update_status($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Đổi trạng thái sản phẩm thành công!']);
                require_once $path . 'trash.php';
            }
            break;
        case 'trash':
            $brand_all = brand_all('trash');
            require_once $path . 'trash.php';
            
            break;
        case 'delete':
            $row = brand_rowid($id);
            if ($row == NULL) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'error', 'msg' => 'Thương hiệu này không tồn tại!']);
                redirect('index.php?option=brand&act=trash');
            } else {
                //Xoá thương hiệu
                brand_delete($id);
                set_flash('message', ['type' => 'success', 'msg' => 'Xoá thương hiệu thành công']);
                redirect('index.php?option=brand&act=trash');
            }
            break;
        default:
        $brand_all = brand_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $brand_all = brand_all('index');
    require_once $path . 'index.php';
}
