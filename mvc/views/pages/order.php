<?php
$cart = [];
if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
}

$user = [];
if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

$shipmentSession = [];
if (isset($data["ShipmentSesstion"])) {
    $shipmentSession = $data["ShipmentSesstion"];
}

$allAddress = [];
// $allAddress = $data['Address'];
$allAddress = (isset($_SESSION['address'])) ? $_SESSION['address'] : [];

?>
<div class="_1G9Cv7"></div>
<form role="form" method="POST" name="formOrder" id="formOrder" action="./Order/CreateOrder">
    <div class=" order" style="position: relative;">
        <div class="headerOrder">
            <p class="headerTitle">
                <svg height="20" viewBox="0 0 16 20" width="16" class="shopee-svg-icon icon-location-marker">
                    <path d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path>
                </svg>
                Địa Chỉ Nhận Hàng
            </p>

            <div class="header-content">
                <p class="header-text1"><?php echo $user['Name'] ?></p>
                <p class="header-text1"><?php echo $user['Phone'] ?></p>
                <div class="auth-form__group form-group selectAddressOrder">
                    <select class="custom-select my-1 mr-sm-2" id="addressIdOrder" name="addressIdOrder" style="font-size: 12px;height: 42px;color: #666;" onchange="handerChangeAddress();">
                        <option selected>Chọn địa chỉ của bạn</option>
                        <?php
                        foreach ($allAddress as $key => $value) { ?>
                            <option value="<?php echo $value['Id_address'] ?>" <?php echo ($value['Id_address'] == $user['AddressId']) ? "selected" : ""; ?>>
                                <?php echo "Số " . $value['NumberHouse'] . ",Đường " . $value['Street'] . ", " . $value['District'] . ", " . $value['City'] . ", " . $value['Nation'] . " " ?>
                            </option>
                        <?php }
                        ?>
                    </select>
                    <div class="error-msg"></div>
                </div>
                <p class="header-text">Mặc định</p>
                <a href="" class="">Thay đổi</a>
            </div>
        </div>
        <div class="cart-item cart-space"></div>

        <div class="cart-header-title">
            <div class="title-content">Sản phẩm</div>
            <div class="_3hJbyz" style="width: 35.88022%;text-align: center;">Đơn giá</div>
            <div class="_155Uu2" style="width: 20.4265%;text-align: center;">Số lượng</div>
            <div class="_10ZkNr" style="width: 10.43557%;text-align: center;">Số tiền</div>
            <div class="_1coJFb" style="width: 12.70417%;text-align: center;">Thao tác</div>
        </div>
        <div class="cart-item cart-space"></div>

        <div class="listCart">
            <?php
            $sumOderNotShip = 0;
            // tổng tiền các item cart chưa tính ship.
            foreach ($cart as $key => $value) {
                $priceDiscount = $value["Price"] * (100 - $value["Discount"]) / 100;
                $sumMoney = $value["Amount"] * $priceDiscount;
                $sumOderNotShip = $sumOderNotShip + $sumMoney;
            ?>
                <div class="cart-item">
                    <img class="cart-item-img" src="http://localhost/bookstore-mvc/public/asset/img/<?php echo $value["Image"]; ?>" alt="">
                    <p class="cart-item-name"><?php echo $value["Title"]; ?></p>
                    <div class="cart-item-price">
                        <p class="cart-item-price-old"><?php echo $value["Price"]; ?> ₫</p>

                        <input type="hidden" class="form-control" id="<?php echo 'newPrice' . $value["Id_bookItem"] . ''; ?>" value="<?php echo $priceDiscount ?>" style="width:0%" readonly>
                        <p class="cart-item-price-sale <?php echo 'newPrice' . $value["Id_bookItem"] . ''; ?>"><?php echo $priceDiscount ?> ₫</p>

                    </div>
                    <span class="cart-item-number">
                        <input type="hidden" class="form-control" id="<?php echo 'Id_bookItem-Cart' . $value["Id_bookItem"] . ''; ?>" value="<?php echo $value['Id_bookItem'] ?>" name="Id_bookItem-Cart" style="width:0%" readonly>
                        <!-- viết hàm minusBookItem nhận id_bookItem cần thêm rồi gọi trong main.js và Ajax.js -->
                        <button onclick="" class="cart-item-number-btn minusBtn" type="submit" name="minusBtn"> - </button>

                        <p class="cart-item-number-text <?php echo 'amount-Cart' . $value["Id_bookItem"] . ''; ?>">
                            <?php echo $value["Amount"]; ?>
                        </p>
                        <!-- viết hàm plusBookItem nhận id_bookItem cần thêm vào rồi gọi trong main.js và Ajax.j-->
                        <button onclick="" class="cart-item-number-btn plusBtn" name="plusBtn"> + </button>

                    </span>
                    <input type="hidden" class="form-control" id="<?php echo 'sumMoneyNotShip' . $key . ''; ?>" value="<?php echo $sumMoney; ?>" name="countCart" style="width:0%" readonly>
                    <p id="abc" class="cart-item-sum-money <?php echo 'sumMoneyNotShip' . $key . ''; ?>">
                        <?php echo ($sumMoney); ?>
                    </p>
                    <div class="cart-item-delete">
                        <a href="http://localhost/bookstore-mvc/Cart/DeleteCartByIdBookItem/<?php echo $value["Id_bookItem"]; ?>">
                            <i class="fas fa-trash cart-item-delete-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="row1-1">
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
                <div class="row1-2">
                    <div class="shipment-container">
                        <div class="mess-container">
                            <label for="mess" style="width: 40%;margin-left: 10px;">Lời nhắn: </label>
                            <input id="mess" style="margin-top:0;" type="text" class="auth-form__input mess" placeholder="" name="mess">
                        </div>
                        <div class="shipment-grid">
                            <div class="child1">Đơn vị vận chuyển:</div>
                            <div class="child2">Nhanh</div>
                            <div class="child3">Thay đổi</div>
                            <div class="child4"> <span>₫</span><span class="costShipment"><?php echo $shipmentSession['Cost'] ?></span> </div>
                            <div class="child5">Nhận hàng vào 17 Th12 - 24 Th12</div>
                            <div class="child6">(Nhanh tay vào ngay "Shopee Voucher" để săn mã Miễn phí vận chuyển nhé!)</div>
                        </div>
                    </div>
                    <div class="sumPriceOrder">
                        <span class="sumtitle">Tổng số tiền :</span>
                        <div class="sumPriceOrderText">
                            <span class="sumCostOrder<?php echo $key; ?>"><?php echo ($shipmentSession['Cost'] + $sumMoney); ?>
                            </span><span>đ</span>
                        </div>
                    </div>
                </div>
                <div class="cart-item cart-space"></div>
            <?php } ?><input type="hidden" class="form-control" id="countCart" value="<?php echo mysqli_num_rows($cart); ?>" name="countCart" style="width:0%" readonly>
            <input type="hidden" class="form-control" id="sumOderNotShip" value="<?php echo $sumOderNotShip; ?>" style="width:0%" readonly>
        </div>
    </div>

    <div class="voucher-container">
        <div class="row1-voucher">
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
        <div class="row2-voucher">
            <svg style="margin-left:0;" fill="none" viewBox="0 0 18 18" class="shopee-svg-icon _1nDYM0 icon-coin-line">
                <path stroke="#FFA600" stroke-width="1.3" d="M17.35 9A8.35 8.35 0 11.65 9a8.35 8.35 0 0116.7 0z"></path>
                <path fill="#FFA600" fill-rule="evenodd" stroke="#FFA600" stroke-width=".2" d="M6.86 4.723c-.683.576-.998 1.627-.75 2.464.215.725.85 1.258 1.522 1.608.37.193.77.355 1.177.463.1.027.2.051.3.08.098.03.196.062.294.096.06.021.121.044.182.067.017.006.107.041.04.014-.07-.028.071.03.087.037.286.124.56.27.82.44.114.076.045.024.151.111a2.942 2.942 0 01.322.303c.087.093.046.042.114.146.18.275.245.478.235.8-.01.328-.14.659-.325.867-.47.53-1.232.73-1.934.696a4.727 4.727 0 01-1.487-.307c-.45-.182-.852-.462-1.242-.737-.25-.176-.643-.04-.788.197-.17.279-.044.574.207.75.753.532 1.539.946 2.474 1.098.885.144 1.731.124 2.563-.224.78-.326 1.416-.966 1.607-1.772.198-.838-.023-1.644-.61-2.29-.683-.753-1.722-1.17-2.706-1.43a4.563 4.563 0 01-.543-.183c.122.048-.044-.02-.078-.035a4.77 4.77 0 01-.422-.212c-.594-.338-.955-.722-.872-1.369.105-.816.757-1.221 1.555-1.28.808-.06 1.648.135 2.297.554.614.398 1.19-.553.58-.947-1.33-.86-3.504-1.074-4.77-.005z" clip-rule="evenodd"></path>
            </svg>
            <span>Shopee Xu</span>
            <span style="margin-left: 48px;">Không thể sử dụng xu.</span>
        </div>
    </div>
    <div class="cart-item cart-space"></div>

    <div class="payment-container" style="display: flex;">
        <span style="margin-right: 90px; font-size:20px;flex:1.2; ">Phương thức thanh toán: </span>
        <div class="form-check checkbox-payment">
            <input class="form-check-input" type="radio" name="radioPayment" id="tienmat" value="1" checked>
            <label class="form-check-label" for="tienmat">
                Thanh toán khi nhận hàng
            </label>
        </div>
        <div class="form-check checkbox-payment">
            <input class="form-check-input" type="radio" name="radioPayment" id="nganhang" value="2">
            <label class="form-check-label" for="nganhang">
                Ví ShopeePay (Liên kết tài khoản ngân hàng)
            </label>
        </div>
        <div class="form-check checkbox-payment">
            <input class="form-check-input" type="radio" name="radioPayment" id="tindung" value="3">
            <label class="form-check-label" for="tindung">
                Thẻ tín dụng/Ghi nợ
            </label>
        </div>

    </div>

    <div class="cart-item cart-space"></div>
    <div class="btn-order-container">
        <div class="row1">
            <span style="margin-right: 90px; ">Tổng tiền hàng</span>
            <span style="color: #05a;"><?php echo ($sumOderNotShip) ?>đ</span>
        </div>
        <div class="row2-order">
            <span style="margin-right: 48px; ">Phí vận chuyển</span>
            <span style="margin-left: 48px;" class="costShipment"><?php echo ($shipmentSession['Cost']); ?></span><span>đ</span>
        </div>
        <div class="row2-order">
            <span style="margin-right: -12px; ">Tổng thanh toán</span>
            <div class="sumMoneyOrder">
                <span class="sumMoneyOrdertxt"><?php echo ($sumOderNotShip + $shipmentSession['Cost']) ?></span><span>đ</span>
                <input type="hidden" class="form-control" id="TotalPrice" name="TotalPrice" value="<?php echo ($sumOderNotShip + $shipmentSession['Cost']); ?>" style="width:0%" readonly>
            </div>

        </div>
        <div class="row3-order">
            <span style="margin-left: 44px;">Nhấn "Đặt hàng" đồng nghĩa với việc bạn đồng ý tuân theo Điều khoản Shopee</span>
            <button class="btn btn--primary orderBtn" type="submit" name="orderButton">Đặt Hàng</button>
        </div>
    </div>
</form>