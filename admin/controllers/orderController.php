<?php
extract($_REQUEST);
//Lấy đường dẫn mặc định
$path = 'views/pages/order/';
include_once 'models/orderModel.php';
if (isset($act)) {
    switch ($act) {
        case 'confirm':
            $row = order_rowid($id);
            if ($row['stage'] == 1) {
                $stag = ($row['stage'] == 1) ? 2 : 1;
                $stage = $stag;
                // var_dump($stage); die();
                order_confirm($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Xác nhận đơn hàng thành công']);
                redirect('index.php?option=order');
            }
            require_once $path . 'index.php';
            break;
        case 'processing':
            $row = order_rowid($id);
            if ($row['stage'] == 2) {
                $stag = ($row['stage'] == 2) ? 3 : 2;
                $stage = $stag;
                // var_dump($stage); die();
                order_confirm($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => 'Đang tiến hành xử lý']);
                redirect('index.php?option=order');
            }
            require_once $path . 'index.php';
            break;
        case 'transport':
            $row = order_rowid($id);
            if ($row['stage'] == 3) {
                $stag = ($row['stage'] == 3) ? 5 : 3;
                $stage = $stag;
                // var_dump($stage); die();
                order_confirm($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => ' Đang tiến hành giao hàng']);
                redirect('index.php?option=order');
            }
            require_once $path . 'index.php';
            break;
        case 'success':
            $row = order_rowid($id);
            if ($row['stage'] == 5) {
                $stag = ($row['stage'] == 5) ? 6 : 5;
                $stage = $stag;
                // var_dump($stage); die();
                order_confirm($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => ' Đơn hàng thành công']);
                redirect('index.php?option=order');
            }
            break;
        case 'cancel':
            $row = order_rowid($id);
            if ($row['stage'] == 4) {
                $stag = ($row['stage'] == 4) ? 6 : 4;
                $stage = $stag;
                // var_dump($stage); die();
                order_confirm($stage, $id);
                set_flash('message', ['type' => 'success', 'msg' => ' Đơn hủy thành công']);
                redirect('index.php?option=order');
            }
            break;
        case 'trash':
            $list_order = order_all('trash');
            require_once $path . 'trash.php';
            break;
        case 'delete':
           
            break;
        case 'orderdetail':
            $created_at = date('Y-m-d H:i:s');
            $exported_at = date('Y-m-d H:i:s');
            $row = order_rowid($id);
            $row_detail = order_rowid_detail($row['id']);
            // var_dump($row_detail); die();
            require_once $path . 'indexdetail.php';
            break;
        default:
            $list_order = order_all('index');
            require_once $path . 'index.php';
            break;
    }
} else {
    $list_order = order_all('index');
    require_once $path . 'index.php';
}
