<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rạp phim</title>
    <script src="http://localhost/rapphim/Public/JS/home.js"></script>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/home1.css">
</head>
<body>
<nav class="admin-navbar">
    <div style="display: flex; justify-content: flex-end; margin: 20px;">
        <form action="http://localhost/rapphim/qlitaikhoankhachhang" method="get">
            <button type="submit" style="
                background-color: #d90429;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                font-weight: bold;
                border-radius: 6px;
                cursor: pointer;
            ">
                👤 Quản lý tài Khoản
            </button>
        </form>
    </div>

<!-- BANNER -->
<section class="banner">
    <img src="/rapphim/Public/img/10d12d31845bf1eadb4b127d1eb3ca27 (1).png" alt="Khuyến mãi Zalopay">
</section>

<!-- NỘI DUNG CHÍNH -->
<main class="main-content">
    <aside class="poster-left">
        <img src="/rapphim/Public/img/review-phim-lat-mat-8.png" alt="Lật Mặt 8">
    </aside>
        <section class="featured-movie">
            <h2><a href="http://localhost/rapphim/PhimDangChieu ">Phim Đang Chiếu</a></h2> 
            <div class="slider">
                <button class="prev">&#10094;</button>
                <div class="slider-track">
                    <?php
                    if (isset($data["dsPhim"]) && !empty($data["dsPhim"])) {
                        foreach ($data["dsPhim"] as $phim) {
                            echo '<div class="movie-card">';
                            // ✅ Thêm liên kết đến controller PhimDangChieu
                            echo '<a href="http://localhost/rapphim/PhimDangChieu">';
                            echo '<img src="http://localhost/rapphim/Public/img/' . $phim["hinhAnh"] . '" alt="' . $phim["tenPhim"] . '">';
                            echo '</a>';
                            echo '<p>' . $phim["tenPhim"] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p style='text-align:center; color:white;'>Hiện chưa có phim đang chiếu.</p>";
                    }
                    ?>
                </div>
                <button class="next">&#10095;</button>
            </div>
        </section>
    <aside class="poster-right">
        <img src="/rapphim/Public/img/vn_cjrlr_insta_vert_main_1638x2048_intl.jpg" alt="Lật Mặt 6: Tấm Vé Định Mệnh">
    </aside>
</main>

<!-- TIN MỚI & ƯU ĐÃI -->
<section class="event-wrapper">
    <aside class="poster-left">
        <img src="/rapphim/Public/img/full_01.jpg" alt="Poster trái sự kiện">
    </aside>

    <section class="event-section">
        <h2>Tin mới & Ưu Đãi</h2>
        <div class="slider">
            <button class="prev-event">&#10094;</button>
            <div class="slider-track-event">
                <div class="event-card">
                    <img src="/rapphim/Public/img/TDM_.jpg" alt="CGV Member Day">
                    <div class="overlay">
                        <a href="#" class="btn-buy">Xem Chi Tiết</a>
                    </div>
                </div>
                <div class="event-card">
                    <img src="/rapphim/Public/img/350x495_11_.jpg" alt="Happy Birthday">
                    <div class="overlay">
                        <a href="#" class="btn-buy">Xem chi tiết</a>
                    </div>
                </div>
                <div class="event-card">
                    <img src="/rapphim/Public/img/membership_cgv.jpg" alt="Vé nhóm & sự kiện">
                    <div class="overlay">
                        <a href="#" class="btn-buy">Xem chi tiết</a>
                    </div>
                </div>
                <div class="event-card">
                    <img src="/rapphim/Public/img/full_01.jpg" alt="Qùa tặng">
                    <div class="overlay">
                        <a href="#" class="btn-buy">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <button class="next-event">&#10095;</button>
        </div>
    </section>

    <aside class="poster-right">
        <img src="/rapphim/Public/img/full_01.jpg" alt="Poster phải sự kiện">
    </aside>
</section>

</body>
</html>
