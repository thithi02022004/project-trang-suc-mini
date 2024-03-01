<?php
$slider = loadModel('Slider');
$id = $_REQUEST['id'];
$row = $slider->slider_rowid($id);
if ($row == NULL) {
    set_flash('message', ['type' => 'error', 'msg' => 'Slider này không tồn tại!']);
    redirect('index.php?option=slider');
} else {
    //Xoá Slider
    if (file_exists(ADMIN_PATH_SLIDER . $row['img'])) {
        unlink(ADMIN_PATH_SLIDER . $row['img']);
    }
    $slider->slider_delete($id);
    set_flash('message', ['type' => 'success', 'msg' => 'Xoá Slider thành công']);
    redirect('index.php?option=slider&cat=trash');
}
