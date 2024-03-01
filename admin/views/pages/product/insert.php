<?php
$html_catid = '';
$html_brid = '';
$html_size = '';
foreach ($category_list as $item) {
    $html_catid .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
}
foreach ($brand_list as $item) {
    $html_brid .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
}
foreach ($product_size as $item) {
    $html_size .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=product">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="index.php?option=product&act=insert" method="post" enctype="multipart/form-data">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2">Thêm sản phẩm</h3>
                        <div class="card-tools">
                            <button type="submit" name="THEMSANPHAM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=product">
                                <i class="fa fa-arrow-left"></i> Thoát
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm (*)</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="smdetail">Mô tả sản phẩm</label>
                                <textarea id="smdetail" name="smdetail" class="form-control" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="detail">Chi tiết sản phẩm</label>
                                <textarea id="detail" name="detail" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6 align-items-center">
                                <label for="size">Kích cỡ (*)</label>
                                <select id="size" name="size" class="form-control custom-select">
                                    <option value="">[--- Chọn kích cỡ ---]</option>
                                    <?= $html_size ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6 align-items-center">
                                <label for="material">Chất liệu (*)</label>
                                <input type="text" id="material" name="material" class="form-control" required>
                            </div>
                            </div>
                            <!-- <div class="row justify-content-between">
                                <div class="form-group row col-md-4 align-items-center">
                                    <label for="trending" class="col-md-7">Sản phẩm xu hướng</label>
                                    <input type="checkbox" name="trending" id="trending" class="form-control col-md-5" data-bootstrap-switch data-off-color="danger" data-on-color="info">
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="catid">Loại sản phẩm (*):</label>
                                <select id="catid" name="catid" class="form-control custom-select">
                                    <option value="">[--- Chọn loại sản phẩm ---]</option>
                                    <?= $html_catid ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brid">Thương hiệu (*):</label>
                                <select id="brid" name="brid" class="form-control custom-select">
                                    <option value="">[--- Chọn loại thương hiệu ---]</option>
                                    <?= $html_brid ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm:</label>
                                <input type="number" id="price" name="price" min="100000" value="100000" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="promotion">Phần trăm khuyến mãi:</label>
                                <input type="number" id="promotion" name="promotion" min="0" value="0" max="90" step="5" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng sản phẩm: </label>
                                <input type="number" id="quantity" name="quantity" min="1" value="1" class="form-control">
                            </div>
                            <div class="form-group align-items-center">
                                <label for="img">Hình ảnh sản phẩm (*):</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img" name="img[]" multiple onchange="updateFileNames()">
                                    <label class="custom-file-label" for="img">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái (*): </label>
                                <select id="status" name="status" class="form-control custom-select">
                                    <option selected>[--- Trạng thái sản phẩm ---]</option>
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Không xuất bản</option>
                                    <option value="0">Lưu trữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title font-weight-bold py-2"></h3>
                        <div class="card-tools">
                            <button type="submit" name="THEMSANPHAM" class="btn btn-success"><i class="fa fa-save"></i> Lưu[Thêm]</button>
                            <a class="btn btn-secondary" href="index.php?option=product">
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