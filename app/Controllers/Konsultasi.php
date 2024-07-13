<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\KonsultasiModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Konsultasi extends BaseController
{
    protected $gejalaModel;
    protected $konsultasiModel;
    protected $session;

    public function __construct()
    {
        $this->gejalaModel = new GejalaModel();
        $this->konsultasiModel = new KonsultasiModel();
        $this->session = session();
    }

    public function index()
    {
        return view('index');
    }

    public function konsultasi()
    {
        return view('konsultasi');
    }

    public function start()
    {
        $this->session->set('konsultasi', [
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
            'gender' => $this->request->getPost('gender'),
            'gejala' => [],
            'current_question' => 0,
            'history' => []
        ]);

        return redirect()->to('/pertanyaan');
    }

    public function pertanyaan()
    {
        $model = new GejalaModel();
        $data['pertanyaan_list'] = $model->findAll();

        $konsultasi = $this->session->get('konsultasi');

        if ($konsultasi['current_question'] >= count($this->gejalaModel->findAll())) {
            return redirect()->to('/hasil');
        }

        $gejala = $this->gejalaModel->findAll();
        $pertanyaan = $gejala[$konsultasi['current_question']];
        $pertanyaan['nomor'] = $konsultasi['current_question'] + 1;

        $data['pertanyaan'] = $pertanyaan;

        return view('pertanyaan', $data);
    }

    public function jawaban()
    {
        
        $konsultasi = $this->session->get('konsultasi');
        $jawaban = $this->request->getPost('jawaban');
        $id_gejala = $this->request->getPost('id_gejala');

        if ($jawaban === 'batal') {
            if ($konsultasi['current_question'] > 0) {
                $konsultasi['current_question']--;
                array_pop($konsultasi['history']);
            }
        } else {
            $konsultasi['history'][] = [
                'id_gejala' => $id_gejala,
                'jawaban' => $jawaban
            ];

            if ($jawaban === 'ya') {
                $konsultasi['gejala'][] = $id_gejala;
            }

            $konsultasi['current_question']++;
        }

        $this->session->set('konsultasi', $konsultasi);

        return redirect()->to('/pertanyaan');
    }

    public function hasil()
    {
        // Ambil data konsultasi dari session
        $session = session();
        $konsultasi = $session->get('konsultasi');

        // Ambil ID gejala yang dipilih dari request POST
        $selectedGejalaIds = $this->request->getPost('jawaban');

        // Ambil detail gejala yang dipilih dari database
        $gejalaList = $this->gejalaModel->whereIn('id', $selectedGejalaIds)->findAll();

        // Contoh logika pengambilan keputusan penyakit berdasarkan gejala yang dipilih
        // Harus disesuaikan dengan model dan aturan penyakit Anda
        $penyakit = $this->konsultasiModel->diagnose($selectedGejalaIds);

        $data = [
            'biodata' => [
                'nama' => $konsultasi['nama'],
                'umur' => $konsultasi['umur'],
                'gender' => $konsultasi['gender']
            ],
            'riwayat' => $gejalaList,
            'penyakit' => $penyakit
        ];

        return view('hasil', $data);
    }

    public function cekHasil()
    {
        return redirect()->to('/hasil');
    }




    public function cetakPDF()
    {
        // Ambil data konsultasi dari session atau sumber data lainnya
        $session = session();
        $konsultasi = $session->get('konsultasi');
    
        // Ambil hasil diagnosa penyakit dari session hasil.php atau sumber data lainnya
        $hasil = $session->get('hasil');
    
        // Ambil jawaban gejala dari hasil.php (misalnya dari checkbox pada pertanyaan.php)
        $selectedGejalaIds = $hasil['jawaban'] ?? [];
    
        // Ambil daftar gejala berdasarkan id yang dipilih dari database
        $gejalaList = [];
        if (!empty($selectedGejalaIds)) {
            $gejalaList = $this->gejalaModel->whereIn('id', $selectedGejalaIds)->findAll();
        }
    
        // Contoh logika pengambilan keputusan penyakit berdasarkan jawaban
        // Anda harus menyesuaikan ini dengan model dan aturan penyakit Anda
        $penyakit = [];
        if (!empty($selectedGejalaIds)) {
            $penyakit = $this->penyakitModel->getPenyakitByJawaban($selectedGejalaIds); // Misalnya, ambil data penyakit berdasarkan jawaban
        }
    
        // Load library Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);
    
        // Render HTML ke PDF
        $data = [
            'title' => 'Laporan Hasil Konsultasi',
            'biodata' => [
                'nama' => $konsultasi['nama'] ?? 'Nama tidak tersedia',
                'umur' => $konsultasi['umur'] ?? 'Umur tidak tersedia',
                'gender' => $konsultasi['gender'] ?? 'Gender tidak tersedia'
            ],
            'riwayat' => $gejalaList,
            'penyakit' => $penyakit,
        ];
    
        $html = view('laporan_pdf', $data); // Asumsikan laporan_pdf.php adalah file view
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Output PDF yang dihasilkan ke Browser
        $dompdf->stream('laporan_konsultasi.pdf', ['Attachment' => 0]);
    }
}

