<?php
/* @var $pageData ..\\controllers\IndexController */
$product_id = $pageData['product']['id'];
?>
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Product Details</h1>
            </div>
        </div>
    </div>
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Product</li>
    </ol>
</nav>

<div class="section">
<div class="container" >
        <div class="row">

            <div class="col-md-4 col-sm-6">
                <div class="product-grid">

                    <div class="product-image">
                            <img class="pic-1" src="<?php echo $pageData['product']['image']; ?>">
                        <span class="product-new-label">new</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="product-grid">

                        <div class="product-content">
                            <h3><?php echo $pageData['product']['title']; ?></h3>
                            <hr>
                            <h5 id="description"><?php echo $pageData['product']['description']; ?></h5>
                            <hr>
                            <div class="price">$<?php  echo $pageData['product']['price'] . $pageData['product']['sku']; ?></div>
                        <!-- Rating -->
                                <div id='rateYo'
                                     class="stars_for_rating"
                                     data-id="<?php echo $product_id; ?>"
                                     data-rating="<?php echo $pageData['product']['rating']; ?>"
                                ></div>
                                <div>&nbsp;
                                    <span class='your-choice-was' style='display: none;'>
                                       Your rating was <span class='choice'></span>.
                                    </span>
                                </div>
                            <hr>
                        <!-- AND Rating -->
                            <div id="product-quantity-input" data-animation-role="content">
                                <div>Quantity:</div>
                                <input
                                        class="form-control input-sm input-micro"
                                        id="quantity"
                                        type="number"
                                        size="2" max="9999"
                                        min="1"
                                        oninput="this.value = Math.abs(this.value)"
                                        step="1"
                                        value="<?php echo (isset($_SESSION['cart_list'][$product_id]['quantity'])) ? $_SESSION['cart_list'][$product_id]['quantity'] : 0; ?>"
                                        data-id="<?php echo $product_id; ?>"
                                >
                            </div>
                            <a class="add-to-cart" data-id="<?php echo $product_id; ?>">
                                <i class="fas fa-shopping-cart"></i> <span>ADD PRODUCT</span>
                            </a>
                        </div>

                    </div>
            </div>
        </div>
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
        <a href="/?cart">
            <div class="fixed_cart">
                <i class="fas fa-shopping-cart fa-2x"></i>
            </div>
            <div class="fixed_circle">
                <div class="circle">
                    <span id="cart_count" style="color: white"><?php echo isset($_SESSION['cart_list']) ? count($_SESSION['cart_list']) : 0; ?></span>
                </div>
            </div>
        </a>
    </section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This item has already been added to the cart. The quantity of goods can be changed in the shopping cart.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="web/js/setUserName.js"></script>
<script src="web/js/add_to_cart.js"></script>
<script src="web/js/v2.3.2/jquery.rateyo.js"></script>
<script src="web/js/rating_star.js"></script>

