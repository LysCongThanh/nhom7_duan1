function generateSKU() {
    // Tạo SKU một cách ngẫu nhiên, ví dụ: ABC-123-XYZ
    var randomPart1 = Math.random().toString(36).substring(2, 5).toUpperCase(); // Ví dụ: ABC
    var randomPart2 = Math.floor(Math.random() * 1000); // Ví dụ: 123
    var randomPart3 = Math.random().toString(36).substring(2, 5).toUpperCase(); // Ví dụ: XYZ

    var skuValue = randomPart1 + '-' + randomPart2 + '-' + randomPart3;
    eventInput = new Event('input');
    // Lấy thẻ input bằng id
    var skuInput = document.getElementById('sku-code');

    // Đặt giá trị SKU cho trường input
    skuInput.value = 'SKU code was being generated...!';
    skuInput.dispatchEvent(eventInput);
}