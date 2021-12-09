<!-- <li>
    <div class="user">
        <div class="header__navbar-item header__navbar-user">
            <a href="" class="header__navbar-item-link " data-toggle="modal" data-target="#register">Đăng Ký</a>
            <span class="loginSpace" style="padding: 0 16px; font-size:16px; color: #fff !important;cursor: auto;">|</span>
            <a href="" class="header__navbar-item-link  " data-toggle="modal" data-target="#login">Đăng Nhập</a>
        </div>
    </div>
</li> -->
<?php
$user = [];
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

if (isset($user["Username"])) { ?>
    <li>
        <div class="user">
            <div class="header__navbar-item header__navbar-user">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg" alt="" class="header__navbar-user-img">
                <span class="header__navbar-user-name"> <?php echo $user["Username"] ?></span>
                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-item">
                        <a href="">Tài khoản của tôi</a>
                    </li>
                    <li class="header__navbar-user-item">
                        <a href="">Địa chỉ của tôi</a>
                    </li>
                    <li class="header__navbar-user-item">
                        <a href="">Đơn mua</a>
                    </li>
                    <li class="header__navbar-user-item" style="color: #666;">
                        <a href="./Home/Logout">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
<?php } else { ?>
    <li>
        <div class="user">
            <div class="header__navbar-item header__navbar-user">
                <a href="" class="header__navbar-item-link " data-toggle="modal" data-target="#register">Đăng Ký</a>
                <span class="loginSpace" style="padding: 0 16px; font-size:16px; color: #fff !important;cursor: auto;">|</span>
                <a href="" class="header__navbar-item-link  " data-toggle="modal" data-target="#login">Đăng Nhập</a>
            </div>
        </div>
    </li>
<?php } ?>


<!-- <li>
    <div class="user">
        <div class="header__navbar-item header__navbar-user">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg" alt="" class="header__navbar-user-img">
            <span class="header__navbar-user-name">Tên</span>
            <ul class="header__navbar-user-menu">
                <li class="header__navbar-user-item">
                    <a href="">Tài khoản của tôi</a>
                </li>
                <li class="header__navbar-user-item">
                    <a href="">Địa chỉ của tôi</a>
                </li>
                <li class="header__navbar-user-item">
                    <a href="">Đơn mua</a>
                </li>
                <li class="header__navbar-user-item" style="color: #666;">
                    <a>Đăng xuất</a>
                </li>
            </ul>
        </div>
    </div>
</li> -->

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="auth-form active" id="registerForm" method="POST" role="form" action="./Home/createAccount">
                <div class="auth-form__container" style="margin-top: 20px;">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng ký</h3>
                        <span class="auth-form__switch-btn">Đăng nhập</span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group form-group">
                            <input id="Mail" type="email" class="auth-form__input register" placeholder="Email của bạn" name="Mail">
                            <div class="error-msg"></div>
                        </div>
                        <div class="auth-form__group form-group">
                            <input id="Name" type="text" class="auth-form__input register" placeholder="Tên của bạn" name="Name">
                            <div class="error-msg"></div>
                        </div>
                        <div class="auth-form__group form-group">
                            <input id="Phone" type="text" class="auth-form__input register" placeholder="SĐT của bạn" name="Phone">
                            <div class="error-msg"></div>
                        </div>
                        <div class="auth-form__group form-group">
                            <input id="Username" type="text" class="auth-form__input register" placeholder="Username của bạn" name="Username">
                            <div class="error-msg msgUsername"></div>
                        </div>
                        <div class="auth-form__group form-group">
                            <input id="Password" type="password" class="auth-form__input register" placeholder="Mật khẩu của bạn" name="Password">
                            <div class="error-msg"></div>
                        </div>
                        <div class="auth-form__group form-group">
                            <input id="rPassword" type="password" class="auth-form__input register" placeholder="Nhập lại mật khẩu" name="rPassword">
                            <div class="error-msg"></div>
                        </div>
                    </div>

                    <div class="auth-form__aside">
                        <p class="auth-form__policy-text">
                            Bằng việc đăng ký, bạn đã đồng ý với Shopee về
                            <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>&
                            <a href="" class="auth-form__text-link">Chính sách bảo mật</a>

                        </p>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn cancle" data-dismiss="modal">TRỞ LẠI</button>
                        <button id="btnRegister" name="btnRegister" class="btn btn--primary" type="submit">ĐĂNG KÝ</button>
                    </div>
                </div>

                <div class="auth-form__socials">
                    <a href="" class="btn btn--with-icon btn--with-icon-facebook ">
                        <i class="fab fa-facebook-square "></i> <span style="font-size: 15px;">Kết nối với facebook</span> 
                    </a>
                    <a href="" class="btn btn--with-icon btn--with-icon-google">
                        <i class="fab fa-google"></i> <span style="font-size: 15px;">Kết nối với google</span> 
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="auth-form active" id="loginForm" method="POST" role="form" action="./Home/LoginAccount">
                <div class="auth-form__container" style="margin-top: 25px;">
                    <div class="auth-form__header">
                        <h3 class="auth-form__heading">Đăng nhập</h3>
                        <span class="auth-form__switch-btn">Đăng ký</span>
                    </div>
                    <div class="auth-form__form">
                        <div class="auth-form__group form-group">
                            <input id="Username" type="text" class="auth-form__input login" placeholder="Username của bạn" name="Username">
                            <div class="error-msg"></div>
                        </div>
                        <div class="auth-form__group form-group">
                            <input id="Password" type="password" class="auth-form__input login" placeholder="Mật khẩu của bạn" name="Password">
                            <div class="error-msg"></div>
                        </div>

                    </div>

                    <div class="auth-form__aside">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                            <span class="auth-form__help-saparate"></span>
                            <a href="" class="auth-form__help-link auth-form__help-help">Cần trợ giúp ?</a>
                        </div>
                    </div>

                    <div class="auth-form__controls">
                        <button class="btn cancle" data-dismiss="modal">TRỞ LẠI</button>
                        <button id="btnLogin" name="btnLogin" class="btn btn--primary" type="submit">ĐĂNG NHẬP</button>
                    </div>
                </div>

                <div class="auth-form__socials">
                    <a href="" class="btn btn--with-icon btn--with-icon-facebook ">
                        <i class="fab fa-facebook-square "></i> <span style="font-size: 15px;">Kết nối với facebook</span> 
                    </a>
                    <a href="" class="btn btn--with-icon btn--with-icon-google">
                        <i class="fab fa-google"></i> <span style="font-size: 15px;">Kết nối với google</span> 
                    </a>

                </div>
            </form>
        </div>
    </div>
</div>



<!-- <script>
    $(document).ready(function() {
        $('#btn-register').click(function() {
            var newdata = $("#registerForm :input").serializeArray();
            $.post($("#registerForm").attr("action"), newdata);
        })
    })
</script> -->