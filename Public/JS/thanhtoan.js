console.log("✅ JS thanhtoan.js đã được load");

const btn = document.querySelector(".btn-pay");
const form = document.querySelector("form");

if (btn && form) {
  console.log("✅ Gắn event listener vào nút Thanh Toán");

  btn.addEventListener("click", (e) => {
    e.preventDefault();
    console.log("🖱 Nút được click!");

    Swal.fire({
      title: "Thanh toán thành công!",
      text: "Cảm ơn bạn đã đặt vé.",
      icon: "success",
      confirmButtonText: "Xem vé đã đặt"
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });
} else {
  console.warn("⚠️ Không tìm thấy nút hoặc form!");
}
