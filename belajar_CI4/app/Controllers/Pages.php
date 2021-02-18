<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo "ini adalah Controller pages method index";
        $data = [
            'title' => 'Home | Belajar Pemrograman dengan CodeIgniter4',
            'navbar1' => ' active',
            'navbar2' => ' ',
            'navbar3' => ' ',
            'navbar4' => ' '
        ];

        return view('pages/Home', $data);
    }

    public function about()
    {
        echo "Ini adalah Controller Pages method about";
        $data = [
            'title' => 'About',
            'navbar1' => ' ',
            'navbar2' => 'active',
            'navbar3' => ' ',
            'navbar4' => ' '
        ];
        return view('pages/About', $data);
    }

    public function contact()
    {
        echo "Ini adalah controller Pages method contact";
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Perum Griya Pabean 2 Blok F/44',
                    'kota' => 'Sidoarjo'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Perum Griya Pabean 2 Blok F/46',
                    'kota' => 'Sidoarjo'
                ]
            ],
            'navbar1' => ' ',
            'navbar2' => ' ',
            'navbar3' => 'active',
            'navbar4' => ' '

        ];

        return view("pages/Contact", $data);
    }


    //--------------------------------------------------------------------

}