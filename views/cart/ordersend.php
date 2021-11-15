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
        <li class="breadcrumb-item active" aria-current="page">Order send</li>
    </ol>
</nav>

<div class="section">
    <div class="container">
        <h2>your order has been sent for processing. Order number No<span><?php echo $pageData['order']; ?></span></h2>
        <h2>your balance - <span><?php echo $pageData['purse']; ?></span></h2>
    </div>
</div>
