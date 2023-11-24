Dropzone.autoDiscover = false;
let myDropzone = new Dropzone("#image-dropzone", {
    url: 'dropZone/upLoadImage', // URL để gửi tệp đã chọn đến máy chủ
    paramName: 'image',
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: `<i class="fa-solid fa-circle-xmark"></i>`, // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: `<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload`, // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: false, // Tắt tự động tải lên
});

let albumImagesDropzone = new Dropzone('#album-images-dropzone', {
    url: "dropZone/upLoadImages", // URL để gửi tệp đã chọn đến máy chủ
    paramName: 'album_images', // Tên của trường tệp trong yêu cầu POST
    uploadMultiple: true, // Tải 1 lần nhiều file
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: '<i class="fa-solid fa-circle-xmark"></i>', // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: '<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload', // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: false, // Tắt tự động tải lên
    parallelUploads: 5, // Giảm số lượng tệp tin được tải lên cùng một lúc
});

albumImagesDropzone.emit('addedfile', { name: '1700811848_65605448d899b.png', size: 23 });
albumImagesDropzone.on('addedfile', function (file) {
    // Lấy đường dẫn hình ảnh từ server hoặc từ file.input.dataUrl (nếu có)
    var imageURL = `http://localhost:33/public/uploads/products/2023_11/1700811848_65605448d899b.png`;

    // Thiết lập đường dẫn hình ảnh cho thumbnail
    albumImagesDropzone.emit('thumbnail', {
        file: { name: '1700811848_65605448d899b.png', size: 12345 },
        dataUrl: `http://localhost:33/public/uploads/products/2023_11/1700811848_65605448d899b.png`
});

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
    
    ],
    onSubmit: function (data) {
        
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

// document.querySelector('#form').addEventListener('submit', (e) => {
//     e.preventDefault(); // Ngăn chặn hành vi submit mặc định

//     // Xử lý các thao tác trước khi submit
//     myDropzone.processQueue();
//     albumImagesDropzone.processQueue();
// });

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