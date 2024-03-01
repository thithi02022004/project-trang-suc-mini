<ul class="links">
    <!-- <li><a title="Trang chủ" href="index.php">Trang chủ</a></li>
    <li><a title="Sản phẩm" href="index.php?option=page&act=product">Sản phẩm</a></li>
    <li><a title="Bài viết" href="index.php?option=page&act=blog">Bài viết</a></li>
    <li><a title="Về chúng tôi" href="index.php?option=page&act=about">Về chúng tôi</a></li> -->
    
    
    <?php if (isset($_SESSION['user'])) : ?>
        <li><a title="Tài khoản" href="index.php?option=user&act=account">Xin chào, <?= $_SESSION['user']['fullname']; ?></a></li>
        <li><a title="Đăng xuất" href="index.php?option=user&act=logout">Đăng xuất</a></li>
    <?php else : ?>
        <li><a title="Đăng nhập" href="index.php?option=user&act=login">Đăng nhập</a></li>
        <li><a title="Đăng ký" href="index.php?option=user&act=register">Đăng ký</a></li>
    <?php endif; ?>
   
</ul>