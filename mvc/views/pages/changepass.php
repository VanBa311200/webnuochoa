<!-- Login -->
<div class="login-body">
    <form class="login-form" id="login-form">
        <div class="login-title">
            <p class="dangnhap">ĐỔI MẬT KHẨU</p>
            <p>Vui lòng điền Mật Khẩu:</p>
        </div>
        <div class="form-group ">
            <div class="login-password">
                <input type="password" placeholder="Mật khẩu" id="password" name="password">
                <span class="icon-eye" onclick="eye()">
                    <i class=" flaticon-eye" id="hide1"></i>
                    <i class="flaticon-invisible" id="hide2"></i>
                </span>
                <small class="messageError"></small>
            </div>
        </div>
        <div class="login-button">
            <button type="button" id='changepass'>Đổi mật khẩu</button>
        </div>
        <div class="login-register">
            <p>Bạn chưa có Tài khoản?
                <a href="/Webnuochoa/account/register">Tạo Tài Khoản</a>
            </p>
        </div>
        <div class="login-forget">
            <a href="/Webnuochoa/account/Login">Quay lại trang đăng nhập</a>
        </div>
    </form>
</div>


<!-- end Login -->

<script src="/Webnuochoa/public/js/JQuery-3.6.0.js"></script>
<script src="/Webnuochoa/public/js/validate.js"></script>


<!--validation -->
<script>
    validation({
        form: '#login-form',
        formGroupSelector: '.form-group',
        errorselector: '.messageError',
        rules: [
            validation.isRequired('#password'),
            validation.minLength('#password', 6),
        ],
        onsubmit: function(data) {
            //call api
            console.log(data);
        }
    });

    $('#changepass').on('click', function() {
        let password = $('#password').val();
        let email = '<?php echo $data['email']?>';

        $.post('/webnuochoa/ajax/changePassWord', { pass: password, email: email }, function(data) {
            console.log(data);
            if(data == 1) {
                displayOverplay();
                displayLoadingPage();
                displaytoastt({
                    title: 'Đổi mật khẩu thành công',
                    message: 'Bạn đã đổi mật khẩu thành công, hãy đăng nhập.',
                    type: 'success',
                    duration: 3000
                });
                $('#password').val('');
                hiddeOverplay();
                hiddeLoadingPage();
            } else {
                alert('Đã gặp lỗi khi đổi password. Hãy thử lại !!!')
            }
        });
    })
</script>