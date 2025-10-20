<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Phim Đang Chiếu</title>
  <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/phimdangchieu.css">
  <script>
  <?php if (!empty($data['dsSuatChieu'])): ?>
    <?php foreach ($data['dsSuatChieu'] as $maPhim => $suatChieu): ?>
      window.suatChieu_<?= $maPhim ?> = <?= json_encode($suatChieu) ?>;
    <?php endforeach; ?>
  <?php endif; ?>
</script>
<script src="http://localhost/rapphim/Public/JS/phimdangchieu.js" defer></script>

</head>
<body>

<main class="main-content">
  <section class="featured-movie">
    <h2 class="section-title">Phim Đang Chiếu</h2>
    <div class="movie-grid">
      <?php if (!empty($data['dsPhim'])): ?>   
        <?php foreach ($data['dsPhim'] as $phim): ?>
          <div class="movie-card">
            <img src="/rapphim/Public/img/<?= $phim['hinhAnh'] ?>" alt="<?= $phim['tenPhim'] ?>">
            <div class="overlay">
              <button class="btn-buy" 
                      data-phim-id="<?= $phim['maPhim'] ?>" 
                      data-ten-phim="<?= $phim['tenPhim'] ?>">Mua Vé</button>
            </div>
            <p><?= $phim['tenPhim'] ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="no-movie">Không có phim nào đang chiếu.</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<!-- Modal chọn suất chiếu -->
<div id="showtime-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3 id="modal-title">Chọn Suất Chiếu</h3>

    <div class="date-scroll">
      <!-- JS sẽ render các ngày -->
    </div>

    <div id="showtime-list">
      <!-- JS sẽ render các giờ chiếu -->
    </div>
  </div>
</div>

</body>
</html>
