<?php
$allBoookCategory = [];
$allBoookCategory = $data["BookCategory"];
$allBoook = $data["Book"];

$user = [];
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
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
            <div class="home-filter">
                <span class="home-filter__lable">Sắp xếp theo</span>
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-cf" role="tab" aria-controls="nav-profile" aria-selected="false">Chờ xác nhận</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-wait" role="tab" aria-controls="nav-contact" aria-selected="false">Chờ lấy hàng</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-delivery" role="tab" aria-controls="nav-contact" aria-selected="false">Đang giao</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-delivered" role="tab" aria-controls="nav-contact" aria-selected="false">Đã giao</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-cancelled" role="tab" aria-controls="nav-contact" aria-selected="false">Đã hủy</a>
                    </div>
                </nav>
                
            </div>

            <div class="home-product">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">1</div>
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