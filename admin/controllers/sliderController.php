<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/slider/';
include_once 'models/sliderModel.php';
include_once 'models/categoryModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            $slider_list = slider_all('index');
            $category_list = category_all('index');
            if (isset($THEMSLIDER)) {
                slider_insert($name, $link, $position, $info1, $info2, $info3, $_FILES['img']['name'], $orders, $status);
                $fileName = $_FILES['img']['name'];
                $path = '../public/images/slider/';
                $file_tmp_name = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp_name, $path . $fileName);
                set_flash('message', ['type' => 'success', 'msg' => 'Thêm Slideshow thành công!']);
                redirect('index.php?option=slider&act=insert');
            }
            require_once $path . 'insert.php';
            break;
        case 'update':
            $category_list = category_all('index');
            $row = slider_rowid($id);
            if (isset($CAPNHATSLIDER)) {
                // var_dump($_REQUEST); die();
                $fileName = $_FILES['img']['name'];
                $path = '../public/images/slider/';
                $file_tmp_name = $_FILES['img']['tmp_name'];
                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
                    if (file_exists('../public/images/slider/' . $row['img'])) {
                        unlink('../public/images/slider/' . $row['img']);
                    }
                    slider_update($name, $link, $position, $info1, $info2, $info3, $_FILES['img']['name'], $orders, $status, $id);
                    move_uploaded_file($file_tmp_name, $path . $fileName);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật Slideshow thành công!']);
                    redirect('index.php?option=slider');
                }else {
                    slider_update_info($name, $link, $position, $info1, $info2, $info3, $orders, $status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật Slideshow thành công!']);
                    redirect('index.php?option=slider');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = slider_rowid($id);
            if ($row['status'] == 2) {
                $sta = ($row['status'] = 2) ? 0 : 2;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Slider không tồn tại!']);
                    redirect('index.php?option=slider');
                }else {
                    $status = $sta;
                    slider_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ thành công!']);
                    redirect('index.php?option=slider');
                }
            }else {
                $row['status'] == 1;
                $sta = ($row['status'] = 1) ? 0 : 1;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Slider không tồn tại!']);
                    redirect('index.php?option=slider');
                }else {
                    $status = $sta;
                    slider_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ thành công!']);
                    redirect('index.php?option=slider');
                }
            }
            break;
        case 'retrash':
            $row = slider_rowid($id);
            if ($row['status'] == 0) {
                $sta = ($row['status'] == 0) ? 1 : 0;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Slider không tồn tại!']);
                    redirect('index.php?option=slider&act=trash');
                }else {
                    $status = $sta;
                    slider_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục thành công!']);
                    redirect('index.php?option=slider&act=trash');
                }
            }
            break;
        case 'status':
            $row = slider_rowid($id);
            if ($row['status'] == 1) {
                $sta = ($row['status'] = 1) ? 2 : 1;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Slider không tồn tại!']);
                    redirect('index.php?option=slider');
                }else {
                    $status = $sta;
                    slider_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Đổi thành công!']);
                    redirect('index.php?option=slider');
                }
            }else {
                $row['status'] == 2;
                $sta = ($row['status'] = 2) ? 1 : 2;
                if ($row == null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Slider không tồn tại!']);
                    redirect('index.php?option=slider');
                }else {
                    $status = $sta;
                    slider_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Đổi thành công!']);
                    redirect('index.php?option=slider');
                }
            }
            break;
        case 'trash':
            $slider_list = slider_all('trash');
            require_once $path . 'trash.php';
            
            break;
        case 'delete':
            $row = slider_rowid($id);
            slider_delete($id);
            if (file_exists('../public/images/slider/' . $row['img'])) {
                unlink('../public/images/slider/' . $row['img']);
            }
            set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công!']);
            redirect('index.php?option=slider&act=trash');
            break;
        default:
            $slider_list = slider_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $slider_list = slider_all('index');
    require_once $path . 'index.php';
}
