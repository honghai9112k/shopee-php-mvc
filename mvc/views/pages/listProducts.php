<?php
$allBoookCategory = [];
$allBoookCategory = $data["BookCategory"];
$allBoook = $data["Book"];

?>
<div class="grid">
    <div class="grid__row app__content">
        <div class="grid__column-2">
            <nav class="category">
                <h3 class="category__heading">
                    <i class="category__heading-icon fas fa-list"></i> Danh mục
                </h3>

                <ul class="category-list">
                    <li class="category-item category-item--active">
                        <a href="#" class="category-item__link">Tất cả</a>
                    </li>
                    <?php
                    foreach ($allBoookCategory as $key => $value) { ?>
                        <li class="category-item ">
                            <a href="#" class="category-item__link"><?php echo $value["Name"] ?></a>
                        </li>
                    <?php }
                    ?>
                </ul>
            </nav>
        </div>
        <div class="grid__column-10">
            <div class="home-filter">
                <span class="home-filter__lable">Sắp xếp theo</span>
                <button class="home-filter-btn btn">Phổ biến</button>
                <button class="home-filter-btn btn btn--primary">Mới nhất</button>
                <button class="home-filter-btn btn">Bán chạy</button>

                <div class="select-input">
                    <span class="select-input__lable">
                        Giá
                    </span>
                    <i class="select-input__icon fas fa-angle-down"></i>
                    <ul class="select-input__list">
                        <li class="select-input__item">
                            <a href="" class="select-input__link">Giá: Thấp đến cao</a>
                        </li>
                        <li class="select-input__item">
                            <a href="" class="select-input__link">Giá: Cao đến thấp</a>
                        </li>
                    </ul>
                </div>
                <div class="home-filter__page">
                    <span class="home-filter__page-num">
                        <span class="home-filter__page-current">1</span> / 14
                    </span>
                    <div class="home-filter__page-control">
                        <a class="home-filter__page-btn home-filter__page-btn__disable">
                            <i class="fas fa-angle-left home-filter__page-btn__no-enable"></i>
                        </a>
                        <a class="home-filter__page-btn ">
                            <i class="fas fa-angle-right home-filter__page-btn__enable"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="home-product">
                <div class="grid__row list-product">
                    <?php
                    foreach ($allBoook as $key => $value) { ?>
                        <div class="grid__column-2-5">
                            <a class="home-product-item" href="http://localhost/bookstore-mvc/Product/Show/<?php echo $value["Id_book"] ?> ?>">
                                <img src="http://localhost/bookstore-mvc/public/asset/img/<?php echo $value['Image'] ?>" alt="" class="home-product-item__img">
                                <h4 class="home-product-item__name"><?php echo $value["Title"] ?></h4>
                                <div class="home-product-item__price">
                                    <span class="home-product-item__price-old"><?php echo $value["Price"] ?> ₫</span>
                                    <span class="home-product-item__price-current"><?php echo ($value["Price"] * (100 - $value["Discount"]) / 100) ?> ₫</span>
                                </div>
                                <div class="home-product-item__action">
                                    <span class="home-product-item__like home-product-item__like--liked">
                                        <i class="home-product-item__like-icon-empty far fa-heart"></i>
                                        <i class="home-product-item__like-icon-fill fas fa-heart"></i>
                                    </span>
                                    <div class="home-product-item__rating">
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="home-product-item__star-gold fas fa-star"></i>
                                        <i class="fas fa-star <?php echo ($value["SoldNumber"] > 200) ? "home-product-item__star-gold" : ""; ?>"></i>
                                    </div>
                                    <div class="home-product-item__sold"><?php echo $value["SoldNumber"] ?> đã bán</div>
                                </div>
                                <div class="home-product-item__origin">
                                    <span class="home-product-item__brand">Whoo</span>
                                    <span class="home-product-item__origin-title"><?php echo $value["Language"] ?></span>
                                </div>
                                <div class="home-product-item__favourite">
                                    <i class="fas fa-check"></i>
                                    <span>Yêu thích</span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent"><?php echo $value["Discount"] ?>%</span>
                                    <span class="home-product-item__sale-off-lable">GIẢM</span>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
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