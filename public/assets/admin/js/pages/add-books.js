Dropzone.autoDiscover = false;
let myDropzone = new Dropzone("#image-dropzone", {
    url: '#', // URL để gửi tệp đã chọn đến máy chủ
    paramName: "image", // Tên của trường tệp trong yêu cầu POST
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: `<i class="fa-solid fa-circle-xmark"></i>`, // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: `<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload`, // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: true, // Tắt tự động tải lên
});

let albumImagesDropzone = new Dropzone('#album-images-dropzone', {
    url: "/upload", // URL để gửi tệp đã chọn đến máy chủ
    paramName: "album_images", // Tên của trường tệp trong yêu cầu POST
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: `<i class="fa-solid fa-circle-xmark"></i>`, // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: `<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload`, // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: true, // Tắt tự động tải lên
});

Validator({
    form: '#form',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    tabs: '#myTab',
    rules: [
        Validator.isRequired('.input-group input[name="name"]', 'Không được bỏ trống'),
        Validator.isRequired('.input-group input[name="sku"]',
            '* Không được bỏ trống !'),
        Validator.isRequired('.input-group input[name="quantity"]',
            '* Vui lòng nhập số lượng sách'),
        Validator.isRequired('.input-group input[name="number_pages"]',
            '* Vui lòng nhập số trang sách'),
        Validator.isRequired('.input-group input[name="size"]',
            '* Vui lòng nhập kích thước sách'),
        Validator.isNumber('.input-group input[name="price"]'),
        Validator.isDiscount(
            '.input-group input[name="sale_price"]',
            function () {
                return document.querySelector('.input-group input[name="price"]').value;
            },
            '* Giảm giá nhỏ hơn giá gốc !'
        ),
        Validator.isRequired('.input-group select[name="category"]',
            '* Vui lòng chọn danh mục !'),
        Validator.isRequired('.input-group select[name="author"]',
            '* Vui lòng chọn tác giả !'),
        Validator.isRequired('.input-group select[name="publisher"]',
            '* Vui lòng chọn nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="date_publication"]',
            '* Vui lòng nhập ngày xuất bản !')
    ],
    onSubmit: function (data) {
        console.log(123);
        // Call API
        const sortDescriptionInput = document.getElementById('sort_description');
        const longDescriptionInput = document.getElementById('long_description');

        let sortDescription = quillSortEditor.root.innerHTML;
        let longDescription = quillLongEditor.root.innerHTML;

        sortDescriptionInput.value = sortDescription;
        longDescriptionInput.value = longDescription;

        document.querySelector(this.form).submit();
    }
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
