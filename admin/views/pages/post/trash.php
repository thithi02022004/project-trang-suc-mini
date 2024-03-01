

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tất cả bài viết</li>
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
                                <h3 class="card-title font-weight-bold py-2">Quản lý lưu trữ bài viết</h3>
                                <div class="card-tools">
                                    <a class="btn btn-info" href="index.php?option=post">
                                        <i class="fa fa-arrow-left"></i> Thoát
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php require_once 'views/modules/message.php' ?>
                            <table id="datatable" class="table table-bordered table-striped table-compact table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Hình</th>
                                        <th class="text-center">Tên bài viết</th>
                                        <th class="text-center">Loại bài viết</th>
                                        <th class="text-center">Chức năng</th>
                                        <th class="text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($post_all as $row) : ?>
                                        <?php $id = $row['id'] ?>
                                        <tr>
                                            <td class="text-center px-auto py-auto mx-auto my-auto" style="width: 80px;">
                                                <img src="../public/images/post/<?= $row['img']; ?>" class="img img-fuild img-thumbnail">
                                            </td>
                                            <td class="text-center">
                                                Name: <?= $row['title']; ?> <br>
                                            </td>
                                            <td class="text-center"><?= $row['topname']; ?></td>
                                            <td class="text-center px-auto py-auto mx-auto my-auto" style="width:120px">
                                                <a class="btn btn-sm btn-info" title="Undo from trash" href="index.php?option=post&act=retrash&id=<?= $id; ?>"><i class="fa fa-undo"></i></a>
                                                <a class="btn btn-sm btn-danger" title="Delete forever" href="index.php?option=post&act=delete&id=<?= $id; ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td class="text-center" style="width:auto"><?= $id; ?></td>
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