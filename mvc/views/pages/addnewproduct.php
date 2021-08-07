<div class="container">
    <form action="/Webnuochoa/admin/newproduct" method="POST" enctype="multipart/form-data" class="add-product" id="add-product">
        <div class="row">
            <div class="left col-6">
                <div class="title-add">Thêm Sản Phẩm</div><br>
                <div class="form-add">
                    <div class="add-name">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" id="name-product" name="name-product">
                        <small class="messageError"></small>
                    </div>
                </div>
                <div class="form-add">
                    <div class="add-description">
                        <label for="">Miêu tả sản phẩm</label>
                        <textarea id="description" name="description" rows="4" cols="51"></textarea>
                        <small class="messageError" style="margin-top: -1.3vh;"></small>
                    </div>
                </div>
                <div class="form-add">
                    <div class="add-price">
                        <label for="">Giá sản phẩm</label>
                        <input type="text" id="price" name="price" value="">
                        <small class="messageError"></small>
                    </div>
                </div>
                <div class="form-add">
                    <div class="add-percent">
                        <label for="">Phần trăm giảm giá sản phẩm</label>
                        <input type="text" id="percent-price" name="percent-price">
                        <small class="messageError"></small>
                    </div>
                </div>
                <div class="form-add">
                    <div class="add-saleprice">
                        <label for="">Giá giảm</label>
                        <input type='text' id='sale-price' name='sale-price' readonly>
                        <small class="messageError"></small>
                    </div>
                </div>
                <div class="form-add">
                    <div class="add-brand">
                        <label for="">Brand</label>
                        <select name="brand" class='option-brand'>
                            <?php
                            if (isset($data['brand'])) {
                                foreach ($data['brand'] as $pro) {
                                    echo " '<option value='" . $pro['id'] . "'>" . $pro['name'] . "</option>' ";
                                }
                            }
                            ?>
                        </select>
                        <small class="messageError"></small>
                    </div>
                </div>
            </div>
    
            <div class="right col-6">
                <div class='form-add'>
                    <div class='wrapper-home'>
                        <div class='img-wrapper-home'>
                            <img class='img-wrapper-display-home' src='' alt=''>
                        </div>
                        <div class='icon-close-home' id='icon-close-home'><i class="fi-rr-cross"></i></div>
                        <div class='icon-wrapper-home'><i class="fi-rr-cloud-upload"></i></div>
                        <header class='drag-img'>Drag or Drop to Upload Files</header>
                        <header>HERE</header>
                        <input type='file' id='input-file-home' name='input-file-home' hidden>
                    </div>
                    <small class="messageError"></small>
                    <label for='input-file-home' class='btn-add-file'>Browse File</label>
                </div>
                
            </div>
        </div>
        <button class="btn-add-product" name="btn-add-product">THÊM SẢN PHẨM</button>
    </form>
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
            validation.isRequired('#input-file-home'),
        ],
        onsubmit: function(data) {
            //call api
            console.log(data);
        }
    });
</script>