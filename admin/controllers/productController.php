<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/product/';
include_once 'models/productModel.php';
if (isset($act)) {
    switch ($act) {
        case 'insert':
            $product_size = product_size();
            $category_list = category_all();
            $brand_list = brand_all();
            if (isset($THEMSANPHAM)) {
                $slug = str_slug($_POST['name']);
                if (category_slug_exists($slug) == FALSE) {
                    $files = $_FILES['img'];
                    $fileName = $files['name'];
                    // var_dump($fileName); die();
                        foreach ($fileName as $key => $fName) {
                            move_uploaded_file($files['tmp_name'][$key],'../public/images/product/'.$fName );
                        }
                        product_insert($catid, $brid, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status);
                        $productid = product_getid();
                        foreach ($fileName as $key => $Pname) {
                            product_img($productid, $Pname);
                        }
                        set_flash('message', ['type' => 'success', 'msg' => 'Thêm sản phẩm mới thành công!']);
                        redirect('index.php?option=product&act=insert');
                }else {
                    set_flash('message', ['type' => 'warning', 'msg' => 'Sản phẩm đã tồn tại!']);
                    redirect('index.php?option=product&act=insert');
                }
            }
            require_once $path . 'insert.php';
            break;
        case 'update':
            $row = product_rowid($id);
            $category_list = category_all();
            $brand_list = brand_all();
            $product_imglist = product_imglist($id);
            if (isset($CAPNHATSANPHAM)) {
                $slug = str_slug($name);
                if (count($_FILES['img']['name']) > 1) {
                    product_imglist_folder_delete($id);
                    product_img_delete($id);
                   
                    // xử lý hình ảnh
                    for ($i = 0; $i < count($_FILES['img']['name']); $i++) { 
                        $files = $_FILES['img'];
                        $fileName = $files['name'];
                        foreach ($fileName as $key => $fName) {
                            move_uploaded_file($files['tmp_name'][$key],'../public/images/product/'.$fName );
                        }
                        product_update($catid, $brid, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status, $id);
                        $productid = product_getid();
                        foreach ($fileName as $key => $Pname) {
                            product_img($productid, $Pname);
                        }
                        
                    }
                    
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thông tin sản phẩm thành công!']);
                    redirect('index.php?option=product');
                }else {
                    //Cập nhật thông tin giữ nguyên hình ảnh cũ
                    product_update($catid, $brid, $name, $slug, $smdetail, $detail, $material, $size, $quantity, $price, $promotion, $status, $id);
                    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật thông tin sản phẩm thành công!']);
                    redirect('index.php?option=product');
                }
            }
            require_once $path . 'update.php';
            break;
        case 'deltrash':
            $row = product_rowid($id);
           if ($row['status'] == 2) {
            $sta = ($row['status'] == 2) ? 0 : 2; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'sản phẩm này không tồn tại!']);
                redirect('index.php?option=product');
            }else{
                $status = $sta;
                product_deltrash_retrash($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ sản phẩm thành công!']);
                redirect('index.php?option=product');
            }
           }else {
            $sta = ($row['status'] == 1) ? 0 : 1; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'sản phẩm này không tồn tại!']);
                redirect('index.php?option=product');
            }else{
                $status = $sta;
                product_deltrash_retrash($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Lưu trữ sản phẩm thành công!']);
                redirect('index.php?option=product');
            }
           }
            break;
        case 'retrash':
            $row = product_rowid($id);
            $sta = ($row['status'] == 0) ? 1 : 0; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'sản phẩm này không tồn tại!']);
                redirect('index.php?option=product&act=trash');
            }else{
                $status = $sta;
                product_deltrash_retrash($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Khôi phục sản phẩm thành công!']);
                redirect('index.php?option=product&act=trash');
            }
            break;
        case 'status':
            $row = product_rowid($id);
            $sta = ($row['status'] == 1) ? 2 : 1; 
            if ($row == null) {
                //Tránh trường hợp người quản trị viết id trực tiếp trên url
                set_flash('message', ['type' => 'warning', 'msg' => 'sản phẩm này không tồn tại!']);
                redirect('index.php?option=product');
            }else{
                $status = $sta;
                product_deltrash_retrash($status, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Đổi trạng thái sản phẩm thành công!']);
                redirect('index.php?option=product');
            }
            break;
        case 'trash':
            $product_list = product_all('trash');
            foreach ($product_list as $key => $value) {
                $list = product_imglist($value['id']);
                $product_list[$key]['image'] = $list;
            }
            require_once $path . 'trash.php';
            break;
        case 'delete':
          
            product_imglist_folder_delete($id);
            product_delete($id);
            set_flash('message', ['type' => 'success', 'msg' => 'xóa sản phẩm thành công!']);
            redirect('index.php?option=product&act=trash');
            break;
        default:
            $product_list = product_all('index');
            foreach ($product_list as $key => $value) {
                $list = product_imglist($value['id']);
                $product_list[$key]['image'] = $list;
            }
            require_once $path . 'index.php';
            break;
    }
} else {
    $product_list = product_all('index');
    foreach ($product_list as $key => $value) {
        $list = product_imglist($value['id']);
        $product_list[$key]['image'] = $list;
    }
    require_once $path . 'index.php';
}
