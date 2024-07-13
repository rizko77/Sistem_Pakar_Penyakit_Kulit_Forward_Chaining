<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title> <!-- Menggunakan esc() untuk menghindari XSS -->
    <style>
        /* CSS khusus untuk laporan PDF */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1   {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?= esc($title) ?></h1><br>

        <h3><b>Biodata Konsultasi</b></h3>
        <a>Nama: <?= $biodata['nama'] ?></a><br>
        <a>Umur: <?= $biodata['umur'] ?></a><br>
        <a>Gender: <?= $biodata['gender'] ?></a><br>

        <br>

        <h3><b>Keputusan</b></h3>
        <?php if (!empty($penyakit)) : ?>
            <a>Penyakit: <b><?= $penyakit[0]['nama'] ?></b></a><br>
            <a>Solusi: <b><?= $penyakit[0]['solusi'] ?></b></a><br>
        <?php else : ?>
            <a>Tidak ada penyakit yang terdeteksi berdasarkan gejala yang dipilih.</a><br>
        <?php endif; ?>

        <br>

        <h3><b>Riwayat Pertanyaan</b></h3>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gejala Yang Dipilih</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat as $index => $gejala) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $gejala['nama_g'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
