<div class="container mt-5">
    <div class="row detailproduct" data-id="<?php echo $data['Product']['id'] ?>">
        <div class="col-md-6 col-12 DetailProduct__right">
            <div class="DetailProduct__right-ListImageProduct">
                <?php
                    foreach($data['Product']['images'] as $img) {
                        echo "<img class='item-listImg' src='".$img['image']."' alt='".$data['Product']['name']."'>";
                    }
                ?>
            </div>

            <div class="controll-icon-listImage">
                <div class="icon-prev"><i class="fi-rr-angle-left"></i></div>
                <div class="icon-next"><i class="fi-rr-angle-right"></i></div>
            </div>

            <div class="controll-bottomImage">
                <?php
                    foreach($data['Product']['images'] as $img) {
                        echo "<div class='controll-item'><img class='item-listImg'
                        src='".$img['image']."' alt='".$data['Product']['name']."'></div>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-6 col-12 DetailProduct__left py-4">
            <!-- <div class="icon-close-quickview"><i class="fi-rr-cross"></i></div> -->
            <div class="DetailProduct__left-brand">
                <h4><?php echo $data['Product']['brand'] ?></h4>
            </div>
            <div class="DetailProduct__left-Name">
                <h4><?php echo $data['Product']['name'] ?></h4>
            </div>

            <div class="DetailProduct__left-Price">
                <p>Giá:
                    <span class="productInfo--price" name="price">
                        <?php echo number_format((float)$data['Product']['price-sale'], 0, '', ',') ?> VND</span>
                    <span class="sale-percent">-<?php echo $data['Product']['percent-sale'] ?>%</span>
                </p>
            </div>

            <div class='productInfo--rating'>
                <div class='start-outer'>
                    <div class='start-inner'></div>
                </div>
                <span class='rating-number'><?php echo number_format($data['Product']['rating-number'], 1,'.', '') ?></span>
            </div>


            <div class="DetailProduct__left-Description">
                <h4><?php echo $data['Product']['description'] ?></h4>
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
                            <div class='quality-minus'><i class="fi-rr-minus-small"></i></div>
                            <input type="text" autocomplete="false" class="quantity" name="quantity" min="1" value="1">
                            <div class='quality-plus'><i class="fi-rr-plus-small"></i></div>
                        </div>
                    </div>

                    <button type="button" class="DetailProduct__addtocard button-primary">Thêm giỏ hàng</button>

                </div>
            </form>
        </div>
    </div>
</div>