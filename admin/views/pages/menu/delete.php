<?php
$menu = loadModel('Menu');
$id = $_REQUEST['id'];
$row = $menu->menu_rowid($id);
if ($row == NULL) {
    set_flash('message', ['type' => 'error', 'msg' => 'Menu này không tồn tại!']);
    redirect('index.php?option=menu');
} else {
    //Xoá danh mục
    $menu->menu_delete($id);
    set_flash('message', ['type' => 'success', 'msg' => 'Xoá danh mục thành công']);
    redirect('index.php?option=menu&cat=trash');
}
