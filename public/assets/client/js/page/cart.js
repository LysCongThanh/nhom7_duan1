function sendCartData(event) {
  event.preventDefault();

  var productId = event.target.id; // Lấy ID của thẻ được click
  console.log(productId);
  var xhr = new XMLHttpRequest();
  var url = "cart/addCart?productId=" + productId;
  xhr.open("POST", url, true);

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
      if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
              var confirmation = confirm("Sản phẩm đã được thêm vào giỏ hàng. Bạn có muốn xem giỏ hàng không?");
              if (confirmation) {
                  window.location.href = "gio-hang";
              }
          } else {
              alert("Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng.");
          }
      }
  };
  xhr.send();
}
function confirmDelete(element) {
    var productId = element.getAttribute("id");
    console.log(productId);
    
    var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
    
    if (result) {
        var xhr = new XMLHttpRequest();
        var url = "cart/deleteCart?productId=" + productId;
        
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Xóa sản phẩm khỏi danh sách hiển thị trên giao diện
                        var rowElement = document.querySelector('.table-shopping-cart tbody');
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


