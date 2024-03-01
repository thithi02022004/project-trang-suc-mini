<?php
extract($_REQUEST);
if (!isset($_SESSION)) {
    session_start();
    
  }
//   session_destroy();

  require_once '../system/Database.php';
  require_once '../system/myFunction.php';
  require_once '../system/form_control.php';
  require_once '../system/auth.php';
  require_once 'models/categoryModel.php';
  require_once 'models/productModel.php';
  require_once 'models/cartModel.php';
  // require_once 'models/userModel.php';
  if (isset($_SESSION['cart'])) {
      $list = cart_content();
      $total_product = total_cart();
      $total_qty = total_cart_qty();
      $total_price = total_price_cart();
  }

if (isset($option)) {
    switch ($option) {
        case 'page':
            require_once 'controllers/pageController.php';
            break;
        case 'cart':
            require_once 'controllers/cartController.php';
            break;
        case 'user':
            require_once 'controllers/userController.php';
            break;
    }
} else {
    header('location: ?option=page&act=home');
}
