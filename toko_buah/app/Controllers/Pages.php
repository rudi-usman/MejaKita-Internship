<?php

namespace App\Controllers;

class Pages extends BaseController
{
    protected $BuahModel;
    public function __construct()
    {
        $this->BuahModel = new \App\Models\BuahModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Toko Buah',
            'buah' => $this->BuahModel->getBuah()
        ];
        return view('index', $data);
    }




    public function tambah_data()
    {
        $data = [
            'title' => 'Tambah Data',
            'buah' => $this->BuahModel->getBuah()
        ];
        return view('CRUD/tambah_data', $data);
    }

    //--------------------------------------------------------------------

}