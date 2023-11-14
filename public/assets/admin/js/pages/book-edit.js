Validator({
    form: '#form-edit-product',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    tabs: '#form-edit-tab',

    rules: [
        Validator.isRequired('.input-group input[name="name"]', "* Vui lòng nhập tên sách !"),
        Validator.isRequired('.input-group input[name="quantity"]', "* Vui lòng nhập số lượng sách !"),
        Validator.isRequired('.input-group input[name="number_pages"]', '* Vui lòng nhập trang sách !'),
        Validator.isRequired('.input-group input[name="size"]', '* Vui lòng nhập kích thước sách !'),
        Validator.isRequired('.input-group select[name="category"]', '* Vui lòng chọn danh mục sách !'),
        Validator.isRequired('.input-group select[name="author"]', '* Vui lòng chọn tác giả !'),
        Validator.isRequired('.input-group select[name="publisher"]', '* Vui lòng chọn nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="date_publication"]', '* Vui lòng nhập ngày xuất bản !'),
        Validator.isRequired('.input-group input[name="price"]', '* Vui lòng nhập giá sách !'),
        Validator.isNumber('.input-group input[name="price"]', '* Vui lòng nhập số !'),
        Validator.isDiscount('.input-group input[name="sale_price"]', () => {
            return document.querySelector('.input-group input[name="price"]').value;
        })
    
    ]
});

Validator({
    form: '#form-add-category',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    modal: '#form-modal-category__input',
    rules: [
        Validator.isRequired('.input-group input[name="category_name"]', '* Vui lòng nhập tên danh mục !'),
    ]
});

Validator({
    form: '#form-add-author',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.input-group input[name="author_name"]', '* Vui lòng nhập tên tác giả !'),
        Validator.isRequired('.input-group input[name="author_bio"]', '* Vui lòng nhập tiểu sử !')
    ],

    onSubmit: function (value) {
        console.log(value);
    }
});

Validator({
    form: '#form-add-publisher',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.input-group input[name="publisher_name"]', '* Vui lòng nhập tên nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="publisher_address"]', '* Vui lòng nhập địa chỉ nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="publisher_contact"]', '* Vui lòng nhập thông tin nhà xuất bản !'),
    ]
});

let myToolbar = [
    [{
        'header': [1, 2, 3, 4, 5, 6, false]
    }],
    [{
        'font': []
    }],
    ['bold', 'italic', 'underline', 'strike'],
    [{
        'list': 'ordered'
    }, {
        'list': 'bullet'
    }],
    [{
        'color': []
    }, {
        'background': []
    }],
    [{
        'align': []
    }],
    ['clean']
];
var quillSortEditor = new Quill('#sort-editor', {
    theme: 'snow',
    modules: {
        toolbar: myToolbar
    },
});

var quillLongEditor = new Quill('#long-editor', {
    theme: 'snow',
    modules: {
        toolbar: myToolbar
    }
});