<?php include 'admin/koneksi.php'; ?>

<style>
  .berita-container {
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
    font-family: Arial, sans-serif;
  }

  .berita-judul {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
  }

  .search-form {
    text-align: center;
    margin-bottom: 30px;
  }

  .search-form input[type="text"] {
    padding: 10px;
    width: 300px;
    max-width: 80%;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .search-form button {
    padding: 10px 20px;
    background-color: #004080;
    color: white;
    border: none;
    border-radius: 5px;
    margin-left: 5px;
    cursor: pointer;
  }

  .search-form button:hover {
    background-color: #003060;
  }

  .berita-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
  }

  .berita-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    background: #f9f9f9;
    transition: transform 0.2s ease;
  }

  .berita-item:hover {
    transform: translateY(-5px);
  }

  .berita-img {
    width: 100%;
    height: 180px;
    object-fit: cover;
  }

  .berita-content {
    padding: 15px;
  }

  .berita-content h3 {
    font-size: 18px;
    color: #004080;
    margin-bottom: 10px;
  }

  .berita-content p {
    font-size: 14px;
    color: #555;
  }

  @media (max-width: 600px) {
    .berita-content h3 {
      font-size: 16px;
    }
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

<div class="">
  <h2 class="berita-judul">Berita </h2>

  <!-- FORM PENCARIAN -->
  <form class="search-form" method="GET" action="">
    <input type="text" name="cari" placeholder="Cari berita..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
    <button type="submit">Cari</button>
  </form>

  <div class="berita-list">

  <?php
    // Cek jika ada pencarian
    if (isset($_GET['cari']) && $_GET['cari'] != '') {
      $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
      $sql = "SELECT * FROM berita WHERE judul LIKE '%$cari%' OR isi LIKE '%$cari%' ORDER BY id DESC";
    } else {
      $sql = "SELECT * FROM berita ORDER BY id DESC";
    }

    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_array($query)) {
  ?>
      <div class="berita-item">
        <a class href="?page=detail&id=<?= $data['id'] ?>">
        <img src="image/<?= $data['gambar'] ?>" alt="<?= $data['judul'] ?>" class="berita-img">
        <div class="berita-content">
          <h3><?= $data['judul'] ?></h3>
          <p><?= substr(strip_tags($data['isi']), 0, 100) ?>...</p>
        </div></a>
        <div style="margin-top: 10px;">
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

</div>

      </div>
  <?php } ?>

  </div>
</div>