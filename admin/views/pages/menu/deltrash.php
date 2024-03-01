<?php
$menu = loadModel('Menu');
$id = $_REQUEST['id'];
$row = $menu->menu_rowid($id);
if ($row == NULL) {
    set_flash('message', ['type' => 'error', 'msg' => 'Menu này không tồn tại!']);
    redirect('index.php?option=menu');
} else {
    $data = array(
        'status' => 0,
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['user_id']
    );
    //Cập nhật lại dữ liệu
    $menu->menu_update($data, $id);
    set_flash('message', ['type' => 'success', 'msg' => 'Xoá Menu vào thùng rác thành công']);
    redirect('index.php?option=menu');
}
