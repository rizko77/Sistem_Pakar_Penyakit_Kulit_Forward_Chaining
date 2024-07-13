<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Aturan</title>

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
              <a href="/admin/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- Penyakit -->
            <li class="nav-item">
              <a href="/admin/penyakit" class="nav-link">
                <i class="nav-icon fas fa-disease"></i>
                <p>
                  Penyakit
                </p>
              </a>
            </li>

            <!-- Gejala -->
            <li class="nav-item">
              <a href="/admin/gejala" class="nav-link">
                <i class="nav-icon fas fa-heartbeat"></i>
                <p>
                  Gejala
                </p>
              </a>
            </li>

            <!-- Aturan -->
            <li class="nav-item">
              <a href="/admin/rule" class="nav-link active">
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
              <h1 class="m-0">Data Aturan</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambahRule">Tambah Aturan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width: 20%">Nama Penyakit</th>
                    <th style="width: 40%">Nama Gejala</th>
                    <th style="width: 30%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($rules as $r) : ?>
                    <tr>
                      <td><?= esc($r['penyakit_nama']) ?></td>
                      <td><?= esc($r['gejala_nama']) ?></td>
                      <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteRule(<?= $r['id'] ?>)">Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- Modal Tambah Rule -->
          <div class="modal fade" id="modalTambahRule" tabindex="-1" role="dialog" aria-labelledby="modalTambahRuleLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTambahRuleLabel">Tambah Data Aturan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="/admin/saveRule" method="post">

                  <div class="form-group">
                      <label for="id_penyakit">Penyakit:</label>
                      <select name="id_penyakit" id="id_penyakit" class="form-control">
                          <?php foreach ($penyakit as $p) : ?>
                              <option value="<?= $p['id'] ?>"><?= esc($p['kode_penyakit']) ?> | <?= esc($p['nama']) ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="id_gejala">Gejala:</label>
                      <select name="id_gejala" id="id_gejala" class="form-control">
                          <?php foreach ($gejala as $g) : ?>
                              <option value="<?= $g['id'] ?>"><?= esc($g['kode_g']) ?> | <?= esc($g['nama_g']) ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>


                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.Modal Tambah Rule -->
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
    $(document).ready(function () {
      // Show modal when button is clicked
      $('#modalTambahRule').on('shown.bs.modal', function () {
        $('#id_penyakit').focus(); // Fokuskan pada select penyakit
      });

      // Delete function
      window.deleteRule = function(id) {
        // Implement your delete logic here
        if(confirm('Apakah Anda yakin ingin menghapus aturan ini?')) {
          // Redirect to delete route (implement delete route in controller)
          window.location.href = '/delete-rule/' + id;
        }
      }
    });
  </script>
</body>
</html>