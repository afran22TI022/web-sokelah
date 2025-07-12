<?php session_start();?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>SMP Integral</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

</head>
<style>
/* Logo & Header Layout */
.navbar {
  border-bottom: 1px solid #ccc;
  padding: 12px 0;
}

.navbar-inner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.logo {
  display: flex;
  align-items: center;
  gap: 12px;
}

.logo img {
  width: 60px;
  height: 60px;
  object-fit: contain;
}

.logo-text h5 {
  margin: 0;
  font-size: 16px;
  color: #006e6f;
  font-family: 'Playfair Display', serif;
  font-weight: 600;
}

.logo-text p {
  margin: 0;
  font-size: 14px;
  font-family: 'Poppins', sans-serif;
  color: #222;
  font-weight: 500;
}

/* Navigation Menu */
.menu {
  list-style: none;
  display: flex;
  gap: 9px;
  align-items: center;
  padding-left: 0;
  margin: 0;
}

.menu li a {
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  font-size: 15px;
  color: #222;
  padding: 6px 10px;
  transition: 0.3s ease;
}

.menu li a:hover {
  color: #006e6f;
}

/* Login Button */
.login-btn {
  background-color: #606d77;
  color: white !important;
  padding: 6px 14px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: bold;
  font-family: 'Poppins', sans-serif;
}

/* Toggle Button for Mobile */
.menu-toggle {
  display: none;
}

/* Responsive */
@media (max-width: 768px) {
  .navbar-inner {
    flex-direction: column;
    align-items: flex-start;
  }

  .menu-toggle {
    display: block;
    margin-top: 10px;
  }

  nav#navMenu {
    display: none;
    width: 100%;
  }

  nav#navMenu.show {
    display: block;
  }

  .menu {
    flex-direction: column;
    gap: 10px;
    padding: 10px 0;
  }
  
}

</style>
<body>
<div class ="position-sticky top-0 z-3">
  <!-- Top Bar -->
  <div class="top-bar  ">
    <span class="phone">📞 62 8121-689-0224</span>
    <div class="social-icons">
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
  </div>

 
 <!-- Navbar -->
<div class="navbar bg-light position-sticky top-0 z-3">
  <div class="container-fluid navbar-inner ">
    
    <!-- LOGO DAN TEKS SEKOLAH -->
    <div class="logo">
      <img src="image/logo.jpg" alt="Logo" />
      <div class="logo-text">
        <h5>LEMBAGA PENDIDIKAN QUR'AN NAFAL</h5>
        <p>NARJUL FALAHHAIN</p>
      </div>
    </div>

    <!-- TOGGLE MENU UNTUK MOBILE -->
    <button class="menu-toggle text-dark" onclick="toggleMenu()">☰</button>

    <!-- MENU NAVIGASI -->
    <nav id="navMenu">
      <ul class="menu">
        <li><a class="text-dark" href="?page=home">Home</a></li>
        <li><a class="text-dark" href="?page=profile">Profil</a></li>
        <li><a class="text-dark" href="?page=galery">Galery</a></li>
        <li><a class="text-dark" href="?page=berita">Berita</a></li>
        <li><a class="text-dark" href="?page=kegiatan">Kegiatan</a></li>
        <li><a class="text-dark" href="?page=kontak">Kontak</a></li>

        <?php
    // Jika sudah login dan level adalah admin
    if (isset($_SESSION['level']) && $_SESSION['level'] === 'admin') {
        echo '<li><a class="text-dark" href="?page=admin/data_berita">Admin</a></li>';
        echo '<li><a class="text-light rounded-pill px-3" style="background-color:#006e6f" href="logout.php" onclick="return confirm(\'Apakah Anda yakin ingin keluar?\')">Logout</a></li>';

    } else {
        // Jika belum login, tampilkan login
        echo '<li><a class="text-light rounded-pill px-3" style="background-color:#006e6f" href="login.php">Login</a></li>';
    }
    ?>
      </ul>
    </nav>
  </div>
</div>

 <?php include 'konten.php';?>

<section class="info">
    <div class="info-card">
      <h3>Penerimaan Murid Baru 2025</h3>
      <p>Daftarkan putra-putri Anda ke sekolah kami. Info lengkap tersedia di halaman "Profil" dan "Program".</p>
    </div>
  </section>

  <!-- WhatsApp -->
  <a href="https://wa.me/6281216890224" class="wa-btn">💬 Hubungi Admin</a>

  <!-- JS Toggle Menu -->
  <script>
    function toggleMenu() {
      var menu = document.getElementById("navMenu");
      menu.classList.toggle("show");
    }
  </script>