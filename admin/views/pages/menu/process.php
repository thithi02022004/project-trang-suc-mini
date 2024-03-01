<?php
//Dùng chung cho cả insert và update
$menu = loadModel('Menu');
$category = loadModel('Category');
$topic = loadModel('Topic');
$page = loadModel('Post');

//Thêm loại sản phẩm vào menu
if (isset($_POST['ADD_CATEGORY'])) {
    if (isset($_POST['itemcat'])) {
        $list_catid = $_POST['itemcat'];
        foreach ($list_catid as $id) {
            $row = $category->category_rowid($id);
            $data = array(
                'name' => $row['name'],
                'type' => 'category',
                'link' => 'index.php?option=product&cat=' . $row['slug'],
                'tableid' => $row['id'],
                'parentid' => 0,
                'orders' => 0,
                'position' => $_POST['position'],
                'status' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $_SESSION['user_id'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $_SESSION['user_id'],
            );
            $menu->menu_insert($data);
        }
        set_flash('message', ['type' => 'success', 'msg' => 'Thêm loại sản phẩm vào menu thành công!']);
    } else {
        set_flash('message', ['type' => 'warning', 'msg' => 'Chưa chọn loại sản phẩm!']);
    }
    redirect('index.php?option=menu');
}
//Thêm trang đơn vào menu
if (isset($_POST['ADD_PAGE'])) {
    if (isset($_POST['itempage'])) {
        $list_pageid = $_POST['itempage'];
        foreach ($list_pageid as $id) {
            $row = $page->post_rowid($id);
            $data = array(
                'name' => $row['name'],
                'type' => 'page',
                'link' => 'index.php?option=page&cat=' . $row['slug'],
                'tableid' => $row['id'],
                'parentid' => 0,
                'orders' => 0,
                'position' => $_POST['position'],
                'status' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $_SESSION['user_id'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $_SESSION['user_id'],
            );
            $menu->menu_insert($data_page);
        }
        set_flash('message', ['type' => 'success', 'msg' => 'Thêm trang đơn vào menu thành công!']);
    } else {
        set_flash('message', ['type' => 'warning', 'msg' => 'Chưa chọn trang đơn!']);
    }
    redirect('index.php?option=menu');
}
//Thêm chủ đề bài viết vào menu
if (isset($_POST['ADD_TOPIC'])) {
    if (isset($_POST['itemtopic'])) {
        $list_topicid = $_POST['itemtopic'];
        foreach ($list_topicid as $id) {
            $row = $topic->topic_rowid($id);
            $data = array(
                'name' => $row['name'],
                'type' => 'topic',
                'link' => 'index.php?option=post&cat=' . $row['slug'],
                'tableid' => $row['id'],
                'parentid' => 0,
                'orders' => 0,
                'position' => $_POST['position'],
                'status' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $_SESSION['user_id'],
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $_SESSION['user_id'],
            );
            $menu->menu_insert($data);
        }
        set_flash('message', ['type' => 'success', 'msg' => 'Thêm chủ đề vào menu thành công!']);
    } else {
        set_flash('message', ['type' => 'warning', 'msg' => 'Chưa chọn chủ đề!']);
    }
    redirect('index.php?option=menu');
}
if (isset($_POST['ADD_CUSTOM'])) {
    if (isset($_POST['name'], $_POST['link']) && strlen($_POST['name'] != 0) && strlen($_POST['link'] != 0)) {
        $data = array(
            'name' => $_POST['name'],
            'type' => 'custom',
            'link' => $_POST['link'],
            'parentid' => 0,
            'orders' => 0,
            'position' => $_POST['position'],
            'status' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $_SESSION['user_id'],
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $_SESSION['user_id'],
        );
        $menu->menu_insert($data);
        set_flash('message', ['type' => 'success', 'msg' => 'Thêm menu custom thành công!']);
    } else {
        set_flash('message', ['type' => 'warning', 'msg' => 'Chưa nhập tên menu!']);
    }
    redirect('index.php?option=menu');
}
//Xử lý update
if (isset($_POST['UPDATE'])) {
    //Lấy data
    $id = $_POST['id'];
    $row = $menu->menu_rowid($id);
    $data = array(
        'name' => $_POST['name'],
        'link' => $_POST['link'],
        'parentid' => $_POST['parentid'],
        'orders' => ($_POST['orders'] + 1),
        'status' => $_POST['status'],
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $_SESSION['user_id'],
    );
    $menu->menu_update($data, $id);
    set_flash('message', ['type' => 'success', 'msg' => 'Cập nhật menu thành công!']);
    redirect('index.php?option=menu');
}
