<?php
$cart = [];

if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
}

?>

<div class="cart" style="position: relative;">

    <div class="cartSvg">
        <svg height="12" viewBox="0 0 20 12" width="20" class="shopee-svg-icon _1NxVa_ icon-free-shipping">
            <g fill="none" fill-rule="evenodd" transform="">
                <rect fill="#00bfa5" fill-rule="evenodd" height="9" rx="1" width="12" x="4"></rect>
                <rect height="8" rx="1" stroke="#00bfa5" width="11" x="4.5" y=".5"></rect>
                <rect fill="#00bfa5" fill-rule="evenodd" height="7" rx="1" width="7" x="13" y="2"></rect>
                <rect height="6" rx="1" stroke="#00bfa5" width="6" x="13.5" y="2.5"></rect>
                <circle cx="8" cy="10" fill="#00bfa5" r="2"></circle>
                <circle cx="15" cy="10" fill="#00bfa5" r="2"></circle>
                <path d="m6.7082481 6.7999878h-.7082481v-4.2275391h2.8488017v.5976563h-2.1405536v1.2978515h1.9603297v.5800782h-1.9603297zm2.6762505 0v-3.1904297h.6544972v.4892578h.0505892c.0980164-.3134765.4774351-.5419922.9264138-.5419922.0980165 0 .2276512.0087891.3003731.0263672v.6210938c-.053751-.0175782-.2624312-.038086-.3762568-.038086-.5122152 0-.8758247.3017578-.8758247.75v1.8837891zm3.608988-2.7158203c-.5027297 0-.8536919.328125-.8916338.8261719h1.7390022c-.0158092-.5009766-.3446386-.8261719-.8473684-.8261719zm.8442065 1.8544922h.6544972c-.1549293.571289-.7050863.9228515-1.49238.9228515-.9864885 0-1.5903965-.6269531-1.5903965-1.6464843 0-1.0195313.6165553-1.6669922 1.5872347-1.6669922.9580321 0 1.5366455.6064453 1.5366455 1.6083984v.2197266h-2.4314412v.0351562c.0221328.5595703.373095.9140625.9169284.9140625.4110369 0 .6924391-.1376953.8189119-.3867187zm2.6224996-1.8544922c-.5027297 0-.853692.328125-.8916339.8261719h1.7390022c-.0158091-.5009766-.3446386-.8261719-.8473683-.8261719zm.8442064 1.8544922h.6544972c-.1549293.571289-.7050863.9228515-1.49238.9228515-.9864885 0-1.5903965-.6269531-1.5903965-1.6464843 0-1.0195313.6165553-1.6669922 1.5872347-1.6669922.9580321 0 1.5366455.6064453 1.5366455 1.6083984v.2197266h-2.4314412v.0351562c.0221328.5595703.373095.9140625.9169284.9140625.4110369 0 .6924391-.1376953.8189119-.3867187z" fill="#fff"></path>
                <path d="m .5 8.5h3.5v1h-3.5z" fill="#00bfa5"></path>
                <path d="m0 10.15674h3.5v1h-3.5z" fill="#00bfa5"></path>
                <circle cx="8" cy="10" fill="#047565" r="1"></circle>
                <circle cx="15" cy="10" fill="#047565" r="1"></circle>
            </g>
        </svg>
        <span class="_1Xcrmf">Nhấn vào mục Mã giảm giá ở cuối trang để hưởng miễn phí vận chuyển bạn nhé!</span>
    </div>
    <div class="cart-item cart-space"></div>

    <div class="cart-header-title">
        <div class="_1zPSKE">
            <label class="stardust-checkbox" style="padding: 0 12px 0 20px; min-width: 58px;">
                <input class="stardust-checkbox__input" type="checkbox">
                <div class="stardust-checkbox__box"></div>
            </label>
        </div>
        <div class="_27GGo9" style="color: rgba(0,0,0,.8);width: 46.27949%;">Sản phẩm</div>
        <div class="_3hJbyz" style="width: 35.88022%;text-align: center;">Đơn giá</div>
        <div class="_155Uu2" style="width: 20.4265%;text-align: center;">Số lượng</div>
        <div class="_10ZkNr" style="width: 10.43557%;text-align: center;">Số tiền</div>
        <div class="_1coJFb" style="width: 12.70417%;text-align: center;">Thao tác</div>
    </div>
    <div class="cart-item cart-space"></div>

    <div class="listCart">
        <?php
        foreach ($cart as $key => $value) {
            $priceDiscount = $value["Price"] * (100 - $value["Discount"]) / 100; ?>
            <div class="cart-item">
                <img class="cart-item-img" src="http://localhost/bookstore-mvc/public/asset/img/<?php echo $value["Image"]; ?>" alt="">
                <p class="cart-item-name"><?php echo $value["Title"]; ?></p>
                <div class="cart-item-price">
                    <p class="cart-item-price-old"><?php echo $value["Price"]; ?> ₫</p>

                    <input type="hidden" class="form-control" id="<?php echo 'newPrice' . $value["Id_bookItem"] . ''; ?>" value="<?php echo $priceDiscount ?>" name="newPrice" style="width:0%" readonly>
                    <p class="cart-item-price-sale <?php echo 'newPrice' . $value["Id_bookItem"] . ''; ?>"><?php echo $priceDiscount ?> ₫</p>

                </div>
                <span class="cart-item-number">
                    <input type="hidden" class="form-control" id="<?php echo 'Id_bookItem-Cart' . $value["Id_bookItem"] . ''; ?>" value="<?php echo $value['Id_bookItem'] ?>" name="Id_bookItem-Cart" style="width:0%" readonly>
                    <!-- viết hàm minusBookItem nhận id_bookItem cần thêm rồi gọi trong main.js và Ajax.js -->
                    <button onclick="minusBookItem(<?php echo $value['Id_bookItem'] ?>)" class="cart-item-number-btn minusBtn" type="submit" name="minusBtn"> - </button>

                    <p class="cart-item-number-text <?php echo 'amount-Cart' . $value["Id_bookItem"] . ''; ?>">
                        <?php echo $value["Amount"]; ?>
                    </p>
                    <!-- viết hàm plusBookItem nhận id_bookItem cần thêm vào rồi gọi trong main.js và Ajax.j-->
                    <button onclick="plusBookItem(<?php echo $value['Id_bookItem'] ?>)" class="cart-item-number-btn plusBtn" name="plusBtn"> + </button>

                </span>
                <p class="cart-item-sum-money <?php echo 'sumMoney' . $value["Id_bookItem"] . ''; ?>">
                    <?php echo ($value["Amount"] * $priceDiscount); ?> ₫
                </p>
                <div class="cart-item-delete">
                    <a href="http://localhost/bookstore-mvc/Cart/DeleteCartByIdBookItem/<?php echo $value["Id_bookItem"]; ?>">
                        <i class="fas fa-trash cart-item-delete-icon"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<div class="cart-item cart-space"></div>
<div class="btnOrderContainer">
    <div class="row1">
        <svg fill="none" viewBox="0 -2 23 22" class="shopee-svg-icon icon-voucher-line">
            <g filter="url(#voucher-filter0_d)">
                <mask id="a" fill="#fff">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 2h18v2.32a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75v.65a1.5 1.5 0 000 2.75V16H1v-2.12a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75v-.65a1.5 1.5 0 000-2.75V2z"></path>
                </mask>
                <path d="M19 2h1V1h-1v1zM1 2V1H0v1h1zm18 2.32l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zm0 .65l.4.92.6-.26v-.66h-1zm0 2.75h1v-.65l-.6-.26-.4.91zM19 16v1h1v-1h-1zM1 16H0v1h1v-1zm0-2.12l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zm0-.65l-.4-.92-.6.26v.66h1zm0-2.75H0v.65l.6.26.4-.91zM19 1H1v2h18V1zm1 3.32V2h-2v2.32h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zm.6 1.56v-.65h-2v.65h2zm-.9 1.38c0-.2.12-.38.3-.46l-.8-1.83a2.5 2.5 0 00-1.5 2.29h2zm.3.46a.5.5 0 01-.3-.46h-2c0 1.03.62 1.9 1.5 2.3l.8-1.84zM20 16v-2.13h-2V16h2zM1 17h18v-2H1v2zm-1-3.12V16h2v-2.12H0zm1.4.91a2.5 2.5 0 001.5-2.29h-2a.5.5 0 01-.3.46l.8 1.83zm1.5-2.29a2.5 2.5 0 00-1.5-2.3l-.8 1.84c.18.08.3.26.3.46h2zM0 10.48v.65h2v-.65H0zM.9 9.1a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 9.1h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 8.65zM0 7.08v.65h2v-.65H0zM.9 5.7a.5.5 0 01-.3.46l.8 1.83A2.5 2.5 0 002.9 5.7h-2zm-.3-.46c.18.08.3.26.3.46h2a2.5 2.5 0 00-1.5-2.3L.6 5.25zM0 2v2.33h2V2H0z" mask="url(#a)"></path>
            </g>
            <path clip-rule="evenodd" d="M6.49 14.18h.86v-1.6h-.86v1.6zM6.49 11.18h.86v-1.6h-.86v1.6zM6.49 8.18h.86v-1.6h-.86v1.6zM6.49 5.18h.86v-1.6h-.86v1.6z"></path>
            <defs>
                <filter id="voucher-filter0_d" x="0" y="1" width="20" height="16" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                    <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"></feColorMatrix>
                    <feOffset></feOffset>
                    <feGaussianBlur stdDeviation=".5"></feGaussianBlur>
                    <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.09 0"></feColorMatrix>
                    <feBlend in2="BackgroundImageFix" result="effect1_dropShadow"></feBlend>
                    <feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape"></feBlend>
                </filter>
            </defs>
        </svg>
        <span style="margin-right: 90px; ">Shopee Voucher</span>
        <span style="color: #05a;"> Chọn hoặc nhập mã</span>
    </div>
    <div class="row2">
        <svg fill="none" viewBox="0 0 18 18" class="shopee-svg-icon _1nDYM0 icon-coin-line">
            <path stroke="#FFA600" stroke-width="1.3" d="M17.35 9A8.35 8.35 0 11.65 9a8.35 8.35 0 0116.7 0z"></path>
            <path fill="#FFA600" fill-rule="evenodd" stroke="#FFA600" stroke-width=".2" d="M6.86 4.723c-.683.576-.998 1.627-.75 2.464.215.725.85 1.258 1.522 1.608.37.193.77.355 1.177.463.1.027.2.051.3.08.098.03.196.062.294.096.06.021.121.044.182.067.017.006.107.041.04.014-.07-.028.071.03.087.037.286.124.56.27.82.44.114.076.045.024.151.111a2.942 2.942 0 01.322.303c.087.093.046.042.114.146.18.275.245.478.235.8-.01.328-.14.659-.325.867-.47.53-1.232.73-1.934.696a4.727 4.727 0 01-1.487-.307c-.45-.182-.852-.462-1.242-.737-.25-.176-.643-.04-.788.197-.17.279-.044.574.207.75.753.532 1.539.946 2.474 1.098.885.144 1.731.124 2.563-.224.78-.326 1.416-.966 1.607-1.772.198-.838-.023-1.644-.61-2.29-.683-.753-1.722-1.17-2.706-1.43a4.563 4.563 0 01-.543-.183c.122.048-.044-.02-.078-.035a4.77 4.77 0 01-.422-.212c-.594-.338-.955-.722-.872-1.369.105-.816.757-1.221 1.555-1.28.808-.06 1.648.135 2.297.554.614.398 1.19-.553.58-.947-1.33-.86-3.504-1.074-4.77-.005z" clip-rule="evenodd"></path>
        </svg>
        <span>Shopee Xu</span>
        <span style="margin-left: 48px;">Không thể sử dụng xu.</span>
    </div>
    <div class="row3">
        <a class="linkcart" href="">Chọn tất cả()</span></a>
        <a class="linkcart" href=" http://localhost/bookstore-mvc/Cart/DeleteAllCart">Xóa</a>
        <a class="linkcart" href="">Bỏ sản phẩm không hoạt động</a>
        <a class="linkcart" href="" style="color: #ee4d2d">Lưu vào mục Đã thích</a>
        <span>Tổng thanh toán(0 sản phẩm): đ</span>
        <button class="btn btn--primary orderbtnCart">Mua Hàng</button>
    </div>
</div>