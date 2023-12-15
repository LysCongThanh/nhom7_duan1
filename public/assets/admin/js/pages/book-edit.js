document.addEventListener('DOMContentLoaded', function () {
    const idEles = document.querySelectorAll('.append-form');
    idEles.forEach((ele) => {
        ele.setAttribute('value', query.get('id'));
    });
    const storedJsonData = localStorage.getItem('jsonData');

    if (storedJsonData) {
        const jsonData = JSON.parse(storedJsonData);
        console.log(jsonData);
        const formEditProduct = document.querySelector('#form-edit-product').elements;

        Array.from(formEditProduct).forEach((inputEle) => {
            const fieldName = inputEle.name;
            if (jsonData.hasOwnProperty(fieldName)) {
                inputEle.value = jsonData[fieldName];
            }
        });

        quillSortEditor.clipboard.dangerouslyPasteHTML(jsonData['sort-editor']);
        quillLongEditor.clipboard.dangerouslyPasteHTML(jsonData['long-editor']);

    }

    localStorage.removeItem('jsonData');
});

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
            formData.append("id", query.get('id'));
            formData.append("imageMain", 1);
        });

        this.on("addedfile", function (file) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }

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
                imagesOfProduct.imageMain.slug
            );

            existingFile = mockFile;  // Keep track of the existing file
        }

        this.on("removedfile", function () {
            let file = imagesOfProduct.imageMain;

            var xhttp = new XMLHttpRequest();

            xhttp.open("POST", `${webRoot}/dropzone/removeImage`, true);
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
    url: 'dropZone/addImages',
    paramName: 'album_images', // Tên của trường tệp trong yêu cầu POST
    maxFilesize: 5, // Giới hạn dung lượng tệp (MB)
    uploadMultiple: true,
    addRemoveLinks: true, // Hiển thị nút xóa cho từng tệp
    dictRemoveFile: '<i class="fa-solid fa-circle-xmark"></i>', // Chữ hoặc biểu tượng để xóa tệp
    dictDefaultMessage: '<i class="fas fa-cloud-upload-alt"></i> Drop files here or click to upload', // Tin nhắn mặc định
    acceptedFiles: "image/*", // Loại tệp cho phép (trong trường hợp này, chỉ hình ảnh)
    autoProcessQueue: false, // Tắt tự động tải lên
    parallelUploads: 5, // Giảm số lượng tệp tin được tải lên cùng một lúc

    init: function () {
        const that = this;
        let actions = [];

        if (imagesOfProduct.albumImages) {
            imagesOfProduct.albumImages.forEach((image) => {
                let mockFile = {
                    name: image.name,
                    size: 123,
                    id: image.id,
                };

                that.displayExistingFile(mockFile, `${webRoot}/${image.slug}`);
            });
        }

        this.on("sending", function (file, xhr, formData) {
            formData.append("id", query.get('id'));
            formData.append("imageMain", 0);
        });

        this.on('addedfile', function (file) {
            actions.push({ action: 'add', file: file });
        });

        this.on('removedfile', function (file) {
            if (file.id) {
                console.log(1);
                actions.push({ action: 'remove', id: file.id });
            } else {
                actions = actions.filter(action => action.file !== file);
            }

            console.log(actions);
        });

        document.getElementById('cancelBtn').addEventListener('click', function () {
            that.removeAllFiles(true);
            if (imagesOfProduct.albumImages) {
                imagesOfProduct.albumImages.forEach((image) => {
                    let mockFile = {
                        name: image.name,
                        size: 123,
                        id: image.id,
                    };

                    that.displayExistingFile(mockFile, `${webRoot}/${image.slug}`);
                });
            }
            actions = [];
        });

        document.getElementById('updateBtn').addEventListener('click', function () {
            actions.forEach(action => {
                switch (action.action) {
                    case 'remove':
                        let id = action.id;
                        const xhttp = new XMLHttpRequest();
                        xhttp.open("POST", "http://localhost:33/dropzone/removeImage", true);
                        xhttp.setRequestHeader("Content-Type", "application/json");
                        xhttp.onreadystatechange = function () {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                console.log(xhttp);
                            }
                        };
                        xhttp.send(JSON.stringify({ id }));
                        break;
                }
            });

            const formEditProduct = document.querySelector('#form-edit-product');
            const sortDescriptionInput = document.getElementById('sort_description');
            const longDescriptionInput = document.getElementById('long_description');

            shortDescription = quillSortEditor.root.innerHTML;
            longDescription = quillLongEditor.root.innerHTML;

            sortDescriptionInput.value = shortDescription;
            longDescriptionInput.value = longDescription;
            const formData = new FormData(formEditProduct);
            const jsonData = {};
            formData.append('id', query.get('id'));
            formData.append('request', `${webRoot}/sua-san-pham/id?${query.get('id')}`);

            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            const albumImagesDropzonePromise = new Promise((resolve) => {
                albumImagesDropzone.on('queuecomplete', () => {
                    resolve();
                });
                albumImagesDropzone.processQueue();
            });

            Promise.all([albumImagesDropzonePromise])
                .then(() => {
                    localStorage.setItem('jsonData', JSON.stringify(jsonData));
                    location.reload();
                })
                .catch(error => {
                    console.error('Lỗi khi gửi form hoặc Dropzones:', error);
                });

            
        });
    }


});

function fetchUpdatedData() {
    fetch(`${webRoot}/product/getImageAPI?id=${query.get('id')}`)
        .then(response => response.json())
        .then(data => {
            imagesOfProduct.imageMain = data.image_main;
            imagesOfProduct.albumImages = data.images;
            console.log(imagesOfProduct.albumImages);
            this.imageDeleted = data.images;
        })
        .catch(error => console.error('Error fetching updated data:', error));
}

Validator({
    form: '#form-edit-product',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    rules: [
        Validator.isRequired('.input-group input[name="name"]', 'Không được bỏ trống'),
        Validator.isRequired('.input-group input[name="quantity"]',
            '* Vui lòng nhập số lượng sách'),
        Validator.isRequired('.input-group input[name="number_pages"]',
            '* Vui lòng nhập số trang sách'),
        Validator.isRequired('.input-group input[name="size"]',
            '* Vui lòng nhập kích thước sách'),
        Validator.isNumber('.input-group input[name="price"]',
            '* Vui lòng nhập giá sách'),
        Validator.isDiscount(
            '.input-group input[name="sale_price"]',
            function () {
                return document.querySelector('.input-group input[name="price"]').value;
            },
            '* Giảm giá nhỏ hơn giá gốc !'
        ),
    ],
    onSubmit: function (data) {
        

        const formEditProduct = document.querySelector(this.form);
        formEditProduct.querySelector('input[name="id"]').value = query.get('id');
        const sortDescriptionInput = document.getElementById('sort_description');
        const longDescriptionInput = document.getElementById('long_description');

        shortDescription = quillSortEditor.root.innerHTML;
        longDescription = quillLongEditor.root.innerHTML;

        sortDescriptionInput.value = shortDescription;
        longDescriptionInput.value = longDescription;
        formEditProduct.submit();
    }
});

setupFormValidator({
    form: '#form-add-category',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',
    modal: '#form-modal-category__input',
    rules: [
        Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên danh mục !'),
        Validator.isRequired('.input-group select[name="status"]', '* Vui lòng chọn trạng thái !'),
    ],
});

setupFormValidator({
    form: '#form-add-author',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên tác giả !'),
        Validator.isRequired('.input-group input[name="bio"]', '* Vui lòng nhập tiểu sử !')
    ]
});

setupFormValidator({
    form: '#form-add-publisher',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.input-group input[name="name"]', '* Vui lòng nhập tên nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="address"]', '* Vui lòng nhập địa chỉ nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="contact"]', '* Vui lòng nhập thông tin nhà xuất bản !'),
        Validator.isRequired('.input-group input[name="publication_date"]', '* Vui lòng nhập ngày xuất bản !'),
    ]
})

function setupFormValidator(options) {
    Validator({
        form: options.form,
        formGroupSelector: options.formGroupSelector,
        errorSelector: options.errorSelector,
        modal: options.modal || null,
        rules: options.rules,
        onSubmit: function () {
            const sortDescriptionInput = document.getElementById('sort_description');
            const longDescriptionInput = document.getElementById('long_description');

            let sortDescription = quillSortEditor.root.innerHTML;
            let longDescription = quillLongEditor.root.innerHTML;

            sortDescriptionInput.value = sortDescription;
            longDescriptionInput.value = longDescription;

            const formEdit = document.querySelector('#form-edit-product');
            const formData = new FormData(formEdit);
            const jsonData = {};

            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            console.log(jsonData);

            localStorage.setItem('jsonData', JSON.stringify(jsonData));
            document.querySelector(this.form).submit();
        }
    });
}

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

