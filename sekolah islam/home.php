<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hero Slider Sekolah</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }

    /* Hero Section */
    .hero {
      height: 450px;
      position: relative;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.5);
      z-index: 1;
    }

    .hero-text {
      position: relative;
      color: white;
      text-align: center;
      z-index: 2;
    }

    .hero-text h2 {
      font-size: 38px;
  font-family: 'Great Vibes', cursive;
}

    

    .hero-text p {
      font-size: 18px;
      margin-top: 10px;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      transition: opacity 1s ease-in-out;
      z-index: 0;
      opacity: 0;
    }

    .hero-bg.active {
      opacity: 1;
    }
  </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
  <!-- Gambar-gambar slider -->
  <div class="hero-bg active" style="background-image: url('image/sampul.jpg');"></div>
  <div class="hero-bg" style="background-image: url('image/sampul1.jpg');"></div>
  <div class="hero-bg" style="background-image: url('image/sampul2.jpg');"></div>

  <!-- Teks di atas slider -->
  <div class="hero-text">
      <p class="fs-3">ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ</p>
    <h2>Melahirkan Generasi Qur’ani</h2>
  
  </div>
</section>

<!-- Script Slider -->
<script>
  let current = 0;
  const slides = document.querySelectorAll('.hero-bg');

  setInterval(() => {
    slides[current].classList.remove('active');
    current = (current + 1) % slides.length;
    slides[current].classList.add('active');
  }, 4000); // Ganti gambar setiap 4 detik
</script>

</body>
</html>
