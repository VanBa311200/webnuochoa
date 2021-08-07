<div class="add-body">
    <?php
    if (isset($data['pro'])) {
        echo "
            <form action='/Webnuochoa/admin/editproduct1/" . $data['pro']['id'] . "' method='POST' enctype='multipart/form-data' class='add-product' id='add-product'>
                <div class='left'>
                <div class='title-add'>Sửa Sản Phẩm</div><br>
                <div class='form-add'>
                    <div class='add-name'>
                        <label for=''>Tên sản phẩm</label>
                        <input type='text' id='name-product' name='name-product' value='" . $data['pro']['name'] . "'>
                        <small class='messageError'></small>
                    </div>
                </div>
                <div class='form-add'>
                    <div class='add-description'>
                        <label for=''>Miêu tả sản phẩm</label>
                        <textarea id='description' name='description' rows='4' cols='51'>" . $data['pro']['description'] . "</textarea>
                        <small class='messageError' style='margin-top: -1.3vh;'></small>
                    </div>
                </div>
                <div class='form-add'>
                    <div class='add-price'>
                        <label for=''>Giá sản phẩm</label>
                        <input type='text' id='price' name='price' value='" . $data['pro']['price'] . "'>
                        <small class='messageError'></small>
                    </div>
                </div>
                <div class='form-add'>
                    <div class='add-percent'>
                        <label for=''>Phần trăm giảm giá sản phẩm</label>
                        <input type='text' id='percent-price' name='percent-price' value='" . $data['pro']['percent-sale'] . "'>
                        <small class='messageError'></small>
                    </div>
                </div>
                <div class='form-add'>
                    <div class='add-saleprice'>
                        <label for=''>Giá giảm</label>
                        <input type='text' id='sale-price' name='sale-price' value='" . $data['pro']['price-sale'] . "' readonly>
                        <small class='messageError'></small>
                    </div>
                </div>
            </div>
            <div class='right'>
                <div class='form-add'>
                    <div class='wrapper-home active1'>
                        <div class='img-wrapper-home'>
                            <img class='img-wrapper-display-home' <img src='" . $data['pro']['image'] . "' alt=''>
                        </div>
                        <div class='icon-close-home' id='icon-close-home'><i class='fi-rr-cross'></i></div>
                        <div class='icon-wrapper-home'><i class='fi-rr-cloud-upload'></i></div>
                        <header class='drag-img'>Drag or Drop to Upload Files</header>
                        <header>HERE</header>
                        ";
        if (isset($data['img'])) {
            foreach ($data['img'] as $img) {
                if ($img['id_product'] == $data['pro']['id'] && $img['image'] == $data['pro']['image']) {
                    echo "<input type='text' value='" . $img['id'] . "'  name = 'id-img' hidden>";
                }
            }
        }
        echo "
                        <input type='file' id='input-file-home' name='input-file-home' hidden>
                    </div>
                    <small class='messageError'></small>
                    <label for='input-file-home' class='btn-add-file'>Browse File</label>
                </div>
                <div class='form-add'>
                    <div class='add-brand'>
                        <label for=''>Brand</label>
                        <select name='brand' class='option-brand'>                          
                        '<option value='" . $data['pro']['id_brand'] . "'>" . $data['pro']['brand'] . "</option>' ;
                        
                        ";
        if (isset($data['brand'])) {
            foreach ($data['brand'] as $pro) {
                if ($pro['id'] != $data['pro']['id_brand']) {
                    echo " '<option value='" . $pro['id'] . "'>" . $pro['name'] . "</option>' ";
                }
            }
        }
        echo "
                        </select>
                        <small class='messageError'></small>
                    </div>
                </div>
            </div>
            <button class='btn-add-product' name='btn-add-product'>SỬA SẢN PHẨM</button>
            </form>
        ";
    }
    ?>
</div>
<script src="/Webnuochoa/public/js/validate.js"></script>
<!--validation -->
<script>
    validation({
        form: '#add-product',
        formGroupSelector: '.form-add',
        errorselector: '.messageError',
        rules: [
            validation.isRequired('#name-product'),

            validation.isRequired('#price'),
            //validation.isRequired('#input-file-home'),
        ],
        onsubmit: function(data) {
            //call api
            console.log(data);
        }
    });
</script>