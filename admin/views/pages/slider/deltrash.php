<?php
$slider = loadModel('Slider');
$id = $_REQUEST['id'];
$row = $slider->slider_rowid($id);
if ($row == NULL) {
    set_flash('message', ['type' => 'error', 'msg' => 'Slider này không tồn tại!']);
    redirect('index.php?option=slider');
} else {
    $data = array(
        'status' => 0,
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['user_id']
    );
    //Cập nhật lại dữ liệu
    $slider->slider_update($data, $id);
    set_flash('message', ['type' => 'success', 'msg' => 'Xoá Slider vào thùng rác thành công']);
    redirect('index.php?option=slider');
}
