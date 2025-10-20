function loadPhim(ma, ten, loai, xuat, ngay) {
    document.querySelector('input[name="txtMaphim"]').value = ma;
    document.querySelector('input[name="txtTenphim"]').value = ten;
    document.querySelector('select[name="txtMaloai"]').value = loai;
    document.querySelector('select[name="txtMaxuatchieu"]').value = xuat;
    document.querySelector('input[name="txtNgaychieu"]').value = ngay;
    document.querySelector('button[name="btnThem"]').name = "btnSua";
    document.querySelector('button[type="submit"]').innerHTML = "💾 Cập nhật phim";
}
document.addEventListener("DOMContentLoaded", function() {
    const selectXuat = document.querySelector("select[name='txtMaxuatchieu']");
    const inputNgay = document.querySelector("input[name='txtNgaychieu']");

    if (selectXuat && inputNgay) {
        selectXuat.addEventListener("change", function() {
            const maXuat = this.value;
            if (maXuat !== "") {
                fetch("/rapphim/QliPDC/getNgayChieuTheoMaXuatChieu", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "maXuatchieu=" + encodeURIComponent(maXuat)
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() !== "") {
                        inputNgay.value = data.trim();
                    } else {
                        inputNgay.value = "";
                    }
                })
                .catch(error => console.error("Lỗi lấy ngày chiếu:", error));
            } else {
                inputNgay.value = "";
            }
        });
    }
});
