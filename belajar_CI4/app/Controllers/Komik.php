<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\CodeIgniter;

class Komik extends BaseController
{
    protected $KomikModel;
    // Fungsi constructor adalah supaya ketika kelasnya dipanggil maka modelnya juga dapat dipanggil untuk semua method
    public function __construct()
    {
        $this->KomikModel = new \App\Models\KomikModel();
    }
    public function index()
    {
        // ini adalah cara menghubungkan ke database dengan cara manual
        // $db = \config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }
        // akhir cara menghubungkan ke database dengan cara manual

        // Cara menghubungkan ke database dengan cara yang baik
        // $KomikModel = new \App\Models\KomikModel();
        // Penjelasan : 
        // Cara diatas merupakan cara untuk memanggil model dengan nama KomikModel, dengan cara memberikan new kemudian diteruskan dengan namespace dari model
        // end

        // Cara menghubungkan ke database dengan cara baik yang lainnya
        // $KomikModel = new KomikModel();
        // Penjelasan:
        // Cara diatas merupakan cara lain dari menghubungkan database dengan controller melalui model, hanya saja perlu pendeklarasian namespace dengan menggunakan use /App/Models/KomikModel;
        // End

        // $komik = $this->KomikModel->findAll(); // Fungsi yang hampir sama dengan SELECT * FROM 

        echo "ini adalah controller komik method index";
        $data = [
            'title' => 'Daftar Komik',
            'navbar1' => ' ',
            'navbar2' => ' ',
            'navbar3' => ' ',
            'navbar4' => ' active',
            'komik' => $this->KomikModel->getKomik()
        ];
        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        echo "ini adalah controller komik method detail dengan variabel slug yang diambil";
        $data = [
            'title' => 'Daftar Komik',
            'navbar1' => ' ',
            'navbar2' => ' ',
            'navbar3' => ' ',
            'navbar4' => ' active',
            'komik' => $this->KomikModel->getKomik($slug)
        ];

        // Jika Komik tidak ada di tabel
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik ' . $slug . ' tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        echo "ini adalah controller komik method create";
        $data = [
            'title' => 'Form tambah data komik',
            'navbar1' => ' ',
            'navbar2' => ' ',
            'navbar3' => ' ',
            'navbar4' => ' active',
            'validation' => \config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        echo "ini adalah controller komik method save";
        // Validation input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus dimasukkan',
                    'is_unique' => 'komik {value} sudah ada'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $data = $this->request->getVar();
        $this->KomikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->KomikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        echo "ini adalah controller komik method create";
        $data = [
            'title' => 'Form ubah data komik',
            'navbar1' => ' ',
            'navbar2' => ' ',
            'navbar3' => ' ',
            'navbar4' => ' active',
            'validation' => \config\Services::validation(),
            'komik' => $this->KomikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        // Validation input
        // if (!$this->validate([
        //     'judul' => [
        //         'rules' => 'required|is_unique[komik.judul]',
        //         'errors' => [
        //             'required' => '{field} komik harus dimasukkan',
        //             'is_unique' => 'komik {value} sudah ada'
        //         ]
        //     ]
        // ])) {
        //     $validation = \config\Services::validation();
        //     return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        // }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $data = $this->request->getVar();
        $this->KomikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/komik');
    }
}