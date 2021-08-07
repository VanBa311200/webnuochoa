<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/Webnuochoa/public/library/bootstrap/css/bootstrap.min.css">

    <!-- Flaticon -->
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/flaticon/flaticon.css">
    <link rel='stylesheet' href='/Webnuochoa/public/fonts/flaticon/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/font-awesome/css/all.css">
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/font-awesome/css/v4-shims.css">

    <!-- Font Family  -->
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/font-family/stylesheet.fonts.css">


    <!-- Css style -->
    <link rel="stylesheet" href="/Webnuochoa/public/css/style.css">

    <!-- AOS animation scroll -->
    <link rel="stylesheet" href="/Webnuochoa/public/library/aos/dist/aos.css">

    <title>ShopPI</title>
</head>

<body>
    <div class="main">
        <div class="wrapper">
            <?php
                require_once "./mvc/views/components/header.php";
                require_once "./mvc/views/components/banner.php";
                require_once "./mvc/views/pages/".$data["page"].".php";
            ?>
        </div>
        <?php
            require_once "./mvc/views/components/footer.php";
        ?>
    <!-- modal -->
    <div class="modall">
            
            <div class="modall__overplay">
            </div>

            <div class="modall__body">
                <!-- QuickView modal -->
                <div class="modall__quickview">

                    <!-- <div class="row">
                        <div class="col-6 DetailProduct__right">
                            <div class="DetailProduct__right-ListImageProduct">
                                <img class="item-listImg" src="/Webnuochoa/public/image/product/product-1.1.jpg" alt="">
                                <img class="item-listImg" src="/Webnuochoa/public/image/product/product-1.2.jpg" alt="">
                                <img class="item-listImg" src="/Webnuochoa/public/image/product/product-1.3.jpg" alt="">
                            </div>

                            <div class="controll-icon-listImage">
                                <div class="icon-prev"><i class="fi-rr-angle-left"></i></div>
                                <div class="icon-next"><i class="fi-rr-angle-right"></i></div>
                            </div>

                            <div class="controll-bottomImage">
                                <div class="controll-item"><img class="item-listImg active" src="/Webnuochoa/public/image/product/product-1.1.jpg" alt=""></div>
                                <div class="controll-item"><img class="item-listImg" src="/Webnuochoa/public/image/product/product-1.2.jpg" alt=""></div>
                                <div class="controll-item"><img class="item-listImg" src="/Webnuochoa/public/image/product/product-1.3.jpg" alt=""></div>
                            </div>

                        </div>
                        <div class="col-6 DetailProduct__left">
                            <div class="icon-close-quickview"><i class="fi-rr-cross"></i></div>
                            <div class="DetailProduct__left-brand">
                                <h4>Montblanc</h4>
                            </div>
                            <div class="DetailProduct__left-Name">
                                <h4>[New Arrival 2021] Montblanc Explorer Ultra Blue EDP</h4>
                            </div>
                            <div class="DetailProduct__left-Rating">
                            <div class='productInfo--rating'>
                                <div class='start-outer'>
                                    <div class='start-inner'></div>
                                </div>
                                <span class='rating-number'>4.5</span>
                            </div>
                            </div>
                            <div class="DetailProduct__left-Description">
                                <h4>Người đàn ông Explorer Ultra Blue tự tin, quyết đoán và tinh thần phiêu lưu bất
                                    diệt.
                                    Anh ta tôn vinh màu xanh, màu của bầu trời và biển cả,
                                    màu xanh của những đỉnh núi phủ tuyết và những mặt hồ rộng lớn.</h4>
                            </div>
                            
                            <form action="" method="GET" enctype="multipart/form-data" class="DetailProduct__left-form">
                                <div class="DetailProduct__left-form__Wapper">
                                    
                                    <div class="DetailProduct__left-Option">
                                        <span>Kích thước: </span>
                                        <select id="DetailProduct__left-OptionSize" name="option-size">
                                            <option value="30ml">30ml</option>
                                            <option value="60ml">60ml</option>
                                            <option value="100ml">100ml</option>
                                        </select>
                                    </div>
                                    
                                    <div class="DetailProduct__left-Quality">
                                        <span>Số lượng: </span>
                                        <div class='DetailProduct__left-quanlityWapper'>
                                            <div class='quality-plus'><i class="fi-rr-plus-small"></i></div>
                                            <input type="number" autocomplete="false" id="quantity" name="quantity" min="1" value="1">
                                            <div class='quality-minus'><i class="fi-rr-minus-small"></i></div>
                                        </div>
                                    </div>

                                    <div class="DetailProduct__left-Price">
                                        
                                        <p>Giá: <span class="productInfo--price" name="price">1.350.000 VND </span><span class="sale-percent">-25%</span></p>
                                    </div>

                                    <button type="button" class="DetailProduct__addtocard button-primary">Thêm giỏ hàng</button>
                                
                                </div>
                            </form>

                        </div>
                    </div> -->

                </div>

            </div>
        </div>
    </div>
    </div>

    <script src="/Webnuochoa/public/js/JQuery-3.6.0.js"></script>
    <script src="/Webnuochoa/public/js/main.js"></script>
    <script src="/Webnuochoa/public/library/aos/dist/aos.js"></script>
    <script src="/Webnuochoa/public/library/bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        AOS.init();
    </script>
</body>

</html>