<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Rạp phim</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/home2.css">
</head>
<body>
<header>
    <nav class="navbar">
    <div class="nav-container">
        <ul class="nav-left">
            <li><a href="#">Phim</a></li>
            <li><a href="#">Rạp CGV</a></li>
            <li><a href="#">Tin Mới</a></li>
            <li><a href="#">Vé & Ưu Đãi</a></li>
            <li><a href="#">Cultureplex</a></li>
        </ul>
        <ul class="nav-right">
            <li><a href="#">Đăng Nhập/Đăng Ký</a></li>
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
