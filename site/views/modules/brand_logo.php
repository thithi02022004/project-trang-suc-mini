<div class="container jtv-brand-logo-block">
      <div class="jtv-brand-logo">
          <div class="slider-items-products">
              <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col6">
                    <?php foreach ($brand_home as $key => $row) : ?>
                      <div class="item"><a href="#"><img style="width:200px" src="../public/images/brand/<?=$row['img']?>" alt="Brand Logo"></a> </div>
                     <?php endforeach ?>
                  </div>
              </div>
          </div>
      </div>
  </div>