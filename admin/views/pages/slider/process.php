<?php
//Dùng chung cho cả insert và update
$slider = loadModel('Slider');

if (isset($_POST['INSERT'])) {
    //Xử lý insert
    //Lấy data
    $data = array(
        'position' => $_POST['position'],
        'name' => $_POST['name'],
        'link' =>  $_POST['link'],
        'orders' => ($_POST['orders'] + 1),
        'status' => $_POST['status'],
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $_SESSION['user_id'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['user_id'],
    );
    //Xử lý hình ảnh
    if (!empty($_FILES['img']['name'])) {
        $file_name = $_FILES['img']['name'];
        $file_tmp_name = $_FILES['img']['tmp_name'];
        $name_img = $slug . '.' . get_duoi_file($file_name);
        $upload_path = ADMIN_PATH_SLIDER . $name_img;

        // Kiểm tra và xử lý tên file hình ảnh
        if (!move_uploaded_file($file_tmp_name, $upload_path)) {
            set_flash('message', ['type' => 'error', 'msg' => 'Tải lên hình ảnh thất bại!']);
            redirect('index.php?option=slider&cat=insert');
        }
        $data['img'] = $name_img;
    }
    $slider->slider_insert($data);
    set_flash('message', ['type' => 'success', 'msg' => 'Thêm slider mới thành công!']);
    redirect('index.php?option=slider');
}
//Xử lý update
if (isset($_POST['UPDATE'])) {
    //Lấy data
    $id = $_POST['id'];
    $row = $slider->slider_rowid($id);
    $data = array(
        'position' => $_POST['position'],
        'name' => $_POST['name'],
        'link' =>  $_POST['link'],
        'orders' => ($_POST['orders'] + 1),
        'status' => $_POST['status'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['user_id'],
    );
    // Xử lý hình ảnh (chỉ khi người dùng thay đổi hình ảnh)
    if (strlen($_FILES['img']['name']) != 0) {
        if (file_exists(ADMIN_PATH_SLIDER . $row['img'])) {
            unlink(ADMIN_PATH_SLIDER . $row['img']);
        }
        // Kiểm tra nếu file không rỗng
        $file_name = $_FILES['img']['name'];
        $file_tmp_name = $_FILES['img']['tmp_name'];
        $name_img = $slug . '.' . get_duoi_file($file_name);
        $upload_path = ADMIN_PATH_SLIDER . $name_img;
        if (!move_uploaded_file($file_tmp_name, $upload_path)) {
            //Lỗi trong quá trình xử lý upload
            set_flash('message', ['type' => 'warning', 'msg' => 'Lỗi upload hình ảnh!']);
            redirect('index.php?option=slider&cat=insert');
        }
        $data['img'] = $name_img;
    }
    $slider->slider_update($data, $id);
    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật slideshow thành công!']);
    redirect('index.php?option=slider');
}
