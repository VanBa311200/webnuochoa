<div class="container">
    <form action="/Webnuochoa/admin/editprofile" method="POST" enctype="multipart/form-data" class="account-product row" id="account-product">
        <div class="col-12"><div class="title-account">Sửa thông tin</div><br></div>    
    <div class="left col-6">
            
            <?php
            if (isset($data['user'])) {
                echo "
                <div class='form-account'>
                <div class='account-name'>
                    <label for=''>Tên tài khoản</label>
                    <input type='text' id='name-account' name='name-account' value='" . $data['user']['fullname'] . "'>
                    <small class='messageError'></small>
                </div>
            </div>

            <div class='form-account'>
                <div class='account-password'>
                    <label for=''>Mật khẩu mới</label>
                    <input type='text' id='password' name='password' value=''>
                    <small class='messageError'></small>
                </div>
            </div>
            <div class='form-account'>
                <div class='account-phone'>
                    <label for=''>Số điện thoại</label>
                    <input type='text' id='phone' name='phone' value='" . $data['user']['phone'] . "'>
                    <small class='messageError'></small>
                </div>
            </div>
        </div>
        <div class='right col-6'>
            <div class='form-account'>
                <div class='account-email'>
                    <label for=''>Email</label>
                    <input type='text' id='email' name='email' value='" . $data['user']['email'] . "' readonly>
                    <small class='messageError'></small>
                </div>
            </div>
            <div class='form-account'>
                <div class='account-newpassword'>
                    <label for=''>Xác nhận mật khẩu </label>
                    <input type='text' id='newpassword' name='newpassword'>
                    <small class='messageError'></small>
                </div>
            </div>
            <button class='btn-account-edit' name='btn-account-edit'>SỬA THÔNG TIN</button>
        </div>
                ";
            }
            ?>



    </form>
</div>

<script src="/Webnuochoa/public/js/validate.js"></script>


<!--validation -->
<script>
    validation({
        form: '#account-product',
        formGroupSelector: '.form-account',
        errorselector: '.messageError',
        rules: [
            validation.isRequired('#name-account'),
            validation.isRequired('#phone'),
            validation.minLength('#phone', 11),
            validation.maxLength('#phone', 11),
            validation.minLength('#new-password', 6),
            validation.isConfirm('#new-password', function() {
                return document.querySelector('#account-product #password').value;
            }),
        ],
        onsubmit: function(data) {
            //call api
            console.log(data);
        }
    });
</script>