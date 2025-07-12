<?php
include 'admin/koneksi.php';

// Ambil data galeri dari database
$sql = "SELECT * FROM galeri ORDER BY id DESC";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galeri Sekolah</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f5f5;
    }

    .galeri-container {
      max-width: 1000px;
      margin: 50px auto;
      padding: 20px;
      text-align: center;
    }

    .galeri-title {
      font-size: 24px;
      margin-bottom: 30px;
      color: #004080;
    }

    .galeri-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .galeri-item {
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .galeri-item:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .galeri-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      display: block;
    }

    /* LIGHTBOX */
    .lightbox {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 999;
    }

    .lightbox img {
      max-width: 90%;
      max-height: 90%;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(255,255,255,0.4);
      animation: zoomIn 0.3s ease;
    }

    @keyframes zoomIn {
      from {
        transform: scale(0.7);
        opacity: 0;
      }
      to {
        transform: scale(1);
        opacity: 1;
      }
    }
  </style>
</head>
<body>

<div class="galeri-container">
  <h2 class="galeri-title">Galeri Foto Sekolah</h2>

  <div class="galeri-grid">
    <?php while($row = $result->fetch_assoc()): ?>
      <div class="galeri-item">
        <img src="galeri/<?= htmlspecialchars($row['gambar']) ?>" alt="Galeri Foto">
      </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
  <img id="lightbox-img" src="" alt="Preview">
</div>

<script>
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');

  // Tambahkan event ke semua gambar
  document.querySelectorAll('.galeri-item img').forEach(img => {
    img.addEventListener('click', () => {
      lightbox.style.display = 'flex';
      lightboxImg.src = img.src;
    });
  });

  // Klik di luar gambar untuk menutup lightbox
  lightbox.addEventListener('click', () => {
    lightbox.style.display = 'none';
  });
</script>

</body>
</html>
