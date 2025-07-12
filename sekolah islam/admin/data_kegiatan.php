<?php
include 'koneksi.php'; // pastikan koneksi disiapkan
$data = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY id DESC");
?>

<style>
  .tabel-kegiatan-container {
    max-width: 1000px;
    margin: 40px auto;
    font-family: 'Segoe UI', sans-serif;
  }

  .tabel-kegiatan-container h2 {
    text-align: center;
    color: #004080;
  }

  .tabel-kegiatan-container a.tambah-btn {
    display: inline-block;
    margin-bottom: 15px;
    background-color: #004080;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
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
    vertical-align: top;
  }

  th {
    background-color: #004080;
    color: white;
  }

  .iframe-wrapper {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    height: 0;
    overflow: hidden;
  }

  .iframe-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .aksi-link a {
    margin-right: 10px;
    color: #004080;
    text-decoration: none;
    font-weight: bold;
  }

  .aksi-link a:hover {
    color: red;
  }
</style>

<div class="tabel-kegiatan-container">
  <h2>Data Kegiatan Sekolah</h2>
  <a href="?page=admin/tambah_kegiatan" class="tambah-btn">+ Tambah Kegiatan</a>

  <table>
    <tr>
      <th>Judul</th>
      <th>Tanggal</th>
      <th>Isi</th>
      <th>Video</th>
      <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($data)): ?>
    <tr>
      <td><?= htmlspecialchars($row['judul']) ?></td>
      <td><?= $row['tanggal'] ?></td>
      <td><?= nl2br(htmlspecialchars($row['isi'])) ?></td>
      <td>
        <?php if (!empty($row['link_video'])): ?>
          <div class="iframe-wrapper">
            <iframe src="<?= htmlspecialchars($row['link_video']) ?>" frameborder="0" allowfullscreen></iframe>
          </div>
        <?php else: ?>
          <em>Tidak ada video</em>
        <?php endif; ?>
      </td>
      <td class="aksi-link">
        <a href="?page=admin/edit_kegiatan&id=<?= $row['id'] ?>">✏️ Ubah</a>
        <a href="admin/hapus_kegiatan.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">🗑️ Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
