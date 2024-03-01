<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">Thùng rác sản phẩm</li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý thùng rác sản phẩm</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="index.php?option=product">
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
                                        <th class="text-center" width="100px">Hình</th>
                                        <th class="text-center" width="200px">Thông tin sản phẩm</th>
                                        <th class="text-center" width="100px">Loại sản phẩm</th>
                                        <th class="text-center" width="100px">Chức năng</th>
                                        <th class="text-center" width="10px">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($product_list as $row) : ?>
                                        <tr>
                                            <td class="text-center"><input type="checkbox" name="checkid[]" value="<?= $row['id']; ?>"></td>
                                            <td class="text-center">
                                                <div id="imageSlider<?= $row['id']; ?>" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <?php foreach ($row['image'] as $key => $img) : ?>
                                                            <div class="carousel-item <?= ($key === 0) ? 'active' : ''; ?>">
                                                                <img src="../public/images/product/<?= $img['image']; ?>" class="d-block w-100" alt="Image">
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#imageSlider<?= $row['id']; ?>" data-slide="prev">
                                                        <span class="carousel-control-prev-icon"></span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#imageSlider<?= $row['id']; ?>" data-slide="next">
                                                        <span class="carousel-control-next-icon"></span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                Name: <?= $row['name']; ?> <br>
                                                Size: <?= $row['size']; ?><br>
                                                Quantity: <?= $row['quantity']; ?><br>
                                                Views: <?= $row['view']; ?>
                                            </td>
                                            <td class="text-center"><?= $row['categoryName'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" title="Undo from trash" href="index.php?option=product&act=retrash&id=<?= $row['id']; ?>"><i class="fa fa-undo"></i></a>
                                                <a class="btn btn-sm btn-danger" title="Delete forever" href="index.php?option=product&act=delete&id=<?= $row['id']; ?>"><i class="fa fa-trash"></i></a>
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