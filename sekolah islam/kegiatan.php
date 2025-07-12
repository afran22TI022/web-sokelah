<?php
include 'admin/koneksi.php'; // pastikan koneksi ke DB dimulai di sini

// Ambil semua data kegiatan, urut berdasarkan tanggal terbaru
$query = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kegiatan Sekolah</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .berita-container {
      max-width: 900px;
      margin: 30px auto;
      padding: 20px;
    }

    .berita-item {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 30px;
      background-color: #f9f9f9;
    }

    .berita-item h3 {
      color: #003366;
      margin-bottom: 10px;
    }

    .berita-item p {
      color: #444;
    }

    .video-wrapper {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
      margin-top: 15px;
    }

    .video-wrapper iframe {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
    }
  </style>
</head>
<body>

<div class="berita-container">
  <h2>Kegiatan Sekolah</h2>

  <?php while ($data = mysqli_fetch_assoc($query)) { ?>
    <div class="berita-item">
      <h3><?= htmlspecialchars($data['judul']) ?></h3>
      <p><?= nl2br(htmlspecialchars($data['isi'])) ?></p>

      <?php if (!empty($data['link_video'])): ?>
        <div class="video-wrapper">
          <iframe src="<?= htmlspecialchars($data['link_video']) ?>" frameborder="0" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>
      <?php endif; ?>
    </div>
  <?php } ?>

</div>

</body>
</html>
