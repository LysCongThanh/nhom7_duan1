  function confirmDeleteAddress(element) {
    var id = element.target.id;
    var result = confirm("Bạn có chắc chắn muốn xóa địa chỉ này?");
    if (result) {
        var xhr = new XMLHttpRequest();
        var url = "profile/deleteAddress?id=" + id;
        xhr.open("POST", url, true);
  
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Xóa sản phẩm khỏi danh sách hiển thị trên giao diện
                    console.log('.col-'. id)
                    var rowElement = document.querySelector('.col-' + id);
                    if (rowElement) {
                        while (rowElement.firstChild) {
                            rowElement.removeChild(rowElement.firstChild);
                        }
                    }
                    // Hiển thị thông báo thành công
                    alert(response.message);
                } else {
                    // Hiển thị thông báo lỗi
                    alert(response.message);
                }
            }
        };
        xhr.send();
    }
  }