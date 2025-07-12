<?php
include 'admin/koneksi.php';

// Ambil ID dari URL
if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($koneksi, $_GET['id']);
  $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = '$id'");
  $data = mysqli_fetch_array($query);

  if (!$data) {
    echo "<h3>Berita tidak ditemukan!</h3>";
    exit;
  }
} else {
  echo "<h3>ID berita tidak ditemukan!</h3>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $data['judul'] ?> - Detail Berita</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f3f3;
      margin: 0;
      padding: 0;
    }
    .name-container{
      max-width: 900px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .judul {
      font-size: 28px;
      color: #004080;
      margin-bottom: 10px;
    }
    .tanggal {
      font-size: 14px;
      color: gray;
      margin-bottom: 20px;
    }
    .gambar {
      max-width: 100%;
      margin-bottom: 20px;
      border-radius: 10px;
    }
    .isi {
      font-size: 16px;
      line-height: 1.6;
      color: #333;
    }
    .share {
      margin-top: 30px;
    }
    .share img {
      width: 28px;
      margin-right: 10px;
      vertical-align: middle;
    }
    .berita-img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  aspect-ratio: 16 / 9; /* Tambahan opsional untuk menjaga rasio */
  display: block;
}
a {
  text-decoration: none;
}


  </style>
</head>
<body>

<div class="name-container">
  <div class="judul"><?= $data['judul'] ?></div>
  <div class="tanggal"><?= date('d M Y', strtotime($data['tanggal'])) ?></div>

  <?php if (!empty($data['gambar'])): ?>
    <img src="image/<?= $data['gambar'] ?>" alt="<?= $data['judul'] ?>" class="gambar">
  <?php endif; ?>

  <div class="isi"><?= nl2br($data['isi']) ?></div>

  <div class="share">
    <h4>Bagikan:</h4>
    <?php
      $url = 'http://localhost/sekolah%20islam/detail_berita.php?id=' . $data['id'];
    ?>
    <div style="margin-top: 10px;">
  <a href="https://api.whatsapp.com/send?text=<?= urlencode($data['judul'] . ' - http://localhost/sekolah%20islam/detail_berita.php?id=' . $data['id']) ?>" target="_blank" style="margin-right: 10px; color: #25D366; font-size: 20px;">
    <i class="fab fa-whatsapp"></i>
  </a>
  <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('http://localhost/sekolah%20islam/detail_berita.php?id=' . $data['id']) ?>" target="_blank" style="margin-right: 10px; color: #3b5998; font-size: 20px;">
    <i class="fab fa-facebook"></i>
  </a>
  <a href="https://twitter.com/intent/tweet?url=<?= urlencode('http://localhost/sekolah%20islam/detail_berita.php?id=' . $data['id']) ?>&text=<?= urlencode($data['judul']) ?>" target="_blank" style="margin-right: 10px; color: #1DA1F2; font-size: 20px;">
    <i class="fab fa-twitter"></i>
  </a>
  <a href="https://www.instagram.com/" target="_blank" style="color: #C13584; font-size: 20px;">
    <i class="fab fa-instagram"></i>
  </a>
</div>

    </a>
  </div>
</div>

</body>
</html>
