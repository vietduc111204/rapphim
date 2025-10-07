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

// Tự động ẩn thông báo sau 3 giây
window.addEventListener("DOMContentLoaded", () => {
  const box = document.getElementById('messageBox');
  if (box) {
    setTimeout(() => {
      box.style.display = 'none';
    }, 3000);
  }
});
