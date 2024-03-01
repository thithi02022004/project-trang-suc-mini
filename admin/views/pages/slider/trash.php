
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php?option=slider">danh mục</a></li>
                        <li class="breadcrumb-item active">Thùng rác danh mục</li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý thùng rác danh mục</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="index.php?option=slider">
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
                                        <th class="text-center">Thông tin danh mục</th>
                                        <th class="text-center" width="100px">Vị trí</th>
                                        <th class="text-center" width="100px">Chức năng</th>
                                        <th class="text-center" width="10px">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($slider_list as $key => $row) : ?>
                                    <tr>        
                                        <td class="text-center"><input type="checkbox" name="checkid[]" value="<?=$row['id']?>"></td>
                                        <td class="text-center">
                                            <img width="170px" src="../public/images/slider/<?=$row['img']?>">
                                        </td>
                                        <td class="text-left">
                                            Tên slide: <?=$row['name']?>
                                            <br>
                                            Thông tin 1: <?=$row['info1']?>
                                            <br>
                                            Thông tin 2: <?=$row['info2']?>
                                            <br>
                                            Thông tin 3: <?=$row['info3']?>
                                        </td>
                                        <td class="text-center">
                                            <?=$row['position']?>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="index.php?option=slider&act=retrash&id=<?= $row['id']; ?>"><i class="fa fa-undo"></i></a>
                                            <a class="btn btn-sm btn-danger" href="index.php?option=slider&act=delete&id=<?= $row['id']; ?>"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <?php endforeach ?>
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