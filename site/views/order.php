<!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2>Danh sách đơn hàng</h2>
                                </div>
                                <div class="col-sm-6">
                                    <!-- <?php if (has_flash('message')) : ?>
                                        <?php $error = get_flash('message'); ?>
                                        <div id="myAlert" style="margin: auto;" class="alert alert-<?= $error['type'] ?> " role="alert">
                                            <i class="fa fa-check"></i>
                                            <?= $error['msg']; ?>
                                        </div>
                                    <?php endif; ?> -->
                                </div>
                            </div>
                        </div>
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered datatable text-left my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Ngày đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th><span class="nobr">Tổng tiền</span></th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_order as $key => $row) :?>
                                                <?php if ($row['stage'] == 1 || $row['stage'] == 2 || $row['stage'] == 3 || $row['stage'] == 5):?>
                                                    <tr>
                                                        <td class="text-center"><?=$row['id']?></td>
                                                        <td class="text-center"><?=$row['created_at']?></td>
                                                        <td class="text-center"><?=$row['customer_address']?></td>
                                                        <td class="text-center"><?=number_format($row['price_all'])?> VNĐ</td>
                                                        <td class="text-center">
                                                            <?php if ($row['stage'] == 1) : ?>
                                                                Chờ Xác Nhận
                                                            <?php elseif ($row['stage'] == 2 || $row['stage'] == 3) : ?>
                                                                Đang giao hàng
                                                            <?php elseif ($row['stage'] == 5) : ?>
                                                                Đơn Hàng Đã Đến
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center" style="display: flex; flex-direction: column;">
                                                        <?php if ($row['stage'] == 1) : ?>
                                                            <a style="padding: 5px 15px 5px 15px;background-color: #fe5e5e;border-radius: 3px;color: white;" href="index.php?option=user&act=cancel&id=<?= $row['id']; ?>">Hủy Đơn</a>
                                                            <a style="padding: 5px 15px 5px 15px;background-color: #53afbb;border-radius: 3px;color: white;margin: 20px 0px 20px 0px;" href="#">Chi tiết</a>
                                                            <?php elseif ($row['stage'] == 2 || $row['stage'] == 3) : ?>
                                                            <a style="padding: 5px 15px 5px 15px;background-color: #53afbb;border-radius: 3px;color: white; margin-bottom:20px;" href="#">Chi tiết</a>
                                                            <?php elseif ($row['stage'] == 5) : ?>
                                                            <a style="padding: 5px 15px 5px 15px;background-color: #53afbb;border-radius: 3px;color: white; margin-bottom:20px;" href="#">Chi tiết</a>
                                                            <a style="padding: 5px 15px 5px 15px;background-color: #2fb800;border-radius: 3px;color: white;" href="index.php?option=user&act=received&id=<?= $row['id']; ?>">Đã Nhận</a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-main">
                    <div class="my-account">
                        <div class="page-title">
                            <h2>Lịch sử đơn hàng</h2>
                        </div>
                        <div class="dasboard" style="margin-top: 10px;">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered text-left datatable my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th>Ngày đặt</th>
                                                <th>Địa chỉ nhận</th>
                                                <th><span class="nobr">Tổng tiền</span></th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list_order as $key => $row) :?>
                                                <?php if ($row['stage'] == 4 || $row['stage'] == 6) :?>
                                                    <tr>
                                                        <td class="text-center"><?=$row['id']?></td>
                                                        <td class="text-center"><?=$row['created_at']?></td>
                                                        <td class="text-center"><?=$row['customer_address']?></td>
                                                        <td class="text-center"><?=number_format($row['price_all'])?></td>
                                                        <td class="text-center">
                                                            <?php if ($row['stage'] == 4) : ?>
                                                                <span style="color:red">Đã Hủy</span>
                                                            <?php elseif ($row['stage'] == 6) : ?>
                                                                <span style="color:green">Thành Công</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="text-center" style="    display: flex;flex-direction: column;">
                                                            <?php if ($row['stage'] == 4 || $row['stage'] == 6) : ?>
                                                                <a style="padding: 5px 15px 5px 15px;background-color: #3e7f96;border-radius: 3px;color: white;" href="index.php?option=user&act=orderdetail&id=<?= $row['id']; ?>">Chi Tiết</a><br>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <aside class="col-right sidebar col-sm-3 col-xs-12">
                <div class="block block-account">
                    <div class="block-title">Quản lý tài khoản</div>
                    <div class="block-content">
                        <ul>
                            <li><a href="?option=user&act=account"><i class="fa fa-angle-right"></i> Tài khoản</a></li>
                            <li><a href="?option=user&act=account-detail"><i class="fa fa-angle-right"></i> Thông tin tài khoản</a></li>
                            <li class="current"><a href="?option=user&act=history-orders"><i class="fa fa-angle-right"></i> Lịch sử đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<!--End main-container -->