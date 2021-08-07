<!-- Login -->
<div class="login-body">
    <form class="login-form" id="login-form" action="/webnuochoa/account/checkLog" method="post" enctype="multipart/form-data">
        <div class="login-title">
            <p class="dangnhap">ĐĂNG NHẬP</p>
            <p>Vui lòng điền Email và Mật Khẩu:</p>
        </div>
        <div class="form-group ">
            <div class="login-email">
                <input type="text" placeholder="Email" id="email" name="email">
                <small class="messageError"></small>
            </div>
        </div>
        <div class="form-group">
            <div class="login-password ">
                <input type="password" placeholder="Mật khẩu" id="password" name="password">
                <span class="icon-eye" onclick="eye()">
                    <i class=" flaticon-eye" id="hide1"></i>
                    <i class="flaticon-invisible" id="hide2"></i>
                </span>
                <small class="messageError"></small>
            </div>
        </div>
        <?php
            if(isset($data['result'])) {
                if ($data['result'] == false) {
                    echo '
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Sai mật khẩu hoặc tài khoản.</strong>
                    </div>
                    ';
                }
            }
        ?>
        <div class="login-button">
            <button type="submit">ĐĂNG NHẬP</button>
        </div>
        <div class="login-register">
            <p>Bạn chưa có Tài khoản?
                <a href="/Webnuochoa/account/register">Tạo Tài Khoản</a>
            </p>
        </div>
        <div class="login-forget">
            <a href="/Webnuochoa/account/forgetpass">Quên mật khẩu?</a>
        </div>
    </form>
</div>


<!-- end Login -->

<script src="/Webnuochoa/public/js/validate.js"></script>


<!--validation -->
<script>
    validation({
        form: '#login-form',
        formGroupSelector: '.form-group',
        errorselector: '.messageError',
        rules: [
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
</script>