<?php
$html_role = '';
foreach ($user_list as $item) {
    if ($item['id'] == $row['role']) {
        $html_role .= '<option selected value="' . $item['id'] . '">' . $item['role'] . '</option>';
    } else {
        $html_role .= '<option value="' . $item['id'] . '">' . $item['role'] . '</option>';
    }
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh mục sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=user">Danh mục sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="index.php?option=user&act=update" method="post" enctype="multipart/form-data">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Cập nhật tài khoản quản trị</h3>
                        <div class="card-tools">
                            <button type="submit" name="CAPNHATUSER" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=user">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="fullname">Tên quản trị viên (*)</label>
                                <input type="text" id="fullname" name="fullname" class="form-control" value="<?php echo $row['fullname'];; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Tên tài khoản quản trị viên (*)</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            </div>
                            <!-- <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Mật khẩu (*)</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="repassword">Xác nhận Mật khẩu (*)</label>
                                    <input type="password" id="repassword" name="repassword" class="form-control" required>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email (*)</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
                                </div>
                                <div class=" form-group col-md-6">
                                    <label for="phone">Phone (*)</label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="address">Địa Chỉ (*)</label>
                                    <input type="address" id="address" name="address" class="form-control" value="<?php echo $row['address']; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rank_id">Cấp bậc (*)</label>
                                    <input type="rank_id" id="rank_id" name="rank_id" class="form-control" value="<?php echo $row['rank_id']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role">Phân quyền:</label>
                                <select id="role" name="role" class="form-control custom-select">
                                    <option value="amdin">admin</option>
                                    <option value="SEO manager">SEO Manager</option>
                                    <option value="content">content</option>
                                    <option value="Writer">Writer</option>
                                </select>
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh đại diện (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Giới tính:</label>
                                <select id="gender" name="gender" class="form-control custom-select">
                                    <option value="1" <?php if ($row['gender'] == 1) {
                                                            echo "selected";
                                                        } ?>>Nam</option>
                                    <option value="2" <?php if ($row['gender'] == 2) {
                                                            echo "selected";
                                                        } ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option selected>[--- Trạng thái tài khoản ---]</option>
                                    <option value="1" <?php if ($row['status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Kích hoạt</option>
                                    <option value="2" <?php if ($row['status'] == 2) {
                                                            echo "selected";
                                                        } ?>>Tạm ngưng kích hoạt</option>
                                    <option value="0" <?php if ($row['status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Lưu trữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="CAPNHATUSER" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=user">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>
<script>
    $(function() {
        //Initialize Elements
        $('.select2').select2()
    });
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>