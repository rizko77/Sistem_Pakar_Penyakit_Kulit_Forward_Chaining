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
      opacity: 0.8; /* Opasitas background */
      font-family: 'Arial', sans-serif;
      min-height: 100vh; /* Untuk mengatur tinggi minimum halaman */
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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

  <div class="container">
    <div class="row justify-content-center card-con">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Konsultasi Penyakit Kulit
          </div>
          <div class="card-body">
            <form action="/konsultasi/start" method="post">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" name="umur" id="umur" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Mulai Konsultasi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (needed for some components) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
