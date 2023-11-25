$(document).ready(function () {
    $(".increase-btn").click(function () {
      var quantityElement = $(this).siblings(".quantity");
      var quantity = parseInt(quantityElement.text());
      quantityElement.text(quantity + 1);
      updateTotal();
    });

    $(".decrease-btn").click(function () {
      var quantityElement = $(this).siblings(".quantity");
      var quantity = parseInt(quantityElement.text());
      if (quantity > 1) {
        quantityElement.text(quantity - 1);
        updateTotal();
      }
    });

    function updateTotal() {
      var total = 0;
      $(".product-row").each(function () {
        var price = parseFloat($(this).data("price"));
        var quantity = parseInt($(this).find(".quantity").text());
        var subtotal = price * quantity;
        $(this).find(".total-price").text(subtotal);
        total += subtotal;
      });
      $("#cart-total").text(total);
    }

    function submitPayment() {
      var name = $("#name").val();
      var address = $("#address").val();
      var email = $("#email").val();
      var shippingMethod = $("#shippingMethod").val();
      var paymentMethod = $("#paymentMethod").val();

      // Thực hiện xử lý thanh toán thực tế ở đây
      alert("Thanh toán thành công!\n" +
        "Họ và tên: " + name + "\n" +
        "Địa chỉ: " + address + "\n" +
        "Email: " + email + "\n" +
        "Phương thức vận chuyển: " + shippingMethod + "\n" +
        "Phương thức thanh toán: " + paymentMethod);
    }
  });