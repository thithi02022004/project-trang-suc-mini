<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Kho lưu trữ</li>
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
                                <h3 class="card-title font-weight-bold py-2">Danh sách khách hàng lưu trữ</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="index.php?option=customer">
                                        <i class="fa fa-arrow-left"></i> Thoát
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" style="width:100%" class="display table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">#</th>
                                        <th class="text-center" width="100px">Hình</th>
                                        <th class="text-center">Thông tin khách hàng</th>
                                        <th class="text-center">Ngày tạo</th>
                                        <th class="text-center" width="100px">Chức năng</th>
                                        <th class="text-center" width="10px">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user_list as $row) : ?>
                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="checkid[]" value="<?= $row['id']; ?>"></td>
                                            <td class="text-center">
                                                <img src="<?= '../public/images/user/' . $row['img']; ?>" style="width: 100%;" class="img img-fuild img-thumbnail">
                                            </td>
                                            <td>
                                                Họ tên: <?= $row['fullname']; ?> <br>
                                                Điện thoại: <?= $row['phone']; ?> <br>
                                                Email: <?= $row['email']; ?> <br>
                                            </td>
                                            <td class="text-center"><?= $row['created_at']; ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" href="index.php?option=customer&act=retrash&id=<?= $row['id']; ?>"><i class="fa fa-undo"></i></a>
                                                <a class="btn btn-sm btn-danger" href="index.php?option=customer&act=delete&id=<?= $row['id']; ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td class="text-center"><?= $row['id']; ?></td>
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