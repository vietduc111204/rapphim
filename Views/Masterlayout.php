<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Rạp phim</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/homemaster.css">
</head>
<body>
<header>
    <nav class="navbar">
    <div class="nav-container">
        <ul class="nav-left">
            <li><a href="http://localhost/rapphim/">Trang chủ</a></li>
            <li><a href="http://localhost/rapphim/PhimDangChieu">Phim</a></li>
            <li><a href="http://localhost/rapphim/TinTuc">Tin Mới</a></li>
            <li><a href="#">Vé & Ưu Đãi</a></li>
            <li><a href="#">Cultureplex</a></li>
        </ul>
       <ul class="nav-right">
            <?php if (isset($_SESSION['user'])): ?>
                <li>Xin chào, <?php echo $_SESSION['user']['ten']; ?></li>
                <li><a href="http://localhost/rapphim/Dangnhap/dangxuat">Đăng xuất</a></li>
            <?php else: ?>
                <li><a href="http://localhost/rapphim/Dangnhap">Đăng Nhập/Đăng Ký</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

</header>

<!-- load view con -->
<?php require_once "./mvc/Views/Pages/" . $data["page"] . ".php"; ?>

<footer>
    <p>&copy; RẠP CHIẾU PHIM 2025 </p>
</footer>
</body>
</html>
