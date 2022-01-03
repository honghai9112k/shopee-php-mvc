<?php
$allBoookCategory = [];
$allBoookCategory = $data["BookCategory"];
$allBoook = $data["Book"];

$user = [];
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
$allOrder = $data['Order'];
$id_order = 0;
?>
<div class="grid">
    <div class="grid__row app__content">
        <div class="grid__column-2">
            <nav class="category">
                <div class="user category__heading">
                    <div class="header__navbar-item header__navbar-user">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg" alt="" class="header__navbar-user-img" style="width: 30px; height: 30px;">
                        <div class="mx-3">
                            <h3 style="color: #333;"> <?php echo $user["Name"] ?></h3>
                            <a style="color: #888;text-transform: capitalize;text-decoration: none;font-weight: 400;" href="">Sửa thông tin</a>
                        </div>
                    </div>
                </div>

                <ul class="category-list">
                    <li class="category-item ">
                        <a href="#" class="category-item__link">12.12 Siêu Sale Sinh Nhật </a>
                    </li>
                    <li class="category-item ">
                        <a href="#" class="category-item__link">Tài khoản của tôi</a>
                    </li>
                    <li class="category-item category-item--active">
                        <a href="#" class="category-item__link">Đơn mua </a>
                    </li>
                    <li class="category-item ">
                        <a href="#" class="category-item__link">Thông báo</a>
                    </li>
                    <li class="category-item ">
                        <a href="#" class="category-item__link">Kho Voucher </a>
                    </li>
                    <li class="category-item ">
                        <a href="#" class="category-item__link">Shopee Xu</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="grid__column-10">

            <div class="nav nav-tabs headerTab nav-justified" id="nav-tab" role="tablist" style="font-size: 16px !important;">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-home" aria-selected="true" style="color: #fe6433; font-weight:500;">Tất cả</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-cf" role="tab" aria-controls="nav-profile" aria-selected="false" style="color: #fe6433;  font-weight:500;">Chờ xác nhận</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-wait" role="tab" aria-controls="nav-contact" aria-selected="false" style="color: #fe6433;  font-weight:500;">Chờ lấy hàng</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-delivery" role="tab" aria-controls="nav-contact" aria-selected="false" style="color: #fe6433;  font-weight:500;">Đang giao</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-delivered" role="tab" aria-controls="nav-contact" aria-selected="false" style="color: #fe6433;  font-weight:500;">Đã giao</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-contact" aria-selected="false" style="color: #fe6433;  font-weight:500;">Đã hủy</a>
            </div>


            <div class="home-product">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <?php foreach ($allOrder as $key => $value) {
                            $id_order = $value['Id_order'] ?>

                            <div class="orderItem" style="background-color: #fff;">
                                <div class=" headerItem">
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
                                    <span class="_1Xcrmf" style="color: #26aa99; margin-left: 16px;">Trạng thái đơn hàng</span>
                                    <span class="status" style="margin: 0 30px;color: #ee4d2d;"><?php echo $value['Status']; ?></span>
                                </div>
                                <div class="item-order">
                                    <div class="imgOrder-container">
                                        <img class="cart-item-img" src="http://localhost/bookstore-mvc/public/asset/book-imgs/<?php echo $value['Image']; ?>" alt="">
                                        <div class="detail-item-order">
                                            <p class="headerItemText"><?php echo 'Sách ' . $value['Title'] . ''; ?></p>
                                            <p style="font-size: 12px;color: rgba(0,0,0,.54);"><?php echo $value['NameCate']; ?> </p>
                                            <p>x<span class="amount-item-order"><?php echo $value['Amount']; ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="cart-item-price">
                                        <p class="price-1item-order" style="font-size: 14px;line-height: 16px;color: rgba(0,0,0,.87);"><?php echo ($value['Price'] * (100-$value['Discount']) / 100); ?>đ</p>
                                    </div>
                                </div>
                                <div class="btnOrder-container">
                                    <div class="d-flex price-row-order">
                                        <span class="zO5iWv">
                                            <div class="_-8oSuS"><svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.94 1.664s.492 5.81-1.35 9.548c0 0-.786 1.42-1.948 2.322 0 0-1.644 1.256-4.642 2.561V0s2.892 1.813 7.94 1.664zm-15.88 0C5.107 1.813 8 0 8 0v16.095c-2.998-1.305-4.642-2.56-4.642-2.56-1.162-.903-1.947-2.323-1.947-2.323C-.432 7.474.059 1.664.059 1.664z" fill="url(#paint0_linear)"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.073 6.905s-1.09-.414-.735-1.293c0 0 .255-.633 1.06-.348l4.84 2.55c.374-2.013.286-4.009.286-4.009-3.514.093-5.527-1.21-5.527-1.21s-2.01 1.306-5.521 1.213c0 0-.06 1.352.127 2.955l5.023 2.59s1.09.42.693 1.213c0 0-.285.572-1.09.28L2.928 8.593c.126.502.285.99.488 1.43 0 0 .456.922 1.233 1.56 0 0 1.264 1.126 3.348 1.941 2.087-.813 3.352-1.963 3.352-1.963.785-.66 1.235-1.556 1.235-1.556a6.99 6.99 0 00.252-.632L8.073 6.905z" fill="#FEFEFE"></path>
                                                    <defs>
                                                        <linearGradient id="paint0_linear" x1="8" y1="0" x2="8" y2="16.095" gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#F53D2D"></stop>
                                                            <stop offset="1" stop-color="#F63"></stop>
                                                        </linearGradient>
                                                    </defs>
                                                </svg></div>
                                        </span>
                                        <span class="sumPrice-text"> Tổng số tiền:</span><span class="sumPrice-item-order"><?php echo ($value['Price'] * $value['Amount'] * (100-$value['Discount'])/100 + $value['Cost']); ?>đ</span>
                                    </div>
                                    <div class="d-flex last-row-order">
                                        <div style="max-width: 400px;">
                                            <span class="text-last-row">
                                                Bạn hài lòng với sản phẩm đã nhận? Nếu có, chọn "Đã nhận được hàng" nha. Nếu không, vui lòng chọn "Trả hàng/ Hoàn tiền" trước ngày nha.
                                            </span>
                                        </div>
                                        <div>
                                            <button class="btn btn-removeOrder">
                                                Hủy đơn hàng
                                            </button>
                                            <button class="btn btn-mess-shop">Liên hệ người bán</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-item cart-space"></div>
                            </div>
                        <?php } ?>
                        <?php if ($id_order != 0) { ?>
                            <div class="d-flex last-row-order" style="background-color: #fff; background-color: #fff;justify-content: center;margin:0;">
                                <div>
                                    <button class="btn btn--primary">
                                        <a href="http://localhost/bookstore-mvc/Order/DeleteOrder/<?php echo $id_order ?>" class="dis-a" style="padding: 20px 16px;text-decoration: none !important;    color: #fff !important;">
                                            Xóa hết đơn hàng
                                        </a>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                        
                    </div>
                    <div class="tab-pane fade" id="nav-cf" role="tabpanel" aria-labelledby="nav-cf-tab">2</div>
                    <div class="tab-pane fade" id="nav-wait" role="tabpanel" aria-labelledby="nav-wait-tab">3</div>
                    <div class="tab-pane fade" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab">4</div>
                    <div class="tab-pane fade" id="nav-delivered" role="tabpanel" aria-labelledby="nav-delivered-tab">5</div>
                    <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab">6</div>
                </div>
            </div>

            <ul class="pagination home-product-pagination">
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">
                        <i class="pagination-item__icon fas fa-angle-left"></i>
                    </a>
                </li>

                <li class="pagination-item pagination-item--active">
                    <a href="" class="pagination-item__link">1</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">2</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">3</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">4</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">5</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">...</a>
                </li>
                <li class="pagination-item">
                    <a href="" class="pagination-item__link">10</a>
                </li>

                <li class="pagination-item">
                    <a href="" class="pagination-item__link">
                        <i class="pagination-item__icon fas fa-angle-right"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>