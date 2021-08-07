<!-- Register -->

<div class="register-body">
    <form class="register-form" id="register-form" method="post" action='/webnuochoa/account/registerAccount' entype="multipart/form-data">
        <div class="register-title">
            <p class="dangky">Đăng ký</p>
            <p>Bạn vui lòng điền các thông tin sau:</p>
        </div>
        <div class="form-group ">
            <div class="register-name">
                <input type="text" placeholder="Tên" id="name" name="name">
                <small class="messageError"></small>
            </div>
        </div>
        <div class="form-group ">
            <div class="register-firstname">
                <input type="text" placeholder="Họ" id="firstname" name="firstname">
                <small class="messageError"></small>
            </div>
        </div>
        <div class="form-group ">
            <div class="register-email">
                <input type="text" placeholder="Email" id="email" name="email">
                <small class="messageError"></small>
            </div>
        </div>
        <div class="form-group">
            <div class="register-password ">
                <input type="password" placeholder="Mật khẩu" id="password" name="password">
                <span class="register-icon-eye" onclick="eye()">
                    <i class=" flaticon-eye" id="hide1"></i>
                    <i class="flaticon-invisible" id="hide2"></i>
                </span>
                <small class="messageError"></small>
            </div>
        </div>
        <div class="register-button">
            <button type="submit" name="register-button">TẠO TÀI KHOẢN</button>
        </div>
    </form>
</div>


<!-- end Register -->

<script src="/Webnuochoa/public/js/JQuery-3.6.0.js"></script>
<script src="/Webnuochoa/public/js/main.js"></script>
<script src="/Webnuochoa/public/js/validate.js"></script>

<!--validation -->
<script>
    validation({
        form: '#register-form',
        formGroupSelector: '.form-group',
        errorselector: '.messageError',
        rules: [

            validation.isRequired('#name'),

            validation.isRequired('#firstname'),

            validation.isRequired('#email'),
            validation.isEmail('#email'),

            validation.isRequired('#password'),
            validation.minLength('#password', 6),
        ],
        onsubmit: function(data) {
            //call api
            console.log(data);
        }
    });

    $('.register-email input').on('keyup blur', function(e) {

        $.post(`/webnuochoa/ajax/checkRegister_Email`,
        {
            email: $(this).val(),
        },
        function(data) {
            if (data === '1')
            {
                $('.register-email input ~ .messageError').html('Email này đã có người sử dụng.');
            }
        });
    })
</script>
</body>

</html>