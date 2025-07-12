<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $judul   = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi     = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $tanggal = date('Y-m-d');

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $folder = "image/";

    if (!empty($gambar)) {
        $path = $folder . basename($gambar);
        move_uploaded_file($tmp, $path);
    } else {
        $gambar = "";
    }

    $query = mysqli_query($koneksi, "INSERT INTO berita (judul, isi, gambar, tanggal) VALUES ('$judul', '$isi', '$gambar', '$tanggal')");

    if ($query) {
        header("Location:?page=admin/data_berita");
        exit();
    } else {
        echo "<p style='color:red;'>Gagal menyimpan berita.</p>";
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
</style>

<div class="form-container">
  <h2>Tambah Berita</h2>
  <form action="" method="POST" enctype="multipart/form-data">
      <label>Judul:</label>
      <input type="text" name="judul" required>

      <label>Isi Berita:</label>
      <textarea name="isi" rows="6" required></textarea>

      <label>Upload Gambar:</label>
      <input type="file" name="gambar">

      <button type="submit" name="submit">📝 Simpan Berita</button>
  </form>
</div>
