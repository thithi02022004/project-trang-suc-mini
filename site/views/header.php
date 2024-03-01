<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="description" content="Fabulous is a creative, clean, fully responsive, powerful and multipurpose HTML Template with latest website trends. Perfect to all type of fashion stores.">
    <meta name="keywords" content="HTML,CSS,womens clothes,fashion,mens fashion,fashion show,fashion week">
    <meta name="author" content="JTV">
    <title>Helios E-Commerece Jewelry Website</title>

    <!-- Favicons Icon -->
    <link rel="icon" href="../public/images/favicon.ico" type="image/x-icon" />

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" media="all">
</head>

<body class="cms-index-index cms-home-page">

    <!-- Mobile Menu -->
    <?php require_once 'modules/mobile_menu.php' ?>
    <div id="page">
        <!-- Header -->
        <header>
            <div class="header-container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-xs-12">
                            <div class="logo">
                                <a title="Helios E-Commerece" href="index.php">
                                    <img alt="Helios E-Commerece" src="../public/images/logo.png">
                                </a>
                            </div>
                            <div class="nav-icon">
                                <?php require_once 'modules/mega_menu.php' ?>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-9 col-xs-12 jtv-rhs-header">
                            <div class="jtv-mob-toggle-wrap">
                                <div class="mm-toggle"><i class="fa fa-reorder"></i><span class="mm-label">Menu</span></div>
                            </div>
                            <div class="jtv-header-box">
                                <div class="search_cart_block">
                                    <div class="search-box hidden-xs">
                                        <form id="search_mini_form" action="#" method="get">
                                            <input id="search" type="text" name="q" value="" class="searchbox" placeholder="Search entire store here..." maxlength="128">
                                            <button type="submit" title="Search" class="search-btn-bg" id="submit-button"><span class="hidden-sm">Search</span><i class="fa fa-search hidden-xs hidden-lg hidden-md"></i></button>
                                        </form>
                                    </div>
                                    <div class="right_menu">
                                        <div class="menu_top">
                                            <div class="top-cart-contain pull-right">
                                                <div class="mini-cart">
                                                    <div class="basket"><a class="basket-icon" href="index.php?option=cart&act=cart_view"><i class="fa fa-shopping-basket"></i> Giỏ Hàng <span>*</span></a>
                                                        <div class="top-cart-content">
                                                            <div class="block-subtitle">
                                                                <div class="top-subtotal">
                                                                    <?php if (!isset($total_qty)) : ?>
                                                                        Không có sản phẩm!
                                                                    <?php else: ?>
                                                                        <?=$total_qty?> Sản phẩm, 
                                                                    <?php endif; ?>
                                                                <span class="price">
                                                                    <?php if (!isset($total_price)) : ?>
                                                                        0 VNĐ
                                                                    <?php else: ?>
                                                                        <?=number_format($total_price)?> VNĐ
                                                                    <?php endif; ?>
                                                                </span></div>
                                                            </div>
                                                            <ul class="mini-products-list" id="cart-sidebar">
                                                            <?php if (isset($list)) :?>
                                                                <?php foreach ($list as $item) : ?>
                                                                        <li class="item">
                                                                            <div class="item-inner">
                                                                                <img class="product-image" src="../public/images/product/<?=$item['img']; ?>" alt="">
                                                                                <div class="product-details">
                                                                                    <div class="access">
                                                                                    <form action="?option=cart&act=cart_delete&id=<?= $item['id']?> ?.&size= <?= $item['size']?>" method="post">
                                                                                            <input type="hidden" name="return_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                                                                                            <button type="submit" title="Xoá sản phẩm này" class="btn-remove1" style="border:none;">
                                                                                                <span>Xoá</span>
                                                                                            </button>
                                                                                        </form>
                                                                                    </div>
                                                                                    <p class="product-name"><a href="product-detail.html"><?=$item['name']; ?></a></p>
                                                                                    <!-- Các thông tin khác về sản phẩm -->
                                                                                    <strong></strong> x<?=$item['qty']; ?> <span class="price"><?=$item['price']; ?> VNĐ</span>
                                                                                    <p class="product-name"><a href="#">Size: 
                                                                                        <?php if ($item['size'] !== null && $item['size'] !== '' && $item['size'] !== 0) : ?>
                                                                                            <?=$item['size']; ?>
                                                                                        <?php else: ?>
                                                                                            <?php unset($_SESSION['cart'])?>;
                                                                                        <?php endif; ?>
                                                                                    </a></p>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="id_mini_cart" value=" <?=$item['id']; ?>">
                                                                        </li>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                            <?php endif ?>
                                                            </ul>
                                                            <div class="actions"> <a href="shopping-cart.html" class="view-cart"><span>View Cart</span></a>
                                                                <button onclick="window.location.href='checkout.html'" class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="language-box hidden-xs">
                                            <select class="selectpicker" data-width="fit">
                                                <option>English</option>
                                                <option>Francais</option>
                                                <option>German</option>
                                                <option>Español</option>
                                            </select>
                                        </div>
                                        <div class="currency-box hidden-xs">
                                            <form class="form-inline">
                                                <div class="input-group">
                                                    <div class="currency-addon">
                                                        <select class="currency-selector">
                                                            <option data-symbol="$">USD</option>
                                                            <option data-symbol="€">EUR</option>
                                                            <option data-symbol="£">GBP</option>
                                                            <option data-symbol="¥">JPY</option>
                                                            <option data-symbol="$">CAD</option>
                                                            <option data-symbol="$">AUD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="top_section hidden-xs">
                                    <div class="toplinks">
                                        <div class="site-dir hidden-xs">
                                            <a class="hidden-sm" href="#">
                                                <i class="fa fa-phone"></i>
                                                <strong>Hotline:</strong> +1 123 456 7890
                                            </a>
                                            <a href="mailto:support@example.com">
                                                <i class="fa fa-envelope"></i> support@example.com
                                            </a>
                                        </div>
                                        <?php require_once 'modules/top_menu.php' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->