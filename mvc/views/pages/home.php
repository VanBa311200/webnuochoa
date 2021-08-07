<div class="sectionHeader">
    <div class="container">
        <h2 class="sectionHeader__heading  text-center">
            SẢN PHẨM MỚI
        </h2>
    </div>

    <div class="container productWapper">
        <div class="row">
            <?php
                if (isset($data['products'])) {
                    $i = 0;
                    if(count($data['products']) > 0)
                    foreach($data['products'] as $dt) {
                        $i++;
                        $rating_number = $dt['rating-number'] > 0 ? number_format((float)$dt['rating-number'], 1, '.', '') : ' ';

                        echo "
                            <div class='col-6 col-lg-3 productItem' data-id='".$dt['id']."'
                                data-aos='fade-up'
                                data-aos-delay='".$i."00'
                                data-aos-duration='300'
                                data-aos-easing='ease-in-out'
                                data-aos-mirror='true'
                                data-aos-once='false'
                            >
                                <div class='tag-product'>
                                    <i class='flaticon-store-new-badges'></i>
                                </div>
                                <div class='product--image'>
                                    <a href='/webnuochoa/product/prefume/".$dt['id']."'><img src='".$dt['image']."' class='img-fluid'
                                            alt='Montblanc Explorer Ultra Blue EDP - New Arrival 2021'></a>
                                    <div class='option-detail'>
                                        <a class='ViewQuick'><i class='flaticon-eye'></i></a>
                                        <a class='WhisList'><i class='flaticon-like'></i></a>
                                    </div>
                                </div>
                                <div class='productInfo clearfix'>
                                    <p class='productInfo--brand'>".$dt['brand']."</p>
                                    <a href='/webnuochoa/product/prefume/".$dt['id']."' class='productInfo--name'>".$dt['name']."</a>
                                    <div class='productInfo---group'>
                                        <p class='productInfo--price-sale'>".number_format($dt['price'], 0, '', ',')." VNĐ</p>
                                        <p class='productInfo--price'>".number_format($dt['price-sale'], 0, '', ',')." VNĐ 
                                            <span class='sale-percent'>-".$dt['percent-sale']."%</span>
                                        </p>
                                        <div class='productInfo--rating'>
                                            <div class='start-outer'>
                                                <div class='start-inner'></div>
                                            </div>
                                            <span class='rating-number'>". $rating_number ."</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                }
            ?>
        </div> <!-- end row -->
    </div> <!-- end productWapper -->
</div> <!-- end sectionHeader -->

<div class="sectionPR">
    <div class="container">
        <div class="row sectionPR__content">
            <div class="col-12 col-md-6" 
                data-aos="fade-right"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__img">
                    <img src="/webnuochoa/public/image/product/Inspiration_1200x746__1000x.jpg" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6" 
                data-aos="fade-left"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__info">
                    <div class="sectionPR__heading">
                        <h3>MONTBLANC</h3>
                    </div>
                    <div class="sectionPR__description">
                        <p>
                            <strong>Explorer Ultra Blue - </strong>
                            <em>Cuộc phiêu lưu cùng dải xanh thẵm của thiên nhiên</em>
                        </p>
                        <p>
                            Kế thừa tinh thần lãng tử phong trần của người tiền nhiệm,
                            nhưng Explorer Ultra Blue – chàng tân binh của Montblanc vừa ra mắt 2021 chọn hướng về sắc
                            xanh của thiên nhiên.
                        </p>
                        <p>
                            Một màu xanh tượng trưng cho mặt hồ rộng bao la, cho trời xanh trong vắt không một gợn mây,
                            luôn trong trạng thái sẵn sàng cho những chuyến đi.
                        </p>

                        <div class="sectionPR__button">
                            <a href="/webnuochoa/product/prefume/1" class="button--outline-primary">KHÁM Phá thêm →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row sectionPR__content">
            <div class="col-12 col-md-6" 
                data-aos="fade-right"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__info">
                    <div class="sectionPR__heading">
                        <h3>Mercedes-Benz</h3>
                    </div>
                    <div class="sectionPR__description">
                        <p>
                            <strong>Mercedes-Benz Man Bright - </strong>
                            <em>Thần thái toả sáng của một ngôi sao</em>
                        </p>
                        <p>
                            Với diện mạo ánh bạc của hiệu ứng tráng gương mang hơi thở của dòng chảy công nghệ hiện đại
                            đầy hào nhoáng - MAN BRIGHT không ngại trở thành điểm sáng, chiếm lấy sự chú ý của đám đông.
                        </p>
                        <p>
                            Nổi tiếng như một điều nghiễm nhiên, sự thành công là người bạn đồng hành và những thành tựu
                            chói sáng chính là chất xúc tác đem lại năng lượng ngời sáng cho Man Bright!
                        </p>

                        <div class="sectionPR__button">
                            <a href="/webnuochoa/product/prefume/2" class="button--outline-primary">KHÁM Phá thêm →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" 
                data-aos="fade-left"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__img">
                    <img src="/webnuochoa/public/image/product/Inspiration_1200.jpg" alt="">
                </div>

            </div>
        </div>
        <div class="row sectionPR__content">
            <div class="col-12 col-md-6" 
                data-aos="fade-right"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__img">
                    <img src="/webnuochoa/public/image/product/imgpsh_fullsize_anim_4_900x.jpg" alt="">
                </div>
            </div>
            <div class="col-12 col-md-6" 
                data-aos="fade-left"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__info">
                    <div class="sectionPR__heading">
                        <h3>CAROLINA HERRERA</h3>
                    </div>
                    <div class="sectionPR__description">
                        <p>
                            <strong>VERY GOOD GIRL</strong>
                        </p>
                        <p>
                            Very Good Girl – cô nàng gái ngoan của nhà Carolina Herrera tái xuất đầy rực rỡ trong sắc áo
                            đỏ tươi quyến rũ và tràn đầy năng lượng. Vẫn là thiết kế đậm chất nữ quyền của chiếc giày
                            gót nhọn kiêu kỳ, Very Good Girl nhiều tươi vui và phấn khởi như những đóa hồng bung nở,
                            nhưng cũng ẩn chứa một nốt trầm nồng ấm của Rượu Vani - là đại diện cho sự đa chiều trong
                            tính cách của những cô gái, đầy khó hiểu và chắc chắn là khó quên.
                        </p>
                        <div class="sectionPR__button">
                            <a href="/webnuochoa/product/prefume/3" class="button--outline-primary">KHÁM Phá thêm →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row sectionPR__content">
            <div class="col-12 col-md-6" 
                data-aos="fade-right"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine"
            >
                <div class="sectionPR__info">
                    <div class="sectionPR__heading">
                        <h3>CAROLINA HERRERA</h3>
                    </div>
                    <div class="sectionPR__description">
                        <p>
                            <strong>BAD BOY LE PARFUM</strong>
                        </p>
                        <p>
                            Quay trở lại với sân chơi của những nốt hương, Gã trai “hư” Bad Boy với sự khiêu khích sẵn
                            sàng phá bỏ đi những nguyên tắc cũ kỹ để tạo nên luật chơi mới của riêng mình. Khoác lên
                            chiếc áo mới mang sắc đen matte huyền bí, cùng với tổ hợp hương cá tính của Bưởi, Hạt Gai
                            Dầu, Hoa Phong Lữ, Tiêu Đen hòa cùng Da Thuộc và Cỏ Hương Bài - Bad Boy Le Parfum hứa hẹn
                            đem đến một định nghĩa mới về nam tính, mạnh mẽ nhưng không thiếu đi sự uyển chuyển.
                        </p>
                        <div class="sectionPR__button">
                            <a href="/webnuochoa/product/prefume/4" class="button--outline-primary">KHÁM Phá thêm →</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" 
                data-aos="fade-left"
                data-aos-offset="400"
                data-aos-easing="ease-in-sine" 
            >
                <div class="sectionPR__img">
                    <img src="/webnuochoa/public/image/product/imgpsh_fullsize_anim_700x.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="subscribeEmail">
    <div class="container">
        <div class="row">
            <div class="col-12 subscribeEmail__wapper">
                <div class="subscribeEmail__title"><h2>Subscribe</h2></div>
                <div class="subscribeEmail__subtitle"><em>Nhận thông tin khuyến mãi mới nhất từ ShopPi</em></div>
                <div class="subscribeEmail__formSubscribe">
                    <form action="" class='subscribeEmail__groupform'>
                        <input type="email" name="email" placeholder="Vui lòng điền Email của bạn...">
                        <button type="button" class='button-primary'>ĐĂNG KÝ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>