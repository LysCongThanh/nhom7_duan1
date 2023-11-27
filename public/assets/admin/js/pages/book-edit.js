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

    init: function() {
        // Show image
        let mockFile = {
            name: imagesOfProduct.imageMain.name,
            size: 123,
        }

        this.displayExistingFile(mockFile, `http://localhost:33/public/uploads/products/2023_11/${mockFile.name}`);

        // Remove
        this.on("removedfile", function (file) {
            console.log(file);
        });
    }

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

    init: function() {
        imagesOfProduct.albumImages.forEach((image) => {
            let mockFile = {
                name: image.name,
                size: 123
            }

            this.displayExistingFile(mockFile, `http://localhost:33/public/uploads/products/2023_11/${mockFile.name}`);
        })
    }

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

Validator({
    form: '#form-add-category',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    modal: '#form-modal-category__input',
    rules: [
        Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên danh mục !'),
    ]
});

Validator({
    form: '#form-add-author',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên tác giả !'),
        Validator.isRequired('.input-group input[name="bio"]', '* Vui lòng nhập tiểu sử !')
    ]
});

Validator({
    form: '#form-add-publisher',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="address"]', '* Vui lòng nhập địa chỉ nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="contact"]', '* Vui lòng nhập thông tin nhà xuất bản !'),
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

quillSortEditor.clipboard.dangerouslyPasteHTML(shortDescription);
quillLongEditor.clipboard.dangerouslyPasteHTML(longDescription);