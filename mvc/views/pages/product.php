<?php
$allBoook = $data["Book"];
$bookFind = $data["BookFind"];
$allAddress = $data["AllAddress"];
$user = [];
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>
<div class="grid">
    <div class="grid__row product-detail">
        <img src="http://localhost/shopee-php-mvc-dao/public/asset/book-imgs/<?php echo $bookFind['Image'] ?>" alt="" class="product-detail-img">
        <div class="product-detail-infor">
            <h1 class="" style="font-size: 24px;"><?php echo $bookFind['Title'] ?>-<?php echo $bookFind['AuthorName'] ?></h1>
            <div class="product-detail-name" style="display: flex; margin: 8px 0;">
                <p class="numberStar"><?php echo ($bookFind["SoldNumber"] > 200) ? "5" : "4"; ?></p>
                <div class="home-product-item__rating" style="font-size:1.5rem; margin-top:3px; margin-left:0;">
                    <i class="home-product-item__star-red fas fa-star"></i>
                    <i class="home-product-item__star-red fas fa-star"></i>
                    <i class="home-product-item__star-red fas fa-star"></i>
                    <i class="home-product-item__star-red fas fa-star"></i>
                    <i class="fas fa-star <?php echo ($bookFind["SoldNumber"] > 200) ? "home-product-item__star-gold" : ""; ?>"></i>
                </div>

                <div class="numberVote">
                    <p class="numberVoteText">4 đánh giá</p>
                </div>
                <div>
                    <p class="soldNumberText"><?php echo $bookFind["SoldNumber"] ?> đã bán</p>
                </div>
            </div>
            <div class="product-detail-price">
                <div class="product-detail-price-price">
                    <p class="product-detail-priceOld"><?php echo $bookFind['Price'] ?> ₫</p>
                    <p class="product-detail-priceSale" style="font-size: 30px;"><?php echo ($bookFind["Price"] * (100 - $bookFind["Discount"]) / 100) ?> ₫</p>
                    <p class="product-detail-percentSale"><?php echo $bookFind["Discount"] ?>% GIẢM</p>
                </div>
                <div class="product-detail-price-slogan">
                    <img src="./asset/img/soganicon.png" alt="" class="product-detail-price-slogan-img">
                    <!-- <div class="product-detail-price-slogan-text-text">
                        <p class="product-detail-price-slogan-text">Gì cũng rẻ</p>
                        <p class="product-detail-price-slogan-ad">Giá tốt nhất so với các sản phẩm cùng loại trên Shopee!</p>
                    </div> -->
                </div>
            </div>
            <div class="product-detail-shipment">
                <div style="color: #888;">
                    <div class="addressProduct">
                        <p style="font-size: 16px;">Vận chuyển tới: </p>
                        <svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon icon-free-shipping-line">
                            <g>
                                <line fill="none" stroke-linejoin="round" stroke-miterlimit="10" x1="8.6" x2="4.2" y1="9.8" y2="9.8"></line>
                                <circle cx="3" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                <circle cx="10" cy="11.2" fill="none" r="2" stroke-miterlimit="10"></circle>
                                <line fill="none" stroke-miterlimit="10" x1="10.5" x2="14.4" y1="7.3" y2="7.3"></line>
                                <polyline fill="none" points="1.5 9.8 .5 9.8 .5 1.8 10 1.8 10 9.1" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                                <polyline fill="none" points="9.9 3.8 14 3.8 14.5 10.2 11.9 10.2" stroke-linejoin="round" stroke-miterlimit="10"></polyline>
                            </g>
                        </svg>
                        <select class="custom-select addressProduct_select" id="addressId" name="addressId" style="font-size: 12px;color: #666;">
                            <option <?php echo (empty($user)) ? "" : "selected"; ?>>Chọn địa chỉ của bạn</option>
                            <?php foreach ($allAddress as $key => $value) { ?>
                                <option value="<?php echo $value['Id_address'] ?>" <?php if (isset($user['AddressId']) && $user['AddressId'] == $value['Id_address']) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    <?php echo "Số " . $value['NumberHouse'] . ",Đường " . $value['Street'] . ", " . $value['District'] . ", " . $value['City'] . ", " . $value['Nation'] . " " ?>
                                </option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="addressProduct">
                        <label for="priceShipment" style="width:auto;font-size: 16px;">Phí vận chuyển: <i class="fa fa-chevron-down" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>
            <form role="form" method="POST" id="addCartForm" action="http://localhost/shopee-php-mvc-dao/Cart/AddItemToCart/<?php echo $bookFind['Id_bookItem']; ?>">
                <div class="addressProduct input-group-lg">
                    <label for="Amount" style="width:auto;font-size: 16px; color: #888;">Số lượng: </label>
                    <button class="btn addLeftBtn"><i class="fa fa-minus" aria-hidden="true"></i></button>
                    <input name="Amount" class=" form-control quantityProductClass text-center" id="Amount" type="text" class="auth-form__input" placeholder="" name="priceShipment" style="font-size: 12px;" value="1">
                    <button class="btn addRightBtn"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                <div class="btn-container">
                    <button class="product-detail-btn" style="margin-right: 26px;" type="submit" name="addCartBtn" id="addCartBtn">
                        <i class="fas fa-cart-plus product-detail-btn-icon"></i>
                        Thêm Vào Giỏ Hàng
                    </button>
                    <!-- <button id="addCartBtn">click me</button> -->
                    <button id="orderCartBtn" name="orderCartBtn" class="btn btn--primary" type="submit">Mua Ngay</button>
                    <div class="checkorder"></div>
                </div>
            </form>


        </div>

    </div>
    <div class="grid__row product-detail">
        <div class="product-detail-infor" style="width:100%">
            <h1 class="product-detail-name header-des">CHI TIẾT SẢN PHẨM</h1>
            <div class="product-detail-price" style="background-color: #fff;">
                <div class="d-flex">
                    <label for="" class="label-des">Danh mục:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["CategoryName"]; ?>
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Nhập khẩu/ Trong nước:</label>
                    <div style="font-size: 16px;">
                        Trong nước
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Gửi từ:</label>
                    <div style="font-size: 16px;">
                        Hà Đông, Hà Nội
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Thương hiệu:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["AuthorName"]; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid__row product-detail">
        <div class="product-detail-infor" style="width:100%">
            <h1 class="product-detail-name header-des">MÔ TẢ SẢN PHẨM</h1>
            <div class="product-detail-price" style="background-color: #fff;">
                <div class="d-flex">
                    <label for="" class="label-des">Nhà xuất bản:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["publisherName"]; ?>
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Loại bìa:</label>
                    <div style="font-size: 16px;">
                        Bìa mềm
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Tác giả:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["AuthorName"]; ?>
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Số trang:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["NumberOfPage"]; ?>
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Ngày xuất bản:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["PublicationDate"]; ?>
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">ISBN:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["ISBN"]; ?>
                    </div>
                </div>
                <div class="d-flex">
                    <label for="" class="label-des">Ngôn ngữ:</label>
                    <div style="font-size: 16px;">
                        <?php echo $bookFind["Language"]; ?>
                    </div>
                </div>
                </br>
                <div>
                    <p class="descText"><?php echo $bookFind["Summary"]; ?> </p>
                    </br>
                    <p class="descText"><?php echo $bookFind["Description"]; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid__row product-detail">
        <div class="product-detail-infor" style="width:100%">
            <h1 class="product-detail-name header-des">ĐÁNH GIÁ SẢN PHẨM</h1>
            <div class="product-detail-price" style="background-color: #fff;">

            </div>
        </div>
    </div>

</div>
<!-- <script>
    $(document).ready(function () {
    $("#addCartBtn").click(function () {
        $.post("http://localhost/shopee-php-mvc-dao/mvc/controllers/Ajax/addCart", {}, function (data1) {
            $(".checkorder").html(data1);
        })
    });
});
</script> -->