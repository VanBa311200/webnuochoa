<!-- header -->
<div class="header container-fuild">
    <div class="PageOverlay">
        <div class="loadingio-spinner-eclipse-rqxd1nl3lih">
            <div class="ldio-fjq0kufl1h">
                <div></div>
            </div>
        </div>
    </div>
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="head__left col-sm-12 col-lg-6">

                    <a href="#">Phone: (+84) 968246516</a>

                    <a href="#"><i class="flaticon-twitter"></i></a>
                    <a href="#"><i class="flaticon-facebook"></i></a>
                    <a href="#"><i class="flaticon-youtube"></i></a>
                    <a href="#"><i class="flaticon-instagram"></i></a>
                </div>
                <div class="head__right col-sm-12 col-lg-6">
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo "
                                <a href='/webnuochoa/account/'>
                                    <img src='/webnuochoa/public/image/profile-image/img-profile.png' alt='profile-img'>
                                </a>
                                <a href='/webnuochoa/account'>".$_SESSION['user']['fullname']."</a>
                                <a href='/webnuochoa/account/logout'>Đăng xuất</a>
                            ";
                        } else {
                            echo "
                            <a href='/webnuochoa/account/login'>Login</a>
                            <a href='/webnuochoa/account/register'>Register</a>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/webnuochoa/">ShopPI</a>
            <div class="button-mobile">
                <input type="checkbox">
                <div class="menu-icon">
                    <div class="menu-line"></div>
                </div>
                <div class="sideBar-mobile">
                    <div class="head-sidebar row">
                        <div class="col-12 img-profile d-flex justify-content-center">
                            <a href="/webnuochoa/account/">
                                <img src="/webnuochoa/public/image/profile-image/img-profile.png" alt="profile-img">
                            </a>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <?php
                                if(isset($_SESSION["user"])) {
                                    echo "
                                    <a href='/webnuochoa/account/'>".$_SESSION['user']['fullname']."</a>
                                    <a href='/webnuochoa/account/logout'>Đăng xuất</a>
                                    ";
                                } else {
                                    echo "
                                    <a href='/webnuochoa/account/login'>Đăng nhập</a>
                                    <a href='/webnuochoa/account/register'>Đăng ký</a>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="sidebar-shop d-flex">
                        <form action="">
                            <div class="form-search">
                                <input type="text" name="input-search" require>
                                <button type="button"><i class="flaticon-loupe"></i></button>
                            </div>
                        </form>
                        <div class="d-flex align-content-center shop-shopping">
                            <a href="#"><i class="flaticon-heart"><span class="status" id="heart">0</span></i></a>
                            <a href="#"><i class="flaticon-shopping-cart"><span
                                        class="status shopping-cart">0</span></i></a>
                        </div>
                    </div>
                    <div class="sidebar-container">
                        <li class="collab-sidebar"><a href="">Home</a></li>
                        <li class="collab-sidebar"><a href="">Perfume</a></li>
                        <li class="collab-sidebar"><a href="">Skin Care</a></li>
                        <li class="collab-sidebar"><a href="">For Man</a></li>
                        <li class="collab-sidebar"><a href="">Contact</a></li>
                    </div>
                    <div class="sidebar-footer">
                        <div class="sidebar-footer-left">
                            <i class="fas fa-phone-square-alt"></i>
                            <span>+84 68246516</span>
                        </div>
                        <div class="sidebar-footer-right">
                            <a href=""><i class="flaticon-facebook"></i></a>
                            <a href=""><i class="flaticon-youtube"></i></a>
                            <a href=""><i class="flaticon-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/webnuochoa/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Skin Care</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">For Man</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <div class="navbar-right row">
                    <div class="col-lg-8 col-md-7 d-flex align-content-center">
                        <form action="">
                            <div class="form-search">
                                <input type="text" name="input-search">
                                <button type="button"><i class="flaticon-loupe"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-7 d-flex align-content-center">
                        <a href="#"><i class="flaticon-heart"><span class="status" id="heart">0</span></i></a>
                        <a href="#"><i class="flaticon-shopping-cart"><span
                                    class="status shopping-cart">0</span></i></a>
                    </div>
                </div>
            </div> <!-- navbar-collapse -->
        </div> <!-- end container -->
    </nav> <!-- end nav -->
    <!-- Sider Shopping--Card -->
    <div class="slider-shoppingcard">
        <div class="header-shoppingCart">
            <h4>Giỏ hàng của bạn</h4>
            <button type='button' class="icon-close">
                <i class="fi-rr-cross"></i>
            </button>
        </div>
        <div class="body-shoppingCart">
            <p class="cart_empty">Giỏi hàng của bạn đang trống.</p>

            <form class="form-shoppingCart" action="" method="POST" enctype="multipart/form">
            <div class="cart_body">
                <div class="cart_itemList">
                        <!-- <div class="cart-itemWapper">
                                <div class="cart-item">
                                    <div class="cart_imageWapper">
                                        <img src="/Webnuochoa/public/image/product/product-1.1.jpg" alt="">
                                    </div>
                                    <div class="cart_infor">
                                        <h2 class="cart_infor-name">[New Arrival 2021] Montblanc Explorer Ultra Blue EDP</h2>
                                        <div class="cart_infor-option">
                                            <p class="cart_infor-ml">30ml</p>
                                            <div class="cart_infor-price">
                                                <span class="productInfo--price">1.500.000 VND</span>
                                            </div>
                                        </div>
                                        <div class="cart_action">
                                            <div class="cart_quantitySelector">
                                                <input type="number" name="quanlity" class="" min="1" value="1">
                                            </div>
                                            <div class="cart_deleteCart">
                                                <a>Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-itemWapper">
                                <div class="cart-item">
                                    <div class="cart_imageWapper">
                                        <img src="/Webnuochoa/public/image/product/product-1.1.jpg" alt="">
                                    </div>
                                    <div class="cart_infor">
                                        <h2 class="cart_infor-name">[New Arrival 2021] Montblanc Explorer Ultra Blue EDP</h2>
                                        <div class="cart_infor-option">
                                            <p class="cart_infor-ml">30ml</p>
                                            <div class="cart_infor-price">
                                                <span class="productInfo--price">1.500.000 VND</span>
                                            </div>
                                        </div>
                                        <div class="cart_action">
                                            <div class="cart_quantitySelector">
                                                <input type="number" name="quanlity"  class="" min="1" value="1">
                                            </div>
                                            <div class="cart_deleteCart">
                                                <a>Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-itemWapper">
                                <div class="cart-item">
                                    <div class="cart_imageWapper">
                                        <img src="/Webnuochoa/public/image/product/product-1.1.jpg" alt="">
                                    </div>
                                    <div class="cart_infor">
                                        <h2 class="cart_infor-name">[New Arrival 2021] Montblanc Explorer Ultra Blue EDP</h2>
                                        <div class="cart_infor-option">
                                            <p class="cart_infor-ml">30ml</p>
                                            <div class="cart_infor-price">
                                                <span class="productInfo--price">1.500.000 VND</span>
                                            </div>
                                        </div>
                                        <div class="cart_action">
                                            <div class="cart_quantitySelector">
                                                <input type="number" name="quanlity" class="" min="1" value="1">
                                            </div>
                                            <div class="cart_deleteCart">
                                                <a>Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                </div>

            </div> 
                <div class="cart_footer">
                    <div class="cart-footerWapper">
                        <p class="cart--taxes">Giá đã bao gồm thuế VAT và phí giao hàng miễn phí</p>
                        <a href='/webnuochoa/cart' type="button" class="cart-buttonPay button-primary">
                            <span>THANH TOÁN</span>
                            <span class="point-center"></span>
                            <span class="total-price">2200000</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast -->
    <div id="toastt">
    
        <!-- <div class="toastt toastt__success">
            <div class="toastt__icon toastt__icon--success">
                    <i class="fi-rr-check"></i>
            </div>

            <div class="toastt__info">
                <div class="toastt__title">Thành công</div>
                <div class="toastt__msg">Bạn đã thêm 1 sản phẩm thành công</div>
            </div>

            <div class="toastt__close">
                <i class="fi-rr-cross"></i>
            </div>
        </div> -->

    </div>
</div>
<!-- end header -->