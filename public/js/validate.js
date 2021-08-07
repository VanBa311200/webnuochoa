
/*------------------------------ Ẩn hiện pass word ------------------------*/

function eye() {
    var x = document.getElementById('password');
    var y = document.getElementById('hide1');
    var z = document.getElementById('hide2');
    if (x.type === "password") {
        x.type = 'text';
        y.style.display = 'block';
        z.style.display = 'none';
    } else {
        x.type = 'password';
        y.style.display = 'none';
        z.style.display = 'block';
    }
};

/*--------------------------------------------------------------------------*/
/*--------------------------------- validation ---------------------------- */


//Đối tượng (constructor)
function validation(options) {
    function getParent(element, selector) {
        while (element.parentElement) {
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement;
        }
    }

    var SelectorRules = {};
    //hàm thực hiện validate
    function validate(inputElement, rule) {
        var errElement = getParent(inputElement, options.formGroupSelector).querySelector(options.errorselector);
        var errMessage;

        //lấy ra các rules của selector
        var rules = SelectorRules[rule.selector];

        //lập qua từng rules và kiểm tra
        //nếu có lỗi dừng việc kiểm tra
        for (var i = 0; i < rules.length; i++) {
            errMessage = rules[i](inputElement.value);
            if (errMessage) break;
        }

        if (errMessage) {
            errElement.innerText = errMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
        } else {
            errElement.innerText = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
        }
        return !errMessage;
    }
    // lấy element của form cần validate
    var formElement = document.querySelector(options.form);
    if (formElement) {
        //khi submit form
        formElement.onsubmit = function (e) {
            // e.preventDefault();

            var isFormValid = true;

            //lặp qua từng rules và validate
            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = validate(inputElement, rule);
                if (!isValid) {
                    isFormValid = false;
                }
            });

            return isFormValid;

            // if (isFormValid) {
            //     //Trường hợp submit với javascript
            //     // if (typeof options.onsubmit === 'function') {
            //     //     var enableInputs = formElement.querySelectorAll('[name]');
            //     //     var formValues = Array.from(enableInputs).reduce(function (values, input) {
            //     //         values[input.name] = input.value;
            //     //         return values;
            //     //     }, {});
            //     //     options.onsubmit(formValues);
            //     // } else {

                        }

            //     //trường hợp với submit hành vi mặc định 
            //         formElement.submit();
            // }
            
    }

        //lặp qua mỗi rule và xử lý (lắng nghe sự kiện blur, input,...)
        options.rules.forEach(function (rule) {

            //Lưu lại các rule
            if (Array.isArray(SelectorRules[rule.selector])) {
                SelectorRules[rule.selector].push(rule.test);
            } else {
                SelectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);

            if (inputElement) {
                //xử lý trường hợp blur(bấm khỏi input) khỏi input
                inputElement.onblur = function () {
                    //value: inputElement
                    //test func :rule.test
                    validate(inputElement, rule);
                }
                //Xử lý mỗi khi người dùng nhập vào input
                inputElement.oninput = function () {
                    var errElement = getParent(inputElement, options.formGroupSelector).querySelector('.messageError');
                    errElement.innerText = '';
                    getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                }
            }
        });

    }



//Định nghĩa các rules
//Nguyên tắc rule: 
//1. Khi có lỗi => trả ra message lỗi
//2. khi không lỗi => không trả ra
validation.isRequired = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui lòng nhập trường này !!!'
        }
    };
}
validation.isEmail = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return regex.test(value) ? undefined : 'Trường này phải là email !!!';
        }
    };
}
validation.minLength = function (selector, min) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : `Vui lòng nhập tối thiểu ${min} kí tự !!!`; 
        }
    };
}

validation.maxLength = function (selector, max) {
    return {
        selector: selector,
        test: function (value) {
            return value.length <= max ? undefined : `Vui lòng nhập tối đa ${max} số !!!`;
        }
    };
}
validation.isConfirm = function (selector, getConfirmValue) {
    return {
        selector: selector,
        test: function (value) {
            return value === getConfirmValue() ? undefined : '*Giá trị nhập vào không chính xác';
        }
    };
}
