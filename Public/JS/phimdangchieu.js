document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('showtime-modal');
  const modalTitle = document.getElementById('modal-title');
  const dateScroll = document.querySelector('.date-scroll');
  const showtimeList = document.getElementById('showtime-list');
  const closeBtn = modal.querySelector('.close');

  // mở modal khi click Mua Vé
  document.querySelectorAll('.btn-buy').forEach(btn => {
    btn.addEventListener('click', () => {
      const maPhim = btn.dataset.phimId;
      const tenPhim = btn.dataset.tenPhim;

      // lưu maPhim vào modal để dùng sau
      modal.dataset.maPhim = maPhim;

      // set title
      modalTitle.textContent = `Chọn Suất Chiếu - ${tenPhim}`;

      // lấy dữ liệu suatchieu từ window.suatChieu_<maPhim>
      const varName = 'suatChieu_' + maPhim;
      const data = window[varName] || {};

      // render ngày
      dateScroll.innerHTML = '';
      showtimeList.innerHTML = '';

      const dates = Object.keys(data);
      if (dates.length === 0) {
        dateScroll.innerHTML = '<p>Không có suất chiếu</p>';
      } else {
        dates.forEach((d, idx) => {
          const btnDay = document.createElement('button');
          btnDay.className = 'date-btn';
          btnDay.textContent = formatDate(d);
          btnDay.dataset.date = d;
          if (idx === 0) btnDay.classList.add('active');
          dateScroll.appendChild(btnDay);

          // mỗi ngày khi click render giờ
          btnDay.addEventListener('click', () => {
            dateScroll.querySelectorAll('.date-btn').forEach(x => x.classList.remove('active'));
            btnDay.classList.add('active');
            renderTimes(data[d]);
          });

          // auto render first day
          if (idx === 0) renderTimes(data[d]);
        });
      }

      // show modal
      modal.style.display = 'block';
    });
  });

  // render times: dataTimes is array of objects {gioChieu, maXuatChieu, maPhong}
  function renderTimes(dataTimes) {
    const maPhim = modal.dataset.maPhim || '';
    showtimeList.innerHTML = '';

    dataTimes.forEach(item => {
      const btn = document.createElement('button');
      btn.className = 'time-btn';
      btn.textContent = item.gioChieu;

      // khi click -> chuyển tới trang chọn ghế với params
      btn.addEventListener('click', () => {
        const maPhong = item.maPhong && item.maPhong !== 'null' ? item.maPhong : '';
        const maXuatChieu = item.maXuatChieu || '';

        // ✅ LOG nhỏ giúp bạn kiểm tra nếu vẫn lỗi
        console.log('📦 Params gửi sang ChonGhe:', {
          maPhim, maXuatChieu, maPhong
        });

        // ✅ Nếu project bạn dùng kiểu index.php?url=ChonGhe
        const url = `index.php?url=ChonGhe&phim=${encodeURIComponent(maPhim)}&maXuatChieu=${encodeURIComponent(maXuatChieu)}${maPhong ? `&maPhong=${encodeURIComponent(maPhong)}` : ''}`;

        // ✅ Nếu project chạy kiểu /rapphim/ChonGhe (bỏ comment dòng dưới, và xóa dòng trên)
        // const url = `/rapphim/ChonGhe?phim=${encodeURIComponent(maPhim)}&maXuatChieu=${encodeURIComponent(maXuatChieu)}${maPhong ? `&maPhong=${encodeURIComponent(maPhong)}` : ''}`;

        window.location.href = url;
      });

      showtimeList.appendChild(btn);
    });
  }

  function formatDate(d) {
    const dt = new Date(d);
    const dd = dt.getDate().toString().padStart(2, '0');
    const mm = (dt.getMonth() + 1).toString().padStart(2, '0');
    return `${dd}/${mm}/${dt.getFullYear()}`;
  }

  // close modal
  closeBtn.addEventListener('click', () => modal.style.display = 'none');
  window.addEventListener('click', (e) => {
    if (e.target === modal) modal.style.display = 'none';
  });
});
