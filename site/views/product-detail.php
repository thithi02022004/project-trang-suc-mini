<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <!-- <?php var_dump($row) ?> -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a href="?option=page&act=home" title="Go to Home Page">Home</a> <span>/</span>
                    </li>
                    <li><a href="?option=page&act=product" title="">Sản phẩm</a> <span>/ </span></li>
                    <li> <strong>
                            <?= $row['name']; ?>
                        </strong> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <div class="product-view">
                <div class="product-essential">
                    <form action="index.php?option=cart&act=add_cart&slug=<?= $row['slug'] ?>" method="post" enctype="multipart/form-data" id="product_addtocart_form">
                        <input type="hidden" name="return_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                        <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">
                            <div class="product-image">
                                <div class="product-full">
                                    <img id="product-zoom" src="../public/images/product/<?= $row['product_img'] ?>" data-zoom-image="../public/images/product/<?= $row['product_img'] ?>" alt="product-image" />
                                </div>
                                <div class="more-views">
                                    <div class="slider-items-products">
                                        <div id="jtv-more-views-img" class="product-flexslider hidden-buttons product-img-thumb">
                                            <div class="slider-items slider-width-col4 block-content" style="display:flex">
                                                <?php
                                                // Hiển thị tất cả các hình ảnh từ mảng more_images
                                                foreach ($row['more_images'] as $img) :
                                                ?>
                                                    <div class="more-views-items" style="width:100px">
                                                        <a href="#" data-image="../public/images/product/<?= $img ?>" data-zoom-image="../public/images/product/<?= $img ?>">
                                                            <img id="product-zoom" src="../public/images/product/<?= $img ?>" alt="product-image" />
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end: more-images -->
                        </div>
                        <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                            <div class="product-name">
                                <h1>
                                    <?= $row['name']; ?>
                                </h1>
                            </div>
                            <!-- <div class="product-sku">
                                Mã:
                                <?= $row['SKU']; ?>
                            </div> -->
                            <div class="price-block">
                                <div class="price-box">
                                    <?php if ($row['promotion'] > 0) : ?>
                                        <span class="regular-price">
                                            <span class="price">
                                                Giá:
                                                <?= number_format($row['price'] - ($row['price'] * $row['promotion'] / 100)) ?>Vnđ
                                            </span>
                                            
                                        </span>
                                        <p class="old-price">
                                            <span class="price-label">Giá :</span>
                                            <span class="price">
                                                <?= number_format($row['price']) ?> Vnđ
                                            </span>
                                        </p>
                                    <?php else : ?>
                                        <span class="regular-price">
                                            <span class="price">
                                                Giá:<input style="border:none; width:150px" type="text" name="PRICE" id="price" value="<?= $row['price'] * ($rate[0]['rate']) ?> "> 
                                            </span>
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($row['status'] == 1) : ?>
                                        <p class="availability in-stock">
                                            <span>Còn hàng</span>
                                        </p>
                                    <?php else : ?>
                                        <p class="availability out-of-stock">
                                            <span>Hết hàng</span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="short-description">
                                <h2>Chất liệu: <?= $row['material']; ?> </h2> 
                            </div>
                            <div class="short-description">
                                <h2>Mô tả sản phẩm: </h2>
                                <?= $row['smdetail'] ?>
                            </div>
                            <div class="product-shop" data-toggle="buttons">
                                <h4 class="mt-3">Kích cỡ: </h4>
                                <input type="" name="SIZES" id="SIZES" value="">
                                <?php foreach ($size_list as $key => $size) : ?>
                                    <button style="background-color: white;font-size: 15px;font-weight: 600;" name="SIZE" onclick='changeSize(this, <?=$row["price"] * $size["rate"]?> , <?=$size["name"]?>) 'type="submit"><?=$size['name']?></button>
                                <?php endforeach; ?>
                                
                            </div>   
                            <div class="add-to-box">
                                <div class="add-to-cart">
                                    <div class="pull-left">
                                        <div class="custom pull-left">
                                            <?php if ($row['quantity'] > 0) : ?>
                                                <button onClick="var result = document.getElementById('qty'); var qty = parseInt(result.value); if (!isNaN(qty) && qty > 1) result.value = qty - 1;" class="reduced items-count" type="button">
                                                    <i class="fa fa-minus">&nbsp;</i>
                                                </button>
                                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <button onClick="var result = document.getElementById('qty'); var qty = parseInt(result.value); if (!isNaN(qty)) result.value = qty + 1;" class="increase items-count" type="button">
                                                    <i class="fa fa-plus">&nbsp;</i>
                                                </button>
                                            <?php else : ?>
                                                <button disabled onClick="var result = document.getElementById('qty'); var qty = parseInt(result.value); if (!isNaN(qty) && qty > 1) result.value = qty - 1;" class="reduced items-count" type="button">
                                                    <i class="fa fa-minus">&nbsp;</i>
                                                </button>
                                                <input readonly="true" type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <button disabled onClick="var result = document.getElementById('qty'); var qty = parseInt(result.value); if (!isNaN(qty)) result.value = qty + 1;" class="increase items-count" type="button">
                                                    <i class="fa fa-plus">&nbsp;</i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <button class="button btn-cart" title="Thêm giỏ hàng" type="sumit">
                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                    </button>
                                </div>
                                <div class="email-addto-box">
                                    <ul class="add-to-links">
                                        <li><a class="link-wishlist" href="wishlist.html"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                                        <li><a class="link-compare" href="compare.html"><i class="fa fa-signal"></i><span>Add to Compare</span></a></li>
                                        <li><a class="email-friend" href="#"><i class="fa fa-envelope"></i><span>Email
                                                    to a Friend</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-next-prev"> <a class="product-next" href="#"><i class="fa fa-angle-left"></i></a> <a class="product-prev" href="#"><i class="fa fa-angle-right"></i></a> </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Chi tiết sản phẩm </a>
                    </li>
                    <!-- <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>
                    <li><a href="#reviews_tabs" data-toggle="tab">Reviews</a></li> -->
                </ul>
                <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="product_tabs_description">
                        <div class="std">
                            <?= $row['detail'] ?>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="product_tabs_tags">
                        <div class="box-collateral box-tags">
                            <div class="tags">
                                <form id="addTagForm" action="#" method="get">
                                    <div class="form-add-tags">
                                        <label for="productTagName">Add Tags:</label>
                                        <div class="input-box">
                                            <input class="input-text" name="productTagName" id="productTagName" type="text">
                                            <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                        </div>
                    </div> -->
                    <!-- <div class="tab-pane fade" id="reviews_tabs">
                        <div class="box-collateral box-reviews" id="customer-reviews">
                            <div class="box-reviews1">
                                <div class="form-add">
                                    <form id="review-form" method="post" action="http://www.jtvcommerce.com/review/product/post/id/176/">
                                        <h3>Write Your Own Review</h3>
                                        <fieldset>
                                            <h4>How do you rate this product? <em class="required">*</em></h4>
                                            <span id="input-message-box"></span>
                                            <table id="product-review-table" class="data-table">
                                                <thead>
                                                    <tr class="first last">
                                                        <th>&nbsp;</th>
                                                        <th><span class="nobr">1 *</span></th>
                                                        <th><span class="nobr">2 *</span></th>
                                                        <th><span class="nobr">3 *</span></th>
                                                        <th><span class="nobr">4 *</span></th>
                                                        <th><span class="nobr">5 *</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="first odd">
                                                        <th>Price</th>
                                                        <td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
                                                        <td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
                                                    </tr>
                                                    <tr class="even">
                                                        <th>Value</th>
                                                        <td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
                                                        <td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
                                                    </tr>
                                                    <tr class="last odd">
                                                        <th>Quality</th>
                                                        <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
                                                        <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
                                                        <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <input type="hidden" value="" class="validate-rating" name="validate_rating">
                                            <div class="review1">
                                                <ul class="form-list">
                                                    <li>
                                                        <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                                        <div class="input-box">
                                                            <input type="text" class="input-text" id="nickname_field" name="nickname">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label class="required" for="summary_field">Summary<em>*</em></label>
                                                        <div class="input-box">
                                                            <input type="text" class="input-text" id="summary_field" name="title">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="review2">
                                                <ul>
                                                    <li>
                                                        <label class="required " for="review_field">Review<em>*</em></label>
                                                        <div class="input-box">
                                                            <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="buttons-set">
                                                    <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="box-reviews2">
                                <h3>Customer Reviews</h3>
                                <div class="box visible">
                                    <ul>
                                        <li>
                                            <table class="ratings-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Value</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quality</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="review">
                                                <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                                                <small>Review by <span>Sophia </span>on 15/01/2018 </small>
                                                <div class="review-txt">Pellentesque aliquet, sem eget laoreet ultrices,
                                                    ipsum metus feugiat sem, quis fermentum turpis eros eget velit.
                                                    Donec ac tempus ante.</div>
                                            </div>
                                        </li>
                                        <li class="even">
                                            <table class="ratings-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Value</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quality</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="review">
                                                <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                                                <small>Review by <span>William</span>on 05/02/2018 </small>
                                                <div class="review-txt">Morbi ornare lectus quis justo gravida semper.
                                                    Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla.
                                                    Donec a neque libero.</div>
                                            </div>
                                        </li>
                                        <li>
                                            <table class="ratings-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Value</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Quality</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Price</th>
                                                        <td>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="review">
                                                <h6><a href="#">Lorem ipsum dolor sit amet</a></h6>
                                                <small>Review by <span> Mason</span>on 10/02/2018 </small>
                                                <div class="review-txt last">Nam fringilla augue nec est tristique
                                                    auctor. Donec non est at libero vulputate rutrum. Morbi ornare
                                                    lectus quis justo gravida semper.</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a> </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main Container End -->

<!-- Related Products Slider -->

<div class="container">
    <div class="jtv-related-products">
        <div class="slider-items-products">
            <div class="jtv-new-title">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="related-block">
                <div id="jtv-related-products-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 products-grid">
                        <?php foreach ($list_other as $item) : ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a class="product-image" title="<?= $item['name'] ?>" href="?option=page&act=product-detail&slug=<?= $item['slug'] ?>">
                                                <img alt="<?= $item['name'] ?>" src="../public/images/product/<?= $item['image'] ?>">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a title="<?= $item['name']; ?>" href="?option=page&act=product-detail&slug=<?= $item['slug'] ?>">
                                                    <?= $item['name']; ?>
                                                </a>
                                            </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <?php if ($item['promotion'] > 0) : ?>
                                                            <span class="regular-price">
                                                                <span class="price">
                                                                    <?= number_format($item['price'] - ($item['price'] * $item['promotion'] / 100)) ?>
                                                                    Vnđ
                                                                </span>
                                                            </span>
                                                            <p class="old-price">
                                                                <span class="price-label">Regular Price:</span>
                                                                <span class="price">
                                                                    <?= number_format($item['price']) ?> Vnđ
                                                                </span>
                                                            </p>
                                                        <?php else : ?>
                                                            <span class="regular-price">
                                                                <span class="price">
                                                                    <?= number_format($item['price']) ?> Vnđ
                                                                </span>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                    <div class="add_cart">
                                                        <form action="?option=cart&act=add-cart&pid=<?= $item['id'] ?>" method="post" enctype="multipart/form-data" class="product_addtocart_form">
                                                            <input type="hidden" name="return_url" value="<?= htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                                                            <button class="button btn-cart" type="submit">
                                                                <span>
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                    Thêm giỏ hàng
                                                                </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Related Products Slider End -->