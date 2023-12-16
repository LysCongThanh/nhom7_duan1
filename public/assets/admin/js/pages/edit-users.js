
if (document.querySelector('#form_edit_users')) {
    Validator({
        form: '#form_edit_users',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('.input-group input[name="firstName"]', '* Vui lòng nhập họ!'),
            Validator.isRequired('.input-group input[name="lastName"]',
                '* Vui lòng nhập tên!'),
            Validator.isRequired('.input-group input[name="email"]',
                '* Vui lòng nhập email!'),
            Validator.isEmail('.input-group input[name="email"]',
                '* Email không đúng định dạng!'),
            Validator.isRequired('.input-group select[name="choices-gender"]',
                '* Vui lòng chọn giới tính!'),
            Validator.isRequired('.input-group input[name="choices-birthdate"]',
                '* Vui lòng chọn ngày sinh!'),
            Validator.isRequired('.input-group input[name="phone"]',
                '* Số điện thoại không được trống!'),
            Validator.isPhone('.input-group input[name="phone"]',
                '* Số điện thoại không đúng định dạng!'),

        ],

    });
}

if (document.querySelector('#form_change_pass')) {
    Validator({
        form: '#form_change_pass',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('input[name="old_password"]', '* Vui lòng nhập!'),
            Validator.isRequired('input[name="new_password"]',
                '* Vui lòng nhập!'),
            Validator.isPassword('input[name="new_password"]', '6', '* Mật khẩu tối thiểu 6 ký tự và 1 ký tự đặt biệt!', true),
            Validator.isConfirmed('input[name="confirm_password"]', function () {
                return document.querySelector('input[name="new_password"]').value;
            }, '* Mật khẩu nhập lại không chính xác!'),
            Validator.isRequired('input[name="confirm_password"]',
                '* Vui lòng nhập!'),
        ],

    });
}