Dropzone.autoDiscover = false;
let existingFile = null;
let myDropzone = new Dropzone("#image-dropzone", {
    url: 'dropZone/addImage', // URL để gửi tệp đã chọn đến máy chủ
    paramName: 'image',
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: `<i class="fa-solid fa-circle-xmark"></i>`, // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: `<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload`, // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: true, // Tắt tự động tải lên
    maxFiles: 1, // Số lượng file có thể tải

    init: function () {
        this.on("sending", function (file, xhr, formData) {
            let query = new URLSearchParams(window.location.search);
            formData.append("id", query.get('id'));
        });

        this.on("addedfile", function (file) {
            // Check if there's already an existing file, and if so, remove it
            if (existingFile) {
               this.removeFile(existingFile);

               existingFile = null;  // Reset the existing file
            }

            fetchUpdatedData();

        });

        if (imagesOfProduct.imageMain) {
            let mockFile = {
                name: imagesOfProduct.imageMain.name,
                size: 123,
            };

            this.displayExistingFile(
                mockFile,
                `http://localhost:33/public/uploads/products/2023_11/${mockFile.name}`
            );

            existingFile = mockFile;  // Keep track of the existing file
        }

            this.on("removedfile", function () {
                let file = imagesOfProduct.imageMain;

                var xhttp = new XMLHttpRequest();

                xhttp.open("POST", "http://localhost:33/dropzone/removeImage", true);
                xhttp.setRequestHeader("Content-Type", "application/json");
                xhttp.onreadystatechange = function () {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        // Xử lý phản hồi từ server
                        console.log(xhttp);
                    }
                };
                xhttp.send(JSON.stringify(file));
            });
    }
});





let albumImagesDropzone = new Dropzone('#album-images-dropzone', {
    url: "dropZone/addImages", // URL để gửi tệp đã chọn đến máy chủ
    paramName: 'album_images', // Tên của trường tệp trong yêu cầu POST
    uploadMultiple: true, // Tải 1 lần nhiều file
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: '<i class="fa-solid fa-circle-xmark"></i>', // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: '<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload', // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: true, // Tắt tự động tải lên
    parallelUploads: 5, // Giảm số lượng tệp tin được tải lên cùng một lúc

    init: function () {
        const that = this;
    
        this.on('sending', function (file, xhr, formData) {
            let query = new URLSearchParams(window.location.search);
            formData.append("id", query.get('id'));
        });
    
        if (imagesOfProduct.albumImages) {
            imagesOfProduct.albumImages.forEach((image) => {
                let mockFile = {
                    name: image.name,
                    size: 123
                }
    
                that.displayExistingFile(mockFile, `http://localhost:33/public/uploads/products/2023_11/${mockFile.name}`);
            });
    
            // Sự kiện 'removedfile' chung
            that.on('removedfile', function (file) {
                const imageDeleted = imagesOfProduct.albumImages.find(image => image.name === file.name);
                if (imageDeleted) {
                    const xhttp = new XMLHttpRequest();
                    xhttp.open('POST', `${window.location.origin}/dropzone/removeImage`, true);
                    xhttp.setRequestHeader("Content-Type", "application/json");
                    xhttp.onreadystatechange = function () {
                        if (xhttp.readyState == 4 && xhttp.status == 200) {
                            console.log(xhttp);
                            fetchUpdatedData();
                        }
                    };
                    xhttp.send(JSON.stringify(imageDeleted));
                }
            });
        }
    }

});

function fetchUpdatedData() {
    fetch('http://localhost:33/product/getImageAPI?id=3')
        .then(response => response.json())
        .then(data => {
            // Update imagesOfProduct.imageMain with the new data
            imagesOfProduct.imageMain = data
            console.log(imagesOfProduct.imageMain)

            // You can now use imagesOfProduct.imageMain with the updated data
        })
        .catch(error => console.error('Error fetching updated data:', error));
}


Validator({
    form: '#form-edit-product',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
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
    ],
    onSubmit: function (data) {

        // Call API
        const sortDescriptionInput = document.getElementById('sort_description');
        const longDescriptionInput = document.getElementById('long_description');

        let sortDescription = quillSortEditor.root.innerHTML;
        let longDescription = quillLongEditor.root.innerHTML;

        sortDescriptionInput.value = sortDescription;
        longDescriptionInput.value = longDescription;

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