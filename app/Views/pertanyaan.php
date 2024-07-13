<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konsultasi Penyakit Kulit</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('/img/background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      opacity: 0.8;
      font-family: 'Arial', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 100px; /* Tambahkan padding-top untuk menurunkan posisi card */
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 100%; /* Pastikan lebar penuh untuk kartu */
      max-width: 800px; /* Batasi lebar maksimal untuk tampilan yang lebih baik */
    }
    .card-header {
      color: black;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      text-align: center;
      font-size: 24px;
    }
    .card-body {
      padding: 2rem;
    }
    .form-group label {
      font-weight: bold;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 25px;
      padding: 10px 20px;
      font-size: 16px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .checkbox-btn-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .checkbox-btn {
      display: none;
    }
    .checkbox-label {
      padding: 10px 20px;
      border-radius: 25px;
      cursor: pointer;
      border: 1px solid #ccc;
      text-align: center;
      flex: 1;
    }
    .checkbox-btn:checked + .checkbox-label {
      background-color: #007bff;
      color: white;
      border-color: #007bff;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <b>SYSTEM EXPERT</b>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">Admin</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container d-flex justify-content-center align-items-center">
    <div class="row justify-content-center card-con">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Pertanyaan
          </div>

          <div class="card-body">
            <form action="/konsultasi/hasil" method="post">
              <?php $no = 1; ?>
              <?php foreach ($pertanyaan_list as $pertanyaan): ?>
                <div class="form-group">
                  <h6><?= $no ?>. Apakah Anda mengalami <?= $pertanyaan['nama_g'] ?>?</h6>
                  <div class="checkbox-btn-group">
                    <input type="checkbox" id="gejala<?= $pertanyaan['id'] ?>" name="jawaban[]" value="<?= $pertanyaan['id'] ?>" class="checkbox-btn">
                    <label for="gejala<?= $pertanyaan['id'] ?>" class="checkbox-label btn btn-outline-primary">Ya</label>
                  </div>
                </div>
                <?php $no++; ?>
              <?php endforeach; ?>
              <button type="submit" name="submit" class="btn btn-primary">Cek Hasil Konsultasi</button>
            </form>
          </div>
        </div>
        <a href="/konsultasi" class="btn btn-danger mt-3">Keluar</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (needed for some components) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
