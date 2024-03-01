<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/post/';
include_once 'models/postModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            $list_topic = topic_all('index');
            if (isset($THEMBAIVIET)) {
                $slug = str_slug($_POST['name']);
                post_insert($title,$slug,$detail,$topid,$_FILES['img']['name'],$type,$status);
                $fileName = $_FILES['img']['name'];
                $path = '../public/images/post/';
                $file_tmp_name = $_FILES['img']['tmp_name'];
                move_uploaded_file($file_tmp_name, $path. $fileName);
                set_flash('message', ['type' => 'success', 'msg' => 'Thêm bài viết mới thành công!']);
                redirect('index.php?option=post&act=insert');
            }
            require_once $path . 'insert.php';
            break;
        case 'update':
            $list_topic = topic_all('index');
            $row = post_rowid($id);
            if (isset($CAPNHATBAIVIET)) {
                $slug = str_slug($_POST['title']);
                $fileName = $_FILES['img']['name'];
                $path = '../public/images/post/';
                $file_tmp_name = $_FILES['img']['tmp_name'];
                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
                    post_update($title,$slug,$detail,$topid,$_FILES['img']['name'],$status,$id);
                    move_uploaded_file($file_tmp_name,$path.$fileName);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật bài viết thành công!']);
                    redirect('index.php?option=post');
                }else {
                    post_update_info($title,$slug,$detail,$topid,$status,$id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật bài viết thành công!']);
                    redirect('index.php?option=post');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row =post_rowid($id);
            if ($row['status'] == 2) {
                $sta = ($row['status'] == 2) ? 0 : 2;
                if ($row = null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Bài viết không tồn tại!']);
                    redirect('index.php?option=post');
                }else {
                    $status = $sta;
                    post_update_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ bài viết thành công!']);
                    redirect('index.php?option=post');
                }
            }else {
                $row['status'] == 1;
                $sta = ($row['status'] == 1) ? 0 : 1;
                if ($row = null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Bài viết không tồn tại!']);
                    redirect('index.php?option=post');
                }else {
                    $status = $sta;
                    post_update_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ bài viết thành công!']);
                    redirect('index.php?option=post');
                }
            }
            break;
        case 'retrash':
            $row =post_rowid($id);
            if ($row['status'] == 0) {
                $sta = ($row['status'] == 0) ? 1 : 0;
                if ($row = null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Bài viết không tồn tại!']);
                    redirect('index.php?option=post&act=trash');
                }else {
                    $status = $sta;
                    post_update_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục bài viết thành công!']);
                    redirect('index.php?option=post&act=trash');
                }
            }
            break;
        case 'status':
            $row =post_rowid($id);
                $sta = ($row['status'] == 1) ? 2 : 1;
                if ($row = null) {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Bài viết không tồn tại!']);
                    redirect('index.php?option=post');
                }else {
                    $status = $sta;
                    post_update_status($status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái bài viết thành công!']);
                    redirect('index.php?option=post');
                }
            break;
        case 'trash':
            $post_all = post_all('trash');
            require_once $path . 'trash.php';
            break;
        case 'delete':
            post_delete($id);
            set_flash('message', ['type' => 'success', 'msg' => 'Xóa bài viết thành công!']);
            redirect('index.php?option=post&act=trash');
            break;
        default:
            $post_all = post_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $post_all = post_all('index');
    require_once $path . 'index.php';
}
