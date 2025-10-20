<link rel="stylesheet" href="/rapphim/Public/CSS/tintuc.css">

<h2 class="title"><?= $data["tin"]["tenTin"] ?></h2>

<div class="chitiet-tintuc">
  <img src="/rapphim/Public/img/<?= $data["tin"]["hinhAnh"] ?>" alt="<?= $data["tin"]["tenTin"] ?>" class="img-chitiet">
  <p><strong>Ngày đăng:</strong> <?= $data["tin"]["ngayDang"] ?></p>
  <div class="noidung"><?= nl2br($data["tin"]["noiDung"]) ?></div>
  <a href="/rapphim/Tintuc" class="btnQuayLai">← Quay lại danh sách</a>
</div>
