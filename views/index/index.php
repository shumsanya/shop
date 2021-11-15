<?php
/* @var $pageData ..\\controllers\IndexController */
?>

<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products Listing</h1>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 50px">
    <div class="row">
        <?php foreach ($pageData['products'] as $item) {
            $product_id = $item['id'];
            ?>

        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="<?php echo ('/?product/id/' . $product_id );?>" class="image">
                        <img class="pic-1" src="<?php echo $item['image']; ?>">
                    </a>
                    <span class="product-new-label">new</span>
                   <!-- <ul class="social">
                        <li><a href="" data-tip="Quick view"><i class="fas fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                        <li><a href="" data-tip="Compare"><i class="fas fa-random"></i></a></li>
                    </ul>-->
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="<?php echo ('/?product/id/' . $product_id );?>"><?php echo $item['title']; ?></a></h3>
                    <div class="price">$<?php echo $item['price']; ?></div>
                    <div class="rateYo stars_for_rating" data-id="<?php echo $product_id; ?>" data-rating="<?php echo $item['rating']; ?>"></div>
                    <a class="add-to-cart" data-id="<?php echo $product_id; ?>">
                        <i class="fas fa-shopping-cart"></i> <span>ADD TO CART</span>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- icon PURSE-->
<section>
    <div class="fixed_purse">
        <i class="fa fa-usd" aria-hidden="true">Your many</i>
        <span id="purse" ><?php echo ( $_SESSION['purse'] ); ?></span>
    </div>
</section>
<!-- icon Cart-->
<section>
    <a href="http:/?cart">
        <div class="fixed_cart">
            <i class="fas fa-shopping-cart fa-2x"></i>
        </div>
        <div class="fixed_circle">
            <div class="circle">

                <span id="cart_count" style="color: white"><?php echo ( isset($_SESSION['cart_list']) ? count($_SESSION['cart_list']) : 0); ?></span>

            </div>
        </div>
    </a>
</section>
<script src="/web/js/setUserName.js"></script>
<script src="/web/js/add_to_cart.js"></script>
<script src="/web/js/v2.3.2/jquery.rateyo.js"></script>
<script src="/web/js/rating_only_read.js"></script>
