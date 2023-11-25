// Hàm thay đổi hình ảnh chính khi click vào hình phụ
function changeImage(newSource) {
    document.getElementById('main-image').src = newSource;
}

let quantity = 1;
// Hàm cập nhật số lượng sản phẩm
function updateQuantity(change) {
    quantity += change;
    if (quantity < 1) {
        quantity = 1;
    }
    document.getElementById('quantity').innerText = quantity;
}