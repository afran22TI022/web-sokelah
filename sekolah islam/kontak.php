<style>
  .kontak-container {
    max-width: 1100px;
    margin: 50px auto;
    padding: 20px;
    font-family: 'Segoe UI', sans-serif;
    color: #333;
  }

  .kontak-header {
    text-align: center;
    margin-bottom: 30px;
  }

  .kontak-header h2 {
    font-size: 30px;
    color: #2c3e50;
  }

  .kontak-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
  }

  .kontak-info {
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 10px;
  }

  .kontak-info h3 {
    margin-bottom: 10px;
    color: #2980b9;
  }

  .kontak-info p {
    margin: 5px 0;
  }

  .kontak-form {
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 10px;
  }

  .kontak-form input,
  .kontak-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .kontak-form button {
    padding: 10px 20px;
    background-color: #2980b9;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .kontak-form button:hover {
    background-color: #21618c;
  }

  iframe {
    width: 100%;
    height: 250px;
    border: none;
    border-radius: 10px;
    margin-top: 20px;
  }

  @media (max-width: 768px) {
    .kontak-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="kontak-container">
  <div class="kontak-header">
    <h2>Kontak Kami</h2>
    <p>Silakan hubungi kami melalui informasi atau formulir berikut.</p>
  </div>

  <div class="kontak-grid">
    <div class="kontak-info">
      <h3>Alamat Sekolah</h3>
      <p>Jl. Pendidikan No. 45, Desa Cerdas, Kecamatan Pintar</p>

      <h3>Telepon</h3>
      <p>+62 812-3456-7890</p>

      <h3>Email</h3>
      <p>sekolah@example.com</p>

      <h3>Lokasi Kami</h3>
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126922.4453094969!2d106.6894311!3d-6.2293867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3ef19ea7b95%3A0x2bceab1d4cbb6be!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1628261029385"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>

    <div class="kontak-form">
      <form action="proses_kontak.php" method="POST">
        <input type="text" name="nama" placeholder="Nama Anda" required>
        <input type="email" name="email" placeholder="Email Anda" required>
        <textarea name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
        <button type="submit">Kirim Pesan</button>
      </form>
    </div>
  </div>
</div>
