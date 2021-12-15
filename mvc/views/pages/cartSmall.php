<?php

$cart = [];

if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
    // $fetchCart = mysqli_fetch_assoc($cart);
}
// foreach ($cart as $key => $value) {
//     echo $value["Title"];}
?>


<div class="header__cart">
    <!-- Chưa thêm card -->
    <?php if (empty($cart)) { ?>
        <div class="header__cart-wrap">
            <i class="header__cart-icon fas fa-shopping-cart"></i>
            <span class="header__cart-notice countItemCart" id="">0</span>
            <div class="header__cart-list" onclick="renderCart()" style="cursor: pointer">
                <div>
                    <img src="http://localhost/bookstore-mvc/public/asset/img/no_cart.png" alt="" class="header__cart--no-cart-img">
                    <p class="header__cart-list--no-cart-msg">
                        Chưa có sản phẩm
                    </p>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- Đã thêm -->
        <div class="header__cart-wrap">
            <i class="header__cart-icon fas fa-shopping-cart"></i>
            <span class="header__cart-notice countItemCart" id=""> <?php echo (isset($fetchCart["CountItem"]))? $fetchCart["CountItem"]:""; ?></span>
            <div class="header__cart-list">
                <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                <ul class="header__cart-list-item">
                    <?php
                    foreach ($cart as $key => $value) { ?>
                        <li class="header__cart-item">
                            <img src="http://localhost/bookstore-mvc/public/asset/img/<?php echo $value["Image"]; ?>" alt="" class="header__cart-img">
                            <div class="header__cart-item-info">
                                <div class="header__cart-item-head">
                                    <h5 class="header__cart-item-name"><?php echo $value["Title"]; ?></h5>
                                    <div class="header__cart-item-price-wrap">
                                        <span class="header__cart-item-price"><?php echo ($value["Price"] * (100 - $value["Discount"]) / 100) ?> đ</span>
                                        <span class="header__cart-item-multiply">x</span>
                                        <span class="header__cart-item-qnt  <?php echo 'amount-cartsmall'.$value["Id_bookItem"].''; ?>"><?php echo $value["Amount"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php }
                    ?>
                </ul>
                <button class="btn btn--primary header__cart-has-cart-button">
                    <a href="http://localhost/bookstore-mvc/Cart" style="text-decoration: none !important; color:#fff;">
                        Xem Giỏ Hàng
                    </a>
                </button>
            </div>
        </div>
    <?php } ?>

</div>