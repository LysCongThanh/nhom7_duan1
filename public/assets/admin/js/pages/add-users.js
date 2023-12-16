
if (document.querySelector('#form_add_users')) {
    Validator({
        form: '#form_add_users',
        formGroupSelector: '.form-group',
        errorSelector: '.form-message',
        rules: [
            Validator.isRequired('input[name="first_name"]', '* Vui lòng nhập họ!'),
            Validator.isRequired('input[name="last_name"]',
                '* Vui lòng nhập tên!'),
            Validator.isRequired('input[name="email"]',
                '* Vui lòng nhập email!'),
            Validator.isEmail('input[name="email"]',
                '* Email không đúng định dạng!'),
            Validator.isRequired('select[name="role"]',
                '* Vui lòng chọn vai trò!'),
            Validator.isRequired('input[name="password"]',
                '* Vui lòng nhập mật khẩu!'),
            Validator.isPassword('input[name="password"]', '6', '* Mật khẩu tối thiểu 6 ký tự và 1 ký tự đặt biệt!', true),
            Validator.isConfirmed('input[name="confirm_password"]', function () {
                return document.querySelector('input[name="password"]').value;
            }, '* Mật khẩu nhập lại không chính xác!'),

        ],
        
    });
}