  <!-- Revslider -->
  <?php require_once 'modules/slider.php'?>
  <!-- Support Policy Box -->
  <div class="container">
      <div class="support-policy-box">
          <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="support-policy"> <i class="fa fa-truck"></i>
                      <div class="content">Free Shipping on order over $49</div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="support-policy"> <i class="fa fa-phone"></i>
                      <div class="content">Need Help +1 123 456 7890</div>
                  </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="support-policy"> <i class="fa fa-refresh"></i>
                      <div class="content">30 days return Service</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Main Container -->
  <section class="main-container">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                  <div class="col-main">
                      <div class="jtv-featured-products">
                          <div class="slider-items-products">
                              <div class="jtv-new-title">
                                  <h2>Featured Products</h2>
                              </div>
                              <div id="featured-slider" class="product-flexslider hidden-buttons">
                                  <div class="slider-items slider-width-col4 products-grid">
                                    <?php foreach ($product_list_newest as $key => $item) : ?>
                                     
                                        <div class="item">
                                          <div class="item-inner">
                                              <div class="item-img">
                                                  <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="../public/images/product/<?= $item['img'] ?>"> </a>
                                                      <div class="new-label new-top-left">new</div>
                                                      <div class="mask-shop-white"></div>
                                                      <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="index.php?option=user&act=add_whislist&id=<?=$item['id']?>">
                                                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                      </a> <a href="index.php?option=page&act=detail&slug=<?=$item['slug']?>">
                                                          <div class="mask-right-shop"><i class="fa fa-shopping-cart"></i></div>
                                                      </a>
                                                  </div>
                                              </div>
                                              <div class="item-info">
                                                  <div class="info-inner">
                                                      <div class="item-title"> <a title="<?= $item['name'] ?>" href="index.php?option=page&act=detail&slug=<?=$item['slug']?>"><?= $item['name'] ?></a> </div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <div class="price-box"> <span class="regular-price"> <span class="price"><?= number_format($item['price'])?> vnđ</span></span>
                                                                  <!-- <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $167.00 </span> </p> -->
                                                              </div>
                                                          </div>
                                                          <div class="actions">
                                                              <div class="add_cart">
                                                                  <!-- <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button> -->
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                    <?php endforeach ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- Trending Products Slider -->
                  <div class="jtv-trending-products">
                      <div class="slider-items-products">
                          <div class="jtv-new-title">
                              <h2>Trending Products</h2>
                          </div>
                          <div id="trending-slider" class="product-flexslider hidden-buttons">
                              <div class="slider-items slider-width-col4 products-grid">
                                  
                                    <?php foreach ($product_list_topview as $item) : ?>
                                 
                                        <div class="item">
                                      <div class="item-inner">
                                          <div class="item-img">
                                              <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="../public/images/product/<?=$item['img']?>"> </a>
                                                  <div class="new-label new-top-left">new</div>
                                                  <div class="mask-shop-white"></div>
                                                  <div class="new-label new-top-left">new</div>
                                                  <a class="quickview-btn" href="index.php?option=user&act=whislist&id=<?=$row['id']?>"><span>Quick View</span></a> <a href="index.php?option=user&act=whislist&id=<?=$row['id']?>">
                                                      <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                                  </a> <a href="index.php?option=page&act=detail&slug=<?=$item['slug']?>">
                                                      <div class="mask-right-shop"><i class="fa fa-shopping-cart"></i></div>
                                                  </a>
                                              </div>
                                          </div>
                                          <div class="item-info">
                                              <div class="info-inner">
                                                  <div class="item-title"> <a title="<?=$item['name']?>" href="index.php?option=page&act=detail&slug=<?=$item['slug']?>"><?=$item['name']?> </a> </div>
                                                  <div class="item-content">
                                                      <div class="item-price">
                                                          <div class="price-box"> <span class="regular-price"> <span class="price"><?=number_format($item['price'])?> vnđ</span></span>
                                                              <!-- <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $269.00 </span> </p> -->
                                                          </div>
                                                      </div>
                                                      <div class="actions">
                                                          <div class="add_cart">
                                                              <!-- <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button> -->
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                                    <?php endforeach ?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End Trending Products Slider -->

                  <!-- Latest Blog -->
                  <div class="jtv-latest-blog">
                      <div class="jtv-new-title">
                          <h2>Latest News</h2>
                      </div>
                      <div class="row">
                          <div class="blog-outer-container">
                              <div class="blog-inner">
                                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                                      <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="../public/images/blog-img1.jpg"> </a> </div>
                                      <h4 class="blog-preview_title"><a href="blog_single_post.html">Neque porro quisquam est qui</a></h4>
                                      <div class="blog-preview_info">
                                          <ul class="post-meta">
                                              <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                              <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                                              <li><i class="fa fa-clock-o"></i><span class="day">12</span><span class="month">Feb</span></li>
                                          </ul>
                                          <div class="blog-preview_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                                      <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="../public/images/blog-img1.jpg"> </a> </div>
                                      <h4 class="blog-preview_title"><a href="blog_single_post.html">Neque porro quisquam est qui</a></h4>
                                      <div class="blog-preview_info">
                                          <ul class="post-meta">
                                              <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                              <li><i class="fa fa-comments"></i><a href="#">20 comments</a></li>
                                              <li><i class="fa fa-clock-o"></i><span class="day">25</span><span class="month">Feb</span></li>
                                          </ul>
                                          <div class="blog-preview_desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                                      </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-4 blog-preview_item">
                                      <div class="entry-thumb jtv-blog-img-hover"> <a href="blog_single_post.html"> <img alt="Blog" src="../public/images/blog-img1.jpg"> </a> </div>
                                      <h4 class="blog-preview_title"><a href="blog_single_post.html">Dolorem ipsum quia dolor sit amet</a></h4>
                                      <div class="blog-preview_info">
                                          <ul class="post-meta">
                                              <li><i class="fa fa-user"></i>By <a href="#">admin</a></li>
                                              <li><i class="fa fa-comments"></i><a href="#">8 comments</a></li>
                                              <li><i class="fa fa-clock-o"></i><span class="day">15</span><span class="month">Jan</span></li>
                                          </ul>
                                          <div class="blog-preview_desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem dolore lauda. <a class="read_btn" href="blog_single_post.html">Read More</a></div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End Latest Blog -->
              </div>
          </div>
      </div>
  </section>

  <!-- Collection Banner -->
  <?php require_once 'modules/collection_banner.php'?>
  <!-- collection area end -->
  <div class="container">
      <div class="row">
          <div class="col-sm-4 col-xs-12">
              <div class="jtv-hot-deal-product">
                  <div class="jtv-new-title">
                      <h2>Deals Of The Day</h2>
                  </div>
                  <ul class="products-grid">
                      <li class="right-space two-height item">
                          
                            <?php foreach ($variable as $key => $value) : ?>

                                <div class="item-inner">
                              <div class="item-img">
                                  <div class="item-img-info"><a href="#" title="Product tilte is here" class="product-image"><img src="../public/images/product/ao-len-phoi-mau-0.jpg" alt="Product tilte is here"> </a>
                                      <div class="hot-label hot-top-left">Hot Deal</div>
                                      <div class="mask-shop-white"></div>
                                      <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="index.php?option=user&act=add_whislist&id=<?=$item['id']?>">
                                          <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                      </a> <a href="compare.html">
                                          <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                      </a>
                                  </div>
                                  <div class="jtv-timer-box">
                                      <div class="countbox_1 timer-grid"></div>
                                  </div>
                              </div>

                              <div class="item-info">
                                  <div class="info-inner">
                                      <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                      <div class="item-content">
                                          <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                          <div class="item-price">
                                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                                          </div>
                                          <div class="actions">
                                              <div class="add_cart">
                                                  <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                            <?php endforeach ?>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 hidden-sm">
              <div class="sidebar-banner">
                  <div class="jtv-top-banner"> <a href="#"> <img src="../public/images/banner3.jpg" alt="banner"> </a> </div>
                  <div class="jtv-top-banner"> <a href="#"> <img src="../public/images/banner4.jpg" alt="banner"> </a> </div>
              </div>
          </div>
          <!-- Top Seller Slider -->
          <div class="col-sm-4 col-xs-12">
              <div class="jtv-top-products">
                  <div class="slider-items-products">
                      <div class="jtv-new-title">
                          <h2>Top Seller</h2>
                      </div>
                      <div id="top-products-slider" class="product-flexslider hidden-buttons">
                          <div class="slider-items slider-width-col4 products-grid">
                              <div class="item">
                                  <div class="item-inner">
                                      <div class="item-img">
                                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="../public/images/product/ao-len-phoi-mau-0.jpg"> </a>
                                              <div class="mask-shop-white"></div>
                                              <div class="new-label new-top-left">new</div>
                                              <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="index.php?option=user&act=add_whislist&id=<?=$item['id']?>">
                                                  <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                              </a> <a href="compare.html">
                                                  <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="item-info">
                                          <div class="info-inner">
                                              <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                              <div class="item-content">
                                                  <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                  <div class="item-price">
                                                      <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                                                  </div>
                                                  <div class="actions">
                                                      <div class="add_cart">
                                                          <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="item">
                                  <div class="item-inner">
                                      <div class="item-img">
                                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="../public/images/product/ao-len-phoi-mau-0.jpg"> </a>
                                              <div class="sale-label sale-top-right">Sale</div>
                                              <div class="mask-shop-white"></div>
                                              <div class="new-label new-top-left">new</div>
                                              <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="index.php?option=user&act=add_whislist&id=<?=$item['id']?>">
                                                  <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                              </a> <a href="compare.html">
                                                  <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="item-info">
                                          <div class="info-inner">
                                              <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                              <div class="item-content">
                                                  <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                  <div class="item-price">
                                                      <div class="price-box">
                                                          <p class="special-price"> <span class="price-label">Special Price</span><span class="price"> $156.00 </span></p>
                                                          <p class="old-price"> <span class="price-label">Regular Price:</span><span class="price"> $167.00 </span></p>
                                                      </div>
                                                  </div>
                                                  <div class="actions">
                                                      <div class="add_cart">
                                                          <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="item">
                                  <div class="item-inner">
                                      <div class="item-img">
                                          <div class="item-img-info"><a class="product-image" title="Product tilte is here" href="product-detail.html"> <img alt="Product tilte is here" src="../public/images/product/ao-len-phoi-mau-0.jpg"> </a>
                                              <div class="mask-shop-white"></div>
                                              <div class="new-label new-top-left">new</div>
                                              <a class="quickview-btn" href="quick-view.html"><span>Quick View</span></a> <a href="index.php?option=user&act=add_whislist&id=<?=$item['id']?>">
                                                  <div class="mask-left-shop"><i class="fa fa-heart"></i></div>
                                              </a> <a href="compare.html">
                                                  <div class="mask-right-shop"><i class="fa fa-signal"></i></div>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="item-info">
                                          <div class="info-inner">
                                              <div class="item-title"> <a title="Product tilte is here" href="product-detail.html">Product tilte is here </a> </div>
                                              <div class="item-content">
                                                  <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                                  <div class="item-price">
                                                      <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span></span></div>
                                                  </div>
                                                  <div class="actions">
                                                      <div class="add_cart">
                                                          <button class="button btn-cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Top Seller Slider -->
          </div>
      </div>
  </div>

  <!-- Brand Logo -->
<?php require_once 'modules/brand_logo.php'?>