<?php
include 'koneksi.php'; // koneksi ke database

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi = mysqli_real_escape_string($koneksi, $_POST['isi']);
    $link_video = mysqli_real_escape_string($koneksi, $_POST['link_video']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

    // Simpan ke database
    $query = "INSERT INTO kegiatan (judul, isi, link_video, tanggal)
              VALUES ('$judul', '$isi', '$link_video', '$tanggal')";
    mysqli_query($koneksi, $query);

    // Redirect ke halaman kegiatan setelah tambah
    header("Location: kegiatan.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kegiatan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 600px; margin: auto; }
        input, textarea { width: 100%; padding: 10px; margin-bottom: 15px; }
        button { padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; }
        label { font-weight: bold; }
    </style>
</head>
<body>

<h2>Form Tambah Kegiatan</h2>

<form action="" method="post">
    <label>Judul:</label>
    <input type="text" name="judul" required>

    <label>Isi Kegiatan:</label>
    <textarea name="isi" rows="5" required></textarea>

    <label>Link Video (YouTube Embed / Facebook Embed):</label>
    <input type="text" name="link_video" placeholder="https://www.youtube.com/embed/...">

    <label>Tanggal:</label>
    <input type="date" name="tanggal" required>

    <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>
