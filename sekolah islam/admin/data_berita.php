<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
?>

<style>
  .tabel-berita-container {
    max-width: 1000px;
    margin: 40px auto;
    font-family: 'Segoe UI', sans-serif;
  }

  .tabel-berita-container h2 {
    text-align: center;
    color: #004080;
  }

  .tabel-berita-container a.tambah-btn {
    display: inline-block;
    margin-bottom: 15px;
    background-color: #004080;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
  }

  .tabel-berita-container a.tambah-btn:hover {
    background-color: #003060;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fdfdfd;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  th, td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
  }

  th {
    background-color: #004080;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .tabel-berita-container img {
    max-width: 100px;
    height: auto;
    border-radius: 5px;
  }

  .aksi-link a {
    margin-right: 10px;
    color: #004080;
    text-decoration: none;
    font-weight: bold;
  }

  .aksi-link a:hover {
    color: #d00;
  }
</style>

<div class="tabel-berita-container">
  <h2>Daftar Berita</h2>
  <a href="?page=admin/tambah_berita" class="tambah-btn">+ Tambah Berita</a>
<a href="?page=admin/tambah_gambar" class="tambah-btn">tambah foto</a>
<a href="?page=admin/data_kegiatan" class="tambah-btn">tambah foto</a>
  <table>
    <tr>
      <th>Judul</th>
      <th>Tanggal</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_array($data)): ?>
    <tr>
      <td><?= $row['judul'] ?></td>
      <td><?= $row['tanggal'] ?></td>
      <td>
        <?php if ($row['gambar']): ?>
          <img src="image/<?= $row['gambar'] ?>" alt="<?= $row['judul'] ?>">
        <?php else: ?>
          <em>Tidak ada gambar</em>
        <?php endif; ?>
      </td>
      <td class="aksi-link">
        <a href="?page=admin/ubah_berita&id=<?= $row['id'] ?>">✏️ Ubah</a>
        <a href="admin/hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus berita ini?')">🗑️ Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
