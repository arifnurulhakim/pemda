<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function index()
    {
        $artikel = $this->artikelModel->getArtikel();
        // $event = $this->eventModel->findAll();
        $wisata = $this->wisataModel->findAll();
        $kategori_wisata = $this->kategoriWisataModel->findAll();
        $data = [
			'title' => 'Home',
			'subTitle' => 'Produk',
            'artikel' => $artikel,
            'wisata' => $wisata,
            'kategori_wisata' => $kategori_wisata
            // 'event' => $event,
		  ];
        return view('views/index',$data);
    }

    public function kategoriWisata($slug)
		{
			$data = 
			['title' => 'List Wisata',
			'kategori_wisata' => $this->kategoriWisataModel->getWisataByKategori($slug)
		];
        return view('views/wisata',$data);
		}
    
    public function register()
    {
        return view('auth/register');
    }

    public function user()
    {
        return view('user/index');
    }

    public function artikel()
    {
        return view('views/artikel/index');
    }
    
}