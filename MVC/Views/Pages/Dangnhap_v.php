<?php if (isset($data["result"]) && $data["result"] == false): ?>
  <script>
    alert("Bạn nhập sai mật khẩu, vui lòng nhập lại!");
  </script>
<?php endif; ?>
<?php if (isset($data["showLogin"]) && $data["showLogin"] === true): ?>
    <script>
      window.addEventListener("DOMContentLoaded", () => {
        showForm('login');
      });
    </script>
  <?php endif; ?>   
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Rap Phim</title>
  <link rel="stylesheet" href="/RAPPHIM/Public/CSS/login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .tab-buttons {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .tab-buttons button {
      padding: 10px 20px;
      margin: 0 5px;
      border: none;
      background-color: #e50914;
      color: white;
      cursor: pointer;
      font-weight: bold;
      border-radius: 5px;
    }
    .tab-buttons button.active {
      background-color: #ff1f1f;
    }
    .form-section {
      display: none;
    }
    .form-section.active {
      display: block;
    }
  </style>
</head>
<?php if (isset($data["status"])): ?>
  <div id="messageBox" style="
    background-color: <?php echo (strpos($data['status'], 'thành công') !== false) ? '#28a745' : '#ff4d4d'; ?>;
    color: white;
    padding: 12px;
    border-radius: 6px;
    text-align: center;
    width: 60%;
    margin: 15px auto;
    font-weight: bold;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
  ">
    <?php echo $data["status"]; ?>
  </div>

  <script>
    // Tự động ẩn sau 3 giây
    setTimeout(() => {
      const box = document.getElementById('messageBox');
      if (box) box.style.display = 'none';
    }, 3000);
  </script>
<?php endif; ?>
<body>
  <div class="container">
    <div class="tab-buttons">
      <button id="loginTab" class="active" onclick="showForm('login')">Đăng nhập</button>
      <button id="registerTab" onclick="showForm('register')">Đăng ký</button>
    </div>

    <div class="login-content">
      <!-- Đăng nhập -->
      <form id="loginForm" class="form-section active" action="http://localhost/rapphim/Dangnhap/dangnhap" method="post">
        <h2 class="title">Welcome</h2>
        <div class="input-div one">
          <div class="i"><i class="fas fa-user"></i></div>
          <div class="div"><input type="text" class="input" placeholder="Email" name="Email"></div>
        </div>
        <div class="input-div pass">
          <div class="i"><i class="fas fa-lock"></i></div>
          <div class="div"><input type="password" class="input" placeholder="Mật khẩu" name="matKhau"></div>
        </div>
        <a href="#">Quên mật khẩu?</a>
        <input type="submit" class="btn" value="Đăng nhập" name="dangnhap">
      </form>

      <!-- Đăng ký -->
      <form id="registerForm" class="form-section" action="http://localhost/rapphim/Dangky/dangky" method="post">
        <h2 class="title">Đăng ký thành viên</h2>
        <div class="input-div one">
          <div class="i"><i class="fas fa-user"></i></div>
          <div class="div"><input type="text" class="input" placeholder="Họ tên" name="Hoten"></div>
        </div>
        <div class="input-div one">
          <div class="i"><i class="fas fa-envelope"></i></div>
          <div class="div"><input type="email" class="input" placeholder="Email" name="Email"></div>
        </div>
        <div class="input-div one">
          <div class="i"><i class="fas fa-phone"></i></div>
          <div class="div"><input type="text" class="input" placeholder="Số điện thoại" name="Sdt"></div>
        </div>
        <div class="input-div pass">
          <div class="i"><i class="fas fa-lock"></i></div>
          <div class="div"><input type="password" class="input" placeholder="Mật khẩu" name="matKhau"></div>
        </div>
        <input type="submit" class="btn" value="Đăng ký" name="dangky">
      </form>
    </div>
  </div>
 

  <script>
    function showForm(formType) {
      document.getElementById('loginForm').classList.remove('active');
      document.getElementById('registerForm').classList.remove('active');
      document.getElementById('loginTab').classList.remove('active');
      document.getElementById('registerTab').classList.remove('active');

      if (formType === 'login') {
        document.getElementById('loginForm').classList.add('active');
        document.getElementById('loginTab').classList.add('active');
      } else {
        document.getElementById('registerForm').classList.add('active');
        document.getElementById('registerTab').classList.add('active');
      }
    }
  </script>
</body>
</html>
