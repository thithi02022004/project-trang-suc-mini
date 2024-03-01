<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=user">Danh sách</a></li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý thùng rác tài khoản quản trị viên</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="index.php?option=user">
                                        <i class="fa fa-arrow-left"></i> Thoát
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-striped table-compact table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="10px">#</th>
                                        <th class="text-center" width="100px">Ảnh đại diện</th>
                                        <th class="text-center" width="200px">Thông tin người dùng</th>
                                        <th class="text-center">Tài khoản</th>
                                        <th class="text-center">Cấp quản trị</th>
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
                                            <td class="text-left">
                                                FullName: <?= $row['fullname']; ?>
                                                <br>
                                                Email: <?= $row['email']; ?>
                                                <br>
                                                Phone: <?= $row['phone']; ?>
                                                <br>
                                                Giới tính: <?= $row['gender'] == 1 ? 'Nam' : 'Nữ'; ?>
                                                <br>
                                                Cấp bậc: <?= $row['rank_id']; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $row['username']; ?>
                                            </td>
                                            <td class="text-center"><?= $row['role']; ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" title="Undo from trash" href="index.php?option=user&act=retrash&id=<?= $row['id']; ?>"><i class="fa fa-undo"></i></a>
                                                <a class="btn btn-sm btn-danger" title="Delete forever" href="index.php?option=user&act=delete&id=<?= $row['id']; ?>"><i class="fa fa-trash"></i></a>
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