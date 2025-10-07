<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rạp phim</title>
    <link rel="stylesheet" href="http://localhost/rapphim/Public/CSS/home3.css">
</head>
<body>

<section class="banner">
    <img src="/rapphim/Public/img/10d12d31845bf1eadb4b127d1eb3ca27 (1).png" alt="Khuyến mãi Zalopay">
</section>

<main class="main-content">
    <aside class="poster-left">
        <img src="/rapphim/Public/img/lat-mat-6-1.jpg" alt="Lật Mặt 6: Tấm Vé Định Mệnh">
    </aside>

    <section class="movie-selection">
    <h2>Phim Đang Chiếu</h2>
   <div class="slider">
    <button class="prev">&#10094;</button>
    <div class="slider-track">
        <div class="movie-card">
            <img src="/rapphim/Public/img/522919041_1174611668037785_4808148504690933272_n.jpg" alt="Phim 1">
            <div class="overlay">
                <a href="#" class="btn-buy">Mua Vé</a>
            </div>
        </div>

        <div class="movie-card">
            <img src="/rapphim/Public/img/71DlLjNU0HL.jpg" alt="Phim 2">
            <div class="overlay">
                <a href="#" class="btn-buy">Mua Vé</a>
            </div>
        </div>

        <div class="movie-card">
            <img src="/rapphim/Public/img/486099888_1063647409122859_1252407638629859400_n.jpg" alt="Phim 3">
            <div class="overlay">
                <a href="#" class="btn-buy">Mua Vé</a>
            </div>
        </div>

        <div class="movie-card">
            <img src="/rapphim/Public/img/547857626_813476674548817_6096266279182237597_n.jpg" alt="Phim 4">
            <div class="overlay">
                <a href="#" class="btn-buy">Mua Vé</a>
            </div>
        </div>

        <div class="movie-card">
            <img src="/rapphim/Public/img/530490398_24542356798691645_2437792584912396890_n.jpg" alt="Phim 5">
            <div class="overlay">
                <a href="#" class="btn-buy">Mua Vé</a>
            </div>
        </div>

        <div class="movie-card">
            <img src="/rapphim/Public/img/536279893_122153491598782007_921765304500854029_n.jpg" alt="Phim 6">
            <div class="overlay">
                <a href="#" class="btn-buy">Mua Vé</a>
            </div>
        </div>
    </div>
    <button class="next">&#10095;</button>
</div>

</section>

    <aside class="poster-right">
        <img src="/rapphim/Public/img/lat-mat-6-1.jpg" alt="Lật Mặt 6: Tấm Vé Định Mệnh">
    </aside>
</main>
<script>
    const track = document.querySelector('.slider-track');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    const cards = document.querySelectorAll('.movie-card');
    const cardWidth = 270; // 250px + khoảng cách
    const visibleCards = 3; // số lượng phim hiển thị cùng lúc
    let index = 0;

    function updateSlider() {
        track.style.transform = `translateX(-${index * cardWidth}px)`;
    }

    next.addEventListener('click', () => {
        index++;
        if (index > cards.length - visibleCards) {
            index = 0; // quay lại đầu
        }
        updateSlider();
    });

    prev.addEventListener('click', () => {
        index--;
        if (index < 0) {
            index = cards.length - visibleCards; // quay về cuối
        }
        updateSlider();
    });
</script>

</body>
</html>
