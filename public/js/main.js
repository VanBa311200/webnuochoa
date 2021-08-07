$(document).ready(function () {
    $('.modall').css('display', 'none');


    $(window).on('resize', function () {
        if ($(this).width() <= 576) {
            $('.carousel-item:nth-child(1) img').attr('src', '/webnuochoa/public/image/mobile-banner1.jpg')
            $('.carousel-item:nth-child(2) img').attr('src', '/webnuochoa/public/image/mobile-banner2.jpg')
            $('.carousel-item:nth-child(3) img').attr('src', '/webnuochoa/public/image/mobile-banner3.jpg')
            $('.carousel-item:nth-child(4) img').attr('src', '/webnuochoa/public/image/mobile-banner4.jpg')
            $('.carousel-item:nth-child(5) img').attr('src', '/webnuochoa/public/image/mobile-banner5.jpg')
        } else {
            $('.carousel-item:nth-child(1) img').attr('src', '/webnuochoa/public/image/banner1.jpg')
            $('.carousel-item:nth-child(2) img').attr('src', '/webnuochoa/public/image/banner2.jpg')
            $('.carousel-item:nth-child(3) img').attr('src', '/webnuochoa/public/image/banner3.jpg')
            $('.carousel-item:nth-child(4) img').attr('src', '/webnuochoa/public/image/banner4.jpg')
            $('.carousel-item:nth-child(5) img').attr('src', '/webnuochoa/public/image/banner5.jpg')
        }
    });

    /*--------------------------------------------------------------------------*/
    /*---------------------------------Rating-----------------------------------*/

    const totals = 5;

    getRating();

    function getRating() {

        $.each($('.start-inner'), function (index, element) {
            const get__eleNumRating = $(element).parent().siblings('.rating-number');
            $.each($(get__eleNumRating), function (index, ele) {
                var startPercent = `${(parseFloat($(ele).text()) / totals) * 100}%`;
                $(element).css("width", startPercent);
            });
        });
    }


    /*---------------------------------------------------------------------------------------------*/
    /*--------------------------------- No croll mobile sideBar -----------------------------------*/


    // Shopping Cart toggle
    $('.flaticon-shopping-cart').on('click', function () {

        // no page scroll
        $('html').addClass('no-scroll');

        // active overlay
        $('.PageOverlay').addClass('is-visible');

        // active slider shoppingcard
        $('.slider-shoppingcard').addClass('active');

        // animation Item cart
        $('.cart-itemWapper').css('animation', 'animation_slideToLeft ease-out 0.7s .25s forwards');
        $('.cart-itemWapper').css('display', 'block');

        // animation Footer cart
        $('.cart_footer').css('animation', 'animation_toTop ease-out 0.4s .7s forwards');
        $('.cart_footer').css('display', listItemCart.length ? '' : 'none');

        // option cart empty
        $('.cart_empty').css('display', !listItemCart.length ? 'block' : 'none');

        // set state button-mobile == flase
        $('.button-mobile input[type="checkbox"]').prop("checked", false);

        // event click overlay
        $('.PageOverlay.is-visible').on('click', function () {

            // animation Item cart
            $('.cart-itemWapper').css('animation', 'none');

            // animation cart empty
            $('.cart_empty').css('animation', '');

            $('.PageOverlay').removeClass('is-visible');
            $('.slider-shoppingcard').removeClass('active');

            // animation Footer cart
            $('.cart_footer').css('animation', 'none');
            $('html').removeClass('no-scroll');
        });

        // event click icon close
        $('button.icon-close').on('click', function () {

            // animation Item cart
            $('.cart-itemWapper').css('animation', 'none');

            $('.PageOverlay').removeClass('is-visible');
            $('.slider-shoppingcard').removeClass('active');

            // animation Footer cart
            $('.cart_footer').css('animation', 'none');
            $('html').removeClass('no-scroll');
        });
    });


    // Menu toggle
    $('.button-mobile input[type="checkbox"]').on('click', function () {
        if ($(this).prop("checked")) {
            $('html').addClass('no-scroll');
            $('.PageOverlay').addClass('is-visible');

            // animation sideBar 
            $('.sideBar-mobile li.collab-sidebar:nth-child(1)').css('animation', 'slideToRight .3s ease-out .6s forwards');
            $('.sideBar-mobile li.collab-sidebar:nth-child(2)').css('animation', 'slideToRight .3s ease-out .7s forwards');
            $('.sideBar-mobile li.collab-sidebar:nth-child(3)').css('animation', 'slideToRight .3s ease-out .8s forwards');
            $('.sideBar-mobile li.collab-sidebar:nth-child(4)').css('animation', 'slideToRight .3s ease-out .9s forwards');
            $('.sideBar-mobile li.collab-sidebar:nth-child(5)').css('animation', 'slideToRight .3s ease-out 1.0s forwards');
            $('.sideBar-mobile .sidebar-footer').css('animation', 'animation_toTop ease-out .6s 0.7s forwards');

            // icon Close
            $('.PageOverlay.is-visible').on('click', function () {
                $('.button-mobile input[type="checkbox"]').prop("checked", false)

                // animation sideBar
                $('.sideBar-mobile .sidebar-footer').css('animation', 'none');
                $('.sideBar-mobile li.collab-sidebar').css('animation', 'none');

                $('.PageOverlay').removeClass('is-visible');
                $('html').removeClass('no-scroll');
            })
        } else {
            $('html').removeClass('no-scroll');
            $('.PageOverlay').removeClass('is-visible');

            // animation sideBar
            $('.sideBar-mobile li.collab-sidebar').css('animation', 'none');
            $('.sideBar-mobile .sidebar-footer').css('animation', 'none');
        }
    })


    /*--------------------------------------------------------------------------*/
    /*--------------------------------- QuickViews -----------------------------------*/

    var intervalSlider;
    const quickView = $('.modall__quickview');


    function openQuickView() {
        $('.cart_footer').css('display', 'block');
        $('html').addClass('no-scroll');

        // animation modall
        $('.modall').css('display', '');
        $('.modall').css('animation', 'fadeIn linear .2s forwards');
        $('.modall__body').css('animation', 'growth linear .2s forwards')
    }

    function closeQuickView() {
        $('.cart_footer').css('display', '');
        $('.option-detail').css('display', '');
        $('html').removeClass('no-scroll');

        // animation modall
        $('.modall').css('animation', 'fadeOut linear .2s forwards');
        $('.modall__body').css('animation', 'growthIn linear .2s forwards');
        // $('.modall').css('display', '');

        setTimeout(function () {
            $('.modall').css('display', 'none');
        }, 300);

        // remove child elements in quickview
        quickView.empty();

        $('#quantity').val(1);

        // ClearInterval running
        clearInterval(intervalSlider);
    }



    /*------------------------------------------------------------------------------------*/
    /*--------------------------------- Process Modall -----------------------------------*/

    var products = [];
    var productCurrent = {};
    var listItemCart = [];
    var id;

    // Sử lý localstorage
    if (localStorage.getItem('listItemCart')) {
        listItemCart = getLocalStore('listItemCart');
        updatecountItemCart();
        loadItemCart();
        totalPrice();
    }

    function setLocalStore(key, value) {
        localStorage.setItem(key, JSON.stringify(value));
    }

    function getLocalStore(name) {
        listItemCart = localStorage.getItem(name);
        return JSON.parse(listItemCart);
    }


    // Load Data File JSON
    // function loadData() {
    //     $.getJSON("/webnuochoa/mvc/models/P.json", function (data) {
    //         $.each(data['products'], function (index, product) {
    //             products[index] = product;
    //         });
    //     });
    // };
    // loadData();


    
    function getproducts() {
        $.get('/webnuochoa/ajax/getProducts', { } ,function (data) {
            let allProduct = JSON.parse(data);
            $.each(allProduct, function (index, product) {
                products[index] = product;
            })
            // console.log(products);
        });
    }

    getproducts();

    function getCurrentProduct(id) {
        var currentProduct;

        $.each(products, function (index, product) {
            if (product['id'] == id) {
                currentProduct = product;
                return false;
            }
        })
        return currentProduct;
    }


    // Process ViewQuick
    $('.option-detail .ViewQuick').on('click', function () {

        // Lấy giá trị [data-id] thẻ cha ('.productItem')
        var id_product = ($(this).parents('.productItem').data('id'));
        id = id_product;

        // Lấy product tương ứng với [id_product - 1] ( vì id >= 1 && products[] >= 0 ) 
        var product = products[id_product - 1];
        productCurrent = product;

        // console.log(productCurrent)

        var ListImageProduct = [];
        var controllListProduct = [];

        $.each(product['images'], function (index, value) {
            ListImageProduct[index] = "<img class='item-listImg' src='" + value['image'] + "' alt='" + product['name'] + "'>";
        })

        $.each(product['images'], function (index, value) {
            controllListProduct[index] = "<div class='controll-item'><img class='item-listImg' src='" + value['image'] + "' alt='" + product['name'] + "'></div>";
        })

        // add elements quickView
        quickView.html(`
        <div class="row"> 
            <div class="col-6 DetailProduct__right">
                <div class="DetailProduct__right-ListImageProduct">
                    ${ListImageProduct.join(" ")}
                </div>

                <div class="controll-icon-listImage">
                    <div class="icon-prev"><i class="fi-rr-angle-left"></i></div>
                    <div class="icon-next"><i class="fi-rr-angle-right"></i></div>
                </div>

                <div class="controll-bottomImage">
                    ${controllListProduct.join(" ")}           
                </div>

            </div>
            <div class="col-6 DetailProduct__left">
                <div class="icon-close-quickview"><i class="fi-rr-cross"></i></div>
                <div class="DetailProduct__left-brand">
                    <h4>${product['brand']}</h4>
                </div>
                <div class="DetailProduct__left-Name">
                    <h4>${product['name']}</h4>
                </div>
                <div class="DetailProduct__left-Rating">
                <div class='productInfo--rating'>
                    <div class='start-outer'>
                        <div class='start-inner'></div>
                    </div>
                    <span class='rating-number'>${product['rating-number'] > 0 ? product['rating-number'] : ' '}</span>
                </div>
                </div>
                <div class="DetailProduct__left-Description">
                    <h4>${product['description']}</h4>
                </div>
                
                <form action="" autocomplete="off" method="GET" enctype="multipart/form-data" class="DetailProduct__left-form">
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
                                <div class='quality-minus'><i class="fi-rr-minus-small"></i></div>
                                <input type="text" autocomplete="off" class="quantity" name="quantity" min="1" value="1">
                                <div class='quality-plus'><i class="fi-rr-plus-small"></i></div>
                            </div>
                        </div>

                        <div class="DetailProduct__left-Price">
                            
                            <p>Giá: 
                                <span class="productInfo--price" name="price">
                                    ${parseInt(product['price-sale']).toLocaleString('it-IT', {
                                        style: 'currency',
                                        currency: 'VND'
                                        })}
                                </span>
                                <span class="sale-percent">
                                    -${product['percent-sale']}%
                                </span>
                            </p>
                        </div>

                        <button type="button" class="DetailProduct__addtocard button-primary">Thêm giỏ hàng</button>
                    
                    </div>
                </form>
            </div>
        </div>
        `);

        // even add to cart
        addToCart();

        // set Rating
        getRating();

        // close quick view 
        $('.icon-close-quickview').on('click', function () {
            closeQuickView();
        })

        // Process img slider
        img_slider_process();

        // hidden button viewQuick & wishlist
        $('.option-detail').css('display', 'none');

        // onpen quickView
        openQuickView();

        // handle quanlity updown number
        updownCountNumber($('.DetailProduct__left-Quality').children());
        // updownquantitySelector();
    });

    // event addTocart
    addToCart();

    function addToCart() {
        $('.DetailProduct__addtocard').on('click', function () {
            var infoCart = {};
            infoCart['id'] = typeof id === 'undefined' ? $(this).parents('.detailproduct').data('id') : id;

            let productCurrent = getCurrentProduct(infoCart['id']);
            infoCart['name'] = productCurrent['name'];
            infoCart['brand'] = productCurrent['brand'];
            infoCart['option-size'] = $('#DetailProduct__left-OptionSize').val();
            infoCart['quantitySelector'] = parseInt($('.DetailProduct__left-Quality .quantity').val());
            infoCart['price'] = parseInt(productCurrent['price-sale']);
            infoCart['total'] = parseInt(productCurrent['price-sale']) * parseInt($('.DetailProduct__left-Quality .quantity').val());
            infoCart['image'] = productCurrent['image'];

            // console.log(infoCart);
            

            if (listItemCart.length === 0) {
                listItemCart.push(infoCart);
                updatecountItemCart();
                loadItemCart();
                
                displaytoastt({
                    title: "Thành công",
                    message: "Bạn đã thêm thành công 1 sản phẩm.",
                    type: "success",
                    duration: 3000,
                });
                closeQuickView();
            } else {
                var flag;
                $.each(listItemCart, function (index, ele) {
                    if (ele['id'] == infoCart['id'] && ele['option-size'] == infoCart['option-size']) {
                        ele['quantitySelector'] += infoCart['quantitySelector'];
                        // ele['option-size'] = infoCart['option-size'];
                        loadItemCart();
                        displaytoastt({
                            title: "Thành công",
                            message: "Bạn đã thêm thành công 1 sản phẩm.",
                            type: "success",
                            duration: 3000,
                        });
                        closeQuickView();
                        return false;
                    }
                });

                $.each(listItemCart, function (index, ele) {
                    if (ele['id'] !== infoCart['id'] ||
                        (ele['id'] == infoCart['id'] && ele['option-size'] !== infoCart['option-size'])) {
                        flag = true;
                        closeQuickView();
                    }
                    else {
                        flag = false;
                        closeQuickView();
                        return false;
                    }
                });

                if (flag == true) {
                    listItemCart.push(infoCart);

                    displaytoastt({
                        title: "Thành công",
                        message: "Bạn đã thêm thành công 1 sản phẩm.",
                        type: "success",
                        duration: 3000,
                    });
                    updatecountItemCart();
                    totalPrice();
                    loadItemCart();
                }
            }
            setLocalStore('listItemCart', listItemCart);
            
            // even delete cart item
            deleteCart();
        })
    }

    
    
    

    // handle updownCountNumber 
    function updownCountNumber(ele) {
        $.each(ele, function (index, element) {
            
            let inputNumber = $(element).children('.quantity');
            let buttonPlus = $(element).children('.quality-plus');
            let buttonMinus = $(element).children('.quality-minus');
            // console.log(inputNumber)

            inputNumber.on('keyup', function (e) {
                let number = e.target.value;
    
                if (!$.isNumeric(number)) {
                    inputNumber.val(1);
                }
            });
    
            buttonPlus.on('click', function (e) {
                inputNumber.val(parseInt(inputNumber.val()) + 1);
    
            });
    
            buttonMinus.on('click', function (e) {
                if (inputNumber.val() == 1) {
                    inputNumber.val(1);
                } else {
                    inputNumber.val(parseInt(inputNumber.val()) - 1);
                }
            });
        });
    }

    // handle update price on change quanlity
    // function updatePrice(inputNumber) {
    //     productCurrent['quantitySelector'] = parseInt(inputNumber);
    //     $('.DetailProduct__left-Price .productInfo--price').html(
    //         (productCurrent['price_sale'] * productCurrent['quantitySelector']).toLocaleString('it-IT', {
    //             style: 'currency',
    //             currency: 'VND'
    //         }));
    // }


    updownCountNumber($('.DetailProduct__left-Quality').children());
    
    // event updown quantitySelector
    function updownquantitySelector() {
        $.each($('.cart-item'), function (index, element) {
            let inputNumber = $(element).find('.DetailProduct__left-quanlityWapper').children('.quantity');
            let buttonPlus = $(element).find('.DetailProduct__left-quanlityWapper').children('.quality-plus');
            let buttonMinus =$(element).find('.DetailProduct__left-quanlityWapper').children('.quality-minus');
            let size = $(element).find('.cart_infor-ml');

            $(buttonPlus).on('click', function () {

                $.each(listItemCart, function (index, ele) {
                    if ($(element).data('id') == ele['id'] && $(size).text() == ele['option-size']) {
                        ele['quantitySelector'] = parseInt(inputNumber.val());
                        
                        console.log(inputNumber.val())
                        return;
                    }
                });
                setLocalStore('listItemCart', listItemCart);
                totalPrice();

                console.log(listItemCart)
            });

            $(buttonMinus).on('click', function () {

                $.each(listItemCart, function (index, ele) {
                    if ($(element).data('id') == ele['id']) {
                        ele['quantitySelector'] = parseInt(inputNumber.val());
                        
                        return;
                    }
                });
                setLocalStore('listItemCart', listItemCart);
                totalPrice();

                console.log(listItemCart)
            });
        });
    }

    // even delete cart item
    deleteCart();

    function deleteCart() {
        $.each($('.cart_deleteCart a'), function (index, ele) {
            $(ele).on('click', function () {
                var block = $(ele).parents('.cart-itemWapper');
                var id_block = $(block).find('.cart-item').data('id');

                $.each(listItemCart, function (index, ele) {

                    if (id_block == ele['id']) {
                        listItemCart.splice(index, 1);
                        return false;
                    }
                });

                block.remove();
                displaytoastt({
                    title: 'Xóa thành công',
                    message: 'Bạn đã xóa 1 sản phẩm trong giỏ hàng',
                    type: 'warning',
                    duration: 2000,
                });
                totalPrice();
                updatecountItemCart();
                setLocalStore('listItemCart', listItemCart);

                if (listItemCart.length == 0) {
                    $('.cart_footer').css('display', 'none');
                    $('.cart_empty').css('display', 'block');
                }
            });
        });
    };


    // update total price
    function totalPrice() {
        let total = listItemCart.reduce(function (a, c) {
            return a + (c['price'] * c['quantitySelector']);
        }, 0)

        $('.total-price').html(total.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        }));
    }

    // update countItemCart 
    function updatecountItemCart() {
        let countItemCart = listItemCart.length;
        $('.shopping-cart').text(countItemCart);
    }


    // load ItemCart
    function loadItemCart() {
        var html = [];

        $('.cart_empty').css('display', 'none');

        $.each(listItemCart, function (index, ele) {
            html[index] = `
                <div class='cart-itemWapper'>
                    <div class='cart-item' data-id='${ele['id']}'>
                        <div class='cart_imageWapper'>
                        <img src=' ${ele['image']}' alt='${ele['name']}'>
                        </div>
                        <div class='cart_infor'>
                            <h2 class='cart_infor-name'>${ele['name']}</h2>
                            <div class='cart_infor-option'>
                                <p class='cart_infor-ml'>${ele['option-size']}</p>
                                <div class='cart_infor-price'>
                                    <span class='productInfo--price'>${(ele['price']).toLocaleString('it-IT', {
                                    style: 'currency',
                                    currency: 'VND'
                                    })}</span>
                                </div>
                            </div>
                            <div class='cart_action'>
                                <div class='cart_quantitySelector'>
                                    <div class='DetailProduct__left-quanlityWapper'>
                                        <div class='quality-minus'><i class="fi-rr-minus-small"></i></div>
                                        <input type="text" autocomplete="false" class="quantity" name="quantity" min="1" value="${ele['quantitySelector']}">
                                        <div class='quality-plus'><i class="fi-rr-plus-small"></i></div>
                                    </div>
                                </div>
                                <div class='cart_deleteCart'>
                                    <a>Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
        });

        $('.cart_itemList').html(html.join(' '));
        updownCountNumber($('.cart_action').children('.cart_quantitySelector').children());
        updownquantitySelector();
        totalPrice();
    }

    $('.modall__overplay').on('click', function () {
        closeQuickView();
    })


    $("input[type='number']").keypress(function (evt) {
        evt.preventDefault();
    });


    

    loadcart();
    // Load item cart
    function loadcart() {
        const bodyCart = $('.group-cart');
        // console.log(listItemCart);
        if (listItemCart.length > 0) {
            var listItem = $.map(listItemCart, function(item) {
                return `
                <tr class='item-cart' data-id="${item['id']}">
                    <th class="inf-pro">
                        <div class="inf-pro__img">
                            <a href='/webnuochoa/product/prefume/${item['id']}'>
                                <img src="${item['image']}" alt="${item['name']}">
                            </a>
                        </div>
                        <div class="inf-pro__name">
                            <h4 class="inf-pro__brand">${item['brand']}</h4>
                            <p><a href='/webnuochoa/product/prefume/${item['id']}'>${item['name']}</a></p>
                        </div>
                    </th>
                    <th class='cart_infor-ml' >${item['option-size']}</th>
                    <th>
                        <div class='DetailProduct__left-quanlityWapper'>
                            <div class='quality-minus'><i class="fi-rr-minus-small"></i></div>
                            <input type="text" autocomplete="false" class="quantity" name="quantity" min="1" value="${item['quantitySelector']}">
                            <div class='quality-plus'><i class="fi-rr-plus-small"></i></div>
                        </div>
                    </th>
                    <th class='inf-pro__price'>${(item['price'] * item['quantitySelector']).toLocaleString('it-IT', {
                        style: 'currency',
                        currency: 'VND'
                        })}</th>
                    <th>
                        <div class="icon-remove">
                            <i class="fi-rr-trash"></i>
                        </div>
                    </th>
                </tr>
                `;
            })

            bodyCart.html(listItem.join(' '));

            // showCheckout()
            totalPrice();
            updownCountNumber($('.group-cart tr').find('.DetailProduct__left-quanlityWapper'))
            lupdownquantitySelector($('.group-cart tr'));
            
            removeItemCart($('.icon-remove'), '.item-cart');
            emptyCart();
        } else {
            emptyCart();
        }

        function emptyCart() {
            if(listItemCart.length === 0) {
                $('.group-cart').html(
                    `
                    <div class="box-empty">
                        <h3>Giỏ hàng của bạn trống</h3>
                    </div>`
                );
                // hideCheckout();
            }
        }

        function removeItemCart(icon, ele) {
            $.each(icon, function (i, e) {
                $(e).on('click', function () {
                    let id = $(this).parents(ele).data('id');
                    if(listItemCart.splice(listItemCart.findIndex(e => e.id === id), 1)) {
                        $(this).parents(ele).remove();
                        setLocalStore('listItemCart', listItemCart);
                        totalPrice();
                        loadItemCart();
                        updatecountItemCart();
                        emptyCart();
                        updatecountItemCart()
                        displaytoastt({
                            title: 'Xóa thành công',
                            message: 'Bạn đã xóa 1 sản phẩm trong giỏ hàng.',
                            type: 'warning',
                            duration: 3000
                        })
                    }
                })
            })
        } 
        function lupdownquantitySelector(ele) {
            $.each($(ele), function (index, element) {
                let inputNumber = $(element).find('.DetailProduct__left-quanlityWapper').children('.quantity');
                let buttonPlus = $(element).find('.DetailProduct__left-quanlityWapper').children('.quality-plus');
                let buttonMinus =$(element).find('.DetailProduct__left-quanlityWapper').children('.quality-minus');
                let size = $(element).find('.cart_infor-ml');

                $.each(buttonPlus, function (index, e) {
                    $(e).on('click', function () {
                        let id = $(this).parents('.item-cart').data('id');
                        let price = $(this).parents('.item-cart').find('.inf-pro__price');

                        // console.log(price)
                        $.each(listItemCart, function (index, el) {
                            if (id == el['id'] && $(size).text() == el['option-size']) {
                                el['quantitySelector'] = parseInt(inputNumber.val());
                                // console.log(inputNumber.val());
                                price.html(`${(el['price'] * el['quantitySelector']).toLocaleString('it-IT', {
                                    style: 'currency',
                                    currency: 'VND'
                                    })}`);
                                return false;
                            }
                        });
                        setLocalStore('listItemCart', listItemCart);
                        totalPrice();
                        loadItemCart();
                    })
                })
    
                $.each(buttonMinus , function (index, e) {
                    $(e).on('click', function () {
                        let id = $(this).parents('.item-cart').data('id');
                        let price = $(this).parents('.item-cart').find('.inf-pro__price');

                        // console.log(price)
                        $.each(listItemCart, function (index, el) {
                            if (id == el['id'] && $(size).text() == el['option-size']) {
                                el['quantitySelector'] = parseInt(inputNumber.val());
                                // console.log(inputNumber.val());
                                price.html(`${(el['price'] * el['quantitySelector']).toLocaleString('it-IT', {
                                    style: 'currency',
                                    currency: 'VND'
                                    })}`);
                                return false;
                            }
                        });
                        setLocalStore('listItemCart', listItemCart);
                        totalPrice();
                        loadItemCart();
                    })
                });
            });
        }
    }
    payCart();
    function payCart() {
        $('.btn-checkout').on('click', function () {
            if (listItemCart.length > 0) {
                $.post('/webnuochoa/ajax/createOrder', { order: listItemCart }, function (data) {
                    if (data == true) {
                        console.log('Mua Thành công.');
                        localStorage.removeItem('listItemCart');
                        listItemCart.length = 0;
                        loadcart();
                        loadItemCart();
                        displaytoastt({
                            title: 'Thanh toán thành công',
                            message: 'Bạn đã thành toán thành công.',
                            type: 'success',
                            duration: 3000
                        })
                        console.log(listItemCart);
                    } else {
                        displaytoastt({
                            title: 'Mua không thành công!!!',
                            message: 'Đã có lỗi khi thanh toán.',
                            type: 'error',
                            duration: 3000
                        })
                    }
                })
            }
        })
    }

    // ----------------------trashbin-product----------------------------------
    $.each($('.delete-pro'), function (index, element) {
        $(element).on('click', function () {
            let idpro = $(element).parent().data('id');
            console.log($(element).parent());

            $.post('/webnuochoa/ajax/deleteproduct', { id: idpro }, function (data) {
                if (data == 'true') {
                    $(element).parent().remove();
                } else 
                alert('Đã gặp lỗi khi xóa sản phẩm');
            })
        })
    })
    $.each($('.delete-brand'), function (index, element) {
        $(element).on('click', function () {
            let idpro = $(element).parent().data('id');
            console.log($(element).parent());

            $.post('/webnuochoa/ajax/deletebrand', { id: idpro }, function (data) {
                if (data == 'true') {
                    $(element).parent().remove();
                }
            })
        })
    })

    $('#check-pro').click(function () {
        if ($(this).is(":checked")) {
            $('.check').prop('checked', true);
        } else {
            $('.check').prop('checked', false);
        }
    })

})

const loadingIcon = $('.loadingio-spinner-eclipse-rqxd1nl3lih');
const overplay = $('.PageOverlay');

function displayOverplay() {
    overplay.addClass('is-visible');
}
function hiddeOverplay() {
    overplay.removeClass('is-visible');
}

function displayLoadingPage() {
    loadingIcon.addClass('is-visible');
}
function hiddeLoadingPage() {
    loadingIcon.removeClass('is-visible');
}

// process toastt
function displaytoastt({
    title = '',
    message = '',
    type = 'success',
    duration = 3000
}) {
    const main = $('#toastt');
    if (main) {
        $(main).append($('<div>').addClass(`toastt toastt__${type}`));

        let removetoastt = setTimeout(function () {
            toastt.remove();
        }, duration + 1000);

        const toastt = $(`.toastt.toastt__${type}`)

        const delay = (duration / 1000).toFixed(2);
        toastt.css('animation', `animation_slideToLeft ease-out .4s, animation_fadeout linear 1s ${delay}s forwards`);

        const icons = {
            success: "fi-rr-check",
            error: "fi-rr-exclamation",
            warning: "fi-rr-shield-exclamation",
        };

        const icon = icons[`${type}`];

        toastt.html(`
            <div class="toastt__icon toastt__icon--${type}">
                <i class="${icon}"></i>
            </div>

            <div class="toastt__info">
                <div class="toastt__title">${title}</div>
                <div class="toastt__msg">${message}</div>
            </div>

            <div class="toastt__close">
                <i class="fi-rr-cross"></i>
            </div>
        `);

        $.each($('.toastt__close'), function(index, element) {
            $(this).on('click', function () {
                $(element).parent('.toastt').remove();
                clearTimeout(removetoastt);
            });
        })
    }
}

// pr0cess slider
function img_slider_process() {

    var index = 0;
    let total = $('.DetailProduct__right-ListImageProduct img').length;

    const l_Image = $('.DetailProduct__right-ListImageProduct img');
    const cnt_img = $('.DetailProduct__right .controll-bottomImage .controll-item img');
    const iconPrev = $('.DetailProduct__right .controll-icon-listImage .icon-prev');
    const iconNext = $('.DetailProduct__right .controll-icon-listImage .icon-next');

    // flex img flow row
    $.each($(l_Image), function (index, element) {
        var right = index * 100;
        $(element).css('left', right + '%');
    });


    $.each($(cnt_img), function (index, element) {
        $(element).on('click', function () {
            $(this).removeClass('active');
            $(this).addClass('active');
            slider(index);
        })
    });

    // handle button next
    $(iconNext).on('click', function () {
        index++;

        if (index >= total) {
            index = 0;
        }
        slider(index);
        swipeBottomByIcon(index);
    })

    // handle button prev
    $(iconPrev).on('click', function () {
        index--;
        if (index <= -1) index = total - 1;
        slider(index);
        swipeBottomByIcon(index);
    })

    // auto active controll Button Image
    function swipeBottomByIcon(index) {
        $(cnt_img).removeClass('active');
        var currentImg = $(cnt_img)[index];
        $(currentImg).addClass('active');
    }

    function imgSlider() {
        index++;

        if (index >= total || index <= -1) {
            index = 0;
        }

        slider(index);
    }

    // display img
    function slider(index) {
        $('.DetailProduct__right-ListImageProduct').css('left', "-" + index * 100 + "%");
        swipeBottomByIcon(index);
    }

    intervalSlider = setInterval(imgSlider, 3000);
}


const dropArea = document.querySelector(".wrapper-home");
const img = document.querySelector(".img-wrapper-display-home");
const cancel = document.querySelector(".icon-close-home");
dragText = dropArea.querySelector(".drag-img");
input = dropArea.querySelector("#input-file-home");
input2 = dropArea.querySelector("#input-file-home");
let file; // biến toàn cục sử dụng trong nhiều hàm

// click icon-close image src=""  dispay:none;
cancel.addEventListener("click", function () {
    img.src = "";
    dropArea.classList.remove("active1");
});

input.addEventListener("change", function () {
    /* nhận file của ng dùng chọn và [0] có nghĩa là nếu người dùng chọn nhiều files 
    sau đó ta sẽ chọn duy nhất file đầu tiên */
    file = this.files[0];
    showfile(); // gọi hàm showfile 
});

//if user Drag file over dragArea
dropArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dropArea.classList.add("active1");
    dragText.textContent = "Release to Upload File";
});

//if user live Drag file form dragArea
dropArea.addEventListener("dragleave", () => {
    //console.log("file is outside from DragArea");
    dropArea.classList.remove("active1");
    dragText.textContent = "Drag or Drop to Upload File"
});

//if user drop file on dropArea
dropArea.addEventListener("drop", (event) => {
    event.preventDefault();
    /* nhận file của ng dùng chọn và [0] có nghĩa là nếu người dùng chọn nhiều files 
    sau đó ta sẽ chọn duy nhất file đầu tiên */
    file = event.dataTransfer.files[0];
    showfile(); // gọi hàm showfile
});
function showfile() {
    let fileType = file.type;
    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if (validExtensions.includes(fileType)) {//nếu ng dùng chọn file là file hình
        let fileReader = new FileReader();//tạo mới FileReader object
        fileReader.onload = () => {
            let fileURL = fileReader.result; // return Url
            img.src = fileURL;
            // load len cho image active1
            dropArea.classList.add("active1");
        }
        // click icon-close image src=""  dispay:none;
        cancel.addEventListener("click", function () {
            img.src = "";
            dropArea.classList.remove("active1");
        });
        fileReader.readAsDataURL(file);
    } else {
        alert("Đây không phải là file ảnh !");
        dropArea.classList.remove("active1");
        dragText.textContent = "Drag or Drop to Upload File"
    }
}

// -----------------------------------------price-sale-------------------------------
const price1 = document.getElementById('price')
const percent = document.getElementById('percent-price')
const pricesale = document.getElementById('sale-price')
price1.onkeyup = function () {
    const a = price1.value;
    pricesale.value = price1.value * 100 / 100;
}

percent.onkeyup = function () {
    const b = percent.value;
    pricesale.value = price1.value * (100 - percent.value) / 100;
}

//---------------------------date------------------------------
const update_at = document.querySelectorAll('.sold-pro');
const deletepro = document.querySelectorAll('.delete-pro');
deletepro.forEach(function (a) {
    a.onclick(function () {
        alert(111)
    });
    console.log(a);
})
update_at.forEach(function (a) {
    // a.onclick = function () {
    //     alert(1);
    // }
    console.log(a);
    console.log('as');
})






