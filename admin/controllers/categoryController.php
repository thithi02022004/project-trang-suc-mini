<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/category/';
include_once 'models/categoryModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            if (isset($THEMDANHMUC)) {
                $slug = str_slug($_POST['name']);
                if (category_slug_exists($slug) == FALSE) {
                    //FALSE = không tồn tại slug đó
                    //Tiến hành lấy dữ liệu và thêm
                    category_insert($name, $slug, $parentid, ($_POST['orders'] + 1), $status);
                    set_flash('message', ['type' => 'success', 'msg' => 'Tạo danh mục mới thành công!']);
                    redirect('index.php?option=category');
                } else {
                    //Ngược lại là đã tồn  tại slug rồi, nên không thể thêm
                    set_flash('message', ['type' => 'warning', 'msg' => 'Tên danh mục đã tồn tại!']);
                    redirect('index.php?option=category&act=insert');
                }
            }
            require_once $path . 'insert.php';
            break;
        case 'update':
            //Lấy ra toàn bộ danh mục nhưng loại trừ id của danh mục hiện tại đang sửa
            //Sử dụng cho parent_id và orders
                // $list_category = category_all('index', $id);
            $row = category_rowid($id);      //Lấy ra danh mục hiện tại để lấy dữ liệu và sửa
            if (isset($CAPNHATDANHMUC)) {
                $slug = str_slug($_POST['name']);
                     //Kiểm tra đã tồn tại slug chưa
                if (category_slug_exists($slug, $id) == FALSE) {
                            //FALSE = không tồn tại slug đó
                            //Tiến hành lấy dữ liệu và sửa
                            //Kiểm tra danh mục có tồn tại danh mục con hay không
                    if (!category_has_children($id)) {
                            //Không tồn tại danh mục con
                        category_update($name, $slug, $parentid, $orders + 1, $status,$id);
                        set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật danh mục thành công!']);
                    }else{
                        //Có tồn tại danh mục con thì không cho sửa trạng thái danh mục
                        set_flash('message', ['type' => 'warning', 'msg' => 'Danh mục có danh mục con! Không thể thay đổi trạng thái!']);
                    }
                }else{
                    //Ngược lại là đã tồn  tại slug rồi, nên không thể thêm
                    set_flash('message', ['type' => 'warning', 'msg' => 'Tên danh mục này đã tồn tại!']);
                    redirect('index.php?option=category&act=update');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = category_rowid($id);
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'success', 'msg' => 'Danh mục này không tồn tại!']);
                redirect('index.php?option=category');
            }else {
                //Các trường hợp còn lại
                //Trường hợp danh mục này có tồn tại danh mục con và danh mục con đó status !=0
                //Nghĩa là danh mục con đó đang hoạt động -> không có xoá!
                //Trường hợp danh mục con có tồn tại sản phẩm và sản phẩm đó đang hoạt động -> không cho xoá
                $status = 0;
                category_deltrash($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Di chuyển danh mục vào kho lưu trữ thành công']);
                redirect('index.php?option=category');
            }

            break;
        case 'retrash':
            $row = category_rowid($id);
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'Danh mục này không tồn tại!']);
                redirect('index.php?option=category&act=trash');
            }else{
                $status = 1;
                category_retrash($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục danh mục thành công!']);
                redirect('index.php?option=category&act=trash');
            }
            break;
        case 'status':
            $row = category_rowid($id);
            $sta = ($row['status']== 1)? 2 : 1;
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'Danh mục này không tồn tại!']);
                redirect('index.php?option=category');
            }else{
                $status = $sta;
                category_status($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Đổi trạng thái danh mục thành công!']);
                redirect('index.php?option=category');
            }
            break;
        case 'trash':
            $category_list = category_all('trash');
            require_once $path . 'trash.php';
            break;
        case 'delete':
            $row = category_rowid($id);
            if ($row == null) {
                set_flash('message', ['type' => 'warning', 'msg' => 'Danh mục không tồn tại!']);
                redirect('index.php?option=category');
            }else {
                category_delete($id);
                set_flash('message', ['type' => 'success', 'msg' => 'Xóa danh mục thành công!']);
                redirect('index.php?option=category');
            }
            break;
        default:
            $category_list = category_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $category_list = category_all('index');
    require_once $path . 'index.php';
}
