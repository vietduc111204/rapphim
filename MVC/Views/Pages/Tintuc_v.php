<link rel="stylesheet" href="/rapphim/Public/CSS/tintuc.css">
<h2 class="title">📰 Tin tức và Ưu đãi</h2>

<a href="/rapphim/Home" class="btnQuayLai">← Quay lại trang chủ</a>

<div class="grid-tintuc">
  <?php foreach ($data["data"] as $row): ?>
    <div class="card-tintuc">
      <a href="/rapphim/Tintuc/chitiet/<?= $row["maTin"] ?>">
        <img src="/rapphim/Public/img/<?= $row["hinhAnh"] ?>" alt="<?= $row["tenTin"] ?>">
        <div class="caption"><?= $row["tenTin"] ?></div>
      </a>
    </div>
  <?php endforeach; ?>
</div>
