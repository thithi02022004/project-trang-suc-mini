<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/topic/';
include_once 'models/topicModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            $topic_list = topic_all('index');
            if (isset($THEMTOPIC)) {
                    $slug = str_slug($_POST['name']);
                    topic_insert($name, $slug, $parentid, ($_POST['orders'] + 1), $status);
                    set_flash('message', ['type' => 'success', 'msg' => 'Thêm chủ đề thành công!']);
                    redirect('index.php?option=topic&act=insert');
                    }
            require_once $path . 'insert.php';
            break;
        case 'update':
            $topic_list = topic_all('index');
            $row = topic_rowid($id);
            if (isset($CAPNHATTOPIC)) {
                $slug = str_slug($_POST['name']);
                topic_update($name, $slug, $parentid, $orders, $status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật chủ đề thành công!']);
                redirect('index.php?option=topic');
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = topic_rowid($id);
            if ($row['status'] == 1) {
                $sta = ($row['status'] == 1) ? 0 : 1;
                $status = $sta;
                topic_status_update($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật trạnh thái thành công!']);
                redirect('index.php?option=topic');
            }else {
                $row['status'] == 2;
                $sta = ($row['status'] == 2) ? 0 : 2;
                $status = $sta;
                topic_status_update($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật trạnh thái thành công!']);
                redirect('index.php?option=topic');
            }

            break;
        case 'retrash':
            $row = topic_rowid($id);
            if ($row['status'] == 0) {
                $sta = ($row['status'] == 0) ? 1 : 0;
                $status = $sta;
                topic_status_update($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật trạnh thái thành công!']);
                redirect('index.php?option=topic&act=trash');
            }
            break;
        case 'status':
            $row = topic_rowid($id);
            if ($row['status'] == 1) {
                $sta = ($row['status'] == 1) ? 2 : 1;
                $status = $sta;
                topic_status_update($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật trạnh thái thành công!']);
                redirect('index.php?option=topic');
            }else {
                $row['status'] == 2;
                $sta = ($row['status'] == 2) ? 1 : 2;
                $status = $sta;
                topic_status_update($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật trạnh thái thành công!']);
                redirect('index.php?option=topic');
            }
            break;
        case 'trash':
            $topic_list = topic_all('trash');
            require_once $path . 'trash.php';
            break;
        case 'delete':
            topic_delete($id);
            set_flash('message', ['type' => 'success', 'msg' => 'Xóa chủ đề thành công!']);
            redirect('index.php?option=topic&act=trash');
            break;
        default:
            $topic_list = topic_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $topic_list = topic_all('index');
    require_once $path . 'index.php';
}
