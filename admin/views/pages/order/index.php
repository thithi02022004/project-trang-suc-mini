<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title font-weight-bold py-2">Danh sách đơn hàng</h3>
                                <div class="card-tools">
                                    <a class="btn btn-primary" href="index.php?option=order&act=insert">
                                        <i class="fa fa-plus"></i> Thêm mới
                                    </a>
                                    <a class="btn btn-secondary" href="index.php?option=order&act=trash">
                                        <i class="fa fa-trash"></i> Thùng rác
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">ID</th>
                                        <th class="text-center">Thông tin khách hàng</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Ngày tạo hoá đơn</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center" width="100px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($list_order as $row) : ?>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>
                                                <strong>+ Tên: <?=$row['customer_name']?></strong><br>
                                                --------------------------------------------- <br>
                                                + Sđt: <?=$row['customer_phone']?><br>
                                                + Email: <?=$row['customer_email']?><br>
                                                + Địa chỉ: <?=$row['customer_address']?><br>
                                            </td>
                                            <td class="text-center">
                                            <?=number_format($row['price_all'])?> VNĐ
                                            </td>
                                            <td class="text-center">
                                            <?=$row['created_at']?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($row['stage'] == 1) : ?>
                                                    <a class="btn btn-sm btn-warning" href="index.php?option=order&act=confirm&id=<?= $row['id']; ?>" style="width: 85%;margin-bottom:5px; text-align: center;">Xác nhận</a>
                                                <?php elseif ($row['stage'] == 2) : ?>
                                                    <a class="btn btn-sm btn-info" href="index.php?option=order&act=processing&id=<?= $row['id']; ?>" style="width: 85%;margin-bottom:5px; text-align: center;">Đang xử lý</a>
                                                <?php elseif ($row['stage'] == 3) : ?>
                                                    <a class="btn btn-sm btn-info" href="index.php?option=order&act=transport&id=<?= $row['id']; ?>" style="width: 85%;margin-bottom:5px; text-align: center;">Đang giao hàng</a>
                                                <?php elseif ($row['stage'] == 4) : ?>
                                                    <a class="btn btn-sm btn-danger" href="index.php?option=order&act=cancel&id=<?= $row['id']; ?>" style="width: 85%;margin-bottom:5px; text-align: center;">Hủy Đơn</a>
                                                <?php elseif ($row['stage'] == 5) : ?>
                                                    <a class="btn btn-sm btn-success" href="index.php?option=order&act=success&id=<?= $row['id']; ?>" style="width: 85%;margin-bottom:5px; text-align: center;">Đã giao hàng</a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" href="index.php?option=order&act=orderdetail&id=<?= $row['id']; ?>" style="width: 85%;margin-bottom:5px; text-align: center;"> Chi tiết</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->