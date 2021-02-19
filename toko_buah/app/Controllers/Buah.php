<?php

namespace App\Controllers;

class Buah extends BaseController
{
    protected $BuahModel;
    public function __construct()
    {
        $this->BuahModel = new \App\Models\BuahModel();
    }


    public function save()
    {
        $this->BuahModel->save([
            'name' => $this->request->getVar('nama_buah'),
            'price' => $this->request->getVar('harga'),
            'image' => $this->request->getVar('foto'),
            'description' => $this->request->getVar('deskripsi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/Pages/index');
    }

    public function delete($product_id)
    {
        $this->BuahModel->delete($product_id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Pages/index');
    }

    public function edit($product_id)
    {
        $data = [
            'title' => 'Edit Data',
            'buah' => $this->BuahModel->getBuah($product_id)

        ];
        return view('CRUD/edit', $data);
    }

    public function update($product_id)
    {
        $this->BuahModel->save([
            'product_id' => $product_id,
            'name' => $this->request->getVar('nama_buah'),
            'price' => $this->request->getVar('harga'),
            'image' => $this->request->getVar('foto'),
            'description' => $this->request->getVar('deskripsi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/Pages/index');
    }



    //--------------------------------------------------------------------

}