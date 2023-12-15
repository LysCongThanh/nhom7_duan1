const webRoot = window.location.origin;
updateSumary();
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

        xhr.onload = function () {
            if (xhr.status === 200) {
                location.reload();
            }
        };

        xhr.send();
    }
}

function updateCart(element) {
    let valueOfEle = element.value;
    let idEle = element.getAttribute('id');

    var xhttp = new XMLHttpRequest();

    xhttp.open("POST", `${webRoot}/cart/updateCart`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            updateSumary();
        }
    };
    xhttp.send(JSON.stringify({
        quantity: valueOfEle,
        id: idEle
    }));

    
}

function updateSumary() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", `${webRoot}/cart/getSumaryCart`, true);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            let data = JSON.parse(xhttp.responseText);
            console.log(data);

            if(document.querySelector('.total')) {
                const total = document.querySelector('.total')
                const totalPrice = document.querySelector('.total-price');
                const totalDiscount = document.querySelector('.total-discount');

                total.innerHTML = formatCurrency(data[0].total);
                totalDiscount.innerHTML = formatCurrency(data[0].total_discount);
                totalPrice.innerHTML = formatCurrency(data[0].total_price);
            }

        }
    };
    xhttp.send();
}