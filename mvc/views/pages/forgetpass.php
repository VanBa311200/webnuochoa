<!-- Forgetpass -->

<div class="forget-body">
    <form class="forget-form" id="forget-form">
        <div class="forget-title">
            <p class="quenpass">Phục hồi mật khẩu</p>
            <p>Vui lòng điền Email của bạn:</p>
        </div>
        <div class="form-group ">
            <div class="forget-email">
                <input type="text" placeholder="Email" id="email" name="email">
                <small class="messageError"></small>
            </div>
        </div>
        <div class="forget-button">
            <button type="button">Gửi</button>
        </div>
        <div class="text">
            <p>Bạn có còn nhớ mật khẩu không? </p>
        </div>
        <div class="login-return">
            <a href="/Webnuochoa/account/login">Quay trở lại trang Đăng Nhập</a>
        </div>
    </form>
</div>
<script src="/Webnuochoa/public/js/JQuery-3.6.0.js"></script>
<script src="/Webnuochoa/public/js/main.js"></script>
<script src="/Webnuochoa/public/js/validate.js"></script>

<!--validation -->
<script>
    validation({
        form: '#forget-form',
        formGroupSelector: '.form-group',
        errorselector: '.messageError',
        rules: [
            validation.isRequired('#email'),
            validation.isEmail('#email'),
        ],
        onsubmit: function(data) {
            
            console.log(data);
        }
    });

    $('.forget-button button').on('click', function(e) {
        let eml = $('#email').val();
        $.post(`/webnuochoa/ajax/checkRegister_Email`,
        {
            email: eml,
        },
        function(data) {
            if (data === '1')
            {
                displayOverplay();
                displayLoadingPage();
                
                $.post(`/webnuochoa/ajax/sendEmail/${eml}`, {} ,function(data) {
                    $('#email').val('');
                    hiddeOverplay();
                    hiddeLoadingPage();
                    displaytoastt({
                        title: 'Gửi Email thành công',
                        message: 'Hãy kiểm tra email của bạn để xác thực.',
                        type: 'success',
                        duration: 5000
                    });

                    console.log(data);
                })
            } else $('.forget-email input ~ .messageError').html('Email này không tồn tại !!!');
        });
    })
</script>
<!-- end Login -->