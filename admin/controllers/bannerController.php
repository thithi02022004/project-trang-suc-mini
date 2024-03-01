<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/banner/';
include_once 'models/bannerModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            if (isset($THEMBANNER)) {
                banner_insert($name, $link, $info1, $info2, $info3, $orders, $position, $_FILES['img']['name'], $status);
                $path = '../public/images/banner/';
                $fileName = $_FILES['img']['name'];
                $file_tmp_name = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp_name, $path . $fileName);
                set_flash('message', ['type' => 'success', 'msg' => 'Thêm Banner mới thành công!']);
                redirect('index.php?option=banner&act=insert');
            }
            
            require_once $path . 'insert.php';
            break;
        case 'update':
            $row = banner_rowid($id);
            if (isset($CAPNHATBANNER)) {
                
                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
                    if (file_exists('../public/images/banner/' . $row['img'])) {
                        unlink('../public/images/banner/' . $row['img']);
                    }
                    banner_update($name, $link, $position, $info1, $info2, $info3, $orders, $_FILES['img']['name'], $status, $id);
                    $path = '../public/images/banner/';
                    $fileName = $_FILES['img']['name'];
                    $file_tmp_name = $_FILES['img']['tmp_name'];
                    move_uploaded_file($file_tmp_name, $path . $fileName);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật Banner thành công!']);
                    redirect('index.php?option=banner');
                }else {
                    banner_update_info($name, $link, $position, $info1, $info2, $info3, $orders, $status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật Banner thành công!']);
                    redirect('index.php?option=banner');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = banner_rowid($id);
            if ($row['status'] == 2) {
                $sta = ($row['status'] == 2) ? 0 : 2;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'banner không tồn tại!']);
                    redirect('index.php?option=banner');
                }else {
                    $status = $sta;
                    banner_status($status, $id);
                    set_flash('message', ['type' => 'warning', 'msg' => 'Lưu trữ banner thành công!']);
                    redirect('index.php?option=banner');
                }
            }else {
                $row['status'] == 1;
                $sta = ($row['status'] == 1) ? 0 :1;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'banner không tồn tại!']);
                    redirect('index.php?option=banner');
                }else {
                    $status = $sta;
                    banner_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ banner thành công!']);
                    redirect('index.php?option=banner');
                }
            }
            break;
        case 'retrash':
            $row = banner_rowid($id);
            if ($row['status'] == 0) {
                $sta = ($row['status'] == 0) ? 1 : 0;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'banner không tồn tại!']);
                    redirect('index.php?option=banner&act=trash');
                }else {
                    $status = $sta;
                    banner_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục banner thành công!']);
                    redirect('index.php?option=banner&act=trash');
                }
            }
            break;
        case 'status':
            $row = banner_rowid($id);
            if ($row['status'] == 1) {
                $sta = ($row['status'] == 1) ? 2 : 1;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'banner không tồn tại!']);
                    redirect('index.php?option=banner');
                }else {
                    $status = $sta;
                    banner_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Đổi trạng thái banner thành công!']);
                    redirect('index.php?option=banner');
                }
            }else {
                $row['status'] == 2;
                $sta = ($row['status'] == 2) ? 1 : 2;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'banner không tồn tại!']);
                    redirect('index.php?option=banner');
                }else {
                    $status = $sta;
                    banner_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Đổi trạng thái banner thành công!']);
                    redirect('index.php?option=banner');
                }
            }
            break;
        case 'trash':
            $banner_list = banner_all('trash');
            require_once $path . 'trash.php';
            
            break;
        case 'delete':
            $row = banner_rowid($id);
            if (file_exists('../public/images/banner/' . $row['img'])) {
                unlink('../public/images/banner/' . $row['img']);
            }
            banner_delete($id);
            set_flash('message', ['type' => 'success', 'msg' => 'Xóa bỏ banner thành công!']);
            redirect('index.php?option=banner&act=trash');
            break;
        default:
            $banner_list = banner_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $banner_list = banner_all('index');
    // var_dump($banner_list); die();
    require_once $path . 'index.php';
}
