function sendData(event) {
  event.preventDefault();

  var productId = event.target.id; // Lấy ID của thẻ được click
  console.log(productId);
  var xhr = new XMLHttpRequest();
  var url = "cart/addWishList?productId=" + productId;
  xhr.open("POST", url, true);

  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
      if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);

          if (response.success) {
            alert("Đã xảy ra lỗi khi thêm sản phẩm vào mục yêu thích.");
          } else {
              alert("Sản phẩm đã được thêm vào mục yêu thích.");
          }
      }
  };
  xhr.send();
}

function confirmDeleteWishList(element) {
  var productId = element.target.id;
  console.log(productId);
  var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
  if (result) {
      var xhr = new XMLHttpRequest();
      var url = "profile/deleteWishList?id=" + productId;
      xhr.open("POST", url, true);

      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function() {
          if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              if (response.success) {
                  // Xóa sản phẩm khỏi danh sách hiển thị trên giao diện
                  var rowElement = document.querySelector('.wishlist');
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