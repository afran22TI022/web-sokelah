<style>
  .profil-container {
    max-width: 1000px;
    margin: 50px auto;
    padding: 30px;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to right, #f9f9f9, #eef4fa);
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    color: #333;
  }

  .profil-header {
    text-align: center;
    margin-bottom: 30px;
  }

  .profil-header h2 {
    font-size: 34px;
    color: #2c3e50;
    margin-bottom: 10px;
  }

  .profil-image {
    width: 180px;
    height: 180px;
    object-fit: cover;
    border-radius: 50%;
    margin: 0 auto;
    display: block;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
  }

  .profil-image:hover {
    transform: scale(1.05);
  }

  .profil-content {
    text-align: justify;
    font-size: 16px;
    line-height: 1.8;
    padding: 0 10px;
  }

  .profil-section {
    margin-top: 40px;
    padding: 20px;
    background-color: #ffffffd9;
    border-left: 5px solid #2980b9;
    border-radius: 10px;
    transition: background-color 0.3s;
  }

  .profil-section:hover {
    background-color: #eaf2fa;
  }

  .profil-section h3 {
    color: #2980b9;
    margin-bottom: 10px;
    font-size: 20px;
  }

  .profil-section ul {
    padding-left: 20px;
  }

  .profil-section ul li {
    margin-bottom: 8px;
  }

  @media (max-width: 768px) {
    .profil-container {
      padding: 20px;
    }

    .profil-header h2 {
      font-size: 26px;
    }

    .profil-image {
      width: 140px;
      height: 140px;
    }

    .profil-content {
      font-size: 15px;
    }

    .profil-section {
      margin-top: 25px;
      padding: 15px;
    }
  }
</style>

<div class="profil-container">
  <div class="profil-header">
    <h2>Profil Sekolah</h2>
    <img src="image/logo.jpg" alt="Logo Sekolah" class="profil-image">
  </div>

  <div class="profil-content">
    <p>
      Sekolah kami adalah lembaga pendidikan yang berkomitmen untuk mencetak generasi yang cerdas, berakhlak mulia, dan siap menghadapi tantangan masa depan. Dengan tenaga pengajar profesional dan lingkungan belajar yang nyaman, kami berusaha memberikan pendidikan terbaik bagi siswa.
    </p>

    <div class="profil-section">
      <h3>Visi</h3>
      <p>
        Menjadi sekolah unggulan dalam prestasi akademik dan non-akademik serta membentuk karakter siswa yang beriman, bertakwa, dan berwawasan global.
      </p>
        </div>

    <div class="profil-section">
      <h3>Misi</h3>
      <ul>
        <li>Meningkatkan kualitas pembelajaran berbasis teknologi dan karakter.</li>
        <li>Menanamkan nilai-nilai kejujuran, disiplin, dan tanggung jawab.</li>
        <li>Mengembangkan potensi siswa melalui kegiatan ekstrakurikuler.</li>
        <li>Meningkatkan peran serta orang tua dan masyarakat dalam pendidikan.</li>
      </ul>
    </div>

    <div class="profil-section">
      <h3>Sejarah Singkat</h3>
      <p>
        Sekolah ini didirikan pada tahun 1990 dan telah meluluskan ribuan siswa yang kini sukses di berbagai bidang. Dengan perkembangan zaman, sekolah terus berinovasi dalam metode pembelajaran dan fasilitas.
      </p>
    </div>
  </div>
</div>
