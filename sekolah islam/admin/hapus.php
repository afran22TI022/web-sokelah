<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data lama
    $result = mysqli_query($koneksi, "SELECT * FROM berita WHERE id='$id'");
    $data   = mysqli_fetch_assoc($result);

    // Hapus gambar jika ada
    if (!empty($data['gambar']) && file_exists("image/" . $data['gambar'])) {
        unlink("image/" . $data['gambar']);
    }

    // Hapus berita dari database
    $hapus = mysqli_query($koneksi, "DELETE FROM berita WHERE id='$id'");

    if ($hapus) {
        // Ganti ini dengan file yang benar
        header("Location:Location: ../media.php?page=admin/data_berita");
        exit();
    } else {
        echo "Gagal menghapus berita.";
    }
}
?>
