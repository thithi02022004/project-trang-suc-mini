
<?php
$menu = loadModel('Menu');
$id = $_REQUEST['id'];
$row = $menu->menu_rowid($id);
if ($row == NULL) {
    set_flash('message', ['type' => 'error', 'msg' => 'Menu này không tồn tại!']);
    redirect('index.php?option=menu');
} else {
    $stat = ($row['status'] == 1) ? 2 : 1;
    $data = array(
        'status' => $stat,
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['user_id']
    );
    //Cập nhật lại dữ liệu
    $menu->menu_update($data, $id);
    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật trạng thái Menu thành công']);
    redirect('index.php?option=menu');
}
