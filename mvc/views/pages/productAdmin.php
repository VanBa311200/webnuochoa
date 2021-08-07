<div class="product-body-admin">
    <form method="POST" enctype="multipart/form-data" action="/Webnuochoa/admin/deleteproduct" class="list-product-admin">
        <div class="tilte-product">Sản phẩm</div>
        <div class="item-list-product-admin">
            <table>
                <tr class='title-list'>
                    <td class='check-pro'>
                        <input type='checkbox' id='check-pro'>
                    </td>
                    <td class='name-pro'>TÊN SẢN PHẨM</td>
                    <td class='price-pro'>GIÁ</td>
                    <td class='sold-pro'>NGÀY ĐĂNG</td>
                    <td class='delete-pro'></td>
                </tr>
                <?php
                if (isset($data['pro'])) {
                    foreach ($data['pro'] as $pro) {
                        echo "
                            <tr class='pro-list' data-id='" . $pro['id'] . "'>
                            <td class='check-pro'>
                            <input type='checkbox' class='check' value='" . $pro['id'] . "' name='id[]'>
                            </td>                         
                                <td class='name-pro'>
                                <a href='/Webnuochoa/admin/editproduct/" . $pro['id'] . "'>
                                " . $pro['name'] . "
                                </a>
                                </td>    
                            ";
                        if ($pro['price-sale'] != null) {
                            echo " <td class='price-pro'>" . $pro['price-sale'] . " VND</td>";
                        } else {
                            echo " <td class='price-pro'>" . $pro['price'] . " VND</td>";
                        }
                        echo "
                            <td class='sold-pro'>" . $pro['update_at'] . "</td>
                            <td class='delete-pro' id='delete-pro'><i class='fi-rr-trash'></i></td>
                            </tr>
                        
                            ";
                    }
                }
                ?>

            </table>
        </div>

        <a class="add-new-product-admin" href="/Webnuochoa/admin/addnewproduct">
            <div class="add-new">THÊM SẢN PHẨM MỚI</div>
        </a>
        <div class="delete-select-product">
            <button name='delete-select-pro' onclick="return confirm('bạn có chắc muốn xóa những sản phẩm này không ?')">XÓA SẢN PHẨM ĐƯỢC CHỌN</button>
        </div>
    </form>
    <div class="list-brand-admin">
        <div class="tilte-brand">Thương hiệu</div>
        <div class="item-list-brand-admin">
            <table>
                <?php
                if (isset($data['brand'])) {
                    foreach ($data['brand'] as $pro) {
                        echo "
                            <tr class='brand-list' data-id='" . $pro['id'] . "'>
                                <td class='name-brand'>" . $pro["name"] . "</td>
                                <td class='delete-brand' id='delete-brand'><i class='fi-rr-trash'></i></td>
                            </tr>
                            ";
                    }
                }
                ?>
            </table>
        </div>
        <form action="/Webnuochoa/admin/addbrand" method="POST" enctype="multipart/form-data">
            <div class="add-name-brand">
                <input type="text" id="brand" name="brand" placeholder="Thêm thương hiệu mới">
                <small class="messageError"></small>
            </div>
            <div class="add-new-brand">
                <button name="btn-add-new-brand">ADD NEW PRODUCT</button>
            </div>
        </form>

    </div>
</div>