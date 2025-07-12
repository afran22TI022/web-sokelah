<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $namaFile = $_FILES['gambar']['name'];
  $tmpName = $_FILES['gambar']['tmp_name'];
  $folderTujuan = 'galeri/';

  $ekstensiValid = ['jpg', 'jpeg', 'png'];
  $ekstensi = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

  if (in_array($ekstensi, $ekstensiValid)) {
    $namaBaru = uniqid() . '.' . $ekstensi;
    move_uploaded_file($tmpName, $folderTujuan . $namaBaru);

    $koneksi->query("INSERT INTO galeri (gambar) VALUES ('$namaBaru')");

    echo "<script>alert('Foto berhasil ditambahkan!'); window.location='?page=admin/tambah_gambar';</script>";
  } else {
    echo "<script>alert('Format gambar harus jpg, jpeg, atau png');</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tambah Foto Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f9ff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding: 50px;
    }

   

    h2 {
      text-align: center;
      color: #004080;
      margin-bottom: 30px;
    }

    .btn-primary {
      width: 100%;
      background-color: #004080;
      border: none;
    }

    .btn-primary:hover {
      background-color: #003060;
    }

    .back-link {
      display: block;
      margin-top: 20px;
      text-align: center;
      color: #004080;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>🖼️ Upload Gambar ke Galeri</h2>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="gambar" class="form-label">Pilih Gambar</label>
      <input type="file" name="gambar" id="gambar" accept="image/*" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
  </form>
  <a href="galeri.php" class="back-link">← Kembali ke Galeri</a>
</div>

</body>
</html>
