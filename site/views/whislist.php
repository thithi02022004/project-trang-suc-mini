<!-- main-container -->
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-xs-12">
                <div class="col-main">
                <div class="my-account">
                        <div class="page-title">
                            <h2>Danh sách yêu thích</h2>
                            <a href="index.php?option=user&act=account" class="btn btn-reorder" style="margin-left: 20px;">Quay lại</a>
                        </div>
                        <div class="dashboard">
                            <div class="recent-orders">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-responsive table-bordered text-left my-orders-table">
                                        <thead>
                                            <tr class="first last">
                                                <th>#</th>
                                                <th width="150px">Hình ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Chất liệu</th>
                                                <th>Kích cỡ</th>
                                                <th><span class="nobr">Đơn giá</span></th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach ($wish_list as $key => $row) : ?>
                                                <tr>
                                                    <td class="text-center"><input type="checkbox" name="checkid[]" value="<?=$row['id']?>"></td>
                                                    <td class="text-center">
                                                        <img src="../public/images/product/<?=$row['product']['image_list']?> ">
                                                    </td>
                                                    <td class="text-center"><?=$row['product']['name']?></td>
                                                    <td class="text-center"><?=$row['product']['material']?></td>
                                                    <td class="text-center"><?=$row['product']['zname']?></td>
                                                    <td class="text-center"><?=$row['product']['price']?></td>
                                                    <td class="text-center"></td>
                                                </tr>


                                            <?php endforeach ?>
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
                    <div class="block-title">Tài khoản</div>
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