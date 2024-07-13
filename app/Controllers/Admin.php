<?php

namespace App\Controllers;

use App\Models\PenyakitModel;
use App\Models\GejalaModel;
use App\Models\RuleModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    public function dashboard()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();
        $ruleModel = new RuleModel();

        $data['penyakit'] = $penyakitModel->findAll();
        $data['gejala'] = $gejalaModel->findAll();
        $data['rules'] = $ruleModel->getRulesWithRelations();

        return view('admin/dashboard', $data);
    }





    // CRUD Penyakit
    public function penyakit()
    {
        $penyakitModel = new PenyakitModel();
        $data['penyakit'] = $penyakitModel->findAll();

        return view('/admin/Penyakit', $data);
    }

    public function addPenyakit()
    {
        return view('admin/Penyakit');
    }

    public function savePenyakit()
    {
        $penyakitModel = new PenyakitModel();
        $data = [
            'kode_penyakit' => $this->request->getPost('kode_penyakit'),
            'nama' => $this->request->getPost('nama'),
            'solusi' => $this->request->getPost('solusi')
        ];
        $penyakitModel->save($data);

        return redirect()->to('/admin/Penyakit');
    }

    public function deletePenyakit($id)
    {
        $penyakitModel = new PenyakitModel();
        $penyakitModel->delete($id);

        return redirect()->to('/admin/Penyakit');
    }





    // CRUD Gejala
    public function gejala()
    {
        $gejalaModel = new GejalaModel();
        $data['gejala'] = $gejalaModel->findAll();

        return view('/admin/Gejala', $data);
    }

    public function addGejala()
    {
        return view('admin/Gejala');
    }

    public function saveGejala()
    {
        $gejalaModel = new GejalaModel();
        $data = [
            'kode_g' => $this->request->getPost('kode_g'),
            'nama_g' => $this->request->getPost('nama_g')
        ];
        $gejalaModel->save($data);

        return redirect()->to('/admin/Gejala');
    }

    public function deleteGejala($id)
    {
        $gejalaModel = new GejalaModel();
        $gejalaModel->delete($id);

        return redirect()->to('/admin/Gejala');
    }



    

    // CRUD Rules
    public function rule()
    {
        $ruleModel = new RuleModel();
        $data['rules'] = $ruleModel->getRulesWithRelations();

        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();

        $data['penyakit'] = $penyakitModel->findAll();
        $data['gejala'] = $gejalaModel->findAll();

        // Debug
        // echo "<pre>";
        // print_r($data['penyakit']);
        // print_r($data['gejala']);
        // echo "</pre>";

        return view('admin/Rule', $data);
    }

    public function addRule()
    {
        $penyakitModel = new PenyakitModel();
        $gejalaModel = new GejalaModel();

        $data['penyakit'] = $penyakitModel->findAll();
        $data['gejala'] = $gejalaModel->findAll();

        return view('admin/AddRule', $data); // Menggunakan view terpisah untuk form tambah rule
    }

    public function saveRule()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_penyakit' => 'required',
            'id_gejala' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
            // Misalnya, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Jika validasi sukses, lanjutkan menyimpan data
        $ruleModel = new RuleModel();

        $data = [
            'id_penyakit' => $this->request->getPost('id_penyakit'),
            'id_gejala' => $this->request->getPost('id_gejala')
        ];

        // Simpan data ke dalam database
        $ruleModel->insert($data);

        // Arahkan kembali ke halaman list rule
        return redirect()->to('/admin/rule');
    }


    public function deleteRule($id)
    {
        $ruleModel = new RuleModel();
        $ruleModel->delete($id);

        return redirect()->to('/admin/rule');
    }

    

}
