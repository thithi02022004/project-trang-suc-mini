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
                        <li class="breadcrumb-item"><a href="?option=order">Danh sách đơn hàng</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng #<?= $id ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Helios E-Commerece Jewelry
                                    <small class="float-right">Ngày tạo: <?=$created_at?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin khách hàng
                                <address>
                                    Họ tên: <strong><?=$row['customer_name']?></strong><br>
                                    Địa chỉ: <?=$row['customer_address']?><br>
                                    Điện thoại: <?=$row['customer_phone']?><br>
                                    Email: <?=$row['customer_email']?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Hoá đơn số:</b> <?=$row['id']?><br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center" width="150px">Hình ảnh</th>
                                            <th class="text-center">Tên sản phẩm</th>
                                            <th class="text-center">Chất liệu</th>
                                            <th class="text-center">Kích cỡ</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center"><span class="nobr">Đơn giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <?php foreach ($row_detail as $key => $item) : ?>
                                                <tr>
                                                    <td class="text-center"><?=$item['order_id']?> </td>
                                                    <td class="text-center"><img style="width: 130px;" src="../public/images/product/<?=$item['product_img']?>" alt=""></td>
                                                    <td class="text-center"><?=$item['product_name']?> </td>
                                                    <td class="text-center"><?=$item['material']?> </td>
                                                    <td class="text-center"><?=$item['size']?> </td>
                                                    <td class="text-center"><?=$item['quantity']?> </td>
                                                    <td class="text-center"><?=number_format($item['price'])?>  VNĐ</td>
                                                </tr>


                                            <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Tạm tính:</th>
                                            <td>$250.30</td>
                                        </tr>
                                        <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$10.34</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền đơn hàng:</th>
                                            <td> VNĐ</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>