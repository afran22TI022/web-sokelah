<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Hapus file gambar
  $result = $koneksi->query("SELECT gambar FROM galeri WHERE id = $id");
  $data = $result->fetch_assoc();
  $namaGambar = $data['gambar'];

  if (file_exists("image/galeri/$namaGambar")) {
    unlink("image/galeri/$namaGambar");
  }

  // Hapus data dari database
  $koneksi->query("DELETE FROM galeri WHERE id = $id");

  echo "<script>alert('Foto berhasil dihapus!'); window.location='galeri.php';</script>";
}
?>
