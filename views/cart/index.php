<?php
/* @var $pageData ..\\controllers\IndexController */
?>
<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shopping Cart</h1>
            </div>
        </div>
    </div>
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Shop</a></li>
        <li class="breadcrumb-item"><a href="/product">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart</li>
    </ol>
</nav>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Shopping Cart Items -->
                <table class="shopping-cart">
                    <!-- Shopping Cart Item -->
                    <?php
                    if (isset ($pageData['cart_is_empty']) )
                    {
                        echo ('<div class="alert alert-warning" role="alert" style="margin: 40px">
                                    <h2>There are no items in the cart.</h2>
                               </div>');
                    }
                    else
                    {   $total_price = 0;

                        foreach ($_SESSION['cart_list'] as $item){
                            $id = $item['id'];
                            ?>

                        <tr class="item_cart" id="item_cart_<?php echo $id; ?>" data-id="<?php echo $id; ?>">
                            <!-- Shopping Cart Item Image -->
                            <td class="image"><a href="<?php echo ('/?product/id/' . $id );?>"><img src="<?php echo($item['image']) ?>" alt="Product Name"></a></td>
                            <!-- Shopping Cart Item Description & Features -->
                            <td >
                                <div class="cart-item-title"><a href="<?php echo ('/?product/id/' . $item['id'] );?>"><?php echo($item['title']) ?></a></div>
                                <div class="feature">
                                    unit price:
                                    <span>$</span>
                                    <i class="unit_price" data-id="<?php echo $id; ?>"><?php echo($item['price'])?></i>
                                </div>
                            </td>
                            <!-- Shopping Cart Item Quantity -->
                            <td class="quantity">
                                <input class="form-control input-sm input-micro unit_quantity"
                                       size="2" max="9999"
                                       min="1"
                                       type="number"
                                       step="1"
                                       oninput="this.value = Math.abs(this.value)"
                                       data-id="<?php echo $id; ?>"
                                       value="<?php echo($item['quantity']) ?>">
                            </td>
                            <!-- Shopping Cart Item Price -->
                            <td>$<span class="price" id="price"><?php echo($item['price'])?></span></td>
                            <!-- Shopping Cart Item Actions -->
                            <td class="actions">
                               <!-- <a href="#" class="btn btn-xs btn-grey"><i class="glyphicon glyphicon-pencil"></i></a>-->
                                <a class="btn btn-danger delete_item" data-id="<?php echo $id; ?>" >
                                    <i class="fa fa-trash "></i>
                                    Delete item
                                </a>
                            </td>
                        </tr>
                    <?php $total_price += ($item['price']); }  } ?>
                    <!-- End Shopping Cart Item -->
                </table>
                <!-- End Shopping Cart Items -->
            </div>
        </div>
        <div class="row">
            <!-- Shipment Options -->
            <div class="col-md-8 col-md-offset-0 col-sm-12 col-sm-offset-12">
                <div class="cart-shippment-options">
                    <h6><i class="glyphicon glyphicon-plane"></i> Shippment options</h6>
                    <div class="input-append">
                        <select class="form-control input-sm" name="delivery">
                            <option style="display:none;" value="0">How do you deliver goods ?</option>
                            <option value="1">Standard - FREE</option>
                            <option value="2">Next day delivery - $5.00</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Shopping Cart Totals -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
                <table class="cart-totals">
                    <tr>
                        <td><b>Shipping</b></td>
                        <td id="delivery">Without delivery</td>
                    </tr>
                    <tr class="cart-grand-total">
                        <td><b>Total</b></td>
                        <td><b>$</b><b id="totalPrice"><?php echo (isset($total_price)? $total_price : 0); ?></b></td>
                    </tr>
                </table>
                <!-- Action Buttons -->
                <div class="pull-right">
                    <a href="?cart/orderSend"
                       class="btn btn-block"
                       id="btn"
                       data-toggle="tooltip"
                       data-placement="bottom"
                       title="You have enough money for this purchase">
                        <i class="glyphicon glyphicon-shopping-cart icon-white"></i>
                        PAY
                    </a>
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

    <script type="text/javascript" src="web/js/change_price.js"></script>
    <script type="text/javascript" src="web/js/delete_item.js"></script>
    <script type="text/javascript" src="web/js/compareTotalPrice.js"></script>
    <script type="text/javascript" src="web/js/execute_after_loading.js"></script>
    <script type="text/javascript" src="web/js/pay_products.js"></script>

<!--*****************************************************************************************************************************************************-->
<?php /*if (isset($_SESSION['cart_list']))
{
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
}*/
	