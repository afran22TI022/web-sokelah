<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['submit'])) {
    $id    = mysqli_real_escape_string($koneksi, $_POST['id']);
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi   = mysqli_real_escape_string($koneksi, $_POST['isi']);

    $data_lama = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id='$id'");
    $lama = mysqli_fetch_assoc($data_lama);

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $folder = "image/";

    if (!empty($gambar)) {
        if (!empty($lama['gambar']) && file_exists($folder . $lama['gambar'])) {
            unlink($folder . $lama['gambar']);
        }
        move_uploaded_file($tmp, $folder . $gambar);
        $query = mysqli_query($koneksi, "UPDATE berita SET judul='$judul', isi='$isi', gambar='$gambar' WHERE id='$id'");
    } else {
        $query = mysqli_query($koneksi, "UPDATE berita SET judul='$judul', isi='$isi' WHERE id='$id'");
    }

    if ($query) {
        header("Location:?page=data_berita.php");
        exit();
    } else {
        echo "<p style='color:red;'>Gagal memperbarui berita.</p>";
    }
}
?>

<style>
  .form-container {
    max-width: 700px;
    margin: 40px auto;
    padding: 30px;
    background: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', sans-serif;
  }

  .form-container h2 {
    text-align: center;
    color: #004080;
    margin-bottom: 25px;
  }

  .form-container label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
  }

  .form-container input[type="text"],
  .form-container textarea,
  .form-container input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 7px;
    margin-bottom: 20px;
    font-size: 14px;
  }

  .form-container img {
    display: block;
    margin-bottom: 15px;
    border-radius: 8px;
  }

  .form-container button {
    background-color: #004080;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 7px;
    cursor: pointer;
    font-weight: bold;
    font-size: 15px;
    display: block;
    margin: 0 auto;
  }

  .form-container button:hover {
    background-color: #003060;
  }

  .form-container em {
    color: #666;
  }
</style>

<div class="form-container">
  <h2>Ubah Berita</h2>
  <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $data['id']; ?>">

      <label>Judul:</label>
      <input type="text" name="judul" value="<?= $data['judul']; ?>" required>

      <label>Isi Berita:</label>
      <textarea name="isi" rows="6" required><?= $data['isi']; ?></textarea>

      <label>Gambar Saat Ini:</label>
      <?php if (!empty($data['gambar'])): ?>
          <img src="image/<?= $data['gambar']; ?>" width="150">
      <?php else: ?>
          <em>Tidak ada gambar</em>
      <?php endif; ?>

      <label>Gambar Baru (Opsional):</label>
      <input type="file" name="gambar">

      <button type="submit" name="submit">🔁 Update Berita</button>
  </form>
</div>
