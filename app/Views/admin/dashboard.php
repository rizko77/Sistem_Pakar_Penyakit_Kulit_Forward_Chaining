<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

    <!-- Bootstrap CSS (needed for some AdminLTE components) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AdminLTE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <span class="brand-text font-weight-light">SP Penyakit LTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link active" id="dashboard-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Penyakit -->
          <li class="nav-item">
            <a href="/admin/Penyakit" class="nav-link" id="penyakit-link">
              <i class="nav-icon fas fa-disease"></i>
              <p>
                Penyakit
              </p>
            </a>
          </li>

          <!-- Gejala -->
          <li class="nav-item">
            <a href="/admin/Gejala" class="nav-link" id="gejala-link">
              <i class="nav-icon fas fa-heartbeat"></i>
              <p>
                Gejala
              </p>
            </a>
          </li>

          <!-- Aturan -->
          <li class="nav-item">
            <a href="/admin/Rule" class="nav-link" id="aturan-link">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Aturan
              </p>
            </a>
          </li>

          <!-- Logout -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Penyakit -->
        <div class="card" id="penyakit-card">
          <div class="card-header">
            <h3 class="card-title">Data Penyakit</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Solusi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($penyakit as $p): ?>
                    <tr>
                      <td><?= esc($p['kode_penyakit']) ?></td>
                      <td><?= esc($p['nama']) ?></td>
                      <td><?= esc($p['solusi']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.Penyakit -->

        

        <!-- Gejala -->
        <div class="card" id="penyakit-card">
          <div class="card-header">
            <h3 class="card-title">Data Gejala</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Gejala</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($gejala as $g): ?>
                    <tr>
                      <td><?= esc($g['kode_g']) ?></td>
                      <td><?= esc($g['nama_g']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.Gejala -->

        
         

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
<footer class="main-footer text-center">
  <strong>&copy; 2024</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap JS (needed for some AdminLTE components) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Modal Script -->
<script>
  $(document).ready(function() {
    // Show corresponding card when sidebar menu item is clicked
    $('#dashboard-link').click(function() {
      $('.card').hide();
      $('#dashboard-card').show();
    });

    $('#penyakit-link').click(function() {
      $('.card').hide();
      $('#penyakit-card').show();
    });

    $('#gejala-link').click(function() {
      $('.card').hide();
      $('#gejala-card').show();
    });

    $('#aturan-link').click(function() {
      $('.card').hide();
      $('#aturan-card').show();
    });

    $('#solusi-link').click(function() {
      $('.card').hide();
      $('#solusi-card').show();
    });
  });
</script>

</body>
</html>

