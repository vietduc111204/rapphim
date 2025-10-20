document.addEventListener("DOMContentLoaded", function () {
  const checkboxes = document.querySelectorAll(".seat input[type='checkbox']");
  const seatList = document.getElementById("selected-seats");
  const totalPrice = document.getElementById("total-price");
  const tongTienInput = document.getElementById("tongTienInput");
  const hiddenSeats = document.getElementById("hidden-seats");
  const loaiInput = document.getElementById("loaiInput");
  const btnNext = document.getElementById("btn-next");
  const formThanhToan = document.getElementById("form-thanh-toan");

  function formatCurrency(number) {
    return number.toLocaleString('vi-VN') + " ₫";
  }

  function updateSummary() {
    let selected = [];
    let total = 0;
    let counted = new Set();
    let gheDaChon = [];
    let loaiVe = "";

    hiddenSeats.innerHTML = "";

    checkboxes.forEach(cb => {
      if (cb.checked) {
        const label = cb.closest(".seat");
        const ghe = label.dataset.ghe;
        const loai = label.dataset.loai;
        const price = parseInt(label.dataset.price);

        if (loai === "sweetbox") {
          const hang = ghe.charAt(0);
          const so = parseInt(ghe.slice(1));
          const gheKem = (so % 2 === 0) ? `${hang}${so - 1}` : `${hang}${so + 1}`;

          if (!counted.has(ghe) && !counted.has(gheKem)) {
            selected.push(`<li>${ghe} & ${gheKem} (SWEETBOX - ${formatCurrency(price)})</li>`);
            total += price;
            counted.add(ghe);
            counted.add(gheKem);
            gheDaChon.push(ghe, gheKem);
            loaiVe = "sweetbox";
          }
        } else {
          if (!counted.has(ghe)) {
            selected.push(`<li>${ghe} (${loai.toUpperCase()} - ${formatCurrency(price)})</li>`);
            total += price;
            counted.add(ghe);
            gheDaChon.push(ghe);
            loaiVe = loai;
          }
        }
      }
    });

    seatList.innerHTML = selected.join("");
    totalPrice.textContent = formatCurrency(total);
    tongTienInput.value = total;
    loaiInput.value = loaiVe;

    gheDaChon.forEach(ghe => {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = "ghe[]";
      input.value = ghe;
      hiddenSeats.appendChild(input);
    });
  }

  checkboxes.forEach(cb => {
    cb.addEventListener("click", function () {
      const label = cb.closest(".seat");
      const ghe = label.dataset.ghe;
      const loai = label.dataset.loai;

      if (loai === "sweetbox") {
        const hang = ghe.charAt(0);
        const so = parseInt(ghe.slice(1));
        const isOdd = so % 2 !== 0;
        const gheKem = isOdd ? `${hang}${so + 1}` : `${hang}${so - 1}`;
        const cbKem = document.querySelector(`input[value='${gheKem}']`);

        const isChecked = cb.checked;

        setTimeout(() => {
          if (cbKem && !cbKem.disabled) {
            cbKem.checked = isChecked;
          }
          updateSummary();
        }, 0);
      } else {
        setTimeout(updateSummary, 0);
      }
    });

    cb.addEventListener("change", updateSummary);
  });

  // ✅ Sự kiện nút Next → kiểm tra và submit
  btnNext.addEventListener("click", () => {
    updateSummary();
    const gheInputs = document.querySelectorAll("#hidden-seats input");
    if (gheInputs.length === 0) {
      alert("Bạn chưa chọn ghế nào!");
      return;
    }
    formThanhToan.submit();
  });
});
