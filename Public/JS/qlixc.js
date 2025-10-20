function loadXuatChieu(ma, ngay, gio) {
    // Gán dữ liệu vào form nhập
    const form = document.getElementById("form-xc");
    const title = document.getElementById("form-title");
    const btn = document.getElementById("btnSubmit");

    form.txtMaxuatchieu.value = ma;
    form.txtNgaychieu.value = ngay;
    form.txtThoigianchieu.value = gio;

    // Đổi tiêu đề và hành động
    title.innerHTML = "✏️ Cập nhật xuất chiếu";
    btn.innerHTML = "💾 Lưu thay đổi";
    btn.name = "btnSua";
    form.action = "/rapphim/QliXuatChieu/sua";
}

// Sau khi sửa xong (hoặc thêm mới) thì reset form về trạng thái “Thêm”
function resetFormXuatChieu() {
    const form = document.getElementById("form-xc");
    const title = document.getElementById("form-title");
    const btn = document.getElementById("btnSubmit");

    title.innerHTML = "➕ Thêm xuất chiếu mới";
    btn.innerHTML = "➕ Thêm xuất chiếu";
    btn.name = "btnThem";
    form.action = "/rapphim/QliXuatChieu/them";

    // Reset các input
    form.reset();
}

document.addEventListener("DOMContentLoaded", () => {
    // Lấy input ngày chiếu
    const dateInput = document.getElementById("txtNgaychieu");
    const today = new Date().toISOString().split("T")[0];
    dateInput.min = today;

    // Nếu chọn ngày nhỏ hơn hôm nay thì báo lỗi
    dateInput.addEventListener("change", function () {
        if (this.value < today) {
            alert("⚠️ Ngày chiếu không được nhỏ hơn ngày hiện tại!");
            this.value = today;
        }
    });
});
